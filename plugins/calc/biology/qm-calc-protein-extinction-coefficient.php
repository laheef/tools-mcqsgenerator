<?php

/**
 * Protein Extinction Coefficient (ε280) Calculator
 * /biology/protein-extinction-coefficient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Protein Extinction Coefficient (ε280) Calculator',
    'meta' => ['title' => 'Protein Extinction Coefficient: Steps & Units', 'description' => 'Protein Extinction Coefficient (ε280) Calculator turns tryptophan residues, tyrosine residues and cystine (disulfide) bonds into A280 of a 1 mg/mL solution.', 'h1' => 'Protein Extinction Coefficient (ε280) Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'trp',
                            'label' => 'Tryptophan residues',
                            'type' => 'number',
                            'help' => 'W',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'tyr',
                            'label' => 'Tyrosine residues',
                            'type' => 'number',
                            'help' => 'Y',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'cystine',
                            'label' => 'Cystine (disulfide) bonds',
                            'type' => 'number',
                            'help' => 'S–S pairs, not free cysteines',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'mw',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'Da',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '55000',
                        ],
                        [
                            'name' => 'ext',
                            'label' => 'Extinction coefficient',
                            'type' => 'number',
                            'suffix' => 'M⁻¹cm⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'a1mg',
                            'label' => 'A280 of a 1 mg/mL solution',
                            'type' => 'number',
                            'suffix' => 'AU',
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
            'title' => 'Extinction',
            'results' => ['ext' => 'trp*5500+tyr*1490+cystine*125', 'a1mg' => '(trp*5500+tyr*1490+cystine*125)/mw'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Protein Extinction Coefficient (ε280) turns Tryptophan residues, Tyrosine residues and Cystine (disulfide) bonds into Extinction coefficient and A280 of a 1 mg/mL solution. Nothing is looked up on this page: extinction coefficient is computed from tryptophan residues and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Extinction coefficient is opened in M⁻¹cm⁻¹; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Protein Extinction Coefficient (ε280) calculator works', 'html' => <<<'TXT'
            <p>Protein Extinction Coefficient (ε280) answers one question from 4 numbers, and the answer is Extinction coefficient and A280 of a 1 mg/mL solution.</p><p>The relationship it solves reads Extinction coefficient = Tryptophan residues × 5500 + Tyrosine residues × 1490 + Cystine (disulfide) bonds × 125.</p><p>The answers are Extinction coefficient and A280 of a 1 mg/mL solution; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Tryptophan residues</strong> — a plain number, no unit. W</li><li><strong>Tyrosine residues</strong> — a plain number, no unit. Y</li><li><strong>Cystine (disulfide) bonds</strong> — a plain number, no unit. S–S pairs, not free cysteines</li><li><strong>Molecular weight</strong> — in Da</li></ul><p>What you get back is Extinction coefficient in M⁻¹cm⁻¹, A280 of a 1 mg/mL solution in AU, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Tryptophan residues = 8, Tyrosine residues = 12, Cystine (disulfide) bonds = 4 and Molecular weight = 55000 Da gives <strong>Extinction coefficient</strong> = 62380 M⁻¹cm⁻¹ and <strong>A280 of a 1 mg/mL solution</strong> = 1.13 AU.</p><ul><li><strong>Extinction coefficient</strong> = 62380 M⁻¹cm⁻¹</li><li><strong>A280 of a 1 mg/mL solution</strong> = 1.13 AU</li></ul><p>That is <strong>Extinction coefficient</strong> = <code>Tryptophan residues × 5500 + Tyrosine residues × 1490 + Cystine (disulfide) bonds × 125</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Extinction coefficient</strong> = 62380 and <strong>A280 of a 1 mg/mL solution</strong> = 1.13 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Extinction coefficient takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Extinction coefficient</strong> = <code>Tryptophan residues × 5500 + Tyrosine residues × 1490 + Cystine (disulfide) bonds × 125</code></li><li><strong>A280 of a 1 mg/mL solution</strong> = <code>(Tryptophan residues × 5500 + Tyrosine residues × 1490 + Cystine (disulfide) bonds × 125) ÷ Molecular weight</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Extinction coefficient</strong> = <code>Tryptophan residues × 5500 + Tyrosine residues × 1490 + Cystine (disulfide) bonds × 125</code> — the form to use when Tryptophan residues, Tyrosine residues and Cystine (disulfide) bonds are the values you have.</li><li><strong>A280 of a 1 mg/mL solution</strong> = <code>(Tryptophan residues × 5500 + Tyrosine residues × 1490 + Cystine (disulfide) bonds × 125) ÷ Molecular weight</code> — the form to use when Tryptophan residues, Tyrosine residues, Cystine (disulfide) bonds and Molecular weight are the values you have.</li></ul><p>Any one of Extinction coefficient and A280 of a 1 mg/mL solution can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Tryptophan residues, from 8 to 16 — and the answers go from <strong>Extinction coefficient</strong> 62380 M⁻¹cm⁻¹ and <strong>A280 of a 1 mg/mL solution</strong> 1.13 AU to <strong>Extinction coefficient</strong> 106380 M⁻¹cm⁻¹ and <strong>A280 of a 1 mg/mL solution</strong> 1.93 AU.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Tryptophan residues left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Tryptophan residues is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Tyrosine residues left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Tyrosine residues is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Cystine (disulfide) bonds left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cystine (disulfide) bonds is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Tryptophan residues is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Protein Extinction Coefficient (ε280) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Tryptophan residues</strong> takes a plain number with no unit attached. Change it and Extinction coefficient and A280 of a 1 mg/mL solution changes with it. Fill it from a measurement rather than a memory — Tryptophan residues is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Tyrosine residues</strong> takes a plain number with no unit attached. Change it and Extinction coefficient and A280 of a 1 mg/mL solution changes with it. Fill it from a measurement rather than a memory — Tyrosine residues is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cystine (disulfide) bonds</strong> takes a plain number with no unit attached. S–S pairs, not free cysteines. Change it and Extinction coefficient and A280 of a 1 mg/mL solution changes with it. Fill it from a measurement rather than a memory — Cystine (disulfide) bonds is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Molecular weight</strong> is measured in Da. Change it and A280 of a 1 mg/mL solution changes with it. Fill it from a measurement rather than a memory — Molecular weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Extinction coefficient</strong> is a plain number and the page's own defaults put it at 62380. It is worked out from Tryptophan residues, Tyrosine residues and Cystine (disulfide) bonds. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>A280 of a 1 mg/mL solution</strong> is a plain number and the page's own defaults put it at 1.13. It is worked out from Tryptophan residues, Tyrosine residues, Cystine (disulfide) bonds and Molecular weight. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Extinction coefficient</th><th>A280 of a 1 mg/mL solution</th></tr></thead><tbody><tr><td><strong>Tryptophan residues</strong> +10%</td><td>+7.05%</td><td>+7.05%</td></tr><tr><td><strong>Tyrosine residues</strong> +10%</td><td>+2.87%</td><td>+2.87%</td></tr><tr><td><strong>Cystine (disulfide) bonds</strong> +10%</td><td>+0.08%</td><td>+0.08%</td></tr><tr><td><strong>Molecular weight</strong> +10%</td><td>+0%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Molecular weight sits at the top — a ten per cent error in that box shows up as roughly 9.1 per cent in the answer. By contrast, Cystine (disulfide) bonds barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Tryptophan residues = 4, Tyrosine residues = 6, Cystine (disulfide) bonds = 2 and Molecular weight = 27500 Da and the page reports <strong>Extinction coefficient</strong> = 31190 M⁻¹cm⁻¹ and <strong>A280 of a 1 mg/mL solution</strong> = 1.13 AU.</li><li>Feed in Tryptophan residues = 24, Tyrosine residues = 12, Cystine (disulfide) bonds = 4 and Molecular weight = 55000 Da and the page reports <strong>Extinction coefficient</strong> = 150380 M⁻¹cm⁻¹ and <strong>A280 of a 1 mg/mL solution</strong> = 2.73 AU.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Extinction coefficient follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Tryptophan residues, Tyrosine residues and Cystine (disulfide) bonds measured, Extinction coefficient and A280 of a 1 mg/mL solution wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/bod-load">BOD Load Calculator</a>, <a href="/biology/bone-length-to-body-height">Bone Length to Body Height Calculator</a> and <a href="/biology/bradford-assay-calculator">Bradford Assay (standard curve) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Protein Extinction Coefficient (ε280) calculator work out?', 'a' => <<<'TXT'
            Extinction coefficient and A280 of a 1 mg/mL solution, from Tryptophan residues, Tyrosine residues and Cystine (disulfide) bonds. The relationship is Extinction coefficient = Tryptophan residues × 5500 + Tyrosine residues × 1490 + Cystine (disulfide) bonds × 125.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Tryptophan residues, Tyrosine residues, Cystine (disulfide) bonds, Molecular weight (Da). With tryptophan residues, tyrosine residues and cystine (disulfide) bonds in place, Extinction coefficient can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Extinction coefficient and A280 of a 1 mg/mL solution blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Extinction coefficient = 62380 M⁻¹cm⁻¹ and A280 of a 1 mg/mL solution = 1.13 AU. Those are the defaults written into the form — move Tryptophan residues and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Extinction coefficient is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Tryptophan residues blank and the page solves for it, reporting Extinction coefficient instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Extinction coefficient keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/bod-load', 'name' => 'BOD Load Calculator'],
            ['path' => '/biology/bone-length-to-body-height', 'name' => 'Bone Length to Body Height Calculator'],
            ['path' => '/biology/bradford-assay-calculator', 'name' => 'Bradford Assay (standard curve) Calculator'],
        ],
        'authors' => [],
    ],
];
