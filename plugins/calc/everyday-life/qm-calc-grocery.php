<?php

/**
 * Grocery Budget Calculator
 * /everyday-life/grocery
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Grocery Budget Calculator',
    'meta' => ['title' => 'Grocery Budget — Per Person, Per Day and Per Year', 'description' => 'A weekly shop divided by the people eating it and the days it covers: the cost per person per day, and what the same basket comes to over a full year.', 'h1' => 'Grocery Budget Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'basket',
                    'label' => 'Weekly grocery spend',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '120',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'people',
                    'label' => 'People fed',
                    'type' => 'number',
                    'suffix' => 'people',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Weeks a year',
                    'type' => 'number',
                    'suffix' => 'weeks',
                    'default' => '52',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'alt_basket',
                    'label' => 'A cheaper basket',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '100',
                    'help' => 'The same shop at a different supermarket, or with three swaps. Compare like for like before trusting the difference.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_person_day',
                    'label' => 'Per person per day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'per_person_week',
                    'label' => 'Per person per week',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'per_year',
                    'label' => 'A year at this basket',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'saving',
                    'label' => 'A year on the cheaper basket',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => ['per_person_day' => 'basket / people / 7', 'per_person_week' => 'basket / people', 'per_year' => 'basket * weeks', 'saving' => '(basket - alt_basket) * weeks'],
    'article' => [
        'intro' => 'What a weekly grocery basket costs per person and per day, what the same basket runs to over a year, and what a change of shop would save.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A hundred and twenty a week for four people is 30 each, or 4.29 a person a day. That last figure is the one that compares with a takeaway, a sandwich or a school meal, and it is the one nobody knows.</p><p>Over a year the basket is 6 240, and a twenty-dollar weekly reduction is 1 040 — a number large enough to be worth three swaps and small enough that nobody does them, because twenty dollars a week is invisible and a thousand pounds is not.</p><p>The answer is <strong>per person per day and per person per week and a year at this basket and a year on the cheaper basket</strong>, worked out from weekly grocery spend and people fed and weeks a year and a cheaper basket. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>per_person_day</strong></td><td><code>Weekly grocery spend ÷ People fed ÷ 7</code></td></tr><tr><td><strong>per_person_week</strong></td><td><code>Weekly grocery spend ÷ People fed</code></td></tr><tr><td><strong>per_year</strong></td><td><code>Weekly grocery spend × Weeks a year</code></td></tr><tr><td><strong>saving</strong></td><td><code>(Weekly grocery spend - A cheaper basket) × Weeks a year</code></td></tr></tbody></table><p>The weekly spend over the people and the days gives a person-day. The year is the basket times the weeks, and the saving is the difference between the two baskets multiplied by the same weeks.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports per person per day and per person per week and a year at this basket and a year on the cheaper basket.</p><ul><li><strong>Weekly grocery spend</strong> — $.</li><li><strong>People fed</strong> — people.</li><li><strong>Weeks a year</strong> — weeks.</li><li><strong>A cheaper basket</strong> — $. The same shop at a different supermarket, or with three swaps. Compare like for like before trusting the difference.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Per person per day</strong> — $.</li><li><strong>Per person per week</strong> — $.</li><li><strong>A year at this basket</strong> — $.</li><li><strong>A year on the cheaper basket</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put weekly grocery spend = 120 $, people fed = 4 people, weeks a year = 52 weeks, a cheaper basket = 100 $ into the form and the panel reads:</p><ul><li><strong>Per person per day</strong> = <code>Weekly grocery spend ÷ People fed ÷ 7</code> = <strong>4.286 $</strong></li><li><strong>Per person per week</strong> = <code>Weekly grocery spend ÷ People fed</code> = <strong>30 $</strong></li><li><strong>A year at this basket</strong> = <code>Weekly grocery spend × Weeks a year</code> = <strong>6 240 $</strong></li><li><strong>A year on the cheaper basket</strong> = <code>(Weekly grocery spend - A cheaper basket) × Weeks a year</code> = <strong>1 040 $</strong></li></ul><p>Two people eating the same basket spend 8.57 a day each — the basket is the same and the household is smaller, which is why cooking for four costs less per head than cooking for one.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>120 ÷ 4 ÷ 7</code>, which comes to <strong>4.286 $</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>120 a week for four people is 30 each and 4.29 a person a day. A year is 6 240, and a basket at 100 saves 1 040 over the same year.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Per person per day</th><th>Per person per week</th><th>A year at this basket</th><th>A year on the cheaper basket</th></tr></thead><tbody><tr><td><strong>Weekly grocery spend</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+60 %</td></tr><tr><td><strong>People fed</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Weeks a year</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>A cheaper basket</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−50 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Weekly grocery spend</strong>. <strong>People fed</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Weekly grocery spend</strong> opens at 120 $</li><li><strong>People fed</strong> opens at 4 people</li><li><strong>Weeks a year</strong> opens at 52 weeks</li><li><strong>A cheaper basket</strong> opens at 100 $ — The same shop at a different supermarket, or with three swaps. Compare like for like before trusting the difference.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Weekly grocery spend</th><th>Per person per day</th><th>Per person per week</th><th>A year at this basket</th><th>A year on the cheaper basket</th></tr></thead><tbody><tr><td>60 $</td><td>2.143</td><td>15</td><td>3 120</td><td>-2 080</td></tr><tr><td>120 $</td><td>4.286</td><td>30</td><td>6 240</td><td>1 040</td></tr><tr><td>240 $</td><td>8.571</td><td>60</td><td>12 480</td><td>7 280</td></tr><tr><td>600 $</td><td>21.429</td><td>150</td><td>31 200</td><td>26 000</td></tr><tr><td>1 200 $</td><td>42.857</td><td>300</td><td>62 400</td><td>57 200</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set weekly grocery spend = 90, people fed = 4, weeks a year = 52, a cheaper basket = 80: <strong>Per person per day</strong> = 3.214 $, <strong>Per person per week</strong> = 22.5 $, <strong>A year at this basket</strong> = 4 680 $, <strong>A year on the cheaper basket</strong> = 520 $. A basket of 90 is 3.21 a person a day and 4 680 a year; ten dollars a week off it is 520 over the year.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Forgetting the meals out.</strong> This is the shop, not the food. Coffee, lunches and takeaways are a separate budget and often a third of the total.</li><li><strong>Comparing baskets with different contents.</strong> A cheaper basket is only cheaper if it feeds the same people the same meals. Count what is in it before celebrating the difference.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>A steady basket.</strong> Holiday weeks are double and the week before payday is not. The yearly figure assumes the average holds.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need weekly grocery spend and people fed and weeks a year and a cheaper basket. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Per person per day and per person per week and a year at this basket and a year on the cheaper basket should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Comparing households or splitting a shared house fairly.</li></li><li><li>Working out whether a bulk-buy trip is worth the journey.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/price-per-unit">Price per unit</a> <a href="/everyday-life/diaper">Nappy cost</a> <a href="/everyday-life/cleaning-cost">Cleaning cost</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Weekly grocery spend</strong> ×10</td><td>4.286</td><td>42.857</td><td>ten times larger</td></tr><tr><td><strong>People fed</strong> ×10</td><td>4.286</td><td>0.429</td><td>ten times smaller</td></tr><tr><td><strong>Weeks a year</strong> ×10</td><td>4.286</td><td>4.286</td><td>unchanged</td></tr><tr><td><strong>A cheaper basket</strong> ×10</td><td>4.286</td><td>4.286</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Grocery Budget calculator work out?', 'a' => <<<'TXT'
            It returns per person per day and per person per week and a year at this basket and a year on the cheaper basket from weekly grocery spend and people fed and weeks a year and a cheaper basket. The relationship is Weekly grocery spend ÷ People fed ÷ 7.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Weekly grocery spend ($), People fed (people), Weeks a year (weeks), A cheaper basket ($). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: weekly grocery spend in $; people fed in people; weeks a year in weeks; a cheaper basket in $. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is a normal grocery spend per person?', 'a' => 'Between 4 and 8 dollars a day per person in a rich country, depending on how much cooking happens at home and how much meat is in the basket.'],
            ['q' => 'Should pet food be in the grocery basket?', 'a' => <<<'TXT'
            If it is bought in the same shop, yes, and the people count does not include the dog. The per-person figure is then slightly overstated, which is the honest direction.
            TXT],
            ['q' => 'Why use a weekly basket rather than a monthly one?', 'a' => 'Because shopping is weekly and budgets are monthly, and a month is not four weeks. Multiplying the weekly figure by 52 is the correction.'],
        ],
        'related' => [
            ['path' => '/everyday-life/price-per-unit', 'name' => 'Price per unit'],
            ['path' => '/everyday-life/diaper', 'name' => 'Nappy cost'],
            ['path' => '/everyday-life/cleaning-cost', 'name' => 'Cleaning cost'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
