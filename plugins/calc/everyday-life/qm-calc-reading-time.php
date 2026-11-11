<?php

/**
 * Reading Time Calculator
 * /everyday-life/reading-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Reading Time Calculator',
    'meta' => ['title' => 'Reading Time Calculator — Minutes to Read — Free Tool', 'description' => 'Enter a word count and a reading speed and the page returns how long the text takes to read, in minutes and seconds, with the same answer at three other speeds.', 'h1' => 'Reading Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'words',
                    'label' => 'Words in the text',
                    'type' => 'number',
                    'suffix' => 'words',
                    'default' => '1000',
                    'help' => 'Most editors count this for you.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wpm',
                    'label' => 'Reading speed',
                    'type' => 'number',
                    'suffix' => 'wpm',
                    'default' => '238',
                    'help' => '238 is the average for adult silent reading of non-fiction.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Reading time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'seconds',
                    'label' => 'Reading time in seconds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
                [
                    'name' => 'slow',
                    'label' => 'At 150 wpm',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'fast',
                    'label' => 'At 350 wpm',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => ['minutes' => 'words / wpm', 'seconds' => 'words / wpm * 60', 'slow' => 'words / 150', 'fast' => 'words / 350'],
    'article' => [
        'intro' => <<<'TXT'
        Reading time is a word count divided by a reading speed. The page returns the time for the speed you type and shows the same text at a slow, an average and a fast reader, so a single number does not have to carry the whole answer.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>The arithmetic is one division. What makes the answer useful is knowing which reading speed to put in the second box. Adults read non-fiction at around 238 words a minute when they are reading for comprehension; skimming runs two to three times faster, and reading aloud is slower still.</p><p>Read the slow and fast columns as a range rather than alternatives. They bracket the same text without asking you to guess your own speed.</p><p>The answer is <strong>reading time and reading time in seconds and at 150 wpm and at 350 wpm</strong>, worked out from words in the text and reading speed. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>minutes</strong></td><td><code>Words in the text ÷ Reading speed</code></td></tr><tr><td><strong>seconds</strong></td><td><code>Words in the text ÷ Reading speed × 60</code></td></tr><tr><td><strong>slow</strong></td><td><code>Words in the text ÷ 150</code></td></tr><tr><td><strong>fast</strong></td><td><code>Words in the text ÷ 350</code></td></tr></tbody></table><p>The 150 and 350 in the last two lines are fixed reference speeds, not your input. They are there so the page always shows a range.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports reading time and reading time in seconds and at 150 wpm and at 350 wpm.</p><ul><li><strong>Words in the text</strong> — words. Most editors count this for you.</li><li><strong>Reading speed</strong> — wpm. 238 is the average for adult silent reading of non-fiction.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Reading time</strong> — min.</li><li><strong>Reading time in seconds</strong> — s.</li><li><strong>At 150 wpm</strong> — min.</li><li><strong>At 350 wpm</strong> — min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put words in the text = 1 000 words, reading speed = 238 wpm into the form and the panel reads:</p><ul><li><strong>Reading time</strong> = <code>Words in the text ÷ Reading speed</code> = <strong>4.202 min</strong></li><li><strong>Reading time in seconds</strong> = <code>Words in the text ÷ Reading speed × 60</code> = <strong>252.101 s</strong></li><li><strong>At 150 wpm</strong> = <code>Words in the text ÷ 150</code> = <strong>6.667 min</strong></li><li><strong>At 350 wpm</strong> = <code>Words in the text ÷ 350</code> = <strong>2.857 min</strong></li></ul><p>The seconds line exists for short texts: a 200-word email at 238 wpm is 50 seconds, and rounding that to one minute loses a fifth of the answer.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>1 000 ÷ 238</code>, which comes to <strong>4.202 min</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A thousand words at 238 wpm is a little over four minutes. That is a news article, a newsletter, or the introduction to a report. Ten thousand words is three quarters of an hour, which is a short story or a long chapter.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Reading time</th><th>Reading time in seconds</th><th>At 150 wpm</th><th>At 350 wpm</th></tr></thead><tbody><tr><td><strong>Words in the text</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Reading speed</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Words in the text</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Words in the text</strong> opens at 1 000 words — Most editors count this for you.</li><li><strong>Reading speed</strong> opens at 238 wpm — 238 is the average for adult silent reading of non-fiction.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Words in the text</th><th>Reading time</th><th>Reading time in seconds</th><th>At 150 wpm</th><th>At 350 wpm</th></tr></thead><tbody><tr><td>500 words</td><td>2.101</td><td>126.05</td><td>3.333</td><td>1.429</td></tr><tr><td>1 000 words</td><td>4.202</td><td>252.101</td><td>6.667</td><td>2.857</td></tr><tr><td>2 000 words</td><td>8.403</td><td>504.202</td><td>13.333</td><td>5.714</td></tr><tr><td>5 000 words</td><td>21.008</td><td>1 260.504</td><td>33.333</td><td>14.286</td></tr><tr><td>10 000 words</td><td>42.017</td><td>2 521.008</td><td>66.667</td><td>28.571</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set words in the text = 200, reading speed = 238: <strong>Reading time</strong> = 0.84 min, <strong>Reading time in seconds</strong> = 50.42 s, <strong>At 150 wpm</strong> = 1.333 min, <strong>At 350 wpm</strong> = 0.571 min. A two-hundred-word email is under a minute at an average pace.</li><li>Set words in the text = 10 000, reading speed = 238: <strong>Reading time</strong> = 42.017 min, <strong>Reading time in seconds</strong> = 2 521.008 s, <strong>At 150 wpm</strong> = 66.667 min, <strong>At 350 wpm</strong> = 28.571 min. Ten thousand words is forty-two minutes, or fifteen at a fast skim.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Word counts that include navigation.</strong> A copy-pasted web page carries its menus and captions, and they inflate the count.</li><li><strong>A speed that is really a skim.</strong> 600 wpm is possible, but not with retention. Use it only for triage.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>It models reading, not understanding.</strong> Dense technical prose takes longer per word than a novel.</li></li><li><li><strong>No pictures, no code blocks.</strong> Both slow a reader in ways a word count does not capture.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'What a minute of reading is worth', 'html' => <<<'TXT'
            <p>Reading time is a budgeting tool before it is a fact. If a page has to be read in four minutes and the draft runs to 1 200 words, the draft is 200 words too long at an average speed and 400 too long at a careful one. That is a concrete edit, not a vague instruction to tighten it.</p><p>The same arithmetic runs the other way for writing. A writer producing 500 words an hour needs two and a half hours for the draft this page describes, and that is before anyone reads it back.</p><p>One warning about the averages: they measure words, and words are not the same size. A page of short sentences reads faster than the count suggests; a page of long technical clauses reads slower. Treat the number as a floor for easy prose and a ceiling for hard prose.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need words in the text and reading speed. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Reading time and reading time in seconds and at 150 wpm and at 350 wpm should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Setting a length budget for an article.</li></li><li><li>Deciding whether a document fits in a coffee break.</li></li><li><li>Estimating a narration or voice-over.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/words-per-minute">Words per minute</a> <a href="/everyday-life/speaking-time">Speaking time</a> <a href="/everyday-life/audiobook-speed">Audiobook speed</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Words in the text</strong> ×10</td><td>4.202</td><td>42.017</td><td>ten times larger</td></tr><tr><td><strong>Reading speed</strong> ×10</td><td>4.202</td><td>0.42</td><td>ten times smaller</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Reading Time calculator work out?', 'a' => <<<'TXT'
            It returns reading time and reading time in seconds and at 150 wpm and at 350 wpm from words in the text and reading speed. The relationship is Words in the text ÷ Reading speed.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Words in the text (words), Reading speed (wpm). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: words in the text in words; reading speed in wpm. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Where does 238 words a minute come from?', 'a' => <<<'TXT'
            It is the widely cited average for adult silent reading of non-fiction in English. It is an average, not a target: technical text runs slower and light fiction faster.
            TXT],
            ['q' => 'Should I use this for speaking time?', 'a' => 'No. Speaking runs at roughly 130 to 150 words a minute, and the page\'s slow column is closer to a speaking pace than the average column is.'],
        ],
        'related' => [
            ['path' => '/everyday-life/words-per-minute', 'name' => 'Words per minute'],
            ['path' => '/everyday-life/speaking-time', 'name' => 'Speaking time'],
            ['path' => '/everyday-life/audiobook-speed', 'name' => 'Audiobook speed'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
