<?php

/**
 * Litres per minute
 * /construction/liters-per-minute
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Litres per minute',
    'meta' => ['title' => 'Litres per Minute Calculator: Flow Rate Conversion', 'description' => 'Convert a volume and a time into litres per minute, with the same flow in litres per second and US gallons per minute. The formula and units are shown.', 'h1' => 'Litres per minute', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'liters',
                    'label' => 'Volume',
                    'type' => 'number',
                    'suffix' => 'L',
                    'default' => '200',
                    'help' => 'Total measured',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'seconds',
                    'label' => 'Time',
                    'type' => 'number',
                    'suffix' => 's',
                    'default' => '60',
                    'help' => 'Duration',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'lpm',
                    'label' => 'Flow',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L/min',
                ],
                [
                    'name' => 'lps',
                    'label' => 'Flow',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L/s',
                ],
                [
                    'name' => 'gpm',
                    'label' => 'Flow',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gpm',
                ],
                [
                    'name' => 'm3h',
                    'label' => 'Flow',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm³/h',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Litres per minute',
            'results' => [
                'lpm' => 'liters*60/seconds',
                'lps' => 'liters/seconds',
                'gpm' => 'liters*60/seconds/3.78541',
                'm3h' => 'liters*60/seconds*0.06',
                'liters' => 'lpm*seconds/60',
                'seconds' => 'liters*60/lpm',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>L/min = litres × 60 ÷ seconds</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Metric plumbing is quoted in litres a minute and imperial plumbing in gallons a minute, and the two are close enough to be confused. A shower in litres a minute sounds larger than the same shower in gallons, and a datasheet in either unit is no use until it is in the one your fixtures use.</p><p>The page reports <strong>flow (L/min) and flow (L/s) and flow (gpm) and flow (m³/h)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Flow (L per min)</strong></td><td><code>Volume × 60 ÷ Time</code></td></tr><tr><td><strong>Flow (L per s)</strong></td><td><code>Volume ÷ Time</code></td></tr><tr><td><strong>Flow (gpm)</strong></td><td><code>Volume × 60 ÷ Time ÷ 3.78541</code></td></tr><tr><td><strong>Flow (m³ per h)</strong></td><td><code>Volume × 60 ÷ Time × 0.06</code></td></tr><tr><td><strong>Volume</strong></td><td><code>Flow (L per min) × Time ÷ 60</code></td></tr><tr><td><strong>Time</strong></td><td><code>Volume × 60 ÷ Flow (L per min)</code></td></tr></tbody></table><p><p>Litres per minute is the volume multiplied by sixty and divided by the seconds it took. Litres per second is the same volume over the raw seconds. Gallons a minute divides the metric answer by three point seven eight five, and cubic metres an hour multiplies it by sixty thousandths.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports flow (L/min) and flow (L/s) and flow (gpm) and flow (m³/h).</p><ul><li><strong>Volume</strong> — in L. Total measured</li><li><strong>Time</strong> — in s. Duration</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Flow</strong> — in L/min</li><li><strong>Flow</strong> — in L/s</li><li><strong>Flow</strong> — in gpm</li><li><strong>Flow</strong> — in m³/h</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Volume = 200 L, Time = 60 s — and the results panel reads:</p><ul><li><strong>Flow</strong> = <code>Volume × 60 ÷ Time</code> = <strong>200 L/min</strong></li><li><strong>Flow</strong> = <code>Volume ÷ Time</code> = <strong>3.333 L/s</strong></li><li><strong>Flow</strong> = <code>Volume × 60 ÷ Time ÷ 3.78541</code> = <strong>52.834 gpm</strong></li><li><strong>Flow</strong> = <code>Volume × 60 ÷ Time × 0.06</code> = <strong>12 m³/h</strong></li></ul><p>With the numbers written into the formula, the first result is <code>200 × 60 ÷ 60 = 200</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>200 L in 60 s is 200 L/min, or 3.333 L/s, or 52.834 gpm in US gallons, and 12 m³/h.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the litres a minute against the gallons: a gallon is under four litres, so the metric figure should be roughly four times the imperial one. A ratio near one means a conversion has been skipped.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Flow</th><th>Flow</th><th>Flow</th><th>Flow</th></tr></thead><tbody><tr><td><strong>Volume</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Time</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Volume</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Time</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Volume = 10, Time = 30, the page reports <strong>Flow</strong> = 20 L/min, <strong>Flow</strong> = 0.333 L/s, <strong>Flow</strong> = 5.283 gpm, <strong>Flow</strong> = 1.2 m³/h. A tap test: twenty litres a minute.</li><li>With Volume = 1 200, Time = 600, the page reports <strong>Flow</strong> = 120 L/min, <strong>Flow</strong> = 2 L/s, <strong>Flow</strong> = 31.701 gpm, <strong>Flow</strong> = 7.2 m³/h. A long pump test at a steady rate.</li><li>With Volume = 2, Time = 15, the page reports <strong>Flow</strong> = 8 L/min, <strong>Flow</strong> = 0.133 L/s, <strong>Flow</strong> = 2.113 gpm, <strong>Flow</strong> = 0.48 m³/h. A dripping outlet: eight litres a minute.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Time in minutes.</strong> This form asks for seconds.</li><li><strong>US and imperial gallons mixed.</strong> They differ by a fifth.</li><li><strong>Average flow used as peak demand.</strong></li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Flow (L/min), Flow (L/s), Flow (gpm), Flow (m³/h).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Volume in litres, time in seconds, flow in litres per minute and second, US gallons per minute and cubic metres per hour.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need volume and time. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Flow (l/min) and flow (l/s) and flow (gpm) and flow (m³/h) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Volume</strong> ×10</td><td>200</td><td>2 000</td><td>ten times larger</td></tr><tr><td><strong>Time</strong> ×10</td><td>200</td><td>20</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Steady flow.</strong> A pump's rate depends on head.</li><li><strong>No pressure.</strong> Flow alone does not describe a supply.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Converting a pump datasheet.</li></li><li><li>Checking a shower flow rate.</li></li><li><li>Recording a borehole yield.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/gallons-per-minute">Gallons per minute</a> <a href="/construction/fire-flow">Fire flow</a> <a href="/construction/cfm">CFM</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Litres per minute calculator work out?', 'a' => 'It returns flow (L/min) and flow (L/s) and flow (gpm) and flow (m³/h) from volume and time. The relationship is Volume × 60 ÷ Time.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Volume (L), Time (s). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: volume in L; time in s. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I convert litres per minute to gallons per minute?', 'a' => 'Divide by 3.785.'],
            ['q' => 'How many litres a minute is a good shower?', 'a' => 'About nine or ten, which is under three gallons a minute.'],
        ],
        'related' => [
            ['path' => '/construction/gallons-per-minute', 'name' => 'Gallons per minute'],
            ['path' => '/construction/fire-flow', 'name' => 'Fire flow'],
            ['path' => '/construction/cfm', 'name' => 'CFM'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
