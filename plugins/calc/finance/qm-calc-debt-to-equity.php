<?php

/**
 * Debt to equity
 * /finance/debt-to-equity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Debt to equity',
    'meta' => ['title' => 'Debt to equity Calculator: Free, With Steps', 'description' => 'Enter Total liabilities (D) and Stockholders\' equity (E) and get Debt to equity ratio (D/E) back. Every box can be solved for, not only the one in the title.', 'h1' => 'Debt to equity Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Total_Liabilities',
                            'label' => 'Total liabilities (D)',
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
                            'name' => 'Shareholders_Equity',
                            'label' => 'Stockholders\' equity (E)',
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
                            'name' => 'Debt_to_Equity_ratio',
                            'label' => 'Debt to equity ratio (D/E)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Debt_to_Equity_ratio=Total_Liabilities/Shareholders_Equity',
            'results' => ['Debt_to_Equity_ratio' => 'Total_Liabilities/Shareholders_Equity', 'Shareholders_Equity' => 'Total_Liabilities/Debt_to_Equity_ratio', 'Total_Liabilities' => 'Debt_to_Equity_ratio*Shareholders_Equity'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Total liabilities (D) and Stockholders' equity (E) into Debt to equity and the answer comes back as Debt to equity ratio (D/E). The arithmetic is the whole method: debt to equity ratio (D/E) is worked out from total liabilities (D) by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Debt to equity calculator works', 'html' => <<<'TXT'
            <p>The Debt to equity calculator applies one relationship to 2 numbers and reports Debt to equity ratio (D/E).</p><p>Written with the labels from the form, Debt to equity ratio (D/E) = Total liabilities (D) ÷ Stockholders&#039; equity (E).</p><p>The result panel carries Debt to equity ratio (D/E), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Total liabilities (D)</strong> — in USD</li><li><strong>Stockholders&#039; equity (E)</strong> — in USD</li></ul><p>What you get back is Debt to equity ratio (D/E), shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Total liabilities (D) = 10 USD and Stockholders&amp;#039; equity (E) = 100 USD — through the same formula and the panel reports <strong>Debt to equity ratio (D/E)</strong> = 0.1.</p><ul><li><strong>Debt to equity ratio (D/E)</strong> = 0.1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Debt to equity ratio (D/E)</strong> = <code>Total liabilities (D) ÷ Stockholders&#039; equity (E)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Debt to equity ratio (D/E)</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Debt to equity ratio (D/E) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Debt to equity ratio (D/E)</strong> = <code>Total liabilities (D) ÷ Stockholders&#039; equity (E)</code></li><li><strong>Stockholders&#039; equity (E)</strong> = <code>Total liabilities (D) ÷ Debt to equity ratio (D/E)</code></li><li><strong>Total liabilities (D)</strong> = <code>Debt to equity ratio (D/E) × Stockholders&#039; equity (E)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Debt to equity ratio (D/E)</strong> = <code>Total liabilities (D) ÷ Stockholders&#039; equity (E)</code> — the form to use when Total liabilities (D) and Stockholders&#039; equity (E) are the values you have.</li><li><strong>Stockholders&#039; equity (E)</strong> = <code>Total liabilities (D) ÷ Debt to equity ratio (D/E)</code> — the form to use when Total liabilities (D) and Debt to equity ratio (D/E) are the values you have.</li><li><strong>Total liabilities (D)</strong> = <code>Debt to equity ratio (D/E) × Stockholders&#039; equity (E)</code> — the form to use when Debt to equity ratio (D/E) and Stockholders&#039; equity (E) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Debt to equity ratio (D/E), Stockholders&#039; equity (E) and Total liabilities (D) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Total liabilities (D), from 10 to 20 — and the answers go from <strong>Debt to equity ratio (D/E)</strong> 0.1 to <strong>Debt to equity ratio (D/E)</strong> 0.2.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Debt to equity ratio (D/E) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Total liabilities (D) left as a guess.</strong> Anything typed into Total liabilities (D) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Stockholders&#039; equity (E) left as a guess.</strong> Anything typed into Stockholders&amp;#039; equity (E) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Total liabilities (D) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Total liabilities (D)</strong> takes a plain number with no unit attached. The page reads it when it works out Debt to equity ratio (D/E) and Stockholders' equity (E). Have it to hand before you start: Total liabilities (D) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Stockholders&#039; equity (E)</strong> takes a plain number with no unit attached. The page reads it when it works out Debt to equity ratio (D/E) and Total liabilities (D). Have it to hand before you start: Stockholders&#039; equity (E) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Debt to equity ratio (D/E)</strong> is a plain number and the page's own defaults put it at 0.1. It is computed from Total liabilities (D) and Stockholders' equity (E), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Debt to equity ratio (D/E)</th></tr></thead><tbody><tr><td><strong>Total liabilities (D)</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Stockholders&#039; equity (E)</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Total liabilities (D): ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Total liabilities (D) = 5 USD and Stockholders&#039; equity (E) = 50 USD, the answer is <strong>Debt to equity ratio (D/E)</strong> = 0.1.</li><li>With Total liabilities (D) = 30 USD and Stockholders&#039; equity (E) = 100 USD, the answer is <strong>Debt to equity ratio (D/E)</strong> = 0.3.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Total liabilities (D) and Stockholders&#039; equity (E). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Total liabilities (D) into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Debt to equity ratio (D/E) with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Debt to equity ratio (D/E) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Total liabilities (D) and Stockholders&#039; equity (E) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Total liabilities (D) and Stockholders&#039; equity (E) measured, Debt to equity ratio (D/E) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/bounce-rate">Bounce rate Calculator</a>, <a href="/finance/bradford-factor">Bradford factor Calculator</a> and <a href="/finance/break-even">Break even</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Debt to equity is a number to act on, so the useful question is what to do with Debt to equity ratio (D/E) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Total liabilities (D) and Stockholders&#039; equity (E) alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Debt to equity calculator work out?', 'a' => <<<'TXT'
            Debt to equity ratio (D/E), from Total liabilities (D) and Stockholders' equity (E). The relationship is Debt to equity ratio (D/E) = Total liabilities (D) ÷ Stockholders' equity (E).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total liabilities (D) (USD), Stockholders' equity (E) (USD). Fill total liabilities (D) and stockholders' equity (E) and leave Debt to equity ratio (D/E) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Debt to equity ratio (D/E), Stockholders' equity (E) and Total liabilities (D) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Debt to equity ratio (D/E) = 0.1. The figures come from Total liabilities (D) as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Debt to equity ratio (D/E) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Total liabilities (D) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Debt to equity ratio (D/E) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/bounce-rate', 'name' => 'Bounce rate Calculator'],
            ['path' => '/finance/bradford-factor', 'name' => 'Bradford factor Calculator'],
            ['path' => '/finance/break-even', 'name' => 'Break even'],
        ],
        'authors' => [],
    ],
];
