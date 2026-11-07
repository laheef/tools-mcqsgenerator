<?php

/**
 * Net Reproductive Rate Calculator (R₀)
 * /biology/net-reproductive-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net Reproductive Rate Calculator (R₀)',
    'meta' => ['title' => 'Net Reproductive Rate Calculator (R₀) — Biology', 'description' => <<<'TXT'
    Enter Probability a newborn reaches breeding age, Daughters per female per season and Breeding seasons per lifetime into Net Reproductive Rate Calculator (R₀)…
    TXT, 'h1' => 'Net Reproductive Rate Calculator (R₀)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'survival',
                            'label' => 'Probability a newborn reaches breeding age',
                            'type' => 'number',
                            'help' => '0–1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.6',
                        ],
                        [
                            'name' => 'fecundity',
                            'label' => 'Daughters per female per season',
                            'type' => 'number',
                            'suffix' => 'daughters',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3.2',
                        ],
                        [
                            'name' => 'seasons',
                            'label' => 'Breeding seasons per lifetime',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'interval',
                            'label' => 'Age at first reproduction',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'r0',
                            'label' => 'Net reproductive rate',
                            'type' => 'number',
                            'suffix' => 'daughters',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'generation',
                            'label' => 'Generation time',
                            'type' => 'number',
                            'suffix' => 'years',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'r',
                            'label' => 'Intrinsic rate of increase',
                            'type' => 'number',
                            'suffix' => 'per year',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'doubling',
                            'label' => 'Doubling time',
                            'type' => 'number',
                            'suffix' => 'years',
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
            'title' => 'Life table',
            'results' => ['r0' => 'survival*fecundity*seasons', 'generation' => 'interval+(seasons-1)*interval/2', 'r' => 'ln(max(0.000001,survival*fecundity*seasons))/max(0.5,interval)', 'doubling' => 'ln(2)/(ln(max(0.000001,survival*fecundity*seasons))/max(0.5,interval))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Probability a newborn reaches breeding age, Daughters per female per season and Breeding seasons per lifetime into Net Reproductive Rate Calculator (R₀) and the answer comes back as Net reproductive rate and Generation time. Nothing is looked up on this page: Net reproductive rate is computed from Probability a newborn reaches breeding age and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Net reproductive rate is opened in daughters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Net Reproductive Rate Calculator (R₀) calculator works', 'html' => <<<'TXT'
            <p>Net Reproductive Rate Calculator (R₀) answers one question from 4 numbers, and the answer is Net reproductive rate, Generation time and Intrinsic rate of increase.</p><p>Written with the labels from the form, Net reproductive rate = Probability a newborn reaches breeding age × Daughters per female per season × Breeding seasons per lifetime.</p><p>The result panel carries Net reproductive rate, Generation time, Intrinsic rate of increase and Doubling time, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Probability a newborn reaches breeding age</strong> — a plain number, no unit. 0–1</li><li><strong>Daughters per female per season</strong> — in daughters</li><li><strong>Breeding seasons per lifetime</strong> — a plain number, no unit</li><li><strong>Age at first reproduction</strong> — in years</li></ul><p>The result boxes are Net reproductive rate in daughters, Generation time in years, Intrinsic rate of increase in per year, Doubling time in years; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Probability a newborn reaches breeding age = 0.6, Daughters per female per season = 3.2 daughters, Breeding seasons per lifetime = 2 and Age at first reproduction = 1 years gives &lt;strong&gt;Net reproductive rate&lt;/strong&gt; = 3.84 daughters, &lt;strong&gt;Generation time&lt;/strong&gt; = 1.5 years, &lt;strong&gt;Intrinsic rate of increase&lt;/strong&gt; = 1.35 per year and &lt;strong&gt;Doubling time&lt;/strong&gt; = 0.5152 years.</p><ul><li><strong>Net reproductive rate</strong> = 3.84 daughters</li><li><strong>Generation time</strong> = 1.5 years</li><li><strong>Intrinsic rate of increase</strong> = 1.35 per year</li><li><strong>Doubling time</strong> = 0.5152 years</li></ul><p>That is <strong>Net reproductive rate</strong> = <code>Probability a newborn reaches breeding age × Daughters per female per season × Breeding seasons per lifetime</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Net reproductive rate&lt;/strong&gt; = 3.84, &lt;strong&gt;Generation time&lt;/strong&gt; = 1.5, &lt;strong&gt;Intrinsic rate of increase&lt;/strong&gt; = 1.35 and &lt;strong&gt;Doubling time&lt;/strong&gt; = 0.5152. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Net reproductive rate is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Net reproductive rate</strong> = <code>Probability a newborn reaches breeding age × Daughters per female per season × Breeding seasons per lifetime</code></li><li><strong>Generation time</strong> = <code>Age at first reproduction + (Breeding seasons per lifetime − 1) × Age at first reproduction ÷ 2</code></li><li><strong>Intrinsic rate of increase</strong> = <code>ln(max(0.000001,Probability a newborn reaches breeding age × Daughters per female per season × Breeding seasons per lifetime)) ÷ max(0.5,Age at first reproduction)</code></li><li><strong>Doubling time</strong> = <code>ln(2) ÷ (ln(max(0.000001,Probability a newborn reaches breeding age × Daughters per female per season × Breeding seasons per lifetime)) ÷ max(0.5,Age at first reproduction))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Net reproductive rate</strong> = <code>Probability a newborn reaches breeding age × Daughters per female per season × Breeding seasons per lifetime</code> — the form to use when Probability a newborn reaches breeding age, Daughters per female per season and Breeding seasons per lifetime are the values you have.</li><li><strong>Generation time</strong> = <code>Age at first reproduction + (Breeding seasons per lifetime − 1) × Age at first reproduction ÷ 2</code> — the form to use when Age at first reproduction and Breeding seasons per lifetime are the values you have.</li><li><strong>Intrinsic rate of increase</strong> = <code>ln(max(0.000001,Probability a newborn reaches breeding age × Daughters per female per season × Breeding seasons per lifetime)) ÷ max(0.5,Age at first reproduction)</code> — the form to use when Probability a newborn reaches breeding age, Daughters per female per season, Breeding seasons per lifetime and Age at first reproduction are the values you have.</li><li><strong>Doubling time</strong> = <code>ln(2) ÷ (ln(max(0.000001,Probability a newborn reaches breeding age × Daughters per female per season × Breeding seasons per lifetime)) ÷ max(0.5,Age at first reproduction))</code> — the form to use when Probability a newborn reaches breeding age, Daughters per female per season, Breeding seasons per lifetime and Age at first reproduction are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Net reproductive rate, Generation time and Intrinsic rate of increase can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Probability a newborn reaches breeding age, from 0.6 to 1.2 — and the answers go from &lt;strong&gt;Net reproductive rate&lt;/strong&gt; 3.84 daughters, &lt;strong&gt;Generation time&lt;/strong&gt; 1.5 years, &lt;strong&gt;Intrinsic rate of increase&lt;/strong&gt; 1.35 per year and &lt;strong&gt;Doubling time&lt;/strong&gt; 0.5152 years to &lt;strong&gt;Net reproductive rate&lt;/strong&gt; 7.68 daughters, &lt;strong&gt;Generation time&lt;/strong&gt; 1.5 years, &lt;strong&gt;Intrinsic rate of increase&lt;/strong&gt; 2.04 per year and &lt;strong&gt;Doubling time&lt;/strong&gt; 0.34 years.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Net reproductive rate, Generation time and Intrinsic rate of increase are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Probability a newborn reaches breeding age left as a guess.</strong> Anything typed into Probability a newborn reaches breeding age is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Daughters per female per season left as a guess.</strong> Anything typed into Daughters per female per season is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Breeding seasons per lifetime left as a guess.</strong> Anything typed into Breeding seasons per lifetime is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Probability a newborn reaches breeding age to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Net Reproductive Rate Calculator (R₀) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Probability a newborn reaches breeding age</strong> takes a plain number with no unit attached. Change it and Net reproductive rate, Intrinsic rate of increase and Doubling time changes with it. Fill it from a measurement rather than a memory — Probability a newborn reaches breeding age is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Daughters per female per season</strong> is measured in daughters. Change it and Net reproductive rate, Intrinsic rate of increase and Doubling time changes with it. Fill it from a measurement rather than a memory — Daughters per female per season is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Breeding seasons per lifetime</strong> takes a plain number with no unit attached. Change it and Net reproductive rate, Generation time and Intrinsic rate of increase changes with it. Fill it from a measurement rather than a memory — Breeding seasons per lifetime is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Age at first reproduction</strong> is measured in years. Change it and Generation time, Intrinsic rate of increase and Doubling time changes with it. Fill it from a measurement rather than a memory — Age at first reproduction is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Net reproductive rate</strong> is a plain number and the page's own defaults put it at 3.84. It is worked out from Probability a newborn reaches breeding age, Daughters per female per season and Breeding seasons per lifetime. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Generation time</strong> is a plain number and the page's own defaults put it at 1.5. It is worked out from Age at first reproduction and Breeding seasons per lifetime. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Intrinsic rate of increase</strong> is a plain number and the page's own defaults put it at 1.35. It is worked out from Probability a newborn reaches breeding age, Daughters per female per season, Breeding seasons per lifetime and Age at first reproduction. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Doubling time</strong> is a plain number and the page's own defaults put it at 0.5152. It is worked out from Probability a newborn reaches breeding age, Daughters per female per season, Breeding seasons per lifetime and Age at first reproduction. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Net reproductive rate is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Probability a newborn reaches breeding age, Daughters per female per season and Breeding seasons per lifetime and the number you are missing is Net reproductive rate and Generation time.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/acid-base-balance">Acid–Base Balance (ABG) Calculator</a>, <a href="/biology/acres-per-hour">Acres per hour Calculator</a> and <a href="/biology/specimen-size-from-image">Actual Specimen Size from Image Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net Reproductive Rate Calculator (R₀) calculator work out?', 'a' => <<<'TXT'
            Net reproductive rate, Generation time, Intrinsic rate of increase and Doubling time, from Probability a newborn reaches breeding age, Daughters per female per season and Breeding seasons per lifetime. The relationship is Net reproductive rate = Probability a newborn reaches breeding age × Daughters per female per season × Breeding seasons per lifetime.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Probability a newborn reaches breeding age, Daughters per female per season (daughters), Breeding seasons per lifetime, Age at first reproduction (years). Fill survival, fecundity and seasons and leave Net reproductive rate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Net reproductive rate, Generation time, Intrinsic rate of increase and Doubling time can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Net reproductive rate = 3.84 daughters, Generation time = 1.5 years, Intrinsic rate of increase = 1.35 per year and Doubling time = 0.5152 years. The figures come from Probability a newborn reaches breeding age as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Net reproductive rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Probability a newborn reaches breeding age blank and the page solves for it, reporting Net reproductive rate instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Net reproductive rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/acid-base-balance', 'name' => 'Acid–Base Balance (ABG) Calculator'],
            ['path' => '/biology/acres-per-hour', 'name' => 'Acres per hour Calculator'],
            ['path' => '/biology/specimen-size-from-image', 'name' => 'Actual Specimen Size from Image Calculator'],
        ],
        'authors' => [],
    ],
];
