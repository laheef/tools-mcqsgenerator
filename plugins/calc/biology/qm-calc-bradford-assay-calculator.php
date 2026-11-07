<?php

/**
 * Bradford Assay Calculator (standard curve)
 * /biology/bradford-assay-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bradford Assay Calculator (standard curve)',
    'meta' => ['title' => 'Bradford Assay Calculator (standard curve) — Biology', 'description' => 'Bradford is the quickest colorimetric protein assay and the one most sensitive to which protein you are measuring. It returns protein concentration, and the…', 'h1' => 'Bradford Assay Calculator (standard curve)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a595',
                            'label' => 'Sample absorbance',
                            'type' => 'number',
                            'help' => 'Read at 595 nm, blank subtracted',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.48',
                        ],
                        [
                            'name' => 'slope',
                            'label' => 'Standard curve slope',
                            'type' => 'number',
                            'suffix' => 'per mg/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.05',
                        ],
                        [
                            'name' => 'intercept',
                            'label' => 'Standard curve intercept',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.03',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Sample dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
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
            'results' => ['conc' => '(a595-intercept)/slope*dilution'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Bradford is the quickest colorimetric protein assay and the one most sensitive to which protein you are measuring. It returns protein concentration, and the panel shows all of them at once.
        
        This calculator converts a 595 nm reading into mg/mL using your own standard curve, with the dilution factor applied.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Bradford Assay (standard curve)', 'html' => <<<'TXT'
            <p>Protein (mg/mL) = (A₅₉₅ − intercept) ÷ slope × dilution factor</p>
            <figure class="calc-figure"><img src="/uploads/biology/bradford-assay-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Bradford Assay Calculator (standard curve) — A 595 nm reading turned into a concentration through your own standards." title="Bradford Assay Calculator (standard curve)"><figcaption>A 595 nm reading turned into a concentration through your own standards.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>A₅₉₅</code></td><td>blank-corrected absorbance</td><td>AU</td></tr><tr><td><code>slope</code></td><td>absorbance per mg/mL</td><td>AU·mL/mg</td></tr><tr><td><code>intercept</code></td><td>fitted absorbance at zero protein</td><td>AU</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Bradford (1976), Analytical Biochemistry 72:248–254.</p>
            TXT],
            ['title' => 'How do I use the Bradford Assay (standard curve)?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: sample absorbance of <strong>0.48</strong>, standard curve slope of <strong>1.05</strong> per mg/mL, standard curve intercept of <strong>0.03</strong>, sample dilution factor of <strong>1</strong> ×.</p>
            <p>Substituting them into the formula gives protein concentration of <strong>0.4286</strong> mg/mL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0.1 – 1.4 mg/mL</td><td><strong>Working range</strong></td><td>linear for most proteins</td></tr><tr><td>below 0.1</td><td><strong>Too dilute</strong></td><td>use a micro-Bradford cuvette</td></tr><tr><td>above 1.4</td><td><strong>Saturated</strong></td><td>dilute and re-read</td></tr></tbody></table>
            <ul><li><p>Bradford binds basic and aromatic residues, so the response is strongly protein-dependent: BSA is the usual standard, but a lysine-rich protein will over-read against it.</p></li><li><p>Detergents above 0.1% (especially SDS and Triton X-100) interfere; so do strong reducing agents.</p></li><li><p>The dye binds the cuvette, so use a fresh one or rinse with methanol between samples.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Reading Bradford at 562 nm, the BCA wavelength — the peak is 595 nm.</li><li>Using a BSA curve for a very different protein and quoting the number as absolute.</li><li>Leaving the dye–sample mix to stand for different times for standards and samples.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Is Bradford or BCA better?', 'a' => <<<'TXT'
            BCA is more tolerant of detergents and more linear; Bradford is faster and less sensitive to reducing agents. Both need a standard curve made with a protein similar to your sample.
            TXT],
            ['q' => 'What does the Bradford Assay (standard curve) actually calculate?', 'a' => 'It returns protein concentration. Each one is derived by the formula on this page, so you can check any figure by hand.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
            ['q' => 'Does it work in both directions?', 'a' => <<<'TXT'
            Where the maths allows it, yes: the page states which values it solves for and which you supply. A field marked as a result is always computed, never typed into.
            TXT],
        ],
        'related' => [],
    ],
];
