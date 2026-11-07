<?php

/**
 * CFU/mL Calculator
 * /biology/cfu-ml-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CFU/mL Calculator',
    'meta' => ['title' => 'CFU/mL Calculator: Formula, Steps & Results', 'description' => 'A CFU/mL count comes from one plate: clumps form a single colony, so the count is colony-forming units, not cells. Free cfu/ml calculator: enter your values a', 'h1' => 'CFU/mL Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'colonies',
                            'label' => 'Colonies counted',
                            'type' => 'number',
                            'suffix' => 'CFU',
                            'help' => 'Countable range is 30–300',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '148',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Volume plated',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'help' => '0.1 mL for a spread plate',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.1',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution factor of the plated sample',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '10⁶ for a 10⁻⁶ dilution',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000000',
                        ],
                        [
                            'name' => 'cfu_ml',
                            'label' => 'CFU per mL',
                            'type' => 'number',
                            'suffix' => 'CFU/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cfu_log',
                            'label' => 'log₁₀(CFU/mL)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cfu_100',
                            'label' => 'CFU per 100 mL',
                            'type' => 'number',
                            'suffix' => 'CFU/100 mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Count',
            'results' => ['cfu_ml' => 'colonies/volume*dilution', 'cfu_log' => 'log10(colonies/volume*dilution)', 'cfu_100' => 'colonies/volume*dilution*100', 'dilution' => 'cfu_ml*volume/colonies'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Colonies counted, Volume plated and Dilution factor of the plated sample into CFU/mL and the answer comes back as CFU per mL and log₁₀(CFU/mL). Nothing is looked up on this page: CFU per mL is computed from Colonies counted and the other boxes, so an unusual pair of values gives an honest answer rather than an error. CFU per mL is opened in CFU/mL; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the CFU/mL calculator works', 'html' => <<<'TXT'
            <p>The CFU/mL calculator applies one relationship to 3 numbers and reports CFU per mL, log₁₀(CFU/mL) and CFU per 100 mL.</p><p>In the form&#039;s own words, CFU per mL = Colonies counted ÷ Volume plated × Dilution factor of the plated sample.</p><p>The result panel carries CFU per mL, log₁₀(CFU/mL) and CFU per 100 mL, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Colonies counted</strong> — in CFU. Countable range is 30–300</li><li><strong>Volume plated</strong> — in mL. 0.1 mL for a spread plate</li><li><strong>Dilution factor of the plated sample</strong> — in ×. 10⁶ for a 10⁻⁶ dilution</li></ul><p>The answers come back as CFU per mL in CFU/mL, log₁₀(CFU/mL), CFU per 100 mL in CFU/100 mL. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as CFU per mL is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>CFU per mL</strong> = <code>Colonies counted ÷ Volume plated × Dilution factor of the plated sample</code></li><li><strong>log₁₀(CFU/mL)</strong> = <code>log₁₀(Colonies counted ÷ Volume plated × Dilution factor of the plated sample)</code></li><li><strong>CFU per 100 mL</strong> = <code>Colonies counted ÷ Volume plated × Dilution factor of the plated sample × 100</code></li><li><strong>Dilution factor of the plated sample</strong> = <code>CFU per mL × Volume plated ÷ Colonies counted</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>CFU per mL</strong> = <code>Colonies counted ÷ Volume plated × Dilution factor of the plated sample</code> — the form to use when Colonies counted, Volume plated and Dilution factor of the plated sample are the values you have.</li><li><strong>log₁₀(CFU/mL)</strong> = <code>log₁₀(Colonies counted ÷ Volume plated × Dilution factor of the plated sample)</code> — the form to use when Colonies counted, Volume plated and Dilution factor of the plated sample are the values you have.</li><li><strong>CFU per 100 mL</strong> = <code>Colonies counted ÷ Volume plated × Dilution factor of the plated sample × 100</code> — the form to use when Colonies counted, Volume plated and Dilution factor of the plated sample are the values you have.</li><li><strong>Dilution factor of the plated sample</strong> = <code>CFU per mL × Volume plated ÷ Colonies counted</code> — the form to use when CFU per mL, Volume plated and Colonies counted are the values you have.</li></ul><p>Any one of CFU per mL, log₁₀(CFU/mL) and CFU per 100 mL can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> CFU per mL, log₁₀(CFU/mL) and CFU per 100 mL are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Colonies counted left as a guess.</strong> Anything typed into Colonies counted is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Volume plated left as a guess.</strong> Anything typed into Volume plated is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Dilution factor of the plated sample left as a guess.</strong> Anything typed into Dilution factor of the plated sample is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Colonies counted is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Colonies counted</strong> is measured in CFU. Countable range is 30–300. It feeds CFU per mL, log₁₀(CFU/mL) and CFU per 100 mL. Have it to hand before you start: Colonies counted is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Volume plated</strong> is measured in mL. 0.1 mL for a spread plate. It feeds CFU per mL, log₁₀(CFU/mL) and CFU per 100 mL. Have it to hand before you start: Volume plated is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Dilution factor of the plated sample</strong> is measured in ×. 10⁶ for a 10⁻⁶ dilution. It feeds CFU per mL, log₁₀(CFU/mL) and CFU per 100 mL. Have it to hand before you start: Dilution factor of the plated sample is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>CFU per mL</strong> is a plain number. It is worked out from Colonies counted, Volume plated and Dilution factor of the plated sample. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>log₁₀(CFU/mL)</strong> is a plain number. It is worked out from Colonies counted, Volume plated and Dilution factor of the plated sample. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>CFU per 100 mL</strong> is a plain number. It is worked out from Colonies counted, Volume plated and Dilution factor of the plated sample. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Colonies counted, Volume plated and Dilution factor of the plated sample. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Colonies counted into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare CFU per mL in CFU/mL with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind CFU per mL is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Colonies counted, Volume plated and Dilution factor of the plated sample are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Colonies counted, Volume plated and Dilution factor of the plated sample and the number you are missing is CFU per mL and log₁₀(CFU/mL).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/q10-temperature-coefficient">Q10 Temperature Coefficient Calculator</a>, <a href="/biology/qpcr-efficiency">qPCR efficiency Calculator</a> and <a href="/biology/quadrat-sampling-density">Quadrat Sampling Density Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from CFU/mL is a number to act on, so the useful question is what to do with CFU per mL (CFU/mL), log₁₀(CFU/mL) and CFU per 100 mL (CFU/100 mL) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Colonies counted, Volume plated and Dilution factor of the plated sample alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CFU/mL calculator work out?', 'a' => <<<'TXT'
            CFU per mL, log₁₀(CFU/mL) and CFU per 100 mL, from Colonies counted, Volume plated and Dilution factor of the plated sample. The relationship is CFU per mL = Colonies counted ÷ Volume plated × Dilution factor of the plated sample.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Colonies counted (CFU), Volume plated (mL), Dilution factor of the plated sample (×). Enter colonies, volume and dilution; CFU per mL is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of CFU per mL, log₁₀(CFU/mL), CFU per 100 mL and Dilution factor of the plated sample blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally CFU per mL is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Colonies counted left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. CFU per mL keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/q10-temperature-coefficient', 'name' => 'Q10 Temperature Coefficient Calculator'],
            ['path' => '/biology/qpcr-efficiency', 'name' => 'qPCR efficiency Calculator'],
            ['path' => '/biology/quadrat-sampling-density', 'name' => 'Quadrat Sampling Density Calculator'],
        ],
        'authors' => [],
    ],
];
