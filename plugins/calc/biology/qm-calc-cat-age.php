<?php

/**
 * Cat age
 * /biology/cat-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cat age',
    'meta' => ['title' => 'Cat age Calculator: Formula, Steps & Examples', 'description' => 'Cat age turns conversion type and cat years into human years and cat years. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Cat age Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'cat_age' => [
                'type' => 'numerical',
                'rnd' => ['standard', '1'],
            ],
            'cat_age_calculation' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'conversion_type' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '4X77jFp-6t5pdHA5T_BEA', 'c' => null],
                ],
                'ds' => '2654',
            ],
            'human_age' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'human_age_calculation' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'IMSxu0UxtUGvEesSVM7Ew',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'conversion_type',
                                    'vt' => 'valueSelect',
                                    'l' => 'Conversion type',
                                    'ds' => '2654',
                                    'opts' => [
                                        ['4X77jFp-6t5pdHA5T_BEA', 'Cat 🐈 to human🧍years', '1'],
                                        ['WQCvl0o64H2OwiinKy7Nq', 'Human🧍to cat 🐈 years', '0'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'cat_age_calculation',
                                    'vt' => 'numerical',
                                    'l' => 'Cat years',
                                    'us' => '19',
                                    'du' => 'yrsmos',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'human_age',
                                    'vt' => 'numerical',
                                    'l' => 'Human years',
                                    'us' => '19',
                                    'du' => 'yrs',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'human_age_calculation',
                                    'vt' => 'numerical',
                                    'l' => 'Human years',
                                    'us' => '19',
                                    'du' => 'yrs',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'cat_age',
                                    'vt' => 'numerical',
                                    'l' => 'Cat years',
                                    'us' => '19',
                                    'du' => 'yrs',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'xq_NIzo6SER20PzhouYDj',
                'title' => 'Create a cat-care tool for free',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, <<<'TXT'
                                        Want to check your cat’s well-being without hard math? Type the following prompt into our ✨ AI Calculator Builder to instantly make a working tool or check the ready example of the Cat Quality of Life Scale Calculator that we built for you.
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Build me a calculator that estimates my cat’s quality of life scale'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'human_age = get_cat_age(cat_age_calculation)',
                'var' => [
                    [
                        'l' => 'human_age',
                        'f' => 'get_cat_age(cat_age_calculation)',
                        'r' => ['cat_age_calculation'],
                    ],
                ],
            ],
            [
                'formula' => 'cat_age = get_human_age(human_age_calculation)',
                'var' => [
                    [
                        'l' => 'cat_age',
                        'f' => 'get_human_age(human_age_calculation)',
                        'r' => ['human_age_calculation'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '2654' => [
                'name' => 'if_cat_to_human',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '4X77jFp-6t5pdHA5T_BEA', 'label' => 'Cat 🐈 to human🧍years', 'value' => '1'],
                    ['uid' => 'WQCvl0o64H2OwiinKy7Nq', 'label' => 'Human🧍to cat 🐈 years', 'value' => '0'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("get_cat_age",function(cat_age){if(cat_age<=0.5){return 20*cat_age}else if(cat_age<=1){return 10+(cat_age-0.5)*10}else if(cat_age<=2){return 15+(cat_age-1)*9}else{return 24+4*(cat_age-2)}});omni.define("get_human_age",function(human_age_calculation){if(human_age_calculation<=10){return human_age_calculation/20}else if(human_age_calculation<=15){return(human_age_calculation-5)/10}else if(human_age_calculation<=24){return(human_age_calculation-6)/9}else{return(human_age_calculation-16)/4}});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => 'Cat age reads one of human years and cat years from the other, so either can be the value you fill in. The main result, Human years, is reported in years.',
        'sections' => [
            ['title' => 'How the Cat age calculator works', 'html' => <<<'TXT'
            <p>The Cat age calculator applies one relationship to 1 number and reports Human years and Cat years.</p><p>The relationship it solves reads Human years = get_cat_age(Cat years).</p><p>The answers are Human years and Cat years; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Cat years</strong> — in years / months</li></ul><p>What you get back is Human years in years, Cat years in years, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Human years lists 18 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Human years</strong> = <code>get_cat_age(Cat years)</code></li><li><strong>Cat years</strong> = <code>get_human_age(Human years)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Human years</strong> = <code>get_cat_age(Cat years)</code> — the form to use when Cat years are the values you have.</li><li><strong>Cat years</strong> = <code>get_human_age(Human years)</code> — the form to use when Human years are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Human years and Cat years can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Cat years carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Human years and Cat years are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Cat years left as a guess.</strong> Anything typed into Cat years is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Cat years is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Cat years</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. The page reads it when it works out Human years. Have it to hand before you start: Cat years is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Human years</strong> is a years figure. It is worked out from Cat years. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Cat years</strong> is a years figure. It is worked out from Human years. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>years / months</strong> — 18 units. It opens in <em>yrsmos</em>, and the chip also carries yrs, min, 15 sec, days, wks and mos. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Cat years. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Cat years into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Human years in yrs with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Human years is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover years / months. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Cat years measured, Human years and Cat years wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dsdna-ug-to-pmol-converter">dsDNA µg to pmol Converter Calculator</a>, <a href="/biology/egg-incubation-hatch-date">Egg Incubation Hatch Date Calculator</a> and <a href="/biology/encounter-rate">Encounter Rate Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that Cat age leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/biology/dsdna-ug-to-pmol-converter">dsDNA µg to pmol Converter Calculator</a>, <a href="/biology/egg-incubation-hatch-date">Egg Incubation Hatch Date Calculator</a> and <a href="/biology/encounter-rate">Encounter Rate Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Cat age is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Cat years beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cat age calculator work out?', 'a' => 'Human years and Cat years, from Cat years. The relationship is Human years = get_cat_age(Cat years).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cat years (years / months). Enter cat years; Human years is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Human years and Cat years can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Human years is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Cat years left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Human years keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dsdna-ug-to-pmol-converter', 'name' => 'dsDNA µg to pmol Converter Calculator'],
            ['path' => '/biology/egg-incubation-hatch-date', 'name' => 'Egg Incubation Hatch Date Calculator'],
            ['path' => '/biology/encounter-rate', 'name' => 'Encounter Rate Calculator'],
        ],
        'authors' => [],
    ],
];
