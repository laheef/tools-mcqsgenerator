<?php

/**
 * Electron configuration
 * /chemistry/electron-configuration
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Electron configuration',
    'meta' => ['title' => 'Electron Configuration Calculator: Shell Filling', 'description' => 'Fill the electron shells of an element from its atomic number, the way an aufbau diagram does it, and read how many electrons sit in each shell in turn.', 'h1' => 'Electron configuration', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'electrons',
                    'label' => 'Atomic number',
                    'type' => 'number',
                    'suffix' => 'Z',
                    'default' => '17',
                    'help' => 'Chlorine is 17; the page covers the first twenty elements',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'shell_1',
                    'label' => 'Electrons in the first shell',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'shell_2',
                    'label' => 'Electrons in the second shell',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'shell_3',
                    'label' => 'Electrons in the third shell',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'shell_4',
                    'label' => 'Electrons in the fourth shell',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'valence_electrons',
                    'label' => 'Valence electrons',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Electron configuration',
            'results' => [
                'shell_1' => 'min(electrons,2)',
                'shell_2' => 'min(max(electrons-2,0),8)',
                'shell_3' => 'min(max(electrons-10,0),8)',
                'shell_4' => 'min(max(electrons-18,0),2)',
                'valence_electrons' => <<<'TXT'
                min(electrons,2)*(1-min(1,min(max(electrons-2,0),8)))+min(max(electrons-2,0),8)*(1-min(1,min(max(electrons-10,0),8)))+min(max(electrons-10,0),8)*(1-min(1,min(max(electrons-18,0),2)))+min(max(electrons-18,0),2)
                TXT,
                'electrons' => 'shell_1+shell_2+shell_3+shell_4',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Electrons fill the lowest available shell first, two in the first, eight in the second, eight in the third and two in the fourth for the first twenty elements. The page reports the occupancy of each shell and the number of valence electrons that leaves.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The shell structure explains the periodic table's shape. Elements with one more electron than a full shell behave alike — lithium, sodium and potassium all sit at the start of a period with a single valence electron, and all react the same way.</p><p>The page reports <strong>electrons in the first shell and electrons in the second shell and electrons in the third shell and electrons in the fourth shell and valence electrons</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Electrons in the first shell</strong></td><td><code>min(Atomic number,2)</code></td></tr><tr><td><strong>Electrons in the second shell</strong></td><td><code>min(max(Atomic number-2,0),8)</code></td></tr><tr><td><strong>Electrons in the third shell</strong></td><td><code>min(max(Atomic number-10,0),8)</code></td></tr><tr><td><strong>Electrons in the fourth shell</strong></td><td><code>min(max(Atomic number-18,0),2)</code></td></tr><tr><td><strong>Valence electrons</strong></td><td><code>min(Atomic number,2) × (1-min(1,min(max(Atomic number-2,0),8)))+min(max(Atomic number-2,0),8) × (1-min(1,min(max(Atomic number-10,0),8)))+min(max(Atomic number-10,0),8) × (1-min(1,min(max(Atomic number-18,0),2)))+min(max(Atomic number-18,0),2)</code></td></tr><tr><td><strong>Atomic number</strong></td><td><code>Electrons in the first shell+Electrons in the second shell+Electrons in the third shell+Electrons in the fourth shell</code></td></tr></tbody></table><p><p>Each shell is filled in turn and capped at its capacity: two, then eight, then eight again. The fourth shell only takes two electrons in this range, because the 3d subshell jumps ahead of it and the page stops at calcium.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs. It reports electrons in the first shell and electrons in the second shell and electrons in the third shell and electrons in the fourth shell and valence electrons.</p><ul><li><strong>Atomic number</strong> — in Z. Chlorine is 17; the page covers the first twenty elements</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Electrons in the first shell</strong></li><li><strong>Electrons in the second shell</strong></li><li><strong>Electrons in the third shell</strong></li><li><strong>Electrons in the fourth shell</strong></li><li><strong>Valence electrons</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Atomic number = 17 Z — and the results panel reads:</p><ul><li><strong>Electrons in the first shell</strong> = <code>min(Atomic number,2)</code> = <strong>2</strong></li><li><strong>Electrons in the second shell</strong> = <code>min(max(Atomic number-2,0),8)</code> = <strong>8</strong></li><li><strong>Electrons in the third shell</strong> = <code>min(max(Atomic number-10,0),8)</code> = <strong>7</strong></li><li><strong>Electrons in the fourth shell</strong> = <code>min(max(Atomic number-18,0),2)</code> = <strong>0</strong></li><li><strong>Valence electrons</strong> = <code>min(Atomic number,2) × (1-min(1,min(max(Atomic number-2,0),8)))+min(max(Atomic number-2,0),8) × (1-min(1,min(max(Atomic number-10,0),8)))+min(max(Atomic number-10,0),8) × (1-min(1,min(max(Atomic number-18,0),2)))+min(max(Atomic number-18,0),2)</code> = <strong>7</strong></li></ul><p>With the numbers written into the formula, the first result is <code>min(17,2) = 2</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Chlorine, Z = 17: 2 in the first shell, 8 in the second, 7 in the third and none in the fourth. Its 2, 8, 7 structure leaves seven valence electrons — one short of an octet, which is why it forms chloride so readily.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>A full outer shell means an inert-gas-like stability: neon at 2, 8 and argon at 2, 8, 8 are the full-shell points. One electron over means a Group 1 metal; one short means a halogen.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Electrons in the first shell</th><th>Electrons in the second shell</th><th>Electrons in the third shell</th><th>Electrons in the fourth shell</th><th>Valence electrons</th></tr></thead><tbody><tr><td><strong>Atomic number</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+14.29 %</td><td>—</td><td>−55.71 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Atomic number</strong>: a ten per cent move there shifts the result by about 55.7 per cent. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Atomic number = 11, the page reports <strong>Electrons in the first shell</strong> = 2, <strong>Electrons in the second shell</strong> = 8, <strong>Electrons in the third shell</strong> = 1, <strong>Electrons in the fourth shell</strong> = 0, <strong>Valence electrons</strong> = 1. Sodium: 2, 8, 1 — a single valence electron, which is why it loses one so easily.</li><li>With Atomic number = 18, the page reports <strong>Electrons in the first shell</strong> = 2, <strong>Electrons in the second shell</strong> = 8, <strong>Electrons in the third shell</strong> = 8, <strong>Electrons in the fourth shell</strong> = 0, <strong>Valence electrons</strong> = 8. Argon: 2, 8, 8, with a closed outer shell and no valence electrons to offer.</li><li>With Atomic number = 20, the page reports <strong>Electrons in the first shell</strong> = 2, <strong>Electrons in the second shell</strong> = 8, <strong>Electrons in the third shell</strong> = 8, <strong>Electrons in the fourth shell</strong> = 2, <strong>Valence electrons</strong> = 2. Calcium: 2, 8, 8, 2 and two valence electrons — the page stops here because the next element fills 3d before 4p.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>It read past calcium.</strong> From scandium onward the 3d subshell fills before the fourth shell continues, and a simple shell count will not match the real configuration.</li><li><strong>The 2n² rule taken as a filling order.</strong> Capacity and filling order are different: the third shell holds 18 but only takes 8 before the fourth starts.</li><li><strong>Chromium and copper expected to fit.</strong> Both are exceptions to the aufbau order even within the transition metals.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Electrons in the first shell, Electrons in the second shell, Electrons in the third shell, Electrons in the fourth shell, Valence electrons.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Everything on this page is a count of electrons — no units. The atomic number and the shell occupancies are all dimensionless, and the shells must add back up to the atomic number.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need atomic number. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Electrons in the first shell and electrons in the second shell and electrons in the third shell and electrons in the fourth shell and valence electrons should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Atomic number</strong> ×10</td><td>2</td><td>2</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>The first twenty elements.</strong> The page is a shell-level treatment, not a full orbital configuration.</li><li><strong>No subshell detail.</strong> It tells you 2, 8, 7, not 1s² 2s² 2p⁶ 3s² 3p⁵.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Working out the shell structure from an atomic number.</li></li><li><li>Finding the valence electron count for the main-group elements.</li></li><li><li>Explaining periodic trends to a class.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/molar-mass">Molar mass</a> <a href="/chemistry/atomic-mass">Atomic mass</a> <a href="/chemistry/electronegativity">Electronegativity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Electron configuration calculator work out?', 'a' => <<<'TXT'
            It returns electrons in the first shell and electrons in the second shell and electrons in the third shell and electrons in the fourth shell and valence electrons from atomic number. The relationship is min(Atomic number,2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Atomic number (Z). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: atomic number in Z. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does the third shell hold eight before the fourth starts?', 'a' => 'Because the 4s orbital fills at a lower energy than 3d. The third shell\'s remaining ten places are not filled until after the fourth shell has started.'],
            ['q' => 'What is the valence shell here?', 'a' => 'The outermost shell that actually has electrons in it. For chlorine that is the third shell, with seven, not the empty fourth.'],
        ],
        'related' => [
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
            ['path' => '/chemistry/atomic-mass', 'name' => 'Atomic mass'],
            ['path' => '/chemistry/electronegativity', 'name' => 'Electronegativity'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
