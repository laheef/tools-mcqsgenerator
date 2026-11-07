<?php

/**
 * Coding Capacity of DNA Calculator
 * /biology/coding-capacity-of-dna
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Coding Capacity of DNA Calculator',
    'meta' => ['title' => 'Coding Capacity of DNA Calculator — Formula & Results', 'description' => 'Coding Capacity of DNA works out Amino acids encoded and Protein mass from Coding DNA length and Share that is coding. There is no hidden constant here…', 'h1' => 'Coding Capacity of DNA Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'bp',
                            'label' => 'Coding DNA length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'help' => 'Exons only',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1200',
                        ],
                        [
                            'name' => 'exons',
                            'label' => 'Share that is coding',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Less than 100 if introns or UTRs are counted',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'aa',
                            'label' => 'Amino acids encoded',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kda',
                            'label' => 'Protein mass',
                            'type' => 'number',
                            'suffix' => 'kDa',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'codons',
                            'label' => 'Codons',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bp_needed',
                            'label' => 'DNA needed for a 50 kDa protein',
                            'type' => 'number',
                            'suffix' => 'bp',
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
            'title' => 'Capacity',
            'results' => ['codons' => 'bp*exons/100/3', 'aa' => 'bp*exons/100/3-1', 'kda' => '(bp*exons/100/3-1)*0.11', 'bp_needed' => '50/0.11*3+3'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Coding Capacity of DNA works out Amino acids encoded and Protein mass from Coding DNA length and Share that is coding. There is no hidden constant here: change Amino acids encoded and Coding DNA length moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Coding Capacity of DNA calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Coding Capacity of DNA: it takes 2 numbers and reports Amino acids encoded, Protein mass and Codons.</p><p>The relationship it solves reads Codons = Coding DNA length × Share that is coding ÷ 100 ÷ 3.</p><p>The answers are Amino acids encoded, Protein mass, Codons and DNA needed for a 50 kDa protein; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Coding DNA length</strong> — in bp. Exons only</li><li><strong>Share that is coding</strong> — in %. Less than 100 if introns or UTRs are counted</li></ul><p>The result boxes are Amino acids encoded, Protein mass in kDa, Codons, DNA needed for a 50 kDa protein in bp; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Coding DNA length = 1200 bp and Share that is coding = 100 % — through the same formula and the panel reports &lt;strong&gt;Codons&lt;/strong&gt; = 400, &lt;strong&gt;Amino acids encoded&lt;/strong&gt; = 399, &lt;strong&gt;Protein mass&lt;/strong&gt; = 43.89 kDa and &lt;strong&gt;DNA needed for a 50 kDa protein&lt;/strong&gt; = 1367 bp.</p><ul><li><strong>Codons</strong> = 400</li><li><strong>Amino acids encoded</strong> = 399</li><li><strong>Protein mass</strong> = 43.89 kDa</li><li><strong>DNA needed for a 50 kDa protein</strong> = 1367 bp</li></ul><p>The line behind those figures is <strong>Codons</strong> = <code>Coding DNA length × Share that is coding ÷ 100 ÷ 3</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Codons&lt;/strong&gt; = 400, &lt;strong&gt;Amino acids encoded&lt;/strong&gt; = 399, &lt;strong&gt;Protein mass&lt;/strong&gt; = 43.89 and &lt;strong&gt;DNA needed for a 50 kDa protein&lt;/strong&gt; = 1367. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Amino acids encoded is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Codons</strong> = <code>Coding DNA length × Share that is coding ÷ 100 ÷ 3</code></li><li><strong>Amino acids encoded</strong> = <code>Coding DNA length × Share that is coding ÷ 100 ÷ 3 − 1</code></li><li><strong>Protein mass</strong> = <code>(Coding DNA length × Share that is coding ÷ 100 ÷ 3 − 1) × 0.11</code></li><li><strong>DNA needed for a 50 kDa protein</strong> = <code>50 ÷ 0.11 × 3 + 3</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Codons, Amino acids encoded and Protein mass can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Coding DNA length from 1200 to 2400, leaving every other box alone. The panel moves from &lt;strong&gt;Codons&lt;/strong&gt; 400, &lt;strong&gt;Amino acids encoded&lt;/strong&gt; 399, &lt;strong&gt;Protein mass&lt;/strong&gt; 43.89 kDa and &lt;strong&gt;DNA needed for a 50 kDa protein&lt;/strong&gt; 1367 bp to &lt;strong&gt;Codons&lt;/strong&gt; 800, &lt;strong&gt;Amino acids encoded&lt;/strong&gt; 799, &lt;strong&gt;Protein mass&lt;/strong&gt; 87.89 kDa and &lt;strong&gt;DNA needed for a 50 kDa protein&lt;/strong&gt; 1367 bp.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Amino acids encoded, Protein mass and Codons are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Coding DNA length is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Coding DNA length and Share that is coding measured, Amino acids encoded and Protein mass wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/western-blot-loading">Western Blot Protein Loading Calculator</a>, <a href="/biology/absorbance-transmittance">Absorbance to Transmittance Converter Calculator</a> and <a href="/biology/acid-base-balance">Acid–Base Balance (ABG) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Coding Capacity of DNA calculator work out?', 'a' => <<<'TXT'
            Amino acids encoded, Protein mass, Codons and DNA needed for a 50 kDa protein, from Coding DNA length and Share that is coding. The relationship is Codons = Coding DNA length × Share that is coding ÷ 100 ÷ 3.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Coding DNA length (bp), Share that is coding (%). Enter bp and exons; Amino acids encoded is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Codons, Amino acids encoded, Protein mass and DNA needed for a 50 kDa protein can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Codons = 400, Amino acids encoded = 399, Protein mass = 43.89 kDa and DNA needed for a 50 kDa protein = 1367 bp. Those are the defaults written into the form — move Coding DNA length and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Amino acids encoded is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Coding DNA length left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Amino acids encoded keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/western-blot-loading', 'name' => 'Western Blot Protein Loading Calculator'],
            ['path' => '/biology/absorbance-transmittance', 'name' => 'Absorbance to Transmittance Converter Calculator'],
            ['path' => '/biology/acid-base-balance', 'name' => 'Acid–Base Balance (ABG) Calculator'],
        ],
        'authors' => [],
    ],
];
