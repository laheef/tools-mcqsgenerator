<?php

/**
 * Buffer Preparation Calculator
 * /biology/buffer-preparation-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Buffer Preparation Calculator',
    'meta' => ['title' => 'Buffer Preparation Calculator — Formula & Results', 'description' => 'Enter Buffer system, Use my own pKa instead (temperature-corrected, another buffer) and My pKa into Buffer Preparation and the answer comes back as Base…', 'h1' => 'Buffer Preparation Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'acid',
                            'label' => 'Buffer system',
                            'type' => 'select',
                            'options' => [
                                'Acetate (pKa 4.76)' => '4.76',
                                'MES (pKa 6.10)' => '6.10',
                                'Phosphate (pKa 7.20)' => '7.20',
                                'HEPES (pKa 7.55)' => '7.55',
                                'Tris (pKa 8.06 at 25 °C)' => '8.06',
                                'Bicarbonate (pKa 6.35)' => '6.35',
                            ],
                            'control' => 'SELECT',
                            'default' => 'HEPES (pKa 7.55)',
                        ],
                        [
                            'name' => 'custom',
                            'label' => 'Use my own pKa instead (temperature-corrected, another buffer)',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'default' => 'No',
                        ],
                        [
                            'name' => 'pka',
                            'label' => 'My pKa',
                            'type' => 'number',
                            'help' => 'Only used when the box above is ticked',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.2',
                        ],
                        [
                            'name' => 'ph',
                            'label' => 'Target pH',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.4',
                        ],
                        [
                            'name' => 'conc',
                            'label' => 'Buffer concentration',
                            'type' => 'number',
                            'suffix' => 'M',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.05',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Final volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Base : acid ratio',
                            'type' => 'number',
                            'suffix' => ':1',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'base_frac',
                            'label' => 'Fraction as base',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pka_used',
                            'label' => 'pKa used',
                            'type' => 'number',
                            'help' => 'Working pH range starts here minus 1',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'headroom',
                            'label' => 'Lower end of the useful pH range',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_mol',
                            'label' => 'Buffer substance in the batch',
                            'type' => 'number',
                            'suffix' => 'mmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'base_mol',
                            'label' => 'Basic form needed',
                            'type' => 'number',
                            'suffix' => 'mmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'acid_mol',
                            'label' => 'Acidic form needed',
                            'type' => 'number',
                            'suffix' => 'mmol',
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
            'title' => 'Buffer',
            'results' => [
                'pka_used' => '(1-custom)*acid+custom*pka',
                'ratio' => 'pow(10,ph-((1-custom)*acid+custom*pka))',
                'base_frac' => 'pow(10,ph-((1-custom)*acid+custom*pka))/(1+pow(10,ph-((1-custom)*acid+custom*pka)))*100',
                'headroom' => '((1-custom)*acid+custom*pka)-1',
                'total_mol' => 'conc*volume*1000',
                'base_mol' => 'conc*volume*1000*pow(10,ph-((1-custom)*acid+custom*pka))/(1+pow(10,ph-((1-custom)*acid+custom*pka)))',
                'acid_mol' => 'conc*volume*1000/(1+pow(10,ph-((1-custom)*acid+custom*pka)))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Buffer system, Use my own pKa instead (temperature-corrected, another buffer) and My pKa into Buffer Preparation and the answer comes back as Base: acid ratio and Fraction as base. Nothing is looked up on this page: Base: acid ratio is computed from Buffer system and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Base: acid ratio is opened in:1; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Buffer Preparation calculator works', 'html' => <<<'TXT'
            <p>Buffer Preparation answers one question from 6 numbers, and the answer is Base: acid ratio, Fraction as base and pKa used.</p><p>The relationship it solves reads pKa used = (1 − Use my own pKa instead (temperature-corrected, another buffer)) × Buffer system + Use my own pKa instead (temperature-corrected, another buffer) × My pKa.</p><p>What comes back is Base: acid ratio, Fraction as base, pKa used and Lower end of the useful pH range — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs.</p><ul><li><strong>Buffer system</strong> — a plain number, no unit</li><li><strong>Use my own pKa instead (temperature-corrected, another buffer)</strong> — a plain number, no unit</li><li><strong>My pKa</strong> — a plain number, no unit. Only used when the box above is ticked</li><li><strong>Target pH</strong> — a plain number, no unit</li><li><strong>Buffer concentration</strong> — in M</li><li><strong>Final volume</strong> — in L</li></ul><p>The result boxes are Base: acid ratio in:1, Fraction as base in %, pKa used, Lower end of the useful pH range, Buffer substance in the batch in mmol, Basic form needed in mmol, Acidic form needed in mmol; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Buffer system = 7.55, Use my own pKa instead (temperature-corrected, another buffer) = 0, My pKa = 7.2, Target pH = 7.4, Buffer concentration = 0.05 M and Final volume = 1 L; the answers are &lt;strong&gt;pKa used&lt;/strong&gt; = 7.55, &lt;strong&gt;Base: acid ratio&lt;/strong&gt; = 0.7079:1, &lt;strong&gt;Fraction as base&lt;/strong&gt; = 41.45 %, &lt;strong&gt;Lower end of the useful pH range&lt;/strong&gt; = 6.55, &lt;strong&gt;Buffer substance in the batch&lt;/strong&gt; = 50 mmol, &lt;strong&gt;Basic form needed&lt;/strong&gt; = 20.73 mmol and &lt;strong&gt;Acidic form needed&lt;/strong&gt; = 29.27 mmol.</p><ul><li><strong>pKa used</strong> = 7.55</li><li><strong>Base: acid ratio</strong> = 0.7079:1</li><li><strong>Fraction as base</strong> = 41.45 %</li><li><strong>Lower end of the useful pH range</strong> = 6.55</li><li><strong>Buffer substance in the batch</strong> = 50 mmol</li><li><strong>Basic form needed</strong> = 20.73 mmol</li><li><strong>Acidic form needed</strong> = 29.27 mmol</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>pKa used</strong> = <code>(1 − Use my own pKa instead (temperature-corrected, another buffer)) × Buffer system + Use my own pKa instead (temperature-corrected, another buffer) × My pKa</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;pKa used&lt;/strong&gt; = 7.55, &lt;strong&gt;Base: acid ratio&lt;/strong&gt; = 0.7079, &lt;strong&gt;Fraction as base&lt;/strong&gt; = 41.45, &lt;strong&gt;Lower end of the useful pH range&lt;/strong&gt; = 6.55, &lt;strong&gt;Buffer substance in the batch&lt;/strong&gt; = 50, &lt;strong&gt;Basic form needed&lt;/strong&gt; = 20.73 and &lt;strong&gt;Acidic form needed&lt;/strong&gt; = 29.27. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Base: acid ratio is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>pKa used</strong> = <code>(1 − Use my own pKa instead (temperature-corrected, another buffer)) × Buffer system + Use my own pKa instead (temperature-corrected, another buffer) × My pKa</code></li><li><strong>Base: acid ratio</strong> = <code>(10)^(Target pH − ((1 − Use my own pKa instead (temperature-corrected, another buffer)) × Buffer system + Use my own pKa instead (temperature-corrected, another buffer) × My pKa))</code></li><li><strong>Lower end of the useful pH range</strong> = <code>((1 − Use my own pKa instead (temperature-corrected, another buffer)) × Buffer system + Use my own pKa instead (temperature-corrected, another buffer) × My pKa) − 1</code></li><li><strong>Buffer substance in the batch</strong> = <code>Buffer concentration × Final volume × 1000</code></li><li><strong>Acidic form needed</strong> = <code>Buffer concentration × Final volume × 1000 ÷ (1 + (10)^(Target pH − ((1 − Use my own pKa instead (temperature-corrected, another buffer)) × Buffer system + Use my own pKa instead (temperature-corrected, another buffer) × My pKa)))</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of pKa used, Base: acid ratio and Fraction as base can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Buffer system, from 7.55 to 15.1 — and the answers go from &lt;strong&gt;pKa used&lt;/strong&gt; 7.55, &lt;strong&gt;Base: acid ratio&lt;/strong&gt; 0.7079:1, &lt;strong&gt;Fraction as base&lt;/strong&gt; 41.45 %, &lt;strong&gt;Lower end of the useful pH range&lt;/strong&gt; 6.55, &lt;strong&gt;Buffer substance in the batch&lt;/strong&gt; 50 mmol, &lt;strong&gt;Basic form needed&lt;/strong&gt; 20.73 mmol and &lt;strong&gt;Acidic form needed&lt;/strong&gt; 29.27 mmol to &lt;strong&gt;pKa used&lt;/strong&gt; 15.1, &lt;strong&gt;Base: acid ratio&lt;/strong&gt; 1.995e-8:1, &lt;strong&gt;Fraction as base&lt;/strong&gt; 1.995e-6 %, &lt;strong&gt;Lower end of the useful pH range&lt;/strong&gt; 14.1, &lt;strong&gt;Buffer substance in the batch&lt;/strong&gt; 50 mmol, &lt;strong&gt;Basic form needed&lt;/strong&gt; 9.976e-7 mmol and &lt;strong&gt;Acidic form needed&lt;/strong&gt; 50 mmol.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Base: acid ratio, Fraction as base and pKa used are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Buffer system is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Buffer system, Use my own pKa instead (temperature-corrected, another buffer) and My pKa and the number you are missing is Base: acid ratio and Fraction as base.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/fertilizer-injector-ratio">Fertilizer Injector Ratio Calculator</a>, <a href="/biology/plant-available-water">Field Capacity and Plant Available Water Calculator</a> and <a href="/biology/field-capacity">Field Capacity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Buffer Preparation calculator work out?', 'a' => <<<'TXT'
            Base: acid ratio, Fraction as base, pKa used and Lower end of the useful pH range, from Use my own pKa instead (temperature-corrected, another buffer), Buffer system and My pKa. The relationship is pKa used = (1 − Use my own pKa instead (temperature-corrected, another buffer)) × Buffer system + Use my own pKa instead (temperature-corrected, another buffer) × My pKa.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Buffer system, Use my own pKa instead (temperature-corrected, another buffer), My pKa, Target pH, Buffer concentration (M). Fill acid, custom and pka and leave Base: acid ratio empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. pKa used, Base: acid ratio, Fraction as base and Lower end of the useful pH range can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            pKa used = 7.55, Base: acid ratio = 0.7079:1, Fraction as base = 41.45 %, Lower end of the useful pH range = 6.55, Buffer substance in the batch = 50 mmol, Basic form needed = 20.73 mmol and Acidic form needed = 29.27 mmol. That comes from the page's own defaults, entered in Buffer system; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Base: acid ratio is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Buffer system blank and the page solves for it, reporting Base: acid ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Base: acid ratio keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/fertilizer-injector-ratio', 'name' => 'Fertilizer Injector Ratio Calculator'],
            ['path' => '/biology/plant-available-water', 'name' => 'Field Capacity and Plant Available Water Calculator'],
            ['path' => '/biology/field-capacity', 'name' => 'Field Capacity Calculator'],
        ],
        'authors' => [],
    ],
];
