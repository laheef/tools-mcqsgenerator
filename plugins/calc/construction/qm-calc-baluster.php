<?php

/**
 * Baluster
 * /construction/baluster
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Baluster',
    'meta' => ['title' => 'Baluster Calculator: Count, Gap and Spacing', 'description' => 'Work out how many balusters a rail run takes, the equal gap between them and the centre spacing, while keeping the gap under your limit. See the steps.', 'h1' => 'Baluster', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'run',
                    'label' => 'Run between posts',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '96',
                    'help' => 'Clear opening',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'baluster_width',
                    'label' => 'Baluster width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '1.5',
                    'help' => 'Face width',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'max_gap',
                    'label' => 'Maximum gap',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'help' => 'Building code usually caps this at four',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'balusters',
                    'label' => 'Balusters',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'gap',
                    'label' => 'Equal gap',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'spacing',
                    'label' => 'Centre spacing',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'coverage',
                    'label' => 'Closed share',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Baluster',
            'results' => [
                'balusters' => 'ceil((run-max_gap)/(baluster_width+max_gap))',
                'gap' => '(run-ceil((run-max_gap)/(baluster_width+max_gap))*baluster_width)/(ceil((run-max_gap)/(baluster_width+max_gap))+1)',
                'spacing' => 'baluster_width+(run-ceil((run-max_gap)/(baluster_width+max_gap))*baluster_width)/(ceil((run-max_gap)/(baluster_width+max_gap))+1)',
                'coverage' => 'ceil((run-max_gap)/(baluster_width+max_gap))*baluster_width/run*100',
                'run' => 'balusters*baluster_width+(balusters+1)*gap',
                'max_gap' => '(run-balusters*baluster_width)/(balusters+1)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Balusters = (run − max gap) ÷ (baluster width + max gap)</strong>, rounded up; the gap is then equalised across the run.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A balustrade is judged by its gaps, not by its balusters. The building code cares that a sphere of a certain size cannot pass between them, so the job is to fit as few balusters as the gap allows and then space them perfectly evenly, because the eye reads the gaps.</p><p>The page reports <strong>balusters and equal gap and centre spacing and closed share</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Balusters</strong></td><td><code>ceil((Run between posts-Maximum gap) ÷ (Baluster width+Maximum gap))</code></td></tr><tr><td><strong>Equal gap</strong></td><td><code>(Run between posts-ceil((Run between posts-Maximum gap) ÷ (Baluster width+Maximum gap)) × Baluster width) ÷ (ceil((Run between posts-Maximum gap) ÷ (Baluster width+Maximum gap))+1)</code></td></tr><tr><td><strong>Centre spacing</strong></td><td><code>Baluster width+(Run between posts-ceil((Run between posts-Maximum gap) ÷ (Baluster width+Maximum gap)) × Baluster width) ÷ (ceil((Run between posts-Maximum gap) ÷ (Baluster width+Maximum gap))+1)</code></td></tr><tr><td><strong>Closed share</strong></td><td><code>ceil((Run between posts-Maximum gap) ÷ (Baluster width+Maximum gap)) × Baluster width ÷ Run between posts × 100</code></td></tr><tr><td><strong>Run between posts</strong></td><td><code>Balusters × Baluster width+(Balusters+1) × Equal gap</code></td></tr><tr><td><strong>Maximum gap</strong></td><td><code>(Run between posts-Balusters × Baluster width) ÷ (Balusters+1)</code></td></tr></tbody></table><p><p>If there are n balusters there are n+1 gaps, one at each end and one between every pair. The count comes from assuming the widest allowed gap and rounding up, and the equal gap is then whatever is left of the run after the balusters are taken out, shared between those gaps.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports balusters and equal gap and centre spacing and closed share.</p><ul><li><strong>Run between posts</strong> — in in. Clear opening</li><li><strong>Baluster width</strong> — in in. Face width</li><li><strong>Maximum gap</strong> — in in. Building code usually caps this at four</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Balusters</strong></li><li><strong>Equal gap</strong> — in in</li><li><strong>Centre spacing</strong> — in in</li><li><strong>Closed share</strong> — in %</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Run between posts = 96 in, Baluster width = 1.5 in, Maximum gap = 4 in — and the results panel reads:</p><ul><li><strong>Balusters</strong> = <code>ceil((Run between posts-Maximum gap) ÷ (Baluster width+Maximum gap))</code> = <strong>17</strong></li><li><strong>Equal gap</strong> = <code>(Run between posts-ceil((Run between posts-Maximum gap) ÷ (Baluster width+Maximum gap)) × Baluster width) ÷ (ceil((Run between posts-Maximum gap) ÷ (Baluster width+Maximum gap))+1)</code> = <strong>3.917 in</strong></li><li><strong>Centre spacing</strong> = <code>Baluster width+(Run between posts-ceil((Run between posts-Maximum gap) ÷ (Baluster width+Maximum gap)) × Baluster width) ÷ (ceil((Run between posts-Maximum gap) ÷ (Baluster width+Maximum gap))+1)</code> = <strong>5.417 in</strong></li><li><strong>Closed share</strong> = <code>ceil((Run between posts-Maximum gap) ÷ (Baluster width+Maximum gap)) × Baluster width ÷ Run between posts × 100</code> = <strong>26.562 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>ceil((96-4) ÷ (1.5+4)) = 17</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 96 in opening with 1.5 in balusters and a 3.917 in limit takes 17 balusters at a 3.917 in gap, which is 5.417 in between centres and 26.562 of the run closed.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the equal gap against the limit: it should always come out at or under it, and usually just under. A gap well below the limit means a baluster too many, which is a cost you did not need.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Balusters</th><th>Equal gap</th><th>Centre spacing</th><th>Closed share</th></tr></thead><tbody><tr><td><strong>Run between posts</strong> +10 %</td><td>+11.76 %</td><td>−1.57 %</td><td>−1.14 %</td><td>+1.6 %</td></tr><tr><td><strong>Baluster width</strong> +10 %</td><td>+0 %</td><td>−3.62 %</td><td>+0.15 %</td><td>+10 %</td></tr><tr><td><strong>Maximum gap</strong> +10 %</td><td>−5.88 %</td><td>+8.14 %</td><td>+5.88 %</td><td>−5.88 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Run between posts</strong>: a ten per cent move there shifts the result by about 11.8 per cent. The least sensitive is <strong>Maximum gap</strong>, at 8.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Run between posts = 72, Maximum gap = 4, Baluster width = 2, the page reports <strong>Balusters</strong> = 12, <strong>Equal gap</strong> = 3.692 in, <strong>Centre spacing</strong> = 5.692 in, <strong>Closed share</strong> = 33.333 %. Heavier balusters on a shorter opening: a slightly wider gap remains.</li><li>With Run between posts = 120, Maximum gap = 3.5, the page reports <strong>Balusters</strong> = 24, <strong>Equal gap</strong> = 3.36 in, <strong>Centre spacing</strong> = 4.86 in, <strong>Closed share</strong> = 30 %. A tighter gap limit on a long rail.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Running the count without the end gaps.</strong> There is always one more gap.</li><li><strong>Gap measured between centres.</strong> The code measures the clear opening.</li><li><strong>Cutting the last baluster to fit.</strong> Space the whole run equally instead.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Balusters, Equal gap (in), Centre spacing (in), Closed share (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Run, baluster width and gaps in inches, the count as pieces.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need run between posts and baluster width and maximum gap. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Balusters and equal gap and centre spacing and closed share should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Run between posts</strong> ×10</td><td>17</td><td>174</td><td>×10.235</td></tr><tr><td><strong>Baluster width</strong> ×10</td><td>17</td><td>5</td><td>×0.294</td></tr><tr><td><strong>Maximum gap</strong> ×10</td><td>17</td><td>2</td><td>×0.118</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Straight level run.</strong> A rake changes the count.</li><li><strong>No code check.</strong> Confirm the local limit before cutting.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Laying out a deck balustrade.</li></li><li><li>Checking a stair rail against code.</li></li><li><li>Ordering balusters for a porch.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/spindle-spacing">Spindle spacing</a> <a href="/construction/fence-picket">Fence picket</a> <a href="/construction/decking">Decking</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Baluster calculator work out?', 'a' => <<<'TXT'
            It returns balusters and equal gap and centre spacing and closed share from run between posts and baluster width and maximum gap. The relationship is ceil((Run between posts-Maximum gap) ÷ (Baluster width+Maximum gap)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Run between posts (in), Baluster width (in), Maximum gap (in). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: run between posts in in; baluster width in in; maximum gap in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many balusters per foot?', 'a' => 'About two for a one and a half inch baluster with a four inch gap limit.'],
            ['q' => 'How do I space balusters evenly?', 'a' => 'Count them first, then divide the remaining run between one more gap than there are balusters.'],
        ],
        'related' => [
            ['path' => '/construction/spindle-spacing', 'name' => 'Spindle spacing'],
            ['path' => '/construction/fence-picket', 'name' => 'Fence picket'],
            ['path' => '/construction/decking', 'name' => 'Decking'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
