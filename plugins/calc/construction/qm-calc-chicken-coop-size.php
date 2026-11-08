<?php

/**
 * Chicken coop size
 * /construction/chicken-coop-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chicken coop size',
    'meta' => ['title' => 'Chicken Coop Size Calculator by Bird Count Tool', 'description' => 'Work out the coop, run and yard space a flock needs, counting bantams as a fraction of a full-size bird, in square feet and square metres. Units shown.', 'h1' => 'Chicken coop size', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'regular',
                    'label' => 'Full-size chickens',
                    'type' => 'number',
                    'default' => '6',
                    'help' => 'Standard breeds',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bantam',
                    'label' => 'Bantams',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'Small breeds',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'birds',
                    'label' => 'Equivalent birds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'coop_area',
                    'label' => 'Coop floor',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'run_area',
                    'label' => 'Run floor',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft²',
                ],
                [
                    'name' => 'coop_m2',
                    'label' => 'Coop floor',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Chicken coop size',
            'results' => [
                'birds' => 'regular+bantam*0.67',
                'coop_area' => '(regular+bantam*0.67)*4',
                'run_area' => '(regular+bantam*0.67)*10',
                'coop_m2' => '(regular+bantam*0.67)*4*0.092903',
                'regular' => 'birds-bantam*0.67',
                'bantam' => '(birds-regular)/0.67',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Coop 4 ft², run 10 ft² and yard 25 ft² per full-size bird</strong>; a bantam counts as two thirds of a bird.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Overcrowding is the root of most flock problems — pecking, feather loss, dirty litter and disease — and it is invisible until the birds are in. The numbers are generous compared with a factory shed because a backyard coop has no ventilation system, and the run matters as much as the coop.</p><p>The page reports <strong>equivalent birds and coop floor (ft²) and run floor and coop floor (m²)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Equivalent birds</strong></td><td><code>Full-size chickens+Bantams × 0.67</code></td></tr><tr><td><strong>Coop floor (ft²)</strong></td><td><code>(Full-size chickens+Bantams × 0.67) × 4</code></td></tr><tr><td><strong>Run floor</strong></td><td><code>(Full-size chickens+Bantams × 0.67) × 10</code></td></tr><tr><td><strong>Coop floor (m²)</strong></td><td><code>(Full-size chickens+Bantams × 0.67) × 4 × 0.092903</code></td></tr><tr><td><strong>Full-size chickens</strong></td><td><code>Equivalent birds-Bantams × 0.67</code></td></tr><tr><td><strong>Bantams</strong></td><td><code>(Equivalent birds-Full-size chickens) ÷ 0.67</code></td></tr></tbody></table><p><p>All three figures are shown because all three are worth knowing: four square feet inside, ten in a run and twenty-five when the birds have a yard. Bantams are counted at two thirds of a full-size bird.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports equivalent birds and coop floor (ft²) and run floor and coop floor (m²).</p><ul><li><strong>Full-size chickens</strong>. Standard breeds</li><li><strong>Bantams</strong>. Small breeds</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Equivalent birds</strong></li><li><strong>Coop floor</strong> — in ft²</li><li><strong>Run floor</strong> — in ft²</li><li><strong>Coop floor</strong> — in m²</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Full-size chickens = 6, Bantams = 2 — and the results panel reads:</p><ul><li><strong>Equivalent birds</strong> = <code>Full-size chickens+Bantams × 0.67</code> = <strong>7.34</strong></li><li><strong>Coop floor</strong> = <code>(Full-size chickens+Bantams × 0.67) × 4</code> = <strong>29.36 ft²</strong></li><li><strong>Run floor</strong> = <code>(Full-size chickens+Bantams × 0.67) × 10</code> = <strong>73.4 ft²</strong></li><li><strong>Coop floor</strong> = <code>(Full-size chickens+Bantams × 0.67) × 4 × 0.092903</code> = <strong>2.728 m²</strong></li></ul><p>With the numbers written into the formula, the first result is <code>6+2 × 0.67 = 7.34</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Six full-size hens and two bantams come to 7.34 equivalent birds, so a coop of 29.36 ft² — about 2.728 m² — and a run of 73.4 ft². An 8 by 4 shed is the smallest thing that works.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the run against the coop: the run is two and a half times the coop at every flock size. If the run you have is smaller than that, the birds are effectively kept inside and the coop needs to be larger than the minimum.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Equivalent birds</th><th>Coop floor</th><th>Run floor</th><th>Coop floor</th></tr></thead><tbody><tr><td><strong>Full-size chickens</strong> +10 %</td><td>+8.17 %</td><td>+8.17 %</td><td>+8.17 %</td><td>+8.17 %</td></tr><tr><td><strong>Bantams</strong> +10 %</td><td>+1.83 %</td><td>+1.83 %</td><td>+1.83 %</td><td>+1.83 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Full-size chickens</strong>: a ten per cent move there shifts the result by about 8.2 per cent. The least sensitive is <strong>Bantams</strong>, at 1.8 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Full-size chickens = 10, Bantams = 0, the page reports <strong>Equivalent birds</strong> = 10, <strong>Coop floor</strong> = 40 ft², <strong>Run floor</strong> = 100 ft², <strong>Coop floor</strong> = 3.716 m². Ten hybrids in a covered run: a twenty by five run is about right.</li><li>With Full-size chickens = 0, Bantams = 8, the page reports <strong>Equivalent birds</strong> = 5.36, <strong>Coop floor</strong> = 21.44 ft², <strong>Run floor</strong> = 53.6 ft², <strong>Coop floor</strong> = 1.992 m². A bantam-only flock, where the smaller birds need less of everything.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Coop area counted as run area.</strong> They are separate requirements.</li><li><strong>Nest boxes counted as floor space.</strong> They are above the floor.</li><li><strong>Bantams counted as full size.</strong> They are about two thirds.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Equivalent birds, Coop floor (ft²), Run floor (ft²), Coop floor (m²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Bird counts as numbers, floor areas in square feet with the coop in square metres beside it.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need full-size chickens and bantams. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Equivalent birds and coop floor (ft²) and run floor and coop floor (m²) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Full-size chickens</strong> ×10</td><td>7.34</td><td>61.34</td><td>×8.357</td></tr><tr><td><strong>Bantams</strong> ×10</td><td>7.34</td><td>19.4</td><td>×2.643</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Minimums, not targets.</strong> More space is always better.</li><li><strong>Climate ignored.</strong> Cold climates need more inside space.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing a coop before buying it.</li></li><li><li>Checking a run against a flock.</li></li><li><li>Planning a mixed flock.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/hoop-house">Hoop house</a> <a href="/construction/fence">Fence</a> <a href="/construction/round-pen">Round pen</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Chicken coop size calculator work out?', 'a' => <<<'TXT'
            It returns equivalent birds and coop floor (ft²) and run floor and coop floor (m²) from full-size chickens and bantams. The relationship is Full-size chickens+Bantams × 0.67.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Full-size chickens, Bantams. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => 'It matters that every box is in the unit printed beside it: . The page converts nothing on its own, so a mixed set of units is the most common wrong answer.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How much coop space per chicken?', 'a' => 'Four square feet inside and ten in a run for full-size birds.'],
            ['q' => 'How many chickens fit in an 8 by 4 coop?', 'a' => 'Eight, at four square feet each.'],
        ],
        'related' => [
            ['path' => '/construction/hoop-house', 'name' => 'Hoop house'],
            ['path' => '/construction/fence', 'name' => 'Fence'],
            ['path' => '/construction/round-pen', 'name' => 'Round pen'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
