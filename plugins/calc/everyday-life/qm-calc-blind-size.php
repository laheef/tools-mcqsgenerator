<?php

/**
 * Blind Size Calculator
 * /everyday-life/blind-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Blind Size Calculator',
    'meta' => ['title' => 'Blind Size — Inside or Outside the Recess — Free Tool', 'description' => 'Window opening in, two blind sizes out: the recess fit that clears the frame and the outside fit that covers it, with the floor area each blind covers.', 'h1' => 'Blind Size Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'opening_width',
                    'label' => 'Opening width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '48',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'opening_height',
                    'label' => 'Opening height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '60',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'side_overlap',
                    'label' => 'Overlap each side, outside fit',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '1.5',
                    'help' => 'A blind outside the recess needs two inches each side of the opening to stop light coming round the edge.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'top_extra',
                    'label' => 'Extra above the opening',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3',
                    'help' => 'Room for the headrail and cassette above the frame.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'inside_width',
                    'label' => 'Inside fit, width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'inside_height',
                    'label' => 'Inside fit, drop',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'outside_width',
                    'label' => 'Outside fit, width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'outside_height',
                    'label' => 'Outside fit, drop',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'outside_area',
                    'label' => 'Outside fit, area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq ft',
                ],
            ],
        ],
    ],
    'formula' => [
        'inside_width' => 'opening_width - 0.25',
        'inside_height' => 'opening_height',
        'outside_width' => 'opening_width + 2 * side_overlap',
        'outside_height' => 'opening_height + top_extra',
        'outside_area' => '(opening_width + 2 * side_overlap) * (opening_height + top_extra) / 144',
    ],
    'article' => [
        'intro' => 'The width and drop of a blind fitted inside the window recess and the same for one fitted outside it, from the opening and the overlap you want over the frame.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A blind measured to the window is a quarter of an inch too wide, every time. Frames are not square, plaster beads are not straight, and the recess narrows by a millimetre somewhere along its height.</p><p>So an inside fit is the narrowest point of the opening, a quarter inch less, and an outside fit is the opening plus an overlap each side plus the headrail above. A 48 by 60 opening becomes 47.75 inside, or 51 by 63 outside — two blinds, two jobs, and one of them covers the frame.</p><p>The answer is <strong>inside fit, width and inside fit, drop and outside fit, width and outside fit, drop and outside fit, area</strong>, worked out from opening width and opening height and overlap each side, outside fit and extra above the opening. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>inside_width</strong></td><td><code>Opening width - 0.25</code></td></tr><tr><td><strong>inside_height</strong></td><td><code>Opening height</code></td></tr><tr><td><strong>outside_width</strong></td><td><code>Opening width + 2 × Overlap each side, outside fit</code></td></tr><tr><td><strong>outside_height</strong></td><td><code>Opening height + Extra above the opening</code></td></tr><tr><td><strong>outside_area</strong></td><td><code>(Opening width + 2 × Overlap each side, outside fit) × (Opening height + Extra above the opening) ÷ 144</code></td></tr></tbody></table><p>The inside width takes a quarter inch off the opening and keeps the drop. The outside fit adds twice the side overlap to the width and the top allowance to the drop, and the area converts square inches to square feet by dividing by 144.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports inside fit, width and inside fit, drop and outside fit, width and outside fit, drop and outside fit, area.</p><ul><li><strong>Opening width</strong> — in.</li><li><strong>Opening height</strong> — in.</li><li><strong>Overlap each side, outside fit</strong> — in. A blind outside the recess needs two inches each side of the opening to stop light coming round the edge.</li><li><strong>Extra above the opening</strong> — in. Room for the headrail and cassette above the frame.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Inside fit, width</strong> — in.</li><li><strong>Inside fit, drop</strong> — in.</li><li><strong>Outside fit, width</strong> — in.</li><li><strong>Outside fit, drop</strong> — in.</li><li><strong>Outside fit, area</strong> — sq ft.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put opening width = 48 in, opening height = 60 in, overlap each side, outside fit = 1.5 in, extra above the opening = 3 in into the form and the panel reads:</p><ul><li><strong>Inside fit, width</strong> = <code>Opening width - 0.25</code> = <strong>47.75 in</strong></li><li><strong>Inside fit, drop</strong> = <code>Opening height</code> = <strong>60 in</strong></li><li><strong>Outside fit, width</strong> = <code>Opening width + 2 × Overlap each side, outside fit</code> = <strong>51 in</strong></li><li><strong>Outside fit, drop</strong> = <code>Opening height + Extra above the opening</code> = <strong>63 in</strong></li><li><strong>Outside fit, area</strong> = <code>(Opening width + 2 × Overlap each side, outside fit) × (Opening height + Extra above the opening) ÷ 144</code> = <strong>22.312 sq ft</strong></li></ul><p>Inside fits look neater and let less light past; outside fits sit proud of the wall and cope with a window that has no recess at all. The two sizes differ by more than three inches in each direction.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>48 - 0.25</code>, which comes to <strong>47.75 in</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A 48 by 60 opening takes a 47.75 by 60 blind inside the recess, or a 51 by 63 blind outside it, which covers 22.3 square feet.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Inside fit, width</th><th>Inside fit, drop</th><th>Outside fit, width</th><th>Outside fit, drop</th><th>Outside fit, area</th></tr></thead><tbody><tr><td><strong>Opening width</strong> +10 %</td><td>+10.05 %</td><td>+0 %</td><td>+9.41 %</td><td>+0 %</td><td>+9.41 %</td></tr><tr><td><strong>Opening height</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+9.52 %</td><td>+9.52 %</td></tr><tr><td><strong>Overlap each side, outside fit</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0.59 %</td><td>+0 %</td><td>+0.59 %</td></tr><tr><td><strong>Extra above the opening</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0.48 %</td><td>+0.48 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Opening width</strong>. <strong>Extra above the opening</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Opening width</strong> opens at 48 in</li><li><strong>Opening height</strong> opens at 60 in</li><li><strong>Overlap each side, outside fit</strong> opens at 1.5 in — A blind outside the recess needs two inches each side of the opening to stop light coming round the edge.</li><li><strong>Extra above the opening</strong> opens at 3 in — Room for the headrail and cassette above the frame.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Opening width</th><th>Inside fit, width</th><th>Inside fit, drop</th><th>Outside fit, width</th><th>Outside fit, drop</th><th>Outside fit, area</th></tr></thead><tbody><tr><td>24 in</td><td>23.75</td><td>60</td><td>27</td><td>63</td><td>11.812</td></tr><tr><td>48 in</td><td>47.75</td><td>60</td><td>51</td><td>63</td><td>22.312</td></tr><tr><td>96 in</td><td>95.75</td><td>60</td><td>99</td><td>63</td><td>43.312</td></tr><tr><td>240 in</td><td>239.75</td><td>60</td><td>243</td><td>63</td><td>106.312</td></tr><tr><td>480 in</td><td>479.75</td><td>60</td><td>483</td><td>63</td><td>211.312</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set opening width = 48, opening height = 60, overlap each side, outside fit = 2, extra above the opening = 4: <strong>Inside fit, width</strong> = 47.75 in, <strong>Inside fit, drop</strong> = 60 in, <strong>Outside fit, width</strong> = 52 in, <strong>Outside fit, drop</strong> = 64 in, <strong>Outside fit, area</strong> = 23.111 sq ft. A two-inch overlap each side and four inches above gives a 52 by 64 blind, which covers 23.1 square feet and clears the frame by an inch.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Measuring once.</strong> Measure the width at the top, the middle and the bottom of the recess and take the smallest. The same for height, at both sides.</li><li><strong>Forgetting the tiles.</strong> A tiled or beaded recess is narrower than the bare opening, and a blind that measures the plaster fits nothing.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One blind, one window.</strong> A bay window needs a blind per face, and the angles need the projection as well as the opening.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need opening width and opening height and overlap each side, outside fit and extra above the opening. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Inside fit, width and inside fit, drop and outside fit, width and outside fit, drop and outside fit, area should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Ordering a made-to-measure blind without a fitter.</li></li><li><li>Deciding between a recess fit and an outside fit.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/curtain-size">Curtain size</a> <a href="/everyday-life/tablecloth-size">Tablecloth size</a> <a href="/everyday-life/picture-frame">Picture frame</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Opening width</strong> ×10</td><td>47.75</td><td>479.75</td><td>×10.047</td></tr><tr><td><strong>Opening height</strong> ×10</td><td>47.75</td><td>47.75</td><td>unchanged</td></tr><tr><td><strong>Overlap each side, outside fit</strong> ×10</td><td>47.75</td><td>47.75</td><td>unchanged</td></tr><tr><td><strong>Extra above the opening</strong> ×10</td><td>47.75</td><td>47.75</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Blind Size calculator work out?', 'a' => <<<'TXT'
            It returns inside fit, width and inside fit, drop and outside fit, width and outside fit, drop and outside fit, area from opening width and opening height and overlap each side, outside fit and extra above the opening. The relationship is Opening width - 0.25.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Opening width (in), Opening height (in), Overlap each side, outside fit (in), Extra above the opening (in). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: opening width in in; opening height in in; overlap each side, outside fit in in; extra above the opening in in. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why take a quarter inch off an inside fit?', 'a' => <<<'TXT'
            Because the recess is never exactly the size on the tape. The blind has to clear the deepest narrow point, and a quarter inch is the allowance that keeps a roller blind from touching the sides as it turns.
            TXT],
            ['q' => 'How much overlap does an outside fit need?', 'a' => <<<'TXT'
            Two inches each side and three or four above is the usual minimum, which stops light leaking round the edges. More overlap looks heavier and blocks more of the wall.
            TXT],
            ['q' => 'Is the drop the same for both fits?', 'a' => <<<'TXT'
            No. Inside, the drop is the opening height and often half an inch less so the blind clears the sill. Outside, the drop is the opening plus the headrail above it.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/curtain-size', 'name' => 'Curtain size'],
            ['path' => '/everyday-life/tablecloth-size', 'name' => 'Tablecloth size'],
            ['path' => '/everyday-life/picture-frame', 'name' => 'Picture frame'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
