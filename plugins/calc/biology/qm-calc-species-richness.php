<?php

/**
 * Species Richness Calculator
 * /biology/species-richness
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Species Richness Calculator',
    'meta' => ['title' => 'Species Richness Calculator: Units & Formula', 'description' => 'Species Richness Calculator works out species richness S and total individuals and reports both. Free to use, with the working shown beside the answer.', 'h1' => 'Species Richness Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Species 1 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Species 2 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'n3',
                            'label' => 'Species 3 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'n4',
                            'label' => 'Species 4 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'n5',
                            'label' => 'Species 5 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'richness',
                            'label' => 'Species richness S',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Total individuals',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'margalef',
                            'label' => 'Margalef index',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'menhinick',
                            'label' => 'Menhinick index',
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
            'title' => 'Richness',
            'results' => ['n' => 'n1+n2+n3+n4+n5', 'richness' => 'min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5))', 'margalef' => '(min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5))-1)/log(n1+n2+n3+n4+n5)', 'menhinick' => '(min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5)))/sqrt(n1+n2+n3+n4+n5)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Species Richness works out Species richness S and Total individuals from Species 1 count, Species 2 count and Species 3 count. There is no hidden constant here: change species richness S and species 1 count moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Species Richness calculator works', 'html' => <<<'TXT'
            <p>Species Richness answers one question from 5 numbers, and the answer is Species richness S, Total individuals and Margalef index.</p><p>Written with the labels from the form, Total individuals = Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count.</p><p>The answers are Species richness S, Total individuals, Margalef index and Menhinick index; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Species 1 count</strong> — in individuals</li><li><strong>Species 2 count</strong> — in individuals</li><li><strong>Species 3 count</strong> — in individuals</li><li><strong>Species 4 count</strong> — in individuals</li><li><strong>Species 5 count</strong> — in individuals</li></ul><p>What you get back is Species richness S, Total individuals, Margalef index, Menhinick index, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Species 1 count = 40 individuals, Species 2 count = 25 individuals, Species 3 count = 15 individuals, Species 4 count = 10 individuals and Species 5 count = 6 individuals; the answers are <strong>Total individuals</strong> = 96, <strong>Species richness S</strong> = 5, <strong>Margalef index</strong> = 0.8764 and <strong>Menhinick index</strong> = 0.5103.</p><ul><li><strong>Total individuals</strong> = 96</li><li><strong>Species richness S</strong> = 5</li><li><strong>Margalef index</strong> = 0.8764</li><li><strong>Menhinick index</strong> = 0.5103</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Total individuals</strong> = <code>Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total individuals</strong> = 96, <strong>Species richness S</strong> = 5, <strong>Margalef index</strong> = 0.8764 and <strong>Menhinick index</strong> = 0.5103. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Species richness S is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total individuals</strong> = <code>Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count</code></li><li><strong>Species richness S</strong> = <code>min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total individuals</strong> = <code>Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count</code> — the form to use when Species 1 count, Species 2 count, Species 3 count and Species 4 count are the values you have.</li><li><strong>Species richness S</strong> = <code>min(1,max(0,Species 1 count)) + min(1,max(0,Species 2 count)) + min(1,max(0,Species 3 count)) + min(1,max(0,Species 4 count)) + min(1,max(0,Species 5 count))</code> — the form to use when Species 1 count, Species 2 count, Species 3 count and Species 4 count are the values you have.</li></ul><p>Any one of Total individuals, Species richness S and Margalef index can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Species 1 count from 40 to 80, leaving every other box alone. The panel moves from <strong>Total individuals</strong> 96, <strong>Species richness S</strong> 5, <strong>Margalef index</strong> 0.8764 and <strong>Menhinick index</strong> 0.5103 to <strong>Total individuals</strong> 136, <strong>Species richness S</strong> 5, <strong>Margalef index</strong> 0.8142 and <strong>Menhinick index</strong> 0.4287.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Species richness S, Total individuals and Margalef index are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Species 1 count left as a guess.</strong> Anything typed into Species 1 count is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Species 2 count left as a guess.</strong> Anything typed into Species 2 count is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Species 3 count left as a guess.</strong> Anything typed into Species 3 count is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Species 1 count and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Species Richness form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Species 1 count</strong> is measured in individuals. The page reads it when it works out Total individuals, Species richness S and Margalef index. Fill it from a measurement rather than a memory — Species 1 count is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Species 2 count</strong> is measured in individuals. The page reads it when it works out Total individuals, Species richness S and Margalef index. Fill it from a measurement rather than a memory — Species 2 count is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Species 3 count</strong> is measured in individuals. The page reads it when it works out Total individuals, Species richness S and Margalef index. Fill it from a measurement rather than a memory — Species 3 count is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Species 4 count</strong> is measured in individuals. The page reads it when it works out Total individuals, Species richness S and Margalef index. Fill it from a measurement rather than a memory — Species 4 count is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Species 5 count</strong> is measured in individuals. The page reads it when it works out Total individuals, Species richness S and Margalef index. Fill it from a measurement rather than a memory — Species 5 count is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Species richness S</strong> is a plain number and the page's own defaults put it at 5. It is computed from Species 1 count, Species 2 count, Species 3 count and Species 4 count, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total individuals</strong> is a plain number and the page's own defaults put it at 96. It is computed from Species 1 count, Species 2 count, Species 3 count and Species 4 count, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Margalef index</strong> is a plain number and the page's own defaults put it at 0.8764. It is computed from Species 1 count, Species 2 count, Species 3 count and Species 4 count, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Menhinick index</strong> is a plain number and the page's own defaults put it at 0.5103. It is computed from Species 1 count, Species 2 count, Species 3 count and Species 4 count, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total individuals</th><th>Species richness S</th><th>Margalef index</th><th>Menhinick index</th></tr></thead><tbody><tr><td><strong>Species 1 count</strong> +10%</td><td>+4.17%</td><td>+0%</td><td>-0.89%</td><td>-2.02%</td></tr><tr><td><strong>Species 2 count</strong> +10%</td><td>+2.6%</td><td>+0%</td><td>-0.56%</td><td>-1.28%</td></tr><tr><td><strong>Species 3 count</strong> +10%</td><td>+1.56%</td><td>+0%</td><td>-0.34%</td><td>-0.77%</td></tr><tr><td><strong>Species 4 count</strong> +10%</td><td>+1.04%</td><td>+0%</td><td>-0.23%</td><td>-0.52%</td></tr><tr><td><strong>Species 5 count</strong> +10%</td><td>+0.62%</td><td>+0%</td><td>-0.14%</td><td>-0.31%</td></tr></tbody></table><p>The steepest column belongs to Species 1 count: ten per cent there moves an answer by about 4.2 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Species 1 count = 20 individuals, Species 2 count = 12.5 individuals, Species 3 count = 7.5 individuals, Species 4 count = 5 individuals and Species 5 count = 3 individuals and the page reports <strong>Total individuals</strong> = 48, <strong>Species richness S</strong> = 5, <strong>Margalef index</strong> = 1.03 and <strong>Menhinick index</strong> = 0.7217.</li><li>Feed in Species 1 count = 120 individuals, Species 2 count = 25 individuals, Species 3 count = 15 individuals, Species 4 count = 10 individuals and Species 5 count = 6 individuals and the page reports <strong>Total individuals</strong> = 176, <strong>Species richness S</strong> = 5, <strong>Margalef index</strong> = 0.7736 and <strong>Menhinick index</strong> = 0.3769.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Species richness S is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Species 1 count, Species 2 count and Species 3 count and the number you are missing is Species richness S and Total individuals.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/cedar-tree-value">Standing Timber Value Calculator</a>, <a href="/biology/stems-per-hectare">Stems Per Hectare Calculator</a> and <a href="/biology/stomatal-density">Stomatal Density Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Species Richness calculator work out?', 'a' => <<<'TXT'
            Species richness S, Total individuals, Margalef index and Menhinick index, from Species 1 count, Species 2 count, Species 3 count and Species 4 count. The relationship is Total individuals = Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Species 1 count (individuals), Species 2 count (individuals), Species 3 count (individuals), Species 4 count (individuals), Species 5 count (individuals). With species 1 count, species 2 count and species 3 count in place, Species richness S can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total individuals, Species richness S, Margalef index and Menhinick index blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total individuals = 96, Species richness S = 5, Margalef index = 0.8764 and Menhinick index = 0.5103. That comes from the page's own defaults, entered in Species 1 count; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Species richness S is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Species 1 count blank and the page solves for it, reporting Species richness S instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Species richness S keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cedar-tree-value', 'name' => 'Standing Timber Value Calculator'],
            ['path' => '/biology/stems-per-hectare', 'name' => 'Stems Per Hectare Calculator'],
            ['path' => '/biology/stomatal-density', 'name' => 'Stomatal Density Calculator'],
        ],
        'authors' => [],
    ],
];
