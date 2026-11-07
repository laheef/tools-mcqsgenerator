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
    'meta' => ['title' => 'Buffer Preparation Calculator — Formula & Results', 'description' => 'A buffer is a weak acid and its conjugate base, and the ratio between them sets the pH. It returns pKa used, base: acid ratio, fraction as base and lower end…', 'h1' => 'Buffer Preparation Calculator', 'updated' => '2026-10-29'],
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
        A buffer is a weak acid and its conjugate base, and the ratio between them sets the pH. It returns pKa used, base: acid ratio, fraction as base and lower end of the useful pH range, and the panel shows all of them at once.
        
        The Henderson–Hasselbalch equation turns a target pH into a ratio, and this calculator turns the ratio into the volumes or masses you pipette.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Buffer Preparation', 'html' => <<<'TXT'
            <p>pH = pKa + log₁₀([A⁻] ÷ [HA]), so [A⁻]/[HA] = 10^(pH − pKa)</p>
            <figure class="calc-figure"><img src="/uploads/biology/buffer-preparation-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Buffer Preparation Calculator — The base-to-acid ratio that produces the target pH." title="Buffer Preparation Calculator"><figcaption>The base-to-acid ratio that produces the target pH.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>pKa</code></td><td>acid dissociation constant of the buffer</td><td>—</td></tr><tr><td><code>pH</code></td><td>target pH</td><td>—</td></tr><tr><td><code>ratio</code></td><td>base to acid</td><td>:1</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Buffer Preparation?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: buffer system set to <strong>HEPES (pKa 7.55)</strong>, use my own pka instead (temperature-corrected, another buffer) of <strong>0</strong>, my pka of <strong>7.2</strong>, target ph of <strong>7.4</strong>, buffer concentration of <strong>0.05</strong> M, final volume of <strong>1</strong> L.</p>
            <p>Substituting them into the formula gives pka used of <strong>7.55</strong>, base: acid ratio of <strong>0.7079</strong>:1, fraction as base of <strong>41.45</strong>%, lower end of the useful ph range of <strong>6.55</strong>, buffer substance in the batch of <strong>50</strong> mmol, basic form needed of <strong>20.73</strong> mmol, acidic form needed of <strong>29.27</strong> mmol.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>A buffer works within about one pH unit of its pKa; outside that the ratio runs away from 1:1 and the buffering capacity collapses.</p></li><li><p>Tris has a large temperature coefficient: a solution at pH 8.06 at 25 °C reads about 7.7 at 4 °C, so pH it at the temperature you will use it.</p></li><li><p>Prepare a concentrated stock and dilute — weighing 0.05 mol into a litre is imprecise, and the pH will need adjusting anyway.</p></li><li><p>Phosphate buffers precipitate divalent cations; if your assay needs Mg²⁺, use HEPES or Tris.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Choosing a buffer whose pKa is two units from the target pH.</li><li>Adjusting pH with strong acid without noting the final volume, which changes concentration.</li><li>Assuming pH paper is precise enough for an enzyme assay.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which buffer should I use for pH 7.4?', 'a' => 'Phosphate or HEPES — both have pKa values within half a unit of 7.4. HEPES is preferred when metal ions are involved.'],
            ['q' => 'Does temperature matter?', 'a' => 'For Tris, strongly. For phosphate and HEPES, much less.'],
            ['q' => 'What does the Buffer Preparation actually calculate?', 'a' => <<<'TXT'
            It returns pKa used, base : acid ratio, fraction as base and lower end of the useful pH range. Each one is derived by the formula on this page, so you can check any figure by hand.
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
