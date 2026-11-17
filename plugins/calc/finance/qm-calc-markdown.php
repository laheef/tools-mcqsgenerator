<?php

/**
 * Markdown
 * /finance/markdown
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Markdown',
    'meta' => ['title' => 'Markdown Calculator — Formula, Units & Example', 'description' => 'Markdown works out actual selling price from original selling price. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Markdown Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'original_price',
                            'label' => 'Original selling price',
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
                            'name' => 'actual_price',
                            'label' => 'Actual selling price',
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
                            'name' => 'markdown',
                            'label' => 'Markdown',
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
                            'name' => 'markdown_percent',
                            'label' => 'Markdown percent',
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
            'title' => 'markdown = markdown_percent * actual_price',
            'results' => ['markdown_percent' => 'markdown/actual_price', 'markdown' => 'actual_price*markdown_percent', 'actual_price' => 'markdown/markdown_percent'],
        ],
        [
            'title' => 'actual_price = original_price - markdown_percent * actual_price',
            'results' => ['markdown_percent' => '(-actual_price + original_price)/actual_price', 'original_price' => 'actual_price*(markdown_percent + 1)', 'actual_price' => 'original_price/(markdown_percent + 1)'],
        ],
        [
            'title' => 'actual_price = original_price - markdown',
            'results' => ['markdown' => '-actual_price + original_price', 'original_price' => 'actual_price + markdown', 'actual_price' => '-markdown + original_price'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Markdown works out Original selling price and Markdown from Actual selling price and Markdown percent. The arithmetic is the whole method: original selling price is worked out from actual selling price by one formula, applied once. Original selling price comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Markdown calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Markdown: it takes 2 numbers and reports Original selling price and Markdown.</p><p>In the form&#039;s own words, Markdown = Actual selling price × Markdown percent.</p><p>The answers are Original selling price and Markdown; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Actual selling price</strong> — in USD</li><li><strong>Markdown percent</strong> — in percent</li></ul><p>The result boxes are Original selling price in USD, Markdown in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Actual selling price = 10 USD and Markdown percent = 100 perc — through the same formula and the panel reports <strong>Markdown</strong> = 1000 USD and <strong>Original selling price</strong> = 1010 USD.</p><ul><li><strong>Markdown</strong> = 1000 USD</li><li><strong>Original selling price</strong> = 1010 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Markdown</strong> = <code>Actual selling price × Markdown percent</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Markdown</strong> = 1000 and <strong>Original selling price</strong> = 1010. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Markdown percent lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Markdown</strong> = <code>Actual selling price × Markdown percent</code></li><li><strong>Markdown percent</strong> = <code>Markdown ÷ Actual selling price</code></li><li><strong>Actual selling price</strong> = <code>Markdown ÷ Markdown percent</code></li><li><strong>Original selling price</strong> = <code>Actual selling price × (Markdown percent + 1)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Markdown</strong> = <code>Actual selling price × Markdown percent</code> — the form to use when Actual selling price and Markdown percent are the values you have.</li><li><strong>Markdown percent</strong> = <code>Markdown ÷ Actual selling price</code> — the form to use when Markdown and Actual selling price are the values you have.</li><li><strong>Actual selling price</strong> = <code>Markdown ÷ Markdown percent</code> — the form to use when Markdown and Markdown percent are the values you have.</li><li><strong>Actual selling price</strong> = <code>Original selling price ÷ (Markdown percent + 1)</code> — the form to use when Original selling price and Markdown percent are the values you have.</li><li><strong>Markdown percent</strong> = <code>( − Actual selling price + Original selling price) ÷ Actual selling price</code> — the form to use when Actual selling price and Original selling price are the values you have.</li><li><strong>Original selling price</strong> = <code>Actual selling price × (Markdown percent + 1)</code> — the form to use when Actual selling price and Markdown percent are the values you have.</li><li><strong>Actual selling price</strong> = <code>− Markdown + Original selling price</code> — the form to use when Markdown and Original selling price are the values you have.</li><li><strong>Markdown</strong> = <code>− Actual selling price + Original selling price</code> — the form to use when Actual selling price and Original selling price are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Markdown, Markdown percent and Actual selling price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Actual selling price, from 10 to 20 — and the answers go from <strong>Markdown</strong> 1000 USD and <strong>Original selling price</strong> 1010 USD to <strong>Markdown</strong> 2000 USD and <strong>Original selling price</strong> 2020 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Markdown percent carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Original selling price and Markdown are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Actual selling price left as a guess.</strong> Anything typed into Actual selling price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Markdown percent left as a guess.</strong> Anything typed into Markdown percent is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Actual selling price to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Actual selling price</strong> takes a plain number with no unit attached. The page reads it when it works out Markdown percent, Markdown and Original selling price. Have it to hand before you start: Actual selling price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Markdown percent</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Markdown, Actual selling price and Original selling price. Have it to hand before you start: Markdown percent is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Original selling price</strong> is a plain number and the page's own defaults put it at 1010. It is worked out from Actual selling price and Markdown percent. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Markdown</strong> is a plain number and the page's own defaults put it at 1000. It is worked out from Actual selling price and Markdown percent. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Markdown</th><th>Original selling price</th></tr></thead><tbody><tr><td><strong>Actual selling price</strong> +10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Markdown percent</strong> +10%</td><td>+10%</td><td>+9.9%</td></tr></tbody></table><p>The steepest column belongs to Markdown percent: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Actual selling price = 5 USD and Markdown percent = 50 perc, the answer is <strong>Markdown</strong> = 250 USD and <strong>Original selling price</strong> = 255 USD.</li><li>With Actual selling price = 30 USD and Markdown percent = 100 perc, the answer is <strong>Markdown</strong> = 3000 USD and <strong>Original selling price</strong> = 3030 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Original selling price is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Actual selling price and Markdown percent and the number you are missing is Original selling price and Markdown.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/exit-rate">Exit rate Calculator</a>, <a href="/finance/expected-return">Expected return</a> and <a href="/finance/expected-utility">Expected utility Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Markdown calculator work out?', 'a' => 'Original selling price and Markdown, from Actual selling price and Markdown percent. The relationship is Markdown = Actual selling price × Markdown percent.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Actual selling price (USD), Markdown percent (percent). Enter actual selling price and markdown percent; Original selling price is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Markdown, Markdown percent, Actual selling price and Original selling price can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Markdown = 1000 USD and Original selling price = 1010 USD. That comes from the page's own defaults, entered in Actual selling price; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Original selling price is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Actual selling price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Original selling price keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/exit-rate', 'name' => 'Exit rate Calculator'],
            ['path' => '/finance/expected-return', 'name' => 'Expected return'],
            ['path' => '/finance/expected-utility', 'name' => 'Expected utility Calculator'],
        ],
        'authors' => [],
    ],
];
