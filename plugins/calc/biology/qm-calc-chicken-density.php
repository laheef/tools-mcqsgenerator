<?php

/**
 * Chicken Density Calculator
 * /biology/chicken-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chicken Density Calculator',
    'meta' => ['title' => 'Chicken Density Calculator — Formula & Results', 'description' => 'Chicken Density Calculator works out stocking density from number of birds and usable floor area. Every box can be solved for, not only the one in the title.', 'h1' => 'Chicken Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'birds',
                            'label' => 'Number of birds',
                            'type' => 'number',
                            'help' => 'The flock you are housing',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Usable floor area',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'help' => 'Excluding feeders, drinkers and nest boxes',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Stocking density',
                            'type' => 'number',
                            'suffix' => 'birds/m²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_bird',
                            'label' => 'Floor allowance',
                            'type' => 'number',
                            'suffix' => 'm²/bird',
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
            'title' => 'Density',
            'results' => ['density' => 'birds/area', 'per_bird' => 'area/birds', 'birds' => 'density*area', 'area' => 'birds/density'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Number of birds and Usable floor area into Chicken Density and the answer comes back as Stocking density and Floor allowance. Nothing is looked up on this page: stocking density is computed from number of birds and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Stocking density is opened in birds/m²; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Chicken Density calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Chicken Density: it takes 2 numbers and reports Stocking density and Floor allowance.</p><p>The relationship it solves reads Stocking density = Number of birds ÷ Usable floor area.</p><p>The answers are Stocking density and Floor allowance; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Number of birds</strong> — a plain number, no unit. The flock you are housing</li><li><strong>Usable floor area</strong> — in m². Excluding feeders, drinkers and nest boxes</li></ul><p>The answers come back as Stocking density in birds/m², Floor allowance in m²/bird. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Number of birds = 60 and Usable floor area = 15 m²; the answers are <strong>Stocking density</strong> = 4 birds/m² and <strong>Floor allowance</strong> = 0.25 m²/bird.</p><ul><li><strong>Stocking density</strong> = 4 birds/m²</li><li><strong>Floor allowance</strong> = 0.25 m²/bird</li></ul><p>The line behind those figures is <strong>Stocking density</strong> = <code>Number of birds ÷ Usable floor area</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Stocking density</strong> = 4 and <strong>Floor allowance</strong> = 0.25. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Stocking density is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Stocking density</strong> = <code>Number of birds ÷ Usable floor area</code></li><li><strong>Floor allowance</strong> = <code>Usable floor area ÷ Number of birds</code></li><li><strong>Number of birds</strong> = <code>Stocking density × Usable floor area</code></li><li><strong>Usable floor area</strong> = <code>Number of birds ÷ Stocking density</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Stocking density</strong> = <code>Number of birds ÷ Usable floor area</code> — the form to use when Number of birds and Usable floor area are the values you have.</li><li><strong>Floor allowance</strong> = <code>Usable floor area ÷ Number of birds</code> — the form to use when Usable floor area and Number of birds are the values you have.</li><li><strong>Number of birds</strong> = <code>Stocking density × Usable floor area</code> — the form to use when Stocking density and Usable floor area are the values you have.</li><li><strong>Usable floor area</strong> = <code>Number of birds ÷ Stocking density</code> — the form to use when Number of birds and Stocking density are the values you have.</li></ul><p>Any one of Stocking density, Floor allowance and Number of birds can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Number of birds, from 60 to 120 — and the answers go from <strong>Stocking density</strong> 4 birds/m² and <strong>Floor allowance</strong> 0.25 m²/bird to <strong>Stocking density</strong> 8 birds/m² and <strong>Floor allowance</strong> 0.125 m²/bird.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Stocking density and Floor allowance are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Number of birds left as a guess.</strong> Anything typed into Number of birds is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Usable floor area left as a guess.</strong> Anything typed into Usable floor area is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Number of birds and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Number of birds</strong> takes a plain number with no unit attached. The flock you are housing. It feeds Stocking density, Floor allowance and Usable floor area. Have it to hand before you start: Number of birds is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Usable floor area</strong> is measured in m². Excluding feeders, drinkers and nest boxes. It feeds Stocking density, Floor allowance and Number of birds. Have it to hand before you start: Usable floor area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Stocking density</strong> is a plain number and the page's own defaults put it at 4. It is worked out from Number of birds and Usable floor area. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Floor allowance</strong> is a plain number and the page's own defaults put it at 0.25. It is worked out from Usable floor area and Number of birds. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Stocking density</th><th>Floor allowance</th></tr></thead><tbody><tr><td><strong>Number of birds</strong> +10%</td><td>+10%</td><td>-9.09%</td></tr><tr><td><strong>Usable floor area</strong> +10%</td><td>-9.09%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Number of birds: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Number of birds = 30 and Usable floor area = 7.5 m², the answer is <strong>Stocking density</strong> = 4 birds/m² and <strong>Floor allowance</strong> = 0.25 m²/bird.</li><li>With Number of birds = 180 and Usable floor area = 15 m², the answer is <strong>Stocking density</strong> = 12 birds/m² and <strong>Floor allowance</strong> = 0.0833 m²/bird.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Number of birds and Usable floor area. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Number of birds into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Stocking density in birds/m² with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Stocking density is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Number of birds and Usable floor area are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Number of birds and Usable floor area and the number you are missing is Stocking density and Floor allowance.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/mutation-rate">Mutation rate Calculator</a>, <a href="/biology/ndvi-calculator">NDVI (Normalised Difference Vegetation Index) Calculator</a> and <a href="/biology/net-primary-productivity">Net Primary Productivity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Chicken Density calculator work out?', 'a' => 'Stocking density and Floor allowance, from Number of birds and Usable floor area. The relationship is Stocking density = Number of birds ÷ Usable floor area.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of birds, Usable floor area (m²). Enter number of birds and usable floor area; Stocking density is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Stocking density, Floor allowance, Number of birds and Usable floor area blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Stocking density = 4 birds/m² and Floor allowance = 0.25 m²/bird. The figures come from Number of birds as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Stocking density is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Number of birds left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Stocking density keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/mutation-rate', 'name' => 'Mutation rate Calculator'],
            ['path' => '/biology/ndvi-calculator', 'name' => 'NDVI (Normalised Difference Vegetation Index) Calculator'],
            ['path' => '/biology/net-primary-productivity', 'name' => 'Net Primary Productivity Calculator'],
        ],
        'authors' => [],
    ],
];
