<?php

/**
 * Beam load
 * /construction/beam-load
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Beam load',
    'meta' => ['title' => 'Beam Load Calculator: Line Load from a Floor', 'description' => 'Turn a floor\'s dead and live load into the line load a beam carries at its tributary width, and the load that lands on each end bearing. and sizes the bearing.', 'h1' => 'Beam load', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'tributary',
                    'label' => 'Tributary width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '10',
                    'help' => 'Half the floor each side of the beam',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'dead',
                    'label' => 'Dead load',
                    'type' => 'number',
                    'suffix' => 'psf',
                    'default' => '15',
                    'help' => 'Structure, subfloor, finishes',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'live',
                    'label' => 'Live load',
                    'type' => 'number',
                    'suffix' => 'psf',
                    'default' => '40',
                    'help' => 'People and furniture — 40 for a dwelling',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'span',
                    'label' => 'Beam span',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '12',
                    'help' => 'Support to support',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_psf',
                    'label' => 'Total load',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'psf',
                ],
                [
                    'name' => 'line_load',
                    'label' => 'Line load on the beam',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb/ft',
                ],
                [
                    'name' => 'total_load',
                    'label' => 'Total load on the beam',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
                [
                    'name' => 'reaction',
                    'label' => 'Reaction at each end',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Beam load',
            'results' => [
                'total_psf' => 'dead+live',
                'line_load' => '(dead+live)*tributary',
                'total_load' => '(dead+live)*tributary*span',
                'reaction' => '(dead+live)*tributary*span/2',
                'tributary' => 'line_load/(dead+live)',
                'dead' => 'line_load/tributary-live',
                'live' => 'line_load/tributary-dead',
                'span' => 'total_load/line_load',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A beam carries half the floor on each side of it: <strong>w = (dead + live) × tributary width</strong> in pounds per foot, and <strong>total = w × span</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Every beam problem starts with the load it carries, and the load per square foot of floor is not the load on the beam. The tributary width is the share: a beam in the middle of a floor takes half the span either side, and a beam at the edge takes the near half only.</p><p>The page reports <strong>total load and line load on the beam and total load on the beam and reaction at each end</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Total load</strong></td><td><code>Dead load+Live load</code></td></tr><tr><td><strong>Line load on the beam</strong></td><td><code>(Dead load+Live load) × Tributary width</code></td></tr><tr><td><strong>Total load on the beam</strong></td><td><code>(Dead load+Live load) × Tributary width × Beam span</code></td></tr><tr><td><strong>Reaction at each end</strong></td><td><code>(Dead load+Live load) × Tributary width × Beam span ÷ 2</code></td></tr><tr><td><strong>Tributary width</strong></td><td><code>Line load on the beam ÷ (Dead load+Live load)</code></td></tr><tr><td><strong>Dead load</strong></td><td><code>Line load on the beam ÷ Tributary width-Live load</code></td></tr><tr><td><strong>Live load</strong></td><td><code>Line load on the beam ÷ Tributary width-Dead load</code></td></tr><tr><td><strong>Beam span</strong></td><td><code>Total load on the beam ÷ Line load on the beam</code></td></tr></tbody></table><p><p>Dead load is everything that stays put — joists, sheathing, insulation, ceiling and floor finish — and runs about 10 to 20 psf for a timber floor. Live load is what moves, and 40 psf is the residential standard for a floor.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports total load and line load on the beam and total load on the beam and reaction at each end.</p><ul><li><strong>Tributary width</strong> — in ft. Half the floor each side of the beam</li><li><strong>Dead load</strong> — in psf. Structure, subfloor, finishes</li><li><strong>Live load</strong> — in psf. People and furniture — 40 for a dwelling</li><li><strong>Beam span</strong> — in ft. Support to support</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Total load</strong> — in psf</li><li><strong>Line load on the beam</strong> — in lb/ft</li><li><strong>Total load on the beam</strong> — in lb</li><li><strong>Reaction at each end</strong> — in lb</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Tributary width = 10 ft, Dead load = 15 psf, Live load = 40 psf, Beam span = 12 ft — and the results panel reads:</p><ul><li><strong>Total load</strong> = <code>Dead load+Live load</code> = <strong>55 psf</strong></li><li><strong>Line load on the beam</strong> = <code>(Dead load+Live load) × Tributary width</code> = <strong>550 lb/ft</strong></li><li><strong>Total load on the beam</strong> = <code>(Dead load+Live load) × Tributary width × Beam span</code> = <strong>6 600 lb</strong></li><li><strong>Reaction at each end</strong> = <code>(Dead load+Live load) × Tributary width × Beam span ÷ 2</code> = <strong>3 300 lb</strong></li></ul><p>With the numbers written into the formula, the first result is <code>15+40 = 55</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A beam with 10 ft of tributary width carrying 15 psf dead and 40 psf live takes 55 psf over 10 ft, which is 550 lb per foot. Over a 12 ft span that is 6 600 lb on the beam and 3 300 lb on each end bearing.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the reaction against the bearing: a 3½ in bearing plate on a wall carries about 300 psi of masonry, and the same load on a post needs a steel plate. The reaction is the number that sizes the post, not the beam.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Total load</th><th>Line load on the beam</th><th>Total load on the beam</th><th>Reaction at each end</th></tr></thead><tbody><tr><td><strong>Tributary width</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Dead load</strong> +10 %</td><td>+2.73 %</td><td>+2.73 %</td><td>+2.73 %</td><td>+2.73 %</td></tr><tr><td><strong>Live load</strong> +10 %</td><td>+7.27 %</td><td>+7.27 %</td><td>+7.27 %</td><td>+7.27 %</td></tr><tr><td><strong>Beam span</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Beam span</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Dead load</strong>, at 2.7 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Tributary width = 16, Dead load = 20, Live load = 40, Beam span = 16, the page reports <strong>Total load</strong> = 60 psf, <strong>Line load on the beam</strong> = 960 lb/ft, <strong>Total load on the beam</strong> = 15 360 lb, <strong>Reaction at each end</strong> = 7 680 lb. A beam taking a full half-floor of a 32 ft span — the load that makes a steel beam necessary.</li><li>With Tributary width = 5, Dead load = 12, Live load = 30, Beam span = 10, the page reports <strong>Total load</strong> = 42 psf, <strong>Line load on the beam</strong> = 210 lb/ft, <strong>Total load on the beam</strong> = 2 100 lb, <strong>Reaction at each end</strong> = 1 050 lb. A porch edge beam: a narrow tributary and a lighter live load, so a timber section works.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Full floor width used as tributary.</strong> A beam takes half the span either side, not the whole floor.</li><li><strong>Dead load forgotten.</strong> It is a quarter of the total on a timber floor and more under tile.</li><li><strong>Load per foot confused with load per square foot.</strong> The beam sees the line load; the floor sees the area load.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Total load (psf), Line load on the beam (lb/ft), Total load on the beam (lb), Reaction at each end (lb).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Loads in pounds per square foot, tributary width and span in feet, the line load in pounds per foot, and the total and reactions in pounds.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need tributary width and dead load and live load and beam span. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Total load and line load on the beam and total load on the beam and reaction at each end should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Tributary width</strong> ×10</td><td>55</td><td>55</td><td>unchanged</td></tr><tr><td><strong>Dead load</strong> ×10</td><td>55</td><td>190</td><td>×3.455</td></tr><tr><td><strong>Live load</strong> ×10</td><td>55</td><td>415</td><td>×7.545</td></tr><tr><td><strong>Beam span</strong> ×10</td><td>55</td><td>55</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Uniform load only.</strong> Point loads need their own combination.</li><li><strong>Simple span.</strong> Continuous beams redistribute load to the interior supports.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Converting a floor load to a beam load.</li></li><li><li>Sizing a post under a beam.</li></li><li><li>Feeding the beam span calculator.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/wood-beam-span">Wood beam span</a> <a href="/construction/beam-deflection">Beam deflection</a> <a href="/construction/floor-joist">Floor joist</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Beam load calculator work out?', 'a' => <<<'TXT'
            It returns total load and line load on the beam and total load on the beam and reaction at each end from tributary width and dead load and live load and beam span. The relationship is Dead load+Live load.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Tributary width (ft), Dead load (psf), Live load (psf), Beam span (ft). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: tributary width in ft; dead load in psf; live load in psf; beam span in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is tributary width?', 'a' => 'The strip of floor a beam carries — half the distance to the next support on each side.'],
            ['q' => 'What live load should I use for a floor?', 'a' => '40 psf for a dwelling, 50 or more for a deck with a hot tub, and 100 for a garage.'],
        ],
        'related' => [
            ['path' => '/construction/wood-beam-span', 'name' => 'Wood beam span'],
            ['path' => '/construction/beam-deflection', 'name' => 'Beam deflection'],
            ['path' => '/construction/floor-joist', 'name' => 'Floor joist'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
