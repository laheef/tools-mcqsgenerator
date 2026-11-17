<?php

/**
 * US income percentile
 * /finance/us-income-percentile
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'US income percentile',
    'meta' => ['title' => 'US income percentile: Formula, Steps & Results', 'description' => 'Enter income type and income and US income percentile returns inc per ind and inc per household. Every box can be solved for, not only the one in the title.', 'h1' => 'US income percentile Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Choose the income type and insert the relevant income to compare your income to the citizens of the United States.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income_type',
                            'label' => 'Income type',
                            'type' => 'select',
                            'options' => ['Individual' => '0', 'Household' => '1'],
                            'dataset' => 'Income Type',
                            'default' => 'Individual',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income',
                            'label' => 'Income',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => <<<'TXT'
                                Based on the 2021 United States Census Bureau’s Annual ASEC survey: The median individual income is $44,225, and the mean individual income is $63,214. The median household income is $67,463, and the mean household income is $96,955.
                                TXT],
                                ['when' => 'hasValue(income) and mod(inc_per_ind, 10) != 1 and mod(inc_per_ind, 10) != 2 and mod(inc_per_ind, 10) != 3', 'text' => 'Your individual income is at the {{inc_per_ind.formattedValue}}th percentile.'],
                                ['when' => 'hasValue(income) and mod(inc_per_ind, 10) == 1', 'text' => 'Your individual income is at the {{inc_per_ind.formattedValue}}st percentile.'],
                                ['when' => 'hasValue(income) and mod(inc_per_ind, 10) == 2', 'text' => 'Your individual income is at the {{inc_per_ind.formattedValue}}nd percentile.'],
                                ['when' => 'hasValue(income) and mod(inc_per_ind, 10) == 3', 'text' => 'Your individual income is at the {{inc_per_ind.formattedValue}}rd percentile.'],
                                ['when' => 'income > mean_ind_income', 'text' => 'Your individual income is higher than the average individual income in the U.S. '],
                                ['when' => 'income <= mean_ind_income', 'text' => 'Your individual income is lower than the average individual income in the U.S. '],
                                ['when' => 'income >= top_one_ind_income', 'text' => 'Wow! Your individual income is among the top 1% in the U.S. Your individual income is higher than 99% of the U.S. citizens. '],
                                ['when' => 'income >= median_ind_income and income < top_one_ind_income', 'text' => 'Excellent! Your individual income is among the top 50% in the U.S. Your individual income is higher than 50% of the U.S. citizens. '],
                                ['when' => 'income < median_ind_income', 'text' => 'Your individual income is among the bottom 50% in the U.S. '],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => <<<'TXT'
                                Based on the 2021 United States Census Bureau’s Annual ASEC survey: The median individual income is $44,225, and the mean individual income is $63,214. The median household income is $67,463, and the mean household income is $96,955.
                                TXT],
                                ['when' => 'hasValue(income) and mod(inc_per_household, 10) != 1 and mod(inc_per_household, 10) != 2 and mod(inc_per_household, 10) != 3', 'text' => 'Your household income is at the {{inc_per_household.formattedValue}}th percentile.'],
                                ['when' => 'hasValue(income) and mod(inc_per_household, 10) == 1', 'text' => 'Your household income is at the {{inc_per_household.formattedValue}}st percentile.'],
                                ['when' => 'hasValue(income) and mod(inc_per_household, 10) == 2', 'text' => 'Your household income is at the {{inc_per_household.formattedValue}}nd percentile.'],
                                ['when' => 'hasValue(income) and mod(inc_per_household, 10) == 3', 'text' => 'Your household income is at the {{inc_per_household.formattedValue}}rd percentile.'],
                                ['when' => 'income > mean_house_income', 'text' => 'Your household income is higher than the average household income in the U.S. &nbsp;'],
                                ['when' => 'income <= mean_house_income', 'text' => 'Your household income is lower than the average household income in the U.S. &nbsp;'],
                                ['when' => 'income >= top_one_house_income', 'text' => 'Wow! Your household income is among the top 1% in the U.S. Your household income is higher than 99% of the U.S. citizens. '],
                                ['when' => 'income >= median_house_income and income < top_one_house_income', 'text' => 'Excellent! Your household income is among the top 50% in the U.S. Your household income is higher than 50% of the U.S. citizens. '],
                                ['when' => 'income < median_house_income', 'text' => 'Your household income is among the bottom 50% in the U.S. '],
                            ],
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
                            'name' => 'median_ind_income',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'mean_ind_income',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'top_one_ind_income',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'median_house_income',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'mean_house_income',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'top_one_house_income',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'inc_per_ind',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inc_per_household',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '4'],
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
                            'name' => 'inc_per_ind',
                            'label' => 'Inc per ind',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'inc_per_household',
                            'label' => 'Inc per household',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'inc_per_ind = getIndPerc(income)',
            'results' => ['inc_per_ind' => 'getIndPerc(income)'],
        ],
        [
            'title' => 'inc_per_household = getHouseholdPerc(income)',
            'results' => ['inc_per_household' => 'getHouseholdPerc(income)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("getIndPerc",function(income){var inc_per;for(var i=0;i<individual_percs.length;i++){if(income<individual_percs[i]){inc_per=i;break}else{inc_per=100}}return inc_per});omni.define("getHouseholdPerc",function(income){var inc_per;for(var i=0;i<household_percs.length;i++){if(income<household_percs[i]){inc_per=i;break}else{inc_per=100}}return inc_per});var individual_percs=[0,0,52,1040,2200,3510,4990,6000,7171,8500,10000,10703,12000,13000,14311,15001,16000,17020,18010,19404,20000,20104,21306,22400,23357,24003,25000,25050,26002,27003,28000,29000,30000,30000,30199,31385,32111,33300,34830,35000,35700,36400,37671,38879,40000,40001,40600,42000,43000,44225,45001,46000,47200,48473,50000,50002,50402,51850,52700,54100,55028,56206,58002,60000,60010,61000,62601,64886,65400,67402,69887,70213,72281,75000,75815,78152,80011,82008,85001,87600,90055,93200,97027,100012,102200,107000,111300,118000,122485,129181,136000,145025,151660,160512,175300,196006,220005,259608,357552];var household_percs=[0,800,4165,7200,9372,10735,12000,13200,14401,15600,16776,18000,19010,20000,21035,22300,23600,24800,25750,27012,28241,29700,30398,31800,33003,34510,35470,36712,38002,39506,40324,41781,43002,44517,45750,47120,48572,50000,50787,52145,53820,55010,56516,58014,59896,60701,62340,64182,65712,67463,69420,70738,72616,74315,75710,77504,79543,81010,83015,85051,87262,89868,91701,93901,96081,98557,100236,102625,105097,107964,110263,113052,116000,119834,122500,125823,129800,133202,137332,141100,145946,150275,155030,160010,165412,171277,177664,184696,192817,201052,211350,223895,238006,253500,273850,299005,334009,386915,504420];//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Income type and Income into US income percentile and the answer comes back as Inc per ind and Inc per household. It is a single relationship that reads inc per ind out of income type, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the US income percentile calculator works', 'html' => <<<'TXT'
            <p>The US income percentile calculator applies one relationship to 2 numbers and reports Inc per ind and Inc per household.</p><p>In the form&#039;s own words, Inc per ind = getIndPerc(Income).</p><p>What comes back is Inc per ind and Inc per household — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Income type</strong> — a plain number, no unit</li><li><strong>Income</strong> — a plain number, no unit</li></ul><p>What you get back is Inc per ind, Inc per household, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Inc per ind is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Inc per ind</strong> = <code>getIndPerc(Income)</code></li><li><strong>Inc per household</strong> = <code>getHouseholdPerc(Income)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Inc per ind</strong> = <code>getIndPerc(Income)</code> — the form to use when Income are the values you have.</li><li><strong>Inc per household</strong> = <code>getHouseholdPerc(Income)</code> — the form to use when Income are the values you have.</li></ul><p>Any one of Inc per ind and Inc per household can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Inc per ind and Inc per household are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Income type left as a guess.</strong> Anything typed into Income type is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Income left as a guess.</strong> Anything typed into Income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Income type is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Income type</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Income type is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Income</strong> takes a plain number with no unit attached. Change it and Inc per ind and Inc per household changes with it. Have it to hand before you start: Income is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Inc per ind</strong> is a plain number. It is worked out from Income. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Inc per household</strong> is a plain number. It is worked out from Income. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Income type and Income. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Income type into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Inc per ind with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Inc per ind is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Income type and Income measured, Inc per ind and Inc per household wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/deadweight-loss">Deadweight loss Calculator</a>, <a href="/finance/debt-avalanche">Debt avalanche Calculator</a> and <a href="/finance/debt">Debt Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that US income percentile leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/finance/deadweight-loss">Deadweight loss Calculator</a>, <a href="/finance/debt-avalanche">Debt avalanche Calculator</a> and <a href="/finance/debt">Debt Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what US income percentile is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Income type and Income beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the US income percentile calculator work out?', 'a' => 'Inc per ind and Inc per household, from Income. The relationship is Inc per ind = getIndPerc(Income).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Income type, Income. Enter income type and income; Inc per ind is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Inc per ind and Inc per household blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Inc per ind is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Income type left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Inc per ind keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/deadweight-loss', 'name' => 'Deadweight loss Calculator'],
            ['path' => '/finance/debt-avalanche', 'name' => 'Debt avalanche Calculator'],
            ['path' => '/finance/debt', 'name' => 'Debt Calculator'],
        ],
        'authors' => [],
    ],
];
