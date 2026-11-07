<?php

/**
 * BCA Assay Calculator (standard curve)
 * /biology/bca-assay-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'BCA Assay Calculator (standard curve)',
    'meta' => ['title' => 'BCA Assay Calculator (standard curve) — Biology', 'description' => 'The BCA assay returns a colour, not a concentration: you read absorbance, put it on a standard curve and interpolate. It returns protein concentration and…', 'h1' => 'BCA Assay Calculator (standard curve)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a562',
                            'label' => 'Sample absorbance',
                            'type' => 'number',
                            'help' => 'Read at 562 nm, blank subtracted',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.62',
                        ],
                        [
                            'name' => 'slope',
                            'label' => 'Standard curve slope',
                            'type' => 'number',
                            'suffix' => 'per mg/mL',
                            'help' => 'Absorbance units per mg/mL of protein',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.35',
                        ],
                        [
                            'name' => 'intercept',
                            'label' => 'Standard curve intercept',
                            'type' => 'number',
                            'help' => 'Absorbance at zero protein',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.02',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Sample dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '2 for a 1:1 dilution with buffer',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'conc',
                            'label' => 'Protein concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
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
            'title' => 'Concentration',
            'results' => ['conc' => '(a562-intercept)/slope*dilution', 'a562' => 'conc*slope/dilution+intercept'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The BCA assay returns a colour, not a concentration: you read absorbance, put it on a standard curve and interpolate. It returns protein concentration and sample absorbance, and the panel shows all of them at once.
        
        This calculator takes the slope and intercept of your BSA standards and converts sample absorbance into protein concentration, including the dilution factor you used.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the BCA Assay (standard curve)', 'html' => <<<'TXT'
            <p>Protein (mg/mL) = (A₅₆₂ − intercept) ÷ slope × dilution factor</p>
            <figure class="calc-figure"><img src="/uploads/biology/bca-assay-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: BCA Assay Calculator (standard curve) — Absorbance minus the intercept, divided by the slope, times the dilution." title="BCA Assay Calculator (standard curve)"><figcaption>Absorbance minus the intercept, divided by the slope, times the dilution.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>A₅₆₂</code></td><td>blank-corrected absorbance of the sample</td><td>AU</td></tr><tr><td><code>slope</code></td><td>absorbance per mg/mL from the standards</td><td>AU·mL/mg</td></tr><tr><td><code>intercept</code></td><td>fitted absorbance at zero protein</td><td>AU</td></tr><tr><td><code>dilution</code></td><td>how much the sample was diluted before reading</td><td>×</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> BCA chemistry: Smith et al. (1985), Analytical Biochemistry 150:76–85.</p>
            TXT],
            ['title' => 'How do I use the BCA Assay (standard curve)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: standard curve slope of <strong>1.35</strong> per mg/mL, standard curve intercept of <strong>0.02</strong>, sample dilution factor of <strong>1</strong> ×.</p>
            <p>Substituting them into the formula gives protein concentration of <strong>0.4444</strong> mg/mL, sample absorbance of <strong>0.62</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0.05 – 2 mg/mL</td><td><strong>Working range</strong></td><td>the linear part of a typical BCA curve</td></tr><tr><td>below 0.05</td><td><strong>Too dilute</strong></td><td>concentrate or use a micro-BCA protocol</td></tr><tr><td>above 2</td><td><strong>Too concentrated</strong></td><td>dilute and re-read; the curve flattens</td></tr></tbody></table>
            <ul><li><p>The BCA curve is linear over roughly 20–2000 µg/mL for BSA. Outside that you are reading the shoulder of the curve, where a small absorbance error becomes a large concentration error.</p></li><li><p>BCA is compatible with detergents such as 1% SDS but not with reducing agents above about 5 mM DTT, which drive the colour reaction on their own.</p></li><li><p>The response depends on the protein: BSA over-reads, lysozyme under-reads. Quote the standard you used.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Forgetting the dilution factor, which is the most common cause of a concentration that is half or a quarter of the true value.</li><li>Subtracting the blank from the standards but not from the samples.</li><li>Reading at the wrong wavelength — BCA is measured at 562 nm, Bradford at 595 nm.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I make the standard curve?', 'a' => <<<'TXT'
            Dilute BSA to 0, 0.125, 0.25, 0.5, 1 and 2 mg/mL, run them with the samples, and fit absorbance against concentration. The slope and intercept go in the two boxes above.
            TXT],
            ['q' => 'Why is my sample reading above the top standard?', 'a' => 'The assay has saturated. Dilute the sample and multiply by the new dilution factor.'],
            ['q' => 'What does the BCA Assay (standard curve) actually calculate?', 'a' => 'It returns protein concentration and sample absorbance. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
