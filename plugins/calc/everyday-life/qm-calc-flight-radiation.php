<?php

/**
 * Flight Radiation Calculator
 * /everyday-life/flight-radiation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Flight Radiation Calculator',
    'meta' => ['title' => 'Flight Radiation — Cosmic Dose per Flight — Free Tool', 'description' => 'At cruising altitude the atmosphere is thin enough to take a measurable dose: hours times a rate per hour, against the public and occupational limits.', 'h1' => 'Flight Radiation Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'hours',
                    'label' => 'Flight time',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '10',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rate',
                    'label' => 'Dose rate at altitude',
                    'type' => 'number',
                    'suffix' => 'mSv/h',
                    'default' => '0.005',
                    'help' => 'Three to five thousandths of a millisievert an hour at 35 000 feet. Polar routes and high latitudes are at the top of that range.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'public_limit',
                    'label' => 'Annual public limit',
                    'type' => 'number',
                    'suffix' => 'mSv',
                    'default' => '1',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'work_limit',
                    'label' => 'Annual occupational limit',
                    'type' => 'number',
                    'suffix' => 'mSv',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'dose',
                    'label' => 'Dose for the flight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mSv',
                ],
                [
                    'name' => 'public_pct',
                    'label' => 'Of the public limit',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'work_pct',
                    'label' => 'Of the work limit',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'flights_public',
                    'label' => 'Flights to reach the public limit',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'flights',
                ],
            ],
        ],
    ],
    'formula' => ['dose' => 'hours * rate', 'public_pct' => 'hours * rate / public_limit * 100', 'work_pct' => 'hours * rate / work_limit * 100', 'flights_public' => 'public_limit / (hours * rate)'],
    'article' => [
        'intro' => 'The cosmic radiation dose a flight delivers, how much of the annual public and occupational limits it uses, and how many flights would reach each.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>At 35 000 feet there is less air above you and less shielding, so the cosmic rays that are absorbed at ground level land in the aircraft. The rate is a few thousandths of a millisievert an hour — about the same as a chest X-ray every few hours, or a dental X-ray an hour.</p><p>Ten hours at 0.005 an hour is 0.05 mSv, five per cent of the annual public limit of 1. A frequent flyer doing that every week would pass the public limit in twenty flights, which is why aircrew are treated as radiation workers.</p><p>The answer is <strong>dose for the flight and of the public limit and of the work limit and flights to reach the public limit</strong>, worked out from flight time and dose rate at altitude and annual public limit and annual occupational limit. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>dose</strong></td><td><code>Flight time × Dose rate at altitude</code></td></tr><tr><td><strong>public_pct</strong></td><td><code>Flight time × Dose rate at altitude ÷ Annual public limit × 100</code></td></tr><tr><td><strong>work_pct</strong></td><td><code>Flight time × Dose rate at altitude ÷ Annual occupational limit × 100</code></td></tr><tr><td><strong>flights_public</strong></td><td><code>Annual public limit ÷ (Flight time × Dose rate at altitude)</code></td></tr></tbody></table><p>Hours times the rate gives the dose. Divided by each annual limit and multiplied by a hundred gives the share of it, and the limit over one flight's dose gives the flights to reach it.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports dose for the flight and of the public limit and of the work limit and flights to reach the public limit.</p><ul><li><strong>Flight time</strong> — h.</li><li><strong>Dose rate at altitude</strong> — mSv/h. Three to five thousandths of a millisievert an hour at 35 000 feet. Polar routes and high latitudes are at the top of that range.</li><li><strong>Annual public limit</strong> — mSv.</li><li><strong>Annual occupational limit</strong> — mSv.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Dose for the flight</strong> — mSv.</li><li><strong>Of the public limit</strong> — %.</li><li><strong>Of the work limit</strong> — %.</li><li><strong>Flights to reach the public limit</strong> — flights.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put flight time = 10 h, dose rate at altitude = 0.005 mSv/h, annual public limit = 1 mSv, annual occupational limit = 20 mSv into the form and the panel reads:</p><ul><li><strong>Dose for the flight</strong> = <code>Flight time × Dose rate at altitude</code> = <strong>0.05 mSv</strong></li><li><strong>Of the public limit</strong> = <code>Flight time × Dose rate at altitude ÷ Annual public limit × 100</code> = <strong>5 %</strong></li><li><strong>Of the work limit</strong> = <code>Flight time × Dose rate at altitude ÷ Annual occupational limit × 100</code> = <strong>0.25 %</strong></li><li><strong>Flights to reach the public limit</strong> = <code>Annual public limit ÷ (Flight time × Dose rate at altitude)</code> = <strong>20 flights</strong></li></ul><p>A two-hour hop is 0.01 mSv, a hundredth of the public limit. The rate matters more than the length: at 0.008 the same ten hours is eight per cent.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>10 × 0.005</code>, which comes to <strong>0.05 mSv</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Ten hours at 0.005 mSv/h is 0.05 mSv: five per cent of the public limit, a quarter of a per cent of the occupational one, and twenty such flights to reach a millisievert.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Dose for the flight</th><th>Of the public limit</th><th>Of the work limit</th><th>Flights to reach the public limit</th></tr></thead><tbody><tr><td><strong>Flight time</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Dose rate at altitude</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Annual public limit</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Annual occupational limit</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Dose rate at altitude</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Flight time</strong> opens at 10 h</li><li><strong>Dose rate at altitude</strong> opens at 0.005 mSv/h — Three to five thousandths of a millisievert an hour at 35 000 feet. Polar routes and high latitudes are at the top of that range.</li><li><strong>Annual public limit</strong> opens at 1 mSv</li><li><strong>Annual occupational limit</strong> opens at 20 mSv</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Flight time</th><th>Dose for the flight</th><th>Of the public limit</th><th>Of the work limit</th><th>Flights to reach the public limit</th></tr></thead><tbody><tr><td>5 h</td><td>0.025</td><td>2.5</td><td>0.125</td><td>40</td></tr><tr><td>10 h</td><td>0.05</td><td>5</td><td>0.25</td><td>20</td></tr><tr><td>20 h</td><td>0.1</td><td>10</td><td>0.5</td><td>10</td></tr><tr><td>50 h</td><td>0.25</td><td>25</td><td>1.25</td><td>4</td></tr><tr><td>100 h</td><td>0.5</td><td>50</td><td>2.5</td><td>2</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set flight time = 10, dose rate at altitude = 0.008, annual public limit = 1, annual occupational limit = 20: <strong>Dose for the flight</strong> = 0.08 mSv, <strong>Of the public limit</strong> = 8 %, <strong>Of the work limit</strong> = 0.4 %, <strong>Flights to reach the public limit</strong> = 12.5 flights. At a polar-route rate of 0.008 the same flight is 0.08 mSv — eight per cent of the public limit, and twelve and a half flights to reach it.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using the ground-level background.</strong> The dose in the air is the flight's, above and beyond what everyone receives at sea level, which is about 2.4 mSv a year on its own.</li><li><strong>Assuming one rate for every route.</strong> Latitude, altitude and the solar cycle move it by a factor of two. A polar route at 39 000 feet is the worst case.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Cosmic rays only.</strong> Solar particle events can spike the rate briefly, and aviation authorities reroute around them. Averages do not capture those hours.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need flight time and dose rate at altitude and annual public limit and annual occupational limit. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Dose for the flight and of the public limit and of the work limit and flights to reach the public limit should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Comparing a working flight schedule with the public limit.</li></li><li><li>Putting an aircrew's annual dose in context.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/engine-hours-to-miles-converter">Engine hours to miles</a> <a href="/everyday-life/nautical-mile">Nautical mile</a> <a href="/everyday-life/boat-speed">Boat speed</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Flight time</strong> ×10</td><td>0.05</td><td>0.5</td><td>ten times larger</td></tr><tr><td><strong>Dose rate at altitude</strong> ×10</td><td>0.05</td><td>0.5</td><td>ten times larger</td></tr><tr><td><strong>Annual public limit</strong> ×10</td><td>0.05</td><td>0.05</td><td>unchanged</td></tr><tr><td><strong>Annual occupational limit</strong> ×10</td><td>0.05</td><td>0.05</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Flight Radiation calculator work out?', 'a' => <<<'TXT'
            It returns dose for the flight and of the public limit and of the work limit and flights to reach the public limit from flight time and dose rate at altitude and annual public limit and annual occupational limit. The relationship is Flight time × Dose rate at altitude.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Flight time (h), Dose rate at altitude (mSv/h), Annual public limit (mSv), Annual occupational limit (mSv). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: flight time in h; dose rate at altitude in mSv/h; annual public limit in mSv; annual occupational limit in mSv. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How much radiation is a flight?', 'a' => 'About 0.003 to 0.005 mSv an hour at cruising altitude, so a transatlantic flight is 0.04 to 0.06 — a few chest X-rays.'],
            ['q' => 'Should I worry about it?', 'a' => 'For occasional travel, no. For aircrew and very frequent flyers it is a recognised occupational exposure with its own limits and monitoring.'],
            ['q' => 'Is the return flight the same?', 'a' => 'Nearly, and a different route can be higher. Latitude matters more than direction, because the magnetic field funnels cosmic rays toward the poles.'],
        ],
        'related' => [
            ['path' => '/everyday-life/engine-hours-to-miles-converter', 'name' => 'Engine hours to miles'],
            ['path' => '/everyday-life/nautical-mile', 'name' => 'Nautical mile'],
            ['path' => '/everyday-life/boat-speed', 'name' => 'Boat speed'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
