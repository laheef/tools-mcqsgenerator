<?php

/**
 * Revenue
 * /finance/revenue
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Revenue',
    'meta' => ['title' => 'Revenue Calculator: Formula, Steps & Examples', 'description' => 'Revenue turns price and quantity into total revenue. Each figure is computed from the boxes you fill, never read from a table. The answer is shown in USD.', 'h1' => 'Revenue Calculator', 'updated' => '2026-09-29'],
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
                            'name' => 'quantity',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TotalRev',
                            'label' => 'Total revenue',
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
            'title' => 'TotalRev = quantity * price',
            'results' => ['quantity' => 'TotalRev/price', 'TotalRev' => 'price*quantity', 'price' => 'TotalRev/quantity'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Price and Quantity into Revenue and the answer comes back as Total revenue. Nothing is looked up on this page: total revenue is computed from price and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Total revenue is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Revenue calculator works', 'html' => <<<'TXT'
            <p>Revenue answers one question from 2 numbers, and the answer is Total revenue.</p><p>Written with the labels from the form, Total revenue = Price × Quantity.</p><p>What comes back is Total revenue — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Price</strong> — in USD</li><li><strong>Quantity</strong> — a plain number, no unit</li></ul><p>The answer comes back as Total revenue in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Price = 10 USD and Quantity = 100; the answers are <strong>Total revenue</strong> = 1000 USD.</p><ul><li><strong>Total revenue</strong> = 1000 USD</li></ul><p>That is <strong>Total revenue</strong> = <code>Price × Quantity</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total revenue</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Total revenue is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total revenue</strong> = <code>Price × Quantity</code></li><li><strong>Quantity</strong> = <code>Total revenue ÷ Price</code></li><li><strong>Price</strong> = <code>Total revenue ÷ Quantity</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total revenue</strong> = <code>Price × Quantity</code> — the form to use when Price and Quantity are the values you have.</li><li><strong>Quantity</strong> = <code>Total revenue ÷ Price</code> — the form to use when Total revenue and Price are the values you have.</li><li><strong>Price</strong> = <code>Total revenue ÷ Quantity</code> — the form to use when Total revenue and Quantity are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total revenue, Quantity and Price can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Price, from 10 to 20 — and the answers go from <strong>Total revenue</strong> 1000 USD to <strong>Total revenue</strong> 2000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Total revenue is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Price left as a guess.</strong> Anything typed into Price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Quantity left as a guess.</strong> Anything typed into Quantity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Price is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Price</strong> takes a plain number with no unit attached. The page reads it when it works out Quantity and Total revenue. Have it to hand before you start: Price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Quantity</strong> takes a plain number with no unit attached. The page reads it when it works out Total revenue and Price. Have it to hand before you start: Quantity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total revenue</strong> is a plain number and the page's own defaults put it at 1000. It is worked out from Price and Quantity. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total revenue</th></tr></thead><tbody><tr><td><strong>Price</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Quantity</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Quantity: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Price = 5 USD and Quantity = 50, the answer is <strong>Total revenue</strong> = 250 USD.</li><li>With Price = 30 USD and Quantity = 100, the answer is <strong>Total revenue</strong> = 3000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Price and Quantity. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Price into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Total revenue in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Total revenue is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Price and Quantity measured, Total revenue wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/equivalent-rate">Equivalent rate</a>, <a href="/finance/ev-to-sales">EV to sales Calculator</a> and <a href="/finance/exit-rate">Exit rate Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Revenue is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Price and Quantity beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Revenue calculator work out?', 'a' => 'Total revenue, from Price and Quantity. The relationship is Total revenue = Price × Quantity.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Price (USD), Quantity. Enter price and quantity; Total revenue is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Total revenue, Quantity and Price can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Total revenue = 1000 USD. That comes from the page\'s own defaults, entered in Price; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Total revenue is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total revenue at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/equivalent-rate', 'name' => 'Equivalent rate'],
            ['path' => '/finance/ev-to-sales', 'name' => 'EV to sales Calculator'],
            ['path' => '/finance/exit-rate', 'name' => 'Exit rate Calculator'],
        ],
        'authors' => [],
    ],
];
