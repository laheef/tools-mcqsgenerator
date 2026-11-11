<?php

/**
 * Audiobooks in a Year Calculator
 * /everyday-life/audiobooks
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Audiobooks in a Year Calculator',
    'meta' => ['title' => 'Audiobooks — How Many Hours a Shelf Really Is', 'description' => 'Books, average length and daily listening give total hours, calendar days and the pace in books a month — the arithmetic behind a realistic reading challenge.', 'h1' => 'Audiobooks in a Year Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'books',
                    'label' => 'Books',
                    'type' => 'number',
                    'suffix' => 'books',
                    'default' => '12',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_book',
                    'label' => 'Average length',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '9',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_day',
                    'label' => 'Listening a day',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '1.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_hours',
                    'label' => 'Total listening',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'days',
                    'label' => 'Days to finish the pile',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Weeks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'weeks',
                ],
                [
                    'name' => 'per_month',
                    'label' => 'Books a month',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'books',
                ],
            ],
        ],
    ],
    'formula' => ['total_hours' => 'books * hours_book', 'days' => 'books * hours_book / hours_day', 'weeks' => 'books * hours_book / hours_day / 7', 'per_month' => 'books / (books * hours_book / hours_day / 30.4375)'],
    'article' => [
        'intro' => <<<'TXT'
        The hours a pile of audiobooks represents, how many calendar days of listening that is, how long it takes at your daily pace, and the books a month that pace delivers.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Twelve books at nine hours is 108 hours, which sounds like a lot until it is divided by 1.5 hours a day: seventy-two days, or ten and a bit weeks. A reading challenge of twelve books a year is a commute and a walk.</p><p>The books-a-month figure is the pace the pile implies at your listening time, and it is the number that makes a target realistic or not. At 1.5 hours a day the pace is about five books a month.</p><p>The answer is <strong>total listening and days to finish the pile and weeks and books a month</strong>, worked out from books and average length and listening a day. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>total_hours</strong></td><td><code>Books × Average length</code></td></tr><tr><td><strong>days</strong></td><td><code>Books × Average length ÷ Listening a day</code></td></tr><tr><td><strong>weeks</strong></td><td><code>Books × Average length ÷ Listening a day ÷ 7</code></td></tr><tr><td><strong>per_month</strong></td><td><code>Books ÷ (Books × Average length ÷ Listening a day ÷ 30.4375)</code></td></tr></tbody></table><p>Books times average length gives total hours; divided by the daily listening gives days, and by seven gives weeks. The monthly rate is the pile over the days and then over 30.44, the average month.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports total listening and days to finish the pile and weeks and books a month.</p><ul><li><strong>Books</strong> — books.</li><li><strong>Average length</strong> — h.</li><li><strong>Listening a day</strong> — h.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Total listening</strong> — h.</li><li><strong>Days to finish the pile</strong> — days.</li><li><strong>Weeks</strong> — weeks.</li><li><strong>Books a month</strong> — books.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put books = 12 books, average length = 9 h, listening a day = 1.5 h into the form and the panel reads:</p><ul><li><strong>Total listening</strong> = <code>Books × Average length</code> = <strong>108 h</strong></li><li><strong>Days to finish the pile</strong> = <code>Books × Average length ÷ Listening a day</code> = <strong>72 days</strong></li><li><strong>Weeks</strong> = <code>Books × Average length ÷ Listening a day ÷ 7</code> = <strong>10.286 weeks</strong></li><li><strong>Books a month</strong> = <code>Books ÷ (Books × Average length ÷ Listening a day ÷ 30.4375)</code> = <strong>5.073 books</strong></li></ul><p>Longer books change the count but not the hours. Twelve books of fifteen hours is 180 hours — five months of the same habit.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>12 × 9</code>, which comes to <strong>108 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Twelve books of nine hours is 108 hours: 72 days at 1.5 hours a day, ten weeks, and a pace of five books a month.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Total listening</th><th>Days to finish the pile</th><th>Weeks</th><th>Books a month</th></tr></thead><tbody><tr><td><strong>Books</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Average length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Listening a day</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Books</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Books</strong> opens at 12 books</li><li><strong>Average length</strong> opens at 9 h</li><li><strong>Listening a day</strong> opens at 1.5 h</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Books</th><th>Total listening</th><th>Days to finish the pile</th><th>Weeks</th><th>Books a month</th></tr></thead><tbody><tr><td>6 books</td><td>54</td><td>36</td><td>5.143</td><td>5.073</td></tr><tr><td>12 books</td><td>108</td><td>72</td><td>10.286</td><td>5.073</td></tr><tr><td>24 books</td><td>216</td><td>144</td><td>20.571</td><td>5.073</td></tr><tr><td>60 books</td><td>540</td><td>360</td><td>51.429</td><td>5.073</td></tr><tr><td>120 books</td><td>1 080</td><td>720</td><td>102.857</td><td>5.073</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set books = 12, average length = 9, listening a day = 3: <strong>Total listening</strong> = 108 h, <strong>Days to finish the pile</strong> = 36 days, <strong>Weeks</strong> = 5.143 weeks, <strong>Books a month</strong> = 10.146 books. At three hours a day the same twelve books take 36 days and the pace doubles to ten books a month.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting a book as one unit.</strong> A 40-hour history and a 4-hour novella are both one book on a reading app. Hours are the comparable figure.</li><li><strong>Assuming the pace holds.</strong> Holiday weeks are three times the commute and working weeks are one. The annual total rarely matches either.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Listening only.</strong> A book that needs diagrams — a manual, a map-heavy history — is not the same book in audio, and this page counts time rather than comprehension.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need books and average length and listening a day. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Total listening and days to finish the pile and weeks and books a month should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Judging whether a reading challenge is realistic.</li></li><li><li>Estimating a value for money subscription.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/audiobook-speed">Audiobook speed</a> <a href="/everyday-life/podcasts">Podcast time</a> <a href="/everyday-life/reading-speed">Reading speed</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Books</strong> ×10</td><td>108</td><td>1 080</td><td>ten times larger</td></tr><tr><td><strong>Average length</strong> ×10</td><td>108</td><td>1 080</td><td>ten times larger</td></tr><tr><td><strong>Listening a day</strong> ×10</td><td>108</td><td>108</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Audiobooks in a Year calculator work out?', 'a' => <<<'TXT'
            It returns total listening and days to finish the pile and weeks and books a month from books and average length and listening a day. The relationship is Books × Average length.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Books (books), Average length (h), Listening a day (h). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: books in books; average length in h; listening a day in h. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many hours is an audiobook per 100 pages?', 'a' => 'Roughly two and a half hours. A 300-page novel is about 8 to 10 hours at normal speed, and the narrator\'s pace matters more than the page count.'],
            ['q' => 'Is 1.5 hours a day a lot?', 'a' => 'It is a commute each way plus a dog walk. Most people who listen to twelve books a year are not doing anything unusual — they are driving.'],
            ['q' => 'Why does the pace come out in books a month rather than a year?', 'a' => 'Because a month is the unit reading apps use for a challenge, and because the arithmetic of a year is easier to disagree with than the arithmetic of a month.'],
        ],
        'related' => [
            ['path' => '/everyday-life/audiobook-speed', 'name' => 'Audiobook speed'],
            ['path' => '/everyday-life/podcasts', 'name' => 'Podcast time'],
            ['path' => '/everyday-life/reading-speed', 'name' => 'Reading speed'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
