<?php

/**
 * Pedigree Probability Calculator
 * /biology/pedigree-probability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pedigree Probability Calculator',
    'meta' => ['title' => 'Pedigree Probability Calculator — Formula & Results', 'description' => 'Pedigree Probability Calculator works out chance of an affected child and odds against from chance the parent is a carrier and chance the partner is a carrier.', 'h1' => 'Pedigree Probability Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'carrier_prob',
                            'label' => 'Chance the parent is a carrier',
                            'type' => 'number',
                            'help' => 'From the pedigree',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.667',
                        ],
                        [
                            'name' => 'partner_carrier',
                            'label' => 'Chance the partner is a carrier',
                            'type' => 'number',
                            'help' => 'Population frequency',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.04',
                        ],
                        [
                            'name' => 'transmission',
                            'label' => 'Transmission if both are carriers',
                            'type' => 'number',
                            'help' => '0.25 for a recessive trait',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.25',
                        ],
                        [
                            'name' => 'joint',
                            'label' => 'Chance of an affected child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'odds',
                            'label' => 'Odds against',
                            'type' => 'number',
                            'suffix' => ':1',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'one_in',
                            'label' => 'Expressed as 1 in',
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
            'title' => 'Probability',
            'results' => ['joint' => 'carrier_prob*partner_carrier*transmission*100', 'odds' => '(1-carrier_prob*partner_carrier*transmission)/(carrier_prob*partner_carrier*transmission)', 'one_in' => '1/(carrier_prob*partner_carrier*transmission)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Pedigree Probability turns Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers into Chance of an affected child and Odds against. It is a single relationship that reads chance of an affected child out of chance the parent is a carrier, not a table of canned results keyed by them. Units for Chance of an affected child default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Pedigree Probability calculator works', 'html' => <<<'TXT'
            <p>The Pedigree Probability calculator applies one relationship to 3 numbers and reports Chance of an affected child, Odds against and Expressed as 1 in.</p><p>The relationship it solves reads Chance of an affected child = Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers × 100.</p><p>The result panel carries Chance of an affected child, Odds against and Expressed as 1 in, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Chance the parent is a carrier</strong> — a plain number, no unit. From the pedigree</li><li><strong>Chance the partner is a carrier</strong> — a plain number, no unit. Population frequency</li><li><strong>Transmission if both are carriers</strong> — a plain number, no unit. 0.25 for a recessive trait</li></ul><p>What you get back is Chance of an affected child in %, Odds against in :1, Expressed as 1 in, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Chance the parent is a carrier = 0.667, Chance the partner is a carrier = 0.04 and Transmission if both are carriers = 0.25; the answers are <strong>Chance of an affected child</strong> = 0.667 %, <strong>Odds against</strong> = 149 :1 and <strong>Expressed as 1 in</strong> = 150.</p><ul><li><strong>Chance of an affected child</strong> = 0.667 %</li><li><strong>Odds against</strong> = 149 :1</li><li><strong>Expressed as 1 in</strong> = 150</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Chance of an affected child</strong> = <code>Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers × 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Chance of an affected child</strong> = 0.667, <strong>Odds against</strong> = 149 and <strong>Expressed as 1 in</strong> = 150 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Chance of an affected child takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Chance of an affected child</strong> = <code>Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers × 100</code></li><li><strong>Odds against</strong> = <code>(1 − Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers) ÷ (Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers)</code></li><li><strong>Expressed as 1 in</strong> = <code>1 ÷ (Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Chance of an affected child</strong> = <code>Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers × 100</code> — the form to use when Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers are the values you have.</li><li><strong>Odds against</strong> = <code>(1 − Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers) ÷ (Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers)</code> — the form to use when Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers are the values you have.</li><li><strong>Expressed as 1 in</strong> = <code>1 ÷ (Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers)</code> — the form to use when Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers are the values you have.</li></ul><p>Any one of Chance of an affected child, Odds against and Expressed as 1 in can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Chance the parent is a carrier from 0.667 to 1.33, leaving every other box alone. The panel moves from <strong>Chance of an affected child</strong> 0.667 %, <strong>Odds against</strong> 149 :1 and <strong>Expressed as 1 in</strong> 150 to <strong>Chance of an affected child</strong> 1.33 %, <strong>Odds against</strong> 73.96 :1 and <strong>Expressed as 1 in</strong> 74.96.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Chance of an affected child, Odds against and Expressed as 1 in are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Chance the parent is a carrier left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Chance the parent is a carrier is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Chance the partner is a carrier left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Chance the partner is a carrier is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Transmission if both are carriers left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Transmission if both are carriers is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Chance the parent is a carrier is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Chance the parent is a carrier</strong> takes a plain number with no unit attached. From the pedigree. The page reads it when it works out Chance of an affected child, Odds against and Expressed as 1 in. Have it to hand before you start: Chance the parent is a carrier is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Chance the partner is a carrier</strong> takes a plain number with no unit attached. Population frequency. The page reads it when it works out Chance of an affected child, Odds against and Expressed as 1 in. Have it to hand before you start: Chance the partner is a carrier is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Transmission if both are carriers</strong> takes a plain number with no unit attached. 0.25 for a recessive trait. The page reads it when it works out Chance of an affected child, Odds against and Expressed as 1 in. Have it to hand before you start: Transmission if both are carriers is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Chance of an affected child</strong> is a plain number and the page's own defaults put it at 0.667. The value follows from Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Odds against</strong> is a plain number and the page's own defaults put it at 149. The value follows from Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Expressed as 1 in</strong> is a plain number and the page's own defaults put it at 150. The value follows from Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Chance of an affected child</th><th>Odds against</th><th>Expressed as 1 in</th></tr></thead><tbody><tr><td><strong>Chance the parent is a carrier</strong> +10%</td><td>+10%</td><td>-9.15%</td><td>-9.09%</td></tr><tr><td><strong>Chance the partner is a carrier</strong> +10%</td><td>+10%</td><td>-9.15%</td><td>-9.09%</td></tr><tr><td><strong>Transmission if both are carriers</strong> +10%</td><td>+10%</td><td>-9.15%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Chance the parent is a carrier sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Chance the parent is a carrier = 0.334, Chance the partner is a carrier = 0.02 and Transmission if both are carriers = 0.125, the answer is <strong>Chance of an affected child</strong> = 0.083 %, <strong>Odds against</strong> = 1198 :1 and <strong>Expressed as 1 in</strong> = 1199.</li><li>With Chance the parent is a carrier = 2, Chance the partner is a carrier = 0.04 and Transmission if both are carriers = 0.25, the answer is <strong>Chance of an affected child</strong> = 2 %, <strong>Odds against</strong> = 48.98 :1 and <strong>Expressed as 1 in</strong> = 49.98.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Chance of an affected child follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers and the number you are missing is Chance of an affected child and Odds against.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/acid-base-balance">Acid–Base Balance (ABG) Calculator</a>, <a href="/biology/acres-per-hour">Acres per hour Calculator</a> and <a href="/biology/specimen-size-from-image">Actual Specimen Size from Image Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pedigree Probability calculator work out?', 'a' => <<<'TXT'
            Chance of an affected child, Odds against and Expressed as 1 in, from Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers. The relationship is Chance of an affected child = Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Chance the parent is a carrier, Chance the partner is a carrier, Transmission if both are carriers. With chance the parent is a carrier, chance the partner is a carrier and transmission if both are carriers in place, Chance of an affected child can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Chance of an affected child, Odds against and Expressed as 1 in blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Chance of an affected child = 0.667 %, Odds against = 149 :1 and Expressed as 1 in = 150. The figures come from Chance the parent is a carrier as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Chance of an affected child is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Chance the parent is a carrier left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Chance of an affected child keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/acid-base-balance', 'name' => 'Acid–Base Balance (ABG) Calculator'],
            ['path' => '/biology/acres-per-hour', 'name' => 'Acres per hour Calculator'],
            ['path' => '/biology/specimen-size-from-image', 'name' => 'Actual Specimen Size from Image Calculator'],
        ],
        'authors' => [],
    ],
];
