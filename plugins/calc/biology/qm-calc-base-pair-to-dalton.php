<?php

/**
 * Base Pair to Dalton Calculator
 * /biology/base-pair-to-dalton
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Base Pair to Dalton Calculator',
    'meta' => ['title' => 'Base Pair to Dalton Calculator — Formula & Results', 'description' => 'Base Pair to Dalton Calculator works out molecular weight and molar mass from molecule and length. Every box can be solved for, not only the one in the title.', 'h1' => 'Base Pair to Dalton Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'kind',
                            'label' => 'Molecule',
                            'type' => 'select',
                            'options' => ['Double-stranded DNA' => '650', 'Single-stranded DNA' => '330', 'RNA' => '340'],
                            'default' => 'Double-stranded DNA',
                        ],
                        [
                            'name' => 'bp',
                            'label' => 'Length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'dalton',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'Da',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kda',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'kDa',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gmol',
                            'label' => 'Molar mass',
                            'type' => 'number',
                            'suffix' => 'g/mol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pg',
                            'label' => 'Mass of one molecule',
                            'type' => 'number',
                            'suffix' => 'pg',
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
            'results' => ['dalton' => 'bp*kind', 'kda' => 'bp*kind/1000', 'gmol' => 'bp*kind', 'pg' => 'bp*kind/602214076000000000000000*1000000000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Base Pair to Dalton turns Molecule and Length into Molecular weight and Molecular weight. It is a single relationship that reads molecular weight out of molecule, not a table of canned results keyed by them. Units for Molecular weight default to Da and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Base Pair to Dalton calculator works', 'html' => <<<'TXT'
            <p>Base Pair to Dalton answers one question from 2 numbers, and the answer is Molecular weight, Molecular weight and Molar mass.</p><p>The relationship it solves reads Molecular weight = Length × Molecule.</p><p>The result panel carries Molecular weight, Molecular weight, Molar mass and Mass of one molecule, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Molecule</strong> — a plain number, no unit</li><li><strong>Length</strong> — in bp</li></ul><p>The result boxes are Molecular weight in Da, Molecular weight in kDa, Molar mass in g/mol, Mass of one molecule in pg; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Molecule = 650 and Length = 1000 bp; the answers are <strong>Molecular weight</strong> = 650000 Da, <strong>Molecular weight</strong> = 650 kDa, <strong>Molar mass</strong> = 650000 g/mol and <strong>Mass of one molecule</strong> = 1.079e-6 pg.</p><ul><li><strong>Molecular weight</strong> = 650000 Da</li><li><strong>Molecular weight</strong> = 650 kDa</li><li><strong>Molar mass</strong> = 650000 g/mol</li><li><strong>Mass of one molecule</strong> = 1.079e-6 pg</li></ul><p>That is <strong>Molecular weight</strong> = <code>Length × Molecule</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Molecular weight</strong> = 650000, <strong>Molecular weight</strong> = 650, <strong>Molar mass</strong> = 650000 and <strong>Mass of one molecule</strong> = 1.079e-6 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Molecular weight takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Molecular weight</strong> = <code>Length × Molecule</code></li><li><strong>Molar mass</strong> = <code>Length × Molecule</code></li><li><strong>Mass of one molecule</strong> = <code>Length × Molecule ÷ 602214076000000000000000 × 1000000000000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Molecular weight</strong> = <code>Length × Molecule</code> — the form to use when Length and Molecule are the values you have.</li><li><strong>Molecular weight</strong> = <code>Length × Molecule ÷ 1000</code> — the form to use when Length and Molecule are the values you have.</li><li><strong>Molar mass</strong> = <code>Length × Molecule</code> — the form to use when Length and Molecule are the values you have.</li><li><strong>Mass of one molecule</strong> = <code>Length × Molecule ÷ 602214076000000000000000 × 1000000000000</code> — the form to use when Length and Molecule are the values you have.</li></ul><p>Any one of Molecular weight, Molecular weight and Molar mass can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Molecule from 650 to 1300, leaving every other box alone. The panel moves from <strong>Molecular weight</strong> 650000 Da, <strong>Molecular weight</strong> 650 kDa, <strong>Molar mass</strong> 650000 g/mol and <strong>Mass of one molecule</strong> 1.079e-6 pg to <strong>Molecular weight</strong> 1.300e+6 Da, <strong>Molecular weight</strong> 1300 kDa, <strong>Molar mass</strong> 1.300e+6 g/mol and <strong>Mass of one molecule</strong> 2.159e-6 pg.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Molecular weight, Molecular weight and Molar mass are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Molecule left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Molecule is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Molecule and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Molecule</strong> takes a plain number with no unit attached. It feeds Molecular weight, Molecular weight and Molar mass. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Molecule is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Length</strong> is measured in bp. It feeds Molecular weight, Molecular weight and Molar mass. Have it to hand before you start: Length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Molecular weight</strong> is a plain number and the page's own defaults put it at 650000. It is computed from Length and Molecule, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Molecular weight</strong> is a plain number and the page's own defaults put it at 650. It is computed from Length and Molecule, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Molar mass</strong> is a plain number and the page's own defaults put it at 650000. It is computed from Length and Molecule, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Mass of one molecule</strong> is a plain number and the page's own defaults put it at 1.079e-6. It is computed from Length and Molecule, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Molecular weight</th><th>Molecular weight</th><th>Molar mass</th><th>Mass of one molecule</th></tr></thead><tbody><tr><td><strong>Molecule</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Length</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Molecule sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Molecule = 325 and Length = 500 bp, the answer is <strong>Molecular weight</strong> = 162500 Da, <strong>Molecular weight</strong> = 163 kDa, <strong>Molar mass</strong> = 162500 g/mol and <strong>Mass of one molecule</strong> = 2.698e-7 pg.</li><li>With Molecule = 1950 and Length = 1000 bp, the answer is <strong>Molecular weight</strong> = 1.950e+6 Da, <strong>Molecular weight</strong> = 1950 kDa, <strong>Molar mass</strong> = 1.950e+6 g/mol and <strong>Mass of one molecule</strong> = 3.238e-6 pg.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Molecular weight follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Molecule and Length and the number you are missing is Molecular weight and Molecular weight.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/daily-light-integral-dli">Daily light integral (DLI) Calculator</a>, <a href="/biology/days-to-maturity">Days to Maturity Calculator</a> and <a href="/biology/dihybrid-cross">Dihybrid Cross (9:3:3:1) Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Base Pair to Dalton is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Molecule and Length beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Base Pair to Dalton calculator work out?', 'a' => 'Molecular weight, Molecular weight, Molar mass and Mass of one molecule, from Length and Molecule. The relationship is Molecular weight = Length × Molecule.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Molecule, Length (bp). Fill molecule and length and leave Molecular weight empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Molecular weight, Molecular weight, Molar mass and Mass of one molecule blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Molecular weight = 650000 Da, Molecular weight = 650 kDa, Molar mass = 650000 g/mol and Mass of one molecule = 1.079e-6 pg. That comes from the page's own defaults, entered in Molecule; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Molecular weight is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Molecule left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Molecular weight keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/daily-light-integral-dli', 'name' => 'Daily light integral (DLI) Calculator'],
            ['path' => '/biology/days-to-maturity', 'name' => 'Days to Maturity Calculator'],
            ['path' => '/biology/dihybrid-cross', 'name' => 'Dihybrid Cross (9:3:3:1) Calculator'],
        ],
        'authors' => [],
    ],
];
