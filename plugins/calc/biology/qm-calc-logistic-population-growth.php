<?php

/**
 * Logistic Population Growth Calculator
 * /biology/logistic-population-growth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Logistic Population Growth Calculator',
    'meta' => ['title' => 'Logistic Population Growth Calculator — Biology', 'description' => 'Logistic Population Growth Calculator works out population after that time and growth rate at the start from starting population and carrying capacity.', 'h1' => 'Logistic Population Growth Calculator', 'updated' => '2026-10-29'],
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
                            'default' => '50',
                        ],
                        [
                            'name' => 'k',
                            'label' => 'Carrying capacity',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'r',
                            'label' => 'Intrinsic growth rate',
                            'type' => 'number',
                            'suffix' => 'per unit time',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.4',
                        ],
                        [
                            'name' => 't',
                            'label' => 'Time',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
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
                            'name' => 'growth',
                            'label' => 'Growth rate at the start',
                            'type' => 'number',
                            'suffix' => 'individuals/time',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'n_half',
                            'label' => 'Population at half of K',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 't_half',
                            'label' => 'Time to reach K/2',
                            'type' => 'number',
                            'suffix' => 'time units',
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
            'results' => ['n' => 'k/(1+((k-n0)/n0)*exp(-1*r*t))', 'growth' => 'r*n0*(1-n0/k)', 'n_half' => 'k/2', 't_half' => 'log((k/(k/2))-1)/((k-n0)/n0)/r'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Logistic Population Growth turns Starting population, Carrying capacity and Intrinsic growth rate into Population after that time and Growth rate at the start. The arithmetic is the whole method: population after that time is worked out from starting population by one formula, applied once. Population after that time comes back in individuals unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Logistic Population Growth calculator works', 'html' => <<<'TXT'
            <p>Logistic Population Growth answers one question from 4 numbers, and the answer is Population after that time, Growth rate at the start and Population at half of K.</p><p>The relationship it solves reads Population after that time = Carrying capacity ÷ (1 + ((Carrying capacity − Starting population) ÷ Starting population) × e^( − 1 × Intrinsic growth rate × Time)).</p><p>What comes back is Population after that time, Growth rate at the start, Population at half of K and Time to reach K/2 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Starting population</strong> — in individuals</li><li><strong>Carrying capacity</strong> — in individuals</li><li><strong>Intrinsic growth rate</strong> — in per unit time</li><li><strong>Time</strong> — a plain number, no unit</li></ul><p>What you get back is Population after that time in individuals, Growth rate at the start in individuals/time, Population at half of K in individuals, Time to reach K/2 in time units, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Starting population = 50 individuals, Carrying capacity = 1000 individuals, Intrinsic growth rate = 0.4 per unit time and Time = 10 — through the same formula and the panel reports <strong>Population after that time</strong> = 742 individuals, <strong>Growth rate at the start</strong> = 19 individuals/time, <strong>Population at half of K</strong> = 500 individuals and <strong>Time to reach K/2</strong> = 0 time units.</p><ul><li><strong>Population after that time</strong> = 742 individuals</li><li><strong>Growth rate at the start</strong> = 19 individuals/time</li><li><strong>Population at half of K</strong> = 500 individuals</li><li><strong>Time to reach K/2</strong> = 0 time units</li></ul><p>The line behind those figures is <strong>Population after that time</strong> = <code>Carrying capacity ÷ (1 + ((Carrying capacity − Starting population) ÷ Starting population) × e^( − 1 × Intrinsic growth rate × Time))</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Population after that time</strong> = 742, <strong>Growth rate at the start</strong> = 19, <strong>Population at half of K</strong> = 500 and <strong>Time to reach K/2</strong> = 0 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Population after that time takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Population after that time</strong> = <code>Carrying capacity ÷ (1 + ((Carrying capacity − Starting population) ÷ Starting population) × e^( − 1 × Intrinsic growth rate × Time))</code></li><li><strong>Growth rate at the start</strong> = <code>Intrinsic growth rate × Starting population × (1 − Starting population ÷ Carrying capacity)</code></li><li><strong>Population at half of K</strong> = <code>Carrying capacity ÷ 2</code></li><li><strong>Time to reach K/2</strong> = <code>ln((Carrying capacity ÷ (Carrying capacity ÷ 2)) − 1) ÷ ((Carrying capacity − Starting population) ÷ Starting population) ÷ Intrinsic growth rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Population after that time</strong> = <code>Carrying capacity ÷ (1 + ((Carrying capacity − Starting population) ÷ Starting population) × e^( − 1 × Intrinsic growth rate × Time))</code> — the form to use when Carrying capacity, Starting population, Intrinsic growth rate and Time are the values you have.</li><li><strong>Growth rate at the start</strong> = <code>Intrinsic growth rate × Starting population × (1 − Starting population ÷ Carrying capacity)</code> — the form to use when Intrinsic growth rate, Starting population and Carrying capacity are the values you have.</li><li><strong>Population at half of K</strong> = <code>Carrying capacity ÷ 2</code> — the form to use when Carrying capacity are the values you have.</li><li><strong>Time to reach K/2</strong> = <code>ln((Carrying capacity ÷ (Carrying capacity ÷ 2)) − 1) ÷ ((Carrying capacity − Starting population) ÷ Starting population) ÷ Intrinsic growth rate</code> — the form to use when Carrying capacity, Starting population and Intrinsic growth rate are the values you have.</li></ul><p>Any one of Population after that time, Growth rate at the start and Population at half of K can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Starting population, from 50 to 100 — and the answers go from <strong>Population after that time</strong> 742 individuals, <strong>Growth rate at the start</strong> 19 individuals/time, <strong>Population at half of K</strong> 500 individuals and <strong>Time to reach K/2</strong> 0 time units to <strong>Population after that time</strong> 858 individuals, <strong>Growth rate at the start</strong> 36 individuals/time, <strong>Population at half of K</strong> 500 individuals and <strong>Time to reach K/2</strong> 0 time units.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Population after that time, Growth rate at the start and Population at half of K are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Starting population left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Starting population is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Carrying capacity left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Carrying capacity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Intrinsic growth rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Intrinsic growth rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Starting population and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Logistic Population Growth form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Starting population</strong> is measured in individuals. It feeds Population after that time, Growth rate at the start and Time to reach K/2. Fill it from a measurement rather than a memory — Starting population is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Carrying capacity</strong> is measured in individuals. It feeds Population after that time, Growth rate at the start and Population at half of K. Fill it from a measurement rather than a memory — Carrying capacity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Intrinsic growth rate</strong> is measured in per unit time. It feeds Population after that time, Growth rate at the start and Time to reach K/2. Fill it from a measurement rather than a memory — Intrinsic growth rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Time</strong> takes a plain number with no unit attached. It feeds Population after that time. Fill it from a measurement rather than a memory — Time is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Population after that time</strong> is a plain number and the page's own defaults put it at 742. The value follows from Carrying capacity, Starting population, Intrinsic growth rate and Time. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Growth rate at the start</strong> is a plain number and the page's own defaults put it at 19. The value follows from Intrinsic growth rate, Starting population and Carrying capacity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Population at half of K</strong> is a plain number and the page's own defaults put it at 500. The value follows from Carrying capacity. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Time to reach K/2</strong> is a plain number and the page's own defaults put it at 0. The value follows from Carrying capacity, Starting population and Intrinsic growth rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Population after that time</th><th>Growth rate at the start</th><th>Population at half of K</th><th>Time to reach K/2</th></tr></thead><tbody><tr><td><strong>Starting population</strong> +10%</td><td>+2.53%</td><td>+9.42%</td><td>+0%</td><td>—</td></tr><tr><td><strong>Carrying capacity</strong> +10%</td><td>+7.09%</td><td>+0.48%</td><td>+10%</td><td>—</td></tr><tr><td><strong>Intrinsic growth rate</strong> +10%</td><td>+9.3%</td><td>+10%</td><td>+0%</td><td>—</td></tr><tr><td><strong>Time</strong> +10%</td><td>+9.3%</td><td>+0%</td><td>+0%</td><td>—</td></tr></tbody></table><p>Ranked by leverage, Intrinsic growth rate sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Starting population = 25 individuals, Carrying capacity = 500 individuals, Intrinsic growth rate = 0.2 per unit time and Time = 5 and the page reports <strong>Population after that time</strong> = 62.58 individuals, <strong>Growth rate at the start</strong> = 4.75 individuals/time, <strong>Population at half of K</strong> = 250 individuals and <strong>Time to reach K/2</strong> = 0 time units.</li><li>Feed in Starting population = 150 individuals, Carrying capacity = 1000 individuals, Intrinsic growth rate = 0.4 per unit time and Time = 10 and the page reports <strong>Population after that time</strong> = 906 individuals, <strong>Growth rate at the start</strong> = 51 individuals/time, <strong>Population at half of K</strong> = 500 individuals and <strong>Time to reach K/2</strong> = 0 time units.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Population after that time is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Starting population, Carrying capacity and Intrinsic growth rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Starting population, Carrying capacity and Intrinsic growth rate and the number you are missing is Population after that time and Growth rate at the start.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/plasmid-molar-ratio">Plasmid Molar Ratio Calculator</a>, <a href="/biology/potting-soil-calculator">Potting soil Calculator</a> and <a href="/biology/primer-dimer-checker">Primer Dimer Checker Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Logistic Population Growth calculator work out?', 'a' => <<<'TXT'
            Population after that time, Growth rate at the start, Population at half of K and Time to reach K/2, from Carrying capacity, Starting population, Intrinsic growth rate and Time. The relationship is Population after that time = Carrying capacity ÷ (1 + ((Carrying capacity − Starting population) ÷ Starting population) × e^( − 1 × Intrinsic growth rate × Time)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Starting population (individuals), Carrying capacity (individuals), Intrinsic growth rate (per unit time), Time. Fill starting population, carrying capacity and intrinsic growth rate and leave Population after that time empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Population after that time, Growth rate at the start, Population at half of K and Time to reach K/2 blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Population after that time = 742 individuals, Growth rate at the start = 19 individuals/time, Population at half of K = 500 individuals and Time to reach K/2 = 0 time units. That comes from the page's own defaults, entered in Starting population; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Population after that time is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Starting population blank and the page solves for it, reporting Population after that time instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Population after that time keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/plasmid-molar-ratio', 'name' => 'Plasmid Molar Ratio Calculator'],
            ['path' => '/biology/potting-soil-calculator', 'name' => 'Potting soil Calculator'],
            ['path' => '/biology/primer-dimer-checker', 'name' => 'Primer Dimer Checker Calculator'],
        ],
        'authors' => [],
    ],
];
