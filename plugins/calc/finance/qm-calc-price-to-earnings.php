<?php

/**
 * Price/earnings ratio
 * /finance/price-to-earnings
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Price/earnings ratio',
    'meta' => ['title' => 'Price/earnings ratio — Free Online Calculator', 'description' => 'Price/earnings ratio turns price per share and earnings per share into P/E ratio. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Price/earnings ratio Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'share_price',
                            'label' => 'Price per share',
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
                            'name' => 'earnings_per_share',
                            'label' => 'Earnings per share',
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
                            'name' => 'Price_to_earnings_ratio',
                            'label' => 'P/E ratio',
                            'type' => 'number',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Price_to_earnings_ratio=share_price/earnings_per_share',
            'results' => ['Price_to_earnings_ratio' => 'share_price/earnings_per_share', 'earnings_per_share' => 'share_price/Price_to_earnings_ratio', 'share_price' => 'Price_to_earnings_ratio*earnings_per_share'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Price/earnings ratio works out P/E ratio from Price per share and Earnings per share. It is a single relationship that reads p/E ratio out of price per share, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Price/earnings ratio calculator works', 'html' => <<<'TXT'
            <p>The Price/earnings ratio calculator applies one relationship to 2 numbers and reports P/E ratio.</p><p>In the form&#039;s own words, P/E ratio = Price per share ÷ Earnings per share.</p><p>The answers are P/E ratio; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Price per share</strong> — in USD</li><li><strong>Earnings per share</strong> — in USD</li></ul><p>The answer comes back as P/E ratio. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Price per share = 10 USD and Earnings per share = 100 USD — through the same formula and the panel reports <strong>P/E ratio</strong> = 0.1.</p><ul><li><strong>P/E ratio</strong> = 0.1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>P/E ratio</strong> = <code>Price per share ÷ Earnings per share</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>P/E ratio</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as P/E ratio is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>P/E ratio</strong> = <code>Price per share ÷ Earnings per share</code></li><li><strong>Earnings per share</strong> = <code>Price per share ÷ P/E ratio</code></li><li><strong>Price per share</strong> = <code>P/E ratio × Earnings per share</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>P/E ratio</strong> = <code>Price per share ÷ Earnings per share</code> — the form to use when Price per share and Earnings per share are the values you have.</li><li><strong>Earnings per share</strong> = <code>Price per share ÷ P/E ratio</code> — the form to use when Price per share and P/E ratio are the values you have.</li><li><strong>Price per share</strong> = <code>P/E ratio × Earnings per share</code> — the form to use when P/E ratio and Earnings per share are the values you have.</li></ul><p>Any one of P/E ratio, Earnings per share and Price per share can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Price per share from 10 to 20, leaving every other box alone. The panel moves from <strong>P/E ratio</strong> 0.1 to <strong>P/E ratio</strong> 0.2.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> P/E ratio is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Price per share left as a guess.</strong> Anything typed into Price per share is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Earnings per share left as a guess.</strong> Anything typed into Earnings per share is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Price per share is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Price/earnings ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Price per share</strong> takes a plain number with no unit attached. Change it and P/E ratio and Earnings per share changes with it. Fill it from a measurement rather than a memory — Price per share is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Earnings per share</strong> takes a plain number with no unit attached. Change it and P/E ratio and Price per share changes with it. Fill it from a measurement rather than a memory — Earnings per share is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>P/E ratio</strong> is a plain number and the page's own defaults put it at 0.1. The value follows from Price per share and Earnings per share. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>P/E ratio</th></tr></thead><tbody><tr><td><strong>Price per share</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Earnings per share</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Price per share: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Price per share = 5 USD and Earnings per share = 50 USD and the page reports <strong>P/E ratio</strong> = 0.1.</li><li>Feed in Price per share = 30 USD and Earnings per share = 100 USD and the page reports <strong>P/E ratio</strong> = 0.3.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Price per share and Earnings per share ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Price per share — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check P/E ratio against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind P/E ratio is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Price per share and Earnings per share is what you already know and P/E ratio is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/finance-charge">Finance charge</a>, <a href="/finance/financial-leverage-ratio">Financial leverage ratio Calculator</a> and <a href="/finance/fire">FIRE (financial independence, retire early) Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Price/earnings ratio is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Price/earnings ratio calculator work out?', 'a' => 'P/E ratio, from Price per share and Earnings per share. The relationship is P/E ratio = Price per share ÷ Earnings per share.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Price per share (USD), Earnings per share (USD). Fill price per share and earnings per share and leave P/E ratio empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of P/E ratio, Earnings per share and Price per share blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'P/E ratio = 0.1. That comes from the page\'s own defaults, entered in Price per share; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of P/E ratio is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Price per share blank and the page solves for it, reporting P/E ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to P/E ratio at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/finance-charge', 'name' => 'Finance charge'],
            ['path' => '/finance/financial-leverage-ratio', 'name' => 'Financial leverage ratio Calculator'],
            ['path' => '/finance/fire', 'name' => 'FIRE (financial independence, retire early) Calculator'],
        ],
        'authors' => [],
    ],
];
