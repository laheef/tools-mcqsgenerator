<?php

/**
 * Thread pitch
 * /construction/thread-pitch
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Thread pitch',
    'meta' => ['title' => 'Thread Pitch Calculator: Metric and Imperial', 'description' => 'Convert a metric thread pitch in millimetres to threads per inch and back, with the pitch in inches and micrometres for a thread gauge. See the steps.', 'h1' => 'Thread pitch', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'pitch_mm',
                    'label' => 'Pitch',
                    'type' => 'number',
                    'suffix' => 'mm',
                    'default' => '1.5',
                    'help' => 'Metric pitch',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tpi',
                    'label' => 'Threads per inch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pitch_in',
                    'label' => 'Pitch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'pitch_um',
                    'label' => 'Pitch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'µm',
                ],
                [
                    'name' => 'threads_per_cm',
                    'label' => 'Threads per cm',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Thread pitch',
            'results' => [
                'tpi' => '25.4/pitch_mm',
                'pitch_in' => 'pitch_mm/25.4',
                'pitch_um' => 'pitch_mm*1000',
                'threads_per_cm' => '10/pitch_mm',
                'pitch_mm' => '25.4/tpi',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>TPI = 25.4 ÷ pitch in mm</strong>, and <strong>pitch in mm = 25.4 ÷ TPI</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A metric thread is specified by its pitch, an imperial thread by how many fit in an inch. The two conventions describe the same helix from opposite ends, and a thread gauge or a tap set from one system has to be matched to a drawing from the other.</p><p>The page reports <strong>threads per inch and pitch (in) and pitch (µm) and threads per cm</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Threads per inch</strong></td><td><code>25.4 ÷ Pitch</code></td></tr><tr><td><strong>Pitch (in)</strong></td><td><code>Pitch ÷ 25.4</code></td></tr><tr><td><strong>Pitch (µm)</strong></td><td><code>Pitch × 1000</code></td></tr><tr><td><strong>Threads per cm</strong></td><td><code>10 ÷ Pitch</code></td></tr><tr><td><strong>Pitch</strong></td><td><code>25.4 ÷ Threads per inch</code></td></tr></tbody></table><p><p>There are twenty five point four millimetres in an inch, so threads per inch is twenty five point four divided by the pitch in millimetres — and the pitch in inches is the pitch in millimetres divided by the same number. Threads per centimetre follows the same logic in a smaller unit.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs. It reports threads per inch and pitch (in) and pitch (µm) and threads per cm.</p><ul><li><strong>Pitch</strong> — in mm. Metric pitch</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Threads per inch</strong></li><li><strong>Pitch</strong> — in in</li><li><strong>Pitch</strong> — in µm</li><li><strong>Threads per cm</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Pitch = 1.5 mm — and the results panel reads:</p><ul><li><strong>Threads per inch</strong> = <code>25.4 ÷ Pitch</code> = <strong>16.933</strong></li><li><strong>Pitch</strong> = <code>Pitch ÷ 25.4</code> = <strong>0.059 in</strong></li><li><strong>Pitch</strong> = <code>Pitch × 1000</code> = <strong>1 500 µm</strong></li><li><strong>Threads per cm</strong> = <code>10 ÷ Pitch</code> = <strong>6.667</strong></li></ul><p>With the numbers written into the formula, the first result is <code>25.4 ÷ 1.5 = 16.933</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 1.5 mm pitch is 16.933 threads per inch, a pitch of 0.059 in or 1 500 µm, and 6.667 threads to the centimetre.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the threads per inch against the millimetres: 1.0 mm is 25.4 TPI, 2.0 mm is 12.7. If the two move in the same direction, the reciprocal has been dropped and the answer is the pitch rather than the count.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Threads per inch</th><th>Pitch</th><th>Pitch</th><th>Threads per cm</th></tr></thead><tbody><tr><td><strong>Pitch</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Pitch</strong>: a ten per cent move there shifts the result by about 10 per cent. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Pitch = 2, the page reports <strong>Threads per inch</strong> = 12.7, <strong>Pitch</strong> = 0.079 in, <strong>Pitch</strong> = 2 000 µm, <strong>Threads per cm</strong> = 5. A coarse metric pitch: about thirteen threads an inch.</li><li>With Pitch = 1, the page reports <strong>Threads per inch</strong> = 25.4, <strong>Pitch</strong> = 0.039 in, <strong>Pitch</strong> = 1 000 µm, <strong>Threads per cm</strong> = 10. A fine metric pitch: close to one millimetre and a twentieth of an inch.</li><li>With Pitch = 0.5, the page reports <strong>Threads per inch</strong> = 50.8, <strong>Pitch</strong> = 0.02 in, <strong>Pitch</strong> = 500 µm, <strong>Threads per cm</strong> = 20. A miniature thread: fifty threads an inch, used in instruments and watches.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Pitch counted as threads per millimetre.</strong> It is millimetres per thread.</li><li><strong>TPI used as pitch in inches.</strong> They are reciprocals.</li><li><strong>Nominal size confused with pitch.</strong> M10 is a diameter, not a pitch.</li><li><strong>Coarse and fine series mixed.</strong> The same diameter comes in both, so the pitch has to be read from the callout.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Threads per inch, Pitch (in), Pitch (µm), Threads per cm.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Pitch in millimetres, inches and micrometres, counts as threads per inch and per centimetre.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need pitch. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Threads per inch and pitch (in) and pitch (µm) and threads per cm should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Pitch</strong> ×10</td><td>16.933</td><td>1.693</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Conversion only.</strong> Thread form and tolerance are separate.</li><li><strong>No designation decoding.</strong> M10×1.5 is diameter times pitch.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Matching a metric tap to an imperial drawing.</li></li><li><li>Setting a thread gauge.</li></li><li><li>Reading a callout.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/thread">Thread</a> <a href="/construction/pitch-diameter">Pitch diameter</a> <a href="/construction/taper">Taper</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Thread pitch calculator work out?', 'a' => 'It returns threads per inch and pitch (in) and pitch (µm) and threads per cm from pitch. The relationship is 25.4 ÷ Pitch.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Pitch (mm). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: pitch in mm. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I convert pitch to threads per inch?', 'a' => 'Divide twenty five point four by the pitch in millimetres.'],
            ['q' => 'What is 1.5 mm pitch in TPI?', 'a' => 'About sixteen point nine threads per inch.'],
        ],
        'related' => [
            ['path' => '/construction/thread', 'name' => 'Thread'],
            ['path' => '/construction/pitch-diameter', 'name' => 'Pitch diameter'],
            ['path' => '/construction/taper', 'name' => 'Taper'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
