<?php

/**
 * Relative Abundance Calculator
 * /biology/relative-abundance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Relative Abundance Calculator',
    'meta' => ['title' => 'Relative Abundance Calculator: Steps & Units', 'description' => 'Relative Abundance Calculator reports species 1 relative abundance and species 2 relative abundance. Free to use, with the working shown beside the answer.', 'h1' => 'Relative Abundance Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Species 1',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Species 2',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'n3',
                            'label' => 'Species 3',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'n4',
                            'label' => 'Species 4',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'n5',
                            'label' => 'Species 5',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'p1',
                            'label' => 'Species 1 relative abundance',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'p2',
                            'label' => 'Species 2 relative abundance',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Community size',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'top3',
                            'label' => 'Top three species combined',
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
            'title' => 'Abundance',
            'results' => ['n' => 'n1+n2+n3+n4+n5', 'p1' => 'n1/(n1+n2+n3+n4+n5)*100', 'p2' => 'n2/(n1+n2+n3+n4+n5)*100', 'top3' => '(n1+n2+n3)/(n1+n2+n3+n4+n5)*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Relative Abundance turns Species 1, Species 2 and Species 3 into Species 1 relative abundance and Species 2 relative abundance. Nothing is looked up on this page: species 1 relative abundance is computed from species 1 and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Species 1 relative abundance is opened in %; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Relative Abundance calculator works', 'html' => <<<'TXT'
            <p>Relative Abundance answers one question from 5 numbers, and the answer is Species 1 relative abundance, Species 2 relative abundance and Community size.</p><p>Written with the labels from the form, Community size = Species 1 + Species 2 + Species 3 + Species 4 + Species 5.</p><p>What comes back is Species 1 relative abundance, Species 2 relative abundance, Community size and Top three species combined — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Species 1</strong> — in individuals</li><li><strong>Species 2</strong> — in individuals</li><li><strong>Species 3</strong> — in individuals</li><li><strong>Species 4</strong> — in individuals</li><li><strong>Species 5</strong> — in individuals</li></ul><p>The result boxes are Species 1 relative abundance in %, Species 2 relative abundance in %, Community size in individuals, Top three species combined in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Species 1 = 40 individuals, Species 2 = 25 individuals, Species 3 = 15 individuals, Species 4 = 10 individuals and Species 5 = 6 individuals; the answers are <strong>Community size</strong> = 96 individuals, <strong>Species 1 relative abundance</strong> = 41.67 %, <strong>Species 2 relative abundance</strong> = 26.04 % and <strong>Top three species combined</strong> = 83.33 %.</p><ul><li><strong>Community size</strong> = 96 individuals</li><li><strong>Species 1 relative abundance</strong> = 41.67 %</li><li><strong>Species 2 relative abundance</strong> = 26.04 %</li><li><strong>Top three species combined</strong> = 83.33 %</li></ul><p>The line behind those figures is <strong>Community size</strong> = <code>Species 1 + Species 2 + Species 3 + Species 4 + Species 5</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Community size</strong> = 96, <strong>Species 1 relative abundance</strong> = 41.67, <strong>Species 2 relative abundance</strong> = 26.04 and <strong>Top three species combined</strong> = 83.33 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Species 1 relative abundance takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Community size</strong> = <code>Species 1 + Species 2 + Species 3 + Species 4 + Species 5</code></li><li><strong>Species 1 relative abundance</strong> = <code>Species 1 ÷ (Species 1 + Species 2 + Species 3 + Species 4 + Species 5) × 100</code></li><li><strong>Species 2 relative abundance</strong> = <code>Species 2 ÷ (Species 1 + Species 2 + Species 3 + Species 4 + Species 5) × 100</code></li><li><strong>Top three species combined</strong> = <code>(Species 1 + Species 2 + Species 3) ÷ (Species 1 + Species 2 + Species 3 + Species 4 + Species 5) × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Community size</strong> = <code>Species 1 + Species 2 + Species 3 + Species 4 + Species 5</code> — the form to use when Species 1, Species 2, Species 3 and Species 4 are the values you have.</li><li><strong>Species 1 relative abundance</strong> = <code>Species 1 ÷ (Species 1 + Species 2 + Species 3 + Species 4 + Species 5) × 100</code> — the form to use when Species 1, Species 2, Species 3 and Species 4 are the values you have.</li><li><strong>Species 2 relative abundance</strong> = <code>Species 2 ÷ (Species 1 + Species 2 + Species 3 + Species 4 + Species 5) × 100</code> — the form to use when Species 2, Species 1, Species 3 and Species 4 are the values you have.</li><li><strong>Top three species combined</strong> = <code>(Species 1 + Species 2 + Species 3) ÷ (Species 1 + Species 2 + Species 3 + Species 4 + Species 5) × 100</code> — the form to use when Species 1, Species 2, Species 3 and Species 4 are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Community size, Species 1 relative abundance and Species 2 relative abundance can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Species 1, from 40 to 80 — and the answers go from <strong>Community size</strong> 96 individuals, <strong>Species 1 relative abundance</strong> 41.67 %, <strong>Species 2 relative abundance</strong> 26.04 % and <strong>Top three species combined</strong> 83.33 % to <strong>Community size</strong> 136 individuals, <strong>Species 1 relative abundance</strong> 58.82 %, <strong>Species 2 relative abundance</strong> 18.38 % and <strong>Top three species combined</strong> 88.24 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Species 1 relative abundance, Species 2 relative abundance and Community size are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Species 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Species 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Species 2 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Species 2 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Species 3 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Species 3 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Species 1 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Relative Abundance form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Species 1</strong> is measured in individuals. The page reads it when it works out Community size, Species 1 relative abundance and Species 2 relative abundance. Fill it from a measurement rather than a memory — Species 1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Species 2</strong> is measured in individuals. The page reads it when it works out Community size, Species 1 relative abundance and Species 2 relative abundance. Fill it from a measurement rather than a memory — Species 2 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Species 3</strong> is measured in individuals. The page reads it when it works out Community size, Species 1 relative abundance and Species 2 relative abundance. Fill it from a measurement rather than a memory — Species 3 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Species 4</strong> is measured in individuals. The page reads it when it works out Community size, Species 1 relative abundance and Species 2 relative abundance. Fill it from a measurement rather than a memory — Species 4 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Species 5</strong> is measured in individuals. The page reads it when it works out Community size, Species 1 relative abundance and Species 2 relative abundance. Fill it from a measurement rather than a memory — Species 5 is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Species 1 relative abundance</strong> is a plain number and the page's own defaults put it at 41.67. It is worked out from Species 1, Species 2, Species 3 and Species 4. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Species 2 relative abundance</strong> is a plain number and the page's own defaults put it at 26.04. It is worked out from Species 2, Species 1, Species 3 and Species 4. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Community size</strong> is a plain number and the page's own defaults put it at 96. It is worked out from Species 1, Species 2, Species 3 and Species 4. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Top three species combined</strong> is a plain number and the page's own defaults put it at 83.33. It is worked out from Species 1, Species 2, Species 3 and Species 4. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Community size</th><th>Species 1 relative abundance</th><th>Species 2 relative abundance</th><th>Top three species combined</th></tr></thead><tbody><tr><td><strong>Species 1</strong> +10%</td><td>+4.17%</td><td>+5.6%</td><td>-4%</td><td>+0.8%</td></tr><tr><td><strong>Species 2</strong> +10%</td><td>+2.6%</td><td>-2.54%</td><td>+7.21%</td><td>+0.51%</td></tr><tr><td><strong>Species 3</strong> +10%</td><td>+1.56%</td><td>-1.54%</td><td>-1.54%</td><td>+0.31%</td></tr><tr><td><strong>Species 4</strong> +10%</td><td>+1.04%</td><td>-1.03%</td><td>-1.03%</td><td>-1.03%</td></tr><tr><td><strong>Species 5</strong> +10%</td><td>+0.62%</td><td>-0.62%</td><td>-0.62%</td><td>-0.62%</td></tr></tbody></table><p>Ranked by leverage, Species 2 sits at the top — a ten per cent error in that box shows up as roughly 7.2 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Species 1 = 20 individuals, Species 2 = 12.5 individuals, Species 3 = 7.5 individuals, Species 4 = 5 individuals and Species 5 = 3 individuals and the page reports <strong>Community size</strong> = 48 individuals, <strong>Species 1 relative abundance</strong> = 41.67 %, <strong>Species 2 relative abundance</strong> = 26.04 % and <strong>Top three species combined</strong> = 83.33 %.</li><li>Feed in Species 1 = 120 individuals, Species 2 = 25 individuals, Species 3 = 15 individuals, Species 4 = 10 individuals and Species 5 = 6 individuals and the page reports <strong>Community size</strong> = 176 individuals, <strong>Species 1 relative abundance</strong> = 68.18 %, <strong>Species 2 relative abundance</strong> = 14.2 % and <strong>Top three species combined</strong> = 90.91 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Species 1 relative abundance follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Species 1, Species 2 and Species 3 is what you already know and Species 1 relative abundance and Species 2 relative abundance is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/net-primary-productivity">Net Primary Productivity Calculator</a>, <a href="/biology/net-reproductive-rate">Net Reproductive Rate (R₀) Calculator</a> and <a href="/biology/npk-fertilizer-blend">NPK Fertilizer Blend Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Relative Abundance calculator work out?', 'a' => <<<'TXT'
            Species 1 relative abundance, Species 2 relative abundance, Community size and Top three species combined, from Species 1, Species 2, Species 3 and Species 4. The relationship is Community size = Species 1 + Species 2 + Species 3 + Species 4 + Species 5.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Species 1 (individuals), Species 2 (individuals), Species 3 (individuals), Species 4 (individuals), Species 5 (individuals). Fill species 1, species 2 and species 3 and leave Species 1 relative abundance empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Community size, Species 1 relative abundance, Species 2 relative abundance and Top three species combined can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Community size = 96 individuals, Species 1 relative abundance = 41.67 %, Species 2 relative abundance = 26.04 % and Top three species combined = 83.33 %. That comes from the page's own defaults, entered in Species 1; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Species 1 relative abundance is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Species 1 blank and the page solves for it, reporting Species 1 relative abundance instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Species 1 relative abundance keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/net-primary-productivity', 'name' => 'Net Primary Productivity Calculator'],
            ['path' => '/biology/net-reproductive-rate', 'name' => 'Net Reproductive Rate (R₀) Calculator'],
            ['path' => '/biology/npk-fertilizer-blend', 'name' => 'NPK Fertilizer Blend Calculator'],
        ],
        'authors' => [],
    ],
];
