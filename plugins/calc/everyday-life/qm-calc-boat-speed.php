<?php

/**
 * Boat Speed Calculator
 * /everyday-life/boat-speed
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Boat Speed Calculator',
    'meta' => ['title' => 'Boat Speed — Hull Speed from Waterline Length', 'description' => 'A displacement hull is limited by its waterline: 1.34 times the square root of the length gives the hull speed in knots, and the length a target speed needs.', 'h1' => 'Boat Speed Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'lwl',
                    'label' => 'Waterline length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '30',
                    'help' => 'The length at the water, not the length overall. Overhangs do not add hull speed.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'target',
                    'label' => 'Speed you want',
                    'type' => 'number',
                    'suffix' => 'kn',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'hull',
                    'label' => 'Hull speed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kn',
                ],
                [
                    'name' => 'kmh',
                    'label' => 'Hull speed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'km/h',
                ],
                [
                    'name' => 'mph',
                    'label' => 'Hull speed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mph',
                ],
                [
                    'name' => 'lwl_for',
                    'label' => 'Waterline for your target',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
            ],
        ],
    ],
    'formula' => ['hull' => '1.34 * sqrt(lwl)', 'kmh' => '1.34 * sqrt(lwl) * 1.852', 'mph' => '1.34 * sqrt(lwl) * 1.15078', 'lwl_for' => '(target / 1.34) * (target / 1.34)'],
    'article' => [
        'intro' => 'The hull speed a displacement boat\'s waterline allows, in knots, kilometres and miles an hour, and the waterline length needed for a speed you want.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A displacement hull pushes water aside and sits in the trough it makes. The wave it creates has a speed of its own, set by the waterline length, and pushing past that means climbing your own bow wave.</p><p>The rule is 1.34 times the square root of the waterline in feet: 30 feet gives 7.3 knots, which is 13.6 kilometres an hour. To do 8 knots in a displacement hull you need 35.6 feet at the water, and no engine changes that.</p><p>The answer is <strong>hull speed and hull speed and hull speed and waterline for your target</strong>, worked out from waterline length and speed you want. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>hull</strong></td><td><code>1.34 × √(Waterline length)</code></td></tr><tr><td><strong>kmh</strong></td><td><code>1.34 × √(Waterline length) × 1.852</code></td></tr><tr><td><strong>mph</strong></td><td><code>1.34 × √(Waterline length) × 1.15078</code></td></tr><tr><td><strong>lwl_for</strong></td><td><code>(Speed you want ÷ 1.34) × (Speed you want ÷ 1.34)</code></td></tr></tbody></table><p>The square root of the waterline in feet times 1.34 gives knots, and the same figure converts to kilometres and miles an hour. The length for a target speed is that relation reversed and squared.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports hull speed and hull speed and hull speed and waterline for your target.</p><ul><li><strong>Waterline length</strong> — ft. The length at the water, not the length overall. Overhangs do not add hull speed.</li><li><strong>Speed you want</strong> — kn.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Hull speed</strong> — kn.</li><li><strong>Hull speed</strong> — km/h.</li><li><strong>Hull speed</strong> — mph.</li><li><strong>Waterline for your target</strong> — ft.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put waterline length = 30 ft, speed you want = 8 kn into the form and the panel reads:</p><ul><li><strong>Hull speed</strong> = <code>1.34 × √(Waterline length)</code> = <strong>7.339 kn</strong></li><li><strong>Hull speed</strong> = <code>1.34 × √(Waterline length) × 1.852</code> = <strong>13.593 km/h</strong></li><li><strong>Hull speed</strong> = <code>1.34 × √(Waterline length) × 1.15078</code> = <strong>8.446 mph</strong></li><li><strong>Waterline for your target</strong> = <code>(Speed you want ÷ 1.34) × (Speed you want ÷ 1.34)</code> = <strong>35.643 ft</strong></li></ul><p>A 25-foot waterline is 6.7 knots; a 40-foot one is 8.5. Doubling the length does not double the speed — it goes up with the square root.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>1.34 × sqrt(30)</code>, which comes to <strong>7.339 kn</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A 30-foot waterline gives a hull speed of 7.34 knots, 13.6 km/h and 8.4 mph. To hold 8 knots the waterline has to be 35.6 feet.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Hull speed</th><th>Hull speed</th><th>Hull speed</th><th>Waterline for your target</th></tr></thead><tbody><tr><td><strong>Waterline length</strong> +10 %</td><td>+4.88 %</td><td>+4.88 %</td><td>+4.88 %</td><td>+0 %</td></tr><tr><td><strong>Speed you want</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+21 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Speed you want</strong>. <strong>Waterline length</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Waterline length</strong> opens at 30 ft — The length at the water, not the length overall. Overhangs do not add hull speed.</li><li><strong>Speed you want</strong> opens at 8 kn</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Waterline length</th><th>Hull speed</th><th>Hull speed</th><th>Hull speed</th><th>Waterline for your target</th></tr></thead><tbody><tr><td>15 ft</td><td>5.19</td><td>9.612</td><td>5.972</td><td>35.643</td></tr><tr><td>30 ft</td><td>7.339</td><td>13.593</td><td>8.446</td><td>35.643</td></tr><tr><td>60 ft</td><td>10.38</td><td>19.223</td><td>11.945</td><td>35.643</td></tr><tr><td>150 ft</td><td>16.412</td><td>30.394</td><td>18.886</td><td>35.643</td></tr><tr><td>300 ft</td><td>23.209</td><td>42.984</td><td>26.709</td><td>35.643</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set waterline length = 25, speed you want = 8: <strong>Hull speed</strong> = 6.7 kn, <strong>Hull speed</strong> = 12.408 km/h, <strong>Hull speed</strong> = 7.71 mph, <strong>Waterline for your target</strong> = 35.643 ft. A 25-foot waterline is 6.7 knots, and 8 knots would need 35.6 feet — three feet of hull for every tenth of a knot at this end of the scale.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using length overall.</strong> A plumb bow and a long counter add length above the water and nothing to the hull speed. Measure at the waterline, loaded.</li><li><strong>Expecting a planing boat to obey it.</strong> The rule is for displacement hulls. A boat that gets on the plane leaves it behind entirely, which is why a 21-foot runabout passes a 40-foot trawler.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Calm water.</strong> Hull speed assumes flat water and no current. A following sea and a fair tide are worth a knot each and are not in the rule.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need waterline length and speed you want. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Hull speed and hull speed and hull speed and waterline for your target should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out what a longer boat would actually buy.</li></li><li><li>Setting a realistic passage plan before a passage.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/nautical-mile">Nautical mile</a> <a href="/everyday-life/boat-speed">Boat speed</a> <a href="/everyday-life/rpm">RPM calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Waterline length</strong> ×10</td><td>7.339</td><td>23.209</td><td>×3.162</td></tr><tr><td><strong>Speed you want</strong> ×10</td><td>7.339</td><td>7.339</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Boat Speed calculator work out?', 'a' => <<<'TXT'
            It returns hull speed and hull speed and hull speed and waterline for your target from waterline length and speed you want. The relationship is 1.34 × √(Waterline length).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Waterline length (ft), Speed you want (kn). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: waterline length in ft; speed you want in kn. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is hull speed?', 'a' => 'The speed at which a displacement hull\'s bow wave is as long as the hull. Beyond it, the boat climbs its own wave and the power needed rises steeply.'],
            ['q' => 'Why the square root?', 'a' => 'Because wave speed in deep water goes with the square root of the wavelength, and the wavelength is set by the hull length.'],
            ['q' => 'Can a displacement boat go faster downhill?', 'a' => 'In a current, yes, over the ground. Through the water it is still limited, which is why speed over ground and speed through water are different numbers.'],
        ],
        'related' => [
            ['path' => '/everyday-life/nautical-mile', 'name' => 'Nautical mile'],
            ['path' => '/everyday-life/boat-speed', 'name' => 'Boat speed'],
            ['path' => '/everyday-life/rpm', 'name' => 'RPM calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
