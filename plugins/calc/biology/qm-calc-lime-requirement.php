<?php

/**
 * Lime Requirement Calculator
 * /biology/lime-requirement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lime Requirement Calculator',
    'meta' => ['title' => 'Lime Requirement Calculator: Units & Formula', 'description' => 'Lime requirement turns the gap between current and target soil pH, together with soil texture, into lime per hectare and the pure calcium carbonate equivalent.', 'h1' => 'Lime Requirement Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'ph_now',
                            'label' => 'Current pH',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5.4',
                        ],
                        [
                            'name' => 'ph_target',
                            'label' => 'Target pH',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6.5',
                        ],
                        [
                            'name' => 'texture',
                            'label' => 'Soil texture',
                            'type' => 'select',
                            'options' => [
                                'Sand' => '1',
                                'Sandy loam' => '0.6',
                                'Loam' => '0.4',
                                'Clay loam' => '0.25',
                                'Clay' => '0.18',
                            ],
                            'control' => 'SELECT',
                            'default' => 'Loam',
                        ],
                        [
                            'name' => 'buffer',
                            'label' => 'Buffer index',
                            'type' => 'number',
                            'help' => 'From a lime requirement test; lower means more lime',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6.4',
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Lime required',
                            'type' => 'number',
                            'suffix' => 't/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pure_caco3',
                            'label' => 'As pure CaCO₃ equivalent',
                            'type' => 'number',
                            'suffix' => 't/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'splits',
                            'label' => 'Application splits recommended',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ph_gain',
                            'label' => 'pH increase per tonne',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Lime',
            'results' => ['rate' => '(ph_target-ph_now)*buffer*texture', 'pure_caco3' => '(ph_target-ph_now)*buffer*texture*0.9', 'splits' => 'max(1,ceil((ph_target-ph_now)*buffer*texture/2))', 'ph_gain' => '(ph_target-ph_now)/((ph_target-ph_now)*buffer*texture)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Lime Requirement turns Current pH, Target pH and Soil texture into Lime required and As pure CaCO₃ equivalent. There is no hidden constant here: change lime required and current pH moves with it. The main result, Lime required, is reported in t/ha.
        TXT,
        'sections' => [
            ['title' => 'How the Lime Requirement calculator works', 'html' => <<<'TXT'
            <p>The Lime Requirement calculator applies one relationship to 4 numbers and reports Lime required, As pure CaCO₃ equivalent and Application splits recommended.</p><p>Written with the labels from the form, Lime required = (Target pH − Current pH) × Buffer index × Soil texture.</p><p>The result panel carries Lime required, As pure CaCO₃ equivalent, Application splits recommended and pH increase per tonne, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Current pH</strong> — a plain number, no unit</li><li><strong>Target pH</strong> — a plain number, no unit</li><li><strong>Soil texture</strong> — a plain number, no unit</li><li><strong>Buffer index</strong> — a plain number, no unit. From a lime requirement test; lower means more lime</li></ul><p>The answers come back as Lime required in t/ha, As pure CaCO₃ equivalent in t/ha, Application splits recommended, pH increase per tonne. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Current pH = 5.4, Target pH = 6.5, Soil texture = 0.4 and Buffer index = 6.4 — through the same formula and the panel reports <strong>Lime required</strong> = 2.82 t/ha, <strong>As pure CaCO₃ equivalent</strong> = 2.53 t/ha, <strong>Application splits recommended</strong> = 2 and <strong>pH increase per tonne</strong> = 0.3906.</p><ul><li><strong>Lime required</strong> = 2.82 t/ha</li><li><strong>As pure CaCO₃ equivalent</strong> = 2.53 t/ha</li><li><strong>Application splits recommended</strong> = 2</li><li><strong>pH increase per tonne</strong> = 0.3906</li></ul><p>That is <strong>Lime required</strong> = <code>(Target pH − Current pH) × Buffer index × Soil texture</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Lime required</strong> = 2.82, <strong>As pure CaCO₃ equivalent</strong> = 2.53, <strong>Application splits recommended</strong> = 2 and <strong>pH increase per tonne</strong> = 0.3906 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Lime required takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Lime required</strong> = <code>(Target pH − Current pH) × Buffer index × Soil texture</code></li><li><strong>As pure CaCO₃ equivalent</strong> = <code>(Target pH − Current pH) × Buffer index × Soil texture × 0.9</code></li><li><strong>Application splits recommended</strong> = <code>max(1,ceil((Target pH − Current pH) × Buffer index × Soil texture ÷ 2))</code></li><li><strong>pH increase per tonne</strong> = <code>(Target pH − Current pH) ÷ ((Target pH − Current pH) × Buffer index × Soil texture)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Lime required</strong> = <code>(Target pH − Current pH) × Buffer index × Soil texture</code> — the form to use when Target pH, Current pH, Buffer index and Soil texture are the values you have.</li><li><strong>As pure CaCO₃ equivalent</strong> = <code>(Target pH − Current pH) × Buffer index × Soil texture × 0.9</code> — the form to use when Target pH, Current pH, Buffer index and Soil texture are the values you have.</li><li><strong>Application splits recommended</strong> = <code>max(1,ceil((Target pH − Current pH) × Buffer index × Soil texture ÷ 2))</code> — the form to use when Target pH, Current pH, Buffer index and Soil texture are the values you have.</li><li><strong>pH increase per tonne</strong> = <code>(Target pH − Current pH) ÷ ((Target pH − Current pH) × Buffer index × Soil texture)</code> — the form to use when Target pH, Current pH, Buffer index and Soil texture are the values you have.</li></ul><p>Any one of Lime required, As pure CaCO₃ equivalent and Application splits recommended can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Current pH from 5.4 to 10.8, leaving every other box alone. The panel moves from <strong>Lime required</strong> 2.82 t/ha, <strong>As pure CaCO₃ equivalent</strong> 2.53 t/ha, <strong>Application splits recommended</strong> 2 and <strong>pH increase per tonne</strong> 0.3906 to <strong>Lime required</strong> -11.01 t/ha, <strong>As pure CaCO₃ equivalent</strong> -9.91 t/ha, <strong>Application splits recommended</strong> 1 and <strong>pH increase per tonne</strong> 0.3906.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Lime required, As pure CaCO₃ equivalent and Application splits recommended are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Current pH left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Current pH is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Target pH left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Target pH is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Soil texture left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Soil texture is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Current pH and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Current pH</strong> takes a plain number with no unit attached. Change it and Lime required, As pure CaCO₃ equivalent and Application splits recommended changes with it. Have it to hand before you start: Current pH is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Target pH</strong> takes a plain number with no unit attached. Change it and Lime required, As pure CaCO₃ equivalent and Application splits recommended changes with it. Have it to hand before you start: Target pH is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Soil texture</strong> takes a plain number with no unit attached. Change it and Lime required, As pure CaCO₃ equivalent and Application splits recommended changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Soil texture is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Buffer index</strong> takes a plain number with no unit attached. From a lime requirement test; lower means more lime. Change it and Lime required, As pure CaCO₃ equivalent and Application splits recommended changes with it. Have it to hand before you start: Buffer index is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Lime required</strong> is a plain number and the page's own defaults put it at 2.82. The value follows from Target pH, Current pH, Buffer index and Soil texture. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>As pure CaCO₃ equivalent</strong> is a plain number and the page's own defaults put it at 2.53. The value follows from Target pH, Current pH, Buffer index and Soil texture. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Application splits recommended</strong> is a plain number and the page's own defaults put it at 2. The value follows from Target pH, Current pH, Buffer index and Soil texture. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>pH increase per tonne</strong> is a plain number and the page's own defaults put it at 0.3906. The value follows from Target pH, Current pH, Buffer index and Soil texture. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Lime required</th><th>As pure CaCO₃ equivalent</th><th>Application splits recommended</th><th>pH increase per tonne</th></tr></thead><tbody><tr><td><strong>Current pH</strong> +10%</td><td>-49.09%</td><td>-49.09%</td><td>-50%</td><td>+0%</td></tr><tr><td><strong>Target pH</strong> +10%</td><td>+59.09%</td><td>+59.09%</td><td>+50%</td><td>+0%</td></tr><tr><td><strong>Soil texture</strong> +10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>-9.09%</td></tr><tr><td><strong>Buffer index</strong> +10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Target pH sits at the top — a ten per cent error in that box shows up as roughly 59.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Current pH = 2.7, Target pH = 3.25, Soil texture = 0.2 and Buffer index = 3.2, the answer is <strong>Lime required</strong> = 0.352 t/ha, <strong>As pure CaCO₃ equivalent</strong> = 0.3168 t/ha, <strong>Application splits recommended</strong> = 1 and <strong>pH increase per tonne</strong> = 1.56.</li><li>With Current pH = 16.2, Target pH = 6.5, Soil texture = 0.4 and Buffer index = 6.4, the answer is <strong>Lime required</strong> = -24.83 t/ha, <strong>As pure CaCO₃ equivalent</strong> = -22.35 t/ha, <strong>Application splits recommended</strong> = 1 and <strong>pH increase per tonne</strong> = 0.3906.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Lime required follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current pH, Target pH and Soil texture measured, Lime required and As pure CaCO₃ equivalent wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/specimen-size-from-image">Actual Specimen Size from Image Calculator</a>, <a href="/biology/agarose-gel-calculator">Agarose Gel (gel percentage and loading) Calculator</a> and <a href="/biology/alamarblue-cell-viability">AlamarBlue Cell Viability / Percent Reduction Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lime Requirement calculator work out?', 'a' => <<<'TXT'
            Lime required, As pure CaCO₃ equivalent, Application splits recommended and pH increase per tonne, from Target pH, Current pH, Buffer index and Soil texture. The relationship is Lime required = (Target pH − Current pH) × Buffer index × Soil texture.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current pH, Target pH, Soil texture, Buffer index. Enter current pH, target pH and soil texture; Lime required is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Lime required, As pure CaCO₃ equivalent, Application splits recommended and pH increase per tonne blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Lime required = 2.82 t/ha, As pure CaCO₃ equivalent = 2.53 t/ha, Application splits recommended = 2 and pH increase per tonne = 0.3906. That comes from the page's own defaults, entered in Current pH; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Lime required is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Current pH left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Lime required at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/specimen-size-from-image', 'name' => 'Actual Specimen Size from Image Calculator'],
            ['path' => '/biology/agarose-gel-calculator', 'name' => 'Agarose Gel (gel percentage and loading) Calculator'],
            ['path' => '/biology/alamarblue-cell-viability', 'name' => 'AlamarBlue Cell Viability / Percent Reduction Calculator'],
        ],
        'authors' => [],
    ],
];
