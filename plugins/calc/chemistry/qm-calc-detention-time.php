<?php

/**
 * Detention time
 * /chemistry/detention-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Detention time',
    'meta' => ['title' => 'Detention Time Calculator: Volume and Flow Rate', 'description' => 'Work out how long water is actually held in a tank, from its working volume and the flow passing through it, reported in days, in hours and in minutes.', 'h1' => 'Detention time', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'volume',
                    'label' => 'Working volume of the tank',
                    'type' => 'number',
                    'suffix' => 'm³',
                    'default' => '1000',
                    'help' => 'The volume water actually occupies, not the tank\'s nominal size',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'flow',
                    'label' => 'Flow through the tank',
                    'type' => 'number',
                    'suffix' => 'm³/d',
                    'default' => '5000',
                    'help' => 'Average daily flow, not the peak',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'detention_days',
                    'label' => 'Detention time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'd',
                ],
                [
                    'name' => 'detention_hours',
                    'label' => 'Detention time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'detention_minutes',
                    'label' => 'Detention time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'min',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Detention time',
            'results' => [
                'detention_days' => 'volume/flow',
                'detention_hours' => 'volume/flow*24',
                'detention_minutes' => 'volume/flow*1440',
                'volume' => 'detention_days*flow',
                'flow' => 'volume/detention_days',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Detention time is the volume divided by the flow: <strong>t = V ÷ Q</strong>. It is the average time a drop spends in the tank, and it sets how much settling, mixing or disinfection can happen before the water leaves.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Detention time is the first number a treatment works is designed around. A primary clarifier needs two hours for grit and floc to settle; a chlorine contact tank needs half an hour of travel for disinfection; a lagoon needs weeks. All of them are volume over flow.</p><p>The page reports <strong>detention time (d) and detention time (h) and detention time (min)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Detention time (d)</strong></td><td><code>Working volume of the tank ÷ Flow through the tank</code></td></tr><tr><td><strong>Detention time (h)</strong></td><td><code>Working volume of the tank ÷ Flow through the tank × 24</code></td></tr><tr><td><strong>Detention time (min)</strong></td><td><code>Working volume of the tank ÷ Flow through the tank × 1440</code></td></tr><tr><td><strong>Working volume of the tank</strong></td><td><code>Detention time (d) × Flow through the tank</code></td></tr><tr><td><strong>Flow through the tank</strong></td><td><code>Working volume of the tank ÷ Detention time (d)</code></td></tr></tbody></table><p><p>Because it is a volume divided by a volume per time, the answer arrives in whatever time unit the flow is given in. A flow in cubic metres per day gives days, and the other two results convert from there.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports detention time (d) and detention time (h) and detention time (min).</p><ul><li><strong>Working volume of the tank</strong> — in m³. The volume water actually occupies, not the tank&#x27;s nominal size</li><li><strong>Flow through the tank</strong> — in m³/d. Average daily flow, not the peak</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Detention time</strong> — in d</li><li><strong>Detention time</strong> — in h</li><li><strong>Detention time</strong> — in min</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Working volume of the tank = 1 000 m³, Flow through the tank = 5 000 m³/d — and the results panel reads:</p><ul><li><strong>Detention time</strong> = <code>Working volume of the tank ÷ Flow through the tank</code> = <strong>0.2 d</strong></li><li><strong>Detention time</strong> = <code>Working volume of the tank ÷ Flow through the tank × 24</code> = <strong>4.8 h</strong></li><li><strong>Detention time</strong> = <code>Working volume of the tank ÷ Flow through the tank × 1440</code> = <strong>288 min</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 000 ÷ 5 000 = 0.2</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 1 000 m³ tank with 5 000 m³ a day passing through it holds water for 0.2 days — 4.8 hours, or 288 minutes. Halving the flow doubles the detention time; halving the tank halves it.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the figure with the process: below 1.5 hours a clarifier will pass solids through, and above about 30 hours a chlorine contact tank has lost most of its disinfectant to demand before the water leaves.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Detention time</th><th>Detention time</th><th>Detention time</th></tr></thead><tbody><tr><td><strong>Working volume of the tank</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Flow through the tank</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Working volume of the tank</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Flow through the tank</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Working volume of the tank = 250, Flow through the tank = 1 000, the page reports <strong>Detention time</strong> = 0.25 d, <strong>Detention time</strong> = 6 h, <strong>Detention time</strong> = 360 min. A small contact tank: 0.25 days, or 6 hours, which is far longer than disinfection needs.</li><li>With Working volume of the tank = 5 000, Flow through the tank = 20 000, the page reports <strong>Detention time</strong> = 0.25 d, <strong>Detention time</strong> = 6 h, <strong>Detention time</strong> = 360 min. A large lagoon at quarter of a day — 6 hours is short for a lagoon and long for a clarifier.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Nominal volume used.</strong> Freeboard is not water; the working volume is what counts.</li><li><strong>Peak flow treated as average.</strong> Detention time at peak flow is much shorter, and that is the case that fails.</li><li><strong>Units mixed.</strong> A volume in litres and a flow in cubic metres per day gives an answer a thousand times too large.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Detention time (d), Detention time (h), Detention time (min).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Cubic metres divided by cubic metres per day gives days. The page also reports hours and minutes, which are the same quantity multiplied by 24 and 1 440.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need working volume of the tank and flow through the tank. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Detention time (d) and detention time (h) and detention time (min) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Working volume of the tank</strong> ×10</td><td>0.2</td><td>2</td><td>ten times larger</td></tr><tr><td><strong>Flow through the tank</strong> ×10</td><td>0.2</td><td>0.02</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It is an average, not a guarantee.</strong> Short-circuiting means some water leaves far sooner than the calculation says.</li><li><strong>It ignores the process.</strong> Detention time says how long, not whether that is long enough.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing a clarifier or contact tank.</li></li><li><li>Checking a works against its design flow.</li></li><li><li>Converting a design detention time into a volume.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/hydraulic-retention-time">Hydraulic retention time</a> <a href="/chemistry/residence-time">Residence time</a> <a href="/chemistry/dilution-factor">Dilution factor</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Detention time calculator work out?', 'a' => <<<'TXT'
            It returns detention time (d) and detention time (h) and detention time (min) from working volume of the tank and flow through the tank. The relationship is Working volume of the tank ÷ Flow through the tank.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Working volume of the tank (m³), Flow through the tank (m³/d). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: working volume of the tank in m³; flow through the tank in m³/d. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is the difference between detention time and retention time?', 'a' => 'In a tank they are the same volume-over-flow calculation. Hydraulic retention time is the same idea applied to biological reactors, where recycle also matters.'],
            ['q' => 'Why is peak flow used in design?', 'a' => 'Because detention time is shortest at peak flow, and that is when the process has to still work. Designing on the average fails on a wet day.'],
        ],
        'related' => [
            ['path' => '/chemistry/hydraulic-retention-time', 'name' => 'Hydraulic retention time'],
            ['path' => '/chemistry/residence-time', 'name' => 'Residence time'],
            ['path' => '/chemistry/dilution-factor', 'name' => 'Dilution factor'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
