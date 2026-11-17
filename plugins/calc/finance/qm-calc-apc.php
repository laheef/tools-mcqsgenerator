<?php

/**
 * APC
 * /finance/apc
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'APC',
    'meta' => ['title' => 'APC Calculator — Free, With Worked Examples', 'description' => 'APC turns total consumption and total disposable income into average propensity to consume (APC). Every box can be solved for, not only the one in the title.', 'h1' => 'APC Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'consumption',
                            'label' => 'Total consumption',
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
                            'name' => 'disposable_income',
                            'label' => 'Total disposable income',
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
                            'name' => 'apc',
                            'label' => 'Average propensity to consume (APC)',
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
            'title' => 'apc = consumption/disposable_income',
            'results' => ['disposable_income' => 'consumption/apc', 'apc' => 'consumption/disposable_income', 'consumption' => 'apc*disposable_income'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Total consumption and Total disposable income into APC and the answer comes back as Average propensity to consume (APC). There is no hidden constant here: change average propensity to consume (APC) and total consumption moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the APC calculator works', 'html' => <<<'TXT'
            <p>APC answers one question from 2 numbers, and the answer is Average propensity to consume (APC).</p><p>In the form&#039;s own words, Average propensity to consume (APC) = Total consumption ÷ Total disposable income.</p><p>The answers are Average propensity to consume (APC); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Total consumption</strong> — in USD</li><li><strong>Total disposable income</strong> — in USD</li></ul><p>The answer comes back as Average propensity to consume (APC). The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Total consumption = 10 USD and Total disposable income = 100 USD — through the same formula and the panel reports <strong>Average propensity to consume (APC)</strong> = 0.1.</p><ul><li><strong>Average propensity to consume (APC)</strong> = 0.1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Average propensity to consume (APC)</strong> = <code>Total consumption ÷ Total disposable income</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Average propensity to consume (APC)</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Average propensity to consume (APC) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Average propensity to consume (APC)</strong> = <code>Total consumption ÷ Total disposable income</code></li><li><strong>Total disposable income</strong> = <code>Total consumption ÷ Average propensity to consume (APC)</code></li><li><strong>Total consumption</strong> = <code>Average propensity to consume (APC) × Total disposable income</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Average propensity to consume (APC)</strong> = <code>Total consumption ÷ Total disposable income</code> — the form to use when Total consumption and Total disposable income are the values you have.</li><li><strong>Total disposable income</strong> = <code>Total consumption ÷ Average propensity to consume (APC)</code> — the form to use when Total consumption and Average propensity to consume (APC) are the values you have.</li><li><strong>Total consumption</strong> = <code>Average propensity to consume (APC) × Total disposable income</code> — the form to use when Average propensity to consume (APC) and Total disposable income are the values you have.</li></ul><p>Any one of Average propensity to consume (APC), Total disposable income and Total consumption can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total consumption from 10 to 20, leaving every other box alone. The panel moves from <strong>Average propensity to consume (APC)</strong> 0.1 to <strong>Average propensity to consume (APC)</strong> 0.2.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Average propensity to consume (APC) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Total consumption left as a guess.</strong> Anything typed into Total consumption is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Total disposable income left as a guess.</strong> Anything typed into Total disposable income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Total consumption is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Total consumption</strong> takes a plain number with no unit attached. Change it and Total disposable income and Average propensity to consume (APC) changes with it. Have it to hand before you start: Total consumption is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total disposable income</strong> takes a plain number with no unit attached. Change it and Average propensity to consume (APC) and Total consumption changes with it. Have it to hand before you start: Total disposable income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Average propensity to consume (APC)</strong> is a plain number and the page's own defaults put it at 0.1. It is computed from Total consumption and Total disposable income, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Average propensity to consume (APC)</th></tr></thead><tbody><tr><td><strong>Total consumption</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Total disposable income</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Total consumption: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Total consumption = 5 USD and Total disposable income = 50 USD, the answer is <strong>Average propensity to consume (APC)</strong> = 0.1.</li><li>With Total consumption = 30 USD and Total disposable income = 100 USD, the answer is <strong>Average propensity to consume (APC)</strong> = 0.3.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Total consumption and Total disposable income. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Total consumption into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Average propensity to consume (APC) with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Average propensity to consume (APC) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total consumption and Total disposable income are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Total consumption and Total disposable income measured, Average propensity to consume (APC) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/disposable-income">Disposable income Calculator</a>, <a href="/finance/dividend">Dividend Calculator</a> and <a href="/finance/divdend-discount-model">Dividend discount model</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the APC calculator work out?', 'a' => <<<'TXT'
            Average propensity to consume (APC), from Total consumption and Total disposable income. The relationship is Average propensity to consume (APC) = Total consumption ÷ Total disposable income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total consumption (USD), Total disposable income (USD). Enter total consumption and total disposable income; Average propensity to consume (APC) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Average propensity to consume (APC), Total disposable income and Total consumption blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Average propensity to consume (APC) = 0.1. Those are the defaults written into the form — move Total consumption and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Average propensity to consume (APC) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Total consumption left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Average propensity to consume (APC) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/disposable-income', 'name' => 'Disposable income Calculator'],
            ['path' => '/finance/dividend', 'name' => 'Dividend Calculator'],
            ['path' => '/finance/divdend-discount-model', 'name' => 'Dividend discount model'],
        ],
        'authors' => [],
    ],
];
