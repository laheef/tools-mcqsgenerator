<?php

/**
 * Market capitalization
 * /finance/market-capitalization
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Market capitalization',
    'meta' => ['title' => 'Market capitalization: Formula, Steps & Results', 'description' => 'Enter price of a single share and number of outstanding shares and get market capitalization back. Results come back in USD, with any other unit a click away.', 'h1' => 'Market capitalization Calculator', 'updated' => '2026-09-18'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price_of_one_share',
                            'label' => 'Price of a single share',
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
                            'name' => 'number_of_outstanding_shares',
                            'label' => 'Number of outstanding shares',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'market_capitalization',
                            'label' => 'Market capitalization',
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
            'title' => 'market_capitalization= price_of_one_share*number_of_outstanding_shares',
            'results' => ['market_capitalization' => 'number_of_outstanding_shares*price_of_one_share', 'price_of_one_share' => 'market_capitalization/number_of_outstanding_shares', 'number_of_outstanding_shares' => 'market_capitalization/price_of_one_share'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Price of a single share and Number of outstanding shares into Market capitalization and the answer comes back as Market capitalization. There is no hidden constant here: change market capitalization and price of a single share moves with it. The main result, Market capitalization, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Market capitalization calculator works', 'html' => <<<'TXT'
            <p>The Market capitalization calculator applies one relationship to 2 numbers and reports Market capitalization.</p><p>In the form&#039;s own words, Market capitalization = Number of outstanding shares × Price of a single share.</p><p>What comes back is Market capitalization — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Price of a single share</strong> — in USD</li><li><strong>Number of outstanding shares</strong> — a plain number, no unit</li></ul><p>The answer comes back as Market capitalization in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Price of a single share = 10 USD and Number of outstanding shares = 100 gives <strong>Market capitalization</strong> = 1000 USD.</p><ul><li><strong>Market capitalization</strong> = 1000 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Market capitalization</strong> = <code>Number of outstanding shares × Price of a single share</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Market capitalization</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Market capitalization is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Market capitalization</strong> = <code>Number of outstanding shares × Price of a single share</code></li><li><strong>Price of a single share</strong> = <code>Market capitalization ÷ Number of outstanding shares</code></li><li><strong>Number of outstanding shares</strong> = <code>Market capitalization ÷ Price of a single share</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Market capitalization</strong> = <code>Number of outstanding shares × Price of a single share</code> — the form to use when Number of outstanding shares and Price of a single share are the values you have.</li><li><strong>Price of a single share</strong> = <code>Market capitalization ÷ Number of outstanding shares</code> — the form to use when Market capitalization and Number of outstanding shares are the values you have.</li><li><strong>Number of outstanding shares</strong> = <code>Market capitalization ÷ Price of a single share</code> — the form to use when Market capitalization and Price of a single share are the values you have.</li></ul><p>Any one of Market capitalization, Price of a single share and Number of outstanding shares can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Price of a single share from 10 to 20, leaving every other box alone. The panel moves from <strong>Market capitalization</strong> 1000 USD to <strong>Market capitalization</strong> 2000 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Market capitalization is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Price of a single share left as a guess.</strong> Anything typed into Price of a single share is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Number of outstanding shares left as a guess.</strong> Anything typed into Number of outstanding shares is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Price of a single share to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Price of a single share</strong> takes a plain number with no unit attached. The page reads it when it works out Market capitalization and Number of outstanding shares. Have it to hand before you start: Price of a single share is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of outstanding shares</strong> takes a plain number with no unit attached. The page reads it when it works out Market capitalization and Price of a single share. Have it to hand before you start: Number of outstanding shares is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Market capitalization</strong> is a plain number and the page's own defaults put it at 1000. It is computed from Number of outstanding shares and Price of a single share, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Market capitalization</th></tr></thead><tbody><tr><td><strong>Price of a single share</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Number of outstanding shares</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Number of outstanding shares: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Price of a single share = 5 USD and Number of outstanding shares = 50, the answer is <strong>Market capitalization</strong> = 250 USD.</li><li>With Price of a single share = 30 USD and Number of outstanding shares = 100, the answer is <strong>Market capitalization</strong> = 3000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Price of a single share and Number of outstanding shares. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Price of a single share into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Market capitalization in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Market capitalization is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Price of a single share and Number of outstanding shares measured, Market capitalization wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/yield-to-maturity">Yield to maturity</a>, <a href="/finance/youtube-money">YouTube money Calculator</a> and <a href="/finance/zakat">Zakat Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Market capitalization calculator work out?', 'a' => <<<'TXT'
            Market capitalization, from Number of outstanding shares and Price of a single share. The relationship is Market capitalization = Number of outstanding shares × Price of a single share.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Price of a single share (USD), Number of outstanding shares. With price of a single share and number of outstanding shares in place, Market capitalization can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Market capitalization, Price of a single share and Number of outstanding shares blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Market capitalization = 1000 USD. Those are the defaults written into the form — move Price of a single share and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Market capitalization is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Price of a single share left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Market capitalization at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/yield-to-maturity', 'name' => 'Yield to maturity'],
            ['path' => '/finance/youtube-money', 'name' => 'YouTube money Calculator'],
            ['path' => '/finance/zakat', 'name' => 'Zakat Calculator'],
        ],
        'authors' => [],
    ],
];
