<?php

/**
 * Concrete column
 * /construction/concrete-column
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Concrete column',
    'meta' => ['title' => 'Concrete Column Calculator: Round Column Volume', 'description' => 'Get the concrete a round column needs from its diameter and height, plus the bag count and the form area the pour will take to build on the site. All shown.', 'h1' => 'Concrete column', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'diameter',
                    'label' => 'Column diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '12',
                    'help' => 'Inside the form',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'height',
                    'label' => 'Column height',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'From footing top to the underside of the beam',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'count',
                    'label' => 'Number of columns',
                    'type' => 'number',
                    'default' => '4',
                    'help' => 'Columns in the run',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'waste',
                    'label' => 'Over-order',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '5',
                    'help' => 'Spillage and an uneven footing',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_each',
                    'label' => 'Volume per column',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'volume_total',
                    'label' => 'Volume, all columns',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'yd³',
                ],
                [
                    'name' => 'bags_80lb',
                    'label' => 'Bags of 80 lb mix',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'form_area',
                    'label' => 'Form area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Concrete column',
            'results' => [
                'volume_each' => 'pi*pow(diameter/24,2)*height',
                'volume_total' => 'pi*pow(diameter/24,2)*height*count*(1+waste/100)/27',
                'bags_80lb' => 'ceil(pi*pow(diameter/24,2)*height*count*(1+waste/100)/0.6-0.000000001)',
                'form_area' => 'pi*diameter/12*height*count',
                'diameter' => '24*sqrt(volume_each/(pi*height))',
                'height' => 'volume_each/(pi*pow(diameter/24,2))',
                'count' => 'volume_total*27/(pi*pow(diameter/24,2)*height*(1+waste/100))',
                'waste' => '(volume_total*27/(pi*pow(diameter/24,2)*height*count)-1)*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A round column is a cylinder: <strong>volume = π·r²·h</strong>. With the diameter in inches and the height in feet, that is <strong>π·(d/24)²·h</strong> cubic feet, then divided by 27 for yards.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Columns are usually a small part of a pour but a large part of the formwork, and getting the volume right decides whether the truck comes once or twice. The form area is what the tube or the plywood costs.</p><p>The page reports <strong>volume per column and volume, all columns and bags of 80 lb mix and form area</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume per column</strong></td><td><code>pi × (Column diameter ÷ 24)^2 × Column height</code></td></tr><tr><td><strong>Volume, all columns</strong></td><td><code>pi × (Column diameter ÷ 24)^2 × Column height × Number of columns × (1+Over-order ÷ 100) ÷ 27</code></td></tr><tr><td><strong>Bags of 80 lb mix</strong></td><td><code>ceil(pi × (Column diameter ÷ 24)^2 × Column height × Number of columns × (1+Over-order ÷ 100) ÷ 0.6-0.000000001)</code></td></tr><tr><td><strong>Form area</strong></td><td><code>pi × Column diameter ÷ 12 × Column height × Number of columns</code></td></tr><tr><td><strong>Column diameter</strong></td><td><code>24 × √(Volume per column ÷ (pi × Column height))</code></td></tr><tr><td><strong>Column height</strong></td><td><code>Volume per column ÷ (pi × (Column diameter ÷ 24)^2)</code></td></tr><tr><td><strong>Number of columns</strong></td><td><code>Volume, all columns × 27 ÷ (pi × (Column diameter ÷ 24)^2 × Column height × (1+Over-order ÷ 100))</code></td></tr><tr><td><strong>Over-order</strong></td><td><code>(Volume, all columns × 27 ÷ (pi × (Column diameter ÷ 24)^2 × Column height × Number of columns)-1) × 100</code></td></tr></tbody></table><p><p>The diameter is halved for the radius and divided by twelve for feet in one step — hence the 24 in the denominator. The form's lateral area is the circumference times the height, which is what you wrap around the column.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports volume per column and volume, all columns and bags of 80 lb mix and form area.</p><ul><li><strong>Column diameter</strong> — in in. Inside the form</li><li><strong>Column height</strong> — in ft. From footing top to the underside of the beam</li><li><strong>Number of columns</strong>. Columns in the run</li><li><strong>Over-order</strong> — in %. Spillage and an uneven footing</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume per column</strong> — in ft³</li><li><strong>Volume, all columns</strong> — in yd³</li><li><strong>Bags of 80 lb mix</strong></li><li><strong>Form area</strong> — in ft²</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Column diameter = 12 in, Column height = 10 ft, Number of columns = 4, Over-order = 5 % — and the results panel reads:</p><ul><li><strong>Volume per column</strong> = <code>pi × (Column diameter ÷ 24)^2 × Column height</code> = <strong>7.854 ft³</strong></li><li><strong>Volume, all columns</strong> = <code>pi × (Column diameter ÷ 24)^2 × Column height × Number of columns × (1+Over-order ÷ 100) ÷ 27</code> = <strong>1.222 yd³</strong></li><li><strong>Bags of 80 lb mix</strong> = <code>ceil(pi × (Column diameter ÷ 24)^2 × Column height × Number of columns × (1+Over-order ÷ 100) ÷ 0.6-0.000000001)</code> = <strong>55</strong></li><li><strong>Form area</strong> = <code>pi × Column diameter ÷ 12 × Column height × Number of columns</code> = <strong>125.664 ft²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pi × pow(12 ÷ 24,2) × 10 = 7.854</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Four 12 in columns 10 ft tall: each holds π × 0.25 × 10 = 7.85 ft³, so the run is 31.4 ft³, 1.22 yd³ with five per cent — or 55 bags. The forms take π × 1 × 10 = 31.4 ft² each of wrapping.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>A 12 in column holding about 0.785 ft³ per foot of height is a useful check: the area is 0.785 ft², and everything scales from there. Double the diameter and the volume quadruples.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume per column</th><th>Volume, all columns</th><th>Bags of 80 lb mix</th><th>Form area</th></tr></thead><tbody><tr><td><strong>Column diameter</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+21.82 %</td><td>+10 %</td></tr><tr><td><strong>Column height</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10.91 %</td><td>+10 %</td></tr><tr><td><strong>Number of columns</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10.91 %</td><td>+10 %</td></tr><tr><td><strong>Over-order</strong> +10 %</td><td>+0 %</td><td>+0.48 %</td><td>+1.82 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Column diameter</strong>: a ten per cent move there shifts the result by about 21.8 per cent. The least sensitive is <strong>Over-order</strong>, at 1.8 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Column diameter = 18, Column height = 12, Number of columns = 6, Over-order = 10, the page reports <strong>Volume per column</strong> = 21.206 ft³, <strong>Volume, all columns</strong> = 5.184 yd³, <strong>Bags of 80 lb mix</strong> = 234, <strong>Form area</strong> = 339.292 ft². Six 18 in columns 12 ft high: 21.2 ft³ each, 5.18 yd³ to order, 234 bags.</li><li>With Column diameter = 8, Column height = 8, Number of columns = 2, Over-order = 5, the page reports <strong>Volume per column</strong> = 2.793 ft³, <strong>Volume, all columns</strong> = 0.217 yd³, <strong>Bags of 80 lb mix</strong> = 10, <strong>Form area</strong> = 33.51 ft². Two porch posts: 2.8 ft³ each, 0.22 yd³ in total, ten bags.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Diameter entered as radius.</strong> The formula does the halving; putting in the radius makes the volume four times too large.</li><li><strong>Footing depth forgotten.</strong> The column volume stops at the footing, and the footing is a separate pour.</li><li><strong>Bags assumed for a yard.</strong> 45 bags of 80 lb mix make a yard, and columns with deep formwork spill more than a slab.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume per column (ft³), Volume, all columns (yd³), Bags of 80 lb mix, Form area (ft²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Diameter in inches and height in feet, with the 24 converting both; volumes come out in cubic feet and cubic yards, and the form area in square feet because the circumference is converted to feet as well.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need column diameter and column height and number of columns and over-order. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Volume per column and volume, all columns and bags of 80 lb mix and form area should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Column diameter</strong> ×10</td><td>7.854</td><td>785.398</td><td>×100</td></tr><tr><td><strong>Column height</strong> ×10</td><td>7.854</td><td>78.54</td><td>ten times larger</td></tr><tr><td><strong>Number of columns</strong> ×10</td><td>7.854</td><td>7.854</td><td>unchanged</td></tr><tr><td><strong>Over-order</strong> ×10</td><td>7.854</td><td>7.854</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Straight cylinders.</strong> Tapered and fluted columns need their own geometry.</li><li><strong>No reinforcement volume.</strong> Rebar displaces a little concrete; the over-order covers it.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Ordering concrete for a column run.</li></li><li><li>Buying form tubes by area.</li></li><li><li>Checking whether a pour is a bag job.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/concrete-tube">Concrete tube</a> <a href="/construction/sonotube">Sonotube</a> <a href="/construction/concrete-weight">Concrete weight</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Concrete column calculator work out?', 'a' => <<<'TXT'
            It returns volume per column and volume, all columns and bags of 80 lb mix and form area from column diameter and column height and number of columns and over-order. The relationship is pi × (Column diameter ÷ 24)^2 × Column height.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Column diameter (in), Column height (ft), Number of columns, Over-order (%). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: column diameter in in; column height in ft; over-order in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much concrete is in a 12 inch column?', 'a' => 'About 0.785 ft³ per foot of height, so a 10 ft column is 7.85 ft³ — a little under a third of a cubic yard.'],
            ['q' => 'Do I need to subtract the rebar?', 'a' => 'No. The displacement is small and the over-order covers it; subtracting it would leave you short.'],
        ],
        'related' => [
            ['path' => '/construction/concrete-tube', 'name' => 'Concrete tube'],
            ['path' => '/construction/sonotube', 'name' => 'Sonotube'],
            ['path' => '/construction/concrete-weight', 'name' => 'Concrete weight'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
