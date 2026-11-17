<?php

/**
 * Reserve ratio
 * /finance/reserve-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Reserve ratio',
    'meta' => ['title' => 'Reserve ratio Calculator — Formula, Units & Example', 'description' => 'Reserve ratio works out deposits and loanable funds and reports both. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Reserve ratio Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'deposit',
                            'label' => 'Deposits',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'reserves',
                            'label' => 'Reserves',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loans',
                            'label' => 'Loanable funds',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'reserve_ratio',
                            'label' => 'Reserve ratio',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'reserve_ratio = reserves / deposit',
            'results' => ['reserves' => 'deposit*reserve_ratio', 'deposit' => 'reserves/reserve_ratio', 'reserve_ratio' => 'reserves/deposit'],
        ],
        [
            'title' => 'deposit = reserves + loans',
            'results' => ['reserves' => 'deposit - loans', 'deposit' => 'loans + reserves', 'loans' => 'deposit - reserves'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Deposits, Reserves and Reserve ratio into Reserve ratio and the answer comes back as Loanable funds. There is no hidden constant here: change loanable funds and deposits moves with it. The main result, Loanable funds, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Reserve ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Reserve ratio: it takes 3 numbers and reports Loanable funds.</p><p>In the form&#039;s own words, Reserve ratio = Reserves ÷ Deposits.</p><p>The answers are Loanable funds; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Deposits</strong> — in USD</li><li><strong>Reserves</strong> — in USD</li><li><strong>Reserve ratio</strong> — in percent</li></ul><p>The result box is Loanable funds in USD. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Reserves = 10 USD and Reserve ratio = 100 perc gives <strong>Deposits</strong> = 0.1 USD and <strong>Loanable funds</strong> = -9.9 USD.</p><ul><li><strong>Deposits</strong> = 0.1 USD</li><li><strong>Loanable funds</strong> = -9.9 USD</li></ul><p>The line behind those figures is <strong>Reserve ratio</strong> = <code>Reserves ÷ Deposits</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Deposits</strong> = 0.1 and <strong>Loanable funds</strong> = -9.9. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Reserve ratio lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Reserve ratio</strong> = <code>Reserves ÷ Deposits</code></li><li><strong>Reserves</strong> = <code>Deposits × Reserve ratio</code></li><li><strong>Deposits</strong> = <code>Reserves ÷ Reserve ratio</code></li><li><strong>Loanable funds</strong> = <code>Deposits − Reserves</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Reserve ratio</strong> = <code>Reserves ÷ Deposits</code> — the form to use when Reserves and Deposits are the values you have.</li><li><strong>Reserves</strong> = <code>Deposits × Reserve ratio</code> — the form to use when Deposits and Reserve ratio are the values you have.</li><li><strong>Deposits</strong> = <code>Reserves ÷ Reserve ratio</code> — the form to use when Reserves and Reserve ratio are the values you have.</li><li><strong>Deposits</strong> = <code>Loanable funds + Reserves</code> — the form to use when Loanable funds and Reserves are the values you have.</li><li><strong>Reserves</strong> = <code>Deposits − Loanable funds</code> — the form to use when Deposits and Loanable funds are the values you have.</li><li><strong>Loanable funds</strong> = <code>Deposits − Reserves</code> — the form to use when Deposits and Reserves are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Reserve ratio, Reserves and Deposits can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Reserves from 10 to 20, leaving every other box alone. The panel moves from <strong>Deposits</strong> 0.1 USD and <strong>Loanable funds</strong> -9.9 USD to <strong>Deposits</strong> 0.2 USD and <strong>Loanable funds</strong> -19.8 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Reserve ratio carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Loanable funds is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Deposits left as a guess.</strong> Anything typed into Deposits is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Reserves left as a guess.</strong> Anything typed into Reserves is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Deposits to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Reserve ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Deposits</strong> takes a plain number with no unit attached. It feeds Reserves, Reserve ratio and Loanable funds. Fill it from a measurement rather than a memory — Deposits is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Reserves</strong> takes a plain number with no unit attached. It feeds Deposits, Reserve ratio and Loanable funds. Fill it from a measurement rather than a memory — Reserves is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Reserve ratio</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Reserves and Deposits. Fill it from a measurement rather than a memory — Reserve ratio is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Loanable funds</strong> is a plain number and the page's own defaults put it at -9.9. It is worked out from Deposits and Reserves. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Deposits</th><th>Loanable funds</th></tr></thead><tbody><tr><td><strong>Reserves</strong> +10%</td><td>+10%</td><td>-10%</td></tr><tr><td><strong>Reserve ratio</strong> +10%</td><td>-9.09%</td><td>-0.09%</td></tr></tbody></table><p>The steepest column belongs to Reserves: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Reserves = 5 USD and Reserve ratio = 50 perc and the page reports <strong>Deposits</strong> = 0.1 USD and <strong>Loanable funds</strong> = -4.9 USD.</li><li>Feed in Reserves = 30 USD and Reserve ratio = 100 perc and the page reports <strong>Deposits</strong> = 0.3 USD and <strong>Loanable funds</strong> = -29.7 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Reserve ratio actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Deposits, Reserves and Reserve ratio ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Deposits — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Loanable funds in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Loanable funds is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Deposits, Reserves and Reserve ratio are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Deposits, Reserves and Reserve ratio and the number you are missing is Loanable funds.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/apr">APR</a>, <a href="/finance/apy">APY</a> and <a href="/finance/arm-mortgage">ARM mortgage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Reserve ratio calculator work out?', 'a' => 'Loanable funds, from Reserves and Deposits. The relationship is Reserve ratio = Reserves ÷ Deposits.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Deposits (USD), Reserves (USD), Reserve ratio (percent). Fill deposits, reserves and reserve ratio and leave Loanable funds empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Reserve ratio, Reserves, Deposits and Loanable funds can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Deposits = 0.1 USD and Loanable funds = -9.9 USD. The figures come from Deposits as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Loanable funds is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Deposits blank and the page solves for it, reporting Loanable funds instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Loanable funds keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/apr', 'name' => 'APR'],
            ['path' => '/finance/apy', 'name' => 'APY'],
            ['path' => '/finance/arm-mortgage', 'name' => 'ARM mortgage Calculator'],
        ],
        'authors' => [],
    ],
];
