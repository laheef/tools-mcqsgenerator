<?php

/**
 * Percent Inhibition Calculator
 * /biology/percent-inhibition
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Percent Inhibition Calculator',
    'meta' => ['title' => 'Percent Inhibition Calculator — Formula & Results', 'description' => 'Percent inhibition compares a treated sample with an untreated control, and there are two conventions in use: relative to the control signal, and relative to…', 'h1' => 'Percent Inhibition Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'control',
                            'label' => 'Control signal',
                            'type' => 'number',
                            'suffix' => 'AU',
                            'help' => 'Untreated wells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.2',
                        ],
                        [
                            'name' => 'sample',
                            'label' => 'Sample signal',
                            'type' => 'number',
                            'suffix' => 'AU',
                            'help' => 'Treated wells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.45',
                        ],
                        [
                            'name' => 'blank',
                            'label' => 'Blank / background',
                            'type' => 'number',
                            'suffix' => 'AU',
                            'help' => 'No-enzyme or no-cell wells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.05',
                        ],
                        [
                            'name' => 'inhibition',
                            'label' => 'Percent inhibition',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'remaining',
                            'label' => 'Percent of control remaining',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'window',
                            'label' => 'Percent of signal window',
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
            'title' => 'Inhibition',
            'results' => ['inhibition' => '(control-sample)/(control-blank)*100', 'remaining' => 'sample/control*100', 'window' => '(sample-blank)/(control-blank)*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Percent inhibition compares a treated sample with an untreated control, and there are two conventions in use: relative to the control signal, and relative to the full signal window. It returns percent inhibition, percent of control remaining and percent of signal window, and the panel shows all of them at once.
        
        This calculator reports both, plus the IC50-style fraction remaining.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Percent Inhibition', 'html' => <<<'TXT'
            <p>Inhibition (%) = (control − sample) ÷ (control − blank) × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/percent-inhibition.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Percent Inhibition Calculator — Control, sample and blank, and the inhibition they imply." title="Percent Inhibition Calculator"><figcaption>Control, sample and blank, and the inhibition they imply.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>control</code></td><td>mean of untreated wells</td><td>AU</td></tr><tr><td><code>sample</code></td><td>mean of treated wells</td><td>AU</td></tr><tr><td><code>blank</code></td><td>background with no enzyme or no cells</td><td>AU</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Percent Inhibition?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: control signal of <strong>1.2</strong> AU, sample signal of <strong>0.45</strong> AU, blank / background of <strong>0.05</strong> AU.</p>
            <p>Substituting them into the formula gives percent inhibition of <strong>65.22</strong>%, percent of control remaining of <strong>37.5</strong>%, percent of signal window of <strong>34.78</strong>%.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0 – 20%</td><td><strong>Weak</strong></td><td>within assay noise for many systems</td></tr><tr><td>20 – 80%</td><td><strong>Dose-dependent</strong></td><td>the useful part of a dose–response curve</td></tr><tr><td>80 – 100%</td><td><strong>Near-complete</strong></td><td>check for cytotoxicity or assay interference</td></tr></tbody></table>
            <ul><li><p>Blank-correcting both arms matters: a raw comparison against an uncorrected control understates inhibition whenever the background is a significant fraction of the signal.</p></li><li><p>Percent inhibition is concentration-dependent; on its own, without the concentration, it is not a property of the compound.</p></li><li><p>Aggregators and fluorescence quenchers show up as 100% inhibition at every concentration — a flat curve is a warning sign, not a hit.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Averaging wells with very different cell numbers and calling it a mean.</li><li>Comparing a treated plate read on one day with a control plate read on another.</li><li>Reporting inhibition without the concentration and the incubation time.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Should I blank-correct?', 'a' => 'Yes, both the control and the sample. Otherwise the background dilutes the apparent effect.'],
            ['q' => 'What is a good percent inhibition?', 'a' => 'There is no universal threshold; what matters is the shape of the dose–response curve and the reproducibility of the control.'],
            ['q' => 'What does the Percent Inhibition actually calculate?', 'a' => <<<'TXT'
            It returns percent inhibition, percent of control remaining and percent of signal window. Each one is derived by the formula on this page, so you can check any figure by hand.
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
