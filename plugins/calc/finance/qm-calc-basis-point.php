<?php

/**
 * Basis point
 * /finance/basis-point
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Basis point',
    'meta' => ['title' => 'Basis point Calculator: Formula, Steps & Examples', 'description' => 'Basis point works out decimal value and permille from percent, x {{choose_portion.unit}} and of.... Every box can be solved for, not only the one in the title.', 'h1' => 'Basis point Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'decimal_value',
                            'label' => 'Decimal value',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percent',
                            'label' => 'Percent',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'permille',
                            'label' => 'Permille',
                            'type' => 'number',
                            'suffix' => '‰',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bps',
                            'label' => 'Basis points',
                            'type' => 'number',
                            'suffix' => 'bps',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'What is x bps of y?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'choose_portion',
                            'label' => 'x {{choose_portion.unit}}',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'bps',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amount',
                            'label' => 'of...',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '65000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result',
                            'label' => 'equals...',
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
                    'place' => [0, 0],
                    'fields' => [
                        ['type' => 'note', 'text' => '{{choose_portion.formattedValue}} {{choose_portion.unit}} of {{amount.monetaryValue}} equals {{result.monetaryValue}}'],
                        ['type' => 'note', 'text' => <<<'TXT'
                        Example: A stock worth {{amount.monetaryValue}} has increased by {{choose_portion.formattedValue}} {{choose_portion.unit}}. This means its value has increased by {{result.monetaryValue}}, and the stock is now worth {{final_amount.monetaryValue}}.
                        TXT],
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
                            'name' => 'final_amount',
                            'label' => 'Final amount',
                            'type' => 'presentation',
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
            'title' => 'bps = percent * 100 ',
            'results' => ['bps' => '100*percent', 'percent' => '(1/100)*bps'],
        ],
        [
            'title' => 'permille = percent * 10',
            'results' => ['permille' => '10*percent', 'percent' => '(1/10)*permille'],
        ],
        [
            'title' => 'decimal_value = percent * 0.01',
            'results' => ['decimal_value' => '(1/100)*percent', 'percent' => '100*decimal_value'],
        ],
        [
            'title' => 'result = choose_portion * 0.0001 * amount',
            'results' => ['choose_portion' => '10000*result/amount', 'amount' => '10000*result/choose_portion', 'result' => '(1/10000)*amount*choose_portion'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => 'Basis point takes Percent and returns Decimal value and Permille. There is no hidden constant here: change decimal value and percent moves with it.',
        'sections' => [
            ['title' => 'How the Basis point calculator works', 'html' => <<<'TXT'
            <p>The Basis point calculator applies one relationship to 1 number and reports Decimal value, Permille and Basis points.</p><p>In the form&#039;s own words, Basis points = 100 × Percent.</p><p>The result panel carries Decimal value, Permille, Basis points and x, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Percent</strong> — in %</li></ul><p>What you get back is Decimal value, Permille in ‰, Basis points in bps, x in basis points, of… in USD, equals… in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: x {{choose_portion.unit}} offers 6 units and opens on basis points, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Basis points</strong> = <code>100 × Percent</code></li><li><strong>Percent</strong> = <code>(1 ÷ 100) × Basis points</code></li><li><strong>Permille</strong> = <code>10 × Percent</code></li><li><strong>Decimal value</strong> = <code>(1 ÷ 100) × Percent</code></li><li><strong>equals…</strong> = <code>(1 ÷ 10000) × of... × x </code></li><li><strong>x</strong> = <code>10000 × equals... ÷ of...</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Basis points</strong> = <code>100 × Percent</code> — the form to use when Percent are the values you have.</li><li><strong>Percent</strong> = <code>(1 ÷ 100) × Basis points</code> — the form to use when Basis points are the values you have.</li><li><strong>Permille</strong> = <code>10 × Percent</code> — the form to use when Percent are the values you have.</li><li><strong>Percent</strong> = <code>(1 ÷ 10) × Permille</code> — the form to use when Permille are the values you have.</li><li><strong>Decimal value</strong> = <code>(1 ÷ 100) × Percent</code> — the form to use when Percent are the values you have.</li><li><strong>Percent</strong> = <code>100 × Decimal value</code> — the form to use when Decimal value are the values you have.</li><li><strong>equals…</strong> = <code>(1 ÷ 10000) × of... × x </code> — the form to use when of… and x are the values you have.</li><li><strong>x</strong> = <code>10000 × equals... ÷ of...</code> — the form to use when equals… and of… are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Basis points, Percent and Permille can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Decimal value, Permille and Basis points are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Percent left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Percent is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Percent is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Basis point form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Percent</strong> is measured in %. The page reads it when it works out Basis points, Permille and Decimal value. Fill it from a measurement rather than a memory — Percent is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Decimal value</strong> is a plain number. It is worked out from Percent. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Permille</strong> is a plain number. It is worked out from Percent. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Basis points</strong> is a plain number. It is worked out from Percent. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>x</strong> is a basis points figure. It is worked out from equals… and of…. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>of…</strong> is a plain number. It is worked out from equals… and x. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>equals…</strong> is a plain number. It is worked out from of… and x. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Basis point actually offers.</p><ul><li><strong>basis points</strong> — opens in <em>bps</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Percent ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Percent — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Decimal value against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Decimal value follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover basis points. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Percent is what you already know and Decimal value and Permille is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/ohio-sales-tax">Ohio sales tax Calculator</a>, <a href="/finance/okun-law">Okun&#039;s law Calculator</a> and <a href="/finance/marketing-conversion">Online marketing conversion Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Basis point is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Basis point calculator work out?', 'a' => 'Decimal value, Permille, Basis points and x, from Percent. The relationship is Basis points = 100 × Percent.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Percent (%). Enter percent; Decimal value is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Basis points, Percent, Permille and Decimal value can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Decimal value is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Percent blank and the page solves for it, reporting Decimal value instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Decimal value keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/ohio-sales-tax', 'name' => 'Ohio sales tax Calculator'],
            ['path' => '/finance/okun-law', 'name' => 'Okun\'s law Calculator'],
            ['path' => '/finance/marketing-conversion', 'name' => 'Online marketing conversion Calculator'],
        ],
        'authors' => [],
    ],
];
