<?php

/**
 * Fold Change Calculator
 * /biology/fold-change
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fold Change Calculator',
    'meta' => ['title' => 'Fold Change Calculator: Formula, Steps & Results', 'description' => 'Fold Change Calculator works out log₂ fold change and percent change from treated value and control value. The formula is printed in the form\'s own words.', 'h1' => 'Fold Change Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'treated',
                            'label' => 'Treated value',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '240',
                        ],
                        [
                            'name' => 'control',
                            'label' => 'Control value',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'fold',
                            'label' => 'Fold change',
                            'type' => 'number',
                            'suffix' => '×',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'log2fc',
                            'label' => 'log₂ fold change',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pct',
                            'label' => 'Percent change',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'inverse',
                            'label' => 'Reciprocal fold change',
                            'type' => 'number',
                            'suffix' => '×',
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
            'title' => 'Fold change',
            'results' => ['fold' => 'treated/control', 'log2fc' => 'log2(treated/control)', 'pct' => '(treated/control-1)*100', 'inverse' => 'control/treated'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Treated value and Control value into Fold Change and the answer comes back as Fold change and log₂ fold change. The arithmetic is the whole method: fold change is worked out from treated value by one formula, applied once. Fold change comes back in × unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Fold Change calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Fold Change: it takes 2 numbers and reports Fold change, log₂ fold change and Percent change.</p><p>The relationship it solves reads Fold change = Treated value ÷ Control value.</p><p>What comes back is Fold change, log₂ fold change, Percent change and Reciprocal fold change — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Treated value</strong> — a plain number, no unit</li><li><strong>Control value</strong> — a plain number, no unit</li></ul><p>The answers come back as Fold change in ×, log₂ fold change, Percent change in %, Reciprocal fold change in ×. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Treated value = 240 and Control value = 100 gives <strong>Fold change</strong> = 2.4 ×, <strong>log₂ fold change</strong> = 1.26, <strong>Percent change</strong> = 140 % and <strong>Reciprocal fold change</strong> = 0.4167 ×.</p><ul><li><strong>Fold change</strong> = 2.4 ×</li><li><strong>log₂ fold change</strong> = 1.26</li><li><strong>Percent change</strong> = 140 %</li><li><strong>Reciprocal fold change</strong> = 0.4167 ×</li></ul><p>The line behind those figures is <strong>Fold change</strong> = <code>Treated value ÷ Control value</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Fold change</strong> = 2.4, <strong>log₂ fold change</strong> = 1.26, <strong>Percent change</strong> = 140 and <strong>Reciprocal fold change</strong> = 0.4167. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Fold change is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Fold change</strong> = <code>Treated value ÷ Control value</code></li><li><strong>log₂ fold change</strong> = <code>log2(Treated value ÷ Control value)</code></li><li><strong>Percent change</strong> = <code>(Treated value ÷ Control value − 1) × 100</code></li><li><strong>Reciprocal fold change</strong> = <code>Control value ÷ Treated value</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Fold change</strong> = <code>Treated value ÷ Control value</code> — the form to use when Treated value and Control value are the values you have.</li><li><strong>log₂ fold change</strong> = <code>log2(Treated value ÷ Control value)</code> — the form to use when Treated value and Control value are the values you have.</li><li><strong>Percent change</strong> = <code>(Treated value ÷ Control value − 1) × 100</code> — the form to use when Treated value and Control value are the values you have.</li><li><strong>Reciprocal fold change</strong> = <code>Control value ÷ Treated value</code> — the form to use when Control value and Treated value are the values you have.</li></ul><p>Any one of Fold change, log₂ fold change and Percent change can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Treated value, from 240 to 480 — and the answers go from <strong>Fold change</strong> 2.4 ×, <strong>log₂ fold change</strong> 1.26, <strong>Percent change</strong> 140 % and <strong>Reciprocal fold change</strong> 0.4167 × to <strong>Fold change</strong> 4.8 ×, <strong>log₂ fold change</strong> 2.26, <strong>Percent change</strong> 380 % and <strong>Reciprocal fold change</strong> 0.2083 ×.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Fold change, log₂ fold change and Percent change are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Treated value left as a guess.</strong> Anything typed into Treated value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Control value left as a guess.</strong> Anything typed into Control value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Treated value to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Fold Change form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Treated value</strong> takes a plain number with no unit attached. It feeds Fold change, log₂ fold change and Percent change. Fill it from a measurement rather than a memory — Treated value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Control value</strong> takes a plain number with no unit attached. It feeds Fold change, log₂ fold change and Percent change. Fill it from a measurement rather than a memory — Control value is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Fold change</strong> is a plain number and the page's own defaults put it at 2.4. It is worked out from Treated value and Control value. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>log₂ fold change</strong> is a plain number and the page's own defaults put it at 1.26. It is worked out from Treated value and Control value. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Percent change</strong> is a plain number and the page's own defaults put it at 140. It is worked out from Treated value and Control value. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Reciprocal fold change</strong> is a plain number and the page's own defaults put it at 0.4167. It is worked out from Control value and Treated value. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Fold change</th><th>log₂ fold change</th><th>Percent change</th><th>Reciprocal fold change</th></tr></thead><tbody><tr><td><strong>Treated value</strong> +10%</td><td>+10%</td><td>+10.89%</td><td>+17.14%</td><td>-9.09%</td></tr><tr><td><strong>Control value</strong> +10%</td><td>-9.09%</td><td>-10.89%</td><td>-15.58%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Treated value: ten per cent there moves an answer by about 17.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Treated value = 120 and Control value = 50 and the page reports <strong>Fold change</strong> = 2.4 ×, <strong>log₂ fold change</strong> = 1.26, <strong>Percent change</strong> = 140 % and <strong>Reciprocal fold change</strong> = 0.4167 ×.</li><li>Feed in Treated value = 720 and Control value = 100 and the page reports <strong>Fold change</strong> = 7.2 ×, <strong>log₂ fold change</strong> = 2.85, <strong>Percent change</strong> = 620 % and <strong>Reciprocal fold change</strong> = 0.1389 ×.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Fold change is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Treated value and Control value are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Treated value and Control value and the number you are missing is Fold change and log₂ fold change.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/fish-condition-factor">Fish Condition Factor Calculator</a>, <a href="/biology/fish-density">Fish Density Calculator</a> and <a href="/biology/fish-oil-dosage-for-cats">Fish oil dosage for cats Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Fold Change is a number to act on, so the useful question is what to do with Fold change (×), log₂ fold change and Percent change (%) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Treated value and Control value alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fold Change calculator work out?', 'a' => <<<'TXT'
            Fold change, log₂ fold change, Percent change and Reciprocal fold change, from Treated value and Control value. The relationship is Fold change = Treated value ÷ Control value.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Treated value, Control value. Enter treated value and control value; Fold change is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Fold change, log₂ fold change, Percent change and Reciprocal fold change blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Fold change = 2.4 ×, log₂ fold change = 1.26, Percent change = 140 % and Reciprocal fold change = 0.4167 ×. The figures come from Treated value as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Fold change is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Treated value blank and the page solves for it, reporting Fold change instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Fold change keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/fish-condition-factor', 'name' => 'Fish Condition Factor Calculator'],
            ['path' => '/biology/fish-density', 'name' => 'Fish Density Calculator'],
            ['path' => '/biology/fish-oil-dosage-for-cats', 'name' => 'Fish oil dosage for cats Calculator'],
        ],
        'authors' => [],
    ],
];
