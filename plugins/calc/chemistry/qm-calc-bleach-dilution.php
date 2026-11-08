<?php

/**
 * Bleach Dilution Calculator
 * /chemistry/bleach-dilution
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bleach Dilution Calculator',
    'meta' => ['title' => 'Bleach Dilution Calculator: From Stock to ppm', 'description' => 'Convert a stock sodium hypochlorite percentage into the volume needed for a target concentration in parts per million, with the water to add alongside.', 'h1' => 'Bleach Dilution Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'stock_percent',
                    'label' => 'Strength of the stock bleach',
                    'type' => 'number',
                    'suffix' => '% w/v',
                    'default' => '5',
                    'help' => '5 % w/v is the common household strength',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'target_ppm',
                    'label' => 'Target concentration',
                    'type' => 'number',
                    'suffix' => 'ppm',
                    'default' => '1000',
                    'help' => '1 000 ppm is a 1:50 dilution of 5 % bleach',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'final_volume',
                    'label' => 'Volume of solution needed',
                    'type' => 'number',
                    'suffix' => 'L',
                    'default' => '1',
                    'help' => 'How much working solution you are making',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'stock_volume',
                    'label' => 'Volume of stock bleach',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mL',
                ],
                [
                    'name' => 'water_volume',
                    'label' => 'Volume of water to add',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mL',
                ],
                [
                    'name' => 'dilution_factor',
                    'label' => 'Dilution factor',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Bleach Dilution',
            'results' => [
                'stock_volume' => 'target_ppm*final_volume/(stock_percent*10000)*1000',
                'water_volume' => 'final_volume*1000-target_ppm*final_volume/(stock_percent*10000)*1000',
                'dilution_factor' => 'stock_percent*10000/target_ppm',
                'stock_percent' => 'target_ppm*dilution_factor/10000',
                'target_ppm' => 'stock_percent*10000/dilution_factor',
                'final_volume' => 'stock_volume/(target_ppm/(stock_percent*10000))/1000',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Bleach is sold as a percentage of sodium hypochlorite by mass per volume, and disinfection protocols are written in parts per million of available chlorine. One per cent w/v is 10 000 mg/L, so <strong>V stock = target ppm × V final ÷ (% × 10 000)</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Disinfection protocols are written as ppm of available chlorine — 1 000 ppm for a blood spill, 100 ppm for food surfaces — and bleach is sold as a percentage. The conversion is one division, but getting it wrong by a factor of ten is both a disinfection failure and a hazard.</p><p>The page reports <strong>volume of stock bleach and volume of water to add and dilution factor</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume of stock bleach</strong></td><td><code>Target concentration × Volume of solution needed ÷ (Strength of the stock bleach × 10000) × 1000</code></td></tr><tr><td><strong>Volume of water to add</strong></td><td><code>Volume of solution needed × 1000-Target concentration × Volume of solution needed ÷ (Strength of the stock bleach × 10000) × 1000</code></td></tr><tr><td><strong>Dilution factor</strong></td><td><code>Strength of the stock bleach × 10000 ÷ Target concentration</code></td></tr><tr><td><strong>Strength of the stock bleach</strong></td><td><code>Target concentration × Dilution factor ÷ 10000</code></td></tr><tr><td><strong>Target concentration</strong></td><td><code>Strength of the stock bleach × 10000 ÷ Dilution factor</code></td></tr><tr><td><strong>Volume of solution needed</strong></td><td><code>Volume of stock bleach ÷ (Target concentration ÷ (Strength of the stock bleach × 10000)) ÷ 1000</code></td></tr></tbody></table><p><p>Percent w/v means grams per 100 mL, which is ten thousand milligrams per litre. Dividing the target ppm by that gives the fraction of stock needed, and multiplying by the final volume gives the millilitres to measure.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports volume of stock bleach and volume of water to add and dilution factor.</p><ul><li><strong>Strength of the stock bleach</strong> — in % w/v. 5 % w/v is the common household strength</li><li><strong>Target concentration</strong> — in ppm. 1 000 ppm is a 1:50 dilution of 5 % bleach</li><li><strong>Volume of solution needed</strong> — in L. How much working solution you are making</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume of stock bleach</strong> — in mL</li><li><strong>Volume of water to add</strong> — in mL</li><li><strong>Dilution factor</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Strength of the stock bleach = 5 % w/v, Target concentration = 1 000 ppm, Volume of solution needed = 1 L — and the results panel reads:</p><ul><li><strong>Volume of stock bleach</strong> = <code>Target concentration × Volume of solution needed ÷ (Strength of the stock bleach × 10000) × 1000</code> = <strong>20 mL</strong></li><li><strong>Volume of water to add</strong> = <code>Volume of solution needed × 1000-Target concentration × Volume of solution needed ÷ (Strength of the stock bleach × 10000) × 1000</code> = <strong>980 mL</strong></li><li><strong>Dilution factor</strong> = <code>Strength of the stock bleach × 10000 ÷ Target concentration</code> = <strong>50</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 000 × 1 ÷ (5 × 10000) × 1000 = 20</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>1 000 ppm from 5 % stock: 5 × 10 000 = 50 000 mg/L, so the fraction is 1 000 ÷ 50 000 = 0.02 — a 1:50 dilution. For one litre, that is 20 mL of bleach and 980 mL of water.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the label's percentage before trusting the default. Household bleach ranges from 2.5 % to 6 %, and thick or scented products often carry less available chlorine than the plain one beside them.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume of stock bleach</th><th>Volume of water to add</th><th>Dilution factor</th></tr></thead><tbody><tr><td><strong>Strength of the stock bleach</strong> +10 %</td><td>−9.09 %</td><td>+0.19 %</td><td>+10 %</td></tr><tr><td><strong>Target concentration</strong> +10 %</td><td>+10 %</td><td>−0.2 %</td><td>−9.09 %</td></tr><tr><td><strong>Volume of solution needed</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Strength of the stock bleach</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Volume of solution needed</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Strength of the stock bleach = 5, Target concentration = 5 000, Volume of solution needed = 1, the page reports <strong>Volume of stock bleach</strong> = 100 mL, <strong>Volume of water to add</strong> = 900 mL, <strong>Dilution factor</strong> = 10. 5 000 ppm is a 1:10 dilution: 100 mL of bleach in a litre.</li><li>With Strength of the stock bleach = 12.5, Target concentration = 1 000, Volume of solution needed = 5, the page reports <strong>Volume of stock bleach</strong> = 40 mL, <strong>Volume of water to add</strong> = 4 960 mL, <strong>Dilution factor</strong> = 125. Pool-strength 12.5 % bleach needs 8 mL in five litres for 1 000 ppm.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The percentage read as ppm directly.</strong> 5 % is 50 000 ppm, not 5 ppm; the factor of ten thousand is where most errors live.</li><li><strong>Mixing bleach with acid or ammonia.</strong> Chlorine gas and chloramine come off the solution — this is a safety rule, not a calculation one.</li><li><strong>Assuming the percentage stays.</strong> Bleach loses strength in storage, about half its activity a year at room temperature in a warm cupboard.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume of stock bleach (mL), Volume of water to add (mL), Dilution factor.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The stock volume comes back in millilitres because the percentage is mass per 100 mL. The final volume is entered in litres; for smaller volumes enter the decimal, not millilitres.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need strength of the stock bleach and target concentration and volume of solution needed. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Volume of stock bleach and volume of water to add and dilution factor should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Strength of the stock bleach</strong> ×10</td><td>20</td><td>2</td><td>ten times smaller</td></tr><tr><td><strong>Target concentration</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>Volume of solution needed</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Available chlorine, not hypochlorite mass.</strong> Some products quote both, and they differ by the chlorine content of the molecule.</li><li><strong>It says nothing about contact time.</strong> Concentration and time are two halves of a disinfection protocol.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Making a surface disinfectant to a stated ppm.</li></li><li><li>Scaling a 1:50 recipe to a five-litre bucket.</li></li><li><li>Comparing the cost per litre of two bleach strengths.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/ppm-to-molarity">PPM to molarity</a> <a href="/chemistry/solution-dilution">Solution dilution</a> <a href="/chemistry/dilution-factor">Dilution factor</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bleach Dilution calculator work out?', 'a' => <<<'TXT'
            It returns volume of stock bleach and volume of water to add and dilution factor from strength of the stock bleach and target concentration and volume of solution needed. The relationship is Target concentration × Volume of solution needed ÷ (Strength of the stock bleach × 10000) × 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Strength of the stock bleach (% w/v), Target concentration (ppm), Volume of solution needed (L). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: strength of the stock bleach in % w/v; target concentration in ppm; volume of solution needed in L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What does 1 000 ppm of bleach mean in practice?', 'a' => 'It means 1 000 mg of available chlorine per litre, which is a 1:50 dilution of 5 % household bleach — about 20 mL in a litre of water.'],
            ['q' => 'Can I use ppm and mg/L interchangeably?', 'a' => 'For dilute aqueous solutions, yes. One milligram per litre is one part per million when the solution is mostly water.'],
        ],
        'related' => [
            ['path' => '/chemistry/ppm-to-molarity', 'name' => 'PPM to molarity'],
            ['path' => '/chemistry/solution-dilution', 'name' => 'Solution dilution'],
            ['path' => '/chemistry/dilution-factor', 'name' => 'Dilution factor'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
