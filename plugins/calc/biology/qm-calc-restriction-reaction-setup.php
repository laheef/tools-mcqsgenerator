<?php

/**
 * Restriction Digest Recipe
 * /biology/restriction-reaction-setup
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Restriction Digest Recipe',
    'meta' => ['title' => 'Restriction Digest Recipe — Formula & Results', 'description' => 'Restriction Digest Recipe takes DNA to digest and returns DNA volume. The answer, enzyme units needed, is worked out in one step from the boxes you fill.', 'h1' => 'Restriction Digest Recipe', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'dna_ug',
                            'label' => 'DNA to digest',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'dna_conc',
                            'label' => 'DNA concentration',
                            'type' => 'number',
                            'suffix' => 'ng/µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'volume_ul',
                            'label' => 'Reaction volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'units_per_ug',
                            'label' => 'Units per microgram',
                            'type' => 'number',
                            'suffix' => 'U/µg',
                            'help' => '5–10 U/µg is routine for a plasmid',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'enzyme_conc',
                            'label' => 'Enzyme stock',
                            'type' => 'number',
                            'suffix' => 'U/mL',
                            'help' => 'Most enzymes are supplied at 20 000 U/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20000',
                        ],
                        [
                            'name' => 'dna_ul',
                            'label' => 'DNA volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'units',
                            'label' => 'Enzyme units needed',
                            'type' => 'number',
                            'suffix' => 'U',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'enzyme_ul',
                            'label' => 'Enzyme volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'help' => 'Must stay under 10% of the reaction',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'buffer_ul',
                            'label' => '10× buffer',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'help' => 'One tenth of the reaction',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water_ul',
                            'label' => 'Water',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'help' => 'Makes up the rest',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'glycerol_pct',
                            'label' => 'Glycerol in the reaction',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Above 5% the enzyme starts to starve',
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
                'dna_ul' => 'dna_ug*1000/dna_conc',
                'units' => 'dna_ug*units_per_ug',
                'enzyme_ul' => 'units/(enzyme_conc/1000)',
                'buffer_ul' => 'volume_ul/10',
                'water_ul' => 'volume_ul-dna_ul-enzyme_ul-volume_ul/10',
                'glycerol_pct' => 'enzyme_ul/volume_ul*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Restriction Digest Recipe works out DNA volume and Enzyme units needed from DNA to digest, DNA concentration and Reaction volume. There is no hidden constant here: change DNA volume and DNA to digest moves with it. The main result, DNA volume, is reported in µL.
        TXT,
        'sections' => [
            ['title' => 'How the Restriction Digest Recipe calculator works', 'html' => <<<'TXT'
            <p>Restriction Digest Recipe answers one question from 5 numbers, and the answer is DNA volume, Enzyme units needed and Enzyme volume.</p><p>In the form&#039;s own words, DNA volume = DNA to digest × 1000 ÷ DNA concentration.</p><p>The result panel carries DNA volume, Enzyme units needed, Enzyme volume and 10× buffer, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>DNA to digest</strong> — in µg</li><li><strong>DNA concentration</strong> — in ng/µL</li><li><strong>Reaction volume</strong> — in µL</li><li><strong>Units per microgram</strong> — in U/µg. 5–10 U/µg is routine for a plasmid</li><li><strong>Enzyme stock</strong> — in U/mL. Most enzymes are supplied at 20 000 U/mL</li></ul><p>What you get back is DNA volume in µL, Enzyme units needed in U, Enzyme volume in µL, 10× buffer in µL, Water in µL, Glycerol in the reaction in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — DNA to digest = 1 µg, DNA concentration = 100 ng/µL, Reaction volume = 20 µL, Units per microgram = 10 U/µg and Enzyme stock = 20000 U/mL — through the same formula and the panel reports <strong>DNA volume</strong> = 10 µL, <strong>Enzyme units needed</strong> = 10 U, <strong>Enzyme volume</strong> = 0.5 µL, <strong>10× buffer</strong> = 2 µL, <strong>Water</strong> = 7.5 µL and <strong>Glycerol in the reaction</strong> = 2.5 %.</p><ul><li><strong>DNA volume</strong> = 10 µL</li><li><strong>Enzyme units needed</strong> = 10 U</li><li><strong>Enzyme volume</strong> = 0.5 µL</li><li><strong>10× buffer</strong> = 2 µL</li><li><strong>Water</strong> = 7.5 µL</li><li><strong>Glycerol in the reaction</strong> = 2.5 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>DNA volume</strong> = <code>DNA to digest × 1000 ÷ DNA concentration</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>DNA volume</strong> = 10, <strong>Enzyme units needed</strong> = 10, <strong>Enzyme volume</strong> = 0.5, <strong>10× buffer</strong> = 2, <strong>Water</strong> = 7.5 and <strong>Glycerol in the reaction</strong> = 2.5. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as DNA volume is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>DNA volume</strong> = <code>DNA to digest × 1000 ÷ DNA concentration</code></li><li><strong>Enzyme units needed</strong> = <code>DNA to digest × Units per microgram</code></li><li><strong>Enzyme volume</strong> = <code>Enzyme units needed ÷ (Enzyme stock ÷ 1000)</code></li><li><strong>10× buffer</strong> = <code>Reaction volume ÷ 10</code></li><li><strong>Water</strong> = <code>Reaction volume − DNA volume − Enzyme volume − Reaction volume ÷ 10</code></li><li><strong>Glycerol in the reaction</strong> = <code>Enzyme volume ÷ Reaction volume × 100</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>DNA volume</strong> = <code>DNA to digest × 1000 ÷ DNA concentration</code> — the form to use when DNA to digest and DNA concentration are the values you have.</li><li><strong>Enzyme units needed</strong> = <code>DNA to digest × Units per microgram</code> — the form to use when DNA to digest and Units per microgram are the values you have.</li><li><strong>Enzyme volume</strong> = <code>Enzyme units needed ÷ (Enzyme stock ÷ 1000)</code> — the form to use when Enzyme units needed and Enzyme stock are the values you have.</li><li><strong>10× buffer</strong> = <code>Reaction volume ÷ 10</code> — the form to use when Reaction volume are the values you have.</li><li><strong>Water</strong> = <code>Reaction volume − DNA volume − Enzyme volume − Reaction volume ÷ 10</code> — the form to use when Reaction volume, DNA volume and Enzyme volume are the values you have.</li><li><strong>Glycerol in the reaction</strong> = <code>Enzyme volume ÷ Reaction volume × 100</code> — the form to use when Enzyme volume and Reaction volume are the values you have.</li></ul><p>Any one of DNA volume, Enzyme units needed and Enzyme volume can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double DNA to digest from 1 to 2, leaving every other box alone. The panel moves from <strong>DNA volume</strong> 10 µL, <strong>Enzyme units needed</strong> 10 U, <strong>Enzyme volume</strong> 0.5 µL, <strong>10× buffer</strong> 2 µL, <strong>Water</strong> 7.5 µL and <strong>Glycerol in the reaction</strong> 2.5 % to <strong>DNA volume</strong> 20 µL, <strong>Enzyme units needed</strong> 20 U, <strong>Enzyme volume</strong> 1 µL, <strong>10× buffer</strong> 2 µL, <strong>Water</strong> -3 µL and <strong>Glycerol in the reaction</strong> 5 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> DNA volume, Enzyme units needed and Enzyme volume are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>DNA to digest left as a guess.</strong> Anything typed into DNA to digest is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>DNA concentration left as a guess.</strong> Anything typed into DNA concentration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Reaction volume left as a guess.</strong> Anything typed into Reaction volume is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in DNA to digest and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Restriction Digest Recipe form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>DNA to digest</strong> is measured in µg. The page reads it when it works out DNA volume and Enzyme units needed. Fill it from a measurement rather than a memory — DNA to digest is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>DNA concentration</strong> is measured in ng/µL. The page reads it when it works out DNA volume. Fill it from a measurement rather than a memory — DNA concentration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Reaction volume</strong> is measured in µL. The page reads it when it works out 10× buffer, Water and Glycerol in the reaction. Fill it from a measurement rather than a memory — Reaction volume is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Units per microgram</strong> is measured in U/µg. 5–10 U/µg is routine for a plasmid. The page reads it when it works out Enzyme units needed. Fill it from a measurement rather than a memory — Units per microgram is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Enzyme stock</strong> is measured in U/mL. Most enzymes are supplied at 20 000 U/mL. The page reads it when it works out Enzyme volume. Fill it from a measurement rather than a memory — Enzyme stock is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>DNA volume</strong> is a plain number and the page's own defaults put it at 10. It is worked out from DNA to digest and DNA concentration. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Enzyme units needed</strong> is a plain number and the page's own defaults put it at 10. It is worked out from DNA to digest and Units per microgram. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Enzyme volume</strong> is a plain number and the page's own defaults put it at 0.5. It is worked out from Enzyme units needed and Enzyme stock. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>10× buffer</strong> is a plain number and the page's own defaults put it at 2. It is worked out from Reaction volume. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Water</strong> is a plain number and the page's own defaults put it at 7.5. It is worked out from Reaction volume, DNA volume and Enzyme volume. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Glycerol in the reaction</strong> is a plain number and the page's own defaults put it at 2.5. It is worked out from Enzyme volume and Reaction volume. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>DNA volume</th><th>Enzyme units needed</th><th>Enzyme volume</th><th>10× buffer</th><th>Water</th><th>Glycerol in the reaction</th></tr></thead><tbody><tr><td><strong>DNA to digest</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>-14%</td><td>+10%</td></tr><tr><td><strong>DNA concentration</strong> +10%</td><td>-9.09%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+12.12%</td><td>+0%</td></tr><tr><td><strong>Reaction volume</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+24%</td><td>-9.09%</td></tr><tr><td><strong>Units per microgram</strong> +10%</td><td>+0%</td><td>+10%</td><td>+10%</td><td>+0%</td><td>-0.67%</td><td>+10%</td></tr><tr><td><strong>Enzyme stock</strong> +10%</td><td>+0%</td><td>+0%</td><td>-9.09%</td><td>+0%</td><td>+0.61%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Reaction volume: ten per cent there moves an answer by about 24 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind DNA volume is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: DNA to digest, DNA concentration and Reaction volume measured, DNA volume and Enzyme units needed wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dna-molarity-from-mass">DNA Molarity from Mass or A260 Calculator</a>, <a href="/biology/dna-molecular-weight-calculator">DNA Molecular Weight Calculator</a> and <a href="/biology/dna-pattern-finder">DNA Pattern Finder Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Restriction Digest Recipe calculator work out?', 'a' => <<<'TXT'
            DNA volume, Enzyme units needed, Enzyme volume and 10× buffer, from DNA to digest and DNA concentration. The relationship is DNA volume = DNA to digest × 1000 ÷ DNA concentration.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            DNA to digest (µg), DNA concentration (ng/µL), Reaction volume (µL), Units per microgram (U/µg), Enzyme stock (U/mL). Enter DNA to digest, DNA concentration and reaction volume; DNA volume is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of DNA volume, Enzyme units needed, Enzyme volume and 10× buffer blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            DNA volume = 10 µL, Enzyme units needed = 10 U, Enzyme volume = 0.5 µL, 10× buffer = 2 µL, Water = 7.5 µL and Glycerol in the reaction = 2.5 %. That comes from the page's own defaults, entered in DNA to digest; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of DNA volume is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave DNA to digest blank and the page solves for it, reporting DNA volume instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to DNA volume at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/dna-molarity-from-mass', 'name' => 'DNA Molarity from Mass or A260 Calculator'],
            ['path' => '/biology/dna-molecular-weight-calculator', 'name' => 'DNA Molecular Weight Calculator'],
            ['path' => '/biology/dna-pattern-finder', 'name' => 'DNA Pattern Finder Calculator'],
        ],
        'authors' => [],
    ],
];
