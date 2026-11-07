<?php

/**
 * Buffer pH Calculator (Henderson–Hasselbalch)
 * /biology/henderson-hasselbalch-buffer
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Buffer pH Calculator (Henderson–Hasselbalch)',
    'meta' => ['title' => 'Buffer pH Calculator (Henderson–Hasselbalch)', 'description' => <<<'TXT'
    The pH of a buffer depends on the ratio of its conjugate base to its acid, not on how concentrated it is: pH = pKa + log₁₀([A⁻]/[HA]). Free buffer ph (henders
    TXT, 'h1' => 'Buffer pH Calculator (Henderson–Hasselbalch)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'pka',
                            'label' => 'pKa of the buffer',
                            'type' => 'number',
                            'help' => 'Phosphate 7.2, Tris 8.06, HEPES 7.55 at 25 °C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.2',
                        ],
                        [
                            'name' => 'ph',
                            'label' => 'Target pH',
                            'type' => 'number',
                            'suffix' => 'pH',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.4',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Base ÷ acid ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'acid_pct',
                            'label' => 'Acid share',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'base_pct',
                            'label' => 'Base share',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'delta',
                            'label' => 'pH − pKa',
                            'type' => 'number',
                            'suffix' => 'pH',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_mm',
                            'label' => 'Total buffer concentration',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'help' => 'Optional',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'acid_mm',
                            'label' => 'Concentration of the acid form',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'base_mm',
                            'label' => 'Concentration of the base form',
                            'type' => 'number',
                            'suffix' => 'mM',
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
            'title' => 'Ratio',
            'results' => ['ratio' => '10^(ph-pka)', 'ph' => 'pka+log10(ratio)', 'delta' => 'ph-pka'],
        ],
        [
            'title' => 'Mixture',
            'results' => ['acid_pct' => '100/(1+10^(ph-pka))', 'base_pct' => '100*10^(ph-pka)/(1+10^(ph-pka))', 'acid_mm' => 'total_mm/(1+10^(ph-pka))', 'base_mm' => 'total_mm*10^(ph-pka)/(1+10^(ph-pka))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Buffer pH Calculator (Henderson–Hasselbalch) turns pKa of the buffer, Target pH and Total buffer concentration into Base ÷ acid ratio and Acid share. Nothing is looked up on this page: Base ÷ acid ratio is computed from pKa of the buffer and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Buffer pH Calculator (Henderson–Hasselbalch) calculator works', 'html' => <<<'TXT'
            <p>The Buffer pH Calculator (Henderson–Hasselbalch) calculator applies one relationship to 3 numbers and reports Base ÷ acid ratio, Acid share and Base share.</p><p>Written with the labels from the form, Base ÷ acid ratio = 10 ^ (Target pH − pKa of the buffer).</p><p>The answers are Base ÷ acid ratio, Acid share, Base share and pH − pKa; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>pKa of the buffer</strong> — a plain number, no unit. Phosphate 7.2, Tris 8.06, HEPES 7.55 at 25 °C</li><li><strong>Target pH</strong> — in pH</li><li><strong>Total buffer concentration</strong> — in mM. Optional</li></ul><p>The answers come back as Base ÷ acid ratio, Acid share in %, Base share in %, pH − pKa in pH, Concentration of the acid form in mM, Concentration of the base form in mM. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Base ÷ acid ratio takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Base ÷ acid ratio</strong> = <code>10 ^ (Target pH − pKa of the buffer)</code></li><li><strong>Target pH</strong> = <code>pKa of the buffer + log₁₀(Base ÷ acid ratio)</code></li><li><strong>pH − pKa</strong> = <code>Target pH − pKa of the buffer</code></li><li><strong>Acid share</strong> = <code>100 ÷ (1 + 10 ^ (Target pH − pKa of the buffer))</code></li><li><strong>Base share</strong> = <code>100 × 10 ^ (Target pH − pKa of the buffer) ÷ (1 + 10 ^ (Target pH − pKa of the buffer))</code></li><li><strong>Concentration of the acid form</strong> = <code>Total buffer concentration ÷ (1 + 10 ^ (Target pH − pKa of the buffer))</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Base ÷ acid ratio, Target pH and pH − pKa can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Base ÷ acid ratio, Acid share and Base share are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert pKa of the buffer to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when pKa of the buffer, Target pH and Total buffer concentration is what you already know and Base ÷ acid ratio and Acid share is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/restriction-enzyme-finder">Restriction Enzyme Finder Calculator</a>, <a href="/biology/reverse-complement">Reverse Complement Calculator</a> and <a href="/biology/reverse-translate">Reverse Translate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Buffer pH Calculator (Henderson–Hasselbalch) calculator work out?', 'a' => <<<'TXT'
            Base ÷ acid ratio, Acid share, Base share and pH − pKa, from Target pH and pKa of the buffer. The relationship is Base ÷ acid ratio = 10 ^ (Target pH − pKa of the buffer).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            pKa of the buffer, Target pH (pH), Total buffer concentration (mM). Fill pka, ph and total_mm and leave Base ÷ acid ratio empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Base ÷ acid ratio, Target pH, pH − pKa and Acid share can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Base ÷ acid ratio is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave pKa of the buffer blank and the page solves for it, reporting Base ÷ acid ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Base ÷ acid ratio keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/restriction-enzyme-finder', 'name' => 'Restriction Enzyme Finder Calculator'],
            ['path' => '/biology/reverse-complement', 'name' => 'Reverse Complement Calculator'],
            ['path' => '/biology/reverse-translate', 'name' => 'Reverse Translate Calculator'],
        ],
        'authors' => [],
    ],
];
