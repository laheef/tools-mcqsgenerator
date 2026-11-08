<?php

/**
 * DNA Molarity from Mass or A260
 * /biology/dna-molarity-from-mass
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA Molarity from Mass or A260',
    'meta' => ['title' => 'DNA Molarity from Mass or A260: Steps & Units', 'description' => 'DNA Molarity from mass or A260 reports molar concentration and pmol per µL. The answer, molar concentration, is worked out in one step from the boxes you fill.', 'h1' => 'DNA Molarity from Mass or A260', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'ng_ul',
                            'label' => 'DNA concentration',
                            'type' => 'number',
                            'suffix' => 'ng/µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'bp',
                            'label' => 'Fragment length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5000',
                        ],
                        [
                            'name' => 'nm',
                            'label' => 'Molar concentration',
                            'type' => 'number',
                            'suffix' => 'nM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pmol_ul',
                            'label' => 'pmol per µL',
                            'type' => 'number',
                            'suffix' => 'pmol/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'copies_ul',
                            'label' => 'Copies per µL',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'a260',
                            'label' => 'Equivalent A260',
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
            'title' => 'Molarity',
            'results' => ['nm' => 'ng_ul*1000000/(bp*660)', 'pmol_ul' => 'ng_ul*1000000/(bp*660)/1000', 'copies_ul' => 'ng_ul*0.000000001/660/bp*602200000000000000000000', 'a260' => 'ng_ul/50'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter DNA concentration and Fragment length into DNA Molarity from Mass or A260 and the answer comes back as Molar concentration and pmol per µL. Nothing is looked up on this page: molar concentration is computed from DNA concentration and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Molar concentration is opened in nM; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the DNA Molarity from Mass or A260 calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind DNA Molarity from Mass or A260: it takes 2 numbers and reports Molar concentration, pmol per µL and Copies per µL.</p><p>Written with the labels from the form, Molar concentration = DNA concentration × 1000000 ÷ (Fragment length × 660).</p><p>The answers are Molar concentration, pmol per µL, Copies per µL and Equivalent A260; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>DNA concentration</strong> — in ng/µL</li><li><strong>Fragment length</strong> — in bp</li></ul><p>The result boxes are Molar concentration in nM, pmol per µL in pmol/µL, Copies per µL, Equivalent A260; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — DNA concentration = 50 ng/µL and Fragment length = 5000 bp — through the same formula and the panel reports <strong>Molar concentration</strong> = 15.15 nM, <strong>pmol per µL</strong> = 0.0152 pmol/µL, <strong>Copies per µL</strong> = 9.124e+9 and <strong>Equivalent A260</strong> = 1.</p><ul><li><strong>Molar concentration</strong> = 15.15 nM</li><li><strong>pmol per µL</strong> = 0.0152 pmol/µL</li><li><strong>Copies per µL</strong> = 9.124e+9</li><li><strong>Equivalent A260</strong> = 1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Molar concentration</strong> = <code>DNA concentration × 1000000 ÷ (Fragment length × 660)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Molar concentration</strong> = 15.15, <strong>pmol per µL</strong> = 0.0152, <strong>Copies per µL</strong> = 9.124e+9 and <strong>Equivalent A260</strong> = 1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Molar concentration is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Molar concentration</strong> = <code>DNA concentration × 1000000 ÷ (Fragment length × 660)</code></li><li><strong>pmol per µL</strong> = <code>DNA concentration × 1000000 ÷ (Fragment length × 660) ÷ 1000</code></li><li><strong>Copies per µL</strong> = <code>DNA concentration × 0.000000001 ÷ 660 ÷ Fragment length × 602200000000000000000000</code></li><li><strong>Equivalent A260</strong> = <code>DNA concentration ÷ 50</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Molar concentration</strong> = <code>DNA concentration × 1000000 ÷ (Fragment length × 660)</code> — the form to use when DNA concentration and Fragment length are the values you have.</li><li><strong>pmol per µL</strong> = <code>DNA concentration × 1000000 ÷ (Fragment length × 660) ÷ 1000</code> — the form to use when DNA concentration and Fragment length are the values you have.</li><li><strong>Copies per µL</strong> = <code>DNA concentration × 0.000000001 ÷ 660 ÷ Fragment length × 602200000000000000000000</code> — the form to use when DNA concentration and Fragment length are the values you have.</li><li><strong>Equivalent A260</strong> = <code>DNA concentration ÷ 50</code> — the form to use when DNA concentration are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Molar concentration, pmol per µL and Copies per µL can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — DNA concentration, from 50 to 100 — and the answers go from <strong>Molar concentration</strong> 15.15 nM, <strong>pmol per µL</strong> 0.0152 pmol/µL, <strong>Copies per µL</strong> 9.124e+9 and <strong>Equivalent A260</strong> 1 to <strong>Molar concentration</strong> 30.3 nM, <strong>pmol per µL</strong> 0.0303 pmol/µL, <strong>Copies per µL</strong> 1.825e+1 and <strong>Equivalent A260</strong> 2.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Molar concentration, pmol per µL and Copies per µL are results: they are worked out from the boxes above and cannot be typed into, so a past answer has to be entered as one of the inputs instead.</li><li><strong>DNA concentration left as a guess.</strong> Anything typed into DNA concentration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Fragment length left as a guess.</strong> Anything typed into Fragment length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in DNA concentration and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>DNA concentration</strong> is measured in ng/µL. The page reads it when it works out Molar concentration, pmol per µL and Copies per µL. Have it to hand before you start: DNA concentration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Fragment length</strong> is measured in bp. The page reads it when it works out Molar concentration, pmol per µL and Copies per µL. Have it to hand before you start: Fragment length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Molar concentration</strong> is a plain number and the page's own defaults put it at 15.15. It is computed from DNA concentration and Fragment length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>pmol per µL</strong> is a plain number and the page's own defaults put it at 0.0152. It is computed from DNA concentration and Fragment length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Copies per µL</strong> is a plain number and the page's own defaults put it at 9.124e+9. It is computed from DNA concentration and Fragment length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Equivalent A260</strong> is a plain number and the page's own defaults put it at 1. It is computed from DNA concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Molar concentration</th><th>pmol per µL</th><th>Copies per µL</th><th>Equivalent A260</th></tr></thead><tbody><tr><td><strong>DNA concentration</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Fragment length</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to DNA concentration: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With DNA concentration = 25 ng/µL and Fragment length = 2500 bp, the answer is <strong>Molar concentration</strong> = 15.15 nM, <strong>pmol per µL</strong> = 0.0152 pmol/µL, <strong>Copies per µL</strong> = 9.124e+9 and <strong>Equivalent A260</strong> = 0.5.</li><li>With DNA concentration = 150 ng/µL and Fragment length = 5000 bp, the answer is <strong>Molar concentration</strong> = 45.45 nM, <strong>pmol per µL</strong> = 0.0455 pmol/µL, <strong>Copies per µL</strong> = 2.737e+1 and <strong>Equivalent A260</strong> = 3.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Molar concentration is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes DNA concentration and Fragment length are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: DNA concentration and Fragment length measured, Molar concentration and pmol per µL wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a>, <a href="/biology/dog-size">Dog size Calculator</a> and <a href="/biology/dog-water-intake">Dog water intake Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA Molarity from Mass or A260 calculator work out?', 'a' => <<<'TXT'
            Molar concentration, pmol per µL, Copies per µL and Equivalent A260, from DNA concentration and Fragment length. The relationship is Molar concentration = DNA concentration × 1000000 ÷ (Fragment length × 660).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            DNA concentration (ng/µL), Fragment length (bp). With DNA concentration and fragment length in place, Molar concentration can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Molar concentration, pmol per µL, Copies per µL and Equivalent A260 can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Molar concentration = 15.15 nM, pmol per µL = 0.0152 pmol/µL, Copies per µL = 9.124e+9 and Equivalent A260 = 1. That comes from the page's own defaults, entered in DNA concentration; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Molar concentration is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With DNA concentration left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Molar concentration at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
            ['path' => '/biology/dog-size', 'name' => 'Dog size Calculator'],
            ['path' => '/biology/dog-water-intake', 'name' => 'Dog water intake Calculator'],
        ],
        'authors' => [],
    ],
];
