<?php

/**
 * 0 to 60 Calculator
 * /everyday-life/0-60
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '0 to 60 Calculator',
    'meta' => ['title' => '0 to 60 — Average Acceleration, g Force and Distance', 'description' => 'A 0-60 time is an average acceleration: this page turns it into feet per second squared, g force, the distance the car covers doing it, and its power per pound.', 'h1' => '0 to 60 Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'seconds',
                    'label' => '0-60 time',
                    'type' => 'number',
                    'suffix' => 's',
                    'default' => '6.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'weight',
                    'label' => 'Kerb weight',
                    'type' => 'number',
                    'suffix' => 'lb',
                    'default' => '3300',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hp',
                    'label' => 'Power',
                    'type' => 'number',
                    'suffix' => 'hp',
                    'default' => '228',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'accel',
                    'label' => 'Average acceleration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft/s²',
                ],
                [
                    'name' => 'g',
                    'label' => 'In g',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'distance',
                    'label' => 'Distance covered',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'avg_mph',
                    'label' => 'Average speed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mph',
                ],
                [
                    'name' => 'hp_lb',
                    'label' => 'Power to weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'hp/lb',
                ],
            ],
        ],
    ],
    'formula' => [
        'accel' => '60 * 1.466667 / seconds',
        'g' => '60 * 1.466667 / seconds / 32.174',
        'distance' => '0.5 * (60 * 1.466667 / seconds) * seconds * seconds',
        'avg_mph' => '30',
        'hp_lb' => 'hp / weight',
    ],
    'article' => [
        'intro' => <<<'TXT'
        What a 0-60 time means in physics: average acceleration in feet per second squared and in g, the distance the car covers doing it, and the power-to-weight that usually explains it.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Sixty miles an hour is 88 feet a second exactly, and a car that reaches it in 6.5 seconds has averaged 13.5 feet per second squared — 0.42 g, which is a third of what the tyres can do in the dry.</p><p>That gap is the interesting part. A launch is limited by grip for the first second, then by power, and the average hides both. It is why two cars with the same quoted time feel different: one grips, the other pulls.</p><p>The answer is <strong>average acceleration and in g and distance covered and average speed and power to weight</strong>, worked out from 0-60 time and kerb weight and power. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>accel</strong></td><td><code>60 × 1.466667 ÷ 0-60 time</code></td></tr><tr><td><strong>g</strong></td><td><code>60 × 1.466667 ÷ 0-60 time ÷ 32.174</code></td></tr><tr><td><strong>distance</strong></td><td><code>0.5 × (60 × 1.466667 ÷ 0-60 time) × 0-60 time × 0-60 time</code></td></tr><tr><td><strong>avg_mph</strong></td><td><code>30</code></td></tr><tr><td><strong>hp_lb</strong></td><td><code>Power ÷ Kerb weight</code></td></tr></tbody></table><p>60 mph is 88 ft/s, so the average acceleration is 88 over the time. Distance under constant acceleration is half that rate times the square of the time, and dividing the acceleration by 32.17 gives g.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports average acceleration and in g and distance covered and average speed and power to weight.</p><ul><li><strong>0-60 time</strong> — s.</li><li><strong>Kerb weight</strong> — lb.</li><li><strong>Power</strong> — hp.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Average acceleration</strong> — ft/s².</li><li><strong>In g</strong> — g.</li><li><strong>Distance covered</strong> — ft.</li><li><strong>Average speed</strong> — mph.</li><li><strong>Power to weight</strong> — hp/lb.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put 0-60 time = 6.5 s, kerb weight = 3 300 lb, power = 228 hp into the form and the panel reads:</p><ul><li><strong>Average acceleration</strong> = <code>60 × 1.466667 ÷ 0-60 time</code> = <strong>13.538 ft/s²</strong></li><li><strong>In g</strong> = <code>60 × 1.466667 ÷ 0-60 time ÷ 32.174</code> = <strong>0.421 g</strong></li><li><strong>Distance covered</strong> = <code>0.5 × (60 × 1.466667 ÷ 0-60 time) × 0-60 time × 0-60 time</code> = <strong>286 ft</strong></li><li><strong>Average speed</strong> = <code>30</code> = <strong>30 mph</strong></li><li><strong>Power to weight</strong> = <code>Power ÷ Kerb weight</code> = <strong>0.069 hp/lb</strong></li></ul><p>A four-second car covers 176 feet and pulls 0.68 g average. The distance falls faster than the time, because it depends on the square of the time.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>60 × 1.466667 ÷ 6.5</code>, which comes to <strong>13.538 ft/s²</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>6.5 seconds to 60 is an average of 13.54 ft/s², 0.42 g, over 286 feet, at an average of 30 mph. 228 hp in a 3 300-pound car is 0.069 hp a pound.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Average acceleration</th><th>In g</th><th>Distance covered</th><th>Average speed</th><th>Power to weight</th></tr></thead><tbody><tr><td><strong>0-60 time</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Kerb weight</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td></tr><tr><td><strong>Power</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>0-60 time</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>0-60 time</strong> opens at 6.5 s</li><li><strong>Kerb weight</strong> opens at 3 300 lb</li><li><strong>Power</strong> opens at 228 hp</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>0-60 time</th><th>Average acceleration</th><th>In g</th><th>Distance covered</th><th>Average speed</th><th>Power to weight</th></tr></thead><tbody><tr><td>3.25 s</td><td>27.077</td><td>0.842</td><td>143</td><td>30</td><td>0.069</td></tr><tr><td>6.5 s</td><td>13.538</td><td>0.421</td><td>286</td><td>30</td><td>0.069</td></tr><tr><td>13 s</td><td>6.769</td><td>0.21</td><td>572</td><td>30</td><td>0.069</td></tr><tr><td>32.5 s</td><td>2.708</td><td>0.084</td><td>1 430</td><td>30</td><td>0.069</td></tr><tr><td>65 s</td><td>1.354</td><td>0.042</td><td>2 860.001</td><td>30</td><td>0.069</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set 0-60 time = 4, kerb weight = 3 300, power = 228: <strong>Average acceleration</strong> = 22 ft/s², <strong>In g</strong> = 0.684 g, <strong>Distance covered</strong> = 176 ft, <strong>Average speed</strong> = 30 mph, <strong>Power to weight</strong> = 0.069 hp/lb. Four seconds is 22 ft/s², 0.68 g and 176 feet — 110 feet less than the 6.5-second run for 2.5 seconds less time.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Reading the time as constant acceleration.</strong> A real run is not uniform: the first foot is a clutch and the last few miles an hour take longer than the middle of the range.</li><li><strong>Comparing times from different surfaces.</strong> A tenth of a second is inside the difference between a cold road and a warm one, so two runs are a comparison and one is an anecdote.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Straight line, no loss.</strong> Rolling resistance, wheelspin and gear changes are averaged into the figure rather than modelled.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need 0-60 time and kerb weight and power. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Average acceleration and in g and distance covered and average speed and power to weight should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Understand what a quoted acceleration figure means physically.</li></li><li><li>Correlating a 0-60 time with the power-to-weight of the car.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/horsepower">Horsepower</a> <a href="/everyday-life/gvwr">GVWR</a> <a href="/everyday-life/mpg">MPG calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>0-60 time</strong> ×10</td><td>13.538</td><td>1.354</td><td>ten times smaller</td></tr><tr><td><strong>Kerb weight</strong> ×10</td><td>13.538</td><td>13.538</td><td>unchanged</td></tr><tr><td><strong>Power</strong> ×10</td><td>13.538</td><td>13.538</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 0 to 60 calculator work out?', 'a' => <<<'TXT'
            It returns average acceleration and in g and distance covered and average speed and power to weight from 0-60 time and kerb weight and power. The relationship is 60 × 1.466667 ÷ 0-60 time.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => '0-60 time (s), Kerb weight (lb), Power (hp). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: 0-60 time in s; kerb weight in lb; power in hp. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why does distance depend on the square of the time?', 'a' => 'Because the car starts from rest. Distance grows with time squared under constant acceleration, so halving the time quarters the distance.'],
            ['q' => 'Is 0.42 g a lot?', 'a' => <<<'TXT'
            For an average over a full run, yes — a family car manages 0.3 to 0.4, a fast one 0.6. Tyres can do 1 g in the dry, which is why the launch is limited by grip for the first moment.
            TXT],
            ['q' => 'Does this account for the one-foot rollout?', 'a' => 'No. Drag strips measure from a rolling start of about a foot, which flatters a time by roughly two tenths. Manufacturer figures vary in whether they include it.'],
        ],
        'related' => [
            ['path' => '/everyday-life/horsepower', 'name' => 'Horsepower'],
            ['path' => '/everyday-life/gvwr', 'name' => 'GVWR'],
            ['path' => '/everyday-life/mpg', 'name' => 'MPG calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
