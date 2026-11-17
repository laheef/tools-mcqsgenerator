<?php

/**
 * EBITDA
 * /finance/ebitda
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'EBITDA',
    'meta' => ['title' => 'EBITDA Calculator: Formula, Steps & Examples', 'description' => 'Enter operating profit and amortization expense and get EBITDA back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'EBITDA Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'operating_profit',
                            'label' => 'Operating profit',
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
                            'name' => 'amortization_expense',
                            'label' => 'Amortization expense',
                            'type' => 'number',
                            'help' => 'Lowering of loan and intangible assets book values.',
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
                            'name' => 'depreciation_expense',
                            'label' => 'Depreciation expense',
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
                            'name' => 'EBITDA',
                            'label' => 'EBITDA',
                            'type' => 'number',
                            'help' => 'Earnings before interest, taxes, depreciation, and amortization',
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
            'title' => 'EBITDA = operating_profit + depreciation_expense + amortization_expense',
            'results' => ['operating_profit' => 'EBITDA - amortization_expense - depreciation_expense', 'amortization_expense' => 'EBITDA - depreciation_expense - operating_profit', 'EBITDA' => 'amortization_expense + depreciation_expense + operating_profit', 'depreciation_expense' => 'EBITDA - amortization_expense - operating_profit'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Operating profit, Amortization expense and Depreciation expense into EBITDA and the answer comes back as EBITDA. Nothing is looked up on this page: EBITDA is computed from operating profit and the other boxes, so an unusual pair of values gives an honest answer rather than an error. EBITDA is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the EBITDA calculator works', 'html' => <<<'TXT'
            <p>The EBITDA calculator applies one relationship to 3 numbers and reports EBITDA.</p><p>Written with the labels from the form, EBITDA = Amortization expense + Depreciation expense + Operating profit.</p><p>The result panel carries EBITDA, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Operating profit</strong> — in USD</li><li><strong>Amortization expense</strong> — in USD. Lowering of loan and intangible assets book values.</li><li><strong>Depreciation expense</strong> — in USD</li></ul><p>The answer comes back as EBITDA in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Operating profit = 10 USD, Amortization expense = 100 USD and Depreciation expense = 1000 USD gives <strong>EBITDA</strong> = 1110 USD.</p><ul><li><strong>EBITDA</strong> = 1110 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>EBITDA</strong> = <code>Amortization expense + Depreciation expense + Operating profit</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>EBITDA</strong> = 1110. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as EBITDA is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>EBITDA</strong> = <code>Amortization expense + Depreciation expense + Operating profit</code></li><li><strong>Operating profit</strong> = <code>EBITDA − Amortization expense − Depreciation expense</code></li><li><strong>Amortization expense</strong> = <code>EBITDA − Depreciation expense − Operating profit</code></li><li><strong>Depreciation expense</strong> = <code>EBITDA − Amortization expense − Operating profit</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>EBITDA</strong> = <code>Amortization expense + Depreciation expense + Operating profit</code> — the form to use when Amortization expense, Depreciation expense and Operating profit are the values you have.</li><li><strong>Operating profit</strong> = <code>EBITDA − Amortization expense − Depreciation expense</code> — the form to use when EBITDA, Amortization expense and Depreciation expense are the values you have.</li><li><strong>Amortization expense</strong> = <code>EBITDA − Depreciation expense − Operating profit</code> — the form to use when EBITDA, Depreciation expense and Operating profit are the values you have.</li><li><strong>Depreciation expense</strong> = <code>EBITDA − Amortization expense − Operating profit</code> — the form to use when EBITDA, Amortization expense and Operating profit are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of EBITDA, Operating profit and Amortization expense can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Operating profit, from 10 to 20 — and the answers go from <strong>EBITDA</strong> 1110 USD to <strong>EBITDA</strong> 1120 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> EBITDA is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Operating profit left as a guess.</strong> Anything typed into Operating profit is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Amortization expense left as a guess.</strong> Anything typed into Amortization expense is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Depreciation expense left as a guess.</strong> Anything typed into Depreciation expense is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Operating profit is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Operating profit</strong> takes a plain number with no unit attached. Change it and Amortization expense, EBITDA and Depreciation expense changes with it. Have it to hand before you start: Operating profit is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Amortization expense</strong> takes a plain number with no unit attached. Lowering of loan and intangible assets book values. Change it and Operating profit, EBITDA and Depreciation expense changes with it. Have it to hand before you start: Amortization expense is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Depreciation expense</strong> takes a plain number with no unit attached. Change it and Operating profit, Amortization expense and EBITDA changes with it. Have it to hand before you start: Depreciation expense is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>EBITDA</strong> is a plain number and the page's own defaults put it at 1110. The value follows from Amortization expense, Depreciation expense and Operating profit. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>EBITDA</th></tr></thead><tbody><tr><td><strong>Operating profit</strong> +10%</td><td>+0.09%</td></tr><tr><td><strong>Amortization expense</strong> +10%</td><td>+0.9%</td></tr><tr><td><strong>Depreciation expense</strong> +10%</td><td>+9.01%</td></tr></tbody></table><p>The steepest column belongs to Depreciation expense: ten per cent there moves an answer by about 9 per cent, which is why that is the number to measure twice. By contrast, Operating profit barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Operating profit = 5 USD, Amortization expense = 50 USD and Depreciation expense = 500 USD, the answer is <strong>EBITDA</strong> = 555 USD.</li><li>With Operating profit = 30 USD, Amortization expense = 100 USD and Depreciation expense = 1000 USD, the answer is <strong>EBITDA</strong> = 1130 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Operating profit, Amortization expense and Depreciation expense. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Operating profit into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare EBITDA in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind EBITDA is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Operating profit, Amortization expense and Depreciation expense are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Operating profit, Amortization expense and Depreciation expense measured, EBITDA wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/cpc-cpm">CPC and CPM Calculator</a>, <a href="/finance/cpi-inflation">CPI inflation</a> and <a href="/finance/cpm">CPM Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the EBITDA calculator work out?', 'a' => <<<'TXT'
            EBITDA, from Amortization expense, Depreciation expense and Operating profit. The relationship is EBITDA = Amortization expense + Depreciation expense + Operating profit.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Operating profit (USD), Amortization expense (USD), Depreciation expense (USD). Enter operating profit, amortization expense and depreciation expense; EBITDA is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. EBITDA, Operating profit, Amortization expense and Depreciation expense can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'EBITDA = 1110 USD. Those are the defaults written into the form — move Operating profit and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of EBITDA is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Operating profit left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to EBITDA at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/cpc-cpm', 'name' => 'CPC and CPM Calculator'],
            ['path' => '/finance/cpi-inflation', 'name' => 'CPI inflation'],
            ['path' => '/finance/cpm', 'name' => 'CPM Calculator'],
        ],
        'authors' => [],
    ],
];
