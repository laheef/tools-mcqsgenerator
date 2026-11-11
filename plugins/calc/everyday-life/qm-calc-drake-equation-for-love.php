<?php

/**
 * Drake Equation for Love Calculator
 * /everyday-life/drake-equation-for-love
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Drake Equation for Love Calculator',
    'meta' => ['title' => 'Drake Equation for Love — How Many People, Really', 'description' => 'Population times the shares who are the right age, single, attractive and compatible gives a number of candidates — usually smaller than anyone expects.', 'h1' => 'Drake Equation for Love Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'population',
                    'label' => 'People in your area',
                    'type' => 'number',
                    'suffix' => 'people',
                    'default' => '1000000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'age',
                    'label' => 'Right age range',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'single',
                    'label' => 'Single',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '50',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'attract',
                    'label' => 'You find attractive',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'back',
                    'label' => 'Who find you attractive',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'compatible',
                    'label' => 'You get on with',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '10',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'candidates',
                    'label' => 'People who pass',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'people',
                ],
                [
                    'name' => 'per_1000',
                    'label' => 'Per thousand people',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'people',
                ],
                [
                    'name' => 'meet_one',
                    'label' => 'People to meet for one match',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'people',
                ],
                [
                    'name' => 'share',
                    'label' => 'Share of the population',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => ['candidates' => 'population * (age / 100) * (single / 100) * (attract / 100) * (back / 100) * (compatible / 100)', 'per_1000' => 'population * (age / 100) * (single / 100) * (attract / 100) * (back / 100) * (compatible / 100) / population * 1000', 'meet_one' => 'population / (population * (age / 100) * (single / 100) * (attract / 100) * (back / 100) * (compatible / 100))', 'share' => '(age / 100) * (single / 100) * (attract / 100) * (back / 100) * (compatible / 100) * 100'],
    'article' => [
        'intro' => 'How many people in a city pass every filter at once, what share of the population that is, and how many people you would have to meet to find one of them.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>It is the Drake equation with the astronomy taken out. A million people, a fifth in the right age range, half of them single, and then the honest and uncomfortable filters: five per cent you find attractive, five per cent who agree, and a tenth you would actually get on with.</p><p>The answer is twenty-five people in a million. It is a joke that turns out to be arithmetic, and the useful part is not the number: it is which filter you would move. The last one is worth more than the first four together.</p><p>The answer is <strong>people who pass and per thousand people and people to meet for one match and share of the population</strong>, worked out from people in your area and right age range and single and you find attractive and who find you attractive and you get on with. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>candidates</strong></td><td><code>People in your area × (Right age range ÷ 100) × (Single ÷ 100) × (You find attractive ÷ 100) × (Who find you attractive ÷ 100) × (You get on with ÷ 100)</code></td></tr><tr><td><strong>per_1000</strong></td><td><code>People in your area × (Right age range ÷ 100) × (Single ÷ 100) × (You find attractive ÷ 100) × (Who find you attractive ÷ 100) × (You get on with ÷ 100) ÷ People in your area × 1000</code></td></tr><tr><td><strong>meet_one</strong></td><td><code>People in your area ÷ (People in your area × (Right age range ÷ 100) × (Single ÷ 100) × (You find attractive ÷ 100) × (Who find you attractive ÷ 100) × (You get on with ÷ 100))</code></td></tr><tr><td><strong>share</strong></td><td><code>(Right age range ÷ 100) × (Single ÷ 100) × (You find attractive ÷ 100) × (Who find you attractive ÷ 100) × (You get on with ÷ 100) × 100</code></td></tr></tbody></table><p>Each percentage is divided by a hundred and multiplied in turn. The meet-one figure is the population over the survivors, which is the reciprocal of the combined share.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill. It reports people who pass and per thousand people and people to meet for one match and share of the population.</p><ul><li><strong>People in your area</strong> — people.</li><li><strong>Right age range</strong> — %.</li><li><strong>Single</strong> — %.</li><li><strong>You find attractive</strong> — %.</li><li><strong>Who find you attractive</strong> — %.</li><li><strong>You get on with</strong> — %.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>People who pass</strong> — people.</li><li><strong>Per thousand people</strong> — people.</li><li><strong>People to meet for one match</strong> — people.</li><li><strong>Share of the population</strong> — %.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put people in your area = 1 × 10<sup>6</sup> people, right age range = 20 %, single = 50 %, you find attractive = 5 %, who find you attractive = 5 %, you get on with = 10 % into the form and the panel reads:</p><ul><li><strong>People who pass</strong> = <code>People in your area × (Right age range ÷ 100) × (Single ÷ 100) × (You find attractive ÷ 100) × (Who find you attractive ÷ 100) × (You get on with ÷ 100)</code> = <strong>25 people</strong></li><li><strong>Per thousand people</strong> = <code>People in your area × (Right age range ÷ 100) × (Single ÷ 100) × (You find attractive ÷ 100) × (Who find you attractive ÷ 100) × (You get on with ÷ 100) ÷ People in your area × 1000</code> = <strong>0.025 people</strong></li><li><strong>People to meet for one match</strong> = <code>People in your area ÷ (People in your area × (Right age range ÷ 100) × (Single ÷ 100) × (You find attractive ÷ 100) × (Who find you attractive ÷ 100) × (You get on with ÷ 100))</code> = <strong>40 000 people</strong></li><li><strong>Share of the population</strong> = <code>(Right age range ÷ 100) × (Single ÷ 100) × (You find attractive ÷ 100) × (Who find you attractive ÷ 100) × (You get on with ÷ 100) × 100</code> = <strong>0.003 %</strong></li></ul><p>Double the compatibility filter to twenty per cent and the answer doubles to fifty. Change the attractiveness filter from five to ten and the same thing happens — the filters multiply, so the smallest one dominates.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>1 × 10<sup>6< ÷ sup> × (20 ÷ 100) × (50 ÷ 100) × (5 ÷ 100) × (5 ÷ 100) × (10 ÷ 100)</code>, which comes to <strong>25 people</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A million people, twenty per cent in range, half of them single, five per cent attractive to you, five per cent the other way and a tenth compatible: 25 people, 0.025 per thousand, and 40 000 people met for each one.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>People who pass</th><th>Per thousand people</th><th>People to meet for one match</th><th>Share of the population</th></tr></thead><tbody><tr><td><strong>People in your area</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Right age range</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Single</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>You find attractive</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Who find you attractive</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>You get on with</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Single</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>People in your area</strong> opens at 1 × 10<sup>6</sup> people</li><li><strong>Right age range</strong> opens at 20 %</li><li><strong>Single</strong> opens at 50 %</li><li><strong>You find attractive</strong> opens at 5 %</li><li><strong>Who find you attractive</strong> opens at 5 %</li><li><strong>You get on with</strong> opens at 10 %</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>People in your area</th><th>People who pass</th><th>Per thousand people</th><th>People to meet for one match</th><th>Share of the population</th></tr></thead><tbody><tr><td>500 000 people</td><td>12.5</td><td>0.025</td><td>40 000</td><td>0.003</td></tr><tr><td>1 × 10<sup>6</sup> people</td><td>25</td><td>0.025</td><td>40 000</td><td>0.003</td></tr><tr><td>2 × 10<sup>6</sup> people</td><td>50</td><td>0.025</td><td>40 000</td><td>0.003</td></tr><tr><td>5 × 10<sup>6</sup> people</td><td>125</td><td>0.025</td><td>40 000</td><td>0.003</td></tr><tr><td>1 × 10<sup>7</sup> people</td><td>250</td><td>0.025</td><td>40 000</td><td>0.003</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set people in your area = 1 × 10<sup>6</sup>, right age range = 20, single = 50, you find attractive = 5, who find you attractive = 5, you get on with = 20: <strong>People who pass</strong> = 50 people, <strong>Per thousand people</strong> = 0.05 people, <strong>People to meet for one match</strong> = 20 000 people, <strong>Share of the population</strong> = 0.005 %. A more generous compatibility filter takes the count to fifty — the same city, twice the odds, and one changed line.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Treating the filters as independent.</strong> They are not: compatibility and attractiveness overlap, and people who share your interests are likelier to be met where you already go.</li><li><strong>Reading it as a verdict.</strong> It is a model of a search, not a statement about you. The number says the search is a numbers game, which is what everyone who found somebody already knew.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>No meeting mechanics.</strong> The page counts people who exist, not people you would ever encounter. Where you spend your week is the missing variable.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need people in your area and right age range and single and you find attractive and who find you attractive and you get on with. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> People who pass and per thousand people and people to meet for one match and share of the population should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Settling an argument about whether a city is too small.</li></li><li><li>Seeing which filter is doing the work in your own estimate.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/meeting-cost">Meeting cost</a> <a href="/everyday-life/every-second">Every second</a> <a href="/everyday-life/podcasts">Podcast time</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>People in your area</strong> ×10</td><td>25</td><td>250</td><td>ten times larger</td></tr><tr><td><strong>Right age range</strong> ×10</td><td>25</td><td>250</td><td>ten times larger</td></tr><tr><td><strong>Single</strong> ×10</td><td>25</td><td>250</td><td>ten times larger</td></tr><tr><td><strong>You find attractive</strong> ×10</td><td>25</td><td>250</td><td>ten times larger</td></tr><tr><td><strong>Who find you attractive</strong> ×10</td><td>25</td><td>250</td><td>ten times larger</td></tr><tr><td><strong>You get on with</strong> ×10</td><td>25</td><td>250</td><td>ten times larger</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Drake Equation for Love calculator work out?', 'a' => <<<'TXT'
            It returns people who pass and per thousand people and people to meet for one match and share of the population from people in your area and right age range and single and you find attractive and who find you attractive and you get on with. The relationship is People in your area × (Right age range ÷ 100) × (Single ÷ 100) × (You find attractive ÷ 100) × (Who find you attractive ÷ 100) × (You get on with ÷ 100).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => <<<'TXT'
            People in your area (people), Right age range (%), Single (%), You find attractive (%), Who find you attractive (%), You get on with (%). Everything else is computed.
            TXT],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: people in your area in people; right age range in %; single in %; you find attractive in %; who find you attractive in %; you get on with in %. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Is this the real Drake equation?', 'a' => <<<'TXT'
            Its shape, yes. Drake multiplied the rate of star formation by the fractions with planets, life and intelligence. This multiplies a population by the fractions who are available.
            TXT],
            ['q' => 'Why does the answer feel too small?', 'a' => <<<'TXT'
            Because people compare it with everyone they know rather than everyone who exists. Twenty-five in a million is one in forty thousand, and forty thousand people is a large stadium.
            TXT],
            ['q' => 'Which filter should I improve?', 'a' => <<<'TXT'
            The one that is small for a reason you can change — usually where you meet people. The arithmetic cannot help with that, but it does show how much it is worth.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/meeting-cost', 'name' => 'Meeting cost'],
            ['path' => '/everyday-life/every-second', 'name' => 'Every second'],
            ['path' => '/everyday-life/podcasts', 'name' => 'Podcast time'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
