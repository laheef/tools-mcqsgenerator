<?php

/**
 * Berger–Parker Index Calculator
 * /biology/berger-parker-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Berger–Parker Index Calculator',
    'meta' => ['title' => 'Berger–Parker Index Calculator — Formula & Results', 'description' => <<<'TXT'
    Berger–Parker Index turns Count of the commonest species and Total individuals into Berger–Parker index d and Reciprocal 1/d. It is a single relationship that…
    TXT, 'h1' => 'Berger–Parker Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'dominant',
                            'label' => 'Count of the commonest species',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total individuals',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '400',
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Berger–Parker index d',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'reciprocal',
                            'label' => 'Reciprocal 1/d',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dominance',
                            'label' => 'Dominance',
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
            'title' => 'Dominance',
            'results' => ['index' => 'dominant/total', 'reciprocal' => 'total/dominant', 'dominance' => 'dominant/total*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Berger–Parker Index turns Count of the commonest species and Total individuals into Berger–Parker index d and Reciprocal 1/d. It is a single relationship that reads Berger–Parker index d out of Count of the commonest species, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Berger–Parker Index calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Berger–Parker Index: it takes 2 numbers and reports Berger–Parker index d, Reciprocal 1/d and Dominance.</p><p>The relationship it solves reads Berger–Parker index d = Count of the commonest species ÷ Total individuals.</p><p>The result panel carries Berger–Parker index d, Reciprocal 1/d and Dominance, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Count of the commonest species</strong> — in individuals</li><li><strong>Total individuals</strong> — in individuals</li></ul><p>What you get back is Berger–Parker index d, Reciprocal 1/d, Dominance in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Count of the commonest species = 120 individuals and Total individuals = 400 individuals gives &lt;strong&gt;Berger–Parker index d&lt;/strong&gt; = 0.3, &lt;strong&gt;Reciprocal 1/d&lt;/strong&gt; = 3.33 and &lt;strong&gt;Dominance&lt;/strong&gt; = 30 %.</p><ul><li><strong>Berger–Parker index d</strong> = 0.3</li><li><strong>Reciprocal 1/d</strong> = 3.33</li><li><strong>Dominance</strong> = 30 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Berger–Parker index d</strong> = <code>Count of the commonest species ÷ Total individuals</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Berger–Parker index d&lt;/strong&gt; = 0.3, &lt;strong&gt;Reciprocal 1/d&lt;/strong&gt; = 3.33 and &lt;strong&gt;Dominance&lt;/strong&gt; = 30 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Berger–Parker index d takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Berger–Parker index d</strong> = <code>Count of the commonest species ÷ Total individuals</code></li><li><strong>Reciprocal 1/d</strong> = <code>Total individuals ÷ Count of the commonest species</code></li><li><strong>Dominance</strong> = <code>Count of the commonest species ÷ Total individuals × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Berger–Parker index d</strong> = <code>Count of the commonest species ÷ Total individuals</code> — the form to use when Count of the commonest species and Total individuals are the values you have.</li><li><strong>Reciprocal 1/d</strong> = <code>Total individuals ÷ Count of the commonest species</code> — the form to use when Total individuals and Count of the commonest species are the values you have.</li><li><strong>Dominance</strong> = <code>Count of the commonest species ÷ Total individuals × 100</code> — the form to use when Count of the commonest species and Total individuals are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Berger–Parker index d, Reciprocal 1/d and Dominance can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Count of the commonest species from 120 to 240, leaving every other box alone. The panel moves from &lt;strong&gt;Berger–Parker index d&lt;/strong&gt; 0.3, &lt;strong&gt;Reciprocal 1/d&lt;/strong&gt; 3.33 and &lt;strong&gt;Dominance&lt;/strong&gt; 30 % to &lt;strong&gt;Berger–Parker index d&lt;/strong&gt; 0.6, &lt;strong&gt;Reciprocal 1/d&lt;/strong&gt; 1.67 and &lt;strong&gt;Dominance&lt;/strong&gt; 60 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Berger–Parker index d, Reciprocal 1/d and Dominance are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Count of the commonest species left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Count of the commonest species is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total individuals left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total individuals is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Count of the commonest species to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Berger–Parker Index form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Count of the commonest species</strong> is measured in individuals. Change it and Berger–Parker index d, Reciprocal 1/d and Dominance changes with it. Fill it from a measurement rather than a memory — Count of the commonest species is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total individuals</strong> is measured in individuals. Change it and Berger–Parker index d, Reciprocal 1/d and Dominance changes with it. Fill it from a measurement rather than a memory — Total individuals is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Berger–Parker index d</strong> is a plain number and the page's own defaults put it at 0.3. It is worked out from Count of the commonest species and Total individuals. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Reciprocal 1/d</strong> is a plain number and the page's own defaults put it at 3.33. It is worked out from Total individuals and Count of the commonest species. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Dominance</strong> is a plain number and the page's own defaults put it at 30. It is worked out from Count of the commonest species and Total individuals. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Berger–Parker index d</th><th>Reciprocal 1/d</th><th>Dominance</th></tr></thead><tbody><tr><td><strong>Count of the commonest species</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>+10%</td></tr><tr><td><strong>Total individuals</strong> +10%</td><td>-9.09%</td><td>+10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Count of the commonest species sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Count of the commonest species = 60 individuals and Total individuals = 200 individuals and the page reports <strong>Berger–Parker index d</strong> = 0.3, <strong>Reciprocal 1/d</strong> = 3.33 and <strong>Dominance</strong> = 30 %.</li><li>Feed in Count of the commonest species = 360 individuals and Total individuals = 400 individuals and the page reports <strong>Berger–Parker index d</strong> = 0.9, <strong>Reciprocal 1/d</strong> = 1.11 and <strong>Dominance</strong> = 90 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Berger–Parker index d follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Count of the commonest species and Total individuals measured, Berger–Parker index d and Reciprocal 1/d wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dog-bmi">Dog BMI Calculator</a>, <a href="/biology/dog-calorie">Dog calorie Calculator</a> and <a href="/biology/dog-chocolate-toxicity">Dog chocolate toxicity Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Berger–Parker Index is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Count of the commonest species and Total individuals beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Berger–Parker Index calculator work out?', 'a' => <<<'TXT'
            Berger–Parker index d, Reciprocal 1/d and Dominance, from Count of the commonest species and Total individuals. The relationship is Berger–Parker index d = Count of the commonest species ÷ Total individuals.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Count of the commonest species (individuals), Total individuals (individuals). Fill dominant and total and leave Berger–Parker index d empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Berger–Parker index d, Reciprocal 1/d and Dominance can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Berger–Parker index d = 0.3, Reciprocal 1/d = 3.33 and Dominance = 30 %. That comes from the page's own defaults, entered in Count of the commonest species; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Berger–Parker index d is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Count of the commonest species blank and the page solves for it, reporting Berger–Parker index d instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Berger–Parker index d keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-bmi', 'name' => 'Dog BMI Calculator'],
            ['path' => '/biology/dog-calorie', 'name' => 'Dog calorie Calculator'],
            ['path' => '/biology/dog-chocolate-toxicity', 'name' => 'Dog chocolate toxicity Calculator'],
        ],
        'authors' => [],
    ],
];
