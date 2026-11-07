<?php

/**
 * Genetic Linkage Distance Calculator
 * /biology/genetic-map-distance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Genetic Linkage Distance Calculator',
    'meta' => ['title' => 'Genetic Linkage Distance Calculator: Steps & Units', 'description' => 'Genetic Linkage Distance Calculator works out map distance, interval 1 (Haldane). Nothing is stored between visits, and the working stays on the page.', 'h1' => 'Genetic Linkage Distance Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'rf1',
                            'label' => 'Recombination, interval 1',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'rf2',
                            'label' => 'Recombination, interval 2',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '11',
                        ],
                        [
                            'name' => 'cm1',
                            'label' => 'Map distance, interval 1 (Haldane)',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cm2',
                            'label' => 'Map distance, interval 2 (Haldane)',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cm_total',
                            'label' => 'Map distance across both',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kosambi_total',
                            'label' => 'Map distance across both (Kosambi)',
                            'type' => 'number',
                            'suffix' => 'cM',
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
            'title' => 'Distance',
            'results' => ['cm1' => '0-0.5*log(1-2*rf1/100)', 'cm2' => '0-0.5*log(1-2*rf2/100)', 'cm_total' => '(0-0.5*log(1-2*rf1/100))+(0-0.5*log(1-2*rf2/100))', 'kosambi_total' => '0.25*log((1+2*(rf1/100+rf2/100-2*rf1/100*rf2/100))/(1-2*(rf1/100+rf2/100-2*rf1/100*rf2/100)))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Genetic Linkage Distance takes Recombination, interval 1 and Recombination, interval 2 and returns Map distance, interval 1 (Haldane) and Map distance, interval 2 (Haldane). There is no hidden constant here: change map distance, interval 1 (Haldane) and recombination, interval 1 moves with it. The main result, Map distance, interval 1 (Haldane), is reported in cM.
        TXT,
        'sections' => [
            ['title' => 'How the Genetic Linkage Distance calculator works', 'html' => <<<'TXT'
            <p>The Genetic Linkage Distance calculator applies one relationship to 2 numbers and reports Map distance, interval 1 (Haldane), Map distance, interval 2 (Haldane) and Map distance across both.</p><p>Written with the labels from the form, Map distance, interval 1 (Haldane) = 0 − 0.5 × ln(1 − 2 × Recombination, interval 1 ÷ 100).</p><p>The answers are Map distance, interval 1 (Haldane), Map distance, interval 2 (Haldane), Map distance across both and Map distance across both (Kosambi); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Recombination, interval 1</strong> — in %</li><li><strong>Recombination, interval 2</strong> — in %</li></ul><p>What you get back is Map distance, interval 1 (Haldane) in cM, Map distance, interval 2 (Haldane) in cM, Map distance across both in cM, Map distance across both (Kosambi) in cM, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Recombination, interval 1 = 8 % and Recombination, interval 2 = 11 % — through the same formula and the panel reports <strong>Map distance, interval 1 (Haldane)</strong> = 0.0872 cM, <strong>Map distance, interval 2 (Haldane)</strong> = 0.1242 cM, <strong>Map distance across both</strong> = 0.2114 cM and <strong>Map distance across both (Kosambi)</strong> = 0.1798 cM.</p><ul><li><strong>Map distance, interval 1 (Haldane)</strong> = 0.0872 cM</li><li><strong>Map distance, interval 2 (Haldane)</strong> = 0.1242 cM</li><li><strong>Map distance across both</strong> = 0.2114 cM</li><li><strong>Map distance across both (Kosambi)</strong> = 0.1798 cM</li></ul><p>That is <strong>Map distance, interval 1 (Haldane)</strong> = <code>0 − 0.5 × ln(1 − 2 × Recombination, interval 1 ÷ 100)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Map distance, interval 1 (Haldane)</strong> = 0.0872, <strong>Map distance, interval 2 (Haldane)</strong> = 0.1242, <strong>Map distance across both</strong> = 0.2114 and <strong>Map distance across both (Kosambi)</strong> = 0.1798 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Map distance, interval 1 (Haldane) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Map distance, interval 1 (Haldane)</strong> = <code>0 − 0.5 × ln(1 − 2 × Recombination, interval 1 ÷ 100)</code></li><li><strong>Map distance, interval 2 (Haldane)</strong> = <code>0 − 0.5 × ln(1 − 2 × Recombination, interval 2 ÷ 100)</code></li><li><strong>Map distance across both</strong> = <code>(0 − 0.5 × ln(1 − 2 × Recombination, interval 1 ÷ 100)) + (0 − 0.5 × ln(1 − 2 × Recombination, interval 2 ÷ 100))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Map distance, interval 1 (Haldane)</strong> = <code>0 − 0.5 × ln(1 − 2 × Recombination, interval 1 ÷ 100)</code> — the form to use when Recombination, interval 1 are the values you have.</li><li><strong>Map distance, interval 2 (Haldane)</strong> = <code>0 − 0.5 × ln(1 − 2 × Recombination, interval 2 ÷ 100)</code> — the form to use when Recombination, interval 2 are the values you have.</li><li><strong>Map distance across both</strong> = <code>(0 − 0.5 × ln(1 − 2 × Recombination, interval 1 ÷ 100)) + (0 − 0.5 × ln(1 − 2 × Recombination, interval 2 ÷ 100))</code> — the form to use when Recombination, interval 1 and Recombination, interval 2 are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Map distance, interval 1 (Haldane), Map distance, interval 2 (Haldane) and Map distance across both can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Recombination, interval 1 from 8 to 16, leaving every other box alone. The panel moves from <strong>Map distance, interval 1 (Haldane)</strong> 0.0872 cM, <strong>Map distance, interval 2 (Haldane)</strong> 0.1242 cM, <strong>Map distance across both</strong> 0.2114 cM and <strong>Map distance across both (Kosambi)</strong> 0.1798 cM to <strong>Map distance, interval 1 (Haldane)</strong> 0.1928 cM, <strong>Map distance, interval 2 (Haldane)</strong> 0.1242 cM, <strong>Map distance across both</strong> 0.3171 cM and <strong>Map distance across both (Kosambi)</strong> 0.2548 cM.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Map distance, interval 1 (Haldane), Map distance, interval 2 (Haldane) and Map distance across both are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Recombination, interval 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Recombination, interval 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Recombination, interval 2 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Recombination, interval 2 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Recombination, interval 1 to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Genetic Linkage Distance form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Recombination, interval 1</strong> is measured in %. It feeds Map distance, interval 1 (Haldane), Map distance across both and Map distance across both (Kosambi). Fill it from a measurement rather than a memory — Recombination, interval 1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Recombination, interval 2</strong> is measured in %. It feeds Map distance, interval 2 (Haldane), Map distance across both and Map distance across both (Kosambi). Fill it from a measurement rather than a memory — Recombination, interval 2 is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Map distance, interval 1 (Haldane)</strong> is a plain number and the page's own defaults put it at 0.0872. The value follows from Recombination, interval 1. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Map distance, interval 2 (Haldane)</strong> is a plain number and the page's own defaults put it at 0.1242. The value follows from Recombination, interval 2. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Map distance across both</strong> is a plain number and the page's own defaults put it at 0.2114. The value follows from Recombination, interval 1 and Recombination, interval 2. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Map distance across both (Kosambi)</strong> is a plain number and the page's own defaults put it at 0.1798. The value follows from Recombination, interval 1 and Recombination, interval 2. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Map distance, interval 1 (Haldane)</th><th>Map distance, interval 2 (Haldane)</th><th>Map distance across both</th><th>Map distance across both (Kosambi)</th></tr></thead><tbody><tr><td><strong>Recombination, interval 1</strong> +10%</td><td>+11.03%</td><td>+0%</td><td>+4.55%</td><td>+3.96%</td></tr><tr><td><strong>Recombination, interval 2</strong> +10%</td><td>+0%</td><td>+11.52%</td><td>+6.77%</td><td>+5.88%</td></tr></tbody></table><p>Ranked by leverage, Recombination, interval 2 sits at the top — a ten per cent error in that box shows up as roughly 11.5 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Recombination, interval 1 = 4 % and Recombination, interval 2 = 5.5 % and the page reports <strong>Map distance, interval 1 (Haldane)</strong> = 0.0417 cM, <strong>Map distance, interval 2 (Haldane)</strong> = 0.0583 cM, <strong>Map distance across both</strong> = 0.1 cM and <strong>Map distance across both (Kosambi)</strong> = 0.0916 cM.</li><li>Feed in Recombination, interval 1 = 24 % and Recombination, interval 2 = 11 % and the page reports <strong>Map distance, interval 1 (Haldane)</strong> = 0.327 cM, <strong>Map distance, interval 2 (Haldane)</strong> = 0.1242 cM, <strong>Map distance across both</strong> = 0.4512 cM and <strong>Map distance across both (Kosambi)</strong> = 0.3422 cM.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Map distance, interval 1 (Haldane) is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Recombination, interval 1 and Recombination, interval 2 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Recombination, interval 1 and Recombination, interval 2 is what you already know and Map distance, interval 1 (Haldane) and Map distance, interval 2 (Haldane) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/in-vivo-formulation">In Vivo Formulation Calculator</a>, <a href="/biology/inbreeding-coefficient">Inbreeding Coefficient (COI) Calculator</a> and <a href="/biology/land-equivalent-ratio">Land Equivalent Ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Genetic Linkage Distance calculator work out?', 'a' => <<<'TXT'
            Map distance, interval 1 (Haldane), Map distance, interval 2 (Haldane), Map distance across both and Map distance across both (Kosambi), from Recombination, interval 1. The relationship is Map distance, interval 1 (Haldane) = 0 − 0.5 × ln(1 − 2 × Recombination, interval 1 ÷ 100).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Recombination, interval 1 (%), Recombination, interval 2 (%). With recombination, interval 1 and recombination, interval 2 in place, Map distance, interval 1 (Haldane) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Map distance, interval 1 (Haldane), Map distance, interval 2 (Haldane), Map distance across both and Map distance across both (Kosambi) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Map distance, interval 1 (Haldane) = 0.0872 cM, Map distance, interval 2 (Haldane) = 0.1242 cM, Map distance across both = 0.2114 cM and Map distance across both (Kosambi) = 0.1798 cM. The figures come from Recombination, interval 1 as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Map distance, interval 1 (Haldane) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Recombination, interval 1 blank and the page solves for it, reporting Map distance, interval 1 (Haldane) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Map distance, interval 1 (Haldane) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/in-vivo-formulation', 'name' => 'In Vivo Formulation Calculator'],
            ['path' => '/biology/inbreeding-coefficient', 'name' => 'Inbreeding Coefficient (COI) Calculator'],
            ['path' => '/biology/land-equivalent-ratio', 'name' => 'Land Equivalent Ratio Calculator'],
        ],
        'authors' => [],
    ],
];
