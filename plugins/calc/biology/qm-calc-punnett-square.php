<?php

/**
 * Punnett square
 * /biology/punnett-square
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Punnett square',
    'meta' => ['title' => 'Punnett square Calculator — Formula & Results', 'description' => 'The arithmetic is the whole method: Chance for AA is worked out from Mother\'s genotype by one formula, applied once. A result here can always be checked…', 'h1' => 'Punnett square Calculator', 'updated' => '2026-07-31'],
    'raw' => [
        'vars' => [
            'AA' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'Aa' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'aa' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'father1' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'QPY-O-YYBDD82MyBu8lb0', 'c' => null],
                ],
                'ds' => '2rp3FzqovlaITD-dYwxV4',
            ],
            'mother1' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'QPY-O-YYBDD82MyBu8lb0', 'c' => null],
                ],
                'ds' => '2rp3FzqovlaITD-dYwxV4',
            ],
        ],
        'groups' => [
            [
                'uid' => 'tHJkENgymXwwvdkQQ1BNw',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Learning genetics? Enter parent genotypes to quickly predict offspring traits with our Punnett Square calculator!'],
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
                                        [null, 'A - Dominant allele a - Recessive allele'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1_FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mother1',
                                    'vt' => 'valueSelect',
                                    'l' => 'Mother\'s genotype',
                                    'ds' => '2rp3FzqovlaITD-dYwxV4',
                                    'opts' => [
                                        ['QPY-O-YYBDD82MyBu8lb0', 'AA', '1'],
                                        ['AZ_tpL6dm0UPiBDfzpImm', 'Aa', '2'],
                                        ['2Tw3zx7MqrxdEUW-NExV_', 'aa', '3'],
                                    ],
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'father1',
                                    'vt' => 'valueSelect',
                                    'l' => 'Father\'s genotype',
                                    'ds' => '2rp3FzqovlaITD-dYwxV4',
                                    'opts' => [
                                        ['QPY-O-YYBDD82MyBu8lb0', 'AA', '1'],
                                        ['AZ_tpL6dm0UPiBDfzpImm', 'Aa', '2'],
                                        ['2Tw3zx7MqrxdEUW-NExV_', 'aa', '3'],
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
                                    'n' => 'AA',
                                    'vt' => 'numerical',
                                    'l' => 'Chance for AA',
                                    'us' => '37',
                                    'du' => 'perc',
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
                                    'n' => 'Aa',
                                    'vt' => 'numerical',
                                    'l' => 'Chance for Aa',
                                    'us' => '37',
                                    'du' => 'perc',
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
                                    'n' => 'aa',
                                    'vt' => 'numerical',
                                    'l' => 'Chance for aa',
                                    'us' => '37',
                                    'du' => 'perc',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'oZpt1ZFBGb9AQHDk2KTBp',
                'title' => 'Punnett Square',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'If you need 2 traits and 4 alleles, search for the larger, dihybrid cross Punnett Square calculator.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'MoSaUAu-aQvibfSuomFpY',
                'title' => 'Genotype to phenotype',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Check out how to use this calculator!'],
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
                'formula' => 'Aa = get_chance_b(mother1, father1)',
                'var' => [
                    [
                        'l' => 'Aa',
                        'f' => 'get_chance_b(mother1, father1)',
                        'r' => ['father1', 'mother1'],
                    ],
                ],
            ],
            [
                'formula' => 'AA = get_chance_a(mother1, father1)',
                'var' => [
                    [
                        'l' => 'AA',
                        'f' => 'get_chance_a(mother1, father1)',
                        'r' => ['father1', 'mother1'],
                    ],
                ],
            ],
            [
                'formula' => 'aa = get_chance_ab(mother1, father1)',
                'var' => [
                    [
                        'l' => 'aa',
                        'f' => 'get_chance_ab(mother1, father1)',
                        'r' => ['father1', 'mother1'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '2rp3FzqovlaITD-dYwxV4' => [
                'name' => 'types',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'QPY-O-YYBDD82MyBu8lb0', 'label' => 'AA', 'value' => '1'],
                    ['uid' => 'AZ_tpL6dm0UPiBDfzpImm', 'label' => 'Aa', 'value' => '2'],
                    ['uid' => '2Tw3zx7MqrxdEUW-NExV_', 'label' => 'aa', 'value' => '3'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("get_first",function(mother1){if(mother1==1){return 4}else if(mother1==2){return 4}else if(mother1==3){return 5}});omni.define("get_chance_a",function(mother1,father1){var la;var lo;var lb;if(father1==1&&mother1==1){la=100;lo=0;lb=0}else if(father1==2&&mother1==2){la=25;lo=50;lb=25}else if(father1==3&&mother1==3){la=0;lo=0;lb=100}else if(father1==1&&mother1==3){la=0;lo=100;lb=0}else if(father1==3&&mother1==1){la=0;lo=100;lb=0}else if(father1==1&&mother1==2){la=50;lo=50;lb=0}else if(father1==2&&mother1==1){la=50;lo=50;lb=0}else if(father1==3&&mother1==2){la=0;lo=50;lb=50}else if(father1==2&&mother1==3){la=0;lo=50;lb=50}var AA=la;var resa=AA/100;return resa});omni.define("get_chance_b",function(mother1,father1){var la;var lo;var lb;if(father1==1&&mother1==1){la=100;lo=0;lb=0}else if(father1==2&&mother1==2){la=25;lo=50;lb=25}else if(father1==3&&mother1==3){la=0;lo=0;lb=100}else if(father1==1&&mother1==3){la=0;lo=100;lb=0}else if(father1==3&&mother1==1){la=0;lo=100;lb=0}else if(father1==1&&mother1==2){la=50;lo=50;lb=0}else if(father1==2&&mother1==1){la=50;lo=50;lb=0}else if(father1==3&&mother1==2){la=0;lo=50;lb=50}else if(father1==2&&mother1==3){la=0;lo=50;lb=50}var Aa=lo;var resb=Aa/100;return resb});omni.define("get_chance_ab",function(mother1,father1){var la;var lo;var lb;if(father1==1&&mother1==1){la=100;lo=0;lb=0}else if(father1==2&&mother1==2){la=25;lo=50;lb=25}else if(father1==3&&mother1==3){la=0;lo=0;lb=100}else if(father1==1&&mother1==3){la=0;lo=100;lb=0}else if(father1==3&&mother1==1){la=0;lo=100;lb=0}else if(father1==1&&mother1==2){la=50;lo=50;lb=0}else if(father1==2&&mother1==1){la=50;lo=50;lb=0}else if(father1==3&&mother1==2){la=0;lo=50;lb=50}else if(father1==2&&mother1==3){la=0;lo=50;lb=50}var aa=lb;var resab=aa/100;return resab});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Punnett square turns Mother's genotype and Father's genotype into Chance for AA and Chance for Aa. The arithmetic is the whole method: Chance for AA is worked out from Mother's genotype by one formula, applied once. Chance for AA comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Punnett square calculator works', 'html' => <<<'TXT'
            <p>The Punnett square calculator applies one relationship to 2 numbers and reports Chance for AA, Chance for Aa and Chance for aa.</p><p>In the form&#039;s own words, Chance for Aa = get_chance_b(Mother&#039;s genotype, Father&#039;s genotype).</p><p>The answers are Chance for AA, Chance for Aa and Chance for aa; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Mother&#039;s genotype</strong> — a plain number, no unit</li><li><strong>Father&#039;s genotype</strong> — a plain number, no unit</li></ul><p>The answers come back as Chance for AA in percent, Chance for Aa in percent, Chance for aa in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Chance for AA offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Chance for Aa</strong> = <code>get_chance_b(Mother&#039;s genotype, Father&#039;s genotype)</code></li><li><strong>Chance for AA</strong> = <code>get_chance_a(Mother&#039;s genotype, Father&#039;s genotype)</code></li><li><strong>Chance for aa</strong> = <code>get_chance_ab(Mother&#039;s genotype, Father&#039;s genotype)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Chance for Aa</strong> = <code>get_chance_b(Mother&#039;s genotype, Father&#039;s genotype)</code> — the form to use when Father&#039;s genotype and Mother&#039;s genotype are the values you have.</li><li><strong>Chance for AA</strong> = <code>get_chance_a(Mother&#039;s genotype, Father&#039;s genotype)</code> — the form to use when Father&#039;s genotype and Mother&#039;s genotype are the values you have.</li><li><strong>Chance for aa</strong> = <code>get_chance_ab(Mother&#039;s genotype, Father&#039;s genotype)</code> — the form to use when Father&#039;s genotype and Mother&#039;s genotype are the values you have.</li></ul><p>Any one of Chance for Aa, Chance for AA and Chance for aa can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Chance for AA, Chance for Aa and Chance for aa are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Mother&#039;s genotype left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Mother&amp;#039;s genotype is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Father&#039;s genotype left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Father&amp;#039;s genotype is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Mother&#039;s genotype and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Punnett square form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Mother&#039;s genotype</strong> takes a plain number with no unit attached. The page reads it when it works out Chance for Aa, Chance for AA and Chance for aa. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Mother&#039;s genotype is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Father&#039;s genotype</strong> takes a plain number with no unit attached. The page reads it when it works out Chance for Aa, Chance for AA and Chance for aa. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Father&#039;s genotype is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Chance for AA</strong> is a percent figure. It is computed from Father's genotype and Mother's genotype, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Chance for Aa</strong> is a percent figure. It is computed from Father's genotype and Mother's genotype, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Chance for aa</strong> is a percent figure. It is computed from Father's genotype and Mother's genotype, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Punnett square actually offers.</p><ul><li><strong>percent</strong> — 6 units. It opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Mother&#039;s genotype and Father&#039;s genotype ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Mother&amp;#039;s genotype — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Chance for AA in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Chance for AA follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Mother&#039;s genotype and Father&#039;s genotype and the number you are missing is Chance for AA and Chance for Aa.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dog-pregnancy">Dog pregnancy Calculator</a>, <a href="/biology/dog-quality-of-life">Dog quality of life</a> and <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Punnett square is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Mother&#039;s genotype and Father&#039;s genotype beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Punnett square calculator work out?', 'a' => <<<'TXT'
            Chance for AA, Chance for Aa and Chance for aa, from Father's genotype and Mother's genotype. The relationship is Chance for Aa = get_chance_b(Mother's genotype, Father's genotype).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mother\'s genotype, Father\'s genotype. With mother1 and father1 in place, Chance for AA can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Chance for Aa, Chance for AA and Chance for aa blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Chance for AA is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mother\'s genotype blank and the page solves for it, reporting Chance for AA instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Chance for AA keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dog-pregnancy', 'name' => 'Dog pregnancy Calculator'],
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
        ],
        'authors' => [],
    ],
];
