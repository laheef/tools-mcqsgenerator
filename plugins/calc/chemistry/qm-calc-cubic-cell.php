<?php

/**
 * Cubic Cell Calculator
 * /chemistry/cubic-cell
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cubic Cell Calculator',
    'meta' => ['title' => 'Cubic Cell Calculator: Density From Unit Cell', 'description' => 'Compute a crystal\'s density from its unit cell — the atoms the cell holds, the element\'s molar mass, and the cube\'s edge in angstroms, converted to g/cm³.', 'h1' => 'Cubic Cell Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'atoms_per_cell',
                    'label' => 'Atoms per unit cell',
                    'type' => 'number',
                    'default' => '4',
                    'help' => 'Four for face-centred cubic, two for body-centred, one for simple cubic',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'molar_mass',
                    'label' => 'Molar mass of the element',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '63.546',
                    'help' => 'Copper is 63.546',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'edge_length',
                    'label' => 'Unit cell edge length',
                    'type' => 'number',
                    'suffix' => 'Å',
                    'default' => '3.615',
                    'help' => 'From X-ray diffraction; copper\'s cell is 3.615 Å on each side',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cell_volume',
                    'label' => 'Volume of one unit cell',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm³',
                ],
                [
                    'name' => 'density',
                    'label' => 'Density',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/cm³',
                ],
                [
                    'name' => 'mass_per_cell',
                    'label' => 'Mass of one unit cell',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Cubic Cell',
            'results' => [
                'cell_volume' => 'pow(edge_length*0.00000001,3)',
                'density' => 'atoms_per_cell*molar_mass/(6.02214076*100000000000000000000000*pow(edge_length*0.00000001,3))',
                'mass_per_cell' => 'atoms_per_cell*molar_mass/6.02214076/100000000000000000000000',
                'atoms_per_cell' => 'density*6.02214076*100000000000000000000000*pow(edge_length*0.00000001,3)/molar_mass',
                'molar_mass' => 'density*6.02214076*100000000000000000000000*pow(edge_length*0.00000001,3)/atoms_per_cell',
                'edge_length' => 'pow(atoms_per_cell*molar_mass/(density*6.02214076*100000000000000000000000),1/3)/0.00000001',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Density follows from the cell: <strong>ρ = n × M ÷ (N<sub>A</sub> × a³)</strong>, where n is the number of atoms per unit cell and a is the edge length. The cell volume comes out in cubic centimetres, so angstroms convert cleanly into grams per cubic centimetre.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Density measured on a balance and density calculated from a cell should agree. When they do, the crystal structure is confirmed; when they do not, the packing is different from the one assumed — which is how body-centred and face-centred cells are told apart.</p><p>The page reports <strong>volume of one unit cell and density and mass of one unit cell</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume of one unit cell</strong></td><td><code>(Unit cell edge length × 0.00000001)^3</code></td></tr><tr><td><strong>Density</strong></td><td><code>Atoms per unit cell × Molar mass of the element ÷ (6.02214076 × 1 × 10<sup>23< ÷ sup> × (Unit cell edge length × 0.00000001)^3)</code></td></tr><tr><td><strong>Mass of one unit cell</strong></td><td><code>Atoms per unit cell × Molar mass of the element ÷ 6.02214076 ÷ 1 × 10<sup>23< ÷ sup></code></td></tr><tr><td><strong>Atoms per unit cell</strong></td><td><code>Density × 6.02214076 × 1 × 10<sup>23< ÷ sup> × (Unit cell edge length × 0.00000001)^3 ÷ Molar mass of the element</code></td></tr><tr><td><strong>Molar mass of the element</strong></td><td><code>Density × 6.02214076 × 1 × 10<sup>23< ÷ sup> × (Unit cell edge length × 0.00000001)^3 ÷ Atoms per unit cell</code></td></tr><tr><td><strong>Unit cell edge length</strong></td><td><code>(Atoms per unit cell × Molar mass of the element ÷ (Density × 6.02214076 × 1 × 10<sup>23< ÷ sup>))^1 ÷ 3 ÷ 0.00000001</code></td></tr></tbody></table><p><p>The number of atoms per cell counts fractions: a corner atom is shared by eight cells and contributes one eighth, a face atom one half, a body-centre atom one whole. Face-centred cubic works out to four whole atoms per cell.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports volume of one unit cell and density and mass of one unit cell.</p><ul><li><strong>Atoms per unit cell</strong>. Four for face-centred cubic, two for body-centred, one for simple cubic</li><li><strong>Molar mass of the element</strong> — in g/mol. Copper is 63.546</li><li><strong>Unit cell edge length</strong> — in Å. From X-ray diffraction; copper&#x27;s cell is 3.615 Å on each side</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume of one unit cell</strong> — in cm³</li><li><strong>Density</strong> — in g/cm³</li><li><strong>Mass of one unit cell</strong> — in g</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Atoms per unit cell = 4, Molar mass of the element = 63.546 g/mol, Unit cell edge length = 3.615 Å — and the results panel reads:</p><ul><li><strong>Volume of one unit cell</strong> = <code>(Unit cell edge length × 0.00000001)^3</code> = <strong>4.724 × 10<sup>-23</sup> cm³</strong></li><li><strong>Density</strong> = <code>Atoms per unit cell × Molar mass of the element ÷ (6.02214076 × 1 × 10<sup>23< ÷ sup> × (Unit cell edge length × 0.00000001)^3)</code> = <strong>8.935 g/cm³</strong></li><li><strong>Mass of one unit cell</strong> = <code>Atoms per unit cell × Molar mass of the element ÷ 6.02214076 ÷ 1 × 10<sup>23< ÷ sup></code> = <strong>4.221 × 10<sup>-22</sup> g</strong></li></ul><p>With the numbers written into the formula, the first result is <code>pow(3.615 × 0.00000001,3) = 4.724 × 10<sup>-23</sup></code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Copper is face-centred cubic: four atoms, 63.546 g/mol, and a 3.615 Å edge. The cell volume is 4.72 × 10⁻²³ cm³ and the density works out at 8.93 g/cm³, which is what a piece of copper weighs.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>A calculated density well above the measured one means too many atoms were counted per cell; below it means too few. The ratio between the two is the quickest guide to whether the cell is primitive, body-centred or face-centred.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume of one unit cell</th><th>Density</th><th>Mass of one unit cell</th></tr></thead><tbody><tr><td><strong>Atoms per unit cell</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Molar mass of the element</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Unit cell edge length</strong> +10 %</td><td>+33.1 %</td><td>−24.87 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Unit cell edge length</strong>: a ten per cent move there shifts the result by about 33.1 per cent. The least sensitive is <strong>Molar mass of the element</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Atoms per unit cell = 2, Molar mass of the element = 55.845, Unit cell edge length = 2.866, the page reports <strong>Volume of one unit cell</strong> = 2.354 × 10<sup>-23</sup> cm³, <strong>Density</strong> = 7.878 g/cm³, <strong>Mass of one unit cell</strong> = 1.855 × 10<sup>-22</sup> g. Iron as body-centred cubic: two atoms and a 2.866 Å edge give 7.87 g/cm³.</li><li>With Atoms per unit cell = 4, Molar mass of the element = 26.982, Unit cell edge length = 4.05, the page reports <strong>Volume of one unit cell</strong> = 6.643 × 10<sup>-23</sup> cm³, <strong>Density</strong> = 2.698 g/cm³, <strong>Mass of one unit cell</strong> = 1.792 × 10<sup>-22</sup> g. Aluminium, face-centred cubic: 4 atoms at 4.05 Å give 2.70 g/cm³.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Angstroms entered as centimetres.</strong> 1 Å is 1 × 10⁻⁸ cm; the conversion inside this page assumes the box holds angstroms.</li><li><strong>Atoms per cell counted as corners.</strong> Eight corners contribute one atom between them, not eight.</li><li><strong>Density of a powder used for comparison.</strong> A powder includes voids between grains, so the measured figure is lower than the crystal's own density.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume of one unit cell (cm³), Density (g/cm³), Mass of one unit cell (g).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The edge length is in angstroms, the molar mass in grams per mole, and the density comes back in grams per cubic centimetre — the units crystallography reports and the ones a handbook lists.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need atoms per unit cell and molar mass of the element and unit cell edge length. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Volume of one unit cell and density and mass of one unit cell should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Atoms per unit cell</strong> ×10</td><td>4.724 × 10<sup>-23</sup></td><td>4.724 × 10<sup>-23</sup></td><td>unchanged</td></tr><tr><td><strong>Molar mass of the element</strong> ×10</td><td>4.724 × 10<sup>-23</sup></td><td>4.724 × 10<sup>-23</sup></td><td>unchanged</td></tr><tr><td><strong>Unit cell edge length</strong> ×10</td><td>4.724 × 10<sup>-23</sup></td><td>4.724 × 10<sup>-20</sup></td><td>×1 000</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Cubic cells only.</strong> Hexagonal and tetragonal cells need a different volume formula, with more than one edge length.</li><li><strong>It assumes a pure, perfect crystal.</strong> Defects and substitutional impurities change both the cell volume and the mass per cell.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Identifying a metal's crystal structure from its measured density.</li></li><li><li>Predicting a density before a sample is available.</li></li><li><li>Checking an X-ray diffraction cell parameter against a handbook value.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/atom">Atom</a> <a href="/chemistry/molar-mass">Molar mass</a> <a href="/chemistry/average-atomic-mass">Average atomic mass</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cubic Cell calculator work out?', 'a' => <<<'TXT'
            It returns volume of one unit cell and density and mass of one unit cell from atoms per unit cell and molar mass of the element and unit cell edge length. The relationship is (Unit cell edge length × 0.00000001)^3.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Atoms per unit cell, Molar mass of the element (g/mol), Unit cell edge length (Å). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: molar mass of the element in g/mol; unit cell edge length in Å. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why four atoms in a face-centred cubic cell?', 'a' => 'Eight corners contribute one eighth each — one atom — and six faces contribute one half each — three atoms. Four in total.'],
            ['q' => 'What if my edge length is in picometres?', 'a' => 'Divide by a hundred. Copper\'s 361.5 pm is 3.615 Å, and entering 361.5 gives a cell volume a million times too large.'],
        ],
        'related' => [
            ['path' => '/chemistry/atom', 'name' => 'Atom'],
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
            ['path' => '/chemistry/average-atomic-mass', 'name' => 'Average atomic mass'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
