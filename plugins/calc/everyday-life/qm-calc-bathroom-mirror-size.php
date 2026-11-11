<?php

/**
 * Bathroom Mirror Height Calculator
 * /everyday-life/bathroom-mirror-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bathroom Mirror Height Calculator',
    'meta' => ['title' => 'Bathroom Mirror — Centre It on Eye Level — Free Tool', 'description' => 'A mirror is hung to the person, not the wall: eye level from height, the mirror\'s top and bottom, and the gap above a vanity that decides whether it works.', 'h1' => 'Bathroom Mirror Height Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'height',
                    'label' => 'User height',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '175',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mirror',
                    'label' => 'Mirror height',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '60',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'vanity',
                    'label' => 'Vanity height',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '85',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'eye_ratio',
                    'label' => 'Eye level as a share of height',
                    'type' => 'number',
                    'suffix' => 'x',
                    'default' => '0.94',
                    'help' => 'Eye height is about 94 per cent of standing height for an adult, and closer to 90 for a child.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'eye',
                    'label' => 'Eye level',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
                [
                    'name' => 'bottom',
                    'label' => 'Mirror bottom',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
                [
                    'name' => 'top',
                    'label' => 'Mirror top',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
                [
                    'name' => 'gap',
                    'label' => 'Clearance over the vanity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
            ],
        ],
    ],
    'formula' => ['eye' => 'height * eye_ratio', 'bottom' => 'height * eye_ratio - mirror / 2', 'top' => 'height * eye_ratio + mirror / 2', 'gap' => 'height * eye_ratio - mirror / 2 - vanity'],
    'article' => [
        'intro' => <<<'TXT'
        Where the middle of a bathroom mirror should sit, the top and bottom edges that gives, and the gap between the bottom edge and the vanity, so a mirror is hung once.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A mirror is used at eye level, so the middle of it should sit at eye level. At 175 centimetres tall the eyes are around 164.5, and a 60-centimetre mirror centred there runs from 134.5 to 194.5.</p><p>The gap over the vanity is the check. Fifty centimetres over an 85-centimetre vanity is fine; a 70-centimetre mirror leaves only 45, which is still usable and looks squeezed.</p><p>The answer is <strong>eye level and mirror bottom and mirror top and clearance over the vanity</strong>, worked out from user height and mirror height and vanity height and eye level as a share of height. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>eye</strong></td><td><code>User height × Eye level as a share of height</code></td></tr><tr><td><strong>bottom</strong></td><td><code>User height × Eye level as a share of height - Mirror height ÷ 2</code></td></tr><tr><td><strong>top</strong></td><td><code>User height × Eye level as a share of height + Mirror height ÷ 2</code></td></tr><tr><td><strong>gap</strong></td><td><code>User height × Eye level as a share of height - Mirror height ÷ 2 - Vanity height</code></td></tr></tbody></table><p>Height times the eye ratio gives eye level. Half the mirror either side of that gives the edges, and subtracting the vanity height gives the clearance between the two.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports eye level and mirror bottom and mirror top and clearance over the vanity.</p><ul><li><strong>User height</strong> — cm.</li><li><strong>Mirror height</strong> — cm.</li><li><strong>Vanity height</strong> — cm.</li><li><strong>Eye level as a share of height</strong> — x. Eye height is about 94 per cent of standing height for an adult, and closer to 90 for a child.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Eye level</strong> — cm.</li><li><strong>Mirror bottom</strong> — cm.</li><li><strong>Mirror top</strong> — cm.</li><li><strong>Clearance over the vanity</strong> — cm.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put user height = 175 cm, mirror height = 60 cm, vanity height = 85 cm, eye level as a share of height = 0.94 x into the form and the panel reads:</p><ul><li><strong>Eye level</strong> = <code>User height × Eye level as a share of height</code> = <strong>164.5 cm</strong></li><li><strong>Mirror bottom</strong> = <code>User height × Eye level as a share of height - Mirror height ÷ 2</code> = <strong>134.5 cm</strong></li><li><strong>Mirror top</strong> = <code>User height × Eye level as a share of height + Mirror height ÷ 2</code> = <strong>194.5 cm</strong></li><li><strong>Clearance over the vanity</strong> = <code>User height × Eye level as a share of height - Mirror height ÷ 2 - Vanity height</code> = <strong>49.5 cm</strong></li></ul><p>A household with a child and an adult should hang to the shorter eye line and accept a little looking up, or fit a mirror with a tilt.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>175 × 0.94</code>, which comes to <strong>164.5 cm</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A 175 cm person with a 60 cm mirror has an eye level of 164.5 cm: the mirror runs from 134.5 to 194.5, leaving 49.5 cm above an 85 cm vanity.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Eye level</th><th>Mirror bottom</th><th>Mirror top</th><th>Clearance over the vanity</th></tr></thead><tbody><tr><td><strong>User height</strong> +10 %</td><td>+10 %</td><td>+12.23 %</td><td>+8.46 %</td><td>+33.23 %</td></tr><tr><td><strong>Mirror height</strong> +10 %</td><td>+0 %</td><td>−2.23 %</td><td>+1.54 %</td><td>−6.06 %</td></tr><tr><td><strong>Vanity height</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−17.17 %</td></tr><tr><td><strong>Eye level as a share of height</strong> +10 %</td><td>+10 %</td><td>+12.23 %</td><td>+8.46 %</td><td>+33.23 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>User height</strong>. <strong>Mirror height</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>User height</strong> opens at 175 cm</li><li><strong>Mirror height</strong> opens at 60 cm</li><li><strong>Vanity height</strong> opens at 85 cm</li><li><strong>Eye level as a share of height</strong> opens at 0.94 x — Eye height is about 94 per cent of standing height for an adult, and closer to 90 for a child.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>User height</th><th>Eye level</th><th>Mirror bottom</th><th>Mirror top</th><th>Clearance over the vanity</th></tr></thead><tbody><tr><td>87.5 cm</td><td>82.25</td><td>52.25</td><td>112.25</td><td>-32.75</td></tr><tr><td>175 cm</td><td>164.5</td><td>134.5</td><td>194.5</td><td>49.5</td></tr><tr><td>350 cm</td><td>329</td><td>299</td><td>359</td><td>214</td></tr><tr><td>875 cm</td><td>822.5</td><td>792.5</td><td>852.5</td><td>707.5</td></tr><tr><td>1 750 cm</td><td>1 645</td><td>1 615</td><td>1 675</td><td>1 530</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set user height = 160, mirror height = 60, vanity height = 85, eye level as a share of height = 0.94: <strong>Eye level</strong> = 150.4 cm, <strong>Mirror bottom</strong> = 120.4 cm, <strong>Mirror top</strong> = 180.4 cm, <strong>Clearance over the vanity</strong> = 35.4 cm. At 160 cm the eye level is 150.4, so the mirror runs from 120.4 to 180.4 — 35.4 cm over the vanity, which is tight.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Hanging to the ceiling line.</strong> The top of the mirror aligned with the tile course looks tidy and puts the middle of the glass above everybody's head.</li><li><strong>Ignoring the basin.</strong> The clearance is measured from the tap, not the counter, and a tall tap needs its own ten centimetres.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One user.</strong> A shared bathroom has an average eye level, and the range between a 160 and a 190 centimetre person is 28 centimetres of mirror.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need user height and mirror height and vanity height and eye level as a share of height. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Eye level and mirror bottom and mirror top and clearance over the vanity should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Hanging a new mirror without measuring five times.</li></li><li><li>Checking whether a mirror in a shop is the right height for the room.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/desk-height">Desk height</a> <a href="/everyday-life/standing-desk-height">Standing desk height</a> <a href="/everyday-life/blind-size">Blind size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>User height</strong> ×10</td><td>164.5</td><td>1 645</td><td>ten times larger</td></tr><tr><td><strong>Mirror height</strong> ×10</td><td>164.5</td><td>164.5</td><td>unchanged</td></tr><tr><td><strong>Vanity height</strong> ×10</td><td>164.5</td><td>164.5</td><td>unchanged</td></tr><tr><td><strong>Eye level as a share of height</strong> ×10</td><td>164.5</td><td>1 645</td><td>ten times larger</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bathroom Mirror Height calculator work out?', 'a' => <<<'TXT'
            It returns eye level and mirror bottom and mirror top and clearance over the vanity from user height and mirror height and vanity height and eye level as a share of height. The relationship is User height × Eye level as a share of height.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'User height (cm), Mirror height (cm), Vanity height (cm), Eye level as a share of height (x). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: user height in cm; mirror height in cm; vanity height in cm; eye level as a share of height in x. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What height should a bathroom mirror be hung?', 'a' => 'Centre the mirror on the eye level of the people who use it, which is about 94 per cent of standing height. For a 175 cm adult that is 164.5 cm.'],
            ['q' => 'How much gap should there be above the basin?', 'a' => 'Twenty to thirty centimetres minimum to clear the tap and the splash zone, and fifty is comfortable.'],
            ['q' => 'Does the mirror have to be centred on the basin?', 'a' => <<<'TXT'
            It should be centred on the basin and the person standing at it, which are usually the same wall position. A mirror offset from the basin looks wrong from the door.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/desk-height', 'name' => 'Desk height'],
            ['path' => '/everyday-life/standing-desk-height', 'name' => 'Standing desk height'],
            ['path' => '/everyday-life/blind-size', 'name' => 'Blind size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
