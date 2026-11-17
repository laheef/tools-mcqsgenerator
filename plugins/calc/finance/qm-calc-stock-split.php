<?php

/**
 * Stock split
 * /finance/stock-split
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stock split',
    'meta' => ['title' => 'Stock split Calculator — Formula, Units & Example', 'description' => 'Stock split takes number of shares and share price and returns number of shares and share price. Results come back in USD, with any other unit a click away.', 'h1' => 'Stock split Calculator', 'updated' => '2026-09-18'],
    'sections' => [
        [
            'title' => 'Before stock split',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_stock_present',
                            'label' => 'Number of shares',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stock_price_present',
                            'label' => 'Share price',
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
        [
            'title' => 'Stock split ratio',
            'note' => 'A stock split ratio determines the number of new shares given per existing share, e.g., 2-for-1 means 1 share becomes 2.',
            'blocks' => [
                [
                    'columns' => 3,
                    'place' => [0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'split_ratio_numerator',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        ['type' => 'note', 'text' => '-for-'],
                        [
                            'name' => 'split_ratio_denominator',
                            'label' => '',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'After stock split',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_stock_after',
                            'label' => 'Number of shares',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stock_price_after',
                            'label' => 'Share price',
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
            'title' => 'num_stock_after = num_stock_present * (split_ratio_numerator / split_ratio_denominator)',
            'results' => ['num_stock_after' => 'num_stock_present*split_ratio_numerator/split_ratio_denominator', 'num_stock_present' => 'num_stock_after*split_ratio_denominator/split_ratio_numerator', 'split_ratio_denominator' => 'num_stock_present*split_ratio_numerator/num_stock_after', 'split_ratio_numerator' => 'num_stock_after*split_ratio_denominator/num_stock_present'],
        ],
        [
            'title' => 'stock_price_after = stock_price_present * (split_ratio_denominator / split_ratio_numerator)',
            'results' => ['stock_price_after' => 'split_ratio_denominator*stock_price_present/split_ratio_numerator', 'split_ratio_denominator' => 'split_ratio_numerator*stock_price_after/stock_price_present', 'stock_price_present' => 'split_ratio_numerator*stock_price_after/split_ratio_denominator', 'split_ratio_numerator' => 'split_ratio_denominator*stock_price_present/stock_price_after'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Stock split converts between share price and number of shares: put a value in either box and the other one is worked out. Units for Share price default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Stock split calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Stock split: it takes 1 number and reports Share price, Number of shares and Share price.</p><p>Written with the labels from the form, Number of shares = Number of shares × Split ratio numerator ÷ Split ratio denominator.</p><p>What comes back is Share price, Number of shares, Share price and Split ratio numerator — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Number of shares</strong> — a plain number, no unit</li></ul><p>The answers come back as Share price in USD, Number of shares, Share price in USD, Split ratio numerator, Split ratio denominator. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Number of shares = 10, Share price = 100 USD, Split ratio numerator = 1000, Split ratio denominator = 10 and Share price = 100 USD gives <strong>Number of shares</strong> = 1000.</p><ul><li><strong>Number of shares</strong> = 1000</li></ul><p>That is <strong>Number of shares</strong> = <code>Number of shares × Split ratio numerator ÷ Split ratio denominator</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Number of shares</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Share price is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Number of shares</strong> = <code>Number of shares × Split ratio numerator ÷ Split ratio denominator</code></li><li><strong>Split ratio denominator</strong> = <code>Number of shares × Split ratio numerator ÷ Number of shares</code></li><li><strong>Split ratio numerator</strong> = <code>Number of shares × Split ratio denominator ÷ Number of shares</code></li><li><strong>Share price</strong> = <code>Split ratio denominator × Share price ÷ Split ratio numerator</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Number of shares</strong> = <code>Number of shares × Split ratio numerator ÷ Split ratio denominator</code> — the form to use when Number of shares, Split ratio numerator and Split ratio denominator are the values you have.</li><li><strong>Number of shares</strong> = <code>Number of shares × Split ratio denominator ÷ Split ratio numerator</code> — the form to use when Number of shares, Split ratio denominator and Split ratio numerator are the values you have.</li><li><strong>Split ratio denominator</strong> = <code>Number of shares × Split ratio numerator ÷ Number of shares</code> — the form to use when Number of shares, Split ratio numerator and Number of shares are the values you have.</li><li><strong>Split ratio numerator</strong> = <code>Number of shares × Split ratio denominator ÷ Number of shares</code> — the form to use when Number of shares, Split ratio denominator and Number of shares are the values you have.</li><li><strong>Share price</strong> = <code>Split ratio denominator × Share price ÷ Split ratio numerator</code> — the form to use when Split ratio denominator, Share price and Split ratio numerator are the values you have.</li><li><strong>Split ratio denominator</strong> = <code>Split ratio numerator × Share price ÷ Share price</code> — the form to use when Split ratio numerator, Share price and Share price are the values you have.</li><li><strong>Share price</strong> = <code>Split ratio numerator × Share price ÷ Split ratio denominator</code> — the form to use when Split ratio numerator, Share price and Split ratio denominator are the values you have.</li><li><strong>Split ratio numerator</strong> = <code>Split ratio denominator × Share price ÷ Share price</code> — the form to use when Split ratio denominator, Share price and Share price are the values you have.</li></ul><p>Any one of Number of shares, Number of shares and Split ratio denominator can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Number of shares from 10 to 20, leaving every other box alone. The panel moves from <strong>Number of shares</strong> 1000 to <strong>Number of shares</strong> 2000.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Share price, Number of shares and Share price are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Number of shares left as a guess.</strong> Anything typed into Number of shares is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Number of shares and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Number of shares</strong> takes a plain number with no unit attached. Change it and Number of shares, Split ratio denominator and Split ratio numerator changes with it. Have it to hand before you start: Number of shares is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Share price</strong> is a plain number. It is computed from Split ratio numerator, Share price and Split ratio denominator, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Number of shares</strong> is a plain number and the page's own defaults put it at 1000. It is computed from Number of shares, Split ratio numerator and Split ratio denominator, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Share price</strong> is a plain number. It is computed from Split ratio denominator, Share price and Split ratio numerator, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Split ratio numerator</strong> is a plain number. It is computed from Number of shares, Split ratio denominator and Number of shares, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Split ratio denominator</strong> is a plain number. It is computed from Number of shares, Split ratio numerator and Number of shares, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Number of shares</th></tr></thead><tbody><tr><td><strong>Number of shares</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Share price</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Split ratio numerator</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Split ratio denominator</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Share price</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Number of shares: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Share price and Share price barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Number of shares = 5, Share price = 50 USD, Split ratio numerator = 500, Split ratio denominator = 5 and Share price = 50 USD, the answer is <strong>Number of shares</strong> = 500.</li><li>With Number of shares = 30, Share price = 100 USD, Split ratio numerator = 1000, Split ratio denominator = 10 and Share price = 100 USD, the answer is <strong>Number of shares</strong> = 3000.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Share price is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Number of shares are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Number of shares and the number you are missing is Share price and Number of shares.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/annual-salary-per-hour">Annual salary per hour Calculator</a>, <a href="/finance/annual-to-monthly-salary">Annual to monthly salary Calculator</a> and <a href="/finance/annualized-rate-of-return">Annualized rate of return Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stock split calculator work out?', 'a' => <<<'TXT'
            Share price, Number of shares, Share price and Split ratio numerator, from Number of shares, Split ratio numerator and Split ratio denominator. The relationship is Number of shares = Number of shares × Split ratio numerator ÷ Split ratio denominator.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Number of shares. Fill number of shares and leave Share price empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Number of shares, Number of shares, Split ratio denominator and Split ratio numerator blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Number of shares = 1000. Those are the defaults written into the form — move Number of shares and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Share price is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Number of shares left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Share price keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/annual-salary-per-hour', 'name' => 'Annual salary per hour Calculator'],
            ['path' => '/finance/annual-to-monthly-salary', 'name' => 'Annual to monthly salary Calculator'],
            ['path' => '/finance/annualized-rate-of-return', 'name' => 'Annualized rate of return Calculator'],
        ],
        'authors' => [],
    ],
];
