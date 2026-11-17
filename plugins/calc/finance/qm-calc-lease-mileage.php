<?php

/**
 * Lease mileage
 * /finance/lease-mileage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lease mileage',
    'meta' => ['title' => 'Lease mileage Calculator — Formula & Results', 'description' => 'Lease mileage takes total lease term, remaining lease time and current miles driven and returns predicted excess miles and predicted lease-end charge.', 'h1' => 'Lease mileage Calculator', 'updated' => '2024-06-17'],
    'sections' => [
        [
            'title' => 'Lease details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_term',
                            'label' => 'Total lease term',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'remaining_term',
                            'label' => 'Remaining lease time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_miles_driven',
                            'label' => 'Current miles driven',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'km',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mileage_allowance',
                            'label' => 'Annual mileage allowance',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'km',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'excess_distance_fee',
                            'label' => 'Excess distance fee',
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
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'excess_miles',
                            'label' => 'Predicted excess miles',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'km',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lease_end_charge',
                            'label' => 'Predicted lease-end charge',
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
                            'name' => 'monthly_savings',
                            'label' => 'Monthly savings required',
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
            'title' => 'lease_end_charge = one_way(excess_miles * excess_distance_fee)',
            'results' => ['lease_end_charge' => <<<'TXT'
            (excess_distance_fee*max(0, (1/12)*total_term*(-12*current_miles_driven - mileage_allowance*remaining_term + mileage_allowance*total_term)/(remaining_term - total_term)))
            TXT],
        ],
        [
            'title' => 'excess_miles = max((current_miles_driven +  current_miles_driven / (total_term - remaining_term)* remaining_term- mileage_allowance*total_term/12),0)',
            'results' => ['excess_miles' => 'max(0, (1/12)*total_term*(-12*current_miles_driven - mileage_allowance*remaining_term + mileage_allowance*total_term)/(remaining_term - total_term))'],
        ],
        [
            'title' => 'monthly_savings = one_way(lease_end_charge/remaining_term)',
            'results' => ['monthly_savings' => <<<'TXT'
            ((excess_distance_fee*max(0, (1/12)*total_term*(-12*current_miles_driven - mileage_allowance*remaining_term + mileage_allowance*total_term)/(remaining_term - total_term)))/remaining_term)
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Lease mileage works out Predicted excess miles and Predicted lease-end charge from Total lease term, Remaining lease time and Current miles driven. It is a single relationship that reads predicted excess miles out of total lease term, not a table of canned results keyed by them. Units for Predicted excess miles default to kilometers and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Lease mileage calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Lease mileage: it takes 5 numbers and reports Predicted excess miles, Predicted lease-end charge and Monthly savings required.</p><p>What comes back is Predicted excess miles, Predicted lease-end charge and Monthly savings required — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Total lease term</strong> — in years / months</li><li><strong>Remaining lease time</strong> — in years / months</li><li><strong>Current miles driven</strong> — in kilometers</li><li><strong>Annual mileage allowance</strong> — in kilometers</li><li><strong>Excess distance fee</strong> — in USD</li></ul><p>The answers come back as Predicted excess miles in kilometers, Predicted lease-end charge in USD, Monthly savings required in USD. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Total lease term = 3 yrsmos, Remaining lease time = 4 yrsmos, Current miles driven = 5 km, Annual mileage allowance = 6 km and Excess distance fee = 7 USD — through the same formula and the panel reports <strong>Predicted lease-end charge</strong> = 0 USD, <strong>Predicted excess miles</strong> = 0 km and <strong>Monthly savings required</strong> = 0 USD.</p><ul><li><strong>Predicted lease-end charge</strong> = 0 USD</li><li><strong>Predicted excess miles</strong> = 0 km</li><li><strong>Monthly savings required</strong> = 0 USD</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Predicted lease-end charge</strong> = 0, <strong>Predicted excess miles</strong> = 0 and <strong>Monthly savings required</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Predicted excess miles lists 6 options and opens on kilometers. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Predicted excess miles</strong> = <code>max(0, (1 ÷ 12) × Total lease term × ( − 12 × Current miles driven − Annual mileage allowance × Remaining lease time + Annual mileage allowance × Total lease term) ÷ (Remaining lease time − Total lease term))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Predicted excess miles</strong> = <code>max(0, (1 ÷ 12) × Total lease term × ( − 12 × Current miles driven − Annual mileage allowance × Remaining lease time + Annual mileage allowance × Total lease term) ÷ (Remaining lease time − Total lease term))</code> — the form to use when Total lease term, Current miles driven, Annual mileage allowance and Remaining lease time are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Predicted lease-end charge, Predicted excess miles and Monthly savings required can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Total lease term from 3 to 6, leaving every other box alone. The panel moves from <strong>Predicted lease-end charge</strong> 0 USD, <strong>Predicted excess miles</strong> 0 km and <strong>Monthly savings required</strong> 0 USD to <strong>Predicted lease-end charge</strong> 84 USD, <strong>Predicted excess miles</strong> 12 km and <strong>Monthly savings required</strong> 21 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Total lease term, Remaining lease time and Current miles driven carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Predicted excess miles, Predicted lease-end charge and Monthly savings required are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Total lease term left as a guess.</strong> Anything typed into Total lease term is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Remaining lease time left as a guess.</strong> Anything typed into Remaining lease time is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Total lease term and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Total lease term</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. Change it and Predicted lease-end charge, Predicted excess miles and Monthly savings required changes with it. Have it to hand before you start: Total lease term is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Remaining lease time</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. Change it and Predicted lease-end charge, Predicted excess miles and Monthly savings required changes with it. Have it to hand before you start: Remaining lease time is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Current miles driven</strong> is a kilometers quantity: the page opens it in km and converts anything else you pick before the formula runs. Change it and Predicted lease-end charge, Predicted excess miles and Monthly savings required changes with it. Have it to hand before you start: Current miles driven is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annual mileage allowance</strong> is a kilometers quantity: the page opens it in km and converts anything else you pick before the formula runs. Change it and Predicted lease-end charge, Predicted excess miles and Monthly savings required changes with it. Have it to hand before you start: Annual mileage allowance is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Excess distance fee</strong> takes a plain number with no unit attached. Change it and Predicted lease-end charge and Monthly savings required changes with it. Have it to hand before you start: Excess distance fee is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Predicted excess miles</strong> is a kilometers figure and the page's own defaults put it at 0 km. It is worked out from Total lease term, Current miles driven, Annual mileage allowance and Remaining lease time. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Predicted lease-end charge</strong> is a plain number and the page's own defaults put it at 0. It is worked out from Excess distance fee, Total lease term, Current miles driven and Annual mileage allowance. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Monthly savings required</strong> is a plain number and the page's own defaults put it at 0. It is worked out from Excess distance fee, Total lease term, Current miles driven and Annual mileage allowance. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Predicted lease-end charge</th><th>Predicted excess miles</th><th>Monthly savings required</th></tr></thead><tbody><tr><td><strong>Total lease term</strong> +10%</td><td>—</td><td>—</td><td>—</td></tr><tr><td><strong>Remaining lease time</strong> +10%</td><td>—</td><td>—</td><td>—</td></tr><tr><td><strong>Current miles driven</strong> +10%</td><td>—</td><td>—</td><td>—</td></tr><tr><td><strong>Annual mileage allowance</strong> +10%</td><td>—</td><td>—</td><td>—</td></tr><tr><td><strong>Excess distance fee</strong> +10%</td><td>—</td><td>—</td><td>—</td></tr></tbody></table><p>The steepest column belongs to Total lease term: ten per cent there moves an answer by about 0 per cent, which is why that is the number to measure twice. By contrast, Total lease term, Remaining lease time and Current miles driven barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Total lease term = 1.5 yrsmos, Remaining lease time = 2 yrsmos, Current miles driven = 2.5 km, Annual mileage allowance = 3 km and Excess distance fee = 3.5 USD, the answer is <strong>Predicted lease-end charge</strong> = 0 USD, <strong>Predicted excess miles</strong> = 0 km and <strong>Monthly savings required</strong> = 0 USD.</li><li>With Total lease term = 9 yrsmos, Remaining lease time = 4 yrsmos, Current miles driven = 5 km, Annual mileage allowance = 6 km and Excess distance fee = 7 USD, the answer is <strong>Predicted lease-end charge</strong> = 31.5 USD, <strong>Predicted excess miles</strong> = 4.5 km and <strong>Monthly savings required</strong> = 7.88 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>kilometers</strong> — opens in <em>km</em>, and the chip also carries km, ft, yd, mi and nmi. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>years / months</strong> — opens in <em>yrsmos</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Predicted excess miles is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover kilometers and years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Total lease term, Remaining lease time and Current miles driven is what you already know and Predicted excess miles and Predicted lease-end charge is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/bond-convexity">Bond convexity</a>, <a href="/finance/bond-current-yield">Bond current yield Calculator</a> and <a href="/finance/bond-equivalent-yield">Bond equivalent yield Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lease mileage calculator work out?', 'a' => <<<'TXT'
            Predicted excess miles, Predicted lease-end charge and Monthly savings required, from Excess distance fee, Total lease term, Current miles driven and Annual mileage allowance.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Total lease term (years / months), Remaining lease time (years / months), Current miles driven (kilometers), Annual mileage allowance (kilometers), Excess distance fee (USD). Enter total lease term, remaining lease time and current miles driven; Predicted excess miles is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Predicted lease-end charge, Predicted excess miles and Monthly savings required can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Predicted lease-end charge = 0 USD, Predicted excess miles = 0 km and Monthly savings required = 0 USD. The figures come from Total lease term as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Predicted excess miles is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Total lease term left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Predicted excess miles keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/bond-convexity', 'name' => 'Bond convexity'],
            ['path' => '/finance/bond-current-yield', 'name' => 'Bond current yield Calculator'],
            ['path' => '/finance/bond-equivalent-yield', 'name' => 'Bond equivalent yield Calculator'],
        ],
        'authors' => [],
    ],
];
