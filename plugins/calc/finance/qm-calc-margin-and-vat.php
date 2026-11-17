<?php

/**
 * Margin and VAT
 * /finance/margin-and-vat
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Margin and VAT',
    'meta' => ['title' => 'Margin and VAT Calculator — Formula & Results', 'description' => 'Margin and VAT works out gross cost and markup from VAT and net cost. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Margin and VAT Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vat',
                            'label' => 'VAT',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            The value added tax (VAT) is a tax that the government applies on goods and services. Only the final consumer of a product pays this, and you can claim it back if you are selling a product.
                            TXT,
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
                            'name' => 'netCost',
                            'label' => 'Net cost',
                            'type' => 'number',
                            'help' => 'The cost of a product before tax.',
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
                            'name' => 'grossCost',
                            'label' => 'Gross cost',
                            'type' => 'number',
                            'help' => 'The cost of a product after tax.',
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
                            'name' => 'margin',
                            'label' => 'Margin',
                            'type' => 'number',
                            'help' => 'Profit margin is the ratio of profit to revenue.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'markup',
                            'label' => 'Markup',
                            'type' => 'number',
                            'help' => 'The ratio of profit to cost.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netRev',
                            'label' => 'My net price',
                            'type' => 'number',
                            'help' => 'Price before tax. It includes the net cost and margin/markup.',
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
                            'name' => 'grossRev',
                            'label' => 'My gross price',
                            'type' => 'number',
                            'help' => 'Price including margin and tax.',
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
                            'name' => 'profit',
                            'label' => 'Profit',
                            'type' => 'number',
                            'help' => 'Money gained from selling the product.',
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
            'title' => 'grossCost = netCost + netCost * vat',
            'results' => ['netCost' => 'grossCost/(vat + 1)', 'vat' => '(grossCost - netCost)/netCost', 'grossCost' => 'netCost*(vat + 1)'],
        ],
        [
            'title' => 'grossRev = netRev + netRev * vat',
            'results' => ['grossRev' => 'netRev*(vat + 1)', 'netRev' => 'grossRev/(vat + 1)', 'vat' => '(grossRev - netRev)/netRev'],
        ],
        [
            'title' => 'netCost + netCost * markup = netRev',
            'results' => ['netCost' => 'netRev/(markup + 1)', 'markup' => '(-netCost + netRev)/netCost', 'netRev' => 'netCost*(markup + 1)'],
        ],
        [
            'title' => 'grossCost + grossCost * markup = grossRev',
            'results' => ['grossRev' => 'grossCost*(markup + 1)', 'markup' => '(-grossCost + grossRev)/grossCost', 'grossCost' => 'grossRev/(markup + 1)'],
        ],
        [
            'title' => 'profit = netRev - netCost',
            'results' => ['netCost' => 'netRev - profit', 'profit' => '-netCost + netRev', 'netRev' => 'netCost + profit'],
        ],
        [
            'title' => 'markup = 1 / (1 - margin) - 1',
            'results' => ['margin' => 'markup/(markup + 1)', 'markup' => '-margin/(margin - 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Margin and VAT takes VAT and Net cost and returns Gross cost and Margin. The arithmetic is the whole method: gross cost is worked out from VAT by one formula, applied once. Gross cost comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Margin and VAT calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Margin and VAT: it takes 2 numbers and reports Gross cost, Margin and Markup.</p><p>Written with the labels from the form, Gross cost = Net cost × (VAT + 1).</p><p>The result panel carries Gross cost, Margin, Markup and My net price, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>VAT</strong> — in percent. The value added tax (VAT) is a tax that the government applies on goods and services. Only the final consumer of a product pays this, and you can claim it back if you are selling a product.</li><li><strong>Net cost</strong> — in USD. The cost of a product before tax.</li></ul><p>The answers come back as Gross cost in USD, Margin in percent, Markup in percent, My net price in USD, My gross price in USD, Profit in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, VAT = 10 perc, Net cost = 100 USD, Margin = 1000 perc, Markup = 10 perc, My net price = 100 USD, My gross price = 1000 USD and Profit = 10 USD gives <strong>Gross cost</strong> = 1100 USD.</p><ul><li><strong>Gross cost</strong> = 1100 USD</li></ul><p>The line behind those figures is <strong>Gross cost</strong> = <code>Net cost × (VAT + 1)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Gross cost</strong> = 1100 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Margin offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Gross cost</strong> = <code>Net cost × (VAT + 1)</code></li><li><strong>Net cost</strong> = <code>Gross cost ÷ (VAT + 1)</code></li><li><strong>VAT</strong> = <code>(Gross cost − Net cost) ÷ Net cost</code></li><li><strong>My gross price</strong> = <code>My net price × (VAT + 1)</code></li><li><strong>My net price</strong> = <code>My gross price ÷ (VAT + 1)</code></li><li><strong>Markup</strong> = <code>( − Net cost + My net price) ÷ Net cost</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Gross cost</strong> = <code>Net cost × (VAT + 1)</code> — the form to use when Net cost and VAT are the values you have.</li><li><strong>Net cost</strong> = <code>Gross cost ÷ (VAT + 1)</code> — the form to use when Gross cost and VAT are the values you have.</li><li><strong>VAT</strong> = <code>(Gross cost − Net cost) ÷ Net cost</code> — the form to use when Gross cost and Net cost are the values you have.</li><li><strong>My gross price</strong> = <code>My net price × (VAT + 1)</code> — the form to use when My net price and VAT are the values you have.</li><li><strong>My net price</strong> = <code>My gross price ÷ (VAT + 1)</code> — the form to use when My gross price and VAT are the values you have.</li><li><strong>VAT</strong> = <code>(My gross price − My net price) ÷ My net price</code> — the form to use when My gross price and My net price are the values you have.</li><li><strong>Net cost</strong> = <code>My net price ÷ (Markup + 1)</code> — the form to use when My net price and Markup are the values you have.</li><li><strong>Markup</strong> = <code>( − Net cost + My net price) ÷ Net cost</code> — the form to use when Net cost and My net price are the values you have.</li></ul><p>Any one of Gross cost, Net cost and VAT can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — VAT, from 10 to 20 — and the answers go from <strong>Gross cost</strong> 1100 USD to <strong>Gross cost</strong> 2100 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside VAT is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gross cost, Margin and Markup are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>VAT left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If VAT is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Net cost left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Net cost is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If VAT is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Margin and VAT form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>VAT</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The value added tax (VAT) is a tax that the government applies on goods and services. Only the final consumer of a product pays this, and you can claim it back if you are selling a product. The page reads it when it works out Net cost, Gross cost and My gross price. Fill it from a measurement rather than a memory — VAT is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Net cost</strong> takes a plain number with no unit attached. The cost of a product before tax. The page reads it when it works out VAT, Gross cost and Markup. Fill it from a measurement rather than a memory — Net cost is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Gross cost</strong> is a plain number and the page's own defaults put it at 1100. It is computed from Net cost and VAT, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Margin</strong> is a percent figure. It is computed from Markup, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Markup</strong> is a percent figure. It is computed from Net cost and My net price, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>My net price</strong> is a plain number. It is computed from My gross price and VAT, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>My gross price</strong> is a plain number. It is computed from My net price and VAT, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Profit</strong> is a plain number. It is computed from Net cost and My net price, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Gross cost</th></tr></thead><tbody><tr><td><strong>VAT</strong> +10%</td><td>+9.09%</td></tr><tr><td><strong>Net cost</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Margin</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Markup</strong> +10%</td><td>+0%</td></tr><tr><td><strong>My net price</strong> +10%</td><td>+0%</td></tr><tr><td><strong>My gross price</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Profit</strong> +10%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Net cost sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Margin, Markup and My net price barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in VAT = 5 perc, Net cost = 50 USD, Margin = 500 perc, Markup = 5 perc, My net price = 50 USD, My gross price = 500 USD and Profit = 5 USD and the page reports <strong>Gross cost</strong> = 300 USD.</li><li>Feed in VAT = 30 perc, Net cost = 100 USD, Margin = 1000 perc, Markup = 10 perc, My net price = 100 USD, My gross price = 1000 USD and Profit = 10 USD and the page reports <strong>Gross cost</strong> = 3100 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Margin and VAT actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Gross cost follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes VAT and Net cost are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: VAT and Net cost measured, Gross cost and Margin wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/growing-annuity">Growing annuity Calculator</a>, <a href="/finance/gst">GST</a> and <a href="/finance/gst-qst">GST/QST Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Margin and VAT calculator work out?', 'a' => 'Gross cost, Margin, Markup and My net price, from Net cost and VAT. The relationship is Gross cost = Net cost × (VAT + 1).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'VAT (percent), Net cost (USD). Enter VAT and net cost; Gross cost is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Gross cost, Net cost, VAT and My gross price blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Gross cost = 1100 USD. The figures come from VAT as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Gross cost is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave VAT blank and the page solves for it, reporting Gross cost instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Gross cost at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/growing-annuity', 'name' => 'Growing annuity Calculator'],
            ['path' => '/finance/gst', 'name' => 'GST'],
            ['path' => '/finance/gst-qst', 'name' => 'GST/QST Calculator'],
        ],
        'authors' => [],
    ],
];
