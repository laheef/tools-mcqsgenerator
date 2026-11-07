<?php

/**
 * Transfection Setup Calculator
 * /biology/transfection-setup
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Transfection Setup Calculator',
    'meta' => ['title' => 'Transfection Setup Calculator — Formula & Results', 'description' => 'Transfection Setup turns DNA in the reference well, Reagent in the reference well and Diluent per reference well into DNA per batch to make and Reagent for…', 'h1' => 'Transfection Setup Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'dna_ref',
                            'label' => 'DNA in the reference well',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'reagent_ref',
                            'label' => 'Reagent in the reference well',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.5',
                        ],
                        [
                            'name' => 'diluent_ref',
                            'label' => 'Diluent per reference well',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'wells',
                            'label' => 'Wells (or vessels) needed',
                            'type' => 'number',
                            'help' => 'Add 10% for pipetting loss',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                        [
                            'name' => 'dna_batch',
                            'label' => 'DNA per batch to make',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'reagent_batch',
                            'label' => 'Reagent for the batch',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diluent_batch',
                            'label' => 'Diluent for the batch',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tube_total',
                            'label' => 'Total complex volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_well',
                            'label' => 'Volume of complex per well',
                            'type' => 'number',
                            'suffix' => 'µL',
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
            'title' => 'Setup',
            'results' => [
                'dna_batch' => 'dna_ref*wells*1.1',
                'reagent_batch' => 'reagent_ref*wells*1.1',
                'diluent_batch' => 'diluent_ref*wells*1.1',
                'tube_total' => '(reagent_ref+diluent_ref)*wells*1.1',
                'per_well' => '(reagent_ref+diluent_ref)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Transfection Setup turns DNA in the reference well, Reagent in the reference well and Diluent per reference well into DNA per batch to make and Reagent for the batch. It is a single relationship that reads DNA per batch to make out of DNA in the reference well, not a table of canned results keyed by them. Units for DNA per batch to make default to µg and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Transfection Setup calculator works', 'html' => <<<'TXT'
            <p>The Transfection Setup calculator applies one relationship to 4 numbers and reports DNA per batch to make, Reagent for the batch and Diluent for the batch.</p><p>Written with the labels from the form, DNA per batch to make = DNA in the reference well × Wells (or vessels) needed × 1.1.</p><p>The result panel carries DNA per batch to make, Reagent for the batch, Diluent for the batch and Total complex volume, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>DNA in the reference well</strong> — in µg</li><li><strong>Reagent in the reference well</strong> — in µL</li><li><strong>Diluent per reference well</strong> — in µL</li><li><strong>Wells (or vessels) needed</strong> — a plain number, no unit. Add 10% for pipetting loss</li></ul><p>What you get back is DNA per batch to make in µg, Reagent for the batch in µL, Diluent for the batch in µL, Total complex volume in µL, Volume of complex per well in µL, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, DNA in the reference well = 0.5 µg, Reagent in the reference well = 1.5 µL, Diluent per reference well = 50 µL and Wells (or vessels) needed = 24; the answers are &lt;strong&gt;DNA per batch to make&lt;/strong&gt; = 13.2 µg, &lt;strong&gt;Reagent for the batch&lt;/strong&gt; = 39.6 µL, &lt;strong&gt;Diluent for the batch&lt;/strong&gt; = 1320 µL, &lt;strong&gt;Total complex volume&lt;/strong&gt; = 1360 µL and &lt;strong&gt;Volume of complex per well&lt;/strong&gt; = 51.5 µL.</p><ul><li><strong>DNA per batch to make</strong> = 13.2 µg</li><li><strong>Reagent for the batch</strong> = 39.6 µL</li><li><strong>Diluent for the batch</strong> = 1320 µL</li><li><strong>Total complex volume</strong> = 1360 µL</li><li><strong>Volume of complex per well</strong> = 51.5 µL</li></ul><p>That is <strong>DNA per batch to make</strong> = <code>DNA in the reference well × Wells (or vessels) needed × 1.1</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;DNA per batch to make&lt;/strong&gt; = 13.2, &lt;strong&gt;Reagent for the batch&lt;/strong&gt; = 39.6, &lt;strong&gt;Diluent for the batch&lt;/strong&gt; = 1320, &lt;strong&gt;Total complex volume&lt;/strong&gt; = 1360 and &lt;strong&gt;Volume of complex per well&lt;/strong&gt; = 51.5 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: DNA per batch to make takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>DNA per batch to make</strong> = <code>DNA in the reference well × Wells (or vessels) needed × 1.1</code></li><li><strong>Reagent for the batch</strong> = <code>Reagent in the reference well × Wells (or vessels) needed × 1.1</code></li><li><strong>Diluent for the batch</strong> = <code>Diluent per reference well × Wells (or vessels) needed × 1.1</code></li><li><strong>Total complex volume</strong> = <code>(Reagent in the reference well + Diluent per reference well) × Wells (or vessels) needed × 1.1</code></li><li><strong>Volume of complex per well</strong> = <code>(Reagent in the reference well + Diluent per reference well)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>DNA per batch to make</strong> = <code>DNA in the reference well × Wells (or vessels) needed × 1.1</code> — the form to use when DNA in the reference well and Wells (or vessels) needed are the values you have.</li><li><strong>Reagent for the batch</strong> = <code>Reagent in the reference well × Wells (or vessels) needed × 1.1</code> — the form to use when Reagent in the reference well and Wells (or vessels) needed are the values you have.</li><li><strong>Diluent for the batch</strong> = <code>Diluent per reference well × Wells (or vessels) needed × 1.1</code> — the form to use when Diluent per reference well and Wells (or vessels) needed are the values you have.</li><li><strong>Total complex volume</strong> = <code>(Reagent in the reference well + Diluent per reference well) × Wells (or vessels) needed × 1.1</code> — the form to use when Reagent in the reference well, Diluent per reference well and Wells (or vessels) needed are the values you have.</li><li><strong>Volume of complex per well</strong> = <code>(Reagent in the reference well + Diluent per reference well)</code> — the form to use when Reagent in the reference well and Diluent per reference well are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of DNA per batch to make, Reagent for the batch and Diluent for the batch can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double DNA in the reference well from 0.5 to 1, leaving every other box alone. The panel moves from &lt;strong&gt;DNA per batch to make&lt;/strong&gt; 13.2 µg, &lt;strong&gt;Reagent for the batch&lt;/strong&gt; 39.6 µL, &lt;strong&gt;Diluent for the batch&lt;/strong&gt; 1320 µL, &lt;strong&gt;Total complex volume&lt;/strong&gt; 1360 µL and &lt;strong&gt;Volume of complex per well&lt;/strong&gt; 51.5 µL to &lt;strong&gt;DNA per batch to make&lt;/strong&gt; 26.4 µg, &lt;strong&gt;Reagent for the batch&lt;/strong&gt; 39.6 µL, &lt;strong&gt;Diluent for the batch&lt;/strong&gt; 1320 µL, &lt;strong&gt;Total complex volume&lt;/strong&gt; 1360 µL and &lt;strong&gt;Volume of complex per well&lt;/strong&gt; 51.5 µL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with DNA per batch to make, Reagent for the batch and Diluent for the batch are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>DNA in the reference well left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If DNA in the reference well is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Reagent in the reference well left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Reagent in the reference well is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Diluent per reference well left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Diluent per reference well is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If DNA in the reference well is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Transfection Setup form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>DNA in the reference well</strong> is measured in µg. The page reads it when it works out DNA per batch to make. Fill it from a measurement rather than a memory — DNA in the reference well is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Reagent in the reference well</strong> is measured in µL. The page reads it when it works out Reagent for the batch, Total complex volume and Volume of complex per well. Fill it from a measurement rather than a memory — Reagent in the reference well is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Diluent per reference well</strong> is measured in µL. The page reads it when it works out Diluent for the batch, Total complex volume and Volume of complex per well. Fill it from a measurement rather than a memory — Diluent per reference well is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Wells (or vessels) needed</strong> takes a plain number with no unit attached. Add 10% for pipetting loss. The page reads it when it works out DNA per batch to make, Reagent for the batch and Diluent for the batch. Fill it from a measurement rather than a memory — Wells (or vessels) needed is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> DNA per batch to make follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: DNA in the reference well, Reagent in the reference well and Diluent per reference well measured, DNA per batch to make and Reagent for the batch wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/puppy-adult-weight-predictor">Puppy Adult Weight Predictor Calculator</a>, <a href="/biology/q10-temperature-coefficient">Q10 Temperature Coefficient Calculator</a> and <a href="/biology/qpcr-efficiency">qPCR efficiency Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Transfection Setup calculator work out?', 'a' => <<<'TXT'
            DNA per batch to make, Reagent for the batch, Diluent for the batch and Total complex volume, from DNA in the reference well and Wells (or vessels) needed. The relationship is DNA per batch to make = DNA in the reference well × Wells (or vessels) needed × 1.1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            DNA in the reference well (µg), Reagent in the reference well (µL), Diluent per reference well (µL), Wells (or vessels) needed. Fill dna_ref, reagent_ref and diluent_ref and leave DNA per batch to make empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. DNA per batch to make, Reagent for the batch, Diluent for the batch and Total complex volume can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            DNA per batch to make = 13.2 µg, Reagent for the batch = 39.6 µL, Diluent for the batch = 1320 µL, Total complex volume = 1360 µL and Volume of complex per well = 51.5 µL. Those are the defaults written into the form — move DNA in the reference well and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            DNA per batch to make is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave DNA in the reference well blank and the page solves for it, reporting DNA per batch to make instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to DNA per batch to make at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/puppy-adult-weight-predictor', 'name' => 'Puppy Adult Weight Predictor Calculator'],
            ['path' => '/biology/q10-temperature-coefficient', 'name' => 'Q10 Temperature Coefficient Calculator'],
            ['path' => '/biology/qpcr-efficiency', 'name' => 'qPCR efficiency Calculator'],
        ],
        'authors' => [],
    ],
];
