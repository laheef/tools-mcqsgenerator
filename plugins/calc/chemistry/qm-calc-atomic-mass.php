<?php

/**
 * Atomic Mass Calculator
 * /chemistry/atomic-mass
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Atomic Mass Calculator',
    'meta' => ['title' => 'Atomic Mass Calculator: Mass of a Single Atom', 'description' => 'Convert an atomic mass in unified atomic units into the grams and kilograms that a single atom of it weighs, and find how many atoms go to make up one gram.', 'h1' => 'Atomic Mass Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'atomic_mass',
                    'label' => 'Atomic mass',
                    'type' => 'number',
                    'suffix' => 'u',
                    'default' => '55.845',
                    'help' => 'From the periodic table; iron is 55.845',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'atoms',
                    'label' => 'Number of atoms',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Set to 1 for the mass of a single atom',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mass_g',
                    'label' => 'Mass',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'mass_kg',
                    'label' => 'Mass',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kg',
                ],
                [
                    'name' => 'atoms_per_gram',
                    'label' => 'Atoms in one gram',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Atomic Mass',
            'results' => [
                'mass_g' => 'atomic_mass*atoms*1.6605390666/1000000000000000000000000',
                'mass_kg' => 'atomic_mass*atoms*1.6605390666/1000000000000000000000000/1000',
                'atoms_per_gram' => '1000000000000000000000000/(atomic_mass*1.6605390666)',
                'atomic_mass' => 'mass_g/atoms*1000000000000000000000000/1.6605390666',
                'atoms' => 'mass_g/atomic_mass*1000000000000000000000000/1.6605390666',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>One atomic mass unit is 1.6605 × 10⁻²⁴ grams, so a single atom's mass is <strong>m = Ar × 1.6605 × 10⁻²⁴ g</strong>. The page reports the mass of the atoms you specify in grams and kilograms, and how many atoms go into a gram.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The mass of one atom is not a number anybody can measure directly; it comes from the molar mass, which is measurable. The conversion between the two is Avogadro's number, which is what the 1.6605 × 10⁻²⁴ g constant really is — one gram divided by 6.022 × 10²³.</p><p>The page reports <strong>mass (g) and mass (kg) and atoms in one gram</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Mass (g)</strong></td><td><code>Atomic mass × Number of atoms × 1.6605390666 ÷ 1 × 10<sup>24< ÷ sup></code></td></tr><tr><td><strong>Mass (kg)</strong></td><td><code>Atomic mass × Number of atoms × 1.6605390666 ÷ 1 × 10<sup>24< ÷ sup> ÷ 1000</code></td></tr><tr><td><strong>Atoms in one gram</strong></td><td><code>1 × 10<sup>24< ÷ sup> ÷ (Atomic mass × 1.6605390666)</code></td></tr><tr><td><strong>Atomic mass</strong></td><td><code>Mass (g) ÷ Number of atoms × 1 × 10<sup>24< ÷ sup> ÷ 1.6605390666</code></td></tr><tr><td><strong>Number of atoms</strong></td><td><code>Mass (g) ÷ Atomic mass × 1 × 10<sup>24< ÷ sup> ÷ 1.6605390666</code></td></tr></tbody></table><p><p>The atomic mass unit and the molar mass are numerically identical: an atom of iron weighs 55.845 u and a mole of iron weighs 55.845 g. That equality is the whole reason the mole exists.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports mass (g) and mass (kg) and atoms in one gram.</p><ul><li><strong>Atomic mass</strong> — in u. From the periodic table; iron is 55.845</li><li><strong>Number of atoms</strong>. Set to 1 for the mass of a single atom</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Mass</strong> — in g</li><li><strong>Mass</strong> — in kg</li><li><strong>Atoms in one gram</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Atomic mass = 55.845 u, Number of atoms = 1 — and the results panel reads:</p><ul><li><strong>Mass</strong> = <code>Atomic mass × Number of atoms × 1.6605390666 ÷ 1 × 10<sup>24< ÷ sup></code> = <strong>9.273 × 10<sup>-23</sup> g</strong></li><li><strong>Mass</strong> = <code>Atomic mass × Number of atoms × 1.6605390666 ÷ 1 × 10<sup>24< ÷ sup> ÷ 1000</code> = <strong>9.273 × 10<sup>-26</sup> kg</strong></li><li><strong>Atoms in one gram</strong> = <code>1 × 10<sup>24< ÷ sup> ÷ (Atomic mass × 1.6605390666)</code> = <strong>1.078 × 10<sup>22</sup></strong></li></ul><p>With the numbers written into the formula, the first result is <code>55.845 × 1 × 1.6605390666 ÷ 1 × 10<sup>24< ÷ sup> = 9.273 × 10<sup>-23</sup></code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>One iron atom: 55.845 × 1.6605 × 10⁻²⁴ g is 9.27 × 10⁻²³ g, or 9.27 × 10⁻²⁶ kg. And a gram of iron holds 1.08 × 10²² atoms — ten thousand billion billion of them.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Sanity-check with the inverse: about 10²² atoms per gram for anything of ordinary atomic mass. A gram of hydrogen, at atomic mass 1.008, holds six times as many atoms as a gram of iron, because each one is fifty-five times lighter.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Mass</th><th>Mass</th><th>Atoms in one gram</th></tr></thead><tbody><tr><td><strong>Atomic mass</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Number of atoms</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Atomic mass</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Number of atoms</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Atomic mass = 1.008, Number of atoms = 1, the page reports <strong>Mass</strong> = 1.674 × 10<sup>-24</sup> g, <strong>Mass</strong> = 1.674 × 10<sup>-27</sup> kg, <strong>Atoms in one gram</strong> = 5.974 × 10<sup>23</sup>. One hydrogen atom is 1.674 × 10⁻²⁴ g — slightly more than a proton, because of the electron and the binding energy.</li><li>With Atomic mass = 12.011, Number of atoms = 1 000, the page reports <strong>Mass</strong> = 1.994 × 10<sup>-20</sup> g, <strong>Mass</strong> = 1.994 × 10<sup>-23</sup> kg, <strong>Atoms in one gram</strong> = 5.014 × 10<sup>22</sup>. A thousand carbon atoms weigh 1.994 × 10⁻²⁰ g, still far below a picogram.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Atomic mass and mass number confused.</strong> 55.845 is the weighted average; a single iron-56 atom weighs 56 u, not 55.845.</li><li><strong>Grams and kilograms mixed.</strong> The two results differ by a thousand, and a molecular model built from the wrong one is off by three orders of magnitude.</li><li><strong>The electron mass ignored.</strong> For most purposes the atom's mass is the nucleus's; the electrons contribute about one part in four thousand.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Mass (g), Mass (kg), Atoms in one gram.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The atomic mass is in unified atomic mass units, which are dimensionless scales of one twelfth of a carbon-12 atom. The outputs are in grams and kilograms, and the atom count is a plain number.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need atomic mass and number of atoms. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Mass (g) and mass (kg) and atoms in one gram should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Atomic mass</strong> ×10</td><td>9.273 × 10<sup>-23</sup></td><td>9.273 × 10<sup>-22</sup></td><td>ten times larger</td></tr><tr><td><strong>Number of atoms</strong> ×10</td><td>9.273 × 10<sup>-23</sup></td><td>9.273 × 10<sup>-22</sup></td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Average atomic mass, not isotope mass.</strong> A sample of an element is a mixture, and this page uses the average unless you enter a single isotope's mass.</li><li><strong>It ignores relativistic and binding effects.</strong> These matter at the parts per million level, far below anything a chemistry calculation needs.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Finding the mass of a single atom or molecule.</li></li><li><li>Working out how many atoms a weighed sample contains.</li></li><li><li>Seeing why a mole of anything weighs its atomic mass in grams.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/atom">Atom</a> <a href="/chemistry/average-atomic-mass">Average atomic mass</a> <a href="/chemistry/mole">Mole</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Atomic Mass calculator work out?', 'a' => <<<'TXT'
            It returns mass (g) and mass (kg) and atoms in one gram from atomic mass and number of atoms. The relationship is Atomic mass × Number of atoms × 1.6605390666 ÷ 1 × 10<sup>24< ÷ sup>.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Atomic mass (u), Number of atoms. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: atomic mass in u. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is one atomic mass unit 1.6605 × 10⁻²⁴ g?', 'a' => <<<'TXT'
            Because it is defined as one twelfth of a carbon-12 atom, and a mole of carbon-12 weighs 12 g. Dividing 12 g by twelve and then by Avogadro's number gives that constant.
            TXT],
            ['q' => 'Does the mass of an atom include its electrons?', 'a' => 'Yes, but they contribute little: a carbon atom\'s six electrons add about 0.03 % to the mass of its nucleus.'],
        ],
        'related' => [
            ['path' => '/chemistry/atom', 'name' => 'Atom'],
            ['path' => '/chemistry/average-atomic-mass', 'name' => 'Average atomic mass'],
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
