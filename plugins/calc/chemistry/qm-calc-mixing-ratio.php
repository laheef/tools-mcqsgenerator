<?php

/**
 * Mixing Ratio Calculator
 * /chemistry/mixing-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mixing Ratio Calculator',
    'meta' => ['title' => 'Mixing Ratio Calculator: Parts of A and B by Volume', 'description' => 'Turn a ratio such as 1:3 into the volumes of each component that a given batch needs, with the share each part takes in the finished mixture by volume.', 'h1' => 'Mixing Ratio Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'part_a',
                    'label' => 'Parts of component A',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'The first number of the ratio',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'part_b',
                    'label' => 'Parts of component B',
                    'type' => 'number',
                    'default' => '3',
                    'help' => 'The second number of the ratio',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'total_volume',
                    'label' => 'Total volume needed',
                    'type' => 'number',
                    'suffix' => 'L',
                    'default' => '1',
                    'help' => 'The batch size, in litres',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_a',
                    'label' => 'Volume of component A',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mL',
                ],
                [
                    'name' => 'volume_b',
                    'label' => 'Volume of component B',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mL',
                ],
                [
                    'name' => 'share_a',
                    'label' => 'Share of component A',
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
            'title' => 'Mixing Ratio',
            'results' => [
                'volume_a' => 'total_volume*part_a/(part_a+part_b)*1000',
                'volume_b' => 'total_volume*part_b/(part_a+part_b)*1000',
                'share_a' => 'part_a/(part_a+part_b)*100',
                'total_volume' => 'volume_a/(part_a/(part_a+part_b)*1000)',
                'part_a' => 'share_a*part_b/(100-share_a)',
                'part_b' => 'part_a*(100-share_a)/share_a',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A mixing ratio of A:B means A parts of one component for every B parts of the other. For a batch of total volume V, <strong>V<sub>A</sub> = V × A ÷ (A + B)</strong>, and the second component takes the rest. The page reports both volumes and each one's share.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Ratios are how two-part epoxy, concrete mixes, nutrient solutions and paint thinners are specified. The arithmetic is a proportion, but the parts are not percentages, and treating 1:3 as 33 % and 67 % is where batches go wrong.</p><p>The page reports <strong>volume of component A and volume of component B and share of component A</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume of component A</strong></td><td><code>Total volume needed × Parts of component A ÷ (Parts of component A+Parts of component B) × 1000</code></td></tr><tr><td><strong>Volume of component B</strong></td><td><code>Total volume needed × Parts of component B ÷ (Parts of component A+Parts of component B) × 1000</code></td></tr><tr><td><strong>Share of component A</strong></td><td><code>Parts of component A ÷ (Parts of component A+Parts of component B) × 100</code></td></tr><tr><td><strong>Total volume needed</strong></td><td><code>Volume of component A ÷ (Parts of component A ÷ (Parts of component A+Parts of component B) × 1000)</code></td></tr><tr><td><strong>Parts of component A</strong></td><td><code>Share of component A × Parts of component B ÷ (100-Share of component A)</code></td></tr><tr><td><strong>Parts of component B</strong></td><td><code>Parts of component A × (100-Share of component A) ÷ Share of component A</code></td></tr></tbody></table><p><p>The denominator is the sum of the parts, not the total of a hundred. A 1:3 ratio is four parts in all, so A is a quarter of the volume — 25 %, not 33 %.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports volume of component A and volume of component B and share of component A.</p><ul><li><strong>Parts of component A</strong>. The first number of the ratio</li><li><strong>Parts of component B</strong>. The second number of the ratio</li><li><strong>Total volume needed</strong> — in L. The batch size, in litres</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume of component A</strong> — in mL</li><li><strong>Volume of component B</strong> — in mL</li><li><strong>Share of component A</strong> — in %</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Parts of component A = 1, Parts of component B = 3, Total volume needed = 1 L — and the results panel reads:</p><ul><li><strong>Volume of component A</strong> = <code>Total volume needed × Parts of component A ÷ (Parts of component A+Parts of component B) × 1000</code> = <strong>250 mL</strong></li><li><strong>Volume of component B</strong> = <code>Total volume needed × Parts of component B ÷ (Parts of component A+Parts of component B) × 1000</code> = <strong>750 mL</strong></li><li><strong>Share of component A</strong> = <code>Parts of component A ÷ (Parts of component A+Parts of component B) × 100</code> = <strong>25 %</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 × 1 ÷ (1+3) × 1000 = 250</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A litre at 1:3 takes 250 mL of A and 750 mL of B. The ratio is not a percentage split: four parts in total, one of them A.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the answer against the ratio: B should be three times A for 1:3, and the two volumes should add to the batch size. If they do not, a unit slipped between litres and millilitres.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume of component A</th><th>Volume of component B</th><th>Share of component A</th></tr></thead><tbody><tr><td><strong>Parts of component A</strong> +10 %</td><td>+7.32 %</td><td>−2.44 %</td><td>+7.32 %</td></tr><tr><td><strong>Parts of component B</strong> +10 %</td><td>−6.98 %</td><td>+2.33 %</td><td>−6.98 %</td></tr><tr><td><strong>Total volume needed</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Total volume needed</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Parts of component B</strong>, at 7 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Parts of component A = 1, Parts of component B = 1, Total volume needed = 5, the page reports <strong>Volume of component A</strong> = 2 500 mL, <strong>Volume of component B</strong> = 2 500 mL, <strong>Share of component A</strong> = 50 %. A 1:1 mix of five litres is 2.5 L each — the case where a ratio does match a percentage split.</li><li>With Parts of component A = 2, Parts of component B = 3, Total volume needed = 0.5, the page reports <strong>Volume of component A</strong> = 200 mL, <strong>Volume of component B</strong> = 300 mL, <strong>Share of component A</strong> = 40 %. Half a litre at 2:3 is 200 mL and 300 mL, five parts of a hundred millilitres.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The ratio read as percentages.</strong> 1:3 is 25 % and 75 %; adding the two ratio numbers and calling them percentages gives 1 % and 3 %.</li><li><strong>Mixing by mass when the ratio is by volume.</strong> Resins, diluents and solvents often have densities near 1 but not equal to it, and the mistake shows up only when the batch will not cure.</li><li><strong>Shrinkage on mixing.</strong> Solvent plus water, or resin plus hardener, can end up smaller than the sum; make up to the mark rather than trusting addition.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume of component A (mL), Volume of component B (mL), Share of component A (%).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Enter the batch in litres and both component volumes come back in millilitres. The share is a percentage of volume, and the parts themselves are plain numbers with no units at all.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need parts of component A and parts of component B and total volume needed. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Volume of component a and volume of component b and share of component a should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Parts of component A</strong> ×10</td><td>250</td><td>769.231</td><td>×3.077</td></tr><tr><td><strong>Parts of component B</strong> ×10</td><td>250</td><td>32.258</td><td>×0.129</td></tr><tr><td><strong>Total volume needed</strong> ×10</td><td>250</td><td>2 500</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Two components only.</strong> A three-part ratio needs the same proportion split across three denominators.</li><li><strong>It assumes volumes are additive.</strong> That is very good for most liquids and poor for concentrated alcohol solutions.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Mixing two-part resins and adhesives to the maker's ratio.</li></li><li><li>Making up a nutrient or developer solution from a stock ratio.</li></li><li><li>Scaling a 1:3 recipe to a batch size you actually need.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/alligation">Alligation</a> <a href="/chemistry/dilution-factor">Dilution factor</a> <a href="/chemistry/solution-dilution">Solution dilution</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mixing Ratio calculator work out?', 'a' => <<<'TXT'
            It returns volume of component A and volume of component B and share of component A from parts of component A and parts of component B and total volume needed. The relationship is Total volume needed × Parts of component A ÷ (Parts of component A+Parts of component B) × 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Parts of component A, Parts of component B, Total volume needed (L). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: total volume needed in L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is a 1:3 ratio the same as 1 part in 3?', 'a' => 'No. 1:3 means one part plus three parts, four in total, so the first component is a quarter of the mix. One part in three would be a third.'],
            ['q' => 'How do I scale a ratio to a different batch size?', 'a' => 'Find the total parts, divide the batch volume by that number to get one part\'s volume, then multiply by each ratio number. This page does exactly that.'],
        ],
        'related' => [
            ['path' => '/chemistry/alligation', 'name' => 'Alligation'],
            ['path' => '/chemistry/dilution-factor', 'name' => 'Dilution factor'],
            ['path' => '/chemistry/solution-dilution', 'name' => 'Solution dilution'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
