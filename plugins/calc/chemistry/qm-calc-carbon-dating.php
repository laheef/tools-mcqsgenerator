<?php

/**
 * Radiocarbon Dating Calculator
 * /chemistry/carbon-dating
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Radiocarbon Dating Calculator',
    'meta' => ['title' => 'Radiocarbon Dating Calculator: Age From Activity', 'description' => 'Turn a sample\'s residual carbon-14 activity into an age in years, with the fraction of modern carbon still in it and the number of half-lives that implies.', 'h1' => 'Radiocarbon Dating Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'measured_activity',
                    'label' => 'Activity of the sample',
                    'type' => 'number',
                    'suffix' => 'dpm/g',
                    'default' => '3.4',
                    'help' => 'Disintegrations per minute per gram of carbon, corrected for background',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'modern_activity',
                    'label' => 'Activity of modern carbon',
                    'type' => 'number',
                    'suffix' => 'dpm/g',
                    'default' => '13.6',
                    'help' => '13.6 dpm/g is the standard for living material',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'half_life',
                    'label' => 'Half-life of carbon-14',
                    'type' => 'number',
                    'suffix' => 'years',
                    'default' => '5730',
                    'help' => '5 730 years is the Libby value in everyday use',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'age',
                    'label' => 'Age of the sample',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'years',
                ],
                [
                    'name' => 'fraction_modern',
                    'label' => 'Fraction of modern carbon',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'half_lives',
                    'label' => 'Half-lives elapsed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Radiocarbon Dating',
            'results' => [
                'age' => 'half_life*log(modern_activity/measured_activity)/log(2)',
                'fraction_modern' => 'measured_activity/modern_activity*100',
                'half_lives' => 'log(modern_activity/measured_activity)/log(2)',
                'measured_activity' => 'modern_activity*exp(-log(2)*age/half_life)',
                'modern_activity' => 'measured_activity*exp(log(2)*age/half_life)',
                'half_life' => 'age*log(2)/log(modern_activity/measured_activity)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Living things hold carbon-14 at the modern level; when they die it decays with a 5 730 year half-life. The age follows from the ratio of what is left to what a modern sample holds: <strong>t = t½ · ln(A₀ ÷ A) ÷ ln 2</strong>.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Radiocarbon dating works because the carbon in a living organism is continuously exchanged with the atmosphere, and stops being exchanged at death. From that moment the carbon-14 fraction falls on a clock that nothing chemical can reset.</p><p>The page reports <strong>age of the sample and fraction of modern carbon and half-lives elapsed</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Age of the sample</strong></td><td><code>Half-life of carbon-14 × ln(Activity of modern carbon ÷ Activity of the sample) ÷ ln(2)</code></td></tr><tr><td><strong>Fraction of modern carbon</strong></td><td><code>Activity of the sample ÷ Activity of modern carbon × 100</code></td></tr><tr><td><strong>Half-lives elapsed</strong></td><td><code>ln(Activity of modern carbon ÷ Activity of the sample) ÷ ln(2)</code></td></tr><tr><td><strong>Activity of the sample</strong></td><td><code>Activity of modern carbon × exp(-ln(2) × Age of the sample ÷ Half-life of carbon-14)</code></td></tr><tr><td><strong>Activity of modern carbon</strong></td><td><code>Activity of the sample × exp(ln(2) × Age of the sample ÷ Half-life of carbon-14)</code></td></tr><tr><td><strong>Half-life of carbon-14</strong></td><td><code>Age of the sample × ln(2) ÷ ln(Activity of modern carbon ÷ Activity of the sample)</code></td></tr></tbody></table><p><p>The ratio carries the whole calculation: half the modern activity is one half-life, a quarter is two, and an eighth is three. Only when that ratio gets close to the measurement's own uncertainty does the date stop being useful.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports age of the sample and fraction of modern carbon and half-lives elapsed.</p><ul><li><strong>Activity of the sample</strong> — in dpm/g. Disintegrations per minute per gram of carbon, corrected for background</li><li><strong>Activity of modern carbon</strong> — in dpm/g. 13.6 dpm/g is the standard for living material</li><li><strong>Half-life of carbon-14</strong> — in years. 5 730 years is the Libby value in everyday use</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Age of the sample</strong> — in years</li><li><strong>Fraction of modern carbon</strong> — in %</li><li><strong>Half-lives elapsed</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Activity of the sample = 3.4 dpm/g, Activity of modern carbon = 13.6 dpm/g, Half-life of carbon-14 = 5 730 years — and the results panel reads:</p><ul><li><strong>Age of the sample</strong> = <code>Half-life of carbon-14 × ln(Activity of modern carbon ÷ Activity of the sample) ÷ ln(2)</code> = <strong>11 460 years</strong></li><li><strong>Fraction of modern carbon</strong> = <code>Activity of the sample ÷ Activity of modern carbon × 100</code> = <strong>25 %</strong></li><li><strong>Half-lives elapsed</strong> = <code>ln(Activity of modern carbon ÷ Activity of the sample) ÷ ln(2)</code> = <strong>2</strong></li></ul><p>With the numbers written into the formula, the first result is <code>5 730 × log(13.6 ÷ 3.4) ÷ log(2) = 11 460</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A sample at 3.4 dpm/g against a modern 13.6 is exactly a quarter, so two half-lives have passed and the sample is 11 460 years old. A reading of 6.8 dpm/g would be half-modern and 5 730 years old.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>The method runs out at about forty thousand years, where less than one per cent of the original carbon-14 remains and contamination by modern carbon dominates. Near that limit the error bar, not the age, is the interesting number.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Age of the sample</th><th>Fraction of modern carbon</th><th>Half-lives elapsed</th></tr></thead><tbody><tr><td><strong>Activity of the sample</strong> +10 %</td><td>−6.88 %</td><td>+10 %</td><td>−6.88 %</td></tr><tr><td><strong>Activity of modern carbon</strong> +10 %</td><td>+6.88 %</td><td>−9.09 %</td><td>+6.88 %</td></tr><tr><td><strong>Half-life of carbon-14</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Half-life of carbon-14</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Activity of modern carbon</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Activity of the sample = 6.8, Activity of modern carbon = 13.6, Half-life of carbon-14 = 5 730, the page reports <strong>Age of the sample</strong> = 5 730 years, <strong>Fraction of modern carbon</strong> = 50 %, <strong>Half-lives elapsed</strong> = 1. Half of modern activity is 5 730 years — the textbook one-half-life case.</li><li>With Activity of the sample = 1.7, Activity of modern carbon = 13.6, Half-life of carbon-14 = 5 730, the page reports <strong>Age of the sample</strong> = 17 190 years, <strong>Fraction of modern carbon</strong> = 12.5 %, <strong>Half-lives elapsed</strong> = 3. An eighth of modern activity is three half-lives: 17 190 years.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Modern activity assumed constant.</strong> Atmospheric testing and fossil fuel burning moved it by several per cent, which is what calibration curves correct for.</li><li><strong>Contamination by modern carbon.</strong> A fingerprint's worth of handling makes a very old sample look younger, which is why samples are cleaned so aggressively.</li><li><strong>The Libby half-life used as the answer.</strong> The measured value is 5 700 ± 30 years; the 5 730 figure is the conventional one that calibration curves are built around.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Age of the sample (years), Fraction of modern carbon (%), Half-lives elapsed.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Both activities must be in the same unit — disintegrations per minute per gram is the convention — and the half-life in years, which makes the age come back in years.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need activity of the sample and activity of modern carbon and half-life of carbon-14. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Age of the sample and fraction of modern carbon and half-lives elapsed should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Activity of the sample</strong> ×10</td><td>11 460</td><td>-7 574.648</td><td>×-0.661</td></tr><tr><td><strong>Activity of modern carbon</strong> ×10</td><td>11 460</td><td>30 494.648</td><td>×2.661</td></tr><tr><td><strong>Half-life of carbon-14</strong> ×10</td><td>11 460</td><td>114 600</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Organic material only.</strong> The method needs carbon fixed by a living organism: bone, wood, charcoal, shell. It cannot date stone or metal.</li><li><strong>It assumes a closed system.</strong> Carbon exchanged with groundwater or carbonates after burial shifts the age.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Dating archaeological wood, charcoal and bone.</li></li><li><li>Checking whether a sample is authentically old.</li></li><li><li>Converting museum activities into an age for a display.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/radioactive-decay">Radioactive decay</a> <a href="/chemistry/half-life">Half-life</a> <a href="/chemistry/rate-constant">Rate constant</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Radiocarbon Dating calculator work out?', 'a' => <<<'TXT'
            It returns age of the sample and fraction of modern carbon and half-lives elapsed from activity of the sample and activity of modern carbon and half-life of carbon-14. The relationship is Half-life of carbon-14 × ln(Activity of modern carbon ÷ Activity of the sample) ÷ ln(2).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Activity of the sample (dpm/g), Activity of modern carbon (dpm/g), Half-life of carbon-14 (years). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: activity of the sample in dpm/g; activity of modern carbon in dpm/g; half-life of carbon-14 in years. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is the half-life 5 730 years and not 5 700?', 'a' => '5 730 is Libby\'s original value, kept because the calibration curves used by archaeologists are built on it. The modern measurement is about 5 700 years.'],
            ['q' => 'How old can something be dated?', 'a' => 'In practice about 40 000 to 50 000 years. Beyond that so little carbon-14 is left that background and contamination swamp the signal.'],
        ],
        'related' => [
            ['path' => '/chemistry/radioactive-decay', 'name' => 'Radioactive decay'],
            ['path' => '/chemistry/half-life', 'name' => 'Half-life'],
            ['path' => '/chemistry/rate-constant', 'name' => 'Rate constant'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
