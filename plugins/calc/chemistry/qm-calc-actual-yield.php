<?php

/**
 * Actual Yield Calculator
 * /chemistry/actual-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Actual Yield Calculator',
    'meta' => ['title' => 'Actual Yield Calculator: From Percent Yield', 'description' => 'Start from the theoretical yield and the percent yield you measured, and work out the mass of product to expect, the mass that will be lost and the waste share.', 'h1' => 'Actual Yield Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'theoretical_mass',
                    'label' => 'Theoretical yield',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '10',
                    'help' => 'What the balanced equation allows from the limiting reagent',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'percent_yield',
                    'label' => 'Expected percent yield',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '85',
                    'help' => 'From a previous batch of the same reaction, or the method\'s reported figure',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'actual_mass',
                    'label' => 'Expected actual yield',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'mass_lost',
                    'label' => 'Mass expected to be lost',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'loss_percent',
                    'label' => 'Loss',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Actual Yield',
            'results' => [
                'actual_mass' => 'theoretical_mass*percent_yield/100',
                'mass_lost' => 'theoretical_mass-theoretical_mass*percent_yield/100',
                'loss_percent' => '100-percent_yield',
                'theoretical_mass' => 'actual_mass*100/percent_yield',
                'percent_yield' => 'actual_mass/theoretical_mass*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>When the percent yield is known — from a previous identical batch, or from a method note — the mass to expect is <strong>actual = theoretical × % yield ÷ 100</strong>. This page turns that into a planned batch mass, plus the shortfall and the waste percentage.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Planning a batch means knowing what the balance should read at the end. A yield figure from the literature or from the last run is the only honest basis for that number, and the conversion is one multiplication.</p><p>The page reports <strong>expected actual yield and mass expected to be lost and loss</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Expected actual yield</strong></td><td><code>Theoretical yield × Expected percent yield ÷ 100</code></td></tr><tr><td><strong>Mass expected to be lost</strong></td><td><code>Theoretical yield-Theoretical yield × Expected percent yield ÷ 100</code></td></tr><tr><td><strong>Loss</strong></td><td><code>100-Expected percent yield</code></td></tr><tr><td><strong>Theoretical yield</strong></td><td><code>Expected actual yield × 100 ÷ Expected percent yield</code></td></tr><tr><td><strong>Expected percent yield</strong></td><td><code>Expected actual yield ÷ Theoretical yield × 100</code></td></tr></tbody></table><p><p>Nothing here depends on the chemistry beyond the theoretical yield; the percent is an empirical correction for how this reaction behaves in your hands, your glassware and your drying oven.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports expected actual yield and mass expected to be lost and loss.</p><ul><li><strong>Theoretical yield</strong> — in g. What the balanced equation allows from the limiting reagent</li><li><strong>Expected percent yield</strong> — in %. From a previous batch of the same reaction, or the method&#x27;s reported figure</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Expected actual yield</strong> — in g</li><li><strong>Mass expected to be lost</strong> — in g</li><li><strong>Loss</strong> — in %</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Theoretical yield = 10 g, Expected percent yield = 85 % — and the results panel reads:</p><ul><li><strong>Expected actual yield</strong> = <code>Theoretical yield × Expected percent yield ÷ 100</code> = <strong>8.5 g</strong></li><li><strong>Mass expected to be lost</strong> = <code>Theoretical yield-Theoretical yield × Expected percent yield ÷ 100</code> = <strong>1.5 g</strong></li><li><strong>Loss</strong> = <code>100-Expected percent yield</code> = <strong>15 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>10 × 85 ÷ 100 = 8.5</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Ten grams allowed at 85 % gives 8.5 g expected, with 1.5 g to be lost — and the loss percentage is simply 100 − 85 = 15 %. If you collect 9.4 g, this batch did better than the historical figure.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Treat the answer as a target band, not a promise. Two identical runs on the same day routinely differ by several per cent, so a batch inside a few points of this figure is on plan.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Expected actual yield</th><th>Mass expected to be lost</th><th>Loss</th></tr></thead><tbody><tr><td><strong>Theoretical yield</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Expected percent yield</strong> +10 %</td><td>+10 %</td><td>−56.67 %</td><td>−56.67 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Expected percent yield</strong>: a ten per cent move there shifts the result by about 56.7 per cent. The least sensitive is <strong>Theoretical yield</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Theoretical yield = 25, Expected percent yield = 72, the page reports <strong>Expected actual yield</strong> = 18 g, <strong>Mass expected to be lost</strong> = 7 g, <strong>Loss</strong> = 28 %. 25 g at 72 % plans for 18 g, with 7 g written off to purification.</li><li>With Theoretical yield = 4, Expected percent yield = 95, the page reports <strong>Expected actual yield</strong> = 3.8 g, <strong>Mass expected to be lost</strong> = 0.2 g, <strong>Loss</strong> = 5 %. A small scale-up: 3.8 g expected, which is close enough to four grams that the drying step decides it.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using someone else's yield as your own.</strong> Literature yields are optimised and often on a larger scale; a first run at 85 % of them is normal.</li><li><strong>Applying the percentage to the reagent mass.</strong> The percentage applies to the product's theoretical mass, not to what you weighed out.</li><li><strong>Percent yield above 100 carried forward.</strong> It propagates the error into every planned batch that follows.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Expected actual yield (g), Mass expected to be lost (g), Loss (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The percent carries no unit and the two masses share one, so grams in gives grams out. A yield quoted as a fraction — 0.85 — has to be multiplied by a hundred before it is entered here.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need theoretical yield and expected percent yield. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Expected actual yield and mass expected to be lost and loss should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Theoretical yield</strong> ×10</td><td>8.5</td><td>85</td><td>ten times larger</td></tr><tr><td><strong>Expected percent yield</strong> ×10</td><td>8.5</td><td>85</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It is a forecast.</strong> Nothing about a planned yield can account for a reaction that behaves differently on the day.</li><li><strong>It assumes the same conditions.</strong> Scale, stirring and drying change yields, so the figure drifts as the batch size grows.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting the expected mass for a batch record.</li></li><li><li>Deciding how much starting material to buy for a target mass of product.</li></li><li><li>Spotting a run that underperformed before purification is complete.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/percent-yield">Percent yield</a> <a href="/chemistry/theoretical-yield">Theoretical yield</a> <a href="/chemistry/mole">Mole</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Actual Yield calculator work out?', 'a' => <<<'TXT'
            It returns expected actual yield and mass expected to be lost and loss from theoretical yield and expected percent yield. The relationship is Theoretical yield × Expected percent yield ÷ 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Theoretical yield (g), Expected percent yield (%). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: theoretical yield in g; expected percent yield in %. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Should I use the literature yield or my own?', 'a' => <<<'TXT'
            Your own, once you have one. Literature yields are the best available optimism; a yield from your own last batch is the truth about your hands and your equipment.
            TXT],
            ['q' => 'Does the loss percentage have to be 100 minus the yield?', 'a' => 'Yes, on a mass basis. If 15 % of the theoretical mass is not collected, 15 % is the loss — though part of it may still be recoverable from the mother liquor.'],
        ],
        'related' => [
            ['path' => '/chemistry/percent-yield', 'name' => 'Percent yield'],
            ['path' => '/chemistry/theoretical-yield', 'name' => 'Theoretical yield'],
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
