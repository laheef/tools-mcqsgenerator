<?php

/**
 * Picture Frame Calculator
 * /everyday-life/picture-frame
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Picture Frame Calculator',
    'meta' => ['title' => 'Picture Frame Size — Mat, Glass and Moulding', 'description' => 'Art size, mat border and moulding width give the glass, the inside opening, the outside frame and the feet of moulding you need to order at a framing counter.', 'h1' => 'Picture Frame Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'art_width',
                    'label' => 'Artwork width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '16',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'art_height',
                    'label' => 'Artwork height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mat',
                    'label' => 'Mat border',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3',
                    'help' => 'Two to three inches is a gallery border. A mat narrower than two inches leaves the art crowded in its frame.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'moulding',
                    'label' => 'Moulding width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '1.5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'glass_width',
                    'label' => 'Glass width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'glass_height',
                    'label' => 'Glass height',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'frame_width',
                    'label' => 'Frame outside width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'frame_height',
                    'label' => 'Frame outside height',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'moulding_ft',
                    'label' => 'Moulding needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'mat_area',
                    'label' => 'Mat area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'sq in',
                ],
            ],
        ],
    ],
    'formula' => [
        'glass_width' => 'art_width + 2 * mat',
        'glass_height' => 'art_height + 2 * mat',
        'frame_width' => 'art_width + 2 * mat + 2 * moulding',
        'frame_height' => 'art_height + 2 * mat + 2 * moulding',
        'moulding_ft' => '2 * (art_width + 2 * mat + 2 * moulding + art_height + 2 * mat + 2 * moulding) / 12',
        'mat_area' => '(art_width + 2 * mat) * (art_height + 2 * mat) - art_width * art_height',
    ],
    'article' => [
        'intro' => 'The outside size of a framed picture, the glass size behind the mat, the frame\'s perimeter in feet for ordering moulding, and the mat area you will lose.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Three widths stack on every side of a picture: the art, the mat, the moulding. Sixteen by twenty art with a three-inch mat needs a 22 by 26 piece of glass, and a frame cut to 25 by 29 because the moulding is an inch and a half wide.</p><p>Order the frame to the glass size and the glass to the mat, and nobody has to measure twice. The moulding figure is the outside perimeter in feet, which is how a framer prices a length.</p><p>The answer is <strong>glass width and glass height and frame outside width and frame outside height and moulding needed and mat area</strong>, worked out from artwork width and artwork height and mat border and moulding width. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>glass_width</strong></td><td><code>Artwork width + 2 × Mat border</code></td></tr><tr><td><strong>glass_height</strong></td><td><code>Artwork height + 2 × Mat border</code></td></tr><tr><td><strong>frame_width</strong></td><td><code>Artwork width + 2 × Mat border + 2 × Moulding width</code></td></tr><tr><td><strong>frame_height</strong></td><td><code>Artwork height + 2 × Mat border + 2 × Moulding width</code></td></tr><tr><td><strong>moulding_ft</strong></td><td><code>2 × (Artwork width + 2 × Mat border + 2 × Moulding width + Artwork height + 2 × Mat border + 2 × Moulding width) ÷ 12</code></td></tr><tr><td><strong>mat_area</strong></td><td><code>(Artwork width + 2 × Mat border) × (Artwork height + 2 × Mat border) - Artwork width × Artwork height</code></td></tr></tbody></table><p>Each layer adds its width twice, once at each edge. The moulding length is the outside perimeter divided by twelve, and the mat area is the glass area minus the art area, which is the four L-shaped strips in one number.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports glass width and glass height and frame outside width and frame outside height and moulding needed and mat area.</p><ul><li><strong>Artwork width</strong> — in.</li><li><strong>Artwork height</strong> — in.</li><li><strong>Mat border</strong> — in. Two to three inches is a gallery border. A mat narrower than two inches leaves the art crowded in its frame.</li><li><strong>Moulding width</strong> — in.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Glass width</strong> — in.</li><li><strong>Glass height</strong> — in.</li><li><strong>Frame outside width</strong> — in.</li><li><strong>Frame outside height</strong> — in.</li><li><strong>Moulding needed</strong> — ft.</li><li><strong>Mat area</strong> — sq in.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put artwork width = 16 in, artwork height = 20 in, mat border = 3 in, moulding width = 1.5 in into the form and the panel reads:</p><ul><li><strong>Glass width</strong> = <code>Artwork width + 2 × Mat border</code> = <strong>22 in</strong></li><li><strong>Glass height</strong> = <code>Artwork height + 2 × Mat border</code> = <strong>26 in</strong></li><li><strong>Frame outside width</strong> = <code>Artwork width + 2 × Mat border + 2 × Moulding width</code> = <strong>25 in</strong></li><li><strong>Frame outside height</strong> = <code>Artwork height + 2 × Mat border + 2 × Moulding width</code> = <strong>29 in</strong></li><li><strong>Moulding needed</strong> = <code>2 × (Artwork width + 2 × Mat border + 2 × Moulding width + Artwork height + 2 × Mat border + 2 × Moulding width) ÷ 12</code> = <strong>9 ft</strong></li><li><strong>Mat area</strong> = <code>(Artwork width + 2 × Mat border) × (Artwork height + 2 × Mat border) - Artwork width × Artwork height</code> = <strong>252 sq in</strong></li></ul><p>A narrow mat saves moulding. Drop the mat to one inch and the glass falls to 18 by 22 and the frame to 21 by 25, which is 1.3 feet less moulding, 176 square inches less mat and a smaller piece of glass.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>16 + 2 × 3</code>, which comes to <strong>22 in</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>16 by 20 art with a 3-inch mat and a 1.5-inch moulding: 22 by 26 glass, a 25 by 29 frame, 9 feet of moulding and 252 square inches of mat.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Glass width</th><th>Glass height</th><th>Frame outside width</th><th>Frame outside height</th><th>Moulding needed</th><th>Mat area</th></tr></thead><tbody><tr><td><strong>Artwork width</strong> +10 %</td><td>+7.27 %</td><td>+0 %</td><td>+6.4 %</td><td>+0 %</td><td>+2.96 %</td><td>+3.81 %</td></tr><tr><td><strong>Artwork height</strong> +10 %</td><td>+0 %</td><td>+7.69 %</td><td>+0 %</td><td>+6.9 %</td><td>+3.7 %</td><td>+4.76 %</td></tr><tr><td><strong>Mat border</strong> +10 %</td><td>+2.73 %</td><td>+2.31 %</td><td>+2.4 %</td><td>+2.07 %</td><td>+2.22 %</td><td>+11.57 %</td></tr><tr><td><strong>Moulding width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+1.2 %</td><td>+1.03 %</td><td>+1.11 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Mat border</strong>. <strong>Moulding width</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Artwork width</strong> opens at 16 in</li><li><strong>Artwork height</strong> opens at 20 in</li><li><strong>Mat border</strong> opens at 3 in — Two to three inches is a gallery border. A mat narrower than two inches leaves the art crowded in its frame.</li><li><strong>Moulding width</strong> opens at 1.5 in</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Artwork width</th><th>Glass width</th><th>Glass height</th><th>Frame outside width</th><th>Frame outside height</th><th>Moulding needed</th><th>Mat area</th></tr></thead><tbody><tr><td>8 in</td><td>14</td><td>26</td><td>17</td><td>29</td><td>7.667</td><td>204</td></tr><tr><td>16 in</td><td>22</td><td>26</td><td>25</td><td>29</td><td>9</td><td>252</td></tr><tr><td>32 in</td><td>38</td><td>26</td><td>41</td><td>29</td><td>11.667</td><td>348</td></tr><tr><td>80 in</td><td>86</td><td>26</td><td>89</td><td>29</td><td>19.667</td><td>636</td></tr><tr><td>160 in</td><td>166</td><td>26</td><td>169</td><td>29</td><td>33</td><td>1 116</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set artwork width = 16, artwork height = 20, mat border = 1, moulding width = 1.5: <strong>Glass width</strong> = 18 in, <strong>Glass height</strong> = 22 in, <strong>Frame outside width</strong> = 21 in, <strong>Frame outside height</strong> = 25 in, <strong>Moulding needed</strong> = 7.667 ft, <strong>Mat area</strong> = 76 sq in. A one-inch mat gives 18 by 22 glass and a 21 by 25 frame, 7.67 feet of moulding and 76 square inches of mat.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Framing to the art size.</strong> The frame opening is the mat's inner edge, not the art. A frame cut to 16 by 20 clips the mat and leaves no border.</li><li><strong>Forgetting the overlap.</strong> The mat sits a quarter inch over the art on each side to hold it flat, so the visible art is slightly smaller than the sheet. Cut the opening four millimetres under.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>One mat, one moulding.</strong> Double mats and a mount board behind add width per layer, and each layer is another two times its own depth.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need artwork width and artwork height and mat border and moulding width. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Glass width and glass height and frame outside width and frame outside height and moulding needed and mat area should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Ordering a custom frame online without the framer's calculator.</li></li><li><li>Checking that a readymade frame will take a matted print.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/blind-size">Blind size</a> <a href="/everyday-life/curtain-size">Curtain size</a> <a href="/everyday-life/price-per-square-inch">Price per square inch</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Artwork width</strong> ×10</td><td>22</td><td>166</td><td>×7.545</td></tr><tr><td><strong>Artwork height</strong> ×10</td><td>22</td><td>22</td><td>unchanged</td></tr><tr><td><strong>Mat border</strong> ×10</td><td>22</td><td>76</td><td>×3.455</td></tr><tr><td><strong>Moulding width</strong> ×10</td><td>22</td><td>22</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Picture Frame calculator work out?', 'a' => <<<'TXT'
            It returns glass width and glass height and frame outside width and frame outside height and moulding needed and mat area from artwork width and artwork height and mat border and moulding width. The relationship is Artwork width + 2 × Mat border.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Artwork width (in), Artwork height (in), Mat border (in), Moulding width (in). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: artwork width in in; artwork height in in; mat border in in; moulding width in in. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How wide should a mat be?', 'a' => 'Two to three inches for most work, wider for a small print in a large frame. The border should look like a deliberate margin rather than a packing gap.'],
            ['q' => 'Do I order the frame to the glass size?', 'a' => <<<'TXT'
            Yes. The rebate in the back of the moulding takes the glass, the mat and the art as a stack, so the frame's opening matches the glass and the outside is that plus twice the moulding width.
            TXT],
            ['q' => 'Why measure moulding in feet?', 'a' => <<<'TXT'
            Because it is sold in lengths of six to ten feet and cut to the perimeter. The perimeter is four sides of the outside frame, and a framer adds a little for the mitres.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/blind-size', 'name' => 'Blind size'],
            ['path' => '/everyday-life/curtain-size', 'name' => 'Curtain size'],
            ['path' => '/everyday-life/price-per-square-inch', 'name' => 'Price per square inch'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
