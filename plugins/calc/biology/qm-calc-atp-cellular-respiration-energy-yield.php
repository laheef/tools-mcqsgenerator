<?php

/**
 * ATP / Cellular Respiration Energy Yield Calculator
 * /biology/atp-cellular-respiration-energy-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'ATP / Cellular Respiration Energy Yield Calculator',
    'meta' => ['title' => 'ATP / Cellular Respiration Energy Yield Calculator', 'description' => <<<'TXT'
    ATP / Cellular Respiration Energy Yield works out Total ATP and Energy captured from Fuel, NADH produced and FADH₂ produced. Total ATP and Energy captured are…
    TXT, 'h1' => 'ATP / Cellular Respiration Energy Yield Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fuel',
                            'label' => 'Fuel',
                            'type' => 'select',
                            'options' => [
                                'Glucose (aerobic)' => '1',
                                'Glucose (anaerobic)' => '2',
                                'Palmitate (C16)' => '3',
                                'Lactate' => '4',
                                'Glutamate' => '5',
                            ],
                            'control' => 'SELECT',
                            'default' => 'Glucose (aerobic)',
                        ],
                        [
                            'name' => 'nadh',
                            'label' => 'NADH produced',
                            'type' => 'number',
                            'help' => 'From glycolysis, pyruvate oxidation and the cycle',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'fadh2',
                            'label' => 'FADH₂ produced',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'atp_sub',
                            'label' => 'ATP (or GTP) made directly',
                            'type' => 'number',
                            'help' => 'Substrate-level phosphorylation',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'atp_total',
                            'label' => 'Total ATP',
                            'type' => 'number',
                            'suffix' => 'ATP',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'energy',
                            'label' => 'Energy captured',
                            'type' => 'number',
                            'suffix' => 'kJ/mol',
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
            'title' => 'Yield',
            'results' => ['atp_total' => 'if_else(fuel==2, atp_sub*2, atp_sub+nadh*2.5+fadh2*1.5)', 'energy' => '(atp_sub+nadh*2.5+fadh2*1.5)*30.5'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        ATP / Cellular Respiration Energy Yield works out Total ATP and Energy captured from Fuel, NADH produced and FADH₂ produced. There is no hidden constant here: change Total ATP and Fuel moves with it. The main result, Total ATP, is reported in ATP.
        TXT,
        'sections' => [
            ['title' => 'How the ATP / Cellular Respiration Energy Yield calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind ATP / Cellular Respiration Energy Yield: it takes 4 numbers and reports Total ATP and Energy captured.</p><p>The relationship it solves reads Total ATP = if_else(Fuel==2, ATP (or GTP) made directly × 2, ATP (or GTP) made directly + NADH produced × 2.5 + FADH₂ produced × 1.5).</p><p>The answers are Total ATP and Energy captured; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Fuel</strong> — a plain number, no unit</li><li><strong>NADH produced</strong> — a plain number, no unit. From glycolysis, pyruvate oxidation and the cycle</li><li><strong>FADH₂ produced</strong> — a plain number, no unit</li><li><strong>ATP (or GTP) made directly</strong> — a plain number, no unit. Substrate-level phosphorylation</li></ul><p>What you get back is Total ATP in ATP, Energy captured in kJ/mol, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Fuel = 1, NADH produced = 10, FADH₂ produced = 2 and ATP (or GTP) made directly = 4 gives &lt;strong&gt;Total ATP&lt;/strong&gt; = 32 ATP and &lt;strong&gt;Energy captured&lt;/strong&gt; = 976 kJ/mol.</p><ul><li><strong>Total ATP</strong> = 32 ATP</li><li><strong>Energy captured</strong> = 976 kJ/mol</li></ul><p>The line behind those figures is <strong>Total ATP</strong> = <code>if_else(Fuel==2, ATP (or GTP) made directly × 2, ATP (or GTP) made directly + NADH produced × 2.5 + FADH₂ produced × 1.5)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Total ATP&lt;/strong&gt; = 32 and &lt;strong&gt;Energy captured&lt;/strong&gt; = 976. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Total ATP is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total ATP</strong> = <code>if_else(Fuel==2, ATP (or GTP) made directly × 2, ATP (or GTP) made directly + NADH produced × 2.5 + FADH₂ produced × 1.5)</code></li><li><strong>Energy captured</strong> = <code>(ATP (or GTP) made directly + NADH produced × 2.5 + FADH₂ produced × 1.5) × 30.5</code></li></ul><p>Any one of Total ATP and Energy captured can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Fuel from 1 to 2, leaving every other box alone. The panel moves from &lt;strong&gt;Total ATP&lt;/strong&gt; 32 ATP and &lt;strong&gt;Energy captured&lt;/strong&gt; 976 kJ/mol to &lt;strong&gt;Total ATP&lt;/strong&gt; 8 ATP and &lt;strong&gt;Energy captured&lt;/strong&gt; 976 kJ/mol.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Total ATP and Energy captured are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Fuel is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Fuel, NADH produced and FADH₂ produced is what you already know and Total ATP and Energy captured is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/protein-gravy-calculator">Protein GRAVY (Hydropathy) Calculator</a>, <a href="/biology/protein-hydrodynamic-radius">Protein Hydrodynamic Radius Calculator</a> and <a href="/biology/protein-isoelectric-point">Protein Isoelectric Point Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the ATP / Cellular Respiration Energy Yield calculator work out?', 'a' => <<<'TXT'
            Total ATP and Energy captured, from Fuel, ATP (or GTP) made directly, NADH produced and FADH₂ produced. The relationship is Total ATP = if_else(Fuel==2, ATP (or GTP) made directly × 2, ATP (or GTP) made directly + NADH produced × 2.5 + FADH₂ produced × 1.5).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fuel, NADH produced, FADH₂ produced, ATP (or GTP) made directly. Enter fuel, nadh and fadh2; Total ATP is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Total ATP and Energy captured blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total ATP = 32 ATP and Energy captured = 976 kJ/mol. That comes from the page's own defaults, entered in Fuel; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Total ATP is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Fuel blank and the page solves for it, reporting Total ATP instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total ATP at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/protein-gravy-calculator', 'name' => 'Protein GRAVY (Hydropathy) Calculator'],
            ['path' => '/biology/protein-hydrodynamic-radius', 'name' => 'Protein Hydrodynamic Radius Calculator'],
            ['path' => '/biology/protein-isoelectric-point', 'name' => 'Protein Isoelectric Point Calculator'],
        ],
        'authors' => [],
    ],
];
