<?php

/**
 * Real estate commission w/ VAT
 * /finance/real-estate-commission-vat
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Real estate commission w/ VAT',
    'meta' => ['title' => 'Real estate commission w/ VAT — Formula & Results', 'description' => 'Real estate commission w/ VAT reports commission gross, owner receives, commission net and VAT amount. The formula is printed in the form\'s own words.', 'h1' => 'Real estate commission w/ VAT Calculator', 'updated' => '2024-07-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'House price',
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
                            'name' => 'commission',
                            'label' => 'Commission',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vat',
                            'label' => 'VAT rate',
                            'type' => 'number',
                            'help' => 'A value-added tax, known also as a goods and services tax (GST)',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'commission_gross',
                            'label' => 'Commission gross',
                            'type' => 'number',
                            'help' => 'Commission after VAT is applied.',
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
                            'name' => 'owner_receives',
                            'label' => 'Owner receives',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Net commission and VAT amount&nbsp;',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'commission_net',
                            'label' => 'Commission net',
                            'type' => 'number',
                            'help' => 'Commission before VAT is applied.',
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
                            'name' => 'vat_amount',
                            'label' => 'VAT amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'price - price * commission * (vat+1) = owner_receives',
            'results' => ['commission' => '(-owner_receives + price)/(price*(vat + 1))', 'vat' => '(-commission*price - owner_receives + price)/(commission*price)', 'owner_receives' => 'price*(-commission*vat - commission + 1)', 'price' => '-owner_receives/(commission*vat + commission - 1)'],
        ],
        [
            'title' => 'commission_gross = price * commission * (vat+1)',
            'results' => ['commission' => 'commission_gross/(price*(vat + 1))', 'vat' => '-1 + commission_gross/(commission*price)', 'commission_gross' => 'commission*price*(vat + 1)', 'price' => 'commission_gross/(commission*(vat + 1))'],
        ],
        [
            'title' => 'commission_net = price * commission',
            'results' => ['commission' => 'commission_net/price', 'commission_net' => 'commission*price', 'price' => 'commission_net/commission'],
        ],
        [
            'title' => 'vat_amount = commission_net * vat',
            'results' => ['vat_amount' => 'commission_net*vat', 'commission_net' => 'vat_amount/vat', 'vat' => 'vat_amount/commission_net'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Real estate commission w/ VAT turns House price, Commission and VAT rate into Commission gross and Owner receives. There is no hidden constant here: change commission gross and house price moves with it. The main result, Commission gross, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Real estate commission w/ VAT calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Real estate commission w/ VAT: it takes 3 numbers and reports Commission gross, Owner receives and Commission net.</p><p>In the form&#039;s own words, Commission = ( − Owner receives + House price) ÷ (House price × (VAT rate + 1)).</p><p>The result panel carries Commission gross, Owner receives, Commission net and VAT amount, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>House price</strong> — in USD</li><li><strong>Commission</strong> — in percent</li><li><strong>VAT rate</strong> — in percent. A value-added tax, known also as a goods and services tax (GST)</li></ul><p>The answers come back as Commission gross in USD, Owner receives in USD, Commission net in USD, VAT amount in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — House price = 10 USD, Commission = 100 perc and VAT rate = 1000 perc — through the same formula and the panel reports <strong>Owner receives</strong> = -1.001e+6 USD, <strong>Commission gross</strong> = 1.001e+6 USD, <strong>Commission net</strong> = 1000 USD and <strong>VAT amount</strong> = 1.000e+6 USD.</p><ul><li><strong>Owner receives</strong> = -1.001e+6 USD</li><li><strong>Commission gross</strong> = 1.001e+6 USD</li><li><strong>Commission net</strong> = 1000 USD</li><li><strong>VAT amount</strong> = 1.000e+6 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Commission</strong> = <code>( − Owner receives + House price) ÷ (House price × (VAT rate + 1))</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Owner receives</strong> = -1.001e+6, <strong>Commission gross</strong> = 1.001e+6, <strong>Commission net</strong> = 1000 and <strong>VAT amount</strong> = 1.000e+6 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Commission offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Commission</strong> = <code>( − Owner receives + House price) ÷ (House price × (VAT rate + 1))</code></li><li><strong>VAT rate</strong> = <code>( − Commission × House price − Owner receives + House price) ÷ (Commission × House price)</code></li><li><strong>Owner receives</strong> = <code>House price × ( − Commission × VAT rate − Commission + 1)</code></li><li><strong>House price</strong> = <code>− Owner receives ÷ (Commission × VAT rate + Commission − 1)</code></li><li><strong>Commission gross</strong> = <code>Commission × House price × (VAT rate + 1)</code></li><li><strong>Commission net</strong> = <code>Commission × House price</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Commission</strong> = <code>( − Owner receives + House price) ÷ (House price × (VAT rate + 1))</code> — the form to use when Owner receives, House price and VAT rate are the values you have.</li><li><strong>VAT rate</strong> = <code>( − Commission × House price − Owner receives + House price) ÷ (Commission × House price)</code> — the form to use when Commission, House price and Owner receives are the values you have.</li><li><strong>Owner receives</strong> = <code>House price × ( − Commission × VAT rate − Commission + 1)</code> — the form to use when House price, Commission and VAT rate are the values you have.</li><li><strong>House price</strong> = <code>− Owner receives ÷ (Commission × VAT rate + Commission − 1)</code> — the form to use when Owner receives, Commission and VAT rate are the values you have.</li><li><strong>Commission gross</strong> = <code>Commission × House price × (VAT rate + 1)</code> — the form to use when Commission, House price and VAT rate are the values you have.</li><li><strong>Commission</strong> = <code>Commission gross ÷ (House price × (VAT rate + 1))</code> — the form to use when Commission gross, House price and VAT rate are the values you have.</li><li><strong>VAT rate</strong> = <code>− 1 + Commission gross ÷ (Commission × House price)</code> — the form to use when Commission gross, Commission and House price are the values you have.</li><li><strong>House price</strong> = <code>Commission gross ÷ (Commission × (VAT rate + 1))</code> — the form to use when Commission gross, Commission and VAT rate are the values you have.</li></ul><p>Any one of Commission, VAT rate and Owner receives can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double House price from 10 to 20, leaving every other box alone. The panel moves from <strong>Owner receives</strong> -1.001e+6 USD, <strong>Commission gross</strong> 1.001e+6 USD, <strong>Commission net</strong> 1000 USD and <strong>VAT amount</strong> 1.000e+6 USD to <strong>Owner receives</strong> -2.002e+6 USD, <strong>Commission gross</strong> 2.002e+6 USD, <strong>Commission net</strong> 2000 USD and <strong>VAT amount</strong> 2.000e+6 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Commission and VAT rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Commission gross, Owner receives and Commission net are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>House price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If House price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Commission left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Commission is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in House price and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>House price</strong> takes a plain number with no unit attached. Change it and Commission, VAT rate and Owner receives changes with it. Have it to hand before you start: House price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Commission</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and VAT rate, Owner receives and House price changes with it. Have it to hand before you start: Commission is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>VAT rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. A value-added tax, known also as a goods and services tax (GST). Change it and Commission, Owner receives and House price changes with it. Have it to hand before you start: VAT rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Commission gross</strong> is a plain number and the page's own defaults put it at 1.001e+6. It is computed from Commission, House price and VAT rate, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Owner receives</strong> is a plain number and the page's own defaults put it at -1.001e+6. It is computed from House price, Commission and VAT rate, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Commission net</strong> is a plain number and the page's own defaults put it at 1000. It is computed from Commission and House price, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>VAT amount</strong> is a plain number and the page's own defaults put it at 1.000e+6. It is computed from Commission net and VAT rate, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Owner receives</th><th>Commission gross</th><th>Commission net</th><th>VAT amount</th></tr></thead><tbody><tr><td><strong>House price</strong> +10%</td><td>-10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Commission</strong> +10%</td><td>-10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>VAT rate</strong> +10%</td><td>-9.99%</td><td>+9.99%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Commission sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With House price = 5 USD, Commission = 50 perc and VAT rate = 500 perc, the answer is <strong>Owner receives</strong> = -125245 USD, <strong>Commission gross</strong> = 125250 USD, <strong>Commission net</strong> = 250 USD and <strong>VAT amount</strong> = 125000 USD.</li><li>With House price = 30 USD, Commission = 100 perc and VAT rate = 1000 perc, the answer is <strong>Owner receives</strong> = -3.003e+6 USD, <strong>Commission gross</strong> = 3.003e+6 USD, <strong>Commission net</strong> = 3000 USD and <strong>VAT amount</strong> = 3.000e+6 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Commission gross follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes House price, Commission and VAT rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when House price, Commission and VAT rate is what you already know and Commission gross and Owner receives is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/tax-bracket">Tax bracket Calculator</a>, <a href="/finance/taxable-equivalent-yield">Taxable equivalent yield Calculator</a> and <a href="/finance/taylor-rule">Taylor rule Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Real estate commission w/ VAT calculator work out?', 'a' => <<<'TXT'
            Commission gross, Owner receives, Commission net and VAT amount, from Owner receives, House price and VAT rate. The relationship is Commission = ( − Owner receives + House price) ÷ (House price × (VAT rate + 1)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            House price (USD), Commission (percent), VAT rate (percent). Fill house price, commission and VAT rate and leave Commission gross empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Commission, VAT rate, Owner receives and House price blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Owner receives = -1.001e+6 USD, Commission gross = 1.001e+6 USD, Commission net = 1000 USD and VAT amount = 1.000e+6 USD. Those are the defaults written into the form — move House price and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Commission gross is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With House price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Commission gross keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/tax-bracket', 'name' => 'Tax bracket Calculator'],
            ['path' => '/finance/taxable-equivalent-yield', 'name' => 'Taxable equivalent yield Calculator'],
            ['path' => '/finance/taylor-rule', 'name' => 'Taylor rule Calculator'],
        ],
        'authors' => [],
    ],
];
