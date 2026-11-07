<?php

/**
 * Protein GRAVY (Hydropathy) Calculator
 * /biology/protein-gravy-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Protein GRAVY (Hydropathy) Calculator',
    'meta' => ['title' => 'Protein GRAVY (Hydropathy) Calculator — Biology', 'description' => 'Protein GRAVY (Hydropathy) Calculator works out GRAVY and hydrophobic fraction from hydrophobic residues (A V I L M F W Y) and Neutral residues (G P S T C N Q).', 'h1' => 'Protein GRAVY (Hydropathy) Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'hydrophobic',
                            'label' => 'Hydrophobic residues (A V I L M F W Y)',
                            'type' => 'number',
                            'help' => 'Counted in the sequence',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'neutral',
                            'label' => 'Neutral residues (G P S T C N Q)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '80',
                        ],
                        [
                            'name' => 'hydrophilic',
                            'label' => 'Hydrophilic residues (D E K R H)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total residues',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300',
                        ],
                        [
                            'name' => 'gravy',
                            'label' => 'GRAVY',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hydrophobic_pct',
                            'label' => 'Hydrophobic fraction',
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
            'title' => 'Hydropathy',
            'results' => ['gravy' => '(1.8*hydrophobic+(-0.9)*neutral+(-2.6)*hydrophilic)/total', 'hydrophobic_pct' => 'hydrophobic/total*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Protein GRAVY (Hydropathy) turns Hydrophobic residues (A V I L M F W Y), Neutral residues (G P S T C N Q) and Hydrophilic residues (D E K R H) into GRAVY and Hydrophobic fraction. There is no hidden constant here: change GRAVY and hydrophobic residues (A V I L M F W Y) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Protein GRAVY (Hydropathy) calculator works', 'html' => <<<'TXT'
            <p>The Protein GRAVY (Hydropathy) calculator applies one relationship to 4 numbers and reports GRAVY and Hydrophobic fraction.</p><p>The relationship it solves reads GRAVY = (1.8 × Hydrophobic residues (A V I L M F W Y) + ( − 0.9) × Neutral residues (G P S T C N Q) + ( − 2.6) × Hydrophilic residues (D E K R H)) ÷ Total residues.</p><p>The answers are GRAVY and Hydrophobic fraction; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Hydrophobic residues (A V I L M F W Y)</strong> — a plain number, no unit. Counted in the sequence</li><li><strong>Neutral residues (G P S T C N Q)</strong> — a plain number, no unit</li><li><strong>Hydrophilic residues (D E K R H)</strong> — a plain number, no unit</li><li><strong>Total residues</strong> — a plain number, no unit</li></ul><p>The answers come back as GRAVY, Hydrophobic fraction in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Hydrophobic residues (A V I L M F W Y) = 120, Neutral residues (G P S T C N Q) = 80, Hydrophilic residues (D E K R H) = 100 and Total residues = 300; the answers are <strong>GRAVY</strong> = -0.3867 and <strong>Hydrophobic fraction</strong> = 40 %.</p><ul><li><strong>GRAVY</strong> = -0.3867</li><li><strong>Hydrophobic fraction</strong> = 40 %</li></ul><p>That is <strong>GRAVY</strong> = <code>(1.8 × Hydrophobic residues (A V I L M F W Y) + ( − 0.9) × Neutral residues (G P S T C N Q) + ( − 2.6) × Hydrophilic residues (D E K R H)) ÷ Total residues</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>GRAVY</strong> = -0.3867 and <strong>Hydrophobic fraction</strong> = 40 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: GRAVY takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>GRAVY</strong> = <code>(1.8 × Hydrophobic residues (A V I L M F W Y) + ( − 0.9) × Neutral residues (G P S T C N Q) + ( − 2.6) × Hydrophilic residues (D E K R H)) ÷ Total residues</code></li><li><strong>Hydrophobic fraction</strong> = <code>Hydrophobic residues (A V I L M F W Y) ÷ Total residues × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>GRAVY</strong> = <code>(1.8 × Hydrophobic residues (A V I L M F W Y) + ( − 0.9) × Neutral residues (G P S T C N Q) + ( − 2.6) × Hydrophilic residues (D E K R H)) ÷ Total residues</code> — the form to use when Hydrophobic residues (A V I L M F W Y), Neutral residues (G P S T C N Q), Hydrophilic residues (D E K R H) and Total residues are the values you have.</li><li><strong>Hydrophobic fraction</strong> = <code>Hydrophobic residues (A V I L M F W Y) ÷ Total residues × 100</code> — the form to use when Hydrophobic residues (A V I L M F W Y) and Total residues are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of GRAVY and Hydrophobic fraction can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Hydrophobic residues (A V I L M F W Y) from 120 to 240, leaving every other box alone. The panel moves from <strong>GRAVY</strong> -0.3867 and <strong>Hydrophobic fraction</strong> 40 % to <strong>GRAVY</strong> 0.3333 and <strong>Hydrophobic fraction</strong> 80 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with GRAVY and Hydrophobic fraction are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Hydrophobic residues (A V I L M F W Y) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hydrophobic residues (A V I L M F W Y) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Neutral residues (G P S T C N Q) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Neutral residues (G P S T C N Q) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Hydrophilic residues (D E K R H) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hydrophilic residues (D E K R H) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Hydrophobic residues (A V I L M F W Y) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Hydrophobic residues (A V I L M F W Y)</strong> takes a plain number with no unit attached. Counted in the sequence. The page reads it when it works out GRAVY and Hydrophobic fraction. Have it to hand before you start: Hydrophobic residues (A V I L M F W Y) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Neutral residues (G P S T C N Q)</strong> takes a plain number with no unit attached. The page reads it when it works out GRAVY. Have it to hand before you start: Neutral residues (G P S T C N Q) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hydrophilic residues (D E K R H)</strong> takes a plain number with no unit attached. The page reads it when it works out GRAVY. Have it to hand before you start: Hydrophilic residues (D E K R H) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total residues</strong> takes a plain number with no unit attached. The page reads it when it works out GRAVY and Hydrophobic fraction. Have it to hand before you start: Total residues is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>GRAVY</strong> is a plain number and the page's own defaults put it at -0.3867. It is worked out from Hydrophobic residues (A V I L M F W Y), Neutral residues (G P S T C N Q), Hydrophilic residues (D E K R H) and Total residues. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Hydrophobic fraction</strong> is a plain number and the page's own defaults put it at 40. It is worked out from Hydrophobic residues (A V I L M F W Y) and Total residues. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>GRAVY</th><th>Hydrophobic fraction</th></tr></thead><tbody><tr><td><strong>Hydrophobic residues (A V I L M F W Y)</strong> +10%</td><td>+18.62%</td><td>+10%</td></tr><tr><td><strong>Neutral residues (G P S T C N Q)</strong> +10%</td><td>-6.21%</td><td>+0%</td></tr><tr><td><strong>Hydrophilic residues (D E K R H)</strong> +10%</td><td>-22.41%</td><td>+0%</td></tr><tr><td><strong>Total residues</strong> +10%</td><td>+9.09%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Hydrophilic residues (D E K R H) sits at the top — a ten per cent error in that box shows up as roughly 22.4 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Hydrophobic residues (A V I L M F W Y) = 60, Neutral residues (G P S T C N Q) = 40, Hydrophilic residues (D E K R H) = 50 and Total residues = 150, the answer is <strong>GRAVY</strong> = -0.3867 and <strong>Hydrophobic fraction</strong> = 40 %.</li><li>With Hydrophobic residues (A V I L M F W Y) = 360, Neutral residues (G P S T C N Q) = 80, Hydrophilic residues (D E K R H) = 100 and Total residues = 300, the answer is <strong>GRAVY</strong> = 1.05 and <strong>Hydrophobic fraction</strong> = 120 %.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> GRAVY follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Hydrophobic residues (A V I L M F W Y), Neutral residues (G P S T C N Q) and Hydrophilic residues (D E K R H) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Hydrophobic residues (A V I L M F W Y), Neutral residues (G P S T C N Q) and Hydrophilic residues (D E K R H) and the number you are missing is GRAVY and Hydrophobic fraction.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/chicken-hatch-date">Chicken Hatch Date Calculator</a>, <a href="/biology/chicken-years-to-human-years">Chicken Years to Human Years Calculator</a> and <a href="/biology/coding-capacity-of-dna">Coding Capacity of DNA Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Protein GRAVY (Hydropathy) calculator work out?', 'a' => <<<'TXT'
            GRAVY and Hydrophobic fraction, from Hydrophobic residues (A V I L M F W Y), Neutral residues (G P S T C N Q), Hydrophilic residues (D E K R H) and Total residues. The relationship is GRAVY = (1.8 × Hydrophobic residues (A V I L M F W Y) + ( − 0.9) × Neutral residues (G P S T C N Q) + ( − 2.6) × Hydrophilic residues (D E K R H)) ÷ Total residues.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Hydrophobic residues (A V I L M F W Y), Neutral residues (G P S T C N Q), Hydrophilic residues (D E K R H), Total residues. With hydrophobic residues (A V I L M F W Y), neutral residues (G P S T C N Q) and hydrophilic residues (D E K R H) in place, GRAVY can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. GRAVY and Hydrophobic fraction can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            GRAVY = -0.3867 and Hydrophobic fraction = 40 %. The figures come from Hydrophobic residues (A V I L M F W Y) as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of GRAVY is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Hydrophobic residues (A V I L M F W Y) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of GRAVY keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/chicken-hatch-date', 'name' => 'Chicken Hatch Date Calculator'],
            ['path' => '/biology/chicken-years-to-human-years', 'name' => 'Chicken Years to Human Years Calculator'],
            ['path' => '/biology/coding-capacity-of-dna', 'name' => 'Coding Capacity of DNA Calculator'],
        ],
        'authors' => [],
    ],
];
