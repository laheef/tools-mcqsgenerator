<?php

/**
 * Base Pair to kDa Calculator
 * /biology/base-pair-to-kda
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Base Pair to kDa Calculator',
    'meta' => ['title' => 'Base Pair to kDa Calculator — Formula & Results', 'description' => 'Base Pair to kDa Calculator turns DNA length into DNA mass and encoded amino acids. No sign-up: type the numbers, press Calculate and read the answer.', 'h1' => 'Base Pair to kDa Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'bp',
                            'label' => 'DNA length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3000',
                        ],
                        [
                            'name' => 'kda_dna',
                            'label' => 'DNA mass',
                            'type' => 'number',
                            'suffix' => 'kDa',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'aa',
                            'label' => 'Encoded amino acids',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kda_protein',
                            'label' => 'Protein mass',
                            'type' => 'number',
                            'suffix' => 'kDa',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bp_per_kda',
                            'label' => 'DNA per kDa of protein',
                            'type' => 'number',
                            'suffix' => 'bp',
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
            'title' => 'Mass',
            'results' => ['kda_dna' => 'bp*0.65', 'aa' => 'bp/3', 'kda_protein' => 'bp/3*0.11', 'bp_per_kda' => 'bp/(bp/3*0.11)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Base Pair to kDa takes DNA length and returns DNA mass and Encoded amino acids. There is no hidden constant here: change DNA mass and DNA length moves with it. The main result, DNA mass, is reported in kDa.
        TXT,
        'sections' => [
            ['title' => 'How the Base Pair to kDa calculator works', 'html' => <<<'TXT'
            <p>The Base Pair to kDa calculator applies one relationship to 1 number and reports DNA mass, Encoded amino acids and Protein mass.</p><p>In the form&#039;s own words, DNA mass = DNA length × 0.65.</p><p>The answers are DNA mass, Encoded amino acids, Protein mass and DNA per kDa of protein; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>DNA length</strong> — in bp</li></ul><p>What you get back is DNA mass in kDa, Encoded amino acids, Protein mass in kDa, DNA per kDa of protein in bp, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, DNA length = 3000 bp; the answers are <strong>DNA mass</strong> = 1950 kDa, <strong>Encoded amino acids</strong> = 1000, <strong>Protein mass</strong> = 110 kDa and <strong>DNA per kDa of protein</strong> = 27.27 bp.</p><ul><li><strong>DNA mass</strong> = 1950 kDa</li><li><strong>Encoded amino acids</strong> = 1000</li><li><strong>Protein mass</strong> = 110 kDa</li><li><strong>DNA per kDa of protein</strong> = 27.27 bp</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>DNA mass</strong> = <code>DNA length × 0.65</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>DNA mass</strong> = 1950, <strong>Encoded amino acids</strong> = 1000, <strong>Protein mass</strong> = 110 and <strong>DNA per kDa of protein</strong> = 27.27 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: DNA mass takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>DNA mass</strong> = <code>DNA length × 0.65</code></li><li><strong>Encoded amino acids</strong> = <code>DNA length ÷ 3</code></li><li><strong>Protein mass</strong> = <code>DNA length ÷ 3 × 0.11</code></li><li><strong>DNA per kDa of protein</strong> = <code>DNA length ÷ (DNA length ÷ 3 × 0.11)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>DNA mass</strong> = <code>DNA length × 0.65</code> — the form to use when DNA length are the values you have.</li><li><strong>Encoded amino acids</strong> = <code>DNA length ÷ 3</code> — the form to use when DNA length are the values you have.</li><li><strong>Protein mass</strong> = <code>DNA length ÷ 3 × 0.11</code> — the form to use when DNA length are the values you have.</li><li><strong>DNA per kDa of protein</strong> = <code>DNA length ÷ (DNA length ÷ 3 × 0.11)</code> — the form to use when DNA length are the values you have.</li></ul><p>Any one of DNA mass, Encoded amino acids and Protein mass can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double DNA length from 3000 to 6000, leaving every other box alone. The panel moves from <strong>DNA mass</strong> 1950 kDa, <strong>Encoded amino acids</strong> 1000, <strong>Protein mass</strong> 110 kDa and <strong>DNA per kDa of protein</strong> 27.27 bp to <strong>DNA mass</strong> 3900 kDa, <strong>Encoded amino acids</strong> 2000, <strong>Protein mass</strong> 220 kDa and <strong>DNA per kDa of protein</strong> 27.27 bp.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with DNA mass, Encoded amino acids and Protein mass are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>DNA length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If DNA length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in DNA length and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Base Pair to kDa form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>DNA length</strong> is measured in bp. It feeds DNA mass, Encoded amino acids and Protein mass. Fill it from a measurement rather than a memory — DNA length is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>DNA mass</strong> is a plain number and the page's own defaults put it at 1950. It is computed from DNA length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Encoded amino acids</strong> is a plain number and the page's own defaults put it at 1000. It is computed from DNA length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Protein mass</strong> is a plain number and the page's own defaults put it at 110. It is computed from DNA length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>DNA per kDa of protein</strong> is a plain number and the page's own defaults put it at 27.27. It is computed from DNA length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>DNA mass</th><th>Encoded amino acids</th><th>Protein mass</th><th>DNA per kDa of protein</th></tr></thead><tbody><tr><td><strong>DNA length</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>0%</td></tr></tbody></table><p>Ranked by leverage, DNA length sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in DNA length = 1500 bp and the page reports <strong>DNA mass</strong> = 975 kDa, <strong>Encoded amino acids</strong> = 500, <strong>Protein mass</strong> = 55 kDa and <strong>DNA per kDa of protein</strong> = 27.27 bp.</li><li>Feed in DNA length = 9000 bp and the page reports <strong>DNA mass</strong> = 5850 kDa, <strong>Encoded amino acids</strong> = 3000, <strong>Protein mass</strong> = 330 kDa and <strong>DNA per kDa of protein</strong> = 27.27 bp.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have DNA length ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with DNA length — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check DNA mass in kDa against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> DNA mass follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are DNA length and the number you are missing is DNA mass and Encoded amino acids.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/microscope-field-of-view">Microscope Field of View Calculator</a>, <a href="/biology/microscope-magnification">Microscope Magnification Calculator</a> and <a href="/biology/mitotic-index">Mitotic Index Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Base Pair to kDa calculator work out?', 'a' => 'DNA mass, Encoded amino acids, Protein mass and DNA per kDa of protein, from DNA length. The relationship is DNA mass = DNA length × 0.65.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'DNA length (bp). With DNA length in place, DNA mass can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of DNA mass, Encoded amino acids, Protein mass and DNA per kDa of protein blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            DNA mass = 1950 kDa, Encoded amino acids = 1000, Protein mass = 110 kDa and DNA per kDa of protein = 27.27 bp. Those are the defaults written into the form — move DNA length and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of DNA mass is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave DNA length blank and the page solves for it, reporting DNA mass instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to DNA mass at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/microscope-field-of-view', 'name' => 'Microscope Field of View Calculator'],
            ['path' => '/biology/microscope-magnification', 'name' => 'Microscope Magnification Calculator'],
            ['path' => '/biology/mitotic-index', 'name' => 'Mitotic Index Calculator'],
        ],
        'authors' => [],
    ],
];
