<?php

/**
 * Cheng-Prusoff Equation Calculator
 * /biology/cheng-prusoff-equation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cheng-Prusoff Equation Calculator',
    'meta' => ['title' => 'Cheng-Prusoff Equation Calculator — Formula & Results', 'description' => <<<'TXT'
    The Cheng–Prusoff equation converts an assay IC50 into Ki, the true inhibition constant. It returns ki and km apparent at this [S], and the panel shows all of…
    TXT, 'h1' => 'Cheng-Prusoff Equation Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'ic50',
                            'label' => 'IC50',
                            'type' => 'number',
                            'suffix' => 'nM',
                            'help' => 'From the competition assay',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 's',
                            'label' => 'Substrate concentration',
                            'type' => 'number',
                            'suffix' => '× Km',
                            'help' => 'Radiometric assays often run at 1 × Km',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'km',
                            'label' => 'Km of the substrate',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'help' => 'Not needed when the substrate box is in Km units',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'mode',
                            'label' => 'Inhibition type',
                            'type' => 'select',
                            'options' => ['Competitive' => '1', 'Non-competitive' => '2', 'Uncompetitive' => '3'],
                            'default' => 'Competitive',
                        ],
                        [
                            'name' => 'ki',
                            'label' => 'Ki',
                            'type' => 'number',
                            'suffix' => 'nM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'km_app',
                            'label' => 'Km apparent at this [S]',
                            'type' => 'number',
                            'suffix' => 'µM',
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
            'title' => 'Ki',
            'results' => ['ki' => 'if_else(mode==1, ic50/(1+s), if_else(mode==2, ic50, ic50/(1+1/s)))', 'km_app' => 'km*(1+s)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Cheng–Prusoff equation converts an assay IC50 into Ki, the true inhibition constant. It returns ki and km apparent at this [S], and the panel shows all of them at once.
        
        The Cheng–Prusoff relationship converts one into the other using the substrate concentration and its Km, and it is the standard correction when comparing inhibitors across assays.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Cheng-Prusoff Equation', 'html' => <<<'TXT'
            <p>Competitive: Ki = IC50 ÷ (1 + [S]/Km); non-competitive: Ki = IC50; uncompetitive: Ki = IC50 ÷ (1 + Km/[S])</p>
            <figure class="calc-figure"><img src="/uploads/biology/cheng-prusoff-equation.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Cheng-Prusoff Equation Calculator — IC50 corrected by the substrate-to-Km ratio gives Ki." title="Cheng-Prusoff Equation Calculator"><figcaption>IC50 corrected by the substrate-to-Km ratio gives Ki.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>IC50</code></td><td>half-maximal inhibitory concentration in the assay</td><td>nM</td></tr><tr><td><code>[S]</code></td><td>substrate concentration</td><td>µM</td></tr><tr><td><code>Km</code></td><td>Michaelis constant of the substrate</td><td>µM</td></tr><tr><td><code>Ki</code></td><td>dissociation constant of the inhibitor</td><td>nM</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Cheng & Prusoff (1973), Biochemical Pharmacology 22:3099–3108.</p>
            TXT],
            ['title' => 'How do I use the Cheng-Prusoff Equation?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: ic50 of <strong>120</strong> nM, substrate concentration of <strong>1</strong> × Km, km of the substrate of <strong>1</strong> µM, inhibition type set to <strong>1.0</strong>.</p>
            <p>Substituting them into the formula gives ki of <strong>60</strong> nM, km apparent at this [s] of <strong>2</strong> µM.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>competitive</td><td><strong>Ki &lt; IC50</strong></td><td>raising [S] makes inhibition look weaker</td></tr><tr><td>non-competitive</td><td><strong>Ki = IC50</strong></td><td>substrate concentration does not matter</td></tr><tr><td>uncompetitive</td><td><strong>Ki &lt; IC50</strong></td><td>the inhibitor prefers the ES complex</td></tr></tbody></table>
            <ul><li><p>The correction only holds for reversible inhibitors under rapid-equilibrium assumptions; tight-binding inhibitors need the Morrison equation.</p></li><li><p>Assay at a substrate concentration near Km: that is where the correction is most robust and where the signal is still workable.</p></li><li><p>Report Ki and the conditions: a Ki without Km and [S] cannot be reproduced.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Applying the competitive correction to a non-competitive inhibitor.</li><li>Using [S] in µM with Km in mM.</li><li>Treating IC50 from a cell-based assay as Ki — transport and protein binding intervene.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why is IC50 different from Ki?', 'a' => 'Because IC50 depends on how much substrate is present: more substrate competes with the inhibitor and raises the apparent IC50.'],
            ['q' => 'When can I skip the correction?', 'a' => 'When [S] is far below Km, the competitive correction factor is close to 1.'],
            ['q' => 'What does the Cheng-Prusoff Equation actually calculate?', 'a' => 'It returns ki and km apparent at this [S]. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
