<?php

/**
 * Standing Desk Height Calculator
 * /everyday-life/standing-desk-height
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Standing Desk Height Calculator',
    'meta' => ['title' => 'Standing Desk Height — Elbow, Screen and the 0.61', 'description' => 'A standing desk sits at about 61 per cent of your height, with the keyboard at elbow height and the top of the screen at eye level. Three numbers, one setup.', 'h1' => 'Standing Desk Height Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'height',
                    'label' => 'Your height',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '175',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'desk_ratio',
                    'label' => 'Desk as a share of height',
                    'type' => 'number',
                    'suffix' => 'x',
                    'default' => '0.61',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'elbow_ratio',
                    'label' => 'Elbow height as a share',
                    'type' => 'number',
                    'suffix' => 'x',
                    'default' => '0.63',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'eye_ratio',
                    'label' => 'Eye level standing',
                    'type' => 'number',
                    'suffix' => 'x',
                    'default' => '0.94',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'desk',
                    'label' => 'Desk height',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
                [
                    'name' => 'elbow',
                    'label' => 'Elbow height',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
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
                    'name' => 'screen_mid',
                    'label' => 'Middle of the screen',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
            ],
        ],
    ],
    'formula' => ['desk' => 'height * desk_ratio', 'elbow' => 'height * elbow_ratio', 'eye' => 'height * eye_ratio', 'screen_mid' => 'height * eye_ratio - 10'],
    'article' => [
        'intro' => 'The height a standing desk should be for a given person, the elbow height the keyboard belongs at, and the eye level the top of the monitor should reach.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Standing to work is a posture, not a cure, and the posture only works at the right height. A standing desk sits at about 61 per cent of your height — 106.75 centimetres for 175 — with the keyboard at elbow height, which is 63 per cent or 110.25.</p><p>Those two figures are four centimetres apart, which is why the keyboard usually ends up on a slightly lower tray and the screen on a riser. The screen's top goes at eye level, 164.5, and the gaze falls a little to the middle of it.</p><p>The answer is <strong>desk height and elbow height and eye level and middle of the screen</strong>, worked out from your height and desk as a share of height and elbow height as a share and eye level standing. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>desk</strong></td><td><code>Your height × Desk as a share of height</code></td></tr><tr><td><strong>elbow</strong></td><td><code>Your height × Elbow height as a share</code></td></tr><tr><td><strong>eye</strong></td><td><code>Your height × Eye level standing</code></td></tr><tr><td><strong>screen_mid</strong></td><td><code>Your height × Eye level standing - 10</code></td></tr></tbody></table><p>Height times the ratio for each reference point. The desk and the elbow height are close by design: the desk sits a little below the elbow so the wrist can be flat, and the keyboard tray takes the difference.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports desk height and elbow height and eye level and middle of the screen.</p><ul><li><strong>Your height</strong> — cm.</li><li><strong>Desk as a share of height</strong> — x.</li><li><strong>Elbow height as a share</strong> — x.</li><li><strong>Eye level standing</strong> — x.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Desk height</strong> — cm.</li><li><strong>Elbow height</strong> — cm.</li><li><strong>Eye level</strong> — cm.</li><li><strong>Middle of the screen</strong> — cm.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put your height = 175 cm, desk as a share of height = 0.61 x, elbow height as a share = 0.63 x, eye level standing = 0.94 x into the form and the panel reads:</p><ul><li><strong>Desk height</strong> = <code>Your height × Desk as a share of height</code> = <strong>106.75 cm</strong></li><li><strong>Elbow height</strong> = <code>Your height × Elbow height as a share</code> = <strong>110.25 cm</strong></li><li><strong>Eye level</strong> = <code>Your height × Eye level standing</code> = <strong>164.5 cm</strong></li><li><strong>Middle of the screen</strong> = <code>Your height × Eye level standing - 10</code> = <strong>154.5 cm</strong></li></ul><p>At 165 cm the desk falls to 100.65 and the screen top to 155.1. Two people sharing one standing desk need it adjustable, not averaged.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>175 × 0.61</code>, which comes to <strong>106.75 cm</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>At 175 cm the desk is 106.75, the elbows 110.25 and the eyes 164.5, so the top of the screen goes at eye level and its middle sits at 154.5.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Desk height</th><th>Elbow height</th><th>Eye level</th><th>Middle of the screen</th></tr></thead><tbody><tr><td><strong>Your height</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10.65 %</td></tr><tr><td><strong>Desk as a share of height</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Elbow height as a share</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Eye level standing</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10.65 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Your height</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Your height</strong> opens at 175 cm</li><li><strong>Desk as a share of height</strong> opens at 0.61 x</li><li><strong>Elbow height as a share</strong> opens at 0.63 x</li><li><strong>Eye level standing</strong> opens at 0.94 x</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Your height</th><th>Desk height</th><th>Elbow height</th><th>Eye level</th><th>Middle of the screen</th></tr></thead><tbody><tr><td>87.5 cm</td><td>53.375</td><td>55.125</td><td>82.25</td><td>72.25</td></tr><tr><td>175 cm</td><td>106.75</td><td>110.25</td><td>164.5</td><td>154.5</td></tr><tr><td>350 cm</td><td>213.5</td><td>220.5</td><td>329</td><td>319</td></tr><tr><td>875 cm</td><td>533.75</td><td>551.25</td><td>822.5</td><td>812.5</td></tr><tr><td>1 750 cm</td><td>1 067.5</td><td>1 102.5</td><td>1 645</td><td>1 635</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set your height = 165, desk as a share of height = 0.61, elbow height as a share = 0.63, eye level standing = 0.94: <strong>Desk height</strong> = 100.65 cm, <strong>Elbow height</strong> = 103.95 cm, <strong>Eye level</strong> = 155.1 cm, <strong>Middle of the screen</strong> = 145.1 cm. At 165 cm the desk is 100.65, the elbows 103.95 and the eyes 155.1 — a desk fixed at 107 is four centimetres too high.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Standing all day.</strong> The evidence favours alternating, not standing continuously. A desk that can drop is worth more than one that only rises.</li><li><strong>Putting the screen at desk height.</strong> A laptop on a standing desk is half a metre too low, and the neck compensates by looking down for the rest of the day.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Proportions, not comfort.</strong> Shoe thickness, floor surface and personal preference move these figures by two or three centimetres.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need your height and desk as a share of height and elbow height as a share and eye level standing. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Desk height and elbow height and eye level and middle of the screen should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Setting up a standing desk you already own.</li></li><li><li>Choosing an adjustable desk's range before buying.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/desk-height">Desk height</a> <a href="/everyday-life/bathroom-mirror-size">Mirror height</a> <a href="/everyday-life/sofa-size">Sofa size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Your height</strong> ×10</td><td>106.75</td><td>1 067.5</td><td>ten times larger</td></tr><tr><td><strong>Desk as a share of height</strong> ×10</td><td>106.75</td><td>1 067.5</td><td>ten times larger</td></tr><tr><td><strong>Elbow height as a share</strong> ×10</td><td>106.75</td><td>106.75</td><td>unchanged</td></tr><tr><td><strong>Eye level standing</strong> ×10</td><td>106.75</td><td>106.75</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Standing Desk Height calculator work out?', 'a' => <<<'TXT'
            It returns desk height and elbow height and eye level and middle of the screen from your height and desk as a share of height and elbow height as a share and eye level standing. The relationship is Your height × Desk as a share of height.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Your height (cm), Desk as a share of height (x), Elbow height as a share (x), Eye level standing (x). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: your height in cm; desk as a share of height in x; elbow height as a share in x; eye level standing in x. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is the right standing desk height?', 'a' => 'About 61 per cent of your height, which is 107 centimetres for 175. It should put your elbows just above the desk with the shoulders relaxed.'],
            ['q' => 'How long should I stand?', 'a' => 'Twenty to thirty minutes at a time, alternating with sitting, rather than a fixed number of hours. The switch is the benefit.'],
            ['q' => 'Do I need an anti-fatigue mat?', 'a' => 'It helps more than it sounds. Standing on a hard floor for an hour is tiring before the work is, and the mat removes a good part of that.'],
        ],
        'related' => [
            ['path' => '/everyday-life/desk-height', 'name' => 'Desk height'],
            ['path' => '/everyday-life/bathroom-mirror-size', 'name' => 'Mirror height'],
            ['path' => '/everyday-life/sofa-size', 'name' => 'Sofa size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
