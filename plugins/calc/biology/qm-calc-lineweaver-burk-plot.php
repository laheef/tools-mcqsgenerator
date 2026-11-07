<?php

/**
 * Lineweaver-Burk Plot / Km & Vmax Calculator
 * /biology/lineweaver-burk-plot
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lineweaver-Burk Plot / Km & Vmax Calculator',
    'meta' => ['title' => 'Lineweaver-Burk Plot / Km & Vmax Calculator', 'description' => <<<'TXT'
    Lineweaver-Burk Plot / Km & Vmax turns Substrate concentration 1, Initial velocity 1 and Substrate concentration 2 into Vmax and Km. A result box can be typed…
    TXT, 'h1' => 'Lineweaver-Burk Plot / Km & Vmax Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 's1',
                            'label' => 'Substrate concentration 1',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'v1',
                            'label' => 'Initial velocity 1',
                            'type' => 'number',
                            'suffix' => 'µmol/min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.35',
                        ],
                        [
                            'name' => 's2',
                            'label' => 'Substrate concentration 2',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'v2',
                            'label' => 'Initial velocity 2',
                            'type' => 'number',
                            'suffix' => 'µmol/min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.62',
                        ],
                        [
                            'name' => 'vmax',
                            'label' => 'Vmax',
                            'type' => 'number',
                            'suffix' => 'µmol/min',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'km',
                            'label' => 'Km',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kcat_km',
                            'label' => 'Vmax/Km',
                            'type' => 'number',
                            'suffix' => 'µmol/min/mM',
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
            'title' => 'Kinetics',
            'results' => ['vmax' => '1/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1))', 'km' => '(((1/v2)-(1/v1))/((1/s2)-(1/s1)))/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1))', 'kcat_km' => '1/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1))/((((1/v2)-(1/v1))/((1/s2)-(1/s1)))/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1)))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Lineweaver-Burk Plot / Km & Vmax turns Substrate concentration 1, Initial velocity 1 and Substrate concentration 2 into Vmax and Km. Nothing is looked up on this page: Vmax is computed from Substrate concentration 1 and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Vmax is opened in µmol/min; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Lineweaver-Burk Plot / Km & Vmax calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Lineweaver-Burk Plot / Km &amp; Vmax: it takes 4 numbers and reports Vmax, Km and Vmax/Km.</p><p>The relationship it solves reads Vmax = 1 ÷ ((1 ÷ Initial velocity 1) − (((1 ÷ Initial velocity 2) − (1 ÷ Initial velocity 1)) ÷ ((1 ÷ Substrate concentration 2) − (1 ÷ Substrate concentration 1))) × (1 ÷ Substrate concentration 1)).</p><p>What comes back is Vmax, Km and Vmax/Km — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Substrate concentration 1</strong> — in mM</li><li><strong>Initial velocity 1</strong> — in µmol/min</li><li><strong>Substrate concentration 2</strong> — in mM</li><li><strong>Initial velocity 2</strong> — in µmol/min</li></ul><p>What you get back is Vmax in µmol/min, Km in mM, Vmax/Km in µmol/min/mM, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Substrate concentration 1 = 0.5 mM, Initial velocity 1 = 0.35 µmol/min, Substrate concentration 2 = 2 mM and Initial velocity 2 = 0.62 µmol/min — through the same formula and the panel reports &lt;strong&gt;Vmax&lt;/strong&gt; = 0.8346 µmol/min, &lt;strong&gt;Km&lt;/strong&gt; = 0.6923 mM and &lt;strong&gt;Vmax/Km&lt;/strong&gt; = 1.21 µmol/min/mM.</p><ul><li><strong>Vmax</strong> = 0.8346 µmol/min</li><li><strong>Km</strong> = 0.6923 mM</li><li><strong>Vmax/Km</strong> = 1.21 µmol/min/mM</li></ul><p>That is <strong>Vmax</strong> = <code>1 ÷ ((1 ÷ Initial velocity 1) − (((1 ÷ Initial velocity 2) − (1 ÷ Initial velocity 1)) ÷ ((1 ÷ Substrate concentration 2) − (1 ÷ Substrate concentration 1))) × (1 ÷ Substrate concentration 1))</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Vmax&lt;/strong&gt; = 0.8346, &lt;strong&gt;Km&lt;/strong&gt; = 0.6923 and &lt;strong&gt;Vmax/Km&lt;/strong&gt; = 1.21 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Vmax takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Vmax</strong> = <code>1 ÷ ((1 ÷ Initial velocity 1) − (((1 ÷ Initial velocity 2) − (1 ÷ Initial velocity 1)) ÷ ((1 ÷ Substrate concentration 2) − (1 ÷ Substrate concentration 1))) × (1 ÷ Substrate concentration 1))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Vmax</strong> = <code>1 ÷ ((1 ÷ Initial velocity 1) − (((1 ÷ Initial velocity 2) − (1 ÷ Initial velocity 1)) ÷ ((1 ÷ Substrate concentration 2) − (1 ÷ Substrate concentration 1))) × (1 ÷ Substrate concentration 1))</code> — the form to use when Initial velocity 1, Initial velocity 2, Substrate concentration 2 and Substrate concentration 1 are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Vmax, Km and Vmax/Km can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Substrate concentration 1, from 0.5 to 1 — and the answers go from &lt;strong&gt;Vmax&lt;/strong&gt; 0.8346 µmol/min, &lt;strong&gt;Km&lt;/strong&gt; 0.6923 mM and &lt;strong&gt;Vmax/Km&lt;/strong&gt; 1.21 µmol/min/mM to &lt;strong&gt;Vmax&lt;/strong&gt; 2.71 µmol/min, &lt;strong&gt;Km&lt;/strong&gt; 6.75 mM and &lt;strong&gt;Vmax/Km&lt;/strong&gt; 0.4019 µmol/min/mM.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Vmax, Km and Vmax/Km are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Substrate concentration 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Substrate concentration 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Initial velocity 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial velocity 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Substrate concentration 2 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Substrate concentration 2 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Substrate concentration 1 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Substrate concentration 1</strong> is measured in mM. Change it and Vmax, Km and Vmax/Km changes with it. Have it to hand before you start: Substrate concentration 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Initial velocity 1</strong> is measured in µmol/min. Change it and Vmax, Km and Vmax/Km changes with it. Have it to hand before you start: Initial velocity 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Substrate concentration 2</strong> is measured in mM. Change it and Vmax, Km and Vmax/Km changes with it. Have it to hand before you start: Substrate concentration 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Initial velocity 2</strong> is measured in µmol/min. Change it and Vmax, Km and Vmax/Km changes with it. Have it to hand before you start: Initial velocity 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Vmax</strong> is a plain number and the page's own defaults put it at 0.8346. It is computed from Initial velocity 1, Initial velocity 2, Substrate concentration 2 and Substrate concentration 1, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Km</strong> is a plain number and the page's own defaults put it at 0.6923. It is computed from Initial velocity 2, Initial velocity 1, Substrate concentration 2 and Substrate concentration 1, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Vmax/Km</strong> is a plain number and the page's own defaults put it at 1.21. It is computed from Initial velocity 1, Initial velocity 2, Substrate concentration 2 and Substrate concentration 1, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Vmax</th><th>Km</th><th>Vmax/Km</th></tr></thead><tbody><tr><td><strong>Substrate concentration 1</strong> +10%</td><td>+5.01%</td><td>+19.5%</td><td>-12.12%</td></tr><tr><td><strong>Initial velocity 1</strong> +10%</td><td>-6.74%</td><td>-26.21%</td><td>+26.38%</td></tr><tr><td><strong>Substrate concentration 2</strong> +10%</td><td>-3.91%</td><td>-6.74%</td><td>+3.03%</td></tr><tr><td><strong>Initial velocity 2</strong> +10%</td><td>+19.5%</td><td>+33.58%</td><td>-10.54%</td></tr></tbody></table><p>Ranked by leverage, Initial velocity 2 sits at the top — a ten per cent error in that box shows up as roughly 33.6 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Substrate concentration 1 = 0.25 mM, Initial velocity 1 = 0.175 µmol/min, Substrate concentration 2 = 1 mM and Initial velocity 2 = 0.31 µmol/min, the answer is <strong>Vmax</strong> = 0.4173 µmol/min, <strong>Km</strong> = 0.3462 mM and <strong>Vmax/Km</strong> = 1.21 µmol/min/mM.</li><li>With Substrate concentration 1 = 1.5 mM, Initial velocity 1 = 0.35 µmol/min, Substrate concentration 2 = 2 mM and Initial velocity 2 = 0.62 µmol/min, the answer is <strong>Vmax</strong> = -0.4717 µmol/min, <strong>Km</strong> = -3.52 mM and <strong>Vmax/Km</strong> = 0.134 µmol/min/mM.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Vmax follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Substrate concentration 1, Initial velocity 1 and Substrate concentration 2 measured, Vmax and Km wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/hardy-weinberg-recessive-homozygote">Hardy–Weinberg from the Recessive Homozygote Frequency Calcula</a>, <a href="/biology/hatch-rate">Hatch Rate Calculator</a> and <a href="/biology/height-to-finger-length">Height to Finger Length Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lineweaver-Burk Plot / Km & Vmax calculator work out?', 'a' => <<<'TXT'
            Vmax, Km and Vmax/Km, from Initial velocity 1, Initial velocity 2, Substrate concentration 2 and Substrate concentration 1. The relationship is Vmax = 1 ÷ ((1 ÷ Initial velocity 1) − (((1 ÷ Initial velocity 2) − (1 ÷ Initial velocity 1)) ÷ ((1 ÷ Substrate concentration 2) − (1 ÷ Substrate concentration 1))) × (1 ÷ Substrate concentration 1)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Substrate concentration 1 (mM), Initial velocity 1 (µmol/min), Substrate concentration 2 (mM), Initial velocity 2 (µmol/min). Enter s1, v1 and s2; Vmax is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Vmax, Km and Vmax/Km can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Vmax = 0.8346 µmol/min, Km = 0.6923 mM and Vmax/Km = 1.21 µmol/min/mM. Those are the defaults written into the form — move Substrate concentration 1 and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Vmax is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Substrate concentration 1 left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Vmax keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/hardy-weinberg-recessive-homozygote', 'name' => 'Hardy–Weinberg from the Recessive Homozygote Frequency Calcula'],
            ['path' => '/biology/hatch-rate', 'name' => 'Hatch Rate Calculator'],
            ['path' => '/biology/height-to-finger-length', 'name' => 'Height to Finger Length Calculator'],
        ],
        'authors' => [],
    ],
];
