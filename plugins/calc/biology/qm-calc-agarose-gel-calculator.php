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
    'meta' => ['title' => 'Agarose Gel (gel percentage and loading) Calculator', 'description' => 'Agarose Gel Calculator (gel percentage and loading) works out agarose to weigh out. No sign-up: type the numbers, press Calculate and read the answer.', 'h1' => 'Agarose Gel Calculator (gel percentage and loading)', 'updated' => '2026-10-29'],
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
        Agarose Gel Calculator (gel percentage and loading) works out Agarose to weigh out and Loading dye per sample from Agarose percentage, Gel volume and Number of lanes. The arithmetic is the whole method: agarose to weigh out is worked out from agarose percentage by one formula, applied once. Agarose to weigh out comes back in g unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Agarose Gel Calculator (gel percentage and loading) calculator works', 'html' => <<<'TXT'
            <p>The Agarose Gel Calculator (gel percentage and loading) calculator applies one relationship to 5 numbers and reports Agarose to weigh out, Loading dye per sample and Running buffer.</p><p>Written with the labels from the form, Agarose to weigh out = Gel volume × Agarose percentage ÷ 100.</p><p>The result panel carries Agarose to weigh out, Loading dye per sample, Running buffer and Total volume needed, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Agarose percentage</strong> — in %. 1% for 0.5–10 kb</li><li><strong>Gel volume</strong> — in mL. Depends on the tray</li><li><strong>Number of lanes</strong> — a plain number, no unit</li><li><strong>Sample volume per lane</strong> — in µL</li><li><strong>Loading dye stock</strong> — in ×. 6× is standard</li></ul><p>The answers come back as Agarose to weigh out in g, Loading dye per sample in µL, Running buffer in mL, Total volume needed in µL. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Agarose percentage = 1 %, Gel volume = 100 mL, Number of lanes = 16, Sample volume per lane = 10 µL and Loading dye stock = 6 ×; the answers are <strong>Agarose to weigh out</strong> = 1 g, <strong>Loading dye per sample</strong> = 1.67 µL, <strong>Running buffer</strong> = 500 mL and <strong>Total volume needed</strong> = 160 µL.</p><ul><li><strong>Agarose to weigh out</strong> = 1 g</li><li><strong>Loading dye per sample</strong> = 1.67 µL</li><li><strong>Running buffer</strong> = 500 mL</li><li><strong>Total volume needed</strong> = 160 µL</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Agarose to weigh out</strong> = <code>Gel volume × Agarose percentage ÷ 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Agarose to weigh out</strong> = 1, <strong>Loading dye per sample</strong> = 1.67, <strong>Running buffer</strong> = 500 and <strong>Total volume needed</strong> = 160. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Agarose to weigh out is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Agarose to weigh out</strong> = <code>Gel volume × Agarose percentage ÷ 100</code></li><li><strong>Loading dye per sample</strong> = <code>Sample volume per lane ÷ Loading dye stock</code></li><li><strong>Running buffer</strong> = <code>Gel volume × 5</code></li><li><strong>Total volume needed</strong> = <code>Number of lanes × Sample volume per lane</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Agarose to weigh out</strong> = <code>Gel volume × Agarose percentage ÷ 100</code> — the form to use when Gel volume and Agarose percentage are the values you have.</li><li><strong>Loading dye per sample</strong> = <code>Sample volume per lane ÷ Loading dye stock</code> — the form to use when Sample volume per lane and Loading dye stock are the values you have.</li><li><strong>Running buffer</strong> = <code>Gel volume × 5</code> — the form to use when Gel volume are the values you have.</li><li><strong>Total volume needed</strong> = <code>Number of lanes × Sample volume per lane</code> — the form to use when Number of lanes and Sample volume per lane are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Agarose to weigh out, Loading dye per sample and Running buffer can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Agarose percentage, from 1 to 2 — and the answers go from <strong>Agarose to weigh out</strong> 1 g, <strong>Loading dye per sample</strong> 1.67 µL, <strong>Running buffer</strong> 500 mL and <strong>Total volume needed</strong> 160 µL to <strong>Agarose to weigh out</strong> 2 g, <strong>Loading dye per sample</strong> 1.67 µL, <strong>Running buffer</strong> 500 mL and <strong>Total volume needed</strong> 160 µL.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Agarose to weigh out, Loading dye per sample and Running buffer are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Agarose percentage left as a guess.</strong> Anything typed into Agarose percentage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Gel volume left as a guess.</strong> Anything typed into Gel volume is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of lanes left as a guess.</strong> Anything typed into Number of lanes is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Agarose percentage to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Agarose percentage</strong> is measured in %. 1% for 0.5–10 kb. It feeds Agarose to weigh out. Have it to hand before you start: Agarose percentage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Gel volume</strong> is measured in mL. Depends on the tray. It feeds Agarose to weigh out and Running buffer. Have it to hand before you start: Gel volume is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of lanes</strong> takes a plain number with no unit attached. It feeds Total volume needed. Have it to hand before you start: Number of lanes is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Sample volume per lane</strong> is measured in µL. It feeds Loading dye per sample and Total volume needed. Have it to hand before you start: Sample volume per lane is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Loading dye stock</strong> is measured in ×. 6× is standard. It feeds Loading dye per sample. Have it to hand before you start: Loading dye stock is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Agarose to weigh out</strong> is a plain number and the page's own defaults put it at 1. It is computed from Gel volume and Agarose percentage, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Loading dye per sample</strong> is a plain number and the page's own defaults put it at 1.67. It is computed from Sample volume per lane and Loading dye stock, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Running buffer</strong> is a plain number and the page's own defaults put it at 500. It is computed from Gel volume, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total volume needed</strong> is a plain number and the page's own defaults put it at 160. It is computed from Number of lanes and Sample volume per lane, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Agarose to weigh out</th><th>Loading dye per sample</th><th>Running buffer</th><th>Total volume needed</th></tr></thead><tbody><tr><td><strong>Agarose percentage</strong> +10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Gel volume</strong> +10%</td><td>+10%</td><td>+0%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Number of lanes</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Sample volume per lane</strong> +10%</td><td>+0%</td><td>+10%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Loading dye stock</strong> +10%</td><td>+0%</td><td>-9.09%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Gel volume: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Agarose percentage = 0.5 %, Gel volume = 50 mL, Number of lanes = 8, Sample volume per lane = 5 µL and Loading dye stock = 3 ×, the answer is <strong>Agarose to weigh out</strong> = 0.25 g, <strong>Loading dye per sample</strong> = 1.67 µL, <strong>Running buffer</strong> = 250 mL and <strong>Total volume needed</strong> = 40 µL.</li><li>With Agarose percentage = 3 %, Gel volume = 100 mL, Number of lanes = 16, Sample volume per lane = 10 µL and Loading dye stock = 6 ×, the answer is <strong>Agarose to weigh out</strong> = 3 g, <strong>Loading dye per sample</strong> = 1.67 µL, <strong>Running buffer</strong> = 500 mL and <strong>Total volume needed</strong> = 160 µL.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Agarose to weigh out is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Agarose percentage, Gel volume and Number of lanes are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
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
            Agarose percentage (%), Gel volume (mL), Number of lanes, Sample volume per lane (µL), Loading dye stock (×). With agarose percentage, gel volume and number of lanes in place, Agarose to weigh out can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Agarose to weigh out, Loading dye per sample, Running buffer and Total volume needed can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Agarose to weigh out = 1 g, Loading dye per sample = 1.67 µL, Running buffer = 500 mL and Total volume needed = 160 µL. The figures come from Agarose percentage as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Agarose to weigh out is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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
