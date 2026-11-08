<?php

/**
 * Elevation grade
 * /construction/elevation-grade
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Elevation grade',
    'meta' => ['title' => 'Elevation Grade Calculator: Slope, Rise and Levels', 'description' => 'Turn a grade in per cent into the rise over a run, the finished elevation and the level at any station along a driveway, drain or path. See the steps.', 'h1' => 'Elevation grade', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'start_elevation',
                    'label' => 'Start elevation',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '100',
                    'help' => 'Existing ground level',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'run',
                    'label' => 'Run',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '100',
                    'help' => 'Horizontal distance',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'grade',
                    'label' => 'Grade',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '2',
                    'help' => 'Fall or rise per hundred',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'station',
                    'label' => 'Station',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '50',
                    'help' => 'Distance along the run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rise',
                    'label' => 'Rise',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'end_elevation',
                    'label' => 'End elevation',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'station_elevation',
                    'label' => 'Level at station',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'slope_ratio',
                    'label' => 'Slope ratio',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '1 in',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Elevation grade',
            'results' => [
                'rise' => 'run*grade/100',
                'end_elevation' => 'start_elevation+run*grade/100',
                'station_elevation' => 'start_elevation+station*grade/100',
                'slope_ratio' => '100/grade',
                'run' => 'rise/grade*100',
                'grade' => 'rise/run*100',
                'start_elevation' => 'end_elevation-rise',
                'station' => '(station_elevation-start_elevation)/grade*100',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Rise = run × grade ÷ 100</strong>; the finished elevation is the start elevation plus the rise.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Grades are quoted in per cent because a surveyor's level and a laser both work in per cent, while plans are drawn in feet. Turning a grade into a rise over a known run is how a driveway, a drain or a path gets its levels set before any material arrives.</p><p>The page reports <strong>rise and end elevation and level at station and slope ratio</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Rise</strong></td><td><code>Run × Grade ÷ 100</code></td></tr><tr><td><strong>End elevation</strong></td><td><code>Start elevation+Run × Grade ÷ 100</code></td></tr><tr><td><strong>Level at station</strong></td><td><code>Start elevation+Station × Grade ÷ 100</code></td></tr><tr><td><strong>Slope ratio</strong></td><td><code>100 ÷ Grade</code></td></tr><tr><td><strong>Run</strong></td><td><code>Rise ÷ Grade × 100</code></td></tr><tr><td><strong>Grade</strong></td><td><code>Rise ÷ Run × 100</code></td></tr><tr><td><strong>Start elevation</strong></td><td><code>End elevation-Rise</code></td></tr><tr><td><strong>Station</strong></td><td><code>(Level at station-Start elevation) ÷ Grade × 100</code></td></tr></tbody></table><p><p>Per cent grade is rise over run times a hundred, so the rise is the run multiplied by the grade and divided by a hundred. The level at a station is the same sum with the station in place of the run, which is why a long run is better checked at two or three stations than at the end.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports rise and end elevation and level at station and slope ratio.</p><ul><li><strong>Start elevation</strong> — in ft. Existing ground level</li><li><strong>Run</strong> — in ft. Horizontal distance</li><li><strong>Grade</strong> — in %. Fall or rise per hundred</li><li><strong>Station</strong> — in ft. Distance along the run</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Rise</strong> — in ft</li><li><strong>End elevation</strong> — in ft</li><li><strong>Level at station</strong> — in ft</li><li><strong>Slope ratio</strong> — in 1 in</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Start elevation = 100 ft, Run = 100 ft, Grade = 2 %, Station = 50 ft — and the results panel reads:</p><ul><li><strong>Rise</strong> = <code>Run × Grade ÷ 100</code> = <strong>2 ft</strong></li><li><strong>End elevation</strong> = <code>Start elevation+Run × Grade ÷ 100</code> = <strong>102 ft</strong></li><li><strong>Level at station</strong> = <code>Start elevation+Station × Grade ÷ 100</code> = <strong>101 ft</strong></li><li><strong>Slope ratio</strong> = <code>100 ÷ Grade</code> = <strong>50 1 in</strong></li></ul><p>With the numbers written into the formula, the first result is <code>100 × 2 ÷ 100 = 2</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 2 % grade over 100 ft rises 2 ft, taking 100 ft to 102 ft. Halfway along, at 50 ft, the level is 101 ft.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the slope ratio against the grade: a two per cent grade is one in fifty, a ten per cent grade is one in ten. If the ratio comes out below about eight, the slope is steeper than a vehicle should be asked to climb.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Rise</th><th>End elevation</th><th>Level at station</th><th>Slope ratio</th></tr></thead><tbody><tr><td><strong>Start elevation</strong> +10 %</td><td>+0 %</td><td>+9.8 %</td><td>+9.9 %</td><td>+0 %</td></tr><tr><td><strong>Run</strong> +10 %</td><td>+10 %</td><td>+0.2 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Grade</strong> +10 %</td><td>+10 %</td><td>+0.2 %</td><td>+0.1 %</td><td>−9.09 %</td></tr><tr><td><strong>Station</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0.1 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Run</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Station</strong>, at 0.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Grade = 12, Run = 40, the page reports <strong>Rise</strong> = 4.8 ft, <strong>End elevation</strong> = 104.8 ft, <strong>Level at station</strong> = 106 ft, <strong>Slope ratio</strong> = 8.333 1 in. A steep driveway: twelve per cent is close to the practical limit.</li><li>With Grade = -2, Run = 120, the page reports <strong>Rise</strong> = -2.4 ft, <strong>End elevation</strong> = 97.6 ft, <strong>Level at station</strong> = 99 ft, <strong>Slope ratio</strong> = -50 1 in. A negative grade falls away from the start elevation.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Grade entered as a decimal.</strong> Two per cent is 2, not 0.02.</li><li><strong>Run measured along the slope.</strong> Grade uses the horizontal distance.</li><li><strong>Sign ignored.</strong> A fall is negative.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Rise (ft), End elevation (ft), Level at station (ft), Slope ratio (1 in).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Elevations, runs and stations in feet, grade in per cent, the ratio as one in so many.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need start elevation and run and grade and station. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Rise and end elevation and level at station and slope ratio should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Start elevation</strong> ×10</td><td>2</td><td>2</td><td>unchanged</td></tr><tr><td><strong>Run</strong> ×10</td><td>2</td><td>20</td><td>ten times larger</td></tr><tr><td><strong>Grade</strong> ×10</td><td>2</td><td>20</td><td>ten times larger</td></tr><tr><td><strong>Station</strong> ×10</td><td>2</td><td>2</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Constant grade.</strong> A vertical curve changes the rate.</li><li><strong>No earthwork.</strong> Cut and fill volumes are not included.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting a driveway fall.</li></li><li><li>Checking a drainage invert.</li></li><li><li>Levels for a garden path.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/ramp-slope">Ramp slope</a> <a href="/construction/ladder-angle">Ladder angle</a> <a href="/construction/gravel-driveway">Gravel driveway</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Elevation grade calculator work out?', 'a' => <<<'TXT'
            It returns rise and end elevation and level at station and slope ratio from start elevation and run and grade and station. The relationship is Run × Grade ÷ 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Start elevation (ft), Run (ft), Grade (%), Station (ft). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: start elevation in ft; run in ft; grade in %; station in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I convert a grade to a rise?', 'a' => 'Multiply the run by the grade in per cent and divide by a hundred.'],
            ['q' => 'What is a two per cent grade in inches per foot?', 'a' => 'About a quarter inch per foot, which is one in fifty.'],
        ],
        'related' => [
            ['path' => '/construction/ramp-slope', 'name' => 'Ramp slope'],
            ['path' => '/construction/ladder-angle', 'name' => 'Ladder angle'],
            ['path' => '/construction/gravel-driveway', 'name' => 'Gravel driveway'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
