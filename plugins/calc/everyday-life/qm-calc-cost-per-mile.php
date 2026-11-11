<?php

/**
 * Cost per Mile Calculator
 * /everyday-life/cost-per-mile
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cost per Mile Calculator',
    'meta' => ['title' => 'Cost per Mile — Fuel Plus Everything Else — Free Tool', 'description' => 'Price, economy and the other bills in one figure: fuel per mile, the fixed costs of a year spread over it, the true cost of a mile and what a year comes to.', 'h1' => 'Cost per Mile Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'price',
                    'label' => 'Fuel price',
                    'type' => 'number',
                    'suffix' => '$/gal',
                    'default' => '3.45',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mpg',
                    'label' => 'Fuel economy',
                    'type' => 'number',
                    'suffix' => 'mpg',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'miles_year',
                    'label' => 'Miles a year',
                    'type' => 'number',
                    'suffix' => 'mi',
                    'default' => '12000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'other_year',
                    'label' => 'Other costs a year',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '1200',
                    'help' => 'Insurance, road tax, servicing, tyres and depreciation, if you count it. Leave out anything that does not depend on the car moving.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fuel_mile',
                    'label' => 'Fuel per mile',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/mi',
                ],
                [
                    'name' => 'other_mile',
                    'label' => 'Other costs per mile',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/mi',
                ],
                [
                    'name' => 'total_mile',
                    'label' => 'Cost per mile',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$/mi',
                ],
                [
                    'name' => 'fuel_year',
                    'label' => 'Fuel a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
                [
                    'name' => 'total_year',
                    'label' => 'Total a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        'fuel_mile' => 'price / mpg',
        'other_mile' => 'other_year / miles_year',
        'total_mile' => 'price / mpg + other_year / miles_year',
        'fuel_year' => 'price / mpg * miles_year',
        'total_year' => 'price / mpg * miles_year + other_year',
    ],
    'article' => [
        'intro' => 'What a mile costs once fuel and the standing costs — insurance, servicing, tax, tyres — are added, and what that comes to over a year of driving.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>The fuel figure is the one people quote and it is never the whole cost. At 3.45 a gallon and 30 mpg a mile costs 11.5 cents in petrol. Spread 1 200 of insurance, servicing and tyres over 12 000 miles and another 10 cents arrives, and the true cost of a mile is 21.5.</p><p>That number is what a mileage claim is for, and it is also the answer to whether a second car pays. The standing costs do not fall when the car sits still: they are per year, and dividing them by a shrinking mileage raises the cost of every mile you do drive.</p><p>The answer is <strong>fuel per mile and other costs per mile and cost per mile and fuel a year and total a year</strong>, worked out from fuel price and fuel economy and miles a year and other costs a year. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>fuel_mile</strong></td><td><code>Fuel price ÷ Fuel economy</code></td></tr><tr><td><strong>other_mile</strong></td><td><code>Other costs a year ÷ Miles a year</code></td></tr><tr><td><strong>total_mile</strong></td><td><code>Fuel price ÷ Fuel economy + Other costs a year ÷ Miles a year</code></td></tr><tr><td><strong>fuel_year</strong></td><td><code>Fuel price ÷ Fuel economy × Miles a year</code></td></tr><tr><td><strong>total_year</strong></td><td><code>Fuel price ÷ Fuel economy × Miles a year + Other costs a year</code></td></tr></tbody></table><p>Fuel per mile is the price of a gallon over the miles one gallon covers. Standing costs per mile are the yearly figure over the yearly distance. The total is the sum, and the yearly totals multiply back out.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports fuel per mile and other costs per mile and cost per mile and fuel a year and total a year.</p><ul><li><strong>Fuel price</strong> — $/gal.</li><li><strong>Fuel economy</strong> — mpg.</li><li><strong>Miles a year</strong> — mi.</li><li><strong>Other costs a year</strong> — $. Insurance, road tax, servicing, tyres and depreciation, if you count it. Leave out anything that does not depend on the car moving.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Fuel per mile</strong> — $/mi.</li><li><strong>Other costs per mile</strong> — $/mi.</li><li><strong>Cost per mile</strong> — $/mi.</li><li><strong>Fuel a year</strong> — $.</li><li><strong>Total a year</strong> — $.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put fuel price = 3.45 $/gal, fuel economy = 30 mpg, miles a year = 12 000 mi, other costs a year = 1 200 $ into the form and the panel reads:</p><ul><li><strong>Fuel per mile</strong> = <code>Fuel price ÷ Fuel economy</code> = <strong>0.115 $/mi</strong></li><li><strong>Other costs per mile</strong> = <code>Other costs a year ÷ Miles a year</code> = <strong>0.1 $/mi</strong></li><li><strong>Cost per mile</strong> = <code>Fuel price ÷ Fuel economy + Other costs a year ÷ Miles a year</code> = <strong>0.215 $/mi</strong></li><li><strong>Fuel a year</strong> = <code>Fuel price ÷ Fuel economy × Miles a year</code> = <strong>1 380 $</strong></li><li><strong>Total a year</strong> = <code>Fuel price ÷ Fuel economy × Miles a year + Other costs a year</code> = <strong>2 580 $</strong></li></ul><p>Halve the mileage and the standing share doubles. The same 1 200 over 6 000 miles is 20 cents a mile before a drop of fuel is burned.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>3.45 ÷ 30</code>, which comes to <strong>0.115 $/mi</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>At 3.45 a gallon and 30 mpg fuel is 11.5 cents a mile; 1 200 a year over 12 000 miles is 10 cents, so a mile costs 21.5 cents and the year costs 2 580.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Fuel per mile</th><th>Other costs per mile</th><th>Cost per mile</th><th>Fuel a year</th><th>Total a year</th></tr></thead><tbody><tr><td><strong>Fuel price</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+5.35 %</td><td>+10 %</td><td>+5.35 %</td></tr><tr><td><strong>Fuel economy</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−4.86 %</td><td>−9.09 %</td><td>−4.86 %</td></tr><tr><td><strong>Miles a year</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>−4.23 %</td><td>+10 %</td><td>+5.35 %</td></tr><tr><td><strong>Other costs a year</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+4.65 %</td><td>+0 %</td><td>+4.65 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Miles a year</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Fuel price</strong> opens at 3.45 $/gal</li><li><strong>Fuel economy</strong> opens at 30 mpg</li><li><strong>Miles a year</strong> opens at 12 000 mi</li><li><strong>Other costs a year</strong> opens at 1 200 $ — Insurance, road tax, servicing, tyres and depreciation, if you count it. Leave out anything that does not depend on the car moving.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Fuel price</th><th>Fuel per mile</th><th>Other costs per mile</th><th>Cost per mile</th><th>Fuel a year</th><th>Total a year</th></tr></thead><tbody><tr><td>1.725 $/gal</td><td>0.058</td><td>0.1</td><td>0.158</td><td>690</td><td>1 890</td></tr><tr><td>3.45 $/gal</td><td>0.115</td><td>0.1</td><td>0.215</td><td>1 380</td><td>2 580</td></tr><tr><td>6.9 $/gal</td><td>0.23</td><td>0.1</td><td>0.33</td><td>2 760</td><td>3 960</td></tr><tr><td>17.25 $/gal</td><td>0.575</td><td>0.1</td><td>0.675</td><td>6 900</td><td>8 100</td></tr><tr><td>34.5 $/gal</td><td>1.15</td><td>0.1</td><td>1.25</td><td>13 800</td><td>15 000</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set fuel price = 3.45, fuel economy = 45, miles a year = 12 000, other costs a year = 1 200: <strong>Fuel per mile</strong> = 0.077 $/mi, <strong>Other costs per mile</strong> = 0.1 $/mi, <strong>Cost per mile</strong> = 0.177 $/mi, <strong>Fuel a year</strong> = 920 $, <strong>Total a year</strong> = 2 120 $. At 45 mpg fuel falls to 7.7 cents a mile and the total to 17.7, saving 456 over the year.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting depreciation twice.</strong> If the car's value falls with age whether you drive it or not, it is a standing cost. If it falls with miles, it is already in the per-mile figure and should not be in both.</li><li><strong>Forgetting one-off costs.</strong> An MOT, a set of tyres every three years, a big service. Divide them into the annual figure rather than pretending they do not exist.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No financing.</strong> A monthly payment is a cost of owning, not of driving, and it is left out so the figure can be compared between a paid-off car and a financed one.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need fuel price and fuel economy and miles a year and other costs a year. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Fuel per mile and other costs per mile and cost per mile and fuel a year and total a year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Setting a mileage rate for a work claim.</li></li><li><li>Deciding whether a second car is cheaper than taxis.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/mpg">MPG calculator</a> <a href="/everyday-life/miles-to-dollars">Miles to dollars</a> <a href="/everyday-life/commute">Commute cost</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Fuel price</strong> ×10</td><td>0.115</td><td>1.15</td><td>ten times larger</td></tr><tr><td><strong>Fuel economy</strong> ×10</td><td>0.115</td><td>0.011</td><td>ten times smaller</td></tr><tr><td><strong>Miles a year</strong> ×10</td><td>0.115</td><td>0.115</td><td>unchanged</td></tr><tr><td><strong>Other costs a year</strong> ×10</td><td>0.115</td><td>0.115</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cost per Mile calculator work out?', 'a' => <<<'TXT'
            It returns fuel per mile and other costs per mile and cost per mile and fuel a year and total a year from fuel price and fuel economy and miles a year and other costs a year. The relationship is Fuel price ÷ Fuel economy.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Fuel price ($/gal), Fuel economy (mpg), Miles a year (mi), Other costs a year ($). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: fuel price in $/gal; fuel economy in mpg; miles a year in mi; other costs a year in $. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Should depreciation be in the per-mile cost?', 'a' => 'Only the part driven by distance. A car loses value with age regardless, so putting the whole loss on the miles overstates the cost of a trip.'],
            ['q' => 'What mileage rate does this justify?', 'a' => <<<'TXT'
            Add the two per-mile figures and compare with the published rate for your country. A car with heavy standing costs and low mileage usually beats it; a cheap high-mileage car usually does not.
            TXT],
            ['q' => 'Does servicing belong in standing costs?', 'a' => 'Split it: the annual service is fixed, the tyres and brake pads are per mile. The page takes one line and lets you decide which way the money is spent.'],
        ],
        'related' => [
            ['path' => '/everyday-life/mpg', 'name' => 'MPG calculator'],
            ['path' => '/everyday-life/miles-to-dollars', 'name' => 'Miles to dollars'],
            ['path' => '/everyday-life/commute', 'name' => 'Commute cost'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
