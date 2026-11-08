<?php

/**
 * Pipe volume
 * /construction/pipe-volume
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pipe volume',
    'meta' => ['title' => 'Pipe Volume Calculator: Gallons and Cubic Feet', 'description' => 'Work out the water a pipe holds in gallons, cubic feet and litres per foot, from its inside diameter and length, for filling and dosing. See the steps.', 'h1' => 'Pipe volume', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'inside_diameter',
                    'label' => 'Inside diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '2',
                    'help' => 'Bore, not nominal pipe size',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Length',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '100',
                    'help' => 'Run of pipe',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume_ft3',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ft³',
                ],
                [
                    'name' => 'gallons',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal',
                ],
                [
                    'name' => 'litres',
                    'label' => 'Volume',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'L',
                ],
                [
                    'name' => 'gallons_per_ft',
                    'label' => 'Per foot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gal/ft',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Pipe volume',
            'results' => [
                'volume_ft3' => 'pi/4*pow(inside_diameter/12,2)*length',
                'gallons' => 'pi/4*pow(inside_diameter/12,2)*length*7.48052',
                'litres' => 'pi/4*pow(inside_diameter/12,2)*length*28.3168',
                'gallons_per_ft' => 'pi/4*pow(inside_diameter/12,2)*7.48052',
                'inside_diameter' => '12*sqrt(4*volume_ft3/(pi*length))',
                'length' => '4*volume_ft3/(pi*pow(inside_diameter/12,2))',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p>A pipe is a cylinder of its inside diameter: <strong>volume = π × (inside ÷ 2)² × length</strong>, and a cubic foot is 7.48 US gallons.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Pipe volume matters when a line has to be filled, dosed or antifrozen: the water sitting in a hundred feet of pipe is a real quantity, and on a large bore it is a surprising one. The per-foot figure is the useful one for a run of any length.</p><p>The page reports <strong>volume (ft³) and volume (gal) and volume (L) and per foot</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume (ft³)</strong></td><td><code>pi ÷ 4 × (Inside diameter ÷ 12)^2 × Length</code></td></tr><tr><td><strong>Volume (gal)</strong></td><td><code>pi ÷ 4 × (Inside diameter ÷ 12)^2 × Length × 7.48052</code></td></tr><tr><td><strong>Volume (L)</strong></td><td><code>pi ÷ 4 × (Inside diameter ÷ 12)^2 × Length × 28.3168</code></td></tr><tr><td><strong>Per foot</strong></td><td><code>pi ÷ 4 × (Inside diameter ÷ 12)^2 × 7.48052</code></td></tr><tr><td><strong>Inside diameter</strong></td><td><code>12 × √(4 × Volume (ft³) ÷ (pi × Length))</code></td></tr><tr><td><strong>Length</strong></td><td><code>4 × Volume (ft³) ÷ (pi × (Inside diameter ÷ 12)^2)</code></td></tr></tbody></table><p><p>The bore is squared, so doubling the diameter quadruples the volume — a 4 in pipe holds four times what a 2 in does. Nominal pipe size is not the bore: a 2 in steel pipe has an inside diameter near two inches, and a 2 in copper one is smaller again.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports volume (ft³) and volume (gal) and volume (L) and per foot.</p><ul><li><strong>Inside diameter</strong> — in in. Bore, not nominal pipe size</li><li><strong>Length</strong> — in ft. Run of pipe</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume</strong> — in ft³</li><li><strong>Volume</strong> — in gal</li><li><strong>Volume</strong> — in L</li><li><strong>Per foot</strong> — in gal/ft</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Inside diameter = 2 in, Length = 100 ft — and the results panel reads:</p><ul><li><strong>Volume</strong> = <code>pi ÷ 4 × (Inside diameter ÷ 12)^2 × Length</code> = <strong>2.182 ft³</strong></li><li><strong>Volume</strong> = <code>pi ÷ 4 × (Inside diameter ÷ 12)^2 × Length × 7.48052</code> = <strong>16.32 gal</strong></li><li><strong>Volume</strong> = <code>pi ÷ 4 × (Inside diameter ÷ 12)^2 × Length × 28.3168</code> = <strong>61.778 L</strong></li><li><strong>Per foot</strong> = <code>pi ÷ 4 × (Inside diameter ÷ 12)^2 × 7.48052</code> = <strong>0.163 gal/ft</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pi ÷ 4 × pow(2 ÷ 12,2) × 100 = 2.182</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A hundred feet of 2 in bore holds 2.182 ft³, which is 16.32 US gallons or 61.778 litres. Each foot of that pipe holds 0.163 gal/ft, which is the number to remember on site.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the per-foot figure against the bore: 2 in gives about a fifth of a gallon a foot, 4 in about four fifths, and 6 in nearly two. If the figure is far adrift, the diameter has been entered as the outside rather than the bore.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume</th><th>Volume</th><th>Volume</th><th>Per foot</th></tr></thead><tbody><tr><td><strong>Inside diameter</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td><td>+21 %</td></tr><tr><td><strong>Length</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Inside diameter</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Length</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Inside diameter = 4, Length = 50, the page reports <strong>Volume</strong> = 4.363 ft³, <strong>Volume</strong> = 32.64 gal, <strong>Volume</strong> = 123.555 L, <strong>Per foot</strong> = 0.653 gal/ft. A larger bore over a shorter run: the diameter squared more than makes up for the length.</li><li>With Inside diameter = 0.75, Length = 200, the page reports <strong>Volume</strong> = 0.614 ft³, <strong>Volume</strong> = 4.59 gal, <strong>Volume</strong> = 17.375 L, <strong>Per foot</strong> = 0.023 gal/ft. A long, small-bore supply line — barely any water, but enough to freeze.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Nominal size used as bore.</strong> Look up the actual inside diameter.</li><li><strong>Outside diameter entered.</strong> It overstates the volume.</li><li><strong>Volume of a whole system assumed.</strong> Add the fittings and the cylinder.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume (ft³), Volume (gal), Volume (L), Per foot (gal/ft).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Inside diameter in inches, length in feet, volume in cubic feet, US gallons and litres, with gallons per foot for a run of any length.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need inside diameter and length. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Volume (ft³) and volume (gal) and volume (l) and per foot should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Inside diameter</strong> ×10</td><td>2.182</td><td>218.166</td><td>×100</td></tr><tr><td><strong>Length</strong> ×10</td><td>2.182</td><td>21.817</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A clean cylinder.</strong> Scale and fittings reduce the working volume.</li><li><strong>Water only.</strong> Other fluids are the same volume at different weights.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Working out how much antifreeze a line needs.</li></li><li><li>Sizing a dose for a pipe run.</li></li><li><li>Estimating a flush volume.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/pipe-weight">Pipe weight</a> <a href="/construction/tank-volume">Tank volume</a> <a href="/construction/hole-volume">Hole volume</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pipe volume calculator work out?', 'a' => <<<'TXT'
            It returns volume (ft³) and volume (gal) and volume (L) and per foot from inside diameter and length. The relationship is pi ÷ 4 × (Inside diameter ÷ 12)^2 × Length.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Inside diameter (in), Length (ft). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: inside diameter in in; length in ft. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How many gallons in 100 feet of 2 inch pipe?', 'a' => 'About 16.3 US gallons at a 2 in bore.'],
            ['q' => 'Does pipe volume depend on the wall thickness?', 'a' => 'Only through the bore: a thicker wall means a smaller inside diameter.'],
        ],
        'related' => [
            ['path' => '/construction/pipe-weight', 'name' => 'Pipe weight'],
            ['path' => '/construction/tank-volume', 'name' => 'Tank volume'],
            ['path' => '/construction/hole-volume', 'name' => 'Hole volume'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
