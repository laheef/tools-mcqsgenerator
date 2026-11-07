<?php

/**
 * Medullary Index Calculator
 * /biology/medullary-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Medullary Index Calculator',
    'meta' => ['title' => 'Medullary Index Calculator — Formula & Results', 'description' => 'Medullary Index takes Medulla diameter and Hair shaft diameter and returns Medullary index and Medullary index. It is a single relationship that reads…', 'h1' => 'Medullary Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'medulla',
                            'label' => 'Medulla diameter',
                            'type' => 'number',
                            'suffix' => 'µm',
                            'help' => 'Width of the central medulla',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'shaft',
                            'label' => 'Hair shaft diameter',
                            'type' => 'number',
                            'suffix' => 'µm',
                            'help' => 'Total width of the hair, cuticle to cuticle',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Medullary index',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'index_pct',
                            'label' => 'Medullary index',
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
            'title' => 'Medullary index',
            'results' => ['index' => 'medulla/shaft', 'index_pct' => 'medulla/shaft*100', 'medulla' => 'index*shaft', 'shaft' => 'medulla/index'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Medullary Index takes Medulla diameter and Hair shaft diameter and returns Medullary index and Medullary index. It is a single relationship that reads Medullary index out of Medulla diameter, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Medullary Index calculator works', 'html' => <<<'TXT'
            <p>Medullary Index answers one question from 2 numbers, and the answer is Medullary index and Medullary index.</p><p>Written with the labels from the form, Medullary index = Medulla diameter ÷ Hair shaft diameter.</p><p>The result panel carries Medullary index and Medullary index, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Medulla diameter</strong> — in µm. Width of the central medulla</li><li><strong>Hair shaft diameter</strong> — in µm. Total width of the hair, cuticle to cuticle</li></ul><p>The result boxes are Medullary index, Medullary index in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Medulla diameter = 8 µm and Hair shaft diameter = 70 µm gives &lt;strong&gt;Medullary index&lt;/strong&gt; = 0.1143 and &lt;strong&gt;Medullary index&lt;/strong&gt; = 11.43 %.</p><ul><li><strong>Medullary index</strong> = 0.1143</li><li><strong>Medullary index</strong> = 11.43 %</li></ul><p>The line behind those figures is <strong>Medullary index</strong> = <code>Medulla diameter ÷ Hair shaft diameter</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Medullary index&lt;/strong&gt; = 0.1143 and &lt;strong&gt;Medullary index&lt;/strong&gt; = 11.43 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Medullary index takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Medullary index</strong> = <code>Medulla diameter ÷ Hair shaft diameter</code></li><li><strong>Medulla diameter</strong> = <code>Medullary index × Hair shaft diameter</code></li><li><strong>Hair shaft diameter</strong> = <code>Medulla diameter ÷ Medullary index</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Medullary index</strong> = <code>Medulla diameter ÷ Hair shaft diameter</code> — the form to use when Medulla diameter and Hair shaft diameter are the values you have.</li><li><strong>Medullary index</strong> = <code>Medulla diameter ÷ Hair shaft diameter × 100</code> — the form to use when Medulla diameter and Hair shaft diameter are the values you have.</li><li><strong>Medulla diameter</strong> = <code>Medullary index × Hair shaft diameter</code> — the form to use when Medullary index and Hair shaft diameter are the values you have.</li><li><strong>Hair shaft diameter</strong> = <code>Medulla diameter ÷ Medullary index</code> — the form to use when Medulla diameter and Medullary index are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Medullary index, Medullary index and Medulla diameter can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Medulla diameter from 8 to 16, leaving every other box alone. The panel moves from &lt;strong&gt;Medullary index&lt;/strong&gt; 0.1143 and &lt;strong&gt;Medullary index&lt;/strong&gt; 11.43 % to &lt;strong&gt;Medullary index&lt;/strong&gt; 0.2286 and &lt;strong&gt;Medullary index&lt;/strong&gt; 22.86 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Medullary index and Medullary index are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Medulla diameter left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Medulla diameter is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Hair shaft diameter left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Hair shaft diameter is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Medulla diameter and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Medulla diameter</strong> is measured in µm. Width of the central medulla. The page reads it when it works out Medullary index, Medullary index and Hair shaft diameter. Have it to hand before you start: Medulla diameter is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hair shaft diameter</strong> is measured in µm. Total width of the hair, cuticle to cuticle. The page reads it when it works out Medullary index, Medullary index and Medulla diameter. Have it to hand before you start: Hair shaft diameter is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Medullary index</strong> is a plain number and the page's own defaults put it at 0.1143. The value follows from Medulla diameter and Hair shaft diameter. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Medullary index</strong> is a plain number and the page's own defaults put it at 11.43. The value follows from Medulla diameter and Hair shaft diameter. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Medullary index</th><th>Medullary index</th></tr></thead><tbody><tr><td><strong>Medulla diameter</strong> +10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Hair shaft diameter</strong> +10%</td><td>-9.09%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Medulla diameter sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Medulla diameter = 4 µm and Hair shaft diameter = 35 µm, the answer is <strong>Medullary index</strong> = 0.1143 and <strong>Medullary index</strong> = 11.43 %.</li><li>With Medulla diameter = 24 µm and Hair shaft diameter = 70 µm, the answer is <strong>Medullary index</strong> = 0.3429 and <strong>Medullary index</strong> = 34.29 %.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Medulla diameter and Hair shaft diameter. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Medulla diameter into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Medullary index with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Medullary index follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Medulla diameter and Hair shaft diameter and the number you are missing is Medullary index and Medullary index.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-harness-size">Dog harness size</a>, <a href="/biology/dog-heat-cycle">Dog heat cycle</a> and <a href="/biology/dog-life-expectancy">Dog life expectancy Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Medullary Index calculator work out?', 'a' => <<<'TXT'
            Medullary index and Medullary index, from Medulla diameter and Hair shaft diameter. The relationship is Medullary index = Medulla diameter ÷ Hair shaft diameter.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Medulla diameter (µm), Hair shaft diameter (µm). With medulla and shaft in place, Medullary index can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Medullary index, Medullary index, Medulla diameter and Hair shaft diameter can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Medullary index = 0.1143 and Medullary index = 11.43 %. That comes from the page's own defaults, entered in Medulla diameter; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Medullary index is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Medulla diameter left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Medullary index keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-harness-size', 'name' => 'Dog harness size'],
            ['path' => '/biology/dog-heat-cycle', 'name' => 'Dog heat cycle'],
            ['path' => '/biology/dog-life-expectancy', 'name' => 'Dog life expectancy Calculator'],
        ],
        'authors' => [],
    ],
];
