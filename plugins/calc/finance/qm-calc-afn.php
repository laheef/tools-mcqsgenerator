<?php

/**
 * Additional funds needed (AFN)
 * /finance/afn
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Additional funds needed (AFN)',
    'meta' => ['title' => 'Additional funds needed (AFN) — Formula & Results', 'description' => 'Additional funds needed (AFN) works out additional funds needed from change in assets and change in liabilities. The formula is printed in the form\'s own words.', 'h1' => 'Additional funds needed (AFN) Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'assets',
                            'label' => 'Change in assets',
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
                            'name' => 'liabilities',
                            'label' => 'Change in liabilities',
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
                            'name' => 'retained_earnings',
                            'label' => 'Change in retained earnings',
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
                            'name' => 'afn',
                            'label' => 'Additional funds needed',
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
            'title' => 'afn = assets - liabilities - retained_earnings',
            'results' => ['assets' => 'afn + liabilities + retained_earnings', 'afn' => 'assets - liabilities - retained_earnings', 'liabilities' => '-afn + assets - retained_earnings', 'retained_earnings' => '-afn + assets - liabilities'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Change in assets, Change in liabilities and Change in retained earnings into Additional funds needed (AFN) and the answer comes back as Additional funds needed. It is a single relationship that reads additional funds needed out of change in assets, not a table of canned results keyed by them. Units for Additional funds needed default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Additional funds needed (AFN) calculator works', 'html' => <<<'TXT'
            <p>Additional funds needed (AFN) answers one question from 3 numbers, and the answer is Additional funds needed.</p><p>The relationship it solves reads Additional funds needed = Change in assets − Change in liabilities − Change in retained earnings.</p><p>What comes back is Additional funds needed — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Change in assets</strong> — in USD</li><li><strong>Change in liabilities</strong> — in USD</li><li><strong>Change in retained earnings</strong> — in USD</li></ul><p>What you get back is Additional funds needed in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Change in assets = 10 USD, Change in liabilities = 100 USD and Change in retained earnings = 1000 USD; the answers are <strong>Additional funds needed</strong> = -1090 USD.</p><ul><li><strong>Additional funds needed</strong> = -1090 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Additional funds needed</strong> = <code>Change in assets − Change in liabilities − Change in retained earnings</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Additional funds needed</strong> = -1090. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Additional funds needed is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Additional funds needed</strong> = <code>Change in assets − Change in liabilities − Change in retained earnings</code></li><li><strong>Change in assets</strong> = <code>Additional funds needed + Change in liabilities + Change in retained earnings</code></li><li><strong>Change in liabilities</strong> = <code>− Additional funds needed + Change in assets − Change in retained earnings</code></li><li><strong>Change in retained earnings</strong> = <code>− Additional funds needed + Change in assets − Change in liabilities</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Additional funds needed</strong> = <code>Change in assets − Change in liabilities − Change in retained earnings</code> — the form to use when Change in assets, Change in liabilities and Change in retained earnings are the values you have.</li><li><strong>Change in assets</strong> = <code>Additional funds needed + Change in liabilities + Change in retained earnings</code> — the form to use when Additional funds needed, Change in liabilities and Change in retained earnings are the values you have.</li><li><strong>Change in liabilities</strong> = <code>− Additional funds needed + Change in assets − Change in retained earnings</code> — the form to use when Additional funds needed, Change in assets and Change in retained earnings are the values you have.</li><li><strong>Change in retained earnings</strong> = <code>− Additional funds needed + Change in assets − Change in liabilities</code> — the form to use when Additional funds needed, Change in assets and Change in liabilities are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Additional funds needed, Change in assets and Change in liabilities can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Change in assets from 10 to 20, leaving every other box alone. The panel moves from <strong>Additional funds needed</strong> -1090 USD to <strong>Additional funds needed</strong> -1080 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Additional funds needed is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Change in assets left as a guess.</strong> Anything typed into Change in assets is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Change in liabilities left as a guess.</strong> Anything typed into Change in liabilities is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Change in retained earnings left as a guess.</strong> Anything typed into Change in retained earnings is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Change in assets to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Additional funds needed (AFN) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Change in assets</strong> takes a plain number with no unit attached. The page reads it when it works out Additional funds needed, Change in liabilities and Change in retained earnings. Fill it from a measurement rather than a memory — Change in assets is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Change in liabilities</strong> takes a plain number with no unit attached. The page reads it when it works out Change in assets, Additional funds needed and Change in retained earnings. Fill it from a measurement rather than a memory — Change in liabilities is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Change in retained earnings</strong> takes a plain number with no unit attached. The page reads it when it works out Change in assets, Additional funds needed and Change in liabilities. Fill it from a measurement rather than a memory — Change in retained earnings is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Additional funds needed</strong> is a plain number and the page's own defaults put it at -1090. It is computed from Change in assets, Change in liabilities and Change in retained earnings, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Additional funds needed</th></tr></thead><tbody><tr><td><strong>Change in assets</strong> +10%</td><td>+0.09%</td></tr><tr><td><strong>Change in liabilities</strong> +10%</td><td>-0.92%</td></tr><tr><td><strong>Change in retained earnings</strong> +10%</td><td>-9.17%</td></tr></tbody></table><p>The steepest column belongs to Change in retained earnings: ten per cent there moves an answer by about 9.2 per cent, which is why that is the number to measure twice. By contrast, Change in assets barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Change in assets = 5 USD, Change in liabilities = 50 USD and Change in retained earnings = 500 USD and the page reports <strong>Additional funds needed</strong> = -545 USD.</li><li>Feed in Change in assets = 30 USD, Change in liabilities = 100 USD and Change in retained earnings = 1000 USD and the page reports <strong>Additional funds needed</strong> = -1070 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Additional funds needed is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Change in assets, Change in liabilities and Change in retained earnings are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Change in assets, Change in liabilities and Change in retained earnings is what you already know and Additional funds needed is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/national-insurance-uk">National insurance UK</a>, <a href="/finance/natural-rate-of-unemployment">Natural rate of unemployment Calculator</a> and <a href="/finance/nav">Net asset value (NAV)</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Additional funds needed (AFN) is a number to act on, so the useful question is what to do with Additional funds needed (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Change in assets, Change in liabilities and Change in retained earnings alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Additional funds needed (AFN) calculator work out?', 'a' => <<<'TXT'
            Additional funds needed, from Change in assets, Change in liabilities and Change in retained earnings. The relationship is Additional funds needed = Change in assets − Change in liabilities − Change in retained earnings.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Change in assets (USD), Change in liabilities (USD), Change in retained earnings (USD). Fill change in assets, change in liabilities and change in retained earnings and leave Additional funds needed empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Additional funds needed, Change in assets, Change in liabilities and Change in retained earnings can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Additional funds needed = -1090 USD. Those are the defaults written into the form — move Change in assets and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Additional funds needed is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Change in assets blank and the page solves for it, reporting Additional funds needed instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Additional funds needed at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/national-insurance-uk', 'name' => 'National insurance UK'],
            ['path' => '/finance/natural-rate-of-unemployment', 'name' => 'Natural rate of unemployment Calculator'],
            ['path' => '/finance/nav', 'name' => 'Net asset value (NAV)'],
        ],
        'authors' => [],
    ],
];
