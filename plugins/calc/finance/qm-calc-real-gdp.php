<?php

/**
 * Real GDP
 * /finance/real-gdp
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Real GDP',
    'meta' => ['title' => 'Real GDP Calculator: Formula, Steps & Examples', 'description' => 'Enter Nominal GDP and GDP deflator and get Real GDP back. A worked example walks through the arithmetic with this page\'s own numbers. Every figure is computed.', 'h1' => 'Real GDP Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'NominalGDP',
                            'label' => 'Nominal GDP',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'GDP_def',
                            'label' => 'GDP deflator',
                            'type' => 'number',
                            'help' => 'For example, if inflation is 1%, the GDP deflator is 1.01.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'RealGDP',
                            'label' => 'Real GDP',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'RealGDP = NominalGDP / (GDP_def)',
            'results' => ['GDP_def' => 'NominalGDP/RealGDP', 'RealGDP' => 'NominalGDP/GDP_def', 'NominalGDP' => 'GDP_def*RealGDP'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Nominal GDP and GDP deflator into Real GDP and the answer comes back as Real GDP. There is no hidden constant here: change real GDP and nominal GDP moves with it. The main result, Real GDP, is reported in USD.
        TXT,
        'sections' => [
            ['title' => 'How the Real GDP calculator works', 'html' => <<<'TXT'
            <p>Real GDP answers one question from 2 numbers, and the answer is Real GDP.</p><p>The relationship it solves reads Real GDP = Nominal GDP ÷ GDP deflator.</p><p>What comes back is Real GDP — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Nominal GDP</strong> — in USD</li><li><strong>GDP deflator</strong> — a plain number, no unit. For example, if inflation is 1%, the GDP deflator is 1.01.</li></ul><p>The result box is Real GDP in USD. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Nominal GDP = 10 USD and GDP deflator = 100 gives <strong>Real GDP</strong> = 0.1 USD.</p><ul><li><strong>Real GDP</strong> = 0.1 USD</li></ul><p>The line behind those figures is <strong>Real GDP</strong> = <code>Nominal GDP ÷ GDP deflator</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Real GDP</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Real GDP is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Real GDP</strong> = <code>Nominal GDP ÷ GDP deflator</code></li><li><strong>GDP deflator</strong> = <code>Nominal GDP ÷ Real GDP</code></li><li><strong>Nominal GDP</strong> = <code>GDP deflator × Real GDP</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Real GDP</strong> = <code>Nominal GDP ÷ GDP deflator</code> — the form to use when Nominal GDP and GDP deflator are the values you have.</li><li><strong>GDP deflator</strong> = <code>Nominal GDP ÷ Real GDP</code> — the form to use when Nominal GDP and Real GDP are the values you have.</li><li><strong>Nominal GDP</strong> = <code>GDP deflator × Real GDP</code> — the form to use when GDP deflator and Real GDP are the values you have.</li></ul><p>Any one of Real GDP, GDP deflator and Nominal GDP can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Nominal GDP from 10 to 20, leaving every other box alone. The panel moves from <strong>Real GDP</strong> 0.1 USD to <strong>Real GDP</strong> 0.2 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Real GDP is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Nominal GDP left as a guess.</strong> Anything typed into Nominal GDP is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>GDP deflator left as a guess.</strong> Anything typed into GDP deflator is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Nominal GDP to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Nominal GDP</strong> takes a plain number with no unit attached. Change it and GDP deflator and Real GDP changes with it. Have it to hand before you start: Nominal GDP is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>GDP deflator</strong> takes a plain number with no unit attached. For example, if inflation is 1%, the GDP deflator is 1.01. Change it and Real GDP and Nominal GDP changes with it. Have it to hand before you start: GDP deflator is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Real GDP</strong> is a plain number and the page's own defaults put it at 0.1. It is computed from Nominal GDP and GDP deflator, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Real GDP</th></tr></thead><tbody><tr><td><strong>Nominal GDP</strong> +10%</td><td>+10%</td></tr><tr><td><strong>GDP deflator</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Nominal GDP: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Nominal GDP = 5 USD and GDP deflator = 50, the answer is <strong>Real GDP</strong> = 0.1 USD.</li><li>With Nominal GDP = 30 USD and GDP deflator = 100, the answer is <strong>Real GDP</strong> = 0.3 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Nominal GDP and GDP deflator. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Nominal GDP into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Real GDP in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Real GDP is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Nominal GDP and GDP deflator measured, Real GDP wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/real-interest-rate">Real interest rate Calculator</a>, <a href="/finance/real-rate-of-return">Real rate of return Calculator</a> and <a href="/finance/receivables-turnover">Receivables turnover Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Real GDP calculator work out?', 'a' => 'Real GDP, from Nominal GDP and GDP deflator. The relationship is Real GDP = Nominal GDP ÷ GDP deflator.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Nominal GDP (USD), GDP deflator. Enter nominal GDP and GDP deflator; Real GDP is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Real GDP, GDP deflator and Nominal GDP blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Real GDP = 0.1 USD. Those are the defaults written into the form — move Nominal GDP and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Real GDP is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Nominal GDP left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Real GDP keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/real-interest-rate', 'name' => 'Real interest rate Calculator'],
            ['path' => '/finance/real-rate-of-return', 'name' => 'Real rate of return Calculator'],
            ['path' => '/finance/receivables-turnover', 'name' => 'Receivables turnover Calculator'],
        ],
        'authors' => [],
    ],
];
