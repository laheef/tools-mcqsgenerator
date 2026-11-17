<?php

/**
 * Free float
 * /finance/free-float
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Free float',
    'meta' => ['title' => 'Free float Calculator: Formula, Steps & Examples', 'description' => 'Enter outstanding shares and restricted shares and get free float back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Free float Calculator', 'updated' => '2026-09-18'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'outstanding_shares',
                            'label' => 'Outstanding shares',
                            'type' => 'number',
                            'suffix' => 'shares',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'restricted_shares',
                            'label' => 'Restricted shares',
                            'type' => 'number',
                            'suffix' => 'shares',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'closely_held_shares',
                            'label' => 'Closely held shares',
                            'type' => 'number',
                            'suffix' => 'shares',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'free_float',
                            'label' => 'Free float',
                            'type' => 'number',
                            'suffix' => 'shares',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'free_float_percentage',
                            'label' => 'Free float percentage',
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
            'title' => 'free_float = outstanding_shares - restricted_shares - closely_held_shares',
            'results' => ['restricted_shares' => '-closely_held_shares - free_float + outstanding_shares', 'closely_held_shares' => '-free_float + outstanding_shares - restricted_shares', 'free_float' => '-closely_held_shares + outstanding_shares - restricted_shares', 'outstanding_shares' => 'closely_held_shares + free_float + restricted_shares'],
        ],
        [
            'title' => 'free_float_percentage = free_float / outstanding_shares',
            'results' => ['free_float' => 'free_float_percentage*outstanding_shares', 'free_float_percentage' => 'free_float/outstanding_shares', 'outstanding_shares' => 'free_float/free_float_percentage'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Outstanding shares, Restricted shares and Closely held shares into Free float and the answer comes back as Free float and Free float percentage. There is no hidden constant here: change free float and outstanding shares moves with it. The main result, Free float, is reported in shares.
        TXT,
        'sections' => [
            ['title' => 'How the Free float calculator works', 'html' => <<<'TXT'
            <p>Free float answers one question from 3 numbers, and the answer is Free float and Free float percentage.</p><p>In the form&#039;s own words, Free float = − Closely held shares + Outstanding shares − Restricted shares.</p><p>The answers are Free float and Free float percentage; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Outstanding shares</strong> — in shares</li><li><strong>Restricted shares</strong> — in shares</li><li><strong>Closely held shares</strong> — in shares</li></ul><p>The result boxes are Free float in shares, Free float percentage in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Outstanding shares = 10 shares, Restricted shares = 100 shares and Closely held shares = 1000 shares — through the same formula and the panel reports <strong>Free float</strong> = -1090 shares and <strong>Free float percentage</strong> = -109 perc.</p><ul><li><strong>Free float</strong> = -1090 shares</li><li><strong>Free float percentage</strong> = -109 perc</li></ul><p>That is <strong>Free float</strong> = <code>− Closely held shares + Outstanding shares − Restricted shares</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Free float</strong> = -1090 and <strong>Free float percentage</strong> = -109. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Free float percentage lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Free float</strong> = <code>− Closely held shares + Outstanding shares − Restricted shares</code></li><li><strong>Restricted shares</strong> = <code>− Closely held shares − Free float + Outstanding shares</code></li><li><strong>Closely held shares</strong> = <code>− Free float + Outstanding shares − Restricted shares</code></li><li><strong>Outstanding shares</strong> = <code>Closely held shares + Free float + Restricted shares</code></li><li><strong>Free float percentage</strong> = <code>Free float ÷ Outstanding shares</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Free float</strong> = <code>− Closely held shares + Outstanding shares − Restricted shares</code> — the form to use when Closely held shares, Outstanding shares and Restricted shares are the values you have.</li><li><strong>Restricted shares</strong> = <code>− Closely held shares − Free float + Outstanding shares</code> — the form to use when Closely held shares, Free float and Outstanding shares are the values you have.</li><li><strong>Closely held shares</strong> = <code>− Free float + Outstanding shares − Restricted shares</code> — the form to use when Free float, Outstanding shares and Restricted shares are the values you have.</li><li><strong>Outstanding shares</strong> = <code>Closely held shares + Free float + Restricted shares</code> — the form to use when Closely held shares, Free float and Restricted shares are the values you have.</li><li><strong>Free float percentage</strong> = <code>Free float ÷ Outstanding shares</code> — the form to use when Free float and Outstanding shares are the values you have.</li><li><strong>Free float</strong> = <code>Free float percentage × Outstanding shares</code> — the form to use when Free float percentage and Outstanding shares are the values you have.</li><li><strong>Outstanding shares</strong> = <code>Free float ÷ Free float percentage</code> — the form to use when Free float and Free float percentage are the values you have.</li></ul><p>Any one of Free float, Restricted shares and Closely held shares can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Outstanding shares from 10 to 20, leaving every other box alone. The panel moves from <strong>Free float</strong> -1090 shares and <strong>Free float percentage</strong> -109 perc to <strong>Free float</strong> -1080 shares and <strong>Free float percentage</strong> -54 perc.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Free float and Free float percentage are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Outstanding shares left as a guess.</strong> Anything typed into Outstanding shares is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Restricted shares left as a guess.</strong> Anything typed into Restricted shares is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Closely held shares left as a guess.</strong> Anything typed into Closely held shares is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Outstanding shares is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Outstanding shares</strong> is measured in shares. Change it and Restricted shares, Closely held shares and Free float changes with it. Have it to hand before you start: Outstanding shares is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Restricted shares</strong> is measured in shares. Change it and Closely held shares, Free float and Outstanding shares changes with it. Have it to hand before you start: Restricted shares is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Closely held shares</strong> is measured in shares. Change it and Restricted shares, Free float and Outstanding shares changes with it. Have it to hand before you start: Closely held shares is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Free float</strong> is a plain number and the page's own defaults put it at -1090. The value follows from Closely held shares, Outstanding shares and Restricted shares. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Free float percentage</strong> is a percent figure and the page's own defaults put it at -109 perc. The value follows from Free float and Outstanding shares. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Free float</th><th>Free float percentage</th></tr></thead><tbody><tr><td><strong>Outstanding shares</strong> +10%</td><td>+0.09%</td><td>+9.17%</td></tr><tr><td><strong>Restricted shares</strong> +10%</td><td>-0.92%</td><td>-0.92%</td></tr><tr><td><strong>Closely held shares</strong> +10%</td><td>-9.17%</td><td>-9.17%</td></tr></tbody></table><p>The steepest column belongs to Outstanding shares: ten per cent there moves an answer by about 9.2 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Outstanding shares = 5 shares, Restricted shares = 50 shares and Closely held shares = 500 shares, the answer is <strong>Free float</strong> = -545 shares and <strong>Free float percentage</strong> = -109 perc.</li><li>With Outstanding shares = 30 shares, Restricted shares = 100 shares and Closely held shares = 1000 shares, the answer is <strong>Free float</strong> = -1070 shares and <strong>Free float percentage</strong> = -35.67 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Free float is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Outstanding shares, Restricted shares and Closely held shares are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Outstanding shares, Restricted shares and Closely held shares measured, Free float and Free float percentage wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/customer-effort-score">Customer effort score Calculator</a>, <a href="/finance/customer-retention-rate">Customer retention rate</a> and <a href="/finance/cyber-monday">Cyber Monday Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Free float calculator work out?', 'a' => <<<'TXT'
            Free float and Free float percentage, from Closely held shares, Outstanding shares and Restricted shares. The relationship is Free float = − Closely held shares + Outstanding shares − Restricted shares.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Outstanding shares (shares), Restricted shares (shares), Closely held shares (shares). With outstanding shares, restricted shares and closely held shares in place, Free float can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Free float, Restricted shares, Closely held shares and Outstanding shares blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Free float = -1090 shares and Free float percentage = -109 perc. Those are the defaults written into the form — move Outstanding shares and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Free float is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Outstanding shares left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Free float keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/customer-effort-score', 'name' => 'Customer effort score Calculator'],
            ['path' => '/finance/customer-retention-rate', 'name' => 'Customer retention rate'],
            ['path' => '/finance/cyber-monday', 'name' => 'Cyber Monday Calculator'],
        ],
        'authors' => [],
    ],
];
