<?php

/**
 * Audiobook Speed Calculator
 * /everyday-life/audiobook-speed
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Audiobook Speed Calculator',
    'meta' => ['title' => 'Audiobook Speed — Hours at 1.25x, 1.5x and 2x', 'description' => 'A twelve-hour book is eight hours at 1.5x, not six, because the saved hours are the difference and not the quotient. The page that shows both numbers.', 'h1' => 'Audiobook Speed Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'hours',
                    'label' => 'Length at normal speed',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '12',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'speed',
                    'label' => 'Playback speed',
                    'type' => 'number',
                    'suffix' => 'x',
                    'default' => '1.5',
                    'help' => '1.25x is the setting most listeners settle on; 2x is a comprehension test.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours_day',
                    'label' => 'Listening a day',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '1',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fast',
                    'label' => 'Length at speed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'saved',
                    'label' => 'Hours saved',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'pct',
                    'label' => 'Time saved',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'days',
                    'label' => 'Days to finish',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
            ],
        ],
    ],
    'formula' => ['fast' => 'hours / speed', 'saved' => 'hours - hours / speed', 'pct' => '(1 - 1 / speed) * 100', 'days' => 'hours / speed / hours_day'],
    'article' => [
        'intro' => 'How long an audiobook takes at a playback speed, the hours it saves, and how many days it takes to finish at a fixed daily listening time.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Playback speed divides the time, and because it is a divisor the savings are not proportional: 1.5x turns twelve hours into eight and saves four, while 2x turns the same twelve into six and saves six.</p><p>At an hour a day, the 1.5x listener finishes in eight days and the 1x listener in twelve. Over a year of commuting that is the difference between about 45 books and 30, from exactly the same half hour in the car.</p><p>The answer is <strong>length at speed and hours saved and time saved and days to finish</strong>, worked out from length at normal speed and playback speed and listening a day. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>fast</strong></td><td><code>Length at normal speed ÷ Playback speed</code></td></tr><tr><td><strong>saved</strong></td><td><code>Length at normal speed - Length at normal speed ÷ Playback speed</code></td></tr><tr><td><strong>pct</strong></td><td><code>(1 - 1 ÷ Playback speed) × 100</code></td></tr><tr><td><strong>days</strong></td><td><code>Length at normal speed ÷ Playback speed ÷ Listening a day</code></td></tr></tbody></table><p>Length divided by speed gives the new duration, and the difference from the original is what was saved. The percentage is that difference over the original, which for any speed is one minus the reciprocal.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports length at speed and hours saved and time saved and days to finish.</p><ul><li><strong>Length at normal speed</strong> — h.</li><li><strong>Playback speed</strong> — x. 1.25x is the setting most listeners settle on; 2x is a comprehension test.</li><li><strong>Listening a day</strong> — h.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Length at speed</strong> — h.</li><li><strong>Hours saved</strong> — h.</li><li><strong>Time saved</strong> — %.</li><li><strong>Days to finish</strong> — days.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put length at normal speed = 12 h, playback speed = 1.5 x, listening a day = 1 h into the form and the panel reads:</p><ul><li><strong>Length at speed</strong> = <code>Length at normal speed ÷ Playback speed</code> = <strong>8 h</strong></li><li><strong>Hours saved</strong> = <code>Length at normal speed - Length at normal speed ÷ Playback speed</code> = <strong>4 h</strong></li><li><strong>Time saved</strong> = <code>(1 - 1 ÷ Playback speed) × 100</code> = <strong>33.333 %</strong></li><li><strong>Days to finish</strong> = <code>Length at normal speed ÷ Playback speed ÷ Listening a day</code> = <strong>8 days</strong></li></ul><p>At 2x the same book is six hours and the saving is half. What is not the same is how much of it survives: comprehension falls fastest above about 1.75x for most listeners.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>12 ÷ 1.5</code>, which comes to <strong>8 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A twelve-hour book at 1.5x takes eight hours and saves four — a third of the time. An hour a day finishes it in eight days.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Length at speed</th><th>Hours saved</th><th>Time saved</th><th>Days to finish</th></tr></thead><tbody><tr><td><strong>Length at normal speed</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Playback speed</strong> +10 %</td><td>−9.09 %</td><td>+18.18 %</td><td>+18.18 %</td><td>−9.09 %</td></tr><tr><td><strong>Listening a day</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Playback speed</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Length at normal speed</strong> opens at 12 h</li><li><strong>Playback speed</strong> opens at 1.5 x — 1.25x is the setting most listeners settle on; 2x is a comprehension test.</li><li><strong>Listening a day</strong> opens at 1 h</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Length at normal speed</th><th>Length at speed</th><th>Hours saved</th><th>Time saved</th><th>Days to finish</th></tr></thead><tbody><tr><td>6 h</td><td>4</td><td>2</td><td>33.333</td><td>4</td></tr><tr><td>12 h</td><td>8</td><td>4</td><td>33.333</td><td>8</td></tr><tr><td>24 h</td><td>16</td><td>8</td><td>33.333</td><td>16</td></tr><tr><td>60 h</td><td>40</td><td>20</td><td>33.333</td><td>40</td></tr><tr><td>120 h</td><td>80</td><td>40</td><td>33.333</td><td>80</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set length at normal speed = 12, playback speed = 2, listening a day = 1: <strong>Length at speed</strong> = 6 h, <strong>Hours saved</strong> = 6 h, <strong>Time saved</strong> = 50 %, <strong>Days to finish</strong> = 6 days. At 2x the book is six hours and six evenings, and the saving is the same six hours the new duration costs — a coincidence of this particular number.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Assuming the speed applies to everything.</strong> Some players adjust music and intro stings as well, and some titles are recorded slowly to begin with, so 1.5x on one is 1.2x on another.</li><li><strong>Counting the saved hours as free.</strong> They are only free if the listening time is fixed. A faster speed usually means you finish and start another book, not that you spend less time.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One speed throughout.</strong> Most people listen to fiction faster than to a technical book, and the honest figure is two runs of this page.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need length at normal speed and playback speed and listening a day. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Length at speed and hours saved and time saved and days to finish should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out whether a library loan will finish before it expires.</li></li><li><li>Deciding between 1.25x and 1.5x for a book you have to remember.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/audiobooks">Audiobooks in a year</a> <a href="/everyday-life/reading-speed">Reading speed</a> <a href="/everyday-life/podcasts">Podcast time</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Length at normal speed</strong> ×10</td><td>8</td><td>80</td><td>ten times larger</td></tr><tr><td><strong>Playback speed</strong> ×10</td><td>8</td><td>0.8</td><td>ten times smaller</td></tr><tr><td><strong>Listening a day</strong> ×10</td><td>8</td><td>8</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Audiobook Speed calculator work out?', 'a' => <<<'TXT'
            It returns length at speed and hours saved and time saved and days to finish from length at normal speed and playback speed and listening a day. The relationship is Length at normal speed ÷ Playback speed.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Length at normal speed (h), Playback speed (x), Listening a day (h). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: length at normal speed in h; playback speed in x; listening a day in h. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why is 1.5x not a third faster in listening effort?', 'a' => 'Because effort rises with speed. The time saved is a third, and the concentration needed is more, which is the trade most listeners make knowingly.'],
            ['q' => 'Does the narrator matter?', 'a' => 'A great deal. A slow narrator with pauses is a natural 1.5x; a fast one at 1.5x can be unintelligible, and the same setting is two different experiences.'],
            ['q' => 'Can I count an audiobook as reading?', 'a' => 'For plot, yes. For anything you intend to quote or use, no: the eye re-reads a sentence, the ear cannot.'],
        ],
        'related' => [
            ['path' => '/everyday-life/audiobooks', 'name' => 'Audiobooks in a year'],
            ['path' => '/everyday-life/reading-speed', 'name' => 'Reading speed'],
            ['path' => '/everyday-life/podcasts', 'name' => 'Podcast time'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
