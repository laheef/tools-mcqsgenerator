<?php

/**
 * Lighting Calculator
 * /everyday-life/lighting
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lighting Calculator',
    'meta' => ['title' => 'Lighting Calculator — How Many Bulbs a Room Needs', 'description' => 'How much light a room needs, from its floor area and the job done in it, and how many bulbs of a given output it takes to deliver it. The formula is shown.', 'h1' => 'Lighting Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Room length',
                    'type' => 'number',
                    'suffix' => 'm',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Room width',
                    'type' => 'number',
                    'suffix' => 'm',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'lux',
                    'label' => 'What the room is used for',
                    'type' => 'select',
                    'options' => [
                        'Living room, 150 lux' => 150,
                        'Kitchen worktop, 300 lux' => 300,
                        'Bedroom, 100 lux' => 100,
                        'Bathroom, 200 lux' => 200,
                        'Study or desk, 400 lux' => 400,
                    ],
                    'control' => 'SELECT',
                    'default' => 'Living room, 150 lux',
                ],
                [
                    'name' => 'lumens',
                    'label' => 'Light output of one bulb',
                    'type' => 'number',
                    'suffix' => 'lm',
                    'default' => '800',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'area',
                    'label' => 'Floor area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²',
                ],
                [
                    'name' => 'lumens_needed',
                    'label' => 'Light needed in total',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lm',
                ],
                [
                    'name' => 'bulbs',
                    'label' => 'Bulbs needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'bulbs',
                ],
                [
                    'name' => 'lumens_fitted',
                    'label' => 'Light the bulbs deliver',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lm',
                ],
            ],
        ],
    ],
    'formula' => ['area' => 'length * width', 'lumens_needed' => 'length * width * lux', 'bulbs' => 'ceil(length * width * lux / lumens)', 'lumens_fitted' => 'ceil(length * width * lux / lumens) * lumens'],
    'article' => [
        'intro' => 'Area times the illumination a room type needs, divided by the output of one bulb. The answer is a count of bulbs, rounded up, with the total light in lumens.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Lighting a room is a multiplication and a division. Illuminance is measured in lux, which is lumens per square metre, so a room of twenty square metres at a hundred and fifty lux wants three thousand lumens in it.</p><p>Bulbs are sold in lumens and households still talk in watts, which is the confusion this page is built around. An old 60 W bulb made about 800 lumens; a 9 W LED makes the same. Put the lumen figure in and the count comes out.</p><p>The answer is <strong>floor area and light needed in total and bulbs needed and light the bulbs deliver</strong>, worked out from room length and room width and what the room is used for and light output of one bulb. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>area</strong></td><td><code>Room length × Room width</code></td></tr><tr><td><strong>lumens_needed</strong></td><td><code>Room length × Room width × What the room is used for</code></td></tr><tr><td><strong>bulbs</strong></td><td><code>ceil(Room length × Room width × What the room is used for ÷ Light output of one bulb)</code></td></tr><tr><td><strong>lumens_fitted</strong></td><td><code>ceil(Room length × Room width × What the room is used for ÷ Light output of one bulb) × Light output of one bulb</code></td></tr></tbody></table><p>Area times lux is the light the room needs, in lumens. Dividing by the lumens of one bulb gives a fraction of a bulb, and the ceiling of that fraction is how many you have to buy, since half a bulb lights nothing.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports floor area and light needed in total and bulbs needed and light the bulbs deliver.</p><ul><li><strong>Room length</strong> — m.</li><li><strong>Room width</strong> — m.</li><li><strong>What the room is used for</strong>. A choice: Living room, 150 lux, Kitchen worktop, 300 lux, Bedroom, 100 lux, Bathroom, 200 lux, Study or desk, 400 lux.</li><li><strong>Light output of one bulb</strong> — lm.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Floor area</strong> — m².</li><li><strong>Light needed in total</strong> — lm.</li><li><strong>Bulbs needed</strong> — bulbs.</li><li><strong>Light the bulbs deliver</strong> — lm.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put room length = 5 m, room width = 4 m, what the room is used for = 150, light output of one bulb = 800 lm into the form and the panel reads:</p><ul><li><strong>Floor area</strong> = <code>Room length × Room width</code> = <strong>20 m²</strong></li><li><strong>Light needed in total</strong> = <code>Room length × Room width × What the room is used for</code> = <strong>3 000 lm</strong></li><li><strong>Bulbs needed</strong> = <code>ceil(Room length × Room width × What the room is used for ÷ Light output of one bulb)</code> = <strong>4 bulbs</strong></li><li><strong>Light the bulbs deliver</strong> = <code>ceil(Room length × Room width × What the room is used for ÷ Light output of one bulb) × Light output of one bulb</code> = <strong>3 200 lm</strong></li></ul><p>Switch the room to a kitchen worktop and the same room needs six bulbs, because 300 lux is twice the light.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>5 × 4</code>, which comes to <strong>20 m²</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A room 5 m by 4 m is 20 m². At 150 lux it needs 3 000 lumens; at 800 lumens a bulb that is 3.75 bulbs, so four, which deliver 3 200 lumens between them.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Floor area</th><th>Light needed in total</th><th>Bulbs needed</th><th>Light the bulbs deliver</th></tr></thead><tbody><tr><td><strong>Room length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+25 %</td><td>+25 %</td></tr><tr><td><strong>Room width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+25 %</td><td>+25 %</td></tr><tr><td><strong>What the room is used for</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+25 %</td><td>+25 %</td></tr><tr><td><strong>Light output of one bulb</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Room length</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Room length</strong> opens at 5 m</li><li><strong>Room width</strong> opens at 4 m</li><li><strong>What the room is used for</strong> opens at 150</li><li><strong>Light output of one bulb</strong> opens at 800 lm</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Room length</th><th>Floor area</th><th>Light needed in total</th><th>Bulbs needed</th><th>Light the bulbs deliver</th></tr></thead><tbody><tr><td>2.5 m</td><td>10</td><td>1 500</td><td>2</td><td>1 600</td></tr><tr><td>5 m</td><td>20</td><td>3 000</td><td>4</td><td>3 200</td></tr><tr><td>10 m</td><td>40</td><td>6 000</td><td>8</td><td>6 400</td></tr><tr><td>25 m</td><td>100</td><td>15 000</td><td>19</td><td>15 200</td></tr><tr><td>50 m</td><td>200</td><td>30 000</td><td>38</td><td>30 400</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set room length = 5, room width = 4, what the room is used for = 300, light output of one bulb = 800: <strong>Floor area</strong> = 20 m², <strong>Light needed in total</strong> = 6 000 lm, <strong>Bulbs needed</strong> = 8 bulbs, <strong>Light the bulbs deliver</strong> = 6 400 lm. A kitchen needs twice the light of a living room, so the same floor wants eight bulbs rather than four.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Counting watts instead of lumens.</strong> Two 60 W bulbs are 1 600 lumens; two 9 W LEDs are also 1 600, and only the second pair is cheap to run.</li><li><strong>Forgetting the ceiling.</strong> The ceiling of the fraction matters: 3.75 bulbs means four, and the extra light is not wasted.</li></li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Average illumination.</strong> A single lamp in a dark corner is not the same as four spread out, even when the lumens match.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need room length and room width and what the room is used for and light output of one bulb. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Floor area and light needed in total and bulbs needed and light the bulbs deliver should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Planning the bulbs for a room before buying a fitting.</li></li><li><li>Checking whether a dim reading room is under-lit.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/lumens-to-watts">Lumens to watts</a> <a href="/everyday-life/recessed-lighting">Recessed lighting</a> <a href="/everyday-life/led-savings">LED savings</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Room length</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>Room width</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>What the room is used for</strong> ×10</td><td>20</td><td>20</td><td>unchanged</td></tr><tr><td><strong>Light output of one bulb</strong> ×10</td><td>20</td><td>20</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lighting calculator work out?', 'a' => <<<'TXT'
            It returns floor area and light needed in total and bulbs needed and light the bulbs deliver from room length and room width and what the room is used for and light output of one bulb. The relationship is Room length × Room width.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Room length (m), Room width (m), What the room is used for, Light output of one bulb (lm). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: room length in m; room width in m; light output of one bulb in lm. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why round up?', 'a' => 'Because bulbs come whole. Three and three-quarter bulbs of light needs four bulbs bought, and the extra quarter is margin rather than waste.'],
            ['q' => 'Is 150 lux enough to read by?', 'a' => 'For a living room, yes; for a desk, no. The study setting is 400 lux, which is the level a task light is meant to reach.'],
            ['q' => 'Do dark walls change the answer?', 'a' => 'They do: a dark room absorbs light and needs more of it. The page gives the average illumination and not the reflection.'],
        ],
        'related' => [
            ['path' => '/everyday-life/lumens-to-watts', 'name' => 'Lumens to watts'],
            ['path' => '/everyday-life/recessed-lighting', 'name' => 'Recessed lighting'],
            ['path' => '/everyday-life/led-savings', 'name' => 'LED savings'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
