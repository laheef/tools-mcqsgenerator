<?php

/**
 * Deadweight loss
 * /finance/deadweight-loss
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Deadweight loss',
    'meta' => ['title' => 'Deadweight loss — Formula, Steps & Examples', 'description' => 'Enter original price and new price and get deadweight loss back. Results come back in USD, with any other unit a click away. Every figure is computed.', 'h1' => 'Deadweight loss Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Po',
                            'label' => 'Original price',
                            'type' => 'number',
                            'suffix' => '/unit',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.01'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Pn',
                            'label' => 'New price',
                            'type' => 'number',
                            'suffix' => '/unit',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.01'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Qo',
                            'label' => 'Original quantity',
                            'type' => 'number',
                            'suffix' => 'units',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Qn',
                            'label' => 'New quantity',
                            'type' => 'number',
                            'suffix' => 'units',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DWL',
                            'label' => 'Deadweight loss',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.001'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'DWL = (Pn - Po)*(Qo - Qn)/2',
            'results' => [
                'Po' => '(2*DWL + Pn*Qn - Pn*Qo)/(Qn - Qo)',
                'DWL' => '-1/2*Pn*Qn + (1/2)*Pn*Qo + (1/2)*Po*Qn - 1/2*Po*Qo',
                'Qn' => '(-2*DWL + Pn*Qo - Po*Qo)/(Pn - Po)',
                'Qo' => '(2*DWL + Pn*Qn - Po*Qn)/(Pn - Po)',
                'Pn' => '(-2*DWL + Po*Qn - Po*Qo)/(Qn - Qo)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Deadweight loss works out Deadweight loss from Original price, New price and Original quantity. There is no hidden constant here: change deadweight loss and original price moves with it. The main result, Deadweight loss, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Deadweight loss calculator works', 'html' => <<<'TXT'
            <p>The Deadweight loss calculator applies one relationship to 4 numbers and reports Deadweight loss.</p><p>The relationship it solves reads Deadweight loss = − 1 ÷ 2 × New price × New quantity + (1 ÷ 2) × New price × Original quantity + (1 ÷ 2) × Original price × New quantity − 1 ÷ 2 × Original price × Original quantity.</p><p>The answers are Deadweight loss; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Original price</strong> — in /unit</li><li><strong>New price</strong> — in /unit</li><li><strong>Original quantity</strong> — in units</li><li><strong>New quantity</strong> — in units</li></ul><p>The answer comes back as Deadweight loss in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Original price = 10 /unit, New price = 100 /unit, Original quantity = 1000 units and New quantity = 10 units gives <strong>Deadweight loss</strong> = 44550 USD.</p><ul><li><strong>Deadweight loss</strong> = 44550 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Deadweight loss</strong> = <code>− 1 ÷ 2 × New price × New quantity + (1 ÷ 2) × New price × Original quantity + (1 ÷ 2) × Original price × New quantity − 1 ÷ 2 × Original price × Original quantity</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Deadweight loss</strong> = 44550. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Deadweight loss is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Deadweight loss</strong> = <code>− 1 ÷ 2 × New price × New quantity + (1 ÷ 2) × New price × Original quantity + (1 ÷ 2) × Original price × New quantity − 1 ÷ 2 × Original price × Original quantity</code></li><li><strong>Original price</strong> = <code>(2 × Deadweight loss + New price × New quantity − New price × Original quantity) ÷ (New quantity − Original quantity)</code></li><li><strong>New quantity</strong> = <code>( − 2 × Deadweight loss + New price × Original quantity − Original price × Original quantity) ÷ (New price − Original price)</code></li><li><strong>Original quantity</strong> = <code>(2 × Deadweight loss + New price × New quantity − Original price × New quantity) ÷ (New price − Original price)</code></li><li><strong>New price</strong> = <code>( − 2 × Deadweight loss + Original price × New quantity − Original price × Original quantity) ÷ (New quantity − Original quantity)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Deadweight loss</strong> = <code>− 1 ÷ 2 × New price × New quantity + (1 ÷ 2) × New price × Original quantity + (1 ÷ 2) × Original price × New quantity − 1 ÷ 2 × Original price × Original quantity</code> — the form to use when New price, New quantity, Original quantity and Original price are the values you have.</li><li><strong>Original price</strong> = <code>(2 × Deadweight loss + New price × New quantity − New price × Original quantity) ÷ (New quantity − Original quantity)</code> — the form to use when Deadweight loss, New price, New quantity and Original quantity are the values you have.</li><li><strong>New quantity</strong> = <code>( − 2 × Deadweight loss + New price × Original quantity − Original price × Original quantity) ÷ (New price − Original price)</code> — the form to use when Deadweight loss, New price, Original quantity and Original price are the values you have.</li><li><strong>Original quantity</strong> = <code>(2 × Deadweight loss + New price × New quantity − Original price × New quantity) ÷ (New price − Original price)</code> — the form to use when Deadweight loss, New price, New quantity and Original price are the values you have.</li><li><strong>New price</strong> = <code>( − 2 × Deadweight loss + Original price × New quantity − Original price × Original quantity) ÷ (New quantity − Original quantity)</code> — the form to use when Deadweight loss, Original price, New quantity and Original quantity are the values you have.</li></ul><p>Any one of Deadweight loss, Original price and New quantity can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Original price from 10 to 20, leaving every other box alone. The panel moves from <strong>Deadweight loss</strong> 44550 USD to <strong>Deadweight loss</strong> 39600 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Deadweight loss is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Original price left as a guess.</strong> Anything typed into Original price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>New price left as a guess.</strong> Anything typed into New price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Original quantity left as a guess.</strong> Anything typed into Original quantity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Original price and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Original price</strong> is measured in /unit. It feeds Deadweight loss, New quantity and Original quantity. Have it to hand before you start: Original price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>New price</strong> is measured in /unit. It feeds Original price, Deadweight loss and New quantity. Have it to hand before you start: New price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Original quantity</strong> is measured in units. It feeds Original price, Deadweight loss and New quantity. Have it to hand before you start: Original quantity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>New quantity</strong> is measured in units. It feeds Original price, Deadweight loss and Original quantity. Have it to hand before you start: New quantity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Deadweight loss</strong> is a plain number and the page's own defaults put it at 44550. It is computed from New price, New quantity, Original quantity and Original price, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Deadweight loss</th></tr></thead><tbody><tr><td><strong>Original price</strong> +10%</td><td>-1.11%</td></tr><tr><td><strong>New price</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Original quantity</strong> +10%</td><td>+10.1%</td></tr><tr><td><strong>New quantity</strong> +10%</td><td>-0.1%</td></tr></tbody></table><p>The steepest column belongs to New price: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. By contrast, New quantity barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Original price = 5 /unit, New price = 50 /unit, Original quantity = 500 units and New quantity = 5 units, the answer is <strong>Deadweight loss</strong> = 11138 USD.</li><li>With Original price = 30 /unit, New price = 100 /unit, Original quantity = 1000 units and New quantity = 10 units, the answer is <strong>Deadweight loss</strong> = 34650 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Deadweight loss is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Original price, New price and Original quantity are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Original price, New price and Original quantity and the number you are missing is Deadweight loss.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/monthly-income">Monthly income Calculator</a>, <a href="/finance/monthly-income-hourly">Monthly income hourly Calculator</a> and <a href="/finance/moratorium-emi">Moratorium Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Deadweight loss is a number to act on, so the useful question is what to do with Deadweight loss (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Original price, New price, Original quantity and New quantity alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Deadweight loss calculator work out?', 'a' => <<<'TXT'
            Deadweight loss, from New price, New quantity, Original quantity and Original price. The relationship is Deadweight loss = − 1 ÷ 2 × New price × New quantity + (1 ÷ 2) × New price × Original quantity + (1 ÷ 2) × Original price × New quantity − 1 ÷ 2 × Original price × Original quantity.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Original price (/unit), New price (/unit), Original quantity (units), New quantity (units). Fill original price, new price and original quantity and leave Deadweight loss empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Deadweight loss, Original price, New quantity and Original quantity blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Deadweight loss = 44550 USD. That comes from the page\'s own defaults, entered in Original price; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Deadweight loss is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Original price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Deadweight loss at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/monthly-income', 'name' => 'Monthly income Calculator'],
            ['path' => '/finance/monthly-income-hourly', 'name' => 'Monthly income hourly Calculator'],
            ['path' => '/finance/moratorium-emi', 'name' => 'Moratorium Calculator'],
        ],
        'authors' => [],
    ],
];
