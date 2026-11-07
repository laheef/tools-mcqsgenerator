<?php

/**
 * Sørensen Similarity Index Calculator
 * /biology/sorensen-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sørensen Similarity Index Calculator',
    'meta' => ['title' => 'Sørensen Similarity Index Calculator — Biology', 'description' => 'Sørensen Similarity Index Calculator works out jaccard similarity and sørensen dissimilarity and reports both. The formula is printed in the form\'s own words.', 'h1' => 'Sørensen Similarity Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a',
                            'label' => 'Species only at site A',
                            'type' => 'number',
                            'suffix' => 'species',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'b',
                            'label' => 'Species only at site B',
                            'type' => 'number',
                            'suffix' => 'species',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'c',
                            'label' => 'Species at both sites',
                            'type' => 'number',
                            'suffix' => 'species',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'sorensen',
                            'label' => 'Sørensen similarity',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'jaccard',
                            'label' => 'Jaccard similarity',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dissimilarity',
                            'label' => 'Sørensen dissimilarity',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'beta',
                            'label' => 'Beta diversity (Sørensen)',
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
            'title' => 'Similarity',
            'results' => ['sorensen' => '2*c/(2*c+a+b)', 'jaccard' => 'c/(a+b+c)', 'dissimilarity' => '(1-2*c/(2*c+a+b))*100', 'beta' => '(a+b)/(2*c+a+b)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sørensen Similarity Index turns Species only at site A, Species only at site B and Species at both sites into Sørensen similarity and Jaccard similarity. It is a single relationship that reads sørensen similarity out of species only at site A, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Sørensen Similarity Index calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Sørensen Similarity Index: it takes 3 numbers and reports Sørensen similarity, Jaccard similarity and Sørensen dissimilarity.</p><p>In the form&#039;s own words, Sørensen similarity = 2 × Species at both sites ÷ (2 × Species at both sites + Species only at site A + Species only at site B).</p><p>What comes back is Sørensen similarity, Jaccard similarity, Sørensen dissimilarity and Beta diversity (Sørensen) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Species only at site A</strong> — in species</li><li><strong>Species only at site B</strong> — in species</li><li><strong>Species at both sites</strong> — in species</li></ul><p>The answers come back as Sørensen similarity, Jaccard similarity, Sørensen dissimilarity in %, Beta diversity (Sørensen). Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Species only at site A = 12 species, Species only at site B = 8 species and Species at both sites = 20 species; the answers are <strong>Sørensen similarity</strong> = 0.6667, <strong>Jaccard similarity</strong> = 0.5, <strong>Sørensen dissimilarity</strong> = 33.33 % and <strong>Beta diversity (Sørensen)</strong> = 0.3333.</p><ul><li><strong>Sørensen similarity</strong> = 0.6667</li><li><strong>Jaccard similarity</strong> = 0.5</li><li><strong>Sørensen dissimilarity</strong> = 33.33 %</li><li><strong>Beta diversity (Sørensen)</strong> = 0.3333</li></ul><p>That is <strong>Sørensen similarity</strong> = <code>2 × Species at both sites ÷ (2 × Species at both sites + Species only at site A + Species only at site B)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Sørensen similarity</strong> = 0.6667, <strong>Jaccard similarity</strong> = 0.5, <strong>Sørensen dissimilarity</strong> = 33.33 and <strong>Beta diversity (Sørensen)</strong> = 0.3333 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Sørensen similarity takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Sørensen similarity</strong> = <code>2 × Species at both sites ÷ (2 × Species at both sites + Species only at site A + Species only at site B)</code></li><li><strong>Jaccard similarity</strong> = <code>Species at both sites ÷ (Species only at site A + Species only at site B + Species at both sites)</code></li><li><strong>Sørensen dissimilarity</strong> = <code>(1 − 2 × Species at both sites ÷ (2 × Species at both sites + Species only at site A + Species only at site B)) × 100</code></li><li><strong>Beta diversity (Sørensen)</strong> = <code>(Species only at site A + Species only at site B) ÷ (2 × Species at both sites + Species only at site A + Species only at site B)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Sørensen similarity</strong> = <code>2 × Species at both sites ÷ (2 × Species at both sites + Species only at site A + Species only at site B)</code> — the form to use when Species at both sites, Species only at site A and Species only at site B are the values you have.</li><li><strong>Jaccard similarity</strong> = <code>Species at both sites ÷ (Species only at site A + Species only at site B + Species at both sites)</code> — the form to use when Species at both sites, Species only at site A and Species only at site B are the values you have.</li><li><strong>Sørensen dissimilarity</strong> = <code>(1 − 2 × Species at both sites ÷ (2 × Species at both sites + Species only at site A + Species only at site B)) × 100</code> — the form to use when Species at both sites, Species only at site A and Species only at site B are the values you have.</li><li><strong>Beta diversity (Sørensen)</strong> = <code>(Species only at site A + Species only at site B) ÷ (2 × Species at both sites + Species only at site A + Species only at site B)</code> — the form to use when Species only at site A, Species only at site B and Species at both sites are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Sørensen similarity, Jaccard similarity and Sørensen dissimilarity can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Species only at site A from 12 to 24, leaving every other box alone. The panel moves from <strong>Sørensen similarity</strong> 0.6667, <strong>Jaccard similarity</strong> 0.5, <strong>Sørensen dissimilarity</strong> 33.33 % and <strong>Beta diversity (Sørensen)</strong> 0.3333 to <strong>Sørensen similarity</strong> 0.5556, <strong>Jaccard similarity</strong> 0.3846, <strong>Sørensen dissimilarity</strong> 44.44 % and <strong>Beta diversity (Sørensen)</strong> 0.4444.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Sørensen similarity, Jaccard similarity and Sørensen dissimilarity are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Species only at site A left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Species only at site A is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Species only at site B left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Species only at site B is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Species at both sites left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Species at both sites is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Species only at site A is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Sørensen Similarity Index form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Species only at site A</strong> is measured in species. It feeds Sørensen similarity, Jaccard similarity and Sørensen dissimilarity. Fill it from a measurement rather than a memory — Species only at site A is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Species only at site B</strong> is measured in species. It feeds Sørensen similarity, Jaccard similarity and Sørensen dissimilarity. Fill it from a measurement rather than a memory — Species only at site B is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Species at both sites</strong> is measured in species. It feeds Sørensen similarity, Jaccard similarity and Sørensen dissimilarity. Fill it from a measurement rather than a memory — Species at both sites is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Sørensen similarity</strong> is a plain number and the page's own defaults put it at 0.6667. It is worked out from Species at both sites, Species only at site A and Species only at site B. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Jaccard similarity</strong> is a plain number and the page's own defaults put it at 0.5. It is worked out from Species at both sites, Species only at site A and Species only at site B. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Sørensen dissimilarity</strong> is a plain number and the page's own defaults put it at 33.33. It is worked out from Species at both sites, Species only at site A and Species only at site B. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Beta diversity (Sørensen)</strong> is a plain number and the page's own defaults put it at 0.3333. It is worked out from Species only at site A, Species only at site B and Species at both sites. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Sørensen similarity</th><th>Jaccard similarity</th><th>Sørensen dissimilarity</th><th>Beta diversity (Sørensen)</th></tr></thead><tbody><tr><td><strong>Species only at site A</strong> +10%</td><td>-1.96%</td><td>-2.91%</td><td>+3.92%</td><td>+3.92%</td></tr><tr><td><strong>Species only at site B</strong> +10%</td><td>-1.32%</td><td>-1.96%</td><td>+2.63%</td><td>+2.63%</td></tr><tr><td><strong>Species at both sites</strong> +10%</td><td>+3.13%</td><td>+4.76%</td><td>-6.25%</td><td>-6.25%</td></tr></tbody></table><p>Ranked by leverage, Species at both sites sits at the top — a ten per cent error in that box shows up as roughly 6.3 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Species only at site A = 6 species, Species only at site B = 4 species and Species at both sites = 10 species and the page reports <strong>Sørensen similarity</strong> = 0.6667, <strong>Jaccard similarity</strong> = 0.5, <strong>Sørensen dissimilarity</strong> = 33.33 % and <strong>Beta diversity (Sørensen)</strong> = 0.3333.</li><li>Feed in Species only at site A = 36 species, Species only at site B = 8 species and Species at both sites = 20 species and the page reports <strong>Sørensen similarity</strong> = 0.4762, <strong>Jaccard similarity</strong> = 0.3125, <strong>Sørensen dissimilarity</strong> = 52.38 % and <strong>Beta diversity (Sørensen)</strong> = 0.5238.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Sørensen similarity follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Species only at site A, Species only at site B and Species at both sites are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Species only at site A, Species only at site B and Species at both sites and the number you are missing is Sørensen similarity and Jaccard similarity.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/stomatal-density">Stomatal Density Calculator</a>, <a href="/biology/sulfur-soil-acidifier">Sulfur Soil Acidifier Calculator</a> and <a href="/biology/swine-gestation">Swine gestation Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sørensen Similarity Index calculator work out?', 'a' => <<<'TXT'
            Sørensen similarity, Jaccard similarity, Sørensen dissimilarity and Beta diversity (Sørensen), from Species at both sites, Species only at site A and Species only at site B. The relationship is Sørensen similarity = 2 × Species at both sites ÷ (2 × Species at both sites + Species only at site A + Species only at site B).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Species only at site A (species), Species only at site B (species), Species at both sites (species). Fill species only at site A, species only at site B and species at both sites and leave Sørensen similarity empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Sørensen similarity, Jaccard similarity, Sørensen dissimilarity and Beta diversity (Sørensen) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Sørensen similarity = 0.6667, Jaccard similarity = 0.5, Sørensen dissimilarity = 33.33 % and Beta diversity (Sørensen) = 0.3333. Those are the defaults written into the form — move Species only at site A and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Sørensen similarity is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Species only at site A blank and the page solves for it, reporting Sørensen similarity instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Sørensen similarity keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/stomatal-density', 'name' => 'Stomatal Density Calculator'],
            ['path' => '/biology/sulfur-soil-acidifier', 'name' => 'Sulfur Soil Acidifier Calculator'],
            ['path' => '/biology/swine-gestation', 'name' => 'Swine gestation Calculator'],
        ],
        'authors' => [],
    ],
];
