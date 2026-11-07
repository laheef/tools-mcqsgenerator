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
    'meta' => ['title' => 'Crop Water Stress Index Calculator — Biology', 'description' => 'Crop Water Stress Index works out Crop water stress index and Estimated root-zone depletion from Canopy temperature, Wet reference temperature and Dry…', 'h1' => 'Crop Water Stress Index Calculator', 'updated' => '2026-10-29'],
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
        Crop Water Stress Index works out Crop water stress index and Estimated root-zone depletion from Canopy temperature, Wet reference temperature and Dry reference temperature. There is no hidden constant here: change Crop water stress index and Canopy temperature moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Crop Water Stress Index calculator works', 'html' => <<<'TXT'
            <p>The Crop Water Stress Index calculator applies one relationship to 3 numbers and reports Crop water stress index, Estimated root-zone depletion and Stress class.</p><p>The relationship it solves reads Crop water stress index = (Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature).</p><p>The result panel carries Crop water stress index, Estimated root-zone depletion and Stress class, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Canopy temperature</strong> — in °C</li><li><strong>Wet reference temperature</strong> — in °C. A fully transpiring surface</li><li><strong>Dry reference temperature</strong> — in °C. A non-transpiring surface</li></ul><p>What you get back is Crop water stress index, Estimated root-zone depletion in %, Stress class, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Canopy temperature = 28.5 °C, Wet reference temperature = 22 °C and Dry reference temperature = 36 °C — through the same formula and the panel reports &lt;strong&gt;Crop water stress index&lt;/strong&gt; = 0.4643, &lt;strong&gt;Estimated root-zone depletion&lt;/strong&gt; = 46.43 % and &lt;strong&gt;Stress class&lt;/strong&gt; = 1.39.</p><ul><li><strong>Crop water stress index</strong> = 0.4643</li><li><strong>Estimated root-zone depletion</strong> = 46.43 %</li><li><strong>Stress class</strong> = 1.39</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Crop water stress index</strong> = <code>(Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Crop water stress index&lt;/strong&gt; = 0.4643, &lt;strong&gt;Estimated root-zone depletion&lt;/strong&gt; = 46.43 and &lt;strong&gt;Stress class&lt;/strong&gt; = 1.39. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Crop water stress index is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Crop water stress index</strong> = <code>(Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature)</code></li><li><strong>Estimated root-zone depletion</strong> = <code>(Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature) × 100</code></li><li><strong>Stress class</strong> = <code>(Canopy temperature − Wet reference temperature) ÷ (Dry reference temperature − Wet reference temperature) × 3</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Crop water stress index, Estimated root-zone depletion and Stress class can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Canopy temperature from 28.5 to 57, leaving every other box alone. The panel moves from &lt;strong&gt;Crop water stress index&lt;/strong&gt; 0.4643, &lt;strong&gt;Estimated root-zone depletion&lt;/strong&gt; 46.43 % and &lt;strong&gt;Stress class&lt;/strong&gt; 1.39 to &lt;strong&gt;Crop water stress index&lt;/strong&gt; 2.5, &lt;strong&gt;Estimated root-zone depletion&lt;/strong&gt; 250 % and &lt;strong&gt;Stress class&lt;/strong&gt; 7.5.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Crop water stress index, Estimated root-zone depletion and Stress class are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Canopy temperature to one scale before entering anything.</li></ul>
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
            Canopy temperature (°C), Wet reference temperature (°C), Dry reference temperature (°C). With tc, twet and tdry in place, Crop water stress index can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Crop water stress index, Estimated root-zone depletion and Stress class can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Crop water stress index = 0.4643, Estimated root-zone depletion = 46.43 % and Stress class = 1.39. Those are the defaults written into the form — move Canopy temperature and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Crop water stress index is not rounded at all; the figure you read is formatted for legibility.'],
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
