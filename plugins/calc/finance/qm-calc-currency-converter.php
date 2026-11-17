<?php

/**
 * Currency converter
 * /finance/currency-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Currency converter',
    'meta' => ['title' => 'Currency converter: Formula, Steps & Results', 'description' => 'Currency converter takes **From currency** ({{from_currency.fullUnit}}) and returns **To currency** ({{to_currency.fullUnit}}). Any box can be the unknown.', 'h1' => 'Currency converter Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Convert from',
            'note' => 'Select the currency you want to convert from and enter an amount.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'from_currency',
                            'label' => '**From currency** ({{from_currency.fullUnit}})',
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
        [
            'title' => 'Convert to a popular currency',
            'note' => 'Select a popular currency to convert to. Or open the next section to convert to any currency.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'to_currency',
                            'label' => '**To currency** ({{to_currency.fullUnit}})',
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
        [
            'title' => 'Convert to any currency',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'to_currency_rest',
                            'label' => '**To currency** ({{to_currency_rest.fullUnit}})',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'DKK',
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
            'title' => 'to_currency = from_currency',
            'results' => ['to_currency' => 'from_currency', 'from_currency' => 'to_currency'],
        ],
        [
            'title' => 'to_currency_rest = from_currency',
            'results' => ['to_currency_rest' => 'from_currency', 'from_currency' => 'to_currency_rest'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter **From currency** () into Currency and the answer comes back as **To currency** () and **To currency** (). The arithmetic is the whole method: **To currency** () is worked out from **From currency** () by one formula, applied once. **To currency** () comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Currency calculator works', 'html' => <<<'TXT'
            <p>Currency answers one question from 1 number, and the answer is **To currency** () and **To currency** ().</p><p>Written with the labels from the form, **To currency** () = **From currency** ().</p><p>What comes back is **To currency** () and **To currency** () — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>**From currency** ()</strong> — in USD</li></ul><p>What you get back is **To currency** () in USD, **To currency** () in DKK, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, **From currency** () = 10 USD; the answers are <strong>**To currency** ()</strong> = 10 USD and <strong>**To currency** ()</strong> = 10 DKK.</p><ul><li><strong>**To currency** ()</strong> = 10 USD</li><li><strong>**To currency** ()</strong> = 10 DKK</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>**To currency** ()</strong> = <code>**From currency** ()</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>**To currency** ({{to_currency.fullUnit}})</strong> = 10 and <strong>**To currency** ({{to_currency_rest.fullUnit}})</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as **To currency** ({{to_currency.fullUnit}}) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>**To currency** ()</strong> = <code>**From currency** ()</code></li><li><strong>**From currency** ()</strong> = <code>**To currency** ()</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>**To currency** ()</strong> = <code>**From currency** ()</code> — the form to use when **From currency** () are the values you have.</li><li><strong>**From currency** ()</strong> = <code>**To currency** ()</code> — the form to use when **To currency** () are the values you have.</li><li><strong>**To currency** ()</strong> = <code>**From currency** ()</code> — the form to use when **From currency** () are the values you have.</li><li><strong>**From currency** ()</strong> = <code>**To currency** ()</code> — the form to use when **To currency** () are the values you have.</li></ul><p>Any one of **To currency** (), **From currency** () and **To currency** () can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — **From currency** ({{from_currency.fullUnit}}), from 10 to 20 — and the answers go from <strong>**To currency** ({{to_currency.fullUnit}})</strong> 10 USD and <strong>**To currency** ({{to_currency_rest.fullUnit}})</strong> 10 DKK to <strong>**To currency** ({{to_currency.fullUnit}})</strong> 20 USD and <strong>**To currency** ({{to_currency_rest.fullUnit}})</strong> 20 DKK.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> **To currency** () and **To currency** () are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>**From currency** () left as a guess.</strong> Anything typed into **From currency** () is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If **From currency** ({{from_currency.fullUnit}}) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>**From currency** ()</strong> takes a plain number with no unit attached. The page reads it when it works out **To currency** () and **To currency** (). Have it to hand before you start: **From currency** () is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>**To currency** ()</strong> is a plain number and the page's own defaults put it at 10. It is computed from **From currency** (), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>**To currency** ()</strong> is a plain number and the page's own defaults put it at 10. It is computed from **From currency** (), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>**To currency** ()</th><th>**To currency** ()</th></tr></thead><tbody><tr><td><strong>**From currency** ()</strong> +10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to **From currency** (): ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With **From currency** () = 5 USD, the answer is <strong>**To currency** ()</strong> = 5 USD and <strong>**To currency** ()</strong> = 5 DKK.</li><li>With **From currency** () = 30 USD, the answer is <strong>**To currency** ()</strong> = 30 USD and <strong>**To currency** ()</strong> = 30 DKK.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need **From currency** (). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type **From currency** () into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare **To currency** () in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind **To currency** () is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are **From currency** () and the number you are missing is **To currency** () and **To currency** ().</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/capital-gains-yield">Capital gains yield</a>, <a href="/finance/capm">CAPM (capital asset pricing model) Calculator</a> and <a href="/finance/car-affordability">Car affordability Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Currency calculator work out?', 'a' => '**To currency** () and **To currency** (), from **From currency** (). The relationship is **To currency** () = **From currency** ().'],
            ['q' => 'Which values do I need before I start?', 'a' => '**From currency** () (USD). With **From currency** () in place, **To currency** ({{to_currency.fullUnit}}) can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of **To currency** (), **From currency** () and **To currency** () blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            **To currency** () = 10 USD and **To currency** () = 10 DKK. Those are the defaults written into the form — move **From currency** ({{from_currency.fullUnit}}) and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            **To currency** ({{to_currency.fullUnit}}) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With **From currency** ({{from_currency.fullUnit}}) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. **To currency** ({{to_currency.fullUnit}}) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/capital-gains-yield', 'name' => 'Capital gains yield'],
            ['path' => '/finance/capm', 'name' => 'CAPM (capital asset pricing model) Calculator'],
            ['path' => '/finance/car-affordability', 'name' => 'Car affordability Calculator'],
        ],
        'authors' => [],
    ],
];
