<?php

/**
 * Western Blot Protein Loading Calculator
 * /biology/western-blot-loading
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Western Blot Protein Loading Calculator',
    'meta' => ['title' => 'Western Blot Protein Loading Calculator — Biology', 'description' => 'Western Blot Protein Loading turns Lysate concentration, Protein per lane and Number of lanes into Lysate volume per lane and Protein needed in total.', 'h1' => 'Western Blot Protein Loading Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'conc_mg_ml',
                            'label' => 'Lysate concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'help' => 'From a BCA or Bradford assay',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'per_lane_ug',
                            'label' => 'Protein per lane',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'help' => '20–30 µg for a whole lysate',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'lanes',
                            'label' => 'Number of lanes',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'sample_ul',
                            'label' => 'Lysate volume per lane',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_ug',
                            'label' => 'Protein needed in total',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'help' => 'Includes the spare lanes for the ladder',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_ul',
                            'label' => 'Lysate needed in total',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'loading_ug_ul',
                            'label' => 'Final loading concentration',
                            'type' => 'number',
                            'suffix' => 'µg/µL',
                            'help' => 'After adding sample buffer',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'target_pct',
                            'label' => 'Share that is your target',
                            'type' => 'number',
                            'suffix' => 'of total',
                            'help' => '0.01 means 1% of the lysate',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.01',
                        ],
                        [
                            'name' => 'target_ng',
                            'label' => 'Target protein per lane',
                            'type' => 'number',
                            'suffix' => 'ng',
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
            'title' => 'Loading',
            'results' => [
                'sample_ul' => 'per_lane_ug/conc_mg_ml',
                'total_ug' => 'per_lane_ug*lanes',
                'total_ul' => 'total_ug/conc_mg_ml',
                'loading_ug_ul' => 'per_lane_ug/(sample_ul*1.25)',
                'target_ng' => 'per_lane_ug*target_pct*1000',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Western Blot Protein Loading turns Lysate concentration, Protein per lane and Number of lanes into Lysate volume per lane and Protein needed in total. The arithmetic is the whole method: Lysate volume per lane is worked out from Lysate concentration by one formula, applied once. Lysate volume per lane comes back in µL unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Western Blot Protein Loading calculator works', 'html' => <<<'TXT'
            <p>The Western Blot Protein Loading calculator applies one relationship to 4 numbers and reports Lysate volume per lane, Protein needed in total and Lysate needed in total.</p><p>In the form&#039;s own words, Lysate volume per lane = Protein per lane ÷ Lysate concentration.</p><p>The answers are Lysate volume per lane, Protein needed in total, Lysate needed in total and Final loading concentration; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Lysate concentration</strong> — in mg/mL. From a BCA or Bradford assay</li><li><strong>Protein per lane</strong> — in µg. 20–30 µg for a whole lysate</li><li><strong>Number of lanes</strong> — a plain number, no unit</li><li><strong>Share that is your target</strong> — in of total. 0.01 means 1% of the lysate</li></ul><p>The result boxes are Lysate volume per lane in µL, Protein needed in total in µg, Lysate needed in total in µL, Final loading concentration in µg/µL, Target protein per lane in ng; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Lysate concentration = 2 mg/mL, Protein per lane = 20 µg, Number of lanes = 10 and Share that is your target = 0.01 of total gives &lt;strong&gt;Lysate volume per lane&lt;/strong&gt; = 10 µL, &lt;strong&gt;Protein needed in total&lt;/strong&gt; = 200 µg, &lt;strong&gt;Lysate needed in total&lt;/strong&gt; = 100 µL, &lt;strong&gt;Final loading concentration&lt;/strong&gt; = 1.6 µg/µL and &lt;strong&gt;Target protein per lane&lt;/strong&gt; = 200 ng.</p><ul><li><strong>Lysate volume per lane</strong> = 10 µL</li><li><strong>Protein needed in total</strong> = 200 µg</li><li><strong>Lysate needed in total</strong> = 100 µL</li><li><strong>Final loading concentration</strong> = 1.6 µg/µL</li><li><strong>Target protein per lane</strong> = 200 ng</li></ul><p>That is <strong>Lysate volume per lane</strong> = <code>Protein per lane ÷ Lysate concentration</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Lysate volume per lane&lt;/strong&gt; = 10, &lt;strong&gt;Protein needed in total&lt;/strong&gt; = 200, &lt;strong&gt;Lysate needed in total&lt;/strong&gt; = 100, &lt;strong&gt;Final loading concentration&lt;/strong&gt; = 1.6 and &lt;strong&gt;Target protein per lane&lt;/strong&gt; = 200 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Lysate volume per lane takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Lysate volume per lane</strong> = <code>Protein per lane ÷ Lysate concentration</code></li><li><strong>Protein needed in total</strong> = <code>Protein per lane × Number of lanes</code></li><li><strong>Lysate needed in total</strong> = <code>Protein needed in total ÷ Lysate concentration</code></li><li><strong>Final loading concentration</strong> = <code>Protein per lane ÷ (Lysate volume per lane × 1.25)</code></li><li><strong>Target protein per lane</strong> = <code>Protein per lane × Share that is your target × 1000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Lysate volume per lane</strong> = <code>Protein per lane ÷ Lysate concentration</code> — the form to use when Protein per lane and Lysate concentration are the values you have.</li><li><strong>Protein needed in total</strong> = <code>Protein per lane × Number of lanes</code> — the form to use when Protein per lane and Number of lanes are the values you have.</li><li><strong>Lysate needed in total</strong> = <code>Protein needed in total ÷ Lysate concentration</code> — the form to use when Protein needed in total and Lysate concentration are the values you have.</li><li><strong>Final loading concentration</strong> = <code>Protein per lane ÷ (Lysate volume per lane × 1.25)</code> — the form to use when Protein per lane and Lysate volume per lane are the values you have.</li><li><strong>Target protein per lane</strong> = <code>Protein per lane × Share that is your target × 1000</code> — the form to use when Protein per lane and Share that is your target are the values you have.</li></ul><p>Any one of Lysate volume per lane, Protein needed in total and Lysate needed in total can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Lysate concentration, from 2 to 4 — and the answers go from &lt;strong&gt;Lysate volume per lane&lt;/strong&gt; 10 µL, &lt;strong&gt;Protein needed in total&lt;/strong&gt; 200 µg, &lt;strong&gt;Lysate needed in total&lt;/strong&gt; 100 µL, &lt;strong&gt;Final loading concentration&lt;/strong&gt; 1.6 µg/µL and &lt;strong&gt;Target protein per lane&lt;/strong&gt; 200 ng to &lt;strong&gt;Lysate volume per lane&lt;/strong&gt; 5 µL, &lt;strong&gt;Protein needed in total&lt;/strong&gt; 200 µg, &lt;strong&gt;Lysate needed in total&lt;/strong&gt; 50 µL, &lt;strong&gt;Final loading concentration&lt;/strong&gt; 3.2 µg/µL and &lt;strong&gt;Target protein per lane&lt;/strong&gt; 200 ng.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Lysate volume per lane, Protein needed in total and Lysate needed in total are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Lysate concentration left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Lysate concentration is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Protein per lane left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Protein per lane is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of lanes left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of lanes is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Lysate concentration to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Western Blot Protein Loading form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Lysate concentration</strong> is measured in mg/mL. From a BCA or Bradford assay. It feeds Lysate volume per lane and Lysate needed in total. Fill it from a measurement rather than a memory — Lysate concentration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Protein per lane</strong> is measured in µg. 20–30 µg for a whole lysate. It feeds Lysate volume per lane, Protein needed in total and Final loading concentration. Fill it from a measurement rather than a memory — Protein per lane is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Number of lanes</strong> takes a plain number with no unit attached. It feeds Protein needed in total. Fill it from a measurement rather than a memory — Number of lanes is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Share that is your target</strong> is measured in of total. 0.01 means 1% of the lysate. It feeds Target protein per lane. Fill it from a measurement rather than a memory — Share that is your target is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Lysate volume per lane</strong> is a plain number and the page's own defaults put it at 10. It is worked out from Protein per lane and Lysate concentration. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Protein needed in total</strong> is a plain number and the page's own defaults put it at 200. It is worked out from Protein per lane and Number of lanes. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Lysate needed in total</strong> is a plain number and the page's own defaults put it at 100. It is worked out from Protein needed in total and Lysate concentration. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Final loading concentration</strong> is a plain number and the page's own defaults put it at 1.6. It is worked out from Protein per lane and Lysate volume per lane. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Target protein per lane</strong> is a plain number and the page's own defaults put it at 200. It is worked out from Protein per lane and Share that is your target. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Lysate volume per lane follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Lysate concentration, Protein per lane and Number of lanes and the number you are missing is Lysate volume per lane and Protein needed in total.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/enzyme-specific-activity-yield">Enzyme Kinetics: Specific Activity and Yield Calculator</a>, <a href="/biology/enzyme-unit-converter">Enzyme Unit Converter (U/mg, kcat) Calculator</a> and <a href="/biology/exponential-population-growth">Exponential Population Growth Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Western Blot Protein Loading calculator work out?', 'a' => <<<'TXT'
            Lysate volume per lane, Protein needed in total, Lysate needed in total and Final loading concentration, from Protein per lane and Lysate concentration. The relationship is Lysate volume per lane = Protein per lane ÷ Lysate concentration.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Lysate concentration (mg/mL), Protein per lane (µg), Number of lanes, Share that is your target (of total). Fill conc_mg_ml, per_lane_ug and lanes and leave Lysate volume per lane empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Lysate volume per lane, Protein needed in total, Lysate needed in total and Final loading concentration blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Lysate volume per lane = 10 µL, Protein needed in total = 200 µg, Lysate needed in total = 100 µL, Final loading concentration = 1.6 µg/µL and Target protein per lane = 200 ng. The figures come from Lysate concentration as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Lysate volume per lane is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Lysate concentration blank and the page solves for it, reporting Lysate volume per lane instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Lysate volume per lane keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/enzyme-specific-activity-yield', 'name' => 'Enzyme Kinetics: Specific Activity and Yield Calculator'],
            ['path' => '/biology/enzyme-unit-converter', 'name' => 'Enzyme Unit Converter (U/mg, kcat) Calculator'],
            ['path' => '/biology/exponential-population-growth', 'name' => 'Exponential Population Growth Calculator'],
        ],
        'authors' => [],
    ],
];
