<?php

/**
 * MPS (marginal propensity to save)
 * /finance/mps
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'MPS (marginal propensity to save)',
    'meta' => ['title' => 'MPS (marginal propensity to save) Calculator', 'description' => 'MPS (marginal propensity to save) reports MPS (marginal propensity to save). The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'MPS (marginal propensity to save) Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'disposable_income_change',
                            'label' => 'Increase in disposable income',
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
                            'name' => 'consumer_saving_change',
                            'label' => 'Increase in consumer savings',
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
                            'name' => 'marginal_propensity_to_save',
                            'label' => 'MPS (marginal propensity to save)',
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
            'title' => 'marginal_propensity_to_save = consumer_saving_change / disposable_income_change',
            'results' => ['marginal_propensity_to_save' => 'consumer_saving_change/disposable_income_change', 'disposable_income_change' => 'consumer_saving_change/marginal_propensity_to_save', 'consumer_saving_change' => 'disposable_income_change*marginal_propensity_to_save'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        MPS (marginal propensity to save) works out MPS (marginal propensity to save) from Increase in disposable income and Increase in consumer savings. The arithmetic is the whole method: MPS (marginal propensity to save) is worked out from increase in disposable income by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the MPS (marginal propensity to save) calculator works', 'html' => <<<'TXT'
            <p>MPS (marginal propensity to save) answers one question from 2 numbers, and the answer is MPS (marginal propensity to save).</p><p>In the form&#039;s own words, MPS (marginal propensity to save) = Increase in consumer savings ÷ Increase in disposable income.</p><p>The result panel carries MPS (marginal propensity to save), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Increase in disposable income</strong> — in USD</li><li><strong>Increase in consumer savings</strong> — in USD</li></ul><p>The answer comes back as MPS (marginal propensity to save). The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Increase in disposable income = 10 USD and Increase in consumer savings = 100 USD; the answers are <strong>MPS (marginal propensity to save)</strong> = 10.</p><ul><li><strong>MPS (marginal propensity to save)</strong> = 10</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>MPS (marginal propensity to save)</strong> = <code>Increase in consumer savings ÷ Increase in disposable income</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>MPS (marginal propensity to save)</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as MPS (marginal propensity to save) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>MPS (marginal propensity to save)</strong> = <code>Increase in consumer savings ÷ Increase in disposable income</code></li><li><strong>Increase in disposable income</strong> = <code>Increase in consumer savings ÷ MPS (marginal propensity to save)</code></li><li><strong>Increase in consumer savings</strong> = <code>Increase in disposable income × MPS (marginal propensity to save)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>MPS (marginal propensity to save)</strong> = <code>Increase in consumer savings ÷ Increase in disposable income</code> — the form to use when Increase in consumer savings and Increase in disposable income are the values you have.</li><li><strong>Increase in disposable income</strong> = <code>Increase in consumer savings ÷ MPS (marginal propensity to save)</code> — the form to use when Increase in consumer savings and MPS (marginal propensity to save) are the values you have.</li><li><strong>Increase in consumer savings</strong> = <code>Increase in disposable income × MPS (marginal propensity to save)</code> — the form to use when Increase in disposable income and MPS (marginal propensity to save) are the values you have.</li></ul><p>Any one of MPS (marginal propensity to save), Increase in disposable income and Increase in consumer savings can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Increase in disposable income, from 10 to 20 — and the answers go from <strong>MPS (marginal propensity to save)</strong> 10 to <strong>MPS (marginal propensity to save)</strong> 5.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> MPS (marginal propensity to save) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Increase in disposable income left as a guess.</strong> Anything typed into Increase in disposable income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Increase in consumer savings left as a guess.</strong> Anything typed into Increase in consumer savings is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Increase in disposable income is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Increase in disposable income</strong> takes a plain number with no unit attached. The page reads it when it works out MPS (marginal propensity to save) and Increase in consumer savings. Have it to hand before you start: Increase in disposable income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Increase in consumer savings</strong> takes a plain number with no unit attached. The page reads it when it works out MPS (marginal propensity to save) and Increase in disposable income. Have it to hand before you start: Increase in consumer savings is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>MPS (marginal propensity to save)</strong> is a plain number and the page's own defaults put it at 10. The value follows from Increase in consumer savings and Increase in disposable income. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>MPS (marginal propensity to save)</th></tr></thead><tbody><tr><td><strong>Increase in disposable income</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Increase in consumer savings</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Increase in consumer savings: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Increase in disposable income = 5 USD and Increase in consumer savings = 50 USD, the answer is <strong>MPS (marginal propensity to save)</strong> = 10.</li><li>With Increase in disposable income = 30 USD and Increase in consumer savings = 100 USD, the answer is <strong>MPS (marginal propensity to save)</strong> = 3.33.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Increase in disposable income and Increase in consumer savings. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Increase in disposable income into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare MPS (marginal propensity to save) with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind MPS (marginal propensity to save) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Increase in disposable income and Increase in consumer savings are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Increase in disposable income and Increase in consumer savings is what you already know and MPS (marginal propensity to save) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/burn-rate">Burn rate</a>, <a href="/finance/burndown-chart">Burndown chart Calculator</a> and <a href="/finance/business-budget">Business budget Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from MPS (marginal propensity to save) is a number to act on, so the useful question is what to do with MPS (marginal propensity to save) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Increase in disposable income and Increase in consumer savings alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the MPS (marginal propensity to save) calculator work out?', 'a' => <<<'TXT'
            MPS (marginal propensity to save), from Increase in consumer savings and Increase in disposable income. The relationship is MPS (marginal propensity to save) = Increase in consumer savings ÷ Increase in disposable income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Increase in disposable income (USD), Increase in consumer savings (USD). Enter increase in disposable income and increase in consumer savings; MPS (marginal propensity to save) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of MPS (marginal propensity to save), Increase in disposable income and Increase in consumer savings blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            MPS (marginal propensity to save) = 10. That comes from the page's own defaults, entered in Increase in disposable income; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally MPS (marginal propensity to save) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Increase in disposable income left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of MPS (marginal propensity to save) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/burn-rate', 'name' => 'Burn rate'],
            ['path' => '/finance/burndown-chart', 'name' => 'Burndown chart Calculator'],
            ['path' => '/finance/business-budget', 'name' => 'Business budget Calculator'],
        ],
        'authors' => [],
    ],
];
