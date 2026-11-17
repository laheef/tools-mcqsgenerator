<?php

/**
 * Fisher effect
 * /finance/fisher-effect
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fisher effect',
    'meta' => ['title' => 'Fisher effect Calculator — Formula & Results', 'description' => 'Fisher effect takes expected inflation and real interest rate and returns nominal interest rate. Results come back in perc, with any other unit a click away.', 'h1' => 'Fisher effect Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nominal_int_rate',
                            'label' => 'Nominal interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'exp_inflation',
                            'label' => 'Expected inflation',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'real_interest_rate',
                            'label' => 'Real interest rate',
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
            'title' => 'nominal_int_rate = real_interest_rate + exp_inflation',
            'results' => ['nominal_int_rate' => 'exp_inflation + real_interest_rate', 'real_interest_rate' => '-exp_inflation + nominal_int_rate', 'exp_inflation' => 'nominal_int_rate - real_interest_rate'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fisher effect takes Expected inflation and Real interest rate and returns Nominal interest rate. The arithmetic is the whole method: nominal interest rate is worked out from expected inflation by one formula, applied once. Nominal interest rate comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Fisher effect calculator works', 'html' => <<<'TXT'
            <p>The Fisher effect calculator applies one relationship to 2 numbers and reports Nominal interest rate.</p><p>The relationship it solves reads Nominal interest rate = Expected inflation + Real interest rate.</p><p>What comes back is Nominal interest rate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Expected inflation</strong> — in percent</li><li><strong>Real interest rate</strong> — in percent</li></ul><p>The answer comes back as Nominal interest rate in percent. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Expected inflation = 10 perc and Real interest rate = 100 perc; the answers are <strong>Nominal interest rate</strong> = 110 perc.</p><ul><li><strong>Nominal interest rate</strong> = 110 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Nominal interest rate</strong> = <code>Expected inflation + Real interest rate</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Nominal interest rate</strong> = 110 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Nominal interest rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Nominal interest rate</strong> = <code>Expected inflation + Real interest rate</code></li><li><strong>Real interest rate</strong> = <code>− Expected inflation + Nominal interest rate</code></li><li><strong>Expected inflation</strong> = <code>Nominal interest rate − Real interest rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Nominal interest rate</strong> = <code>Expected inflation + Real interest rate</code> — the form to use when Expected inflation and Real interest rate are the values you have.</li><li><strong>Real interest rate</strong> = <code>− Expected inflation + Nominal interest rate</code> — the form to use when Expected inflation and Nominal interest rate are the values you have.</li><li><strong>Expected inflation</strong> = <code>Nominal interest rate − Real interest rate</code> — the form to use when Nominal interest rate and Real interest rate are the values you have.</li></ul><p>Any one of Nominal interest rate, Real interest rate and Expected inflation can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Expected inflation, from 10 to 20 — and the answers go from <strong>Nominal interest rate</strong> 110 perc to <strong>Nominal interest rate</strong> 120 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Expected inflation and Real interest rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Nominal interest rate is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Expected inflation left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Expected inflation is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Real interest rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Real interest rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Expected inflation to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Expected inflation</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Nominal interest rate and Real interest rate. Have it to hand before you start: Expected inflation is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Real interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Nominal interest rate and Expected inflation. Have it to hand before you start: Real interest rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Nominal interest rate</strong> is a percent figure and the page's own defaults put it at 110 perc. It is computed from Expected inflation and Real interest rate, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Nominal interest rate</th></tr></thead><tbody><tr><td><strong>Expected inflation</strong> +10%</td><td>+0.91%</td></tr><tr><td><strong>Real interest rate</strong> +10%</td><td>+9.09%</td></tr></tbody></table><p>Ranked by leverage, Real interest rate sits at the top — a ten per cent error in that box shows up as roughly 9.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Expected inflation = 5 perc and Real interest rate = 50 perc, the answer is <strong>Nominal interest rate</strong> = 55 perc.</li><li>With Expected inflation = 30 perc and Real interest rate = 100 perc, the answer is <strong>Nominal interest rate</strong> = 130 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Expected inflation and Real interest rate. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Expected inflation into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Nominal interest rate in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Nominal interest rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Expected inflation and Real interest rate and the number you are missing is Nominal interest rate.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/cpm">CPM Calculator</a>, <a href="/finance/credit-card-interest">Credit card interest Calculator</a> and <a href="/finance/credit-card-minimum-payment">Credit card minimum payment Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fisher effect calculator work out?', 'a' => 'Nominal interest rate, from Expected inflation and Real interest rate. The relationship is Nominal interest rate = Expected inflation + Real interest rate.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Expected inflation (percent), Real interest rate (percent). Fill expected inflation and real interest rate and leave Nominal interest rate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Nominal interest rate, Real interest rate and Expected inflation blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Nominal interest rate = 110 perc. That comes from the page\'s own defaults, entered in Expected inflation; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Nominal interest rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Expected inflation left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Nominal interest rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/cpm', 'name' => 'CPM Calculator'],
            ['path' => '/finance/credit-card-interest', 'name' => 'Credit card interest Calculator'],
            ['path' => '/finance/credit-card-minimum-payment', 'name' => 'Credit card minimum payment Calculator'],
        ],
        'authors' => [],
    ],
];
