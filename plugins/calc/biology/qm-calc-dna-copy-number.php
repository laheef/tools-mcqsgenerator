<?php

/**
 * DNA copy number
 * /biology/dna-copy-number
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA copy number',
    'meta' => ['title' => 'DNA copy number Calculator: Free, With Steps', 'description' => 'DNA copy number: Enter DNA concentration, Template length and Base weight into DNA copy number and the answer comes back as DNA copies and Initial DNA copies.', 'h1' => 'DNA copy number Calculator', 'updated' => '2026-08-06'],
    'sections' => [
        [
            'title' => 'DNA copy number',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dna_concentration',
                            'label' => 'DNA concentration',
                            'type' => 'number',
                            'suffix' => 'ng/µl',
                            'help' => 'Measure the DNA concentration in ng/µl with a spectrophotometer.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'template_length',
                            'label' => 'Template length',
                            'type' => 'number',
                            'help' => 'Enter how many base-pairs your template has in total.',
                            'unit' => '271',
                            'unit_default' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'base_weight',
                            'label' => 'Base weight',
                            'type' => 'select',
                            'options' => ['ssDNA (330 Da)' => '330', 'ssRNA (340 Da)' => '340', 'dsDNA (660 Da)' => '660'],
                            'dataset' => 'base_weight',
                            'suffix' => 'dalton',
                            'help' => 'Choose between single-stranded DNA/RNA (ssDNA/ssRNA) or double-stranded DNA (dsDNA).',
                            'default' => 'dsDNA (660 Da)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dna_copies',
                            'label' => 'DNA copies',
                            'type' => 'number',
                            'suffix' => 'copies/µl',
                            'unit' => '120',
                            'unit_default' => 'x10e7',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'DNA copies per PCR cycle',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_dna_copies',
                            'label' => 'Initial DNA copies',
                            'type' => 'number',
                            'suffix' => 'copies/µl',
                            'help' => 'This is the initial amount of DNA in you sample, before PCR amplification.',
                            'unit' => '120',
                            'unit_default' => 'x10e7',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'no_cycles',
                            'label' => 'Number of PCR cycles',
                            'type' => 'number',
                            'help' => 'Enter here, after how many PCR cycles you want to know the DNA copy number.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dna_copy_per_pcr_cycle',
                            'label' => 'DNA copies after PCR cycle(s)',
                            'type' => 'number',
                            'suffix' => 'copies/µl',
                            'help' => 'This is the amount of DNA copies after the specific rounds of PCR cycle(s).',
                            'unit' => '120',
                            'unit_default' => 'x10e7',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'dna_copies = (dna_concentration * (6.02214*10^23)) / (template_length * 10^9 * base_weight)',
            'results' => ['dna_copies' => '602214000000000*dna_concentration/(base_weight*template_length)', 'template_length' => '602214000000000*dna_concentration/(base_weight*dna_copies)', 'base_weight' => '602214000000000*dna_concentration/(dna_copies*template_length)', 'dna_concentration' => '(1/602214000000000)*base_weight*dna_copies*template_length'],
        ],
        [
            'title' => 'dna_copy_per_pcr_cycle = initial_dna_copies * 2^no_cycles',
            'results' => ['initial_dna_copies' => 'pow(2, -no_cycles)*dna_copy_per_pcr_cycle', 'dna_copy_per_pcr_cycle' => 'pow(2, no_cycles)*initial_dna_copies', 'no_cycles' => 'log(dna_copy_per_pcr_cycle/initial_dna_copies)/log(2)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter DNA concentration, Template length and Base weight into DNA copy number and the answer comes back as DNA copies and Initial DNA copies. It is a single relationship that reads DNA copies out of DNA concentration, not a table of canned results keyed by them. Units for DNA copies default to copies/µl and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the DNA copy number calculator works', 'html' => <<<'TXT'
            <p>DNA copy number answers one question from 3 numbers, and the answer is DNA copies, Initial DNA copies and Number of PCR cycles.</p><p>The relationship it solves reads DNA copies = 602214000000000 × DNA concentration ÷ (Base weight × Template length).</p><p>The result panel carries DNA copies, Initial DNA copies, Number of PCR cycles and DNA copies after PCR cycle(s), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>DNA concentration</strong> — in ng/µl. Measure the DNA concentration in ng/µl with a spectrophotometer.</li><li><strong>Template length</strong> — in base pairs. Enter how many base-pairs your template has in total.</li><li><strong>Base weight</strong> — in dalton. Choose between single-stranded DNA/RNA (ssDNA/ssRNA) or double-stranded DNA (dsDNA).</li></ul><p>The result boxes are DNA copies in copies/µl, Initial DNA copies in copies/µl, Number of PCR cycles, DNA copies after PCR cycle(s) in copies/µl; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — DNA concentration = 10 ng/µl, Template length = 100 bp, Base weight = 660 dalton, Initial DNA copies = 1000 copies/µl, Number of PCR cycles = 10 and DNA copies after PCR cycle(s) = 100 copies/µl — through the same formula and the panel reports &lt;strong&gt;DNA copies&lt;/strong&gt; = 9.124e+1 copies/µl.</p><ul><li><strong>DNA copies</strong> = 9.124e+1 copies/µl</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>DNA copies</strong> = <code>602214000000000 × DNA concentration ÷ (Base weight × Template length)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;DNA copies&lt;/strong&gt; = 9.124e+1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on DNA copies lists 69 options and opens on times 10 to the 7. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>DNA copies</strong> = <code>602214000000000 × DNA concentration ÷ (Base weight × Template length)</code></li><li><strong>Template length</strong> = <code>602214000000000 × DNA concentration ÷ (Base weight × DNA copies)</code></li><li><strong>Base weight</strong> = <code>602214000000000 × DNA concentration ÷ (DNA copies × Template length)</code></li><li><strong>DNA concentration</strong> = <code>(1 ÷ 602214000000000) × Base weight × DNA copies × Template length</code></li><li><strong>Initial DNA copies</strong> = <code>(2)^(− Number of PCR cycles) × DNA copies after PCR cycle(s)</code></li><li><strong>DNA copies after PCR cycle(s)</strong> = <code>(2)^(Number of PCR cycles) × Initial DNA copies</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>DNA copies</strong> = <code>602214000000000 × DNA concentration ÷ (Base weight × Template length)</code> — the form to use when DNA concentration, Base weight and Template length are the values you have.</li><li><strong>Template length</strong> = <code>602214000000000 × DNA concentration ÷ (Base weight × DNA copies)</code> — the form to use when DNA concentration, Base weight and DNA copies are the values you have.</li><li><strong>Base weight</strong> = <code>602214000000000 × DNA concentration ÷ (DNA copies × Template length)</code> — the form to use when DNA concentration, DNA copies and Template length are the values you have.</li><li><strong>DNA concentration</strong> = <code>(1 ÷ 602214000000000) × Base weight × DNA copies × Template length</code> — the form to use when Base weight, DNA copies and Template length are the values you have.</li><li><strong>Initial DNA copies</strong> = <code>(2)^(− Number of PCR cycles) × DNA copies after PCR cycle(s)</code> — the form to use when Number of PCR cycles and DNA copies after PCR cycle(s) are the values you have.</li><li><strong>DNA copies after PCR cycle(s)</strong> = <code>(2)^(Number of PCR cycles) × Initial DNA copies</code> — the form to use when Number of PCR cycles and Initial DNA copies are the values you have.</li><li><strong>Number of PCR cycles</strong> = <code>ln(DNA copies after PCR cycle(s) ÷ Initial DNA copies) ÷ ln(2)</code> — the form to use when DNA copies after PCR cycle(s) and Initial DNA copies are the values you have.</li></ul><p>Any one of DNA copies, Template length and Base weight can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double DNA concentration from 10 to 20, leaving every other box alone. The panel moves from &lt;strong&gt;DNA copies&lt;/strong&gt; 9.124e+1 copies/µl to &lt;strong&gt;DNA copies&lt;/strong&gt; 1.825e+11 copies/µl.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Template length carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> DNA copies, Initial DNA copies and Number of PCR cycles are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>DNA concentration left as a guess.</strong> Anything typed into DNA concentration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Template length left as a guess.</strong> Anything typed into Template length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in DNA concentration and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the DNA copy number form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>DNA concentration</strong> is measured in ng/µl. Measure the DNA concentration in ng/µl with a spectrophotometer. The page reads it when it works out DNA copies, Template length and Base weight. Fill it from a measurement rather than a memory — DNA concentration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Template length</strong> is a base pairs quantity: the page opens it in bp and converts anything else you pick before the formula runs. Enter how many base-pairs your template has in total. The page reads it when it works out DNA copies, Base weight and DNA concentration. Fill it from a measurement rather than a memory — Template length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Base weight</strong> is measured in dalton. Choose between single-stranded DNA/RNA (ssDNA/ssRNA) or double-stranded DNA (dsDNA). The page reads it when it works out DNA copies, Template length and DNA concentration. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Base weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>DNA copies</strong> is a times 10 to the 7 figure and the page's own defaults put it at 9.124e+1 copies/µl. It is computed from DNA concentration, Base weight and Template length, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Initial DNA copies</strong> is a times 10 to the 7 figure. It is computed from Number of PCR cycles and DNA copies after PCR cycle(s), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Number of PCR cycles</strong> is a plain number. It is computed from DNA copies after PCR cycle(s) and Initial DNA copies, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>DNA copies after PCR cycle(s)</strong> is a times 10 to the 7 figure. It is computed from Number of PCR cycles and Initial DNA copies, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on DNA copy number actually offers.</p><ul><li><strong>times 10 to the 7</strong> — 69 units. It opens in <em>x10e7</em>, and the chip also carries × 10⁵, × 10⁰, × 10⁻²³, × 10²³, × 10²² and × 10⁻²⁷. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>base pairs</strong> — 2 units. It opens in <em>bp</em>, and the chip also carries kb. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind DNA copies is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are times 10 to the 7 and base pairs and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes DNA concentration, Template length and Base weight are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are DNA concentration, Template length and Base weight and the number you are missing is DNA copies and Initial DNA copies.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/mark-recapture-population">Mark–Recapture Population (Lincoln–Petersen) Calculator</a>, <a href="/biology/mass-molarity-conversion">Mass to Molarity Converter Calculator</a> and <a href="/biology/maximum-sustainable-yield">Maximum Sustainable Yield Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA copy number calculator work out?', 'a' => <<<'TXT'
            DNA copies, Initial DNA copies, Number of PCR cycles and DNA copies after PCR cycle(s), from DNA concentration, Base weight and Template length. The relationship is DNA copies = 602214000000000 × DNA concentration ÷ (Base weight × Template length).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            DNA concentration (ng/µl), Template length (base pairs), Base weight (dalton). Enter dna_concentration, template_length and base_weight; DNA copies is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of DNA copies, Template length, Base weight and DNA concentration blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'DNA copies = 9.124e+1 copies/µl. The figures come from DNA concentration as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            DNA copies is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave DNA concentration blank and the page solves for it, reporting DNA copies instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. DNA copies keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/mark-recapture-population', 'name' => 'Mark–Recapture Population (Lincoln–Petersen) Calculator'],
            ['path' => '/biology/mass-molarity-conversion', 'name' => 'Mass to Molarity Converter Calculator'],
            ['path' => '/biology/maximum-sustainable-yield', 'name' => 'Maximum Sustainable Yield Calculator'],
        ],
        'authors' => [],
    ],
];
