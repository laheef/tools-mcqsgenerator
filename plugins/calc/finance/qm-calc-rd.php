<?php

/**
 * RD (recurring deposit)
 * /finance/rd
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'RD (recurring deposit)',
    'meta' => ['title' => 'RD (recurring deposit) — Free Online Calculator', 'description' => 'RD (recurring deposit) works out total deposits and total interest from monthly deposit and RD term. Every box can be solved for, not only the one in the title.', 'h1' => 'RD (recurring deposit) Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyDeposit',
                            'label' => 'Monthly deposit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rdTerm',
                            'label' => 'RD term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interestRate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_deposits',
                            'label' => 'Total deposits',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interest',
                            'label' => 'Total interest',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'maturity_amount',
                            'label' => 'Maturity amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'interest = monthlyDeposit * rdTerm * (rdTerm +1) * interestRate / 24',
            'results' => ['interest' => '(1/24)*interestRate*monthlyDeposit*rdTerm*(rdTerm + 1)', 'interestRate' => '24*interest/(monthlyDeposit*rdTerm*(rdTerm + 1))', 'monthlyDeposit' => '24*interest/(interestRate*rdTerm*(rdTerm + 1))', 'rdTerm' => '-1/2*(interestRate*monthlyDeposit + sqrt(interestRate*monthlyDeposit*(96*interest + interestRate*monthlyDeposit)))/(interestRate*monthlyDeposit)'],
        ],
        [
            'title' => 'maturity_amount = total_deposits + interest',
            'results' => ['interest' => 'maturity_amount - total_deposits', 'total_deposits' => '-interest + maturity_amount', 'maturity_amount' => 'interest + total_deposits'],
        ],
        [
            'title' => 'total_deposits = monthlyDeposit * rdTerm ',
            'results' => ['total_deposits' => 'monthlyDeposit*rdTerm', 'monthlyDeposit' => 'total_deposits/rdTerm', 'rdTerm' => 'total_deposits/monthlyDeposit'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        RD (recurring deposit) takes Monthly deposit, RD term and Interest rate and returns Total deposits and Total interest. The arithmetic is the whole method: total deposits is worked out from monthly deposit by one formula, applied once. Total deposits comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the RD (recurring deposit) calculator works', 'html' => <<<'TXT'
            <p>The RD (recurring deposit) calculator applies one relationship to 3 numbers and reports Total deposits, Total interest and Maturity amount.</p><p>The relationship it solves reads Total interest = (1 ÷ 24) × Interest rate × Monthly deposit × RD term × (RD term + 1).</p><p>What comes back is Total deposits, Total interest and Maturity amount — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Monthly deposit</strong> — in USD</li><li><strong>RD term</strong> — in years</li><li><strong>Interest rate</strong> — in percent</li></ul><p>The answers come back as Total deposits in USD, Total interest in USD, Maturity amount in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Monthly deposit = 10 USD, RD term = 100 yrs and Interest rate = 1000 perc — through the same formula and the panel reports <strong>Total interest</strong> = 0.0013 USD, <strong>Total deposits</strong> = 3.169e-5 USD and <strong>Maturity amount</strong> = 0.0014 USD.</p><ul><li><strong>Total interest</strong> = 0.0013 USD</li><li><strong>Total deposits</strong> = 3.169e-5 USD</li><li><strong>Maturity amount</strong> = 0.0014 USD</li></ul><p>That is <strong>Total interest</strong> = <code>(1 ÷ 24) × Interest rate × Monthly deposit × RD term × (RD term + 1)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Total interest</strong> = 0.0013, <strong>Total deposits</strong> = 3.169e-5 and <strong>Maturity amount</strong> = 0.0014 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: RD term offers 5 units and opens on years, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total interest</strong> = <code>(1 ÷ 24) × Interest rate × Monthly deposit × RD term × (RD term + 1)</code></li><li><strong>Interest rate</strong> = <code>24 × Total interest ÷ (Monthly deposit × RD term × (RD term + 1))</code></li><li><strong>Monthly deposit</strong> = <code>24 × Total interest ÷ (Interest rate × RD term × (RD term + 1))</code></li><li><strong>RD term</strong> = <code>− 1 ÷ 2 × (Interest rate × Monthly deposit + √(Interest rate × Monthly deposit × (96 × Total interest + Interest rate × Monthly deposit))) ÷ (Interest rate × Monthly deposit)</code></li><li><strong>Maturity amount</strong> = <code>Total interest + Total deposits</code></li><li><strong>Total deposits</strong> = <code>− Total interest + Maturity amount</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total interest</strong> = <code>(1 ÷ 24) × Interest rate × Monthly deposit × RD term × (RD term + 1)</code> — the form to use when Interest rate, Monthly deposit and RD term are the values you have.</li><li><strong>Interest rate</strong> = <code>24 × Total interest ÷ (Monthly deposit × RD term × (RD term + 1))</code> — the form to use when Total interest, Monthly deposit and RD term are the values you have.</li><li><strong>Monthly deposit</strong> = <code>24 × Total interest ÷ (Interest rate × RD term × (RD term + 1))</code> — the form to use when Total interest, Interest rate and RD term are the values you have.</li><li><strong>RD term</strong> = <code>− 1 ÷ 2 × (Interest rate × Monthly deposit + √(Interest rate × Monthly deposit × (96 × Total interest + Interest rate × Monthly deposit))) ÷ (Interest rate × Monthly deposit)</code> — the form to use when Interest rate, Monthly deposit and Total interest are the values you have.</li><li><strong>Maturity amount</strong> = <code>Total interest + Total deposits</code> — the form to use when Total interest and Total deposits are the values you have.</li><li><strong>Total interest</strong> = <code>Maturity amount − Total deposits</code> — the form to use when Maturity amount and Total deposits are the values you have.</li><li><strong>Total deposits</strong> = <code>− Total interest + Maturity amount</code> — the form to use when Total interest and Maturity amount are the values you have.</li><li><strong>Total deposits</strong> = <code>Monthly deposit × RD term</code> — the form to use when Monthly deposit and RD term are the values you have.</li></ul><p>Any one of Total interest, Interest rate and Monthly deposit can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Monthly deposit, from 10 to 20 — and the answers go from <strong>Total interest</strong> 0.0013 USD, <strong>Total deposits</strong> 3.169e-5 USD and <strong>Maturity amount</strong> 0.0014 USD to <strong>Total interest</strong> 0.0026 USD, <strong>Total deposits</strong> 6.338e-5 USD and <strong>Maturity amount</strong> 0.0027 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside RD term and Interest rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Total deposits, Total interest and Maturity amount are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Monthly deposit left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Monthly deposit is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>RD term left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If RD term is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Monthly deposit is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the RD (recurring deposit) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Monthly deposit</strong> takes a plain number with no unit attached. The page reads it when it works out Total interest, Interest rate and RD term. Fill it from a measurement rather than a memory — Monthly deposit is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>RD term</strong> is a years quantity: the page opens it in yrs and converts anything else you pick before the formula runs. The page reads it when it works out Total interest, Interest rate and Monthly deposit. Fill it from a measurement rather than a memory — RD term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Total interest, Monthly deposit and RD term. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total deposits</strong> is a plain number and the page's own defaults put it at 3.169e-5. The value follows from Total interest and Maturity amount. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total interest</strong> is a plain number and the page's own defaults put it at 0.0013. The value follows from Interest rate, Monthly deposit and RD term. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Maturity amount</strong> is a plain number and the page's own defaults put it at 0.0014. The value follows from Total interest and Total deposits. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total interest</th><th>Total deposits</th><th>Maturity amount</th></tr></thead><tbody><tr><td><strong>Monthly deposit</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>RD term</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Interest rate</strong> +10%</td><td>+10%</td><td>+0%</td><td>+9.77%</td></tr></tbody></table><p>Ranked by leverage, RD term sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Monthly deposit = 5 USD, RD term = 50 yrs and Interest rate = 500 perc and the page reports <strong>Total interest</strong> = 1.650e-4 USD, <strong>Total deposits</strong> = 7.922e-6 USD and <strong>Maturity amount</strong> = 1.730e-4 USD.</li><li>Feed in Monthly deposit = 30 USD, RD term = 100 yrs and Interest rate = 1000 perc and the page reports <strong>Total interest</strong> = 0.004 USD, <strong>Total deposits</strong> = 9.506e-5 USD and <strong>Maturity amount</strong> = 0.0041 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on RD (recurring deposit) actually offers.</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Total deposits is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover years and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Monthly deposit, RD term and Interest rate measured, Total deposits and Total interest wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/arm-mortgage">ARM mortgage Calculator</a>, <a href="/finance/arv">ARV Calculator</a> and <a href="/finance/attrition-rate">Attrition rate</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the RD (recurring deposit) calculator work out?', 'a' => <<<'TXT'
            Total deposits, Total interest and Maturity amount, from Interest rate, Monthly deposit and RD term. The relationship is Total interest = (1 ÷ 24) × Interest rate × Monthly deposit × RD term × (RD term + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Monthly deposit (USD), RD term (years), Interest rate (percent). Fill monthly deposit, RD term and interest rate and leave Total deposits empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total interest, Interest rate, Monthly deposit and RD term blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total interest = 0.0013 USD, Total deposits = 3.169e-5 USD and Maturity amount = 0.0014 USD. The figures come from Monthly deposit as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total deposits is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Monthly deposit blank and the page solves for it, reporting Total deposits instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total deposits keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/arm-mortgage', 'name' => 'ARM mortgage Calculator'],
            ['path' => '/finance/arv', 'name' => 'ARV Calculator'],
            ['path' => '/finance/attrition-rate', 'name' => 'Attrition rate'],
        ],
        'authors' => [],
    ],
];
