<?php

/**
 * Leap Year Calculator
 * /everyday-life/leap-year
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Leap Year Calculator',
    'meta' => ['title' => 'Leap Year Calculator — Is a Year a Leap Year?', 'description' => 'Whether a year is a leap year, how many days it holds and when the next leap year falls, with the four, one hundred and four hundred year rules all applied.', 'h1' => 'Leap Year Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'year',
                    'label' => 'Year',
                    'type' => 'number',
                    'default' => '2026',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'is_leap',
                    'label' => 'Is a leap year (1 yes, 0 no)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'days',
                    'label' => 'Days in the year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'next_leap',
                    'label' => 'Next leap year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['is_leap' => 'if_else(mod(year, 400) == 0, 1, if_else(mod(year, 100) == 0, 0, if_else(mod(year, 4) == 0, 1, 0)))', 'days' => '365 + if_else(mod(year, 400) == 0, 1, if_else(mod(year, 100) == 0, 0, if_else(mod(year, 4) == 0, 1, 0)))', 'next_leap' => <<<'TXT'
    if_else(mod(year + 4 - mod(year, 4), 400) == 0, year + 4 - mod(year, 4), if_else(mod(year + 4 - mod(year, 4), 100) == 0, year + 8 - mod(year, 4), year + 4 - mod(year, 4)))
    TXT],
    'article' => [
        'intro' => <<<'TXT'
        The leap-year test, the length of the year and the next leap year after it. The century rule is the part that catches people: 1900 was not a leap year and 2000 was.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>The leap-year rule is four, except every hundred, except every four hundred. Most people remember the first clause and stop, which is why 1900 gets called a leap year in quizzes and 2000 does not.</p><p>This page applies all three clauses in order and returns a plain one or zero, the length of the year, and the next year that qualifies. That last answer is where the century rule bites: the leap year after 1896 is 1904, not 1900.</p><p>The answer is <strong>is a leap year and days in the year and next leap year</strong>, worked out from year. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>is_leap</strong></td><td><code>if_else(mod(Year, 400) == 0, 1, if_else(mod(Year, 100) == 0, 0, if_else(mod(Year, 4) == 0, 1, 0)))</code></td></tr><tr><td><strong>days</strong></td><td><code>365 + if_else(mod(Year, 400) == 0, 1, if_else(mod(Year, 100) == 0, 0, if_else(mod(Year, 4) == 0, 1, 0)))</code></td></tr><tr><td><strong>next_leap</strong></td><td><code>if_else(mod(Year + 4 - mod(Year, 4), 400) == 0, Year + 4 - mod(Year, 4), if_else(mod(Year + 4 - mod(Year, 4), 100) == 0, Year + 8 - mod(Year, 4), Year + 4 - mod(Year, 4)))</code></td></tr></tbody></table><p>Divisible by four makes a leap year; divisible by a hundred takes it away again; divisible by four hundred puts it back. The next-leap line tests the candidate as well, so a century that fails the test is skipped rather than offered.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill. It reports is a leap year and days in the year and next leap year.</p><ul><li><strong>Year</strong>.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Is a leap year (1 yes, 0 no)</strong>.</li><li><strong>Days in the year</strong> — days.</li><li><strong>Next leap year</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put year = 2 026 into the form and the panel reads:</p><ul><li><strong>Is a leap year (1 yes, 0 no)</strong> = <code>if_else(mod(Year, 400) == 0, 1, if_else(mod(Year, 100) == 0, 0, if_else(mod(Year, 4) == 0, 1, 0)))</code> = <strong>0</strong></li><li><strong>Days in the year</strong> = <code>365 + if_else(mod(Year, 400) == 0, 1, if_else(mod(Year, 100) == 0, 0, if_else(mod(Year, 4) == 0, 1, 0)))</code> = <strong>365 days</strong></li><li><strong>Next leap year</strong> = <code>if_else(mod(Year + 4 - mod(Year, 4), 400) == 0, Year + 4 - mod(Year, 4), if_else(mod(Year + 4 - mod(Year, 4), 100) == 0, Year + 8 - mod(Year, 4), Year + 4 - mod(Year, 4)))</code> = <strong>2 028</strong></li></ul><p>Type 1900 and then 2000. The two answers together are the whole rule, and they are the pair that most people get wrong.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>if_else(mod(2 026, 400) == 0, 1, if_else(mod(2 026, 100) == 0, 0, if_else(mod(2 026, 4) == 0, 1, 0)))</code>, which comes to <strong>0</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>2026 is not a leap year: 365 days, and the next leap year is 2028. 1900 was not one, 2000 was, and 2100 will not be.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Is a leap year (1 yes, 0 no)</th><th>Days in the year</th><th>Next leap year</th></tr></thead><tbody><tr><td><strong>Year</strong> +10 %</td><td>—</td><td>+0 %</td><td>+10.06 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Year</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Year</strong> opens at 2 026</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Year</th><th>Is a leap year (1 yes, 0 no)</th><th>Days in the year</th><th>Next leap year</th></tr></thead><tbody><tr><td>1 013</td><td>0</td><td>365</td><td>1 016</td></tr><tr><td>2 026</td><td>0</td><td>365</td><td>2 028</td></tr><tr><td>4 052</td><td>1</td><td>366</td><td>4 056</td></tr><tr><td>10 130</td><td>0</td><td>365</td><td>10 132</td></tr><tr><td>20 260</td><td>1</td><td>366</td><td>20 264</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set year = 1 900: <strong>Is a leap year (1 yes, 0 no)</strong> = 0, <strong>Days in the year</strong> = 365 days, <strong>Next leap year</strong> = 1 904. 1900 is divisible by four and by a hundred, so it is not a leap year, and the next leap year after it is 1904.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Stopping at "divisible by four".</strong> That alone makes 1900 and 2100 leap years, which they are not.</li><li><strong>Assuming the next leap year is always four years on.</strong> It is, except across a century that fails the test.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>The Gregorian rule only.</strong> A historical date before 1582 may follow a different calendar in your jurisdiction.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need year. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Is a leap year and days in the year and next leap year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking a date of birth in a quiz or a form.</li></li><li><li>Working out whether a February has twenty-nine days.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/day-of-the-year">Day of the year</a> <a href="/everyday-life/add-days">Add days</a> <a href="/everyday-life/years-between-dates">Years between dates</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Year</strong> ×10</td><td>0</td><td>1</td><td>—</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Leap Year calculator work out?', 'a' => <<<'TXT'
            It returns is a leap year and days in the year and next leap year from year. The relationship is if_else(mod(Year, 400) == 0, 1, if_else(mod(Year, 100) == 0, 0, if_else(mod(Year, 4) == 0, 1, 0))).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Year. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: . The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why is 1900 not a leap year?', 'a' => 'Because it is divisible by a hundred and not by four hundred. The century rule removes it.'],
            ['q' => 'Is 2000 a leap year?', 'a' => 'Yes. Divisible by four hundred, so the removal does not apply.'],
            ['q' => 'What is the next leap year?', 'a' => '2028 from 2026. The page answers for whatever year you type, including centuries where the answer is not four years away.'],
        ],
        'related' => [
            ['path' => '/everyday-life/day-of-the-year', 'name' => 'Day of the year'],
            ['path' => '/everyday-life/add-days', 'name' => 'Add days'],
            ['path' => '/everyday-life/years-between-dates', 'name' => 'Years between dates'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
