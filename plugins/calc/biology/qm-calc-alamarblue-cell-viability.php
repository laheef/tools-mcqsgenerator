<?php

/**
 * AlamarBlue Cell Viability / Percent Reduction Calculator
 * /biology/alamarblue-cell-viability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'AlamarBlue Cell Viability / Percent Reduction Calculator',
    'meta' => ['title' => 'AlamarBlue Cell Viability / Percent Reduction', 'description' => <<<'TXT'
    AlamarBlue (resazurin) is reduced by living cells to resorufin, which is fluorescent and pink. It returns percent reduction, viability relative to control and…
    TXT, 'h1' => 'AlamarBlue Cell Viability / Percent Reduction Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'sample',
                            'label' => 'Sample fluorescence',
                            'type' => 'number',
                            'suffix' => 'RFU',
                            'help' => 'Treated wells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '32000',
                        ],
                        [
                            'name' => 'control',
                            'label' => 'Control fluorescence',
                            'type' => 'number',
                            'suffix' => 'RFU',
                            'help' => 'Untreated wells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '48000',
                        ],
                        [
                            'name' => 'blank',
                            'label' => 'Medium-only blank',
                            'type' => 'number',
                            'suffix' => 'RFU',
                            'help' => 'No cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2500',
                        ],
                        [
                            'name' => 'reduction',
                            'label' => 'Percent reduction',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'viability',
                            'label' => 'Viability relative to control',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ic',
                            'label' => 'Cytotoxicity',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Viability',
            'results' => ['reduction' => '(sample-blank)/(control-blank)*100', 'viability' => '(sample-blank)/(control-blank)*100', 'ic' => '100-(sample-blank)/(control-blank)*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        AlamarBlue (resazurin) is reduced by living cells to resorufin, which is fluorescent and pink. It returns percent reduction, viability relative to control and cytotoxicity, and the panel shows all of them at once.
        
        Viability is the reduction relative to a control, corrected for the background of medium alone. This calculator does that three-point correction.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the AlamarBlue Cell Viability / Percent Reduction', 'html' => <<<'TXT'
            <p>Viability (%) = (sample − blank) ÷ (control − blank) × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/alamarblue-cell-viability.svg" width="720" height="300" loading="lazy" alt="Animated diagram: AlamarBlue Cell Viability / Percent Reduction Calculator — Sample, control and blank, and the reduction between them." title="AlamarBlue Cell Viability / Percent Reduction Calculator"><figcaption>Sample, control and blank, and the reduction between them.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>sample</code></td><td>fluorescence of treated wells</td><td>RFU</td></tr><tr><td><code>control</code></td><td>fluorescence of untreated wells</td><td>RFU</td></tr><tr><td><code>blank</code></td><td>medium plus reagent, no cells</td><td>RFU</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> AlamarBlue/resazurin reduction chemistry; 70% viability threshold from ISO 10993-5.</p>
            TXT],
            ['title' => 'How do I use the AlamarBlue Cell Viability / Percent Reduction?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: sample fluorescence of <strong>32,000</strong> RFU, control fluorescence of <strong>48,000</strong> RFU, medium-only blank of <strong>2,500</strong> RFU.</p>
            <p>Substituting them into the formula gives percent reduction of <strong>64.84</strong>%, viability relative to control of <strong>64.84</strong>%, cytotoxicity of <strong>35.16</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>above 90%</td><td><strong>Non-cytotoxic</strong></td><td>within normal variation</td></tr><tr><td>70 – 90%</td><td><strong>Mild</strong></td><td>watch for dose-dependent effects</td></tr><tr><td>below 70%</td><td><strong>Cytotoxic</strong></td><td>the usual threshold in ISO 10993 testing</td></tr></tbody></table>
            <ul><li><p>AlamarBlue measures metabolic activity, not cell number. A cytostatic compound lowers the signal without killing anything.</p></li><li><p>The blank matters: resazurin is partly reduced by medium components, and an uncorrected blank inflates weak signals.</p></li><li><p>Incubation time should be identical for all wells; reduction is enzymatic and keeps going.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Reading in the wrong channel — resorufin fluoresces at 590 nm with excitation around 560 nm.</li><li>Comparing plates incubated for different times.</li><li>Leaving the reagent in the wells during imaging, where it bleaches.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/percent-viability">Percent viability</a>. <a href="/biology/trypan-blue-cell-viability">Trypan blue viability</a>. <a href="/biology/percent-inhibition">Percent inhibition</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is percent reduction?', 'a' => 'The share of the dye that the cells have reduced, corrected for the medium-only blank — the same number as viability when the control is fully viable.'],
            ['q' => 'Can I use absorbance instead of fluorescence?', 'a' => 'Yes, at 570 nm against a 600 nm reference; the calculation is identical.'],
            ['q' => 'What does the AlamarBlue Cell Viability / Percent Reduction actually calculate?', 'a' => <<<'TXT'
            It returns percent reduction, viability relative to control and cytotoxicity. Each one is derived by the formula on this page, so you can check any figure by hand.
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
