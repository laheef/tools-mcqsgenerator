<?php

/**
 * Wheel Offset Calculator
 * /everyday-life/wheel-offset
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wheel Offset Calculator',
    'meta' => ['title' => 'Wheel Offset — Backspace, Front Space and Track', 'description' => 'Offset and rim width turned into backspace and front space in inches, plus how far the wheel moves out when you change offset and what that does to track.', 'h1' => 'Wheel Offset Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'rim_width',
                    'label' => 'Rim width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '8',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'offset',
                    'label' => 'Offset',
                    'type' => 'number',
                    'suffix' => 'mm',
                    'default' => '35',
                    'help' => 'Positive moves the mounting face outwards and tucks the wheel in. A stock wheel is usually between 30 and 45 mm.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'new_offset',
                    'label' => 'Offset you are considering',
                    'type' => 'number',
                    'suffix' => 'mm',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'half_width',
                    'label' => 'Half the rim width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mm',
                ],
                [
                    'name' => 'backspace',
                    'label' => 'Backspace',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'frontspace',
                    'label' => 'Front space',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'move_out',
                    'label' => 'Change, each side',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mm',
                ],
                [
                    'name' => 'track_change',
                    'label' => 'Track change',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
            ],
        ],
    ],
    'formula' => [
        'half_width' => 'rim_width * 25.4 / 2',
        'backspace' => '(rim_width * 25.4 / 2 + offset) / 25.4',
        'frontspace' => '(rim_width * 25.4 / 2 - offset) / 25.4',
        'move_out' => 'offset - new_offset',
        'track_change' => '(offset - new_offset) * 2 / 25.4',
    ],
    'article' => [
        'intro' => 'Where the mounting face sits in the rim: the backspace and front space in millimetres and inches, and how a change of offset moves the wheel in or out.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Offset is the distance from the rim's centre line to the face that bolts to the hub, in millimetres. Positive offset means the face is outboard of the centre, which pulls the wheel in towards the suspension.</p><p>An eight-inch rim is 203.2 millimetres wide, so half of it is 101.6. At 35 millimetres of offset the backspace is 136.6 millimetres — 5.38 inches — and the front space is 2.62 inches. Change to a 20 millimetre offset and the wheel moves 15 millimetres out on each side, widening the track by 1.18 inches.</p><p>The answer is <strong>half the rim width and backspace and front space and change, each side and track change</strong>, worked out from rim width and offset and offset you are considering. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>half_width</strong></td><td><code>Rim width × 25.4 ÷ 2</code></td></tr><tr><td><strong>backspace</strong></td><td><code>(Rim width × 25.4 ÷ 2 + Offset) ÷ 25.4</code></td></tr><tr><td><strong>frontspace</strong></td><td><code>(Rim width × 25.4 ÷ 2 - Offset) ÷ 25.4</code></td></tr><tr><td><strong>move_out</strong></td><td><code>Offset - Offset you are considering</code></td></tr><tr><td><strong>track_change</strong></td><td><code>(Offset - Offset you are considering) × 2 ÷ 25.4</code></td></tr></tbody></table><p>Half the rim width plus the offset is the backspace, measured from the inner lip to the mounting face. Half minus the offset is the front space. A smaller offset moves the wheel outboard by the difference, and the track widens by twice that because there are two sides.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports half the rim width and backspace and front space and change, each side and track change.</p><ul><li><strong>Rim width</strong> — in.</li><li><strong>Offset</strong> — mm. Positive moves the mounting face outwards and tucks the wheel in. A stock wheel is usually between 30 and 45 mm.</li><li><strong>Offset you are considering</strong> — mm.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Half the rim width</strong> — mm.</li><li><strong>Backspace</strong> — in.</li><li><strong>Front space</strong> — in.</li><li><strong>Change, each side</strong> — mm.</li><li><strong>Track change</strong> — in.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put rim width = 8 in, offset = 35 mm, offset you are considering = 20 mm into the form and the panel reads:</p><ul><li><strong>Half the rim width</strong> = <code>Rim width × 25.4 ÷ 2</code> = <strong>101.6 mm</strong></li><li><strong>Backspace</strong> = <code>(Rim width × 25.4 ÷ 2 + Offset) ÷ 25.4</code> = <strong>5.378 in</strong></li><li><strong>Front space</strong> = <code>(Rim width × 25.4 ÷ 2 - Offset) ÷ 25.4</code> = <strong>2.622 in</strong></li><li><strong>Change, each side</strong> = <code>Offset - Offset you are considering</code> = <strong>15 mm</strong></li><li><strong>Track change</strong> = <code>(Offset - Offset you are considering) × 2 ÷ 25.4</code> = <strong>1.181 in</strong></li></ul><p>Zero offset puts the mounting face on the centre line: 4.00 inches of backspace and 4.00 of front space on an 8-inch rim, which is the shape most deep-dish wheels are pretending to be.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>8 × 25.4 ÷ 2</code>, which comes to <strong>101.6 mm</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>An 8-inch rim at 35 mm offset has a 5.38-inch backspace and 2.62 inches of front space; at 20 mm offset it sits 15 mm further out each side and the track grows 1.18 inches.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Half the rim width</th><th>Backspace</th><th>Front space</th><th>Change, each side</th><th>Track change</th></tr></thead><tbody><tr><td><strong>Rim width</strong> +10 %</td><td>+10 %</td><td>+7.44 %</td><td>+15.26 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Offset</strong> +10 %</td><td>+0 %</td><td>+2.56 %</td><td>−5.26 %</td><td>+23.33 %</td><td>+23.33 %</td></tr><tr><td><strong>Offset you are considering</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−13.33 %</td><td>−13.33 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Offset</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Rim width</strong> opens at 8 in</li><li><strong>Offset</strong> opens at 35 mm — Positive moves the mounting face outwards and tucks the wheel in. A stock wheel is usually between 30 and 45 mm.</li><li><strong>Offset you are considering</strong> opens at 20 mm</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Rim width</th><th>Half the rim width</th><th>Backspace</th><th>Front space</th><th>Change, each side</th><th>Track change</th></tr></thead><tbody><tr><td>4 in</td><td>50.8</td><td>3.378</td><td>0.622</td><td>15</td><td>1.181</td></tr><tr><td>8 in</td><td>101.6</td><td>5.378</td><td>2.622</td><td>15</td><td>1.181</td></tr><tr><td>16 in</td><td>203.2</td><td>9.378</td><td>6.622</td><td>15</td><td>1.181</td></tr><tr><td>40 in</td><td>508</td><td>21.378</td><td>18.622</td><td>15</td><td>1.181</td></tr><tr><td>80 in</td><td>1 016</td><td>41.378</td><td>38.622</td><td>15</td><td>1.181</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set rim width = 8, offset = 35, offset you are considering = 0: <strong>Half the rim width</strong> = 101.6 mm, <strong>Backspace</strong> = 5.378 in, <strong>Front space</strong> = 2.622 in, <strong>Change, each side</strong> = 35 mm, <strong>Track change</strong> = 2.756 in. At zero offset the wheel moves 35 mm out each side, widening the track by 2.76 inches — enough to change the steering feel and to find the edge of the arch.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Confusing offset with backspace.</strong> Offset is measured from the centre line and backspace from the inner lip. They differ by half the rim width, which is four inches on an 8-inch rim.</li><li><strong>Ignoring the width change.</strong> A wider rim at the same offset adds half the extra width inside and half outside. It is the width, not the offset, that usually causes rubbing.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Rim measurements only.</strong> Tyre section width is wider than the rim and is what actually touches a strut or an arch liner.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need rim width and offset and offset you are considering. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Half the rim width and backspace and front space and change, each side and track change should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking clearance before buying a second-hand set of wheels.</li></li><li><li>Working out how far a spacer will push the wheels out.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/tire-size">Tyre size</a> <a href="/everyday-life/gvwr">GVWR</a> <a href="/everyday-life/0-60">0 to 60 time</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Rim width</strong> ×10</td><td>101.6</td><td>1 016</td><td>ten times larger</td></tr><tr><td><strong>Offset</strong> ×10</td><td>101.6</td><td>101.6</td><td>unchanged</td></tr><tr><td><strong>Offset you are considering</strong> ×10</td><td>101.6</td><td>101.6</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wheel Offset calculator work out?', 'a' => <<<'TXT'
            It returns half the rim width and backspace and front space and change, each side and track change from rim width and offset and offset you are considering. The relationship is Rim width × 25.4 ÷ 2.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Rim width (in), Offset (mm), Offset you are considering (mm). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: rim width in in; offset in mm; offset you are considering in mm. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is a lower offset always further out?', 'a' => <<<'TXT'
            Yes. Offset is measured from the centre towards the outside of the wheel, so reducing it moves the mounting face inboard relative to the rim and the wheel outboard relative to the car.
            TXT],
            ['q' => 'How much does offset affect handling?', 'a' => <<<'TXT'
            Widening the track a little increases cornering grip and steering weight; too much loads the wheel bearings and changes the scrub radius, which makes the car wander.
            TXT],
            ['q' => 'Can I use spacers instead of new wheels?', 'a' => <<<'TXT'
            A thin spacer is equivalent to reducing the offset by its thickness. Beyond about 5 mm the studs are too short, and the fix is longer studs rather than a thicker spacer.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/tire-size', 'name' => 'Tyre size'],
            ['path' => '/everyday-life/gvwr', 'name' => 'GVWR'],
            ['path' => '/everyday-life/0-60', 'name' => '0 to 60 time'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
