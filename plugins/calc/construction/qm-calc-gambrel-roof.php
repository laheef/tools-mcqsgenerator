<?php

/**
 * Gambrel roof
 * /construction/gambrel-roof
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gambrel roof',
    'meta' => ['title' => 'Gambrel Roof Calculator: Slopes and Surface Area', 'description' => 'Work out the two slope lengths, the total rise and the surface area of a gambrel roof from the span, both pitches and the building length. in two sections.', 'h1' => 'Gambrel roof', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'span',
                    'label' => 'Building span',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '24',
                    'help' => 'Eave to eave',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'lower_pitch',
                    'label' => 'Lower pitch',
                    'type' => 'number',
                    'suffix' => 'x/12',
                    'default' => '4',
                    'help' => 'The steep-to-shallow lower slope',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'upper_pitch',
                    'label' => 'Upper pitch',
                    'type' => 'number',
                    'suffix' => 'x/12',
                    'default' => '10',
                    'help' => 'The shallow-to-peak upper slope',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Building length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '30',
                    'help' => 'Along the ridge',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_rise',
                    'label' => 'Total rise',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'lower_area',
                    'label' => 'Lower slope area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'upper_area',
                    'label' => 'Upper slope area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'roof_area',
                    'label' => 'Total roof area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Gambrel roof',
            'results' => [
                'total_rise' => '(span/4)*lower_pitch/12+(span/4)*upper_pitch/12',
                'lower_area' => '2*length*sqrt(pow(span/4,2)+pow(span/4*lower_pitch/12,2))',
                'upper_area' => '2*length*sqrt(pow(span/4,2)+pow(span/4*upper_pitch/12,2))',
                'roof_area' => '2*length*sqrt(pow(span/4,2)+pow(span/4*lower_pitch/12,2))+2*length*sqrt(pow(span/4,2)+pow(span/4*upper_pitch/12,2))',
                'span' => '4*(total_rise*12/(lower_pitch+upper_pitch))',
                'length' => 'roof_area/(2*sqrt(pow(span/4,2)+pow(span/4*lower_pitch/12,2))+2*sqrt(pow(span/4,2)+pow(span/4*upper_pitch/12,2)))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A gambrel is two pitches stacked. With the break at a quarter of the span, <strong>rise = (span ÷ 4) × pitch ÷ 12</strong> per section, and each slope's area is its length times the building length.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The gambrel is the barn roof: a steep lower slope that makes headroom in the attic and a shallow upper slope that closes it cheaply. Both surfaces have to be measured separately, and both count towards the shingles.</p><p>The page reports <strong>total rise and lower slope area and upper slope area and total roof area</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Total rise</strong></td><td><code>(Building span ÷ 4) × Lower pitch ÷ 12+(Building span ÷ 4) × Upper pitch ÷ 12</code></td></tr><tr><td><strong>Lower slope area</strong></td><td><code>2 × Building length × √((Building span ÷ 4)^2+(Building span ÷ 4 × Lower pitch ÷ 12)^2)</code></td></tr><tr><td><strong>Upper slope area</strong></td><td><code>2 × Building length × √((Building span ÷ 4)^2+(Building span ÷ 4 × Upper pitch ÷ 12)^2)</code></td></tr><tr><td><strong>Total roof area</strong></td><td><code>2 × Building length × √((Building span ÷ 4)^2+(Building span ÷ 4 × Lower pitch ÷ 12)^2)+2 × Building length × √((Building span ÷ 4)^2+(Building span ÷ 4 × Upper pitch ÷ 12)^2)</code></td></tr><tr><td><strong>Building span</strong></td><td><code>4 × (Total rise × 12 ÷ (Lower pitch+Upper pitch))</code></td></tr><tr><td><strong>Building length</strong></td><td><code>Total roof area ÷ (2 × √((Building span ÷ 4)^2+(Building span ÷ 4 × Lower pitch ÷ 12)^2)+2 × √((Building span ÷ 4)^2+(Building span ÷ 4 × Upper pitch ÷ 12)^2))</code></td></tr></tbody></table><p><p>The break is taken at a quarter of the span from each eave, which divides the roof into two equal horizontal runs and two different rises. Each slope is a right triangle whose hypotenuse is the surface width, times the building length, times two for the two sides.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports total rise and lower slope area and upper slope area and total roof area.</p><ul><li><strong>Building span</strong> — in ft. Eave to eave</li><li><strong>Lower pitch</strong> — in x/12. The steep-to-shallow lower slope</li><li><strong>Upper pitch</strong> — in x/12. The shallow-to-peak upper slope</li><li><strong>Building length</strong> — in ft. Along the ridge</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Total rise</strong> — in ft</li><li><strong>Lower slope area</strong> — in ft²</li><li><strong>Upper slope area</strong> — in ft²</li><li><strong>Total roof area</strong> — in ft²</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Building span = 24 ft, Lower pitch = 4 x/12, Upper pitch = 10 x/12, Building length = 30 ft — and the results panel reads:</p><ul><li><strong>Total rise</strong> = <code>(Building span ÷ 4) × Lower pitch ÷ 12+(Building span ÷ 4) × Upper pitch ÷ 12</code> = <strong>7 ft</strong></li><li><strong>Lower slope area</strong> = <code>2 × Building length × √((Building span ÷ 4)^2+(Building span ÷ 4 × Lower pitch ÷ 12)^2)</code> = <strong>379.473 ft²</strong></li><li><strong>Upper slope area</strong> = <code>2 × Building length × √((Building span ÷ 4)^2+(Building span ÷ 4 × Upper pitch ÷ 12)^2)</code> = <strong>468.615 ft²</strong></li><li><strong>Total roof area</strong> = <code>2 × Building length × √((Building span ÷ 4)^2+(Building span ÷ 4 × Lower pitch ÷ 12)^2)+2 × Building length × √((Building span ÷ 4)^2+(Building span ÷ 4 × Upper pitch ÷ 12)^2)</code> = <strong>848.088 ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(24 ÷ 4) × 4 ÷ 12+(24 ÷ 4) × 10 ÷ 12 = 7</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 24 ft span with a 4/12 lower pitch and a 10/12 upper: each run is 6 ft, the lower slope rises 2 ft and the upper 5 ft, so the roof peaks 7 ft above the eaves. The surfaces come to 848 ft² — 379 on the lower slopes and 469 on the upper, because the steeper upper slope is also the longer one.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the two areas against each other: the lower slope is longer but shallower, and on these pitches the two come out close. A lower slope much larger than the upper means a shallow lower pitch, which is the wrong way round for headroom.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Total rise</th><th>Lower slope area</th><th>Upper slope area</th><th>Total roof area</th></tr></thead><tbody><tr><td><strong>Building span</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Lower pitch</strong> +10 %</td><td>+2.86 %</td><td>+1.04 %</td><td>+0 %</td><td>+0.47 %</td></tr><tr><td><strong>Upper pitch</strong> +10 %</td><td>+7.14 %</td><td>+0 %</td><td>+4.21 %</td><td>+2.33 %</td></tr><tr><td><strong>Building length</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Building span</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Lower pitch</strong>, at 2.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Building span = 30, Lower pitch = 6, Upper pitch = 12, Building length = 40, the page reports <strong>Total rise</strong> = 11.25 ft, <strong>Lower slope area</strong> = 670.82 ft², <strong>Upper slope area</strong> = 848.528 ft², <strong>Total roof area</strong> = 1 519.349 ft². A bigger barn with a steeper lower slope — more attic room and more material.</li><li>With Building span = 20, Lower pitch = 3, Upper pitch = 8, Building length = 24, the page reports <strong>Total rise</strong> = 4.583 ft, <strong>Lower slope area</strong> = 247.386 ft², <strong>Upper slope area</strong> = 288.444 ft², <strong>Total roof area</strong> = 535.83 ft². A shallow gambrel on a shed, where the lower slope is doing the work.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Break taken at the wrong place.</strong> A quarter of the span either side is the convention; move it and both areas change.</li><li><strong>One pitch used for both.</strong> A gambrel is two roofs, priced separately.</li><li><strong>Plan area used.</strong> Each slope multiplies by its own hypotenuse.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Total rise (ft), Lower slope area (ft²), Upper slope area (ft²), Total roof area (ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Span and length in feet, both pitches as rise per 12, the rise in feet and the areas in square feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need building span and lower pitch and upper pitch and building length. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Total rise and lower slope area and upper slope area and total roof area should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Building span</strong> ×10</td><td>7</td><td>70</td><td>ten times larger</td></tr><tr><td><strong>Lower pitch</strong> ×10</td><td>7</td><td>25</td><td>×3.571</td></tr><tr><td><strong>Upper pitch</strong> ×10</td><td>7</td><td>52</td><td>×7.429</td></tr><tr><td><strong>Building length</strong> ×10</td><td>7</td><td>7</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Symmetrical gambrel.</strong> An unequal break needs its own run for each slope.</li><li><strong>No gable ends.</strong> The vertical triangles are separate siding.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Measuring a barn roof for shingles.</li></li><li><li>Checking attic headroom from a pitch.</li></li><li><li>Sizing a gambrel for a shed.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/roof-pitch">Roof pitch</a> <a href="/construction/roofing">Roofing</a> <a href="/construction/rafter-length">Rafter length</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gambrel roof calculator work out?', 'a' => <<<'TXT'
            It returns total rise and lower slope area and upper slope area and total roof area from building span and lower pitch and upper pitch and building length. The relationship is (Building span ÷ 4) × Lower pitch ÷ 12+(Building span ÷ 4) × Upper pitch ÷ 12.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Building span (ft), Lower pitch (x/12), Upper pitch (x/12), Building length (ft). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: building span in ft; lower pitch in x/12; upper pitch in x/12; building length in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is a gambrel roof?', 'a' => 'A roof with two pitches a side — steep at the eave, shallow at the ridge — the classic barn shape.'],
            ['q' => 'How do you work out gambrel roof area?', 'a' => 'Treat each pitch as its own slope: hypotenuse times length times two, then add the two sections.'],
        ],
        'related' => [
            ['path' => '/construction/roof-pitch', 'name' => 'Roof pitch'],
            ['path' => '/construction/roofing', 'name' => 'Roofing'],
            ['path' => '/construction/rafter-length', 'name' => 'Rafter length'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
