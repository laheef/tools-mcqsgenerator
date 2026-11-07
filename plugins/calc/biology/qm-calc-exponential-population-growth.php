<?php

/**
 * Exponential Population Growth Calculator
 * /biology/exponential-population-growth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Exponential Population Growth Calculator',
    'meta' => ['title' => 'Exponential Population Growth Calculator — Biology', 'description' => <<<'TXT'
    Exponential Population Growth takes Starting population, Growth rate and Time and returns Population after that time and Increase. The arithmetic is the whole…
    TXT, 'h1' => 'Exponential Population Growth Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'n0',
                            'label' => 'Starting population',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'r',
                            'label' => 'Growth rate',
                            'type' => 'number',
                            'suffix' => 'per year',
                            'help' => '0.05 = 5% a year',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.05',
                        ],
                        [
                            'name' => 't',
                            'label' => 'Time',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Population after that time',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fold',
                            'label' => 'Increase',
                            'type' => 'number',
                            'suffix' => '×',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'doubling',
                            'label' => 'Doubling time',
                            'type' => 'number',
                            'suffix' => 'years',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'target_time',
                            'label' => 'Time to reach 10× the start',
                            'type' => 'number',
                            'suffix' => 'years',
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
            'title' => 'Growth',
            'results' => ['n' => 'n0*exp(r*t)', 'fold' => 'exp(r*t)', 'doubling' => '0.6931471805599453/r', 'target_time' => 'log(10)/r'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Exponential Population Growth takes Starting population, Growth rate and Time and returns Population after that time and Increase. The arithmetic is the whole method: Population after that time is worked out from Starting population by one formula, applied once. Population after that time comes back in individuals unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Exponential Population Growth calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Exponential Population Growth: it takes 3 numbers and reports Population after that time, Increase and Doubling time.</p><p>The relationship it solves reads Population after that time = Starting population × e^(Growth rate × Time).</p><p>What comes back is Population after that time, Increase, Doubling time and Time to reach 10× the start — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Starting population</strong> — in individuals</li><li><strong>Growth rate</strong> — in per year. 0.05 = 5% a year</li><li><strong>Time</strong> — in years</li></ul><p>What you get back is Population after that time in individuals, Increase in ×, Doubling time in years, Time to reach 10× the start in years, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Starting population = 100 individuals, Growth rate = 0.05 per year and Time = 20 years gives &lt;strong&gt;Population after that time&lt;/strong&gt; = 272 individuals, &lt;strong&gt;Increase&lt;/strong&gt; = 2.72 ×, &lt;strong&gt;Doubling time&lt;/strong&gt; = 13.86 years and &lt;strong&gt;Time to reach 10× the start&lt;/strong&gt; = 46.05 years.</p><ul><li><strong>Population after that time</strong> = 272 individuals</li><li><strong>Increase</strong> = 2.72 ×</li><li><strong>Doubling time</strong> = 13.86 years</li><li><strong>Time to reach 10× the start</strong> = 46.05 years</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Population after that time</strong> = <code>Starting population × e^(Growth rate × Time)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Population after that time&lt;/strong&gt; = 272, &lt;strong&gt;Increase&lt;/strong&gt; = 2.72, &lt;strong&gt;Doubling time&lt;/strong&gt; = 13.86 and &lt;strong&gt;Time to reach 10× the start&lt;/strong&gt; = 46.05 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Population after that time takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Population after that time</strong> = <code>Starting population × e^(Growth rate × Time)</code></li><li><strong>Increase</strong> = <code>e^(Growth rate × Time)</code></li><li><strong>Doubling time</strong> = <code>0.6931471805599453 ÷ Growth rate</code></li><li><strong>Time to reach 10× the start</strong> = <code>ln(10) ÷ Growth rate</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Population after that time</strong> = <code>Starting population × e^(Growth rate × Time)</code> — the form to use when Starting population, Growth rate and Time are the values you have.</li><li><strong>Increase</strong> = <code>e^(Growth rate × Time)</code> — the form to use when Growth rate and Time are the values you have.</li><li><strong>Doubling time</strong> = <code>0.6931471805599453 ÷ Growth rate</code> — the form to use when Growth rate are the values you have.</li><li><strong>Time to reach 10× the start</strong> = <code>ln(10) ÷ Growth rate</code> — the form to use when Growth rate are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Population after that time, Increase and Doubling time can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Starting population, from 100 to 200 — and the answers go from &lt;strong&gt;Population after that time&lt;/strong&gt; 272 individuals, &lt;strong&gt;Increase&lt;/strong&gt; 2.72 ×, &lt;strong&gt;Doubling time&lt;/strong&gt; 13.86 years and &lt;strong&gt;Time to reach 10× the start&lt;/strong&gt; 46.05 years to &lt;strong&gt;Population after that time&lt;/strong&gt; 544 individuals, &lt;strong&gt;Increase&lt;/strong&gt; 2.72 ×, &lt;strong&gt;Doubling time&lt;/strong&gt; 13.86 years and &lt;strong&gt;Time to reach 10× the start&lt;/strong&gt; 46.05 years.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Population after that time, Increase and Doubling time are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Starting population left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Starting population is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Growth rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Growth rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Time left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Time is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Starting population and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Exponential Population Growth form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Starting population</strong> is measured in individuals. The page reads it when it works out Population after that time. Fill it from a measurement rather than a memory — Starting population is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Growth rate</strong> is measured in per year. 0.05 = 5% a year. The page reads it when it works out Population after that time, Increase and Doubling time. Fill it from a measurement rather than a memory — Growth rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Time</strong> is measured in years. The page reads it when it works out Population after that time and Increase. Fill it from a measurement rather than a memory — Time is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Population after that time</strong> is a plain number and the page's own defaults put it at 272. It is computed from Starting population, Growth rate and Time, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Increase</strong> is a plain number and the page's own defaults put it at 2.72. It is computed from Growth rate and Time, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Doubling time</strong> is a plain number and the page's own defaults put it at 13.86. It is computed from Growth rate, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Time to reach 10× the start</strong> is a plain number and the page's own defaults put it at 46.05. It is computed from Growth rate, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Population after that time</th><th>Increase</th><th>Doubling time</th><th>Time to reach 10× the start</th></tr></thead><tbody><tr><td><strong>Starting population</strong> +10%</td><td>+10%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Growth rate</strong> +10%</td><td>+10.52%</td><td>+10.52%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Time</strong> +10%</td><td>+10.52%</td><td>+10.52%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Growth rate sits at the top — a ten per cent error in that box shows up as roughly 10.5 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Starting population = 50 individuals, Growth rate = 0.025 per year and Time = 10 years and the page reports <strong>Population after that time</strong> = 64.2 individuals, <strong>Increase</strong> = 1.28 ×, <strong>Doubling time</strong> = 27.73 years and <strong>Time to reach 10× the start</strong> = 92.1 years.</li><li>Feed in Starting population = 300 individuals, Growth rate = 0.05 per year and Time = 20 years and the page reports <strong>Population after that time</strong> = 815 individuals, <strong>Increase</strong> = 2.72 ×, <strong>Doubling time</strong> = 13.86 years and <strong>Time to reach 10× the start</strong> = 46.05 years.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Population after that time is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Starting population, Growth rate and Time are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Starting population, Growth rate and Time measured, Population after that time and Increase wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-onion-toxicity">Dog onion toxicity</a>, <a href="/biology/dog-pregnancy">Dog pregnancy Calculator</a> and <a href="/biology/dog-quality-of-life">Dog quality of life</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Exponential Population Growth calculator work out?', 'a' => <<<'TXT'
            Population after that time, Increase, Doubling time and Time to reach 10× the start, from Starting population, Growth rate and Time. The relationship is Population after that time = Starting population × e^(Growth rate × Time).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Starting population (individuals), Growth rate (per year), Time (years). Enter n0, r and t; Population after that time is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Population after that time, Increase, Doubling time and Time to reach 10× the start can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Population after that time = 272 individuals, Increase = 2.72 ×, Doubling time = 13.86 years and Time to reach 10× the start = 46.05 years. Those are the defaults written into the form — move Starting population and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Population after that time is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Starting population blank and the page solves for it, reporting Population after that time instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Population after that time keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-onion-toxicity', 'name' => 'Dog onion toxicity'],
            ['path' => '/biology/dog-pregnancy', 'name' => 'Dog pregnancy Calculator'],
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
        ],
        'authors' => [],
    ],
];
