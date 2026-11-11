<?php

/**
 * Garbage Bag Size Calculator
 * /everyday-life/garbage-bag-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Garbage Bag Size Calculator',
    'meta' => ['title' => 'Garbage Bag Size — Width, Height and Gallons', 'description' => 'The bag a bin actually needs: flat width from the rim\'s perimeter, height with the overhang, and the capacity of the bin in gallons. The formula is shown.', 'h1' => 'Garbage Bag Size Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'shape',
                    'label' => 'Bin shape',
                    'type' => 'select',
                    'options' => ['Round bin' => 1, 'Rectangular bin' => 0],
                    'control' => 'SELECT',
                    'default' => 'Round bin',
                ],
                [
                    'name' => 'diameter',
                    'label' => 'Round bin diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '18',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Rectangular bin length',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '20',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Rectangular bin width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '14',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Bin height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '24',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'overhang',
                    'label' => 'Overhang over the rim',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '6',
                    'help' => 'The bag has to fold over the rim. Three inches holds on a light load, six on anything heavy.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bag_width',
                    'label' => 'Bag flat width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'bag_height',
                    'label' => 'Bag length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'capacity',
                    'label' => 'Bin capacity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gallons',
                ],
                [
                    'name' => 'perimeter',
                    'label' => 'Rim perimeter',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
            ],
        ],
    ],
    'formula' => ['bag_width' => 'if_else(shape > 0.5, pi * diameter / 2 + overhang, length + width + overhang)', 'bag_height' => 'height + overhang', 'capacity' => 'if_else(shape > 0.5, pi * (diameter / 2) * (diameter / 2) * height / 231, length * width * height / 231)', 'perimeter' => 'if_else(shape > 0.5, pi * diameter, 2 * (length + width))'],
    'article' => [
        'intro' => <<<'TXT'
        The flat width and length of bag that fits a bin, with the overhang used to hold it in place, plus how many gallons the bin holds, for round and rectangular bins.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A bin liner is sold flat, as a width and a length, and the bin is round or rectangular. The bag has to do two things at once: go round the rim and go down to the bottom, with enough left over to fold back.</p><p>The width is half the rim's perimeter plus the overhang, because the bag is folded flat and each side of the fold covers half the rim. An 18-inch bin has a perimeter of 56.5 inches, so the bag is 28.3 wide before the fold-over and 34.3 with it.</p><p>The answer is <strong>bag flat width and bag length and bin capacity and rim perimeter</strong>, worked out from bin shape and round bin diameter and rectangular bin length and rectangular bin width and bin height and overhang over the rim. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>bag_width</strong></td><td><code>if_else(Bin shape > 0.5, pi × Round bin diameter ÷ 2 + Overhang over the rim, Rectangular bin length + Rectangular bin width + Overhang over the rim)</code></td></tr><tr><td><strong>bag_height</strong></td><td><code>Bin height + Overhang over the rim</code></td></tr><tr><td><strong>capacity</strong></td><td><code>if_else(Bin shape > 0.5, pi × (Round bin diameter ÷ 2) × (Round bin diameter ÷ 2) × Bin height ÷ 231, Rectangular bin length × Rectangular bin width × Bin height ÷ 231)</code></td></tr><tr><td><strong>perimeter</strong></td><td><code>if_else(Bin shape > 0.5, pi × Round bin diameter, 2 × (Rectangular bin length + Rectangular bin width))</code></td></tr></tbody></table><p>For a round bin the perimeter is pi times the diameter and the flat width is half of that. For a rectangular bin the perimeter is twice length plus twice width, and half of it is length plus width. The length is the bin height plus the overhang, and capacity is the volume over 231 cubic inches, which is a US gallon.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill. It reports bag flat width and bag length and bin capacity and rim perimeter.</p><ul><li><strong>Bin shape</strong>. A choice: Round bin, Rectangular bin.</li><li><strong>Round bin diameter</strong> — in.</li><li><strong>Rectangular bin length</strong> — in.</li><li><strong>Rectangular bin width</strong> — in.</li><li><strong>Bin height</strong> — in.</li><li><strong>Overhang over the rim</strong> — in. The bag has to fold over the rim. Three inches holds on a light load, six on anything heavy.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Bag flat width</strong> — in.</li><li><strong>Bag length</strong> — in.</li><li><strong>Bin capacity</strong> — gallons.</li><li><strong>Rim perimeter</strong> — in.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put bin shape = 1, round bin diameter = 18 in, rectangular bin length = 20 in, rectangular bin width = 14 in, bin height = 24 in, overhang over the rim = 6 in into the form and the panel reads:</p><ul><li><strong>Bag flat width</strong> = <code>if_else(Bin shape > 0.5, pi × Round bin diameter ÷ 2 + Overhang over the rim, Rectangular bin length + Rectangular bin width + Overhang over the rim)</code> = <strong>34.274 in</strong></li><li><strong>Bag length</strong> = <code>Bin height + Overhang over the rim</code> = <strong>30 in</strong></li><li><strong>Bin capacity</strong> = <code>if_else(Bin shape > 0.5, pi × (Round bin diameter ÷ 2) × (Round bin diameter ÷ 2) × Bin height ÷ 231, Rectangular bin length × Rectangular bin width × Bin height ÷ 231)</code> = <strong>26.438 gallons</strong></li><li><strong>Rim perimeter</strong> = <code>if_else(Bin shape > 0.5, pi × Round bin diameter, 2 × (Rectangular bin length + Rectangular bin width))</code> = <strong>56.549 in</strong></li></ul><p>A rectangular bin 20 by 14 by 24 inches takes a 40-inch bag, which is wider than the round one despite the smaller volume, because a rectangle has a longer rim than the circle that encloses it.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>if_else(1 > 0.5, pi × 18 ÷ 2 + 6, 20 + 14 + 6)</code>, which comes to <strong>34.274 in</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>An 18-inch round bin 24 inches tall has a 56.5-inch rim, so the bag is 34.3 inches wide with a 6-inch overhang and 30 inches long, and the bin holds 26.4 gallons.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Bag flat width</th><th>Bag length</th><th>Bin capacity</th><th>Rim perimeter</th></tr></thead><tbody><tr><td><strong>Bin shape</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Round bin diameter</strong> +10 %</td><td>+8.25 %</td><td>+0 %</td><td>+21 %</td><td>+10 %</td></tr><tr><td><strong>Rectangular bin length</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Rectangular bin width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Bin height</strong> +10 %</td><td>+0 %</td><td>+8 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Overhang over the rim</strong> +10 %</td><td>+1.75 %</td><td>+2 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Round bin diameter</strong>. <strong>Rectangular bin width</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Bin shape</strong> opens at 1</li><li><strong>Round bin diameter</strong> opens at 18 in</li><li><strong>Rectangular bin length</strong> opens at 20 in</li><li><strong>Rectangular bin width</strong> opens at 14 in</li><li><strong>Bin height</strong> opens at 24 in</li><li><strong>Overhang over the rim</strong> opens at 6 in — The bag has to fold over the rim. Three inches holds on a light load, six on anything heavy.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set bin shape = 0, round bin diameter = 18, rectangular bin length = 20, rectangular bin width = 14, bin height = 24, overhang over the rim = 6: <strong>Bag flat width</strong> = 40 in, <strong>Bag length</strong> = 30 in, <strong>Bin capacity</strong> = 29.091 gallons, <strong>Rim perimeter</strong> = 68 in. The rectangular bin of the same height takes a 40-inch bag and holds 29.1 gallons, so the bin that looks bigger is bigger by volume and needs a wider bag.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Buying by gallon capacity alone.</strong> A 30-gallon bag is a volume, not a shape. A tall narrow bin and a short wide one can hold the same 30 gallons and need different bags.</li><li><strong>Under-buying the length.</strong> A bag that fits the rim and not the bottom slides in. Length is height plus overhang, and the overhang is what stops that.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Straight-sided bin, no lid.</strong> A bin with a taper needs a bag sized to its top, and a lid that clamps needs less overhang than this assumes.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need bin shape and round bin diameter and rectangular bin length and rectangular bin width and bin height and overhang over the rim. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Bag flat width and bag length and bin capacity and rim perimeter should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Restocking liners for a kitchen bin without the old box in hand.</li></li><li><li>Checking whether a cheaper bag will actually fit.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/tablecloth-size">Tablecloth size</a> <a href="/everyday-life/rug-size">Rug size</a> <a href="/conversion/cubic-inches-to-gallons">Cubic inches to gallons</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Bin shape</strong> ×10</td><td>34.274</td><td>34.274</td><td>unchanged</td></tr><tr><td><strong>Round bin diameter</strong> ×10</td><td>34.274</td><td>288.743</td><td>×8.424</td></tr><tr><td><strong>Rectangular bin length</strong> ×10</td><td>34.274</td><td>34.274</td><td>unchanged</td></tr><tr><td><strong>Rectangular bin width</strong> ×10</td><td>34.274</td><td>34.274</td><td>unchanged</td></tr><tr><td><strong>Bin height</strong> ×10</td><td>34.274</td><td>34.274</td><td>unchanged</td></tr><tr><td><strong>Overhang over the rim</strong> ×10</td><td>34.274</td><td>88.274</td><td>×2.576</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Garbage Bag Size calculator work out?', 'a' => <<<'TXT'
            It returns bag flat width and bag length and bin capacity and rim perimeter from bin shape and round bin diameter and rectangular bin length and rectangular bin width and bin height and overhang over the rim. The relationship is if_else(Bin shape > 0.5, pi × Round bin diameter ÷ 2 + Overhang over the rim, Rectangular bin length + Rectangular bin width + Overhang over the rim).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => <<<'TXT'
            Bin shape, Round bin diameter (in), Rectangular bin length (in), Rectangular bin width (in), Bin height (in), Overhang over the rim (in). Everything else is computed.
            TXT],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: round bin diameter in in; rectangular bin length in in; rectangular bin width in in; bin height in in; overhang over the rim in in. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why is the bag width half the perimeter?', 'a' => 'Because a flat bag has two sides. When it opens over the rim, each side covers half the way round, so the flat width has to be the half perimeter.'],
            ['q' => 'How much overhang do I need?', 'a' => <<<'TXT'
            Three inches for paper and light waste, six for kitchen waste that gets lifted, and more if the bag is tied rather than folded. The fold is what carries the weight.
            TXT],
            ['q' => 'Is a gallon the same as a litre?', 'a' => 'No: a US gallon is 3.785 litres, so a 30-gallon bag is 113 litres. Bag boxes in Europe print litres and the numbers are not interchangeable.'],
        ],
        'related' => [
            ['path' => '/everyday-life/tablecloth-size', 'name' => 'Tablecloth size'],
            ['path' => '/everyday-life/rug-size', 'name' => 'Rug size'],
            ['path' => '/conversion/cubic-inches-to-gallons', 'name' => 'Cubic inches to gallons'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
