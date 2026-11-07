<?php

/**
 * Agarose Gel Calculator (gel percentage and loading)
 * /biology/agarose-gel-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Agarose Gel Calculator (gel percentage and loading)',
    'meta' => ['title' => 'Agarose Gel (gel percentage and loading) Calculator', 'description' => 'Agarose Gel Calculator (gel percentage and loading) works out Agarose to weigh out and Loading dye per sample from Agarose percentage, Gel volume and Number…', 'h1' => 'Agarose Gel Calculator (gel percentage and loading)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'percent',
                            'label' => 'Agarose percentage',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => '1% for 0.5–10 kb',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Gel volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'help' => 'Depends on the tray',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'lanes',
                            'label' => 'Number of lanes',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '16',
                        ],
                        [
                            'name' => 'sample_vol',
                            'label' => 'Sample volume per lane',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'dye_x',
                            'label' => 'Loading dye stock',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '6× is standard',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'agarose_g',
                            'label' => 'Agarose to weigh out',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dye_vol',
                            'label' => 'Loading dye per sample',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'buffer_vol',
                            'label' => 'Running buffer',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_sample',
                            'label' => 'Total volume needed',
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
            'title' => 'Gel',
            'results' => ['agarose_g' => 'volume*percent/100', 'dye_vol' => 'sample_vol/dye_x', 'buffer_vol' => 'volume*5', 'total_sample' => 'lanes*sample_vol'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Agarose Gel Calculator (gel percentage and loading) works out Agarose to weigh out and Loading dye per sample from Agarose percentage, Gel volume and Number of lanes. The arithmetic is the whole method: Agarose to weigh out is worked out from Agarose percentage by one formula, applied once. Agarose to weigh out comes back in g unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Agarose Gel Calculator (gel percentage and loading) calculator works', 'html' => <<<'TXT'
            <p>The Agarose Gel Calculator (gel percentage and loading) calculator applies one relationship to 5 numbers and reports Agarose to weigh out, Loading dye per sample and Running buffer.</p><p>Written with the labels from the form, Agarose to weigh out = Gel volume × Agarose percentage ÷ 100.</p><p>The result panel carries Agarose to weigh out, Loading dye per sample, Running buffer and Total volume needed, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Agarose percentage</strong> — in %. 1% for 0.5–10 kb</li><li><strong>Gel volume</strong> — in mL. Depends on the tray</li><li><strong>Number of lanes</strong> — a plain number, no unit</li><li><strong>Sample volume per lane</strong> — in µL</li><li><strong>Loading dye stock</strong> — in ×. 6× is standard</li></ul><p>The answers come back as Agarose to weigh out in g, Loading dye per sample in µL, Running buffer in mL, Total volume needed in µL. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Agarose percentage = 1 %, Gel volume = 100 mL, Number of lanes = 16, Sample volume per lane = 10 µL and Loading dye stock = 6 ×; the answers are &lt;strong&gt;Agarose to weigh out&lt;/strong&gt; = 1 g, &lt;strong&gt;Loading dye per sample&lt;/strong&gt; = 1.67 µL, &lt;strong&gt;Running buffer&lt;/strong&gt; = 500 mL and &lt;strong&gt;Total volume needed&lt;/strong&gt; = 160 µL.</p><ul><li><strong>Agarose to weigh out</strong> = 1 g</li><li><strong>Loading dye per sample</strong> = 1.67 µL</li><li><strong>Running buffer</strong> = 500 mL</li><li><strong>Total volume needed</strong> = 160 µL</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Agarose to weigh out</strong> = <code>Gel volume × Agarose percentage ÷ 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Agarose to weigh out&lt;/strong&gt; = 1, &lt;strong&gt;Loading dye per sample&lt;/strong&gt; = 1.67, &lt;strong&gt;Running buffer&lt;/strong&gt; = 500 and &lt;strong&gt;Total volume needed&lt;/strong&gt; = 160. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Agarose to weigh out is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Agarose to weigh out</strong> = <code>Gel volume × Agarose percentage ÷ 100</code></li><li><strong>Loading dye per sample</strong> = <code>Sample volume per lane ÷ Loading dye stock</code></li><li><strong>Running buffer</strong> = <code>Gel volume × 5</code></li><li><strong>Total volume needed</strong> = <code>Number of lanes × Sample volume per lane</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Agarose to weigh out, Loading dye per sample and Running buffer can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Agarose percentage, from 1 to 2 — and the answers go from &lt;strong&gt;Agarose to weigh out&lt;/strong&gt; 1 g, &lt;strong&gt;Loading dye per sample&lt;/strong&gt; 1.67 µL, &lt;strong&gt;Running buffer&lt;/strong&gt; 500 mL and &lt;strong&gt;Total volume needed&lt;/strong&gt; 160 µL to &lt;strong&gt;Agarose to weigh out&lt;/strong&gt; 2 g, &lt;strong&gt;Loading dye per sample&lt;/strong&gt; 1.67 µL, &lt;strong&gt;Running buffer&lt;/strong&gt; 500 mL and &lt;strong&gt;Total volume needed&lt;/strong&gt; 160 µL.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Agarose to weigh out, Loading dye per sample and Running buffer are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Agarose percentage to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Agarose percentage, Gel volume and Number of lanes measured, Agarose to weigh out and Loading dye per sample wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/cpg-island-finder">CpG Island Finder Calculator</a>, <a href="/biology/cricket-chirp-thermometer">Crickets chirping thermometer Calculator</a> and <a href="/biology/crop-coefficient">Crop Coefficient Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Agarose Gel Calculator (gel percentage and loading) calculator work out?', 'a' => <<<'TXT'
            Agarose to weigh out, Loading dye per sample, Running buffer and Total volume needed, from Gel volume and Agarose percentage. The relationship is Agarose to weigh out = Gel volume × Agarose percentage ÷ 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Agarose percentage (%), Gel volume (mL), Number of lanes, Sample volume per lane (µL), Loading dye stock (×). With percent, volume and lanes in place, Agarose to weigh out can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Agarose to weigh out, Loading dye per sample, Running buffer and Total volume needed can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Agarose to weigh out = 1 g, Loading dye per sample = 1.67 µL, Running buffer = 500 mL and Total volume needed = 160 µL. The figures come from Agarose percentage as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Agarose to weigh out is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Agarose percentage left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Agarose to weigh out at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/cpg-island-finder', 'name' => 'CpG Island Finder Calculator'],
            ['path' => '/biology/cricket-chirp-thermometer', 'name' => 'Crickets chirping thermometer Calculator'],
            ['path' => '/biology/crop-coefficient', 'name' => 'Crop Coefficient Calculator'],
        ],
        'authors' => [],
    ],
];
