<?php

/**
 * Markup and margin (2 sets)
 * /finance/margin-2-sets
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Markup and margin (2 sets)',
    'meta' => ['title' => 'Markup and margin (2 sets) — Formula & Results', 'description' => 'Enter cost, margin and margin 1 and Markup and margin (2 sets) returns revenue and profit. Every box can be solved for, not only the one in the title.', 'h1' => 'Markup and margin (2 sets) Calculator', 'updated' => '2026-09-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost',
                            'label' => 'Cost',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calc_mode',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Compare two markups and margins' => '1', '' => '0'],
                            'dataset' => 'mode switch',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'margin',
                            'label' => 'Margin',
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
                            'name' => 'markup',
                            'label' => 'Markup',
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
                            'name' => 'revenue',
                            'label' => 'Revenue',
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
                            'name' => 'profit',
                            'label' => 'Profit',
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
                        ['type' => 'note', 'text' => 'Check out how to use the markup and margin calculator.'],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'margin1',
                            'label' => 'Margin 1',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'margin2',
                            'label' => 'Margin 2',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'markup1',
                            'label' => 'Markup 1',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'markup2',
                            'label' => 'Markup 2',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'revenue1',
                            'label' => 'Revenue 1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'revenue2',
                            'label' => 'Revenue 2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'profit1',
                            'label' => 'Profit 1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'profit2',
                            'label' => 'Profit 2',
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
            'title' => 'cost + cost * markup1  = revenue1 ',
            'results' => ['markup1' => '(-cost + revenue1)/cost', 'cost' => 'revenue1/(markup1 + 1)', 'revenue1' => 'cost*(markup1 + 1)'],
        ],
        [
            'title' => 'cost*markup1 = profit1',
            'results' => ['markup1' => 'profit1/cost', 'cost' => 'profit1/markup1', 'profit1' => 'cost*markup1'],
        ],
        [
            'title' => 'profit1 = revenue1 - cost',
            'results' => ['cost' => '-profit1 + revenue1', 'revenue1' => 'cost + profit1', 'profit1' => '-cost + revenue1'],
        ],
        [
            'title' => 'markup1 = 1 / (1 - margin1) - 1',
            'results' => ['markup1' => '-margin1/(margin1 - 1)', 'margin1' => 'markup1/(markup1 + 1)'],
        ],
        [
            'title' => 'cost + cost * markup2  = revenue2',
            'results' => ['markup2' => '(-cost + revenue2)/cost', 'revenue2' => 'cost*(markup2 + 1)', 'cost' => 'revenue2/(markup2 + 1)'],
        ],
        [
            'title' => 'profit2 = revenue2 - cost',
            'results' => ['revenue2' => 'cost + profit2', 'profit2' => '-cost + revenue2', 'cost' => '-profit2 + revenue2'],
        ],
        [
            'title' => 'markup2 = 1 / (1 - margin2) - 1',
            'results' => ['margin2' => 'markup2/(markup2 + 1)', 'markup2' => '-margin2/(margin2 - 1)'],
        ],
        [
            'title' => 'cost + cost * markup  = revenue',
            'results' => ['revenue' => 'cost*(markup + 1)', 'cost' => 'revenue/(markup + 1)', 'markup' => '(-cost + revenue)/cost'],
        ],
        [
            'title' => 'cost*markup = profit',
            'results' => ['profit' => 'cost*markup', 'cost' => 'profit/markup', 'markup' => 'profit/cost'],
        ],
        [
            'title' => 'profit = revenue - cost',
            'results' => ['profit' => '-cost + revenue', 'revenue' => 'cost + profit', 'cost' => '-profit + revenue'],
        ],
        [
            'title' => 'markup = 1 / (1 - margin) - 1',
            'results' => ['margin' => 'markup/(markup + 1)', 'markup' => '-margin/(margin - 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Markup and margin (2 sets) takes Cost and Revenue 1 and returns Margin and Markup. There is no hidden constant here: change margin and cost moves with it. The main result, Margin, is reported in percent.
        TXT,
        'sections' => [
            ['title' => 'How the Markup and margin (2 sets) calculator works', 'html' => <<<'TXT'
            <p>The Markup and margin (2 sets) calculator applies one relationship to 2 numbers and reports Margin, Markup and Revenue.</p><p>Written with the labels from the form, Markup 1 = ( − Cost + Revenue 1) ÷ Cost.</p><p>The result panel carries Margin, Markup, Revenue and Profit, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Cost</strong> — in USD</li><li><strong>Revenue 1</strong> — in USD</li></ul><p>The result boxes are Margin in percent, Markup in percent, Revenue in USD, Profit in USD, Margin 1 in percent, Margin 2 in percent, Markup 1 in percent, Markup 2 in percent, Revenue 2 in USD, Profit 1 in USD, Profit 2 in USD; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Margin offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Markup 1</strong> = <code>( − Cost + Revenue 1) ÷ Cost</code></li><li><strong>Cost</strong> = <code>Revenue 1 ÷ (Markup 1 + 1)</code></li><li><strong>Revenue 1</strong> = <code>Cost × (Markup 1 + 1)</code></li><li><strong>Profit 1</strong> = <code>Cost × Markup 1</code></li><li><strong>Margin 1</strong> = <code>Markup 1 ÷ (Markup 1 + 1)</code></li><li><strong>Markup 2</strong> = <code>( − Cost + Revenue 2) ÷ Cost</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Markup 1</strong> = <code>( − Cost + Revenue 1) ÷ Cost</code> — the form to use when Cost and Revenue 1 are the values you have.</li><li><strong>Cost</strong> = <code>Revenue 1 ÷ (Markup 1 + 1)</code> — the form to use when Revenue 1 and Markup 1 are the values you have.</li><li><strong>Revenue 1</strong> = <code>Cost × (Markup 1 + 1)</code> — the form to use when Cost and Markup 1 are the values you have.</li><li><strong>Markup 1</strong> = <code>Profit 1 ÷ Cost</code> — the form to use when Profit 1 and Cost are the values you have.</li><li><strong>Cost</strong> = <code>Profit 1 ÷ Markup 1</code> — the form to use when Profit 1 and Markup 1 are the values you have.</li><li><strong>Profit 1</strong> = <code>Cost × Markup 1</code> — the form to use when Cost and Markup 1 are the values you have.</li><li><strong>Profit 1</strong> = <code>− Cost + Revenue 1</code> — the form to use when Cost and Revenue 1 are the values you have.</li><li><strong>Cost</strong> = <code>− Profit 1 + Revenue 1</code> — the form to use when Profit 1 and Revenue 1 are the values you have.</li></ul><p>Any one of Markup 1, Cost and Revenue 1 can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Margin, Markup and Revenue are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cost left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cost is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Revenue 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Revenue 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Cost to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cost</strong> takes a plain number with no unit attached. The page reads it when it works out Markup 1, Revenue 1 and Profit 1. Have it to hand before you start: Cost is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Revenue 1</strong> takes a plain number with no unit attached. The page reads it when it works out Markup 1, Cost and Profit 1. Have it to hand before you start: Revenue 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 11 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Margin</strong> is a percent figure. It is computed from Markup, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Markup</strong> is a percent figure. It is computed from Cost and Revenue, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Revenue</strong> is a plain number. It is computed from Cost and Markup, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Profit</strong> is a plain number. It is computed from Cost and Markup, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Margin 1</strong> is a percent figure. It is computed from Markup 1, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Margin 2</strong> is a percent figure. It is computed from Markup 2, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Markup 1</strong> is a percent figure. It is computed from Cost and Revenue 1, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Markup 2</strong> is a percent figure. It is computed from Cost and Revenue 2, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Revenue 2</strong> is a plain number. It is computed from Cost and Markup 2, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Profit 1</strong> is a plain number. It is computed from Cost and Markup 1, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Profit 2</strong> is a plain number. It is computed from Cost and Revenue 2, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Margin follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Cost and Revenue 1 is what you already know and Margin and Markup is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/income-elasticity-demand">Income elasticity of demand Calculator</a>, <a href="/finance/income-tax-pakistan">Income tax - Pakistan</a> and <a href="/finance/income-tax-australia">Income tax Australia Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Markup and margin (2 sets) calculator work out?', 'a' => 'Margin, Markup, Revenue and Profit, from Cost and Revenue 1. The relationship is Markup 1 = ( − Cost + Revenue 1) ÷ Cost.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cost (USD), Revenue 1 (USD). With cost and revenue 1 in place, Margin can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Markup 1, Cost, Revenue 1 and Profit 1 blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Margin is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With Cost left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Margin keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/income-elasticity-demand', 'name' => 'Income elasticity of demand Calculator'],
            ['path' => '/finance/income-tax-pakistan', 'name' => 'Income tax - Pakistan'],
            ['path' => '/finance/income-tax-australia', 'name' => 'Income tax Australia Calculator'],
        ],
        'authors' => [],
    ],
];
