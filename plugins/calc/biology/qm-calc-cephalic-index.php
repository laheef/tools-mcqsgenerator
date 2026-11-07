<?php

/**
 * Cephalic Index Calculator
 * /biology/cephalic-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cephalic Index Calculator',
    'meta' => ['title' => 'Cephalic Index Calculator — Formula & Results', 'description' => <<<'TXT'
    Cephalic Index works out Cephalic index and Width to length ratio from Head width (biparietal) and Head length (fronto-occipital). There is no hidden constant…
    TXT, 'h1' => 'Cephalic Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Head width (biparietal)',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Widest transverse diameter of the head',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '150',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Head length (fronto-occipital)',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Glabella to the most posterior point',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '190',
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Cephalic index',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Width to length ratio',
                            'type' => 'number',
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
            'title' => 'Cephalic index',
            'results' => ['index' => 'width/length*100', 'ratio' => 'width/length', 'width' => 'index*length/100', 'length' => 'width/index*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cephalic Index works out Cephalic index and Width to length ratio from Head width (biparietal) and Head length (fronto-occipital). There is no hidden constant here: change Cephalic index and Head width (biparietal) moves with it. The main result, Cephalic index, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Cephalic Index calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cephalic Index: it takes 2 numbers and reports Cephalic index and Width to length ratio.</p><p>The relationship it solves reads Cephalic index = Head width (biparietal) ÷ Head length (fronto-occipital) × 100.</p><p>What comes back is Cephalic index and Width to length ratio — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Head width (biparietal)</strong> — in mm. Widest transverse diameter of the head</li><li><strong>Head length (fronto-occipital)</strong> — in mm. Glabella to the most posterior point</li></ul><p>What you get back is Cephalic index in %, Width to length ratio, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Cephalic index is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cephalic index</strong> = <code>Head width (biparietal) ÷ Head length (fronto-occipital) × 100</code></li><li><strong>Width to length ratio</strong> = <code>Head width (biparietal) ÷ Head length (fronto-occipital)</code></li><li><strong>Head width (biparietal)</strong> = <code>Cephalic index × Head length (fronto-occipital) ÷ 100</code></li><li><strong>Head length (fronto-occipital)</strong> = <code>Head width (biparietal) ÷ Cephalic index × 100</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cephalic index, Width to length ratio and Head width (biparietal) can be the unknown.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cephalic index and Width to length ratio are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Head width (biparietal) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Head width (biparietal) and Head length (fronto-occipital) and the number you are missing is Cephalic index and Width to length ratio.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/net-primary-productivity">Net Primary Productivity Calculator</a>, <a href="/biology/net-reproductive-rate">Net Reproductive Rate (R₀) Calculator</a> and <a href="/biology/npk-fertilizer-blend">NPK Fertilizer Blend Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cephalic Index calculator work out?', 'a' => <<<'TXT'
            Cephalic index and Width to length ratio, from Head width (biparietal) and Head length (fronto-occipital). The relationship is Cephalic index = Head width (biparietal) ÷ Head length (fronto-occipital) × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Head width (biparietal) (mm), Head length (fronto-occipital) (mm). Enter width and length; Cephalic index is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Cephalic index, Width to length ratio, Head width (biparietal) and Head length (fronto-occipital) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Cephalic index is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Head width (biparietal) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Cephalic index keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/net-primary-productivity', 'name' => 'Net Primary Productivity Calculator'],
            ['path' => '/biology/net-reproductive-rate', 'name' => 'Net Reproductive Rate (R₀) Calculator'],
            ['path' => '/biology/npk-fertilizer-blend', 'name' => 'NPK Fertilizer Blend Calculator'],
        ],
        'authors' => [],
    ],
];
