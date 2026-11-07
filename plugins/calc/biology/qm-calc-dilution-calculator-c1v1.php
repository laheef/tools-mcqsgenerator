<?php

/**
 * Dilution Calculator (C1V1 = C2V2)
 * /biology/dilution-calculator-c1v1
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dilution Calculator (C1V1 = C2V2)',
    'meta' => ['title' => 'Dilution (C1V1 = C2V2) Calculator — Formula', 'description' => 'Dilution Calculator (C1V1 = C2V2) works out stock volume and diluent to add from stock concentration and final concentration. It returns stock volume.', 'h1' => 'Dilution Calculator (C1V1 = C2V2)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'c1',
                            'label' => 'Stock concentration',
                            'type' => 'number',
                            'suffix' => 'M',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'v1',
                            'label' => 'Stock volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'c2',
                            'label' => 'Final concentration',
                            'type' => 'number',
                            'suffix' => 'M',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'v2',
                            'label' => 'Final volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'diluent',
                            'label' => 'Diluent to add',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fold',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
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
            'title' => 'Dilution',
            'results' => ['v1' => 'c2*v2/c1', 'diluent' => 'v2-c2*v2/c1', 'fold' => 'c1/c2'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dilution Calculator (C1V1 = C2V2) works out Stock volume and Diluent to add from Stock concentration, Final concentration and Final volume. There is no hidden constant here: change stock volume and stock concentration moves with it. The main result, Stock volume, is reported in mL.
        TXT,
        'sections' => [
            ['title' => 'How the Dilution Calculator (C1V1 = C2V2) calculator works', 'html' => <<<'TXT'
            <p>Dilution Calculator (C1V1 = C2V2) answers one question from 3 numbers, and the answer is Stock volume, Diluent to add and Dilution factor.</p><p>The relationship it solves reads Stock volume = Final concentration × Final volume ÷ Stock concentration.</p><p>What comes back is Stock volume, Diluent to add and Dilution factor — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Stock concentration</strong> — in M</li><li><strong>Final concentration</strong> — in M</li><li><strong>Final volume</strong> — in mL</li></ul><p>The answers come back as Stock volume in mL, Diluent to add in mL, Dilution factor in ×. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Stock concentration = 10 M, Final concentration = 0.5 M and Final volume = 100 mL — through the same formula and the panel reports <strong>Stock volume</strong> = 5 mL, <strong>Diluent to add</strong> = 95 mL and <strong>Dilution factor</strong> = 20 ×.</p><ul><li><strong>Stock volume</strong> = 5 mL</li><li><strong>Diluent to add</strong> = 95 mL</li><li><strong>Dilution factor</strong> = 20 ×</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Stock volume</strong> = <code>Final concentration × Final volume ÷ Stock concentration</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Stock volume</strong> = 5, <strong>Diluent to add</strong> = 95 and <strong>Dilution factor</strong> = 20. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Stock volume is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Stock volume</strong> = <code>Final concentration × Final volume ÷ Stock concentration</code></li><li><strong>Diluent to add</strong> = <code>Final volume − Final concentration × Final volume ÷ Stock concentration</code></li><li><strong>Dilution factor</strong> = <code>Stock concentration ÷ Final concentration</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Stock volume</strong> = <code>Final concentration × Final volume ÷ Stock concentration</code> — the form to use when Final concentration, Final volume and Stock concentration are the values you have.</li><li><strong>Diluent to add</strong> = <code>Final volume − Final concentration × Final volume ÷ Stock concentration</code> — the form to use when Final volume, Final concentration and Stock concentration are the values you have.</li><li><strong>Dilution factor</strong> = <code>Stock concentration ÷ Final concentration</code> — the form to use when Stock concentration and Final concentration are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Stock volume, Diluent to add and Dilution factor can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Stock concentration from 10 to 20, leaving every other box alone. The panel moves from <strong>Stock volume</strong> 5 mL, <strong>Diluent to add</strong> 95 mL and <strong>Dilution factor</strong> 20 × to <strong>Stock volume</strong> 2.5 mL, <strong>Diluent to add</strong> 97.5 mL and <strong>Dilution factor</strong> 40 ×.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Stock volume, Diluent to add and Dilution factor are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Stock concentration left as a guess.</strong> Anything typed into Stock concentration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Final concentration left as a guess.</strong> Anything typed into Final concentration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Final volume left as a guess.</strong> Anything typed into Final volume is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Stock concentration is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Stock concentration</strong> is measured in M. It feeds Stock volume, Diluent to add and Dilution factor. Have it to hand before you start: Stock concentration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final concentration</strong> is measured in M. It feeds Stock volume, Diluent to add and Dilution factor. Have it to hand before you start: Final concentration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final volume</strong> is measured in mL. It feeds Stock volume and Diluent to add. Have it to hand before you start: Final volume is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Stock volume</strong> is a plain number and the page's own defaults put it at 5. It is computed from Final concentration, Final volume and Stock concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Diluent to add</strong> is a plain number and the page's own defaults put it at 95. It is computed from Final volume, Final concentration and Stock concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Dilution factor</strong> is a plain number and the page's own defaults put it at 20. It is computed from Stock concentration and Final concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Stock volume</th><th>Diluent to add</th><th>Dilution factor</th></tr></thead><tbody><tr><td><strong>Stock concentration</strong> +10%</td><td>-9.09%</td><td>+0.48%</td><td>+10%</td></tr><tr><td><strong>Final concentration</strong> +10%</td><td>+10%</td><td>-0.53%</td><td>-9.09%</td></tr><tr><td><strong>Final volume</strong> +10%</td><td>+10%</td><td>+10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Final concentration: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Stock concentration = 5 M, Final concentration = 0.25 M and Final volume = 50 mL, the answer is <strong>Stock volume</strong> = 2.5 mL, <strong>Diluent to add</strong> = 47.5 mL and <strong>Dilution factor</strong> = 20 ×.</li><li>With Stock concentration = 30 M, Final concentration = 0.5 M and Final volume = 100 mL, the answer is <strong>Stock volume</strong> = 1.67 mL, <strong>Diluent to add</strong> = 98.33 mL and <strong>Dilution factor</strong> = 60 ×.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Stock volume is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Stock concentration, Final concentration and Final volume measured, Stock volume and Diluent to add wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dog-chocolate-toxicity">Dog chocolate toxicity Calculator</a>, <a href="/biology/dog-coat-color">Dog Coat Colour Calculator</a> and <a href="/biology/dog-crate-size">Dog crate size</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Dilution Calculator (C1V1 = C2V2) is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Stock concentration, Final concentration and Final volume beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dilution Calculator (C1V1 = C2V2) calculator work out?', 'a' => <<<'TXT'
            Stock volume, Diluent to add and Dilution factor, from Final concentration, Final volume and Stock concentration. The relationship is Stock volume = Final concentration × Final volume ÷ Stock concentration.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Stock concentration (M), Final concentration (M), Final volume (mL). Enter stock concentration, final concentration and final volume; Stock volume is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Stock volume, Diluent to add and Dilution factor can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Stock volume = 5 mL, Diluent to add = 95 mL and Dilution factor = 20 ×. The figures come from Stock concentration as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Stock volume is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Stock concentration left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Stock volume keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-chocolate-toxicity', 'name' => 'Dog chocolate toxicity Calculator'],
            ['path' => '/biology/dog-coat-color', 'name' => 'Dog Coat Colour Calculator'],
            ['path' => '/biology/dog-crate-size', 'name' => 'Dog crate size'],
        ],
        'authors' => [],
    ],
];
