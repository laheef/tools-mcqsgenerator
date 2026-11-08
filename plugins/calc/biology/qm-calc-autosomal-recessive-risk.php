<?php

/**
 * Autosomal Recessive Inheritance Risk
 * /biology/autosomal-recessive-risk
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Autosomal Recessive Inheritance Risk',
    'meta' => ['title' => 'Autosomal Recessive Inheritance Risk: Steps & Units', 'description' => 'Autosomal Recessive Inheritance Risk works out chance of an affected child and chance of a carrier child from parent 1 genotype and parent 2 genotype.', 'h1' => 'Autosomal Recessive Inheritance Risk', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'parent1',
                            'label' => 'Parent 1 genotype',
                            'type' => 'select',
                            'options' => ['AA — non-carrier' => '0', 'Aa — carrier' => '0.5', 'aa — affected' => '1'],
                            'default' => 'Aa — carrier',
                        ],
                        [
                            'name' => 'parent2',
                            'label' => 'Parent 2 genotype',
                            'type' => 'select',
                            'options' => ['AA — non-carrier' => '0', 'Aa — carrier' => '0.5', 'aa — affected' => '1'],
                            'default' => 'Aa — carrier',
                        ],
                        [
                            'name' => 'carrier_freq',
                            'label' => 'Population carrier frequency',
                            'type' => 'number',
                            'help' => 'Optional — 2pq from Hardy–Weinberg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.04',
                        ],
                        [
                            'name' => 'affected',
                            'label' => 'Chance of an affected child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'carrier_child',
                            'label' => 'Chance of a carrier child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'unaffected',
                            'label' => 'Chance of an unaffected child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'population_risk',
                            'label' => 'Population risk from carrier frequency',
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
            'title' => 'Risk',
            'results' => ['affected' => 'parent1*parent2*100', 'carrier_child' => '(parent1*(1-parent2)+(1-parent1)*parent2)*100', 'unaffected' => '(1-parent1)*(1-parent2)*100', 'population_risk' => 'pow(carrier_freq,2)*0.25*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Autosomal Recessive Inheritance Risk works out Chance of an affected child and Chance of a carrier child from Parent 1 genotype, Parent 2 genotype and Population carrier frequency. It is a single relationship that reads chance of an affected child out of parent 1 genotype, not a table of canned results keyed by them. Units for Chance of an affected child default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Autosomal Recessive Inheritance Risk calculator works', 'html' => <<<'TXT'
            <p>The Autosomal Recessive Inheritance Risk calculator applies one relationship to 3 numbers and reports Chance of an affected child, Chance of a carrier child and Chance of an unaffected child.</p><p>Written with the labels from the form, Chance of an affected child = Parent 1 genotype × Parent 2 genotype × 100.</p><p>What comes back is Chance of an affected child, Chance of a carrier child, Chance of an unaffected child and Population risk from carrier frequency — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Parent 1 genotype</strong> — a plain number, no unit</li><li><strong>Parent 2 genotype</strong> — a plain number, no unit</li><li><strong>Population carrier frequency</strong> — a plain number, no unit. Optional — 2pq from Hardy–Weinberg</li></ul><p>What you get back is Chance of an affected child in %, Chance of a carrier child in %, Chance of an unaffected child in %, Population risk from carrier frequency in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Parent 1 genotype = 0.5, Parent 2 genotype = 0.5 and Population carrier frequency = 0.04; the answers are <strong>Chance of an affected child</strong> = 25 %, <strong>Chance of a carrier child</strong> = 50 %, <strong>Chance of an unaffected child</strong> = 25 % and <strong>Population risk from carrier frequency</strong> = 0.04 %.</p><ul><li><strong>Chance of an affected child</strong> = 25 %</li><li><strong>Chance of a carrier child</strong> = 50 %</li><li><strong>Chance of an unaffected child</strong> = 25 %</li><li><strong>Population risk from carrier frequency</strong> = 0.04 %</li></ul><p>The line behind those figures is <strong>Chance of an affected child</strong> = <code>Parent 1 genotype × Parent 2 genotype × 100</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Chance of an affected child</strong> = 25, <strong>Chance of a carrier child</strong> = 50, <strong>Chance of an unaffected child</strong> = 25 and <strong>Population risk from carrier frequency</strong> = 0.04. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Chance of an affected child is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Chance of an affected child</strong> = <code>Parent 1 genotype × Parent 2 genotype × 100</code></li><li><strong>Chance of a carrier child</strong> = <code>(Parent 1 genotype × (1 − Parent 2 genotype) + (1 − Parent 1 genotype) × Parent 2 genotype) × 100</code></li><li><strong>Chance of an unaffected child</strong> = <code>(1 − Parent 1 genotype) × (1 − Parent 2 genotype) × 100</code></li><li><strong>Population risk from carrier frequency</strong> = <code>(Population carrier frequency)^(2) × 0.25 × 100</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Chance of an affected child</strong> = <code>Parent 1 genotype × Parent 2 genotype × 100</code> — the form to use when Parent 1 genotype and Parent 2 genotype are the values you have.</li><li><strong>Chance of a carrier child</strong> = <code>(Parent 1 genotype × (1 − Parent 2 genotype) + (1 − Parent 1 genotype) × Parent 2 genotype) × 100</code> — the form to use when Parent 1 genotype and Parent 2 genotype are the values you have.</li><li><strong>Chance of an unaffected child</strong> = <code>(1 − Parent 1 genotype) × (1 − Parent 2 genotype) × 100</code> — the form to use when Parent 1 genotype and Parent 2 genotype are the values you have.</li><li><strong>Population risk from carrier frequency</strong> = <code>(Population carrier frequency)^(2) × 0.25 × 100</code> — the form to use when Population carrier frequency are the values you have.</li></ul><p>Any one of Chance of an affected child, Chance of a carrier child and Chance of an unaffected child can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Parent 1 genotype from 0.5 to 1, leaving every other box alone. The panel moves from <strong>Chance of an affected child</strong> 25 %, <strong>Chance of a carrier child</strong> 50 %, <strong>Chance of an unaffected child</strong> 25 % and <strong>Population risk from carrier frequency</strong> 0.04 % to <strong>Chance of an affected child</strong> 50 %, <strong>Chance of a carrier child</strong> 50 %, <strong>Chance of an unaffected child</strong> 0 % and <strong>Population risk from carrier frequency</strong> 0.04 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Chance of an affected child, Chance of a carrier child and Chance of an unaffected child are results: they are worked out from the boxes above and cannot be typed into, so a past answer has to be entered as one of the inputs instead.</li><li><strong>Parent 1 genotype left as a guess.</strong> Anything typed into Parent 1 genotype is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Parent 2 genotype left as a guess.</strong> Anything typed into Parent 2 genotype is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Population carrier frequency left as a guess.</strong> Anything typed into Population carrier frequency is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Parent 1 genotype is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Parent 1 genotype</strong> takes a plain number with no unit attached. Change it and Chance of an affected child, Chance of a carrier child and Chance of an unaffected child changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Parent 1 genotype is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Parent 2 genotype</strong> takes a plain number with no unit attached. Change it and Chance of an affected child, Chance of a carrier child and Chance of an unaffected child changes with it. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Parent 2 genotype is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Population carrier frequency</strong> takes a plain number with no unit attached. Optional — 2pq from Hardy–Weinberg. Change it and Population risk from carrier frequency changes with it. Have it to hand before you start: Population carrier frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Chance of an affected child</strong> is a plain number and the page's own defaults put it at 25. It is worked out from Parent 1 genotype and Parent 2 genotype. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Chance of a carrier child</strong> is a plain number and the page's own defaults put it at 50. It is worked out from Parent 1 genotype and Parent 2 genotype. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Chance of an unaffected child</strong> is a plain number and the page's own defaults put it at 25. It is worked out from Parent 1 genotype and Parent 2 genotype. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Population risk from carrier frequency</strong> is a plain number and the page's own defaults put it at 0.04. It is worked out from Population carrier frequency. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Chance of an affected child</th><th>Chance of a carrier child</th><th>Chance of an unaffected child</th><th>Population risk from carrier frequency</th></tr></thead><tbody><tr><td><strong>Parent 1 genotype</strong> +10%</td><td>+10%</td><td>+0%</td><td>-10%</td><td>+0%</td></tr><tr><td><strong>Parent 2 genotype</strong> +10%</td><td>+10%</td><td>+0%</td><td>-10%</td><td>+0%</td></tr><tr><td><strong>Population carrier frequency</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+21%</td></tr></tbody></table><p>The steepest column belongs to Population carrier frequency: ten per cent there moves an answer by about 21 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Parent 1 genotype = 0.25, Parent 2 genotype = 0.25 and Population carrier frequency = 0.02, the answer is <strong>Chance of an affected child</strong> = 6.25 %, <strong>Chance of a carrier child</strong> = 37.5 %, <strong>Chance of an unaffected child</strong> = 56.25 % and <strong>Population risk from carrier frequency</strong> = 0.01 %.</li><li>With Parent 1 genotype = 1.5, Parent 2 genotype = 0.5 and Population carrier frequency = 0.04, the answer is <strong>Chance of an affected child</strong> = 75 %, <strong>Chance of a carrier child</strong> = 50 %, <strong>Chance of an unaffected child</strong> = -25 % and <strong>Population risk from carrier frequency</strong> = 0.04 %.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Chance of an affected child is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Parent 1 genotype, Parent 2 genotype and Population carrier frequency are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Parent 1 genotype, Parent 2 genotype and Population carrier frequency is what you already know and Chance of an affected child and Chance of a carrier child is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/transpiration-rate">Transpiration Rate Calculator</a>, <a href="/biology/tree-age">Tree age</a> and <a href="/biology/tree-diameter">Tree diameter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Autosomal Recessive Inheritance Risk calculator work out?', 'a' => <<<'TXT'
            Chance of an affected child, Chance of a carrier child, Chance of an unaffected child and Population risk from carrier frequency, from Parent 1 genotype and Parent 2 genotype. The relationship is Chance of an affected child = Parent 1 genotype × Parent 2 genotype × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Parent 1 genotype, Parent 2 genotype, Population carrier frequency. Enter parent 1 genotype, parent 2 genotype and population carrier frequency; Chance of an affected child is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Chance of an affected child, Chance of a carrier child, Chance of an unaffected child and Population risk from carrier frequency blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Chance of an affected child = 25 %, Chance of a carrier child = 50 %, Chance of an unaffected child = 25 % and Population risk from carrier frequency = 0.04 %. That comes from the page's own defaults, entered in Parent 1 genotype; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Chance of an affected child is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Parent 1 genotype left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Chance of an affected child at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/transpiration-rate', 'name' => 'Transpiration Rate Calculator'],
            ['path' => '/biology/tree-age', 'name' => 'Tree age'],
            ['path' => '/biology/tree-diameter', 'name' => 'Tree diameter Calculator'],
        ],
        'authors' => [],
    ],
];
