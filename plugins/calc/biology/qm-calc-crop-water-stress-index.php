<?php

/**
 * Crop Water Stress Index Calculator
 * /biology/crop-water-stress-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Crop Water Stress Index Calculator',
    'meta' => ['title' => 'Crop Water Stress Index Calculator: Steps & Units', 'description' => 'Crop Water Stress Index Calculator works out estimated root-zone depletion from canopy temperature and wet reference temperature. Any box can be the unknown.', 'h1' => 'Crop Water Stress Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'tc',
                            'label' => 'Canopy temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '28.5',
                        ],
                        [
                            'name' => 'twet',
                            'label' => 'Wet reference temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => 'A fully transpiring surface',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '22',
                        ],
                        [
                            'name' => 'tdry',
                            'label' => 'Dry reference temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => 'A non-transpiring surface',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '36',
                        ],
                        [
                            'name' => 'cswi',
                            'label' => 'Crop water stress index',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'depletion',
                            'label' => 'Estimated root-zone depletion',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'stress',
                            'label' => 'Stress class',
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
            'title' => 'Stress',
            'results' => ['cswi' => '(tc-twet)/(tdry-twet)', 'depletion' => '(tc-twet)/(tdry-twet)*100', 'stress' => '(tc-twet)/(tdry-twet)*3'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Crop Water Stress Index works out Crop water stress index and Estimated root-zone depletion from Canopy temperature, Wet reference temperature and Dry reference temperature. There is no hidden constant here: change crop water stress index and canopy temperature moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Crop Water Stress Index calculator works', 'html' => <<<'TXT'
            <p>The Crop Water Stress Index calculator applies one relationship to 3 numbers and reports Crop water stress index, Estimated root-zone depletion and Stress class.</p><p>The relationship it solves reads Crop water stress index = (Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature).</p><p>The result panel carries Crop water stress index, Estimated root-zone depletion and Stress class, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Canopy temperature</strong> — in °C</li><li><strong>Wet reference temperature</strong> — in °C. A fully transpiring surface</li><li><strong>Dry reference temperature</strong> — in °C. A non-transpiring surface</li></ul><p>What you get back is Crop water stress index, Estimated root-zone depletion in %, Stress class, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Canopy temperature = 28.5 °C, Wet reference temperature = 22 °C and Dry reference temperature = 36 °C — through the same formula and the panel reports <strong>Crop water stress index</strong> = 0.4643, <strong>Estimated root-zone depletion</strong> = 46.43 % and <strong>Stress class</strong> = 1.39.</p><ul><li><strong>Crop water stress index</strong> = 0.4643</li><li><strong>Estimated root-zone depletion</strong> = 46.43 %</li><li><strong>Stress class</strong> = 1.39</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Crop water stress index</strong> = <code>(Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Crop water stress index</strong> = 0.4643, <strong>Estimated root-zone depletion</strong> = 46.43 and <strong>Stress class</strong> = 1.39. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Crop water stress index is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Crop water stress index</strong> = <code>(Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature)</code></li><li><strong>Estimated root-zone depletion</strong> = <code>(Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature) × 100</code></li><li><strong>Stress class</strong> = <code>(Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature) × 3</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Crop water stress index</strong> = <code>(Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature)</code> — the form to use when Canopy temperature, Wet reference temperature and Dry reference temperature are the values you have.</li><li><strong>Estimated root-zone depletion</strong> = <code>(Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature) × 100</code> — the form to use when Canopy temperature, Wet reference temperature and Dry reference temperature are the values you have.</li><li><strong>Stress class</strong> = <code>(Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature) × 3</code> — the form to use when Canopy temperature, Wet reference temperature and Dry reference temperature are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Crop water stress index, Estimated root-zone depletion and Stress class can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Canopy temperature from 28.5 to 57, leaving every other box alone. The panel moves from <strong>Crop water stress index</strong> 0.4643, <strong>Estimated root-zone depletion</strong> 46.43 % and <strong>Stress class</strong> 1.39 to <strong>Crop water stress index</strong> 2.5, <strong>Estimated root-zone depletion</strong> 250 % and <strong>Stress class</strong> 7.5.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Crop water stress index, Estimated root-zone depletion and Stress class are results: they are worked out from the boxes above and cannot be typed into, so a past answer has to be entered as one of the inputs instead.</li><li><strong>Canopy temperature left as a guess.</strong> Anything typed into Canopy temperature is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Wet reference temperature left as a guess.</strong> Anything typed into Wet reference temperature is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Dry reference temperature left as a guess.</strong> Anything typed into Dry reference temperature is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Canopy temperature to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Canopy temperature</strong> is measured in °C. It feeds Crop water stress index, Estimated root-zone depletion and Stress class. Have it to hand before you start: Canopy temperature is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Wet reference temperature</strong> is measured in °C. A fully transpiring surface. It feeds Crop water stress index, Estimated root-zone depletion and Stress class. Have it to hand before you start: Wet reference temperature is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dry reference temperature</strong> is measured in °C. A non-transpiring surface. It feeds Crop water stress index, Estimated root-zone depletion and Stress class. Have it to hand before you start: Dry reference temperature is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Crop water stress index</strong> is a plain number and the page's own defaults put it at 0.4643. It is worked out from Canopy temperature, Wet reference temperature and Dry reference temperature. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Estimated root-zone depletion</strong> is a plain number and the page's own defaults put it at 46.43. It is worked out from Canopy temperature, Wet reference temperature and Dry reference temperature. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Stress class</strong> is a plain number and the page's own defaults put it at 1.39. It is worked out from Canopy temperature, Wet reference temperature and Dry reference temperature. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Crop water stress index</th><th>Estimated root-zone depletion</th><th>Stress class</th></tr></thead><tbody><tr><td><strong>Canopy temperature</strong> +10%</td><td>+43.85%</td><td>+43.85%</td><td>+43.85%</td></tr><tr><td><strong>Wet reference temperature</strong> +10%</td><td>-21.51%</td><td>-21.51%</td><td>-21.51%</td></tr><tr><td><strong>Dry reference temperature</strong> +10%</td><td>-20.45%</td><td>-20.45%</td><td>-20.45%</td></tr></tbody></table><p>The steepest column belongs to Canopy temperature: ten per cent there moves an answer by about 43.8 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Canopy temperature = 14.25 °C, Wet reference temperature = 11 °C and Dry reference temperature = 18 °C, the answer is <strong>Crop water stress index</strong> = 0.4643, <strong>Estimated root-zone depletion</strong> = 46.43 % and <strong>Stress class</strong> = 1.39.</li><li>With Canopy temperature = 85.5 °C, Wet reference temperature = 22 °C and Dry reference temperature = 36 °C, the answer is <strong>Crop water stress index</strong> = 4.54, <strong>Estimated root-zone depletion</strong> = 454 % and <strong>Stress class</strong> = 13.61.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Crop water stress index is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Canopy temperature, Wet reference temperature and Dry reference temperature measured, Crop water stress index and Estimated root-zone depletion wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/llama">Llama</a>, <a href="/biology/log-reduction">Log Reduction</a> and <a href="/biology/logistic-population-growth">Logistic Population Growth Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Crop Water Stress Index calculator work out?', 'a' => <<<'TXT'
            Crop water stress index, Estimated root-zone depletion and Stress class, from Canopy temperature, Wet reference temperature and Dry reference temperature. The relationship is Crop water stress index = (Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Canopy temperature (°C), Wet reference temperature (°C), Dry reference temperature (°C). With canopy temperature, wet reference temperature and dry reference temperature in place, Crop water stress index can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Crop water stress index, Estimated root-zone depletion and Stress class can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Crop water stress index = 0.4643, Estimated root-zone depletion = 46.43 % and Stress class = 1.39. Those are the defaults written into the form — move Canopy temperature and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Crop water stress index is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Canopy temperature left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Crop water stress index keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/llama', 'name' => 'Llama'],
            ['path' => '/biology/log-reduction', 'name' => 'Log Reduction'],
            ['path' => '/biology/logistic-population-growth', 'name' => 'Logistic Population Growth Calculator'],
        ],
        'authors' => [],
    ],
];
