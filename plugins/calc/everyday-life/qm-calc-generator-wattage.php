<?php

/**
 * Generator Wattage Calculator
 * /everyday-life/generator-wattage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Generator Wattage Calculator',
    'meta' => ['title' => 'Generator Wattage — Running Load, Surge and Headroom', 'description' => 'The generator size a set of appliances needs: running watts, the starting surge of the largest motor, and the headroom rule applied to both, with the peak as.', 'h1' => 'Generator Wattage Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'running',
                    'label' => 'Everything running at once',
                    'type' => 'number',
                    'suffix' => 'W',
                    'default' => '2000',
                    'help' => 'Add the running watts of every appliance you want on at the same time.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'surge',
                    'label' => 'Starting watts of the largest motor',
                    'type' => 'number',
                    'suffix' => 'W',
                    'default' => '1500',
                    'help' => 'A fridge, a pump or an air conditioner: three to five times its running watts for a second or two.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'headroom',
                    'label' => 'Headroom to add',
                    'type' => 'select',
                    'options' => ['10 %, tight' => 10, '20 %, sensible' => 20, '30 %, generous' => 30],
                    'control' => 'SELECT',
                    'default' => '20 %, sensible',
                ],
                [
                    'name' => 'continuous',
                    'label' => 'Continuous rating needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'W',
                ],
                [
                    'name' => 'peak',
                    'label' => 'Peak it must survive',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'W',
                ],
                [
                    'name' => 'generator',
                    'label' => 'Generator size to buy',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'W',
                ],
            ],
        ],
    ],
    'formula' => ['continuous' => 'running * (1 + headroom / 100)', 'peak' => 'running + surge', 'generator' => 'max(running * (1 + headroom / 100), running + surge)'],
    'article' => [
        'intro' => <<<'TXT'
        Running watts plus the biggest starting surge, and the rating a generator needs once a margin is added. Surge is the number that catches people out: a fridge that runs at 150 W can draw 600 W for a second.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A generator is sold on two numbers and only one of them is on the box in large type. The running rating is what it can deliver all day; the surge rating is what it can deliver for the second a motor takes to start. A fridge, a freezer, a well pump and an air conditioner all draw several times their running power for that second.</p><p>This page works out both. The answer is the larger of the continuous figure with headroom and the peak figure, because a generator that trips on start-up is no use however well it runs afterwards.</p><p>The answer is <strong>continuous rating needed and peak it must survive and generator size to buy</strong>, worked out from everything running at once and starting watts of the largest motor and headroom to add. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>continuous</strong></td><td><code>Everything running at once × (1 + Headroom to add ÷ 100)</code></td></tr><tr><td><strong>peak</strong></td><td><code>Everything running at once + Starting watts of the largest motor</code></td></tr><tr><td><strong>generator</strong></td><td><code>max(Everything running at once × (1 + Headroom to add ÷ 100), Everything running at once + Starting watts of the largest motor)</code></td></tr></tbody></table><p>Continuous is the running load with the chosen headroom added. Peak is the running load plus the starting surge of the largest motor. The size to buy is the larger of the two, since the generator has to satisfy whichever is harder.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports continuous rating needed and peak it must survive and generator size to buy.</p><ul><li><strong>Everything running at once</strong> — W. Add the running watts of every appliance you want on at the same time.</li><li><strong>Starting watts of the largest motor</strong> — W. A fridge, a pump or an air conditioner: three to five times its running watts for a second or two.</li><li><strong>Headroom to add</strong>. A choice: 10 %, tight, 20 %, sensible, 30 %, generous.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Continuous rating needed</strong> — W.</li><li><strong>Peak it must survive</strong> — W.</li><li><strong>Generator size to buy</strong> — W.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put everything running at once = 2 000 W, starting watts of the largest motor = 1 500 W, headroom to add = 20 into the form and the panel reads:</p><ul><li><strong>Continuous rating needed</strong> = <code>Everything running at once × (1 + Headroom to add ÷ 100)</code> = <strong>2 400 W</strong></li><li><strong>Peak it must survive</strong> = <code>Everything running at once + Starting watts of the largest motor</code> = <strong>3 500 W</strong></li><li><strong>Generator size to buy</strong> = <code>max(Everything running at once × (1 + Headroom to add ÷ 100), Everything running at once + Starting watts of the largest motor)</code> = <strong>3 500 W</strong></li></ul><p>The surge figure is per motor: two fridges starting together are two surges, and only the largest is in this formula. Stagger the starts.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>2 000 × (1 + 20 ÷ 100)</code>, which comes to <strong>2 400 W</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>2 000 W of running load plus a 1 500 W surge peaks at 3 500 W. With twenty per cent headroom the continuous figure is 2 400 W, so the peak governs and 3 500 W is the size to buy.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Continuous rating needed</th><th>Peak it must survive</th><th>Generator size to buy</th></tr></thead><tbody><tr><td><strong>Everything running at once</strong> +10 %</td><td>+10 %</td><td>+5.71 %</td><td>+5.71 %</td></tr><tr><td><strong>Starting watts of the largest motor</strong> +10 %</td><td>+0 %</td><td>+4.29 %</td><td>+4.29 %</td></tr><tr><td><strong>Headroom to add</strong> +10 %</td><td>+1.67 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Everything running at once</strong>. <strong>Headroom to add</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Everything running at once</strong> opens at 2 000 W — Add the running watts of every appliance you want on at the same time.</li><li><strong>Starting watts of the largest motor</strong> opens at 1 500 W — A fridge, a pump or an air conditioner: three to five times its running watts for a second or two.</li><li><strong>Headroom to add</strong> opens at 20</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Everything running at once</th><th>Continuous rating needed</th><th>Peak it must survive</th><th>Generator size to buy</th></tr></thead><tbody><tr><td>1 000 W</td><td>1 200</td><td>2 500</td><td>2 500</td></tr><tr><td>2 000 W</td><td>2 400</td><td>3 500</td><td>3 500</td></tr><tr><td>4 000 W</td><td>4 800</td><td>5 500</td><td>5 500</td></tr><tr><td>10 000 W</td><td>12 000</td><td>11 500</td><td>12 000</td></tr><tr><td>20 000 W</td><td>24 000</td><td>21 500</td><td>24 000</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set everything running at once = 800, starting watts of the largest motor = 2 000, headroom to add = 20: <strong>Continuous rating needed</strong> = 960 W, <strong>Peak it must survive</strong> = 2 800 W, <strong>Generator size to buy</strong> = 2 800 W. A small load with a big motor: the peak of 2 800 W decides, not the continuous 960 W.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Adding every surge together.</strong> Motors rarely start at the same instant, and a generator sized for all of them at once is twice the price.</li><li><strong>Buying to the running total.</strong> The generator will run everything and then trip the moment the fridge cycles on.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Appliance wattages are estimates.</strong> The label gives the maximum and the real draw is usually lower; use the label for headroom.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need everything running at once and starting watts of the largest motor and headroom to add. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Continuous rating needed and peak it must survive and generator size to buy should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Sizing a standby generator for a power cut.</li></li><li><li>Checking whether a site generator can start a pump.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/appliance-wattage">Appliance wattage</a> <a href="/everyday-life/battery-charge-time">Battery charge time</a> <a href="/everyday-life/lighting">Lighting calculator</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Everything running at once</strong> ×10</td><td>2 400</td><td>24 000</td><td>ten times larger</td></tr><tr><td><strong>Starting watts of the largest motor</strong> ×10</td><td>2 400</td><td>2 400</td><td>unchanged</td></tr><tr><td><strong>Headroom to add</strong> ×10</td><td>2 400</td><td>6 000</td><td>×2.5</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Generator Wattage calculator work out?', 'a' => <<<'TXT'
            It returns continuous rating needed and peak it must survive and generator size to buy from everything running at once and starting watts of the largest motor and headroom to add. The relationship is Everything running at once × (1 + Headroom to add ÷ 100).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Everything running at once (W), Starting watts of the largest motor (W), Headroom to add. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: everything running at once in W; starting watts of the largest motor in W. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What is a surge rating?', 'a' => 'The power a generator can deliver for a few seconds while a motor starts. It is usually about 1.2 to 1.5 times the running rating on the generator\'s own label.'],
            ['q' => 'Why not just buy the biggest one?', 'a' => 'Because generators are inefficient at low load, and an oversized one burns more fuel and wears faster for the same output.'],
            ['q' => 'Does the power factor matter?', 'a' => <<<'TXT'
            For a household load of resistive appliances it is close to one. Motors and electronics give a figure below that, and the generator's kVA rating already accounts for it.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/appliance-wattage', 'name' => 'Appliance wattage'],
            ['path' => '/everyday-life/battery-charge-time', 'name' => 'Battery charge time'],
            ['path' => '/everyday-life/lighting', 'name' => 'Lighting calculator'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
