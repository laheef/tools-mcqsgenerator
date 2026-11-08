<?php

/**
 * Centrifuge RCF to RPM Converter
 * /biology/centrifuge-rcf-rpm
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Centrifuge RCF to RPM Converter',
    'meta' => ['title' => 'Centrifuge RCF to RPM Converter: Steps & Units', 'description' => 'Centrifuge RCF to RPM Converter works out relative centrifugal force and speed for 10 000 × g from rotor radius and speed. Any box can be the unknown.', 'h1' => 'Centrifuge RCF to RPM Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'radius',
                            'label' => 'Rotor radius',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Measure to the bottom of the tube, not the top',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8.5',
                        ],
                        [
                            'name' => 'rpm',
                            'label' => 'Speed',
                            'type' => 'number',
                            'suffix' => 'rpm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4000',
                        ],
                        [
                            'name' => 'rcf',
                            'label' => 'Relative centrifugal force',
                            'type' => 'number',
                            'suffix' => '× g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rpm_needed',
                            'label' => 'Speed for 10 000 × g',
                            'type' => 'number',
                            'suffix' => 'rpm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_minute',
                            'label' => 'Distance travelled per minute',
                            'type' => 'number',
                            'suffix' => 'km',
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
            'title' => 'Centrifuge',
            'results' => ['rcf' => '1.118*pow(10,-5)*radius*rpm*rpm', 'rpm_needed' => 'sqrt(10000/(1.118*pow(10,-5)*radius))', 'per_minute' => '2*pi*radius/100000*rpm'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Centrifuge RCF to RPM takes Rotor radius and Speed and returns Relative centrifugal force and Speed for 10 000 × g. Nothing is looked up on this page: relative centrifugal force is computed from rotor radius and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Relative centrifugal force is opened in × g; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Centrifuge RCF to RPM calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Centrifuge RCF to RPM: it takes 2 numbers and reports Relative centrifugal force, Speed for 10 000 × g and Distance travelled per minute.</p><p>In the form&#039;s own words, Relative centrifugal force = 1.118 × (10)^(− 5) × Rotor radius × Speed × Speed.</p><p>The result panel carries Relative centrifugal force, Speed for 10 000 × g and Distance travelled per minute, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Rotor radius</strong> — in cm. Measure to the bottom of the tube, not the top</li><li><strong>Speed</strong> — in rpm</li></ul><p>The answers come back as Relative centrifugal force in × g, Speed for 10 000 × g in rpm, Distance travelled per minute in km. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Rotor radius = 8.5 cm and Speed = 4000 rpm — through the same formula and the panel reports <strong>Relative centrifugal force</strong> = 1520 × g, <strong>Speed for 10 000 × g</strong> = 10258 rpm and <strong>Distance travelled per minute</strong> = 2.14 km.</p><ul><li><strong>Relative centrifugal force</strong> = 1520 × g</li><li><strong>Speed for 10 000 × g</strong> = 10258 rpm</li><li><strong>Distance travelled per minute</strong> = 2.14 km</li></ul><p>That is <strong>Relative centrifugal force</strong> = <code>1.118 × (10)^(− 5) × Rotor radius × Speed × Speed</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Relative centrifugal force</strong> = 1520, <strong>Speed for 10 000 × g</strong> = 10258 and <strong>Distance travelled per minute</strong> = 2.14 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Relative centrifugal force takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Relative centrifugal force</strong> = <code>1.118 × (10)^(− 5) × Rotor radius × Speed × Speed</code></li><li><strong>Speed for 10 000 × g</strong> = <code>√(10000 ÷ (1.118 × (10)^(− 5) × Rotor radius))</code></li><li><strong>Distance travelled per minute</strong> = <code>2 × pi × Rotor radius ÷ 100000 × Speed</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Relative centrifugal force</strong> = <code>1.118 × (10)^(− 5) × Rotor radius × Speed × Speed</code> — the form to use when Rotor radius and Speed are the values you have.</li><li><strong>Speed for 10 000 × g</strong> = <code>√(10000 ÷ (1.118 × (10)^(− 5) × Rotor radius))</code> — the form to use when Rotor radius are the values you have.</li><li><strong>Distance travelled per minute</strong> = <code>2 × pi × Rotor radius ÷ 100000 × Speed</code> — the form to use when Rotor radius and Speed are the values you have.</li></ul><p>Any one of Relative centrifugal force, Speed for 10 000 × g and Distance travelled per minute can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Rotor radius, from 8.5 to 17 — and the answers go from <strong>Relative centrifugal force</strong> 1520 × g, <strong>Speed for 10 000 × g</strong> 10258 rpm and <strong>Distance travelled per minute</strong> 2.14 km to <strong>Relative centrifugal force</strong> 3041 × g, <strong>Speed for 10 000 × g</strong> 7254 rpm and <strong>Distance travelled per minute</strong> 4.27 km.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Rotor radius left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Rotor radius is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Speed left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Speed is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Rotor radius to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Rotor radius</strong> is measured in cm. Measure to the bottom of the tube, not the top. It feeds Relative centrifugal force, Speed for 10 000 × g and Distance travelled per minute. Have it to hand before you start: Rotor radius is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Speed</strong> is measured in rpm. It feeds Relative centrifugal force and Distance travelled per minute. Have it to hand before you start: Speed is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Relative centrifugal force</strong> is a plain number and the page's own defaults put it at 1520. It is worked out from Rotor radius and Speed. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Speed for 10 000 × g</strong> is a plain number and the page's own defaults put it at 10258. It is worked out from Rotor radius. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Distance travelled per minute</strong> is a plain number and the page's own defaults put it at 2.14. It is worked out from Rotor radius and Speed. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Relative centrifugal force</th><th>Speed for 10 000 × g</th><th>Distance travelled per minute</th></tr></thead><tbody><tr><td><strong>Rotor radius</strong> +10%</td><td>+10%</td><td>-4.65%</td><td>+10%</td></tr><tr><td><strong>Speed</strong> +10%</td><td>+21%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Speed sits at the top — a ten per cent error in that box shows up as roughly 21 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Rotor radius = 4.25 cm and Speed = 2000 rpm, the answer is <strong>Relative centrifugal force</strong> = 190 × g, <strong>Speed for 10 000 × g</strong> = 14507 rpm and <strong>Distance travelled per minute</strong> = 0.5341 km.</li><li>With Rotor radius = 25.5 cm and Speed = 4000 rpm, the answer is <strong>Relative centrifugal force</strong> = 4561 × g, <strong>Speed for 10 000 × g</strong> = 5923 rpm and <strong>Distance travelled per minute</strong> = 6.41 km.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Relative centrifugal force is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Rotor radius and Speed are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Rotor radius and Speed is what you already know and Relative centrifugal force and Speed for 10 000 × g is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-life-expectancy">Dog life expectancy Calculator</a>, <a href="/biology/dog-metacam">Dog Metacam dosage</a> and <a href="/biology/dog-onion-toxicity">Dog onion toxicity</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Centrifuge RCF to RPM is a number to act on, so the useful question is what to do with Relative centrifugal force (× g), Speed for 10 000 × g (rpm) and Distance travelled per minute (km) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Rotor radius and Speed alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Centrifuge RCF to RPM calculator work out?', 'a' => <<<'TXT'
            Relative centrifugal force, Speed for 10 000 × g and Distance travelled per minute, from Rotor radius and Speed. The relationship is Relative centrifugal force = 1.118 × (10)^(− 5) × Rotor radius × Speed × Speed.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Rotor radius (cm), Speed (rpm). Enter rotor radius and speed; Relative centrifugal force is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Relative centrifugal force, Speed for 10 000 × g and Distance travelled per minute blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Relative centrifugal force = 1520 × g, Speed for 10 000 × g = 10258 rpm and Distance travelled per minute = 2.14 km. That comes from the page's own defaults, entered in Rotor radius; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Relative centrifugal force is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Rotor radius left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Relative centrifugal force keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-life-expectancy', 'name' => 'Dog life expectancy Calculator'],
            ['path' => '/biology/dog-metacam', 'name' => 'Dog Metacam dosage'],
            ['path' => '/biology/dog-onion-toxicity', 'name' => 'Dog onion toxicity'],
        ],
        'authors' => [],
    ],
];
