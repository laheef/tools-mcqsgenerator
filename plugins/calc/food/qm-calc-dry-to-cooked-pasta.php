<?php

/**
 * Dry to cooked pasta
 * /food/dry-to-cooked-pasta
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dry to cooked pasta',
    'meta' => ['title' => 'Dry to cooked pasta: Formula, Steps & Results', 'description' => 'Estimate cooked pasta volume from dry pasta type and measurement. Check units and follow the recipe or package directions.', 'h1' => 'Dry to cooked pasta Calculator', 'updated' => '2026-08-21'],
    'sections' => [
        [
            'title' => 'Long pasta&nbsp;',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'type_long_pasta',
                            'label' => 'Type',
                            'type' => 'select',
                            'options' => [
                                'Angel Hair' => '0.40',
                                'Fettuccine' => '0.40001',
                                ' Fettuccine Rigate' => '0.400001',
                                'Linguini' => '0.4000001',
                                ' Linguine Fini' => '0.35',
                                'Spaghetti' => '0.40000001',
                                ' Spaghetti Rigati' => '0.400000001',
                                ' Thick Spaghetti' => '0.4000000001',
                                ' Thin Spaghetti' => '0.40000000001',
                            ],
                            'dataset' => 'long pasta ratio',
                            'control' => 'DROPDOWN',
                            'default' => 'Angel Hair',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dry_circumference_long_pasta',
                            'label' => 'Dry bundle circumference',
                            'type' => 'number',
                            'help' => 'The circumference of the amount of pasta you intend to cook, arranged as a tight cylinder.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cooked_volume_long_pasta',
                            'label' => 'Cooked volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cm3',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => ' Got a similar culinary calculation in mind?  Create custom cooking tools and keep them embedded live.&nbsp;'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Short pasta',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'type_short_pasta',
                            'label' => 'Type',
                            'type' => 'select',
                            'options' => [
                                'Campanelle' => '2.01',
                                'Cellentani' => '1.875',
                                'Ditalini' => '2.751',
                                'Elbows' => '2.25',
                                'Farfalle' => '1.67',
                                'Farfalle Mini' => '1.33',
                                'Gemelli' => '2.251',
                                'Mostaccioli' => '0.5',
                                'Orzo' => '2.67',
                                'Pastina' => '3.7501',
                                'Penne' => '1.87500001',
                                'Penne Mezze ' => '2.001',
                                'Penne Mini ' => '1.501',
                                'Penne Tri-Color ' => '2.0001',
                                'Pipette' => '0.5001',
                                'Rigatoni' => '1.666',
                                'Rigatoni Mezzi ' => '1.66',
                                'Rotini' => '2.00001',
                                'Rotini Tri-Color ' => '1.50001',
                                'Shells' => '1.500001',
                                'Shells Large ' => '1.670001',
                                'Shells Jumbo ' => '1.671',
                                'Spaghetti Fideo Cut ' => '2.4',
                                'Wheels Mini ' => '1.333',
                                'Ziti' => '1.8751',
                            ],
                            'dataset' => 'short pasta ratio ',
                            'control' => 'DROPDOWN',
                            'default' => 'Elbows',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dry_volume_short_pasta',
                            'label' => 'Dry volume',
                            'type' => 'number',
                            'help' => 'The amount of pasta you intend to cook.',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cooked_volume_short_pasta',
                            'label' => 'Cooked volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'cups',
                            'rounding' => ['standard', '1'],
                        ],
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
                        ['type' => 'note', 'text' => 'These values are estimated, and the results may vary based on the type/brand of pasta you are using.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Check out how to use this calculator!'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'cooked_volume_short_pasta = dry_volume_short_pasta * type_short_pasta',
            'results' => ['cooked_volume_short_pasta' => 'dry_volume_short_pasta*type_short_pasta', 'dry_volume_short_pasta' => 'cooked_volume_short_pasta/type_short_pasta', 'type_short_pasta' => 'cooked_volume_short_pasta/dry_volume_short_pasta'],
        ],
        [
            'title' => 'cooked_volume_long_pasta = dry_circumference_long_pasta * type_long_pasta',
            'results' => ['type_long_pasta' => 'cooked_volume_long_pasta/dry_circumference_long_pasta', 'cooked_volume_long_pasta' => 'dry_circumference_long_pasta*type_long_pasta', 'dry_circumference_long_pasta' => 'cooked_volume_long_pasta/type_long_pasta'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Dry volume into Dry to cooked pasta and the answer comes back as Type and Dry bundle circumference. The arithmetic is the whole method: type is worked out from dry volume by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Dry to cooked pasta calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dry to cooked pasta: it takes 2 numbers and reports Type, Dry bundle circumference and Cooked volume.</p><p>Written with the labels from the form, Cooked volume = Dry volume × Type.</p><p>What comes back is Type, Dry bundle circumference, Cooked volume and Cooked volume — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Type</strong> — a plain number, no unit</li><li><strong>Dry volume</strong> — in US customary cups. The amount of pasta you intend to cook.</li></ul><p>The answers come back as Type, Dry bundle circumference in centimeters, Cooked volume in cubic centimeters, Cooked volume in US customary cups. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Type = 0.4, Dry bundle circumference = 10 cm, Cooked volume = 100 cm3, Type = 2.25 and Dry volume = 1000 cups — through the same formula and the panel reports <strong>Cooked volume</strong> = 2250 cups.</p><ul><li><strong>Cooked volume</strong> = 2250 cups</li></ul><p>That is <strong>Cooked volume</strong> = <code>Dry volume × Type</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Cooked volume</strong> = 2250. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Dry bundle circumference lists 7 options and opens on centimeters. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cooked volume</strong> = <code>Dry volume × Type</code></li><li><strong>Dry volume</strong> = <code>Cooked volume ÷ Type</code></li><li><strong>Type</strong> = <code>Cooked volume ÷ Dry volume</code></li><li><strong>Dry bundle circumference</strong> = <code>Cooked volume ÷ Type</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Cooked volume</strong> = <code>Dry volume × Type</code> — the form to use when Dry volume and Type are the values you have.</li><li><strong>Dry volume</strong> = <code>Cooked volume ÷ Type</code> — the form to use when Cooked volume and Type are the values you have.</li><li><strong>Type</strong> = <code>Cooked volume ÷ Dry volume</code> — the form to use when Cooked volume and Dry volume are the values you have.</li><li><strong>Cooked volume</strong> = <code>Dry bundle circumference × Type</code> — the form to use when Dry bundle circumference and Type are the values you have.</li><li><strong>Type</strong> = <code>Cooked volume ÷ Dry bundle circumference</code> — the form to use when Cooked volume and Dry bundle circumference are the values you have.</li><li><strong>Dry bundle circumference</strong> = <code>Cooked volume ÷ Type</code> — the form to use when Cooked volume and Type are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cooked volume, Dry volume and Type can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Type, from 0.4 to 0.8 — and the answers go from <strong>Cooked volume</strong> 2250 cups to <strong>Cooked volume</strong> 2250 cups.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Dry volume carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Type, Dry bundle circumference and Cooked volume are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Type left as a guess.</strong> Anything typed into Type is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Dry volume left as a guess.</strong> Anything typed into Dry volume is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Type and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dry to cooked pasta form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Type</strong> takes a plain number with no unit attached. It feeds Cooked volume and Dry volume. Fill it from a measurement rather than a memory — Type is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Dry volume</strong> is a us customary cups quantity: the page opens it in cups and converts anything else you pick before the formula runs. The amount of pasta you intend to cook. It feeds Cooked volume and Type. Fill it from a measurement rather than a memory — Dry volume is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p> Read them in this order:</p><ul><li><strong>Type</strong> is a plain number. The value follows from Cooked volume and Dry bundle circumference. </li><li><strong>Dry bundle circumference</strong> is a centimeters figure. The value follows from Cooked volume and Type. </li><li><strong>Cooked volume</strong> is a cubic centimeters figure. The value follows from Dry bundle circumference and Type. </li><li><strong>Cooked volume</strong> is a us customary cups figure and the page's own defaults put it at 2250 cups. The value follows from Dry volume and Type. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cooked volume</th></tr></thead><tbody><tr><td><strong>Type</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Dry bundle circumference</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Cooked volume</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Type</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Dry volume</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Type: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Type, Dry bundle circumference and Cooked volume barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Type = 0.2, Dry bundle circumference = 5 cm, Cooked volume = 50 cm3, Type = 1.13 and Dry volume = 500 cups and the page reports <strong>Cooked volume</strong> = 563 cups.</li><li>Feed in Type = 1.2, Dry bundle circumference = 10 cm, Cooked volume = 100 cm3, Type = 2.25 and Dry volume = 1000 cups and the page reports <strong>Cooked volume</strong> = 2250 cups.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Dry to cooked pasta actually offers.</p><ul><li><strong>centimeters</strong> — opens in <em>cm</em>, and the chip also carries cm, m, in, ft, yd and μm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>cubic centimeters</strong> — opens in <em>cm3</em>, and the chip also carries L, µl, cl, cc, cm³ and tsp. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Type is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are centimeters and cubic centimeters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Type and Dry volume are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Type and Dry volume is what you already know and Type and Dry bundle circumference is what you need — the reverse of that situation is what the rearranged form is for.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>Related calculators: <a href="/food/uncooked-to-cooked-rice">Uncooked to cooked rice</a>, <a href="/food/rice-water-ratio">Rice to water ratio</a> and <a href="/food/cooking-measurement">Cooking measurement</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dry to cooked pasta calculator work out?', 'a' => 'Type, Dry bundle circumference, Cooked volume and Cooked volume, from Dry volume and Type. The relationship is Cooked volume = Dry volume × Type.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Type, Dry volume (US customary cups). With type and dry volume in place, Type can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Cooked volume, Dry volume, Type and Cooked volume can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'Are the Dry to cooked pasta results exact?', 'a' => 'It uses the values and assumptions represented in the form. Real ingredients and conditions can vary, so check units and follow the recipe, product label or safety instructions that apply.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Type is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Type blank and the page solves for it, reporting Type instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Type keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/uncooked-to-cooked-rice', 'name' => 'Uncooked to cooked rice'],
            ['path' => '/food/rice-water-ratio', 'name' => 'Rice to water ratio'],
            ['path' => '/food/cooking-measurement', 'name' => 'Cooking measurement']
        ],
    ],
];
