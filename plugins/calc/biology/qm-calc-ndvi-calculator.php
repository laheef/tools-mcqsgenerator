<?php

/**
 * NDVI Calculator (Normalised Difference Vegetation Index)
 * /biology/ndvi-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'NDVI Calculator (Normalised Difference Vegetation Index)',
    'meta' => ['title' => 'NDVI Calculator (Normalised Difference Vegetation', 'description' => <<<'TXT'
    NDVI Calculator (Normalised Difference Vegetation Index) reports NDVI, EVI approximation, estimated fractional cover and surface class (0 water … 6 very dense).
    TXT, 'h1' => 'NDVI Calculator (Normalised Difference Vegetation Index)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'nir',
                            'label' => 'Near-infrared reflectance',
                            'type' => 'number',
                            'help' => '0 to 1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.42',
                        ],
                        [
                            'name' => 'red',
                            'label' => 'Red reflectance',
                            'type' => 'number',
                            'help' => '0 to 1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.08',
                        ],
                        [
                            'name' => 'ndvi',
                            'label' => 'NDVI',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'evi',
                            'label' => 'EVI approximation',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cover',
                            'label' => 'Estimated fractional cover',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'class_no',
                            'label' => 'Surface class (0 water … 6 very dense)',
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
            'title' => 'Vegetation',
            'results' => ['ndvi' => '(nir-red)/(nir+red)', 'evi' => '2.5*(nir-red)/(nir+6*red+1)', 'cover' => 'pow(max(0,(nir-red)/(nir+red)),0.6)*100', 'class_no' => <<<'TXT'
            if_else((nir+red)==0,-1,if_else((nir-red)/(nir+red)<0,0,if_else((nir-red)/(nir+red)<0.1,1,if_else((nir-red)/(nir+red)<0.2,2,if_else((nir-red)/(nir+red)<0.4,3,if_else((nir-red)/(nir+red)<0.6,4,if_else((nir-red)/(nir+red)<0.8,5,6)))))))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Near-infrared reflectance and Red reflectance into NDVI Calculator (Normalised Difference Vegetation Index) and the answer comes back as NDVI and EVI approximation. The arithmetic is the whole method: NDVI is worked out from near-infrared reflectance by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the NDVI Calculator (Normalised Difference Vegetation Index) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind NDVI Calculator (Normalised Difference Vegetation Index): it takes 2 numbers and reports NDVI, EVI approximation and Estimated fractional cover.</p><p>Written with the labels from the form, NDVI = (Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + Red reflectance).</p><p>The result panel carries NDVI, EVI approximation, Estimated fractional cover and Surface class (0 water … 6 very dense), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Near-infrared reflectance</strong> — a plain number, no unit. 0 to 1</li><li><strong>Red reflectance</strong> — a plain number, no unit. 0 to 1</li></ul><p>What you get back is NDVI, EVI approximation, Estimated fractional cover in %, Surface class (0 water … 6 very dense), shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Near-infrared reflectance = 0.42 and Red reflectance = 0.08; the answers are <strong>NDVI</strong> = 0.68, <strong>EVI approximation</strong> = 0.447, <strong>Estimated fractional cover</strong> = 79.34 % and <strong>Surface class (0 water … 6 very dense)</strong> = 5.</p><ul><li><strong>NDVI</strong> = 0.68</li><li><strong>EVI approximation</strong> = 0.447</li><li><strong>Estimated fractional cover</strong> = 79.34 %</li><li><strong>Surface class (0 water … 6 very dense)</strong> = 5</li></ul><p>The line behind those figures is <strong>NDVI</strong> = <code>(Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + Red reflectance)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>NDVI</strong> = 0.68, <strong>EVI approximation</strong> = 0.447, <strong>Estimated fractional cover</strong> = 79.34 and <strong>Surface class (0 water … 6 very dense)</strong> = 5. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as NDVI is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>NDVI</strong> = <code>(Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + Red reflectance)</code></li><li><strong>EVI approximation</strong> = <code>2.5 × (Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + 6 × Red reflectance + 1)</code></li><li><strong>Estimated fractional cover</strong> = <code>(max(0,(Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + Red reflectance)))^(0.6) × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>NDVI</strong> = <code>(Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + Red reflectance)</code> — the form to use when Near-infrared reflectance and Red reflectance are the values you have.</li><li><strong>EVI approximation</strong> = <code>2.5 × (Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + 6 × Red reflectance + 1)</code> — the form to use when Near-infrared reflectance and Red reflectance are the values you have.</li><li><strong>Estimated fractional cover</strong> = <code>(max(0,(Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + Red reflectance)))^(0.6) × 100</code> — the form to use when Near-infrared reflectance and Red reflectance are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of NDVI, EVI approximation and Estimated fractional cover can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Near-infrared reflectance, from 0.42 to 0.84 — and the answers go from <strong>NDVI</strong> 0.68, <strong>EVI approximation</strong> 0.447, <strong>Estimated fractional cover</strong> 79.34 % and <strong>Surface class (0 water … 6 very dense)</strong> 5 to <strong>NDVI</strong> 0.826, <strong>EVI approximation</strong> 0.819, <strong>Estimated fractional cover</strong> 89.17 % and <strong>Surface class (0 water … 6 very dense)</strong> 6.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> NDVI, EVI approximation and Estimated fractional cover are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Near-infrared reflectance left as a guess.</strong> Anything typed into Near-infrared reflectance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Red reflectance left as a guess.</strong> Anything typed into Red reflectance is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Near-infrared reflectance to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Near-infrared reflectance</strong> takes a plain number with no unit attached. It feeds NDVI, EVI approximation and Estimated fractional cover. Have it to hand before you start: Near-infrared reflectance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Red reflectance</strong> takes a plain number with no unit attached. It feeds NDVI, EVI approximation and Estimated fractional cover. Have it to hand before you start: Red reflectance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>NDVI</strong> is a plain number and the page's own defaults put it at 0.68. The value follows from Near-infrared reflectance and Red reflectance. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>EVI approximation</strong> is a plain number and the page's own defaults put it at 0.447. The value follows from Near-infrared reflectance and Red reflectance. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Estimated fractional cover</strong> is a plain number and the page's own defaults put it at 79.34. The value follows from Near-infrared reflectance and Red reflectance. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Surface class (0 water … 6 very dense)</strong> is a plain number and the page's own defaults put it at 5. The value follows from Near-infrared reflectance and Red reflectance. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>NDVI</th><th>EVI approximation</th><th>Estimated fractional cover</th><th>Surface class (0 water … 6 very dense)</th></tr></thead><tbody><tr><td><strong>Near-infrared reflectance</strong> +10%</td><td>+3.65%</td><td>+9.92%</td><td>+2.17%</td><td>+0%</td></tr><tr><td><strong>Red reflectance</strong> +10%</td><td>-3.89%</td><td>-4.76%</td><td>-2.35%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Near-infrared reflectance: ten per cent there moves an answer by about 9.9 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Near-infrared reflectance = 0.21 and Red reflectance = 0.04, the answer is <strong>NDVI</strong> = 0.68, <strong>EVI approximation</strong> = 0.293, <strong>Estimated fractional cover</strong> = 79.34 % and <strong>Surface class (0 water … 6 very dense)</strong> = 5.</li><li>With Near-infrared reflectance = 1.26 and Red reflectance = 0.08, the answer is <strong>NDVI</strong> = 0.881, <strong>EVI approximation</strong> = 1.08, <strong>Estimated fractional cover</strong> = 92.65 % and <strong>Surface class (0 water … 6 very dense)</strong> = 6.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind NDVI is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Near-infrared reflectance and Red reflectance are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Near-infrared reflectance and Red reflectance measured, NDVI and EVI approximation wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/tajimas-d">Tajima&#039;s D Calculator</a>, <a href="/biology/tff-membrane-area">TFF Membrane Area and Flux Calculator</a> and <a href="/biology/thousand-seed-weight">Thousand Seed Weight Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from NDVI Calculator (Normalised Difference Vegetation Index) is a number to act on, so the useful question is what to do with NDVI, EVI approximation and Estimated fractional cover (%) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Near-infrared reflectance and Red reflectance alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the NDVI Calculator (Normalised Difference Vegetation Index) calculator work out?', 'a' => <<<'TXT'
            NDVI, EVI approximation, Estimated fractional cover and Surface class (0 water … 6 very dense), from Near-infrared reflectance and Red reflectance. The relationship is NDVI = (Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + Red reflectance).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Near-infrared reflectance, Red reflectance. With near-infrared reflectance and red reflectance in place, NDVI can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. NDVI, EVI approximation, Estimated fractional cover and Surface class (0 water … 6 very dense) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            NDVI = 0.68, EVI approximation = 0.447, Estimated fractional cover = 79.34 % and Surface class (0 water … 6 very dense) = 5. Those are the defaults written into the form — move Near-infrared reflectance and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of NDVI is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Near-infrared reflectance left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. NDVI keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/tajimas-d', 'name' => 'Tajima\'s D Calculator'],
            ['path' => '/biology/tff-membrane-area', 'name' => 'TFF Membrane Area and Flux Calculator'],
            ['path' => '/biology/thousand-seed-weight', 'name' => 'Thousand Seed Weight Calculator'],
        ],
        'authors' => [],
    ],
];
