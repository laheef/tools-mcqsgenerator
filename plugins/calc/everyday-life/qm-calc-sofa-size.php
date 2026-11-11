<?php

/**
 * Sofa Size Calculator
 * /everyday-life/sofa-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sofa Size Calculator',
    'meta' => ['title' => 'Sofa Size — Wall Space, Walkway and Whether It Fits', 'description' => 'A sofa against a wall leaves the rest of the room for walking through: the clearance left, the walkway it allows and the share of the wall it takes up.', 'h1' => 'Sofa Size Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'room',
                    'label' => 'Wall length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '144',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sofa',
                    'label' => 'Sofa width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '84',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'walkway',
                    'label' => 'Walkway you want',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '36',
                    'help' => 'Thirty-six inches is the minimum for two people to pass; twenty-four is a squeeze and eighteen is a shuffle.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'clearance',
                    'label' => 'Wall left over',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'spare',
                    'label' => 'Beyond the walkway',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'share',
                    'label' => 'Share of the wall',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'fits',
                    'label' => 'Room for the walkway',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yes/no',
                ],
            ],
        ],
    ],
    'formula' => ['clearance' => 'room - sofa', 'spare' => 'room - sofa - walkway', 'share' => 'sofa / room * 100', 'fits' => 'if_else(room - sofa >= walkway, 1, 0)'],
    'article' => [
        'intro' => 'How much wall is left either side of a sofa, the walkway that leaves, and what share of the wall the sofa occupies — the check before a delivery van arrives.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A sofa is the largest thing most people buy for a room and the last thing they measure for. An 84-inch sofa on a 144-inch wall leaves 60 inches, which is a 36-inch walkway and 24 inches spare, and takes 58 per cent of the wall.</p><p>Under 36 inches of clearance the walkway has to come from somewhere else — usually the middle of the room, which is why sofas that fit perfectly still make a room feel crowded.</p><p>The answer is <strong>wall left over and beyond the walkway and share of the wall and room for the walkway</strong>, worked out from wall length and sofa width and walkway you want. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>clearance</strong></td><td><code>Wall length - Sofa width</code></td></tr><tr><td><strong>spare</strong></td><td><code>Wall length - Sofa width - Walkway you want</code></td></tr><tr><td><strong>share</strong></td><td><code>Sofa width ÷ Wall length × 100</code></td></tr><tr><td><strong>fits</strong></td><td><code>if_else(Wall length - Sofa width >= Walkway you want, 1, 0)</code></td></tr></tbody></table><p>The wall less the sofa gives the clearance, and less the walkway again gives what is spare. The share is the sofa over the wall, and the fits line is a comparison that answers one or zero.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports wall left over and beyond the walkway and share of the wall and room for the walkway.</p><ul><li><strong>Wall length</strong> — in.</li><li><strong>Sofa width</strong> — in.</li><li><strong>Walkway you want</strong> — in. Thirty-six inches is the minimum for two people to pass; twenty-four is a squeeze and eighteen is a shuffle.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Wall left over</strong> — in.</li><li><strong>Beyond the walkway</strong> — in.</li><li><strong>Share of the wall</strong> — %.</li><li><strong>Room for the walkway</strong> — yes/no.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put wall length = 144 in, sofa width = 84 in, walkway you want = 36 in into the form and the panel reads:</p><ul><li><strong>Wall left over</strong> = <code>Wall length - Sofa width</code> = <strong>60 in</strong></li><li><strong>Beyond the walkway</strong> = <code>Wall length - Sofa width - Walkway you want</code> = <strong>24 in</strong></li><li><strong>Share of the wall</strong> = <code>Sofa width ÷ Wall length × 100</code> = <strong>58.333 %</strong></li><li><strong>Room for the walkway</strong> = <code>if_else(Wall length - Sofa width >= Walkway you want, 1, 0)</code> = <strong>1 yes/no</strong></li></ul><p>A 108-inch sofa on the same wall leaves 36 inches — exactly the walkway, with nothing to spare, which is what "it just fits" means in practice.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>144 - 84</code>, which comes to <strong>60 in</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>An 84-inch sofa on a 144-inch wall leaves 60 inches: 24 beyond a 36-inch walkway, 58.3 per cent of the wall, and it fits.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Wall left over</th><th>Beyond the walkway</th><th>Share of the wall</th><th>Room for the walkway</th></tr></thead><tbody><tr><td><strong>Wall length</strong> +10 %</td><td>+24 %</td><td>+60 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Sofa width</strong> +10 %</td><td>−14 %</td><td>−35 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Walkway you want</strong> +10 %</td><td>+0 %</td><td>−15 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Wall length</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Wall length</strong> opens at 144 in</li><li><strong>Sofa width</strong> opens at 84 in</li><li><strong>Walkway you want</strong> opens at 36 in — Thirty-six inches is the minimum for two people to pass; twenty-four is a squeeze and eighteen is a shuffle.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Wall length</th><th>Wall left over</th><th>Beyond the walkway</th><th>Share of the wall</th><th>Room for the walkway</th></tr></thead><tbody><tr><td>72 in</td><td>-12</td><td>-48</td><td>116.667</td><td>0</td></tr><tr><td>144 in</td><td>60</td><td>24</td><td>58.333</td><td>1</td></tr><tr><td>288 in</td><td>204</td><td>168</td><td>29.167</td><td>1</td></tr><tr><td>720 in</td><td>636</td><td>600</td><td>11.667</td><td>1</td></tr><tr><td>1 440 in</td><td>1 356</td><td>1 320</td><td>5.833</td><td>1</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set wall length = 144, sofa width = 108, walkway you want = 36: <strong>Wall left over</strong> = 36 in, <strong>Beyond the walkway</strong> = 0 in, <strong>Share of the wall</strong> = 75 %, <strong>Room for the walkway</strong> = 1 yes/no. A 108-inch sofa leaves exactly 36 inches: it fits, takes 75 per cent of the wall and leaves no spare at all.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Measuring the wall, not the route.</strong> A sofa that fits the wall can still fail at the stairwell. Measure the doorways and the turn before ordering.</li><li><strong>Forgetting the arm clearance.</strong> Sofas need two to four inches at each end to get past a radiator or a doorway, and a wall-to-wall fit has to be exact to the half inch.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One wall, one sofa.</strong> A corner arrangement needs both walls and the corner measured, which is a different sum.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need wall length and sofa width and walkway you want. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Wall left over and beyond the walkway and share of the wall and room for the walkway should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking a sofa against a wall before delivery day.</li></li><li><li>Deciding between two lengths on the shop floor.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/rug-size">Rug size</a> <a href="/everyday-life/bed-size">Bed size</a> <a href="/everyday-life/tablecloth-size">Tablecloth size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Wall length</strong> ×10</td><td>60</td><td>1 356</td><td>×22.6</td></tr><tr><td><strong>Sofa width</strong> ×10</td><td>60</td><td>-696</td><td>×-11.6</td></tr><tr><td><strong>Walkway you want</strong> ×10</td><td>60</td><td>60</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sofa Size calculator work out?', 'a' => <<<'TXT'
            It returns wall left over and beyond the walkway and share of the wall and room for the walkway from wall length and sofa width and walkway you want. The relationship is Wall length - Sofa width.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Wall length (in), Sofa width (in), Walkway you want (in). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: wall length in in; sofa width in in; walkway you want in in. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How much space should be left around a sofa?', 'a' => 'Thirty-six inches for a main walkway, eighteen inches to squeeze past, and two to four inches at the ends for getting it in.'],
            ['q' => 'Does a sofa need to sit against a wall?', 'a' => 'No. Floating it on a rug with a walkway behind is a better arrangement in a large room, and then the wall measurement matters less.'],
            ['q' => 'How do I measure a room for delivery?', 'a' => 'Doorway width, hallway width and the tightest turn. A sofa is a rigid rectangle and the diagonal is the number that gets it round a corner.'],
        ],
        'related' => [
            ['path' => '/everyday-life/rug-size', 'name' => 'Rug size'],
            ['path' => '/everyday-life/bed-size', 'name' => 'Bed size'],
            ['path' => '/everyday-life/tablecloth-size', 'name' => 'Tablecloth size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
