<?php

/**
 * Pig Weight Calculator
 * /biology/pig-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pig Weight Calculator',
    'meta' => ['title' => 'Pig Weight Calculator: Formula, Steps & Results', 'description' => 'You cannot put a pig on a bathroom scale, but you can measure it with a tape. It returns estimated live weight, estimated live weight, heart girth and body…', 'h1' => 'Pig Weight Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'girth',
                            'label' => 'Heart girth',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Circumference just behind the front legs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '110',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Body length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Between the ears to the base of the tail',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'unit',
                            'label' => 'Measured in',
                            'type' => 'select',
                            'options' => ['Centimetres' => '1', 'Inches' => '2'],
                            'default' => 'Centimetres',
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Estimated live weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'weight_lb',
                            'label' => 'Estimated live weight',
                            'type' => 'number',
                            'suffix' => 'lb',
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
            'title' => 'Live weight',
            'results' => ['weight' => 'if_else(unit==1, girth*girth*length/400, (girth*girth*length)*0.4536/400*16.387)', 'weight_lb' => 'weight*2.2046', 'girth' => 'sqrt(weight*400/length)', 'length' => 'weight*400/(girth*girth)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        You cannot put a pig on a bathroom scale, but you can measure it with a tape. It returns estimated live weight, estimated live weight, heart girth and body length, and the panel shows all of them at once.
        
        This calculator estimates live weight from heart girth and body length using the standard girth-squared × length formula, and reports the result in kilograms and pounds.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Pig Weight', 'html' => <<<'TXT'
            <p>Live weight (kg) ≈ (heart girth² × body length) ÷ 400, with both measured in centimetres</p>
            <figure class="calc-figure"><img src="/uploads/biology/pig-weight.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Pig Weight Calculator — Two tape measurements give the weight." title="Pig Weight Calculator"><figcaption>Two tape measurements give the weight.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>girth</code></td><td>heart girth behind the front legs</td><td>cm</td></tr><tr><td><code>length</code></td><td>from between the ears to the tail base</td><td>cm</td></tr><tr><td><code>weight</code></td><td>estimated live weight</td><td>kg</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Girth-squared method used in pig husbandry extension guidance; the constant is calibrated for commercial crossbreeds.</p>
            TXT],
            ['title' => 'How do I use the Pig Weight?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: measured in set to <strong>1.0</strong>.</p>
            <p>Substituting them into the formula gives estimated live weight of <strong>3,025</strong> kg, estimated live weight of <strong>6,668.91</strong> lb, heart girth of <strong>110</strong> cm, body length of <strong>100</strong> cm.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>under 30 kg</td><td><strong>Piglet</strong></td><td>still on the sow</td></tr><tr><td>30 – 70 kg</td><td><strong>Grower</strong></td><td>the fast-growth phase</td></tr><tr><td>70 – 110 kg</td><td><strong>Finisher</strong></td><td>approaching market weight</td></tr><tr><td>over 110 kg</td><td><strong>Heavy</strong></td><td>sow or mature boar territory</td></tr></tbody></table>
            <ul><li><p>The 400 divisor is an empirical constant for typical commercial pigs. Feral, obese or very lean animals fall outside it, and the estimate can be 10% out.</p></li><li><p>Measure with the pig standing square and its head up; a pig that is lying down or squirming gives a girth several centimetres too small.</p></li><li><p>For management decisions — dosing, feed allocation — a 10% margin is the useful way to read this number.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Measuring girth behind the shoulders instead of behind the front legs.</li><li>Taking the length along the back's curve instead of straight from ear base to tail base.</li><li>Mixing centimetres and inches in one calculation.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How accurate is the tape method?', 'a' => 'Usually within 5–10% for healthy commercial pigs. Weigh on a scale when the decision is critical, such as medication dosing.'],
            ['q' => 'Can I use it for a pot-bellied pig?', 'a' => 'Roughly, but the constant is calibrated on commercial breeds; expect a larger error on very different body shapes.'],
            ['q' => 'What does the Pig Weight actually calculate?', 'a' => <<<'TXT'
            It returns estimated live weight, estimated live weight, heart girth and body length. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];
