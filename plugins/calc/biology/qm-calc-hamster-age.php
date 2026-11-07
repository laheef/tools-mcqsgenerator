<?php

/**
 * Hamster age
 * /biology/hamster-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hamster age',
    'meta' => ['title' => 'Hamster age Calculator: Formula, Steps & Examples', 'description' => 'Work out 💁 In human years it\'s from 🐹 My hamster is with hamster age. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Hamster age Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'age' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'hamster_age' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'yQx0Po6zgZk_QuiJjcI5A',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'hamster_age',
                                    'vt' => 'numerical',
                                    'l' => '🐹 My hamster is ',
                                    'us' => '19',
                                    'du' => 'mos',
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
                                    'n' => 'age',
                                    'vt' => 'numerical',
                                    'l' => '💁 In human years it\'s',
                                    'us' => '19',
                                    'du' => 'yrs',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'age = get_age (hamster_age)',
                'var' => [
                    [
                        'l' => 'age',
                        'f' => 'get_age(hamster_age)',
                        'r' => ['hamster_age'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => <<<'TXT'
        "use strict";omni.define("get_age",function(hamster_age){var age=0;if(hamster_age<=1){age=hamster_age*14}else if(hamster_age<=2){age=14+6*(hamster_age-1)}else if(hamster_age<=4){age=14+6*hamster_age/2}else if(hamster_age<=6){age=20+14*(hamster_age-2)/4}else if(hamster_age<=12){age=34+24*(hamster_age-6)/6}else if(hamster_age<=24){age=58+12*(hamster_age-12)/12}else if(hamster_age<=36){age=70+30*(hamster_age-24)/12}return age*12});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter 🐹 My hamster is into Hamster age and the answer comes back as 💁 In human years it's. It is a single relationship that reads 💁 In human years it's out of 🐹 My hamster is, not a table of canned results keyed by them. Units for 💁 In human years it's default to years and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Hamster age calculator works', 'html' => <<<'TXT'
            <p>The Hamster age calculator applies one relationship to 1 number and reports 💁 In human years it&#039;s.</p><p>In the form&#039;s own words, 💁 In human years it&#039;s = get_age(🐹 My hamster is).</p><p>What comes back is 💁 In human years it&#039;s — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>🐹 My hamster is</strong> — in months</li></ul><p>The answer comes back as 💁 In human years it&#039;s in years. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on 💁 In human years it&#039;s lists 18 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>💁 In human years it&#039;s</strong> = <code>get_age(🐹 My hamster is)</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> 🐹 My hamster is carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> 💁 In human years it&#039;s is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>🐹 My hamster is left as a guess.</strong> Anything typed into 🐹 My hamster is is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in 🐹 My hamster is and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>🐹 My hamster is</strong> is a months quantity: the page opens it in mos and converts anything else you pick before the formula runs. Change it and 💁 In human years it's changes with it. Have it to hand before you start: 🐹 My hamster is is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>💁 In human years it&#039;s</strong> is a years figure. The value follows from 🐹 My hamster is. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>months</strong> — 18 units. It opens in <em>mos</em>, and the chip also carries yrs, min, 15 sec, days, wks and mos. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need 🐹 My hamster is. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type 🐹 My hamster is into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare 💁 In human years it&amp;#039;s in yrs with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind 💁 In human years it&#039;s is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are months and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes 🐹 My hamster is are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when 🐹 My hamster is is what you already know and 💁 In human years it&#039;s is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/cat-age">Cat age</a>, <a href="/biology/cat-benadryl-dosage">Cat Benadryl dosage Calculator</a> and <a href="/biology/cat-bmi">Cat BMI Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that Hamster age leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/biology/cat-age">Cat age</a>, <a href="/biology/cat-benadryl-dosage">Cat Benadryl dosage Calculator</a> and <a href="/biology/cat-bmi">Cat BMI Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Hamster age is a number to act on, so the useful question is what to do with 💁 In human years it&#039;s (yrs) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down 🐹 My hamster is alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hamster age calculator work out?', 'a' => '💁 In human years it\'s, from 🐹 My hamster is. The relationship is 💁 In human years it\'s = get_age(🐹 My hamster is).'],
            ['q' => 'Which values do I need before I start?', 'a' => '🐹 My hamster is (months). Enter 🐹 My hamster is; 💁 In human years it\'s is the box to leave alone unless it is the value you came for.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally 💁 In human years it's is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is 💁 In human years it's, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of 💁 In human years it\'s keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/cat-age', 'name' => 'Cat age'],
            ['path' => '/biology/cat-benadryl-dosage', 'name' => 'Cat Benadryl dosage Calculator'],
            ['path' => '/biology/cat-bmi', 'name' => 'Cat BMI Calculator'],
        ],
        'authors' => [],
    ],
];
