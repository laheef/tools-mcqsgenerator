<?php

/**
 * Door header size
 * /construction/door-header-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Door header size',
    'meta' => ['title' => 'Door Header Calculator: Depth for the Opening', 'description' => 'Work out the header depth a door or window opening needs from the load above it, the clear span, the species and the header thickness. and the stock depth.', 'h1' => 'Door header size', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'opening',
                    'label' => 'Opening width',
                    'type' => 'number',
                    'suffix' => 'ft',
                    'default' => '4',
                    'help' => 'Clear span the header carries',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'load',
                    'label' => 'Load above',
                    'type' => 'number',
                    'suffix' => 'lb/ft',
                    'default' => '300',
                    'help' => 'Wall, floor or roof load per foot of header',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fb',
                    'label' => 'Allowable bending stress',
                    'type' => 'number',
                    'suffix' => 'psi',
                    'default' => '1000',
                    'help' => 'Fb for the species and grade',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'width',
                    'label' => 'Header thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '3.5',
                    'help' => 'A single 2 × is 1½, a double 2 × is 3',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'moment',
                    'label' => 'Bending moment',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'lb·in',
                ],
                [
                    'name' => 's_required',
                    'label' => 'Section modulus required',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in³',
                ],
                [
                    'name' => 'depth_required',
                    'label' => 'Depth required',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'depth_nominal',
                    'label' => 'Depth, rounded up to stock',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Door header size',
            'results' => [
                'moment' => 'load*pow(opening,2)/8*12',
                's_required' => 'load*pow(opening,2)/8*12/fb',
                'depth_required' => 'sqrt(6*load*pow(opening,2)/8*12/fb/width)',
                'depth_nominal' => 'ceil(sqrt(6*load*pow(opening,2)/8*12/fb/width)/2)*2',
                'opening' => 'sqrt(moment*8/(load*12))',
                'load' => 'moment*8/pow(opening,2)/12',
                'fb' => 'moment/s_required',
                'width' => '6*moment/fb/pow(depth_required,2)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A header is a beam over an opening: <strong>M = w × L² ÷ 8</strong>, the section modulus is <strong>S = M ÷ Fb</strong>, and the depth follows from <strong>S = b × d² ÷ 6</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A door or window takes a piece out of a bearing wall, and the header puts it back. Header tables give sizes for the usual cases, but they assume a load and a species — and a heavy roof or an engineered floor changes both. This is the same arithmetic the table was built from.</p><p>The page reports <strong>bending moment and section modulus required and depth required and depth, rounded up to stock</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Bending moment</strong></td><td><code>Load above × (Opening width)^2 ÷ 8 × 12</code></td></tr><tr><td><strong>Section modulus required</strong></td><td><code>Load above × (Opening width)^2 ÷ 8 × 12 ÷ Allowable bending stress</code></td></tr><tr><td><strong>Depth required</strong></td><td><code>√(6 × Load above × (Opening width)^2 ÷ 8 × 12 ÷ Allowable bending stress ÷ Header thickness)</code></td></tr><tr><td><strong>Depth, rounded up to stock</strong></td><td><code>ceil(√(6 × Load above × (Opening width)^2 ÷ 8 × 12 ÷ Allowable bending stress ÷ Header thickness) ÷ 2) × 2</code></td></tr><tr><td><strong>Opening width</strong></td><td><code>√(Bending moment × 8 ÷ (Load above × 12))</code></td></tr><tr><td><strong>Load above</strong></td><td><code>Bending moment × 8 ÷ (Opening width)^2 ÷ 12</code></td></tr><tr><td><strong>Allowable bending stress</strong></td><td><code>Bending moment ÷ Section modulus required</code></td></tr><tr><td><strong>Header thickness</strong></td><td><code>6 × Bending moment ÷ Allowable bending stress ÷ (Depth required)^2</code></td></tr></tbody></table><p><p>The moment at midspan of a uniformly loaded simple beam is wL²/8 in pound-feet, multiplied by twelve to work in pound-inches. Dividing by the allowable stress gives the section modulus, and the depth comes back out of the rectangle's formula with the header's thickness held.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs. It reports bending moment and section modulus required and depth required and depth, rounded up to stock.</p><ul><li><strong>Opening width</strong> — in ft. Clear span the header carries</li><li><strong>Load above</strong> — in lb/ft. Wall, floor or roof load per foot of header</li><li><strong>Allowable bending stress</strong> — in psi. Fb for the species and grade</li><li><strong>Header thickness</strong> — in in. A single 2 × is 1½, a double 2 × is 3</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Bending moment</strong> — in lb·in</li><li><strong>Section modulus required</strong> — in in³</li><li><strong>Depth required</strong> — in in</li><li><strong>Depth, rounded up to stock</strong> — in in</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Opening width = 4 ft, Load above = 300 lb/ft, Allowable bending stress = 1 000 psi, Header thickness = 3.5 in — and the results panel reads:</p><ul><li><strong>Bending moment</strong> = <code>Load above × (Opening width)^2 ÷ 8 × 12</code> = <strong>7 200 lb·in</strong></li><li><strong>Section modulus required</strong> = <code>Load above × (Opening width)^2 ÷ 8 × 12 ÷ Allowable bending stress</code> = <strong>7.2 in³</strong></li><li><strong>Depth required</strong> = <code>√(6 × Load above × (Opening width)^2 ÷ 8 × 12 ÷ Allowable bending stress ÷ Header thickness)</code> = <strong>3.513 in</strong></li><li><strong>Depth, rounded up to stock</strong> = <code>ceil(√(6 × Load above × (Opening width)^2 ÷ 8 × 12 ÷ Allowable bending stress ÷ Header thickness) ÷ 2) × 2</code> = <strong>4 in</strong></li></ul><p>With the numbers written into the formula, the first result is <code>300 × pow(4,2) ÷ 8 × 12 = 7 200</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 4 ft opening carrying 300 lb/ft in a 1000 psi species: the moment is 7 200 lb·in, so the header needs 7.2 in³ of section. In a double 2 × (3 in thick) that is a depth of 3.5 in — a 2 × 4 header passes, and a 2 × 6 is used in practice for stiffness.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the required depth against the stock sizes: it is usually strength that gives a small number, and deflection that pushes the size up by a couple of inches. A header that only just passes the bending check will feel springy over a door.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Bending moment</th><th>Section modulus required</th><th>Depth required</th><th>Depth, rounded up to stock</th></tr></thead><tbody><tr><td><strong>Opening width</strong> +10 %</td><td>+21 %</td><td>+21 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Load above</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+4.88 %</td><td>+0 %</td></tr><tr><td><strong>Allowable bending stress</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>−4.65 %</td><td>+0 %</td></tr><tr><td><strong>Header thickness</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−4.65 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Opening width</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Header thickness</strong>, at 4.7 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Opening width = 8, Load above = 400, Allowable bending stress = 1 000, Header thickness = 3, the page reports <strong>Bending moment</strong> = 38 400 lb·in, <strong>Section modulus required</strong> = 38.4 in³, <strong>Depth required</strong> = 8.764 in, <strong>Depth, rounded up to stock</strong> = 10 in. A wide opening under a heavy load: the span squared makes this the case that needs a deep header.</li><li>With Opening width = 3, Load above = 250, Allowable bending stress = 1 200, Header thickness = 1.5, the page reports <strong>Bending moment</strong> = 3 375 lb·in, <strong>Section modulus required</strong> = 2.812 in³, <strong>Depth required</strong> = 3.354 in, <strong>Depth, rounded up to stock</strong> = 4 in. A doorway in an interior wall — the case the tables cover with a single 2 × 6.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Deflection ignored.</strong> Headers over wide openings are usually governed by sag, not strength.</li><li><strong>Load guessed.</strong> A roof-bearing wall carries far more than an internal partition.</li><li><strong>Double 2 × counted as 3½ thick.</strong> Two 1½ in members make 3 in, and the thickness is what the depth is solved against.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Bending moment (lb·in), Section modulus required (in³), Depth required (in), Depth, rounded up to stock (in).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Opening in feet, load in pounds per foot, stress in psi, thickness in inches, the moment in pound-inches and depths in inches.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need opening width and load above and allowable bending stress and header thickness. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Bending moment and section modulus required and depth required and depth, rounded up to stock should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Opening width</strong> ×10</td><td>7 200</td><td>720 000</td><td>×100</td></tr><tr><td><strong>Load above</strong> ×10</td><td>7 200</td><td>72 000</td><td>ten times larger</td></tr><tr><td><strong>Allowable bending stress</strong> ×10</td><td>7 200</td><td>7 200</td><td>unchanged</td></tr><tr><td><strong>Header thickness</strong> ×10</td><td>7 200</td><td>7 200</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Bending only.</strong> Bearing, shear and deflection are separate checks.</li><li><strong>One span.</strong> A header carrying two openings is a different problem.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing a header over a garage door.</li></li><li><li>Checking a table entry against your load.</li></li><li><li>Seeing why deflection governs wide openings.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/wood-beam-span">Wood beam span</a> <a href="/construction/beam-load">Beam load</a> <a href="/construction/framing">Framing</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Door header size calculator work out?', 'a' => <<<'TXT'
            It returns bending moment and section modulus required and depth required and depth, rounded up to stock from opening width and load above and allowable bending stress and header thickness. The relationship is Load above × (Opening width)^2 ÷ 8 × 12.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Opening width (ft), Load above (lb/ft), Allowable bending stress (psi), Header thickness (in). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: opening width in ft; load above in lb/ft; allowable bending stress in psi; header thickness in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What size header for a 4 ft opening?', 'a' => 'A 2 × 4 passes the bending check under a light load; a 2 × 6 is used in practice for stiffness.'],
            ['q' => 'Do double headers carry twice as much?', 'a' => 'Yes — doubling the thickness doubles the section modulus, so it doubles the capacity.'],
        ],
        'related' => [
            ['path' => '/construction/wood-beam-span', 'name' => 'Wood beam span'],
            ['path' => '/construction/beam-load', 'name' => 'Beam load'],
            ['path' => '/construction/framing', 'name' => 'Framing'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
