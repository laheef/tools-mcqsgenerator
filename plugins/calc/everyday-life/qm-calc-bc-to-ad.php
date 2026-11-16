<?php

/**
 * BC to AD Year Calculator
 * /everyday-life/bc-to-ad
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'BC to AD Year Calculator',
    'meta' => ['title' => 'BC to AD — Years Across the Era Boundary — Free Tool', 'description' => 'Convert a BC year to elapsed years before an AD year without inventing a year zero. An optional average-day conversion gives scale, not exact historical dates.', 'h1' => 'BC to AD Year Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'bc',
                    'label' => 'Starting year (BC)',
                    'type' => 'number',
                    'suffix' => 'BC',
                    'default' => '100',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ad',
                    'label' => 'Ending year (AD)',
                    'type' => 'number',
                    'suffix' => 'AD',
                    'default' => '2026',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'years',
                    'label' => 'Years elapsed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                [
                    'name' => 'days',
                    'label' => 'Approximate days',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Approximate weeks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
            ],
        ],
    ],
    'formula' => ['years' => 'bc + ad - 1', 'days' => '(bc + ad - 1) * 365.2425', 'weeks' => '(bc + ad - 1) * 365.2425 / 7'],
    'article' => [
        'intro' => <<<'TXT'
        BC and AD numbering has no year zero in the traditional system. This calculator counts across the boundary using that convention and reports an average-day equivalent.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            The traditional BC/AD year labels jump from 1 BC to AD 1. There is no year zero between them, so subtracting the labels directly misses a year. The formula accounts for that gap. Its day count is an average-duration illustration, not a reconstruction of exact historical calendar days.<p>The answer is <strong>years elapsed and approximate days and approximate weeks</strong>, worked out from starting year (BC) and ending year (AD). Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>years</strong></td><td><code>Starting year (BC) + Ending year (AD) - 1</code></td></tr><tr><td><strong>days</strong></td><td><code>(Starting year (BC) + Ending year (AD) - 1) × 365.2425</code></td></tr><tr><td><strong>weeks</strong></td><td><code>(Starting year (BC) + Ending year (AD) - 1) × 365.2425 ÷ 7</code></td></tr></tbody></table><p>Years elapsed equal the BC year plus the AD year minus one. Multiplying by 365.2425 supplies an average-day estimate; dividing by seven converts that estimate to weeks.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports years elapsed and approximate days and approximate weeks.</p><ul><li><strong>Starting year (BC)</strong> — BC.</li><li><strong>Ending year (AD)</strong> — AD.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Years elapsed</strong> — years.</li><li><strong>Approximate days</strong> — days.</li><li><strong>Approximate weeks</strong> — weeks.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put starting year (BC) = 100 BC, ending year (AD) = 2 026 AD into the form and the panel reads:</p><ul><li><strong>Years elapsed</strong> = <code>Starting year (BC) + Ending year (AD) - 1</code> = <strong>2 125 years</strong></li><li><strong>Approximate days</strong> = <code>(Starting year (BC) + Ending year (AD) - 1) × 365.2425</code> = <strong>776 140.312 days</strong></li><li><strong>Approximate weeks</strong> = <code>(Starting year (BC) + Ending year (AD) - 1) × 365.2425 ÷ 7</code> = <strong>110 877.188 weeks</strong></li></ul><p>Historical year systems are not uniform. The Julian calendar was used before the Gregorian reform, and its adoption date varied by country. Astronomers often use astronomical year numbering, which includes year zero; this page does not. The day figure therefore should not be used to date a historical event to a precise day. It is a scale conversion based on a modern average year. If the question is about chronology, specify the calendar, location and era convention before comparing dates.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>100 + 2 026 - 1</code>, which comes to <strong>2 125 years</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>From 100 BC to AD 2026 is 2,125 years by the no-year-zero convention. At 365.2425 days per average Gregorian year, that is approximately 776,140.3125 days.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Years elapsed</th><th>Approximate days</th><th>Approximate weeks</th></tr></thead><tbody><tr><td><strong>Starting year (BC)</strong> +10 %</td><td>+0.47 %</td><td>+0.47 %</td><td>+0.47 %</td></tr><tr><td><strong>Ending year (AD)</strong> +10 %</td><td>+9.53 %</td><td>+9.53 %</td><td>+9.53 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Ending year (AD)</strong>. <strong>Starting year (BC)</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Starting year (BC)</strong> opens at 100 BC</li><li><strong>Ending year (AD)</strong> opens at 2 026 AD</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Starting year (BC)</th><th>Years elapsed</th><th>Approximate days</th><th>Approximate weeks</th></tr></thead><tbody><tr><td>50 BC</td><td>2 075</td><td>757 878.188</td><td>108 268.312</td></tr><tr><td>100 BC</td><td>2 125</td><td>776 140.312</td><td>110 877.188</td></tr><tr><td>200 BC</td><td>2 225</td><td>812 664.562</td><td>116 094.938</td></tr><tr><td>500 BC</td><td>2 525</td><td>922 237.312</td><td>131 748.188</td></tr><tr><td>1 000 BC</td><td>3 025</td><td>1.105 × 10<sup>6</sup></td><td>157 836.938</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => '<ul></ul>'],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Mixing elapsed days with inclusive dates.</strong> Subtracting dates gives the distance between them. Counting both endpoints adds one, which is right for a list of dates and wrong for nights away.</li><li><strong>Assuming a month is thirty days.</strong> Month lengths vary, and an anniversary can land on the last day of a shorter month.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Calendar dates, not local clock hours.</strong> Daylight-saving changes and time zones do not alter a date-only result.</li></li><li><li><strong>Named conventions matter.</strong> If a contract, school or workplace defines its own first and last day, use that wording rather than guessing.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'The calendar detail behind this answer', 'html' => <<<'TXT'
            Historical year systems are not uniform. The Julian calendar was used before the Gregorian reform, and its adoption date varied by country. Astronomers often use astronomical year numbering, which includes year zero; this page does not. The day figure therefore should not be used to date a historical event to a precise day. It is a scale conversion based on a modern average year. If the question is about chronology, specify the calendar, location and era convention before comparing dates.
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need starting year (BC) and ending year (AD). Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Years elapsed and approximate days and approximate weeks should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an event or filing date against a calendar.</li></li><li><li>Comparing a result with a paper diary before relying on it.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/date-to-date">Date to date</a> <a href="/everyday-life/days-between-dates">Days between dates</a> <a href="/everyday-life/day-of-the-year">Day of the year</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Starting year (BC)</strong> ×10</td><td>2 125</td><td>3 025</td><td>×1.424</td></tr><tr><td><strong>Ending year (AD)</strong> ×10</td><td>2 125</td><td>20 359</td><td>×9.581</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
            ['title' => 'Practical assumptions and checks', 'html' => <<<'TXT'
            <p>The important calendar detail is that the traditional BC/AD sequence has no year zero: 1 BC is followed immediately by AD 1. A simple subtraction across the boundary can therefore be off by one if it treats the labels as ordinary signed integers. Use the calculator’s era fields as intended and read the result as an elapsed year count, not as a count of numbered labels that includes a nonexistent zero year.</p><p>For example, a span from 3 BC to AD 3 crosses the era boundary and should be reasoned through as 3 years before the change plus 3 years after it, with no year zero inserted. A year-only calculation cannot tell how many exact days separate two historical events; their months and days matter. Calendar reforms and local historical dating conventions can matter too, so use dated source records when precision is important.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the BC to AD Year calculator work out?', 'a' => <<<'TXT'
            It returns years elapsed and approximate days and approximate weeks from starting year (BC) and ending year (AD). The relationship is Starting year (BC) + Ending year (AD) - 1.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Starting year (BC) (BC), Ending year (AD) (AD). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: starting year (BC) in BC; ending year (AD) in AD. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Was there a year zero?', 'a' => 'Not in the BC/AD convention used here; 1 BC is followed by AD 1.'],
            ['q' => 'Why subtract one?', 'a' => 'The no-year-zero boundary means the elapsed-year count is BC + AD − 1.'],
            ['q' => 'Are the day totals historically exact?', 'a' => 'No. They multiply by a modern average Gregorian year.'],
            ['q' => 'Does it support astronomical numbering?', 'a' => 'No. Astronomical numbering includes year zero and needs a different conversion.'],
        ],
        'related' => [
            ['path' => '/everyday-life/date-to-date', 'name' => 'Date to date'],
            ['path' => '/everyday-life/days-between-dates', 'name' => 'Days between dates'],
            ['path' => '/everyday-life/day-of-the-year', 'name' => 'Day of the year'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
