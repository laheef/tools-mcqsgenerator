<?php

/**
 * Lerner index
 * /finance/lerner-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lerner index',
    'meta' => ['title' => 'Lerner index Calculator — Formula & Results', 'description' => 'Enter price and marginal cost and get lerner index back. Each figure is computed from the boxes you fill, never read from a table. Any box can be the unknown.', 'h1' => 'Lerner index Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Price',
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
                            'name' => 'marginal_cost',
                            'label' => 'Marginal cost',
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
                            'name' => 'lerner_index',
                            'label' => 'Lerner index',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'lerner_index = (price - marginal_cost) / price ',
            'results' => ['price' => '-marginal_cost/(lerner_index - 1)', 'lerner_index' => '(-marginal_cost + price)/price', 'marginal_cost' => 'price*(1 - lerner_index)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Price and Marginal cost into Lerner index and the answer comes back as Lerner index. It is a single relationship that reads lerner index out of price, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Lerner index calculator works', 'html' => <<<'TXT'
            <p>The Lerner index calculator applies one relationship to 2 numbers and reports Lerner index.</p><p>In the form&#039;s own words, Lerner index = ( − Marginal cost + Price) ÷ Price.</p><p>What comes back is Lerner index — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Price</strong> — in USD</li><li><strong>Marginal cost</strong> — in USD</li></ul><p>The result box is Lerner index. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Price = 10 USD and Marginal cost = 100 USD — through the same formula and the panel reports <strong>Lerner index</strong> = -9.</p><ul><li><strong>Lerner index</strong> = -9</li></ul><p>The line behind those figures is <strong>Lerner index</strong> = <code>( − Marginal cost + Price) ÷ Price</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Lerner index</strong> = -9. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Lerner index is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Lerner index</strong> = <code>( − Marginal cost + Price) ÷ Price</code></li><li><strong>Price</strong> = <code>− Marginal cost ÷ (Lerner index − 1)</code></li><li><strong>Marginal cost</strong> = <code>Price × (1 − Lerner index)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Lerner index</strong> = <code>( − Marginal cost + Price) ÷ Price</code> — the form to use when Marginal cost and Price are the values you have.</li><li><strong>Price</strong> = <code>− Marginal cost ÷ (Lerner index − 1)</code> — the form to use when Marginal cost and Lerner index are the values you have.</li><li><strong>Marginal cost</strong> = <code>Price × (1 − Lerner index)</code> — the form to use when Price and Lerner index are the values you have.</li></ul><p>Any one of Lerner index, Price and Marginal cost can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Price from 10 to 20, leaving every other box alone. The panel moves from <strong>Lerner index</strong> -9 to <strong>Lerner index</strong> -4.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Lerner index is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Price left as a guess.</strong> Anything typed into Price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Marginal cost left as a guess.</strong> Anything typed into Marginal cost is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Price and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Price</strong> takes a plain number with no unit attached. The page reads it when it works out Lerner index and Marginal cost. Have it to hand before you start: Price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Marginal cost</strong> takes a plain number with no unit attached. The page reads it when it works out Price and Lerner index. Have it to hand before you start: Marginal cost is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Lerner index</strong> is a plain number and the page's own defaults put it at -9. The value follows from Marginal cost and Price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Lerner index</th></tr></thead><tbody><tr><td><strong>Price</strong> +10%</td><td>+10.1%</td></tr><tr><td><strong>Marginal cost</strong> +10%</td><td>-11.11%</td></tr></tbody></table><p>The steepest column belongs to Marginal cost: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Price = 5 USD and Marginal cost = 50 USD, the answer is <strong>Lerner index</strong> = -9.</li><li>With Price = 30 USD and Marginal cost = 100 USD, the answer is <strong>Lerner index</strong> = -2.33.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Price and Marginal cost. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Price into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Lerner index with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Lerner index is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Price and Marginal cost and the number you are missing is Lerner index.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/price-per-share">Price per share Calculator</a>, <a href="/finance/price-per-sqft">Price per square foot Calculator</a> and <a href="/finance/price-per-square-meter">Price per square meter Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Lerner index is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Price and Marginal cost beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lerner index calculator work out?', 'a' => 'Lerner index, from Marginal cost and Price. The relationship is Lerner index = ( − Marginal cost + Price) ÷ Price.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Price (USD), Marginal cost (USD). Fill price and marginal cost and leave Lerner index empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Lerner index, Price and Marginal cost blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Lerner index = -9. Those are the defaults written into the form — move Price and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Lerner index is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Lerner index keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/price-per-share', 'name' => 'Price per share Calculator'],
            ['path' => '/finance/price-per-sqft', 'name' => 'Price per square foot Calculator'],
            ['path' => '/finance/price-per-square-meter', 'name' => 'Price per square meter Calculator'],
        ],
        'authors' => [],
    ],
];
