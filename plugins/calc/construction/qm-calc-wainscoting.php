<?php

/**
 * Wainscoting
 * /construction/wainscoting
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wainscoting',
    'meta' => ['title' => 'Wainscoting Calculator: Panel Widths and Layout', 'description' => 'Work out the width of each wainscot panel and their height from the wall length, the number of panels, the stiles and the rails above and below. Units shown.', 'h1' => 'Wainscoting', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'wall_length',
                    'label' => 'Wall length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'The run being panelled',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panels',
                    'label' => 'Number of panels',
                    'type' => 'number',
                    'default' => '5',
                    'help' => 'Equal widths',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'stile',
                    'label' => 'Stile width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'help' => 'Between panels',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'end_margin',
                    'label' => 'End margin',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '4',
                    'help' => 'Wall end to first panel',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rail_height',
                    'label' => 'Chair rail height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '36',
                    'help' => 'Floor to rail top',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'base_height',
                    'label' => 'Baseboard height',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '5',
                    'help' => 'Floor to base top',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rail_width',
                    'label' => 'Rail width',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3',
                    'help' => 'Chair rail moulding',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'panel_width',
                    'label' => 'Panel width',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'panel_height',
                    'label' => 'Panel height',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'panel_area',
                    'label' => 'Panel area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'stile_run',
                    'label' => 'Stile run',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Wainscoting',
            'results' => [
                'panel_width' => '(wall_length*12-2*end_margin-(panels-1)*stile)/panels',
                'panel_height' => 'rail_height-base_height-2*rail_width',
                'panel_area' => 'panels*((wall_length*12-2*end_margin-(panels-1)*stile)/panels)*(rail_height-base_height-2*rail_width)/144',
                'stile_run' => '((panels-1)*stile+2*end_margin)/12',
                'wall_length' => '(panels*panel_width+(panels-1)*stile+2*end_margin)/12',
                'panels' => '(wall_length*12-2*end_margin+stile)/(panel_width+stile)',
                'stile' => '(wall_length*12-2*end_margin-panels*panel_width)/(panels-1)',
                'end_margin' => '(wall_length*12-(panels-1)*stile-panels*panel_width)/2',
                'rail_height' => 'panel_height+base_height+2*rail_width',
                'base_height' => 'rail_height-panel_height-2*rail_width',
                'rail_width' => '(rail_height-base_height-panel_height)/2',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p><strong>Panel width = (wall length − 2 × end margin − (panels − 1) × stile) ÷ panels</strong>, and the height comes off the chair rail less the base.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Wainscoting is a layout problem before it is a material problem: the panels have to be equal, the margins have to match at both ends, and the whole thing has to land under the chair rail. Getting the arithmetic right first saves taking a panel off the wall.</p><p>The page reports <strong>panel width and panel height and panel area and stile run</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Panel width</strong></td><td><code>(Wall length × 12-2 × End margin-(Number of panels-1) × Stile width) ÷ Number of panels</code></td></tr><tr><td><strong>Panel height</strong></td><td><code>Chair rail height-Baseboard height-2 × Rail width</code></td></tr><tr><td><strong>Panel area</strong></td><td><code>Number of panels × ((Wall length × 12-2 × End margin-(Number of panels-1) × Stile width) ÷ Number of panels) × (Chair rail height-Baseboard height-2 × Rail width) ÷ 144</code></td></tr><tr><td><strong>Stile run</strong></td><td><code>((Number of panels-1) × Stile width+2 × End margin) ÷ 12</code></td></tr><tr><td><strong>Wall length</strong></td><td><code>(Number of panels × Panel width+(Number of panels-1) × Stile width+2 × End margin) ÷ 12</code></td></tr><tr><td><strong>Number of panels</strong></td><td><code>(Wall length × 12-2 × End margin+Stile width) ÷ (Panel width+Stile width)</code></td></tr><tr><td><strong>Stile width</strong></td><td><code>(Wall length × 12-2 × End margin-Number of panels × Panel width) ÷ (Number of panels-1)</code></td></tr><tr><td><strong>End margin</strong></td><td><code>(Wall length × 12-(Number of panels-1) × Stile width-Number of panels × Panel width) ÷ 2</code></td></tr><tr><td><strong>Chair rail height</strong></td><td><code>Panel height+Baseboard height+2 × Rail width</code></td></tr><tr><td><strong>Baseboard height</strong></td><td><code>Chair rail height-Panel height-2 × Rail width</code></td></tr><tr><td><strong>Rail width</strong></td><td><code>(Chair rail height-Baseboard height-Panel height) ÷ 2</code></td></tr></tbody></table><p><p>The wall is divided into whole panels and the spaces between them: two end margins, one stile between each pair of panels, and the panels themselves. The height is the rail position less the baseboard and less the rail's own width top and bottom.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 7 boxes and the page has everything it needs. It reports panel width and panel height and panel area and stile run.</p><ul><li><strong>Wall length</strong> — in ft. The run being panelled</li><li><strong>Number of panels</strong>. Equal widths</li><li><strong>Stile width</strong> — in in. Between panels</li><li><strong>End margin</strong> — in in. Wall end to first panel</li><li><strong>Chair rail height</strong> — in in. Floor to rail top</li><li><strong>Baseboard height</strong> — in in. Floor to base top</li><li><strong>Rail width</strong> — in in. Chair rail moulding</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Panel width</strong> — in in</li><li><strong>Panel height</strong> — in in</li><li><strong>Panel area</strong> — in ft²</li><li><strong>Stile run</strong> — in ft</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Wall length = 12 ft, Number of panels = 5, Stile width = 4 in, End margin = 4 in, Chair rail height = 36 in, Baseboard height = 5 in, Rail width = 3 in — and the results panel reads:</p><ul><li><strong>Panel width</strong> = <code>(Wall length × 12-2 × End margin-(Number of panels-1) × Stile width) ÷ Number of panels</code> = <strong>24 in</strong></li><li><strong>Panel height</strong> = <code>Chair rail height-Baseboard height-2 × Rail width</code> = <strong>25 in</strong></li><li><strong>Panel area</strong> = <code>Number of panels × ((Wall length × 12-2 × End margin-(Number of panels-1) × Stile width) ÷ Number of panels) × (Chair rail height-Baseboard height-2 × Rail width) ÷ 144</code> = <strong>20.833 ft²</strong></li><li><strong>Stile run</strong> = <code>((Number of panels-1) × Stile width+2 × End margin) ÷ 12</code> = <strong>2 ft</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(12 × 12-2 × 4-(5-1) × 4) ÷ 5 = 24</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 12 ft wall with 5 panels and 4 in stiles leaves 24 in for each panel, and a panel 25 in tall between the base and the rail — 20.833 ft² of panelling and 2 ft of stile.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the panel width against the wall: it should look like a standard rail width, roughly 14 to 24 in. If it comes out negative, the stiles and margins are wider than the wall allows.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Panel width</th><th>Panel height</th><th>Panel area</th><th>Stile run</th></tr></thead><tbody><tr><td><strong>Wall length</strong> +10 %</td><td>+12 %</td><td>+0 %</td><td>+12 %</td><td>+0 %</td></tr><tr><td><strong>Number of panels</strong> +10 %</td><td>−10.61 %</td><td>+0 %</td><td>−1.67 %</td><td>+8.33 %</td></tr><tr><td><strong>Stile width</strong> +10 %</td><td>−1.33 %</td><td>+0 %</td><td>−1.33 %</td><td>+6.67 %</td></tr><tr><td><strong>End margin</strong> +10 %</td><td>−0.67 %</td><td>+0 %</td><td>−0.67 %</td><td>+3.33 %</td></tr><tr><td><strong>Chair rail height</strong> +10 %</td><td>+0 %</td><td>+14.4 %</td><td>+14.4 %</td><td>+0 %</td></tr><tr><td><strong>Baseboard height</strong> +10 %</td><td>+0 %</td><td>−2 %</td><td>−2 %</td><td>+0 %</td></tr><tr><td><strong>Rail width</strong> +10 %</td><td>+0 %</td><td>−2.4 %</td><td>−2.4 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Chair rail height</strong>: a ten per cent move there shifts the result by about 14.4 per cent. The least sensitive is <strong>Baseboard height</strong>, at 2 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Wall length = 16, Number of panels = 6, Stile width = 3, End margin = 6, Chair rail height = 42, Baseboard height = 6, Rail width = 3, the page reports <strong>Panel width</strong> = 27.5 in, <strong>Panel height</strong> = 30 in, <strong>Panel area</strong> = 34.375 ft², <strong>Stile run</strong> = 2.25 ft. A longer wall with a higher rail: more panels and a taller field.</li><li>With Wall length = 8, Number of panels = 3, Stile width = 5, End margin = 5, Chair rail height = 32, Baseboard height = 4, Rail width = 2.5, the page reports <strong>Panel width</strong> = 25.333 in, <strong>Panel height</strong> = 23 in, <strong>Panel area</strong> = 12.139 ft², <strong>Stile run</strong> = 1.667 ft. A short wall in a hallway, where three panels fill the run.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Stiles counted as panels plus one.</strong> There is one fewer stile than panels.</li><li><strong>Rail width ignored.</strong> The moulding takes space at the top and bottom.</li><li><strong>Unequal end margins.</strong> Both ends should match.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Panel width (in), Panel height (in), Panel area (ft²), Stile run (ft).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Wall length in feet, all the moulding dimensions in inches, panel width and height in inches, panel area in square feet and stile run in feet.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need wall length and number of panels and stile width and end margin and chair rail height and baseboard height and rail width. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Panel width and panel height and panel area and stile run should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Wall length</strong> ×10</td><td>24</td><td>283.2</td><td>×11.8</td></tr><tr><td><strong>Number of panels</strong> ×10</td><td>24</td><td>-1.2</td><td>×-0.05</td></tr><tr><td><strong>Stile width</strong> ×10</td><td>24</td><td>-4.8</td><td>×-0.2</td></tr><tr><td><strong>End margin</strong> ×10</td><td>24</td><td>9.6</td><td>×0.4</td></tr><tr><td><strong>Chair rail height</strong> ×10</td><td>24</td><td>24</td><td>unchanged</td></tr><tr><td><strong>Baseboard height</strong> ×10</td><td>24</td><td>24</td><td>unchanged</td></tr><tr><td><strong>Rail width</strong> ×10</td><td>24</td><td>24</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Equal panels.</strong> A centred window needs the layout adjusted around it.</li><li><strong>Flat walls.</strong> Corners and returns are separate runs.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Laying out a wainscot wall.</li></li><li><li>Ordering stile and rail stock.</li></li><li><li>Checking a joiner's setting-out.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/wall-square-footage">Wall square footage</a> <a href="/construction/shiplap">Shiplap</a> <a href="/construction/board-and-batten">Board and batten</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Wainscoting calculator work out?', 'a' => <<<'TXT'
            It returns panel width and panel height and panel area and stile run from wall length and number of panels and stile width and end margin and chair rail height and baseboard height and rail width. The relationship is (Wall length × 12-2 × End margin-(Number of panels-1) × Stile width) ÷ Number of panels.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Wall length (ft), Number of panels, Stile width (in), End margin (in), Chair rail height (in), Baseboard height (in), Rail width (in). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: wall length in ft; stile width in in; end margin in in; chair rail height in in; baseboard height in in; rail width in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How wide should wainscot panels be?', 'a' => 'Usually 14 to 24 inches, with the number of panels chosen to make them equal.'],
            ['q' => 'How high should wainscoting be?', 'a' => 'Chair rail at 32 to 42 inches, depending on the room and the ceiling.'],
        ],
        'related' => [
            ['path' => '/construction/wall-square-footage', 'name' => 'Wall square footage'],
            ['path' => '/construction/shiplap', 'name' => 'Shiplap'],
            ['path' => '/construction/board-and-batten', 'name' => 'Board and batten'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
