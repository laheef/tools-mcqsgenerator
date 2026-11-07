<?php

/**
 * dsDNA µg to pmol Converter
 * /biology/dsdna-ug-to-pmol-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'dsDNA µg to pmol Converter',
    'meta' => ['title' => 'dsDNA µg to pmol Converter — Formula & Results', 'description' => 'Amount is opened in pmol; the chip beside it switches to any unit of the same quantity. A result box can be typed into, and doing so changes the question…', 'h1' => 'dsDNA µg to pmol Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'ug',
                            'label' => 'Mass of DNA',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'bp',
                            'label' => 'Fragment length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3000',
                        ],
                        [
                            'name' => 'pmol',
                            'label' => 'Amount',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ug_from_pmol',
                            'label' => 'Mass for 1 pmol',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ng_ul',
                            'label' => 'Concentration if in 50 µL',
                            'type' => 'number',
                            'suffix' => 'ng/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'molecules',
                            'label' => 'Molecules',
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
            'title' => 'Conversion',
            'results' => ['pmol' => 'ug*1000000/(bp*660)', 'ug_from_pmol' => 'bp*660/1000000', 'ng_ul' => 'ug*1000/50', 'molecules' => 'ug*0.000000000001/660/bp*602200000000000000000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        dsDNA µg to pmol turns Mass of DNA and Fragment length into Amount and Mass for 1 pmol. Nothing is looked up on this page: Amount is computed from Mass of DNA and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Amount is opened in pmol; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the dsDNA µg to pmol calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind dsDNA µg to pmol: it takes 2 numbers and reports Amount, Mass for 1 pmol and Concentration if in 50 µL.</p><p>Written with the labels from the form, Amount = Mass of DNA × 1000000 ÷ (Fragment length × 660).</p><p>The result panel carries Amount, Mass for 1 pmol, Concentration if in 50 µL and Molecules, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Mass of DNA</strong> — in µg</li><li><strong>Fragment length</strong> — in bp</li></ul><p>The answers come back as Amount in pmol, Mass for 1 pmol in µg, Concentration if in 50 µL in ng/µL, Molecules. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Mass of DNA = 1 µg and Fragment length = 3000 bp; the answers are &lt;strong&gt;Amount&lt;/strong&gt; = 0.5051 pmol, &lt;strong&gt;Mass for 1 pmol&lt;/strong&gt; = 1.98 µg, &lt;strong&gt;Concentration if in 50 µL&lt;/strong&gt; = 20 ng/µL and &lt;strong&gt;Molecules&lt;/strong&gt; = 304141.</p><ul><li><strong>Amount</strong> = 0.5051 pmol</li><li><strong>Mass for 1 pmol</strong> = 1.98 µg</li><li><strong>Concentration if in 50 µL</strong> = 20 ng/µL</li><li><strong>Molecules</strong> = 304141</li></ul><p>The line behind those figures is <strong>Amount</strong> = <code>Mass of DNA × 1000000 ÷ (Fragment length × 660)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Amount&lt;/strong&gt; = 0.5051, &lt;strong&gt;Mass for 1 pmol&lt;/strong&gt; = 1.98, &lt;strong&gt;Concentration if in 50 µL&lt;/strong&gt; = 20 and &lt;strong&gt;Molecules&lt;/strong&gt; = 304141 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Amount takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Amount</strong> = <code>Mass of DNA × 1000000 ÷ (Fragment length × 660)</code></li><li><strong>Mass for 1 pmol</strong> = <code>Fragment length × 660 ÷ 1000000</code></li><li><strong>Concentration if in 50 µL</strong> = <code>Mass of DNA × 1000 ÷ 50</code></li><li><strong>Molecules</strong> = <code>Mass of DNA × 0.000000000001 ÷ 660 ÷ Fragment length × 602200000000000000000000</code></li></ul><p>Any one of Amount, Mass for 1 pmol and Concentration if in 50 µL can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Mass of DNA, from 1 to 2 — and the answers go from &lt;strong&gt;Amount&lt;/strong&gt; 0.5051 pmol, &lt;strong&gt;Mass for 1 pmol&lt;/strong&gt; 1.98 µg, &lt;strong&gt;Concentration if in 50 µL&lt;/strong&gt; 20 ng/µL and &lt;strong&gt;Molecules&lt;/strong&gt; 304141 to &lt;strong&gt;Amount&lt;/strong&gt; 1.01 pmol, &lt;strong&gt;Mass for 1 pmol&lt;/strong&gt; 1.98 µg, &lt;strong&gt;Concentration if in 50 µL&lt;/strong&gt; 40 ng/µL and &lt;strong&gt;Molecules&lt;/strong&gt; 608283.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Amount, Mass for 1 pmol and Concentration if in 50 µL are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Mass of DNA is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Mass of DNA and Fragment length measured, Amount and Mass for 1 pmol wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/reverse-complement">Reverse Complement Calculator</a>, <a href="/biology/reverse-translate">Reverse Translate Calculator</a> and <a href="/biology/sds-page-gel">SDS-PAGE Gel Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the dsDNA µg to pmol calculator work out?', 'a' => <<<'TXT'
            Amount, Mass for 1 pmol, Concentration if in 50 µL and Molecules, from Mass of DNA and Fragment length. The relationship is Amount = Mass of DNA × 1000000 ÷ (Fragment length × 660).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass of DNA (µg), Fragment length (bp). Enter ug and bp; Amount is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Amount, Mass for 1 pmol, Concentration if in 50 µL and Molecules blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Amount = 0.5051 pmol, Mass for 1 pmol = 1.98 µg, Concentration if in 50 µL = 20 ng/µL and Molecules = 304141. That comes from the page's own defaults, entered in Mass of DNA; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Amount is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Mass of DNA left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Amount keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/reverse-complement', 'name' => 'Reverse Complement Calculator'],
            ['path' => '/biology/reverse-translate', 'name' => 'Reverse Translate Calculator'],
            ['path' => '/biology/sds-page-gel', 'name' => 'SDS-PAGE Gel Calculator'],
        ],
        'authors' => [],
    ],
];
