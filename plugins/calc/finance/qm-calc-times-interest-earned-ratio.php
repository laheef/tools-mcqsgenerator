<?php

/**
 * Times interest earned ratio
 * /finance/times-interest-earned-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Times interest earned ratio',
    'meta' => ['title' => 'Times interest earned ratio — Free Online Calculator', 'description' => 'Times interest earned ratio works out times interest earned (TIE) ratio from EBIT. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Times interest earned ratio Calculator', 'updated' => '2024-04-16'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ebit',
                            'label' => 'EBIT',
                            'type' => 'number',
                            'help' => 'Earnings before interest and tax.',
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
                            'name' => 'total_interest',
                            'label' => 'Total interest',
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
                            'name' => 'times_interest_earned_ratio',
                            'label' => 'Times interest earned (TIE) ratio',
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
            'title' => 'times_interest_earned_ratio = ebit / total_interest ',
            'results' => ['total_interest' => 'ebit/times_interest_earned_ratio', 'ebit' => 'times_interest_earned_ratio*total_interest', 'times_interest_earned_ratio' => 'ebit/total_interest'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Times interest earned ratio works out Times interest earned (TIE) ratio from EBIT and Total interest. Nothing is looked up on this page: times interest earned (TIE) ratio is computed from EBIT and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Times interest earned ratio calculator works', 'html' => <<<'TXT'
            <p>The Times interest earned ratio calculator applies one relationship to 2 numbers and reports Times interest earned (TIE) ratio.</p><p>In the form&#039;s own words, Times interest earned (TIE) ratio = EBIT ÷ Total interest.</p><p>What comes back is Times interest earned (TIE) ratio — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>EBIT</strong> — in USD. Earnings before interest and tax.</li><li><strong>Total interest</strong> — in USD</li></ul><p>What you get back is Times interest earned (TIE) ratio, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, EBIT = 10 USD and Total interest = 100 USD gives <strong>Times interest earned (TIE) ratio</strong> = 0.1.</p><ul><li><strong>Times interest earned (TIE) ratio</strong> = 0.1</li></ul><p>The line behind those figures is <strong>Times interest earned (TIE) ratio</strong> = <code>EBIT ÷ Total interest</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Times interest earned (TIE) ratio</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Times interest earned (TIE) ratio is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Times interest earned (TIE) ratio</strong> = <code>EBIT ÷ Total interest</code></li><li><strong>Total interest</strong> = <code>EBIT ÷ Times interest earned (TIE) ratio</code></li><li><strong>EBIT</strong> = <code>Times interest earned (TIE) ratio × Total interest</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Times interest earned (TIE) ratio</strong> = <code>EBIT ÷ Total interest</code> — the form to use when EBIT and Total interest are the values you have.</li><li><strong>Total interest</strong> = <code>EBIT ÷ Times interest earned (TIE) ratio</code> — the form to use when EBIT and Times interest earned (TIE) ratio are the values you have.</li><li><strong>EBIT</strong> = <code>Times interest earned (TIE) ratio × Total interest</code> — the form to use when Times interest earned (TIE) ratio and Total interest are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Times interest earned (TIE) ratio, Total interest and EBIT can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — EBIT, from 10 to 20 — and the answers go from <strong>Times interest earned (TIE) ratio</strong> 0.1 to <strong>Times interest earned (TIE) ratio</strong> 0.2.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Times interest earned (TIE) ratio is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>EBIT left as a guess.</strong> Anything typed into EBIT is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Total interest left as a guess.</strong> Anything typed into Total interest is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If EBIT is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>EBIT</strong> takes a plain number with no unit attached. Earnings before interest and tax. It feeds Total interest and Times interest earned (TIE) ratio. Have it to hand before you start: EBIT is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total interest</strong> takes a plain number with no unit attached. It feeds EBIT and Times interest earned (TIE) ratio. Have it to hand before you start: Total interest is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Times interest earned (TIE) ratio</strong> is a plain number and the page's own defaults put it at 0.1. The value follows from EBIT and Total interest. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Times interest earned (TIE) ratio</th></tr></thead><tbody><tr><td><strong>EBIT</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Total interest</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to EBIT: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With EBIT = 5 USD and Total interest = 50 USD, the answer is <strong>Times interest earned (TIE) ratio</strong> = 0.1.</li><li>With EBIT = 30 USD and Total interest = 100 USD, the answer is <strong>Times interest earned (TIE) ratio</strong> = 0.3.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need EBIT and Total interest. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type EBIT into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Times interest earned (TIE) ratio with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Times interest earned (TIE) ratio is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are EBIT and Total interest and the number you are missing is Times interest earned (TIE) ratio.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/margin-call">Margin call Calculator</a>, <a href="/finance/margin-interest">Margin interest Calculator</a> and <a href="/finance/margin-of-safety">Margin of safety Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Times interest earned ratio calculator work out?', 'a' => 'Times interest earned (TIE) ratio, from EBIT and Total interest. The relationship is Times interest earned (TIE) ratio = EBIT ÷ Total interest.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'EBIT (USD), Total interest (USD). With EBIT and total interest in place, Times interest earned (TIE) ratio can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Times interest earned (TIE) ratio, Total interest and EBIT can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Times interest earned (TIE) ratio = 0.1. Those are the defaults written into the form — move EBIT and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Times interest earned (TIE) ratio is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'A blank box is the question. With EBIT left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Times interest earned (TIE) ratio keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/margin-call', 'name' => 'Margin call Calculator'],
            ['path' => '/finance/margin-interest', 'name' => 'Margin interest Calculator'],
            ['path' => '/finance/margin-of-safety', 'name' => 'Margin of safety Calculator'],
        ],
        'authors' => [],
    ],
];
