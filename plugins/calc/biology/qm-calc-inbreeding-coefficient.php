<?php

/**
 * Inbreeding Coefficient Calculator (COI)
 * /biology/inbreeding-coefficient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Inbreeding Coefficient Calculator (COI)',
    'meta' => ['title' => 'Inbreeding Coefficient Calculator (COI) — Biology', 'description' => 'Enter Independent ancestral paths, Generations on the sire\'s side and Generations on the dam\'s side into Inbreeding Coefficient Calculator (COI) and the…', 'h1' => 'Inbreeding Coefficient Calculator (COI)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'paths',
                            'label' => 'Independent ancestral paths',
                            'type' => 'number',
                            'help' => 'Count of distinct loops through a common ancestor',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'n1',
                            'label' => 'Generations on the sire\'s side',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Generations on the dam\'s side',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'f',
                            'label' => 'Inbreeding coefficient',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hetero',
                            'label' => 'Heterozygosity retained',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'related',
                            'label' => 'Relationship coefficient',
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
            'title' => 'Inbreeding',
            'results' => ['f' => 'pow(0.5,n1+n2+1)*paths*100', 'hetero' => '(1-pow(0.5,n1+n2+1)*paths)*100', 'related' => 'pow(0.5,n1+n2)*paths*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Independent ancestral paths, Generations on the sire's side and Generations on the dam's side into Inbreeding Coefficient Calculator (COI) and the answer comes back as Inbreeding coefficient and Heterozygosity retained. It is a single relationship that reads Inbreeding coefficient out of Independent ancestral paths, not a table of canned results keyed by them. Units for Inbreeding coefficient default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Inbreeding Coefficient Calculator (COI) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Inbreeding Coefficient Calculator (COI): it takes 3 numbers and reports Inbreeding coefficient, Heterozygosity retained and Relationship coefficient.</p><p>In the form&#039;s own words, Inbreeding coefficient = (0.5)^(Generations on the sire&#039;s side + Generations on the dam&#039;s side + 1) × Independent ancestral paths × 100.</p><p>The answers are Inbreeding coefficient, Heterozygosity retained and Relationship coefficient; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Independent ancestral paths</strong> — a plain number, no unit. Count of distinct loops through a common ancestor</li><li><strong>Generations on the sire&#039;s side</strong> — a plain number, no unit</li><li><strong>Generations on the dam&#039;s side</strong> — a plain number, no unit</li></ul><p>The answers come back as Inbreeding coefficient in %, Heterozygosity retained in %, Relationship coefficient in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Independent ancestral paths = 1, Generations on the sire&amp;#039;s side = 2 and Generations on the dam&amp;#039;s side = 2; the answers are &lt;strong&gt;Inbreeding coefficient&lt;/strong&gt; = 3.13 %, &lt;strong&gt;Heterozygosity retained&lt;/strong&gt; = 96.88 % and &lt;strong&gt;Relationship coefficient&lt;/strong&gt; = 6.25 %.</p><ul><li><strong>Inbreeding coefficient</strong> = 3.13 %</li><li><strong>Heterozygosity retained</strong> = 96.88 %</li><li><strong>Relationship coefficient</strong> = 6.25 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Inbreeding coefficient</strong> = <code>(0.5)^(Generations on the sire&#039;s side + Generations on the dam&#039;s side + 1) × Independent ancestral paths × 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Inbreeding coefficient&lt;/strong&gt; = 3.13, &lt;strong&gt;Heterozygosity retained&lt;/strong&gt; = 96.88 and &lt;strong&gt;Relationship coefficient&lt;/strong&gt; = 6.25. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Inbreeding coefficient is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Inbreeding coefficient</strong> = <code>(0.5)^(Generations on the sire&#039;s side + Generations on the dam&#039;s side + 1) × Independent ancestral paths × 100</code></li><li><strong>Heterozygosity retained</strong> = <code>(1 − (0.5)^(Generations on the sire&#039;s side + Generations on the dam&#039;s side + 1) × Independent ancestral paths) × 100</code></li><li><strong>Relationship coefficient</strong> = <code>(0.5)^(Generations on the sire&#039;s side + Generations on the dam&#039;s side) × Independent ancestral paths × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Inbreeding coefficient</strong> = <code>(0.5)^(Generations on the sire&#039;s side + Generations on the dam&#039;s side + 1) × Independent ancestral paths × 100</code> — the form to use when Generations on the sire&#039;s side, Generations on the dam&#039;s side and Independent ancestral paths are the values you have.</li><li><strong>Heterozygosity retained</strong> = <code>(1 − (0.5)^(Generations on the sire&#039;s side + Generations on the dam&#039;s side + 1) × Independent ancestral paths) × 100</code> — the form to use when Generations on the sire&#039;s side, Generations on the dam&#039;s side and Independent ancestral paths are the values you have.</li><li><strong>Relationship coefficient</strong> = <code>(0.5)^(Generations on the sire&#039;s side + Generations on the dam&#039;s side) × Independent ancestral paths × 100</code> — the form to use when Generations on the sire&#039;s side, Generations on the dam&#039;s side and Independent ancestral paths are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Inbreeding coefficient, Heterozygosity retained and Relationship coefficient can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Independent ancestral paths from 1 to 2, leaving every other box alone. The panel moves from &lt;strong&gt;Inbreeding coefficient&lt;/strong&gt; 3.13 %, &lt;strong&gt;Heterozygosity retained&lt;/strong&gt; 96.88 % and &lt;strong&gt;Relationship coefficient&lt;/strong&gt; 6.25 % to &lt;strong&gt;Inbreeding coefficient&lt;/strong&gt; 6.25 %, &lt;strong&gt;Heterozygosity retained&lt;/strong&gt; 93.75 % and &lt;strong&gt;Relationship coefficient&lt;/strong&gt; 12.5 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Inbreeding coefficient, Heterozygosity retained and Relationship coefficient are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Independent ancestral paths left as a guess.</strong> Anything typed into Independent ancestral paths is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Generations on the sire&#039;s side left as a guess.</strong> Anything typed into Generations on the sire&amp;#039;s side is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Generations on the dam&#039;s side left as a guess.</strong> Anything typed into Generations on the dam&amp;#039;s side is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Independent ancestral paths is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Inbreeding Coefficient Calculator (COI) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Independent ancestral paths</strong> takes a plain number with no unit attached. Count of distinct loops through a common ancestor. It feeds Inbreeding coefficient, Heterozygosity retained and Relationship coefficient. Fill it from a measurement rather than a memory — Independent ancestral paths is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Generations on the sire&#039;s side</strong> takes a plain number with no unit attached. It feeds Inbreeding coefficient, Heterozygosity retained and Relationship coefficient. Fill it from a measurement rather than a memory — Generations on the sire&#039;s side is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Generations on the dam&#039;s side</strong> takes a plain number with no unit attached. It feeds Inbreeding coefficient, Heterozygosity retained and Relationship coefficient. Fill it from a measurement rather than a memory — Generations on the dam&#039;s side is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Inbreeding coefficient</strong> is a plain number and the page's own defaults put it at 3.13. The value follows from Generations on the sire's side, Generations on the dam's side and Independent ancestral paths. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Heterozygosity retained</strong> is a plain number and the page's own defaults put it at 96.88. The value follows from Generations on the sire's side, Generations on the dam's side and Independent ancestral paths. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Relationship coefficient</strong> is a plain number and the page's own defaults put it at 6.25. The value follows from Generations on the sire's side, Generations on the dam's side and Independent ancestral paths. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Inbreeding coefficient</th><th>Heterozygosity retained</th><th>Relationship coefficient</th></tr></thead><tbody><tr><td><strong>Independent ancestral paths</strong> +10%</td><td>+10%</td><td>-0.32%</td><td>+10%</td></tr><tr><td><strong>Generations on the sire&#039;s side</strong> +10%</td><td>-12.94%</td><td>+0.42%</td><td>-12.94%</td></tr><tr><td><strong>Generations on the dam&#039;s side</strong> +10%</td><td>-12.94%</td><td>+0.42%</td><td>-12.94%</td></tr></tbody></table><p>The steepest column belongs to Generations on the sire&#039;s side: ten per cent there moves an answer by about 12.9 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Independent ancestral paths = 0.5, Generations on the sire&#039;s side = 1 and Generations on the dam&#039;s side = 1 and the page reports <strong>Inbreeding coefficient</strong> = 6.25 %, <strong>Heterozygosity retained</strong> = 93.75 % and <strong>Relationship coefficient</strong> = 12.5 %.</li><li>Feed in Independent ancestral paths = 3, Generations on the sire&#039;s side = 2 and Generations on the dam&#039;s side = 2 and the page reports <strong>Inbreeding coefficient</strong> = 9.38 %, <strong>Heterozygosity retained</strong> = 90.63 % and <strong>Relationship coefficient</strong> = 18.75 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Inbreeding coefficient is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Independent ancestral paths, Generations on the sire&#039;s side and Generations on the dam&#039;s side and the number you are missing is Inbreeding coefficient and Heterozygosity retained.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/cat-chocolate-toxicity">Cat chocolate toxicity Calculator</a>, <a href="/biology/cat-pregnancy">Cat pregnancy Calculator</a> and <a href="/biology/cat-quality-of-life">Cat quality of life Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Inbreeding Coefficient Calculator (COI) calculator work out?', 'a' => <<<'TXT'
            Inbreeding coefficient, Heterozygosity retained and Relationship coefficient, from Generations on the sire's side, Generations on the dam's side and Independent ancestral paths. The relationship is Inbreeding coefficient = (0.5)^(Generations on the sire's side + Generations on the dam's side + 1) × Independent ancestral paths × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Independent ancestral paths, Generations on the sire's side, Generations on the dam's side. Enter paths, n1 and n2; Inbreeding coefficient is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Inbreeding coefficient, Heterozygosity retained and Relationship coefficient can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Inbreeding coefficient = 3.13 %, Heterozygosity retained = 96.88 % and Relationship coefficient = 6.25 %. That comes from the page's own defaults, entered in Independent ancestral paths; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Inbreeding coefficient is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Independent ancestral paths blank and the page solves for it, reporting Inbreeding coefficient instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Inbreeding coefficient keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cat-chocolate-toxicity', 'name' => 'Cat chocolate toxicity Calculator'],
            ['path' => '/biology/cat-pregnancy', 'name' => 'Cat pregnancy Calculator'],
            ['path' => '/biology/cat-quality-of-life', 'name' => 'Cat quality of life Calculator'],
        ],
        'authors' => [],
    ],
];
