<?php

/**
 * Mushroom Yield Calculator
 * /biology/mushroom-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mushroom Yield Calculator',
    'meta' => ['title' => 'Mushroom Yield Calculator: Formula & Example', 'description' => 'Mushroom Yield Calculator works out biological efficiency and wet substrate weight from fresh mushrooms harvested, substrate dry weight and substrate moisture.', 'h1' => 'Mushroom Yield Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fresh',
                            'label' => 'Fresh mushrooms harvested',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '18',
                        ],
                        [
                            'name' => 'substrate',
                            'label' => 'Substrate dry weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'help' => 'Dry weight, not wet',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'moisture',
                            'label' => 'Substrate moisture',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Wet weight = dry ÷ (1 − moisture)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '65',
                        ],
                        [
                            'name' => 'blocks',
                            'label' => 'Number of blocks',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'be',
                            'label' => 'Biological efficiency',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'wet_weight',
                            'label' => 'Wet substrate weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_block',
                            'label' => 'Yield per block',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'blocks_needed',
                            'label' => 'Blocks for a 100 kg harvest',
                            'type' => 'number',
                            'suffix' => 'blocks',
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
            'title' => 'Yield',
            'results' => ['be' => 'fresh/substrate*100', 'wet_weight' => 'substrate/(1-moisture/100)', 'per_block' => 'fresh/blocks', 'blocks_needed' => '100/(fresh/blocks)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Mushroom Yield works out Biological efficiency and Wet substrate weight from Fresh mushrooms harvested, Substrate dry weight and Substrate moisture. Nothing is looked up on this page: biological efficiency is computed from fresh mushrooms harvested and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Biological efficiency is opened in %; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Mushroom Yield calculator works', 'html' => <<<'TXT'
            <p>The Mushroom Yield calculator applies one relationship to 4 numbers and reports Biological efficiency, Wet substrate weight and Yield per block.</p><p>In the form&#039;s own words, Biological efficiency = Fresh mushrooms harvested ÷ Substrate dry weight × 100.</p><p>The answers are Biological efficiency, Wet substrate weight, Yield per block and Blocks for a 100 kg harvest; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Fresh mushrooms harvested</strong> — in kg</li><li><strong>Substrate dry weight</strong> — in kg. Dry weight, not wet</li><li><strong>Substrate moisture</strong> — in %. Wet weight = dry ÷ (1 − moisture)</li><li><strong>Number of blocks</strong> — a plain number, no unit</li></ul><p>The answers come back as Biological efficiency in %, Wet substrate weight in kg, Yield per block in kg, Blocks for a 100 kg harvest in blocks. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Fresh mushrooms harvested = 18 kg, Substrate dry weight = 10 kg, Substrate moisture = 65 % and Number of blocks = 10 — through the same formula and the panel reports <strong>Biological efficiency</strong> = 180 %, <strong>Wet substrate weight</strong> = 28.57 kg, <strong>Yield per block</strong> = 1.8 kg and <strong>Blocks for a 100 kg harvest</strong> = 55.56 blocks.</p><ul><li><strong>Biological efficiency</strong> = 180 %</li><li><strong>Wet substrate weight</strong> = 28.57 kg</li><li><strong>Yield per block</strong> = 1.8 kg</li><li><strong>Blocks for a 100 kg harvest</strong> = 55.56 blocks</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Biological efficiency</strong> = <code>Fresh mushrooms harvested ÷ Substrate dry weight × 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Biological efficiency</strong> = 180, <strong>Wet substrate weight</strong> = 28.57, <strong>Yield per block</strong> = 1.8 and <strong>Blocks for a 100 kg harvest</strong> = 55.56. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Biological efficiency is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Biological efficiency</strong> = <code>Fresh mushrooms harvested ÷ Substrate dry weight × 100</code></li><li><strong>Wet substrate weight</strong> = <code>Substrate dry weight ÷ (1 − Substrate moisture ÷ 100)</code></li><li><strong>Yield per block</strong> = <code>Fresh mushrooms harvested ÷ Number of blocks</code></li><li><strong>Blocks for a 100 kg harvest</strong> = <code>100 ÷ (Fresh mushrooms harvested ÷ Number of blocks)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Biological efficiency</strong> = <code>Fresh mushrooms harvested ÷ Substrate dry weight × 100</code> — the form to use when Fresh mushrooms harvested and Substrate dry weight are the values you have.</li><li><strong>Wet substrate weight</strong> = <code>Substrate dry weight ÷ (1 − Substrate moisture ÷ 100)</code> — the form to use when Substrate dry weight and Substrate moisture are the values you have.</li><li><strong>Yield per block</strong> = <code>Fresh mushrooms harvested ÷ Number of blocks</code> — the form to use when Fresh mushrooms harvested and Number of blocks are the values you have.</li><li><strong>Blocks for a 100 kg harvest</strong> = <code>100 ÷ (Fresh mushrooms harvested ÷ Number of blocks)</code> — the form to use when Fresh mushrooms harvested and Number of blocks are the values you have.</li></ul><p>Any one of Biological efficiency, Wet substrate weight and Yield per block can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Fresh mushrooms harvested, from 18 to 36 — and the answers go from <strong>Biological efficiency</strong> 180 %, <strong>Wet substrate weight</strong> 28.57 kg, <strong>Yield per block</strong> 1.8 kg and <strong>Blocks for a 100 kg harvest</strong> 55.56 blocks to <strong>Biological efficiency</strong> 360 %, <strong>Wet substrate weight</strong> 28.57 kg, <strong>Yield per block</strong> 3.6 kg and <strong>Blocks for a 100 kg harvest</strong> 27.78 blocks.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Biological efficiency, Wet substrate weight and Yield per block are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Fresh mushrooms harvested left as a guess.</strong> Anything typed into Fresh mushrooms harvested is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Substrate dry weight left as a guess.</strong> Anything typed into Substrate dry weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Substrate moisture left as a guess.</strong> Anything typed into Substrate moisture is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Fresh mushrooms harvested to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Fresh mushrooms harvested</strong> is measured in kg. Change it and Biological efficiency, Yield per block and Blocks for a 100 kg harvest changes with it. Have it to hand before you start: Fresh mushrooms harvested is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Substrate dry weight</strong> is measured in kg. Dry weight, not wet. Change it and Biological efficiency and Wet substrate weight changes with it. Have it to hand before you start: Substrate dry weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Substrate moisture</strong> is measured in %. Wet weight = dry ÷ (1 − moisture). Change it and Wet substrate weight changes with it. Have it to hand before you start: Substrate moisture is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of blocks</strong> takes a plain number with no unit attached. Change it and Yield per block and Blocks for a 100 kg harvest changes with it. Have it to hand before you start: Number of blocks is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Biological efficiency</strong> is a plain number and the page's own defaults put it at 180. It is worked out from Fresh mushrooms harvested and Substrate dry weight. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Wet substrate weight</strong> is a plain number and the page's own defaults put it at 28.57. It is worked out from Substrate dry weight and Substrate moisture. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Yield per block</strong> is a plain number and the page's own defaults put it at 1.8. It is worked out from Fresh mushrooms harvested and Number of blocks. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Blocks for a 100 kg harvest</strong> is a plain number and the page's own defaults put it at 55.56. It is worked out from Fresh mushrooms harvested and Number of blocks. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Biological efficiency</th><th>Wet substrate weight</th><th>Yield per block</th><th>Blocks for a 100 kg harvest</th></tr></thead><tbody><tr><td><strong>Fresh mushrooms harvested</strong> +10%</td><td>+10%</td><td>+0%</td><td>+10%</td><td>-9.09%</td></tr><tr><td><strong>Substrate dry weight</strong> +10%</td><td>-9.09%</td><td>+10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Substrate moisture</strong> +10%</td><td>+0%</td><td>+22.81%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Number of blocks</strong> +10%</td><td>+0%</td><td>+0%</td><td>-9.09%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Substrate moisture: ten per cent there moves an answer by about 22.8 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Fresh mushrooms harvested = 9 kg, Substrate dry weight = 5 kg, Substrate moisture = 32.5 % and Number of blocks = 5, the answer is <strong>Biological efficiency</strong> = 180 %, <strong>Wet substrate weight</strong> = 7.41 kg, <strong>Yield per block</strong> = 1.8 kg and <strong>Blocks for a 100 kg harvest</strong> = 55.56 blocks.</li><li>With Fresh mushrooms harvested = 54 kg, Substrate dry weight = 10 kg, Substrate moisture = 65 % and Number of blocks = 10, the answer is <strong>Biological efficiency</strong> = 540 %, <strong>Wet substrate weight</strong> = 28.57 kg, <strong>Yield per block</strong> = 5.4 kg and <strong>Blocks for a 100 kg harvest</strong> = 18.52 blocks.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Biological efficiency is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Fresh mushrooms harvested, Substrate dry weight and Substrate moisture and the number you are missing is Biological efficiency and Wet substrate weight.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/mic-zone-of-inhibition">MIC and Zone of Inhibition Calculator</a>, <a href="/biology/microscope-field-of-view">Microscope Field of View Calculator</a> and <a href="/biology/microscope-magnification">Microscope Magnification Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mushroom Yield calculator work out?', 'a' => <<<'TXT'
            Biological efficiency, Wet substrate weight, Yield per block and Blocks for a 100 kg harvest, from Fresh mushrooms harvested and Substrate dry weight. The relationship is Biological efficiency = Fresh mushrooms harvested ÷ Substrate dry weight × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fresh mushrooms harvested (kg), Substrate dry weight (kg), Substrate moisture (%), Number of blocks. Enter fresh mushrooms harvested, substrate dry weight and substrate moisture; Biological efficiency is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Biological efficiency, Wet substrate weight, Yield per block and Blocks for a 100 kg harvest blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Biological efficiency = 180 %, Wet substrate weight = 28.57 kg, Yield per block = 1.8 kg and Blocks for a 100 kg harvest = 55.56 blocks. Those are the defaults written into the form — move Fresh mushrooms harvested and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Biological efficiency is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Fresh mushrooms harvested left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Biological efficiency keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/mic-zone-of-inhibition', 'name' => 'MIC and Zone of Inhibition Calculator'],
            ['path' => '/biology/microscope-field-of-view', 'name' => 'Microscope Field of View Calculator'],
            ['path' => '/biology/microscope-magnification', 'name' => 'Microscope Magnification Calculator'],
        ],
        'authors' => [],
    ],
];
