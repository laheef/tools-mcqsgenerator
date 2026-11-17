<?php

/**
 * GDP deflator
 * /finance/gdp-deflator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GDP deflator',
    'meta' => ['title' => 'GDP deflator Calculator — Formula & Results', 'description' => 'Enter Nominal GDP and Real GDP and get GDP deflator back. Each figure is computed from the boxes you fill, never read from a table. Any box can be the unknown.', 'h1' => 'GDP deflator Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Nominal_GDP',
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
                            'name' => 'Real_GDP',
                            'label' => 'Real GDP',
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
                            'name' => 'GDP_deflator',
                            'label' => 'GDP deflator',
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
            'title' => 'GDP_deflator = Nominal_GDP / Real_GDP * 100',
            'results' => ['Nominal_GDP' => '(1/100)*GDP_deflator*Real_GDP', 'GDP_deflator' => '100*Nominal_GDP/Real_GDP', 'Real_GDP' => '100*Nominal_GDP/GDP_deflator'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Nominal GDP and Real GDP into GDP deflator and the answer comes back as GDP deflator. There is no hidden constant here: change GDP deflator and nominal GDP moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the GDP deflator calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind GDP deflator: it takes 2 numbers and reports GDP deflator.</p><p>In the form&#039;s own words, GDP deflator = 100 × Nominal GDP ÷ Real GDP.</p><p>The answers are GDP deflator; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Nominal GDP</strong> — in USD</li><li><strong>Real GDP</strong> — in USD</li></ul><p>The answer comes back as GDP deflator. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Nominal GDP = 10 USD and Real GDP = 100 USD — through the same formula and the panel reports <strong>GDP deflator</strong> = 10.</p><ul><li><strong>GDP deflator</strong> = 10</li></ul><p>That is <strong>GDP deflator</strong> = <code>100 × Nominal GDP ÷ Real GDP</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>GDP deflator</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as GDP deflator is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>GDP deflator</strong> = <code>100 × Nominal GDP ÷ Real GDP</code></li><li><strong>Nominal GDP</strong> = <code>(1 ÷ 100) × GDP deflator × Real GDP</code></li><li><strong>Real GDP</strong> = <code>100 × Nominal GDP ÷ GDP deflator</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>GDP deflator</strong> = <code>100 × Nominal GDP ÷ Real GDP</code> — the form to use when Nominal GDP and Real GDP are the values you have.</li><li><strong>Nominal GDP</strong> = <code>(1 ÷ 100) × GDP deflator × Real GDP</code> — the form to use when GDP deflator and Real GDP are the values you have.</li><li><strong>Real GDP</strong> = <code>100 × Nominal GDP ÷ GDP deflator</code> — the form to use when Nominal GDP and GDP deflator are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of GDP deflator, Nominal GDP and Real GDP can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Nominal GDP from 10 to 20, leaving every other box alone. The panel moves from <strong>GDP deflator</strong> 10 to <strong>GDP deflator</strong> 20.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> GDP deflator is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Nominal GDP left as a guess.</strong> Anything typed into Nominal GDP is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Real GDP left as a guess.</strong> Anything typed into Real GDP is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Nominal GDP to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the GDP deflator form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Nominal GDP</strong> takes a plain number with no unit attached. The page reads it when it works out GDP deflator and Real GDP. Fill it from a measurement rather than a memory — Nominal GDP is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Real GDP</strong> takes a plain number with no unit attached. The page reads it when it works out Nominal GDP and GDP deflator. Fill it from a measurement rather than a memory — Real GDP is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>GDP deflator</strong> is a plain number and the page's own defaults put it at 10. It is worked out from Nominal GDP and Real GDP. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>GDP deflator</th></tr></thead><tbody><tr><td><strong>Nominal GDP</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Real GDP</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Nominal GDP: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Nominal GDP = 5 USD and Real GDP = 50 USD and the page reports <strong>GDP deflator</strong> = 10.</li><li>Feed in Nominal GDP = 30 USD and Real GDP = 100 USD and the page reports <strong>GDP deflator</strong> = 30.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Nominal GDP and Real GDP ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Nominal GDP — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check GDP deflator against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind GDP deflator is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Nominal GDP and Real GDP are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Nominal GDP and Real GDP measured, GDP deflator wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/natural-rate-of-unemployment">Natural rate of unemployment Calculator</a>, <a href="/finance/nav">Net asset value (NAV)</a> and <a href="/finance/net-debt">Net debt Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>GDP deflator is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from GDP deflator is a number to act on, so the useful question is what to do with GDP deflator once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Nominal GDP and Real GDP alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GDP deflator calculator work out?', 'a' => 'GDP deflator, from Nominal GDP and Real GDP. The relationship is GDP deflator = 100 × Nominal GDP ÷ Real GDP.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Nominal GDP (USD), Real GDP (USD). With nominal GDP and real GDP in place, GDP deflator can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. GDP deflator, Nominal GDP and Real GDP can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'GDP deflator = 10. The figures come from Nominal GDP as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally GDP deflator is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Nominal GDP blank and the page solves for it, reporting GDP deflator instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to GDP deflator at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/natural-rate-of-unemployment', 'name' => 'Natural rate of unemployment Calculator'],
            ['path' => '/finance/nav', 'name' => 'Net asset value (NAV)'],
            ['path' => '/finance/net-debt', 'name' => 'Net debt Calculator'],
        ],
        'authors' => [],
    ],
];
