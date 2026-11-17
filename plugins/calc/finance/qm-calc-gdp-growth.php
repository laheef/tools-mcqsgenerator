<?php

/**
 * GDP growth rate
 * /finance/gdp-growth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GDP growth rate',
    'meta' => ['title' => 'GDP growth rate — Formula, Steps & Examples', 'description' => 'GDP growth rate takes GDP in the current period and GDP in the previous period and returns GDP growth. The formula is printed in the form\'s own words.', 'h1' => 'GDP growth rate Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gdp_current',
                            'label' => 'GDP in the current period',
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
                            'name' => 'gdp_previous',
                            'label' => 'GDP in the previous period',
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
                            'name' => 'gdp_growth',
                            'label' => 'GDP growth',
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
            'title' => 'gdp_growth = ( gdp_current - gdp_previous ) / gdp_previous',
            'results' => ['gdp_current' => 'gdp_previous*(gdp_growth + 1)', 'gdp_previous' => 'gdp_current/(gdp_growth + 1)', 'gdp_growth' => '(gdp_current - gdp_previous)/gdp_previous'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter GDP in the current period and GDP in the previous period into GDP growth rate and the answer comes back as GDP growth. Nothing is looked up on this page: GDP growth is computed from GDP in the current period and the other boxes, so an unusual pair of values gives an honest answer rather than an error. GDP growth is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the GDP growth rate calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind GDP growth rate: it takes 2 numbers and reports GDP growth.</p><p>Written with the labels from the form, GDP growth = (GDP in the current period − GDP in the previous period) ÷ GDP in the previous period.</p><p>What comes back is GDP growth — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>GDP in the current period</strong> — in USD</li><li><strong>GDP in the previous period</strong> — in USD</li></ul><p>What you get back is GDP growth in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, GDP in the current period = 10 USD and GDP in the previous period = 100 USD gives <strong>GDP growth</strong> = -0.9 perc.</p><ul><li><strong>GDP growth</strong> = -0.9 perc</li></ul><p>That is <strong>GDP growth</strong> = <code>(GDP in the current period − GDP in the previous period) ÷ GDP in the previous period</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>GDP growth</strong> = -0.9. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on GDP growth lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>GDP growth</strong> = <code>(GDP in the current period − GDP in the previous period) ÷ GDP in the previous period</code></li><li><strong>GDP in the current period</strong> = <code>GDP in the previous period × (GDP growth + 1)</code></li><li><strong>GDP in the previous period</strong> = <code>GDP in the current period ÷ (GDP growth + 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>GDP growth</strong> = <code>(GDP in the current period − GDP in the previous period) ÷ GDP in the previous period</code> — the form to use when GDP in the current period and GDP in the previous period are the values you have.</li><li><strong>GDP in the current period</strong> = <code>GDP in the previous period × (GDP growth + 1)</code> — the form to use when GDP in the previous period and GDP growth are the values you have.</li><li><strong>GDP in the previous period</strong> = <code>GDP in the current period ÷ (GDP growth + 1)</code> — the form to use when GDP in the current period and GDP growth are the values you have.</li></ul><p>Any one of GDP growth, GDP in the current period and GDP in the previous period can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — GDP in the current period, from 10 to 20 — and the answers go from <strong>GDP growth</strong> -0.9 perc to <strong>GDP growth</strong> -0.8 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> GDP growth is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>GDP in the current period left as a guess.</strong> Anything typed into GDP in the current period is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>GDP in the previous period left as a guess.</strong> Anything typed into GDP in the previous period is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If GDP in the current period is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>GDP in the current period</strong> takes a plain number with no unit attached. The page reads it when it works out GDP in the previous period and GDP growth. Have it to hand before you start: GDP in the current period is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>GDP in the previous period</strong> takes a plain number with no unit attached. The page reads it when it works out GDP in the current period and GDP growth. Have it to hand before you start: GDP in the previous period is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>GDP growth</strong> is a percent figure and the page's own defaults put it at -0.9 perc. The value follows from GDP in the current period and GDP in the previous period. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>GDP growth</th></tr></thead><tbody><tr><td><strong>GDP in the current period</strong> +10%</td><td>+1.11%</td></tr><tr><td><strong>GDP in the previous period</strong> +10%</td><td>-1.01%</td></tr></tbody></table><p>The steepest column belongs to GDP in the current period: ten per cent there moves an answer by about 1.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With GDP in the current period = 5 USD and GDP in the previous period = 50 USD, the answer is <strong>GDP growth</strong> = -0.9 perc.</li><li>With GDP in the current period = 30 USD and GDP in the previous period = 100 USD, the answer is <strong>GDP growth</strong> = -0.7 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind GDP growth is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes GDP in the current period and GDP in the previous period are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are GDP in the current period and GDP in the previous period and the number you are missing is GDP growth.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/lifo-for-inventories">LIFO for inventories Calculator</a>, <a href="/finance/liquid-net-worth">Liquid net worth Calculator</a> and <a href="/finance/lcr">Liquidity coverage ratio (LCR)</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from GDP growth rate is a number to act on, so the useful question is what to do with GDP growth (perc) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down GDP in the current period and GDP in the previous period alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GDP growth rate calculator work out?', 'a' => <<<'TXT'
            GDP growth, from GDP in the current period and GDP in the previous period. The relationship is GDP growth = (GDP in the current period − GDP in the previous period) ÷ GDP in the previous period.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            GDP in the current period (USD), GDP in the previous period (USD). Enter GDP in the current period and GDP in the previous period; GDP growth is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of GDP growth, GDP in the current period and GDP in the previous period blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'GDP growth = -0.9 perc. That comes from the page\'s own defaults, entered in GDP in the current period; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of GDP growth is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With GDP in the current period left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. GDP growth keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/lifo-for-inventories', 'name' => 'LIFO for inventories Calculator'],
            ['path' => '/finance/liquid-net-worth', 'name' => 'Liquid net worth Calculator'],
            ['path' => '/finance/lcr', 'name' => 'Liquidity coverage ratio (LCR)'],
        ],
        'authors' => [],
    ],
];
