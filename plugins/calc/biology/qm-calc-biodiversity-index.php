<?php

/**
 * Biodiversity Index Calculator (Simpson)
 * /biology/biodiversity-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Biodiversity Index Calculator (Simpson)',
    'meta' => ['title' => 'Biodiversity Index Calculator: Units & Formula', 'description' => 'Biodiversity Index Calculator (Simpson) works out simpson dominance D and Simpson diversity 1 − D from species 1 count, species 2 count and species 3 count.', 'h1' => 'Biodiversity Index Calculator (Simpson)', 'updated' => '2026-10-29'],
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
                            'name' => 'dom',
                            'label' => 'Simpson dominance D',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'div',
                            'label' => 'Simpson diversity 1 − D',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'inv',
                            'label' => 'Inverse Simpson 1 ÷ D',
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
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Diversity',
            'results' => ['n' => 'n1+n2+n3+n4+n5', 'dom' => '(max(n1,0)*(max(n1,0)-1)+max(n2,0)*(max(n2,0)-1)+max(n3,0)*(max(n3,0)-1)+max(n4,0)*(max(n4,0)-1)+max(n5,0)*(max(n5,0)-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))', 'div' => <<<'TXT'
            1-(max(n1,0)*(max(n1,0)-1)+max(n2,0)*(max(n2,0)-1)+max(n3,0)*(max(n3,0)-1)+max(n4,0)*(max(n4,0)-1)+max(n5,0)*(max(n5,0)-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1))
            TXT, 'inv' => <<<'TXT'
            1/((max(n1,0)*(max(n1,0)-1)+max(n2,0)*(max(n2,0)-1)+max(n3,0)*(max(n3,0)-1)+max(n4,0)*(max(n4,0)-1)+max(n5,0)*(max(n5,0)-1))/((n1+n2+n3+n4+n5)*(n1+n2+n3+n4+n5-1)))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Species 1 count, Species 2 count and Species 3 count into Biodiversity Index Calculator (Simpson) and the answer comes back as Simpson dominance D and Simpson diversity 1 − D. The arithmetic is the whole method: simpson dominance D is worked out from species 1 count by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Biodiversity Index Calculator (Simpson) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Biodiversity Index Calculator (Simpson): it takes 5 numbers and reports Simpson dominance D, Simpson diversity 1 − D and Inverse Simpson 1 ÷ D.</p><p>In the form&#039;s own words, Total individuals = Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count.</p><p>The answers are Simpson dominance D, Simpson diversity 1 − D, Inverse Simpson 1 ÷ D and Total individuals; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Species 1 count</strong> — in individuals</li><li><strong>Species 2 count</strong> — in individuals</li><li><strong>Species 3 count</strong> — in individuals</li><li><strong>Species 4 count</strong> — in individuals</li><li><strong>Species 5 count</strong> — in individuals</li></ul><p>What you get back is Simpson dominance D, Simpson diversity 1 − D, Inverse Simpson 1 ÷ D, Total individuals, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Species 1 count = 40 individuals, Species 2 count = 25 individuals, Species 3 count = 15 individuals, Species 4 count = 10 individuals and Species 5 count = 6 individuals; the answers are <strong>Total individuals</strong> = 96, <strong>Simpson dominance D</strong> = 0.273, <strong>Simpson diversity 1 − D</strong> = 0.727 and <strong>Inverse Simpson 1 ÷ D</strong> = 3.66.</p><ul><li><strong>Total individuals</strong> = 96</li><li><strong>Simpson dominance D</strong> = 0.273</li><li><strong>Simpson diversity 1 − D</strong> = 0.727</li><li><strong>Inverse Simpson 1 ÷ D</strong> = 3.66</li></ul><p>The line behind those figures is <strong>Total individuals</strong> = <code>Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total individuals</strong> = 96, <strong>Simpson dominance D</strong> = 0.273, <strong>Simpson diversity 1 − D</strong> = 0.727 and <strong>Inverse Simpson 1 ÷ D</strong> = 3.66. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Simpson dominance D is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total individuals</strong> = <code>Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total individuals</strong> = <code>Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count</code> — the form to use when Species 1 count, Species 2 count, Species 3 count and Species 4 count are the values you have.</li></ul><p>Any one of Total individuals, Simpson dominance D and Simpson diversity 1 − D can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Species 1 count, from 40 to 80 — and the answers go from <strong>Total individuals</strong> 96, <strong>Simpson dominance D</strong> 0.273, <strong>Simpson diversity 1 − D</strong> 0.727 and <strong>Inverse Simpson 1 ÷ D</strong> 3.66 to <strong>Total individuals</strong> 136, <strong>Simpson dominance D</strong> 0.3949, <strong>Simpson diversity 1 − D</strong> 0.6051 and <strong>Inverse Simpson 1 ÷ D</strong> 2.53.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Simpson dominance D, Simpson diversity 1 − D and Inverse Simpson 1 ÷ D are results: they are worked out from the boxes above and cannot be typed into, so a past answer has to be entered as one of the inputs instead.</li><li><strong>Species 1 count left as a guess.</strong> Anything typed into Species 1 count is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Species 2 count left as a guess.</strong> Anything typed into Species 2 count is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Species 3 count left as a guess.</strong> Anything typed into Species 3 count is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Species 1 count to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Species 1 count</strong> is measured in individuals. It feeds Total individuals, Simpson dominance D and Simpson diversity 1 − D. Have it to hand before you start: Species 1 count is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Species 2 count</strong> is measured in individuals. It feeds Total individuals, Simpson dominance D and Simpson diversity 1 − D. Have it to hand before you start: Species 2 count is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Species 3 count</strong> is measured in individuals. It feeds Total individuals, Simpson dominance D and Simpson diversity 1 − D. Have it to hand before you start: Species 3 count is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Species 4 count</strong> is measured in individuals. It feeds Total individuals, Simpson dominance D and Simpson diversity 1 − D. Have it to hand before you start: Species 4 count is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Species 5 count</strong> is measured in individuals. It feeds Total individuals, Simpson dominance D and Simpson diversity 1 − D. Have it to hand before you start: Species 5 count is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Simpson dominance D</strong> is a plain number and the page's own defaults put it at 0.273. It is computed from Species 1 count, Species 2 count, Species 3 count and Species 4 count, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Simpson diversity 1 − D</strong> is a plain number and the page's own defaults put it at 0.727. It is computed from Species 1 count, Species 2 count, Species 3 count and Species 4 count, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Inverse Simpson 1 ÷ D</strong> is a plain number and the page's own defaults put it at 3.66. It is computed from Species 1 count, Species 2 count, Species 3 count and Species 4 count, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Total individuals</strong> is a plain number and the page's own defaults put it at 96. It is computed from Species 1 count, Species 2 count, Species 3 count and Species 4 count, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total individuals</th><th>Simpson dominance D</th><th>Simpson diversity 1 − D</th><th>Inverse Simpson 1 ÷ D</th></tr></thead><tbody><tr><td><strong>Species 1 count</strong> +10%</td><td>+4.17%</td><td>+4.4%</td><td>-1.65%</td><td>-4.22%</td></tr><tr><td><strong>Species 2 count</strong> +10%</td><td>+2.6%</td><td>-0.13%</td><td>+0.05%</td><td>+0.13%</td></tr><tr><td><strong>Species 3 count</strong> +10%</td><td>+1.56%</td><td>-1.29%</td><td>+0.48%</td><td>+1.3%</td></tr><tr><td><strong>Species 4 count</strong> +10%</td><td>+1.04%</td><td>-1.28%</td><td>+0.48%</td><td>+1.29%</td></tr><tr><td><strong>Species 5 count</strong> +10%</td><td>+0.62%</td><td>-0.97%</td><td>+0.36%</td><td>+0.98%</td></tr></tbody></table><p>The steepest column belongs to Species 1 count: ten per cent there moves an answer by about 4.4 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Species 1 count = 20 individuals, Species 2 count = 12.5 individuals, Species 3 count = 7.5 individuals, Species 4 count = 5 individuals and Species 5 count = 3 individuals, the answer is <strong>Total individuals</strong> = 48, <strong>Simpson dominance D</strong> = 0.2653, <strong>Simpson diversity 1 − D</strong> = 0.7347 and <strong>Inverse Simpson 1 ÷ D</strong> = 3.77.</li><li>With Species 1 count = 120 individuals, Species 2 count = 25 individuals, Species 3 count = 15 individuals, Species 4 count = 10 individuals and Species 5 count = 6 individuals, the answer is <strong>Total individuals</strong> = 176, <strong>Simpson dominance D</strong> = 0.4938, <strong>Simpson diversity 1 − D</strong> = 0.5062 and <strong>Inverse Simpson 1 ÷ D</strong> = 2.02.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Simpson dominance D is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Species 1 count, Species 2 count and Species 3 count and the number you are missing is Simpson dominance D and Simpson diversity 1 − D.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/phenotypic-ratio">Phenotypic Ratio Calculator</a>, <a href="/biology/photosynthesis-rate">Photosynthesis Rate Calculator</a> and <a href="/biology/pig-weight">Pig Weight Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Biodiversity Index Calculator (Simpson) calculator work out?', 'a' => <<<'TXT'
            Simpson dominance D, Simpson diversity 1 − D, Inverse Simpson 1 ÷ D and Total individuals, from Species 1 count, Species 2 count, Species 3 count and Species 4 count. The relationship is Total individuals = Species 1 count + Species 2 count + Species 3 count + Species 4 count + Species 5 count.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Species 1 count (individuals), Species 2 count (individuals), Species 3 count (individuals), Species 4 count (individuals), Species 5 count (individuals). With species 1 count, species 2 count and species 3 count in place, Simpson dominance D can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total individuals, Simpson dominance D, Simpson diversity 1 − D and Inverse Simpson 1 ÷ D blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total individuals = 96, Simpson dominance D = 0.273, Simpson diversity 1 − D = 0.727 and Inverse Simpson 1 ÷ D = 3.66. The figures come from Species 1 count as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Simpson dominance D is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Species 1 count left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Simpson dominance D keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/phenotypic-ratio', 'name' => 'Phenotypic Ratio Calculator'],
            ['path' => '/biology/photosynthesis-rate', 'name' => 'Photosynthesis Rate Calculator'],
            ['path' => '/biology/pig-weight', 'name' => 'Pig Weight Calculator'],
        ],
        'authors' => [],
    ],
];
