<?php

/**
 * Reading Speed Calculator
 * /everyday-life/reading-speed
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Reading Speed Calculator',
    'meta' => ['title' => 'Reading Speed — Words a Minute from Pages and Time', 'description' => 'Pages read and the minutes they took give words per minute, pages an hour, and how long a full-length book will take you at that pace. The formula is shown.', 'h1' => 'Reading Speed Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'pages',
                    'label' => 'Pages read',
                    'type' => 'number',
                    'suffix' => 'pages',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Time taken',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '25',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'words_page',
                    'label' => 'Words on a page',
                    'type' => 'number',
                    'suffix' => 'words',
                    'default' => '300',
                    'help' => 'A trade paperback sets about 300 words a page; a hardback with wide margins is nearer 250, a technical book less.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'book_words',
                    'label' => 'Length of the book',
                    'type' => 'number',
                    'suffix' => 'words',
                    'default' => '80000',
                    'help' => 'Eighty thousand words is an average novel. Genre fiction runs to 100 000 and non-fiction 70 000.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wpm',
                    'label' => 'Words a minute',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'wpm',
                ],
                [
                    'name' => 'pages_hour',
                    'label' => 'Pages an hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'pages/h',
                ],
                [
                    'name' => 'hours_book',
                    'label' => 'Hours for the book',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'days_30',
                    'label' => 'At 30 minutes a day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
            ],
        ],
    ],
    'formula' => ['wpm' => 'pages * words_page / minutes', 'pages_hour' => 'pages / minutes * 60', 'hours_book' => 'book_words / (pages * words_page / minutes) / 60', 'days_30' => 'book_words / (pages * words_page / minutes) / 30'],
    'article' => [
        'intro' => 'Reading speed in words a minute and pages an hour, from a timed session, and the number of hours a book of a given length will cost at that speed.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Twenty pages in twenty-five minutes with 300 words on a page is 240 words a minute, which is a brisk but ordinary adult pace. Slow readers sit near 150 and people who skim claim 500 without noticing what they missed.</p><p>The useful figure is the book. Eighty thousand words at 240 a minute is five and a half hours, or eleven days at half an hour a night. That is the answer to "I never have time to read" — it is the same half hour, spent elsewhere.</p><p>The answer is <strong>words a minute and pages an hour and hours for the book and at 30 minutes a day</strong>, worked out from pages read and time taken and words on a page and length of the book. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>wpm</strong></td><td><code>Pages read × Words on a page ÷ Time taken</code></td></tr><tr><td><strong>pages_hour</strong></td><td><code>Pages read ÷ Time taken × 60</code></td></tr><tr><td><strong>hours_book</strong></td><td><code>Length of the book ÷ (Pages read × Words on a page ÷ Time taken) ÷ 60</code></td></tr><tr><td><strong>days_30</strong></td><td><code>Length of the book ÷ (Pages read × Words on a page ÷ Time taken) ÷ 30</code></td></tr></tbody></table><p>Pages times words a page gives the words in the session; divided by the minutes it gives words a minute. Pages an hour is the same division multiplied by sixty, and the book is its length divided by the rate and then by sixty.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports words a minute and pages an hour and hours for the book and at 30 minutes a day.</p><ul><li><strong>Pages read</strong> — pages.</li><li><strong>Time taken</strong> — min.</li><li><strong>Words on a page</strong> — words. A trade paperback sets about 300 words a page; a hardback with wide margins is nearer 250, a technical book less.</li><li><strong>Length of the book</strong> — words. Eighty thousand words is an average novel. Genre fiction runs to 100 000 and non-fiction 70 000.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Words a minute</strong> — wpm.</li><li><strong>Pages an hour</strong> — pages/h.</li><li><strong>Hours for the book</strong> — h.</li><li><strong>At 30 minutes a day</strong> — days.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put pages read = 20 pages, time taken = 25 min, words on a page = 300 words, length of the book = 80 000 words into the form and the panel reads:</p><ul><li><strong>Words a minute</strong> = <code>Pages read × Words on a page ÷ Time taken</code> = <strong>240 wpm</strong></li><li><strong>Pages an hour</strong> = <code>Pages read ÷ Time taken × 60</code> = <strong>48 pages/h</strong></li><li><strong>Hours for the book</strong> = <code>Length of the book ÷ (Pages read × Words on a page ÷ Time taken) ÷ 60</code> = <strong>5.556 h</strong></li><li><strong>At 30 minutes a day</strong> = <code>Length of the book ÷ (Pages read × Words on a page ÷ Time taken) ÷ 30</code> = <strong>11.111 days</strong></li></ul><p>The same twenty pages in forty minutes is 150 words a minute, and the novel becomes nine hours — nearly four more evenings for the same book.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 × 300 ÷ 25</code>, which comes to <strong>240 wpm</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>20 pages of 300 words in 25 minutes is 240 words a minute and 48 pages an hour. An 80 000-word novel takes 5.56 hours, or eleven days at thirty minutes a night.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Words a minute</th><th>Pages an hour</th><th>Hours for the book</th><th>At 30 minutes a day</th></tr></thead><tbody><tr><td><strong>Pages read</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Time taken</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Words on a page</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Length of the book</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Time taken</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Pages read</strong> opens at 20 pages</li><li><strong>Time taken</strong> opens at 25 min</li><li><strong>Words on a page</strong> opens at 300 words — A trade paperback sets about 300 words a page; a hardback with wide margins is nearer 250, a technical book less.</li><li><strong>Length of the book</strong> opens at 80 000 words — Eighty thousand words is an average novel. Genre fiction runs to 100 000 and non-fiction 70 000.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Pages read</th><th>Words a minute</th><th>Pages an hour</th><th>Hours for the book</th><th>At 30 minutes a day</th></tr></thead><tbody><tr><td>10 pages</td><td>120</td><td>24</td><td>11.111</td><td>22.222</td></tr><tr><td>20 pages</td><td>240</td><td>48</td><td>5.556</td><td>11.111</td></tr><tr><td>40 pages</td><td>480</td><td>96</td><td>2.778</td><td>5.556</td></tr><tr><td>100 pages</td><td>1 200</td><td>240</td><td>1.111</td><td>2.222</td></tr><tr><td>200 pages</td><td>2 400</td><td>480</td><td>0.556</td><td>1.111</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set pages read = 20, time taken = 40, words on a page = 300, length of the book = 80 000: <strong>Words a minute</strong> = 150 wpm, <strong>Pages an hour</strong> = 30 pages/h, <strong>Hours for the book</strong> = 8.889 h, <strong>At 30 minutes a day</strong> = 17.778 days. At 150 words a minute the novel takes nine hours and twenty-two half-hour evenings, which is why holiday reading feels different from commuting reading.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Timing a page of dialogue.</strong> Dialogue goes faster than description, so one fast chapter inflates the rate by a third. Time a whole sitting.</li><li><strong>Assuming the rate is constant.</strong> A technical book at 240 words a minute is skimmed, not read. Narrative and argument are different speeds.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Silent reading.</strong> Reading aloud is about 130 words a minute, and the speaking-time page measures that direction.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need pages read and time taken and words on a page and length of the book. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Words a minute and pages an hour and hours for the book and at 30 minutes a day should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out whether a book club book fits before Thursday.</li></li><li><li>Estimating how long a manuscript will take to read.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/speaking-time">Speaking time</a> <a href="/everyday-life/audiobook-speed">Audiobook speed</a> <a href="/everyday-life/reading-time">Reading time</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Pages read</strong> ×10</td><td>240</td><td>2 400</td><td>ten times larger</td></tr><tr><td><strong>Time taken</strong> ×10</td><td>240</td><td>24</td><td>ten times smaller</td></tr><tr><td><strong>Words on a page</strong> ×10</td><td>240</td><td>2 400</td><td>ten times larger</td></tr><tr><td><strong>Length of the book</strong> ×10</td><td>240</td><td>240</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Reading Speed calculator work out?', 'a' => <<<'TXT'
            It returns words a minute and pages an hour and hours for the book and at 30 minutes a day from pages read and time taken and words on a page and length of the book. The relationship is Pages read × Words on a page ÷ Time taken.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Pages read (pages), Time taken (min), Words on a page (words), Length of the book (words). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: pages read in pages; time taken in min; words on a page in words; length of the book in words. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is an average reading speed?', 'a' => <<<'TXT'
            Between 200 and 250 words a minute for adult fiction. University students reading for study slower, and people reading on a phone faster because the lines are short.
            TXT],
            ['q' => 'Does speed reading actually work?', 'a' => 'The eye can take in more words per stop, and comprehension falls with it. Most claims above 500 words a minute are skimming with the plot filled in from memory.'],
            ['q' => 'Why is my speed different for screen and paper?', 'a' => 'Line length and font size. A 90-character line on paper is easier to track than a wide paragraph on a monitor, and eye strain shows up as a slower rate.'],
        ],
        'related' => [
            ['path' => '/everyday-life/speaking-time', 'name' => 'Speaking time'],
            ['path' => '/everyday-life/audiobook-speed', 'name' => 'Audiobook speed'],
            ['path' => '/everyday-life/reading-time', 'name' => 'Reading time'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
