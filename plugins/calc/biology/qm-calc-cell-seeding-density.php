<?php

/**
 * Cell Seeding Density Calculator
 * /biology/cell-seeding-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell Seeding Density Calculator',
    'meta' => ['title' => 'Cell Seeding Density Calculator: Units & Formula', 'description' => 'Cell Seeding Density Calculator turns stock concentration, target density and growth area per vessel into cells per vessel and suspension to pipette per vessel.', 'h1' => 'Cell Seeding Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'conc',
                            'label' => 'Stock concentration',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
                            'help' => 'From your count',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1500000',
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Target density',
                            'type' => 'number',
                            'suffix' => 'cells/cm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20000',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Growth area per vessel',
                            'type' => 'number',
                            'suffix' => 'cm²',
                            'help' => 'T25 = 25, T75 = 75, 6-well = 9.6',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'vessels',
                            'label' => 'Number of vessels',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'medium',
                            'label' => 'Final volume per vessel',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'per_vessel',
                            'label' => 'Cells per vessel',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Suspension to pipette per vessel',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_cells',
                            'label' => 'Cells needed in total',
                            'type' => 'number',
                            'suffix' => 'cells',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'medium_add',
                            'label' => 'Medium to add per vessel',
                            'type' => 'number',
                            'suffix' => 'mL',
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
            'title' => 'Seeding',
            'results' => ['per_vessel' => 'target*area', 'volume' => 'target*area/conc', 'total_cells' => 'target*area*vessels', 'medium_add' => 'medium-target*area/conc'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Stock concentration, Target density and Growth area per vessel into Cell Seeding Density and the answer comes back as Cells per vessel and Suspension to pipette per vessel. There is no hidden constant here: change cells per vessel and stock concentration moves with it. The main result, Cells per vessel, is reported in cells.
        TXT,
        'sections' => [
            ['title' => 'How the Cell Seeding Density calculator works', 'html' => <<<'TXT'
            <p>Cell Seeding Density answers one question from 5 numbers, and the answer is Cells per vessel, Suspension to pipette per vessel and Cells needed in total.</p><p>The relationship it solves reads Cells per vessel = Target density × Growth area per vessel.</p><p>What comes back is Cells per vessel, Suspension to pipette per vessel, Cells needed in total and Medium to add per vessel — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Stock concentration</strong> — in cells/mL. From your count</li><li><strong>Target density</strong> — in cells/cm²</li><li><strong>Growth area per vessel</strong> — in cm². T25 = 25, T75 = 75, 6-well = 9.6</li><li><strong>Number of vessels</strong> — a plain number, no unit</li><li><strong>Final volume per vessel</strong> — in mL</li></ul><p>The answers come back as Cells per vessel in cells, Suspension to pipette per vessel in mL, Cells needed in total in cells, Medium to add per vessel in mL. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Stock concentration = 1.500e+6 cells/mL, Target density = 20000 cells/cm², Growth area per vessel = 25 cm², Number of vessels = 1 and Final volume per vessel = 5 mL — through the same formula and the panel reports <strong>Cells per vessel</strong> = 500000 cells, <strong>Suspension to pipette per vessel</strong> = 0.3333 mL, <strong>Cells needed in total</strong> = 500000 cells and <strong>Medium to add per vessel</strong> = 4.67 mL.</p><ul><li><strong>Cells per vessel</strong> = 500000 cells</li><li><strong>Suspension to pipette per vessel</strong> = 0.3333 mL</li><li><strong>Cells needed in total</strong> = 500000 cells</li><li><strong>Medium to add per vessel</strong> = 4.67 mL</li></ul><p>The line behind those figures is <strong>Cells per vessel</strong> = <code>Target density × Growth area per vessel</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Cells per vessel</strong> = 500000, <strong>Suspension to pipette per vessel</strong> = 0.3333, <strong>Cells needed in total</strong> = 500000 and <strong>Medium to add per vessel</strong> = 4.67. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Cells per vessel is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cells per vessel</strong> = <code>Target density × Growth area per vessel</code></li><li><strong>Suspension to pipette per vessel</strong> = <code>Target density × Growth area per vessel ÷ Stock concentration</code></li><li><strong>Cells needed in total</strong> = <code>Target density × Growth area per vessel × Number of vessels</code></li><li><strong>Medium to add per vessel</strong> = <code>Final volume per vessel − Target density × Growth area per vessel ÷ Stock concentration</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cells per vessel</strong> = <code>Target density × Growth area per vessel</code> — the form to use when Target density and Growth area per vessel are the values you have.</li><li><strong>Suspension to pipette per vessel</strong> = <code>Target density × Growth area per vessel ÷ Stock concentration</code> — the form to use when Target density, Growth area per vessel and Stock concentration are the values you have.</li><li><strong>Cells needed in total</strong> = <code>Target density × Growth area per vessel × Number of vessels</code> — the form to use when Target density, Growth area per vessel and Number of vessels are the values you have.</li><li><strong>Medium to add per vessel</strong> = <code>Final volume per vessel − Target density × Growth area per vessel ÷ Stock concentration</code> — the form to use when Final volume per vessel, Target density, Growth area per vessel and Stock concentration are the values you have.</li></ul><p>Any one of Cells per vessel, Suspension to pipette per vessel and Cells needed in total can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Stock concentration from 1.500e+6 to 3.000e+6, leaving every other box alone. The panel moves from <strong>Cells per vessel</strong> 500000 cells, <strong>Suspension to pipette per vessel</strong> 0.3333 mL, <strong>Cells needed in total</strong> 500000 cells and <strong>Medium to add per vessel</strong> 4.67 mL to <strong>Cells per vessel</strong> 500000 cells, <strong>Suspension to pipette per vessel</strong> 0.1667 mL, <strong>Cells needed in total</strong> 500000 cells and <strong>Medium to add per vessel</strong> 4.83 mL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cells per vessel, Suspension to pipette per vessel and Cells needed in total are results: they are worked out from the boxes above and cannot be typed into, so a past answer has to be entered as one of the inputs instead.</li><li><strong>Stock concentration left as a guess.</strong> Anything typed into Stock concentration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Target density left as a guess.</strong> Anything typed into Target density is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Growth area per vessel left as a guess.</strong> Anything typed into Growth area per vessel is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Stock concentration and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Stock concentration</strong> is measured in cells/mL. From your count. The page reads it when it works out Suspension to pipette per vessel and Medium to add per vessel. Have it to hand before you start: Stock concentration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Target density</strong> is measured in cells/cm². The page reads it when it works out Cells per vessel, Suspension to pipette per vessel and Cells needed in total. Have it to hand before you start: Target density is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Growth area per vessel</strong> is measured in cm². T25 = 25, T75 = 75, 6-well = 9.6. The page reads it when it works out Cells per vessel, Suspension to pipette per vessel and Cells needed in total. Have it to hand before you start: Growth area per vessel is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of vessels</strong> takes a plain number with no unit attached. The page reads it when it works out Cells needed in total. Have it to hand before you start: Number of vessels is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final volume per vessel</strong> is measured in mL. The page reads it when it works out Medium to add per vessel. Have it to hand before you start: Final volume per vessel is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Cells per vessel</strong> is a plain number and the page's own defaults put it at 500000. It is computed from Target density and Growth area per vessel, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Suspension to pipette per vessel</strong> is a plain number and the page's own defaults put it at 0.3333. It is computed from Target density, Growth area per vessel and Stock concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Cells needed in total</strong> is a plain number and the page's own defaults put it at 500000. It is computed from Target density, Growth area per vessel and Number of vessels, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Medium to add per vessel</strong> is a plain number and the page's own defaults put it at 4.67. It is computed from Final volume per vessel, Target density, Growth area per vessel and Stock concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cells per vessel</th><th>Suspension to pipette per vessel</th><th>Cells needed in total</th><th>Medium to add per vessel</th></tr></thead><tbody><tr><td><strong>Stock concentration</strong> +10%</td><td>+0%</td><td>-9.09%</td><td>+0%</td><td>+0.65%</td></tr><tr><td><strong>Target density</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>-0.71%</td></tr><tr><td><strong>Growth area per vessel</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>-0.71%</td></tr><tr><td><strong>Number of vessels</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Final volume per vessel</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+10.71%</td></tr></tbody></table><p>The steepest column belongs to Final volume per vessel: ten per cent there moves an answer by about 10.7 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Cells per vessel is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Stock concentration, Target density and Growth area per vessel is what you already know and Cells per vessel and Suspension to pipette per vessel is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/raw-dog-food">Raw dog food Calculator</a>, <a href="/biology/recombination-frequency">Recombination Frequency Calculator</a> and <a href="/biology/genetic-linkage-distance">Recombination to cM — Haldane &amp; Kosambi</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell Seeding Density calculator work out?', 'a' => <<<'TXT'
            Cells per vessel, Suspension to pipette per vessel, Cells needed in total and Medium to add per vessel, from Target density and Growth area per vessel. The relationship is Cells per vessel = Target density × Growth area per vessel.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Stock concentration (cells/mL), Target density (cells/cm²), Growth area per vessel (cm²), Number of vessels, Final volume per vessel (mL). Enter stock concentration, target density and growth area per vessel; Cells per vessel is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Cells per vessel, Suspension to pipette per vessel, Cells needed in total and Medium to add per vessel blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Cells per vessel = 500000 cells, Suspension to pipette per vessel = 0.3333 mL, Cells needed in total = 500000 cells and Medium to add per vessel = 4.67 mL. That comes from the page's own defaults, entered in Stock concentration; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Cells per vessel is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Stock concentration left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Cells per vessel keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/raw-dog-food', 'name' => 'Raw dog food Calculator'],
            ['path' => '/biology/recombination-frequency', 'name' => 'Recombination Frequency Calculator'],
            ['path' => '/biology/genetic-linkage-distance', 'name' => 'Recombination to cM — Haldane & Kosambi'],
        ],
        'authors' => [],
    ],
];
