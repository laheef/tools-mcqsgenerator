<?php

/**
 * Decimal Time Converter
 * /everyday-life/decimal-time-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Decimal Time Converter',
    'meta' => ['title' => 'Decimal Time — Turning 7.35 Back into Hours', 'description' => '7.35 decimal hours is 7 hours 21 minutes, not 7:35: the conversion back to clock time, with the parts separated and the cost of a wrong reading shown.', 'h1' => 'Decimal Time Converter', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'decimal',
                    'label' => 'Decimal hours',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '7.35',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'whole_hours',
                    'label' => 'Whole hours',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'seconds',
                    'label' => 'Seconds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
                [
                    'name' => 'clock',
                    'label' => 'Clock time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
            ],
        ],
    ],
    'formula' => ['whole_hours' => 'floor(decimal)', 'minutes' => 'floor((decimal - floor(decimal)) * 60)', 'seconds' => 'round(((decimal - floor(decimal)) * 60 - floor((decimal - floor(decimal)) * 60)) * 60)', 'clock' => 'decimal'],
    'article' => [
        'intro' => 'A decimal number of hours converted back into hours, minutes and seconds, with the decimal minutes and the error a wrong reading would cause.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>The conversion one way is familiar; the way back catches people. 7.35 hours is not seven hours thirty-five. The 0.35 is thirty-five hundredths of an hour, and that is twenty-one minutes.</p><p>So 7.35 reads back as 7:21, and the fourteen minutes between the wrong reading and the right one is a quarter of an hour on every entry of a timesheet.</p><p>The answer is <strong>whole hours and minutes and seconds and clock time</strong>, worked out from decimal hours. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>whole_hours</strong></td><td><code>floor(Decimal hours)</code></td></tr><tr><td><strong>minutes</strong></td><td><code>floor((Decimal hours - floor(Decimal hours)) × 60)</code></td></tr><tr><td><strong>seconds</strong></td><td><code>round(((Decimal hours - floor(Decimal hours)) × 60 - floor((Decimal hours - floor(Decimal hours)) × 60)) × 60)</code></td></tr><tr><td><strong>clock</strong></td><td><code>Decimal hours</code></td></tr></tbody></table><p>The whole number is the hours. The fraction times sixty gives minutes, and the fraction of that times sixty gives seconds.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill. It reports whole hours and minutes and seconds and clock time.</p><ul><li><strong>Decimal hours</strong> — h.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Whole hours</strong> — h.</li><li><strong>Minutes</strong> — min.</li><li><strong>Seconds</strong> — s.</li><li><strong>Clock time</strong> — h.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put decimal hours = 7.35 h into the form and the panel reads:</p><ul><li><strong>Whole hours</strong> = <code>floor(Decimal hours)</code> = <strong>7 h</strong></li><li><strong>Minutes</strong> = <code>floor((Decimal hours - floor(Decimal hours)) × 60)</code> = <strong>21 min</strong></li><li><strong>Seconds</strong> = <code>round(((Decimal hours - floor(Decimal hours)) × 60 - floor((Decimal hours - floor(Decimal hours)) × 60)) × 60)</code> = <strong>0 s</strong></li><li><strong>Clock time</strong> = <code>Decimal hours</code> = <strong>7.35 h</strong></li></ul><p>8.10 decimal hours is 8:06, a six-minute entry, and 0.10 of an hour is the smallest unit most payroll systems store.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>floor(7.35)</code>, which comes to <strong>7 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>7.35 decimal hours is 7 hours 21 minutes and 0 seconds — a clock reading of 7:21, not 7:35.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Whole hours</th><th>Minutes</th><th>Seconds</th><th>Clock time</th></tr></thead><tbody><tr><td><strong>Decimal hours</strong> +10 %</td><td>+14.29 %</td><td>−76.19 %</td><td>—</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Decimal hours</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Decimal hours</strong> opens at 7.35 h</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Decimal hours</th><th>Whole hours</th><th>Minutes</th><th>Seconds</th><th>Clock time</th></tr></thead><tbody><tr><td>3.675 h</td><td>3</td><td>40</td><td>30</td><td>3.675</td></tr><tr><td>7.35 h</td><td>7</td><td>21</td><td>0</td><td>7.35</td></tr><tr><td>14.7 h</td><td>14</td><td>42</td><td>0</td><td>14.7</td></tr><tr><td>36.75 h</td><td>36</td><td>45</td><td>0</td><td>36.75</td></tr><tr><td>73.5 h</td><td>73</td><td>30</td><td>0</td><td>73.5</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set decimal hours = 8.1: <strong>Whole hours</strong> = 8 h, <strong>Minutes</strong> = 6 min, <strong>Seconds</strong> = 0 s, <strong>Clock time</strong> = 8.1 h. 8.10 decimal hours is 8:06 — six minutes, which is the smallest entry many payroll systems can store.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Reading the decimal as minutes.</strong> 7.35 is 7:21. The digits after the point are hundredths of an hour, and only a coincidence makes 0.50 the same as thirty minutes.</li><li><strong>Rounding twice.</strong> Minutes rounded up and then seconds rounded up can add a minute. Round the seconds and let the minutes that come from them stand.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Positive values.</strong> A negative decimal would need the whole part treated as a floor toward zero, and this page assumes a duration.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need decimal hours. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Whole hours and minutes and seconds and clock time should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Reading a payroll export back into clock times.</li></li><li><li>Checking a timesheet that was entered in decimals.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/time-to-decimal">Time to decimal</a> <a href="/everyday-life/time-to-hours-conversion">Time to hours</a> <a href="/everyday-life/minutes-between-two-times">Minutes between two times</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Decimal hours</strong> ×10</td><td>7</td><td>73</td><td>×10.429</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Decimal Time Converter calculator work out?', 'a' => 'It returns whole hours and minutes and seconds and clock time from decimal hours. The relationship is floor(Decimal hours).'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Decimal hours (h). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: decimal hours in h. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is 7.5 hours 7:30?', 'a' => 'Yes, and it is the only one that looks right by accident. Half an hour is 0.5, but 0.25 is fifteen minutes and 0.75 is forty-five.'],
            ['q' => 'How do I convert 7.35 hours to minutes?', 'a' => 'Multiply by sixty: 441 minutes, which is 7:21. The same answer as taking the whole hours and converting the fraction.'],
            ['q' => 'Why does payroll use decimals at all?', 'a' => 'Because multiplying decimal hours by a rate is one multiplication, and multiplying hours and minutes by a rate needs a conversion at every step.'],
        ],
        'related' => [
            ['path' => '/everyday-life/time-to-decimal', 'name' => 'Time to decimal'],
            ['path' => '/everyday-life/time-to-hours-conversion', 'name' => 'Time to hours'],
            ['path' => '/everyday-life/minutes-between-two-times', 'name' => 'Minutes between two times'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
