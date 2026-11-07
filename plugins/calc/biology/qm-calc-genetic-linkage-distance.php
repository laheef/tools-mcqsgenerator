<?php

/**
 * Recombination to Centimorgans
 * /biology/genetic-linkage-distance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Recombination to Centimorgans',
    'meta' => ['title' => 'Recombination to Centimorgans — Formula & Results', 'description' => 'Recombination to Centimorgans works out recombination fraction and haldane distance from recombinant offspring, total offspring and Use Kosambi (interference).', 'h1' => 'Recombination to Centimorgans', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'recombinants',
                            'label' => 'Recombinant offspring',
                            'type' => 'number',
                            'help' => 'From a test cross',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '35',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total offspring',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'use_kosambi',
                            'label' => 'Use Kosambi (interference)',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'help' => 'Untick for Haldane, which assumes crossovers are independent',
                            'default' => 'No',
                        ],
                        [
                            'name' => 'rf',
                            'label' => 'Recombination fraction',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'haldane',
                            'label' => 'Haldane distance',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kosambi',
                            'label' => 'Kosambi distance',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'corrected',
                            'label' => 'Corrected distance (chosen function)',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gap',
                            'label' => 'Distance added by the map correction',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'help' => 'Corrected minus raw RF distance',
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
            'title' => 'Distance',
            'results' => [
                'rf' => 'if_else(recombinants/total<0.49,recombinants/total,0.49)',
                'haldane' => '-0.5*log(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))*100',
                'kosambi' => '0.25*log((1+2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))/(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49))))*100',
                'corrected' => <<<'TXT'
                if_else(use_kosambi>0.5,0.25*log((1+2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))/(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49))))*100,-0.5*log(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))*100)
                TXT,
                'gap' => <<<'TXT'
                if_else(use_kosambi>0.5,0.25*log((1+2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))/(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49))))*100,-0.5*log(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))*100)-if_else(recombinants/total<0.49,recombinants/total,0.49)*100
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Recombinant offspring, Total offspring and Use Kosambi (interference) into Recombination to Centimorgans and the answer comes back as Recombination fraction and Haldane distance. There is no hidden constant here: change recombination fraction and recombinant offspring moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Recombination to Centimorgans calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Recombination to Centimorgans: it takes 3 numbers and reports Recombination fraction, Haldane distance and Kosambi distance.</p><p>Written with the labels from the form, Recombination fraction = if_else(Recombinant offspring ÷ Total offspring&lt;0.49,Recombinant offspring ÷ Total offspring,0.49).</p><p>What comes back is Recombination fraction, Haldane distance, Kosambi distance and Corrected distance (chosen function) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Recombinant offspring</strong> — a plain number, no unit. From a test cross</li><li><strong>Total offspring</strong> — a plain number, no unit</li><li><strong>Use Kosambi (interference)</strong> — a plain number, no unit. Untick for Haldane, which assumes crossovers are independent</li></ul><p>The answers come back as Recombination fraction, Haldane distance in cM, Kosambi distance in cM, Corrected distance (chosen function) in cM, Distance added by the map correction in cM. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Recombinant offspring = 35, Total offspring = 200 and Use Kosambi (interference) = 0 gives <strong>Recombination fraction</strong> = 0.175, <strong>Haldane distance</strong> = 21.54 cM, <strong>Kosambi distance</strong> = 18.27 cM, <strong>Corrected distance (chosen function)</strong> = 21.54 cM and <strong>Distance added by the map correction</strong> = 4.04 cM.</p><ul><li><strong>Recombination fraction</strong> = 0.175</li><li><strong>Haldane distance</strong> = 21.54 cM</li><li><strong>Kosambi distance</strong> = 18.27 cM</li><li><strong>Corrected distance (chosen function)</strong> = 21.54 cM</li><li><strong>Distance added by the map correction</strong> = 4.04 cM</li></ul><p>That is <strong>Recombination fraction</strong> = <code>if_else(Recombinant offspring ÷ Total offspring&lt;0.49,Recombinant offspring ÷ Total offspring,0.49)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Recombination fraction</strong> = 0.175, <strong>Haldane distance</strong> = 21.54, <strong>Kosambi distance</strong> = 18.27, <strong>Corrected distance (chosen function)</strong> = 21.54 and <strong>Distance added by the map correction</strong> = 4.04. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Recombination fraction is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Recombination fraction</strong> = <code>if_else(Recombinant offspring ÷ Total offspring&lt;0.49,Recombinant offspring ÷ Total offspring,0.49)</code></li><li><strong>Haldane distance</strong> = <code>− 0.5 × ln(1 − 2 × (if_else(Recombinant offspring ÷ Total offspring&lt;0.49,Recombinant offspring ÷ Total offspring,0.49))) × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Recombination fraction</strong> = <code>if_else(Recombinant offspring ÷ Total offspring&lt;0.49,Recombinant offspring ÷ Total offspring,0.49)</code> — the form to use when Recombinant offspring and Total offspring are the values you have.</li><li><strong>Haldane distance</strong> = <code>− 0.5 × ln(1 − 2 × (if_else(Recombinant offspring ÷ Total offspring&lt;0.49,Recombinant offspring ÷ Total offspring,0.49))) × 100</code> — the form to use when Recombinant offspring and Total offspring are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Recombination fraction, Haldane distance and Kosambi distance can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Recombinant offspring from 35 to 70, leaving every other box alone. The panel moves from <strong>Recombination fraction</strong> 0.175, <strong>Haldane distance</strong> 21.54 cM, <strong>Kosambi distance</strong> 18.27 cM, <strong>Corrected distance (chosen function)</strong> 21.54 cM and <strong>Distance added by the map correction</strong> 4.04 cM to <strong>Recombination fraction</strong> 0.35, <strong>Haldane distance</strong> 60.2 cM, <strong>Kosambi distance</strong> 43.37 cM, <strong>Corrected distance (chosen function)</strong> 60.2 cM and <strong>Distance added by the map correction</strong> 25.2 cM.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Recombination fraction, Haldane distance and Kosambi distance are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Recombinant offspring left as a guess.</strong> Anything typed into Recombinant offspring is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Total offspring left as a guess.</strong> Anything typed into Total offspring is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Use Kosambi (interference) left as a guess.</strong> Anything typed into Use Kosambi (interference) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Recombinant offspring is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Recombination to Centimorgans form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Recombinant offspring</strong> takes a plain number with no unit attached. From a test cross. It feeds Recombination fraction, Haldane distance and Kosambi distance. Fill it from a measurement rather than a memory — Recombinant offspring is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total offspring</strong> takes a plain number with no unit attached. It feeds Recombination fraction, Haldane distance and Kosambi distance. Fill it from a measurement rather than a memory — Total offspring is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Use Kosambi (interference)</strong> takes a plain number with no unit attached. Untick for Haldane, which assumes crossovers are independent. It feeds Corrected distance (chosen function) and Distance added by the map correction. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Use Kosambi (interference) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Recombination fraction</strong> is a plain number and the page's own defaults put it at 0.175. It is worked out from Recombinant offspring and Total offspring. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Haldane distance</strong> is a plain number and the page's own defaults put it at 21.54. It is worked out from Recombinant offspring and Total offspring. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Kosambi distance</strong> is a plain number and the page's own defaults put it at 18.27. It is worked out from Recombinant offspring and Total offspring. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Corrected distance (chosen function)</strong> is a plain number and the page's own defaults put it at 21.54. It is worked out from Use Kosambi (interference), Recombinant offspring and Total offspring. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Distance added by the map correction</strong> is a plain number and the page's own defaults put it at 4.04. It is worked out from Use Kosambi (interference), Recombinant offspring and Total offspring. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Recombination fraction</th><th>Haldane distance</th><th>Kosambi distance</th><th>Corrected distance (chosen function)</th><th>Distance added by the map correction</th></tr></thead><tbody><tr><td><strong>Recombinant offspring</strong> +10%</td><td>+10%</td><td>+12.85%</td><td>+11.07%</td><td>+12.85%</td><td>+25.19%</td></tr><tr><td><strong>Total offspring</strong> +10%</td><td>-9.09%</td><td>-11.09%</td><td>-9.8%</td><td>-11.09%</td><td>-19.77%</td></tr></tbody></table><p>The steepest column belongs to Recombinant offspring: ten per cent there moves an answer by about 25.2 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Recombinant offspring = 17.5, Total offspring = 100 and Use Kosambi (interference) = 0 and the page reports <strong>Recombination fraction</strong> = 0.175, <strong>Haldane distance</strong> = 21.54 cM, <strong>Kosambi distance</strong> = 18.27 cM, <strong>Corrected distance (chosen function)</strong> = 21.54 cM and <strong>Distance added by the map correction</strong> = 4.04 cM.</li><li>Feed in Recombinant offspring = 105, Total offspring = 200 and Use Kosambi (interference) = 0 and the page reports <strong>Recombination fraction</strong> = 0.49, <strong>Haldane distance</strong> = 196 cM, <strong>Kosambi distance</strong> = 115 cM, <strong>Corrected distance (chosen function)</strong> = 196 cM and <strong>Distance added by the map correction</strong> = 147 cM.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Recombination fraction is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Recombinant offspring, Total offspring and Use Kosambi (interference) measured, Recombination fraction and Haldane distance wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/allele-frequency">Allele frequency Calculator</a>, <a href="/biology/allometric-equation">Allometric Equation Calculator</a> and <a href="/biology/amino-acid-composition">Amino Acid Composition Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Recombination to Centimorgans calculator work out?', 'a' => <<<'TXT'
            Recombination fraction, Haldane distance, Kosambi distance and Corrected distance (chosen function), from Recombinant offspring and Total offspring. The relationship is Recombination fraction = if_else(Recombinant offspring ÷ Total offspring<0.49,Recombinant offspring ÷ Total offspring,0.49).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Recombinant offspring, Total offspring, Use Kosambi (interference). Enter recombinant offspring, total offspring and use Kosambi (interference); Recombination fraction is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Recombination fraction, Haldane distance, Kosambi distance and Corrected distance (chosen function) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Recombination fraction = 0.175, Haldane distance = 21.54 cM, Kosambi distance = 18.27 cM, Corrected distance (chosen function) = 21.54 cM and Distance added by the map correction = 4.04 cM. Those are the defaults written into the form — move Recombinant offspring and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Recombination fraction is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Recombinant offspring blank and the page solves for it, reporting Recombination fraction instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Recombination fraction keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/allele-frequency', 'name' => 'Allele frequency Calculator'],
            ['path' => '/biology/allometric-equation', 'name' => 'Allometric Equation Calculator'],
            ['path' => '/biology/amino-acid-composition', 'name' => 'Amino Acid Composition Calculator'],
        ],
        'authors' => [],
    ],
];
