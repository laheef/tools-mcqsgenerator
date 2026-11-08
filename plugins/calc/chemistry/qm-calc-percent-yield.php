<?php

/**
 * Percent Yield Calculator
 * /chemistry/percent-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Percent Yield Calculator',
    'meta' => ['title' => 'Percent Yield Calculator: Actual vs Theoretical', 'description' => 'Compare the mass you actually collected with the mass the equation allowed, and read the result as a percentage, a fraction and the mass lost along the way.', 'h1' => 'Percent Yield Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'actual_mass',
                    'label' => 'Mass actually collected',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '8.5',
                    'help' => 'Weighed after drying — wet product inflates this figure',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'theoretical_mass',
                    'label' => 'Theoretical yield',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '10',
                    'help' => 'From the balanced equation and the limiting reagent',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'percent_yield',
                    'label' => 'Percent yield',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'mass_lost',
                    'label' => 'Mass not recovered',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'yield_fraction',
                    'label' => 'Yield as a fraction',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Percent Yield',
            'results' => [
                'percent_yield' => 'actual_mass/theoretical_mass*100',
                'mass_lost' => 'theoretical_mass-actual_mass',
                'yield_fraction' => 'actual_mass/theoretical_mass',
                'actual_mass' => 'percent_yield*theoretical_mass/100',
                'theoretical_mass' => 'actual_mass*100/percent_yield',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Percent yield is what you got divided by what the equation allowed, times a hundred: <strong>% yield = actual ÷ theoretical × 100</strong>. The page also reports the shortfall in grams and as a fraction, which is what tells you whether a low yield is worth investigating.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Yield is the single number that says whether a synthesis worked. It is also the number most often computed against the wrong denominator — a theoretical yield that assumed complete reaction of the wrong reagent.</p><p>The page reports <strong>percent yield and mass not recovered and yield as a fraction</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Percent yield</strong></td><td><code>Mass actually collected ÷ Theoretical yield × 100</code></td></tr><tr><td><strong>Mass not recovered</strong></td><td><code>Theoretical yield-Mass actually collected</code></td></tr><tr><td><strong>Yield as a fraction</strong></td><td><code>Mass actually collected ÷ Theoretical yield</code></td></tr><tr><td><strong>Mass actually collected</strong></td><td><code>Percent yield × Theoretical yield ÷ 100</code></td></tr><tr><td><strong>Theoretical yield</strong></td><td><code>Mass actually collected × 100 ÷ Percent yield</code></td></tr></tbody></table><p><p>Both masses must be the same substance. Comparing 8.5 g of wet crystals with 10 g of dry theoretical product mixes water into the yield and can push it above a hundred per cent.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports percent yield and mass not recovered and yield as a fraction.</p><ul><li><strong>Mass actually collected</strong> — in g. Weighed after drying — wet product inflates this figure</li><li><strong>Theoretical yield</strong> — in g. From the balanced equation and the limiting reagent</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Percent yield</strong> — in %</li><li><strong>Mass not recovered</strong> — in g</li><li><strong>Yield as a fraction</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass actually collected = 8.5 g, Theoretical yield = 10 g — and the results panel reads:</p><ul><li><strong>Percent yield</strong> = <code>Mass actually collected ÷ Theoretical yield × 100</code> = <strong>85 %</strong></li><li><strong>Mass not recovered</strong> = <code>Theoretical yield-Mass actually collected</code> = <strong>1.5 g</strong></li><li><strong>Yield as a fraction</strong> = <code>Mass actually collected ÷ Theoretical yield</code> = <strong>0.85</strong></li></ul><p>With the numbers written into the formula, the first result is <code>8.5 ÷ 10 × 100 = 85</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>8.5 g collected against 10 g allowed is 85 %: 1.5 g was left in the filtrate, on the glassware, or never formed. A yield above 100 % means the product is wet or contaminated, never that the reaction beat thermodynamics.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Above 90 % is excellent for a clean reaction. 70–90 % is normal for a multi-step purification. Below 50 % usually points at an incomplete reaction, product left in the mother liquor, or a transfer loss worth chasing.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Percent yield</th><th>Mass not recovered</th><th>Yield as a fraction</th></tr></thead><tbody><tr><td><strong>Mass actually collected</strong> +10 %</td><td>+10 %</td><td>−56.67 %</td><td>+10 %</td></tr><tr><td><strong>Theoretical yield</strong> +10 %</td><td>−9.09 %</td><td>+66.67 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Theoretical yield</strong>: a ten per cent move there shifts the result by about 66.7 per cent. The least sensitive is <strong>Mass actually collected</strong>, at 56.7 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass actually collected = 12.4, Theoretical yield = 15, the page reports <strong>Percent yield</strong> = 82.667 %, <strong>Mass not recovered</strong> = 2.6 g, <strong>Yield as a fraction</strong> = 0.827. 12.4 of 15 is 82.7 %, with 2.6 g unaccounted for — a normal purification loss.</li><li>With Mass actually collected = 9.9, Theoretical yield = 10, the page reports <strong>Percent yield</strong> = 99 %, <strong>Mass not recovered</strong> = 0.1 g, <strong>Yield as a fraction</strong> = 0.99. 99 % against a theoretical yield close to the balance's readability is suspicious rather than impressive; dry it and weigh again.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Theoretical yield from the wrong reagent.</strong> The denominator has to come from the limiting reagent's moles, not from the most abundant one.</li><li><strong>Undried product.</strong> Residual solvent counts as mass. A yield of 104 % is a drying problem, not a discovery.</li><li><strong>Molar mass mismatches.</strong> If the product is a hydrate and the theoretical figure used the anhydrous mass, the percentage is wrong by the water.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Percent yield (%), Mass not recovered (g), Yield as a fraction.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Any consistent mass unit works because it cancels inside the ratio, but both masses must use the same one. The mass lost is reported in whatever unit the inputs were given in.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass actually collected and theoretical yield. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Percent yield and mass not recovered and yield as a fraction should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass actually collected</strong> ×10</td><td>85</td><td>850</td><td>ten times larger</td></tr><tr><td><strong>Theoretical yield</strong> ×10</td><td>85</td><td>8.5</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It measures mass, not purity.</strong> A 95 % yield of 80 % pure material is not 95 % of the product you wanted.</li><li><strong>It cannot tell you where the loss went.</strong> A mass balance over the mother liquor and washings is the next step if the figure matters.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Recording a batch against its expected yield.</li></li><li><li>Deciding whether a low yield is worth investigating.</li></li><li><li>Comparing routes to the same product on a fair basis.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/theoretical-yield">Theoretical yield</a> <a href="/chemistry/actual-yield">Actual yield</a> <a href="/chemistry/atom-economy">Atom economy</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Percent Yield calculator work out?', 'a' => <<<'TXT'
            It returns percent yield and mass not recovered and yield as a fraction from mass actually collected and theoretical yield. The relationship is Mass actually collected ÷ Theoretical yield × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass actually collected (g), Theoretical yield (g). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass actually collected in g; theoretical yield in g. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Can percent yield be more than 100?', 'a' => <<<'TXT'
            Not for a pure, dry product. Above 100 % means the product is wet, contaminated with starting material, or the theoretical yield was calculated from the wrong limiting reagent.
            TXT],
            ['q' => 'What counts as a good yield?', 'a' => 'It depends on the reaction, but 80–95 % for a straightforward synthesis is normal. Anything above 100 % is an analytical problem, not a success.'],
        ],
        'related' => [
            ['path' => '/chemistry/theoretical-yield', 'name' => 'Theoretical yield'],
            ['path' => '/chemistry/actual-yield', 'name' => 'Actual yield'],
            ['path' => '/chemistry/atom-economy', 'name' => 'Atom economy'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
