<?php

/**
 * PCR Master Mix Calculator
 * /biology/pcr-master-mix-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PCR Master Mix Calculator',
    'meta' => ['title' => 'PCR Master Mix Calculator — Formula & Results', 'description' => 'PCR Master Mix Calculator reports total mix volume, master mix to add, each primer to add and water to add. The formula is printed in the form\'s own words.', 'h1' => 'PCR Master Mix Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'reactions',
                            'label' => 'Reactions',
                            'type' => 'number',
                            'help' => 'Samples plus controls',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                        [
                            'name' => 'extra',
                            'label' => 'Extra reactions',
                            'type' => 'number',
                            'help' => 'Allowance for pipetting loss',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'rxn_vol',
                            'label' => 'Volume per reaction',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'mm_stock',
                            'label' => 'Master mix stock concentration',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '2× mix is used at half the final volume',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'primer_stock',
                            'label' => 'Primer stock',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'help' => 'Each primer, from a 10 µM working stock',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'primer_final',
                            'label' => 'Primer final concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'template',
                            'label' => 'Template volume per reaction',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total mix volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mm_vol',
                            'label' => 'Master mix to add',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'primer_vol',
                            'label' => 'Each primer to add',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water_vol',
                            'label' => 'Water to add',
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
            'title' => 'Master mix',
            'results' => ['total' => '(reactions+extra)*rxn_vol', 'mm_vol' => '(reactions+extra)*rxn_vol/mm_stock', 'primer_vol' => '(reactions+extra)*rxn_vol*primer_final/primer_stock', 'water_vol' => '(reactions+extra)*rxn_vol-(reactions+extra)*rxn_vol/mm_stock-(reactions+extra)*rxn_vol*primer_final/primer_stock*2-(reactions+extra)*template'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        PCR Master Mix turns Reactions, Extra reactions and Volume per reaction into Total mix volume and Master mix to add. It is a single relationship that reads total mix volume out of reactions, not a table of canned results keyed by them. Units for Total mix volume default to µL and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the PCR Master Mix calculator works', 'html' => <<<'TXT'
            <p>The PCR Master Mix calculator applies one relationship to 7 numbers and reports Total mix volume, Master mix to add and Each primer to add.</p><p>In the form&#039;s own words, Total mix volume = (Reactions + Extra reactions) × Volume per reaction.</p><p>What comes back is Total mix volume, Master mix to add, Each primer to add and Water to add — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 7 boxes, and nothing else.</p><ul><li><strong>Reactions</strong> — a plain number, no unit. Samples plus controls</li><li><strong>Extra reactions</strong> — a plain number, no unit. Allowance for pipetting loss</li><li><strong>Volume per reaction</strong> — in µL</li><li><strong>Master mix stock concentration</strong> — in ×. 2× mix is used at half the final volume</li><li><strong>Primer stock</strong> — in µM. Each primer, from a 10 µM working stock</li><li><strong>Primer final concentration</strong> — in µM</li><li><strong>Template volume per reaction</strong> — in µL</li></ul><p>The answers come back as Total mix volume in µL, Master mix to add in µL, Each primer to add in µL, Water to add in µL. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Reactions = 24, Extra reactions = 2, Volume per reaction = 25 µL, Master mix stock concentration = 2 ×, Primer stock = 10 µM, Primer final concentration = 0.5 µM and Template volume per reaction = 1 µL — through the same formula and the panel reports <strong>Total mix volume</strong> = 650 µL, <strong>Master mix to add</strong> = 325 µL, <strong>Each primer to add</strong> = 32.5 µL and <strong>Water to add</strong> = 234 µL.</p><ul><li><strong>Total mix volume</strong> = 650 µL</li><li><strong>Master mix to add</strong> = 325 µL</li><li><strong>Each primer to add</strong> = 32.5 µL</li><li><strong>Water to add</strong> = 234 µL</li></ul><p>The line behind those figures is <strong>Total mix volume</strong> = <code>(Reactions + Extra reactions) × Volume per reaction</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Total mix volume</strong> = 650, <strong>Master mix to add</strong> = 325, <strong>Each primer to add</strong> = 32.5 and <strong>Water to add</strong> = 234 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Total mix volume takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total mix volume</strong> = <code>(Reactions + Extra reactions) × Volume per reaction</code></li><li><strong>Master mix to add</strong> = <code>(Reactions + Extra reactions) × Volume per reaction ÷ Master mix stock concentration</code></li><li><strong>Each primer to add</strong> = <code>(Reactions + Extra reactions) × Volume per reaction × Primer final concentration ÷ Primer stock</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total mix volume</strong> = <code>(Reactions + Extra reactions) × Volume per reaction</code> — the form to use when Reactions, Extra reactions and Volume per reaction are the values you have.</li><li><strong>Master mix to add</strong> = <code>(Reactions + Extra reactions) × Volume per reaction ÷ Master mix stock concentration</code> — the form to use when Reactions, Extra reactions, Volume per reaction and Master mix stock concentration are the values you have.</li><li><strong>Each primer to add</strong> = <code>(Reactions + Extra reactions) × Volume per reaction × Primer final concentration ÷ Primer stock</code> — the form to use when Reactions, Extra reactions, Volume per reaction and Primer final concentration are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total mix volume, Master mix to add and Each primer to add can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Reactions from 24 to 48, leaving every other box alone. The panel moves from <strong>Total mix volume</strong> 650 µL, <strong>Master mix to add</strong> 325 µL, <strong>Each primer to add</strong> 32.5 µL and <strong>Water to add</strong> 234 µL to <strong>Total mix volume</strong> 1250 µL, <strong>Master mix to add</strong> 625 µL, <strong>Each primer to add</strong> 62.5 µL and <strong>Water to add</strong> 450 µL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total mix volume, Master mix to add and Each primer to add are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Reactions left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Reactions is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Extra reactions left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Extra reactions is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Volume per reaction left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Volume per reaction is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Reactions to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the PCR Master Mix form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Reactions</strong> takes a plain number with no unit attached. Samples plus controls. It feeds Total mix volume, Master mix to add and Each primer to add. Fill it from a measurement rather than a memory — Reactions is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Extra reactions</strong> takes a plain number with no unit attached. Allowance for pipetting loss. It feeds Total mix volume, Master mix to add and Each primer to add. Fill it from a measurement rather than a memory — Extra reactions is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Volume per reaction</strong> is measured in µL. It feeds Total mix volume, Master mix to add and Each primer to add. Fill it from a measurement rather than a memory — Volume per reaction is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Master mix stock concentration</strong> is measured in ×. 2× mix is used at half the final volume. It feeds Master mix to add and Water to add. Fill it from a measurement rather than a memory — Master mix stock concentration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Primer stock</strong> is measured in µM. Each primer, from a 10 µM working stock. It feeds Each primer to add and Water to add. Fill it from a measurement rather than a memory — Primer stock is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Primer final concentration</strong> is measured in µM. It feeds Each primer to add and Water to add. Fill it from a measurement rather than a memory — Primer final concentration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Template volume per reaction</strong> is measured in µL. It feeds Water to add. Fill it from a measurement rather than a memory — Template volume per reaction is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total mix volume</strong> is a plain number and the page's own defaults put it at 650. It is computed from Reactions, Extra reactions and Volume per reaction, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Master mix to add</strong> is a plain number and the page's own defaults put it at 325. It is computed from Reactions, Extra reactions, Volume per reaction and Master mix stock concentration, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Each primer to add</strong> is a plain number and the page's own defaults put it at 32.5. It is computed from Reactions, Extra reactions, Volume per reaction and Primer final concentration, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Water to add</strong> is a plain number and the page's own defaults put it at 234. It is computed from Reactions, Extra reactions, Volume per reaction and Master mix stock concentration, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total mix volume</th><th>Master mix to add</th><th>Each primer to add</th><th>Water to add</th></tr></thead><tbody><tr><td><strong>Reactions</strong> +10%</td><td>+9.23%</td><td>+9.23%</td><td>+9.23%</td><td>+9.23%</td></tr><tr><td><strong>Extra reactions</strong> +10%</td><td>+0.77%</td><td>+0.77%</td><td>+0.77%</td><td>+0.77%</td></tr><tr><td><strong>Volume per reaction</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+11.11%</td></tr><tr><td><strong>Master mix stock concentration</strong> +10%</td><td>+0%</td><td>-9.09%</td><td>+0%</td><td>+12.63%</td></tr><tr><td><strong>Primer stock</strong> +10%</td><td>+0%</td><td>+0%</td><td>-9.09%</td><td>+2.53%</td></tr><tr><td><strong>Primer final concentration</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>-2.78%</td></tr><tr><td><strong>Template volume per reaction</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>-1.11%</td></tr></tbody></table><p>Ranked by leverage, Master mix stock concentration sits at the top — a ten per cent error in that box shows up as roughly 12.6 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total mix volume follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Reactions, Extra reactions and Volume per reaction is what you already know and Total mix volume and Master mix to add is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/osmolarity-osmotic-pressure">Osmolarity / Osmotic Pressure Calculator</a>, <a href="/biology/pasture-stocking-rate">Pasture Stocking Rate Calculator</a> and <a href="/biology/pcr-annealing-temperature">PCR Annealing Temperature Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the PCR Master Mix calculator work out?', 'a' => <<<'TXT'
            Total mix volume, Master mix to add, Each primer to add and Water to add, from Reactions, Extra reactions and Volume per reaction. The relationship is Total mix volume = (Reactions + Extra reactions) × Volume per reaction.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Reactions, Extra reactions, Volume per reaction (µL), Master mix stock concentration (×), Primer stock (µM). Enter reactions, extra reactions and volume per reaction; Total mix volume is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total mix volume, Master mix to add, Each primer to add and Water to add can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total mix volume = 650 µL, Master mix to add = 325 µL, Each primer to add = 32.5 µL and Water to add = 234 µL. That comes from the page's own defaults, entered in Reactions; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Total mix volume is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Reactions blank and the page solves for it, reporting Total mix volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Total mix volume keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/osmolarity-osmotic-pressure', 'name' => 'Osmolarity / Osmotic Pressure Calculator'],
            ['path' => '/biology/pasture-stocking-rate', 'name' => 'Pasture Stocking Rate Calculator'],
            ['path' => '/biology/pcr-annealing-temperature', 'name' => 'PCR Annealing Temperature Calculator'],
        ],
        'authors' => [],
    ],
];
