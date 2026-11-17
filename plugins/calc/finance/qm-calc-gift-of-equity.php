<?php

/**
 * Gift of equity
 * /finance/gift-of-equity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gift of equity',
    'meta' => ['title' => 'Gift of equity Calculator — Formula, Units & Example', 'description' => 'Enter market value and sales price and get gift of equity back. Every box can be solved for, not only the one in the title. The answer is shown in USD.', 'h1' => 'Gift of equity Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'market_value',
                            'label' => 'Market value',
                            'type' => 'number',
                            'help' => 'The value of the property in the market now.',
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
                            'name' => 'sales_price',
                            'label' => 'Sales price',
                            'type' => 'number',
                            'help' => 'The actual price that the property is sold for.',
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
                            'name' => 'gift_of_equity',
                            'label' => 'Gift of equity',
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
            'title' => 'gift_of_equity = market_value - sales_price',
            'results' => ['sales_price' => '-gift_of_equity + market_value', 'gift_of_equity' => 'market_value - sales_price', 'market_value' => 'gift_of_equity + sales_price'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Gift of equity works out Gift of equity from Market value and Sales price. Nothing is looked up on this page: gift of equity is computed from market value and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Gift of equity is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Gift of equity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Gift of equity: it takes 2 numbers and reports Gift of equity.</p><p>Written with the labels from the form, Gift of equity = Market value − Sales price.</p><p>The result panel carries Gift of equity, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Market value</strong> — in USD. The value of the property in the market now.</li><li><strong>Sales price</strong> — in USD. The actual price that the property is sold for.</li></ul><p>What you get back is Gift of equity in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Market value = 10 USD and Sales price = 100 USD gives <strong>Gift of equity</strong> = -90 USD.</p><ul><li><strong>Gift of equity</strong> = -90 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Gift of equity</strong> = <code>Market value − Sales price</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Gift of equity</strong> = -90. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Gift of equity is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Gift of equity</strong> = <code>Market value − Sales price</code></li><li><strong>Sales price</strong> = <code>− Gift of equity + Market value</code></li><li><strong>Market value</strong> = <code>Gift of equity + Sales price</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Gift of equity</strong> = <code>Market value − Sales price</code> — the form to use when Market value and Sales price are the values you have.</li><li><strong>Sales price</strong> = <code>− Gift of equity + Market value</code> — the form to use when Gift of equity and Market value are the values you have.</li><li><strong>Market value</strong> = <code>Gift of equity + Sales price</code> — the form to use when Gift of equity and Sales price are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Gift of equity, Sales price and Market value can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Market value, from 10 to 20 — and the answers go from <strong>Gift of equity</strong> -90 USD to <strong>Gift of equity</strong> -80 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Gift of equity is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Market value left as a guess.</strong> Anything typed into Market value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Sales price left as a guess.</strong> Anything typed into Sales price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Market value is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Market value</strong> takes a plain number with no unit attached. The value of the property in the market now. Change it and Sales price and Gift of equity changes with it. Have it to hand before you start: Market value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Sales price</strong> takes a plain number with no unit attached. The actual price that the property is sold for. Change it and Gift of equity and Market value changes with it. Have it to hand before you start: Sales price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Gift of equity</strong> is a plain number and the page's own defaults put it at -90. It is computed from Market value and Sales price, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Gift of equity</th></tr></thead><tbody><tr><td><strong>Market value</strong> +10%</td><td>+1.11%</td></tr><tr><td><strong>Sales price</strong> +10%</td><td>-11.11%</td></tr></tbody></table><p>The steepest column belongs to Sales price: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Market value = 5 USD and Sales price = 50 USD, the answer is <strong>Gift of equity</strong> = -45 USD.</li><li>With Market value = 30 USD and Sales price = 100 USD, the answer is <strong>Gift of equity</strong> = -70 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Market value and Sales price. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Market value into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Gift of equity in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Gift of equity is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Market value and Sales price measured, Gift of equity wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/uk-coin-weight">UK coin weight Calculator</a>, <a href="/finance/uk-take-home-pay">UK take-home pay Calculator</a> and <a href="/finance/unemployment-benefit">Unemployment benefit - CARES Act Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gift of equity calculator work out?', 'a' => 'Gift of equity, from Market value and Sales price. The relationship is Gift of equity = Market value − Sales price.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Market value (USD), Sales price (USD). With market value and sales price in place, Gift of equity can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Gift of equity, Sales price and Market value can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Gift of equity = -90 USD. The figures come from Market value as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Gift of equity is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Market value left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Gift of equity keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/uk-coin-weight', 'name' => 'UK coin weight Calculator'],
            ['path' => '/finance/uk-take-home-pay', 'name' => 'UK take-home pay Calculator'],
            ['path' => '/finance/unemployment-benefit', 'name' => 'Unemployment benefit - CARES Act Calculator'],
        ],
        'authors' => [],
    ],
];
