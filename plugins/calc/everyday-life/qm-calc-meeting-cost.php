<?php

/**
 * Meeting Cost Calculator
 * /everyday-life/meeting-cost
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Meeting Cost Calculator',
    'meta' => ['title' => 'Meeting Cost — People, Hours and the Real Bill', 'description' => 'Six people for ninety minutes at forty-five an hour is 405 dollars before anyone has decided anything. Add the preparation and see what the meeting costs.', 'h1' => 'Meeting Cost Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'people',
                    'label' => 'People in the meeting',
                    'type' => 'number',
                    'suffix' => 'people',
                    'default' => '6',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hourly',
                    'label' => 'Average hourly cost',
                    'type' => 'number',
                    'suffix' => '$/h',
                    'default' => '45',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hours',
                    'label' => 'Meeting length',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '1.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'prep_hours',
                    'label' => 'Preparation, all of it',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '0.5',
                    'help' => 'Everyone reading the deck, checking figures, writing the agenda. Half an hour apiece is four hundred pounds in a room of six.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'attendee_cost',
                    'label' => 'Wages in the room',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'prep_cost',
                    'label' => 'Preparation',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'total',
                    'label' => 'Total cost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'per_minute',
                    'label' => 'Cost per minute',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/min',
                ],
            ],
        ],
    ],
    'formula' => ['attendee_cost' => 'people * hourly * hours', 'prep_cost' => 'prep_hours * hourly', 'total' => 'people * hourly * hours + prep_hours * hourly', 'per_minute' => '(people * hourly * hours + prep_hours * hourly) / (hours * 60)'],
    'article' => [
        'intro' => 'What a meeting costs in wages once everybody in the room is counted, including the preparation time, and what that comes to a minute.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A meeting is the only purchase an organisation makes without a price on it. Six people for ninety minutes at 45 an hour is 405, and the half hour each of preparation is to the organiser's cost, another 22.50 — 427.50 before anybody has said anything useful.</p><p>Set against a decision, that is often cheap. Set against "we could have emailed it", it is 7.11 a minute, and the recurring weekly version is 22 230 a year.</p><p>The answer is <strong>wages in the room and preparation and total cost and cost per minute</strong>, worked out from people in the meeting and average hourly cost and meeting length and preparation, all of it. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>attendee_cost</strong></td><td><code>People in the meeting × Average hourly cost × Meeting length</code></td></tr><tr><td><strong>prep_cost</strong></td><td><code>Preparation, all of it × Average hourly cost</code></td></tr><tr><td><strong>total</strong></td><td><code>People in the meeting × Average hourly cost × Meeting length + Preparation, all of it × Average hourly cost</code></td></tr><tr><td><strong>per_minute</strong></td><td><code>(People in the meeting × Average hourly cost × Meeting length + Preparation, all of it × Average hourly cost) ÷ (Meeting length × 60)</code></td></tr></tbody></table><p>People times the hourly cost times the length gives the wages in the room. Preparation is the hours spent outside the room times one person's rate, and the total over the meeting's own minutes gives the per-minute figure.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports wages in the room and preparation and total cost and cost per minute.</p><ul><li><strong>People in the meeting</strong> — people.</li><li><strong>Average hourly cost</strong> — $/h.</li><li><strong>Meeting length</strong> — h.</li><li><strong>Preparation, all of it</strong> — h. Everyone reading the deck, checking figures, writing the agenda. Half an hour apiece is four hundred pounds in a room of six.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Wages in the room</strong> — $.</li><li><strong>Preparation</strong> — $.</li><li><strong>Total cost</strong> — $.</li><li><strong>Cost per minute</strong> — $/min.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put people in the meeting = 6 people, average hourly cost = 45 $/h, meeting length = 1.5 h, preparation, all of it = 0.5 h into the form and the panel reads:</p><ul><li><strong>Wages in the room</strong> = <code>People in the meeting × Average hourly cost × Meeting length</code> = <strong>405 $</strong></li><li><strong>Preparation</strong> = <code>Preparation, all of it × Average hourly cost</code> = <strong>22.5 $</strong></li><li><strong>Total cost</strong> = <code>People in the meeting × Average hourly cost × Meeting length + Preparation, all of it × Average hourly cost</code> = <strong>427.5 $</strong></li><li><strong>Cost per minute</strong> = <code>(People in the meeting × Average hourly cost × Meeting length + Preparation, all of it × Average hourly cost) ÷ (Meeting length × 60)</code> = <strong>4.75 $/min</strong></li></ul><p>The weekly hour with eight people is 360 a session and 18 720 a year, which is a salary for a job nobody has been hired to do.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>6 × 45 × 1.5</code>, which comes to <strong>405 $</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Six people, ninety minutes, 45 an hour: 405 in the room, 22.50 of preparation, 427.50 in total, or 7.11 a minute.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Wages in the room</th><th>Preparation</th><th>Total cost</th><th>Cost per minute</th></tr></thead><tbody><tr><td><strong>People in the meeting</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+9.47 %</td><td>+9.47 %</td></tr><tr><td><strong>Average hourly cost</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Meeting length</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+9.47 %</td><td>−0.48 %</td></tr><tr><td><strong>Preparation, all of it</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0.53 %</td><td>+0.53 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Average hourly cost</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>People in the meeting</strong> opens at 6 people</li><li><strong>Average hourly cost</strong> opens at 45 $/h</li><li><strong>Meeting length</strong> opens at 1.5 h</li><li><strong>Preparation, all of it</strong> opens at 0.5 h — Everyone reading the deck, checking figures, writing the agenda. Half an hour apiece is four hundred pounds in a room of six.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>People in the meeting</th><th>Wages in the room</th><th>Preparation</th><th>Total cost</th><th>Cost per minute</th></tr></thead><tbody><tr><td>3 people</td><td>202.5</td><td>22.5</td><td>225</td><td>2.5</td></tr><tr><td>6 people</td><td>405</td><td>22.5</td><td>427.5</td><td>4.75</td></tr><tr><td>12 people</td><td>810</td><td>22.5</td><td>832.5</td><td>9.25</td></tr><tr><td>30 people</td><td>2 025</td><td>22.5</td><td>2 047.5</td><td>22.75</td></tr><tr><td>60 people</td><td>4 050</td><td>22.5</td><td>4 072.5</td><td>45.25</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set people in the meeting = 8, average hourly cost = 45, meeting length = 1, preparation, all of it = 1: <strong>Wages in the room</strong> = 360 $, <strong>Preparation</strong> = 45 $, <strong>Total cost</strong> = 405 $, <strong>Cost per minute</strong> = 6.75 $/min. Eight people for one hour is 360 plus 45 of preparation: 405 a week, 21 060 over a year of 52 meetings.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting only the organiser's time.</strong> The cost is everybody's time, including the four people who are listening and the one who is answering email.</li><li><strong>Forgetting the preparation.</strong> An hour of meeting usually carries twenty to forty minutes of somebody's reading. It is the same money and it is invisible because it happens on the Thursday before.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Wages only.</strong> Rooms, travel and the opportunity cost of what those six people would otherwise have made are not in the figure.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need people in the meeting and average hourly cost and meeting length and preparation, all of it. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Wages in the room and preparation and total cost and cost per minute should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding whether a recurring meeting earns its place.</li></li><li><li>Making the cost of a short meeting visible before calling one.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/cost-per-minute">Cost per minute</a> <a href="/everyday-life/30-min">30-minute blocks</a> <a href="/everyday-life/every-second">Every second</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>People in the meeting</strong> ×10</td><td>405</td><td>4 050</td><td>ten times larger</td></tr><tr><td><strong>Average hourly cost</strong> ×10</td><td>405</td><td>4 050</td><td>ten times larger</td></tr><tr><td><strong>Meeting length</strong> ×10</td><td>405</td><td>4 050</td><td>ten times larger</td></tr><tr><td><strong>Preparation, all of it</strong> ×10</td><td>405</td><td>405</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Meeting Cost calculator work out?', 'a' => <<<'TXT'
            It returns wages in the room and preparation and total cost and cost per minute from people in the meeting and average hourly cost and meeting length and preparation, all of it. The relationship is People in the meeting × Average hourly cost × Meeting length.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'People in the meeting (people), Average hourly cost ($/h), Meeting length (h), Preparation, all of it (h). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: people in the meeting in people; average hourly cost in $/h; meeting length in h; preparation, all of it in h. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Should I use salary or the fully loaded cost?', 'a' => <<<'TXT'
            The fully loaded cost — salary plus employer taxes, benefits and overhead — is usually 1.3 to 1.5 times the salary. Using the salary understates the meeting by a third.
            TXT],
            ['q' => 'Is a meeting ever too expensive to hold?', 'a' => 'Yes, and the test is not the number but whether the decision is worth more. What the number does is make the comparison possible.'],
            ['q' => 'Why include preparation if nobody is paid for it separately?', 'a' => 'Because the same salary pays for it. The hours exist whether or not they appear in a calendar.'],
        ],
        'related' => [
            ['path' => '/everyday-life/cost-per-minute', 'name' => 'Cost per minute'],
            ['path' => '/everyday-life/30-min', 'name' => '30-minute blocks'],
            ['path' => '/everyday-life/every-second', 'name' => 'Every second'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
