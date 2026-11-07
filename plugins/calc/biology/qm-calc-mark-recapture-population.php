<?php

/**
 * Mark–Recapture Population Calculator (Lincoln–Petersen)
 * /biology/mark-recapture-population
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mark–Recapture Population Calculator (Lincoln–Petersen)',
    'meta' => ['title' => 'Mark–Recapture Population Calculator — Biology', 'description' => 'Mark a sample, release it, catch a second sample and count how many are marked: the share of marked animals in the second sample estimates the share of the wh', 'h1' => 'Mark–Recapture Population Calculator (Lincoln–Petersen)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'marked',
                            'label' => 'Animals marked and released (M)',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'second',
                            'label' => 'Animals in the second sample (C)',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'recaptured',
                            'label' => 'Marked animals recaptured (R)',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '22',
                        ],
                        [
                            'name' => 'estimate',
                            'label' => 'Population estimate (Lincoln–Petersen)',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'chapman',
                            'label' => 'Chapman-corrected estimate',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'se',
                            'label' => 'Standard error',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'low',
                            'label' => '95% lower bound',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'high',
                            'label' => '95% upper bound',
                            'type' => 'number',
                            'suffix' => 'individuals',
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
            'title' => 'Estimate',
            'results' => [
                'estimate' => 'marked*second/recaptured',
                'chapman' => '(marked+1)*(second+1)/(recaptured+1)-1',
                'se' => '(marked+1)*(second+1)/(recaptured+1)-1*sqrt((marked-recaptured+1)*(second-recaptured+1)/((recaptured+1)*(recaptured+2)))',
                'low' => <<<'TXT'
                (marked+1)*(second+1)/(recaptured+1)-1-1.96*(marked+1)*(second+1)/(recaptured+1)*sqrt((marked-recaptured+1)*(second-recaptured+1)/((recaptured+1)*(recaptured+2)))
                TXT,
                'high' => <<<'TXT'
                (marked+1)*(second+1)/(recaptured+1)-1+1.96*(marked+1)*(second+1)/(recaptured+1)*sqrt((marked-recaptured+1)*(second-recaptured+1)/((recaptured+1)*(recaptured+2)))
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Animals marked and released (M), Animals in the second sample (C) and Marked animals recaptured (R) into Mark–Recapture Population Calculator (Lincoln–Petersen) and the answer comes back as Population estimate (Lincoln–Petersen) and Chapman-corrected estimate. It is a single relationship that reads Population estimate (Lincoln–Petersen) out of Animals marked and released (M), not a table of canned results keyed by them. Units for Population estimate (Lincoln–Petersen) default to individuals and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Mark–Recapture Population Calculator (Lincoln–Petersen) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Mark–Recapture Population Calculator (Lincoln–Petersen): it takes 3 numbers and reports Population estimate (Lincoln–Petersen), Chapman-corrected estimate and Standard error.</p><p>Written with the labels from the form, Population estimate (Lincoln–Petersen) = Animals marked and released (M) × Animals in the second sample (C) ÷ Marked animals recaptured (R).</p><p>The answers are Population estimate (Lincoln–Petersen), Chapman-corrected estimate, Standard error and 95% lower bound; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Animals marked and released (M)</strong> — in individuals</li><li><strong>Animals in the second sample (C)</strong> — in individuals</li><li><strong>Marked animals recaptured (R)</strong> — in individuals</li></ul><p>The result boxes are Population estimate (Lincoln–Petersen) in individuals, Chapman-corrected estimate in individuals, Standard error in individuals, 95% lower bound in individuals, 95% upper bound in individuals; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Animals marked and released (M) = 120 individuals, Animals in the second sample (C) = 100 individuals and Marked animals recaptured (R) = 22 individuals; the answers are &lt;strong&gt;Population estimate (Lincoln–Petersen)&lt;/strong&gt; = 545 individuals, &lt;strong&gt;Chapman-corrected estimate&lt;/strong&gt; = 530 individuals, &lt;strong&gt;Standard error&lt;/strong&gt; = 528 individuals, &lt;strong&gt;95% lower bound&lt;/strong&gt; = -3390 individuals and &lt;strong&gt;95% upper bound&lt;/strong&gt; = 4450 individuals.</p><ul><li><strong>Population estimate (Lincoln–Petersen)</strong> = 545 individuals</li><li><strong>Chapman-corrected estimate</strong> = 530 individuals</li><li><strong>Standard error</strong> = 528 individuals</li><li><strong>95% lower bound</strong> = -3390 individuals</li><li><strong>95% upper bound</strong> = 4450 individuals</li></ul><p>The line behind those figures is <strong>Population estimate (Lincoln–Petersen)</strong> = <code>Animals marked and released (M) × Animals in the second sample (C) ÷ Marked animals recaptured (R)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Population estimate (Lincoln–Petersen)&lt;/strong&gt; = 545, &lt;strong&gt;Chapman-corrected estimate&lt;/strong&gt; = 530, &lt;strong&gt;Standard error&lt;/strong&gt; = 528, &lt;strong&gt;95% lower bound&lt;/strong&gt; = -3390 and &lt;strong&gt;95% upper bound&lt;/strong&gt; = 4450. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Population estimate (Lincoln–Petersen) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Population estimate (Lincoln–Petersen)</strong> = <code>Animals marked and released (M) × Animals in the second sample (C) ÷ Marked animals recaptured (R)</code></li><li><strong>Chapman-corrected estimate</strong> = <code>(Animals marked and released (M) + 1) × (Animals in the second sample (C) + 1) ÷ (Marked animals recaptured (R) + 1) − 1</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Population estimate (Lincoln–Petersen)</strong> = <code>Animals marked and released (M) × Animals in the second sample (C) ÷ Marked animals recaptured (R)</code> — the form to use when Animals marked and released (M), Animals in the second sample (C) and Marked animals recaptured (R) are the values you have.</li><li><strong>Chapman-corrected estimate</strong> = <code>(Animals marked and released (M) + 1) × (Animals in the second sample (C) + 1) ÷ (Marked animals recaptured (R) + 1) − 1</code> — the form to use when Animals marked and released (M), Animals in the second sample (C) and Marked animals recaptured (R) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Population estimate (Lincoln–Petersen), Chapman-corrected estimate and Standard error can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Animals marked and released (M) from 120 to 240, leaving every other box alone. The panel moves from &lt;strong&gt;Population estimate (Lincoln–Petersen)&lt;/strong&gt; 545 individuals, &lt;strong&gt;Chapman-corrected estimate&lt;/strong&gt; 530 individuals, &lt;strong&gt;Standard error&lt;/strong&gt; 528 individuals, &lt;strong&gt;95% lower bound&lt;/strong&gt; -3390 individuals and &lt;strong&gt;95% upper bound&lt;/strong&gt; 4450 individuals to &lt;strong&gt;Population estimate (Lincoln–Petersen)&lt;/strong&gt; 1091 individuals, &lt;strong&gt;Chapman-corrected estimate&lt;/strong&gt; 1057 individuals, &lt;strong&gt;Standard error&lt;/strong&gt; 1053 individuals, &lt;strong&gt;95% lower bound&lt;/strong&gt; -10555 individuals and &lt;strong&gt;95% upper bound&lt;/strong&gt; 12670 individuals.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Population estimate (Lincoln–Petersen), Chapman-corrected estimate and Standard error are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Animals marked and released (M) left as a guess.</strong> Anything typed into Animals marked and released (M) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Animals in the second sample (C) left as a guess.</strong> Anything typed into Animals in the second sample (C) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Marked animals recaptured (R) left as a guess.</strong> Anything typed into Marked animals recaptured (R) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Animals marked and released (M) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Mark–Recapture Population Calculator (Lincoln–Petersen) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Animals marked and released (M)</strong> is measured in individuals. The page reads it when it works out Population estimate (Lincoln–Petersen), Chapman-corrected estimate and Standard error. Fill it from a measurement rather than a memory — Animals marked and released (M) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Animals in the second sample (C)</strong> is measured in individuals. The page reads it when it works out Population estimate (Lincoln–Petersen), Chapman-corrected estimate and Standard error. Fill it from a measurement rather than a memory — Animals in the second sample (C) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Marked animals recaptured (R)</strong> is measured in individuals. The page reads it when it works out Population estimate (Lincoln–Petersen), Chapman-corrected estimate and Standard error. Fill it from a measurement rather than a memory — Marked animals recaptured (R) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Population estimate (Lincoln–Petersen)</strong> is a plain number and the page's own defaults put it at 545. It is computed from Animals marked and released (M), Animals in the second sample (C) and Marked animals recaptured (R), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Chapman-corrected estimate</strong> is a plain number and the page's own defaults put it at 530. It is computed from Animals marked and released (M), Animals in the second sample (C) and Marked animals recaptured (R), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Standard error</strong> is a plain number and the page's own defaults put it at 528. It is computed from Animals marked and released (M), Animals in the second sample (C) and Marked animals recaptured (R), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>95% lower bound</strong> is a plain number and the page's own defaults put it at -3390. It is computed from Animals marked and released (M), Animals in the second sample (C) and Marked animals recaptured (R), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>95% upper bound</strong> is a plain number and the page's own defaults put it at 4450. It is computed from Animals marked and released (M), Animals in the second sample (C) and Marked animals recaptured (R), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Population estimate (Lincoln–Petersen) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Animals marked and released (M), Animals in the second sample (C) and Marked animals recaptured (R) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Animals marked and released (M), Animals in the second sample (C) and Marked animals recaptured (R) and the number you are missing is Population estimate (Lincoln–Petersen) and Chapman-corrected estimate.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/genetic-linkage-distance">Recombination to cM — Haldane &amp; Kosambi</a>, <a href="/biology/relatedness-coefficient">Relatedness Coefficient Calculator</a> and <a href="/biology/relative-abundance">Relative Abundance Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mark–Recapture Population Calculator (Lincoln–Petersen) calculator work out?', 'a' => <<<'TXT'
            Population estimate (Lincoln–Petersen), Chapman-corrected estimate, Standard error and 95% lower bound, from Animals marked and released (M), Animals in the second sample (C) and Marked animals recaptured (R). The relationship is Population estimate (Lincoln–Petersen) = Animals marked and released (M) × Animals in the second sample (C) ÷ Marked animals recaptured (R).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Animals marked and released (M) (individuals), Animals in the second sample (C) (individuals), Marked animals recaptured (R) (individuals). Fill marked, second and recaptured and leave Population estimate (Lincoln–Petersen) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Population estimate (Lincoln–Petersen), Chapman-corrected estimate, Standard error and 95% lower bound can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Population estimate (Lincoln–Petersen) = 545 individuals, Chapman-corrected estimate = 530 individuals, Standard error = 528 individuals, 95% lower bound = -3390 individuals and 95% upper bound = 4450 individuals. Those are the defaults written into the form — move Animals marked and released (M) and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Population estimate (Lincoln–Petersen) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Animals marked and released (M) blank and the page solves for it, reporting Population estimate (Lincoln–Petersen) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Population estimate (Lincoln–Petersen) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/genetic-linkage-distance', 'name' => 'Recombination to cM — Haldane & Kosambi'],
            ['path' => '/biology/relatedness-coefficient', 'name' => 'Relatedness Coefficient Calculator'],
            ['path' => '/biology/relative-abundance', 'name' => 'Relative Abundance Calculator'],
        ],
        'authors' => [],
    ],
];
