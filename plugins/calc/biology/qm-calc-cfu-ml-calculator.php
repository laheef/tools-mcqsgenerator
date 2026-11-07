<?php

/**
 * CFU/mL Calculator
 * /biology/cfu-ml-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CFU/mL Calculator',
    'meta' => ['title' => 'CFU/mL Calculator: Formula, Steps & Results', 'description' => 'A CFU/mL count comes from one plate: clumps form a single colony, so the count is colony-forming units, not cells. Free cfu/ml calculator: enter your values a', 'h1' => 'CFU/mL Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'colonies',
                            'label' => 'Colonies counted',
                            'type' => 'number',
                            'suffix' => 'CFU',
                            'help' => 'Countable range is 30–300',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '148',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Volume plated',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'help' => '0.1 mL for a spread plate',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.1',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution factor of the plated sample',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '10⁶ for a 10⁻⁶ dilution',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000000',
                        ],
                        [
                            'name' => 'cfu_ml',
                            'label' => 'CFU per mL',
                            'type' => 'number',
                            'suffix' => 'CFU/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cfu_log',
                            'label' => 'log₁₀(CFU/mL)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cfu_100',
                            'label' => 'CFU per 100 mL',
                            'type' => 'number',
                            'suffix' => 'CFU/100 mL',
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
            'title' => 'Count',
            'results' => ['cfu_ml' => 'colonies/volume*dilution', 'cfu_log' => 'log10(colonies/volume*dilution)', 'cfu_100' => 'colonies/volume*dilution*100', 'dilution' => 'cfu_ml*volume/colonies'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Colonies counted, Volume plated and Dilution factor of the plated sample into CFU/mL and the answer comes back as CFU per mL and log₁₀(CFU/mL). Nothing is looked up on this page: CFU per mL is computed from Colonies counted and the other boxes, so an unusual pair of values gives an honest answer rather than an error. CFU per mL is opened in CFU/mL; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the CFU/mL calculator works', 'html' => <<<'TXT'
            <p>The CFU/mL calculator applies one relationship to 3 numbers and reports CFU per mL, log₁₀(CFU/mL) and CFU per 100 mL.</p><p>In the form&#039;s own words, CFU per mL = Colonies counted ÷ Volume plated × Dilution factor of the plated sample.</p><p>The result panel carries CFU per mL, log₁₀(CFU/mL) and CFU per 100 mL, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Colonies counted</strong> — in CFU. Countable range is 30–300</li><li><strong>Volume plated</strong> — in mL. 0.1 mL for a spread plate</li><li><strong>Dilution factor of the plated sample</strong> — in ×. 10⁶ for a 10⁻⁶ dilution</li></ul><p>The answers come back as CFU per mL in CFU/mL, log₁₀(CFU/mL), CFU per 100 mL in CFU/100 mL. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as CFU per mL is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>CFU per mL</strong> = <code>Colonies counted ÷ Volume plated × Dilution factor of the plated sample</code></li><li><strong>log₁₀(CFU/mL)</strong> = <code>log₁₀(Colonies counted ÷ Volume plated × Dilution factor of the plated sample)</code></li><li><strong>CFU per 100 mL</strong> = <code>Colonies counted ÷ Volume plated × Dilution factor of the plated sample × 100</code></li><li><strong>Dilution factor of the plated sample</strong> = <code>CFU per mL × Volume plated ÷ Colonies counted</code></li></ul><p>Any one of CFU per mL, log₁₀(CFU/mL) and CFU per 100 mL can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> CFU per mL, log₁₀(CFU/mL) and CFU per 100 mL are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Colonies counted is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Colonies counted, Volume plated and Dilution factor of the plated sample and the number you are missing is CFU per mL and log₁₀(CFU/mL).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/q10-temperature-coefficient">Q10 Temperature Coefficient Calculator</a>, <a href="/biology/qpcr-efficiency">qPCR efficiency Calculator</a> and <a href="/biology/quadrat-sampling-density">Quadrat Sampling Density Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CFU/mL calculator work out?', 'a' => <<<'TXT'
            CFU per mL, log₁₀(CFU/mL) and CFU per 100 mL, from Colonies counted, Volume plated and Dilution factor of the plated sample. The relationship is CFU per mL = Colonies counted ÷ Volume plated × Dilution factor of the plated sample.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Colonies counted (CFU), Volume plated (mL), Dilution factor of the plated sample (×). Enter colonies, volume and dilution; CFU per mL is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of CFU per mL, log₁₀(CFU/mL), CFU per 100 mL and Dilution factor of the plated sample blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally CFU per mL is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Colonies counted left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. CFU per mL keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/q10-temperature-coefficient', 'name' => 'Q10 Temperature Coefficient Calculator'],
            ['path' => '/biology/qpcr-efficiency', 'name' => 'qPCR efficiency Calculator'],
            ['path' => '/biology/quadrat-sampling-density', 'name' => 'Quadrat Sampling Density Calculator'],
        ],
        'authors' => [],
    ],
];
