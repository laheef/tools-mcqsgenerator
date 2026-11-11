<?php

/**
 * Expiration Date Calculator
 * /everyday-life/expiration-date
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Expiration Date Calculator',
    'meta' => ['title' => 'Expiration Date — Days Left Once It\'s Opened', 'description' => 'A twenty-one-day shelf life opened on the fourth is good until the twenty-fifth: the days remaining, the share already used, and the date it actually runs out.', 'h1' => 'Expiration Date Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'shelf_days',
                    'label' => 'Shelf life once opened',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '21',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'opened',
                    'label' => 'Opened on',
                    'type' => 'number',
                    'suffix' => 'day',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'today',
                    'label' => 'Today',
                    'type' => 'number',
                    'suffix' => 'day',
                    'default' => '15',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'remaining',
                    'label' => 'Days left',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'used',
                    'label' => 'Days used',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'used_pct',
                    'label' => 'Shelf life used',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'expires',
                    'label' => 'Expires on',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'day',
                ],
            ],
        ],
    ],
    'formula' => ['remaining' => 'shelf_days - (today - opened)', 'used' => 'today - opened', 'used_pct' => '(today - opened) / shelf_days * 100', 'expires' => 'opened + shelf_days'],
    'article' => [
        'intro' => 'How many days a product has left once it is opened, the share of its shelf life used, and the day number it expires on.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Most dates on a packet are about the unopened product. Once it is open the clock restarts and runs faster: a twenty-one-day life opened on the fourth is good to the twenty-fifth, whether or not the packet's printed date is later.</p><p>On the fifteenth it has ten days left and eleven used, which is 52 per cent. That percentage is the number to look at when deciding whether to buy the large tub or the small one.</p><p>The answer is <strong>days left and days used and shelf life used and expires on</strong>, worked out from shelf life once opened and opened on and today. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>remaining</strong></td><td><code>Shelf life once opened - (Today - Opened on)</code></td></tr><tr><td><strong>used</strong></td><td><code>Today - Opened on</code></td></tr><tr><td><strong>used_pct</strong></td><td><code>(Today - Opened on) ÷ Shelf life once opened × 100</code></td></tr><tr><td><strong>expires</strong></td><td><code>Opened on + Shelf life once opened</code></td></tr></tbody></table><p>Days since opening is today minus the day it was opened. The shelf life less that is what is left, the ratio is the share used, and the expiry day is the opening day plus the shelf life.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports days left and days used and shelf life used and expires on.</p><ul><li><strong>Shelf life once opened</strong> — days.</li><li><strong>Opened on</strong> — day.</li><li><strong>Today</strong> — day.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Days left</strong> — days.</li><li><strong>Days used</strong> — days.</li><li><strong>Shelf life used</strong> — %.</li><li><strong>Expires on</strong> — day.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put shelf life once opened = 21 days, opened on = 4 day, today = 15 day into the form and the panel reads:</p><ul><li><strong>Days left</strong> = <code>Shelf life once opened - (Today - Opened on)</code> = <strong>10 days</strong></li><li><strong>Days used</strong> = <code>Today - Opened on</code> = <strong>11 days</strong></li><li><strong>Shelf life used</strong> = <code>(Today - Opened on) ÷ Shelf life once opened × 100</code> = <strong>52.381 %</strong></li><li><strong>Expires on</strong> = <code>Opened on + Shelf life once opened</code> = <strong>25 day</strong></li></ul><p>Opened on the tenth, the same product has sixteen days left on the fifteenth rather than ten — five days of difference from where the clock started.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>21 - (15 - 4)</code>, which comes to <strong>10 days</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A twenty-one-day life opened on the fourth expires on the twenty-fifth. On the fifteenth eleven days are used and ten remain, 52.4 per cent of the life.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Days left</th><th>Days used</th><th>Shelf life used</th><th>Expires on</th></tr></thead><tbody><tr><td><strong>Shelf life once opened</strong> +10 %</td><td>+21 %</td><td>+0 %</td><td>−9.09 %</td><td>+8.4 %</td></tr><tr><td><strong>Opened on</strong> +10 %</td><td>+4 %</td><td>−3.64 %</td><td>−3.64 %</td><td>+1.6 %</td></tr><tr><td><strong>Today</strong> +10 %</td><td>−15 %</td><td>+13.64 %</td><td>+13.64 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Shelf life once opened</strong>. <strong>Opened on</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Shelf life once opened</strong> opens at 21 days</li><li><strong>Opened on</strong> opens at 4 day</li><li><strong>Today</strong> opens at 15 day</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Shelf life once opened</th><th>Days left</th><th>Days used</th><th>Shelf life used</th><th>Expires on</th></tr></thead><tbody><tr><td>10.5 days</td><td>-0.5</td><td>11</td><td>104.762</td><td>14.5</td></tr><tr><td>21 days</td><td>10</td><td>11</td><td>52.381</td><td>25</td></tr><tr><td>42 days</td><td>31</td><td>11</td><td>26.19</td><td>46</td></tr><tr><td>105 days</td><td>94</td><td>11</td><td>10.476</td><td>109</td></tr><tr><td>210 days</td><td>199</td><td>11</td><td>5.238</td><td>214</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set shelf life once opened = 21, opened on = 10, today = 15: <strong>Days left</strong> = 16 days, <strong>Days used</strong> = 5 days, <strong>Shelf life used</strong> = 23.81 %, <strong>Expires on</strong> = 31 day. Opened on the tenth, the same product has sixteen days left on the fifteenth — 24 per cent used rather than 52.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the printed date after opening.</strong> The unopened date assumes a seal. Once the seal is broken the shorter life applies and the packet does not say so twice.</li><li><strong>Judging by smell alone.</strong> Some things — dairy, cooked rice, mayonnaise — are not reliably detectable. The count is the safer test.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>A stated shelf life.</strong> Storage temperature changes it: a fridge at eight degrees instead of four can halve the life of an opened product.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need shelf life once opened and opened on and today. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Days left and days used and shelf life used and expires on should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking leftovers against the label rather than the instinct.</li></li><li><li>Deciding between two tub sizes in a shop.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/lead-time">Lead time</a> <a href="/everyday-life/deadline">Deadline</a> <a href="/everyday-life/grocery">Grocery budget</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Shelf life once opened</strong> ×10</td><td>10</td><td>199</td><td>×19.9</td></tr><tr><td><strong>Opened on</strong> ×10</td><td>10</td><td>46</td><td>×4.6</td></tr><tr><td><strong>Today</strong> ×10</td><td>10</td><td>-125</td><td>×-12.5</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Expiration Date calculator work out?', 'a' => <<<'TXT'
            It returns days left and days used and shelf life used and expires on from shelf life once opened and opened on and today. The relationship is Shelf life once opened - (Today - Opened on).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Shelf life once opened (days), Opened on (day), Today (day). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: shelf life once opened in days; opened on in day; today in day. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How long is food good after opening?', 'a' => <<<'TXT'
            Three to five days for cooked food, a week for an opened jar in the fridge, and the label's own figure for anything with one. The printed date is for the sealed pack.
            TXT],
            ['q' => 'Does the fridge temperature matter?', 'a' => 'More than the date does. Above five degrees, bacterial growth roughly doubles for every few degrees, and a warm fridge turns a week into three days.'],
            ['q' => 'Should I count the day it was opened?', 'a' => 'No. The day of opening is day zero and the count starts the next day, which is what the subtraction here does.'],
        ],
        'related' => [
            ['path' => '/everyday-life/lead-time', 'name' => 'Lead time'],
            ['path' => '/everyday-life/deadline', 'name' => 'Deadline'],
            ['path' => '/everyday-life/grocery', 'name' => 'Grocery budget'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
