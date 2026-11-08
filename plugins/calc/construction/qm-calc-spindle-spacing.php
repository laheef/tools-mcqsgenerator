<?php

/**
 * Spindle spacing
 * /construction/spindle-spacing
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Spindle spacing',
    'meta' => ['title' => 'Spindle Spacing Calculator: Marks, Equal Spacing', 'description' => 'Divide a run into equal spaces at a chosen spindle spacing, with the margin at each end, the number of marks and the real spacing. The formula is shown.', 'h1' => 'Spindle spacing', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'run',
                    'label' => 'Run',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '120',
                    'help' => 'Total length',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'spacing',
                    'label' => 'Nominal spacing',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'What you would like',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'margin',
                    'label' => 'End margin',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2',
                    'help' => 'Clear at each end',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'spaces',
                    'label' => 'Spaces',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'marks',
                    'label' => 'Marks',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'actual_spacing',
                    'label' => 'Real spacing',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'leftover',
                    'label' => 'Leftover',
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
            'title' => 'Spindle spacing',
            'results' => [
                'spaces' => 'floor((run-2*margin)/spacing)',
                'marks' => 'floor((run-2*margin)/spacing)-1',
                'actual_spacing' => '(run-2*margin)/floor((run-2*margin)/spacing)',
                'leftover' => 'run-2*margin-floor((run-2*margin)/spacing)*spacing',
                'run' => 'spaces*actual_spacing+2*margin',
                'margin' => '(run-spaces*spacing)/2',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Spaces = (run − 2 × margin) ÷ spacing</strong>, rounded down; the real spacing is the usable run divided by that count.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Spindles, pickets, hooks and shelf pins all ask the same question: how many equal gaps fit in this run without a ragged one at the end. Working from the nominal spacing gets you close; equalising the remainder is what makes the run look deliberate.</p><p>The page reports <strong>spaces and marks and real spacing and leftover</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Spaces</strong></td><td><code>floor((Run-2 × End margin) ÷ Nominal spacing)</code></td></tr><tr><td><strong>Marks</strong></td><td><code>floor((Run-2 × End margin) ÷ Nominal spacing)-1</code></td></tr><tr><td><strong>Real spacing</strong></td><td><code>(Run-2 × End margin) ÷ floor((Run-2 × End margin) ÷ Nominal spacing)</code></td></tr><tr><td><strong>Leftover</strong></td><td><code>Run-2 × End margin-floor((Run-2 × End margin) ÷ Nominal spacing) × Nominal spacing</code></td></tr><tr><td><strong>Run</strong></td><td><code>Spaces × Real spacing+2 × End margin</code></td></tr><tr><td><strong>End margin</strong></td><td><code>(Run-Spaces × Nominal spacing) ÷ 2</code></td></tr></tbody></table><p><p>The usable run is the total less a margin at each end, and the number of spaces is that run divided by the nominal spacing and rounded down, because a part space at the end is not a space. The real spacing then spreads the leftover evenly, and the marks are one fewer than the spaces.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports spaces and marks and real spacing and leftover.</p><ul><li><strong>Run</strong> — in in. Total length</li><li><strong>Nominal spacing</strong> — in in. What you would like</li><li><strong>End margin</strong> — in in. Clear at each end</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Spaces</strong></li><li><strong>Marks</strong></li><li><strong>Real spacing</strong> — in in</li><li><strong>Leftover</strong> — in in</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Run = 120 in, Nominal spacing = 6 in, End margin = 2 in — and the results panel reads:</p><ul><li><strong>Spaces</strong> = <code>floor((Run-2 × End margin) ÷ Nominal spacing)</code> = <strong>19</strong></li><li><strong>Marks</strong> = <code>floor((Run-2 × End margin) ÷ Nominal spacing)-1</code> = <strong>18</strong></li><li><strong>Real spacing</strong> = <code>(Run-2 × End margin) ÷ floor((Run-2 × End margin) ÷ Nominal spacing)</code> = <strong>6.105 in</strong></li><li><strong>Leftover</strong> = <code>Run-2 × End margin-floor((Run-2 × End margin) ÷ Nominal spacing) × Nominal spacing</code> = <strong>2 in</strong></li></ul><p>With the numbers written into the formula, the first result is <code>floor((120-2 × 2) ÷ 6) = 19</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 120 in run with a 3 in margin at each end gives 19 spaces at 6.105 in instead of 6 in, 18 marks in all, with 2 in to absorb.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the real spacing against the nominal: the difference is the leftover divided by the number of spaces. More than an eighth of an inch means the nominal spacing should be changed rather than absorbed.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Spaces</th><th>Marks</th><th>Real spacing</th><th>Leftover</th></tr></thead><tbody><tr><td><strong>Run</strong> +10 %</td><td>+10.53 %</td><td>+11.11 %</td><td>−0.16 %</td><td>+0 %</td></tr><tr><td><strong>Nominal spacing</strong> +10 %</td><td>−10.53 %</td><td>−11.11 %</td><td>+11.76 %</td><td>+90 %</td></tr><tr><td><strong>End margin</strong> +10 %</td><td>−5.26 %</td><td>−5.56 %</td><td>+3.19 %</td><td>+170 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>End margin</strong>: a ten per cent move there shifts the result by about 170 per cent. The least sensitive is <strong>Run</strong>, at 11.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Run = 96, Nominal spacing = 4, End margin = 1.5, the page reports <strong>Spaces</strong> = 23, <strong>Marks</strong> = 22, <strong>Real spacing</strong> = 4.043 in, <strong>Leftover</strong> = 1 in. Close spacing on a short run: a small absorbable leftover.</li><li>With Run = 240, Nominal spacing = 8, End margin = 3, the page reports <strong>Spaces</strong> = 29, <strong>Marks</strong> = 28, <strong>Real spacing</strong> = 8.069 in, <strong>Leftover</strong> = 2 in. A long run where the leftover vanishes into the spacing.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Spaces counted as marks.</strong> There is one more space than mark.</li><li><strong>Margin applied at one end only.</strong> It is at each end.</li><li><strong>Leftover crammed into the last gap.</strong> Spread it.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Spaces, Marks, Real spacing (in), Leftover (in).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>All lengths in inches, counts as pieces and marks.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need run and nominal spacing and end margin. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Spaces and marks and real spacing and leftover should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Run</strong> ×10</td><td>19</td><td>199</td><td>×10.474</td></tr><tr><td><strong>Nominal spacing</strong> ×10</td><td>19</td><td>1</td><td>×0.053</td></tr><tr><td><strong>End margin</strong> ×10</td><td>19</td><td>10</td><td>×0.526</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Equal spacing.</strong> A wall that is out of square needs on-site adjustment.</li><li><strong>No spindle width.</strong> Subtract it first if the gap matters.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting out a spindle rail.</li></li><li><li>Spacing hooks or pegs evenly.</li></li><li><li>Dividing a shelf run into bays.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/baluster">Baluster</a> <a href="/construction/fence-picket">Fence picket</a> <a href="/construction/board-and-batten">Board and batten</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Spindle spacing calculator work out?', 'a' => <<<'TXT'
            It returns spaces and marks and real spacing and leftover from run and nominal spacing and end margin. The relationship is floor((Run-2 × End margin) ÷ Nominal spacing).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Run (in), Nominal spacing (in), End margin (in). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: run in in; nominal spacing in in; end margin in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I divide a run into equal spaces?', 'a' => 'Choose the spacing you want, take the number of whole spaces that fit, then share the leftover.'],
            ['q' => 'How many marks for a 120 inch run?', 'a' => 'Eighteen at a six inch spacing with a two inch margin, which gives nineteen spaces.'],
        ],
        'related' => [
            ['path' => '/construction/baluster', 'name' => 'Baluster'],
            ['path' => '/construction/fence-picket', 'name' => 'Fence picket'],
            ['path' => '/construction/board-and-batten', 'name' => 'Board and batten'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
