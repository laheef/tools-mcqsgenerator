<?php

/**
 * Safety stock
 * /finance/safety-stock
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Safety stock',
    'meta' => ['title' => 'Safety stock Calculator — Formula & Results', 'description' => 'Safety stock works out reorder point from max daily usage and max lead time. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Safety stock Calculator', 'updated' => '2026-07-24'],
    'sections' => [
        [
            'title' => 'Basic safety stock',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'maxDailyUsage',
                            'label' => 'Max daily usage',
                            'type' => 'number',
                            'suffix' => 'units',
                            'help' => 'Max daily usage: The absolute maximum number of units you sell or use in a single day.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'maxLeadTime',
                            'label' => 'Max lead time',
                            'type' => 'number',
                            'help' => 'Max lead time: The longest it has ever taken (in days) for a supplier shipment to arrive.',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'avgDailyUsage',
                            'label' => 'Average daily usage',
                            'type' => 'number',
                            'suffix' => 'units',
                            'help' => 'Average daily usage: Your normal, day-to-day average unit sales or usage.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'avgLeadTime',
                            'label' => 'Average lead time',
                            'type' => 'number',
                            'help' => 'Average lead time: The typical number of days it takes for a replenishment order to arrive.',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'safetyStock',
                            'label' => 'Safety stock',
                            'type' => 'number',
                            'suffix' => 'units',
                            'help' => 'The number of buffer items you should always keep on hand to prevent stockouts.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'reorderPoint',
                            'label' => 'Reorder point',
                            'type' => 'number',
                            'suffix' => 'units',
                            'help' => 'The total inventory level that triggers a new order.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Statistical safety stock',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'serviceLevel',
                            'label' => 'Service level',
                            'type' => 'select',
                            'options' => [
                                '85% service level' => '1.036',
                                '90% service level' => '1.282',
                                '95% service level' => '1.645',
                                '97% service level' => '1.881',
                                '99% service level' => '2.326',
                            ],
                            'dataset' => 'serviceLevel_DS',
                            'control' => 'DROPDOWN',
                            'help' => 'The probability that you will not run out of inventory during lead time. A higher service level means more safety stock buffer.',
                            'default' => '95% service level',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'statsAvgDailyUsage',
                            'label' => 'Average daily usage',
                            'type' => 'number',
                            'suffix' => 'units',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'statsAvgLeadTime',
                            'label' => 'Average lead time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'demandVariability',
                            'label' => 'Demand variability',
                            'type' => 'number',
                            'suffix' => 'units',
                            'help' => 'Demande variability: The standard deviation of your daily sales. Measures how much your day-to-day demand fluctuates.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'leadTimeVariability',
                            'label' => 'Lead time variability',
                            'type' => 'result',
                            'help' => 'Lead time variability: The standard deviation of your delivery days. Measures how unpredictable your supplier’s delivery times are.',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'IncludeTimeVariability',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Include lead time variability' => '', '' => '0'],
                            'dataset' => 'demandVariability_DS',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'statsSafetyStock',
                            'label' => 'Safety stock',
                            'type' => 'number',
                            'suffix' => 'units',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'statsReorderPoint',
                            'label' => 'Reorder point',
                            'type' => 'number',
                            'suffix' => 'units',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'safetyStock = (maxDailyUsage * maxLeadTime) - (avgDailyUsage * avgLeadTime)',
            'results' => [
                'safetyStock' => '-avgDailyUsage*avgLeadTime + maxDailyUsage*maxLeadTime',
                'avgLeadTime' => '(maxDailyUsage*maxLeadTime - safetyStock)/avgDailyUsage',
                'avgDailyUsage' => '(maxDailyUsage*maxLeadTime - safetyStock)/avgLeadTime',
                'maxDailyUsage' => '(avgDailyUsage*avgLeadTime + safetyStock)/maxLeadTime',
                'maxLeadTime' => '(avgDailyUsage*avgLeadTime + safetyStock)/maxDailyUsage',
            ],
        ],
        [
            'title' => 'reorderPoint  = (avgDailyUsage * avgLeadTime) + safetyStock',
            'results' => ['safetyStock' => '-avgDailyUsage*avgLeadTime + reorderPoint', 'reorderPoint' => 'avgDailyUsage*avgLeadTime + safetyStock', 'avgLeadTime' => '(reorderPoint - safetyStock)/avgDailyUsage', 'avgDailyUsage' => '(reorderPoint - safetyStock)/avgLeadTime'],
        ],
        [
            'title' => 'statsSafetyStock = serviceLevel * sqrt((statsAvgLeadTime * (demandVariability ^ 2)) + ((statsAvgDailyUsage ^ 2) * (leadTimeVariability ^ 2)))',
            'results' => [
                'statsAvgDailyUsage' => 'sqrt(-pow(demandVariability, 2)*statsAvgLeadTime + pow(statsSafetyStock, 2)/pow(serviceLevel, 2))/leadTimeVariability',
                'serviceLevel' => 'statsSafetyStock/sqrt(pow(demandVariability, 2)*statsAvgLeadTime + pow(leadTimeVariability, 2)*pow(statsAvgDailyUsage, 2))',
                'demandVariability' => '-sqrt(-(pow(leadTimeVariability, 2)*pow(statsAvgDailyUsage, 2) - pow(statsSafetyStock, 2)/pow(serviceLevel, 2))/statsAvgLeadTime)',
                'statsSafetyStock' => 'serviceLevel*sqrt(pow(demandVariability, 2)*statsAvgLeadTime + pow(leadTimeVariability, 2)*pow(statsAvgDailyUsage, 2))',
                'leadTimeVariability' => 'sqrt(-pow(demandVariability, 2)*statsAvgLeadTime + pow(statsSafetyStock, 2)/pow(serviceLevel, 2))/statsAvgDailyUsage',
                'statsAvgLeadTime' => '(-pow(leadTimeVariability, 2)*pow(serviceLevel, 2)*pow(statsAvgDailyUsage, 2) + pow(statsSafetyStock, 2))/(pow(demandVariability, 2)*pow(serviceLevel, 2))',
            ],
        ],
        [
            'title' => 'statsReorderPoint = (statsAvgDailyUsage * statsAvgLeadTime) + statsSafetyStock',
            'results' => ['statsAvgDailyUsage' => '(statsReorderPoint - statsSafetyStock)/statsAvgLeadTime', 'statsReorderPoint' => 'statsAvgDailyUsage*statsAvgLeadTime + statsSafetyStock', 'statsAvgLeadTime' => '(statsReorderPoint - statsSafetyStock)/statsAvgDailyUsage', 'statsSafetyStock' => '-statsAvgDailyUsage*statsAvgLeadTime + statsReorderPoint'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Safety stock works out Lead time variability from Max daily usage, Max lead time and Average daily usage. It is a single relationship that reads lead time variability out of max daily usage, not a table of canned results keyed by them. Units for Lead time variability default to days and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Safety stock calculator works', 'html' => <<<'TXT'
            <p>Safety stock answers one question from 12 numbers, and the answer is Lead time variability.</p><p>In the form&#039;s own words, Safety stock = − Average daily usage × Average lead time + Max daily usage × Max lead time.</p><p>The result panel carries Lead time variability, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 12 boxes, and nothing else.</p><ul><li><strong>Max daily usage</strong> — in units. Max daily usage: The absolute maximum number of units you sell or use in a single day.</li><li><strong>Max lead time</strong> — in days. Max lead time: The longest it has ever taken (in days) for a supplier shipment to arrive.</li><li><strong>Average daily usage</strong> — in units. Average daily usage: Your normal, day-to-day average unit sales or usage.</li><li><strong>Average lead time</strong> — in days. Average lead time: The typical number of days it takes for a replenishment order to arrive.</li><li><strong>Safety stock</strong> — in units. The number of buffer items you should always keep on hand to prevent stockouts.</li><li><strong>Reorder point</strong> — in units. The total inventory level that triggers a new order.</li><li><strong>Service level</strong> — a plain number, no unit. The probability that you will not run out of inventory during lead time. A higher service level means more safety stock buffer.</li><li><strong>Average daily usage</strong> — in units</li><li><strong>Average lead time</strong> — in days</li><li><strong>Demand variability</strong> — in units. Demande variability: The standard deviation of your daily sales. Measures how much your day-to-day demand fluctuates.</li><li><strong>Safety stock</strong> — in units</li><li><strong>Reorder point</strong> — in units</li></ul><p>The result box is Lead time variability in days. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Include Time Variability = 0 — through the same formula and the panel reports <strong>Service level</strong> = 1.65.</p><ul><li><strong>Service level</strong> = 1.65</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Safety stock</strong> = <code>− Average daily usage × Average lead time + Max daily usage × Max lead time</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Service level</strong> = 1.65. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Lead time variability lists 6 options and opens on days. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Safety stock</strong> = <code>− Average daily usage × Average lead time + Max daily usage × Max lead time</code></li><li><strong>Average lead time</strong> = <code>(Max daily usage × Max lead time − Safety stock) ÷ Average daily usage</code></li><li><strong>Average daily usage</strong> = <code>(Max daily usage × Max lead time − Safety stock) ÷ Average lead time</code></li><li><strong>Max daily usage</strong> = <code>(Average daily usage × Average lead time + Safety stock) ÷ Max lead time</code></li><li><strong>Max lead time</strong> = <code>(Average daily usage × Average lead time + Safety stock) ÷ Max daily usage</code></li><li><strong>Reorder point</strong> = <code>Average daily usage × Average lead time + Safety stock</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Safety stock</strong> = <code>− Average daily usage × Average lead time + Max daily usage × Max lead time</code> — the form to use when Average daily usage, Average lead time, Max daily usage and Max lead time are the values you have.</li><li><strong>Average lead time</strong> = <code>(Max daily usage × Max lead time − Safety stock) ÷ Average daily usage</code> — the form to use when Max daily usage, Max lead time, Safety stock and Average daily usage are the values you have.</li><li><strong>Average daily usage</strong> = <code>(Max daily usage × Max lead time − Safety stock) ÷ Average lead time</code> — the form to use when Max daily usage, Max lead time, Safety stock and Average lead time are the values you have.</li><li><strong>Max daily usage</strong> = <code>(Average daily usage × Average lead time + Safety stock) ÷ Max lead time</code> — the form to use when Average daily usage, Average lead time, Safety stock and Max lead time are the values you have.</li><li><strong>Max lead time</strong> = <code>(Average daily usage × Average lead time + Safety stock) ÷ Max daily usage</code> — the form to use when Average daily usage, Average lead time, Safety stock and Max daily usage are the values you have.</li><li><strong>Reorder point</strong> = <code>Average daily usage × Average lead time + Safety stock</code> — the form to use when Average daily usage, Average lead time and Safety stock are the values you have.</li><li><strong>Safety stock</strong> = <code>− Average daily usage × Average lead time + Reorder point</code> — the form to use when Average daily usage, Average lead time and Reorder point are the values you have.</li><li><strong>Average lead time</strong> = <code>(Reorder point − Safety stock) ÷ Average daily usage</code> — the form to use when Reorder point, Safety stock and Average daily usage are the values you have.</li></ul><p>Any one of Safety stock, Average lead time and Average daily usage can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Max lead time, Average lead time and Average lead time carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Lead time variability is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Max daily usage left as a guess.</strong> Anything typed into Max daily usage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Max lead time left as a guess.</strong> Anything typed into Max lead time is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Max daily usage is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Safety stock form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Max daily usage</strong> is measured in units. Max daily usage: The absolute maximum number of units you sell or use in a single day. Change it and Safety stock, Average lead time and Average daily usage changes with it. Fill it from a measurement rather than a memory — Max daily usage is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Max lead time</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. Max lead time: The longest it has ever taken (in days) for a supplier shipment to arrive. Change it and Safety stock, Average lead time and Average daily usage changes with it. Fill it from a measurement rather than a memory — Max lead time is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Average daily usage</strong> is measured in units. Average daily usage: Your normal, day-to-day average unit sales or usage. Change it and Safety stock, Average lead time and Max daily usage changes with it. Fill it from a measurement rather than a memory — Average daily usage is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Average lead time</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. Average lead time: The typical number of days it takes for a replenishment order to arrive. Change it and Safety stock, Average daily usage and Max daily usage changes with it. Fill it from a measurement rather than a memory — Average lead time is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Safety stock</strong> is measured in units. The number of buffer items you should always keep on hand to prevent stockouts. Change it and Average lead time, Average daily usage and Max daily usage changes with it. Fill it from a measurement rather than a memory — Safety stock is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Reorder point</strong> is measured in units. The total inventory level that triggers a new order. Change it and Safety stock, Average lead time and Average daily usage changes with it. Fill it from a measurement rather than a memory — Reorder point is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Service level</strong> takes a plain number with no unit attached. The probability that you will not run out of inventory during lead time. A higher service level means more safety stock buffer. Change it and Average daily usage, Demand variability and Safety stock changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Service level is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Average daily usage</strong> is measured in units. Change it and Service level, Demand variability and Safety stock changes with it. Fill it from a measurement rather than a memory — Average daily usage is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Average lead time</strong> is a days quantity: the page opens it in days and converts anything else you pick before the formula runs. Change it and Average daily usage, Service level and Demand variability changes with it. Fill it from a measurement rather than a memory — Average lead time is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Demand variability</strong> is measured in units. Demande variability: The standard deviation of your daily sales. Measures how much your day-to-day demand fluctuates. Change it and Average daily usage, Service level and Safety stock changes with it. Fill it from a measurement rather than a memory — Demand variability is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Safety stock</strong> is measured in units. Change it and Average daily usage, Service level and Demand variability changes with it. Fill it from a measurement rather than a memory — Safety stock is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Reorder point</strong> is measured in units. Change it and Average daily usage, Average lead time and Safety stock changes with it. Fill it from a measurement rather than a memory — Reorder point is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Lead time variability is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The chips cover days. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Max daily usage, Max lead time and Average daily usage is what you already know and Lead time variability is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/saas-ltv">SaaS lifetime value Calculator</a>, <a href="/finance/sabbatical">Sabbatical Calculator</a> and <a href="/finance/salary">Salary Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Safety stock calculator work out?', 'a' => <<<'TXT'
            Lead time variability, from Average daily usage, Average lead time, Max daily usage and Max lead time. The relationship is Safety stock = − Average daily usage × Average lead time + Max daily usage × Max lead time.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Max daily usage (units), Max lead time (days), Average daily usage (units), Average lead time (days), Safety stock (units). Enter max daily usage, max lead time and average daily usage; Lead time variability is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Safety stock, Average lead time, Average daily usage and Max daily usage blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Service level = 1.65. The figures come from Max daily usage as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Lead time variability is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Max daily usage blank and the page solves for it, reporting Lead time variability instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Lead time variability at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/saas-ltv', 'name' => 'SaaS lifetime value Calculator'],
            ['path' => '/finance/sabbatical', 'name' => 'Sabbatical Calculator'],
            ['path' => '/finance/salary', 'name' => 'Salary Calculator'],
        ],
        'authors' => [],
    ],
];
