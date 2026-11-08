<?php

/**
 * Simpson's Diversity Index Calculator
 * /biology/simpson-diversity-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Simpson\'s Diversity Index Calculator',
    'meta' => ['title' => 'Simpson\'s Diversity Index Calculator: Units & Formula', 'description' => 'Simpson\'s Diversity Index Calculator turns up to five species counts into D, 1 minus D, the reciprocal index and evenness. A species left at zero is skipped.', 'h1' => 'Simpson\'s Diversity Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'n1',
                            'label' => 'Individuals of species 1',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Individuals of species 2',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'n3',
                            'label' => 'Individuals of species 3',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'n4',
                            'label' => 'Individuals of species 4',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'n5',
                            'label' => 'Individuals of species 5',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'd',
                            'label' => 'Simpson\'s index (D)',
                            'type' => 'number',
                            'help' => 'Probability two random individuals are the same species',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diversity',
                            'label' => 'Simpson\'s diversity (1 − D)',
                            'type' => 'number',
                            'help' => 'Higher means more diverse',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'reciprocal',
                            'label' => 'Reciprocal index (1 ÷ D)',
                            'type' => 'number',
                            'help' => 'Effective number of species',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'evenness',
                            'label' => 'Evenness',
                            'type' => 'number',
                            'help' => '1 means every species is equally common',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'richness',
                            'label' => 'Species richness',
                            'type' => 'number',
                            'help' => 'Species with at least one individual',
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
            'title' => 'Index',
            'results' => [
                'richness' => 'if_else(n1>0,1,0)+if_else(n2>0,1,0)+if_else(n3>0,1,0)+if_else(n4>0,1,0)+if_else(n5>0,1,0)',
                'd' => '(n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))',
                'diversity' => '1-(n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))',
                'reciprocal' => '1/((n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1)))',
                'evenness' => <<<'TXT'
                (1/((n1*(n1-1)+n2*(n2-1)+n3*(n3-1)+n4*(n4-1)+n5*(n5-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))))/(if_else(n1>0,1,0)+if_else(n2>0,1,0)+if_else(n3>0,1,0)+if_else(n4>0,1,0)+if_else(n5>0,1,0))
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Simpson's Diversity Index works out Simpson's index (D) and Simpson's diversity (1 − D) from Individuals of species 1, Individuals of species 2 and Individuals of species 3. Nothing is looked up on this page: simpson's index (D) is computed from individuals of species 1 and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Simpson\'s Diversity Index calculator works', 'html' => <<<'TXT'
            <p>The Simpson&#039;s Diversity Index calculator applies one relationship to 5 numbers and reports Simpson&#039;s index (D), Simpson&#039;s diversity (1 − D) and Reciprocal index (1 ÷ D).</p><p>Written with the labels from the form, Species richness = if_else(Individuals of species 1&gt;0,1,0) + if_else(Individuals of species 2&gt;0,1,0) + if_else(Individuals of species 3&gt;0,1,0) + if_else(Individuals of species 4&gt;0,1,0) + if_else(Individuals of species 5&gt;0,1,0).</p><p>The result panel carries Simpson&#039;s index (D), Simpson&#039;s diversity (1 − D), Reciprocal index (1 ÷ D) and Evenness, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Individuals of species 1</strong> — a plain number, no unit</li><li><strong>Individuals of species 2</strong> — a plain number, no unit</li><li><strong>Individuals of species 3</strong> — a plain number, no unit</li><li><strong>Individuals of species 4</strong> — a plain number, no unit</li><li><strong>Individuals of species 5</strong> — a plain number, no unit</li></ul><p>The answers come back as Simpson&#039;s index (D), Simpson&#039;s diversity (1 − D), Reciprocal index (1 ÷ D), Evenness, Species richness. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Individuals of species 1 = 40, Individuals of species 2 = 25, Individuals of species 3 = 15, Individuals of species 4 = 12 and Individuals of species 5 = 8 gives <strong>Species richness</strong> = 5, <strong>Simpson&amp;#039;s index (D)</strong> = 0.2584, <strong>Simpson&amp;#039;s diversity (1 − D)</strong> = 0.7416, <strong>Reciprocal index (1 ÷ D)</strong> = 3.87 and <strong>Evenness</strong> = 0.774.</p><ul><li><strong>Species richness</strong> = 5</li><li><strong>Simpson&#039;s index (D)</strong> = 0.2584</li><li><strong>Simpson&#039;s diversity (1 − D)</strong> = 0.7416</li><li><strong>Reciprocal index (1 ÷ D)</strong> = 3.87</li><li><strong>Evenness</strong> = 0.774</li></ul><p>That is <strong>Species richness</strong> = <code>if_else(Individuals of species 1&gt;0,1,0) + if_else(Individuals of species 2&gt;0,1,0) + if_else(Individuals of species 3&gt;0,1,0) + if_else(Individuals of species 4&gt;0,1,0) + if_else(Individuals of species 5&gt;0,1,0)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Species richness</strong> = 5, <strong>Simpson&amp;#039;s index (D)</strong> = 0.2584, <strong>Simpson&amp;#039;s diversity (1 − D)</strong> = 0.7416, <strong>Reciprocal index (1 ÷ D)</strong> = 3.87 and <strong>Evenness</strong> = 0.774. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Simpson&#039;s index (D) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Species richness</strong> = <code>if_else(Individuals of species 1&gt;0,1,0) + if_else(Individuals of species 2&gt;0,1,0) + if_else(Individuals of species 3&gt;0,1,0) + if_else(Individuals of species 4&gt;0,1,0) + if_else(Individuals of species 5&gt;0,1,0)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Species richness</strong> = <code>if_else(Individuals of species 1&gt;0,1,0) + if_else(Individuals of species 2&gt;0,1,0) + if_else(Individuals of species 3&gt;0,1,0) + if_else(Individuals of species 4&gt;0,1,0) + if_else(Individuals of species 5&gt;0,1,0)</code> — the form to use when Individuals of species 1, Individuals of species 2, Individuals of species 3 and Individuals of species 4 are the values you have.</li></ul><p>Any one of Species richness, Simpson&#039;s index (D) and Simpson&#039;s diversity (1 − D) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Individuals of species 1, from 40 to 80 — and the answers go from <strong>Species richness</strong> 5, <strong>Simpson&amp;#039;s index (D)</strong> 0.2584, <strong>Simpson&amp;#039;s diversity (1 − D)</strong> 0.7416, <strong>Reciprocal index (1 ÷ D)</strong> 3.87 and <strong>Evenness</strong> 0.774 to <strong>Species richness</strong> 5, <strong>Simpson&amp;#039;s index (D)</strong> 0.3761, <strong>Simpson&amp;#039;s diversity (1 − D)</strong> 0.6239, <strong>Reciprocal index (1 ÷ D)</strong> 2.66 and <strong>Evenness</strong> 0.5318.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Simpson&#039;s index (D), Simpson&#039;s diversity (1 − D) and Reciprocal index (1 ÷ D) are results: they are worked out from the boxes above and cannot be typed into, so a past answer has to be entered as one of the inputs instead.</li><li><strong>Individuals of species 1 left as a guess.</strong> Anything typed into Individuals of species 1 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Individuals of species 2 left as a guess.</strong> Anything typed into Individuals of species 2 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Individuals of species 3 left as a guess.</strong> Anything typed into Individuals of species 3 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Individuals of species 1 to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Simpson&#039;s Diversity Index form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Individuals of species 1</strong> takes a plain number with no unit attached. It feeds Species richness, Simpson's index (D) and Simpson's diversity (1 − D). Fill it from a measurement rather than a memory — Individuals of species 1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Individuals of species 2</strong> takes a plain number with no unit attached. It feeds Species richness, Simpson's index (D) and Simpson's diversity (1 − D). Fill it from a measurement rather than a memory — Individuals of species 2 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Individuals of species 3</strong> takes a plain number with no unit attached. It feeds Species richness, Simpson's index (D) and Simpson's diversity (1 − D). Fill it from a measurement rather than a memory — Individuals of species 3 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Individuals of species 4</strong> takes a plain number with no unit attached. It feeds Species richness, Simpson's index (D) and Simpson's diversity (1 − D). Fill it from a measurement rather than a memory — Individuals of species 4 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Individuals of species 5</strong> takes a plain number with no unit attached. It feeds Species richness, Simpson's index (D) and Simpson's diversity (1 − D). Fill it from a measurement rather than a memory — Individuals of species 5 is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Simpson&#039;s index (D)</strong> is a plain number and the page's own defaults put it at 0.2584. It is worked out from Individuals of species 1, Individuals of species 2, Individuals of species 3 and Individuals of species 4. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Simpson&#039;s diversity (1 − D)</strong> is a plain number and the page's own defaults put it at 0.7416. It is worked out from Individuals of species 1, Individuals of species 2, Individuals of species 3 and Individuals of species 4. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Reciprocal index (1 ÷ D)</strong> is a plain number and the page's own defaults put it at 3.87. It is worked out from Individuals of species 1, Individuals of species 2, Individuals of species 3 and Individuals of species 4. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Evenness</strong> is a plain number and the page's own defaults put it at 0.774. It is worked out from Individuals of species 1, Individuals of species 2, Individuals of species 3 and Individuals of species 4. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Species richness</strong> is a plain number and the page's own defaults put it at 5. It is worked out from Individuals of species 1, Individuals of species 2, Individuals of species 3 and Individuals of species 4. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Species richness</th><th>Simpson&#039;s index (D)</th><th>Simpson&#039;s diversity (1 − D)</th><th>Reciprocal index (1 ÷ D)</th><th>Evenness</th></tr></thead><tbody><tr><td><strong>Individuals of species 1</strong> +10%</td><td>+0%</td><td>+4.41%</td><td>-1.54%</td><td>-4.23%</td><td>-4.23%</td></tr><tr><td><strong>Individuals of species 2</strong> +10%</td><td>+0%</td><td>-0.05%</td><td>+0.02%</td><td>+0.05%</td><td>+0.05%</td></tr><tr><td><strong>Individuals of species 3</strong> +10%</td><td>+0%</td><td>-1.21%</td><td>+0.42%</td><td>+1.23%</td><td>+1.23%</td></tr><tr><td><strong>Individuals of species 4</strong> +10%</td><td>+0%</td><td>-1.26%</td><td>+0.44%</td><td>+1.28%</td><td>+1.28%</td></tr><tr><td><strong>Individuals of species 5</strong> +10%</td><td>+0%</td><td>-1.1%</td><td>+0.38%</td><td>+1.11%</td><td>+1.11%</td></tr></tbody></table><p>The steepest column belongs to Individuals of species 1: ten per cent there moves an answer by about 4.4 per cent, which is why that is the number to measure twice. By contrast, Individuals of species 2 barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Simpson&#039;s index (D) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Individuals of species 1, Individuals of species 2 and Individuals of species 3 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Individuals of species 1, Individuals of species 2 and Individuals of species 3 is what you already know and Simpson&#039;s index (D) and Simpson&#039;s diversity (1 − D) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a>, <a href="/biology/dna-molarity-from-mass">DNA Molarity from Mass or A260 Calculator</a> and <a href="/biology/dna-molecular-weight-calculator">DNA Molecular Weight Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Simpson\'s Diversity Index calculator work out?', 'a' => <<<'TXT'
            Simpson's index (D), Simpson's diversity (1 − D), Reciprocal index (1 ÷ D) and Evenness, from Individuals of species 1, Individuals of species 2, Individuals of species 3 and Individuals of species 4. The relationship is Species richness = if_else(Individuals of species 1>0,1,0) + if_else(Individuals of species 2>0,1,0) + if_else(Individuals of species 3>0,1,0) + if_else(Individuals of species 4>0,1,0) + if_else(Individuals of species 5>0,1,0).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Individuals of species 1, Individuals of species 2, Individuals of species 3, Individuals of species 4, Individuals of species 5. With individuals of species 1, individuals of species 2 and individuals of species 3 in place, Simpson's index (D) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Species richness, Simpson's index (D), Simpson's diversity (1 − D) and Reciprocal index (1 ÷ D) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Species richness = 5, Simpson's index (D) = 0.2584, Simpson's diversity (1 − D) = 0.7416, Reciprocal index (1 ÷ D) = 3.87 and Evenness = 0.774. Those are the defaults written into the form — move Individuals of species 1 and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Simpson's index (D) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Individuals of species 1 blank and the page solves for it, reporting Simpson\'s index (D) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Simpson\'s index (D) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
            ['path' => '/biology/dna-molarity-from-mass', 'name' => 'DNA Molarity from Mass or A260 Calculator'],
            ['path' => '/biology/dna-molecular-weight-calculator', 'name' => 'DNA Molecular Weight Calculator'],
        ],
        'authors' => [],
    ],
];
