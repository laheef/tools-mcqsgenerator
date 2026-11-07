<?php

/**
 * Serial Dilution Planner
 * /biology/serial-dilution-planner
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Serial Dilution Planner',
    'meta' => ['title' => 'Serial Dilution Planner — Formula & Results', 'description' => 'Serial Dilution Planner takes starting concentration and returns transfer volume. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Serial Dilution Planner', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'stock',
                            'label' => 'Starting concentration',
                            'type' => 'number',
                            'help' => 'Any unit — mg/mL, µM, CFU/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'factor',
                            'label' => 'Dilution factor per step',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '10 for a tenfold series',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'steps',
                            'label' => 'Number of steps',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'tube_vol',
                            'label' => 'Volume in each tube',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'transfer',
                            'label' => 'Transfer volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diluent',
                            'label' => 'Diluent per tube',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'final',
                            'label' => 'Final concentration',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_diluent',
                            'label' => 'Diluent needed in total',
                            'type' => 'number',
                            'suffix' => 'µL',
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
            'title' => 'Series',
            'results' => ['transfer' => 'tube_vol/factor', 'diluent' => 'tube_vol-tube_vol/factor', 'final' => 'stock/pow(factor,steps)', 'total_diluent' => '(tube_vol-tube_vol/factor)*steps'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Serial Dilution Planner turns Starting concentration, Dilution factor per step and Number of steps into Transfer volume and Diluent per tube. There is no hidden constant here: change transfer volume and starting concentration moves with it. The main result, Transfer volume, is reported in µL.
        TXT,
        'sections' => [
            ['title' => 'How the Serial Dilution Planner calculator works', 'html' => <<<'TXT'
            <p>Serial Dilution Planner answers one question from 4 numbers, and the answer is Transfer volume, Diluent per tube and Final concentration.</p><p>The relationship it solves reads Transfer volume = Volume in each tube ÷ Dilution factor per step.</p><p>What comes back is Transfer volume, Diluent per tube, Final concentration and Diluent needed in total — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Starting concentration</strong> — a plain number, no unit. Any unit — mg/mL, µM, CFU/mL</li><li><strong>Dilution factor per step</strong> — in ×. 10 for a tenfold series</li><li><strong>Number of steps</strong> — a plain number, no unit</li><li><strong>Volume in each tube</strong> — in µL</li></ul><p>The result boxes are Transfer volume in µL, Diluent per tube in µL, Final concentration, Diluent needed in total in µL; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Starting concentration = 1000, Dilution factor per step = 10 ×, Number of steps = 6 and Volume in each tube = 1000 µL; the answers are <strong>Transfer volume</strong> = 100 µL, <strong>Diluent per tube</strong> = 900 µL, <strong>Final concentration</strong> = 0.001 and <strong>Diluent needed in total</strong> = 5400 µL.</p><ul><li><strong>Transfer volume</strong> = 100 µL</li><li><strong>Diluent per tube</strong> = 900 µL</li><li><strong>Final concentration</strong> = 0.001</li><li><strong>Diluent needed in total</strong> = 5400 µL</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Transfer volume</strong> = <code>Volume in each tube ÷ Dilution factor per step</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Transfer volume</strong> = 100, <strong>Diluent per tube</strong> = 900, <strong>Final concentration</strong> = 0.001 and <strong>Diluent needed in total</strong> = 5400 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Transfer volume takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Transfer volume</strong> = <code>Volume in each tube ÷ Dilution factor per step</code></li><li><strong>Diluent per tube</strong> = <code>Volume in each tube − Volume in each tube ÷ Dilution factor per step</code></li><li><strong>Final concentration</strong> = <code>Starting concentration ÷ (Dilution factor per step)^(Number of steps)</code></li><li><strong>Diluent needed in total</strong> = <code>(Volume in each tube − Volume in each tube ÷ Dilution factor per step) × Number of steps</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Transfer volume</strong> = <code>Volume in each tube ÷ Dilution factor per step</code> — the form to use when Volume in each tube and Dilution factor per step are the values you have.</li><li><strong>Diluent per tube</strong> = <code>Volume in each tube − Volume in each tube ÷ Dilution factor per step</code> — the form to use when Volume in each tube and Dilution factor per step are the values you have.</li><li><strong>Final concentration</strong> = <code>Starting concentration ÷ (Dilution factor per step)^(Number of steps)</code> — the form to use when Starting concentration, Dilution factor per step and Number of steps are the values you have.</li><li><strong>Diluent needed in total</strong> = <code>(Volume in each tube − Volume in each tube ÷ Dilution factor per step) × Number of steps</code> — the form to use when Volume in each tube, Dilution factor per step and Number of steps are the values you have.</li></ul><p>Any one of Transfer volume, Diluent per tube and Final concentration can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Starting concentration from 1000 to 2000, leaving every other box alone. The panel moves from <strong>Transfer volume</strong> 100 µL, <strong>Diluent per tube</strong> 900 µL, <strong>Final concentration</strong> 0.001 and <strong>Diluent needed in total</strong> 5400 µL to <strong>Transfer volume</strong> 100 µL, <strong>Diluent per tube</strong> 900 µL, <strong>Final concentration</strong> 0.002 and <strong>Diluent needed in total</strong> 5400 µL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Transfer volume, Diluent per tube and Final concentration are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Starting concentration left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Starting concentration is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Dilution factor per step left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dilution factor per step is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of steps left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of steps is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Starting concentration to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Serial Dilution Planner form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Starting concentration</strong> takes a plain number with no unit attached. Any unit — mg/mL, µM, CFU/mL. It feeds Final concentration. Fill it from a measurement rather than a memory — Starting concentration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Dilution factor per step</strong> is measured in ×. 10 for a tenfold series. It feeds Transfer volume, Diluent per tube and Final concentration. Fill it from a measurement rather than a memory — Dilution factor per step is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of steps</strong> takes a plain number with no unit attached. It feeds Final concentration and Diluent needed in total. Fill it from a measurement rather than a memory — Number of steps is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Volume in each tube</strong> is measured in µL. It feeds Transfer volume, Diluent per tube and Diluent needed in total. Fill it from a measurement rather than a memory — Volume in each tube is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Transfer volume</strong> is a plain number and the page's own defaults put it at 100. It is computed from Volume in each tube and Dilution factor per step, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Diluent per tube</strong> is a plain number and the page's own defaults put it at 900. It is computed from Volume in each tube and Dilution factor per step, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Final concentration</strong> is a plain number and the page's own defaults put it at 0.001. It is computed from Starting concentration, Dilution factor per step and Number of steps, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Diluent needed in total</strong> is a plain number and the page's own defaults put it at 5400. It is computed from Volume in each tube, Dilution factor per step and Number of steps, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Transfer volume</th><th>Diluent per tube</th><th>Final concentration</th><th>Diluent needed in total</th></tr></thead><tbody><tr><td><strong>Starting concentration</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Dilution factor per step</strong> +10%</td><td>-9.09%</td><td>+1.01%</td><td>-43.55%</td><td>+1.01%</td></tr><tr><td><strong>Number of steps</strong> +10%</td><td>+0%</td><td>+0%</td><td>-74.88%</td><td>+10%</td></tr><tr><td><strong>Volume in each tube</strong> +10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Number of steps sits at the top — a ten per cent error in that box shows up as roughly 74.9 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Starting concentration = 500, Dilution factor per step = 5 ×, Number of steps = 3 and Volume in each tube = 500 µL and the page reports <strong>Transfer volume</strong> = 100 µL, <strong>Diluent per tube</strong> = 400 µL, <strong>Final concentration</strong> = 4 and <strong>Diluent needed in total</strong> = 1200 µL.</li><li>Feed in Starting concentration = 3000, Dilution factor per step = 10 ×, Number of steps = 6 and Volume in each tube = 1000 µL and the page reports <strong>Transfer volume</strong> = 100 µL, <strong>Diluent per tube</strong> = 900 µL, <strong>Final concentration</strong> = 0.003 and <strong>Diluent needed in total</strong> = 5400 µL.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Transfer volume is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Starting concentration, Dilution factor per step and Number of steps measured, Transfer volume and Diluent per tube wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-coat-color">Dog Coat Colour Calculator</a>, <a href="/biology/dog-crate-size">Dog crate size</a> and <a href="/biology/dog-food">Dog food Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Serial Dilution Planner calculator work out?', 'a' => <<<'TXT'
            Transfer volume, Diluent per tube, Final concentration and Diluent needed in total, from Volume in each tube and Dilution factor per step. The relationship is Transfer volume = Volume in each tube ÷ Dilution factor per step.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Starting concentration, Dilution factor per step (×), Number of steps, Volume in each tube (µL). With starting concentration, dilution factor per step and number of steps in place, Transfer volume can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Transfer volume, Diluent per tube, Final concentration and Diluent needed in total blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Transfer volume = 100 µL, Diluent per tube = 900 µL, Final concentration = 0.001 and Diluent needed in total = 5400 µL. That comes from the page's own defaults, entered in Starting concentration; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Transfer volume is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Starting concentration blank and the page solves for it, reporting Transfer volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Transfer volume keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-coat-color', 'name' => 'Dog Coat Colour Calculator'],
            ['path' => '/biology/dog-crate-size', 'name' => 'Dog crate size'],
            ['path' => '/biology/dog-food', 'name' => 'Dog food Calculator'],
        ],
        'authors' => [],
    ],
];
