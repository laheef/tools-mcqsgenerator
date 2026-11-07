<?php

/**
 * dsDNA µg to pmol Converter
 * /biology/dsdna-ug-to-pmol-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'dsDNA µg to pmol Converter',
    'meta' => ['title' => 'dsDNA µg to pmol Converter — Formula & Results', 'description' => 'dsDNA µg to pmol Converter turns mass of DNA and fragment length into amount and mass for 1 pmol. Leave fragment length empty and the page will solve for it.', 'h1' => 'dsDNA µg to pmol Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'ug',
                            'label' => 'Mass of DNA',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'bp',
                            'label' => 'Fragment length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3000',
                        ],
                        [
                            'name' => 'pmol',
                            'label' => 'Amount',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ug_from_pmol',
                            'label' => 'Mass for 1 pmol',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ng_ul',
                            'label' => 'Concentration if in 50 µL',
                            'type' => 'number',
                            'suffix' => 'ng/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'molecules',
                            'label' => 'Molecules',
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
            'title' => 'Conversion',
            'results' => ['pmol' => 'ug*1000000/(bp*660)', 'ug_from_pmol' => 'bp*660/1000000', 'ng_ul' => 'ug*1000/50', 'molecules' => 'ug*0.000000000001/660/bp*602200000000000000000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        dsDNA µg to pmol turns Mass of DNA and Fragment length into Amount and Mass for 1 pmol. Nothing is looked up on this page: amount is computed from mass of DNA and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Amount is opened in pmol; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the dsDNA µg to pmol calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind dsDNA µg to pmol: it takes 2 numbers and reports Amount, Mass for 1 pmol and Concentration if in 50 µL.</p><p>Written with the labels from the form, Amount = Mass of DNA × 1000000 ÷ (Fragment length × 660).</p><p>The result panel carries Amount, Mass for 1 pmol, Concentration if in 50 µL and Molecules, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Mass of DNA</strong> — in µg</li><li><strong>Fragment length</strong> — in bp</li></ul><p>The answers come back as Amount in pmol, Mass for 1 pmol in µg, Concentration if in 50 µL in ng/µL, Molecules. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Mass of DNA = 1 µg and Fragment length = 3000 bp; the answers are <strong>Amount</strong> = 0.505 pmol, <strong>Mass for 1 pmol</strong> = 1.98 µg, <strong>Concentration if in 50 µL</strong> = 20 ng/µL and <strong>Molecules</strong> = 304141.</p><ul><li><strong>Amount</strong> = 0.505 pmol</li><li><strong>Mass for 1 pmol</strong> = 1.98 µg</li><li><strong>Concentration if in 50 µL</strong> = 20 ng/µL</li><li><strong>Molecules</strong> = 304141</li></ul><p>The line behind those figures is <strong>Amount</strong> = <code>Mass of DNA × 1000000 ÷ (Fragment length × 660)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Amount</strong> = 0.505, <strong>Mass for 1 pmol</strong> = 1.98, <strong>Concentration if in 50 µL</strong> = 20 and <strong>Molecules</strong> = 304141 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Amount takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Amount</strong> = <code>Mass of DNA × 1000000 ÷ (Fragment length × 660)</code></li><li><strong>Mass for 1 pmol</strong> = <code>Fragment length × 660 ÷ 1000000</code></li><li><strong>Concentration if in 50 µL</strong> = <code>Mass of DNA × 1000 ÷ 50</code></li><li><strong>Molecules</strong> = <code>Mass of DNA × 0 ÷ 660 ÷ Fragment length × 602200000000000000000000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Amount</strong> = <code>Mass of DNA × 1000000 ÷ (Fragment length × 660)</code> — the form to use when Mass of DNA and Fragment length are the values you have.</li><li><strong>Mass for 1 pmol</strong> = <code>Fragment length × 660 ÷ 1000000</code> — the form to use when Fragment length are the values you have.</li><li><strong>Concentration if in 50 µL</strong> = <code>Mass of DNA × 1000 ÷ 50</code> — the form to use when Mass of DNA are the values you have.</li><li><strong>Molecules</strong> = <code>Mass of DNA × 0 ÷ 660 ÷ Fragment length × 602200000000000000000000</code> — the form to use when Mass of DNA and Fragment length are the values you have.</li></ul><p>Any one of Amount, Mass for 1 pmol and Concentration if in 50 µL can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Mass of DNA, from 1 to 2 — and the answers go from <strong>Amount</strong> 0.505 pmol, <strong>Mass for 1 pmol</strong> 1.98 µg, <strong>Concentration if in 50 µL</strong> 20 ng/µL and <strong>Molecules</strong> 304141 to <strong>Amount</strong> 1.01 pmol, <strong>Mass for 1 pmol</strong> 1.98 µg, <strong>Concentration if in 50 µL</strong> 40 ng/µL and <strong>Molecules</strong> 608283.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Amount, Mass for 1 pmol and Concentration if in 50 µL are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Mass of DNA left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Mass of DNA is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Fragment length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Fragment length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Mass of DNA is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Mass of DNA</strong> is measured in µg. Change it and Amount, Concentration if in 50 µL and Molecules changes with it. Have it to hand before you start: Mass of DNA is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Fragment length</strong> is measured in bp. Change it and Amount, Mass for 1 pmol and Molecules changes with it. Have it to hand before you start: Fragment length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Amount</strong> is a plain number and the page's own defaults put it at 0.505. It is computed from Mass of DNA and Fragment length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Mass for 1 pmol</strong> is a plain number and the page's own defaults put it at 1.98. It is computed from Fragment length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Concentration if in 50 µL</strong> is a plain number and the page's own defaults put it at 20. It is computed from Mass of DNA, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Molecules</strong> is a plain number and the page's own defaults put it at 304141. It is computed from Mass of DNA and Fragment length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Amount</th><th>Mass for 1 pmol</th><th>Concentration if in 50 µL</th><th>Molecules</th></tr></thead><tbody><tr><td><strong>Mass of DNA</strong> +10%</td><td>+10%</td><td>+0%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Fragment length</strong> +10%</td><td>-9.09%</td><td>+10%</td><td>+0%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Fragment length sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Mass of DNA = 0.5 µg and Fragment length = 1500 bp, the answer is <strong>Amount</strong> = 0.505 pmol, <strong>Mass for 1 pmol</strong> = 0.99 µg, <strong>Concentration if in 50 µL</strong> = 10 ng/µL and <strong>Molecules</strong> = 304141.</li><li>With Mass of DNA = 3 µg and Fragment length = 3000 bp, the answer is <strong>Amount</strong> = 1.52 pmol, <strong>Mass for 1 pmol</strong> = 1.98 µg, <strong>Concentration if in 50 µL</strong> = 60 ng/µL and <strong>Molecules</strong> = 912424.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Amount follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Mass of DNA and Fragment length are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Mass of DNA and Fragment length measured, Amount and Mass for 1 pmol wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/reverse-complement">Reverse Complement Calculator</a>, <a href="/biology/reverse-translate">Reverse Translate Calculator</a> and <a href="/biology/sds-page-gel">SDS-PAGE Gel Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the dsDNA µg to pmol calculator work out?', 'a' => <<<'TXT'
            Amount, Mass for 1 pmol, Concentration if in 50 µL and Molecules, from Mass of DNA and Fragment length. The relationship is Amount = Mass of DNA × 1000000 ÷ (Fragment length × 660).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass of DNA (µg), Fragment length (bp). Enter mass of DNA and fragment length; Amount is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Amount, Mass for 1 pmol, Concentration if in 50 µL and Molecules blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Amount = 0.505 pmol, Mass for 1 pmol = 1.98 µg, Concentration if in 50 µL = 20 ng/µL and Molecules = 304141. That comes from the page's own defaults, entered in Mass of DNA; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Amount is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Mass of DNA left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Amount keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/reverse-complement', 'name' => 'Reverse Complement Calculator'],
            ['path' => '/biology/reverse-translate', 'name' => 'Reverse Translate Calculator'],
            ['path' => '/biology/sds-page-gel', 'name' => 'SDS-PAGE Gel Calculator'],
        ],
        'authors' => [],
    ],
];
