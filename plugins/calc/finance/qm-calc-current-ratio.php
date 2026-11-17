<?php

/**
 * Current ratio
 * /finance/current-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Current ratio',
    'meta' => ['title' => 'Current ratio Calculator — Formula & Results', 'description' => 'Enter current assets and current liabilities and get current ratio back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Current ratio Calculator', 'updated' => '2026-09-15'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_assets',
                            'label' => 'Current assets',
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
                            'name' => 'current_liabilities',
                            'label' => 'Current liabilities',
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
                            'name' => 'current_ratio',
                            'label' => 'Current ratio',
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
            'title' => 'current_ratio = current_assets / current_liabilities',
            'results' => ['current_assets' => 'current_liabilities*current_ratio', 'current_ratio' => 'current_assets/current_liabilities', 'current_liabilities' => 'current_assets/current_ratio'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Current ratio works out Current ratio from Current assets and Current liabilities. Nothing is looked up on this page: current ratio is computed from current assets and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Current ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Current ratio: it takes 2 numbers and reports Current ratio.</p><p>Written with the labels from the form, Current ratio = Current assets ÷ Current liabilities.</p><p>The answers are Current ratio; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Current assets</strong> — in USD</li><li><strong>Current liabilities</strong> — in USD</li></ul><p>The answer comes back as Current ratio. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Current assets = 10 USD and Current liabilities = 100 USD; the answers are <strong>Current ratio</strong> = 0.1.</p><ul><li><strong>Current ratio</strong> = 0.1</li></ul><p>That is <strong>Current ratio</strong> = <code>Current assets ÷ Current liabilities</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Current ratio</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Current ratio is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Current ratio</strong> = <code>Current assets ÷ Current liabilities</code></li><li><strong>Current assets</strong> = <code>Current liabilities × Current ratio</code></li><li><strong>Current liabilities</strong> = <code>Current assets ÷ Current ratio</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Current ratio</strong> = <code>Current assets ÷ Current liabilities</code> — the form to use when Current assets and Current liabilities are the values you have.</li><li><strong>Current assets</strong> = <code>Current liabilities × Current ratio</code> — the form to use when Current liabilities and Current ratio are the values you have.</li><li><strong>Current liabilities</strong> = <code>Current assets ÷ Current ratio</code> — the form to use when Current assets and Current ratio are the values you have.</li></ul><p>Any one of Current ratio, Current assets and Current liabilities can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Current assets, from 10 to 20 — and the answers go from <strong>Current ratio</strong> 0.1 to <strong>Current ratio</strong> 0.2.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Current ratio is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Current assets left as a guess.</strong> Anything typed into Current assets is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Current liabilities left as a guess.</strong> Anything typed into Current liabilities is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Current assets is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Current assets</strong> takes a plain number with no unit attached. It feeds Current ratio and Current liabilities. Have it to hand before you start: Current assets is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Current liabilities</strong> takes a plain number with no unit attached. It feeds Current assets and Current ratio. Have it to hand before you start: Current liabilities is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Current ratio</strong> is a plain number and the page's own defaults put it at 0.1. The value follows from Current assets and Current liabilities. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Current ratio</th></tr></thead><tbody><tr><td><strong>Current assets</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Current liabilities</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Current assets: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Current assets = 5 USD and Current liabilities = 50 USD, the answer is <strong>Current ratio</strong> = 0.1.</li><li>With Current assets = 30 USD and Current liabilities = 100 USD, the answer is <strong>Current ratio</strong> = 0.3.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Current assets and Current liabilities. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Current assets into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Current ratio with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Current ratio is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Current assets and Current liabilities are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current assets and Current liabilities measured, Current ratio wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/ppp">PPP (purchasing power parity) Calculator</a>, <a href="/finance/pre-and-post-money-valuation">Pre and post-money valuation</a> and <a href="/finance/present-value">Present value Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Current ratio is a number to act on, so the useful question is what to do with Current ratio once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Current assets and Current liabilities alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Current ratio calculator work out?', 'a' => 'Current ratio, from Current assets and Current liabilities. The relationship is Current ratio = Current assets ÷ Current liabilities.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current assets (USD), Current liabilities (USD). Fill current assets and current liabilities and leave Current ratio empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Current ratio, Current assets and Current liabilities blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Current ratio = 0.1. Those are the defaults written into the form — move Current assets and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Current ratio is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Current assets left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Current ratio keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/ppp', 'name' => 'PPP (purchasing power parity) Calculator'],
            ['path' => '/finance/pre-and-post-money-valuation', 'name' => 'Pre and post-money valuation'],
            ['path' => '/finance/present-value', 'name' => 'Present value Calculator'],
        ],
        'authors' => [],
    ],
];
