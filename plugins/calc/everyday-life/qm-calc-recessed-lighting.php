<?php

/**
 * Recessed Lighting Calculator
 * /everyday-life/recessed-lighting
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Recessed Lighting Calculator',
    'meta' => ['title' => 'Recessed Lighting — Downlight Spacing and Count', 'description' => 'How many recessed lights fit a rectangular ceiling at a given spacing, and how far apart they end up when the rows divide the room instead of the other way.', 'h1' => 'Recessed Lighting Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Ceiling length',
                    'type' => 'number',
                    'suffix' => 'm',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Ceiling width',
                    'type' => 'number',
                    'suffix' => 'm',
                    'default' => '4',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'spacing',
                    'label' => 'Spacing you want',
                    'type' => 'number',
                    'suffix' => 'm',
                    'default' => '1.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'edge',
                    'label' => 'Distance from the wall to the first light',
                    'type' => 'number',
                    'suffix' => 'm',
                    'default' => '0.75',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'columns',
                    'label' => 'Lights along the length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lights',
                ],
                [
                    'name' => 'rows',
                    'label' => 'Lights across the width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lights',
                ],
                [
                    'name' => 'total',
                    'label' => 'Lights in all',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lights',
                ],
                [
                    'name' => 'actual_spacing',
                    'label' => 'Spacing you end up with',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm',
                ],
            ],
        ],
    ],
    'formula' => ['columns' => 'ceil((length - 2 * edge) / spacing) + 1', 'rows' => 'ceil((width - 2 * edge) / spacing) + 1', 'total' => '(ceil((length - 2 * edge) / spacing) + 1) * (ceil((width - 2 * edge) / spacing) + 1)', 'actual_spacing' => '(length - 2 * edge) / (ceil((length - 2 * edge) / spacing))'],
    'article' => [
        'intro' => <<<'TXT'
        Rows and columns of ceiling lights from the room's dimensions and the spacing you want, with the spacing you actually get once the count is rounded to whole lights.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Downlights are laid out as a grid, and the grid is what decides whether a ceiling looks planned or improvised. The usual rule is a gap between lights of about half the ceiling height, and half that gap again from the wall, which is why the edge distance is a box of its own.</p><p>The count is a division rounded up, then one more, because a run of lights needs a light at each end. The spacing line is the same division the other way round: it reports the gap you get once the lights are at whole positions.</p><p>The answer is <strong>lights along the length and lights across the width and lights in all and spacing you end up with</strong>, worked out from ceiling length and ceiling width and spacing you want and distance from the wall to the first light. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>columns</strong></td><td><code>ceil((Ceiling length - 2 × Distance from the wall to the first light) ÷ Spacing you want) + 1</code></td></tr><tr><td><strong>rows</strong></td><td><code>ceil((Ceiling width - 2 × Distance from the wall to the first light) ÷ Spacing you want) + 1</code></td></tr><tr><td><strong>total</strong></td><td><code>(ceil((Ceiling length - 2 × Distance from the wall to the first light) ÷ Spacing you want) + 1) × (ceil((Ceiling width - 2 × Distance from the wall to the first light) ÷ Spacing you want) + 1)</code></td></tr><tr><td><strong>actual_spacing</strong></td><td><code>(Ceiling length - 2 × Distance from the wall to the first light) ÷ (ceil((Ceiling length - 2 × Distance from the wall to the first light) ÷ Spacing you want))</code></td></tr></tbody></table><p>The distance between the first and last light is the room minus two edge gaps. Dividing it by the spacing gives the number of gaps, which is rounded up to whole gaps and then one light more. The actual spacing is that distance divided by the rounded gap count.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports lights along the length and lights across the width and lights in all and spacing you end up with.</p><ul><li><strong>Ceiling length</strong> — m.</li><li><strong>Ceiling width</strong> — m.</li><li><strong>Spacing you want</strong> — m.</li><li><strong>Distance from the wall to the first light</strong> — m.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Lights along the length</strong> — lights.</li><li><strong>Lights across the width</strong> — lights.</li><li><strong>Lights in all</strong> — lights.</li><li><strong>Spacing you end up with</strong> — m.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put ceiling length = 5 m, ceiling width = 4 m, spacing you want = 1.5 m, distance from the wall to the first light = 0.75 m into the form and the panel reads:</p><ul><li><strong>Lights along the length</strong> = <code>ceil((Ceiling length - 2 × Distance from the wall to the first light) ÷ Spacing you want) + 1</code> = <strong>4 lights</strong></li><li><strong>Lights across the width</strong> = <code>ceil((Ceiling width - 2 × Distance from the wall to the first light) ÷ Spacing you want) + 1</code> = <strong>3 lights</strong></li><li><strong>Lights in all</strong> = <code>(ceil((Ceiling length - 2 × Distance from the wall to the first light) ÷ Spacing you want) + 1) × (ceil((Ceiling width - 2 × Distance from the wall to the first light) ÷ Spacing you want) + 1)</code> = <strong>12 lights</strong></li><li><strong>Spacing you end up with</strong> = <code>(Ceiling length - 2 × Distance from the wall to the first light) ÷ (ceil((Ceiling length - 2 × Distance from the wall to the first light) ÷ Spacing you want))</code> = <strong>1.167 m</strong></li></ul><p>The actual spacing line is the useful one: it is what the fitter will measure, and it is never quite the number you asked for.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>ceil((5 - 2 × 0.75) ÷ 1.5) + 1</code>, which comes to <strong>4 lights</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A 5 m ceiling with 0.75 m edges leaves 3.5 m between the end lights. At 1.5 m spacing that is 2.33 gaps, so three gaps and four lights, giving 1.167 m between them.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Lights along the length</th><th>Lights across the width</th><th>Lights in all</th><th>Spacing you end up with</th></tr></thead><tbody><tr><td><strong>Ceiling length</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+14.29 %</td></tr><tr><td><strong>Ceiling width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Spacing you want</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Distance from the wall to the first light</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−4.29 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Ceiling length</strong>. <strong>Spacing you want</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Ceiling length</strong> opens at 5 m</li><li><strong>Ceiling width</strong> opens at 4 m</li><li><strong>Spacing you want</strong> opens at 1.5 m</li><li><strong>Distance from the wall to the first light</strong> opens at 0.75 m</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Ceiling length</th><th>Lights along the length</th><th>Lights across the width</th><th>Lights in all</th><th>Spacing you end up with</th></tr></thead><tbody><tr><td>2.5 m</td><td>2</td><td>3</td><td>6</td><td>1</td></tr><tr><td>5 m</td><td>4</td><td>3</td><td>12</td><td>1.167</td></tr><tr><td>10 m</td><td>7</td><td>3</td><td>21</td><td>1.417</td></tr><tr><td>25 m</td><td>17</td><td>3</td><td>51</td><td>1.469</td></tr><tr><td>50 m</td><td>34</td><td>3</td><td>102</td><td>1.47</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set ceiling length = 5, ceiling width = 4, spacing you want = 2, distance from the wall to the first light = 1: <strong>Lights along the length</strong> = 3 lights, <strong>Lights across the width</strong> = 2 lights, <strong>Lights in all</strong> = 6 lights, <strong>Spacing you end up with</strong> = 1.5 m. A wider spacing with a bigger edge margin gives three lights by two: six in all, and 1.5 m apart.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Forgetting the plus one.</strong> Three gaps need four lights; counting gaps gives one light short every time.</li><li><strong>Starting at the wall.</strong> The edge distance is there so the first light is not in the corner, where it lights the wall and not the room.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Rectangular ceilings only.</strong> A room with a chimney breast or an L-shape is two rectangles and two passes.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need ceiling length and ceiling width and spacing you want and distance from the wall to the first light. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Lights along the length and lights across the width and lights in all and spacing you end up with should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Marking out a ceiling before the plasterboard goes up.</li></li><li><li>Checking a electrician's proposed layout against the room's proportions.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/lighting">Lighting calculator</a> <a href="/everyday-life/lumens-to-watts">Lumens to watts</a> <a href="/everyday-life/led-savings">LED savings</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Ceiling length</strong> ×10</td><td>4</td><td>34</td><td>×8.5</td></tr><tr><td><strong>Ceiling width</strong> ×10</td><td>4</td><td>4</td><td>unchanged</td></tr><tr><td><strong>Spacing you want</strong> ×10</td><td>4</td><td>2</td><td>×0.5</td></tr><tr><td><strong>Distance from the wall to the first light</strong> ×10</td><td>4</td><td>-5</td><td>×-1.25</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Recessed Lighting calculator work out?', 'a' => <<<'TXT'
            It returns lights along the length and lights across the width and lights in all and spacing you end up with from ceiling length and ceiling width and spacing you want and distance from the wall to the first light. The relationship is ceil((Ceiling length - 2 × Distance from the wall to the first light) ÷ Spacing you want) + 1.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Ceiling length (m), Ceiling width (m), Spacing you want (m), Distance from the wall to the first light (m). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: ceiling length in m; ceiling width in m; spacing you want in m; distance from the wall to the first light in m. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'What spacing should I use?', 'a' => 'Half the ceiling height is the common rule, so a 2.4 m ceiling wants about 1.2 m. Brighter rooms can go wider and dimmer ones need it tighter.'],
            ['q' => 'Why is the edge distance half the spacing?', 'a' => 'Because a light close to a wall throws a bright scallop up it. Half the spacing keeps the wall evenly lit.'],
            ['q' => 'Does the count include the lights at the ends?', 'a' => 'Yes. The plus one in the formula is the far end, and the first light is already at the edge distance.'],
        ],
        'related' => [
            ['path' => '/everyday-life/lighting', 'name' => 'Lighting calculator'],
            ['path' => '/everyday-life/lumens-to-watts', 'name' => 'Lumens to watts'],
            ['path' => '/everyday-life/led-savings', 'name' => 'LED savings'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
