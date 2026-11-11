<?php

/**
 * Fuel Mileage Converter
 * /everyday-life/fuel-mileage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fuel Mileage Converter',
    'meta' => ['title' => 'Fuel Mileage Converter — MPG and Litres per 100 km', 'description' => 'The same economy in the unit the other country uses: miles per gallon against litres per hundred kilometres, with kilometres per litre and imperial gallons too.', 'h1' => 'Fuel Mileage Converter', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'mpg',
                    'label' => 'Miles per US gallon',
                    'type' => 'number',
                    'suffix' => 'mpg',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'miles',
                    'label' => 'Annual distance',
                    'type' => 'number',
                    'suffix' => 'mi',
                    'default' => '12000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'l100',
                    'label' => 'Litres per 100 km',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L/100km',
                ],
                [
                    'name' => 'km_l',
                    'label' => 'Kilometres per litre',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'km/L',
                ],
                [
                    'name' => 'mpg_uk',
                    'label' => 'Miles per imperial gallon',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mpg',
                ],
                [
                    'name' => 'gal_year',
                    'label' => 'US gallons a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
                ],
            ],
        ],
    ],
    'formula' => ['l100' => '235.214583 / mpg', 'km_l' => 'mpg * 0.425144', 'mpg_uk' => 'mpg * 1.20095', 'gal_year' => 'miles / mpg'],
    'article' => [
        'intro' => <<<'TXT'
        One economy figure in four units — US miles per gallon, litres per hundred kilometres, kilometres per litre and imperial miles per gallon — so a hire car's screen and a fuel receipt finally agree.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Two countries measure the same thing in opposite directions. Miles per gallon rises as the car gets better; litres per hundred kilometres falls. Thirty mpg in the United States is 7.8 L/100km in Europe, and there is no sense in which the European number is "worse" for being smaller.</p><p>The conversion is not a multiplication. It is 235.2 divided by the figure, which is why a car that improves from 20 to 25 mpg improves by five, and one that goes from 50 to 55 improves by the same five and by a tenth as much in fuel.</p><p>The answer is <strong>litres per 100 km and kilometres per litre and miles per imperial gallon and uS gallons a year</strong>, worked out from miles per US gallon and annual distance. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>l100</strong></td><td><code>235.214583 ÷ Miles per US gallon</code></td></tr><tr><td><strong>km_l</strong></td><td><code>Miles per US gallon × 0.425144</code></td></tr><tr><td><strong>mpg_uk</strong></td><td><code>Miles per US gallon × 1.20095</code></td></tr><tr><td><strong>gal_year</strong></td><td><code>Annual distance ÷ Miles per US gallon</code></td></tr></tbody></table><p>235.214583 divided by miles per gallon gives litres per hundred kilometres, because a US gallon is 3.785 litres and a mile is 1.609 kilometres. Kilometres per litre is the reciprocal in the other direction, and an imperial gallon is 1.20095 US gallons.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports litres per 100 km and kilometres per litre and miles per imperial gallon and uS gallons a year.</p><ul><li><strong>Miles per US gallon</strong> — mpg.</li><li><strong>Annual distance</strong> — mi.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Litres per 100 km</strong> — L/100km.</li><li><strong>Kilometres per litre</strong> — km/L.</li><li><strong>Miles per imperial gallon</strong> — mpg.</li><li><strong>US gallons a year</strong> — gal.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put miles per US gallon = 30 mpg, annual distance = 12 000 mi into the form and the panel reads:</p><ul><li><strong>Litres per 100 km</strong> = <code>235.214583 ÷ Miles per US gallon</code> = <strong>7.84 L/100km</strong></li><li><strong>Kilometres per litre</strong> = <code>Miles per US gallon × 0.425144</code> = <strong>12.754 km/L</strong></li><li><strong>Miles per imperial gallon</strong> = <code>Miles per US gallon × 1.20095</code> = <strong>36.029 mpg</strong></li><li><strong>US gallons a year</strong> = <code>Annual distance ÷ Miles per US gallon</code> = <strong>400 gal</strong></li></ul><p>The dash of a European hire car showing 6.0 L/100km is 39.2 mpg, which is a modern small diesel doing what it should.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>235.214583 ÷ 30</code>, which comes to <strong>7.84 L/100km</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>30 mpg is 7.84 litres per 100 km, 12.75 kilometres per litre and 36.0 miles per imperial gallon. Twelve thousand miles a year takes 400 US gallons.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Litres per 100 km</th><th>Kilometres per litre</th><th>Miles per imperial gallon</th><th>US gallons a year</th></tr></thead><tbody><tr><td><strong>Miles per US gallon</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Annual distance</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Annual distance</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Miles per US gallon</strong> opens at 30 mpg</li><li><strong>Annual distance</strong> opens at 12 000 mi</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Miles per US gallon</th><th>Litres per 100 km</th><th>Kilometres per litre</th><th>Miles per imperial gallon</th><th>US gallons a year</th></tr></thead><tbody><tr><td>15 mpg</td><td>15.681</td><td>6.377</td><td>18.014</td><td>800</td></tr><tr><td>30 mpg</td><td>7.84</td><td>12.754</td><td>36.029</td><td>400</td></tr><tr><td>60 mpg</td><td>3.92</td><td>25.509</td><td>72.057</td><td>200</td></tr><tr><td>150 mpg</td><td>1.568</td><td>63.772</td><td>180.142</td><td>80</td></tr><tr><td>300 mpg</td><td>0.784</td><td>127.543</td><td>360.285</td><td>40</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set miles per US gallon = 45, annual distance = 12 000: <strong>Litres per 100 km</strong> = 5.227 L/100km, <strong>Kilometres per litre</strong> = 19.131 km/L, <strong>Miles per imperial gallon</strong> = 54.043 mpg, <strong>US gallons a year</strong> = 266.667 gal. 45 mpg is 5.23 L/100km and 54.0 imperial mpg; the same 12 000 miles now takes 267 gallons rather than 400.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Multiplying to swap the units.</strong> 30 mpg is not 30 times 3.785 divided by 1.609. The relationship is a division, and the two figures move in opposite directions.</li><li><strong>Confusing US and imperial gallons.</strong> A UK mpg is about twenty per cent higher for the same car, because the gallon is bigger. Nothing about the car changed.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Steady-state conversion.</strong> The same real driving converted between units is exact; a manufacturer's test figure converted is still a manufacturer's test figure.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need miles per US gallon and annual distance. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Litres per 100 km and kilometres per litre and miles per imperial gallon and us gallons a year should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Reading a rental car's economy screen in units you understand.</li></li><li><li>Comparing a US and a European review of the same model.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/mpg">MPG calculator</a> <a href="/everyday-life/cost-per-mile">Cost per mile</a> <a href="/conversion/kilometers-to-miles">Kilometres to miles</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Miles per US gallon</strong> ×10</td><td>7.84</td><td>0.784</td><td>ten times smaller</td></tr><tr><td><strong>Annual distance</strong> ×10</td><td>7.84</td><td>7.84</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fuel Mileage Converter calculator work out?', 'a' => <<<'TXT'
            It returns litres per 100 km and kilometres per litre and miles per imperial gallon and uS gallons a year from miles per US gallon and annual distance. The relationship is 235.214583 ÷ Miles per US gallon.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Miles per US gallon (mpg), Annual distance (mi). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: miles per US gallon in mpg; annual distance in mi. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why 235.2?', 'a' => <<<'TXT'
            Because litres per 100 km is litres per kilometre times 100, and miles per gallon is miles per US gallon. The chain works out to 3.785 litres times 100 divided by 1.609 kilometres, which is 235.2.
            TXT],
            ['q' => 'Which unit is better for comparing cars?', 'a' => <<<'TXT'
            Litres per 100 km, because it is proportional to the fuel burned. Going from 20 to 21 mpg saves more than going from 40 to 41, and the L/100km figure shows that immediately.
            TXT],
            ['q' => 'Is kilometres per litre used anywhere?', 'a' => 'In Japan and parts of Latin America, yes, and in India as kilometres per litre. It is the simplest of the four: distance divided by volume.'],
        ],
        'related' => [
            ['path' => '/everyday-life/mpg', 'name' => 'MPG calculator'],
            ['path' => '/everyday-life/cost-per-mile', 'name' => 'Cost per mile'],
            ['path' => '/conversion/kilometers-to-miles', 'name' => 'Kilometres to miles'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
