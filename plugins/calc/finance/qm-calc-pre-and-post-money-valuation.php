<?php

/**
 * Pre and post-money valuation
 * /finance/pre-and-post-money-valuation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pre and post-money valuation',
    'meta' => ['title' => 'Pre and post-money valuation — Free Online Calculator', 'description' => 'Pre and post-money valuation turns investment and investor\'s equity into pre-money valuation. Results come back in USD, with any other unit a click away.', 'h1' => 'Pre and post-money valuation Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'investment',
                            'label' => 'Investment',
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
                            'name' => 'investor_equity',
                            'label' => 'Investor\'s equity',
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
                            'name' => 'pre_money',
                            'label' => 'Pre-money valuation',
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
                            'name' => 'post_money',
                            'label' => 'Post-money valuation',
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
            'title' => 'post_money = investment / investor_equity',
            'results' => ['post_money' => 'investment/investor_equity', 'investor_equity' => 'investment/post_money', 'investment' => 'investor_equity*post_money'],
        ],
        [
            'title' => 'pre_money = post_money - investment',
            'results' => ['post_money' => 'investment + pre_money', 'pre_money' => '-investment + post_money', 'investment' => 'post_money - pre_money'],
        ],
        [
            'title' => 'pre_money = investment / investor_equity - investment',
            'results' => ['investment' => '-investor_equity*pre_money/(investor_equity - 1)', 'pre_money' => '-investment + investment/investor_equity', 'investor_equity' => 'investment/(investment + pre_money)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Investment and Investor's equity into Pre and post-money valuation and the answer comes back as Pre-money valuation and Post-money valuation. It is a single relationship that reads pre-money valuation out of investment, not a table of canned results keyed by them. Units for Pre-money valuation default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Pre and post-money valuation calculator works', 'html' => <<<'TXT'
            <p>Pre and post-money valuation answers one question from 2 numbers, and the answer is Pre-money valuation and Post-money valuation.</p><p>The relationship it solves reads Post-money valuation = Investment ÷ Investor&#039;s equity.</p><p>The result panel carries Pre-money valuation and Post-money valuation, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Investment</strong> — in USD</li><li><strong>Investor&#039;s equity</strong> — in percent</li></ul><p>The result boxes are Pre-money valuation in USD, Post-money valuation in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Investment = 10 USD and Investor&amp;#039;s equity = 100 perc — through the same formula and the panel reports <strong>Post-money valuation</strong> = 0.1 USD and <strong>Pre-money valuation</strong> = -9.9 USD.</p><ul><li><strong>Post-money valuation</strong> = 0.1 USD</li><li><strong>Pre-money valuation</strong> = -9.9 USD</li></ul><p>The line behind those figures is <strong>Post-money valuation</strong> = <code>Investment ÷ Investor&#039;s equity</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Post-money valuation</strong> = 0.1 and <strong>Pre-money valuation</strong> = -9.9. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Investor&#039;s equity lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Post-money valuation</strong> = <code>Investment ÷ Investor&#039;s equity</code></li><li><strong>Investor&#039;s equity</strong> = <code>Investment ÷ Post-money valuation</code></li><li><strong>Investment</strong> = <code>Investor&#039;s equity × Post-money valuation</code></li><li><strong>Pre-money valuation</strong> = <code>− Investment + Post-money valuation</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Post-money valuation</strong> = <code>Investment ÷ Investor&#039;s equity</code> — the form to use when Investment and Investor&#039;s equity are the values you have.</li><li><strong>Investor&#039;s equity</strong> = <code>Investment ÷ Post-money valuation</code> — the form to use when Investment and Post-money valuation are the values you have.</li><li><strong>Investment</strong> = <code>Investor&#039;s equity × Post-money valuation</code> — the form to use when Investor&#039;s equity and Post-money valuation are the values you have.</li><li><strong>Pre-money valuation</strong> = <code>− Investment + Post-money valuation</code> — the form to use when Investment and Post-money valuation are the values you have.</li><li><strong>Post-money valuation</strong> = <code>Investment + Pre-money valuation</code> — the form to use when Investment and Pre-money valuation are the values you have.</li><li><strong>Investment</strong> = <code>Post-money valuation − Pre-money valuation</code> — the form to use when Post-money valuation and Pre-money valuation are the values you have.</li><li><strong>Pre-money valuation</strong> = <code>− Investment + Investment ÷ Investor&#039;s equity</code> — the form to use when Investment and Investor&#039;s equity are the values you have.</li><li><strong>Investment</strong> = <code>− Investor&#039;s equity × Pre-money valuation ÷ (Investor&#039;s equity − 1)</code> — the form to use when Investor&#039;s equity and Pre-money valuation are the values you have.</li></ul><p>Any one of Post-money valuation, Investor&#039;s equity and Investment can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Investment from 10 to 20, leaving every other box alone. The panel moves from <strong>Post-money valuation</strong> 0.1 USD and <strong>Pre-money valuation</strong> -9.9 USD to <strong>Post-money valuation</strong> 0.2 USD and <strong>Pre-money valuation</strong> -19.8 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Investor&#039;s equity carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Pre-money valuation and Post-money valuation are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Investment left as a guess.</strong> Anything typed into Investment is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Investor&#039;s equity left as a guess.</strong> Anything typed into Investor&amp;#039;s equity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Investment is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Investment</strong> takes a plain number with no unit attached. Change it and Post-money valuation, Investor's equity and Pre-money valuation changes with it. Have it to hand before you start: Investment is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Investor&#039;s equity</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Post-money valuation, Investment and Pre-money valuation changes with it. Have it to hand before you start: Investor&#039;s equity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Pre-money valuation</strong> is a plain number and the page's own defaults put it at -9.9. It is worked out from Investment and Post-money valuation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Post-money valuation</strong> is a plain number and the page's own defaults put it at 0.1. It is worked out from Investment and Investor's equity. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Post-money valuation</th><th>Pre-money valuation</th></tr></thead><tbody><tr><td><strong>Investment</strong> +10%</td><td>+10%</td><td>-10%</td></tr><tr><td><strong>Investor&#039;s equity</strong> +10%</td><td>-9.09%</td><td>-0.09%</td></tr></tbody></table><p>The steepest column belongs to Investment: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Investment = 5 USD and Investor&#039;s equity = 50 perc, the answer is <strong>Post-money valuation</strong> = 0.1 USD and <strong>Pre-money valuation</strong> = -4.9 USD.</li><li>With Investment = 30 USD and Investor&#039;s equity = 100 perc, the answer is <strong>Post-money valuation</strong> = 0.3 USD and <strong>Pre-money valuation</strong> = -29.7 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Pre-money valuation is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Investment and Investor&#039;s equity and the number you are missing is Pre-money valuation and Post-money valuation.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/high-low-method">High-low method Calculator</a>, <a href="/finance/holding-period-return">Holding period return Calculator</a> and <a href="/finance/home-affordability">Home affordability</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pre and post-money valuation calculator work out?', 'a' => 'Pre-money valuation and Post-money valuation, from Investment and Investor\'s equity. The relationship is Post-money valuation = Investment ÷ Investor\'s equity.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Investment (USD), Investor\'s equity (percent). With investment and investor\'s equity in place, Pre-money valuation can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Post-money valuation, Investor's equity, Investment and Pre-money valuation blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Post-money valuation = 0.1 USD and Pre-money valuation = -9.9 USD. Those are the defaults written into the form — move Investment and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Pre-money valuation is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Investment left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Pre-money valuation at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/high-low-method', 'name' => 'High-low method Calculator'],
            ['path' => '/finance/holding-period-return', 'name' => 'Holding period return Calculator'],
            ['path' => '/finance/home-affordability', 'name' => 'Home affordability'],
        ],
        'authors' => [],
    ],
];
