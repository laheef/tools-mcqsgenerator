<?php

/**
 * Stimulus check - CAAF vs. HEALS vs. HEROES
 * /finance/stimulus-heals-vs-heroes
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stimulus check - CAAF vs. HEALS vs. HEROES',
    'meta' => ['title' => 'Stimulus check - CAAF vs. HEALS vs. HEROES Calculator', 'description' => 'Stimulus check - CAAF vs. HEALS vs. HEROES works out CAAF Act stimulus from have you filed 2019 taxes?. The formula is printed in the form\'s own words.', 'h1' => 'Stimulus check - CAAF vs. HEALS vs. HEROES Calculator', 'updated' => '2025-10-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'This calculator compares the payments you are likely to receive when either the CAAF Act, HEALS Act or the HEROES Act will be passed in the Senate.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'taxForm',
                            'label' => 'Have you filed 2019 taxes?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'dataset' => 'yesno',
                            'help' => <<<'TXT'
                            You need to have filed your tax form either for 2018 or 2019. If you haven't filed your taxes over the last two years, you're not eligible for the stimulus check.
                            TXT,
                            'default' => 'Yes',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'married',
                            'label' => 'Your filing status',
                            'type' => 'select',
                            'options' => ['Single' => '1', 'Married' => '2', 'Head of household' => '3'],
                            'dataset' => 'singlemarried',
                            'help' => 'Head of household typically means a single parent.',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kids',
                            'label' => 'Your dependents under 17',
                            'type' => 'number',
                            'help' => 'Enter the number of dependents under 17 years old you claimed on your last tax form.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'adult_deps',
                            'label' => 'Your adult dependents',
                            'type' => 'number',
                            'help' => 'Enter the number of dependents who are older than 17 you claimed on your last tax form.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income2018',
                            'label' => 'Your income in 2018 (AGI)',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Adjusted gross income on your tax form.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'income2019',
                            'label' => 'Your income in 2019 (AGI)',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'Adjusted gross income on your tax form.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result2018CAAF',
                            'label' => 'CAAF Act stimulus',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'The CAAF Act was proposed by congressional Republicans.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result2019CAAF',
                            'label' => 'CAAF Act stimulus',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'The CAAF Act was proposed by congressional Republicans.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result2018',
                            'label' => 'HEALS Act stimulus',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'The HEALS Act was proposed by congressional Republicans.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result2019',
                            'label' => 'HEALS Act stimulus',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'The HEALS Act was proposed by congressional Republicans.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'resultHEROES18',
                            'label' => 'HEROES Act stimulus',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'The HEALS Act was proposed by congressional Democrats.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'resultHEROES19',
                            'label' => 'HEROES Act stimulus',
                            'type' => 'number',
                            'prefix' => '$',
                            'help' => 'The HEALS Act was proposed by congressional Democrats.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Your income is too high to qualify you for the stimulus payment.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => ' If you\'re currently unemployed, check the differences in unemployment benefit proposed by the Republicans (the HEALS Act) and the Democrats (the HEROES Act)!'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'result2019 = get_check(married, kids, adult_deps, income2019) ',
            'results' => ['result2019' => 'get_check(married, kids, adult_deps, income2019)'],
        ],
        [
            'title' => 'result2018 = get_check(married, kids, adult_deps,income2018)',
            'results' => ['result2018' => 'get_check(married, kids, adult_deps, income2018)'],
        ],
        [
            'title' => 'resultHEROES19 = get_checkHEROES(married, kids, adult_deps, income2019)',
            'results' => ['resultHEROES19' => 'get_checkHEROES(married, kids, adult_deps, income2019)'],
        ],
        [
            'title' => 'resultHEROES18 = get_checkHEROES(married, kids,adult_deps, income2018) ',
            'results' => ['resultHEROES18' => 'get_checkHEROES(married, kids, adult_deps, income2018)'],
        ],
        [
            'title' => 'result2019CAAF = get_checkCAAF(married, kids, adult_deps, income2019)',
            'results' => ['result2019CAAF' => 'get_checkCAAF(married, kids, adult_deps, income2019)'],
        ],
        [
            'title' => 'result2018CAAF = get_checkCAAF(married, kids, adult_deps,income2018)',
            'results' => ['result2018CAAF' => 'get_checkCAAF(married, kids, adult_deps, income2018)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_check",function(married,kids,adult_deps,income2019){var dependents=kids+adult_deps;var result=0;if(married==1){if(income2019<75000){result=result+1200;result=result+500*dependents}else{result=result+500*dependents;result=Math.max(0,result+1200-5*(income2019-75000)/100)}}else if(married==2){if(income2019<150000){result=result+2400;result=result+500*dependents}else{result=result+500*dependents;result=Math.max(0,result+2400-5*(income2019-150000)/100)}}else if(married==3){if(income2019<112500){result=result+1200;result=result+500*dependents}else{result=result+500*dependents;result=Math.max(0,result+1200-5*(income2019-112500)/100)}}return result});omni.define("get_checkHEROES",function(married,kids,adult_deps,income2019){var result=0;var dependents=kids+adult_deps;dependents=Math.min(dependents,3);if(married==1){if(income2019<75000){result=result+1200;result=result+1200*dependents}else{result=result+1200*dependents;result=Math.max(0,result+1200-5*(income2019-75000)/100)}}else if(married==2){if(income2019<150000){result=result+2400;result=result+1200*dependents}else{result=result+1200*dependents;result=Math.max(0,result+2400-5*(income2019-150000)/100)}}else if(married==3){if(income2019<112500){result=result+1200;result=result+1200*dependents}else{result=result+1200*dependents;result=Math.max(0,result+1200-5*(income2019-112500)/100)}}return result});omni.define("get_checkCAAF",function(married,kids,adult_deps,income2019){var dependents=kids+adult_deps;var result=0;if(married==1){if(income2019<75000){result=result+1000;result=result+1000*dependents}else{result=result+1000*dependents;result=Math.max(0,result+1000-5*(income2019-75000)/100)}}else if(married==2){if(income2019<150000){result=result+2000;result=result+1000*dependents}else{result=result+1000*dependents;result=Math.max(0,result+2000-5*(income2019-150000)/100)}}else if(married==3){if(income2019<112500){result=result+1000;result=result+1000*dependents}else{result=result+500*dependents;result=Math.max(0,result+1000-5*(income2019-112500)/100)}}return result});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Stimulus check - CAAF vs. HEALS vs. HEROES takes Your filing status, Your dependents under 17 and Your adult dependents and returns CAAF Act stimulus and CAAF Act stimulus. Nothing is looked up on this page: CAAF Act stimulus is computed from your filing status and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Stimulus check - CAAF vs. HEALS vs. HEROES calculator works', 'html' => <<<'TXT'
            <p>The Stimulus check - CAAF vs. HEALS vs. HEROES calculator applies one relationship to 4 numbers and reports CAAF Act stimulus, CAAF Act stimulus and HEALS Act stimulus.</p><p>In the form&#039;s own words, HEALS Act stimulus = get_check(Your filing status, Your dependents under 17, Your adult dependents, Your income in 2019 (AGI)).</p><p>The result panel carries CAAF Act stimulus, CAAF Act stimulus, HEALS Act stimulus and HEALS Act stimulus, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Your filing status</strong> — a plain number, no unit. Head of household typically means a single parent.</li><li><strong>Your dependents under 17</strong> — a plain number, no unit. Enter the number of dependents under 17 years old you claimed on your last tax form.</li><li><strong>Your adult dependents</strong> — a plain number, no unit. Enter the number of dependents who are older than 17 you claimed on your last tax form.</li><li><strong>Your income in 2019 (AGI)</strong> — a plain number, no unit. Adjusted gross income on your tax form.</li></ul><p>The result boxes are CAAF Act stimulus, CAAF Act stimulus, HEALS Act stimulus, HEALS Act stimulus, HEROES Act stimulus, HEROES Act stimulus; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: CAAF Act stimulus takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>HEALS Act stimulus</strong> = <code>get_check(Your filing status, Your dependents under 17, Your adult dependents, Your income in 2019 (AGI))</code></li><li><strong>HEROES Act stimulus</strong> = <code>get_checkHEROES(Your filing status, Your dependents under 17, Your adult dependents, Your income in 2019 (AGI))</code></li><li><strong>CAAF Act stimulus</strong> = <code>get_checkCAAF(Your filing status, Your dependents under 17, Your adult dependents, Your income in 2019 (AGI))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>HEALS Act stimulus</strong> = <code>get_check(Your filing status, Your dependents under 17, Your adult dependents, Your income in 2019 (AGI))</code> — the form to use when Your filing status, Your dependents under 17, Your adult dependents and Your income in 2019 (AGI) are the values you have.</li><li><strong>HEALS Act stimulus</strong> = <code>get_check(Your filing status, Your dependents under 17, Your adult dependents, Your income in 2018 (AGI))</code> — the form to use when Your filing status, Your dependents under 17, Your adult dependents and Your income in 2018 (AGI) are the values you have.</li><li><strong>HEROES Act stimulus</strong> = <code>get_checkHEROES(Your filing status, Your dependents under 17, Your adult dependents, Your income in 2019 (AGI))</code> — the form to use when Your filing status, Your dependents under 17, Your adult dependents and Your income in 2019 (AGI) are the values you have.</li><li><strong>HEROES Act stimulus</strong> = <code>get_checkHEROES(Your filing status, Your dependents under 17, Your adult dependents, Your income in 2018 (AGI))</code> — the form to use when Your filing status, Your dependents under 17, Your adult dependents and Your income in 2018 (AGI) are the values you have.</li><li><strong>CAAF Act stimulus</strong> = <code>get_checkCAAF(Your filing status, Your dependents under 17, Your adult dependents, Your income in 2019 (AGI))</code> — the form to use when Your filing status, Your dependents under 17, Your adult dependents and Your income in 2019 (AGI) are the values you have.</li><li><strong>CAAF Act stimulus</strong> = <code>get_checkCAAF(Your filing status, Your dependents under 17, Your adult dependents, Your income in 2018 (AGI))</code> — the form to use when Your filing status, Your dependents under 17, Your adult dependents and Your income in 2018 (AGI) are the values you have.</li></ul><p>Any one of HEALS Act stimulus, HEALS Act stimulus and HEROES Act stimulus can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with CAAF Act stimulus, CAAF Act stimulus and HEALS Act stimulus are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Your filing status left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Your filing status is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Your dependents under 17 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Your dependents under 17 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Your adult dependents left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Your adult dependents is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Your filing status is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Stimulus check - CAAF vs. HEALS vs. HEROES form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Your filing status</strong> takes a plain number with no unit attached. Head of household typically means a single parent. It feeds HEALS Act stimulus, HEALS Act stimulus and HEROES Act stimulus. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Your filing status is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Your dependents under 17</strong> takes a plain number with no unit attached. Enter the number of dependents under 17 years old you claimed on your last tax form. It feeds HEALS Act stimulus, HEALS Act stimulus and HEROES Act stimulus. Fill it from a measurement rather than a memory — Your dependents under 17 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Your adult dependents</strong> takes a plain number with no unit attached. Enter the number of dependents who are older than 17 you claimed on your last tax form. It feeds HEALS Act stimulus, HEALS Act stimulus and HEROES Act stimulus. Fill it from a measurement rather than a memory — Your adult dependents is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Your income in 2019 (AGI)</strong> takes a plain number with no unit attached. Adjusted gross income on your tax form. It feeds HEALS Act stimulus, HEROES Act stimulus and CAAF Act stimulus. Fill it from a measurement rather than a memory — Your income in 2019 (AGI) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>CAAF Act stimulus</strong> is a plain number. It is computed from Your filing status, Your dependents under 17, Your adult dependents and Your income in 2018 (AGI), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>CAAF Act stimulus</strong> is a plain number. It is computed from Your filing status, Your dependents under 17, Your adult dependents and Your income in 2019 (AGI), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>HEALS Act stimulus</strong> is a plain number. It is computed from Your filing status, Your dependents under 17, Your adult dependents and Your income in 2018 (AGI), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>HEALS Act stimulus</strong> is a plain number. It is computed from Your filing status, Your dependents under 17, Your adult dependents and Your income in 2019 (AGI), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>HEROES Act stimulus</strong> is a plain number. It is computed from Your filing status, Your dependents under 17, Your adult dependents and Your income in 2018 (AGI), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>HEROES Act stimulus</strong> is a plain number. It is computed from Your filing status, Your dependents under 17, Your adult dependents and Your income in 2019 (AGI), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> CAAF Act stimulus follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your filing status, Your dependents under 17 and Your adult dependents measured, CAAF Act stimulus and CAAF Act stimulus wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/rsi">Relative strength index (RSI) Calculator</a>, <a href="/finance/remote-vs-on-location-workers">Remote vs. on-location workers (non-salary costs) Calculator</a> and <a href="/finance/rent">Rent Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stimulus check - CAAF vs. HEALS vs. HEROES calculator work out?', 'a' => <<<'TXT'
            CAAF Act stimulus, CAAF Act stimulus, HEALS Act stimulus and HEALS Act stimulus, from Your filing status, Your dependents under 17, Your adult dependents and Your income in 2019 (AGI). The relationship is HEALS Act stimulus = get_check(Your filing status, Your dependents under 17, Your adult dependents, Your income in 2019 (AGI)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your filing status, Your dependents under 17, Your adult dependents, Your income in 2019 (AGI). Fill your filing status, your dependents under 17 and your adult dependents and leave CAAF Act stimulus empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of HEALS Act stimulus, HEALS Act stimulus, HEROES Act stimulus and HEROES Act stimulus blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            CAAF Act stimulus is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Your filing status blank and the page solves for it, reporting CAAF Act stimulus instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to CAAF Act stimulus at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/rsi', 'name' => 'Relative strength index (RSI) Calculator'],
            ['path' => '/finance/remote-vs-on-location-workers', 'name' => 'Remote vs. on-location workers (non-salary costs) Calculator'],
            ['path' => '/finance/rent', 'name' => 'Rent Calculator'],
        ],
        'authors' => [],
    ],
];
