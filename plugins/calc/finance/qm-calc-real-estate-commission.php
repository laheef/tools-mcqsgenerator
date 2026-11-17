<?php

/**
 * Real estate commission
 * /finance/real-estate-commission
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Real estate commission',
    'meta' => ['title' => 'Real estate commission: Formula, Steps & Results', 'description' => 'Real estate commission turns house price and commission into commission amount and owner receives. Results come back in USD, with any other unit a click away.', 'h1' => 'Real estate commission Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'house_price',
                            'label' => 'House price',
                            'type' => 'number',
                            'help' => 'Selling price of the property.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'comm_perc',
                            'label' => 'Commission',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'comm_amount',
                            'label' => 'Commission amount',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'owner_receives',
                            'label' => 'Owner receives',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.000001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Check out how to use this calculator!&nbsp;'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'house_price - (house_price * comm_perc) = owner_receives',
            'results' => ['owner_receives' => 'house_price*(1 - comm_perc)', 'comm_perc' => '(house_price - owner_receives)/house_price', 'house_price' => '-owner_receives/(comm_perc - 1)'],
        ],
        [
            'title' => 'house_price * comm_perc = comm_amount',
            'results' => ['comm_perc' => 'comm_amount/house_price', 'comm_amount' => 'comm_perc*house_price', 'house_price' => 'comm_amount/comm_perc'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter House price and Commission into Real estate commission and the answer comes back as Commission amount and Owner receives. Nothing is looked up on this page: commission amount is computed from house price and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Commission amount is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Real estate commission calculator works', 'html' => <<<'TXT'
            <p>The Real estate commission calculator applies one relationship to 2 numbers and reports Commission amount and Owner receives.</p><p>In the form&#039;s own words, Owner receives = House price × (1 − Commission).</p><p>What comes back is Commission amount and Owner receives — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>House price</strong> — in USD. Selling price of the property.</li><li><strong>Commission</strong> — in percent</li></ul><p>The answers come back as Commission amount in USD, Owner receives in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, House price = 10 USD and Commission = 100 perc; the answers are <strong>Owner receives</strong> = -990 USD and <strong>Commission amount</strong> = 1000 USD.</p><ul><li><strong>Owner receives</strong> = -990 USD</li><li><strong>Commission amount</strong> = 1000 USD</li></ul><p>The line behind those figures is <strong>Owner receives</strong> = <code>House price × (1 − Commission)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Owner receives</strong> = -990 and <strong>Commission amount</strong> = 1000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Commission lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Owner receives</strong> = <code>House price × (1 − Commission)</code></li><li><strong>Commission</strong> = <code>(House price − Owner receives) ÷ House price</code></li><li><strong>House price</strong> = <code>− Owner receives ÷ (Commission − 1)</code></li><li><strong>Commission amount</strong> = <code>Commission × House price</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Owner receives</strong> = <code>House price × (1 − Commission)</code> — the form to use when House price and Commission are the values you have.</li><li><strong>Commission</strong> = <code>(House price − Owner receives) ÷ House price</code> — the form to use when House price and Owner receives are the values you have.</li><li><strong>House price</strong> = <code>− Owner receives ÷ (Commission − 1)</code> — the form to use when Owner receives and Commission are the values you have.</li><li><strong>Commission</strong> = <code>Commission amount ÷ House price</code> — the form to use when Commission amount and House price are the values you have.</li><li><strong>Commission amount</strong> = <code>Commission × House price</code> — the form to use when Commission and House price are the values you have.</li><li><strong>House price</strong> = <code>Commission amount ÷ Commission</code> — the form to use when Commission amount and Commission are the values you have.</li></ul><p>Any one of Owner receives, Commission and House price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — House price, from 10 to 20 — and the answers go from <strong>Owner receives</strong> -990 USD and <strong>Commission amount</strong> 1000 USD to <strong>Owner receives</strong> -1980 USD and <strong>Commission amount</strong> 2000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Commission carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Commission amount and Owner receives are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>House price left as a guess.</strong> Anything typed into House price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Commission left as a guess.</strong> Anything typed into Commission is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If House price is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>House price</strong> takes a plain number with no unit attached. Selling price of the property. The page reads it when it works out Owner receives, Commission and Commission amount. Have it to hand before you start: House price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Commission</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Owner receives, House price and Commission amount. Have it to hand before you start: Commission is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Commission amount</strong> is a plain number and the page's own defaults put it at 1000. It is worked out from Commission and House price. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Owner receives</strong> is a plain number and the page's own defaults put it at -990. It is worked out from House price and Commission. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Owner receives</th><th>Commission amount</th></tr></thead><tbody><tr><td><strong>House price</strong> +10%</td><td>-10%</td><td>+10%</td></tr><tr><td><strong>Commission</strong> +10%</td><td>-10.1%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Commission: ten per cent there moves an answer by about 10.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With House price = 5 USD and Commission = 50 perc, the answer is <strong>Owner receives</strong> = -245 USD and <strong>Commission amount</strong> = 250 USD.</li><li>With House price = 30 USD and Commission = 100 perc, the answer is <strong>Owner receives</strong> = -2970 USD and <strong>Commission amount</strong> = 3000 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Commission amount is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are House price and Commission and the number you are missing is Commission amount and Owner receives.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/salary-to-hourly">Salary to hourly</a>, <a href="/finance/salary-with-overtime">Salary with overtime</a> and <a href="/finance/sales-commission">Sales commission Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Real estate commission calculator work out?', 'a' => 'Commission amount and Owner receives, from House price and Commission. The relationship is Owner receives = House price × (1 − Commission).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'House price (USD), Commission (percent). Fill house price and commission and leave Commission amount empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Owner receives, Commission, House price and Commission amount blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Owner receives = -990 USD and Commission amount = 1000 USD. The figures come from House price as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Commission amount is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With House price left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Commission amount at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/salary-to-hourly', 'name' => 'Salary to hourly'],
            ['path' => '/finance/salary-with-overtime', 'name' => 'Salary with overtime'],
            ['path' => '/finance/sales-commission', 'name' => 'Sales commission Calculator'],
        ],
        'authors' => [],
    ],
];
