<?php

/**
 * PITI
 * /finance/piti
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PITI',
    'meta' => ['title' => 'PITI Calculator — Free, With Worked Examples', 'description' => 'Enter principal and term and get PITI back. Every figure is computed. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'PITI Calculator', 'updated' => '2024-06-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'princ',
                            'label' => 'Principal',
                            'type' => 'number',
                            'help' => 'Loan amount.',
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
                            'name' => 'n_months',
                            'label' => 'Term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rate',
                            'label' => 'Interest rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax',
                            'label' => 'Tax',
                            'type' => 'number',
                            'help' => 'Annual property tax amount.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '0'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ins',
                            'label' => 'Insurance',
                            'type' => 'number',
                            'help' => 'Annual insurance cost.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'piti',
                            'label' => 'PITI',
                            'type' => 'number',
                            'suffix' => '/month',
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
            'title' => 'piti=tax/12+ins/12+princ*rate/12/(1-(1+rate/12)^(-n_months))',
            'results' => ['tax' => <<<'TXT'
            (-pow(12, n_months)*ins + pow(12, n_months + 1)*piti + ins*pow(rate + 12, n_months) - 12*piti*pow(rate + 12, n_months) + princ*rate*pow(rate + 12, n_months))/(pow(12, n_months) - pow(rate + 12, n_months))
            TXT, 'ins' => <<<'TXT'
            (-pow(12, n_months)*tax + pow(12, n_months + 1)*piti - 12*piti*pow(rate + 12, n_months) + princ*rate*pow(rate + 12, n_months) + tax*pow(rate + 12, n_months))/(pow(12, n_months) - pow(rate + 12, n_months))
            TXT, 'princ' => 'pow(rate + 12, -n_months)*(pow(12, n_months)*(ins - 12*piti + tax) + pow(rate + 12, n_months)*(-ins + 12*piti - tax))/rate', 'piti' => <<<'TXT'
            (1/12)*(pow(12, n_months)*ins + pow(12, n_months)*tax - ins*pow(rate + 12, n_months) - princ*rate*pow(rate + 12, n_months) - tax*pow(rate + 12, n_months))/(pow(12, n_months) - pow(rate + 12, n_months))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Principal, Term and Interest rate into PITI and the answer comes back as PITI. The arithmetic is the whole method: PITI is worked out from principal by one formula, applied once. PITI comes back in /month unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the PITI calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind PITI: it takes 5 numbers and reports PITI.</p><p>The result panel carries PITI, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Principal</strong> — in USD. Loan amount.</li><li><strong>Term</strong> — in years / months</li><li><strong>Interest rate</strong> — in percent</li><li><strong>Tax</strong> — in USD. Annual property tax amount.</li><li><strong>Insurance</strong> — in USD. Annual insurance cost.</li></ul><p>The result box is PITI in /month. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Term lists 9 options and opens on years / months. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Principal</strong> = <code>(Interest rate + 12)^(− Term) × ((12)^(Term) × (Insurance − 12 × PITI + Tax) + (Interest rate + 12)^(Term) × ( − Insurance + 12 × PITI − Tax)) ÷ Interest rate</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Principal</strong> = <code>(Interest rate + 12)^(− Term) × ((12)^(Term) × (Insurance − 12 × PITI + Tax) + (Interest rate + 12)^(Term) × ( − Insurance + 12 × PITI − Tax)) ÷ Interest rate</code> — the form to use when Interest rate, Term, Insurance and PITI are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of PITI, Tax and Insurance can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Term and Interest rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> PITI is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Principal left as a guess.</strong> Anything typed into Principal is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Term left as a guess.</strong> Anything typed into Term is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Principal to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the PITI form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Principal</strong> takes a plain number with no unit attached. It feeds Tax, Insurance and PITI. Fill it from a measurement rather than a memory — Principal is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. It feeds Tax, Insurance and Principal. Fill it from a measurement rather than a memory — Term is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Tax, Insurance and Principal. Fill it from a measurement rather than a memory — Interest rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Tax</strong> takes a plain number with no unit attached. Annual property tax amount. It feeds Insurance, Principal and PITI. Fill it from a measurement rather than a memory — Tax is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Insurance</strong> takes a plain number with no unit attached. Annual insurance cost. It feeds Tax, Principal and PITI. Fill it from a measurement rather than a memory — Insurance is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>PITI</strong> is a plain number. The value follows from Term, Insurance, Tax and Interest rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on PITI actually offers.</p><ul><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Principal, Term, Interest rate and Tax ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Principal — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check PITI in /month against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind PITI is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are years / months and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Principal, Term and Interest rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Principal, Term and Interest rate is what you already know and PITI is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/future-value">Future value</a>, <a href="/finance/futures-contract">Futures contract Calculator</a> and <a href="/finance/gdp-deflator">GDP deflator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>PITI is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the PITI calculator work out?', 'a' => 'PITI, from Term, Insurance, Tax and Interest rate.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Principal (USD), Term (years / months), Interest rate (percent), Tax (USD), Insurance (USD). Enter principal, term and interest rate; PITI is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. PITI, Tax, Insurance and Principal can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of PITI is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Principal blank and the page solves for it, reporting PITI instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to PITI at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/future-value', 'name' => 'Future value'],
            ['path' => '/finance/futures-contract', 'name' => 'Futures contract Calculator'],
            ['path' => '/finance/gdp-deflator', 'name' => 'GDP deflator'],
        ],
        'authors' => [],
    ],
];
