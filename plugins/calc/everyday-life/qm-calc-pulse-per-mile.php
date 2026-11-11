<?php

/**
 * Steps per Mile Calculator
 * /everyday-life/pulse-per-mile
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Steps per Mile Calculator',
    'meta' => ['title' => 'Steps per Mile — Stride Length, Cadence and Time', 'description' => 'Stride length decides steps per mile: 2.5 feet is 2 112 steps, and walking at 3 mph turns that into 105 steps a minute. See the formula and an example.', 'h1' => 'Steps per Mile Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'stride',
                    'label' => 'Stride length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '2.5',
                    'help' => 'Stride is heel to heel on the same foot, so it is two steps. A step is half a stride — here the field is the length of one step, heel to heel.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'speed',
                    'label' => 'Walking speed',
                    'type' => 'number',
                    'suffix' => 'mph',
                    'default' => '3',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Minutes walked',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'steps_mile',
                    'label' => 'Steps a mile',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'steps',
                ],
                [
                    'name' => 'minutes_mile',
                    'label' => 'Minutes a mile',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
                [
                    'name' => 'cadence',
                    'label' => 'Steps a minute',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'steps/min',
                ],
                [
                    'name' => 'steps_session',
                    'label' => 'Steps in your walk',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'steps',
                ],
            ],
        ],
    ],
    'formula' => ['steps_mile' => '5280 / stride', 'minutes_mile' => '60 / speed', 'cadence' => '5280 / stride * speed / 60', 'steps_session' => '5280 / stride * speed / 60 * minutes'],
    'article' => [
        'intro' => 'The steps a mile takes at a given stride, the minutes the mile takes at a given speed, and the cadence that comes out of the two.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A mile is 5 280 feet, so the steps in it are a division: 2 112 at a 2.5-foot step, 1 760 at three feet. Most pedometers assume 2 000 and most people are within a quarter of that.</p><p>Cadence is the step length and the speed together: 2.5 feet at 3 mph is 105 steps a minute, which is a brisk walk, and a 30-minute walk is 3 168 steps. That is the number a 10 000-step goal is asking for a third of.</p><p>The answer is <strong>steps a mile and minutes a mile and steps a minute and steps in your walk</strong>, worked out from stride length and walking speed and minutes walked. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>steps_mile</strong></td><td><code>5280 ÷ Stride length</code></td></tr><tr><td><strong>minutes_mile</strong></td><td><code>60 ÷ Walking speed</code></td></tr><tr><td><strong>cadence</strong></td><td><code>5280 ÷ Stride length × Walking speed ÷ 60</code></td></tr><tr><td><strong>steps_session</strong></td><td><code>5280 ÷ Stride length × Walking speed ÷ 60 × Minutes walked</code></td></tr></tbody></table><p>5 280 feet over the step length gives steps a mile. Speed into minutes a mile is sixty over the speed, and cadence is the steps a mile times the speed over sixty, which is steps a minute.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports steps a mile and minutes a mile and steps a minute and steps in your walk.</p><ul><li><strong>Stride length</strong> — ft. Stride is heel to heel on the same foot, so it is two steps. A step is half a stride — here the field is the length of one step, heel to heel.</li><li><strong>Walking speed</strong> — mph.</li><li><strong>Minutes walked</strong> — min.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Steps a mile</strong> — steps.</li><li><strong>Minutes a mile</strong> — min.</li><li><strong>Steps a minute</strong> — steps/min.</li><li><strong>Steps in your walk</strong> — steps.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put stride length = 2.5 ft, walking speed = 3 mph, minutes walked = 30 min into the form and the panel reads:</p><ul><li><strong>Steps a mile</strong> = <code>5280 ÷ Stride length</code> = <strong>2 112 steps</strong></li><li><strong>Minutes a mile</strong> = <code>60 ÷ Walking speed</code> = <strong>20 min</strong></li><li><strong>Steps a minute</strong> = <code>5280 ÷ Stride length × Walking speed ÷ 60</code> = <strong>105.6 steps/min</strong></li><li><strong>Steps in your walk</strong> = <code>5280 ÷ Stride length × Walking speed ÷ 60 × Minutes walked</code> = <strong>3 168 steps</strong></li></ul><p>A 3-foot step is 1 760 steps a mile, so the same half hour at the same speed is 600 fewer steps — stride length changes the count without changing the distance.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>5280 ÷ 2.5</code>, which comes to <strong>2 112 steps</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A 2.5-foot step is 2 112 steps a mile. At 3 mph a mile takes 20 minutes and the cadence is 105.6 a minute, so half an hour of walking is 3 168 steps.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Steps a mile</th><th>Minutes a mile</th><th>Steps a minute</th><th>Steps in your walk</th></tr></thead><tbody><tr><td><strong>Stride length</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Walking speed</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Minutes walked</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Walking speed</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Stride length</strong> opens at 2.5 ft — Stride is heel to heel on the same foot, so it is two steps. A step is half a stride — here the field is the length of one step, heel to heel.</li><li><strong>Walking speed</strong> opens at 3 mph</li><li><strong>Minutes walked</strong> opens at 30 min</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Stride length</th><th>Steps a mile</th><th>Minutes a mile</th><th>Steps a minute</th><th>Steps in your walk</th></tr></thead><tbody><tr><td>1.25 ft</td><td>4 224</td><td>20</td><td>211.2</td><td>6 336</td></tr><tr><td>2.5 ft</td><td>2 112</td><td>20</td><td>105.6</td><td>3 168</td></tr><tr><td>5 ft</td><td>1 056</td><td>20</td><td>52.8</td><td>1 584</td></tr><tr><td>12.5 ft</td><td>422.4</td><td>20</td><td>21.12</td><td>633.6</td></tr><tr><td>25 ft</td><td>211.2</td><td>20</td><td>10.56</td><td>316.8</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set stride length = 3, walking speed = 3, minutes walked = 30: <strong>Steps a mile</strong> = 1 760 steps, <strong>Minutes a mile</strong> = 20 min, <strong>Steps a minute</strong> = 88 steps/min, <strong>Steps in your walk</strong> = 2 640 steps. A 3-foot step is 1 760 a mile and a cadence of 88 a minute, so half an hour is 2 640 steps rather than 3 168.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Confusing step with stride.</strong> A stride is two steps. Using a stride length in a step formula halves the count and doubles the apparent distance.</li><li><strong>Trusting a pedometer's fixed default.</strong> They assume a step length unless told otherwise. Walking a known mile once gives the real number.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Flat ground.</strong> Uphill steps are shorter and downhill longer, so a hilly mile has more steps than a flat one at the same distance.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need stride length and walking speed and minutes walked. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Steps a mile and minutes a mile and steps a minute and steps in your walk should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Calibrating a pedometer or a phone.</li></li><li><li>Working out whether a step goal is realistic for your stride.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/30-min">30-minute blocks</a> <a href="/everyday-life/miles-to-hours">Miles to hours</a> <a href="/everyday-life/bed-size">Bed size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Stride length</strong> ×10</td><td>2 112</td><td>211.2</td><td>ten times smaller</td></tr><tr><td><strong>Walking speed</strong> ×10</td><td>2 112</td><td>2 112</td><td>unchanged</td></tr><tr><td><strong>Minutes walked</strong> ×10</td><td>2 112</td><td>2 112</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Steps per Mile calculator work out?', 'a' => <<<'TXT'
            It returns steps a mile and minutes a mile and steps a minute and steps in your walk from stride length and walking speed and minutes walked. The relationship is 5280 ÷ Stride length.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Stride length (ft), Walking speed (mph), Minutes walked (min). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: stride length in ft; walking speed in mph; minutes walked in min. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many steps are in a mile?', 'a' => 'About 2 000 for an average adult, and between 1 760 and 2 400 across the normal range of stride length. Two thousand is a good default and a poor measurement.'],
            ['q' => 'What is a good walking cadence?', 'a' => '100 to 120 steps a minute is brisk. Below 80 is a stroll, and above 130 is race walking or a jog.'],
            ['q' => 'Does pace change the step count?', 'a' => 'For the same distance, barely: you take the same number of steps faster. Cadence rises with speed and step length changes less than people think.'],
        ],
        'related' => [
            ['path' => '/everyday-life/30-min', 'name' => '30-minute blocks'],
            ['path' => '/everyday-life/miles-to-hours', 'name' => 'Miles to hours'],
            ['path' => '/everyday-life/bed-size', 'name' => 'Bed size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
