<?php

/**
 * Mulliken Electronegativity Calculator
 * /chemistry/electronegativity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mulliken Electronegativity Calculator',
    'meta' => ['title' => 'Mulliken Electronegativity Calculator: From IE and EA', 'description' => 'Work out an element\'s Mulliken electronegativity from its first ionisation energy and its electron affinity, and see where that puts it next to hydrogen.', 'h1' => 'Mulliken Electronegativity Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'ionization_energy',
                    'label' => 'First ionisation energy',
                    'type' => 'number',
                    'suffix' => 'eV',
                    'default' => '5.14',
                    'help' => 'Energy to remove one electron; sodium is 5.14 eV',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'electron_affinity',
                    'label' => 'Electron affinity',
                    'type' => 'number',
                    'suffix' => 'eV',
                    'default' => '0.55',
                    'help' => 'Energy released on gaining one electron; sodium is 0.55 eV',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'electronegativity',
                    'label' => 'Mulliken electronegativity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'eV',
                ],
                [
                    'name' => 'energy_gap',
                    'label' => 'Ionisation energy minus affinity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'eV',
                ],
                [
                    'name' => 'vs_hydrogen',
                    'label' => 'Difference from hydrogen (7.18 eV)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'eV',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Mulliken Electronegativity',
            'results' => [
                'electronegativity' => '(ionization_energy+electron_affinity)/2',
                'energy_gap' => 'ionization_energy-electron_affinity',
                'vs_hydrogen' => '(ionization_energy+electron_affinity)/2-7.18',
                'ionization_energy' => '2*electronegativity-electron_affinity',
                'electron_affinity' => '2*electronegativity-ionization_energy',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Mulliken's definition splits the difference between holding an electron and taking one: <strong>χ = (IE + EA) ÷ 2</strong>. The page reports χ in electronvolts, the gap between the two energies, and how far the element sits from hydrogen's 2.20 eV.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Electronegativity decides which way a bond polarises, and Mulliken's version is the one with a physical meaning you can state in a sentence: it is the average of how hard the atom holds its own electron and how much it wants another.</p><p>The page reports <strong>mulliken electronegativity and ionisation energy minus affinity and difference from hydrogen (7.18 eV)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Mulliken electronegativity</strong></td><td><code>(First ionisation energy+Electron affinity) ÷ 2</code></td></tr><tr><td><strong>Ionisation energy minus affinity</strong></td><td><code>First ionisation energy-Electron affinity</code></td></tr><tr><td><strong>Difference from hydrogen (7.18 eV)</strong></td><td><code>(First ionisation energy+Electron affinity) ÷ 2-7.18</code></td></tr><tr><td><strong>First ionisation energy</strong></td><td><code>2 × Mulliken electronegativity-Electron affinity</code></td></tr><tr><td><strong>Electron affinity</strong></td><td><code>2 × Mulliken electronegativity-First ionisation energy</code></td></tr></tbody></table><p><p>Both energies are positive quantities here — ionisation energy is what you pay, electron affinity is what you get back — so the average sits between them. Mulliken's original scale is in electronvolts; Pauling's is a relative scale anchored on hydrogen, and the two are related by a linear conversion.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports mulliken electronegativity and ionisation energy minus affinity and difference from hydrogen (7.18 eV).</p><ul><li><strong>First ionisation energy</strong> — in eV. Energy to remove one electron; sodium is 5.14 eV</li><li><strong>Electron affinity</strong> — in eV. Energy released on gaining one electron; sodium is 0.55 eV</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Mulliken electronegativity</strong> — in eV</li><li><strong>Ionisation energy minus affinity</strong> — in eV</li><li><strong>Difference from hydrogen (7.18 eV)</strong> — in eV</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — First ionisation energy = 5.14 eV, Electron affinity = 0.55 eV — and the results panel reads:</p><ul><li><strong>Mulliken electronegativity</strong> = <code>(First ionisation energy+Electron affinity) ÷ 2</code> = <strong>2.845 eV</strong></li><li><strong>Ionisation energy minus affinity</strong> = <code>First ionisation energy-Electron affinity</code> = <strong>4.59 eV</strong></li><li><strong>Difference from hydrogen (7.18 eV)</strong> = <code>(First ionisation energy+Electron affinity) ÷ 2-7.18</code> = <strong>-4.335 eV</strong></li></ul><p>With the numbers written into the formula, the first result is <code>(5.14+0.55) ÷ 2 = 2.845</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Sodium: 5.14 eV to remove an electron and 0.55 eV returned on gaining one, giving χ = 2.85 eV — well below hydrogen's 7.18 eV on the same scale, which is what makes sodium the electropositive partner in every bond it forms. Chlorine, at 12.97 and 3.61 eV, comes out at 8.29 eV.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Large χ means the atom pulls electrons towards itself; small χ means it gives them up. Sodium at 2.85 eV and chlorine at 8.29 eV are 5.4 eV apart, which is why sodium chloride is ionic — the percent ionic character page turns that gap into a number.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Mulliken electronegativity</th><th>Ionisation energy minus affinity</th><th>Difference from hydrogen (7.18 eV)</th></tr></thead><tbody><tr><td><strong>First ionisation energy</strong> +10 %</td><td>+9.03 %</td><td>+11.2 %</td><td>+5.93 %</td></tr><tr><td><strong>Electron affinity</strong> +10 %</td><td>+0.97 %</td><td>−1.2 %</td><td>+0.63 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>First ionisation energy</strong>: a ten per cent move there shifts the result by about 11.2 per cent. The least sensitive is <strong>Electron affinity</strong>, at 1.2 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With First ionisation energy = 13.598, Electron affinity = 0.754, the page reports <strong>Mulliken electronegativity</strong> = 7.176 eV, <strong>Ionisation energy minus affinity</strong> = 12.844 eV, <strong>Difference from hydrogen (7.18 eV)</strong> = -0.004 eV. Hydrogen: χ = 7.18 eV — the reference point the third result measures against.</li><li>With First ionisation energy = 12.967, Electron affinity = 3.613, the page reports <strong>Mulliken electronegativity</strong> = 8.29 eV, <strong>Ionisation energy minus affinity</strong> = 9.354 eV, <strong>Difference from hydrogen (7.18 eV)</strong> = 1.11 eV. Chlorine: χ = 8.29 eV, among the highest of any element.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Electron affinity's sign taken as negative.</strong> The energy released on gaining an electron is quoted as positive here; entering it as a negative number halves the electronegativity wrongly.</li><li><strong>It compared directly with Pauling numbers.</strong> A Mulliken value in electronvolts and a Pauling value on a 0.7–4 scale are different scales; do not mix them.</li><li><strong>Second ionisation energy used.</strong> Mulliken's χ takes the first, because a bond involves the outermost electron.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Mulliken electronegativity (eV), Ionisation energy minus affinity (eV), Difference from hydrogen (7.18 eV) (eV).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Both inputs are in electronvolts and the results are too. One electronvolt is 96.5 kJ/mol, which is the conversion to use if the ionisation energy came from a table in kilojoules per mole.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need first ionisation energy and electron affinity. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Mulliken electronegativity and ionisation energy minus affinity and difference from hydrogen (7.18 ev) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>First ionisation energy</strong> ×10</td><td>2.845</td><td>25.975</td><td>×9.13</td></tr><tr><td><strong>Electron affinity</strong> ×10</td><td>2.845</td><td>5.32</td><td>×1.87</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Mulliken is a gas-phase measure.</strong> In a solid or a solution, the energies shift and the electronegativity with them.</li><li><strong>It is one number for a many-electron atom.</strong> An atom's effective electronegativity depends on what it is bonded to.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Predicting the direction of bond polarisation.</li></li><li><li>Converting ionisation energies into an electronegativity scale.</li></li><li><li>Comparing an element's electron-holding and electron-taking tendencies.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/percent-ionic-character">Percent ionic character</a> <a href="/chemistry/effective-charge">Effective nuclear charge</a> <a href="/chemistry/atom">Atom</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mulliken Electronegativity calculator work out?', 'a' => <<<'TXT'
            It returns mulliken electronegativity and ionisation energy minus affinity and difference from hydrogen (7.18 eV) from first ionisation energy and electron affinity. The relationship is (First ionisation energy+Electron affinity) ÷ 2.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'First ionisation energy (eV), Electron affinity (eV). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: first ionisation energy in eV; electron affinity in eV. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How does Mulliken\'s scale relate to Pauling\'s?', 'a' => <<<'TXT'
            They are linearly related: Pauling values can be approximated from Mulliken electronvolt values by a straight-line conversion, and the two orderings agree across the periodic table.
            TXT],
            ['q' => 'Why average the two energies?', 'a' => <<<'TXT'
            Because the two extremes of a bond are complete electron loss and complete electron gain. Half way between them is a fair measure of how the atom behaves when it is sharing.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/percent-ionic-character', 'name' => 'Percent ionic character'],
            ['path' => '/chemistry/effective-charge', 'name' => 'Effective nuclear charge'],
            ['path' => '/chemistry/atom', 'name' => 'Atom'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
