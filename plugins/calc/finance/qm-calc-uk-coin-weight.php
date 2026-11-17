<?php

/**
 * UK coin weight
 * /finance/uk-coin-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'UK coin weight',
    'meta' => ['title' => 'UK coin weight Calculator — Formula & Results', 'description' => 'UK coin weight takes 1p coins, 2p coins and 5p coins and returns weight. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'UK coin weight Calculator', 'updated' => '2025-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'pen1',
                            'label' => '1p coins',
                            'type' => 'number',
                            'help' => 'Enter the number of 1p coins.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'pen2',
                            'label' => '2p coins',
                            'type' => 'number',
                            'help' => 'Enter the number of 2p coins.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'pen5',
                            'label' => '5p coins',
                            'type' => 'number',
                            'help' => 'Enter the number of 5p coins.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'pen10',
                            'label' => '10p coins',
                            'type' => 'number',
                            'help' => 'Enter the number of 10p coins.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'pen20',
                            'label' => '20p coins',
                            'type' => 'number',
                            'help' => 'Enter the number of 20p coins.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'pen50',
                            'label' => '50p coins',
                            'type' => 'number',
                            'help' => 'Enter the number of 50p coins.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'pen100',
                            'label' => '£1 coins',
                            'type' => 'number',
                            'help' => 'Enter the number of £1 coins.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'pen200',
                            'label' => '£2 coins',
                            'type' => 'number',
                            'help' => 'Enter the number of £2 coins.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight',
                            'type' => 'number',
                            'help' => 'The total weight of your coins.',
                            'unit' => '22',
                            'unit_default' => 'g',
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
            'title' => 'pen1*3.56+pen2*7.12+pen5*3.25+pen10*6.5+pen20*5+pen50*8+pen100*8.75+pen200*12=weight*1000',
            'results' => [
                'pen100' => '-356/875*pen1 - 26/35*pen10 - 712/875*pen2 - 4/7*pen20 - 48/35*pen200 - 13/35*pen5 - 32/35*pen50 + (800/7)*weight',
                'pen1' => '-325/178*pen10 - 875/356*pen100 - 2*pen2 - 125/89*pen20 - 300/89*pen200 - 325/356*pen5 - 200/89*pen50 + (25000/89)*weight',
                'pen50' => '-89/200*pen1 - 13/16*pen10 - 35/32*pen100 - 89/100*pen2 - 5/8*pen20 - 3/2*pen200 - 13/32*pen5 + 125*weight',
                'pen20' => '-89/125*pen1 - 13/10*pen10 - 7/4*pen100 - 178/125*pen2 - 12/5*pen200 - 13/20*pen5 - 8/5*pen50 + 200*weight',
                'weight' => '(89/25000)*pen1 + (13/2000)*pen10 + (7/800)*pen100 + (89/12500)*pen2 + (1/200)*pen20 + (3/250)*pen200 + (13/4000)*pen5 + (1/125)*pen50',
                'pen10' => '-178/325*pen1 - 35/26*pen100 - 356/325*pen2 - 10/13*pen20 - 24/13*pen200 - 1/2*pen5 - 16/13*pen50 + (2000/13)*weight',
                'pen5' => '-356/325*pen1 - 2*pen10 - 35/13*pen100 - 712/325*pen2 - 20/13*pen20 - 48/13*pen200 - 32/13*pen50 + (4000/13)*weight',
                'pen200' => '-89/300*pen1 - 13/24*pen10 - 35/48*pen100 - 89/150*pen2 - 5/12*pen20 - 13/48*pen5 - 2/3*pen50 + (250/3)*weight',
                'pen2' => '-1/2*pen1 - 325/356*pen10 - 875/712*pen100 - 125/178*pen20 - 150/89*pen200 - 325/712*pen5 - 100/89*pen50 + (12500/89)*weight',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        UK coin weight turns 1p coins, 2p coins and 5p coins into Weight. Nothing is looked up on this page: weight is computed from 1p coins and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Weight is opened in grams; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the UK coin weight calculator works', 'html' => <<<'TXT'
            <p>The UK coin weight calculator applies one relationship to 8 numbers and reports Weight.</p><p>Written with the labels from the form, £1 coins = − 356 ÷ 875 × 1p coins − 26 ÷ 35 × 10p coins − 712 ÷ 875 × 2p coins − 4 ÷ 7 × 20p coins − 48 ÷ 35 × £2 coins − 13 ÷ 35 × 5p coins − 32 ÷ 35 × 50p coins + (800 ÷ 7) × Weight.</p><p>The answers are Weight; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 8 boxes, and nothing else.</p><ul><li><strong>1p coins</strong> — a plain number, no unit. Enter the number of 1p coins.</li><li><strong>2p coins</strong> — a plain number, no unit. Enter the number of 2p coins.</li><li><strong>5p coins</strong> — a plain number, no unit. Enter the number of 5p coins.</li><li><strong>10p coins</strong> — a plain number, no unit. Enter the number of 10p coins.</li><li><strong>20p coins</strong> — a plain number, no unit. Enter the number of 20p coins.</li><li><strong>50p coins</strong> — a plain number, no unit. Enter the number of 50p coins.</li><li><strong>£1 coins</strong> — a plain number, no unit. Enter the number of £1 coins.</li><li><strong>£2 coins</strong> — a plain number, no unit. Enter the number of £2 coins.</li></ul><p>The result box is Weight in grams. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, 1p coins = 10, 2p coins = 100, 5p coins = 1000, 10p coins = 10, 20p coins = 100, 50p coins = 1000, £1 coins = 10 and £2 coins = 100; the answers are <strong>Weight</strong> = 13.85 g.</p><ul><li><strong>Weight</strong> = 13.85 g</li></ul><p>That is <strong>£1 coins</strong> = <code>− 356 ÷ 875 × 1p coins − 26 ÷ 35 × 10p coins − 712 ÷ 875 × 2p coins − 4 ÷ 7 × 20p coins − 48 ÷ 35 × £2 coins − 13 ÷ 35 × 5p coins − 32 ÷ 35 × 50p coins + (800 ÷ 7) × Weight</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Weight</strong> = 13.85 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Weight offers 6 units and opens on grams, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>£1 coins</strong> = <code>− 356 ÷ 875 × 1p coins − 26 ÷ 35 × 10p coins − 712 ÷ 875 × 2p coins − 4 ÷ 7 × 20p coins − 48 ÷ 35 × £2 coins − 13 ÷ 35 × 5p coins − 32 ÷ 35 × 50p coins + (800 ÷ 7) × Weight</code></li><li><strong>1p coins</strong> = <code>− 325 ÷ 178 × 10p coins − 875 ÷ 356 × £1 coins − 2 × 2p coins − 125 ÷ 89 × 20p coins − 300 ÷ 89 × £2 coins − 325 ÷ 356 × 5p coins − 200 ÷ 89 × 50p coins + (25000 ÷ 89) × Weight</code></li><li><strong>50p coins</strong> = <code>− 89 ÷ 200 × 1p coins − 13 ÷ 16 × 10p coins − 35 ÷ 32 × £1 coins − 89 ÷ 100 × 2p coins − 5 ÷ 8 × 20p coins − 3 ÷ 2 × £2 coins − 13 ÷ 32 × 5p coins + 125 × Weight</code></li><li><strong>20p coins</strong> = <code>− 89 ÷ 125 × 1p coins − 13 ÷ 10 × 10p coins − 7 ÷ 4 × £1 coins − 178 ÷ 125 × 2p coins − 12 ÷ 5 × £2 coins − 13 ÷ 20 × 5p coins − 8 ÷ 5 × 50p coins + 200 × Weight</code></li><li><strong>Weight</strong> = <code>(89 ÷ 25000) × 1p coins + (13 ÷ 2000) × 10p coins + (7 ÷ 800) × £1 coins + (89 ÷ 12500) × 2p coins + (1 ÷ 200) × 20p coins + (3 ÷ 250) × £2 coins + (13 ÷ 4000) × 5p coins + (1 ÷ 125) × 50p coins</code></li><li><strong>10p coins</strong> = <code>− 178 ÷ 325 × 1p coins − 35 ÷ 26 × £1 coins − 356 ÷ 325 × 2p coins − 10 ÷ 13 × 20p coins − 24 ÷ 13 × £2 coins − 1 ÷ 2 × 5p coins − 16 ÷ 13 × 50p coins + (2000 ÷ 13) × Weight</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>£1 coins</strong> = <code>− 356 ÷ 875 × 1p coins − 26 ÷ 35 × 10p coins − 712 ÷ 875 × 2p coins − 4 ÷ 7 × 20p coins − 48 ÷ 35 × £2 coins − 13 ÷ 35 × 5p coins − 32 ÷ 35 × 50p coins + (800 ÷ 7) × Weight</code> — the form to use when 1p coins, 10p coins, 2p coins and 20p coins are the values you have.</li><li><strong>1p coins</strong> = <code>− 325 ÷ 178 × 10p coins − 875 ÷ 356 × £1 coins − 2 × 2p coins − 125 ÷ 89 × 20p coins − 300 ÷ 89 × £2 coins − 325 ÷ 356 × 5p coins − 200 ÷ 89 × 50p coins + (25000 ÷ 89) × Weight</code> — the form to use when 10p coins, £1 coins, 2p coins and 20p coins are the values you have.</li><li><strong>50p coins</strong> = <code>− 89 ÷ 200 × 1p coins − 13 ÷ 16 × 10p coins − 35 ÷ 32 × £1 coins − 89 ÷ 100 × 2p coins − 5 ÷ 8 × 20p coins − 3 ÷ 2 × £2 coins − 13 ÷ 32 × 5p coins + 125 × Weight</code> — the form to use when 1p coins, 10p coins, £1 coins and 2p coins are the values you have.</li><li><strong>20p coins</strong> = <code>− 89 ÷ 125 × 1p coins − 13 ÷ 10 × 10p coins − 7 ÷ 4 × £1 coins − 178 ÷ 125 × 2p coins − 12 ÷ 5 × £2 coins − 13 ÷ 20 × 5p coins − 8 ÷ 5 × 50p coins + 200 × Weight</code> — the form to use when 1p coins, 10p coins, £1 coins and 2p coins are the values you have.</li><li><strong>Weight</strong> = <code>(89 ÷ 25000) × 1p coins + (13 ÷ 2000) × 10p coins + (7 ÷ 800) × £1 coins + (89 ÷ 12500) × 2p coins + (1 ÷ 200) × 20p coins + (3 ÷ 250) × £2 coins + (13 ÷ 4000) × 5p coins + (1 ÷ 125) × 50p coins</code> — the form to use when 1p coins, 10p coins, £1 coins and 2p coins are the values you have.</li><li><strong>10p coins</strong> = <code>− 178 ÷ 325 × 1p coins − 35 ÷ 26 × £1 coins − 356 ÷ 325 × 2p coins − 10 ÷ 13 × 20p coins − 24 ÷ 13 × £2 coins − 1 ÷ 2 × 5p coins − 16 ÷ 13 × 50p coins + (2000 ÷ 13) × Weight</code> — the form to use when 1p coins, £1 coins, 2p coins and 20p coins are the values you have.</li><li><strong>5p coins</strong> = <code>− 356 ÷ 325 × 1p coins − 2 × 10p coins − 35 ÷ 13 × £1 coins − 712 ÷ 325 × 2p coins − 20 ÷ 13 × 20p coins − 48 ÷ 13 × £2 coins − 32 ÷ 13 × 50p coins + (4000 ÷ 13) × Weight</code> — the form to use when 1p coins, 10p coins, £1 coins and 2p coins are the values you have.</li><li><strong>£2 coins</strong> = <code>− 89 ÷ 300 × 1p coins − 13 ÷ 24 × 10p coins − 35 ÷ 48 × £1 coins − 89 ÷ 150 × 2p coins − 5 ÷ 12 × 20p coins − 13 ÷ 48 × 5p coins − 2 ÷ 3 × 50p coins + (250 ÷ 3) × Weight</code> — the form to use when 1p coins, 10p coins, £1 coins and 2p coins are the values you have.</li></ul><p>Any one of £1 coins, 1p coins and 50p coins can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — 1p coins, from 10 to 20 — and the answers go from <strong>Weight</strong> 13.85 g to <strong>Weight</strong> 13.89 g.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Weight is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>1p coins left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If 1p coins is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>2p coins left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If 2p coins is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>5p coins left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If 5p coins is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in 1p coins and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the UK coin weight form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>1p coins</strong> takes a plain number with no unit attached. Enter the number of 1p coins. Change it and £1 coins, 50p coins and 20p coins changes with it. Fill it from a measurement rather than a memory — 1p coins is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>2p coins</strong> takes a plain number with no unit attached. Enter the number of 2p coins. Change it and £1 coins, 1p coins and 50p coins changes with it. Fill it from a measurement rather than a memory — 2p coins is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>5p coins</strong> takes a plain number with no unit attached. Enter the number of 5p coins. Change it and £1 coins, 1p coins and 50p coins changes with it. Fill it from a measurement rather than a memory — 5p coins is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>10p coins</strong> takes a plain number with no unit attached. Enter the number of 10p coins. Change it and £1 coins, 1p coins and 50p coins changes with it. Fill it from a measurement rather than a memory — 10p coins is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>20p coins</strong> takes a plain number with no unit attached. Enter the number of 20p coins. Change it and £1 coins, 1p coins and 50p coins changes with it. Fill it from a measurement rather than a memory — 20p coins is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>50p coins</strong> takes a plain number with no unit attached. Enter the number of 50p coins. Change it and £1 coins, 1p coins and 20p coins changes with it. Fill it from a measurement rather than a memory — 50p coins is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>£1 coins</strong> takes a plain number with no unit attached. Enter the number of £1 coins. Change it and 1p coins, 50p coins and 20p coins changes with it. Fill it from a measurement rather than a memory — £1 coins is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>£2 coins</strong> takes a plain number with no unit attached. Enter the number of £2 coins. Change it and £1 coins, 1p coins and 50p coins changes with it. Fill it from a measurement rather than a memory — £2 coins is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Weight</strong> is a grams figure and the page's own defaults put it at 13.85 g. It is computed from 1p coins, 10p coins, £1 coins and 2p coins, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Weight</th></tr></thead><tbody><tr><td><strong>1p coins</strong> +10%</td><td>+0.03%</td></tr><tr><td><strong>2p coins</strong> +10%</td><td>+0.51%</td></tr><tr><td><strong>5p coins</strong> +10%</td><td>+2.35%</td></tr><tr><td><strong>10p coins</strong> +10%</td><td>+0.05%</td></tr><tr><td><strong>20p coins</strong> +10%</td><td>+0.36%</td></tr><tr><td><strong>50p coins</strong> +10%</td><td>+5.78%</td></tr><tr><td><strong>£1 coins</strong> +10%</td><td>+0.06%</td></tr><tr><td><strong>£2 coins</strong> +10%</td><td>+0.87%</td></tr></tbody></table><p>Ranked by leverage, 50p coins sits at the top — a ten per cent error in that box shows up as roughly 5.8 per cent in the answer. By contrast, 20p coins, £1 coins and 10p coins barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on UK coin weight actually offers.</p><ul><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries g, mg, lb, oz and st. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Weight follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are grams and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes 1p coins, 2p coins and 5p coins are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are 1p coins, 2p coins and 5p coins and the number you are missing is Weight.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/expected-utility">Expected utility Calculator</a>, <a href="/finance/expense-ratio">Expense ratio Calculator</a> and <a href="/finance/fha-loan">FHA loan Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the UK coin weight calculator work out?', 'a' => <<<'TXT'
            Weight, from 1p coins, 10p coins, 2p coins and 20p coins. The relationship is £1 coins = − 356 ÷ 875 × 1p coins − 26 ÷ 35 × 10p coins − 712 ÷ 875 × 2p coins − 4 ÷ 7 × 20p coins − 48 ÷ 35 × £2 coins − 13 ÷ 35 × 5p coins − 32 ÷ 35 × 50p coins + (800 ÷ 7) × Weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => '1p coins, 2p coins, 5p coins, 10p coins, 20p coins. With 1p coins, 2p coins and 5p coins in place, Weight can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of £1 coins, 1p coins, 50p coins and 20p coins blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Weight = 13.85 g. Those are the defaults written into the form — move 1p coins and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Weight is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave 1p coins blank and the page solves for it, reporting Weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Weight keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/expected-utility', 'name' => 'Expected utility Calculator'],
            ['path' => '/finance/expense-ratio', 'name' => 'Expense ratio Calculator'],
            ['path' => '/finance/fha-loan', 'name' => 'FHA loan Calculator'],
        ],
        'authors' => [],
    ],
];
