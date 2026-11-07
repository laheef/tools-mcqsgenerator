<?php

/**
 * Dog onion toxicity
 * /biology/dog-onion-toxicity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog onion toxicity',
    'meta' => ['title' => 'Dog onion toxicity — Free Online Calculator', 'description' => 'Dog onion toxicity takes your dog\'s weight and consumed amount and returns toxic dose and serious toxicity. The formula is printed in the form\'s own words.', 'h1' => 'Dog onion toxicity Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'consumedAmount' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'seriousToxicity' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'toxicDose' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'weight' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'ZaxCNrKRhIBNTgtOR2RKh',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Your dog\'s weight',
                                    'us' => '22',
                                    'du' => 'kg',
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
                                    'n' => 'consumedAmount',
                                    'vt' => 'numerical',
                                    'l' => 'Consumed amount',
                                    'h' => 'A medium onion weights around 150 g/ 6 oz.&nbsp;',
                                    'us' => '22',
                                    'du' => 'g',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '8h-gstSEAbkyxDAhUjKck',
                'title' => 'Your dog\'s toxic doses',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'toxicDose',
                                    'vt' => 'numerical',
                                    'l' => 'Toxic dose',
                                    'h' => 'Lowest reported dose to cause onion-related toxicosis.',
                                    'us' => '22',
                                    'du' => 'g',
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
                                    'n' => 'seriousToxicity',
                                    'vt' => 'numerical',
                                    'l' => 'Serious toxicity',
                                    'h' => 'This amount will probably cause toxic effects and hematologic changes that might be life-threatening.',
                                    'us' => '22',
                                    'du' => 'g',
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
                                        [null, 'The amount eaten by your dog is below the calculated possible toxic dose. Your dog should be fine; however, you still need to observe it.'],
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
                                        [null, 'The amount eaten by your dog is greater than the calculated toxic dose. Look for professional help and observe your dog carefully!'],
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
                                        [null, 'Always consult your vet if you have any doubt, or if your pet displays any suspicious behavior.'],
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
                                        [null, 'Remember that onions contain the same poisonous substance as garlic, chives, and leeks.'],
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
                'formula' => 'toxicDose = (weight/20) * 50',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(2/5)*toxicDose',
                        'r' => ['toxicDose'],
                    ],
                    [
                        'l' => 'toxicDose',
                        'f' => '(5/2)*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
            [
                'formula' => 'seriousToxicity = weight*5',
                'var' => [
                    [
                        'l' => 'weight',
                        'f' => '(1/5)*seriousToxicity',
                        'r' => ['seriousToxicity'],
                    ],
                    [
                        'l' => 'seriousToxicity',
                        'f' => '5*weight',
                        'r' => ['weight'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Toxic dose into Dog onion toxicity and the answer comes back as Your dog's weight and Serious toxicity. It is a single relationship that reads your dog's weight out of toxic dose, not a table of canned results keyed by them. Units for Your dog's weight default to kilograms and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Dog onion toxicity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dog onion toxicity: it takes 1 number and reports Your dog&#039;s weight and Serious toxicity.</p><p>The relationship it solves reads Your dog&#039;s weight = (2 ÷ 5) × Toxic dose.</p><p>The result panel carries Your dog&#039;s weight and Serious toxicity, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Toxic dose</strong> — in grams. Lowest reported dose to cause onion-related toxicosis.</li></ul><p>The answers come back as Your dog&#039;s weight in kilograms, Serious toxicity in grams. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Your dog&#039;s weight lists 27 options and opens on kilograms. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Your dog&#039;s weight</strong> = <code>(2 ÷ 5) × Toxic dose</code></li><li><strong>Toxic dose</strong> = <code>(5 ÷ 2) × Your dog&#039;s weight</code></li><li><strong>Serious toxicity</strong> = <code>5 × Your dog&#039;s weight</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Your dog&#039;s weight</strong> = <code>(2 ÷ 5) × Toxic dose</code> — the form to use when Toxic dose are the values you have.</li><li><strong>Toxic dose</strong> = <code>(5 ÷ 2) × Your dog&#039;s weight</code> — the form to use when Your dog&#039;s weight are the values you have.</li><li><strong>Your dog&#039;s weight</strong> = <code>(1 ÷ 5) × Serious toxicity</code> — the form to use when Serious toxicity are the values you have.</li><li><strong>Serious toxicity</strong> = <code>5 × Your dog&#039;s weight</code> — the form to use when Your dog&#039;s weight are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Your dog&#039;s weight, Toxic dose and Serious toxicity can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Toxic dose carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Your dog&#039;s weight and Serious toxicity are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Toxic dose left as a guess.</strong> Anything typed into Toxic dose is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Toxic dose is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dog onion toxicity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Toxic dose</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. Lowest reported dose to cause onion-related toxicosis. Change it and Your dog's weight changes with it. Fill it from a measurement rather than a memory — Toxic dose is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Your dog&#039;s weight</strong> is a kilograms figure. It is computed from Toxic dose, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Serious toxicity</strong> is a grams figure. It is computed from Your dog's weight, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Dog onion toxicity actually offers.</p><ul><li><strong>grams</strong> — 27 units. It opens in <em>g</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Toxic dose ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Toxic dose — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Your dog&amp;#039;s weight in kg against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Your dog&#039;s weight is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are grams and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Toxic dose are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Toxic dose is what you already know and Your dog&#039;s weight and Serious toxicity is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/pcr-annealing-temperature">PCR Annealing Temperature Calculator</a>, <a href="/biology/pcr-cycle-calculator">PCR Cycle Calculator</a> and <a href="/biology/pcr-master-mix-calculator">PCR Master Mix Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Dog onion toxicity is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Dog onion toxicity is a number to act on, so the useful question is what to do with Your dog&#039;s weight (kg) and Serious toxicity (g) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Toxic dose alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog onion toxicity calculator work out?', 'a' => 'Your dog\'s weight and Serious toxicity, from Toxic dose. The relationship is Your dog\'s weight = (2 ÷ 5) × Toxic dose.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Toxic dose (grams). With toxic dose in place, Your dog\'s weight can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Your dog\'s weight, Toxic dose and Serious toxicity can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Your dog's weight is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Toxic dose blank and the page solves for it, reporting Your dog\'s weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Your dog\'s weight keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/pcr-annealing-temperature', 'name' => 'PCR Annealing Temperature Calculator'],
            ['path' => '/biology/pcr-cycle-calculator', 'name' => 'PCR Cycle Calculator'],
            ['path' => '/biology/pcr-master-mix-calculator', 'name' => 'PCR Master Mix Calculator'],
        ],
        'authors' => [],
    ],
];
