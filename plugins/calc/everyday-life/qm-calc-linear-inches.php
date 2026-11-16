<?php

/**
 * Linear inches
 * /everyday-life/linear-inches
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Linear inches',
    'meta' => ['title' => 'Linear inches Calculator — Formula, Units & Example', 'description' => 'Enter length and width and get linear inches back. Any box can be the unknown. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Linear inches Calculator', 'updated' => '2026-09-16'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Length',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Width',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Height',
                            'label' => 'Height (depth)',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Linear_Inches',
                            'label' => 'Linear inches',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'inch',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Linear_Inches = Length + Width + Height',
            'results' => ['Length' => '-Height + Linear_Inches - Width', 'Height' => '-Length + Linear_Inches - Width', 'Width' => '-Height - Length + Linear_Inches', 'Linear_Inches' => 'Height + Length + Width'],
        ],
    ],
    'article' => [
        'intro' => '<strong>length</strong> is what the Linear inches calculator works out, and it gets there from the width, the height and the linear inches.',
        'sections' => [
            ['title' => 'How does the Linear inches calculator work?', 'html' => <<<'TXT'
            <p>The Linear inches calculator takes the values in the form, applies the relationship described below and reports <strong>length</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the width, the height (depth) and the linear inches.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Width</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Height (depth)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Linear inches</strong></td><td>A measured quantity, 34 units available.</td><td>inches</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in inches</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Linear inches calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 3 figures keep coming back — the width, the height and the linear inches — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Linear inches calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — width for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/bikini">Bikini body shape</a>, <a href="/everyday-life/binge-watching">Quarantine binge watching</a> and <a href="/everyday-life/birth-from-death-date">Birth from death date</a>.</p>
            TXT],
            ['title' => 'Adding the three dimensions correctly', 'html' => <<<'TXT'
            <p>The Linear inches calculator adds length, width and height to produce a single total. This measurement is commonly used as a compact way to compare the outside dimensions of an object with a carrier, storage limit or shipping rule. It is not a geometric length along one side, nor is it volume. A total of linear inches says nothing by itself about weight, shape or whether an item will fit through a particular opening.</p>
            <p>Measure the longest exterior length, width and height, including fixed parts that protrude. For luggage, that may include wheels, handles and feet if the airline’s rule counts them. For a parcel, include protective packaging and any bulges. Measure the finished item rather than relying on a product’s interior dimensions, since the outside size is what a rack, bin or carrier encounters.</p>
            <p>Keep all three measurements in the same unit before adding. If the form uses inches, convert centimeters by dividing by 2.54, or select the correct unit if the field supports it. Adding a length in centimeters to a width in inches has no meaningful physical interpretation. Check the unit chip and the result label before comparing against a published limit.</p>
            <p>Some rules define linear dimensions differently or specify a maximum for each side in addition to the sum. A bag can pass a total-size limit and still exceed the permitted length, width or height. Read the carrier or equipment provider’s current rules, including whether handles and wheels count and how oversize items are treated. The calculator only performs the sum you enter; it does not decide which policy applies.</p>
            <p>For an irregular item, use its largest dimensions as the rule requires. A soft bag may compress, while a rigid case cannot. Do not compress an item in a way that damages it or violates the carrier’s instructions. If the dimensions are close to a limit, leave a margin for measurement error, rounded labels and manufacturing tolerances.</p>
            <p>When a box or case is assembled from parts, measure the final packed configuration. Add the three dimensions of the outer package, not the interior cavity. Keep a record of the dimensions and the rule you are checking against; different airlines, carriers and storage systems can use different limits.</p>
            <p>This tool is useful for quickly checking a sum or comparing two packages. It cannot guarantee acceptance by a carrier, and it does not calculate volume, weight, dimensional-weight charges or fit through a doorway. Verify the official limit with the provider before purchasing or traveling.</p>
            TXT],
            ['title' => 'Where linear dimensions appear in travel and shipping', 'html' => <<<'TXT'
            <p>Travel providers may use a combined size limit, separate side limits or both. A checked-bag rule might state a linear-dimension maximum, while a carry-on rule can also specify independent limits for length, width and height. The calculator’s sum is only one check. Always consult the current carrier rules for the route, fare and item type, because sporting equipment, musical instruments and mobility devices can follow different policies.</p><p>Shipping services can use the outer package dimensions to determine handling or dimensional weight. Linear inches alone cannot calculate a shipping charge; the carrier may use length times width times height, package weight, service level and destination. Measure the finished parcel after padding and sealing it. An unboxed product’s measurements may not match the parcel that will be accepted.</p><p>For a rectangular object, use its longest external sides as length, width and height. If the item has wheels, feet or a handle that does not retract, include them when the rule says to measure the outside. For a soft-sided bag, measure it packed as it will travel, not empty and collapsed. Do not assume a soft bag can be compressed enough to meet a limit unless the provider allows that.</p><p>If a measurement is close to a published limit, measure again and leave room for tape placement and manufacturing tolerances. A soft tape can bend around a corner; a rigid ruler across the outside may give a different reading. Use the method specified by the carrier when one is provided.</p><p>Record the three side measurements, their units, the computed sum and the provider’s rule. If the provider rounds dimensions to whole inches, a value just below a threshold may still be treated as over the limit. Verify the rule before buying a suitcase or paying an oversize fee.</p>
            TXT],
            ['title' => 'A quick worked check and common measurement errors', 'html' => <<<'TXT'
            <p>Suppose an outer package measures 24 inches long, 16 inches wide and 10 inches high. Its linear total is the sum of those three dimensions. This example shows the arithmetic only; a carrier’s actual limit and package rules must be checked separately. If one dimension is recorded in centimeters, convert it before adding. Keep the original measurements nearby so a reviewer can verify each side.</p><p>Measure from the furthest points on each axis, not along the surface of a curved or padded object. For a suitcase, wheels and handles may extend beyond the shell. For a parcel, tape, padding and a bulging seam can change the outside size. Use the provider’s measurement instructions when they specify how to handle protrusions or soft-sided items.</p><p>Do not confuse linear inches with cubic inches. Linear inches are length plus width plus height; cubic inches multiply the three dimensions and represent a volume. Dimensional-weight formulas often use a volume-like calculation divided by a carrier-specific divisor, then compare it with actual weight. This calculator does not calculate dimensional weight or shipping price.</p><p>An irregular or round item may require a bounding box or another measurement method from the carrier. The sum of a bounding box can exceed the object’s apparent dimensions, but it is the package envelope that matters for handling. If you use a soft tape, keep it straight across the widest extent rather than wrapping it around the object.</p><p>When comparing luggage, check both the total and each side. A bag with a small sum can still exceed a height limit. Airline rules may vary by route, cabin, fare, aircraft or item category. Measure the bag when packed as it will travel and confirm the current policy before leaving for the airport.</p><p>For a purchase, leave some margin below a published limit. Retail measurements can be rounded, and your own measurement may vary by a fraction of an inch. A result exactly at the limit is not a guarantee that a provider will accept the item.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Linear inches calculator work out?', 'a' => 'It returns length, derived from the width, the height and the linear inches.'],
            ['q' => 'What do I need to enter to use the Linear inches calculator?', 'a' => 'The form asks for the width, the height and the linear inches, which is 3 fields in total.'],
            ['q' => 'Can I enter length in a different unit?', 'a' => 'Yes. Length opens in centimeters and the chip beside it offers 34 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Length = -30 cm.'],
        ],
        'related' => [
            ['path' => '/everyday-life/bikini', 'name' => 'Bikini body shape'],
            ['path' => '/everyday-life/binge-watching', 'name' => 'Quarantine binge watching'],
            ['path' => '/everyday-life/birth-from-death-date', 'name' => 'Birth from death date'],
        ],
    ],
];
