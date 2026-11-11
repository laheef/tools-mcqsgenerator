<?php

/**
 * Hair Growth Calculator
 * /everyday-life/hair-growth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hair Growth Calculator',
    'meta' => ['title' => 'Hair Growth Calculator — Length per Month — Free Tool', 'description' => 'How much hair grows in a given number of months at a chosen rate, in centimetres and inches, with the length you would reach from a starting haircut. Formula.', 'h1' => 'Hair Growth Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'rate',
                    'label' => 'Growth per month',
                    'type' => 'number',
                    'suffix' => 'cm/month',
                    'default' => '1.25',
                    'help' => '1.25 cm is the usual adult average; 1.0 is conservative.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'months',
                    'label' => 'Months',
                    'type' => 'number',
                    'suffix' => 'months',
                    'default' => '12',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'current',
                    'label' => 'Current length',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '5',
                    'help' => 'The length you are starting from.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'grown',
                    'label' => 'Length gained',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
                [
                    'name' => 'inches',
                    'label' => 'Length gained',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'total',
                    'label' => 'Total length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
                [
                    'name' => 'per_year',
                    'label' => 'Growth per year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
            ],
        ],
    ],
    'formula' => ['grown' => 'rate * months', 'inches' => 'rate * months / 2.54', 'total' => 'current + rate * months', 'per_year' => 'rate * 12'],
    'article' => [
        'intro' => <<<'TXT'
        Hair grows at about a centimetre a month, more in summer and less with age. The page multiplies a chosen rate by a number of months and returns the length gained and the length you would end up with.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Hair grows about 1.25 cm a month, which is 15 cm a year, or six inches. That single fact settles most arguments about how long a style will take to grow out.</p><p>The rate is a box rather than a constant because it varies: children grow faster, older scalps slower, and summer is slightly quicker than winter.</p><p>The answer is <strong>length gained and length gained and total length and growth per year</strong>, worked out from growth per month and months and current length. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>grown</strong></td><td><code>Growth per month × Months</code></td></tr><tr><td><strong>inches</strong></td><td><code>Growth per month × Months ÷ 2.54</code></td></tr><tr><td><strong>total</strong></td><td><code>Current length + Growth per month × Months</code></td></tr><tr><td><strong>per_year</strong></td><td><code>Growth per month × 12</code></td></tr></tbody></table><p>The inch conversion is the exact one: 2.54 cm to the inch. The yearly line multiplies the monthly rate by twelve and makes no allowance for the extra days in a leap year.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports length gained and length gained and total length and growth per year.</p><ul><li><strong>Growth per month</strong> — cm/month. 1.25 cm is the usual adult average; 1.0 is conservative.</li><li><strong>Months</strong> — months.</li><li><strong>Current length</strong> — cm. The length you are starting from.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Length gained</strong> — cm.</li><li><strong>Length gained</strong> — in.</li><li><strong>Total length</strong> — cm.</li><li><strong>Growth per year</strong> — cm.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put growth per month = 1.25 cm/month, months = 12 months, current length = 5 cm into the form and the panel reads:</p><ul><li><strong>Length gained</strong> = <code>Growth per month × Months</code> = <strong>15 cm</strong></li><li><strong>Length gained</strong> = <code>Growth per month × Months ÷ 2.54</code> = <strong>5.906 in</strong></li><li><strong>Total length</strong> = <code>Current length + Growth per month × Months</code> = <strong>20 cm</strong></li><li><strong>Growth per year</strong> = <code>Growth per month × 12</code> = <strong>15 cm</strong></li></ul><p>Use 1.0 cm a month if you want a conservative estimate for a haircut you cannot undo, and 1.5 for a child or a summer season.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>1.25 × 12</code>, which comes to <strong>15 cm</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>At 1.25 cm a month, a year adds 15 cm, which is just under six inches. From a five-centimetre cut that is twenty centimetres in total, roughly shoulder length on most adults.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Length gained</th><th>Length gained</th><th>Total length</th><th>Growth per year</th></tr></thead><tbody><tr><td><strong>Growth per month</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+7.5 %</td><td>+10 %</td></tr><tr><td><strong>Months</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+7.5 %</td><td>+0 %</td></tr><tr><td><strong>Current length</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+2.5 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Growth per month</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Growth per month</strong> opens at 1.25 cm/month — 1.25 cm is the usual adult average; 1.0 is conservative.</li><li><strong>Months</strong> opens at 12 months</li><li><strong>Current length</strong> opens at 5 cm — The length you are starting from.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Growth per month</th><th>Length gained</th><th>Length gained</th><th>Total length</th><th>Growth per year</th></tr></thead><tbody><tr><td>0.625 cm/month</td><td>7.5</td><td>2.953</td><td>12.5</td><td>7.5</td></tr><tr><td>1.25 cm/month</td><td>15</td><td>5.906</td><td>20</td><td>15</td></tr><tr><td>2.5 cm/month</td><td>30</td><td>11.811</td><td>35</td><td>30</td></tr><tr><td>6.25 cm/month</td><td>75</td><td>29.528</td><td>80</td><td>75</td></tr><tr><td>12.5 cm/month</td><td>150</td><td>59.055</td><td>155</td><td>150</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set growth per month = 1, months = 6, current length = 0: <strong>Length gained</strong> = 6 cm, <strong>Length gained</strong> = 2.362 in, <strong>Total length</strong> = 6 cm, <strong>Growth per year</strong> = 12 cm. A conservative six months: six centimetres, or 2.36 inches.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Measuring from the root.</strong> Curly hair measures shorter stretched than it looks, and the growth rate is unchanged.</li><li><strong>Expecting the rate to hold for years.</strong> Growth slows with age and with damage; the box is a rate, not a promise.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No trimming.</strong> The length gained is net of nothing: a trim removes what this page adds.</li></li><li><li><strong>No breakage.</strong> Damaged hair loses length at the ends faster than it grows at the root.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need growth per month and months and current length. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Length gained and length gained and total length and growth per year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning a grow-out from a short cut.</li></li><li><li>Estimating when a style will reach the shoulders.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/age">Age calculator</a> <a href="/everyday-life/bed-size">Bed size</a> <a href="/everyday-life/beauty-products">Beauty products</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Growth per month</strong> ×10</td><td>15</td><td>150</td><td>ten times larger</td></tr><tr><td><strong>Months</strong> ×10</td><td>15</td><td>150</td><td>ten times larger</td></tr><tr><td><strong>Current length</strong> ×10</td><td>15</td><td>15</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hair Growth calculator work out?', 'a' => <<<'TXT'
            It returns length gained and length gained and total length and growth per year from growth per month and months and current length. The relationship is Growth per month × Months.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Growth per month (cm/month), Months (months), Current length (cm). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: growth per month in cm/month; months in months; current length in cm. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How fast does hair actually grow?', 'a' => 'About 1.25 cm a month on average, or half an inch. Scalp hair grows faster than body hair, and summer is slightly faster than winter.'],
            ['q' => 'Why does the page ask for a starting length?', 'a' => 'Because total length is what people plan with. The gain on its own does not say whether you will reach a style.'],
        ],
        'related' => [
            ['path' => '/everyday-life/age', 'name' => 'Age calculator'],
            ['path' => '/everyday-life/bed-size', 'name' => 'Bed size'],
            ['path' => '/everyday-life/beauty-products', 'name' => 'Beauty products'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
