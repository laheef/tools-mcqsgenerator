<?php

/**
 * Dividend
 * /finance/dividend
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dividend',
    'meta' => ['title' => 'Dividend Calculator — Formula, Units & Example', 'description' => 'Dividend works out final balance and overall growth and reports both. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Dividend Calculator', 'updated' => '2026-09-18'],
    'sections' => [
        [
            'title' => 'Dividend settings',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stock_price',
                            'label' => 'Share price',
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
                            'name' => 'dividend',
                            'label' => 'Annual dividend per share',
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
                            'name' => 'initial_balance',
                            'label' => 'Money invested',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'years',
                            'label' => 'Number of years',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compound_frequency',
                            'label' => 'Compound frequency',
                            'type' => 'select',
                            'options' => [
                                'Yearly' => '1.000000000000000',
                                'Half-yearly' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Weekly' => '52.177500000000000',
                                'Daily' => '365.242000000000000',
                            ],
                            'dataset' => 'compound frequency',
                            'control' => 'DROPDOWN',
                            'help' => 'How often the interest is added.',
                            'default' => 'Yearly',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Investment results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dividend_yield',
                            'label' => 'Dividend yield',
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
                            'name' => 'final_balance',
                            'label' => 'Final balance',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'overall_growth',
                            'label' => 'Overall growth',
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
                            'name' => 'dividend_amount',
                            'label' => 'Profit from dividends',
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
            'title' => 'final_balance = initial_balance *one_way( (1 + dividend_yield / compound_frequency)^(compound_frequency * years))',
            'results' => ['initial_balance' => 'final_balance/(pow((compound_frequency + dividend_yield)/compound_frequency, compound_frequency*years))', 'final_balance' => 'initial_balance*(pow((compound_frequency + dividend_yield)/compound_frequency, compound_frequency*years))'],
        ],
        [
            'title' => 'overall_growth = (final_balance - initial_balance) / initial_balance',
            'results' => ['final_balance' => 'initial_balance*(overall_growth + 1)', 'overall_growth' => '(final_balance - initial_balance)/initial_balance', 'initial_balance' => 'final_balance/(overall_growth + 1)'],
        ],
        [
            'title' => 'dividend_yield = dividend / stock_price ',
            'results' => ['stock_price' => 'dividend/dividend_yield', 'dividend_yield' => 'dividend/stock_price', 'dividend' => 'dividend_yield*stock_price'],
        ],
        [
            'title' => 'dividend_amount = final_balance - initial_balance',
            'results' => ['final_balance' => 'dividend_amount + initial_balance', 'initial_balance' => '-dividend_amount + final_balance', 'dividend_amount' => 'final_balance - initial_balance'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dividend turns Money invested, Number of years and Compound frequency into Share price and Annual dividend per share. It is a single relationship that reads share price out of money invested, not a table of canned results keyed by them. Units for Share price default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Dividend calculator works', 'html' => <<<'TXT'
            <p>Dividend answers one question from 4 numbers, and the answer is Share price, Annual dividend per share and Final balance.</p><p>The relationship it solves reads Final balance = Money invested × (((Compound frequency + Dividend yield) ÷ Compound frequency)^(Compound frequency × Number of years)).</p><p>What comes back is Share price, Annual dividend per share, Final balance and Overall growth — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Money invested</strong> — in USD</li><li><strong>Number of years</strong> — a plain number, no unit</li><li><strong>Compound frequency</strong> — a plain number, no unit. How often the interest is added.</li><li><strong>Dividend yield</strong> — in percent</li></ul><p>What you get back is Share price in USD, Annual dividend per share in USD, Final balance in USD, Overall growth in percent, Profit from dividends in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Overall growth offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Final balance</strong> = <code>Money invested × (((Compound frequency + Dividend yield) ÷ Compound frequency)^(Compound frequency × Number of years))</code></li><li><strong>Money invested</strong> = <code>Final balance ÷ (((Compound frequency + Dividend yield) ÷ Compound frequency)^(Compound frequency × Number of years))</code></li><li><strong>Overall growth</strong> = <code>(Final balance − Money invested) ÷ Money invested</code></li><li><strong>Dividend yield</strong> = <code>Annual dividend per share ÷ Share price</code></li><li><strong>Share price</strong> = <code>Annual dividend per share ÷ Dividend yield</code></li><li><strong>Annual dividend per share</strong> = <code>Dividend yield × Share price</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Final balance</strong> = <code>Money invested × (((Compound frequency + Dividend yield) ÷ Compound frequency)^(Compound frequency × Number of years))</code> — the form to use when Money invested, Compound frequency, Dividend yield and Number of years are the values you have.</li><li><strong>Money invested</strong> = <code>Final balance ÷ (((Compound frequency + Dividend yield) ÷ Compound frequency)^(Compound frequency × Number of years))</code> — the form to use when Final balance, Compound frequency, Dividend yield and Number of years are the values you have.</li><li><strong>Overall growth</strong> = <code>(Final balance − Money invested) ÷ Money invested</code> — the form to use when Final balance and Money invested are the values you have.</li><li><strong>Final balance</strong> = <code>Money invested × (Overall growth + 1)</code> — the form to use when Money invested and Overall growth are the values you have.</li><li><strong>Money invested</strong> = <code>Final balance ÷ (Overall growth + 1)</code> — the form to use when Final balance and Overall growth are the values you have.</li><li><strong>Dividend yield</strong> = <code>Annual dividend per share ÷ Share price</code> — the form to use when Annual dividend per share and Share price are the values you have.</li><li><strong>Share price</strong> = <code>Annual dividend per share ÷ Dividend yield</code> — the form to use when Annual dividend per share and Dividend yield are the values you have.</li><li><strong>Annual dividend per share</strong> = <code>Dividend yield × Share price</code> — the form to use when Dividend yield and Share price are the values you have.</li></ul><p>Any one of Final balance, Money invested and Overall growth can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Dividend yield is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Share price, Annual dividend per share and Final balance are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Money invested left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Money invested is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of years left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of years is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Money invested and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Money invested</strong> takes a plain number with no unit attached. It feeds Final balance, Overall growth and Profit from dividends. Have it to hand before you start: Money invested is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of years</strong> takes a plain number with no unit attached. It feeds Money invested and Final balance. Have it to hand before you start: Number of years is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Compound frequency</strong> takes a plain number with no unit attached. How often the interest is added. It feeds Money invested and Final balance. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Compound frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dividend yield</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Money invested, Final balance and Share price. Have it to hand before you start: Dividend yield is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Share price</strong> is a plain number. It is computed from Annual dividend per share and Dividend yield, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Annual dividend per share</strong> is a plain number. It is computed from Dividend yield and Share price, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Final balance</strong> is a plain number. It is computed from Money invested, Compound frequency, Dividend yield and Number of years, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Overall growth</strong> is a percent figure. It is computed from Final balance and Money invested, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Profit from dividends</strong> is a plain number. It is computed from Final balance and Money invested, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Share price is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Money invested, Number of years and Compound frequency is what you already know and Share price and Annual dividend per share is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/forward-rate">Forward rate Calculator</a>, <a href="/finance/free-cash-flow">Free cash flow Calculator</a> and <a href="/finance/free-cash-flow-to-equity">Free cash flow to equity (FCFE) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dividend calculator work out?', 'a' => <<<'TXT'
            Share price, Annual dividend per share, Final balance and Overall growth, from Money invested, Compound frequency, Dividend yield and Number of years. The relationship is Final balance = Money invested × (((Compound frequency + Dividend yield) ÷ Compound frequency)^(Compound frequency × Number of years)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Money invested (USD), Number of years, Compound frequency, Dividend yield (percent). Fill money invested, number of years and compound frequency and leave Share price empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Final balance, Money invested, Overall growth and Dividend yield blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Share price is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Money invested left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Share price at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/forward-rate', 'name' => 'Forward rate Calculator'],
            ['path' => '/finance/free-cash-flow', 'name' => 'Free cash flow Calculator'],
            ['path' => '/finance/free-cash-flow-to-equity', 'name' => 'Free cash flow to equity (FCFE) Calculator'],
        ],
        'authors' => [],
    ],
];
