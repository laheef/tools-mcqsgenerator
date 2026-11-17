<?php

/**
 * NPV
 * /finance/net-present-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'NPV',
    'meta' => ['title' => 'NPV Calculator — Free, With Worked Examples', 'description' => 'NPV turns discount rate, initial costs and year 1 into net present value and expected cash flows. Results come back in USD, with any other unit a click away.', 'h1' => 'NPV Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'discount_rate',
                            'label' => 'Discount rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c0',
                            'label' => 'Initial costs',
                            'type' => 'number',
                            'help' => 'Expressed as a positive number.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Annual cash flows',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c1',
                            'label' => 'Year 1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c2',
                            'label' => 'Year 2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c3',
                            'label' => 'Year 3',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c4',
                            'label' => 'Year 4',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c5',
                            'label' => 'Year 5',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c6',
                            'label' => 'Year 6',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c7',
                            'label' => 'Year 7',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c8',
                            'label' => 'Year 8',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c9',
                            'label' => 'Year 9',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'show_more_fields',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Show more annual cash flows' => '1', '' => '0'],
                            'dataset' => 'more_fieldsDS',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'NPV',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'NPV',
                            'label' => 'Net present value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PV_flows',
                            'label' => 'Expected cash flows',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => <<<'TXT'
            NPV = -c0 +c1/(1+discount_rate)+c2/(1+discount_rate)^2+c3/(1+discount_rate)^3+c4/(1+discount_rate)^4+c5/(1+discount_rate)^5+c6/(1+discount_rate)^6+c7/(1+discount_rate)^7+c8/(1+discount_rate)^8+c9/(1+discount_rate)^9
            TXT,
            'results' => [
                'c7' => <<<'TXT'
                (-c8*(discount_rate + 1) - c9 + pow(discount_rate + 1, 2)*(NPV*pow(discount_rate + 1, 7) + c0*pow(discount_rate + 1, 7) - c1*pow(discount_rate + 1, 6) - c2*pow(discount_rate + 1, 5) - c3*pow(discount_rate + 1, 4) - c4*pow(discount_rate + 1, 3) - c5*pow(discount_rate + 1, 2) - c6*discount_rate - c6))/pow(discount_rate + 1, 2)
                TXT,
                'c3' => <<<'TXT'
                (-c4*pow(discount_rate + 1, 5) - c5*pow(discount_rate + 1, 4) - c6*pow(discount_rate + 1, 3) - c7*pow(discount_rate + 1, 2) - c8*(discount_rate + 1) - c9 + pow(discount_rate + 1, 6)*(NPV*pow(discount_rate + 1, 3) + c0*pow(discount_rate + 1, 3) - c1*pow(discount_rate + 1, 2) - c2*discount_rate - c2))/pow(discount_rate + 1, 6)
                TXT,
                'c9' => <<<'TXT'
                NPV*pow(discount_rate + 1, 9) + c0*pow(discount_rate + 1, 9) - c1*pow(discount_rate + 1, 8) - c2*pow(discount_rate + 1, 7) - c3*pow(discount_rate + 1, 6) - c4*pow(discount_rate + 1, 5) - c5*pow(discount_rate + 1, 4) - c6*pow(discount_rate + 1, 3) - c7*pow(discount_rate + 1, 2) - c8*discount_rate - c8
                TXT,
                'NPV' => <<<'TXT'
                (-c0*pow(discount_rate + 1, 9) + c1*pow(discount_rate + 1, 8) + c2*pow(discount_rate + 1, 7) + c3*pow(discount_rate + 1, 6) + c4*pow(discount_rate + 1, 5) + c5*pow(discount_rate + 1, 4) + c6*pow(discount_rate + 1, 3) + c7*pow(discount_rate + 1, 2) + c8*(discount_rate + 1) + c9)/pow(discount_rate + 1, 9)
                TXT,
                'c6' => <<<'TXT'
                (-c7*pow(discount_rate + 1, 2) - c8*(discount_rate + 1) - c9 + pow(discount_rate + 1, 3)*(NPV*pow(discount_rate + 1, 6) + c0*pow(discount_rate + 1, 6) - c1*pow(discount_rate + 1, 5) - c2*pow(discount_rate + 1, 4) - c3*pow(discount_rate + 1, 3) - c4*pow(discount_rate + 1, 2) - c5*discount_rate - c5))/pow(discount_rate + 1, 3)
                TXT,
                'c5' => <<<'TXT'
                (-c6*pow(discount_rate + 1, 3) - c7*pow(discount_rate + 1, 2) - c8*(discount_rate + 1) - c9 + pow(discount_rate + 1, 4)*(NPV*pow(discount_rate + 1, 5) + c0*pow(discount_rate + 1, 5) - c1*pow(discount_rate + 1, 4) - c2*pow(discount_rate + 1, 3) - c3*pow(discount_rate + 1, 2) - c4*discount_rate - c4))/pow(discount_rate + 1, 4)
                TXT,
                'c2' => <<<'TXT'
                (-c3*pow(discount_rate + 1, 6) - c4*pow(discount_rate + 1, 5) - c5*pow(discount_rate + 1, 4) - c6*pow(discount_rate + 1, 3) - c7*pow(discount_rate + 1, 2) - c8*(discount_rate + 1) - c9 + pow(discount_rate + 1, 7)*(NPV*pow(discount_rate + 1, 2) + c0*pow(discount_rate + 1, 2) - c1*discount_rate - c1))/pow(discount_rate + 1, 7)
                TXT,
                'c1' => <<<'TXT'
                (-c2*pow(discount_rate + 1, 7) - c3*pow(discount_rate + 1, 6) - c4*pow(discount_rate + 1, 5) - c5*pow(discount_rate + 1, 4) - c6*pow(discount_rate + 1, 3) - c7*pow(discount_rate + 1, 2) - c8*(discount_rate + 1) - c9 + pow(discount_rate + 1, 8)*(NPV*discount_rate + NPV + c0*discount_rate + c0))/pow(discount_rate + 1, 8)
                TXT,
                'c4' => <<<'TXT'
                (-c5*pow(discount_rate + 1, 4) - c6*pow(discount_rate + 1, 3) - c7*pow(discount_rate + 1, 2) - c8*(discount_rate + 1) - c9 + pow(discount_rate + 1, 5)*(NPV*pow(discount_rate + 1, 4) + c0*pow(discount_rate + 1, 4) - c1*pow(discount_rate + 1, 3) - c2*pow(discount_rate + 1, 2) - c3*discount_rate - c3))/pow(discount_rate + 1, 5)
                TXT,
                'c0' => <<<'TXT'
                (-NPV*pow(discount_rate + 1, 9) + c1*pow(discount_rate + 1, 8) + c2*pow(discount_rate + 1, 7) + c3*pow(discount_rate + 1, 6) + c4*pow(discount_rate + 1, 5) + c5*pow(discount_rate + 1, 4) + c6*pow(discount_rate + 1, 3) + c7*pow(discount_rate + 1, 2) + c8*(discount_rate + 1) + c9)/pow(discount_rate + 1, 9)
                TXT,
                'c8' => <<<'TXT'
                (-c9 + (discount_rate + 1)*(NPV*pow(discount_rate + 1, 8) + c0*pow(discount_rate + 1, 8) - c1*pow(discount_rate + 1, 7) - c2*pow(discount_rate + 1, 6) - c3*pow(discount_rate + 1, 5) - c4*pow(discount_rate + 1, 4) - c5*pow(discount_rate + 1, 3) - c6*pow(discount_rate + 1, 2) - c7*discount_rate - c7))/(discount_rate + 1)
                TXT,
            ],
        ],
        [
            'title' => 'PV_flows = NPV + c0',
            'results' => ['NPV' => 'PV_flows - c0', 'c0' => '-NPV + PV_flows', 'PV_flows' => 'NPV + c0'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Discount rate, Initial costs and Year 1 into NPV and the answer comes back as Net present value and Expected cash flows. Nothing is looked up on this page: net present value is computed from discount rate and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Net present value is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the NPV calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind NPV: it takes 11 numbers and reports Net present value and Expected cash flows.</p><p>What comes back is Net present value and Expected cash flows — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 11 boxes, and nothing else.</p><ul><li><strong>Discount rate</strong> — in percent</li><li><strong>Initial costs</strong> — in USD. Expressed as a positive number.</li><li><strong>Year 1</strong> — in USD</li><li><strong>Year 2</strong> — in USD</li><li><strong>Year 3</strong> — in USD</li><li><strong>Year 4</strong> — in USD</li><li><strong>Year 5</strong> — in USD</li><li><strong>Year 6</strong> — in USD</li><li><strong>Year 7</strong> — in USD</li><li><strong>Year 8</strong> — in USD</li><li><strong>Year 9</strong> — in USD</li></ul><p>The answers come back as Net present value in USD, Expected cash flows in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Discount rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Expected cash flows</strong> = <code>Net present value + Initial costs</code></li><li><strong>Net present value</strong> = <code>Expected cash flows − Initial costs</code></li><li><strong>Initial costs</strong> = <code>− Net present value + Expected cash flows</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Expected cash flows</strong> = <code>Net present value + Initial costs</code> — the form to use when Net present value and Initial costs are the values you have.</li><li><strong>Net present value</strong> = <code>Expected cash flows − Initial costs</code> — the form to use when Expected cash flows and Initial costs are the values you have.</li><li><strong>Initial costs</strong> = <code>− Net present value + Expected cash flows</code> — the form to use when Net present value and Expected cash flows are the values you have.</li></ul><p>Any one of Net present value, Year 7 and Year 3 can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Discount rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Net present value and Expected cash flows are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Discount rate left as a guess.</strong> Anything typed into Discount rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Initial costs left as a guess.</strong> Anything typed into Initial costs is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Discount rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the NPV form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Discount rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Year 7, Year 3 and Year 9. Fill it from a measurement rather than a memory — Discount rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Initial costs</strong> takes a plain number with no unit attached. Expressed as a positive number. It feeds Year 7, Year 3 and Year 9. Fill it from a measurement rather than a memory — Initial costs is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 1</strong> takes a plain number with no unit attached. It feeds Year 7, Year 3 and Year 9. Fill it from a measurement rather than a memory — Year 1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 2</strong> takes a plain number with no unit attached. It feeds Year 7, Year 3 and Year 9. Fill it from a measurement rather than a memory — Year 2 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 3</strong> takes a plain number with no unit attached. It feeds Year 7, Year 9 and Net present value. Fill it from a measurement rather than a memory — Year 3 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 4</strong> takes a plain number with no unit attached. It feeds Year 7, Year 3 and Year 9. Fill it from a measurement rather than a memory — Year 4 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 5</strong> takes a plain number with no unit attached. It feeds Year 7, Year 3 and Year 9. Fill it from a measurement rather than a memory — Year 5 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 6</strong> takes a plain number with no unit attached. It feeds Year 7, Year 3 and Year 9. Fill it from a measurement rather than a memory — Year 6 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 7</strong> takes a plain number with no unit attached. It feeds Year 3, Year 9 and Net present value. Fill it from a measurement rather than a memory — Year 7 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 8</strong> takes a plain number with no unit attached. It feeds Year 7, Year 3 and Year 9. Fill it from a measurement rather than a memory — Year 8 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 9</strong> takes a plain number with no unit attached. It feeds Year 7, Year 3 and Net present value. Fill it from a measurement rather than a memory — Year 9 is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Net present value</strong> is a plain number. It is computed from Initial costs, Discount rate, Year 1 and Year 2, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Expected cash flows</strong> is a plain number. It is computed from Net present value and Initial costs, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on NPV actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Net present value is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Discount rate, Initial costs and Year 1 is what you already know and Net present value and Expected cash flows is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/percentage-discount">Percentage discount Calculator</a>, <a href="/finance/percentage-return">Percentage return Calculator</a> and <a href="/finance/perpetuity">Perpetuity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the NPV calculator work out?', 'a' => 'Net present value and Expected cash flows, from Initial costs, Discount rate, Year 1 and Year 2.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Discount rate (percent), Initial costs (USD), Year 1 (USD), Year 2 (USD), Year 3 (USD). Enter discount rate, initial costs and year 1; Net present value is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Net present value, Year 7, Year 3 and Year 9 blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Net present value is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Discount rate blank and the page solves for it, reporting Net present value instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Net present value keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/percentage-discount', 'name' => 'Percentage discount Calculator'],
            ['path' => '/finance/percentage-return', 'name' => 'Percentage return Calculator'],
            ['path' => '/finance/perpetuity', 'name' => 'Perpetuity'],
        ],
        'authors' => [],
    ],
];
