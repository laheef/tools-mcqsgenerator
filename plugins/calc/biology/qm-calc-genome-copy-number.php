<?php

/**
 * Genome Copy Number Calculator
 * /biology/genome-copy-number
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Genome Copy Number Calculator',
    'meta' => ['title' => 'Genome Copy Number Calculator: Steps & Units', 'description' => 'Genome Copy Number Calculator turns DNA mass and genome size into genome copies, copies per microlitre and a log value. Mass uses 660 g per mole of base pair.', 'h1' => 'Genome Copy Number Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'mass_ng',
                            'label' => 'DNA mass',
                            'type' => 'number',
                            'suffix' => 'ng',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'genome_mb',
                            'label' => 'Genome size',
                            'type' => 'number',
                            'suffix' => 'Mb',
                            'help' => '3 200 Mb for human, 4.6 Mb for E. coli',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3.2',
                        ],
                        [
                            'name' => 'copies',
                            'label' => 'Genome copies',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'copies_ul',
                            'label' => 'Copies per µL in 50 µL',
                            'type' => 'number',
                            'suffix' => 'copies/µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'log_copies',
                            'label' => 'log₁₀ copies',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mass_per_copy',
                            'label' => 'Mass of one genome',
                            'type' => 'number',
                            'suffix' => 'fg',
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
            'title' => 'Copies',
            'results' => ['copies' => 'mass_ng*0.000000001/(genome_mb*1000000*660)/1.66054e-24', 'copies_ul' => 'mass_ng*0.000000001/(genome_mb*1000000*660)/1.66054e-24/50', 'log_copies' => 'log10(mass_ng*0.000000001/(genome_mb*1000000*660)/1.66054e-24)', 'mass_per_copy' => 'genome_mb*1000000*660/602200000000000000000000*1000000000000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Genome Copy Number turns DNA mass and Genome size into Genome copies and Copies per µL in 50 µL. The arithmetic is the whole method: genome copies is worked out from DNA mass by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Genome Copy Number calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Genome Copy Number: it takes 2 numbers and reports Genome copies, Copies per µL in 50 µL and log₁₀ copies.</p><p>The relationship it solves reads Genome copies = DNA mass × 0.000000001 ÷ (Genome size × 1000000 × 660) ÷ 1.66054e − 24.</p><p>What comes back is Genome copies, Copies per µL in 50 µL, log₁₀ copies and Mass of one genome — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>DNA mass</strong> — in ng</li><li><strong>Genome size</strong> — in Mb. 3 200 Mb for human, 4.6 Mb for E. coli</li></ul><p>The result boxes are Genome copies, Copies per µL in 50 µL in copies/µL, log₁₀ copies, Mass of one genome in fg; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — DNA mass = 10 ng and Genome size = 3.2 Mb — through the same formula and the panel reports <strong>Genome copies</strong> = 2.851e-18, <strong>Copies per µL in 50 µL</strong> = 5.703e-2 copies/µL, <strong>log₁₀ copies</strong> = -17.54 and <strong>Mass of one genome</strong> = 3.51 fg.</p><ul><li><strong>Genome copies</strong> = 2.851e-18</li><li><strong>Copies per µL in 50 µL</strong> = 5.703e-2 copies/µL</li><li><strong>log₁₀ copies</strong> = -17.54</li><li><strong>Mass of one genome</strong> = 3.51 fg</li></ul><p>The line behind those figures is <strong>Genome copies</strong> = <code>DNA mass × 0.000000001 ÷ (Genome size × 1000000 × 660) ÷ 1.66054e − 24</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Genome copies</strong> = 2.851e-18, <strong>Copies per µL in 50 µL</strong> = 5.703e-2, <strong>log₁₀ copies</strong> = -17.54 and <strong>Mass of one genome</strong> = 3.51 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Genome copies takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Genome copies</strong> = <code>DNA mass × 0.000000001 ÷ (Genome size × 1000000 × 660) ÷ 1.66054e − 24</code></li><li><strong>Copies per µL in 50 µL</strong> = <code>DNA mass × 0.000000001 ÷ (Genome size × 1000000 × 660) ÷ 1.66054e − 24 ÷ 50</code></li><li><strong>log₁₀ copies</strong> = <code>log₁₀(DNA mass × 0.000000001 ÷ (Genome size × 1000000 × 660) ÷ 1.66054e − 24)</code></li><li><strong>Mass of one genome</strong> = <code>Genome size × 1000000 × 660 ÷ 602200000000000000000000 × 1000000000000000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Genome copies</strong> = <code>DNA mass × 0.000000001 ÷ (Genome size × 1000000 × 660) ÷ 1.66054e − 24</code> — the form to use when DNA mass and Genome size are the values you have.</li><li><strong>Copies per µL in 50 µL</strong> = <code>DNA mass × 0.000000001 ÷ (Genome size × 1000000 × 660) ÷ 1.66054e − 24 ÷ 50</code> — the form to use when DNA mass and Genome size are the values you have.</li><li><strong>log₁₀ copies</strong> = <code>log₁₀(DNA mass × 0.000000001 ÷ (Genome size × 1000000 × 660) ÷ 1.66054e − 24)</code> — the form to use when DNA mass and Genome size are the values you have.</li><li><strong>Mass of one genome</strong> = <code>Genome size × 1000000 × 660 ÷ 602200000000000000000000 × 1000000000000000</code> — the form to use when Genome size are the values you have.</li></ul><p>Any one of Genome copies, Copies per µL in 50 µL and log₁₀ copies can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — DNA mass, from 10 to 20 — and the answers go from <strong>Genome copies</strong> 2.851e-18, <strong>Copies per µL in 50 µL</strong> 5.703e-2 copies/µL, <strong>log₁₀ copies</strong> -17.54 and <strong>Mass of one genome</strong> 3.51 fg to <strong>Genome copies</strong> 5.703e-18, <strong>Copies per µL in 50 µL</strong> 1.141e-19 copies/µL, <strong>log₁₀ copies</strong> -17.24 and <strong>Mass of one genome</strong> 3.51 fg.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Genome copies, Copies per µL in 50 µL and log₁₀ copies are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>DNA mass left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If DNA mass is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Genome size left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Genome size is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in DNA mass and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Genome Copy Number form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>DNA mass</strong> is measured in ng. It feeds Genome copies, Copies per µL in 50 µL and log₁₀ copies. Fill it from a measurement rather than a memory — DNA mass is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Genome size</strong> is measured in Mb. 3 200 Mb for human, 4.6 Mb for E. coli. It feeds Genome copies, Copies per µL in 50 µL and log₁₀ copies. Fill it from a measurement rather than a memory — Genome size is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Genome copies</strong> is a plain number and the page's own defaults put it at 2.851e-18. It is worked out from DNA mass and Genome size. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Copies per µL in 50 µL</strong> is a plain number and the page's own defaults put it at 5.703e-2. It is worked out from DNA mass and Genome size. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>log₁₀ copies</strong> is a plain number and the page's own defaults put it at -17.54. It is worked out from DNA mass and Genome size. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Mass of one genome</strong> is a plain number and the page's own defaults put it at 3.51. It is worked out from Genome size. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Genome copies</th><th>Copies per µL in 50 µL</th><th>log₁₀ copies</th><th>Mass of one genome</th></tr></thead><tbody><tr><td><strong>DNA mass</strong> +10%</td><td>—</td><td>—</td><td>+0.24%</td><td>+0%</td></tr><tr><td><strong>Genome size</strong> +10%</td><td>—</td><td>—</td><td>-0.24%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Genome size sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, DNA mass barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in DNA mass = 5 ng and Genome size = 1.6 Mb and the page reports <strong>Genome copies</strong> = 2.851e-18, <strong>Copies per µL in 50 µL</strong> = 5.703e-2 copies/µL, <strong>log₁₀ copies</strong> = -17.54 and <strong>Mass of one genome</strong> = 1.75 fg.</li><li>Feed in DNA mass = 30 ng and Genome size = 3.2 Mb and the page reports <strong>Genome copies</strong> = 8.554e-18, <strong>Copies per µL in 50 µL</strong> = 1.711e-19 copies/µL, <strong>log₁₀ copies</strong> = -17.07 and <strong>Mass of one genome</strong> = 3.51 fg.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Genome copies follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when DNA mass and Genome size is what you already know and Genome copies and Copies per µL in 50 µL is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/rabbit-color">Rabbit color</a>, <a href="/biology/rabbit-gestation">Rabbit gestation Calculator</a> and <a href="/biology/raised-bed-soil">Raised bed soil Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Genome Copy Number calculator work out?', 'a' => <<<'TXT'
            Genome copies, Copies per µL in 50 µL, log₁₀ copies and Mass of one genome, from DNA mass and Genome size. The relationship is Genome copies = DNA mass × 0.000000001 ÷ (Genome size × 1000000 × 660) ÷ 1.66054e − 24.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'DNA mass (ng), Genome size (Mb). Enter DNA mass and genome size; Genome copies is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Genome copies, Copies per µL in 50 µL, log₁₀ copies and Mass of one genome blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Genome copies = 2.851e-18, Copies per µL in 50 µL = 5.703e-2 copies/µL, log₁₀ copies = -17.54 and Mass of one genome = 3.51 fg. That comes from the page's own defaults, entered in DNA mass; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Genome copies is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave DNA mass blank and the page solves for it, reporting Genome copies instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Genome copies at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/rabbit-color', 'name' => 'Rabbit color'],
            ['path' => '/biology/rabbit-gestation', 'name' => 'Rabbit gestation Calculator'],
            ['path' => '/biology/raised-bed-soil', 'name' => 'Raised bed soil Calculator'],
        ],
        'authors' => [],
    ],
];
