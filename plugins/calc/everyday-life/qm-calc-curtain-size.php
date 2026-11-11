<?php

/**
 * Curtain Size Calculator
 * /everyday-life/curtain-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Curtain Size Calculator',
    'meta' => ['title' => 'Curtain Size — Panel Width, Length and Fabric', 'description' => 'Window width, drop and fullness give the panel width to buy, the total fabric across the pair, and the fabric area in square feet. The formula is shown.', 'h1' => 'Curtain Size Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'window_width',
                    'label' => 'Track or pole width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '60',
                    'help' => 'The width the curtains have to cover, which is the track, not the glass. A track that overshoots the window by six inches each side is normal.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'window_height',
                    'label' => 'Drop to the floor',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '72',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fullness',
                    'label' => 'Fullness',
                    'type' => 'select',
                    'options' => ['1.5 — pencil pleat, tight' => 1.5, '2 — standard gathered' => 2, '2.5 — deep pinch pleat' => 2.5],
                    'control' => 'SELECT',
                    'default' => '2 — standard gathered',
                ],
                [
                    'name' => 'panel_width',
                    'label' => 'Each panel, flat',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'total_width',
                    'label' => 'Fabric across the pair',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'cut_length',
                    'label' => 'Cut length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'fabric',
                    'label' => 'Fabric area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq ft',
                ],
            ],
        ],
    ],
    'formula' => ['panel_width' => 'window_width * fullness / 2', 'total_width' => 'window_width * fullness', 'cut_length' => 'window_height + 8', 'fabric' => 'window_width * fullness * (window_height + 8) / 144'],
    'article' => [
        'intro' => 'The width and length of each curtain panel for a window, from the track width, the fullness the heading needs and the allowance below the sill.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Curtains are sold as panels, and a panel is not the width of the window. The fabric has to be gathered to twice the track width to hang with folds, and the two panels share that between them.</p><p>A sixty-inch track at double fullness needs 120 inches of fabric, so each panel is 60 inches flat. Buy two 60-inch panels, or one 120-inch panel cut in half — and cut length is the drop plus a hem allowance, which is where the measurement usually goes wrong.</p><p>The answer is <strong>each panel, flat and fabric across the pair and cut length and fabric area</strong>, worked out from track or pole width and drop to the floor and fullness. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>panel_width</strong></td><td><code>Track or pole width × Fullness ÷ 2</code></td></tr><tr><td><strong>total_width</strong></td><td><code>Track or pole width × Fullness</code></td></tr><tr><td><strong>cut_length</strong></td><td><code>Drop to the floor + 8</code></td></tr><tr><td><strong>fabric</strong></td><td><code>Track or pole width × Fullness × (Drop to the floor + 8) ÷ 144</code></td></tr></tbody></table><p>Track width times fullness gives the fabric across the window; divided by two it is the flat width of each panel. Cut length is the drop plus eight inches, four at the hem and four at the heading.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports each panel, flat and fabric across the pair and cut length and fabric area.</p><ul><li><strong>Track or pole width</strong> — in. The width the curtains have to cover, which is the track, not the glass. A track that overshoots the window by six inches each side is normal.</li><li><strong>Drop to the floor</strong> — in.</li><li><strong>Fullness</strong>. A choice: 1.5 — pencil pleat, tight, 2 — standard gathered, 2.5 — deep pinch pleat.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Each panel, flat</strong> — in.</li><li><strong>Fabric across the pair</strong> — in.</li><li><strong>Cut length</strong> — in.</li><li><strong>Fabric area</strong> — sq ft.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put track or pole width = 60 in, drop to the floor = 72 in, fullness = 2 into the form and the panel reads:</p><ul><li><strong>Each panel, flat</strong> = <code>Track or pole width × Fullness ÷ 2</code> = <strong>60 in</strong></li><li><strong>Fabric across the pair</strong> = <code>Track or pole width × Fullness</code> = <strong>120 in</strong></li><li><strong>Cut length</strong> = <code>Drop to the floor + 8</code> = <strong>80 in</strong></li><li><strong>Fabric area</strong> = <code>Track or pole width × Fullness × (Drop to the floor + 8) ÷ 144</code> = <strong>66.667 sq ft</strong></li></ul><p>At two-and-a-half fullness the panels become 75 inches each and the fabric area rises to 83.3 square feet. Fullness is the input that moves the bill most.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>60 × 2 ÷ 2</code>, which comes to <strong>60 in</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A 60-inch track at double fullness and a 72-inch drop needs two 60-inch panels, 120 inches of fabric across, cut 80 inches long, which is 66.7 square feet of fabric.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Each panel, flat</th><th>Fabric across the pair</th><th>Cut length</th><th>Fabric area</th></tr></thead><tbody><tr><td><strong>Track or pole width</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Drop to the floor</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+9 %</td><td>+9 %</td></tr><tr><td><strong>Fullness</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Track or pole width</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Track or pole width</strong> opens at 60 in — The width the curtains have to cover, which is the track, not the glass. A track that overshoots the window by six inches each side is normal.</li><li><strong>Drop to the floor</strong> opens at 72 in</li><li><strong>Fullness</strong> opens at 2</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Track or pole width</th><th>Each panel, flat</th><th>Fabric across the pair</th><th>Cut length</th><th>Fabric area</th></tr></thead><tbody><tr><td>30 in</td><td>30</td><td>60</td><td>80</td><td>33.333</td></tr><tr><td>60 in</td><td>60</td><td>120</td><td>80</td><td>66.667</td></tr><tr><td>120 in</td><td>120</td><td>240</td><td>80</td><td>133.333</td></tr><tr><td>300 in</td><td>300</td><td>600</td><td>80</td><td>333.333</td></tr><tr><td>600 in</td><td>600</td><td>1 200</td><td>80</td><td>666.667</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set track or pole width = 60, drop to the floor = 72, fullness = 2.5: <strong>Each panel, flat</strong> = 75 in, <strong>Fabric across the pair</strong> = 150 in, <strong>Cut length</strong> = 80 in, <strong>Fabric area</strong> = 83.333 sq ft. Deep pinch pleats at two-and-a-half fullness give 75-inch panels and 83.3 square feet, a quarter more fabric than the gathered pair.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Measuring the glass.</strong> Curtains cover the track and overlap in the middle. A track is wider than the window, and measuring the glass gives curtains that will not meet.</li><li><strong>Forgetting the heading and hem.</strong> Eight inches is the allowance here: four for a hem, four for a heading. A lined curtain or a deep pleat needs more.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Two panels, one window.</strong> A bay or a very wide opening needs more panels, and fabric widths of 54 or 60 inches decide how many drops.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need track or pole width and drop to the floor and fullness. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Each panel, flat and fabric across the pair and cut length and fabric area should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Working out how many metres of fabric to buy.</li></li><li><li>Checking whether a ready-made pair will cover the window.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/blind-size">Blind size</a> <a href="/everyday-life/tablecloth-size">Tablecloth size</a> <a href="/everyday-life/rug-size">Rug size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Track or pole width</strong> ×10</td><td>60</td><td>600</td><td>ten times larger</td></tr><tr><td><strong>Drop to the floor</strong> ×10</td><td>60</td><td>60</td><td>unchanged</td></tr><tr><td><strong>Fullness</strong> ×10</td><td>60</td><td>600</td><td>ten times larger</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Curtain Size calculator work out?', 'a' => <<<'TXT'
            It returns each panel, flat and fabric across the pair and cut length and fabric area from track or pole width and drop to the floor and fullness. The relationship is Track or pole width × Fullness ÷ 2.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Track or pole width (in), Drop to the floor (in), Fullness. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: track or pole width in in; drop to the floor in in. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why does fullness change the panel width?', 'a' => <<<'TXT'
            Because gathered fabric only covers a fraction of its flat width once the heading pulls it in. Two times fullness is the standard gathered look; one and a half looks tight and flat, two and a half looks generous.
            TXT],
            ['q' => 'How much extra length should I add?', 'a' => <<<'TXT'
            Four inches for a hem and four for a heading is a working allowance. Add more for a lined curtain, a deep pleat or a pattern that has to be matched across panels.
            TXT],
            ['q' => 'Do curtains have to reach the floor?', 'a' => 'No: a sill length is common in kitchens and a radiator-length in living rooms. The drop box takes whichever you measured.'],
        ],
        'related' => [
            ['path' => '/everyday-life/blind-size', 'name' => 'Blind size'],
            ['path' => '/everyday-life/tablecloth-size', 'name' => 'Tablecloth size'],
            ['path' => '/everyday-life/rug-size', 'name' => 'Rug size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
