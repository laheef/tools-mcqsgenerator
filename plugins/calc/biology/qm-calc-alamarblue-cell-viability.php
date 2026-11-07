<?php

/**
 * AlamarBlue Cell Viability / Percent Reduction Calculator
 * /biology/alamarblue-cell-viability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'AlamarBlue Cell Viability / Percent Reduction Calculator',
    'meta' => ['title' => 'AlamarBlue Cell Viability and Percent Reduction', 'description' => 'AlamarBlue Cell Viability / Percent Reduction Calculator turns sample fluorescence and control fluorescence into viability relative to control and cytotoxicity.', 'h1' => 'AlamarBlue Cell Viability / Percent Reduction Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'sample',
                            'label' => 'Sample fluorescence',
                            'type' => 'number',
                            'suffix' => 'RFU',
                            'help' => 'Treated wells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '32000',
                        ],
                        [
                            'name' => 'control',
                            'label' => 'Control fluorescence',
                            'type' => 'number',
                            'suffix' => 'RFU',
                            'help' => 'Untreated wells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '48000',
                        ],
                        [
                            'name' => 'blank',
                            'label' => 'Medium-only blank',
                            'type' => 'number',
                            'suffix' => 'RFU',
                            'help' => 'No cells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2500',
                        ],
                        [
                            'name' => 'reduction',
                            'label' => 'Percent reduction',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'viability',
                            'label' => 'Viability relative to control',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ic',
                            'label' => 'Cytotoxicity',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Viability',
            'results' => ['reduction' => '(sample-blank)/(control-blank)*100', 'viability' => '(sample-blank)/(control-blank)*100', 'ic' => '100-(sample-blank)/(control-blank)*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        AlamarBlue Cell Viability / Percent Reduction works out Percent reduction and Viability relative to control from Sample fluorescence, Control fluorescence and Medium-only blank. It is a single relationship that reads percent reduction out of sample fluorescence, not a table of canned results keyed by them. Units for Percent reduction default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the AlamarBlue Cell Viability / Percent Reduction calculator works', 'html' => <<<'TXT'
            <p>AlamarBlue Cell Viability / Percent Reduction answers one question from 3 numbers, and the answer is Percent reduction, Viability relative to control and Cytotoxicity.</p><p>The relationship it solves reads Percent reduction = (Sample fluorescence − Medium-only blank) ÷ (Control fluorescence − Medium-only blank) × 100.</p><p>What comes back is Percent reduction, Viability relative to control and Cytotoxicity — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Sample fluorescence</strong> — in RFU. Treated wells</li><li><strong>Control fluorescence</strong> — in RFU. Untreated wells</li><li><strong>Medium-only blank</strong> — in RFU. No cells</li></ul><p>The result boxes are Percent reduction in %, Viability relative to control in %, Cytotoxicity in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Sample fluorescence = 32000 RFU, Control fluorescence = 48000 RFU and Medium-only blank = 2500 RFU; the answers are <strong>Percent reduction</strong> = 64.84 %, <strong>Viability relative to control</strong> = 64.84 % and <strong>Cytotoxicity</strong> = 35.16 %.</p><ul><li><strong>Percent reduction</strong> = 64.84 %</li><li><strong>Viability relative to control</strong> = 64.84 %</li><li><strong>Cytotoxicity</strong> = 35.16 %</li></ul><p>The line behind those figures is <strong>Percent reduction</strong> = <code>(Sample fluorescence − Medium-only blank) ÷ (Control fluorescence − Medium-only blank) × 100</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Percent reduction</strong> = 64.84, <strong>Viability relative to control</strong> = 64.84 and <strong>Cytotoxicity</strong> = 35.16. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Percent reduction is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Percent reduction</strong> = <code>(Sample fluorescence − Medium-only blank) ÷ (Control fluorescence − Medium-only blank) × 100</code></li><li><strong>Viability relative to control</strong> = <code>(Sample fluorescence − Medium-only blank) ÷ (Control fluorescence − Medium-only blank) × 100</code></li><li><strong>Cytotoxicity</strong> = <code>100 − (Sample fluorescence − Medium-only blank) ÷ (Control fluorescence − Medium-only blank) × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Percent reduction</strong> = <code>(Sample fluorescence − Medium-only blank) ÷ (Control fluorescence − Medium-only blank) × 100</code> — the form to use when Sample fluorescence, Medium-only blank and Control fluorescence are the values you have.</li><li><strong>Viability relative to control</strong> = <code>(Sample fluorescence − Medium-only blank) ÷ (Control fluorescence − Medium-only blank) × 100</code> — the form to use when Sample fluorescence, Medium-only blank and Control fluorescence are the values you have.</li><li><strong>Cytotoxicity</strong> = <code>100 − (Sample fluorescence − Medium-only blank) ÷ (Control fluorescence − Medium-only blank) × 100</code> — the form to use when Sample fluorescence, Medium-only blank and Control fluorescence are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Percent reduction, Viability relative to control and Cytotoxicity can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Sample fluorescence from 32000 to 64000, leaving every other box alone. The panel moves from <strong>Percent reduction</strong> 64.84 %, <strong>Viability relative to control</strong> 64.84 % and <strong>Cytotoxicity</strong> 35.16 % to <strong>Percent reduction</strong> 135 %, <strong>Viability relative to control</strong> 135 % and <strong>Cytotoxicity</strong> -35.16 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Percent reduction, Viability relative to control and Cytotoxicity are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Sample fluorescence left as a guess.</strong> Anything typed into Sample fluorescence is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Control fluorescence left as a guess.</strong> Anything typed into Control fluorescence is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Medium-only blank left as a guess.</strong> Anything typed into Medium-only blank is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Sample fluorescence is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Sample fluorescence</strong> is measured in RFU. Treated wells. The page reads it when it works out Percent reduction, Viability relative to control and Cytotoxicity. Have it to hand before you start: Sample fluorescence is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Control fluorescence</strong> is measured in RFU. Untreated wells. The page reads it when it works out Percent reduction, Viability relative to control and Cytotoxicity. Have it to hand before you start: Control fluorescence is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Medium-only blank</strong> is measured in RFU. The page reads it when it works out Percent reduction, Viability relative to control and Cytotoxicity. Have it to hand before you start: Medium-only blank is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Percent reduction</strong> is a plain number and the page's own defaults put it at 64.84. It is computed from Sample fluorescence, Medium-only blank and Control fluorescence, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Viability relative to control</strong> is a plain number and the page's own defaults put it at 64.84. It is computed from Sample fluorescence, Medium-only blank and Control fluorescence, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Cytotoxicity</strong> is a plain number and the page's own defaults put it at 35.16. It is computed from Sample fluorescence, Medium-only blank and Control fluorescence, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Percent reduction</th><th>Viability relative to control</th><th>Cytotoxicity</th></tr></thead><tbody><tr><td><strong>Sample fluorescence</strong> +10%</td><td>+10.85%</td><td>+10.85%</td><td>-20%</td></tr><tr><td><strong>Control fluorescence</strong> +10%</td><td>-9.54%</td><td>-9.54%</td><td>+17.59%</td></tr><tr><td><strong>Medium-only blank</strong> +10%</td><td>-0.3%</td><td>-0.3%</td><td>+0.55%</td></tr></tbody></table><p>The steepest column belongs to Sample fluorescence: ten per cent there moves an answer by about 20 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Sample fluorescence = 16000 RFU, Control fluorescence = 24000 RFU and Medium-only blank = 1250 RFU, the answer is <strong>Percent reduction</strong> = 64.84 %, <strong>Viability relative to control</strong> = 64.84 % and <strong>Cytotoxicity</strong> = 35.16 %.</li><li>With Sample fluorescence = 96000 RFU, Control fluorescence = 48000 RFU and Medium-only blank = 2500 RFU, the answer is <strong>Percent reduction</strong> = 205 %, <strong>Viability relative to control</strong> = 205 % and <strong>Cytotoxicity</strong> = -105 %.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Percent reduction is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Sample fluorescence, Control fluorescence and Medium-only blank is what you already know and Percent reduction and Viability relative to control is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/qpcr-efficiency">qPCR efficiency Calculator</a>, <a href="/biology/quadrat-sampling-density">Quadrat Sampling Density Calculator</a> and <a href="/biology/rabbit-cage-size">Rabbit cage size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the AlamarBlue Cell Viability / Percent Reduction calculator work out?', 'a' => <<<'TXT'
            Percent reduction, Viability relative to control and Cytotoxicity, from Sample fluorescence, Medium-only blank and Control fluorescence. The relationship is Percent reduction = (Sample fluorescence − Medium-only blank) ÷ (Control fluorescence − Medium-only blank) × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sample fluorescence (RFU), Control fluorescence (RFU), Medium-only blank (RFU). With sample fluorescence, control fluorescence and medium-only blank in place, Percent reduction can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Percent reduction, Viability relative to control and Cytotoxicity can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Percent reduction = 64.84 %, Viability relative to control = 64.84 % and Cytotoxicity = 35.16 %. The figures come from Sample fluorescence as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Percent reduction is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Sample fluorescence left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Percent reduction at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/qpcr-efficiency', 'name' => 'qPCR efficiency Calculator'],
            ['path' => '/biology/quadrat-sampling-density', 'name' => 'Quadrat Sampling Density Calculator'],
            ['path' => '/biology/rabbit-cage-size', 'name' => 'Rabbit cage size'],
        ],
        'authors' => [],
    ],
];
