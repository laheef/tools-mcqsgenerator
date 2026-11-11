<?php

/**
 * Crosswind Calculator
 * /everyday-life/crosswind
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Crosswind Calculator',
    'meta' => ['title' => 'Crosswind — Splitting Wind into Cross and Head', 'description' => 'A 25 mph wind at 40 degrees is 16 mph across the road and 19 on the nose. The page splits the wind into the two components that decide the correction.', 'h1' => 'Crosswind Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'wind',
                    'label' => 'Wind speed',
                    'type' => 'number',
                    'suffix' => 'mph',
                    'default' => '25',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'angle',
                    'label' => 'Angle off the nose',
                    'type' => 'number',
                    'suffix' => 'deg',
                    'default' => '40',
                    'help' => 'Zero is a direct headwind, 90 is a pure crosswind, and 180 is a tailwind.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cross',
                    'label' => 'Crosswind',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mph',
                ],
                [
                    'name' => 'head',
                    'label' => 'Headwind',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mph',
                ],
                [
                    'name' => 'cross_pct',
                    'label' => 'Crosswind share',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'effective',
                    'label' => 'Component along your track',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mph',
                ],
            ],
        ],
    ],
    'formula' => ['cross' => 'wind * sin(rad(angle))', 'head' => 'wind * cos(rad(angle))', 'cross_pct' => 'sin(rad(angle)) * 100', 'effective' => 'wind * cos(rad(angle))'],
    'article' => [
        'intro' => 'The crosswind and headwind components of a wind blowing at an angle to your direction of travel, and the share of it that is pushing you sideways.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A wind at an angle is two winds at once. The component across your track has to be corrected for, and the component along it either slows you down or helps. The two are the sine and the cosine of the angle.</p><p>At 40 degrees the crosswind is 64 per cent of the total and the headwind 77 per cent, which is why a wind that feels like a headwind always has a sideways part to it. At 30 degrees the crosswind is already half the wind speed.</p><p>The answer is <strong>crosswind and headwind and crosswind share and component along your track</strong>, worked out from wind speed and angle off the nose. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>cross</strong></td><td><code>Wind speed × sin(rad(Angle off the nose))</code></td></tr><tr><td><strong>head</strong></td><td><code>Wind speed × cos(rad(Angle off the nose))</code></td></tr><tr><td><strong>cross_pct</strong></td><td><code>sin(rad(Angle off the nose)) × 100</code></td></tr><tr><td><strong>effective</strong></td><td><code>Wind speed × cos(rad(Angle off the nose))</code></td></tr></tbody></table><p>Wind times the sine of the angle gives the crosswind; times the cosine gives the headwind, which is negative for a tailwind. The percentages are the same functions without the wind speed.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill. It reports crosswind and headwind and crosswind share and component along your track.</p><ul><li><strong>Wind speed</strong> — mph.</li><li><strong>Angle off the nose</strong> — deg. Zero is a direct headwind, 90 is a pure crosswind, and 180 is a tailwind.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Crosswind</strong> — mph.</li><li><strong>Headwind</strong> — mph.</li><li><strong>Crosswind share</strong> — %.</li><li><strong>Component along your track</strong> — mph.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put wind speed = 25 mph, angle off the nose = 40 deg into the form and the panel reads:</p><ul><li><strong>Crosswind</strong> = <code>Wind speed × sin(rad(Angle off the nose))</code> = <strong>16.07 mph</strong></li><li><strong>Headwind</strong> = <code>Wind speed × cos(rad(Angle off the nose))</code> = <strong>19.151 mph</strong></li><li><strong>Crosswind share</strong> = <code>sin(rad(Angle off the nose)) × 100</code> = <strong>64.279 %</strong></li><li><strong>Component along your track</strong> = <code>Wind speed × cos(rad(Angle off the nose))</code> = <strong>19.151 mph</strong></li></ul><p>A quartering wind at 45 degrees splits evenly: 70.7 per cent each way. Beyond 60 degrees the crosswind dominates and the headwind stops mattering.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>25 × sin(rad(40))</code>, which comes to <strong>16.07 mph</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A 25 mph wind at 40 degrees is 16.1 mph across the track and 19.2 mph on the nose, so 64 per cent of it is sideways and 77 per cent of it is slowing you.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Crosswind</th><th>Headwind</th><th>Crosswind share</th><th>Component along your track</th></tr></thead><tbody><tr><td><strong>Wind speed</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Angle off the nose</strong> +10 %</td><td>+8.07 %</td><td>−6.1 %</td><td>+8.07 %</td><td>−6.1 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Wind speed</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Wind speed</strong> opens at 25 mph</li><li><strong>Angle off the nose</strong> opens at 40 deg — Zero is a direct headwind, 90 is a pure crosswind, and 180 is a tailwind.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Wind speed</th><th>Crosswind</th><th>Headwind</th><th>Crosswind share</th><th>Component along your track</th></tr></thead><tbody><tr><td>12.5 mph</td><td>8.035</td><td>9.576</td><td>64.279</td><td>9.576</td></tr><tr><td>25 mph</td><td>16.07</td><td>19.151</td><td>64.279</td><td>19.151</td></tr><tr><td>50 mph</td><td>32.139</td><td>38.302</td><td>64.279</td><td>38.302</td></tr><tr><td>125 mph</td><td>80.348</td><td>95.756</td><td>64.279</td><td>95.756</td></tr><tr><td>250 mph</td><td>160.697</td><td>191.511</td><td>64.279</td><td>191.511</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set wind speed = 25, angle off the nose = 45: <strong>Crosswind</strong> = 17.678 mph, <strong>Headwind</strong> = 17.678 mph, <strong>Crosswind share</strong> = 70.711 %, <strong>Component along your track</strong> = 17.678 mph. At 45 degrees the split is even: 17.7 mph across and 17.7 on the nose, 71 per cent each.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Subtracting the angle from the wind speed.</strong> Twenty-five at forty degrees is not fifteen sideways. The relation is trigonometric and the two components add up in quadrature, not by addition.</li><li><strong>Adding the components instead of the squares.</strong> Head squared plus cross squared equals wind squared. That is the check that the split is right.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Steady wind.</strong> Gusts add a transitory component that no component split predicts, and gust factor is a separate question.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need wind speed and angle off the nose. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Crosswind and headwind and crosswind share and component along your track should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Judging a crosswind landing against a limit.</li></li><li><li>Working out what a side wind does to fuel use or to a bike.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/boat-speed">Boat speed</a> <a href="/everyday-life/rpm">RPM calculator</a> <a href="/everyday-life/traffic-density">Traffic density</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Wind speed</strong> ×10</td><td>16.07</td><td>160.697</td><td>ten times larger</td></tr><tr><td><strong>Angle off the nose</strong> ×10</td><td>16.07</td><td>16.07</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Crosswind calculator work out?', 'a' => <<<'TXT'
            It returns crosswind and headwind and crosswind share and component along your track from wind speed and angle off the nose. The relationship is Wind speed × sin(rad(Angle off the nose)).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Wind speed (mph), Angle off the nose (deg). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: wind speed in mph; angle off the nose in deg. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is a strong crosswind for a light aircraft?', 'a' => 'A direct crosswind of 15 knots is a lot for a light plane and many have a 17-knot demonstrated limit. The number on the dial is the crosswind, not the wind.'],
            ['q' => 'Why is the headwind cosine?', 'a' => 'Because at zero angle the whole wind is on the nose — cosine zero is one — and at 90 degrees none of it is, which is cosine 90.'],
            ['q' => 'Does a tailwind count as negative?', 'a' => 'Yes. The headwind result goes negative past 90 degrees, and that negative number is the tailwind component.'],
        ],
        'related' => [
            ['path' => '/everyday-life/boat-speed', 'name' => 'Boat speed'],
            ['path' => '/everyday-life/rpm', 'name' => 'RPM calculator'],
            ['path' => '/everyday-life/traffic-density', 'name' => 'Traffic density'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
