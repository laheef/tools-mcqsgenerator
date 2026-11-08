<?php

/**
 * Pitch diameter
 * /construction/pitch-diameter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pitch diameter',
    'meta' => ['title' => 'Pitch Diameter Calculator: Thread Pitch and Diameters', 'description' => 'Work out the pitch, the pitch diameter and the minor diameter of a unified thread from its major diameter and threads per inch. The formula and units are shown.', 'h1' => 'Pitch diameter', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'major_diameter',
                    'label' => 'Major diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.5',
                    'help' => 'Nominal size',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tpi',
                    'label' => 'Threads per inch',
                    'type' => 'number',
                    'default' => '13',
                    'help' => 'Coarse or fine series',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pitch',
                    'label' => 'Pitch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'pitch_diameter',
                    'label' => 'Pitch diameter',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'minor_diameter',
                    'label' => 'Minor diameter',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'thread_height',
                    'label' => 'Thread height',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Pitch diameter',
            'results' => [
                'pitch' => '1/tpi',
                'pitch_diameter' => 'major_diameter-0.64952/tpi',
                'minor_diameter' => 'major_diameter-1.2269/tpi',
                'thread_height' => '0.61343/tpi',
                'major_diameter' => 'pitch_diameter+0.64952/tpi',
                'tpi' => '0.64952/(major_diameter-pitch_diameter)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Pitch = 1 ÷ TPI</strong>; <strong>pitch diameter = D − 0.649 52 × P</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The pitch diameter is the diameter at which the thread actually fits — half way up the flank — and it is the number a thread gauge, a micrometer with wires or a go/no-go gauge is really measuring. The major diameter only says how big the bolt is.</p><p>The page reports <strong>pitch and pitch diameter and minor diameter and thread height</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Pitch</strong></td><td><code>1 ÷ Threads per inch</code></td></tr><tr><td><strong>Pitch diameter</strong></td><td><code>Major diameter-0.64952 ÷ Threads per inch</code></td></tr><tr><td><strong>Minor diameter</strong></td><td><code>Major diameter-1.2269 ÷ Threads per inch</code></td></tr><tr><td><strong>Thread height</strong></td><td><code>0.61343 ÷ Threads per inch</code></td></tr><tr><td><strong>Major diameter</strong></td><td><code>Pitch diameter+0.64952 ÷ Threads per inch</code></td></tr><tr><td><strong>Threads per inch</strong></td><td><code>0.64952 ÷ (Major diameter-Pitch diameter)</code></td></tr></tbody></table><p><p>The pitch is one divided by the threads per inch. The unified thread form takes 0.649 52 pitches off the major diameter to reach the pitch diameter, and 1.2269 pitches to reach the minor. The thread height is 0.613 43 of the pitch.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports pitch and pitch diameter and minor diameter and thread height.</p><ul><li><strong>Major diameter</strong> — in in. Nominal size</li><li><strong>Threads per inch</strong>. Coarse or fine series</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Pitch</strong> — in in</li><li><strong>Pitch diameter</strong> — in in</li><li><strong>Minor diameter</strong> — in in</li><li><strong>Thread height</strong> — in in</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Major diameter = 0.5 in, Threads per inch = 13 — and the results panel reads:</p><ul><li><strong>Pitch</strong> = <code>1 ÷ Threads per inch</code> = <strong>0.077 in</strong></li><li><strong>Pitch diameter</strong> = <code>Major diameter-0.64952 ÷ Threads per inch</code> = <strong>0.45 in</strong></li><li><strong>Minor diameter</strong> = <code>Major diameter-1.2269 ÷ Threads per inch</code> = <strong>0.406 in</strong></li><li><strong>Thread height</strong> = <code>0.61343 ÷ Threads per inch</code> = <strong>0.047 in</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 ÷ 13 = 0.077</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 0.5 in bolt at 13 has a pitch of 0.077 in, a pitch diameter of 0.45 in, a minor diameter of 0.406 in and a thread height of 0.047 in.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the pitch diameter against the major: it should sit a little under it, and the gap grows as the thread gets coarser. On a half-inch coarse thread the pitch diameter is about nine tenths of the nominal size.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Pitch</th><th>Pitch diameter</th><th>Minor diameter</th><th>Thread height</th></tr></thead><tbody><tr><td><strong>Major diameter</strong> +10 %</td><td>+0 %</td><td>+11.11 %</td><td>+12.33 %</td><td>+0 %</td></tr><tr><td><strong>Threads per inch</strong> +10 %</td><td>−9.09 %</td><td>+1.01 %</td><td>+2.12 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Major diameter</strong>: a ten per cent move there shifts the result by about 12.3 per cent. The least sensitive is <strong>Threads per inch</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Major diameter = 1, Threads per inch = 8, the page reports <strong>Pitch</strong> = 0.125 in, <strong>Pitch diameter</strong> = 0.919 in, <strong>Minor diameter</strong> = 0.847 in, <strong>Thread height</strong> = 0.077 in. A one inch coarse thread: a deep, strong form.</li><li>With Major diameter = 0.25, Threads per inch = 28, the page reports <strong>Pitch</strong> = 0.036 in, <strong>Pitch diameter</strong> = 0.227 in, <strong>Minor diameter</strong> = 0.206 in, <strong>Thread height</strong> = 0.022 in. A quarter inch fine thread: a shallow form for thin walls.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Pitch entered as TPI.</strong> They are reciprocals.</li><li><strong>Major diameter measured over the crest burs.</strong> Clean the thread first.</li><li><strong>Metric thread checked against unified constants.</strong> The form is different.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Pitch (in), Pitch diameter (in), Minor diameter (in), Thread height (in).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameters and pitch in inches, threads per inch as a count.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need major diameter and threads per inch. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Pitch and pitch diameter and minor diameter and thread height should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Major diameter</strong> ×10</td><td>0.077</td><td>0.077</td><td>unchanged</td></tr><tr><td><strong>Threads per inch</strong> ×10</td><td>0.077</td><td>0.008</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Unified form.</strong> Metric and Whitworth threads use other constants.</li><li><strong>No tolerance class.</strong> Allowances are separate.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Checking a thread with wires.</li></li><li><li>Choosing a tap drill.</li></li><li><li>Specifying a thread on a drawing.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/thread">Thread</a> <a href="/construction/thread-pitch">Thread pitch</a> <a href="/construction/bolt-circle">Bolt circle</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pitch diameter calculator work out?', 'a' => 'It returns pitch and pitch diameter and minor diameter and thread height from major diameter and threads per inch. The relationship is 1 ÷ Threads per inch.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Major diameter (in), Threads per inch. Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: major diameter in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is pitch diameter?', 'a' => 'The diameter where the thread flanks are half their full height — the effective diameter.'],
            ['q' => 'How do I get the pitch from threads per inch?', 'a' => 'Divide one by the threads per inch.'],
        ],
        'related' => [
            ['path' => '/construction/thread', 'name' => 'Thread'],
            ['path' => '/construction/thread-pitch', 'name' => 'Thread pitch'],
            ['path' => '/construction/bolt-circle', 'name' => 'Bolt circle'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
