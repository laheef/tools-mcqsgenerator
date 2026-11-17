<?php

/**
 * Garlic converter
 * /food/garlic-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Garlic converter',
    'meta' => ['title' => 'Garlic converter — Formula, Steps & Examples', 'description' => 'Convert garlic between cloves, minced, chopped, flakes, granulated and powdered forms. Check the ingredient, packing and units before using the result.', 'h1' => 'Garlic converter Calculator', 'updated' => '2026-08-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'garlic_clove',
                            'label' => 'Garlic cloves',
                            'type' => 'number',
                            'suffix' => 'clove(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'garlic_powder',
                            'label' => 'Garlic powder',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'granulated_garlic',
                            'label' => 'Granulated garlic',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'garlic_flakes',
                            'label' => 'Garlic flakes',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chopped_garlic',
                            'label' => 'Chopped garlic',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'minced_garlic',
                            'label' => 'Minced garlic',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'garlic_salt',
                            'label' => 'Garlic salt',
                            'type' => 'number',
                            'unit' => '122',
                            'unit_default' => 'tsp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'garlic_powder = 1/8 * garlic_clove',
            'results' => ['garlic_powder' => '(1/8)*garlic_clove', 'garlic_clove' => '8*garlic_powder'],
        ],
        [
            'title' => 'garlic_flakes = 1/2 * garlic_clove',
            'results' => ['garlic_flakes' => '(1/2)*garlic_clove', 'garlic_clove' => '2*garlic_flakes'],
        ],
        [
            'title' => 'granulated_garlic = 1/4 * garlic_clove',
            'results' => ['granulated_garlic' => '(1/4)*garlic_clove', 'garlic_clove' => '4*granulated_garlic'],
        ],
        [
            'title' => 'garlic_salt = 1/2 * garlic_clove',
            'results' => ['garlic_salt' => '(1/2)*garlic_clove', 'garlic_clove' => '2*garlic_salt'],
        ],
        [
            'title' => 'chopped_garlic = garlic_clove',
            'results' => ['chopped_garlic' => 'garlic_clove', 'garlic_clove' => 'chopped_garlic'],
        ],
        [
            'title' => 'minced_garlic = 1/2 * garlic_clove',
            'results' => ['minced_garlic' => '(1/2)*garlic_clove', 'garlic_clove' => '2*minced_garlic'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Garlic works out Garlic powder and Granulated garlic from Garlic cloves. Nothing is looked up on this page: garlic powder is computed from garlic cloves and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Garlic powder is opened in teaspoons (5 ml); the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Garlic calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Garlic: it takes 1 number and reports Garlic powder, Granulated garlic and Garlic flakes.</p><p>The relationship it solves reads Garlic powder = (1 ÷ 8) × Garlic cloves.</p><p>The result panel carries Garlic powder, Granulated garlic, Garlic flakes and Chopped garlic, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Garlic cloves</strong> — in clove(s)</li></ul><p>The answers come back as Garlic powder in teaspoons (5 ml), Granulated garlic in teaspoons (5 ml), Garlic flakes in teaspoons (5 ml), Chopped garlic in teaspoons (5 ml), Minced garlic in teaspoons (5 ml), Garlic salt in teaspoons (5 ml). </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Garlic cloves = 10 clove(s) — through the same formula and the panel reports <strong>Garlic powder</strong> = 1.25 tsp, <strong>Garlic flakes</strong> = 5 tsp, <strong>Granulated garlic</strong> = 2.5 tsp, <strong>Garlic salt</strong> = 5 tsp, <strong>Chopped garlic</strong> = 10 tsp and <strong>Minced garlic</strong> = 5 tsp.</p><ul><li><strong>Garlic powder</strong> = 1.25 tsp</li><li><strong>Garlic flakes</strong> = 5 tsp</li><li><strong>Granulated garlic</strong> = 2.5 tsp</li><li><strong>Garlic salt</strong> = 5 tsp</li><li><strong>Chopped garlic</strong> = 10 tsp</li><li><strong>Minced garlic</strong> = 5 tsp</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Garlic powder</strong> = <code>(1 ÷ 8) × Garlic cloves</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Garlic powder</strong> = 1.25, <strong>Garlic flakes</strong> = 5, <strong>Granulated garlic</strong> = 2.5, <strong>Garlic salt</strong> = 5, <strong>Chopped garlic</strong> = 10 and <strong>Minced garlic</strong> = 5. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Garlic powder lists 14 options and opens on teaspoons (5 ml). </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Garlic powder</strong> = <code>(1 ÷ 8) × Garlic cloves</code></li><li><strong>Garlic cloves</strong> = <code>8 × Garlic powder</code></li><li><strong>Garlic flakes</strong> = <code>(1 ÷ 2) × Garlic cloves</code></li><li><strong>Granulated garlic</strong> = <code>(1 ÷ 4) × Garlic cloves</code></li><li><strong>Garlic salt</strong> = <code>(1 ÷ 2) × Garlic cloves</code></li><li><strong>Chopped garlic</strong> = <code>Garlic cloves</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Garlic powder</strong> = <code>(1 ÷ 8) × Garlic cloves</code> — the form to use when Garlic cloves are the values you have.</li><li><strong>Garlic cloves</strong> = <code>8 × Garlic powder</code> — the form to use when Garlic powder are the values you have.</li><li><strong>Garlic flakes</strong> = <code>(1 ÷ 2) × Garlic cloves</code> — the form to use when Garlic cloves are the values you have.</li><li><strong>Garlic cloves</strong> = <code>2 × Garlic flakes</code> — the form to use when Garlic flakes are the values you have.</li><li><strong>Granulated garlic</strong> = <code>(1 ÷ 4) × Garlic cloves</code> — the form to use when Garlic cloves are the values you have.</li><li><strong>Garlic cloves</strong> = <code>4 × Granulated garlic</code> — the form to use when Granulated garlic are the values you have.</li><li><strong>Garlic salt</strong> = <code>(1 ÷ 2) × Garlic cloves</code> — the form to use when Garlic cloves are the values you have.</li><li><strong>Garlic cloves</strong> = <code>2 × Garlic salt</code> — the form to use when Garlic salt are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Garlic powder, Garlic cloves and Garlic flakes can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Garlic cloves, from 10 to 20 — and the answers go from <strong>Garlic powder</strong> 1.25 tsp, <strong>Garlic flakes</strong> 5 tsp, <strong>Granulated garlic</strong> 2.5 tsp, <strong>Garlic salt</strong> 5 tsp, <strong>Chopped garlic</strong> 10 tsp and <strong>Minced garlic</strong> 5 tsp to <strong>Garlic powder</strong> 2.5 tsp, <strong>Garlic flakes</strong> 10 tsp, <strong>Granulated garlic</strong> 5 tsp, <strong>Garlic salt</strong> 10 tsp, <strong>Chopped garlic</strong> 20 tsp and <strong>Minced garlic</strong> 10 tsp.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Garlic powder, Granulated garlic and Garlic flakes are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Garlic cloves left as a guess.</strong> Anything typed into Garlic cloves is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Garlic cloves and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Garlic cloves</strong> is measured in clove(s). It feeds Garlic powder, Garlic flakes and Granulated garlic. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Garlic powder</strong> is a teaspoons (5 ml) figure and the page's own defaults put it at 1.25 tsp. It is worked out from Garlic cloves. </li><li><strong>Granulated garlic</strong> is a teaspoons (5 ml) figure and the page's own defaults put it at 2.5 tsp. It is worked out from Garlic cloves. </li><li><strong>Garlic flakes</strong> is a teaspoons (5 ml) figure and the page's own defaults put it at 5 tsp. It is worked out from Garlic cloves. </li><li><strong>Chopped garlic</strong> is a teaspoons (5 ml) figure and the page's own defaults put it at 10 tsp. It is worked out from Garlic cloves. </li><li><strong>Minced garlic</strong> is a teaspoons (5 ml) figure and the page's own defaults put it at 5 tsp. It is worked out from Garlic cloves. </li><li><strong>Garlic salt</strong> is a teaspoons (5 ml) figure and the page's own defaults put it at 5 tsp. It is worked out from Garlic cloves. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Garlic powder</th><th>Garlic flakes</th><th>Granulated garlic</th><th>Garlic salt</th><th>Chopped garlic</th><th>Minced garlic</th></tr></thead><tbody><tr><td><strong>Garlic cloves</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Garlic cloves: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Garlic cloves = 5 clove(s), the answer is <strong>Garlic powder</strong> = 0.625 tsp, <strong>Garlic flakes</strong> = 2.5 tsp, <strong>Granulated garlic</strong> = 1.25 tsp, <strong>Garlic salt</strong> = 2.5 tsp, <strong>Chopped garlic</strong> = 5 tsp and <strong>Minced garlic</strong> = 2.5 tsp.</li><li>With Garlic cloves = 30 clove(s), the answer is <strong>Garlic powder</strong> = 3.75 tsp, <strong>Garlic flakes</strong> = 15 tsp, <strong>Granulated garlic</strong> = 7.5 tsp, <strong>Garlic salt</strong> = 15 tsp, <strong>Chopped garlic</strong> = 30 tsp and <strong>Minced garlic</strong> = 15 tsp.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>teaspoons (5 ml)</strong> — opens in <em>tsp</em>, and the chip also carries US tbsp, ml, US cups, pinches, US fl oz and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Garlic powder is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover teaspoons (5 ml). A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Garlic cloves and the number you are missing is Garlic powder and Granulated garlic.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/perfect-pizza">Pizza baking Calculator</a>, <a href="/food/pizza-comparison">Pizza comparison</a> and <a href="/food/pizza-party">Pizza party Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Garlic calculator work out?', 'a' => 'Garlic powder, Granulated garlic, Garlic flakes and Chopped garlic, from Garlic cloves. The relationship is Garlic powder = (1 ÷ 8) × Garlic cloves.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Garlic cloves (clove(s)). Fill garlic cloves and leave Garlic powder empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Garlic powder, Garlic cloves, Garlic flakes and Granulated garlic can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'Are the Garlic converter results exact?', 'a' => 'The arithmetic follows the selected ingredient and units, but density, packing and product size can vary. Check the ingredient match and weigh it when a recipe needs precision.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Garlic powder is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Garlic cloves left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Garlic powder at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/food/fresh-to-dry-herb-conversion', 'name' => 'Fresh to dry herb conversion'],
            ['path' => '/food/oil-to-butter', 'name' => 'Oil to butter'],
            ['path' => '/food/perfect-pizza', 'name' => 'Pizza baking']
        ],
    ],
];
