<?php

/**
 * Tent Size Calculator
 * /everyday-life/tent-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tent Size Calculator',
    'meta' => ['title' => 'Tent Size — Floor Area, People and Gear — Free Tool', 'description' => 'A four-person tent with 4.5 square metres is not four people\'s worth of room once the bags are inside: the area per person and the shortfall, in one page.', 'h1' => 'Tent Size Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'area',
                    'label' => 'Tent floor area',
                    'type' => 'number',
                    'suffix' => 'm²',
                    'default' => '4.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'people',
                    'label' => 'People',
                    'type' => 'number',
                    'suffix' => 'people',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gear',
                    'label' => 'Floor space for gear',
                    'type' => 'number',
                    'suffix' => 'm²',
                    'default' => '1.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'standard',
                    'label' => 'Area per person wanted',
                    'type' => 'number',
                    'suffix' => 'm²/person',
                    'default' => '1.2',
                    'help' => '1.2 square metres per person is a realistic three-season standard. Manufacturers quote 0.8.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_person',
                    'label' => 'Area each, gear included',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²',
                ],
                [
                    'name' => 'needed',
                    'label' => 'Area this party needs',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²',
                ],
                [
                    'name' => 'shortfall',
                    'label' => 'Shortfall',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²',
                ],
                [
                    'name' => 'rating',
                    'label' => 'People the tent really holds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'people',
                ],
            ],
        ],
    ],
    'formula' => ['per_person' => '(area - gear) / people', 'needed' => 'people * standard + gear', 'shortfall' => 'people * standard + gear - area', 'rating' => 'floor((area - gear) / standard)'],
    'article' => [
        'intro' => 'The floor area each person gets once the gear takes its share, what a tent of that size should hold at a sensible standard, and how far short it falls.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Tent sizes are quoted at about 0.8 square metres a person, which is a sleeping mat and nothing else. A four-person tent at 4.5 square metres sounds generous and gives 0.75 a person once the bags are inside.</p><p>At a realistic 1.2 square metres each plus 1.5 for gear, four people need 6.3 square metres. The same tent really holds two, and the label says four.</p><p>The answer is <strong>area each, gear included and area this party needs and shortfall and people the tent really holds</strong>, worked out from tent floor area and people and floor space for gear and area per person wanted. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>per_person</strong></td><td><code>(Tent floor area - Floor space for gear) ÷ People</code></td></tr><tr><td><strong>needed</strong></td><td><code>People × Area per person wanted + Floor space for gear</code></td></tr><tr><td><strong>shortfall</strong></td><td><code>People × Area per person wanted + Floor space for gear - Tent floor area</code></td></tr><tr><td><strong>rating</strong></td><td><code>floor((Tent floor area - Floor space for gear) ÷ Area per person wanted)</code></td></tr></tbody></table><p>The floor less the gear area, divided by the people, gives what each sleeper gets. The needed area is the party times the standard plus the gear, and the rating divides the usable floor by the standard and rounds down.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports area each, gear included and area this party needs and shortfall and people the tent really holds.</p><ul><li><strong>Tent floor area</strong> — m².</li><li><strong>People</strong> — people.</li><li><strong>Floor space for gear</strong> — m².</li><li><strong>Area per person wanted</strong> — m²/person. 1.2 square metres per person is a realistic three-season standard. Manufacturers quote 0.8.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Area each, gear included</strong> — m².</li><li><strong>Area this party needs</strong> — m².</li><li><strong>Shortfall</strong> — m².</li><li><strong>People the tent really holds</strong> — people.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put tent floor area = 4.5 m², people = 4 people, floor space for gear = 1.5 m², area per person wanted = 1.2 m²/person into the form and the panel reads:</p><ul><li><strong>Area each, gear included</strong> = <code>(Tent floor area - Floor space for gear) ÷ People</code> = <strong>0.75 m²</strong></li><li><strong>Area this party needs</strong> = <code>People × Area per person wanted + Floor space for gear</code> = <strong>6.3 m²</strong></li><li><strong>Shortfall</strong> = <code>People × Area per person wanted + Floor space for gear - Tent floor area</code> = <strong>1.8 m²</strong></li><li><strong>People the tent really holds</strong> = <code>floor((Tent floor area - Floor space for gear) ÷ Area per person wanted)</code> = <strong>2 people</strong></li></ul><p>Two people in the same tent get 1.5 square metres each, which is the difference between a good night and a wet sleeping bag against the wall.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>(4.5 - 1.5) ÷ 4</code>, which comes to <strong>0.75 m²</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>4.5 square metres for four people and 1.5 of gear is 0.75 each, against the 6.3 the party needs — a shortfall of 1.8 square metres, and the tent really holds two.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Area each, gear included</th><th>Area this party needs</th><th>Shortfall</th><th>People the tent really holds</th></tr></thead><tbody><tr><td><strong>Tent floor area</strong> +10 %</td><td>+15 %</td><td>+0 %</td><td>−25 %</td><td>+0 %</td></tr><tr><td><strong>People</strong> +10 %</td><td>−9.09 %</td><td>+7.62 %</td><td>+26.67 %</td><td>+0 %</td></tr><tr><td><strong>Floor space for gear</strong> +10 %</td><td>−5 %</td><td>+2.38 %</td><td>+8.33 %</td><td>+0 %</td></tr><tr><td><strong>Area per person wanted</strong> +10 %</td><td>+0 %</td><td>+7.62 %</td><td>+26.67 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>People</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Tent floor area</strong> opens at 4.5 m²</li><li><strong>People</strong> opens at 4 people</li><li><strong>Floor space for gear</strong> opens at 1.5 m²</li><li><strong>Area per person wanted</strong> opens at 1.2 m²/person — 1.2 square metres per person is a realistic three-season standard. Manufacturers quote 0.8.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Tent floor area</th><th>Area each, gear included</th><th>Area this party needs</th><th>Shortfall</th><th>People the tent really holds</th></tr></thead><tbody><tr><td>2.25 m²</td><td>0.188</td><td>6.3</td><td>4.05</td><td>0</td></tr><tr><td>4.5 m²</td><td>0.75</td><td>6.3</td><td>1.8</td><td>2</td></tr><tr><td>9 m²</td><td>1.875</td><td>6.3</td><td>-2.7</td><td>6</td></tr><tr><td>22.5 m²</td><td>5.25</td><td>6.3</td><td>-16.2</td><td>17</td></tr><tr><td>45 m²</td><td>10.875</td><td>6.3</td><td>-38.7</td><td>36</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set tent floor area = 4.5, people = 2, floor space for gear = 1.5, area per person wanted = 1.2: <strong>Area each, gear included</strong> = 1.5 m², <strong>Area this party needs</strong> = 3.9 m², <strong>Shortfall</strong> = -0.6 m², <strong>People the tent really holds</strong> = 2 people. Two people in the same tent get 1.5 square metres each, and the tent has 0.6 square metres to spare — the same tent, a different night.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Believing the person rating.</strong> It is a maximum at the test standard with no luggage. Take one person off any rating above two and the tent becomes comfortable.</li><li><strong>Ignoring the shape.</strong> A tapered tent loses the corners to sloping walls, so the usable floor is ten to twenty per cent less than the quoted figure.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Floor area only.</strong> Porches, headroom and where the door opens matter as much as the number and are not in the arithmetic.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need tent floor area and people and floor space for gear and area per person wanted. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Area each, gear included and area this party needs and shortfall and people the tent really holds should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Choosing between a three and a four-person tent for two people.</li></li><li><li>Checking a tent you already own for a party of four.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/bed-size">Bed size</a> <a href="/everyday-life/sofa-size">Sofa size</a> <a href="/everyday-life/rug-size">Rug size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Tent floor area</strong> ×10</td><td>0.75</td><td>10.875</td><td>×14.5</td></tr><tr><td><strong>People</strong> ×10</td><td>0.75</td><td>0.075</td><td>ten times smaller</td></tr><tr><td><strong>Floor space for gear</strong> ×10</td><td>0.75</td><td>-2.625</td><td>×-3.5</td></tr><tr><td><strong>Area per person wanted</strong> ×10</td><td>0.75</td><td>0.75</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tent Size calculator work out?', 'a' => <<<'TXT'
            It returns area each, gear included and area this party needs and shortfall and people the tent really holds from tent floor area and people and floor space for gear and area per person wanted. The relationship is (Tent floor area - Floor space for gear) ÷ People.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Tent floor area (m²), People (people), Floor space for gear (m²), Area per person wanted (m²/person). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: tent floor area in m²; people in people; floor space for gear in m²; area per person wanted in m²/person. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How many people fit in a four-person tent?', 'a' => 'Two comfortably, three with the gear outside, four as the label says and nobody sleeping well.'],
            ['q' => 'What is a realistic tent area per person?', 'a' => '1.2 to 1.5 square metres for three-season camping and more for winter, when the gear is bulkier and stays inside.'],
            ['q' => 'Do vestibules count?', 'a' => 'No. They are the answer to the gear problem, though, and a tent with two good porches can take the rating it claims.'],
        ],
        'related' => [
            ['path' => '/everyday-life/bed-size', 'name' => 'Bed size'],
            ['path' => '/everyday-life/sofa-size', 'name' => 'Sofa size'],
            ['path' => '/everyday-life/rug-size', 'name' => 'Rug size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
