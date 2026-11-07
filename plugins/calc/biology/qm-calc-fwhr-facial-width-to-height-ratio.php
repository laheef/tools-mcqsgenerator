<?php

/**
 * FWHR (Facial Width-to-Height Ratio) Calculator
 * /biology/fwhr-facial-width-to-height-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'FWHR (Facial Width-to-Height Ratio) Calculator',
    'meta' => ['title' => 'FWHR (Facial Width-to-Height Ratio) Calculator', 'description' => 'The arithmetic is the whole method: Facial width-to-height ratio is worked out from Bizygomatic width by one formula, applied once. The empty box becomes the…', 'h1' => 'FWHR (Facial Width-to-Height Ratio) Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Bizygomatic width',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Widest point of the face, cheekbone to cheekbone',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '138',
                        ],
                        [
                            'name' => 'height',
                            'label' => 'Upper face height',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Brow (nasion) to the upper lip (prosthion)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '98',
                        ],
                        [
                            'name' => 'fwhr',
                            'label' => 'Facial width-to-height ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fwhr_100',
                            'label' => 'FWHR scaled ×100',
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
            'title' => 'FWHR',
            'results' => ['fwhr' => 'width/height', 'fwhr_100' => 'width/height*100', 'width' => 'fwhr*height', 'height' => 'width/fwhr'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        FWHR (Facial Width-to-Height Ratio) takes Bizygomatic width and Upper face height and returns Facial width-to-height ratio and FWHR scaled ×100. The arithmetic is the whole method: Facial width-to-height ratio is worked out from Bizygomatic width by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the FWHR (Facial Width-to-Height Ratio) calculator works', 'html' => <<<'TXT'
            <p>FWHR (Facial Width-to-Height Ratio) answers one question from 2 numbers, and the answer is Facial width-to-height ratio and FWHR scaled ×100.</p><p>The relationship it solves reads Facial width-to-height ratio = Bizygomatic width ÷ Upper face height.</p><p>The result panel carries Facial width-to-height ratio and FWHR scaled ×100, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Bizygomatic width</strong> — in mm. Widest point of the face, cheekbone to cheekbone</li><li><strong>Upper face height</strong> — in mm. Brow (nasion) to the upper lip (prosthion)</li></ul><p>The result boxes are Facial width-to-height ratio, FWHR scaled ×100; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Facial width-to-height ratio takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Facial width-to-height ratio</strong> = <code>Bizygomatic width ÷ Upper face height</code></li><li><strong>FWHR scaled ×100</strong> = <code>Bizygomatic width ÷ Upper face height × 100</code></li><li><strong>Bizygomatic width</strong> = <code>Facial width-to-height ratio × Upper face height</code></li><li><strong>Upper face height</strong> = <code>Bizygomatic width ÷ Facial width-to-height ratio</code></li></ul><p>Any one of Facial width-to-height ratio, FWHR scaled ×100 and Bizygomatic width can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Facial width-to-height ratio and FWHR scaled ×100 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Bizygomatic width is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Bizygomatic width and Upper face height is what you already know and Facial width-to-height ratio and FWHR scaled ×100 is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/od260-nucleic-acid-concentration">OD260 to Nucleic Acid Concentration Calculator</a>, <a href="/biology/od600-to-cell-density">OD600 to Cell Density Calculator</a> and <a href="/biology/genetic-odds-ratio">Odds Ratio for Genetics Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the FWHR (Facial Width-to-Height Ratio) calculator work out?', 'a' => <<<'TXT'
            Facial width-to-height ratio and FWHR scaled ×100, from Bizygomatic width and Upper face height. The relationship is Facial width-to-height ratio = Bizygomatic width ÷ Upper face height.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Bizygomatic width (mm), Upper face height (mm). Enter width and height; Facial width-to-height ratio is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Facial width-to-height ratio, FWHR scaled ×100, Bizygomatic width and Upper face height blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Facial width-to-height ratio is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Bizygomatic width blank and the page solves for it, reporting Facial width-to-height ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Facial width-to-height ratio keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/od260-nucleic-acid-concentration', 'name' => 'OD260 to Nucleic Acid Concentration Calculator'],
            ['path' => '/biology/od600-to-cell-density', 'name' => 'OD600 to Cell Density Calculator'],
            ['path' => '/biology/genetic-odds-ratio', 'name' => 'Odds Ratio for Genetics Calculator'],
        ],
        'authors' => [],
    ],
];
