<?php

/**
 * Birth Date from Death Date Calculator
 * /everyday-life/birth-from-death-date
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Birth Date from Death Date Calculator',
    'meta' => ['title' => 'Birth Date from Death Date and Age — Free Tool', 'description' => 'Estimate a birth date from a death date and age at death, then calculate days lived and days since death. Month-end dates follow the calendar\'s clamping rule.', 'h1' => 'Birth Date from Death Date Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                ['name' => 'death', 'label' => 'Date of death', 'type' => 'date', 'default' => '2026-01-15'],
                [
                    'name' => 'age',
                    'label' => 'Age at death',
                    'type' => 'number',
                    'suffix' => 'years',
                    'default' => '60',
                    'rounding' => ['omni', '0.0001'],
                ],
                ['name' => 'today', 'label' => 'Reference date', 'type' => 'date', 'default' => '2026-10-23'],
                ['name' => 'birth', 'label' => 'Estimated birth date', 'type' => 'date'],
                [
                    'name' => 'lived',
                    'label' => 'Calendar days from birth to death',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'since',
                    'label' => 'Days since death',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
            ],
        ],
    ],
    'formula' => ['birth' => 'dateAtYearsOld(death, -age)', 'lived' => 'death - dateAtYearsOld(death, -age)', 'since' => 'today - death'],
    'article' => [
        'intro' => <<<'TXT'
        When a record gives a death date and age but not a birth date, subtract the completed years to estimate the anniversary date. This page also reports the day counts around it.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            An age stated at death does not always reveal an exact birth date. If someone died a day before their birthday, the birth year implied by subtracting completed years can differ from the calendar-year subtraction. This calculator provides an anniversary-based estimate and makes that assumption visible; official records may need a different interpretation.<p>The answer is <strong>estimated birth date and calendar days from birth to death and days since death</strong>, worked out from date of death and age at death and reference date. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>birth</strong></td><td><code>dateAtYearsOld(Date of death, -Age at death)</code></td></tr><tr><td><strong>lived</strong></td><td><code>Date of death - dateAtYearsOld(Date of death, -Age at death)</code></td></tr><tr><td><strong>since</strong></td><td><code>Reference date - Date of death</code></td></tr></tbody></table><p>Move the death date backward by the completed age in whole calendar years. The calendar helper clamps a date such as 29 February to the last valid day in a non-leap year. The day counts are plain date differences.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports estimated birth date and calendar days from birth to death and days since death.</p><ul><li><strong>Date of death</strong>.</li><li><strong>Age at death</strong> — years.</li><li><strong>Reference date</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Estimated birth date</strong>.</li><li><strong>Calendar days from birth to death</strong> — days.</li><li><strong>Days since death</strong> — days.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put date of death = 15 January 2026, age at death = 60 years, reference date = 23 October 2026 into the form and the panel reads:</p><ul><li><strong>Estimated birth date</strong> = <code>dateAtYearsOld(Date of death, -Age at death)</code> = <strong>15 January 1966</strong></li><li><strong>Calendar days from birth to death</strong> = <code>Date of death - dateAtYearsOld(Date of death, -Age at death)</code> = <strong>21 915 days</strong></li><li><strong>Days since death</strong> = <code>Reference date - Date of death</code> = <strong>281 days</strong></li></ul><p>Age at death is usually completed years, not a precise duration. Without the person's birthday or birth time, the true birth date could fall within a range around the estimated anniversary. Historical records may also use a different calendar system, while this page uses Gregorian dates. Treat the answer as a lead for research, not proof of identity or a substitute for a birth certificate. The days-lived result uses the estimated date, so its apparent precision is greater than the source information warrants.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>dateAtYearsOld(20 468, -60)</code>, which comes to <strong>15 January 1966</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A death on 15 January 2026 at age 60 gives an estimated date of birth of 15 January 1966. The span is 21,915 calendar days, and 281 days had passed by 23 October 2026.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Estimated birth date</th><th>Calendar days from birth to death</th><th>Days since death</th></tr></thead><tbody><tr><td><strong>Date of death</strong> +1 day</td><td>+1 d</td><td>+0 %</td><td>−0.36 %</td></tr><tr><td><strong>Age at death</strong> +10 %</td><td>-2192 d</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Reference date</strong> +1 day</td><td>+0 d</td><td>+0 %</td><td>+0.36 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Age at death</strong>. <strong>Reference date</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Date of death</strong> opens at 15 January 2026</li><li><strong>Age at death</strong> opens at 60 years</li><li><strong>Reference date</strong> opens at 23 October 2026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => '<ul></ul>'],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Mixing elapsed days with inclusive dates.</strong> Subtracting dates gives the distance between them. Counting both endpoints adds one, which is right for a list of dates and wrong for nights away.</li><li><strong>Assuming a month is thirty days.</strong> Month lengths vary, and an anniversary can land on the last day of a shorter month.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Calendar dates, not local clock hours.</strong> Daylight-saving changes and time zones do not alter a date-only result.</li></li><li><li><strong>Named conventions matter.</strong> If a contract, school or workplace defines its own first and last day, use that wording rather than guessing.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Dates, time and rounding', 'html' => <<<'TXT'
            <p>Dates are compared as calendar days, not as moments. A date typed as 3 March and a date typed as 4 March are one day apart whether or not a clock is involved, and a leap day is counted like any other day. Clock times are read as they are written on a 24-hour dial: 14:30 is half past two in the afternoon, and 02:30 is the small hours of the same date.</p><p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'The calendar detail behind this answer', 'html' => <<<'TXT'
            Age at death is usually completed years, not a precise duration. Without the person's birthday or birth time, the true birth date could fall within a range around the estimated anniversary. Historical records may also use a different calendar system, while this page uses Gregorian dates. Treat the answer as a lead for research, not proof of identity or a substitute for a birth certificate. The days-lived result uses the estimated date, so its apparent precision is greater than the source information warrants.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need date of death and age at death and reference date. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Estimated birth date and calendar days from birth to death and days since death should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/days-old">Days old</a> <a href="/everyday-life/date-of-birth">Date of birth from age</a> <a href="/everyday-life/age">Age calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Date of death</strong> +10 days</td><td>15 January 1966</td><td>25 January 1966</td><td>+10 d</td></tr><tr><td><strong>Age at death</strong> ×10</td><td>15 January 1966</td><td>15 January 1426</td><td>-197231 d</td></tr><tr><td><strong>Reference date</strong> +10 days</td><td>15 January 1966</td><td>15 January 1966</td><td>+0 d</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Birth Date from Death Date calculator work out?', 'a' => <<<'TXT'
            It returns estimated birth date and calendar days from birth to death and days since death from date of death and age at death and reference date. The relationship is dateAtYearsOld(Date of death, -Age at death).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Date of death, Age at death (years), Reference date. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: age at death in years. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is the birth date exact?', 'a' => 'Not necessarily. It is estimated by subtracting whole completed years from the death date.'],
            ['q' => 'What if the death date is 29 February?', 'a' => 'The date helper clamps to the last valid day when the destination year has no leap day.'],
            ['q' => 'Does age at death include the birthday?', 'a' => 'Enter the completed age stated by the record; the calculation does not infer it.'],
            ['q' => 'Can this verify a genealogy record?', 'a' => 'No. Use it as an estimate and confirm against primary records.'],
        ],
        'related' => [
            ['path' => '/everyday-life/days-old', 'name' => 'Days old'],
            ['path' => '/everyday-life/date-of-birth', 'name' => 'Date of birth from age'],
            ['path' => '/everyday-life/age', 'name' => 'Age calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
