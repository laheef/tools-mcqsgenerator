<?php

/**
 * Land Equivalent Ratio Calculator
 * /biology/land-equivalent-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Land Equivalent Ratio Calculator',
    'meta' => ['title' => 'Land Equivalent Ratio Calculator: Steps & Units', 'description' => 'Land Equivalent Ratio Calculator reports crop 1 partial ratio, crop 2 partial ratio and land saved. Free to use, with the working shown beside the answer.', 'h1' => 'Land Equivalent Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'y1i',
                            'label' => 'Crop 1 yield, intercropped',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3200',
                        ],
                        [
                            'name' => 'y1s',
                            'label' => 'Crop 1 yield, sole crop',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5000',
                        ],
                        [
                            'name' => 'y2i',
                            'label' => 'Crop 2 yield, intercropped',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1800',
                        ],
                        [
                            'name' => 'y2s',
                            'label' => 'Crop 2 yield, sole crop',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2500',
                        ],
                        [
                            'name' => 'ler',
                            'label' => 'Land equivalent ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'partial1',
                            'label' => 'Crop 1 partial ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'partial2',
                            'label' => 'Crop 2 partial ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'advantage',
                            'label' => 'Land saved',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'The share of land the mixture saves',
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
            'title' => 'LER',
            'results' => ['partial1' => 'y1i/y1s', 'partial2' => 'y2i/y2s', 'ler' => 'y1i/y1s+y2i/y2s', 'advantage' => '(y1i/y1s+y2i/y2s-1)*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Crop 1 yield, intercropped, Crop 1 yield, sole crop and Crop 2 yield, intercropped into Land Equivalent Ratio and the answer comes back as Land equivalent ratio and Crop 1 partial ratio. There is no hidden constant here: change land equivalent ratio and crop 1 yield, intercropped moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Land Equivalent Ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Land Equivalent Ratio: it takes 4 numbers and reports Land equivalent ratio, Crop 1 partial ratio and Crop 2 partial ratio.</p><p>The relationship it solves reads Crop 1 partial ratio = Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop.</p><p>The result panel carries Land equivalent ratio, Crop 1 partial ratio, Crop 2 partial ratio and Land saved, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Crop 1 yield, intercropped</strong> — in kg/ha</li><li><strong>Crop 1 yield, sole crop</strong> — in kg/ha</li><li><strong>Crop 2 yield, intercropped</strong> — in kg/ha</li><li><strong>Crop 2 yield, sole crop</strong> — in kg/ha</li></ul><p>The result boxes are Land equivalent ratio, Crop 1 partial ratio, Crop 2 partial ratio, Land saved in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Crop 1 yield, intercropped = 3200 kg/ha, Crop 1 yield, sole crop = 5000 kg/ha, Crop 2 yield, intercropped = 1800 kg/ha and Crop 2 yield, sole crop = 2500 kg/ha — through the same formula and the panel reports <strong>Crop 1 partial ratio</strong> = 0.64, <strong>Crop 2 partial ratio</strong> = 0.72, <strong>Land equivalent ratio</strong> = 1.36 and <strong>Land saved</strong> = 36 %.</p><ul><li><strong>Crop 1 partial ratio</strong> = 0.64</li><li><strong>Crop 2 partial ratio</strong> = 0.72</li><li><strong>Land equivalent ratio</strong> = 1.36</li><li><strong>Land saved</strong> = 36 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Crop 1 partial ratio</strong> = <code>Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Crop 1 partial ratio</strong> = 0.64, <strong>Crop 2 partial ratio</strong> = 0.72, <strong>Land equivalent ratio</strong> = 1.36 and <strong>Land saved</strong> = 36. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Land equivalent ratio is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Crop 1 partial ratio</strong> = <code>Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop</code></li><li><strong>Crop 2 partial ratio</strong> = <code>Crop 2 yield, intercropped ÷ Crop 2 yield, sole crop</code></li><li><strong>Land equivalent ratio</strong> = <code>Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop + Crop 2 yield, intercropped ÷ Crop 2 yield, sole crop</code></li><li><strong>Land saved</strong> = <code>(Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop + Crop 2 yield, intercropped ÷ Crop 2 yield, sole crop − 1) × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Crop 1 partial ratio</strong> = <code>Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop</code> — the form to use when Crop 1 yield, intercropped and Crop 1 yield, sole crop are the values you have.</li><li><strong>Crop 2 partial ratio</strong> = <code>Crop 2 yield, intercropped ÷ Crop 2 yield, sole crop</code> — the form to use when Crop 2 yield, intercropped and Crop 2 yield, sole crop are the values you have.</li><li><strong>Land equivalent ratio</strong> = <code>Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop + Crop 2 yield, intercropped ÷ Crop 2 yield, sole crop</code> — the form to use when Crop 1 yield, intercropped, Crop 1 yield, sole crop, Crop 2 yield, intercropped and Crop 2 yield, sole crop are the values you have.</li><li><strong>Land saved</strong> = <code>(Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop + Crop 2 yield, intercropped ÷ Crop 2 yield, sole crop − 1) × 100</code> — the form to use when Crop 1 yield, intercropped, Crop 1 yield, sole crop, Crop 2 yield, intercropped and Crop 2 yield, sole crop are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Crop 1 partial ratio, Crop 2 partial ratio and Land equivalent ratio can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Crop 1 yield, intercropped from 3200 to 6400, leaving every other box alone. The panel moves from <strong>Crop 1 partial ratio</strong> 0.64, <strong>Crop 2 partial ratio</strong> 0.72, <strong>Land equivalent ratio</strong> 1.36 and <strong>Land saved</strong> 36 % to <strong>Crop 1 partial ratio</strong> 1.28, <strong>Crop 2 partial ratio</strong> 0.72, <strong>Land equivalent ratio</strong> 2 and <strong>Land saved</strong> 100 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Land equivalent ratio, Crop 1 partial ratio and Crop 2 partial ratio are results: they are worked out from the boxes above and cannot be typed into, so a past answer has to be entered as one of the inputs instead.</li><li><strong>Crop 1 yield, intercropped left as a guess.</strong> Anything typed into Crop 1 yield, intercropped is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Crop 1 yield, sole crop left as a guess.</strong> Anything typed into Crop 1 yield, sole crop is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Crop 2 yield, intercropped left as a guess.</strong> Anything typed into Crop 2 yield, intercropped is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Crop 1 yield, intercropped to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Crop 1 yield, intercropped</strong> is measured in kg/ha. It feeds Crop 1 partial ratio, Land equivalent ratio and Land saved. Have it to hand before you start: Crop 1 yield, intercropped is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Crop 1 yield, sole crop</strong> is measured in kg/ha. It feeds Crop 1 partial ratio, Land equivalent ratio and Land saved. Have it to hand before you start: Crop 1 yield, sole crop is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Crop 2 yield, intercropped</strong> is measured in kg/ha. It feeds Crop 2 partial ratio, Land equivalent ratio and Land saved. Have it to hand before you start: Crop 2 yield, intercropped is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Crop 2 yield, sole crop</strong> is measured in kg/ha. It feeds Crop 2 partial ratio, Land equivalent ratio and Land saved. Have it to hand before you start: Crop 2 yield, sole crop is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Land equivalent ratio</strong> is a plain number and the page's own defaults put it at 1.36. The value follows from Crop 1 yield, intercropped, Crop 1 yield, sole crop, Crop 2 yield, intercropped and Crop 2 yield, sole crop. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Crop 1 partial ratio</strong> is a plain number and the page's own defaults put it at 0.64. The value follows from Crop 1 yield, intercropped and Crop 1 yield, sole crop. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Crop 2 partial ratio</strong> is a plain number and the page's own defaults put it at 0.72. The value follows from Crop 2 yield, intercropped and Crop 2 yield, sole crop. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Land saved</strong> is a plain number and the page's own defaults put it at 36. The value follows from Crop 1 yield, intercropped, Crop 1 yield, sole crop, Crop 2 yield, intercropped and Crop 2 yield, sole crop. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Crop 1 partial ratio</th><th>Crop 2 partial ratio</th><th>Land equivalent ratio</th><th>Land saved</th></tr></thead><tbody><tr><td><strong>Crop 1 yield, intercropped</strong> +10%</td><td>+10%</td><td>+0%</td><td>+4.71%</td><td>+17.78%</td></tr><tr><td><strong>Crop 1 yield, sole crop</strong> +10%</td><td>-9.09%</td><td>+0%</td><td>-4.28%</td><td>-16.16%</td></tr><tr><td><strong>Crop 2 yield, intercropped</strong> +10%</td><td>+0%</td><td>+10%</td><td>+5.29%</td><td>+20%</td></tr><tr><td><strong>Crop 2 yield, sole crop</strong> +10%</td><td>+0%</td><td>-9.09%</td><td>-4.81%</td><td>-18.18%</td></tr></tbody></table><p>The steepest column belongs to Crop 2 yield, intercropped: ten per cent there moves an answer by about 20 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Crop 1 yield, intercropped = 1600 kg/ha, Crop 1 yield, sole crop = 2500 kg/ha, Crop 2 yield, intercropped = 900 kg/ha and Crop 2 yield, sole crop = 1250 kg/ha, the answer is <strong>Crop 1 partial ratio</strong> = 0.64, <strong>Crop 2 partial ratio</strong> = 0.72, <strong>Land equivalent ratio</strong> = 1.36 and <strong>Land saved</strong> = 36 %.</li><li>With Crop 1 yield, intercropped = 9600 kg/ha, Crop 1 yield, sole crop = 5000 kg/ha, Crop 2 yield, intercropped = 1800 kg/ha and Crop 2 yield, sole crop = 2500 kg/ha, the answer is <strong>Crop 1 partial ratio</strong> = 1.92, <strong>Crop 2 partial ratio</strong> = 0.72, <strong>Land equivalent ratio</strong> = 2.64 and <strong>Land saved</strong> = 164 %.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Land equivalent ratio is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Crop 1 yield, intercropped, Crop 1 yield, sole crop and Crop 2 yield, intercropped are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Crop 1 yield, intercropped, Crop 1 yield, sole crop and Crop 2 yield, intercropped is what you already know and Land equivalent ratio and Crop 1 partial ratio is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/photosynthesis-rate">Photosynthesis Rate Calculator</a>, <a href="/biology/pig-weight">Pig Weight Calculator</a> and <a href="/biology/pine-straw">Pine straw</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Land Equivalent Ratio calculator work out?', 'a' => <<<'TXT'
            Land equivalent ratio, Crop 1 partial ratio, Crop 2 partial ratio and Land saved, from Crop 1 yield, intercropped and Crop 1 yield, sole crop. The relationship is Crop 1 partial ratio = Crop 1 yield, intercropped ÷ Crop 1 yield, sole crop.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Crop 1 yield, intercropped (kg/ha), Crop 1 yield, sole crop (kg/ha), Crop 2 yield, intercropped (kg/ha), Crop 2 yield, sole crop (kg/ha). Fill crop 1 yield, intercropped, crop 1 yield, sole crop and crop 2 yield, intercropped and leave Land equivalent ratio empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Crop 1 partial ratio, Crop 2 partial ratio, Land equivalent ratio and Land saved can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Crop 1 partial ratio = 0.64, Crop 2 partial ratio = 0.72, Land equivalent ratio = 1.36 and Land saved = 36 %. The figures come from Crop 1 yield, intercropped as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Land equivalent ratio is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Crop 1 yield, intercropped left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Land equivalent ratio at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/photosynthesis-rate', 'name' => 'Photosynthesis Rate Calculator'],
            ['path' => '/biology/pig-weight', 'name' => 'Pig Weight Calculator'],
            ['path' => '/biology/pine-straw', 'name' => 'Pine straw'],
        ],
        'authors' => [],
    ],
];
