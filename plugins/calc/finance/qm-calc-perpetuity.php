<?php

/**
 * Perpetuity
 * /finance/perpetuity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Perpetuity',
    'meta' => ['title' => 'Perpetuity Calculator: Formula, Steps & Examples', 'description' => 'Enter dividend, discount rate and growth rate and Perpetuity returns present value. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Perpetuity Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dividend',
                            'label' => 'Dividend',
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
                            'name' => 'discount_rate',
                            'label' => 'Discount rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'growth_rate',
                            'label' => 'Growth rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'present_value',
                            'label' => 'Present value',
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
            'title' => 'present_value = dividend / (discount_rate - growth_rate) * 100 ',
            'results' => ['growth_rate' => 'discount_rate - 100*dividend/present_value', 'dividend' => '(1/100)*present_value*(discount_rate - growth_rate)', 'present_value' => '100*dividend/(discount_rate - growth_rate)', 'discount_rate' => '100*dividend/present_value + growth_rate'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Perpetuity turns Dividend, Discount rate and Growth rate into Present value. The arithmetic is the whole method: present value is worked out from dividend by one formula, applied once. Present value comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Perpetuity calculator works', 'html' => <<<'TXT'
            <p>The Perpetuity calculator applies one relationship to 3 numbers and reports Present value.</p><p>The relationship it solves reads Present value = 100 × Dividend ÷ (Discount rate − Growth rate).</p><p>The answers are Present value; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Dividend</strong> — in USD</li><li><strong>Discount rate</strong> — in percent</li><li><strong>Growth rate</strong> — in percent</li></ul><p>The answer comes back as Present value in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Dividend = 10 USD, Discount rate = 100 perc and Growth rate = 1000 perc gives <strong>Present value</strong> = -1.11 USD.</p><ul><li><strong>Present value</strong> = -1.11 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Present value</strong> = <code>100 × Dividend ÷ (Discount rate − Growth rate)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Present value</strong> = -1.11 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Discount rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Present value</strong> = <code>100 × Dividend ÷ (Discount rate − Growth rate)</code></li><li><strong>Growth rate</strong> = <code>Discount rate − 100 × Dividend ÷ Present value</code></li><li><strong>Dividend</strong> = <code>(1 ÷ 100) × Present value × (Discount rate − Growth rate)</code></li><li><strong>Discount rate</strong> = <code>100 × Dividend ÷ Present value + Growth rate</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Present value</strong> = <code>100 × Dividend ÷ (Discount rate − Growth rate)</code> — the form to use when Dividend, Discount rate and Growth rate are the values you have.</li><li><strong>Growth rate</strong> = <code>Discount rate − 100 × Dividend ÷ Present value</code> — the form to use when Discount rate, Dividend and Present value are the values you have.</li><li><strong>Dividend</strong> = <code>(1 ÷ 100) × Present value × (Discount rate − Growth rate)</code> — the form to use when Present value, Discount rate and Growth rate are the values you have.</li><li><strong>Discount rate</strong> = <code>100 × Dividend ÷ Present value + Growth rate</code> — the form to use when Dividend, Present value and Growth rate are the values you have.</li></ul><p>Any one of Present value, Growth rate and Dividend can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Dividend, from 10 to 20 — and the answers go from <strong>Present value</strong> -1.11 USD to <strong>Present value</strong> -2.22 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Discount rate and Growth rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Present value is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Dividend left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dividend is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Discount rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Discount rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Dividend and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Dividend</strong> takes a plain number with no unit attached. The page reads it when it works out Growth rate, Present value and Discount rate. Have it to hand before you start: Dividend is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Discount rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Growth rate, Dividend and Present value. Have it to hand before you start: Discount rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Growth rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Dividend, Present value and Discount rate. Have it to hand before you start: Growth rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Present value</strong> is a plain number and the page's own defaults put it at -1.11. It is computed from Dividend, Discount rate and Growth rate, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Present value</th></tr></thead><tbody><tr><td><strong>Dividend</strong> +10%</td><td>-10%</td></tr><tr><td><strong>Discount rate</strong> +10%</td><td>-1.12%</td></tr><tr><td><strong>Growth rate</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Dividend sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Dividend = 5 USD, Discount rate = 50 perc and Growth rate = 500 perc, the answer is <strong>Present value</strong> = -1.11 USD.</li><li>With Dividend = 30 USD, Discount rate = 100 perc and Growth rate = 1000 perc, the answer is <strong>Present value</strong> = -3.33 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Present value follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Dividend, Discount rate and Growth rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Dividend, Discount rate and Growth rate measured, Present value wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/dividend-payout-ratio">Dividend payout ratio Calculator</a>, <a href="/finance/dividend-yield">Dividend yield Calculator</a> and <a href="/finance/double-discount">Double discount Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Perpetuity is a number to act on, so the useful question is what to do with Present value (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Dividend, Discount rate and Growth rate alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Perpetuity calculator work out?', 'a' => 'Present value, from Dividend, Discount rate and Growth rate. The relationship is Present value = 100 × Dividend ÷ (Discount rate − Growth rate).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Dividend (USD), Discount rate (percent), Growth rate (percent). Fill dividend, discount rate and growth rate and leave Present value empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Present value, Growth rate, Dividend and Discount rate blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Present value = -1.11 USD. Those are the defaults written into the form — move Dividend and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Present value is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Dividend left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Present value at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/dividend-payout-ratio', 'name' => 'Dividend payout ratio Calculator'],
            ['path' => '/finance/dividend-yield', 'name' => 'Dividend yield Calculator'],
            ['path' => '/finance/double-discount', 'name' => 'Double discount Calculator'],
        ],
        'authors' => [],
    ],
];
