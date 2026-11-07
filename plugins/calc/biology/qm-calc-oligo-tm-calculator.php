<?php

/**
 * Oligo Tm (Melting Temperature) Calculator
 * /biology/oligo-tm-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Oligo Tm (Melting Temperature) Calculator',
    'meta' => ['title' => 'Oligo Tm Calculator: Formula, Steps & Example', 'description' => 'Oligo Tm (Melting Temperature) Calculator turns oligo length, Number of G and C bases and monovalent salt into tm, GC rule with salt correction and Tm, Wallace.', 'h1' => 'Oligo Tm (Melting Temperature) Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Oligo length',
                            'type' => 'number',
                            'suffix' => 'nt',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'gc',
                            'label' => 'Number of G and C bases',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '11',
                        ],
                        [
                            'name' => 'salt',
                            'label' => 'Monovalent salt',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'tm_salt',
                            'label' => 'Tm, GC rule with salt correction',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm_wallace',
                            'label' => 'Tm, Wallace',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm_gc',
                            'label' => 'Tm, GC rule',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gc_pct',
                            'label' => 'GC content',
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
            'title' => 'Melting',
            'results' => ['gc_pct' => 'gc/length*100', 'tm_wallace' => '2*(length-gc)+4*gc', 'tm_gc' => '64.9+41*(gc-16.4)/length', 'tm_salt' => '64.9+41*(gc-16.4)/length+16.6*log10(salt/1000)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Oligo Tm (Melting Temperature) turns Oligo length, Number of G and C bases and Monovalent salt into Tm, GC rule with salt correction and Tm, Wallace. The arithmetic is the whole method: tm, GC rule with salt correction is worked out from oligo length by one formula, applied once. Tm, GC rule with salt correction comes back in °C unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Oligo Tm (Melting Temperature) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Oligo Tm (Melting Temperature): it takes 3 numbers and reports Tm, GC rule with salt correction, Tm, Wallace and Tm, GC rule.</p><p>Written with the labels from the form, GC content = Number of G and C bases ÷ Oligo length × 100.</p><p>The answers are Tm, GC rule with salt correction, Tm, Wallace, Tm, GC rule and GC content; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Oligo length</strong> — in nt</li><li><strong>Number of G and C bases</strong> — a plain number, no unit</li><li><strong>Monovalent salt</strong> — in mM</li></ul><p>What you get back is Tm, GC rule with salt correction in °C, Tm, Wallace in °C, Tm, GC rule in °C, GC content in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Oligo length = 20 nt, Number of G and C bases = 11 and Monovalent salt = 50 mM — through the same formula and the panel reports <strong>GC content</strong> = 55 %, <strong>Tm, Wallace</strong> = 62 °C, <strong>Tm, GC rule</strong> = 53.83 °C and <strong>Tm, GC rule with salt correction</strong> = 32.23 °C.</p><ul><li><strong>GC content</strong> = 55 %</li><li><strong>Tm, Wallace</strong> = 62 °C</li><li><strong>Tm, GC rule</strong> = 53.83 °C</li><li><strong>Tm, GC rule with salt correction</strong> = 32.23 °C</li></ul><p>That is <strong>GC content</strong> = <code>Number of G and C bases ÷ Oligo length × 100</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>GC content</strong> = 55, <strong>Tm, Wallace</strong> = 62, <strong>Tm, GC rule</strong> = 53.83 and <strong>Tm, GC rule with salt correction</strong> = 32.23 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Tm, GC rule with salt correction takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>GC content</strong> = <code>Number of G and C bases ÷ Oligo length × 100</code></li><li><strong>Tm, Wallace</strong> = <code>2 × (Oligo length − Number of G and C bases) + 4 × Number of G and C bases</code></li><li><strong>Tm, GC rule</strong> = <code>64.9 + 41 × (Number of G and C bases − 16.4) ÷ Oligo length</code></li><li><strong>Tm, GC rule with salt correction</strong> = <code>64.9 + 41 × (Number of G and C bases − 16.4) ÷ Oligo length + 16.6 × log₁₀(Monovalent salt ÷ 1000)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>GC content</strong> = <code>Number of G and C bases ÷ Oligo length × 100</code> — the form to use when Number of G and C bases and Oligo length are the values you have.</li><li><strong>Tm, Wallace</strong> = <code>2 × (Oligo length − Number of G and C bases) + 4 × Number of G and C bases</code> — the form to use when Oligo length and Number of G and C bases are the values you have.</li><li><strong>Tm, GC rule</strong> = <code>64.9 + 41 × (Number of G and C bases − 16.4) ÷ Oligo length</code> — the form to use when Number of G and C bases and Oligo length are the values you have.</li><li><strong>Tm, GC rule with salt correction</strong> = <code>64.9 + 41 × (Number of G and C bases − 16.4) ÷ Oligo length + 16.6 × log₁₀(Monovalent salt ÷ 1000)</code> — the form to use when Number of G and C bases, Oligo length and Monovalent salt are the values you have.</li></ul><p>Any one of GC content, Tm, Wallace and Tm, GC rule can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Oligo length, from 20 to 40 — and the answers go from <strong>GC content</strong> 55 %, <strong>Tm, Wallace</strong> 62 °C, <strong>Tm, GC rule</strong> 53.83 °C and <strong>Tm, GC rule with salt correction</strong> 32.23 °C to <strong>GC content</strong> 27.5 %, <strong>Tm, Wallace</strong> 102 °C, <strong>Tm, GC rule</strong> 59.37 °C and <strong>Tm, GC rule with salt correction</strong> 37.77 °C.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Tm, GC rule with salt correction, Tm, Wallace and Tm, GC rule are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Oligo length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Oligo length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of G and C bases left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of G and C bases is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Monovalent salt left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Monovalent salt is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Oligo length is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Oligo Tm (Melting Temperature) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Oligo length</strong> is measured in nt. Change it and GC content, Tm, Wallace and Tm, GC rule changes with it. Fill it from a measurement rather than a memory — Oligo length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of G and C bases</strong> takes a plain number with no unit attached. Change it and GC content, Tm, Wallace and Tm, GC rule changes with it. Fill it from a measurement rather than a memory — Number of G and C bases is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Monovalent salt</strong> is measured in mM. Change it and Tm, GC rule with salt correction changes with it. Fill it from a measurement rather than a memory — Monovalent salt is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Tm, GC rule with salt correction</strong> is a plain number and the page's own defaults put it at 32.23. It is worked out from Number of G and C bases, Oligo length and Monovalent salt. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Tm, Wallace</strong> is a plain number and the page's own defaults put it at 62. It is worked out from Oligo length and Number of G and C bases. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Tm, GC rule</strong> is a plain number and the page's own defaults put it at 53.83. It is worked out from Number of G and C bases and Oligo length. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>GC content</strong> is a plain number and the page's own defaults put it at 55. It is worked out from Number of G and C bases and Oligo length. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>GC content</th><th>Tm, Wallace</th><th>Tm, GC rule</th><th>Tm, GC rule with salt correction</th></tr></thead><tbody><tr><td><strong>Oligo length</strong> +10%</td><td>-9.09%</td><td>+6.45%</td><td>+1.87%</td><td>+3.12%</td></tr><tr><td><strong>Number of G and C bases</strong> +10%</td><td>+10%</td><td>+3.55%</td><td>+4.19%</td><td>+7%</td></tr><tr><td><strong>Monovalent salt</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+2.13%</td></tr></tbody></table><p>Ranked by leverage, Number of G and C bases sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Oligo length = 10 nt, Number of G and C bases = 5.5 and Monovalent salt = 25 mM and the page reports <strong>GC content</strong> = 55 %, <strong>Tm, Wallace</strong> = 31 °C, <strong>Tm, GC rule</strong> = 20.21 °C and <strong>Tm, GC rule with salt correction</strong> = -6.38 °C.</li><li>Feed in Oligo length = 60 nt, Number of G and C bases = 11 and Monovalent salt = 50 mM and the page reports <strong>GC content</strong> = 18.33 %, <strong>Tm, Wallace</strong> = 142 °C, <strong>Tm, GC rule</strong> = 61.21 °C and <strong>Tm, GC rule with salt correction</strong> = 39.61 °C.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Tm, GC rule with salt correction follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Oligo length, Number of G and C bases and Monovalent salt are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Oligo length, Number of G and C bases and Monovalent salt is what you already know and Tm, GC rule with salt correction and Tm, Wallace is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/fruit-tree-spacing">Fruit Tree Spacing Calculator</a>, <a href="/biology/fuzzy-protein-search">Fuzzy Protein Search Calculator</a> and <a href="/biology/fwhr-facial-width-to-height-ratio">FWHR (Facial Width-to-Height Ratio) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Oligo Tm (Melting Temperature) calculator work out?', 'a' => <<<'TXT'
            Tm, GC rule with salt correction, Tm, Wallace, Tm, GC rule and GC content, from Number of G and C bases and Oligo length. The relationship is GC content = Number of G and C bases ÷ Oligo length × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Oligo length (nt), Number of G and C bases, Monovalent salt (mM). Enter oligo length, number of G and C bases and monovalent salt; Tm, GC rule with salt correction is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of GC content, Tm, Wallace, Tm, GC rule and Tm, GC rule with salt correction blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            GC content = 55 %, Tm, Wallace = 62 °C, Tm, GC rule = 53.83 °C and Tm, GC rule with salt correction = 32.23 °C. That comes from the page's own defaults, entered in Oligo length; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Tm, GC rule with salt correction is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Oligo length blank and the page solves for it, reporting Tm, GC rule with salt correction instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Tm, GC rule with salt correction keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/fruit-tree-spacing', 'name' => 'Fruit Tree Spacing Calculator'],
            ['path' => '/biology/fuzzy-protein-search', 'name' => 'Fuzzy Protein Search Calculator'],
            ['path' => '/biology/fwhr-facial-width-to-height-ratio', 'name' => 'FWHR (Facial Width-to-Height Ratio) Calculator'],
        ],
        'authors' => [],
    ],
];
