<?php

/**
 * Prorated rent
 * /finance/prorated-rent
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Prorated rent',
    'meta' => ['title' => 'Prorated rent Calculator — Formula & Results', 'description' => 'Enter moving in or out? and moving date and get prorated rent back. A worked example follows. Results come back in USD, with any other unit a click away.', 'h1' => 'Prorated rent Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'moveInOut',
                            'label' => 'Moving in or out?',
                            'type' => 'select',
                            'options' => ['Moving in' => '1', 'Moving out' => '2'],
                            'dataset' => 'Moving',
                            'defaults' => [
                                ['value' => 'Moving in', 'when' => null],
                                ['value' => 'Moving in', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'date', 'label' => 'Moving date', 'type' => 'date'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Costs',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthlyRent',
                            'label' => 'Basic monthly rent',
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
                            'name' => 'proratedRent',
                            'label' => 'Prorated rent',
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
            'title' => 'proratedRent = prorated(moveInOut, date, monthlyRent)',
            'results' => ['proratedRent' => 'prorated(moveInOut, date, monthlyRent)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";function month(dateJs){var daysInMonth=0;var date=new Date(dateJs);var monthNumber=date.getUTCMonth();var year=date.getUTCFullYear();if(monthNumber===0||monthNumber===2||monthNumber===4||monthNumber===6||monthNumber===7||monthNumber===9||monthNumber===11){daysInMonth=31}else if(monthNumber===3||monthNumber===5||monthNumber===8||monthNumber===10){daysInMonth=30}else if(monthNumber===1){if(year%4===0&&year%100!==0||year%400===0){daysInMonth=29}else{daysInMonth=28}}return daysInMonth}function moveOut(monthlyRent,dateJs){var date=new Date(dateJs);var day=date.getUTCDate();var daysInMonth=month(dateJs);var cost=monthlyRent/daysInMonth*day;return cost}function moveIn(monthlyRent,dateJs){var date=new Date(dateJs);var day=date.getUTCDate();var daysInMonth=month(dateJs);var cost=monthlyRent/daysInMonth*(daysInMonth-(day-1));return cost}omni.define("prorated",function(moveInOut,date,monthlyRent){var MILISECONDS_IN_DAY=24*60*60*1000;var dateJs=new Date(date*MILISECONDS_IN_DAY);var proratedRent=0;if(moveInOut===1){proratedRent=moveIn(monthlyRent,dateJs);return proratedRent}if(moveInOut===2){proratedRent=moveOut(monthlyRent,dateJs);return proratedRent}return 0});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Prorated rent works out Prorated rent from Moving in or out?, Moving date and Basic monthly rent. It is a single relationship that reads prorated rent out of moving in or out?, not a table of canned results keyed by them. Units for Prorated rent default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Prorated rent calculator works', 'html' => <<<'TXT'
            <p>The Prorated rent calculator applies one relationship to 3 numbers and reports Prorated rent.</p><p>In the form&#039;s own words, Prorated rent = prorated(Moving in or out?, Moving date, Basic monthly rent).</p><p>The answers are Prorated rent; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Moving in or out?</strong> — a plain number, no unit</li><li><strong>Moving date</strong> — a plain number, no unit, entered as a date</li><li><strong>Basic monthly rent</strong> — in USD</li></ul><p>The answer comes back as Prorated rent in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Prorated rent is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Prorated rent</strong> = <code>prorated(Moving in or out?, Moving date, Basic monthly rent)</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Prorated rent is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Moving in or out? left as a guess.</strong> Anything typed into Moving in or out? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Moving date left as a guess.</strong> Anything typed into Moving date is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Basic monthly rent left as a guess.</strong> Anything typed into Basic monthly rent is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Moving in or out? and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Prorated rent form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Moving in or out?</strong> takes a plain number with no unit attached. It feeds Prorated rent. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Moving in or out? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Moving date</strong> takes a plain number with no unit attached. It feeds Prorated rent. Fill it from a measurement rather than a memory — Moving date is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Basic monthly rent</strong> takes a plain number with no unit attached. It feeds Prorated rent. Fill it from a measurement rather than a memory — Basic monthly rent is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Prorated rent</strong> is a plain number. It is worked out from Moving in or out?, Moving date and Basic monthly rent. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Moving in or out?, Moving date and Basic monthly rent ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Moving in or out? — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Prorated rent in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Prorated rent is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Moving in or out?, Moving date and Basic monthly rent are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Moving in or out?, Moving date and Basic monthly rent is what you already know and Prorated rent is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/gdp-gap">GDP gap</a>, <a href="/finance/gdp-growth">GDP growth rate Calculator</a> and <a href="/finance/gdp-per-capita">GDP per capita Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Prorated rent is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>A criterion for choosing between these pages: Prorated rent answers a different question from the one above, even where the two share a sentence of explanation.</p><p>The nearest are <a href="/finance/gdp-gap">GDP gap</a>, <a href="/finance/gdp-growth">GDP growth rate Calculator</a> and <a href="/finance/gdp-per-capita">GDP per capita Calculator</a>. Each takes its own inputs and reports its own answer, and none of them shares a stored value with this page — open two in separate tabs and they will not interfere.</p><p>If the value you need is not the one reported here but a step before or after it, one of those pages probably reports it directly rather than making you convert by hand.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Prorated rent is a number to act on, so the useful question is what to do with Prorated rent (USD) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Moving in or out?, Moving date and Basic monthly rent alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Prorated rent calculator work out?', 'a' => <<<'TXT'
            Prorated rent, from Moving in or out?, Moving date and Basic monthly rent. The relationship is Prorated rent = prorated(Moving in or out?, Moving date, Basic monthly rent).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Moving in or out?, Moving date, Basic monthly rent (USD). With moving in or out?, moving date and basic monthly rent in place, Prorated rent can stay blank and the page will work it out.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Prorated rent is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Prorated rent is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Prorated rent at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/gdp-gap', 'name' => 'GDP gap'],
            ['path' => '/finance/gdp-growth', 'name' => 'GDP growth rate Calculator'],
            ['path' => '/finance/gdp-per-capita', 'name' => 'GDP per capita Calculator'],
        ],
        'authors' => [],
    ],
];
