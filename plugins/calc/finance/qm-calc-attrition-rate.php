<?php

/**
 * Attrition rate
 * /finance/attrition-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Attrition rate',
    'meta' => ['title' => 'Attrition rate Calculator — Formula & Results', 'description' => 'Enter employees at the start and employees at the end and get attrition rate back. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Attrition rate Calculator', 'updated' => '2026-09-22'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'start_empl',
                            'label' => 'Employees at the start',
                            'type' => 'number',
                            'help' => 'The number of people employed at the beginning of the period.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'end_empl',
                            'label' => 'Employees at the end',
                            'type' => 'number',
                            'help' => 'The number of people employed at the end of the period.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'left_empl',
                            'label' => 'Employees that left',
                            'type' => 'number',
                            'help' => 'The number of people that left during the period.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'attrition_rate',
                            'label' => 'Attrition rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'attrition_rate = (left_empl / ((start_empl + end_empl)/2))',
            'results' => ['start_empl' => '-end_empl + 2*left_empl/attrition_rate', 'left_empl' => '(1/2)*attrition_rate*(end_empl + start_empl)', 'attrition_rate' => '2*left_empl/(end_empl + start_empl)', 'end_empl' => '-start_empl + 2*left_empl/attrition_rate'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Attrition rate turns Employees at the start, Employees at the end and Employees that left into Attrition rate. Nothing is looked up on this page: attrition rate is computed from employees at the start and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Attrition rate is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Attrition rate calculator works', 'html' => <<<'TXT'
            <p>The Attrition rate calculator applies one relationship to 3 numbers and reports Attrition rate.</p><p>Written with the labels from the form, Attrition rate = 2 × Employees that left ÷ (Employees at the end + Employees at the start).</p><p>The result panel carries Attrition rate, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Employees at the start</strong> — a plain number, no unit. The number of people employed at the beginning of the period.</li><li><strong>Employees at the end</strong> — a plain number, no unit. The number of people employed at the end of the period.</li><li><strong>Employees that left</strong> — a plain number, no unit. The number of people that left during the period.</li></ul><p>The result box is Attrition rate in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Employees at the start = 10, Employees at the end = 100 and Employees that left = 1000 — through the same formula and the panel reports <strong>Attrition rate</strong> = 18.18 perc.</p><ul><li><strong>Attrition rate</strong> = 18.18 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Attrition rate</strong> = <code>2 × Employees that left ÷ (Employees at the end + Employees at the start)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Attrition rate</strong> = 18.18 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Attrition rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Attrition rate</strong> = <code>2 × Employees that left ÷ (Employees at the end + Employees at the start)</code></li><li><strong>Employees at the start</strong> = <code>− Employees at the end + 2 × Employees that left ÷ Attrition rate</code></li><li><strong>Employees that left</strong> = <code>(1 ÷ 2) × Attrition rate × (Employees at the end + Employees at the start)</code></li><li><strong>Employees at the end</strong> = <code>− Employees at the start + 2 × Employees that left ÷ Attrition rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Attrition rate</strong> = <code>2 × Employees that left ÷ (Employees at the end + Employees at the start)</code> — the form to use when Employees that left, Employees at the end and Employees at the start are the values you have.</li><li><strong>Employees at the start</strong> = <code>− Employees at the end + 2 × Employees that left ÷ Attrition rate</code> — the form to use when Employees at the end, Employees that left and Attrition rate are the values you have.</li><li><strong>Employees that left</strong> = <code>(1 ÷ 2) × Attrition rate × (Employees at the end + Employees at the start)</code> — the form to use when Attrition rate, Employees at the end and Employees at the start are the values you have.</li><li><strong>Employees at the end</strong> = <code>− Employees at the start + 2 × Employees that left ÷ Attrition rate</code> — the form to use when Employees at the start, Employees that left and Attrition rate are the values you have.</li></ul><p>Any one of Attrition rate, Employees at the start and Employees that left can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Employees at the start, from 10 to 20 — and the answers go from <strong>Attrition rate</strong> 18.18 perc to <strong>Attrition rate</strong> 16.67 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Attrition rate is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Employees at the start left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Employees at the start is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Employees at the end left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Employees at the end is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Employees that left left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Employees that left is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Employees at the start is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Attrition rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Employees at the start</strong> takes a plain number with no unit attached. The number of people employed at the beginning of the period. The page reads it when it works out Employees that left, Attrition rate and Employees at the end. Fill it from a measurement rather than a memory — Employees at the start is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Employees at the end</strong> takes a plain number with no unit attached. The number of people employed at the end of the period. The page reads it when it works out Employees at the start, Employees that left and Attrition rate. Fill it from a measurement rather than a memory — Employees at the end is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Employees that left</strong> takes a plain number with no unit attached. The number of people that left during the period. The page reads it when it works out Employees at the start, Attrition rate and Employees at the end. Fill it from a measurement rather than a memory — Employees that left is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Attrition rate</strong> is a percent figure and the page's own defaults put it at 18.18 perc. It is computed from Employees that left, Employees at the end and Employees at the start, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Attrition rate</th></tr></thead><tbody><tr><td><strong>Employees at the start</strong> +10%</td><td>-0.9%</td></tr><tr><td><strong>Employees at the end</strong> +10%</td><td>-8.33%</td></tr><tr><td><strong>Employees that left</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Employees that left sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Employees at the start = 5, Employees at the end = 50 and Employees that left = 500 and the page reports <strong>Attrition rate</strong> = 18.18 perc.</li><li>Feed in Employees at the start = 30, Employees at the end = 100 and Employees that left = 1000 and the page reports <strong>Attrition rate</strong> = 15.38 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Attrition rate actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Attrition rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Employees at the start, Employees at the end and Employees that left are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Employees at the start, Employees at the end and Employees that left is what you already know and Attrition rate is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/mortgage-payoff">Mortgage payoff Calculator</a>, <a href="/finance/mortgage-penalty">Mortgage penalty Calculator</a> and <a href="/finance/mortgage-points">Mortgage points Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Attrition rate calculator work out?', 'a' => <<<'TXT'
            Attrition rate, from Employees that left, Employees at the end and Employees at the start. The relationship is Attrition rate = 2 × Employees that left ÷ (Employees at the end + Employees at the start).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Employees at the start, Employees at the end, Employees that left. Enter employees at the start, employees at the end and employees that left; Attrition rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Attrition rate, Employees at the start, Employees that left and Employees at the end blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Attrition rate = 18.18 perc. The figures come from Employees at the start as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Attrition rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Employees at the start blank and the page solves for it, reporting Attrition rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Attrition rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/mortgage-payoff', 'name' => 'Mortgage payoff Calculator'],
            ['path' => '/finance/mortgage-penalty', 'name' => 'Mortgage penalty Calculator'],
            ['path' => '/finance/mortgage-points', 'name' => 'Mortgage points Calculator'],
        ],
        'authors' => [],
    ],
];
