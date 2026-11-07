<?php

/**
 * Cephalic Index Calculator
 * /biology/cephalic-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cephalic Index Calculator',
    'meta' => ['title' => 'Cephalic Index Calculator — Formula & Results', 'description' => 'Cephalic Index Calculator works out width to length ratio from head width (biparietal) and head length (fronto-occipital). Any box can be the unknown.', 'h1' => 'Cephalic Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Head width (biparietal)',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Widest transverse diameter of the head',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '150',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Head length (fronto-occipital)',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Glabella to the most posterior point',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '190',
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Cephalic index',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Width to length ratio',
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
            'title' => 'Cephalic index',
            'results' => ['index' => 'width/length*100', 'ratio' => 'width/length', 'width' => 'index*length/100', 'length' => 'width/index*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cephalic Index works out Cephalic index and Width to length ratio from Head width (biparietal) and Head length (fronto-occipital). There is no hidden constant here: change cephalic index and head width (biparietal) moves with it. The main result, Cephalic index, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Cephalic Index calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Cephalic Index: it takes 2 numbers and reports Cephalic index and Width to length ratio.</p><p>The relationship it solves reads Cephalic index = Head width (biparietal) ÷ Head length (fronto-occipital) × 100.</p><p>What comes back is Cephalic index and Width to length ratio — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Head width (biparietal)</strong> — in mm. Widest transverse diameter of the head</li><li><strong>Head length (fronto-occipital)</strong> — in mm. Glabella to the most posterior point</li></ul><p>What you get back is Cephalic index in %, Width to length ratio, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Head width (biparietal) = 150 mm and Head length (fronto-occipital) = 190 mm — through the same formula and the panel reports <strong>Cephalic index</strong> = 78.95 % and <strong>Width to length ratio</strong> = 0.7895.</p><ul><li><strong>Cephalic index</strong> = 78.95 %</li><li><strong>Width to length ratio</strong> = 0.7895</li></ul><p>That is <strong>Cephalic index</strong> = <code>Head width (biparietal) ÷ Head length (fronto-occipital) × 100</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Cephalic index</strong> = 78.95 and <strong>Width to length ratio</strong> = 0.7895. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Cephalic index is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cephalic index</strong> = <code>Head width (biparietal) ÷ Head length (fronto-occipital) × 100</code></li><li><strong>Width to length ratio</strong> = <code>Head width (biparietal) ÷ Head length (fronto-occipital)</code></li><li><strong>Head width (biparietal)</strong> = <code>Cephalic index × Head length (fronto-occipital) ÷ 100</code></li><li><strong>Head length (fronto-occipital)</strong> = <code>Head width (biparietal) ÷ Cephalic index × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Cephalic index</strong> = <code>Head width (biparietal) ÷ Head length (fronto-occipital) × 100</code> — the form to use when Head width (biparietal) and Head length (fronto-occipital) are the values you have.</li><li><strong>Width to length ratio</strong> = <code>Head width (biparietal) ÷ Head length (fronto-occipital)</code> — the form to use when Head width (biparietal) and Head length (fronto-occipital) are the values you have.</li><li><strong>Head width (biparietal)</strong> = <code>Cephalic index × Head length (fronto-occipital) ÷ 100</code> — the form to use when Cephalic index and Head length (fronto-occipital) are the values you have.</li><li><strong>Head length (fronto-occipital)</strong> = <code>Head width (biparietal) ÷ Cephalic index × 100</code> — the form to use when Head width (biparietal) and Cephalic index are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cephalic index, Width to length ratio and Head width (biparietal) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Head width (biparietal) from 150 to 300, leaving every other box alone. The panel moves from <strong>Cephalic index</strong> 78.95 % and <strong>Width to length ratio</strong> 0.7895 to <strong>Cephalic index</strong> 158 % and <strong>Width to length ratio</strong> 1.58.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Cephalic index and Width to length ratio are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Head width (biparietal) left as a guess.</strong> Anything typed into Head width (biparietal) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Head length (fronto-occipital) left as a guess.</strong> Anything typed into Head length (fronto-occipital) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Head width (biparietal) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Head width (biparietal)</strong> is measured in mm. Widest transverse diameter of the head. Change it and Cephalic index, Width to length ratio and Head length (fronto-occipital) changes with it. Have it to hand before you start: Head width (biparietal) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Head length (fronto-occipital)</strong> is measured in mm. Glabella to the most posterior point. Change it and Cephalic index, Width to length ratio and Head width (biparietal) changes with it. Have it to hand before you start: Head length (fronto-occipital) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Cephalic index</strong> is a plain number and the page's own defaults put it at 78.95. It is computed from Head width (biparietal) and Head length (fronto-occipital), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Width to length ratio</strong> is a plain number and the page's own defaults put it at 0.7895. It is computed from Head width (biparietal) and Head length (fronto-occipital), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cephalic index</th><th>Width to length ratio</th></tr></thead><tbody><tr><td><strong>Head width (biparietal)</strong> +10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Head length (fronto-occipital)</strong> +10%</td><td>-9.09%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Head width (biparietal): ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Head width (biparietal) = 75 mm and Head length (fronto-occipital) = 95 mm, the answer is <strong>Cephalic index</strong> = 78.95 % and <strong>Width to length ratio</strong> = 0.7895.</li><li>With Head width (biparietal) = 450 mm and Head length (fronto-occipital) = 190 mm, the answer is <strong>Cephalic index</strong> = 237 % and <strong>Width to length ratio</strong> = 2.37.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Head width (biparietal) and Head length (fronto-occipital). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Head width (biparietal) into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Cephalic index in % with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Cephalic index is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Head width (biparietal) and Head length (fronto-occipital) and the number you are missing is Cephalic index and Width to length ratio.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/net-primary-productivity">Net Primary Productivity Calculator</a>, <a href="/biology/net-reproductive-rate">Net Reproductive Rate (R₀) Calculator</a> and <a href="/biology/npk-fertilizer-blend">NPK Fertilizer Blend Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cephalic Index calculator work out?', 'a' => <<<'TXT'
            Cephalic index and Width to length ratio, from Head width (biparietal) and Head length (fronto-occipital). The relationship is Cephalic index = Head width (biparietal) ÷ Head length (fronto-occipital) × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Head width (biparietal) (mm), Head length (fronto-occipital) (mm). Enter head width (biparietal) and head length (fronto-occipital); Cephalic index is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Cephalic index, Width to length ratio, Head width (biparietal) and Head length (fronto-occipital) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Cephalic index = 78.95 % and Width to length ratio = 0.7895. Those are the defaults written into the form — move Head width (biparietal) and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Cephalic index is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Head width (biparietal) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Cephalic index keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/net-primary-productivity', 'name' => 'Net Primary Productivity Calculator'],
            ['path' => '/biology/net-reproductive-rate', 'name' => 'Net Reproductive Rate (R₀) Calculator'],
            ['path' => '/biology/npk-fertilizer-blend', 'name' => 'NPK Fertilizer Blend Calculator'],
        ],
        'authors' => [],
    ],
];
