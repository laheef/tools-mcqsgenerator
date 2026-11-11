<?php

/**
 * Speaking Time Calculator
 * /everyday-life/speaking-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Speaking Time Calculator',
    'meta' => ['title' => 'Speaking Time — Words into Minutes out Loud', 'description' => 'A script, a speech or a lecture in words, turned into the minutes it takes to say at 130 words a minute, with seconds, pages and a longer talk in the same.', 'h1' => 'Speaking Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'words',
                    'label' => 'Word count',
                    'type' => 'number',
                    'suffix' => 'words',
                    'default' => '1500',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wpm',
                    'label' => 'Speaking pace',
                    'type' => 'number',
                    'suffix' => 'wpm',
                    'default' => '130',
                    'help' => 'Conversation runs at 150 to 160. A speech is slower, 120 to 140, because of pauses that do not appear in the word count.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Speaking time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'seconds',
                    'label' => 'In seconds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
                [
                    'name' => 'pages',
                    'label' => 'Pages at 250 words',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'pages',
                ],
                [
                    'name' => 'tenk',
                    'label' => 'Hours per 10 000 words',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
            ],
        ],
    ],
    'formula' => ['minutes' => 'words / wpm', 'seconds' => 'words / wpm * 60', 'pages' => 'words / 250', 'tenk' => '10000 / wpm / 60'],
    'article' => [
        'intro' => 'How long a piece of text takes to speak at an ordinary pace, in minutes and seconds, and what that pace implies for a longer talk.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A thousand five hundred words is eleven and a half minutes at 130 words a minute, which is a conference talk, a wedding speech and one side of a lecture. Read it at 160 and the same words finish two and a half minutes early, and the room notices.</p><p>Speakers consistently under-estimate by a fifth. The text takes longer to say than to read, because breath, emphasis and the pause after a point all consume time that the word count does not contain.</p><p>The answer is <strong>speaking time and in seconds and pages at 250 words and hours per 10 000 words</strong>, worked out from word count and speaking pace. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>minutes</strong></td><td><code>Word count ÷ Speaking pace</code></td></tr><tr><td><strong>seconds</strong></td><td><code>Word count ÷ Speaking pace × 60</code></td></tr><tr><td><strong>pages</strong></td><td><code>Word count ÷ 250</code></td></tr><tr><td><strong>tenk</strong></td><td><code>10000 ÷ Speaking pace ÷ 60</code></td></tr></tbody></table><p>Words over pace gives minutes; times sixty gives seconds. The page count uses 250 words a page, a manuscript convention, and the ten-thousand-word figure shows how the pace scales to a long talk.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports speaking time and in seconds and pages at 250 words and hours per 10 000 words.</p><ul><li><strong>Word count</strong> — words.</li><li><strong>Speaking pace</strong> — wpm. Conversation runs at 150 to 160. A speech is slower, 120 to 140, because of pauses that do not appear in the word count.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Speaking time</strong> — min.</li><li><strong>In seconds</strong> — s.</li><li><strong>Pages at 250 words</strong> — pages.</li><li><strong>Hours per 10 000 words</strong> — h.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put word count = 1 500 words, speaking pace = 130 wpm into the form and the panel reads:</p><ul><li><strong>Speaking time</strong> = <code>Word count ÷ Speaking pace</code> = <strong>11.538 min</strong></li><li><strong>In seconds</strong> = <code>Word count ÷ Speaking pace × 60</code> = <strong>692.308 s</strong></li><li><strong>Pages at 250 words</strong> = <code>Word count ÷ 250</code> = <strong>6 pages</strong></li><li><strong>Hours per 10 000 words</strong> = <code>10000 ÷ Speaking pace ÷ 60</code> = <strong>1.282 h</strong></li></ul><p>A forty-minute lecture is about 5 200 words at 130, and 6 400 at 160. The same slot needs different scripts depending on how fast you actually speak.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>1 500 ÷ 130</code>, which comes to <strong>11.538 min</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>1 500 words at 130 a minute is 11.5 minutes or 692 seconds — six pages of manuscript, and a pace of 1.28 hours per ten thousand words.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Speaking time</th><th>In seconds</th><th>Pages at 250 words</th><th>Hours per 10 000 words</th></tr></thead><tbody><tr><td><strong>Word count</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Speaking pace</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Word count</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Word count</strong> opens at 1 500 words</li><li><strong>Speaking pace</strong> opens at 130 wpm — Conversation runs at 150 to 160. A speech is slower, 120 to 140, because of pauses that do not appear in the word count.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Word count</th><th>Speaking time</th><th>In seconds</th><th>Pages at 250 words</th><th>Hours per 10 000 words</th></tr></thead><tbody><tr><td>750 words</td><td>5.769</td><td>346.154</td><td>3</td><td>1.282</td></tr><tr><td>1 500 words</td><td>11.538</td><td>692.308</td><td>6</td><td>1.282</td></tr><tr><td>3 000 words</td><td>23.077</td><td>1 384.615</td><td>12</td><td>1.282</td></tr><tr><td>7 500 words</td><td>57.692</td><td>3 461.538</td><td>30</td><td>1.282</td></tr><tr><td>15 000 words</td><td>115.385</td><td>6 923.077</td><td>60</td><td>1.282</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set word count = 1 500, speaking pace = 160: <strong>Speaking time</strong> = 9.375 min, <strong>In seconds</strong> = 562.5 s, <strong>Pages at 250 words</strong> = 6 pages, <strong>Hours per 10 000 words</strong> = 1.042 h. At 160 words a minute the same 1 500 words are 9.4 minutes, which is why a nervous speaker finishes early and has nothing left to say.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Timing by reading.</strong> Silent reading runs two to three times faster than speech. Timing a script means saying it out loud, with a clock.</li><li><strong>Forgetting the pauses.</strong> A five-second pause after each of six points is half a minute, and most scripts have no allowance for it.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One pace.</strong> A talk with questions, laughter or a demonstration runs long regardless of the word count. Leave a tenth of the slot free.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need word count and speaking pace. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Speaking time and in seconds and pages at 250 words and hours per 10 000 words should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Cutting a script to fit a slot before the day.</li></li><li><li>Estimating a narration job for a client.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/reading-speed">Reading speed</a> <a href="/everyday-life/words-per-minute">Words per minute</a> <a href="/everyday-life/reading-time">Reading time</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Word count</strong> ×10</td><td>11.538</td><td>115.385</td><td>ten times larger</td></tr><tr><td><strong>Speaking pace</strong> ×10</td><td>11.538</td><td>1.154</td><td>ten times smaller</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Speaking Time calculator work out?', 'a' => <<<'TXT'
            It returns speaking time and in seconds and pages at 250 words and hours per 10 000 words from word count and speaking pace. The relationship is Word count ÷ Speaking pace.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Word count (words), Speaking pace (wpm). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: word count in words; speaking pace in wpm. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many words is a five-minute speech?', 'a' => 'About 650 at an ordinary pace of 130, or 800 if you speak quickly. The safe figure for a timed slot is 600.'],
            ['q' => 'Is 130 words a minute slow?', 'a' => 'For conversation, yes. For a speech it is the pace an audience can follow, and the slowest sentences are usually the ones people remember.'],
            ['q' => 'Does an autocue change the timing?', 'a' => 'It removes the pauses for thought and adds some for reading, and the two roughly cancel. What it does not remove is the need to run the clock once.'],
        ],
        'related' => [
            ['path' => '/everyday-life/reading-speed', 'name' => 'Reading speed'],
            ['path' => '/everyday-life/words-per-minute', 'name' => 'Words per minute'],
            ['path' => '/everyday-life/reading-time', 'name' => 'Reading time'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
