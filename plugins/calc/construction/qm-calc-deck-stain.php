<?php

/**
 * Deck stain
 * /construction/deck-stain
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Deck stain',
    'meta' => ['title' => 'Deck Stain Calculator: Gallons for a Deck Tool', 'description' => 'Work out the stain a deck needs by adding the floor, both faces of the railing and the steps, then dividing by the coverage per gallon. See the steps.', 'h1' => 'Deck stain', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'deck_length',
                    'label' => 'Deck length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '16',
                    'help' => 'Along the house',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'deck_width',
                    'label' => 'Deck depth',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Out from the house',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rail_length',
                    'label' => 'Railing length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '40',
                    'help' => 'Total run of rail',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rail_height',
                    'label' => 'Railing height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '3',
                    'help' => 'Top rail to deck',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'stair_steps',
                    'label' => 'Stair steps',
                    'type' => 'number',
                    'default' => '3',
                    'help' => 'Count the treads',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'stair_width',
                    'label' => 'Stair width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '4',
                    'help' => 'Wall to wall',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rise',
                    'label' => 'Riser',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '7.5',
                    'help' => 'Per step',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'run',
                    'label' => 'Tread',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '10',
                    'help' => 'Per step',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coats',
                    'label' => 'Coats',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Two is usual on bare timber',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coverage',
                    'label' => 'Coverage',
                    'type' => 'number',
                    'suffix' => 'ft²/gal',
                    'default' => '250',
                    'help' => '250 on new timber',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'price',
                    'label' => 'Price',
                    'type' => 'number',
                    'suffix' => '$/gal',
                    'default' => '45',
                    'help' => 'Per gallon',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'floor_area',
                    'label' => 'Floor area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'rail_area',
                    'label' => 'Railing area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'stair_area',
                    'label' => 'Stair area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'total_area',
                    'label' => 'Total area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'gallons',
                    'label' => 'Stain',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
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
            'title' => 'Deck stain',
            'results' => [
                'floor_area' => 'deck_length*deck_width',
                'rail_area' => 'rail_length*rail_height*2',
                'stair_area' => 'stair_steps*(rise+run)/12*stair_width',
                'total_area' => 'deck_length*deck_width+rail_length*rail_height*2+stair_steps*(rise+run)/12*stair_width',
                'gallons' => '(deck_length*deck_width+rail_length*rail_height*2+stair_steps*(rise+run)/12*stair_width)*coats/coverage',
                'cost' => 'ceil((deck_length*deck_width+rail_length*rail_height*2+stair_steps*(rise+run)/12*stair_width)*coats/coverage)*price',
                'deck_length' => 'floor_area/deck_width',
                'deck_width' => 'floor_area/deck_length',
                'rail_length' => 'rail_area/(rail_height*2)',
                'rail_height' => 'rail_area/(rail_length*2)',
                'stair_steps' => 'stair_area/((rise+run)/12*stair_width)',
                'stair_width' => 'stair_area/(stair_steps*(rise+run)/12)',
                'rise' => 'stair_area/(stair_steps*stair_width)*12-run',
                'run' => 'stair_area/(stair_steps*stair_width)*12-rise',
                'coats' => 'gallons*coverage/total_area',
                'coverage' => 'total_area*coats/gallons',
                'price' => 'cost/ceil(gallons)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Total area = floor + railing + stairs</strong>, and <strong>gallons = area × coats ÷ coverage</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A deck is mostly not the floor. The railing is a fence on top of it and takes stain on both faces, and the steps are the part everyone forgets until the tin runs dry halfway down them.</p><p>The page reports <strong>floor area and railing area and stair area and total area and stain and cost</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Floor area</strong></td><td><code>Deck length × Deck depth</code></td></tr><tr><td><strong>Railing area</strong></td><td><code>Railing length × Railing height × 2</code></td></tr><tr><td><strong>Stair area</strong></td><td><code>Stair steps × (Riser+Tread) ÷ 12 × Stair width</code></td></tr><tr><td><strong>Total area</strong></td><td><code>Deck length × Deck depth+Railing length × Railing height × 2+Stair steps × (Riser+Tread) ÷ 12 × Stair width</code></td></tr><tr><td><strong>Stain</strong></td><td><code>(Deck length × Deck depth+Railing length × Railing height × 2+Stair steps × (Riser+Tread) ÷ 12 × Stair width) × Coats ÷ Coverage</code></td></tr><tr><td><strong>Cost</strong></td><td><code>ceil((Deck length × Deck depth+Railing length × Railing height × 2+Stair steps × (Riser+Tread) ÷ 12 × Stair width) × Coats ÷ Coverage) × Price</code></td></tr><tr><td><strong>Deck length</strong></td><td><code>Floor area ÷ Deck depth</code></td></tr><tr><td><strong>Deck depth</strong></td><td><code>Floor area ÷ Deck length</code></td></tr><tr><td><strong>Railing length</strong></td><td><code>Railing area ÷ (Railing height × 2)</code></td></tr><tr><td><strong>Railing height</strong></td><td><code>Railing area ÷ (Railing length × 2)</code></td></tr><tr><td><strong>Stair steps</strong></td><td><code>Stair area ÷ ((Riser+Tread) ÷ 12 × Stair width)</code></td></tr><tr><td><strong>Stair width</strong></td><td><code>Stair area ÷ (Stair steps × (Riser+Tread) ÷ 12)</code></td></tr><tr><td><strong>Riser</strong></td><td><code>Stair area ÷ (Stair steps × Stair width) × 12-Tread</code></td></tr><tr><td><strong>Tread</strong></td><td><code>Stair area ÷ (Stair steps × Stair width) × 12-Riser</code></td></tr><tr><td><strong>Coats</strong></td><td><code>Stain × Coverage ÷ Total area</code></td></tr><tr><td><strong>Coverage</strong></td><td><code>Total area × Coats ÷ Stain</code></td></tr><tr><td><strong>Price</strong></td><td><code>Cost ÷ ceil(Stain)</code></td></tr></tbody></table><p><p>The railing is counted twice because it is stained from both sides — that factor of two is the single biggest correction to a naive floor-area estimate. Steps flatten out the same way they do for carpet: riser plus tread per step.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 11 boxes and the page has everything it needs. It reports floor area and railing area and stair area and total area and stain and cost.</p><ul><li><strong>Deck length</strong> — in ft. Along the house</li><li><strong>Deck depth</strong> — in ft. Out from the house</li><li><strong>Railing length</strong> — in ft. Total run of rail</li><li><strong>Railing height</strong> — in ft. Top rail to deck</li><li><strong>Stair steps</strong>. Count the treads</li><li><strong>Stair width</strong> — in ft. Wall to wall</li><li><strong>Riser</strong> — in in. Per step</li><li><strong>Tread</strong> — in in. Per step</li><li><strong>Coats</strong>. Two is usual on bare timber</li><li><strong>Coverage</strong> — in ft²/gal. 250 on new timber</li><li><strong>Price</strong> — in $/gal. Per gallon</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Floor area</strong> — in ft²</li><li><strong>Railing area</strong> — in ft²</li><li><strong>Stair area</strong> — in ft²</li><li><strong>Total area</strong> — in ft²</li><li><strong>Stain</strong> — in gal</li><li><strong>Cost</strong> — in $</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Deck length = 16 ft, Deck depth = 12 ft, Railing length = 40 ft, Railing height = 3 ft, Stair steps = 3, Stair width = 4 ft, Riser = 7.5 in, Tread = 10 in, Coats = 2, Coverage = 250 ft²/gal, Price = 45 $/gal — and the results panel reads:</p><ul><li><strong>Floor area</strong> = <code>Deck length × Deck depth</code> = <strong>192 ft²</strong></li><li><strong>Railing area</strong> = <code>Railing length × Railing height × 2</code> = <strong>240 ft²</strong></li><li><strong>Stair area</strong> = <code>Stair steps × (Riser+Tread) ÷ 12 × Stair width</code> = <strong>17.5 ft²</strong></li><li><strong>Total area</strong> = <code>Deck length × Deck depth+Railing length × Railing height × 2+Stair steps × (Riser+Tread) ÷ 12 × Stair width</code> = <strong>449.5 ft²</strong></li><li><strong>Stain</strong> = <code>(Deck length × Deck depth+Railing length × Railing height × 2+Stair steps × (Riser+Tread) ÷ 12 × Stair width) × Coats ÷ Coverage</code> = <strong>3.596 gal</strong></li><li><strong>Cost</strong> = <code>ceil((Deck length × Deck depth+Railing length × Railing height × 2+Stair steps × (Riser+Tread) ÷ 12 × Stair width) × Coats ÷ Coverage) × Price</code> = <strong>180 $</strong></li></ul><p>With the numbers written into the formula, the first result is <code>16 × 12 = 192</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 16 by 12 deck has 192 ft² of floor and 240 ft² of railing, plus 17.5 ft² of steps — 449.5 ft² in all. Two coats at 250 ft² a gallon is 3.596 gallons, or 180 at $45.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the total against the floor: a deck with a full railing runs close to twice its floor area. If the total is barely above the floor, the railing factor has been left out.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Floor area</th><th>Railing area</th><th>Stair area</th><th>Total area</th><th>Stain</th><th>Cost</th></tr></thead><tbody><tr><td><strong>Deck length</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+4.27 %</td><td>+4.27 %</td><td>+0 %</td></tr><tr><td><strong>Deck depth</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td><td>+4.27 %</td><td>+4.27 %</td><td>+0 %</td></tr><tr><td><strong>Railing length</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+5.34 %</td><td>+5.34 %</td><td>+0 %</td></tr><tr><td><strong>Railing height</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td><td>+5.34 %</td><td>+5.34 %</td><td>+0 %</td></tr><tr><td><strong>Stair steps</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0.39 %</td><td>+0.39 %</td><td>+0 %</td></tr><tr><td><strong>Stair width</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0.39 %</td><td>+0.39 %</td><td>+0 %</td></tr><tr><td><strong>Riser</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+4.29 %</td><td>+0.17 %</td><td>+0.17 %</td><td>+0 %</td></tr><tr><td><strong>Tread</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+5.71 %</td><td>+0.22 %</td><td>+0.22 %</td><td>+0 %</td></tr><tr><td><strong>Coats</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Coverage</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Price</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Stair steps</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Riser</strong>, at 4.3 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Deck length = 24, Deck depth = 16, Railing length = 60, Railing height = 3, Stair steps = 5, Stair width = 4, Riser = 7, Tread = 11, Coats = 2, Coverage = 200, Price = 50, the page reports <strong>Floor area</strong> = 384 ft², <strong>Railing area</strong> = 360 ft², <strong>Stair area</strong> = 30 ft², <strong>Total area</strong> = 774 ft², <strong>Stain</strong> = 7.74 gal, <strong>Cost</strong> = 400 $. A large deck on new timber: the coverage drops and the gallons climb quickly.</li><li>With Deck length = 10, Deck depth = 8, Railing length = 0, Railing height = 3, Stair steps = 0, Stair width = 3, Riser = 7.5, Tread = 10, Coats = 1, Coverage = 300, Price = 40, the page reports <strong>Floor area</strong> = 80 ft², <strong>Railing area</strong> = 0 ft², <strong>Stair area</strong> = 0 ft², <strong>Total area</strong> = 80 ft², <strong>Stain</strong> = 0.267 gal, <strong>Cost</strong> = 40 $. A bare platform with no railing and one coat: the floor area is the whole job.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Railing counted once.</strong> Both faces take stain.</li><li><strong>Floor area used as total.</strong> Railing and steps add a third or more.</li><li><strong>New timber coverage.</strong> It drinks the first coat at half the label figure.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Floor area (ft²), Railing area (ft²), Stair area (ft²), Total area (ft²), Stain (gal), Cost ($).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Deck dimensions in feet, risers and treads in inches, areas in square feet, coverage in square feet per gallon and cost in dollars.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need deck length and deck depth and railing length and railing height and stair steps and stair width and riser and tread and coats and coverage and price. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Floor area and railing area and stair area and total area and stain and cost should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Deck length</strong> ×10</td><td>192</td><td>1 920</td><td>ten times larger</td></tr><tr><td><strong>Deck depth</strong> ×10</td><td>192</td><td>1 920</td><td>ten times larger</td></tr><tr><td><strong>Railing length</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Railing height</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Stair steps</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Stair width</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Riser</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Tread</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Coats</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Coverage</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr><tr><td><strong>Price</strong> ×10</td><td>192</td><td>192</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Flat surfaces only.</strong> Baluster faces are counted inside the railing allowance.</li><li><strong>One product.</strong> A two-tone deck is two calculations.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Buying stain for a deck.</li></li><li><li>Comparing a clear sealer with a solid stain.</li></li><li><li>Estimating an annual recoat.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/decking">Decking</a> <a href="/construction/fence-stain">Fence stain</a> <a href="/construction/paint">Paint</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Deck stain calculator work out?', 'a' => <<<'TXT'
            It returns floor area and railing area and stair area and total area and stain and cost from deck length and deck depth and railing length and railing height and stair steps and stair width and riser and tread and coats and coverage and price. The relationship is Deck length × Deck depth.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Deck length (ft), Deck depth (ft), Railing length (ft), Railing height (ft), Stair steps, Stair width (ft), Riser (in), Tread (in), Coats, Coverage (ft²/gal), Price ($/gal). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: deck length in ft; deck depth in ft; railing length in ft; railing height in ft; stair width in ft; riser in in; tread in in; coverage in ft²/gal; price in $/gal. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many gallons to stain a 16 by 12 deck?', 'a' => 'About 3.2 gallons for two coats once the railing and steps are included.'],
            ['q' => 'Does a railing take more stain than the deck?', 'a' => 'Often nearly as much — it is stained on both faces and has more edges.'],
        ],
        'related' => [
            ['path' => '/construction/decking', 'name' => 'Decking'],
            ['path' => '/construction/fence-stain', 'name' => 'Fence stain'],
            ['path' => '/construction/paint', 'name' => 'Paint'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
