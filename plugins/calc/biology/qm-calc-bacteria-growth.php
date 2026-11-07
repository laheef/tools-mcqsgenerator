<?php

/**
 * Bacteria growth
 * /biology/bacteria-growth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bacteria growth',
    'meta' => ['title' => 'Bacteria growth — Formula, Steps & Examples', 'description' => <<<'TXT'
    Bacteria growth takes initial number of bacteria — N(0), elapsed time and growth rate (r) and returns final number of bacteria — N(t) and Doubling time (Td).
    TXT, 'h1' => 'Bacteria growth Calculator', 'updated' => '2026-07-23'],
    'raw' => [
        'vars' => [
            'doublingTime' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'elapsedTime' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'growthRate' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'numberOfBacteria' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'numberOfBacteria2' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'nKP-Smf_8TdUStN5qKUWp',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'numberOfBacteria', 'vt' => 'numerical', 'l' => 'Initial number of bacteria — N(0)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'numberOfBacteria2', 'vt' => 'numerical', 'l' => 'Final number of bacteria — N(t)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'elapsedTime',
                                    'vt' => 'numerical',
                                    'l' => 'Elapsed time',
                                    'us' => '19',
                                    'du' => 'hrs',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'growthRate', 'vt' => 'numerical', 'l' => 'Growth rate (r)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'doublingTime',
                                    'vt' => 'numerical',
                                    'l' => 'Doubling time (T==d==)',
                                    'us' => '19',
                                    'du' => 'hrs',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'numberOfBacteria2 = numberOfBacteria*(1+growthRate)^(elapsedTime )',
                'var' => [
                    [
                        'l' => 'growthRate',
                        'f' => 'pow(numberOfBacteria2/numberOfBacteria, 1/elapsedTime) - 1',
                        'r' => ['elapsedTime', 'numberOfBacteria', 'numberOfBacteria2'],
                    ],
                    [
                        'l' => 'elapsedTime',
                        'f' => 'log(numberOfBacteria2/numberOfBacteria)/log(growthRate + 1)',
                        'r' => ['growthRate', 'numberOfBacteria', 'numberOfBacteria2'],
                    ],
                    [
                        'l' => 'numberOfBacteria',
                        'f' => 'numberOfBacteria2*pow(growthRate + 1, -elapsedTime)',
                        'r' => ['growthRate', 'elapsedTime', 'numberOfBacteria2'],
                    ],
                    [
                        'l' => 'numberOfBacteria2',
                        'f' => 'numberOfBacteria*pow(growthRate + 1, elapsedTime)',
                        'r' => ['growthRate', 'elapsedTime', 'numberOfBacteria'],
                    ],
                ],
            ],
            [
                'formula' => 'doublingTime = (ln(2)*elapsedTime )/ln(numberOfBacteria2/numberOfBacteria)',
                'var' => [
                    [
                        'l' => 'elapsedTime',
                        'f' => 'doublingTime*log(numberOfBacteria2/numberOfBacteria)/log(2)',
                        'r' => ['numberOfBacteria', 'numberOfBacteria2', 'doublingTime'],
                    ],
                    [
                        'l' => 'numberOfBacteria',
                        'f' => 'numberOfBacteria2*exp(-elapsedTime*log(2)/doublingTime)',
                        'r' => ['elapsedTime', 'numberOfBacteria2', 'doublingTime'],
                    ],
                    [
                        'l' => 'numberOfBacteria2',
                        'f' => 'numberOfBacteria*exp(elapsedTime*log(2)/doublingTime)',
                        'r' => ['elapsedTime', 'numberOfBacteria', 'doublingTime'],
                    ],
                    [
                        'l' => 'doublingTime',
                        'f' => 'elapsedTime*log(2)/log(numberOfBacteria2/numberOfBacteria)',
                        'r' => ['elapsedTime', 'numberOfBacteria', 'numberOfBacteria2'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Bacteria growth works out Growth rate (r) and Doubling time (Td) from Initial number of bacteria — N(0), Final number of bacteria — N(t) and Elapsed time. It is a single relationship that reads growth rate (r) out of initial number of bacteria — N(0), not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Bacteria growth calculator works', 'html' => <<<'TXT'
            <p>Bacteria growth answers one question from 3 numbers, and the answer is Growth rate (r) and Doubling time (Td).</p><p>In the form&#039;s own words, Growth rate (r) = (Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0))^(1 ÷ Elapsed time) − 1.</p><p>What comes back is Growth rate (r) and Doubling time (Td) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Initial number of bacteria — N(0)</strong> — a plain number, no unit</li><li><strong>Final number of bacteria — N(t)</strong> — a plain number, no unit</li><li><strong>Elapsed time</strong> — in hours</li></ul><p>The answers come back as Growth rate (r), Doubling time (Td) in hours. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Initial number of bacteria — N(0) = 10, Final number of bacteria — N(t) = 100 and Elapsed time = 1000 hrs gives <strong>Growth rate (r)</strong> = 0.0023 and <strong>Doubling time (Td)</strong> = 301 hrs.</p><ul><li><strong>Growth rate (r)</strong> = 0.0023</li><li><strong>Doubling time (Td)</strong> = 301 hrs</li></ul><p>The line behind those figures is <strong>Growth rate (r)</strong> = <code>(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0))^(1 ÷ Elapsed time) − 1</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Growth rate (r)</strong> = 0.0023 and <strong>Doubling time (Td)</strong> = 301. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Doubling time (Td) lists 18 options and opens on hours. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Growth rate (r)</strong> = <code>(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0))^(1 ÷ Elapsed time) − 1</code></li><li><strong>Elapsed time</strong> = <code>ln(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0)) ÷ ln(Growth rate (r) + 1)</code></li><li><strong>Initial number of bacteria — N(0)</strong> = <code>Final number of bacteria — N(t) × (Growth rate (r) + 1)^(− Elapsed time)</code></li><li><strong>Final number of bacteria — N(t)</strong> = <code>Initial number of bacteria — N(0) × (Growth rate (r) + 1)^(Elapsed time)</code></li><li><strong>Doubling time (Td)</strong> = <code>Elapsed time × ln(2) ÷ ln(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Growth rate (r)</strong> = <code>(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0))^(1 ÷ Elapsed time) − 1</code> — the form to use when Elapsed time, Initial number of bacteria — N(0) and Final number of bacteria — N(t) are the values you have.</li><li><strong>Elapsed time</strong> = <code>ln(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0)) ÷ ln(Growth rate (r) + 1)</code> — the form to use when Growth rate (r), Initial number of bacteria — N(0) and Final number of bacteria — N(t) are the values you have.</li><li><strong>Initial number of bacteria — N(0)</strong> = <code>Final number of bacteria — N(t) × (Growth rate (r) + 1)^(− Elapsed time)</code> — the form to use when Growth rate (r), Elapsed time and Final number of bacteria — N(t) are the values you have.</li><li><strong>Final number of bacteria — N(t)</strong> = <code>Initial number of bacteria — N(0) × (Growth rate (r) + 1)^(Elapsed time)</code> — the form to use when Growth rate (r), Elapsed time and Initial number of bacteria — N(0) are the values you have.</li><li><strong>Elapsed time</strong> = <code>Doubling time (Td) × ln(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0)) ÷ ln(2)</code> — the form to use when Initial number of bacteria — N(0), Final number of bacteria — N(t) and Doubling time (Td) are the values you have.</li><li><strong>Initial number of bacteria — N(0)</strong> = <code>Final number of bacteria — N(t) × e^( − Elapsed time × ln(2) ÷ Doubling time (Td))</code> — the form to use when Elapsed time, Final number of bacteria — N(t) and Doubling time (Td) are the values you have.</li><li><strong>Final number of bacteria — N(t)</strong> = <code>Initial number of bacteria — N(0) × e^(Elapsed time × ln(2) ÷ Doubling time (Td))</code> — the form to use when Elapsed time, Initial number of bacteria — N(0) and Doubling time (Td) are the values you have.</li><li><strong>Doubling time (Td)</strong> = <code>Elapsed time × ln(2) ÷ ln(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0))</code> — the form to use when Elapsed time, Initial number of bacteria — N(0) and Final number of bacteria — N(t) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Growth rate (r), Elapsed time and Initial number of bacteria — N(0) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Initial number of bacteria — N(0) from 10 to 20, leaving every other box alone. The panel moves from <strong>Growth rate (r)</strong> 0.0023 and <strong>Doubling time (Td)</strong> 301 hrs to <strong>Growth rate (r)</strong> 0.0016 and <strong>Doubling time (Td)</strong> 431 hrs.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Elapsed time carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Growth rate (r) and Doubling time (Td) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial number of bacteria — N(0) left as a guess.</strong> Anything typed into Initial number of bacteria — N(0) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Final number of bacteria — N(t) left as a guess.</strong> Anything typed into Final number of bacteria — N(t) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial number of bacteria — N(0) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Initial number of bacteria — N(0)</strong> takes a plain number with no unit attached. The page reads it when it works out Growth rate (r), Elapsed time and Final number of bacteria — N(t). Have it to hand before you start: Initial number of bacteria — N(0) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final number of bacteria — N(t)</strong> takes a plain number with no unit attached. The page reads it when it works out Growth rate (r), Elapsed time and Initial number of bacteria — N(0). Have it to hand before you start: Final number of bacteria — N(t) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Elapsed time</strong> is a hours quantity: the page opens it in hrs and converts anything else you pick before the formula runs. The page reads it when it works out Growth rate (r), Initial number of bacteria — N(0) and Final number of bacteria — N(t). Have it to hand before you start: Elapsed time is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Growth rate (r)</strong> is a plain number and the page's own defaults put it at 0.0023. The value follows from Elapsed time, Initial number of bacteria — N(0) and Final number of bacteria — N(t). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Doubling time (Td)</strong> is a hours figure and the page's own defaults put it at 301 hrs. The value follows from Elapsed time, Initial number of bacteria — N(0) and Final number of bacteria — N(t). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Growth rate (r)</th><th>Doubling time (Td)</th></tr></thead><tbody><tr><td><strong>Initial number of bacteria — N(0)</strong> +10%</td><td>-4.14%</td><td>+4.32%</td></tr><tr><td><strong>Final number of bacteria — N(t)</strong> +10%</td><td>+4.14%</td><td>-3.97%</td></tr><tr><td><strong>Elapsed time</strong> +10%</td><td>-9.1%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Elapsed time: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>hours</strong> — 18 units. It opens in <em>hrs</em>, and the chip also carries yrs, min, 15 sec, days, wks and mos. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Growth rate (r) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>Only the listed units.</strong> The unit tables here are hours and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial number of bacteria — N(0), Final number of bacteria — N(t) and Elapsed time are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Initial number of bacteria — N(0), Final number of bacteria — N(t) and Elapsed time measured, Growth rate (r) and Doubling time (Td) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/bone-length-to-body-height">Bone Length to Body Height Calculator</a>, <a href="/biology/bradford-assay-calculator">Bradford Assay (standard curve) Calculator</a> and <a href="/biology/henderson-hasselbalch-buffer">Buffer pH (Henderson–Hasselbalch) Calculator — Formula &amp; Resul</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bacteria growth calculator work out?', 'a' => <<<'TXT'
            Growth rate (r) and Doubling time (Td), from Elapsed time, Initial number of bacteria — N(0) and Final number of bacteria — N(t). The relationship is Growth rate (r) = (Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0))^(1 ÷ Elapsed time) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial number of bacteria — N(0), Final number of bacteria — N(t), Elapsed time (hours). With initial number of bacteria — N(0), final number of bacteria — N(t) and elapsed time in place, Growth rate (r) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Growth rate (r), Elapsed time, Initial number of bacteria — N(0) and Final number of bacteria — N(t) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Growth rate (r) = 0.0023 and Doubling time (Td) = 301 hrs. Those are the defaults written into the form — move Initial number of bacteria — N(0) and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Growth rate (r) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Initial number of bacteria — N(0) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Growth rate (r) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/bone-length-to-body-height', 'name' => 'Bone Length to Body Height Calculator'],
            ['path' => '/biology/bradford-assay-calculator', 'name' => 'Bradford Assay (standard curve) Calculator'],
            ['path' => '/biology/henderson-hasselbalch-buffer', 'name' => 'Buffer pH (Henderson–Hasselbalch) Calculator — Formula & Resul'],
        ],
        'authors' => [],
    ],
];
