<?php

/**
 * Money multiplier
 * /finance/money-multiplier
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Money multiplier',
    'meta' => ['title' => 'Money multiplier Calculator: Free, With Steps', 'description' => 'Money multiplier works out bank reserves and monetary base from checkable Deposit, reserve ratio and currency in circulation. Any box can be the unknown.', 'h1' => 'Money multiplier Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Deposit',
                            'label' => 'Checkable Deposit',
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
                            'name' => 'Friction_reserves',
                            'label' => 'Reserve ratio',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Bank_reserves',
                            'label' => 'Bank reserves',
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
                            'name' => 'Currency',
                            'label' => 'Currency in circulation',
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
                            'name' => 'Monetary_base',
                            'label' => 'Monetary base',
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
                            'name' => 'Money_supply',
                            'label' => 'Money supply',
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
                            'name' => 'Money_multiplier',
                            'label' => 'Money multiplier',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Monetary_base = Currency + Bank_reserves',
            'results' => ['Bank_reserves' => '-Currency + Monetary_base', 'Monetary_base' => 'Bank_reserves + Currency', 'Currency' => '-Bank_reserves + Monetary_base'],
        ],
        [
            'title' => 'Bank_reserves = Friction_reserves * Deposit',
            'results' => ['Bank_reserves' => 'Deposit*Friction_reserves', 'Deposit' => 'Bank_reserves/Friction_reserves', 'Friction_reserves' => 'Bank_reserves/Deposit'],
        ],
        [
            'title' => 'Money_multiplier = Money_supply / Monetary_base',
            'results' => ['Money_supply' => 'Monetary_base*Money_multiplier', 'Monetary_base' => 'Money_supply/Money_multiplier', 'Money_multiplier' => 'Money_supply/Monetary_base'],
        ],
        [
            'title' => 'Money_supply = Deposit + Currency',
            'results' => ['Deposit' => '-Currency + Money_supply', 'Money_supply' => 'Currency + Deposit', 'Currency' => '-Deposit + Money_supply'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Money multiplier works out Checkable Deposit and Reserve ratio from Bank reserves and Currency in circulation. There is no hidden constant here: change checkable Deposit and bank reserves moves with it. The main result, Checkable Deposit, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Money multiplier calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Money multiplier: it takes 2 numbers and reports Checkable Deposit, Reserve ratio and Monetary base.</p><p>Written with the labels from the form, Monetary base = Bank reserves + Currency in circulation.</p><p>What comes back is Checkable Deposit, Reserve ratio, Monetary base and Money supply — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Bank reserves</strong> — in USD</li><li><strong>Currency in circulation</strong> — in USD</li></ul><p>The answers come back as Checkable Deposit in USD, Reserve ratio in percent, Monetary base in USD, Money supply in USD, Money multiplier. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Checkable Deposit = 10 USD, Reserve ratio = 10 perc, Currency in circulation = 1000 USD, Monetary base = 10 USD, Money supply = 100 USD and Money multiplier = 1000 — through the same formula and the panel reports <strong>Bank reserves</strong> = -990 USD.</p><ul><li><strong>Bank reserves</strong> = -990 USD</li></ul><p>The line behind those figures is <strong>Monetary base</strong> = <code>Bank reserves + Currency in circulation</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Bank reserves</strong> = -990. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Reserve ratio lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Monetary base</strong> = <code>Bank reserves + Currency in circulation</code></li><li><strong>Bank reserves</strong> = <code>− Currency in circulation + Monetary base</code></li><li><strong>Currency in circulation</strong> = <code>− Bank reserves + Monetary base</code></li><li><strong>Checkable Deposit</strong> = <code>Bank reserves ÷ Reserve ratio</code></li><li><strong>Reserve ratio</strong> = <code>Bank reserves ÷ Checkable Deposit</code></li><li><strong>Money multiplier</strong> = <code>Money supply ÷ Monetary base</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Monetary base</strong> = <code>Bank reserves + Currency in circulation</code> — the form to use when Bank reserves and Currency in circulation are the values you have.</li><li><strong>Bank reserves</strong> = <code>− Currency in circulation + Monetary base</code> — the form to use when Currency in circulation and Monetary base are the values you have.</li><li><strong>Currency in circulation</strong> = <code>− Bank reserves + Monetary base</code> — the form to use when Bank reserves and Monetary base are the values you have.</li><li><strong>Bank reserves</strong> = <code>Checkable Deposit × Reserve ratio</code> — the form to use when Checkable Deposit and Reserve ratio are the values you have.</li><li><strong>Checkable Deposit</strong> = <code>Bank reserves ÷ Reserve ratio</code> — the form to use when Bank reserves and Reserve ratio are the values you have.</li><li><strong>Reserve ratio</strong> = <code>Bank reserves ÷ Checkable Deposit</code> — the form to use when Bank reserves and Checkable Deposit are the values you have.</li><li><strong>Money multiplier</strong> = <code>Money supply ÷ Monetary base</code> — the form to use when Money supply and Monetary base are the values you have.</li><li><strong>Money supply</strong> = <code>Monetary base × Money multiplier</code> — the form to use when Monetary base and Money multiplier are the values you have.</li></ul><p>Any one of Monetary base, Bank reserves and Currency in circulation can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Checkable Deposit from 10 to 20, leaving every other box alone. The panel moves from <strong>Bank reserves</strong> -990 USD to <strong>Bank reserves</strong> -990 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Checkable Deposit, Reserve ratio and Monetary base are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Bank reserves left as a guess.</strong> Anything typed into Bank reserves is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Currency in circulation left as a guess.</strong> Anything typed into Currency in circulation is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Bank reserves is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Bank reserves</strong> takes a plain number with no unit attached. Change it and Monetary base, Currency in circulation and Checkable Deposit changes with it. Have it to hand before you start: Bank reserves is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Currency in circulation</strong> takes a plain number with no unit attached. Change it and Bank reserves, Monetary base and Checkable Deposit changes with it. Have it to hand before you start: Currency in circulation is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Checkable Deposit</strong> is a plain number. It is worked out from Bank reserves and Reserve ratio. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Reserve ratio</strong> is a percent figure. It is worked out from Bank reserves and Checkable Deposit. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monetary base</strong> is a plain number. It is worked out from Bank reserves and Currency in circulation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Money supply</strong> is a plain number. It is worked out from Monetary base and Money multiplier. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Money multiplier</strong> is a plain number. It is worked out from Money supply and Monetary base. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Bank reserves</th></tr></thead><tbody><tr><td><strong>Checkable Deposit</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Reserve ratio</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Currency in circulation</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Monetary base</strong> +10%</td><td>+0.1%</td></tr><tr><td><strong>Money supply</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Money multiplier</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Currency in circulation: ten per cent there moves an answer by about 10.1 per cent, which is why that is the number to measure twice. By contrast, Monetary base, Checkable Deposit and Reserve ratio barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Checkable Deposit = 5 USD, Reserve ratio = 5 perc, Currency in circulation = 500 USD, Monetary base = 5 USD, Money supply = 50 USD and Money multiplier = 500, the answer is <strong>Bank reserves</strong> = -495 USD.</li><li>With Checkable Deposit = 30 USD, Reserve ratio = 10 perc, Currency in circulation = 1000 USD, Monetary base = 10 USD, Money supply = 100 USD and Money multiplier = 1000, the answer is <strong>Bank reserves</strong> = -990 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Checkable Deposit is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Bank reserves and Currency in circulation is what you already know and Checkable Deposit and Reserve ratio is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/auto-loan">Auto loan</a>, <a href="/finance/average-collection">Average collection period Calculator</a> and <a href="/finance/adr">Average daily rate Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Money multiplier calculator work out?', 'a' => <<<'TXT'
            Checkable Deposit, Reserve ratio, Monetary base and Money supply, from Bank reserves and Currency in circulation. The relationship is Monetary base = Bank reserves + Currency in circulation.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Bank reserves (USD), Currency in circulation (USD). Enter bank reserves and currency in circulation; Checkable Deposit is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Monetary base, Bank reserves, Currency in circulation and Checkable Deposit blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Bank reserves = -990 USD. The figures come from Bank reserves as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Checkable Deposit is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Bank reserves left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Checkable Deposit keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/auto-loan', 'name' => 'Auto loan'],
            ['path' => '/finance/average-collection', 'name' => 'Average collection period Calculator'],
            ['path' => '/finance/adr', 'name' => 'Average daily rate Calculator'],
        ],
        'authors' => [],
    ],
];
