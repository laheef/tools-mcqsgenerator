<?php

/**
 * Gross rent multiplier
 * /finance/gross-rent-multiplier
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gross rent multiplier',
    'meta' => ['title' => 'Gross rent multiplier Calculator: Free, With Steps', 'description' => 'Enter property price and gross rental income and get gross rent multiplier back. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Gross rent multiplier Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Property_Price',
                            'label' => 'Property price',
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
                            'name' => 'Gross_Rental_Income',
                            'label' => 'Gross rental income',
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
                            'name' => 'Gross_Rent_Multiplier',
                            'label' => 'Gross rent multiplier',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Gross_Rent_Multiplier = Property_Price / Gross_Rental_Income',
            'results' => ['Gross_Rent_Multiplier' => 'Property_Price/Gross_Rental_Income', 'Gross_Rental_Income' => 'Property_Price/Gross_Rent_Multiplier', 'Property_Price' => 'Gross_Rent_Multiplier*Gross_Rental_Income'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Gross rent multiplier takes Property price and Gross rental income and returns Gross rent multiplier. Nothing is looked up on this page: gross rent multiplier is computed from property price and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Gross rent multiplier calculator works', 'html' => <<<'TXT'
            <p>Gross rent multiplier answers one question from 2 numbers, and the answer is Gross rent multiplier.</p><p>In the form&#039;s own words, Gross rent multiplier = Property price ÷ Gross rental income.</p><p>The answers are Gross rent multiplier; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Property price</strong> — in USD</li><li><strong>Gross rental income</strong> — in USD</li></ul><p>The answer comes back as Gross rent multiplier. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Property price = 10 USD and Gross rental income = 100 USD — through the same formula and the panel reports <strong>Gross rent multiplier</strong> = 0.1.</p><ul><li><strong>Gross rent multiplier</strong> = 0.1</li></ul><p>That is <strong>Gross rent multiplier</strong> = <code>Property price ÷ Gross rental income</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Gross rent multiplier</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Gross rent multiplier takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Gross rent multiplier</strong> = <code>Property price ÷ Gross rental income</code></li><li><strong>Gross rental income</strong> = <code>Property price ÷ Gross rent multiplier</code></li><li><strong>Property price</strong> = <code>Gross rent multiplier × Gross rental income</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Gross rent multiplier</strong> = <code>Property price ÷ Gross rental income</code> — the form to use when Property price and Gross rental income are the values you have.</li><li><strong>Gross rental income</strong> = <code>Property price ÷ Gross rent multiplier</code> — the form to use when Property price and Gross rent multiplier are the values you have.</li><li><strong>Property price</strong> = <code>Gross rent multiplier × Gross rental income</code> — the form to use when Gross rent multiplier and Gross rental income are the values you have.</li></ul><p>Any one of Gross rent multiplier, Gross rental income and Property price can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Property price, from 10 to 20 — and the answers go from <strong>Gross rent multiplier</strong> 0.1 to <strong>Gross rent multiplier</strong> 0.2.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gross rent multiplier is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Property price left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Property price is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Gross rental income left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Gross rental income is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Property price to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Gross rent multiplier form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Property price</strong> takes a plain number with no unit attached. The page reads it when it works out Gross rent multiplier and Gross rental income. Fill it from a measurement rather than a memory — Property price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Gross rental income</strong> takes a plain number with no unit attached. The page reads it when it works out Gross rent multiplier and Property price. Fill it from a measurement rather than a memory — Gross rental income is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Gross rent multiplier</strong> is a plain number and the page's own defaults put it at 0.1. The value follows from Property price and Gross rental income. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Gross rent multiplier</th></tr></thead><tbody><tr><td><strong>Property price</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Gross rental income</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Property price sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Property price = 5 USD and Gross rental income = 50 USD and the page reports <strong>Gross rent multiplier</strong> = 0.1.</li><li>Feed in Property price = 30 USD and Gross rental income = 100 USD and the page reports <strong>Gross rent multiplier</strong> = 0.3.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Property price and Gross rental income ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Property price — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Gross rent multiplier against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Gross rent multiplier follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Property price and Gross rental income and the number you are missing is Gross rent multiplier.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/ebitda-multiple">EBITDA multiple</a>, <a href="/finance/economic-injury-disaster-loan">Economic Injury Disaster Loan Emergency Advance … Calculator</a> and <a href="/finance/eoq">Economic order quantity (EOQ) Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Gross rent multiplier is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gross rent multiplier calculator work out?', 'a' => 'Gross rent multiplier, from Property price and Gross rental income. The relationship is Gross rent multiplier = Property price ÷ Gross rental income.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Property price (USD), Gross rental income (USD). Enter property price and gross rental income; Gross rent multiplier is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Gross rent multiplier, Gross rental income and Property price blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Gross rent multiplier = 0.1. That comes from the page\'s own defaults, entered in Property price; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Gross rent multiplier is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Property price blank and the page solves for it, reporting Gross rent multiplier instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Gross rent multiplier keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/ebitda-multiple', 'name' => 'EBITDA multiple'],
            ['path' => '/finance/economic-injury-disaster-loan', 'name' => 'Economic Injury Disaster Loan Emergency Advance … Calculator'],
            ['path' => '/finance/eoq', 'name' => 'Economic order quantity (EOQ) Calculator'],
        ],
        'authors' => [],
    ],
];
