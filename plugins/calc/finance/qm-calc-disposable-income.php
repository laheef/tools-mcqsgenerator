<?php

/**
 * Disposable income
 * /finance/disposable-income
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Disposable income',
    'meta' => ['title' => 'Disposable income: Formula, Steps & Results', 'description' => 'Disposable income turns personal income and government taxes into disposable personal income. Results come back in USD, with any other unit a click away.', 'h1' => 'Disposable income Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Income',
                            'label' => 'Personal income',
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
                            'name' => 'Taxes',
                            'label' => 'Government taxes',
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
                            'name' => 'Transfers',
                            'label' => 'Government transfers',
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
                            'name' => 'Disposable_income',
                            'label' => 'Disposable personal income',
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
            'title' => 'Disposable_income = Income - Taxes + Transfers',
            'results' => ['Disposable_income' => 'Income - Taxes + Transfers', 'Income' => 'Disposable_income + Taxes - Transfers', 'Transfers' => 'Disposable_income - Income + Taxes', 'Taxes' => '-Disposable_income + Income + Transfers'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Personal income, Government taxes and Government transfers into Disposable income and the answer comes back as Disposable personal income. There is no hidden constant here: change disposable personal income and personal income moves with it. The main result, Disposable personal income, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Disposable income calculator works', 'html' => <<<'TXT'
            <p>Disposable income answers one question from 3 numbers, and the answer is Disposable personal income.</p><p>In the form&#039;s own words, Disposable personal income = Personal income − Government taxes + Government transfers.</p><p>What comes back is Disposable personal income — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Personal income</strong> — in USD</li><li><strong>Government taxes</strong> — in USD</li><li><strong>Government transfers</strong> — in USD</li></ul><p>What you get back is Disposable personal income in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Personal income = 10 USD, Government taxes = 100 USD and Government transfers = 1000 USD — through the same formula and the panel reports <strong>Disposable personal income</strong> = 910 USD.</p><ul><li><strong>Disposable personal income</strong> = 910 USD</li></ul><p>That is <strong>Disposable personal income</strong> = <code>Personal income − Government taxes + Government transfers</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Disposable personal income</strong> = 910. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Disposable personal income is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Disposable personal income</strong> = <code>Personal income − Government taxes + Government transfers</code></li><li><strong>Personal income</strong> = <code>Disposable personal income + Government taxes − Government transfers</code></li><li><strong>Government transfers</strong> = <code>Disposable personal income − Personal income + Government taxes</code></li><li><strong>Government taxes</strong> = <code>− Disposable personal income + Personal income + Government transfers</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Disposable personal income</strong> = <code>Personal income − Government taxes + Government transfers</code> — the form to use when Personal income, Government taxes and Government transfers are the values you have.</li><li><strong>Personal income</strong> = <code>Disposable personal income + Government taxes − Government transfers</code> — the form to use when Disposable personal income, Government taxes and Government transfers are the values you have.</li><li><strong>Government transfers</strong> = <code>Disposable personal income − Personal income + Government taxes</code> — the form to use when Disposable personal income, Personal income and Government taxes are the values you have.</li><li><strong>Government taxes</strong> = <code>− Disposable personal income + Personal income + Government transfers</code> — the form to use when Disposable personal income, Personal income and Government transfers are the values you have.</li></ul><p>Any one of Disposable personal income, Personal income and Government transfers can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Personal income from 10 to 20, leaving every other box alone. The panel moves from <strong>Disposable personal income</strong> 910 USD to <strong>Disposable personal income</strong> 920 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Disposable personal income is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Personal income left as a guess.</strong> Anything typed into Personal income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Government taxes left as a guess.</strong> Anything typed into Government taxes is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Government transfers left as a guess.</strong> Anything typed into Government transfers is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Personal income is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Disposable income form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Personal income</strong> takes a plain number with no unit attached. The page reads it when it works out Disposable personal income, Government transfers and Government taxes. Fill it from a measurement rather than a memory — Personal income is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Government taxes</strong> takes a plain number with no unit attached. The page reads it when it works out Disposable personal income, Personal income and Government transfers. Fill it from a measurement rather than a memory — Government taxes is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Government transfers</strong> takes a plain number with no unit attached. The page reads it when it works out Disposable personal income, Personal income and Government taxes. Fill it from a measurement rather than a memory — Government transfers is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Disposable personal income</strong> is a plain number and the page's own defaults put it at 910. It is computed from Personal income, Government taxes and Government transfers, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Disposable personal income</th></tr></thead><tbody><tr><td><strong>Personal income</strong> +10%</td><td>+0.11%</td></tr><tr><td><strong>Government taxes</strong> +10%</td><td>-1.1%</td></tr><tr><td><strong>Government transfers</strong> +10%</td><td>+10.99%</td></tr></tbody></table><p>The steepest column belongs to Government transfers: ten per cent there moves an answer by about 11 per cent, which is why that is the number to measure twice. By contrast, Personal income barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Personal income = 5 USD, Government taxes = 50 USD and Government transfers = 500 USD and the page reports <strong>Disposable personal income</strong> = 455 USD.</li><li>Feed in Personal income = 30 USD, Government taxes = 100 USD and Government transfers = 1000 USD and the page reports <strong>Disposable personal income</strong> = 930 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Personal income, Government taxes and Government transfers ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Personal income — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Disposable personal income in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Disposable personal income is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Personal income, Government taxes and Government transfers are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Personal income, Government taxes and Government transfers and the number you are missing is Disposable personal income.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/50-30-20-rule">50/30/20 rule</a>, <a href="/finance/529">529 Calculator</a> and <a href="/finance/70-20-10-rule-money">70/20/10 rule money Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Disposable income is a number to act on, so the useful question is what to do with Disposable personal income (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Personal income, Government taxes and Government transfers alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Disposable income calculator work out?', 'a' => <<<'TXT'
            Disposable personal income, from Personal income, Government taxes and Government transfers. The relationship is Disposable personal income = Personal income − Government taxes + Government transfers.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Personal income (USD), Government taxes (USD), Government transfers (USD). Enter personal income, government taxes and government transfers; Disposable personal income is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Disposable personal income, Personal income, Government transfers and Government taxes blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Disposable personal income = 910 USD. The figures come from Personal income as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Disposable personal income is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Personal income blank and the page solves for it, reporting Disposable personal income instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Disposable personal income keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/50-30-20-rule', 'name' => '50/30/20 rule'],
            ['path' => '/finance/529', 'name' => '529 Calculator'],
            ['path' => '/finance/70-20-10-rule-money', 'name' => '70/20/10 rule money Calculator'],
        ],
        'authors' => [],
    ],
];
