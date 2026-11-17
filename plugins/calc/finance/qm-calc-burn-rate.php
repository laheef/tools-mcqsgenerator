<?php

/**
 * Burn rate
 * /finance/burn-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Burn rate',
    'meta' => ['title' => 'Burn rate Calculator: Formula, Steps & Examples', 'description' => 'Burn rate turns initial balance, final balance and duration into cash runway. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Burn rate Calculator', 'updated' => '2024-05-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initial_balance',
                            'label' => 'Initial balance',
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
                            'name' => 'final_balance',
                            'label' => 'Final balance',
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
                            'name' => 'duration',
                            'label' => 'Duration',
                            'type' => 'number',
                            'help' => 'Time between your initial balance and final balance.',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Burn rate &amp; cash runway',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'burn_rate',
                            'label' => 'Burn rate',
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
                            'name' => 'cash_runway',
                            'label' => 'Cash runway',
                            'type' => 'number',
                            'help' => 'Time until your cash runs out.',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'burn_rate < 0', 'text' => 'Your company\'s cash seems to be increasing, so there is no cash burn problem.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'burn_rate = (initial_balance - final_balance) / duration ',
            'results' => ['burn_rate' => '(-final_balance + initial_balance)/duration', 'final_balance' => '-burn_rate*duration + initial_balance', 'duration' => '(-final_balance + initial_balance)/burn_rate', 'initial_balance' => 'burn_rate*duration + final_balance'],
        ],
        [
            'title' => 'cash_runway = final_balance / burn_rate',
            'results' => ['burn_rate' => 'final_balance/cash_runway', 'final_balance' => 'burn_rate*cash_runway', 'cash_runway' => 'final_balance/burn_rate'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Burn rate takes Initial balance, Final balance and Duration and returns Burn rate and Cash runway. The arithmetic is the whole method: burn rate is worked out from initial balance by one formula, applied once. Burn rate comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Burn rate calculator works', 'html' => <<<'TXT'
            <p>The Burn rate calculator applies one relationship to 3 numbers and reports Burn rate and Cash runway.</p><p>The relationship it solves reads Burn rate = ( − Final balance + Initial balance) ÷ Duration.</p><p>What comes back is Burn rate and Cash runway — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Initial balance</strong> — in USD</li><li><strong>Final balance</strong> — in USD</li><li><strong>Duration</strong> — in months. Time between your initial balance and final balance.</li></ul><p>The answers come back as Burn rate in USD, Cash runway in months. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Initial balance = 10 USD, Final balance = 100 USD and Duration = 1000 mos — through the same formula and the panel reports <strong>Burn rate</strong> = -0.09 USD and <strong>Cash runway</strong> = -1111 mos.</p><ul><li><strong>Burn rate</strong> = -0.09 USD</li><li><strong>Cash runway</strong> = -1111 mos</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Burn rate</strong> = <code>( − Final balance + Initial balance) ÷ Duration</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Burn rate</strong> = -0.09 and <strong>Cash runway</strong> = -1111 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Cash runway offers 5 units and opens on months, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Burn rate</strong> = <code>( − Final balance + Initial balance) ÷ Duration</code></li><li><strong>Final balance</strong> = <code>− Burn rate × Duration + Initial balance</code></li><li><strong>Duration</strong> = <code>( − Final balance + Initial balance) ÷ Burn rate</code></li><li><strong>Initial balance</strong> = <code>Burn rate × Duration + Final balance</code></li><li><strong>Cash runway</strong> = <code>Final balance ÷ Burn rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Burn rate</strong> = <code>( − Final balance + Initial balance) ÷ Duration</code> — the form to use when Final balance, Initial balance and Duration are the values you have.</li><li><strong>Final balance</strong> = <code>− Burn rate × Duration + Initial balance</code> — the form to use when Burn rate, Duration and Initial balance are the values you have.</li><li><strong>Duration</strong> = <code>( − Final balance + Initial balance) ÷ Burn rate</code> — the form to use when Final balance, Initial balance and Burn rate are the values you have.</li><li><strong>Initial balance</strong> = <code>Burn rate × Duration + Final balance</code> — the form to use when Burn rate, Duration and Final balance are the values you have.</li><li><strong>Cash runway</strong> = <code>Final balance ÷ Burn rate</code> — the form to use when Final balance and Burn rate are the values you have.</li><li><strong>Burn rate</strong> = <code>Final balance ÷ Cash runway</code> — the form to use when Final balance and Cash runway are the values you have.</li><li><strong>Final balance</strong> = <code>Burn rate × Cash runway</code> — the form to use when Burn rate and Cash runway are the values you have.</li></ul><p>Any one of Burn rate, Final balance and Duration can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Initial balance, from 10 to 20 — and the answers go from <strong>Burn rate</strong> -0.09 USD and <strong>Cash runway</strong> -1111 mos to <strong>Burn rate</strong> -0.08 USD and <strong>Cash runway</strong> -1250 mos.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Duration is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Burn rate and Cash runway are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Initial balance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial balance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Final balance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Final balance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial balance is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Burn rate form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial balance</strong> takes a plain number with no unit attached. Change it and Burn rate, Final balance and Duration changes with it. Fill it from a measurement rather than a memory — Initial balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Final balance</strong> takes a plain number with no unit attached. Change it and Burn rate, Duration and Initial balance changes with it. Fill it from a measurement rather than a memory — Final balance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Duration</strong> is a months quantity: the page opens it in mos and converts anything else you pick before the formula runs. Time between your initial balance and final balance. Change it and Burn rate, Final balance and Initial balance changes with it. Fill it from a measurement rather than a memory — Duration is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Burn rate</strong> is a plain number and the page's own defaults put it at -0.09. The value follows from Final balance, Initial balance and Duration. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Cash runway</strong> is a months figure and the page's own defaults put it at -1111 mos. The value follows from Final balance and Burn rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Burn rate</th><th>Cash runway</th></tr></thead><tbody><tr><td><strong>Initial balance</strong> +10%</td><td>+1.11%</td><td>-1.12%</td></tr><tr><td><strong>Final balance</strong> +10%</td><td>-11.11%</td><td>+1%</td></tr><tr><td><strong>Duration</strong> +10%</td><td>+9.09%</td><td>-10%</td></tr></tbody></table><p>Ranked by leverage, Final balance sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Initial balance = 5 USD, Final balance = 50 USD and Duration = 500 mos and the page reports <strong>Burn rate</strong> = -0.09 USD and <strong>Cash runway</strong> = -556 mos.</li><li>Feed in Initial balance = 30 USD, Final balance = 100 USD and Duration = 1000 mos and the page reports <strong>Burn rate</strong> = -0.07 USD and <strong>Cash runway</strong> = -1429 mos.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Burn rate actually offers.</p><ul><li><strong>months</strong> — opens in <em>mos</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Burn rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Initial balance, Final balance and Duration is what you already know and Burn rate and Cash runway is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/gmroi">GMROI</a>, <a href="/finance/gold-melt">Gold melt Calculator</a> and <a href="/finance/goodwill">Goodwill Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Burn rate calculator work out?', 'a' => 'Burn rate and Cash runway, from Final balance, Initial balance and Duration. The relationship is Burn rate = ( − Final balance + Initial balance) ÷ Duration.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial balance (USD), Final balance (USD), Duration (months). Enter initial balance, final balance and duration; Burn rate is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Burn rate, Final balance, Duration and Initial balance blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Burn rate = -0.09 USD and Cash runway = -1111 mos. The figures come from Initial balance as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Burn rate is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial balance blank and the page solves for it, reporting Burn rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Burn rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/gmroi', 'name' => 'GMROI'],
            ['path' => '/finance/gold-melt', 'name' => 'Gold melt Calculator'],
            ['path' => '/finance/goodwill', 'name' => 'Goodwill Calculator'],
        ],
        'authors' => [],
    ],
];
