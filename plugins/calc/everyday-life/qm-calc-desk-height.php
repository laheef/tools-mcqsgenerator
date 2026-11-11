<?php

/**
 * Desk Height Calculator
 * /everyday-life/desk-height
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Desk Height Calculator',
    'meta' => ['title' => 'Desk Height — Sitting, Chair and the Gap Between', 'description' => 'Height times 0.41 gives a sitting desk and height times 0.25 a chair: the two numbers that decide whether a desk is comfortable, and the gap that has to fit.', 'h1' => 'Desk Height Calculator', 'updated' => '2026-10-23'],
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
                    'default' => '0.41',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'chair_ratio',
                    'label' => 'Chair as a share of height',
                    'type' => 'number',
                    'suffix' => 'x',
                    'default' => '0.25',
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
                    'name' => 'chair',
                    'label' => 'Chair seat height',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
                [
                    'name' => 'gap',
                    'label' => 'Chair to desk',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
                [
                    'name' => 'eye',
                    'label' => 'Eye level sitting',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
            ],
        ],
    ],
    'formula' => ['desk' => 'height * desk_ratio', 'chair' => 'height * chair_ratio', 'gap' => 'height * desk_ratio - height * chair_ratio', 'eye' => 'height * 0.94 - 7'],
    'article' => [
        'intro' => <<<'TXT'
        The height a sitting desk and its chair should be for a given person, the gap between them that has to take your thighs, and the eye level they should be looking at.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Ergonomic furniture is sized to the person, not the room. A sitting desk is about 41 per cent of standing height and a chair seat about 25, which for 175 centimetres is 71.75 and 43.75.</p><p>The gap between them is the number that is never quoted and decides everything: 28 centimetres has to take your thighs and leave the elbows at 90 degrees on the desk. A deep chair and a thin desk raise the elbows; a thick desktop and a low chair drop them.</p><p>The answer is <strong>desk height and chair seat height and chair to desk and eye level sitting</strong>, worked out from your height and desk as a share of height and chair as a share of height. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>desk</strong></td><td><code>Your height × Desk as a share of height</code></td></tr><tr><td><strong>chair</strong></td><td><code>Your height × Chair as a share of height</code></td></tr><tr><td><strong>gap</strong></td><td><code>Your height × Desk as a share of height - Your height × Chair as a share of height</code></td></tr><tr><td><strong>eye</strong></td><td><code>Your height × 0.94 - 7</code></td></tr></tbody></table><p>Height times the desk ratio and the chair ratio. The gap is the difference — it is also 16 per cent of height — and the sitting eye level is 94 per cent of standing height less about seven centimetres, because sitting lowers the head slightly.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports desk height and chair seat height and chair to desk and eye level sitting.</p><ul><li><strong>Your height</strong> — cm.</li><li><strong>Desk as a share of height</strong> — x.</li><li><strong>Chair as a share of height</strong> — x.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Desk height</strong> — cm.</li><li><strong>Chair seat height</strong> — cm.</li><li><strong>Chair to desk</strong> — cm.</li><li><strong>Eye level sitting</strong> — cm.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put your height = 175 cm, desk as a share of height = 0.41 x, chair as a share of height = 0.25 x into the form and the panel reads:</p><ul><li><strong>Desk height</strong> = <code>Your height × Desk as a share of height</code> = <strong>71.75 cm</strong></li><li><strong>Chair seat height</strong> = <code>Your height × Chair as a share of height</code> = <strong>43.75 cm</strong></li><li><strong>Chair to desk</strong> = <code>Your height × Desk as a share of height - Your height × Chair as a share of height</code> = <strong>28 cm</strong></li><li><strong>Eye level sitting</strong> = <code>Your height × 0.94 - 7</code> = <strong>157.5 cm</strong></li></ul><p>At 190 cm the desk is 77.9 and the chair 47.5, a 30.4 cm gap. A standard 74 cm desk is already three centimetres low for that person.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>175 × 0.41</code>, which comes to <strong>71.75 cm</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>At 175 cm the desk is 71.75 and the chair 43.75, a 28 cm gap, with the eyes at 157.5 — which is where the top of a monitor should be.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Desk height</th><th>Chair seat height</th><th>Chair to desk</th><th>Eye level sitting</th></tr></thead><tbody><tr><td><strong>Your height</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10.44 %</td></tr><tr><td><strong>Desk as a share of height</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+25.62 %</td><td>+0 %</td></tr><tr><td><strong>Chair as a share of height</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−15.63 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Desk as a share of height</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Your height</strong> opens at 175 cm</li><li><strong>Desk as a share of height</strong> opens at 0.41 x</li><li><strong>Chair as a share of height</strong> opens at 0.25 x</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Your height</th><th>Desk height</th><th>Chair seat height</th><th>Chair to desk</th><th>Eye level sitting</th></tr></thead><tbody><tr><td>87.5 cm</td><td>35.875</td><td>21.875</td><td>14</td><td>75.25</td></tr><tr><td>175 cm</td><td>71.75</td><td>43.75</td><td>28</td><td>157.5</td></tr><tr><td>350 cm</td><td>143.5</td><td>87.5</td><td>56</td><td>322</td></tr><tr><td>875 cm</td><td>358.75</td><td>218.75</td><td>140</td><td>815.5</td></tr><tr><td>1 750 cm</td><td>717.5</td><td>437.5</td><td>280</td><td>1 638</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set your height = 190, desk as a share of height = 0.41, chair as a share of height = 0.25: <strong>Desk height</strong> = 77.9 cm, <strong>Chair seat height</strong> = 47.5 cm, <strong>Chair to desk</strong> = 30.4 cm, <strong>Eye level sitting</strong> = 171.6 cm. At 190 cm the desk wants 77.9 and the chair 47.5, leaving a 30.4 gap — and a standard 74 cm desk is low by nearly four.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Adjusting the chair to the desk.</strong> The chair sets the feet and the knees; the desk then has to meet the elbows. Fixing the desk and raising the chair leaves the feet dangling and the thighs compressed.</li><li><strong>Ignoring the keyboard.</strong> A desk at elbow height for typing is right; a laptop on the same desk puts the screen 20 centimetres too low and the neck follows.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Average proportions.</strong> Leg length and torso length vary by five centimetres for the same height, so two people of equal height can want desks two centimetres apart.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need your height and desk as a share of height and chair as a share of height. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Desk height and chair seat height and chair to desk and eye level sitting should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Setting up a home office without an adjustable desk.</li></li><li><li>Deciding whether a desk needs a footrest or a riser.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/standing-desk-height">Standing desk height</a> <a href="/everyday-life/bathroom-mirror-size">Mirror height</a> <a href="/everyday-life/sofa-size">Sofa size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Your height</strong> ×10</td><td>71.75</td><td>717.5</td><td>ten times larger</td></tr><tr><td><strong>Desk as a share of height</strong> ×10</td><td>71.75</td><td>717.5</td><td>ten times larger</td></tr><tr><td><strong>Chair as a share of height</strong> ×10</td><td>71.75</td><td>71.75</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Desk Height calculator work out?', 'a' => <<<'TXT'
            It returns desk height and chair seat height and chair to desk and eye level sitting from your height and desk as a share of height and chair as a share of height. The relationship is Your height × Desk as a share of height.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Your height (cm), Desk as a share of height (x), Chair as a share of height (x). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: your height in cm; desk as a share of height in x; chair as a share of height in x. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why 41 per cent of height?', 'a' => <<<'TXT'
            It is the anthropometric relation between standing height and the height of the elbow when seated at a desk. It fits adults from 150 to 200 centimetres within a centimetre or two.
            TXT],
            ['q' => 'What if my desk is not the right height?', 'a' => 'A footrest or a thicker chair cushion fixes a low desk; a keyboard tray or a monitor riser fixes a high one. Replacing the desk is the expensive third option.'],
            ['q' => 'Where should the monitor go?', 'a' => 'The top of the screen at eye level, an arm\'s length away, so the gaze is slightly downward. The sitting eye level on this page is the number to line it up with.'],
        ],
        'related' => [
            ['path' => '/everyday-life/standing-desk-height', 'name' => 'Standing desk height'],
            ['path' => '/everyday-life/bathroom-mirror-size', 'name' => 'Mirror height'],
            ['path' => '/everyday-life/sofa-size', 'name' => 'Sofa size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
