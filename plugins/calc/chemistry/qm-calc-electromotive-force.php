<?php

/**
 * Cell EMF Calculator
 * /chemistry/electromotive-force
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell EMF Calculator',
    'meta' => ['title' => 'Cell EMF Calculator: E°cell and ΔG° — Formula', 'description' => 'Combine two standard electrode potentials into a cell EMF, and convert that voltage into the free energy the cell can deliver. The formula and units are shown.', 'h1' => 'Cell EMF Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'cathode',
                    'label' => 'Cathode potential (E°cathode)',
                    'type' => 'number',
                    'suffix' => 'V',
                    'default' => '0.34',
                    'help' => 'The reduction that takes place at the positive electrode',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'anode',
                    'label' => 'Anode potential (E°anode)',
                    'type' => 'number',
                    'suffix' => 'V',
                    'default' => '-0.76',
                    'help' => 'The reduction half-reaction that is reversed, so it is usually negative',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'n',
                    'label' => 'Electrons transferred (n)',
                    'type' => 'number',
                    'default' => '2',
                    'help' => 'From the balanced cell reaction',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'emf',
                    'label' => 'Cell EMF (E°cell)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'V',
                ],
                [
                    'name' => 'emf_mv',
                    'label' => 'Cell EMF',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mV',
                ],
                [
                    'name' => 'delta_g',
                    'label' => 'Standard free energy change (ΔG°)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'kJ/mol',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Cell EMF',
            'results' => [
                'emf' => 'cathode-anode',
                'emf_mv' => '(cathode-anode)*1000',
                'delta_g' => '-n*96485*(cathode-anode)/1000',
                'cathode' => 'anode+emf',
                'anode' => 'cathode-emf',
                'n' => '-delta_g*1000/(96485*(cathode-anode))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A cell's standard electromotive force is the cathode potential minus the anode potential: <strong>E°<sub>cell</sub> = E°<sub>cathode</sub> − E°<sub>anode</sub></strong>. A positive result means the cell works as written, and the free energy it corresponds to is <strong>ΔG° = −nFE°</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Standard potentials are tabulated one half-reaction at a time, and every cell is a combination of two of them. The subtraction is where the sign conventions are won or lost: both values are reduction potentials, and the anode is the one that is reversed.</p><p>The page reports <strong>cell EMF (V) and cell EMF (mV) and standard free energy change (ΔG°)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Cell EMF (V)</strong></td><td><code>Cathode potential (E°cathode)-Anode potential (E°anode)</code></td></tr><tr><td><strong>Cell EMF (mV)</strong></td><td><code>(Cathode potential (E°cathode)-Anode potential (E°anode)) × 1000</code></td></tr><tr><td><strong>Standard free energy change (ΔG°)</strong></td><td><code>-Electrons transferred (n) × 96485 × (Cathode potential (E°cathode)-Anode potential (E°anode)) ÷ 1000</code></td></tr><tr><td><strong>Cathode potential (E°cathode)</strong></td><td><code>Anode potential (E°anode)+Cell EMF (V)</code></td></tr><tr><td><strong>Anode potential (E°anode)</strong></td><td><code>Cathode potential (E°cathode)-Cell EMF (V)</code></td></tr><tr><td><strong>Electrons transferred (n)</strong></td><td><code>-Standard free energy change (ΔG°) × 1000 ÷ (96485 × (Cathode potential (E°cathode)-Anode potential (E°anode)))</code></td></tr></tbody></table><p><p>F is the Faraday constant, 96 485 C/mol, and n is the number of electrons in the balanced cell reaction. Their product converts volts into joules per mole: one volt times one faraday is 96.5 kJ/mol.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports cell EMF (V) and cell EMF (mV) and standard free energy change (ΔG°).</p><ul><li><strong>Cathode potential (E°cathode)</strong> — in V. The reduction that takes place at the positive electrode</li><li><strong>Anode potential (E°anode)</strong> — in V. The reduction half-reaction that is reversed, so it is usually negative</li><li><strong>Electrons transferred (n)</strong>. From the balanced cell reaction</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Cell EMF (E°cell)</strong> — in V</li><li><strong>Cell EMF</strong> — in mV</li><li><strong>Standard free energy change (ΔG°)</strong> — in kJ/mol</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Cathode potential (E°cathode) = 0.34 V, Anode potential (E°anode) = -0.76 V, Electrons transferred (n) = 2 — and the results panel reads:</p><ul><li><strong>Cell EMF (E°cell)</strong> = <code>Cathode potential (E°cathode)-Anode potential (E°anode)</code> = <strong>1.1 V</strong></li><li><strong>Cell EMF</strong> = <code>(Cathode potential (E°cathode)-Anode potential (E°anode)) × 1000</code> = <strong>1 100 mV</strong></li><li><strong>Standard free energy change (ΔG°)</strong> = <code>-Electrons transferred (n) × 96485 × (Cathode potential (E°cathode)-Anode potential (E°anode)) ÷ 1000</code> = <strong>-212.267 kJ/mol</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.34--0.76 = 1.1</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A copper cathode at +0.34 V against a zinc anode at −0.76 V gives E°cell = 0.34 − (−0.76) = 1.10 V, the Daniell cell. With two electrons, ΔG° = −2 × 96 485 × 1.10 = −212 kJ/mol — a genuinely driving reaction.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>A positive EMF means the cell as written is spontaneous and the free energy is negative; the two always agree because one is the other multiplied by −nF. A negative EMF means the reaction runs the other way, and swapping the electrodes gives the same cell with the sign flipped.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Cell EMF (E°cell)</th><th>Cell EMF</th><th>Standard free energy change (ΔG°)</th></tr></thead><tbody><tr><td><strong>Cathode potential (E°cathode)</strong> +10 %</td><td>+3.09 %</td><td>+3.09 %</td><td>−3.09 %</td></tr><tr><td><strong>Anode potential (E°anode)</strong> +10 %</td><td>+6.91 %</td><td>+6.91 %</td><td>−6.91 %</td></tr><tr><td><strong>Electrons transferred (n)</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Electrons transferred (n)</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Cathode potential (E°cathode)</strong>, at 3.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Cathode potential (E°cathode) = 0.8, Anode potential (E°anode) = 0.34, Electrons transferred (n) = 1, the page reports <strong>Cell EMF (E°cell)</strong> = 0.46 V, <strong>Cell EMF</strong> = 460 mV, <strong>Standard free energy change (ΔG°)</strong> = -44.383 kJ/mol. Silver over copper: E° = 0.46 V, ΔG° = −44.4 kJ/mol.</li><li>With Cathode potential (E°cathode) = 0, Anode potential (E°anode) = 0, Electrons transferred (n) = 1, the page reports <strong>Cell EMF (E°cell)</strong> = 0 V, <strong>Cell EMF</strong> = 0 mV, <strong>Standard free energy change (ΔG°)</strong> = 0 kJ/mol. Two identical electrodes give no EMF, as they must — a cell needs a difference.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The anode potential added rather than subtracted.</strong> The single most common error: E°cell is a difference, not a sum, even though the numbers look like they should add.</li><li><strong>Sign convention reversed.</strong> Both values are reduction potentials as written; the anode is reversed only through the subtraction.</li><li><strong>n taken from one half-reaction.</strong> n belongs to the balanced overall reaction, which may double one of the halves.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Cell EMF (E°cell) (V), Cell EMF (mV), Standard free energy change (ΔG°) (kJ/mol).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Volts for the potentials, millivolts for the reading most meters give, and kJ/mol for the free energy. The three are related by the Faraday constant and the electron count.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need cathode potential (E°cathode) and anode potential (E°anode) and electrons transferred (n). Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Cell emf (v) and cell emf (mv) and standard free energy change (δg°) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Cathode potential (E°cathode)</strong> ×10</td><td>1.1</td><td>4.16</td><td>×3.782</td></tr><tr><td><strong>Anode potential (E°anode)</strong> ×10</td><td>1.1</td><td>7.94</td><td>×7.218</td></tr><tr><td><strong>Electrons transferred (n)</strong> ×10</td><td>1.1</td><td>1.1</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It is standard-state only.</strong> A real cell at other concentrations follows the Nernst equation, and the measured EMF can be well below E°.</li><li><strong>It says nothing about rate.</strong> A large EMF does not stop a cell being slow, and it says nothing about the overpotential at either electrode.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Working out whether a proposed cell will deliver current.</li></li><li><li>Converting a measured EMF into a free energy change.</li></li><li><li>Checking a textbook's cell against its two half-potentials.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/nernst-equation">Nernst equation</a> <a href="/chemistry/electrolysis">Electrolysis</a> <a href="/chemistry/gibbs-energy">Gibbs energy</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell EMF calculator work out?', 'a' => <<<'TXT'
            It returns cell EMF (V) and cell EMF (mV) and standard free energy change (ΔG°) from cathode potential (E°cathode) and anode potential (E°anode) and electrons transferred (n). The relationship is Cathode potential (E°cathode)-Anode potential (E°anode).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cathode potential (E°cathode) (V), Anode potential (E°anode) (V), Electrons transferred (n). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: cathode potential (E°cathode) in V; anode potential (E°anode) in V. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is the cell EMF a difference and not a sum?', 'a' => 'Because both tabulated values are reduction potentials. Reversing the anode half to oxidise it flips its sign, which turns the sum into the subtraction.'],
            ['q' => 'What does a negative ΔG° mean for the cell?', 'a' => 'That the cell reaction as written is spontaneous: it will deliver energy rather than consume it.'],
        ],
        'related' => [
            ['path' => '/chemistry/nernst-equation', 'name' => 'Nernst equation'],
            ['path' => '/chemistry/electrolysis', 'name' => 'Electrolysis'],
            ['path' => '/chemistry/gibbs-energy', 'name' => 'Gibbs energy'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
