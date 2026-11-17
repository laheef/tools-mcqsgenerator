<?php

/**
 * GST/QST
 * /finance/gst-qst
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GST/QST',
    'meta' => ['title' => 'GST/QST Calculator — Formula, Units & Example', 'description' => 'GST/QST takes select your province or territory: and returns GST (5%). The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'GST/QST Calculator', 'updated' => '2025-02-14'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Provinces',
                            'label' => 'Select your province or territory:',
                            'type' => 'select',
                            'options' => [
                                'Alberta' => '0.05',
                                'British Columbia' => '0.05',
                                'Manitoba' => '0.05',
                                'New Brunswick' => '0',
                                'Newfoundland and Labrador' => '0',
                                'Northwest Territories' => '0.05',
                                'Nova Scotia' => '0',
                                'Nunavut' => '0.05',
                                'Ontario' => '0',
                                'Prince Edward Island' => '0',
                                'Quebec' => '0.05',
                                'Saskatchewan' => '0.05',
                                'Yukon' => '0.05',
                            ],
                            'dataset' => 'taxesPerProvince',
                            'control' => 'DROPDOWN',
                            'default' => 'Alberta',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'Provinces == 1', 'text' => 'Alberta applies only the Goods and Services Tax (GST).&nbsp;'],
                                ['when' => 'Provinces == 3', 'text' => <<<'TXT'
                                Prince Edward Island is one of 5 provinces that apply the harmonized sales tax (HST). The HST is just a simplified display of the Goods and Services Tax (GST) and the Provincial Sales Tax (PST).&nbsp;
                                TXT],
                                ['when' => 'Provinces == 5', 'text' => <<<'TXT'
                                New Brunswick is one of 5 provinces that apply the Harmonized Sales Tax (HST). The HST is just a simplified display of the Goods and Services Tax (GST) and the Provincial Sales Tax (PST).&nbsp;
                                TXT],
                                ['when' => 'Provinces == 6', 'text' => <<<'TXT'
                                Nova Scotia is one of 5 provinces that apply the Harmonized Sales Tax (HST). The HST is just a simplified display of the Goods and Services Tax (GST) and the Provincial Sales Tax (PST).&nbsp;
                                TXT],
                                ['when' => 'Provinces == 8', 'text' => <<<'TXT'
                                Ontario is one of 5 provinces that apply the Harmonized Sales Tax (HST). The HST is just a simplified display of the Goods and Services Tax (GST) and the Provincial Sales Tax (PST).&nbsp;
                                TXT],
                                ['when' => 'Provinces == 11', 'text' => <<<'TXT'
                                Newfoundland and Labrador is one of 5 provinces that apply the Harmonized Sales Tax (HST). The HST is just a simplified display of the Goods and Services Tax (GST) and the Provincial Sales Tax (PST).&nbsp;
                                TXT],
                                ['when' => 'Provinces == 2', 'text' => 'British Columbia applies the Goods and Services Tax (GST) and the Provincial Sales Tax (PST).&nbsp;'],
                                ['when' => 'Provinces == 4', 'text' => 'Manitoba applies the Goods and Services Tax (GST) and the Provincial Sales Tax (PST).&nbsp;'],
                                ['when' => 'Provinces == 7', 'text' => 'Nunavut applies only the Goods and Services Tax (GST).&nbsp;'],
                                ['when' => 'Provinces == 9', 'text' => 'Quebec applies the Goods and Services Tax (GST) and the Quebec Sales Tax (QST), equivalent to the PST.'],
                                ['when' => 'Provinces == 10', 'text' => 'Saskatchewan applies the Goods and Services Tax (GST) and the Provincial Sales Tax (PST).&nbsp;'],
                                ['when' => 'Provinces == 12', 'text' => 'The Northwest Territories applies only the Goods and Services Tax (GST).&nbsp;'],
                                ['when' => 'Provinces == 13', 'text' => 'Yukon applies only the Goods and Services Tax (GST).&nbsp;'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'netPrice',
                            'label' => 'Amount before tax',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amountGST',
                            'label' => 'GST (5%)',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Goods and Services Tax.',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amountHST',
                            'label' => 'HST (15%)',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Harmonized Sales Tax.',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amountPST',
                            'label' => 'PST (7%)',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Provincial Sales Tax.',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amountQST',
                            'label' => 'QST  (9.975%)',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Quebec Sales Tax.',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grossPrice',
                            'label' => 'Amount after tax',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
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
                        [
                            'name' => 'GST',
                            'label' => 'Gst',
                            'type' => 'result',
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
                            'name' => 'HST',
                            'label' => 'Hst',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PST',
                            'label' => 'Pst',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'grossPrice = netPrice + netPrice *GST + netPrice*PST  + netPrice*HST',
            'results' => [
                'netPrice' => 'grossPrice/(GST + HST + PST + 1)',
                'PST' => '-GST - HST + grossPrice/netPrice - 1',
                'HST' => '-GST - PST + grossPrice/netPrice - 1',
                'GST' => '-HST - PST + grossPrice/netPrice - 1',
                'grossPrice' => 'netPrice*(GST + HST + PST + 1)',
            ],
        ],
        [
            'title' => 'amountGST = netPrice *GST',
            'results' => ['GST' => 'amountGST/netPrice', 'amountGST' => 'GST*netPrice', 'netPrice' => 'amountGST/GST'],
        ],
        [
            'title' => 'amountPST = netPrice*PST',
            'results' => ['amountPST' => 'PST*netPrice', 'PST' => 'amountPST/netPrice', 'netPrice' => 'amountPST/PST'],
        ],
        [
            'title' => 'amountHST = netPrice*HST',
            'results' => ['netPrice' => 'amountHST/HST', 'amountHST' => 'HST*netPrice', 'HST' => 'amountHST/netPrice'],
        ],
        [
            'title' => 'amountQST = netPrice*PST',
            'results' => ['netPrice' => 'amountQST/PST', 'PST' => 'amountQST/netPrice', 'amountQST' => 'PST*netPrice'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        GST/QST turns Select your province or territory, Amount before tax and Amount after tax into GST (5%) and HST (15%). It is a single relationship that reads GST (5%) out of select your province or territory, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the GST/QST calculator works', 'html' => <<<'TXT'
            <p>The GST/QST calculator applies one relationship to 3 numbers and reports GST (5%), HST (15%) and PST (7%).</p><p>Written with the labels from the form, Amount after tax = Amount before tax × (Gst + Hst + Pst + 1).</p><p>The answers are GST (5%), HST (15%), PST (7%) and QST (9.975%); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Select your province or territory</strong> — a plain number, no unit</li><li><strong>Amount before tax</strong> — a plain number, no unit</li><li><strong>Amount after tax</strong> — a plain number, no unit</li></ul><p>The result boxes are GST (5%), HST (15%), PST (7%), QST (9.975%), Gst in percent, Hst, Pst; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Gst offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Amount after tax</strong> = <code>Amount before tax × (Gst + Hst + Pst + 1)</code></li><li><strong>Amount before tax</strong> = <code>Amount after tax ÷ (Gst + Hst + Pst + 1)</code></li><li><strong>Pst</strong> = <code>− Gst − Hst + Amount after tax ÷ Amount before tax − 1</code></li><li><strong>Hst</strong> = <code>− Gst − Pst + Amount after tax ÷ Amount before tax − 1</code></li><li><strong>Gst</strong> = <code>− Hst − Pst + Amount after tax ÷ Amount before tax − 1</code></li><li><strong>GST (5%)</strong> = <code>Gst × Amount before tax</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Amount after tax</strong> = <code>Amount before tax × (Gst + Hst + Pst + 1)</code> — the form to use when Amount before tax, Gst, Hst and Pst are the values you have.</li><li><strong>Amount before tax</strong> = <code>Amount after tax ÷ (Gst + Hst + Pst + 1)</code> — the form to use when Amount after tax, Gst, Hst and Pst are the values you have.</li><li><strong>Pst</strong> = <code>− Gst − Hst + Amount after tax ÷ Amount before tax − 1</code> — the form to use when Gst, Hst, Amount after tax and Amount before tax are the values you have.</li><li><strong>Hst</strong> = <code>− Gst − Pst + Amount after tax ÷ Amount before tax − 1</code> — the form to use when Gst, Pst, Amount after tax and Amount before tax are the values you have.</li><li><strong>Gst</strong> = <code>− Hst − Pst + Amount after tax ÷ Amount before tax − 1</code> — the form to use when Hst, Pst, Amount after tax and Amount before tax are the values you have.</li><li><strong>GST (5%)</strong> = <code>Gst × Amount before tax</code> — the form to use when Gst and Amount before tax are the values you have.</li><li><strong>Gst</strong> = <code>GST (5%) ÷ Amount before tax</code> — the form to use when GST (5%) and Amount before tax are the values you have.</li><li><strong>Amount before tax</strong> = <code>GST (5%) ÷ Gst</code> — the form to use when GST (5%) and Gst are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Amount after tax, Amount before tax and Pst can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with GST (5%), HST (15%) and PST (7%) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Select your province or territory left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Select your province or territory is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Amount before tax left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Amount before tax is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Amount after tax left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Amount after tax is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Select your province or territory: is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Select your province or territory</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Select your province or territory is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Amount before tax</strong> takes a plain number with no unit attached. Change it and Pst, Hst and Gst changes with it. Have it to hand before you start: Amount before tax is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Amount after tax</strong> takes a plain number with no unit attached. Change it and Amount before tax, Pst and Hst changes with it. Have it to hand before you start: Amount after tax is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>GST (5%)</strong> is a plain number. The value follows from Gst and Amount before tax. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>HST (15%)</strong> is a plain number. The value follows from Hst and Amount before tax. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>PST (7%)</strong> is a plain number. The value follows from Pst and Amount before tax. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>QST (9.975%)</strong> is a plain number. The value follows from Pst and Amount before tax. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Gst</strong> is a percent figure. The value follows from Hst, Pst, Amount after tax and Amount before tax. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Hst</strong> is a plain number. The value follows from Gst, Pst, Amount after tax and Amount before tax. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Pst</strong> is a plain number. The value follows from Gst, Hst, Amount after tax and Amount before tax. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> GST (5%) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Select your province or territory, Amount before tax and Amount after tax are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Select your province or territory, Amount before tax and Amount after tax measured, GST (5%) and HST (15%) wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/days-sales-outstanding">Day sales outstanding (DSO) Calculator</a>, <a href="/finance/days-inventory-outstanding">Days inventory outstanding (DIO) Calculator</a> and <a href="/finance/days-payable-outstanding">Days payable outstanding (DPO) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GST/QST calculator work out?', 'a' => <<<'TXT'
            GST (5%), HST (15%), PST (7%) and QST (9.975%), from Amount before tax, Gst, Hst and Pst. The relationship is Amount after tax = Amount before tax × (Gst + Hst + Pst + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Select your province or territory, Amount before tax, Amount after tax. Enter select your province or territory, amount before tax and amount after tax; GST (5%) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Amount after tax, Amount before tax, Pst and Hst can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally GST (5%) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Select your province or territory: left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to GST (5%) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/days-sales-outstanding', 'name' => 'Day sales outstanding (DSO) Calculator'],
            ['path' => '/finance/days-inventory-outstanding', 'name' => 'Days inventory outstanding (DIO) Calculator'],
            ['path' => '/finance/days-payable-outstanding', 'name' => 'Days payable outstanding (DPO) Calculator'],
        ],
        'authors' => [],
    ],
];
