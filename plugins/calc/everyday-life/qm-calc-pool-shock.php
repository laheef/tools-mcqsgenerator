<?php

/**
 * Pool shock
 * /everyday-life/pool-shock
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pool shock',
    'meta' => ['title' => 'Pool shock Calculator: Formula, Steps & Examples', 'description' => 'Pool shock turns pool/spa volume, choose the type of chemical to shock your pool/spa: and Total chlorine (TAC) into calcium hypochlorite and liquid chlorine.', 'h1' => 'Pool shock Calculator', 'updated' => '2026-05-01'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pool_volume',
                            'label' => 'Pool/spa volume',
                            'type' => 'number',
                            'help' => 'Enter the total volume of your pool or spa. You can find this in your original pool documentation or by measuring the dimensions.',
                            'unit' => '20',
                            'unit_default' => 'liters',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Don’t know your pool volume? Use our pool volume calculator!'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chemical_type',
                            'label' => 'Choose the type of chemical to shock your pool/spa:',
                            'type' => 'select',
                            'options' => ['Calcium hypochlorite (Cal-Hypo)' => '1', 'Liquid chlorine (Sodium hypochlorite)' => '2'],
                            'dataset' => 'chemical_type_DS',
                            'default' => 'Calcium hypochlorite (Cal-Hypo)',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'TAC',
                            'label' => 'Total chlorine (TAC)',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            TAC is the total amount of chlorine in the water, including both "active" chlorine and "used" chlorine. This is usually the first reading on your test kit or strip.
                            TXT,
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'FAC',
                            'label' => 'Free chlorine (FAC)',
                            'type' => 'number',
                            'help' => 'FAC is the amount of "active" chlorine available to sanitize your water. This should be lower than or equal to your total chlorine.',
                            'unit' => '21',
                            'unit_default' => 'ppm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'calcium_hypochlorite',
                            'label' => 'Calcium hypochlorite',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            A powerful dry powder shock. Best for quickly killing algae and bacteria, but it will slightly raise your water's calcium (hardness) levels. Calculated for 65%–75% calcium hypochlorite granular shock
                            TXT,
                            'unit' => '22',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sodium_hypochlorite',
                            'label' => 'Liquid chlorine',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            A liquid shock that is easy to pour and leaves no residue. Best for daily maintenance or pools that already have high calcium levels. Calculated for 12.5% liquid chlorine.
                            TXT,
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'chemical_type == 1', 'text' => <<<'TXT'
                                Your water has {{CAC.formattedValue}} {{TAC.unit}} of combined chlorine*. To neutralize this and reach the breakpoint, you need to raise your chlorine by {{adjusted_level.formattedValue}} {{TAC.unit}}. For a {{pool_volume.formattedValue}} {{pool_volume.unit}} pool, this requires {{calcium_hypochlorite.formattedValue}} {{calcium_hypochlorite.unit}} of calcium hypochlorite (Cal-Hypo).
                                TXT],
                                ['when' => 'chemical_type == 2', 'text' => <<<'TXT'
                                Your water has {{CAC.formattedValue}} {{TAC.unit}} of combined chlorine.* To neutralize this and reach the breakpoint, you need to raise your chlorine by {{adjusted_level.formattedValue}} {{TAC.unit}}. For a {{pool_volume.formattedValue}} {{pool_volume.unit}} pool, this requires {{sodium_hypochlorite.formattedValue}} {{sodium_hypochlorite.unit}} of liquid chlorine (Sodium hypochlorite).
                                TXT],
                                ['when' => '(chemical_type == 2 or chemical_type == 1) and CAC == 0', 'text' => <<<'TXT'
                                Your water has 0 ppm of combined chlorine*, meaning your pool is already at breakpoint. No shock treatment is required at this time. Keep up the great maintenance!
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        *Also known as “chloramines”, combined chlorine is the “used up” chlorine that causes eye irritation and that strong chlorine smell. It is calculated as TAC&nbsp;−&nbsp;FAC.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'CAC',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'adjusted_level',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'calcium_hypochlorite = (((TAC - FAC) * 10) - FAC) * (pool_volume/10000) * 2',
            'results' => ['FAC' => '(10/11)*(TAC*pool_volume - 500*calcium_hypochlorite)/pool_volume', 'TAC' => '(11/10)*FAC + 500*calcium_hypochlorite/pool_volume', 'pool_volume' => '-5000*calcium_hypochlorite/(11*FAC - 10*TAC)', 'calcium_hypochlorite' => '(1/5000)*pool_volume*(-11*FAC + 10*TAC)'],
        ],
        [
            'title' => 'sodium_hypochlorite = (((TAC - FAC) * 10) - FAC) * (pool_volume/10000) * 10.7',
            'results' => ['FAC' => '(10/1177)*(107*TAC*pool_volume - 10000*sodium_hypochlorite)/pool_volume', 'sodium_hypochlorite' => '(107/100000)*pool_volume*(-11*FAC + 10*TAC)', 'TAC' => '(1/1070)*(1177*FAC*pool_volume + 100000*sodium_hypochlorite)/pool_volume', 'pool_volume' => '-100000*sodium_hypochlorite/(1177*FAC - 1070*TAC)'],
        ],
    ],
    'article' => [
        'intro' => 'Give the Pool shock calculator the pool/spa volume, the total chlorine and the calcium hypochlorite and it returns <strong>free chlorine (FAC)</strong>.',
        'sections' => [
            ['title' => 'How does the Pool shock calculator work?', 'html' => <<<'TXT'
            <p>The Pool shock calculator takes the values in the form, applies the relationship described below and reports <strong>free chlorine (FAC)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (choose the type of chemical to shock your pool/spa); then you type in the pool/spa volume, the total chlorine (TAC) and the calcium hypochlorite.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in liters. The unit chip switches it to any of the 40 supported units.</li><li>Pick the option that matches your case — 2 options, such as calcium hypochlorite (Cal-Hypo) and liquid chlorine (Sodium hypochlorite). </li><li>A measured quantity, entered by default in parts per million. The unit chip switches it to any of the 28 supported units.</li><li>A measured quantity, entered by default in grams. The unit chip switches it to any of the 29 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Pool/spa volume</strong></td><td>A measured quantity, 40 units available.</td><td>liters</td><td>You supply it</td></tr><tr><td><strong>Choose the type of chemical to shock your pool/spa</strong></td><td>One of 2 options, such as calcium hypochlorite (Cal-Hypo) and liquid chlorine (Sodium hypochlorite).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Total chlorine (TAC)</strong></td><td>A measured quantity, 28 units available.</td><td>parts per million</td><td>You supply it</td></tr><tr><td><strong>Free chlorine (FAC)</strong></td><td>A measured quantity, 28 units available.</td><td>parts per million</td><td>Calculated</td></tr><tr><td><strong>Calcium hypochlorite</strong></td><td>A measured quantity, 29 units available.</td><td>grams</td><td>You supply it</td></tr><tr><td><strong>Liquid chlorine</strong></td><td>A measured quantity, 40 units available.</td><td>milliliters</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Pool shock calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Free chlorine (FAC)</span><span class="formula-eq">=</span><span class="formula-rhs">(10 ÷ 11) × (total chlorine (TAC) × pool ÷ spa volume − 500 × calcium hypochlorite) ÷ pool ÷ spa volume</span></div><div class="formula-row"><span class="formula-lhs">Free chlorine (FAC)</span><span class="formula-eq">=</span><span class="formula-rhs">(10 ÷ 1177) × (107 × total chlorine (TAC) × pool ÷ spa volume − 10000 × liquid chlorine) ÷ pool ÷ spa volume</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in parts per million, and convertible to any of the 28 units on that chip.</li><li>Shown in milliliters, and convertible to any of the 40 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Volume, opening in liters</li><li>Density, opening in parts per million</li><li>Density, opening in parts per million</li><li>Mass, opening in grams</li><li>Volume, opening in milliliters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Pool shock calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Any time the same 3 figures keep coming back — the pool/spa volume, the total chlorine and the calcium hypochlorite — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/count-hours">Count hours</a>, <a href="/everyday-life/countdown">Countdown</a> and <a href="/everyday-life/cross-stitch">Cross stitch</a>.</p>
            TXT],
            ['title' => 'Treat a pool-shock estimate as a calculation, not chemical handling advice', 'html' => <<<'TXT'
            <p>This calculator relates pool volume, total chlorine, free chlorine and a selected shock chemical to an estimated quantity or chlorine level. Before using it, confirm the exact chemical type and concentration shown on the product label. Different products have different active ingredients and strengths; a generic label such as “shock” is not enough to determine a dose. The page’s formula cannot inspect your product, water test or pool equipment.</p>
            <p>Use a reliable test kit and enter readings in the units the calculator expects. Total chlorine and free chlorine are different readings; combined chlorine is derived from their difference in many test contexts. Do not substitute a target value for a measured value without checking the field label. Verify pool volume from the best available dimensions or manufacturer data, and note whether the calculator expects gallons, liters or another unit.</p>
            <p>Follow the chemical manufacturer’s directions and current local pool guidance. Never mix pool chemicals together or combine products in a container; incompatible chemicals can react dangerously. Add and store products only as directed on their labels, use protective equipment specified by the manufacturer, and keep children and pets away during handling. Do not enter or reopen a pool until the product label and applicable guidance say it is safe.</p>
            <p>Water conditions affect how a treatment works. pH, stabilizer, sunlight, circulation, temperature and pool surface can influence chlorine measurements and treatment decisions. This page may not model those factors. It does not tell you whether the water is safe to swim in, diagnose a water-quality problem or replace testing after treatment.</p>
            <p>If a calculation gives a surprising amount, stop and recheck the pool volume, chlorine units, chemical type and product concentration. Do not keep adjusting the inputs until a preferred quantity appears. Consult the product label, pool professional or local health authority when uncertain, especially for a public pool, spa or large body of water.</p>
            <p>Use the result only as a preliminary arithmetic check based on the inputs you supplied. Actual chemical treatment should be determined from measured water conditions and the product’s instructions. Never use the calculator to override safety directions or to justify combining chemicals.</p>
            TXT],
            ['title' => 'Questions to resolve before any treatment', 'html' => <<<'TXT'
            <p>Start by identifying the pool or spa volume and the exact product in hand. Pool dimensions can be irregular, and a shallow-to-deep transition changes the volume calculation. If volume is only an estimate, mark it as such and do not enter more precision than you know. Check that the chemical’s active ingredient and strength match the calculator’s selected type; two packages with similar names can have different concentrations.</p><p>Use the test method’s instructions to obtain free and total chlorine readings. Ensure the units match the form and record when the sample was taken. Readings can change with sunlight, circulation and time after a treatment. If a value is outside the test kit’s range, follow the kit instructions rather than guessing a number to enter.</p><p>Pool chemicals are not interchangeable. Read the full product label, including incompatibilities, protective equipment, storage, application restrictions and re-entry guidance. Never mix different pool products, acids or chlorine compounds together. Add each product only in the manner directed by its maker; do not improvise a container or combine products based on a calculator result.</p><p>Water balance and pool equipment matter. pH, stabilizer, filtration, circulation and surface type can change how a treatment behaves. This calculator may not include those variables, and it cannot determine whether water is safe for swimming. Test the water again as required by the product instructions and local health rules before use.</p><p>If a displayed dose looks unusually large or small, stop. Check pool volume, test units, free versus total chlorine, product type and strength. Do not adjust the number by switching inputs until it looks convenient. Contact a qualified pool professional, the chemical manufacturer or the relevant health authority for site-specific advice.</p><p>Keep products in their original labeled containers and stored as directed, away from children and pets. Dispose of leftovers according to the label and local rules. The calculator is an arithmetic aid only; the product directions and safety procedures take priority in every case.</p>
            TXT],
            ['title' => 'Keep a treatment record and retest', 'html' => <<<'TXT'
            <p>If you maintain a private pool, keep a log of test readings, product name, batch or concentration, date and follow-up measurements. This makes it easier to see whether the water returned to the expected range and to explain the history to a pool professional. A log is not a substitute for the product label or local rules, but it can prevent confusion between readings taken before and after treatment.</p><p>Use test equipment according to its instructions and replace expired reagents. Different test methods can have different limits and units; if a sample is out of range, follow the kit guidance rather than extrapolating. Do not enter the water based on this calculator alone. Follow the manufacturer’s re-entry criteria and applicable health guidance.</p><p>Public pools, spas and commercial facilities may have additional requirements for monitoring, records and operator qualifications. A general calculator cannot replace those procedures. Consult the responsible operator or regulator for the correct process in that setting.</p>
            TXT],
            ['title' => 'Do not guess when the product is unclear', 'html' => <<<'TXT'
            <p>If the label, concentration or calculator category does not match the product in hand, do not use the displayed quantity. Contact the manufacturer or a qualified pool professional and follow the product’s safety directions.</p>
            TXT],
            ['title' => 'Use only verified measurements', 'html' => <<<'TXT'
            <p>Record the water-test units and product strength before calculating. If either value is unknown or outside the test kit’s range, pause and obtain a reliable measurement rather than substituting a guess.</p>
            TXT],
            ['title' => 'Follow label directions after the calculation', 'html' => <<<'TXT'
            <p>The calculated amount is not a substitute for application instructions, storage precautions or re-entry guidance. Use the exact product label and current pool rules to decide what to do next.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pool shock calculator work out?', 'a' => 'It returns free chlorine (FAC), derived from the pool/spa volume, the total chlorine and the calcium hypochlorite.'],
            ['q' => 'What do I need to enter to use the Pool shock calculator?', 'a' => 'The form asks for the pool/spa volume, the total chlorine and the calcium hypochlorite, which is 4 fields in total.'],
            ['q' => 'Can I enter pool/spa volume in a different unit?', 'a' => 'Yes. Pool/spa volume opens in liters and the chip beside it offers 40 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/count-hours', 'name' => 'Count hours'],
            ['path' => '/everyday-life/countdown', 'name' => 'Countdown'],
            ['path' => '/everyday-life/cross-stitch', 'name' => 'Cross stitch'],
        ],
    ],
];
