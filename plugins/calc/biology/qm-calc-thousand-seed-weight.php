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
    'meta' => ['title' => 'Thousand Seed Weight Calculator — Formula & Results', 'description' => 'Thousand Seed Weight Calculator turns sample mass and seeds in the sample into seeds per kilogram. Every box can be solved for, not only the one in the title.', 'h1' => 'Thousand Seed Weight Calculator', 'updated' => '2026-10-29'],
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
        Thousand Seed Weight works out Thousand seed weight and Seeds per kilogram from Sample mass, Seeds in the sample and Moisture content. There is no hidden constant here: change thousand seed weight and sample mass moves with it. The main result, Thousand seed weight, is reported in g.
        TXT,
        'sections' => [
            ['title' => 'How the Thousand Seed Weight calculator works', 'html' => <<<'TXT'
            <p>Thousand Seed Weight answers one question from 3 numbers, and the answer is Thousand seed weight, Seeds per kilogram and TSW at 12% moisture.</p><p>Written with the labels from the form, Thousand seed weight = Sample mass ÷ Seeds in the sample × 1000.</p><p>What comes back is Thousand seed weight, Seeds per kilogram, TSW at 12% moisture and Seeds per gram — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Sample mass</strong> — in g</li><li><strong>Seeds in the sample</strong> — in seeds</li><li><strong>Moisture content</strong> — in %. Optional — standard is 12–14%</li></ul><p>What you get back is Thousand seed weight in g, Seeds per kilogram in seeds/kg, TSW at 12% moisture in g, Seeds per gram, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Sample mass = 4.2 g, Seeds in the sample = 100 seeds and Moisture content = 12 % gives <strong>Thousand seed weight</strong> = 42 g, <strong>Seeds per kilogram</strong> = 23810 seeds/kg, <strong>TSW at 12% moisture</strong> = 42 g and <strong>Seeds per gram</strong> = 23.81.</p><ul><li><strong>Thousand seed weight</strong> = 42 g</li><li><strong>Seeds per kilogram</strong> = 23810 seeds/kg</li><li><strong>TSW at 12% moisture</strong> = 42 g</li><li><strong>Seeds per gram</strong> = 23.81</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Thousand seed weight</strong> = <code>Sample mass ÷ Seeds in the sample × 1000</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Thousand seed weight</strong> = 42, <strong>Seeds per kilogram</strong> = 23810, <strong>TSW at 12% moisture</strong> = 42 and <strong>Seeds per gram</strong> = 23.81. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Thousand seed weight is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Thousand seed weight</strong> = <code>Sample mass ÷ Seeds in the sample × 1000</code></li><li><strong>Seeds per kilogram</strong> = <code>1000 ÷ (Sample mass ÷ Seeds in the sample × 1000) × 1000</code></li><li><strong>TSW at 12% moisture</strong> = <code>Sample mass ÷ Seeds in the sample × 1000 × (88 ÷ (100 − Moisture content))</code></li><li><strong>Seeds per gram</strong> = <code>Seeds in the sample ÷ Sample mass</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Thousand seed weight</strong> = <code>Sample mass ÷ Seeds in the sample × 1000</code> — the form to use when Sample mass and Seeds in the sample are the values you have.</li><li><strong>Seeds per kilogram</strong> = <code>1000 ÷ (Sample mass ÷ Seeds in the sample × 1000) × 1000</code> — the form to use when Sample mass and Seeds in the sample are the values you have.</li><li><strong>TSW at 12% moisture</strong> = <code>Sample mass ÷ Seeds in the sample × 1000 × (88 ÷ (100 − Moisture content))</code> — the form to use when Sample mass, Seeds in the sample and Moisture content are the values you have.</li><li><strong>Seeds per gram</strong> = <code>Seeds in the sample ÷ Sample mass</code> — the form to use when Seeds in the sample and Sample mass are the values you have.</li></ul><p>Any one of Thousand seed weight, Seeds per kilogram and TSW at 12% moisture can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Sample mass from 4.2 to 8.4, leaving every other box alone. The panel moves from <strong>Thousand seed weight</strong> 42 g, <strong>Seeds per kilogram</strong> 23810 seeds/kg, <strong>TSW at 12% moisture</strong> 42 g and <strong>Seeds per gram</strong> 23.81 to <strong>Thousand seed weight</strong> 84 g, <strong>Seeds per kilogram</strong> 11905 seeds/kg, <strong>TSW at 12% moisture</strong> 84 g and <strong>Seeds per gram</strong> 11.9.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Thousand seed weight, Seeds per kilogram and TSW at 12% moisture are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Sample mass left as a guess.</strong> Anything typed into Sample mass is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Seeds in the sample left as a guess.</strong> Anything typed into Seeds in the sample is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Moisture content left as a guess.</strong> Anything typed into Moisture content is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Sample mass and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Sample mass</strong> is measured in g. It feeds Thousand seed weight, Seeds per kilogram and TSW at 12% moisture. Have it to hand before you start: Sample mass is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Seeds in the sample</strong> is measured in seeds. It feeds Thousand seed weight, Seeds per kilogram and TSW at 12% moisture. Have it to hand before you start: Seeds in the sample is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Moisture content</strong> is measured in %. Optional — standard is 12–14%. It feeds TSW at 12% moisture. Have it to hand before you start: Moisture content is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Thousand seed weight</strong> is a plain number and the page's own defaults put it at 42. The value follows from Sample mass and Seeds in the sample. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Seeds per kilogram</strong> is a plain number and the page's own defaults put it at 23810. The value follows from Sample mass and Seeds in the sample. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>TSW at 12% moisture</strong> is a plain number and the page's own defaults put it at 42. The value follows from Sample mass, Seeds in the sample and Moisture content. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Seeds per gram</strong> is a plain number and the page's own defaults put it at 23.81. The value follows from Seeds in the sample and Sample mass. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Thousand seed weight</th><th>Seeds per kilogram</th><th>TSW at 12% moisture</th><th>Seeds per gram</th></tr></thead><tbody><tr><td><strong>Sample mass</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>+10%</td><td>-9.09%</td></tr><tr><td><strong>Seeds in the sample</strong> +10%</td><td>-9.09%</td><td>+10%</td><td>-9.09%</td><td>+10%</td></tr><tr><td><strong>Moisture content</strong> +10%</td><td>+0%</td><td>+0%</td><td>+1.38%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Sample mass: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Sample mass = 2.1 g, Seeds in the sample = 50 seeds and Moisture content = 6 %, the answer is <strong>Thousand seed weight</strong> = 42 g, <strong>Seeds per kilogram</strong> = 23810 seeds/kg, <strong>TSW at 12% moisture</strong> = 39.32 g and <strong>Seeds per gram</strong> = 23.81.</li><li>With Sample mass = 12.6 g, Seeds in the sample = 100 seeds and Moisture content = 12 %, the answer is <strong>Thousand seed weight</strong> = 126 g, <strong>Seeds per kilogram</strong> = 7937 seeds/kg, <strong>TSW at 12% moisture</strong> = 126 g and <strong>Seeds per gram</strong> = 7.94.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Thousand seed weight is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Sample mass, Seeds in the sample and Moisture content are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
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
            Sample mass (g), Seeds in the sample (seeds), Moisture content (%). Enter sample mass, seeds in the sample and moisture content; Thousand seed weight is the box to leave alone unless it is the value you came for.
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
