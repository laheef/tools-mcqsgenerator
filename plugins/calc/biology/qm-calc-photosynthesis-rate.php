<?php

/**
 * Photosynthesis Rate Calculator
 * /biology/photosynthesis-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Photosynthesis Rate Calculator',
    'meta' => ['title' => 'Photosynthesis Rate Calculator — Formula & Results', 'description' => 'Enter net assimilation rate, leaf area and measurement period and Photosynthesis Rate Calculator returns carbon fixed and daily carbon gain at this rate.', 'h1' => 'Photosynthesis Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a',
                            'label' => 'Net assimilation rate',
                            'type' => 'number',
                            'suffix' => 'µmol CO₂/m²/s',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Leaf area',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.02',
                        ],
                        [
                            'name' => 'minutes',
                            'label' => 'Measurement period',
                            'type' => 'number',
                            'suffix' => 'min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'umol',
                            'label' => 'Carbon fixed',
                            'type' => 'number',
                            'suffix' => 'µmol CO₂',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mg_dm2_h',
                            'label' => 'Rate',
                            'type' => 'number',
                            'suffix' => 'mg CO₂/dm²/h',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'g_m2_day',
                            'label' => 'Daily carbon gain at this rate',
                            'type' => 'number',
                            'suffix' => 'g C/m²/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'biomass',
                            'label' => 'Dry matter equivalent per day',
                            'type' => 'number',
                            'suffix' => 'g/m²/day',
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
            'title' => 'Rate',
            'results' => ['umol' => 'a*area*minutes*60', 'mg_dm2_h' => 'a*1.584', 'g_m2_day' => 'a*0.012*86400/1000000*12', 'biomass' => 'a*0.012*86400/1000000*12*2.2'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Net assimilation rate, Leaf area and Measurement period into Photosynthesis Rate and the answer comes back as Carbon fixed and Rate. Nothing is looked up on this page: carbon fixed is computed from net assimilation rate and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Carbon fixed is opened in µmol CO₂; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Photosynthesis Rate calculator works', 'html' => <<<'TXT'
            <p>The Photosynthesis Rate calculator applies one relationship to 3 numbers and reports Carbon fixed, Rate and Daily carbon gain at this rate.</p><p>The relationship it solves reads Carbon fixed = Net assimilation rate × Leaf area × Measurement period × 60.</p><p>What comes back is Carbon fixed, Rate, Daily carbon gain at this rate and Dry matter equivalent per day — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Net assimilation rate</strong> — in µmol CO₂/m²/s</li><li><strong>Leaf area</strong> — in m²</li><li><strong>Measurement period</strong> — in min</li></ul><p>The result boxes are Carbon fixed in µmol CO₂, Rate in mg CO₂/dm²/h, Daily carbon gain at this rate in g C/m²/day, Dry matter equivalent per day in g/m²/day; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Net assimilation rate = 12 µmol CO₂/m²/s, Leaf area = 0.02 m² and Measurement period = 10 min — through the same formula and the panel reports <strong>Carbon fixed</strong> = 144 µmol CO₂, <strong>Rate</strong> = 19.01 mg CO₂/dm²/h, <strong>Daily carbon gain at this rate</strong> = 0.1493 g C/m²/day and <strong>Dry matter equivalent per day</strong> = 0.3285 g/m²/day.</p><ul><li><strong>Carbon fixed</strong> = 144 µmol CO₂</li><li><strong>Rate</strong> = 19.01 mg CO₂/dm²/h</li><li><strong>Daily carbon gain at this rate</strong> = 0.1493 g C/m²/day</li><li><strong>Dry matter equivalent per day</strong> = 0.3285 g/m²/day</li></ul><p>The line behind those figures is <strong>Carbon fixed</strong> = <code>Net assimilation rate × Leaf area × Measurement period × 60</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Carbon fixed</strong> = 144, <strong>Rate</strong> = 19.01, <strong>Daily carbon gain at this rate</strong> = 0.1493 and <strong>Dry matter equivalent per day</strong> = 0.3285. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Carbon fixed is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Carbon fixed</strong> = <code>Net assimilation rate × Leaf area × Measurement period × 60</code></li><li><strong>Rate</strong> = <code>Net assimilation rate × 1.584</code></li><li><strong>Daily carbon gain at this rate</strong> = <code>Net assimilation rate × 0.012 × 86400 ÷ 1000000 × 12</code></li><li><strong>Dry matter equivalent per day</strong> = <code>Net assimilation rate × 0.012 × 86400 ÷ 1000000 × 12 × 2.2</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Carbon fixed</strong> = <code>Net assimilation rate × Leaf area × Measurement period × 60</code> — the form to use when Net assimilation rate, Leaf area and Measurement period are the values you have.</li><li><strong>Rate</strong> = <code>Net assimilation rate × 1.584</code> — the form to use when Net assimilation rate are the values you have.</li><li><strong>Daily carbon gain at this rate</strong> = <code>Net assimilation rate × 0.012 × 86400 ÷ 1000000 × 12</code> — the form to use when Net assimilation rate are the values you have.</li><li><strong>Dry matter equivalent per day</strong> = <code>Net assimilation rate × 0.012 × 86400 ÷ 1000000 × 12 × 2.2</code> — the form to use when Net assimilation rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Carbon fixed, Rate and Daily carbon gain at this rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Net assimilation rate, from 12 to 24 — and the answers go from <strong>Carbon fixed</strong> 144 µmol CO₂, <strong>Rate</strong> 19.01 mg CO₂/dm²/h, <strong>Daily carbon gain at this rate</strong> 0.1493 g C/m²/day and <strong>Dry matter equivalent per day</strong> 0.3285 g/m²/day to <strong>Carbon fixed</strong> 288 µmol CO₂, <strong>Rate</strong> 38.02 mg CO₂/dm²/h, <strong>Daily carbon gain at this rate</strong> 0.2986 g C/m²/day and <strong>Dry matter equivalent per day</strong> 0.6569 g/m²/day.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Carbon fixed, Rate and Daily carbon gain at this rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Net assimilation rate left as a guess.</strong> Anything typed into Net assimilation rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Leaf area left as a guess.</strong> Anything typed into Leaf area is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurement period left as a guess.</strong> Anything typed into Measurement period is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Net assimilation rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Net assimilation rate</strong> is measured in µmol CO₂/m²/s. It feeds Carbon fixed, Rate and Daily carbon gain at this rate. Have it to hand before you start: Net assimilation rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Leaf area</strong> is measured in m². It feeds Carbon fixed. Have it to hand before you start: Leaf area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Measurement period</strong> is measured in min. It feeds Carbon fixed. Have it to hand before you start: Measurement period is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Carbon fixed</strong> is a plain number and the page's own defaults put it at 144. The value follows from Net assimilation rate, Leaf area and Measurement period. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Rate</strong> is a plain number and the page's own defaults put it at 19.01. The value follows from Net assimilation rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Daily carbon gain at this rate</strong> is a plain number and the page's own defaults put it at 0.1493. The value follows from Net assimilation rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Dry matter equivalent per day</strong> is a plain number and the page's own defaults put it at 0.3285. The value follows from Net assimilation rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Carbon fixed</th><th>Rate</th><th>Daily carbon gain at this rate</th><th>Dry matter equivalent per day</th></tr></thead><tbody><tr><td><strong>Net assimilation rate</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Leaf area</strong> +10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Measurement period</strong> +10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Net assimilation rate: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Net assimilation rate = 6 µmol CO₂/m²/s, Leaf area = 0.01 m² and Measurement period = 5 min, the answer is <strong>Carbon fixed</strong> = 18 µmol CO₂, <strong>Rate</strong> = 9.5 mg CO₂/dm²/h, <strong>Daily carbon gain at this rate</strong> = 0.0746 g C/m²/day and <strong>Dry matter equivalent per day</strong> = 0.1642 g/m²/day.</li><li>With Net assimilation rate = 36 µmol CO₂/m²/s, Leaf area = 0.02 m² and Measurement period = 10 min, the answer is <strong>Carbon fixed</strong> = 432 µmol CO₂, <strong>Rate</strong> = 57.02 mg CO₂/dm²/h, <strong>Daily carbon gain at this rate</strong> = 0.4479 g C/m²/day and <strong>Dry matter equivalent per day</strong> = 0.9854 g/m²/day.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Carbon fixed is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Net assimilation rate, Leaf area and Measurement period measured, Carbon fixed and Rate wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/watterson-estimator">Watterson Estimator Calculator</a>, <a href="/biology/western-blot-loading">Western Blot Protein Loading Calculator</a> and <a href="/biology/absorbance-transmittance">Absorbance to Transmittance Converter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Photosynthesis Rate calculator work out?', 'a' => <<<'TXT'
            Carbon fixed, Rate, Daily carbon gain at this rate and Dry matter equivalent per day, from Net assimilation rate, Leaf area and Measurement period. The relationship is Carbon fixed = Net assimilation rate × Leaf area × Measurement period × 60.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Net assimilation rate (µmol CO₂/m²/s), Leaf area (m²), Measurement period (min). Fill net assimilation rate, leaf area and measurement period and leave Carbon fixed empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Carbon fixed, Rate, Daily carbon gain at this rate and Dry matter equivalent per day can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Carbon fixed = 144 µmol CO₂, Rate = 19.01 mg CO₂/dm²/h, Daily carbon gain at this rate = 0.1493 g C/m²/day and Dry matter equivalent per day = 0.3285 g/m²/day. Those are the defaults written into the form — move Net assimilation rate and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Carbon fixed is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Net assimilation rate left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Carbon fixed at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/watterson-estimator', 'name' => 'Watterson Estimator Calculator'],
            ['path' => '/biology/western-blot-loading', 'name' => 'Western Blot Protein Loading Calculator'],
            ['path' => '/biology/absorbance-transmittance', 'name' => 'Absorbance to Transmittance Converter Calculator'],
        ],
        'authors' => [],
    ],
];
