<?php

/**
 * Allometric Equation Calculator
 * /biology/allometric-equation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Allometric Equation Calculator',
    'meta' => ['title' => 'Allometric Equation Calculator — Formula & Results', 'description' => <<<'TXT'
    Allometric Equation works out Predicted value and log₁₀ of the prediction from Coefficient (a), Exponent (b) and Body mass. There is no hidden constant here…
    TXT, 'h1' => 'Allometric Equation Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a',
                            'label' => 'Coefficient (a)',
                            'type' => 'number',
                            'help' => 'From the published equation',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3.4',
                        ],
                        [
                            'name' => 'b',
                            'label' => 'Exponent (b)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.75',
                        ],
                        [
                            'name' => 'mass',
                            'label' => 'Body mass',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                        [
                            'name' => 'y',
                            'label' => 'Predicted value',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'log_y',
                            'label' => 'log₁₀ of the prediction',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'doubling_mass',
                            'label' => 'Change for a doubling of mass',
                            'type' => 'number',
                            'suffix' => '×',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'surface_exp',
                            'label' => 'Predicted surface exponent',
                            'type' => 'number',
                            'help' => '0.67',
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
            'title' => 'Allometry',
            'results' => ['y' => 'a*pow(mass,b)', 'log_y' => 'log10(a*pow(mass,b))', 'doubling_mass' => 'pow(2,b)', 'surface_exp' => '0.67'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Allometric Equation works out Predicted value and log₁₀ of the prediction from Coefficient (a), Exponent (b) and Body mass. There is no hidden constant here: change Predicted value and Coefficient (a) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Allometric Equation calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Allometric Equation: it takes 3 numbers and reports Predicted value, log₁₀ of the prediction and Change for a doubling of mass.</p><p>The relationship it solves reads Predicted value = Coefficient (a) × (Body mass)^(Exponent (b)).</p><p>The answers are Predicted value, log₁₀ of the prediction, Change for a doubling of mass and Predicted surface exponent; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Coefficient (a)</strong> — a plain number, no unit. From the published equation</li><li><strong>Exponent (b)</strong> — a plain number, no unit</li><li><strong>Body mass</strong> — in kg</li></ul><p>What you get back is Predicted value, log₁₀ of the prediction, Change for a doubling of mass in ×, Predicted surface exponent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Coefficient (a) = 3.4, Exponent (b) = 0.75 and Body mass = 70 kg; the answers are &lt;strong&gt;Predicted value&lt;/strong&gt; = 82.28, &lt;strong&gt;log₁₀ of the prediction&lt;/strong&gt; = 1.92, &lt;strong&gt;Change for a doubling of mass&lt;/strong&gt; = 1.68 × and &lt;strong&gt;Predicted surface exponent&lt;/strong&gt; = 0.67.</p><ul><li><strong>Predicted value</strong> = 82.28</li><li><strong>log₁₀ of the prediction</strong> = 1.92</li><li><strong>Change for a doubling of mass</strong> = 1.68 ×</li><li><strong>Predicted surface exponent</strong> = 0.67</li></ul><p>That is <strong>Predicted value</strong> = <code>Coefficient (a) × (Body mass)^(Exponent (b))</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Predicted value&lt;/strong&gt; = 82.28, &lt;strong&gt;log₁₀ of the prediction&lt;/strong&gt; = 1.92, &lt;strong&gt;Change for a doubling of mass&lt;/strong&gt; = 1.68 and &lt;strong&gt;Predicted surface exponent&lt;/strong&gt; = 0.67. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Predicted value is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Predicted value</strong> = <code>Coefficient (a) × (Body mass)^(Exponent (b))</code></li><li><strong>log₁₀ of the prediction</strong> = <code>log₁₀(Coefficient (a) × (Body mass)^(Exponent (b)))</code></li><li><strong>Change for a doubling of mass</strong> = <code>(2)^(Exponent (b))</code></li><li><strong>Predicted surface exponent</strong> = <code>0.67</code></li></ul><p>Any one of Predicted value, log₁₀ of the prediction and Change for a doubling of mass can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Coefficient (a) from 3.4 to 6.8, leaving every other box alone. The panel moves from &lt;strong&gt;Predicted value&lt;/strong&gt; 82.28, &lt;strong&gt;log₁₀ of the prediction&lt;/strong&gt; 1.92, &lt;strong&gt;Change for a doubling of mass&lt;/strong&gt; 1.68 × and &lt;strong&gt;Predicted surface exponent&lt;/strong&gt; 0.67 to &lt;strong&gt;Predicted value&lt;/strong&gt; 165, &lt;strong&gt;log₁₀ of the prediction&lt;/strong&gt; 2.22, &lt;strong&gt;Change for a doubling of mass&lt;/strong&gt; 1.68 × and &lt;strong&gt;Predicted surface exponent&lt;/strong&gt; 0.67.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Predicted value, log₁₀ of the prediction and Change for a doubling of mass are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Coefficient (a) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Coefficient (a), Exponent (b) and Body mass measured, Predicted value and log₁₀ of the prediction wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/mic-zone-of-inhibition">MIC and Zone of Inhibition Calculator</a>, <a href="/biology/microscope-field-of-view">Microscope Field of View Calculator</a> and <a href="/biology/microscope-magnification">Microscope Magnification Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Allometric Equation calculator work out?', 'a' => <<<'TXT'
            Predicted value, log₁₀ of the prediction, Change for a doubling of mass and Predicted surface exponent, from Coefficient (a), Body mass and Exponent (b). The relationship is Predicted value = Coefficient (a) × (Body mass)^(Exponent (b)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Coefficient (a), Exponent (b), Body mass (kg). With a, b and mass in place, Predicted value can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Predicted value, log₁₀ of the prediction, Change for a doubling of mass and Predicted surface exponent blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Predicted value = 82.28, log₁₀ of the prediction = 1.92, Change for a doubling of mass = 1.68 × and Predicted surface exponent = 0.67. The figures come from Coefficient (a) as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Predicted value is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Coefficient (a) blank and the page solves for it, reporting Predicted value instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Predicted value at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/mic-zone-of-inhibition', 'name' => 'MIC and Zone of Inhibition Calculator'],
            ['path' => '/biology/microscope-field-of-view', 'name' => 'Microscope Field of View Calculator'],
            ['path' => '/biology/microscope-magnification', 'name' => 'Microscope Magnification Calculator'],
        ],
        'authors' => [],
    ],
];
