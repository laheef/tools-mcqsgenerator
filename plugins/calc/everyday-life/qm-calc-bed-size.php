<?php

/**
 * Bed Size Calculator
 * /everyday-life/bed-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bed Size Calculator',
    'meta' => ['title' => 'Bed Size — Area, Length over Height and Space per', 'description' => 'A mattress in inches and in square feet, with the length left over for your height and the width each sleeper gets when two share it. The formula is shown.', 'h1' => 'Bed Size Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'width',
                    'label' => 'Mattress width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '60',
                    'help' => 'Queen is 60 by 80, king 76 by 80, double 54 by 75 and single 38 by 75.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Mattress length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '80',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Sleeper height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '70',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sleepers',
                    'label' => 'People in the bed',
                    'type' => 'number',
                    'suffix' => 'people',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area_sqft',
                    'label' => 'Mattress area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq ft',
                ],
                [
                    'name' => 'area_m2',
                    'label' => 'Mattress area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²',
                ],
                [
                    'name' => 'extra',
                    'label' => 'Length beyond your height',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'per_sleeper',
                    'label' => 'Width each',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
            ],
        ],
    ],
    'formula' => ['area_sqft' => 'width * length / 144', 'area_m2' => 'width * length * 0.00064516', 'extra' => 'length - height', 'per_sleeper' => 'width / sleepers'],
    'article' => [
        'intro' => 'The area of a mattress in square feet, how much longer it is than the person sleeping in it, and the width each person gets when two share.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A bed is sold by name and measured in inches, and the two names that sound alike are nine inches apart in width. A double is 54 by 75; a queen is 60 by 80 and about a fifth more area.</p><p>The figures that matter are the ones nobody quotes. Six inches of length beyond your height is the minimum and ten is comfortable; twenty-seven inches each is the width two adults get in a double, which is less than a cot.</p><p>The answer is <strong>mattress area and mattress area and length beyond your height and width each</strong>, worked out from mattress width and mattress length and sleeper height and people in the bed. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>area_sqft</strong></td><td><code>Mattress width × Mattress length ÷ 144</code></td></tr><tr><td><strong>area_m2</strong></td><td><code>Mattress width × Mattress length × 0.00064516</code></td></tr><tr><td><strong>extra</strong></td><td><code>Mattress length - Sleeper height</code></td></tr><tr><td><strong>per_sleeper</strong></td><td><code>Mattress width ÷ People in the bed</code></td></tr></tbody></table><p>Width times length gives square inches, divided by 144 for square feet and converted to square metres at 0.00064516. The length left over is a subtraction and the width per person is a division.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports mattress area and mattress area and length beyond your height and width each.</p><ul><li><strong>Mattress width</strong> — in. Queen is 60 by 80, king 76 by 80, double 54 by 75 and single 38 by 75.</li><li><strong>Mattress length</strong> — in.</li><li><strong>Sleeper height</strong> — in.</li><li><strong>People in the bed</strong> — people.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Mattress area</strong> — sq ft.</li><li><strong>Mattress area</strong> — m².</li><li><strong>Length beyond your height</strong> — in.</li><li><strong>Width each</strong> — in.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put mattress width = 60 in, mattress length = 80 in, sleeper height = 70 in, people in the bed = 2 people into the form and the panel reads:</p><ul><li><strong>Mattress area</strong> = <code>Mattress width × Mattress length ÷ 144</code> = <strong>33.333 sq ft</strong></li><li><strong>Mattress area</strong> = <code>Mattress width × Mattress length × 0.00064516</code> = <strong>3.097 m²</strong></li><li><strong>Length beyond your height</strong> = <code>Mattress length - Sleeper height</code> = <strong>10 in</strong></li><li><strong>Width each</strong> = <code>Mattress width ÷ People in the bed</code> = <strong>30 in</strong></li></ul><p>A double leaves 27 inches each for two people and only 75 inches of length, which is six inches less than the standard queen — the reason tall couples skip it.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>60 × 80 ÷ 144</code>, which comes to <strong>33.333 sq ft</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A queen is 60 by 80, which is 33.3 square feet or 3.1 square metres. It leaves 10 inches beyond a 70-inch sleeper and 30 inches each for two.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Mattress area</th><th>Mattress area</th><th>Length beyond your height</th><th>Width each</th></tr></thead><tbody><tr><td><strong>Mattress width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Mattress length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+80 %</td><td>+0 %</td></tr><tr><td><strong>Sleeper height</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−70 %</td><td>+0 %</td></tr><tr><td><strong>People in the bed</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Mattress length</strong>. <strong>People in the bed</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Mattress width</strong> opens at 60 in — Queen is 60 by 80, king 76 by 80, double 54 by 75 and single 38 by 75.</li><li><strong>Mattress length</strong> opens at 80 in</li><li><strong>Sleeper height</strong> opens at 70 in</li><li><strong>People in the bed</strong> opens at 2 people</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Mattress width</th><th>Mattress area</th><th>Mattress area</th><th>Length beyond your height</th><th>Width each</th></tr></thead><tbody><tr><td>30 in</td><td>16.667</td><td>1.548</td><td>10</td><td>15</td></tr><tr><td>60 in</td><td>33.333</td><td>3.097</td><td>10</td><td>30</td></tr><tr><td>120 in</td><td>66.667</td><td>6.194</td><td>10</td><td>60</td></tr><tr><td>300 in</td><td>166.667</td><td>15.484</td><td>10</td><td>150</td></tr><tr><td>600 in</td><td>333.333</td><td>30.968</td><td>10</td><td>300</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set mattress width = 54, mattress length = 75, sleeper height = 70, people in the bed = 2: <strong>Mattress area</strong> = 28.125 sq ft, <strong>Mattress area</strong> = 2.613 m², <strong>Length beyond your height</strong> = 5 in, <strong>Width each</strong> = 27 in. A double is 28.1 square feet, leaves 5 inches for a 70-inch sleeper and gives 27 inches each — a squeeze by any standard.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Buying bedding for the wrong name.</strong> A queen sheet on a double is six inches too wide in both directions. The inches are on the label and the name is what people remember.</li><li><strong>Ignoring the frame.</strong> A bed frame adds two to four inches to the footprint in each direction, which matters in a small room.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Mattress only.</strong> Headboards, bedside tables and the space to walk round the bed are a room-planning question this page does not answer.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need mattress width and mattress length and sleeper height and people in the bed. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Mattress area and mattress area and length beyond your height and width each should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Deciding between a double and a queen in a small bedroom.</li></li><li><li>Checking whether a tall sleeper fits a standard length.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/sofa-size">Sofa size</a> <a href="/everyday-life/rug-size">Rug size</a> <a href="/everyday-life/quilt">Quilt size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mattress width</strong> ×10</td><td>33.333</td><td>333.333</td><td>ten times larger</td></tr><tr><td><strong>Mattress length</strong> ×10</td><td>33.333</td><td>333.333</td><td>ten times larger</td></tr><tr><td><strong>Sleeper height</strong> ×10</td><td>33.333</td><td>33.333</td><td>unchanged</td></tr><tr><td><strong>People in the bed</strong> ×10</td><td>33.333</td><td>33.333</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bed Size calculator work out?', 'a' => <<<'TXT'
            It returns mattress area and mattress area and length beyond your height and width each from mattress width and mattress length and sleeper height and people in the bed. The relationship is Mattress width × Mattress length ÷ 144.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Mattress width (in), Mattress length (in), Sleeper height (in), People in the bed (people). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: mattress width in in; mattress length in in; sleeper height in in; people in the bed in people. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What size is a queen bed?', 'a' => '60 by 80 inches, or 152 by 203 centimetres, which is 33.3 square feet. A king in the US is 76 by 80; a UK king is 60 by 78.'],
            ['q' => 'How much length does a tall person need?', 'a' => 'Six inches beyond their height at minimum, and ten is comfortable. A 75-inch mattress is short for anyone over 6 foot 2.'],
            ['q' => 'Is a double big enough for two?', 'a' => '27 inches of width each is narrower than a single bed\'s 38. It is a bed for one person and a guest, not for two adults every night.'],
        ],
        'related' => [
            ['path' => '/everyday-life/sofa-size', 'name' => 'Sofa size'],
            ['path' => '/everyday-life/rug-size', 'name' => 'Rug size'],
            ['path' => '/everyday-life/quilt', 'name' => 'Quilt size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
