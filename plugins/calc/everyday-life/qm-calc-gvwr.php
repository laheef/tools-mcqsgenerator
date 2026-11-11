<?php

/**
 * GVWR Calculator
 * /everyday-life/gvwr
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GVWR Calculator',
    'meta' => ['title' => 'GVWR Calculator — Curb Weight, Payload and What\'s', 'description' => 'Curb weight plus the payload rating gives the gross weight; load it with cargo and passengers to see the share used and the margin left before the limit.', 'h1' => 'GVWR Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'curb',
                    'label' => 'Curb weight',
                    'type' => 'number',
                    'suffix' => 'lb',
                    'default' => '4200',
                    'help' => 'The car with fluids and no people, from the door sticker or the handbook.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'payload',
                    'label' => 'Payload rating',
                    'type' => 'number',
                    'suffix' => 'lb',
                    'default' => '1500',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cargo',
                    'label' => 'Cargo weight',
                    'type' => 'number',
                    'suffix' => 'lb',
                    'default' => '1100',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'people',
                    'label' => 'People and their kit',
                    'type' => 'number',
                    'suffix' => 'lb',
                    'default' => '350',
                    'help' => 'Two adults and a child is nearer 400 than 300 once bags are counted.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gvwr',
                    'label' => 'Gross vehicle weight rating',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'loaded',
                    'label' => 'Weight with your load',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'remaining',
                    'label' => 'Margin left',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'used_pct',
                    'label' => 'Payload used',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => ['gvwr' => 'curb + payload', 'loaded' => 'curb + cargo + people', 'remaining' => 'curb + payload - curb - cargo - people', 'used_pct' => '(cargo + people) / payload * 100'],
    'article' => [
        'intro' => 'The gross vehicle weight rating from curb weight and payload, how much of it your load uses once people and cargo are in, and the margin still available.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>The gross vehicle weight rating is a limit on the whole vehicle, not on what you put in the boot. It is curb weight plus payload, and payload is everything you add: people, luggage, a roof box, the dog.</p><p>A 4 200-pound car with a 1 500-pound payload has a 5 700-pound rating. Load 1 100 pounds of cargo and 350 pounds of people and you have used 1 450 of the 1 500, leaving 3 850 pounds of headroom against the rating but only 50 pounds of payload.</p><p>The answer is <strong>gross vehicle weight rating and weight with your load and margin left and payload used</strong>, worked out from curb weight and payload rating and cargo weight and people and their kit. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>gvwr</strong></td><td><code>Curb weight + Payload rating</code></td></tr><tr><td><strong>loaded</strong></td><td><code>Curb weight + Cargo weight + People and their kit</code></td></tr><tr><td><strong>remaining</strong></td><td><code>Curb weight + Payload rating - Curb weight - Cargo weight - People and their kit</code></td></tr><tr><td><strong>used_pct</strong></td><td><code>(Cargo weight + People and their kit) ÷ Payload rating × 100</code></td></tr></tbody></table><p>Curb plus payload gives the rating; curb plus cargo plus people gives the loaded weight; the difference is the margin. Payload used is the load over the rating, which is the number that tells you whether you are close.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports gross vehicle weight rating and weight with your load and margin left and payload used.</p><ul><li><strong>Curb weight</strong> — lb. The car with fluids and no people, from the door sticker or the handbook.</li><li><strong>Payload rating</strong> — lb.</li><li><strong>Cargo weight</strong> — lb.</li><li><strong>People and their kit</strong> — lb. Two adults and a child is nearer 400 than 300 once bags are counted.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Gross vehicle weight rating</strong> — lb.</li><li><strong>Weight with your load</strong> — lb.</li><li><strong>Margin left</strong> — lb.</li><li><strong>Payload used</strong> — %.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put curb weight = 4 200 lb, payload rating = 1 500 lb, cargo weight = 1 100 lb, people and their kit = 350 lb into the form and the panel reads:</p><ul><li><strong>Gross vehicle weight rating</strong> = <code>Curb weight + Payload rating</code> = <strong>5 700 lb</strong></li><li><strong>Weight with your load</strong> = <code>Curb weight + Cargo weight + People and their kit</code> = <strong>5 650 lb</strong></li><li><strong>Margin left</strong> = <code>Curb weight + Payload rating - Curb weight - Cargo weight - People and their kit</code> = <strong>50 lb</strong></li><li><strong>Payload used</strong> = <code>(Cargo weight + People and their kit) ÷ Payload rating × 100</code> = <strong>96.667 %</strong></li></ul><p>Payload is often the first limit you meet, not the rating. A family, a dog and a roof box can use 700 pounds before a suitcase is loaded.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>4 200 + 1 500</code>, which comes to <strong>5 700 lb</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>4 200 curb plus 1 500 payload is a 5 700-pound rating. A 1 100-pound cargo and 350 pounds of people leave 4 250 pounds of margin and 96.7 per cent of the payload used.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Gross vehicle weight rating</th><th>Weight with your load</th><th>Margin left</th><th>Payload used</th></tr></thead><tbody><tr><td><strong>Curb weight</strong> +10 %</td><td>+7.37 %</td><td>+7.43 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Payload rating</strong> +10 %</td><td>+2.63 %</td><td>+0 %</td><td>+300 %</td><td>−9.09 %</td></tr><tr><td><strong>Cargo weight</strong> +10 %</td><td>+0 %</td><td>+1.95 %</td><td>−220 %</td><td>+7.59 %</td></tr><tr><td><strong>People and their kit</strong> +10 %</td><td>+0 %</td><td>+0.62 %</td><td>−70 %</td><td>+2.41 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Payload rating</strong>. <strong>Curb weight</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Curb weight</strong> opens at 4 200 lb — The car with fluids and no people, from the door sticker or the handbook.</li><li><strong>Payload rating</strong> opens at 1 500 lb</li><li><strong>Cargo weight</strong> opens at 1 100 lb</li><li><strong>People and their kit</strong> opens at 350 lb — Two adults and a child is nearer 400 than 300 once bags are counted.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Curb weight</th><th>Gross vehicle weight rating</th><th>Weight with your load</th><th>Margin left</th><th>Payload used</th></tr></thead><tbody><tr><td>2 100 lb</td><td>3 600</td><td>3 550</td><td>50</td><td>96.667</td></tr><tr><td>4 200 lb</td><td>5 700</td><td>5 650</td><td>50</td><td>96.667</td></tr><tr><td>8 400 lb</td><td>9 900</td><td>9 850</td><td>50</td><td>96.667</td></tr><tr><td>21 000 lb</td><td>22 500</td><td>22 450</td><td>50</td><td>96.667</td></tr><tr><td>42 000 lb</td><td>43 500</td><td>43 450</td><td>50</td><td>96.667</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set curb weight = 4 200, payload rating = 1 500, cargo weight = 1 600, people and their kit = 400: <strong>Gross vehicle weight rating</strong> = 5 700 lb, <strong>Weight with your load</strong> = 6 200 lb, <strong>Margin left</strong> = -500 lb, <strong>Payload used</strong> = 133.333 %. 1 600 pounds of cargo and 400 of people is 2 000 against a 1 500 rating: the car is 500 pounds over, which is a handling and braking problem, not a paperwork one.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Reading payload as boot capacity.</strong> It includes the people. Four adults at 180 pounds are 720 pounds of payload before luggage.</li><li><strong>Forgetting the accessories.</strong> A tow bar, a winch and a set of all-terrain tyres all come off the payload and none of them feel like cargo.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>GVWR only.</strong> Axle ratings and the gross trailer weight are separate limits, and a vehicle can be under its GVWR and over its rear axle rating.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need curb weight and payload rating and cargo weight and people and their kit. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Gross vehicle weight rating and weight with your load and margin left and payload used should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Loading for a move or a holiday with the boot full.</li></li><li><li>Checking a used car's sticker before adding a tow bar and a family.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/wheel-offset">Wheel offset</a> <a href="/everyday-life/horsepower">Horsepower</a> <a href="/everyday-life/cost-per-mile">Cost per mile</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Curb weight</strong> ×10</td><td>5 700</td><td>43 500</td><td>×7.632</td></tr><tr><td><strong>Payload rating</strong> ×10</td><td>5 700</td><td>19 200</td><td>×3.368</td></tr><tr><td><strong>Cargo weight</strong> ×10</td><td>5 700</td><td>5 700</td><td>unchanged</td></tr><tr><td><strong>People and their kit</strong> ×10</td><td>5 700</td><td>5 700</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GVWR calculator work out?', 'a' => <<<'TXT'
            It returns gross vehicle weight rating and weight with your load and margin left and payload used from curb weight and payload rating and cargo weight and people and their kit. The relationship is Curb weight + Payload rating.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Curb weight (lb), Payload rating (lb), Cargo weight (lb), People and their kit (lb). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: curb weight in lb; payload rating in lb; cargo weight in lb; people and their kit in lb. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Where do I find the payload rating?', 'a' => 'On the tyre and loading sticker in the driver\'s door jamb, usually as "combined weight of occupants and cargo should never exceed". The handbook has it as well.'],
            ['q' => 'Does GVWR include a trailer?', 'a' => 'No. A trailer\'s tongue weight counts against payload, and the trailer\'s own weight counts against the gross combined weight rating, which is a third figure.'],
            ['q' => 'Can I increase the payload?', 'a' => 'Not legally. The rating is set by the manufacturer from brakes, springs and tyres, and fitting heavy-duty parts does not change what the sticker says.'],
        ],
        'related' => [
            ['path' => '/everyday-life/wheel-offset', 'name' => 'Wheel offset'],
            ['path' => '/everyday-life/horsepower', 'name' => 'Horsepower'],
            ['path' => '/everyday-life/cost-per-mile', 'name' => 'Cost per mile'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
