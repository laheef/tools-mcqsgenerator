<?php

/**
 * Thousand Seed Weight Calculator
 * /biology/thousand-seed-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Thousand Seed Weight Calculator',
    'meta' => ['title' => 'Thousand Seed Weight Calculator — Formula & Results', 'description' => 'Thousand Seed Weight works out Thousand seed weight and Seeds per kilogram from Sample mass, Seeds in the sample and Moisture content. The answer typed back in.', 'h1' => 'Thousand Seed Weight Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'sample_mass',
                            'label' => 'Sample mass',
                            'type' => 'number',
                            'suffix' => 'g',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4.2',
                        ],
                        [
                            'name' => 'sample_count',
                            'label' => 'Seeds in the sample',
                            'type' => 'number',
                            'suffix' => 'seeds',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'moisture',
                            'label' => 'Moisture content',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Optional — standard is 12–14%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'tsw',
                            'label' => 'Thousand seed weight',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'seeds_kg',
                            'label' => 'Seeds per kilogram',
                            'type' => 'number',
                            'suffix' => 'seeds/kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tsw_dry',
                            'label' => 'TSW at 12% moisture',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'seed_per_g',
                            'label' => 'Seeds per gram',
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
            'title' => 'Seed weight',
            'results' => ['tsw' => 'sample_mass/sample_count*1000', 'seeds_kg' => '1000/(sample_mass/sample_count*1000)*1000', 'tsw_dry' => 'sample_mass/sample_count*1000*(88/(100-moisture))', 'seed_per_g' => 'sample_count/sample_mass'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Thousand Seed Weight works out Thousand seed weight and Seeds per kilogram from Sample mass, Seeds in the sample and Moisture content. There is no hidden constant here: change Thousand seed weight and Sample mass moves with it. The main result, Thousand seed weight, is reported in g.
        TXT,
        'sections' => [
            ['title' => 'How the Thousand Seed Weight calculator works', 'html' => <<<'TXT'
            <p>Thousand Seed Weight answers one question from 3 numbers, and the answer is Thousand seed weight, Seeds per kilogram and TSW at 12% moisture.</p><p>Written with the labels from the form, Thousand seed weight = Sample mass ÷ Seeds in the sample × 1000.</p><p>What comes back is Thousand seed weight, Seeds per kilogram, TSW at 12% moisture and Seeds per gram — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Sample mass</strong> — in g</li><li><strong>Seeds in the sample</strong> — in seeds</li><li><strong>Moisture content</strong> — in %. Optional — standard is 12–14%</li></ul><p>What you get back is Thousand seed weight in g, Seeds per kilogram in seeds/kg, TSW at 12% moisture in g, Seeds per gram, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Sample mass = 4.2 g, Seeds in the sample = 100 seeds and Moisture content = 12 % gives &lt;strong&gt;Thousand seed weight&lt;/strong&gt; = 42 g, &lt;strong&gt;Seeds per kilogram&lt;/strong&gt; = 23810 seeds/kg, &lt;strong&gt;TSW at 12% moisture&lt;/strong&gt; = 42 g and &lt;strong&gt;Seeds per gram&lt;/strong&gt; = 23.81.</p><ul><li><strong>Thousand seed weight</strong> = 42 g</li><li><strong>Seeds per kilogram</strong> = 23810 seeds/kg</li><li><strong>TSW at 12% moisture</strong> = 42 g</li><li><strong>Seeds per gram</strong> = 23.81</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Thousand seed weight</strong> = <code>Sample mass ÷ Seeds in the sample × 1000</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Thousand seed weight&lt;/strong&gt; = 42, &lt;strong&gt;Seeds per kilogram&lt;/strong&gt; = 23810, &lt;strong&gt;TSW at 12% moisture&lt;/strong&gt; = 42 and &lt;strong&gt;Seeds per gram&lt;/strong&gt; = 23.81. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Thousand seed weight is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Thousand seed weight</strong> = <code>Sample mass ÷ Seeds in the sample × 1000</code></li><li><strong>Seeds per kilogram</strong> = <code>1000 ÷ (Sample mass ÷ Seeds in the sample × 1000) × 1000</code></li><li><strong>TSW at 12% moisture</strong> = <code>Sample mass ÷ Seeds in the sample × 1000 × (88 ÷ (100 − Moisture content))</code></li><li><strong>Seeds per gram</strong> = <code>Seeds in the sample ÷ Sample mass</code></li></ul><p>Any one of Thousand seed weight, Seeds per kilogram and TSW at 12% moisture can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Sample mass from 4.2 to 8.4, leaving every other box alone. The panel moves from &lt;strong&gt;Thousand seed weight&lt;/strong&gt; 42 g, &lt;strong&gt;Seeds per kilogram&lt;/strong&gt; 23810 seeds/kg, &lt;strong&gt;TSW at 12% moisture&lt;/strong&gt; 42 g and &lt;strong&gt;Seeds per gram&lt;/strong&gt; 23.81 to &lt;strong&gt;Thousand seed weight&lt;/strong&gt; 84 g, &lt;strong&gt;Seeds per kilogram&lt;/strong&gt; 11905 seeds/kg, &lt;strong&gt;TSW at 12% moisture&lt;/strong&gt; 84 g and &lt;strong&gt;Seeds per gram&lt;/strong&gt; 11.9.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Thousand seed weight, Seeds per kilogram and TSW at 12% moisture are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Sample mass and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Sample mass, Seeds in the sample and Moisture content measured, Thousand seed weight and Seeds per kilogram wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dna-copy-number">DNA copy number Calculator</a>, <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a> and <a href="/biology/dna-molarity-from-mass">DNA Molarity from Mass or A260 Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Thousand Seed Weight calculator work out?', 'a' => <<<'TXT'
            Thousand seed weight, Seeds per kilogram, TSW at 12% moisture and Seeds per gram, from Sample mass and Seeds in the sample. The relationship is Thousand seed weight = Sample mass ÷ Seeds in the sample × 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sample mass (g), Seeds in the sample (seeds), Moisture content (%). Enter sample_mass, sample_count and moisture; Thousand seed weight is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Thousand seed weight, Seeds per kilogram, TSW at 12% moisture and Seeds per gram blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Thousand seed weight = 42 g, Seeds per kilogram = 23810 seeds/kg, TSW at 12% moisture = 42 g and Seeds per gram = 23.81. Those are the defaults written into the form — move Sample mass and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Thousand seed weight is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Sample mass left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Thousand seed weight keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dna-copy-number', 'name' => 'DNA copy number Calculator'],
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
            ['path' => '/biology/dna-molarity-from-mass', 'name' => 'DNA Molarity from Mass or A260 Calculator'],
        ],
        'authors' => [],
    ],
];
