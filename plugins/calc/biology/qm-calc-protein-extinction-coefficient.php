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
    'meta' => ['title' => 'Protein Extinction Coefficient (ε280) Calculator', 'description' => 'Protein Extinction Coefficient (ε280) turns Tryptophan residues, Tyrosine residues and Cystine (disulfide) bonds into Extinction coefficient and A280 of a 1…', 'h1' => 'Protein Extinction Coefficient (ε280) Calculator', 'updated' => '2026-10-29'],
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
        Protein Extinction Coefficient (ε280) turns Tryptophan residues, Tyrosine residues and Cystine (disulfide) bonds into Extinction coefficient and A280 of a 1 mg/mL solution. Nothing is looked up on this page: Extinction coefficient is computed from Tryptophan residues and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Extinction coefficient is opened in M⁻¹cm⁻¹; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Protein Extinction Coefficient (ε280) calculator works', 'html' => <<<'TXT'
            <p>Protein Extinction Coefficient (ε280) answers one question from 4 numbers, and the answer is Extinction coefficient and A280 of a 1 mg/mL solution.</p><p>The relationship it solves reads Extinction coefficient = Tryptophan residues × 5500 + Tyrosine residues × 1490 + Cystine (disulfide) bonds × 125.</p><p>The answers are Extinction coefficient and A280 of a 1 mg/mL solution; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Tryptophan residues</strong> — a plain number, no unit. W</li><li><strong>Tyrosine residues</strong> — a plain number, no unit. Y</li><li><strong>Cystine (disulfide) bonds</strong> — a plain number, no unit. S–S pairs, not free cysteines</li><li><strong>Molecular weight</strong> — in Da</li></ul><p>What you get back is Extinction coefficient in M⁻¹cm⁻¹, A280 of a 1 mg/mL solution in AU, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Tryptophan residues = 8, Tyrosine residues = 12, Cystine (disulfide) bonds = 4 and Molecular weight = 55000 Da gives &lt;strong&gt;Extinction coefficient&lt;/strong&gt; = 62380 M⁻¹cm⁻¹ and &lt;strong&gt;A280 of a 1 mg/mL solution&lt;/strong&gt; = 1.13 AU.</p><ul><li><strong>Extinction coefficient</strong> = 62380 M⁻¹cm⁻¹</li><li><strong>A280 of a 1 mg/mL solution</strong> = 1.13 AU</li></ul><p>That is <strong>Extinction coefficient</strong> = <code>Tryptophan residues × 5500 + Tyrosine residues × 1490 + Cystine (disulfide) bonds × 125</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Extinction coefficient&lt;/strong&gt; = 62380 and &lt;strong&gt;A280 of a 1 mg/mL solution&lt;/strong&gt; = 1.13 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Extinction coefficient takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Extinction coefficient</strong> = <code>Tryptophan residues × 5500 + Tyrosine residues × 1490 + Cystine (disulfide) bonds × 125</code></li><li><strong>A280 of a 1 mg/mL solution</strong> = <code>(Tryptophan residues × 5500 + Tyrosine residues × 1490 + Cystine (disulfide) bonds × 125) ÷ Molecular weight</code></li></ul><p>Any one of Extinction coefficient and A280 of a 1 mg/mL solution can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Tryptophan residues, from 8 to 16 — and the answers go from &lt;strong&gt;Extinction coefficient&lt;/strong&gt; 62380 M⁻¹cm⁻¹ and &lt;strong&gt;A280 of a 1 mg/mL solution&lt;/strong&gt; 1.13 AU to &lt;strong&gt;Extinction coefficient&lt;/strong&gt; 106380 M⁻¹cm⁻¹ and &lt;strong&gt;A280 of a 1 mg/mL solution&lt;/strong&gt; 1.93 AU.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Extinction coefficient and A280 of a 1 mg/mL solution are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Tryptophan residues is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
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
            Tryptophan residues, Tyrosine residues, Cystine (disulfide) bonds, Molecular weight (Da). With trp, tyr and cystine in place, Extinction coefficient can stay blank and the page will work it out.
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
