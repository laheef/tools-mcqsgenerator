<?php

/**
 * Goldman–Hodgkin–Katz Membrane Potential Calculator
 * /biology/ghk-membrane-potential
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Goldman–Hodgkin–Katz Membrane Potential Calculator',
    'meta' => ['title' => 'Goldman–Hodgkin–Katz Membrane Potential Calculator', 'description' => 'The Goldman–Hodgkin–Katz equation predicts a cell\'s resting membrane potential from all three permeant ions at once — sodium, potassium and chloride…', 'h1' => 'Goldman–Hodgkin–Katz Membrane Potential Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'ko',
                            'label' => 'Potassium outside',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'ki',
                            'label' => 'Potassium inside',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '140',
                        ],
                        [
                            'name' => 'nao',
                            'label' => 'Sodium outside',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '145',
                        ],
                        [
                            'name' => 'nai',
                            'label' => 'Sodium inside',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'clo',
                            'label' => 'Chloride outside',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '110',
                        ],
                        [
                            'name' => 'cli',
                            'label' => 'Chloride inside',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'pk',
                            'label' => 'Potassium permeability',
                            'type' => 'number',
                            'suffix' => 'relative',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'pna',
                            'label' => 'Sodium permeability',
                            'type' => 'number',
                            'suffix' => 'relative',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.04',
                        ],
                        [
                            'name' => 'pcl',
                            'label' => 'Chloride permeability',
                            'type' => 'number',
                            'suffix' => 'relative',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.45',
                        ],
                        [
                            'name' => 'vm',
                            'label' => 'Membrane potential',
                            'type' => 'number',
                            'suffix' => 'mV',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ek',
                            'label' => 'Potassium equilibrium potential',
                            'type' => 'number',
                            'suffix' => 'mV',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ena',
                            'label' => 'Sodium equilibrium potential',
                            'type' => 'number',
                            'suffix' => 'mV',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ecl',
                            'label' => 'Chloride equilibrium potential',
                            'type' => 'number',
                            'suffix' => 'mV',
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
            'title' => 'Membrane',
            'results' => ['vm' => '61.5*log10((pk*ko+pna*nao+pcl*cli)/(pk*ki+pna*nai+pcl*clo))', 'ek' => '61.5*log10(ko/ki)', 'ena' => '61.5*log10(nao/nai)', 'ecl' => '-61.5*log10(clo/cli)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Goldman–Hodgkin–Katz equation predicts a cell's resting membrane potential from all three permeant ions at once — sodium, potassium and chloride — weighted by their permeabilities. It returns membrane potential, potassium equilibrium potential, sodium equilibrium potential and chloride equilibrium potential, and the panel shows all of them at once.
        
        It is why the resting potential sits near the potassium equilibrium potential rather than at it.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Goldman–Hodgkin–Katz Membrane Potential', 'html' => <<<'TXT'
            <p>V_m = 61.5 log₁₀[(P_K[K]ₒ + P_Na[Na]ₒ + P_Cl[Cl]ᵢ) ÷ (P_K[K]ᵢ + P_Na[Na]ᵢ + P_Cl[Cl]ₒ)]</p>
            <figure class="calc-figure"><img src="/uploads/biology/ghk-membrane-potential.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Goldman–Hodgkin–Katz Membrane Potential Calculator — Three equilibrium potentials and where the cell actually sits." title="Goldman–Hodgkin–Katz Membrane Potential Calculator"><figcaption>Three equilibrium potentials and where the cell actually sits.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>[X]ₒ, [X]ᵢ</code></td><td>outside and inside concentrations</td><td>mM</td></tr><tr><td><code>P</code></td><td>relative permeability</td><td>—</td></tr><tr><td><code>61.5</code></td><td>RT/F × 2.303 at 37 °C</td><td>mV</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Goldman–Hodgkin–Katz Membrane Potential?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: potassium outside of <strong>4</strong> mM, potassium inside of <strong>140</strong> mM, sodium outside of <strong>145</strong> mM, sodium inside of <strong>12</strong> mM, chloride outside of <strong>110</strong> mM, chloride inside of <strong>10</strong> mM, potassium permeability of <strong>1</strong> relative, sodium permeability of <strong>0.04</strong> relative, chloride permeability of <strong>0.45</strong> relative.</p>
            <p>Substituting them into the formula gives membrane potential of <strong>-69.09</strong> mV, potassium equilibrium potential of <strong>-94.96</strong> mV, sodium equilibrium potential of <strong>66.55</strong> mV, chloride equilibrium potential of <strong>-64.05</strong> mV.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>-90 to -70 mV</td><td><strong>Resting neuron</strong></td><td>typical mammalian neuron at rest</td></tr><tr><td>-60 to -40 mV</td><td><strong>Depolarised</strong></td><td>or a cell with higher sodium leak</td></tr><tr><td>-30 to 0 mV</td><td><strong>Excitable peak</strong></td><td>during an action potential</td></tr></tbody></table>
            <ul><li><p>Note that chloride is inverted: it is an anion, so inside and outside swap places in the numerator and denominator.</p></li><li><p>The potassium equilibrium potential is set by the ratio [K]ₒ/[K]ᵢ; raising extracellular potassium from 4 to 8 mM depolarises the cell by about 18 mV, which is why hyperkalaemia disturbs cardiac rhythm.</p></li><li><p>The 61.5 mV constant is RT/F in base-10 form at 37 °C; at 20 °C it is 58 mV.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Putting chloride the same way round as the cations.</li><li>Using conductances where permeabilities belong — they are not interchangeable.</li><li>Entering concentrations in mmol/L for one ion and mol/L for another.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why is the resting potential near E_K?', 'a' => 'Because at rest potassium permeability dominates, so the membrane sits close to the potassium equilibrium potential without quite reaching it.'],
            ['q' => 'What happens if sodium permeability rises?', 'a' => 'The potential depolarises toward the sodium equilibrium potential — the basis of the action potential.'],
            ['q' => 'What does the Goldman–Hodgkin–Katz Membrane Potential actually calculate?', 'a' => <<<'TXT'
            It returns membrane potential, potassium equilibrium potential, sodium equilibrium potential and chloride equilibrium potential. Each one is derived by the formula on this page, so you can check any figure by hand.
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
