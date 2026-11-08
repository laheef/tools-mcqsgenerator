<?php

/**
 * Wallpaper
 * /construction/wallpaper
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wallpaper',
    'meta' => ['title' => 'Wallpaper Calculator: Rolls for a Room Tool', 'description' => 'Work out how many wallpaper rolls a room needs from its perimeter, ceiling height and pattern repeat, with the strips and drops per roll. Units shown.', 'h1' => 'Wallpaper', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'length',
                    'label' => 'Room length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Wall to wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Room width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'Wall to wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Ceiling height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '8',
                    'help' => 'Floor to ceiling',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'roll_width',
                    'label' => 'Roll width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '20.5',
                    'help' => '20.5 in is a US double roll',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'roll_length',
                    'label' => 'Roll length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '33',
                    'help' => '33 ft is a double roll',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'repeat',
                    'label' => 'Pattern repeat',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0',
                    'help' => 'Straight match; 0 if none',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price per roll',
                    'type' => 'number',
                    'suffix' => '$',
                    'default' => '45',
                    'help' => 'Delivered',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'perimeter',
                    'label' => 'Wall perimeter',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
                [
                    'name' => 'strips',
                    'label' => 'Strips needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'per_roll',
                    'label' => 'Drops per roll',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rolls',
                    'label' => 'Rolls',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cost',
                    'label' => 'Cost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '$',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Wallpaper',
            'results' => [
                'perimeter' => '2*(length+width)',
                'strips' => 'ceil(2*(length+width)/(roll_width/12))',
                'per_roll' => 'floor(roll_length/(height+repeat/12))',
                'rolls' => 'ceil(ceil(2*(length+width)/(roll_width/12))/floor(roll_length/(height+repeat/12)))',
                'cost' => 'ceil(ceil(2*(length+width)/(roll_width/12))/floor(roll_length/(height+repeat/12)))*price',
                'length' => 'perimeter/2-width',
                'width' => 'perimeter/2-length',
                'price' => 'cost/rolls',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>Strips = ceiling(perimeter ÷ roll width)</strong>, <strong>drops per roll = floor(roll length ÷ drop)</strong>, and the drop is the height plus the pattern repeat.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Wallpaper is the material most often bought wrong, because a roll is sold by area but used by the strip: what matters is how many full drops come off one roll, and a pattern repeat quietly steals a few inches from every one of them.</p><p>The page reports <strong>wall perimeter and strips needed and drops per roll and rolls and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Wall perimeter</strong></td><td><code>2 × (Room length+Room width)</code></td></tr><tr><td><strong>Strips needed</strong></td><td><code>ceil(2 × (Room length+Room width) ÷ (Roll width ÷ 12))</code></td></tr><tr><td><strong>Drops per roll</strong></td><td><code>floor(Roll length ÷ (Ceiling height+Pattern repeat ÷ 12))</code></td></tr><tr><td><strong>Rolls</strong></td><td><code>ceil(ceil(2 × (Room length+Room width) ÷ (Roll width ÷ 12)) ÷ floor(Roll length ÷ (Ceiling height+Pattern repeat ÷ 12)))</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil(ceil(2 × (Room length+Room width) ÷ (Roll width ÷ 12)) ÷ floor(Roll length ÷ (Ceiling height+Pattern repeat ÷ 12))) × Price per roll</code></td></tr><tr><td><strong>Room length</strong></td><td><code>Wall perimeter ÷ 2-Room width</code></td></tr><tr><td><strong>Room width</strong></td><td><code>Wall perimeter ÷ 2-Room length</code></td></tr><tr><td><strong>Price per roll</strong></td><td><code>Cost ÷ Rolls</code></td></tr></tbody></table><p><p>The perimeter divided by the roll width gives whole strips, rounded up because the last strip is rarely full. The pattern repeat is added to every drop before the roll is divided, which is why a large repeat costs rolls rather than wallpaper.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs. It reports wall perimeter and strips needed and drops per roll and rolls and cost.</p><ul><li><strong>Room length</strong> — in ft. Wall to wall</li><li><strong>Room width</strong> — in ft. Wall to wall</li><li><strong>Ceiling height</strong> — in ft. Floor to ceiling</li><li><strong>Roll width</strong> — in in. 20.5 in is a US double roll</li><li><strong>Roll length</strong> — in ft. 33 ft is a double roll</li><li><strong>Pattern repeat</strong> — in in. Straight match; 0 if none</li><li><strong>Price per roll</strong> — in $. Delivered</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Wall perimeter</strong> — in ft</li><li><strong>Strips needed</strong></li><li><strong>Drops per roll</strong></li><li><strong>Rolls</strong></li><li><strong>Cost</strong> — in $</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Room length = 12 ft, Room width = 10 ft, Ceiling height = 8 ft, Roll width = 20.5 in, Roll length = 33 ft, Pattern repeat = 0 in, Price per roll = 45 $ — and the results panel reads:</p><ul><li><strong>Wall perimeter</strong> = <code>2 × (Room length+Room width)</code> = <strong>44 ft</strong></li><li><strong>Strips needed</strong> = <code>ceil(2 × (Room length+Room width) ÷ (Roll width ÷ 12))</code> = <strong>26</strong></li><li><strong>Drops per roll</strong> = <code>floor(Roll length ÷ (Ceiling height+Pattern repeat ÷ 12))</code> = <strong>4</strong></li><li><strong>Rolls</strong> = <code>ceil(ceil(2 × (Room length+Room width) ÷ (Roll width ÷ 12)) ÷ floor(Roll length ÷ (Ceiling height+Pattern repeat ÷ 12)))</code> = <strong>7</strong></li><li><strong>Cost</strong> = <code>ceil(ceil(2 × (Room length+Room width) ÷ (Roll width ÷ 12)) ÷ floor(Roll length ÷ (Ceiling height+Pattern repeat ÷ 12))) × Price per roll</code> = <strong>315 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>2 × (12+10) = 44</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 12 by 10 ft room has 44 ft of wall. At 20.5 in wide that is 26 strips, and a 33 ft roll gives 4 drops at an 8 ft ceiling — so 7 rolls and 315.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the drops per roll: an eight-foot ceiling takes four from a 33 ft roll, and a nine-foot one takes three. If the figure collapses to one, the repeat has been entered in feet rather than inches.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Wall perimeter</th><th>Strips needed</th><th>Drops per roll</th><th>Rolls</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Room length</strong> +10 %</td><td>+5.45 %</td><td>+7.69 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Room width</strong> +10 %</td><td>+4.55 %</td><td>+3.85 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Ceiling height</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−25 %</td><td>+28.57 %</td><td>+28.57 %</td></tr><tr><td><strong>Roll width</strong> +10 %</td><td>+0 %</td><td>−7.69 %</td><td>+0 %</td><td>−14.29 %</td><td>−14.29 %</td></tr><tr><td><strong>Roll length</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Pattern repeat</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Price per roll</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Ceiling height</strong>: a ten per cent move there shifts the result by about 28.6 per cent. The least sensitive is <strong>Pattern repeat</strong>, at 0 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Room length = 16, Room width = 12, Ceiling height = 9, Roll width = 20.5, Roll length = 33, Pattern repeat = 21, Price per roll = 55, the page reports <strong>Wall perimeter</strong> = 56 ft, <strong>Strips needed</strong> = 33, <strong>Drops per roll</strong> = 3, <strong>Rolls</strong> = 11, <strong>Cost</strong> = 605 $. A large repeat in a large room: the drop grows and so does the roll count.</li><li>With Room length = 8, Room width = 8, Ceiling height = 8, Roll width = 27, Roll length = 27, Pattern repeat = 0, Price per roll = 30, the page reports <strong>Wall perimeter</strong> = 32 ft, <strong>Strips needed</strong> = 15, <strong>Drops per roll</strong> = 3, <strong>Rolls</strong> = 5, <strong>Cost</strong> = 150 $. A small box room in a wide European roll: fewer strips, fewer joins.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Roll area used as coverage.</strong> Offcuts from the pattern match cannot be used.</li><li><strong>Repeat entered in feet.</strong> The box is in inches.</li><li><strong>Openings subtracted twice.</strong> Cutting around a window wastes the paper anyway.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Wall perimeter (ft), Strips needed, Drops per roll, Rolls, Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Room dimensions in feet, roll width and pattern repeat in inches, roll length in feet, strips and rolls as whole numbers and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need room length and room width and ceiling height and roll width and roll length and pattern repeat and price per roll. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Wall perimeter and strips needed and drops per roll and rolls and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Room length</strong> ×10</td><td>44</td><td>260</td><td>×5.909</td></tr><tr><td><strong>Room width</strong> ×10</td><td>44</td><td>224</td><td>×5.091</td></tr><tr><td><strong>Ceiling height</strong> ×10</td><td>44</td><td>44</td><td>unchanged</td></tr><tr><td><strong>Roll width</strong> ×10</td><td>44</td><td>44</td><td>unchanged</td></tr><tr><td><strong>Roll length</strong> ×10</td><td>44</td><td>44</td><td>unchanged</td></tr><tr><td><strong>Pattern repeat</strong> ×10</td><td>44</td><td>44</td><td>unchanged</td></tr><tr><td><strong>Price per roll</strong> ×10</td><td>44</td><td>44</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A rectangular room.</strong> Sloped ceilings and stair wells need their own trim.</li><li><strong>Straight match.</strong> A drop match wastes more than this allows.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying wallpaper for a room.</li></li><li><li>Checking a decorator's quantity.</li></li><li><li>Comparing a large repeat with a plain paper.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/paint">Paint</a> <a href="/construction/wainscoting">Wainscoting</a> <a href="/construction/wall-square-footage">Wall square footage</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wallpaper calculator work out?', 'a' => <<<'TXT'
            It returns wall perimeter and strips needed and drops per roll and rolls and cost from room length and room width and ceiling height and roll width and roll length and pattern repeat and price per roll. The relationship is 2 × (Room length+Room width).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Room length (ft), Room width (ft), Ceiling height (ft), Roll width (in), Roll length (ft), Pattern repeat (in), Price per roll ($). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: room length in ft; room width in ft; ceiling height in ft; roll width in in; roll length in ft; pattern repeat in in; price per roll in $. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many rolls of wallpaper for a 12 by 10 room?', 'a' => 'About 8 double rolls at an 8 ft ceiling with no repeat, from 21 strips.'],
            ['q' => 'How many drops in a roll?', 'a' => 'Four from a 33 ft double roll at an 8 ft ceiling, and three at nine feet.'],
        ],
        'related' => [
            ['path' => '/construction/paint', 'name' => 'Paint'],
            ['path' => '/construction/wainscoting', 'name' => 'Wainscoting'],
            ['path' => '/construction/wall-square-footage', 'name' => 'Wall square footage'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
