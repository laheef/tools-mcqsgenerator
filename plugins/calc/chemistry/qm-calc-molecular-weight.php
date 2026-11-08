<?php

/**
 * Molecular Weight Calculator
 * /chemistry/molecular-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Molecular Weight Calculator',
    'meta' => ['title' => 'Molecular Weight Calculator: Da, kDa & g/mol', 'description' => 'Turn a measured mass and a mole count into molecular weight in daltons, kilodaltons and grams per molecule, at whichever scale your bench work happens to use.', 'h1' => 'Molecular Weight Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'mass',
                    'label' => 'Mass of sample (m)',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '20',
                    'help' => 'Weighed mass of the purified substance',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'moles',
                    'label' => 'Amount of substance (n)',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '0.25',
                    'help' => 'Moles in that mass, from the formula or a titration',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'mw_da',
                    'label' => 'Molecular weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Da',
                ],
                [
                    'name' => 'mw_kda',
                    'label' => 'Molecular weight',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kDa',
                ],
                [
                    'name' => 'molecule_mass',
                    'label' => 'Mass of one molecule',
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
            'title' => 'Molecular Weight',
            'results' => [
                'mw_da' => 'mass/moles',
                'mw_kda' => 'mass/moles/1000',
                'molecule_mass' => 'mass/moles/602214075999999987023872',
                'mass' => 'mw_da*moles',
                'moles' => 'mass/mw_da',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Molecular weight is the mass of one molecule measured against one-twelfth of a carbon-12 atom. It is numerically the same as molar mass in g/mol, but it is the unit a biochemist or a mass spectrometrist reads: <strong>MW = m ÷ n</strong>, reported here in daltons, in kilodaltons, and as the mass of a single molecule in grams.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The dalton is defined so that the molecular weight of a molecule and the molar mass of a mole of those molecules agree exactly. That makes the number portable: 66 000 Da of albumin is 66 kDa or 66 kg/mol, and all three describe the same thing.</p><p>The page reports <strong>molecular weight (Da) and molecular weight (kDa) and mass of one molecule</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Molecular weight (Da)</strong></td><td><code>Mass of sample (m) ÷ Amount of substance (n)</code></td></tr><tr><td><strong>Molecular weight (kDa)</strong></td><td><code>Mass of sample (m) ÷ Amount of substance (n) ÷ 1000</code></td></tr><tr><td><strong>Mass of one molecule</strong></td><td><code>Mass of sample (m) ÷ Amount of substance (n) ÷ 6.022 × 10<sup>23< ÷ sup></code></td></tr><tr><td><strong>Mass of sample (m)</strong></td><td><code>Molecular weight (Da) × Amount of substance (n)</code></td></tr><tr><td><strong>Amount of substance (n)</strong></td><td><code>Mass of sample (m) ÷ Molecular weight (Da)</code></td></tr></tbody></table><p><p>The only conversion here is the unit: 1 kDa = 1000 Da, and both are the same number as g/mol. The third result divides by Avogadro's number to give the mass of one molecule in grams.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports molecular weight (Da) and molecular weight (kDa) and mass of one molecule.</p><ul><li><strong>Mass of sample (m)</strong> — in g. Weighed mass of the purified substance</li><li><strong>Amount of substance (n)</strong> — in mol. Moles in that mass, from the formula or a titration</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Molecular weight</strong> — in Da</li><li><strong>Molecular weight</strong> — in kDa</li><li><strong>Mass of one molecule</strong> — in g</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass of sample (m) = 20 g, Amount of substance (n) = 0.25 mol — and the results panel reads:</p><ul><li><strong>Molecular weight</strong> = <code>Mass of sample (m) ÷ Amount of substance (n)</code> = <strong>80 Da</strong></li><li><strong>Molecular weight</strong> = <code>Mass of sample (m) ÷ Amount of substance (n) ÷ 1000</code> = <strong>0.08 kDa</strong></li><li><strong>Mass of one molecule</strong> = <code>Mass of sample (m) ÷ Amount of substance (n) ÷ 6.022 × 10<sup>23< ÷ sup></code> = <strong>1.328 × 10<sup>-22</sup> g</strong></li></ul><p>With the numbers written into the formula, the first result is <code>20 ÷ 0.25 = 80</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 20 g sample containing 0.25 mol has a molecular weight of 80 Da — small enough to be a single amino acid. A protein of 66 kDa would need 0.25 mol to weigh 16.5 kg, which is why protein samples are usually given in milligrams and the mole count runs to nanomoles.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the dalton figure against what you expect for the class of molecule: under 300 Da for a drug, a few hundred to a few thousand for a peptide, 10–150 kDa for most proteins, and megadaltons for a polymer or a virus capsid.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Molecular weight</th><th>Molecular weight</th><th>Mass of one molecule</th></tr></thead><tbody><tr><td><strong>Mass of sample (m)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Amount of substance (n)</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Mass of sample (m)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Amount of substance (n)</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass of sample (m) = 1, Amount of substance (n) = 1 × 10<sup>-5</sup>, the page reports <strong>Molecular weight</strong> = 100 000 Da, <strong>Molecular weight</strong> = 100 kDa, <strong>Mass of one molecule</strong> = 1.661 × 10<sup>-19</sup> g. 1 g holding 10 µmol gives 100 kDa — the size of a mid-sized enzyme.</li><li>With Mass of sample (m) = 0.00018, Amount of substance (n) = 1 × 10<sup>-6</sup>, the page reports <strong>Molecular weight</strong> = 180 Da, <strong>Molecular weight</strong> = 0.18 kDa, <strong>Mass of one molecule</strong> = 2.989 × 10<sup>-22</sup> g. 180 µg in 1 µmol is 180 Da, the molecular weight of glucose.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Moles entered in millimoles.</strong> 0.25 mmol is 0.00025 mol; entering 0.25 makes the molecular weight a thousand times too small.</li><li><strong>Molecular weight read as molecular radius.</strong> It says nothing about shape; two molecules of the same weight can differ tenfold in hydrodynamic size.</li><li><strong>A mixture averaged as if pure.</strong> The result is a weight-average over whatever was in the sample, which is legitimate but must be described as one.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Molecular weight (Da), Molecular weight (kDa), Mass of one molecule (g).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Dalton and g/mol are the same number by definition, so the kDa result is the first divided by a thousand — no physical conversion is happening, only a change of scale.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass of sample (m) and amount of substance (n). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Molecular weight (da) and molecular weight (kda) and mass of one molecule should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass of sample (m)</strong> ×10</td><td>80</td><td>800</td><td>ten times larger</td></tr><tr><td><strong>Amount of substance (n)</strong> ×10</td><td>80</td><td>8</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes one species.</strong> A sample with aggregates shows a multiple of the true weight and tells you nothing about which multiple.</li><li><strong>It is a mass, not a sequence.</strong> Post-translational modification, salt adducts and glycosylation all move the number.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Reading a mass spectrum: the [M+H]⁺ peak sits one dalton above the molecular weight.</li></li><li><li>Converting between milligrams of protein and nanomoles for an assay.</li></li><li><li>Sizing a band on a gel before running the standard curve.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/molar-mass">Molar mass</a> <a href="/chemistry/mole">Mole</a> <a href="/chemistry/moles-to-atoms">Moles to atoms</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Molecular Weight calculator work out?', 'a' => <<<'TXT'
            It returns molecular weight (Da) and molecular weight (kDa) and mass of one molecule from mass of sample (m) and amount of substance (n). The relationship is Mass of sample (m) ÷ Amount of substance (n).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass of sample (m) (g), Amount of substance (n) (mol). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass of sample (m) in g; amount of substance (n) in mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why are Da and g/mol the same number?', 'a' => <<<'TXT'
            Because the mole is defined as exactly Avogadro's number of entities, and the dalton as one-twelfth of a carbon-12 atom. Multiplying one molecule's mass in daltons by Avogadro's number gives that molecule's molar mass in grams.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
            ['path' => '/chemistry/mole', 'name' => 'Mole'],
            ['path' => '/chemistry/moles-to-atoms', 'name' => 'Moles to atoms'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
