<?php

/**
 * Odds Ratio Calculator for Genetics
 * /biology/genetic-odds-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Odds Ratio Calculator for Genetics',
    'meta' => ['title' => 'Odds Ratio Calculator for Genetics Calculator', 'description' => 'Odds Ratio Calculator for Genetics works out 95% confidence, lower and 95% confidence, upper from cases with the variant and cases without the variant.', 'h1' => 'Odds Ratio Calculator for Genetics', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a',
                            'label' => 'Cases with the variant',
                            'type' => 'number',
                            'help' => 'Exposed cases',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'b',
                            'label' => 'Cases without the variant',
                            'type' => 'number',
                            'help' => 'Unexposed cases',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'c',
                            'label' => 'Controls with the variant',
                            'type' => 'number',
                            'help' => 'Exposed controls',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'dd',
                            'label' => 'Controls without the variant',
                            'type' => 'number',
                            'help' => 'Unexposed controls',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                        [
                            'name' => 'odds_ratio',
                            'label' => 'Odds ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ci_low',
                            'label' => '95% confidence, lower',
                            'type' => 'number',
                            'help' => 'Woolf interval',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ci_high',
                            'label' => '95% confidence, upper',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'relative_risk',
                            'label' => 'Relative risk',
                            'type' => 'number',
                            'help' => 'Cases ÷ controls risk',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'case_pct',
                            'label' => 'Variant frequency in cases',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'control_pct',
                            'label' => 'Variant frequency in controls',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Association',
            'results' => [
                'odds_ratio' => '(a/c)/(b/dd)',
                'case_pct' => 'a/(a+b)*100',
                'control_pct' => 'c/(c+dd)*100',
                'relative_risk' => '(a/(a+b))/(c/(c+dd))',
                'ci_low' => 'exp(ln((a/c)/(b/dd))-1.96*sqrt(1/a+1/b+1/c+1/dd))',
                'ci_high' => 'exp(ln((a/c)/(b/dd))+1.96*sqrt(1/a+1/b+1/c+1/dd))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Odds Ratio Calculator for Genetics works out Odds ratio and 95% confidence, lower from Cases with the variant, Cases without the variant and Controls with the variant. It is a single relationship that reads odds ratio out of cases with the variant, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Odds Ratio Calculator for Genetics calculator works', 'html' => <<<'TXT'
            <p>The Odds Ratio Calculator for Genetics calculator applies one relationship to 4 numbers and reports Odds ratio, 95% confidence, lower and 95% confidence, upper.</p><p>Written with the labels from the form, Odds ratio = (Cases with the variant ÷ Controls with the variant) ÷ (Cases without the variant ÷ Controls without the variant).</p><p>The result panel carries Odds ratio, 95% confidence, lower, 95% confidence, upper and Relative risk, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Cases with the variant</strong> — a plain number, no unit. Exposed cases</li><li><strong>Cases without the variant</strong> — a plain number, no unit. Unexposed cases</li><li><strong>Controls with the variant</strong> — a plain number, no unit. Exposed controls</li><li><strong>Controls without the variant</strong> — a plain number, no unit. Unexposed controls</li></ul><p>What you get back is Odds ratio, 95% confidence, lower, 95% confidence, upper, Relative risk, Variant frequency in cases in %, Variant frequency in controls in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Cases with the variant = 60, Cases without the variant = 40, Controls with the variant = 30 and Controls without the variant = 70 — through the same formula and the panel reports <strong>Odds ratio</strong> = 3.5, <strong>Variant frequency in cases</strong> = 60 %, <strong>Variant frequency in controls</strong> = 30 %, <strong>Relative risk</strong> = 2, <strong>95% confidence, lower</strong> = 1.95 and <strong>95% confidence, upper</strong> = 6.29.</p><ul><li><strong>Odds ratio</strong> = 3.5</li><li><strong>Variant frequency in cases</strong> = 60 %</li><li><strong>Variant frequency in controls</strong> = 30 %</li><li><strong>Relative risk</strong> = 2</li><li><strong>95% confidence, lower</strong> = 1.95</li><li><strong>95% confidence, upper</strong> = 6.29</li></ul><p>The line behind those figures is <strong>Odds ratio</strong> = <code>(Cases with the variant ÷ Controls with the variant) ÷ (Cases without the variant ÷ Controls without the variant)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Odds ratio</strong> = 3.5, <strong>Variant frequency in cases</strong> = 60, <strong>Variant frequency in controls</strong> = 30, <strong>Relative risk</strong> = 2, <strong>95% confidence, lower</strong> = 1.95 and <strong>95% confidence, upper</strong> = 6.29. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Odds ratio is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Odds ratio</strong> = <code>(Cases with the variant ÷ Controls with the variant) ÷ (Cases without the variant ÷ Controls without the variant)</code></li><li><strong>Variant frequency in cases</strong> = <code>Cases with the variant ÷ (Cases with the variant + Cases without the variant) × 100</code></li><li><strong>Variant frequency in controls</strong> = <code>Controls with the variant ÷ (Controls with the variant + Controls without the variant) × 100</code></li><li><strong>Relative risk</strong> = <code>(Cases with the variant ÷ (Cases with the variant + Cases without the variant)) ÷ (Controls with the variant ÷ (Controls with the variant + Controls without the variant))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Odds ratio</strong> = <code>(Cases with the variant ÷ Controls with the variant) ÷ (Cases without the variant ÷ Controls without the variant)</code> — the form to use when Cases with the variant, Controls with the variant, Cases without the variant and Controls without the variant are the values you have.</li><li><strong>Variant frequency in cases</strong> = <code>Cases with the variant ÷ (Cases with the variant + Cases without the variant) × 100</code> — the form to use when Cases with the variant and Cases without the variant are the values you have.</li><li><strong>Variant frequency in controls</strong> = <code>Controls with the variant ÷ (Controls with the variant + Controls without the variant) × 100</code> — the form to use when Controls with the variant and Controls without the variant are the values you have.</li><li><strong>Relative risk</strong> = <code>(Cases with the variant ÷ (Cases with the variant + Cases without the variant)) ÷ (Controls with the variant ÷ (Controls with the variant + Controls without the variant))</code> — the form to use when Cases with the variant, Cases without the variant, Controls with the variant and Controls without the variant are the values you have.</li></ul><p>Any one of Odds ratio, Variant frequency in cases and Variant frequency in controls can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Cases with the variant from 60 to 120, leaving every other box alone. The panel moves from <strong>Odds ratio</strong> 3.5, <strong>Variant frequency in cases</strong> 60 %, <strong>Variant frequency in controls</strong> 30 %, <strong>Relative risk</strong> 2, <strong>95% confidence, lower</strong> 1.95 and <strong>95% confidence, upper</strong> 6.29 to <strong>Odds ratio</strong> 7, <strong>Variant frequency in cases</strong> 75 %, <strong>Variant frequency in controls</strong> 30 %, <strong>Relative risk</strong> 2.5, <strong>95% confidence, lower</strong> 4.01 and <strong>95% confidence, upper</strong> 12.23.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Odds ratio, 95% confidence, lower and 95% confidence, upper are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cases with the variant left as a guess.</strong> Anything typed into Cases with the variant is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Cases without the variant left as a guess.</strong> Anything typed into Cases without the variant is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Controls with the variant left as a guess.</strong> Anything typed into Controls with the variant is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Cases with the variant and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Odds Ratio Calculator for Genetics form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Cases with the variant</strong> takes a plain number with no unit attached. Exposed cases. The page reads it when it works out Odds ratio, Variant frequency in cases and Relative risk. Fill it from a measurement rather than a memory — Cases with the variant is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cases without the variant</strong> takes a plain number with no unit attached. Unexposed cases. The page reads it when it works out Odds ratio, Variant frequency in cases and Relative risk. Fill it from a measurement rather than a memory — Cases without the variant is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Controls with the variant</strong> takes a plain number with no unit attached. Exposed controls. The page reads it when it works out Odds ratio, Variant frequency in controls and Relative risk. Fill it from a measurement rather than a memory — Controls with the variant is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Controls without the variant</strong> takes a plain number with no unit attached. Unexposed controls. The page reads it when it works out Odds ratio, Variant frequency in controls and Relative risk. Fill it from a measurement rather than a memory — Controls without the variant is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Odds ratio</strong> is a plain number and the page's own defaults put it at 3.5. It is worked out from Cases with the variant, Controls with the variant, Cases without the variant and Controls without the variant. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>95% confidence, lower</strong> is a plain number and the page's own defaults put it at 1.95. It is worked out from Cases with the variant, Controls with the variant, Cases without the variant and Controls without the variant. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>95% confidence, upper</strong> is a plain number and the page's own defaults put it at 6.29. It is worked out from Cases with the variant, Controls with the variant, Cases without the variant and Controls without the variant. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Relative risk</strong> is a plain number and the page's own defaults put it at 2. It is worked out from Cases with the variant, Cases without the variant, Controls with the variant and Controls without the variant. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Variant frequency in cases</strong> is a plain number and the page's own defaults put it at 60. It is worked out from Cases with the variant and Cases without the variant. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Variant frequency in controls</strong> is a plain number and the page's own defaults put it at 30. It is worked out from Controls with the variant and Controls without the variant. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Odds ratio is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cases with the variant, Cases without the variant and Controls with the variant are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cases with the variant, Cases without the variant and Controls with the variant and the number you are missing is Odds ratio and 95% confidence, lower.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/od600-to-cell-density">OD600 to Cell Density Calculator</a>, <a href="/biology/oligo-converter">Oligo pmol/µL to µg/mL Converter Calculator — Formula &amp; Result</a> and <a href="/biology/oligo-tm-calculator">Oligo Tm (Melting Temperature) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Odds Ratio Calculator for Genetics calculator work out?', 'a' => <<<'TXT'
            Odds ratio, 95% confidence, lower, 95% confidence, upper and Relative risk, from Cases with the variant, Controls with the variant, Cases without the variant and Controls without the variant. The relationship is Odds ratio = (Cases with the variant ÷ Controls with the variant) ÷ (Cases without the variant ÷ Controls without the variant).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Cases with the variant, Cases without the variant, Controls with the variant, Controls without the variant. With cases with the variant, cases without the variant and controls with the variant in place, Odds ratio can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Odds ratio, Variant frequency in cases, Variant frequency in controls and Relative risk blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Odds ratio = 3.5, Variant frequency in cases = 60 %, Variant frequency in controls = 30 %, Relative risk = 2, 95% confidence, lower = 1.95 and 95% confidence, upper = 6.29. That comes from the page's own defaults, entered in Cases with the variant; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Odds ratio is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cases with the variant blank and the page solves for it, reporting Odds ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Odds ratio at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/od600-to-cell-density', 'name' => 'OD600 to Cell Density Calculator'],
            ['path' => '/biology/oligo-converter', 'name' => 'Oligo pmol/µL to µg/mL Converter Calculator — Formula & Result'],
            ['path' => '/biology/oligo-tm-calculator', 'name' => 'Oligo Tm (Melting Temperature) Calculator'],
        ],
        'authors' => [],
    ],
];
