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
    An allometric equation scales a trait as a power of body mass: Y = aM^b. It returns predicted value, log₁₀ of the prediction, change for a doubling of mass…
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
        An allometric equation scales a trait as a power of body mass: Y = aM^b. It returns predicted value, log₁₀ of the prediction, change for a doubling of mass and predicted surface exponent, and the panel shows all of them at once.
        
        The exponent is the interesting part — 0.75 for metabolic rate, 1 for volume, 0.67 for surface area — and this calculator applies any allometric equation, reports the exponent's meaning and converts between log and linear forms.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Allometric Equation', 'html' => <<<'TXT'
            <p>Y = a × M^b</p>
            <figure class="calc-figure"><img src="/uploads/biology/allometric-equation.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Allometric Equation Calculator — A power law on linear axes, and the same line on log axes." title="Allometric Equation Calculator"><figcaption>A power law on linear axes, and the same line on log axes.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>a</code></td><td>coefficient, in units of Y per M^b</td><td>—</td></tr><tr><td><code>b</code></td><td>scaling exponent</td><td>—</td></tr><tr><td><code>M</code></td><td>body mass</td><td>kg</td></tr><tr><td><code>Y</code></td><td>the trait being predicted</td><td>trait units</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Allometric Equation?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: coefficient (a) of <strong>3.4</strong>, exponent (b) of <strong>0.75</strong>, body mass of <strong>70</strong> kg.</p>
            <p>Substituting them into the formula gives predicted value of <strong>82.28</strong>, log₁₀ of the prediction of <strong>1.92</strong>, change for a doubling of mass of <strong>1.68</strong> ×, predicted surface exponent of <strong>0.67</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>b ≈ 0.67</td><td><strong>Surface scaling</strong></td><td>areas scale slower than volume</td></tr><tr><td>b ≈ 0.75</td><td><strong>Metabolic scaling</strong></td><td>Kleiber's law for metabolic rate</td></tr><tr><td>b ≈ 1.0</td><td><strong>Isometric</strong></td><td>the trait scales in proportion to mass</td></tr></tbody></table>
            <ul><li><p>An exponent below 1 means the trait grows slower than mass: bigger animals have relatively lower metabolic rates per kilogram.</p></li><li><p>Coefficients are unit-specific — a mouse-to-elephant equation in kg cannot be fed grams.</p></li><li><p>Log–log plots turn the equation into a straight line whose slope is b and intercept is log a, which is how the parameters are actually fitted.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Fitting a straight line to untransformed data and calling the slope an exponent.</li><li>Using a coefficient published in different units.</li><li>Extrapolating far beyond the size range the equation was fitted over.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is Kleiber\'s law?', 'a' => 'Metabolic rate scales as mass^0.75, so a tenfold heavier animal uses about 5.6 times the energy.'],
            ['q' => 'Why do exponents cluster at 3/4?', 'a' => 'Because transport networks — blood vessels, tracheae, xylem — constrain how fast resources can reach tissue as body size grows.'],
            ['q' => 'What does the Allometric Equation actually calculate?', 'a' => <<<'TXT'
            It returns predicted value, log₁₀ of the prediction, change for a doubling of mass and predicted surface exponent. Each one is derived by the formula on this page, so you can check any figure by hand.
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
