<?php

/**
 * Words per Minute Calculator
 * /everyday-life/words-per-minute
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Words per Minute Calculator',
    'meta' => ['title' => 'Words per Minute Calculator — Reading and Typing', 'description' => 'Divide the words you read by the minutes it took and the page returns your reading speed in words per minute, with the same figure in words per second.', 'h1' => 'Words per Minute Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'words',
                    'label' => 'Words read',
                    'type' => 'number',
                    'suffix' => 'words',
                    'default' => '1200',
                    'help' => 'Use the word count of the text, not a guess.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Minutes taken',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '5',
                    'help' => 'Time a whole section, not one paragraph.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wpm',
                    'label' => 'Reading speed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'wpm',
                ],
                [
                    'name' => 'wps',
                    'label' => 'Words per second',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'words/s',
                ],
                [
                    'name' => 'hourly',
                    'label' => 'Words in an hour',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'words/h',
                ],
            ],
        ],
    ],
    'formula' => ['wpm' => 'words / minutes', 'wps' => 'words / minutes / 60', 'hourly' => 'words / minutes * 60'],
    'article' => [
        'intro' => <<<'TXT'
        Words per minute is words divided by minutes. Time a page, type the count and the clock, and the page returns the speed you actually read at rather than the speed you assume you read at.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A measured speed is worth more than a claimed one. The published averages for adult readers sit between 200 and 250 words a minute for non-fiction, but the spread between people is wide and the spread within one person, across genres, is wider still.</p><p>The hourly line is the same number scaled up, and it is the one to use when you are planning how much reading fits into a journey.</p><p>The answer is <strong>reading speed and words per second and words in an hour</strong>, worked out from words read and minutes taken. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>wpm</strong></td><td><code>Words read ÷ Minutes taken</code></td></tr><tr><td><strong>wps</strong></td><td><code>Words read ÷ Minutes taken ÷ 60</code></td></tr><tr><td><strong>hourly</strong></td><td><code>Words read ÷ Minutes taken × 60</code></td></tr></tbody></table><p>Dividing by 60 twice would turn words per minute into words per hour; the page multiplies in the last line instead, because an hour holds sixty minutes.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports reading speed and words per second and words in an hour.</p><ul><li><strong>Words read</strong> — words. Use the word count of the text, not a guess.</li><li><strong>Minutes taken</strong> — min. Time a whole section, not one paragraph.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Reading speed</strong> — wpm.</li><li><strong>Words per second</strong> — words/s.</li><li><strong>Words in an hour</strong> — words/h.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put words read = 1 200 words, minutes taken = 5 min into the form and the panel reads:</p><ul><li><strong>Reading speed</strong> = <code>Words read ÷ Minutes taken</code> = <strong>240 wpm</strong></li><li><strong>Words per second</strong> = <code>Words read ÷ Minutes taken ÷ 60</code> = <strong>4 words/s</strong></li><li><strong>Words in an hour</strong> = <code>Words read ÷ Minutes taken × 60</code> = <strong>14 400 words/h</strong></li></ul><p>Time at least five minutes. A single paragraph is over before pacing settles, and the answer comes out either flattering or wrong.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>1 200 ÷ 5</code>, which comes to <strong>240 wpm</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Twelve hundred words in five minutes is 240 wpm, which is right on the published average for non-fiction. That means the test text was neither unusually dense nor unusually light.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Reading speed</th><th>Words per second</th><th>Words in an hour</th></tr></thead><tbody><tr><td><strong>Words read</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Minutes taken</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Words read</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Words read</strong> opens at 1 200 words — Use the word count of the text, not a guess.</li><li><strong>Minutes taken</strong> opens at 5 min — Time a whole section, not one paragraph.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Words read</th><th>Reading speed</th><th>Words per second</th><th>Words in an hour</th></tr></thead><tbody><tr><td>600 words</td><td>120</td><td>2</td><td>7 200</td></tr><tr><td>1 200 words</td><td>240</td><td>4</td><td>14 400</td></tr><tr><td>2 400 words</td><td>480</td><td>8</td><td>28 800</td></tr><tr><td>6 000 words</td><td>1 200</td><td>20</td><td>72 000</td></tr><tr><td>12 000 words</td><td>2 400</td><td>40</td><td>144 000</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set words read = 1 200, minutes taken = 5: <strong>Reading speed</strong> = 240 wpm, <strong>Words per second</strong> = 4 words/s, <strong>Words in an hour</strong> = 14 400 words/h. The default run: 240 wpm, four words a second, 14 400 words an hour.</li><li>Set words read = 3 000, minutes taken = 25: <strong>Reading speed</strong> = 120 wpm, <strong>Words per second</strong> = 2 words/s, <strong>Words in an hour</strong> = 7 200 words/h. A slower, denser text: 120 wpm, half the average.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Timing yourself with a phone in the other hand.</strong> The interruption lands inside the measurement.</li><li><strong>Reading something too easy.</strong> A children's book will return 400 wpm and tell you nothing about how fast you read a contract.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Speed is not comprehension.</strong> The page cannot tell whether you remembered any of it.</li></li><li><li><strong>One measurement is one sample.</strong> Repeat it on a different text before treating it as your speed.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Reading speed and speaking speed are different numbers', 'html' => <<<'TXT'
            <p>Speech runs at roughly 130 to 150 words a minute, and that ceiling is why podcasts are transcribed at about a third of the length of the words spoken. If you are preparing something to be read aloud, use the speaking figure, not the reading one, or it will run long by half.</p><p>Reading speed also varies with format. A printed page allows more regression than a phone screen, and a screen with a scrolling feed allows less attention than either. Measure on the format you care about, or the number will not transfer.</p><p>A final caution about self-tests: the first attempt is usually slower than the second, because the text is unfamiliar rather than because you sped up. Time a second, different passage and use the lower figure if the two disagree by more than a fifth.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need words read and minutes taken. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Reading speed and words per second and words in an hour should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Calibrating the reading-time figure you quote to other people.</li></li><li><li>Estimating how long a report will take.</li></li><li><li>Checking whether a speed-reading claim is real.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/reading-time">Reading time</a> <a href="/everyday-life/speaking-time">Speaking time</a> <a href="/everyday-life/audiobook-speed">Audiobook speed</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Words read</strong> ×10</td><td>240</td><td>2 400</td><td>ten times larger</td></tr><tr><td><strong>Minutes taken</strong> ×10</td><td>240</td><td>24</td><td>ten times smaller</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Words per Minute calculator work out?', 'a' => 'It returns reading speed and words per second and words in an hour from words read and minutes taken. The relationship is Words read ÷ Minutes taken.'],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Words read (words), Minutes taken (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: words read in words; minutes taken in min. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is a good reading speed?', 'a' => <<<'TXT'
            For non-fiction, 200 to 250 words a minute with good comprehension. Faster is possible, but at some point the comprehension figure falls and the speed stops meaning anything.
            TXT],
            ['q' => 'Does typing speed use the same formula?', 'a' => 'Yes. Typing tests count characters or words against time the same way. This page assumes reading, so keep the text comparable when you compare results.'],
        ],
        'related' => [
            ['path' => '/everyday-life/reading-time', 'name' => 'Reading time'],
            ['path' => '/everyday-life/speaking-time', 'name' => 'Speaking time'],
            ['path' => '/everyday-life/audiobook-speed', 'name' => 'Audiobook speed'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
