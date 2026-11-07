<?php

/**
 * Specific Productivity Calculator (qP)
 * /biology/specific-productivity-qp
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Specific Productivity Calculator (qP)',
    'meta' => ['title' => 'Specific Productivity Calculator (qP) — Biology', 'description' => 'Specific Productivity Calculator (qP) works out specific productivity and Total product per batch from product titre, Viable cell density and Production phase.', 'h1' => 'Specific Productivity Calculator (qP)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'titre',
                            'label' => 'Product titre',
                            'type' => 'number',
                            'suffix' => 'g/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.5',
                        ],
                        [
                            'name' => 'vcd',
                            'label' => 'Viable cell density',
                            'type' => 'number',
                            'suffix' => '10⁶/mL',
                            'help' => 'Time-weighted average, not the peak',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'days',
                            'label' => 'Production phase',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Working volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2000',
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Target titre',
                            'type' => 'number',
                            'suffix' => 'g/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4.0',
                        ],
                        [
                            'name' => 'qp',
                            'label' => 'Specific productivity',
                            'type' => 'number',
                            'suffix' => 'pg/cell/d',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total product per batch',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_litre_day',
                            'label' => 'Volumetric productivity',
                            'type' => 'number',
                            'suffix' => 'g/L/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'days_needed',
                            'label' => 'Days needed for the target titre',
                            'type' => 'number',
                            'suffix' => 'days',
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
            'title' => 'Productivity',
            'results' => ['qp' => 'titre/(vcd*days)*1000', 'total' => 'titre*volume', 'per_litre_day' => 'titre/days', 'days_needed' => 'target/(titre/days)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Specific Productivity Calculator (qP) works out Specific productivity and Total product per batch from Product titre, Viable cell density and Production phase. Nothing is looked up on this page: specific productivity is computed from product titre and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Specific productivity is opened in pg/cell/d; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Specific Productivity Calculator (qP) calculator works', 'html' => <<<'TXT'
            <p>The Specific Productivity Calculator (qP) calculator applies one relationship to 5 numbers and reports Specific productivity, Total product per batch and Volumetric productivity.</p><p>The relationship it solves reads Specific productivity = Product titre ÷ (Viable cell density × Production phase) × 1000.</p><p>The answers are Specific productivity, Total product per batch, Volumetric productivity and Days needed for the target titre; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Product titre</strong> — in g/L</li><li><strong>Viable cell density</strong> — in 10⁶/mL. Time-weighted average, not the peak</li><li><strong>Production phase</strong> — in days</li><li><strong>Working volume</strong> — in L</li><li><strong>Target titre</strong> — in g/L</li></ul><p>The answers come back as Specific productivity in pg/cell/d, Total product per batch in g, Volumetric productivity in g/L/day, Days needed for the target titre in days. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Product titre = 2.5 g/L, Viable cell density = 12 10⁶/mL, Production phase = 10 days, Working volume = 2000 L and Target titre = 4 g/L; the answers are <strong>Specific productivity</strong> = 20.83 pg/cell/d, <strong>Total product per batch</strong> = 5000 g, <strong>Volumetric productivity</strong> = 0.25 g/L/day and <strong>Days needed for the target titre</strong> = 16 days.</p><ul><li><strong>Specific productivity</strong> = 20.83 pg/cell/d</li><li><strong>Total product per batch</strong> = 5000 g</li><li><strong>Volumetric productivity</strong> = 0.25 g/L/day</li><li><strong>Days needed for the target titre</strong> = 16 days</li></ul><p>The line behind those figures is <strong>Specific productivity</strong> = <code>Product titre ÷ (Viable cell density × Production phase) × 1000</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Specific productivity</strong> = 20.83, <strong>Total product per batch</strong> = 5000, <strong>Volumetric productivity</strong> = 0.25 and <strong>Days needed for the target titre</strong> = 16. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Specific productivity is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Specific productivity</strong> = <code>Product titre ÷ (Viable cell density × Production phase) × 1000</code></li><li><strong>Total product per batch</strong> = <code>Product titre × Working volume</code></li><li><strong>Volumetric productivity</strong> = <code>Product titre ÷ Production phase</code></li><li><strong>Days needed for the target titre</strong> = <code>Target titre ÷ (Product titre ÷ Production phase)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Specific productivity</strong> = <code>Product titre ÷ (Viable cell density × Production phase) × 1000</code> — the form to use when Product titre, Viable cell density and Production phase are the values you have.</li><li><strong>Total product per batch</strong> = <code>Product titre × Working volume</code> — the form to use when Product titre and Working volume are the values you have.</li><li><strong>Volumetric productivity</strong> = <code>Product titre ÷ Production phase</code> — the form to use when Product titre and Production phase are the values you have.</li><li><strong>Days needed for the target titre</strong> = <code>Target titre ÷ (Product titre ÷ Production phase)</code> — the form to use when Target titre, Product titre and Production phase are the values you have.</li></ul><p>Any one of Specific productivity, Total product per batch and Volumetric productivity can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Product titre, from 2.5 to 5 — and the answers go from <strong>Specific productivity</strong> 20.83 pg/cell/d, <strong>Total product per batch</strong> 5000 g, <strong>Volumetric productivity</strong> 0.25 g/L/day and <strong>Days needed for the target titre</strong> 16 days to <strong>Specific productivity</strong> 41.67 pg/cell/d, <strong>Total product per batch</strong> 10000 g, <strong>Volumetric productivity</strong> 0.5 g/L/day and <strong>Days needed for the target titre</strong> 8 days.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Specific productivity, Total product per batch and Volumetric productivity are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Product titre left as a guess.</strong> Anything typed into Product titre is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Viable cell density left as a guess.</strong> Anything typed into Viable cell density is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Production phase left as a guess.</strong> Anything typed into Production phase is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Product titre to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Specific Productivity Calculator (qP) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Product titre</strong> is measured in g/L. It feeds Specific productivity, Total product per batch and Volumetric productivity. Fill it from a measurement rather than a memory — Product titre is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Viable cell density</strong> is measured in 10⁶/mL. Time-weighted average, not the peak. It feeds Specific productivity. Fill it from a measurement rather than a memory — Viable cell density is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Production phase</strong> is measured in days. It feeds Specific productivity, Volumetric productivity and Days needed for the target titre. Fill it from a measurement rather than a memory — Production phase is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Working volume</strong> is measured in L. It feeds Total product per batch. Fill it from a measurement rather than a memory — Working volume is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Target titre</strong> is measured in g/L. It feeds Days needed for the target titre. Fill it from a measurement rather than a memory — Target titre is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Specific productivity</strong> is a plain number and the page's own defaults put it at 20.83. It is worked out from Product titre, Viable cell density and Production phase. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total product per batch</strong> is a plain number and the page's own defaults put it at 5000. It is worked out from Product titre and Working volume. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Volumetric productivity</strong> is a plain number and the page's own defaults put it at 0.25. It is worked out from Product titre and Production phase. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Days needed for the target titre</strong> is a plain number and the page's own defaults put it at 16. It is worked out from Target titre, Product titre and Production phase. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Specific productivity</th><th>Total product per batch</th><th>Volumetric productivity</th><th>Days needed for the target titre</th></tr></thead><tbody><tr><td><strong>Product titre</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>-9.09%</td></tr><tr><td><strong>Viable cell density</strong> +10%</td><td>-9.09%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Production phase</strong> +10%</td><td>-9.09%</td><td>+0%</td><td>-9.09%</td><td>+10%</td></tr><tr><td><strong>Working volume</strong> +10%</td><td>+0%</td><td>+10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Target titre</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Product titre: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Product titre = 1.25 g/L, Viable cell density = 6 10⁶/mL, Production phase = 5 days, Working volume = 1000 L and Target titre = 2 g/L and the page reports <strong>Specific productivity</strong> = 41.67 pg/cell/d, <strong>Total product per batch</strong> = 1250 g, <strong>Volumetric productivity</strong> = 0.25 g/L/day and <strong>Days needed for the target titre</strong> = 8 days.</li><li>Feed in Product titre = 7.5 g/L, Viable cell density = 12 10⁶/mL, Production phase = 10 days, Working volume = 2000 L and Target titre = 4 g/L and the page reports <strong>Specific productivity</strong> = 62.5 pg/cell/d, <strong>Total product per batch</strong> = 15000 g, <strong>Volumetric productivity</strong> = 0.75 g/L/day and <strong>Days needed for the target titre</strong> = 5.33 days.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Specific productivity is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Product titre, Viable cell density and Production phase are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Product titre, Viable cell density and Production phase and the number you are missing is Specific productivity and Total product per batch.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/centimorgan-to-percentage">Centimorgan to Percentage Calculator</a>, <a href="/biology/centrifuge-rcf-rpm">Centrifuge RCF to RPM Converter Calculator</a> and <a href="/biology/cephalexin-for-cats-dosage">Cephalexin for cats dosage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Specific Productivity Calculator (qP) calculator work out?', 'a' => <<<'TXT'
            Specific productivity, Total product per batch, Volumetric productivity and Days needed for the target titre, from Product titre, Viable cell density and Production phase. The relationship is Specific productivity = Product titre ÷ (Viable cell density × Production phase) × 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Product titre (g/L), Viable cell density (10⁶/mL), Production phase (days), Working volume (L), Target titre (g/L). With product titre, viable cell density and production phase in place, Specific productivity can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Specific productivity, Total product per batch, Volumetric productivity and Days needed for the target titre blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Specific productivity = 20.83 pg/cell/d, Total product per batch = 5000 g, Volumetric productivity = 0.25 g/L/day and Days needed for the target titre = 16 days. That comes from the page's own defaults, entered in Product titre; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Specific productivity is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Product titre blank and the page solves for it, reporting Specific productivity instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Specific productivity keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/centimorgan-to-percentage', 'name' => 'Centimorgan to Percentage Calculator'],
            ['path' => '/biology/centrifuge-rcf-rpm', 'name' => 'Centrifuge RCF to RPM Converter Calculator'],
            ['path' => '/biology/cephalexin-for-cats-dosage', 'name' => 'Cephalexin for cats dosage Calculator'],
        ],
        'authors' => [],
    ],
];
