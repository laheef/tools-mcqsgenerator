<?php

/**
 * Linear DNA µg to pmol of Ends Converter
 * /biology/linear-dna-ends-ug-pmol
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Linear DNA µg to pmol of Ends Converter',
    'meta' => ['title' => 'Linear DNA µg to pmol of Ends Converter Calculator', 'description' => 'Linear DNA µg to pmol of Ends works out Ends and Ends per microgram from Length, Mass and Molecules. Ends is opened in pmol; the chip beside it switches to…', 'h1' => 'Linear DNA µg to pmol of Ends Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'mass_ug',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'pmol_ends',
                            'label' => 'Ends',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'help' => 'Twice the molar amount',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pmol',
                            'label' => 'Molecules',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'help' => 'Type either the mass or the molar amount',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ends_per_ug',
                            'label' => 'Ends per microgram',
                            'type' => 'number',
                            'suffix' => 'pmol/µg',
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
            'title' => 'Ends',
            'results' => [
                'pmol' => 'mass_ug*1000000/(660*length)',
                'mass_ug' => 'pmol*660*length/1000000',
                'pmol_ends' => '2*pmol',
                'ends_per_ug' => '2*1000000/(660*length)',
                'molecules' => 'pmol*602214076000',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Linear DNA µg to pmol of Ends works out Ends and Ends per microgram from Length, Mass and Molecules. Nothing is looked up on this page: Ends is computed from Length and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Ends is opened in pmol; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Linear DNA µg to pmol of Ends calculator works', 'html' => <<<'TXT'
            <p>The Linear DNA µg to pmol of Ends calculator applies one relationship to 3 numbers and reports Ends, Ends per microgram and Molecules.</p><p>In the form&#039;s own words, Molecules = Mass × 1000000 ÷ (660 × Length).</p><p>The answers are Ends, Ends per microgram and Molecules; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Length</strong> — in bp</li><li><strong>Mass</strong> — in µg</li><li><strong>Molecules</strong> — in pmol. Type either the mass or the molar amount</li></ul><p>The result boxes are Ends in pmol, Ends per microgram in pmol/µg, Molecules; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Length = 1000 bp gives &lt;strong&gt;Ends per microgram&lt;/strong&gt; = 3.03 pmol/µg.</p><ul><li><strong>Ends per microgram</strong> = 3.03 pmol/µg</li></ul><p>That is <strong>Molecules</strong> = <code>Mass × 1000000 ÷ (660 × Length)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Ends per microgram&lt;/strong&gt; = 3.03. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Ends is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Molecules</strong> = <code>Mass × 1000000 ÷ (660 × Length)</code></li><li><strong>Mass</strong> = <code>Molecules × 660 × Length ÷ 1000000</code></li><li><strong>Ends</strong> = <code>2 × Molecules</code></li><li><strong>Ends per microgram</strong> = <code>2 × 1000000 ÷ (660 × Length)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Molecules, Mass and Ends can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Length, from 1000 to 2000 — and the answers go from &lt;strong&gt;Ends per microgram&lt;/strong&gt; 3.03 pmol/µg to &lt;strong&gt;Ends per microgram&lt;/strong&gt; 1.52 pmol/µg.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Ends, Ends per microgram and Molecules are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Length to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Length, Mass and Molecules measured, Ends and Ends per microgram wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dna-copy-number">DNA copy number Calculator</a>, <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a> and <a href="/biology/dna-molarity-from-mass">DNA Molarity from Mass or A260 Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Linear DNA µg to pmol of Ends calculator work out?', 'a' => 'Ends, Ends per microgram and Molecules, from Mass and Length. The relationship is Molecules = Mass × 1000000 ÷ (660 × Length).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (bp), Mass (µg), Molecules (pmol). Enter length, mass_ug and pmol; Ends is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Molecules, Mass, Ends and Ends per microgram can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Ends per microgram = 3.03 pmol/µg. That comes from the page\'s own defaults, entered in Length; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Ends is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Length left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Ends keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dna-copy-number', 'name' => 'DNA copy number Calculator'],
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
            ['path' => '/biology/dna-molarity-from-mass', 'name' => 'DNA Molarity from Mass or A260 Calculator'],
        ],
        'authors' => [],
    ],
];
