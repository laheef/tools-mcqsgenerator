<?php

/**
 * Miller Indices Calculator
 * /chemistry/miller-indices
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Miller Indices Calculator',
    'meta' => ['title' => 'Miller Indices Calculator: d-Spacing and 2θ', 'description' => 'For a cubic crystal, turn Miller indices and a lattice parameter into a d-spacing and a diffraction angle, in one step and in the units crystallography uses.', 'h1' => 'Miller Indices Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'lattice_parameter',
                    'label' => 'Lattice parameter a',
                    'type' => 'number',
                    'suffix' => 'Å',
                    'default' => '4.05',
                    'help' => 'Aluminium is 4.05 Å',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h',
                    'label' => 'Miller index h',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'The first index, a whole number',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'k',
                    'label' => 'Miller index k',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'The second index',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'l',
                    'label' => 'Miller index l',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'The third index',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wavelength',
                    'label' => 'X-ray wavelength',
                    'type' => 'number',
                    'suffix' => 'Å',
                    'default' => '1.5406',
                    'help' => 'Copper Kα is 1.5406 Å',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'd_spacing',
                    'label' => 'd-spacing',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Å',
                ],
                [
                    'name' => 'two_theta',
                    'label' => 'Diffraction angle 2θ',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '°',
                ],
                [
                    'name' => 'index_sum',
                    'label' => '√(h² + k² + l²)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Miller Indices',
            'results' => [
                'd_spacing' => 'lattice_parameter/sqrt(pow(h,2)+pow(k,2)+pow(l,2))',
                'two_theta' => '2*asin(min(1,wavelength/(2*lattice_parameter/sqrt(pow(h,2)+pow(k,2)+pow(l,2)))))*180/pi',
                'index_sum' => 'sqrt(pow(h,2)+pow(k,2)+pow(l,2))',
                'lattice_parameter' => 'd_spacing*sqrt(pow(h,2)+pow(k,2)+pow(l,2))',
                'wavelength' => '2*lattice_parameter/sqrt(pow(h,2)+pow(k,2)+pow(l,2))*sin(pi*two_theta/360)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>In a cubic crystal the spacing of a set of planes follows directly from the lattice parameter: <strong>d = a ÷ √(h² + k² + l²)</strong>. Bragg's law then gives the angle at which those planes diffract: <strong>2θ = 2·arcsin(λ ÷ 2d)</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Every X-ray diffraction pattern is read through these two equations. The angles a powder diffractometer measures become d-spacings, the d-spacings become the indices, and the indices become the lattice — which is how a crystal structure is solved.</p><p>The page reports <strong>d-spacing and diffraction angle 2θ and √(h² + k² + l²)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>d-spacing</strong></td><td><code>Lattice parameter a ÷ √((Miller index h)^2+(Miller index k)^2+(Miller index l)^2)</code></td></tr><tr><td><strong>Diffraction angle 2θ</strong></td><td><code>2 × asin(min(1,X-ray wavelength ÷ (2 × Lattice parameter a ÷ √((Miller index h)^2+(Miller index k)^2+(Miller index l)^2)))) × 180 ÷ pi</code></td></tr><tr><td><strong>√(h² + k² + l²)</strong></td><td><code>√((Miller index h)^2+(Miller index k)^2+(Miller index l)^2)</code></td></tr><tr><td><strong>Lattice parameter a</strong></td><td><code>d-spacing × √((Miller index h)^2+(Miller index k)^2+(Miller index l)^2)</code></td></tr><tr><td><strong>X-ray wavelength</strong></td><td><code>2 × Lattice parameter a ÷ √((Miller index h)^2+(Miller index k)^2+(Miller index l)^2) × sin(pi × Diffraction angle 2θ ÷ 360)</code></td></tr></tbody></table><p><p>The square root of the sum of squares is the reciprocal of the interplanar spacing in units of a. It grows as the indices grow, so higher indices give smaller spacings and larger angles.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports d-spacing and diffraction angle 2θ and √(h² + k² + l²).</p><ul><li><strong>Lattice parameter a</strong> — in Å. Aluminium is 4.05 Å</li><li><strong>Miller index h</strong>. The first index, a whole number</li><li><strong>Miller index k</strong>. The second index</li><li><strong>Miller index l</strong>. The third index</li><li><strong>X-ray wavelength</strong> — in Å. Copper Kα is 1.5406 Å</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>d-spacing</strong> — in Å</li><li><strong>Diffraction angle 2θ</strong> — in °</li><li><strong>√(h² + k² + l²)</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Lattice parameter a = 4.05 Å, Miller index h = 1, Miller index k = 1, Miller index l = 1, X-ray wavelength = 1.541 Å — and the results panel reads:</p><ul><li><strong>d-spacing</strong> = <code>Lattice parameter a ÷ √((Miller index h)^2+(Miller index k)^2+(Miller index l)^2)</code> = <strong>2.338 Å</strong></li><li><strong>Diffraction angle 2θ</strong> = <code>2 × asin(min(1,X-ray wavelength ÷ (2 × Lattice parameter a ÷ √((Miller index h)^2+(Miller index k)^2+(Miller index l)^2)))) × 180 ÷ pi</code> = <strong>38.469 °</strong></li><li><strong>√(h² + k² + l²)</strong> = <code>√((Miller index h)^2+(Miller index k)^2+(Miller index l)^2)</code> = <strong>1.732</strong></li></ul><p>With the numbers written into the formula, the first result is <code>4.05 ÷ sqrt(pow(1,2)+pow(1,2)+pow(1,2)) = 2.338</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Aluminium with a = 4.05 Å and the (111) planes: √3 = 1.732, so d = 2.34 Å. With copper Kα at 1.5406 Å the angle is 2 × 19.2 = 38.5° — the first and strongest peak in an aluminium pattern.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>In a cubic system the allowed reflections follow selection rules: face-centred cubic shows only indices that are all odd or all even. That is why the first aluminium peak is (111) and not (100).</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>d-spacing</th><th>Diffraction angle 2θ</th><th>√(h² + k² + l²)</th></tr></thead><tbody><tr><td><strong>Lattice parameter a</strong> +10 %</td><td>+10 %</td><td>−9.4 %</td><td>+0 %</td></tr><tr><td><strong>Miller index h</strong> +10 %</td><td>−3.33 %</td><td>+3.58 %</td><td>+3.44 %</td></tr><tr><td><strong>Miller index k</strong> +10 %</td><td>−3.33 %</td><td>+3.58 %</td><td>+3.44 %</td></tr><tr><td><strong>Miller index l</strong> +10 %</td><td>−3.33 %</td><td>+3.58 %</td><td>+3.44 %</td></tr><tr><td><strong>X-ray wavelength</strong> +10 %</td><td>+0 %</td><td>+10.46 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>X-ray wavelength</strong>: a ten per cent move there shifts the result by about 10.5 per cent. The least sensitive is <strong>Miller index l</strong>, at 3.6 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Lattice parameter a = 4.05, Miller index h = 2, Miller index k = 0, Miller index l = 0, X-ray wavelength = 1.541, the page reports <strong>d-spacing</strong> = 2.025 Å, <strong>Diffraction angle 2θ</strong> = 44.716 °, <strong>√(h² + k² + l²)</strong> = 2. The (200) reflection sits at 44.7° — the second peak, and exactly where √4 = 2 puts it.</li><li>With Lattice parameter a = 3.615, Miller index h = 1, Miller index k = 1, Miller index l = 1, X-ray wavelength = 1.541, the page reports <strong>d-spacing</strong> = 2.087 Å, <strong>Diffraction angle 2θ</strong> = 43.317 °, <strong>√(h² + k² + l²)</strong> = 1.732. Copper's (111): d = 2.087 Å and 2θ = 43.3°, the strongest line in its pattern.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Indices with a common factor not reduced.</strong> (222) is the second order of (111) and appears at a different angle — they are not the same reflection.</li><li><strong>Wavelength in the wrong unit.</strong> Bragg's law needs λ and d in the same unit; mixing nanometres with angstroms moves the angle.</li><li><strong>The non-cubic formula used.</strong> For tetragonal or hexagonal cells the square root has extra terms, and this page would be wrong.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: d-spacing (Å), Diffraction angle 2θ (°), √(h² + k² + l²).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The lattice parameter and the wavelength are both in angstroms, so the d-spacing comes back in angstroms and the angle in degrees. The index sum is dimensionless.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need lattice parameter a and miller index h and miller index k and miller index l and x-ray wavelength. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> D-spacing and diffraction angle 2θ and √(h² + k² + l²) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Lattice parameter a</strong> ×10</td><td>2.338</td><td>23.383</td><td>ten times larger</td></tr><tr><td><strong>Miller index h</strong> ×10</td><td>2.338</td><td>0.401</td><td>×0.171</td></tr><tr><td><strong>Miller index k</strong> ×10</td><td>2.338</td><td>0.401</td><td>×0.171</td></tr><tr><td><strong>Miller index l</strong> ×10</td><td>2.338</td><td>0.401</td><td>×0.171</td></tr><tr><td><strong>X-ray wavelength</strong> ×10</td><td>2.338</td><td>2.338</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Cubic crystals only.</strong> Face-centred, body-centred and primitive cells all work; anything with unequal axes does not.</li><li><strong>It needs the indices.</strong> Indexing an unknown pattern is a separate, harder step.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Predicting where a phase's peaks will fall.</li></li><li><li>Getting a d-spacing for a phase identification search.</li></li><li><li>Checking an indexed pattern for internal consistency.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/cubic-cell">Cubic cell</a> <a href="/chemistry/atomic-mass">Atomic mass</a> <a href="/chemistry/beer-lambert-law">Beer-Lambert law</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Miller Indices calculator work out?', 'a' => <<<'TXT'
            It returns d-spacing and diffraction angle 2θ and √(h² + k² + l²) from lattice parameter a and miller index h and miller index k and miller index l and x-ray wavelength. The relationship is Lattice parameter a ÷ √((Miller index h)^2+(Miller index k)^2+(Miller index l)^2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Lattice parameter a (Å), Miller index h, Miller index k, Miller index l, X-ray wavelength (Å). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: lattice parameter a in Å; x-ray wavelength in Å. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What do the Miller indices mean physically?', 'a' => 'They describe a set of parallel planes by the reciprocals of where the planes cut the three axes. (111) cuts all three axes at one lattice unit.'],
            ['q' => 'Why is there no (100) peak from aluminium?', 'a' => 'Because face-centred cubic lattices cancel it: the face-centring causes the (100) reflection to interfere destructively.'],
        ],
        'related' => [
            ['path' => '/chemistry/cubic-cell', 'name' => 'Cubic cell'],
            ['path' => '/chemistry/atomic-mass', 'name' => 'Atomic mass'],
            ['path' => '/chemistry/beer-lambert-law', 'name' => 'Beer-Lambert law'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
