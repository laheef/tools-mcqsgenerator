<?php

/**
 * Linear DNA µg to pmol of Ends Converter
 * /biology/linear-dna-ends-ug-pmol
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Linear DNA µg to pmol of Ends Converter',
    'meta' => ['title' => 'Linear DNA µg to pmol of Ends Converter Calculator', 'description' => 'Linear DNA µg to pmol of Ends Converter works out ends per microgram from length. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Linear DNA µg to pmol of Ends Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'mass_ug',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'pmol_ends',
                            'label' => 'Ends',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'help' => 'Twice the molar amount',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pmol',
                            'label' => 'Molecules',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'help' => 'Type either the mass or the molar amount',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ends_per_ug',
                            'label' => 'Ends per microgram',
                            'type' => 'number',
                            'suffix' => 'pmol/µg',
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
            'title' => 'Ends',
            'results' => [
                'pmol' => 'mass_ug*1000000/(660*length)',
                'mass_ug' => 'pmol*660*length/1000000',
                'pmol_ends' => '2*pmol',
                'ends_per_ug' => '2*1000000/(660*length)',
                'molecules' => 'pmol*602214076000',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Linear DNA µg to pmol of Ends works out Ends and Ends per microgram from Length and Mass. Nothing is looked up on this page: ends is computed from length and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Ends is opened in pmol; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Linear DNA µg to pmol of Ends calculator works', 'html' => <<<'TXT'
            <p>The Linear DNA µg to pmol of Ends calculator applies one relationship to 3 numbers and reports Ends, Ends per microgram and Molecules.</p><p>In the form&#039;s own words, Molecules = Mass × 1000000 ÷ (660 × Length).</p><p>The answers are Ends, Ends per microgram and Molecules; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Length</strong> — in bp</li><li><strong>Mass</strong> — in µg</li><li><strong>Molecules</strong> — in pmol. Type either the mass or the molar amount</li></ul><p>The result boxes are Ends in pmol, Ends per microgram in pmol/µg, Molecules; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Length = 1000 bp gives <strong>Ends per microgram</strong> = 3.03 pmol/µg.</p><ul><li><strong>Ends per microgram</strong> = 3.03 pmol/µg</li></ul><p>That is <strong>Molecules</strong> = <code>Mass × 1000000 ÷ (660 × Length)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Ends per microgram</strong> = 3.03. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Ends is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Molecules</strong> = <code>Mass × 1000000 ÷ (660 × Length)</code></li><li><strong>Mass</strong> = <code>Molecules × 660 × Length ÷ 1000000</code></li><li><strong>Ends</strong> = <code>2 × Molecules</code></li><li><strong>Ends per microgram</strong> = <code>2 × 1000000 ÷ (660 × Length)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Molecules</strong> = <code>Mass × 1000000 ÷ (660 × Length)</code> — the form to use when Mass and Length are the values you have.</li><li><strong>Mass</strong> = <code>Molecules × 660 × Length ÷ 1000000</code> — the form to use when Molecules and Length are the values you have.</li><li><strong>Ends</strong> = <code>2 × Molecules</code> — the form to use when Molecules are the values you have.</li><li><strong>Ends per microgram</strong> = <code>2 × 1000000 ÷ (660 × Length)</code> — the form to use when Length are the values you have.</li><li><strong>Molecules</strong> = <code>Molecules × 602214076000</code> — the form to use when Molecules are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Molecules, Mass and Ends can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Length, from 1000 to 2000 — and the answers go from <strong>Ends per microgram</strong> 3.03 pmol/µg to <strong>Ends per microgram</strong> 1.52 pmol/µg.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Ends, Ends per microgram and Molecules are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Length left as a guess.</strong> Anything typed into Length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Mass left as a guess.</strong> Anything typed into Mass is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Molecules left as a guess.</strong> Anything typed into Molecules is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Length to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Length</strong> is measured in bp. Change it and Molecules, Mass and Ends per microgram changes with it. Have it to hand before you start: Length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Mass</strong> is measured in µg. Change it and Molecules changes with it. Have it to hand before you start: Mass is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Molecules</strong> is measured in pmol. Type either the mass or the molar amount. Change it and Mass, Ends and Molecules changes with it. Have it to hand before you start: Molecules is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Ends</strong> is a plain number. It is worked out from Molecules. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Ends per microgram</strong> is a plain number and the page's own defaults put it at 3.03. It is worked out from Length. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Molecules</strong> is a plain number. It is worked out from Molecules. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Ends per microgram</th></tr></thead><tbody><tr><td><strong>Length</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Length: ten per cent there moves an answer by about 9.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Length = 500 bp, the answer is <strong>Ends per microgram</strong> = 6.06 pmol/µg.</li><li>With Length = 3000 bp, the answer is <strong>Ends per microgram</strong> = 1.01 pmol/µg.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Length, Mass and Molecules. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Length into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Ends in pmol with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Ends is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Length, Mass and Molecules are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Length, Mass and Molecules measured, Ends and Ends per microgram wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dna-copy-number">DNA copy number Calculator</a>, <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a> and <a href="/biology/dna-molarity-from-mass">DNA Molarity from Mass or A260 Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Linear DNA µg to pmol of Ends calculator work out?', 'a' => 'Ends, Ends per microgram and Molecules, from Mass and Length. The relationship is Molecules = Mass × 1000000 ÷ (660 × Length).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Length (bp), Mass (µg), Molecules (pmol). Enter length, mass and molecules; Ends is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Molecules, Mass, Ends and Ends per microgram can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Ends per microgram = 3.03 pmol/µg. That comes from the page\'s own defaults, entered in Length; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Ends is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Length left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Ends keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dna-copy-number', 'name' => 'DNA copy number Calculator'],
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
            ['path' => '/biology/dna-molarity-from-mass', 'name' => 'DNA Molarity from Mass or A260 Calculator'],
        ],
        'authors' => [],
    ],
];
