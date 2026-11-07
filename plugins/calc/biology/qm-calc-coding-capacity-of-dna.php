<?php

/**
 * Coding Capacity of DNA Calculator
 * /biology/coding-capacity-of-dna
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Coding Capacity of DNA Calculator',
    'meta' => ['title' => 'Coding Capacity of DNA Calculator — Formula', 'description' => 'Coding Capacity of DNA Calculator works out amino acids encoded and protein mass from coding DNA length and share that is coding. Any box can be the unknown.', 'h1' => 'Coding Capacity of DNA Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'bp',
                            'label' => 'Coding DNA length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'help' => 'Exons only',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1200',
                        ],
                        [
                            'name' => 'exons',
                            'label' => 'Share that is coding',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Less than 100 if introns or UTRs are counted',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'aa',
                            'label' => 'Amino acids encoded',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kda',
                            'label' => 'Protein mass',
                            'type' => 'number',
                            'suffix' => 'kDa',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'codons',
                            'label' => 'Codons',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bp_needed',
                            'label' => 'DNA needed for a 50 kDa protein',
                            'type' => 'number',
                            'suffix' => 'bp',
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
            'title' => 'Capacity',
            'results' => ['codons' => 'bp*exons/100/3', 'aa' => 'bp*exons/100/3-1', 'kda' => '(bp*exons/100/3-1)*0.11', 'bp_needed' => '50/0.11*3+3'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Coding Capacity of DNA works out Amino acids encoded and Protein mass from Coding DNA length and Share that is coding. There is no hidden constant here: change amino acids encoded and coding DNA length moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Coding Capacity of DNA calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Coding Capacity of DNA: it takes 2 numbers and reports Amino acids encoded, Protein mass and Codons.</p><p>The relationship it solves reads Codons = Coding DNA length × Share that is coding ÷ 100 ÷ 3.</p><p>The answers are Amino acids encoded, Protein mass, Codons and DNA needed for a 50 kDa protein; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Coding DNA length</strong> — in bp. Exons only</li><li><strong>Share that is coding</strong> — in %. Less than 100 if introns or UTRs are counted</li></ul><p>The result boxes are Amino acids encoded, Protein mass in kDa, Codons, DNA needed for a 50 kDa protein in bp; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Coding DNA length = 1200 bp and Share that is coding = 100 % — through the same formula and the panel reports <strong>Codons</strong> = 400, <strong>Amino acids encoded</strong> = 399, <strong>Protein mass</strong> = 43.89 kDa and <strong>DNA needed for a 50 kDa protein</strong> = 1367 bp.</p><ul><li><strong>Codons</strong> = 400</li><li><strong>Amino acids encoded</strong> = 399</li><li><strong>Protein mass</strong> = 43.89 kDa</li><li><strong>DNA needed for a 50 kDa protein</strong> = 1367 bp</li></ul><p>The line behind those figures is <strong>Codons</strong> = <code>Coding DNA length × Share that is coding ÷ 100 ÷ 3</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Codons</strong> = 400, <strong>Amino acids encoded</strong> = 399, <strong>Protein mass</strong> = 43.89 and <strong>DNA needed for a 50 kDa protein</strong> = 1367. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Amino acids encoded is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Codons</strong> = <code>Coding DNA length × Share that is coding ÷ 100 ÷ 3</code></li><li><strong>Amino acids encoded</strong> = <code>Coding DNA length × Share that is coding ÷ 100 ÷ 3 − 1</code></li><li><strong>Protein mass</strong> = <code>(Coding DNA length × Share that is coding ÷ 100 ÷ 3 − 1) × 0.11</code></li><li><strong>DNA needed for a 50 kDa protein</strong> = <code>50 ÷ 0.11 × 3 + 3</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Codons</strong> = <code>Coding DNA length × Share that is coding ÷ 100 ÷ 3</code> — the form to use when Coding DNA length and Share that is coding are the values you have.</li><li><strong>Amino acids encoded</strong> = <code>Coding DNA length × Share that is coding ÷ 100 ÷ 3 − 1</code> — the form to use when Coding DNA length and Share that is coding are the values you have.</li><li><strong>Protein mass</strong> = <code>(Coding DNA length × Share that is coding ÷ 100 ÷ 3 − 1) × 0.11</code> — the form to use when Coding DNA length and Share that is coding are the values you have.</li><li><strong>DNA needed for a 50 kDa protein</strong> = <code>50 ÷ 0.11 × 3 + 3</code> — the form to use when the other values are known.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Codons, Amino acids encoded and Protein mass can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Coding DNA length from 1200 to 2400, leaving every other box alone. The panel moves from <strong>Codons</strong> 400, <strong>Amino acids encoded</strong> 399, <strong>Protein mass</strong> 43.89 kDa and <strong>DNA needed for a 50 kDa protein</strong> 1367 bp to <strong>Codons</strong> 800, <strong>Amino acids encoded</strong> 799, <strong>Protein mass</strong> 87.89 kDa and <strong>DNA needed for a 50 kDa protein</strong> 1367 bp.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Amino acids encoded, Protein mass and Codons are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Coding DNA length left as a guess.</strong> Anything typed into Coding DNA length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Share that is coding left as a guess.</strong> Anything typed into Share that is coding is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Coding DNA length is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Coding DNA length</strong> is measured in bp. Change it and Codons, Amino acids encoded and Protein mass changes with it. Have it to hand before you start: Coding DNA length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Share that is coding</strong> is measured in %. Less than 100 if introns or UTRs are counted. Change it and Codons, Amino acids encoded and Protein mass changes with it. Have it to hand before you start: Share that is coding is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Amino acids encoded</strong> is a plain number and the page's own defaults put it at 399. It is computed from Coding DNA length and Share that is coding, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Protein mass</strong> is a plain number and the page's own defaults put it at 43.89. It is computed from Coding DNA length and Share that is coding, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Codons</strong> is a plain number and the page's own defaults put it at 400. It is computed from Coding DNA length and Share that is coding, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>DNA needed for a 50 kDa protein</strong> is a plain number and the page's own defaults put it at 1367. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Codons</th><th>Amino acids encoded</th><th>Protein mass</th><th>DNA needed for a 50 kDa protein</th></tr></thead><tbody><tr><td><strong>Coding DNA length</strong> +10%</td><td>+10%</td><td>+10.03%</td><td>+10.03%</td><td>+0%</td></tr><tr><td><strong>Share that is coding</strong> +10%</td><td>+10%</td><td>+10.03%</td><td>+10.03%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Share that is coding: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Coding DNA length = 600 bp and Share that is coding = 50 %, the answer is <strong>Codons</strong> = 100, <strong>Amino acids encoded</strong> = 99, <strong>Protein mass</strong> = 10.89 kDa and <strong>DNA needed for a 50 kDa protein</strong> = 1367 bp.</li><li>With Coding DNA length = 3600 bp and Share that is coding = 100 %, the answer is <strong>Codons</strong> = 1200, <strong>Amino acids encoded</strong> = 1199, <strong>Protein mass</strong> = 132 kDa and <strong>DNA needed for a 50 kDa protein</strong> = 1367 bp.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Amino acids encoded is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Coding DNA length and Share that is coding measured, Amino acids encoded and Protein mass wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/western-blot-loading">Western Blot Protein Loading Calculator</a>, <a href="/biology/absorbance-transmittance">Absorbance to Transmittance Converter Calculator</a> and <a href="/biology/acid-base-balance">Acid–Base Balance (ABG) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Coding Capacity of DNA calculator work out?', 'a' => <<<'TXT'
            Amino acids encoded, Protein mass, Codons and DNA needed for a 50 kDa protein, from Coding DNA length and Share that is coding. The relationship is Codons = Coding DNA length × Share that is coding ÷ 100 ÷ 3.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Coding DNA length (bp), Share that is coding (%). Enter coding DNA length and share that is coding; Amino acids encoded is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Codons, Amino acids encoded, Protein mass and DNA needed for a 50 kDa protein can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Codons = 400, Amino acids encoded = 399, Protein mass = 43.89 kDa and DNA needed for a 50 kDa protein = 1367 bp. Those are the defaults written into the form — move Coding DNA length and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Amino acids encoded is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Coding DNA length left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Amino acids encoded keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/western-blot-loading', 'name' => 'Western Blot Protein Loading Calculator'],
            ['path' => '/biology/absorbance-transmittance', 'name' => 'Absorbance to Transmittance Converter Calculator'],
            ['path' => '/biology/acid-base-balance', 'name' => 'Acid–Base Balance (ABG) Calculator'],
        ],
        'authors' => [],
    ],
];
