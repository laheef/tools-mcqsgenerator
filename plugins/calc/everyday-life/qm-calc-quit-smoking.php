<?php

/**
 * Quit Smoking Calculator
 * /everyday-life/quit-smoking
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Quit Smoking Calculator',
    'meta' => ['title' => 'Quit Smoking — Cigarettes and Money Not Spent', 'description' => 'Cigarettes a day and the price of a pack, turned into packs and money a year, a month and a week: the arithmetic that a quitting app never shows in full.', 'h1' => 'Quit Smoking Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'cigs_day',
                    'label' => 'Cigarettes a day',
                    'type' => 'number',
                    'suffix' => 'cigarettes',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pack_price',
                    'label' => 'Price of a pack',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '9',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_pack',
                    'label' => 'Cigarettes a pack',
                    'type' => 'number',
                    'suffix' => 'cigarettes',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'days',
                    'label' => 'Days counted',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '365',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cigs_year',
                    'label' => 'Cigarettes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cigarettes',
                ],
                [
                    'name' => 'packs_year',
                    'label' => 'Packs',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'packs',
                ],
                [
                    'name' => 'cost_week',
                    'label' => 'Cost a week',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'cost_month',
                    'label' => 'Cost a month',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'cost_year',
                    'label' => 'Cost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        'cigs_year' => 'cigs_day * days',
        'packs_year' => 'cigs_day * days / per_pack',
        'cost_week' => 'cigs_day * 7 / per_pack * pack_price',
        'cost_month' => 'cigs_day * days / per_pack * pack_price / 12',
        'cost_year' => 'cigs_day * days / per_pack * pack_price',
    ],
    'article' => [
        'intro' => 'How many cigarettes and packs a habit consumes in a year and what they cost a week, a month and a year, so a quit date has a number attached to it.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A pack a day at nine dollars is 63 a week and 3 285 a year. Most smokers know the weekly figure and not the yearly one, and the yearly one is a used car, a holiday, or four months of rent.</p><p>The page counts cigarettes and packs first and money second, because the counts are the fact and the money is the consequence. Seven thousand three hundred cigarettes a year is twenty a day, and no price change makes that small.</p><p>The answer is <strong>cigarettes and packs and cost a week and cost a month and cost</strong>, worked out from cigarettes a day and price of a pack and cigarettes a pack and days counted. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>cigs_year</strong></td><td><code>Cigarettes a day × Days counted</code></td></tr><tr><td><strong>packs_year</strong></td><td><code>Cigarettes a day × Days counted ÷ Cigarettes a pack</code></td></tr><tr><td><strong>cost_week</strong></td><td><code>Cigarettes a day × 7 ÷ Cigarettes a pack × Price of a pack</code></td></tr><tr><td><strong>cost_month</strong></td><td><code>Cigarettes a day × Days counted ÷ Cigarettes a pack × Price of a pack ÷ 12</code></td></tr><tr><td><strong>cost_year</strong></td><td><code>Cigarettes a day × Days counted ÷ Cigarettes a pack × Price of a pack</code></td></tr></tbody></table><p>Cigarettes a day times days gives the count; divided by the pack size gives packs. Money is packs times price, and the week and month figures are the same arithmetic at seven days and a twelfth of the year.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports cigarettes and packs and cost a week and cost a month and cost.</p><ul><li><strong>Cigarettes a day</strong> — cigarettes.</li><li><strong>Price of a pack</strong> — $.</li><li><strong>Cigarettes a pack</strong> — cigarettes.</li><li><strong>Days counted</strong> — days.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Cigarettes</strong> — cigarettes.</li><li><strong>Packs</strong> — packs.</li><li><strong>Cost a week</strong> — $.</li><li><strong>Cost a month</strong> — $.</li><li><strong>Cost</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put cigarettes a day = 20 cigarettes, price of a pack = 9 $, cigarettes a pack = 20 cigarettes, days counted = 365 days into the form and the panel reads:</p><ul><li><strong>Cigarettes</strong> = <code>Cigarettes a day × Days counted</code> = <strong>7 300 cigarettes</strong></li><li><strong>Packs</strong> = <code>Cigarettes a day × Days counted ÷ Cigarettes a pack</code> = <strong>365 packs</strong></li><li><strong>Cost a week</strong> = <code>Cigarettes a day × 7 ÷ Cigarettes a pack × Price of a pack</code> = <strong>63 $</strong></li><li><strong>Cost a month</strong> = <code>Cigarettes a day × Days counted ÷ Cigarettes a pack × Price of a pack ÷ 12</code> = <strong>273.75 $</strong></li><li><strong>Cost</strong> = <code>Cigarettes a day × Days counted ÷ Cigarettes a pack × Price of a pack</code> = <strong>3 285 $</strong></li></ul><p>Halving the habit halves every line, which is why cutting down works arithmetically and why the last cigarette is the expensive one to keep.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>20 × 365</code>, which comes to <strong>7 300 cigarettes</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Twenty a day is 7 300 cigarettes and 365 packs a year: 63 a week, 273.75 a month and 3 285 a year.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Cigarettes</th><th>Packs</th><th>Cost a week</th><th>Cost a month</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Cigarettes a day</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Price of a pack</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Cigarettes a pack</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Days counted</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Days counted</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Cigarettes a day</strong> opens at 20 cigarettes</li><li><strong>Price of a pack</strong> opens at 9 $</li><li><strong>Cigarettes a pack</strong> opens at 20 cigarettes</li><li><strong>Days counted</strong> opens at 365 days</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Cigarettes a day</th><th>Cigarettes</th><th>Packs</th><th>Cost a week</th><th>Cost a month</th><th>Cost</th></tr></thead><tbody><tr><td>10 cigarettes</td><td>3 650</td><td>182.5</td><td>31.5</td><td>136.875</td><td>1 642.5</td></tr><tr><td>20 cigarettes</td><td>7 300</td><td>365</td><td>63</td><td>273.75</td><td>3 285</td></tr><tr><td>40 cigarettes</td><td>14 600</td><td>730</td><td>126</td><td>547.5</td><td>6 570</td></tr><tr><td>100 cigarettes</td><td>36 500</td><td>1 825</td><td>315</td><td>1 368.75</td><td>16 425</td></tr><tr><td>200 cigarettes</td><td>73 000</td><td>3 650</td><td>630</td><td>2 737.5</td><td>32 850</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set cigarettes a day = 10, price of a pack = 9, cigarettes a pack = 20, days counted = 365: <strong>Cigarettes</strong> = 3 650 cigarettes, <strong>Packs</strong> = 182.5 packs, <strong>Cost a week</strong> = 31.5 $, <strong>Cost a month</strong> = 136.875 $, <strong>Cost</strong> = 1 642.5 $. Ten a day is 3 650 cigarettes, 182.5 packs and 1 642.50 a year — the same arithmetic with everything halved.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Forgetting loose tobacco and the papers.</strong> Roll-your-own changes the price per cigarette by half, and the count usually rises.</li><li><strong>Pricing the habit at the cheapest pack.</strong> Use what you actually pay, including the pack from the garage at the weekend that costs a dollar more.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Money only.</strong> Health effects, insurance and the cost of smoking breaks are not in the figure, and none of them can be priced honestly here.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need cigarettes a day and price of a pack and cigarettes a pack and days counted. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Cigarettes and packs and cost a week and cost a month and cost should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Putting a number on a quit date.</li></li><li><li>Comparing the habit with something the money could buy.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/diaper">Nappy cost</a> <a href="/everyday-life/period-products-cost">Period products cost</a> <a href="/everyday-life/cost-per-minute">Cost per minute</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Cigarettes a day</strong> ×10</td><td>7 300</td><td>73 000</td><td>ten times larger</td></tr><tr><td><strong>Price of a pack</strong> ×10</td><td>7 300</td><td>7 300</td><td>unchanged</td></tr><tr><td><strong>Cigarettes a pack</strong> ×10</td><td>7 300</td><td>7 300</td><td>unchanged</td></tr><tr><td><strong>Days counted</strong> ×10</td><td>7 300</td><td>73 000</td><td>ten times larger</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Quit Smoking calculator work out?', 'a' => <<<'TXT'
            It returns cigarettes and packs and cost a week and cost a month and cost from cigarettes a day and price of a pack and cigarettes a pack and days counted. The relationship is Cigarettes a day × Days counted.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Cigarettes a day (cigarettes), Price of a pack ($), Cigarettes a pack (cigarettes), Days counted (days). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: cigarettes a day in cigarettes; price of a pack in $; cigarettes a pack in cigarettes; days counted in days. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many cigarettes are in a pack?', 'a' => 'Twenty in most of the world, twenty-five in some markets and eighteen in a few. The field is there because the answer depends on it.'],
            ['q' => 'Why is a month a twelfth of the year?', 'a' => 'Because that is how a budget treats it. A calendar month has 28 to 31 days and the difference is a day\'s smoking, which does not change the decision.'],
            ['q' => 'Does vaping cost the same?', 'a' => <<<'TXT'
            Usually a fraction, and the arithmetic is different: liquid is sold by volume and pods by count. Divide your own weekly spend by seven if you want a comparable figure.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/diaper', 'name' => 'Nappy cost'],
            ['path' => '/everyday-life/period-products-cost', 'name' => 'Period products cost'],
            ['path' => '/everyday-life/cost-per-minute', 'name' => 'Cost per minute'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
