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
    'meta' => ['title' => 'Allometric Equation Calculator: Units & Formula', 'description' => 'Allometric Equation Calculator reports predicted value and log₁₀ of the prediction. No sign-up: type the numbers, press Calculate and read the answer.', 'h1' => 'Allometric Equation Calculator', 'updated' => '2026-10-29'],
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
        Allometric Equation works out Predicted value and log₁₀ of the prediction from Coefficient (a), Exponent (b) and Body mass. There is no hidden constant here: change predicted value and coefficient (a) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Allometric Equation calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Allometric Equation: it takes 3 numbers and reports Predicted value, log₁₀ of the prediction and Change for a doubling of mass.</p><p>The relationship it solves reads Predicted value = Coefficient (a) × (Body mass)^(Exponent (b)).</p><p>The answers are Predicted value, log₁₀ of the prediction, Change for a doubling of mass and Predicted surface exponent; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Coefficient (a)</strong> — a plain number, no unit. From the published equation</li><li><strong>Exponent (b)</strong> — a plain number, no unit</li><li><strong>Body mass</strong> — in kg</li></ul><p>What you get back is Predicted value, log₁₀ of the prediction, Change for a doubling of mass in ×, Predicted surface exponent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Coefficient (a) = 3.4, Exponent (b) = 0.75 and Body mass = 70 kg; the answers are <strong>Predicted value</strong> = 82.28, <strong>log₁₀ of the prediction</strong> = 1.92, <strong>Change for a doubling of mass</strong> = 1.68 × and <strong>Predicted surface exponent</strong> = 0.67.</p><ul><li><strong>Predicted value</strong> = 82.28</li><li><strong>log₁₀ of the prediction</strong> = 1.92</li><li><strong>Change for a doubling of mass</strong> = 1.68 ×</li><li><strong>Predicted surface exponent</strong> = 0.67</li></ul><p>That is <strong>Predicted value</strong> = <code>Coefficient (a) × (Body mass)^(Exponent (b))</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Predicted value</strong> = 82.28, <strong>log₁₀ of the prediction</strong> = 1.92, <strong>Change for a doubling of mass</strong> = 1.68 and <strong>Predicted surface exponent</strong> = 0.67. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Predicted value is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Predicted value</strong> = <code>Coefficient (a) × (Body mass)^(Exponent (b))</code></li><li><strong>log₁₀ of the prediction</strong> = <code>log₁₀(Coefficient (a) × (Body mass)^(Exponent (b)))</code></li><li><strong>Change for a doubling of mass</strong> = <code>(2)^(Exponent (b))</code></li><li><strong>Predicted surface exponent</strong> = <code>0.67</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Predicted value</strong> = <code>Coefficient (a) × (Body mass)^(Exponent (b))</code> — the form to use when Coefficient (a), Body mass and Exponent (b) are the values you have.</li><li><strong>log₁₀ of the prediction</strong> = <code>log₁₀(Coefficient (a) × (Body mass)^(Exponent (b)))</code> — the form to use when Coefficient (a), Body mass and Exponent (b) are the values you have.</li><li><strong>Change for a doubling of mass</strong> = <code>(2)^(Exponent (b))</code> — the form to use when Exponent (b) are the values you have.</li><li><strong>Predicted surface exponent</strong> = <code>0.67</code> — the form to use when the other values are known.</li></ul><p>Any one of Predicted value, log₁₀ of the prediction and Change for a doubling of mass can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Coefficient (a) from 3.4 to 6.8, leaving every other box alone. The panel moves from <strong>Predicted value</strong> 82.28, <strong>log₁₀ of the prediction</strong> 1.92, <strong>Change for a doubling of mass</strong> 1.68 × and <strong>Predicted surface exponent</strong> 0.67 to <strong>Predicted value</strong> 165, <strong>log₁₀ of the prediction</strong> 2.22, <strong>Change for a doubling of mass</strong> 1.68 × and <strong>Predicted surface exponent</strong> 0.67.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Predicted value, log₁₀ of the prediction and Change for a doubling of mass are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Coefficient (a) left as a guess.</strong> Anything typed into Coefficient (a) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Exponent (b) left as a guess.</strong> Anything typed into Exponent (b) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Body mass left as a guess.</strong> Anything typed into Body mass is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Coefficient (a) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Allometric Equation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Coefficient (a)</strong> takes a plain number with no unit attached. From the published equation. Change it and Predicted value and log₁₀ of the prediction changes with it. Fill it from a measurement rather than a memory — Coefficient (a) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Exponent (b)</strong> takes a plain number with no unit attached. Change it and Predicted value, log₁₀ of the prediction and Change for a doubling of mass changes with it. Fill it from a measurement rather than a memory — Exponent (b) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Body mass</strong> is measured in kg. Change it and Predicted value and log₁₀ of the prediction changes with it. Fill it from a measurement rather than a memory — Body mass is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Predicted value</strong> is a plain number and the page's own defaults put it at 82.28. The value follows from Coefficient (a), Body mass and Exponent (b). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>log₁₀ of the prediction</strong> is a plain number and the page's own defaults put it at 1.92. The value follows from Coefficient (a), Body mass and Exponent (b). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Change for a doubling of mass</strong> is a plain number and the page's own defaults put it at 1.68. The value follows from Exponent (b). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Predicted surface exponent</strong> is a plain number and the page's own defaults put it at 0.67. The page computes it from the form as a whole rather than from one line of the formula. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Predicted value</th><th>log₁₀ of the prediction</th><th>Change for a doubling of mass</th><th>Predicted surface exponent</th></tr></thead><tbody><tr><td><strong>Coefficient (a)</strong> +10%</td><td>+10%</td><td>+2.16%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Exponent (b)</strong> +10%</td><td>+37.53%</td><td>+7.23%</td><td>+5.34%</td><td>+0%</td></tr><tr><td><strong>Body mass</strong> +10%</td><td>+7.41%</td><td>+1.62%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Exponent (b): ten per cent there moves an answer by about 37.5 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Coefficient (a) = 1.7, Exponent (b) = 0.375 and Body mass = 35 kg and the page reports <strong>Predicted value</strong> = 6.45, <strong>log₁₀ of the prediction</strong> = 0.8095, <strong>Change for a doubling of mass</strong> = 1.3 × and <strong>Predicted surface exponent</strong> = 0.67.</li><li>Feed in Coefficient (a) = 10.2, Exponent (b) = 0.75 and Body mass = 70 kg and the page reports <strong>Predicted value</strong> = 247, <strong>log₁₀ of the prediction</strong> = 2.39, <strong>Change for a doubling of mass</strong> = 1.68 × and <strong>Predicted surface exponent</strong> = 0.67.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Predicted value is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Coefficient (a), Exponent (b) and Body mass measured, Predicted value and log₁₀ of the prediction wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/mic-zone-of-inhibition">MIC and Zone of Inhibition Calculator</a>, <a href="/biology/microscope-field-of-view">Microscope Field of View Calculator</a> and <a href="/biology/microscope-magnification">Microscope Magnification Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Allometric Equation calculator work out?', 'a' => <<<'TXT'
            Predicted value, log₁₀ of the prediction, Change for a doubling of mass and Predicted surface exponent, from Coefficient (a), Body mass and Exponent (b). The relationship is Predicted value = Coefficient (a) × (Body mass)^(Exponent (b)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Coefficient (a), Exponent (b), Body mass (kg). With coefficient (a), exponent (b) and body mass in place, Predicted value can stay blank and the page will work it out.
            TXT],
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
