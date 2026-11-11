<?php

/**
 * Diaper Cost Calculator
 * /everyday-life/diaper
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Diaper Cost Calculator',
    'meta' => ['title' => 'Diaper Cost — The First Year, One Change at a Time', 'description' => 'Eight changes a day at thirty cents is 876 dollars in the first year. This page turns a nappy habit into boxes, changes and a yearly bill. The formula is shown.', 'h1' => 'Diaper Cost Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'changes_day',
                    'label' => 'Changes a day',
                    'type' => 'number',
                    'suffix' => 'changes',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price_each',
                    'label' => 'Price per nappy',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '0.3',
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
                    'name' => 'changes_year',
                    'label' => 'Nappies',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'nappies',
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
                    'label' => 'Cost a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'cost_change',
                    'label' => 'Cost per change',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        'changes_year' => 'changes_day * days',
        'cost_week' => 'changes_day * 7 * price_each',
        'cost_month' => 'changes_day * 30.4375 * price_each',
        'cost_year' => 'changes_day * days * price_each',
        'cost_change' => 'price_each',
    ],
    'article' => [
        'intro' => 'The nappies a child uses in a year and what they cost, from the number of changes a day and the price of one, with the weekly and monthly figures beside it.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A newborn goes through eight to ten nappies a day and the count falls to five or six by the first birthday. At eight a day and thirty cents, that is 2 920 nappies and 876 dollars in the first year.</p><p>The boxes on the shelf are priced per pack, and the pack holds 40 to 90. The per-nappy figure is the only one that compares sizes, and it is the figure that tells you whether the bulk box is a saving or a bigger box.</p><p>The answer is <strong>nappies and cost a week and cost a month and cost a year and cost per change</strong>, worked out from changes a day and price per nappy and days counted. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>changes_year</strong></td><td><code>Changes a day × Days counted</code></td></tr><tr><td><strong>cost_week</strong></td><td><code>Changes a day × 7 × Price per nappy</code></td></tr><tr><td><strong>cost_month</strong></td><td><code>Changes a day × 30.4375 × Price per nappy</code></td></tr><tr><td><strong>cost_year</strong></td><td><code>Changes a day × Days counted × Price per nappy</code></td></tr><tr><td><strong>cost_change</strong></td><td><code>Price per nappy</code></td></tr></tbody></table><p>Changes a day times days gives the count. Money is that count times the price of one nappy, and the week and month figures use seven days and the average 30.44-day month.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports nappies and cost a week and cost a month and cost a year and cost per change.</p><ul><li><strong>Changes a day</strong> — changes.</li><li><strong>Price per nappy</strong> — $.</li><li><strong>Days counted</strong> — days.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Nappies</strong> — nappies.</li><li><strong>Cost a week</strong> — $.</li><li><strong>Cost a month</strong> — $.</li><li><strong>Cost a year</strong> — $.</li><li><strong>Cost per change</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put changes a day = 8 changes, price per nappy = 0.3 $, days counted = 365 days into the form and the panel reads:</p><ul><li><strong>Nappies</strong> = <code>Changes a day × Days counted</code> = <strong>2 920 nappies</strong></li><li><strong>Cost a week</strong> = <code>Changes a day × 7 × Price per nappy</code> = <strong>16.8 $</strong></li><li><strong>Cost a month</strong> = <code>Changes a day × 30.4375 × Price per nappy</code> = <strong>73.05 $</strong></li><li><strong>Cost a year</strong> = <code>Changes a day × Days counted × Price per nappy</code> = <strong>876 $</strong></li><li><strong>Cost per change</strong> = <code>Price per nappy</code> = <strong>0.3 $</strong></li></ul><p>The average over a year is nearer seven changes, because the first months are double the second year. Re-run the page for a second child and the second year is cheaper.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>8 × 365</code>, which comes to <strong>2 920 nappies</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>Eight changes a day for a year is 2 920 nappies: 16.80 a week, 73.05 a month and 876 a year, at thirty cents each.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Nappies</th><th>Cost a week</th><th>Cost a month</th><th>Cost a year</th><th>Cost per change</th></tr></thead><tbody><tr><td><strong>Changes a day</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Price per nappy</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Days counted</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Changes a day</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Changes a day</strong> opens at 8 changes</li><li><strong>Price per nappy</strong> opens at 0.3 $</li><li><strong>Days counted</strong> opens at 365 days</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Changes a day</th><th>Nappies</th><th>Cost a week</th><th>Cost a month</th><th>Cost a year</th><th>Cost per change</th></tr></thead><tbody><tr><td>4 changes</td><td>1 460</td><td>8.4</td><td>36.525</td><td>438</td><td>0.3</td></tr><tr><td>8 changes</td><td>2 920</td><td>16.8</td><td>73.05</td><td>876</td><td>0.3</td></tr><tr><td>16 changes</td><td>5 840</td><td>33.6</td><td>146.1</td><td>1 752</td><td>0.3</td></tr><tr><td>40 changes</td><td>14 600</td><td>84</td><td>365.25</td><td>4 380</td><td>0.3</td></tr><tr><td>80 changes</td><td>29 200</td><td>168</td><td>730.5</td><td>8 760</td><td>0.3</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set changes a day = 6, price per nappy = 0.3, days counted = 365: <strong>Nappies</strong> = 2 190 nappies, <strong>Cost a week</strong> = 12.6 $, <strong>Cost a month</strong> = 54.788 $, <strong>Cost a year</strong> = 657 $, <strong>Cost per change</strong> = 0.3 $. Six changes a day is 2 190 nappies and 657 a year, which is nearer the second year's figure than the first.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Comparing boxes without the count.</strong> A box of 90 at 27 dollars is 30 cents a nappy; a box of 60 at 20 is 33. The bigger box is cheaper and it is also more of a commitment if the size is wrong.</li><li><strong>Forgetting wipes and the nappy bin.</strong> Wipes run to about ten per cent of the nappy bill and the sacks and cream are another line that does not fit this page.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Disposables only.</strong> Reusable nappies have a large upfront cost and a laundry bill, and the break-even is between one and two children.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need changes a day and price per nappy and days counted. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Nappies and cost a week and cost a month and cost a year and cost per change should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Budgeting the first year before the baby arrives.</li></li><li><li>Comparing a bulk box with the usual pack.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/period-products-cost">Period products cost</a> <a href="/everyday-life/grocery">Grocery budget</a> <a href="/everyday-life/price-per-unit">Price per unit</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Changes a day</strong> ×10</td><td>2 920</td><td>29 200</td><td>ten times larger</td></tr><tr><td><strong>Price per nappy</strong> ×10</td><td>2 920</td><td>2 920</td><td>unchanged</td></tr><tr><td><strong>Days counted</strong> ×10</td><td>2 920</td><td>29 200</td><td>ten times larger</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Diaper Cost calculator work out?', 'a' => <<<'TXT'
            It returns nappies and cost a week and cost a month and cost a year and cost per change from changes a day and price per nappy and days counted. The relationship is Changes a day × Days counted.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Changes a day (changes), Price per nappy ($), Days counted (days). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: changes a day in changes; price per nappy in $; days counted in days. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many nappies does a baby use in a year?', 'a' => 'Around 2 500 to 3 000 for a first child. The first three months are the heaviest at ten a day, and the count falls as the child grows.'],
            ['q' => 'Is a subscription cheaper?', 'a' => <<<'TXT'
            Often by 10 to 20 per cent on the same brand, and the comparison is the price per nappy rather than the price of the box. The page's per-change figure is the one to compare.
            TXT],
            ['q' => 'When do children stop needing nappies?', 'a' => 'Between two and three years for most, so the total bill is roughly two and a half years of this arithmetic, front-loaded.'],
        ],
        'related' => [
            ['path' => '/everyday-life/period-products-cost', 'name' => 'Period products cost'],
            ['path' => '/everyday-life/grocery', 'name' => 'Grocery budget'],
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
