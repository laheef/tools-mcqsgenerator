<?php

/**
 * Stomatal Density Calculator
 * /biology/stomatal-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stomatal Density Calculator',
    'meta' => ['title' => 'Stomatal Density Calculator — Formula & Results', 'description' => 'Stomatal Density Calculator works out area sampled and pore index and reports both. No sign-up: type the numbers, press Calculate and read the answer.', 'h1' => 'Stomatal Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'stomata',
                            'label' => 'Stomata counted',
                            'type' => 'number',
                            'suffix' => 'stomata',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '46',
                        ],
                        [
                            'name' => 'fields',
                            'label' => 'Fields counted',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'diameter',
                            'label' => 'Field of view diameter',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'From the microscope magnification',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.2',
                        ],
                        [
                            'name' => 'spi',
                            'label' => 'Stomatal pore index (optional)',
                            'type' => 'number',
                            'suffix' => 'mm²',
                            'help' => 'Mean pore area × density',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.0021',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Stomatal density',
                            'type' => 'number',
                            'suffix' => 'per mm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_cm2',
                            'label' => 'Stomatal density',
                            'type' => 'number',
                            'suffix' => 'per cm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Area sampled',
                            'type' => 'number',
                            'suffix' => 'mm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Pore index',
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
            'title' => 'Density',
            'results' => ['area' => 'fields*3.14159265358979*pow(diameter/2,2)', 'density' => 'stomata/(fields*3.14159265358979*pow(diameter/2,2))', 'per_cm2' => 'stomata/(fields*3.14159265358979*pow(diameter/2,2))*100', 'index' => 'stomata/(fields*3.14159265358979*pow(diameter/2,2))*spi'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Stomatal Density works out Stomatal density and Stomatal density from Stomata counted, Fields counted and Field of view diameter. Nothing is looked up on this page: stomatal density is computed from stomata counted and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Stomatal density is opened in per mm²; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Stomatal Density calculator works', 'html' => <<<'TXT'
            <p>Stomatal Density answers one question from 4 numbers, and the answer is Stomatal density, Stomatal density and Area sampled.</p><p>Written with the labels from the form, Area sampled = Fields counted × 3.142 × (Field of view diameter ÷ 2)^(2).</p><p>The result panel carries Stomatal density, Stomatal density, Area sampled and Pore index, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Stomata counted</strong> — in stomata</li><li><strong>Fields counted</strong> — a plain number, no unit</li><li><strong>Field of view diameter</strong> — in mm. From the microscope magnification</li><li><strong>Stomatal pore index (optional)</strong> — in mm². Mean pore area × density</li></ul><p>The answers come back as Stomatal density in per mm², Stomatal density in per cm², Area sampled in mm², Pore index. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Stomata counted = 46 stomata, Fields counted = 5, Field of view diameter = 2.2 mm and Stomatal pore index (optional) = 0.002 mm²; the answers are <strong>Area sampled</strong> = 19.01 mm², <strong>Stomatal density</strong> = 2.42 per mm², <strong>Stomatal density</strong> = 242 per cm² and <strong>Pore index</strong> = 0.005.</p><ul><li><strong>Area sampled</strong> = 19.01 mm²</li><li><strong>Stomatal density</strong> = 2.42 per mm²</li><li><strong>Stomatal density</strong> = 242 per cm²</li><li><strong>Pore index</strong> = 0.005</li></ul><p>That is <strong>Area sampled</strong> = <code>Fields counted × 3.142 × (Field of view diameter ÷ 2)^(2)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Area sampled</strong> = 19.01, <strong>Stomatal density</strong> = 2.42, <strong>Stomatal density</strong> = 242 and <strong>Pore index</strong> = 0.005. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Stomatal density is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Area sampled</strong> = <code>Fields counted × 3.142 × (Field of view diameter ÷ 2)^(2)</code></li><li><strong>Stomatal density</strong> = <code>Stomata counted ÷ (Fields counted × 3.142 × (Field of view diameter ÷ 2)^(2))</code></li><li><strong>Pore index</strong> = <code>Stomata counted ÷ (Fields counted × 3.142 × (Field of view diameter ÷ 2)^(2)) × Stomatal pore index (optional)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Area sampled</strong> = <code>Fields counted × 3.142 × (Field of view diameter ÷ 2)^(2)</code> — the form to use when Fields counted and Field of view diameter are the values you have.</li><li><strong>Stomatal density</strong> = <code>Stomata counted ÷ (Fields counted × 3.142 × (Field of view diameter ÷ 2)^(2))</code> — the form to use when Stomata counted, Fields counted and Field of view diameter are the values you have.</li><li><strong>Stomatal density</strong> = <code>Stomata counted ÷ (Fields counted × 3.142 × (Field of view diameter ÷ 2)^(2)) × 100</code> — the form to use when Stomata counted, Fields counted and Field of view diameter are the values you have.</li><li><strong>Pore index</strong> = <code>Stomata counted ÷ (Fields counted × 3.142 × (Field of view diameter ÷ 2)^(2)) × Stomatal pore index (optional)</code> — the form to use when Stomata counted, Fields counted, Field of view diameter and Stomatal pore index (optional) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Area sampled, Stomatal density and Stomatal density can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Stomata counted, from 46 to 92 — and the answers go from <strong>Area sampled</strong> 19.01 mm², <strong>Stomatal density</strong> 2.42 per mm², <strong>Stomatal density</strong> 242 per cm² and <strong>Pore index</strong> 0.005 to <strong>Area sampled</strong> 19.01 mm², <strong>Stomatal density</strong> 4.84 per mm², <strong>Stomatal density</strong> 484 per cm² and <strong>Pore index</strong> 0.01.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Stomatal density, Stomatal density and Area sampled are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Stomata counted left as a guess.</strong> Anything typed into Stomata counted is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Fields counted left as a guess.</strong> Anything typed into Fields counted is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Field of view diameter left as a guess.</strong> Anything typed into Field of view diameter is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Stomata counted is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Stomatal Density form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Stomata counted</strong> is measured in stomata. Change it and Stomatal density, Stomatal density and Pore index changes with it. Fill it from a measurement rather than a memory — Stomata counted is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Fields counted</strong> takes a plain number with no unit attached. Change it and Area sampled, Stomatal density and Stomatal density changes with it. Fill it from a measurement rather than a memory — Fields counted is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Field of view diameter</strong> is measured in mm. From the microscope magnification. Change it and Area sampled, Stomatal density and Stomatal density changes with it. Fill it from a measurement rather than a memory — Field of view diameter is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Stomatal pore index (optional)</strong> is measured in mm². Mean pore area × density. Change it and Pore index changes with it. Fill it from a measurement rather than a memory — Stomatal pore index (optional) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Stomatal density</strong> is a plain number and the page's own defaults put it at 2.42. The value follows from Stomata counted, Fields counted and Field of view diameter. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Stomatal density</strong> is a plain number and the page's own defaults put it at 242. The value follows from Stomata counted, Fields counted and Field of view diameter. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Area sampled</strong> is a plain number and the page's own defaults put it at 19.01. The value follows from Fields counted and Field of view diameter. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Pore index</strong> is a plain number and the page's own defaults put it at 0.005. The value follows from Stomata counted, Fields counted, Field of view diameter and Stomatal pore index (optional). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Area sampled</th><th>Stomatal density</th><th>Stomatal density</th><th>Pore index</th></tr></thead><tbody><tr><td><strong>Stomata counted</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Fields counted</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Field of view diameter</strong> +10%</td><td>+21%</td><td>-17.36%</td><td>-17.36%</td><td>-17.36%</td></tr><tr><td><strong>Stomatal pore index (optional)</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Field of view diameter: ten per cent there moves an answer by about 21 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Stomata counted = 23 stomata, Fields counted = 2.5, Field of view diameter = 1.1 mm and Stomatal pore index (optional) = 0.001 mm² and the page reports <strong>Area sampled</strong> = 2.38 mm², <strong>Stomatal density</strong> = 9.68 per mm², <strong>Stomatal density</strong> = 968 per cm² and <strong>Pore index</strong> = 0.01.</li><li>Feed in Stomata counted = 138 stomata, Fields counted = 5, Field of view diameter = 2.2 mm and Stomatal pore index (optional) = 0.002 mm² and the page reports <strong>Area sampled</strong> = 19.01 mm², <strong>Stomatal density</strong> = 7.26 per mm², <strong>Stomatal density</strong> = 726 per cm² and <strong>Pore index</strong> = 0.015.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Stomatal density is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Stomata counted, Fields counted and Field of view diameter are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Stomata counted, Fields counted and Field of view diameter is what you already know and Stomatal density and Stomatal density is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/dog-crate-size">Dog crate size</a>, <a href="/biology/dog-food">Dog food Calculator</a> and <a href="/biology/dog-harness-size">Dog harness size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stomatal Density calculator work out?', 'a' => <<<'TXT'
            Stomatal density, Stomatal density, Area sampled and Pore index, from Fields counted and Field of view diameter. The relationship is Area sampled = Fields counted × 3.142 × (Field of view diameter ÷ 2)^(2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Stomata counted (stomata), Fields counted, Field of view diameter (mm), Stomatal pore index (optional) (mm²). Fill stomata counted, fields counted and field of view diameter and leave Stomatal density empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Area sampled, Stomatal density, Stomatal density and Pore index can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Area sampled = 19.01 mm², Stomatal density = 2.42 per mm², Stomatal density = 242 per cm² and Pore index = 0.005. The figures come from Stomata counted as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Stomatal density is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Stomata counted blank and the page solves for it, reporting Stomatal density instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Stomatal density keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-crate-size', 'name' => 'Dog crate size'],
            ['path' => '/biology/dog-food', 'name' => 'Dog food Calculator'],
            ['path' => '/biology/dog-harness-size', 'name' => 'Dog harness size'],
        ],
        'authors' => [],
    ],
];
