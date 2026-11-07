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
    'meta' => ['title' => 'Bacteria growth — Formula, Steps & Examples', 'description' => 'Bacteria growth works out final number of bacteria — N(t) and Doubling time (Td) in hours from initial number of bacteria — N(0) and elapsed time, in hours.', 'h1' => 'Bacteria growth Calculator', 'updated' => '2026-07-23'],
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
                                ['t' => 'v', 'n' => 'elapsedTime', 'vt' => 'numerical', 'l' => 'Elapsed time, in hours'],
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
                                ['t' => 'v', 'n' => 'doublingTime', 'vt' => 'numerical', 'l' => 'Doubling time (Td) in hours'],
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
        Bacteria growth works out Final number of bacteria — N(t) and Doubling time (Td) in hours from Initial number of bacteria — N(0), Elapsed time, in hours and Growth rate (r). It is a single relationship that reads final number of bacteria — N(t) out of initial number of bacteria — N(0), not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Bacteria growth calculator works', 'html' => <<<'TXT'
            <p>Bacteria growth answers one question from 3 numbers, and the answer is Final number of bacteria — N(t) and Doubling time (Td) in hours.</p><p>In the form&#039;s own words, Final number of bacteria — N(t) = Initial number of bacteria — N(0) × (Growth rate (r) + 1, Elapsed time)^(in hours).</p><p>What comes back is Final number of bacteria — N(t) and Doubling time (Td) in hours — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Initial number of bacteria — N(0)</strong> — a plain number, no unit</li><li><strong>Elapsed time, in hours</strong> — a plain number, no unit</li><li><strong>Growth rate (r)</strong> — a plain number, no unit</li></ul><p>The answers come back as Final number of bacteria — N(t), Doubling time (Td) in hours. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Initial number of bacteria — N(0) = 10, Elapsed time, in hours = 100 and Growth rate (r) = 1000 gives <strong>Final number of bacteria — N(t)</strong> = 1.105e+301 and <strong>Doubling time (Td) in hours</strong> = 0.1.</p><ul><li><strong>Final number of bacteria — N(t)</strong> = 1.105e+301</li><li><strong>Doubling time (Td) in hours</strong> = 0.1</li></ul><p>The line behind those figures is <strong>Final number of bacteria — N(t)</strong> = <code>Initial number of bacteria — N(0) × (Growth rate (r) + 1, Elapsed time)^(in hours)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Final number of bacteria — N(t)</strong> = 1.105e+301 and <strong>Doubling time (Td) in hours</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Final number of bacteria — N(t) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Final number of bacteria — N(t)</strong> = <code>Initial number of bacteria — N(0) × (Growth rate (r) + 1, Elapsed time)^(in hours)</code></li><li><strong>Growth rate (r)</strong> = <code>(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0), 1 ÷ Elapsed time)^(in hours) − 1</code></li><li><strong>Elapsed time, in hours</strong> = <code>ln(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0)) ÷ ln(Growth rate (r) + 1)</code></li><li><strong>Initial number of bacteria — N(0)</strong> = <code>Final number of bacteria — N(t) × (Growth rate (r) + 1, − Elapsed time)^(in hours)</code></li><li><strong>Doubling time (Td) in hours</strong> = <code>Elapsed time, in hours × ln(2) ÷ ln(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Final number of bacteria — N(t)</strong> = <code>Initial number of bacteria — N(0) × (Growth rate (r) + 1, Elapsed time)^(in hours)</code> — the form to use when Growth rate (r), Elapsed time, in hours and Initial number of bacteria — N(0) are the values you have.</li><li><strong>Growth rate (r)</strong> = <code>(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0), 1 ÷ Elapsed time)^(in hours) − 1</code> — the form to use when Elapsed time, in hours, Initial number of bacteria — N(0) and Final number of bacteria — N(t) are the values you have.</li><li><strong>Elapsed time, in hours</strong> = <code>ln(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0)) ÷ ln(Growth rate (r) + 1)</code> — the form to use when Growth rate (r), Initial number of bacteria — N(0) and Final number of bacteria — N(t) are the values you have.</li><li><strong>Initial number of bacteria — N(0)</strong> = <code>Final number of bacteria — N(t) × (Growth rate (r) + 1, − Elapsed time)^(in hours)</code> — the form to use when Growth rate (r), Elapsed time, in hours and Final number of bacteria — N(t) are the values you have.</li><li><strong>Doubling time (Td) in hours</strong> = <code>Elapsed time, in hours × ln(2) ÷ ln(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0))</code> — the form to use when Elapsed time, in hours, Initial number of bacteria — N(0) and Final number of bacteria — N(t) are the values you have.</li><li><strong>Elapsed time, in hours</strong> = <code>Doubling time (Td) in hours × ln(Final number of bacteria — N(t) ÷ Initial number of bacteria — N(0)) ÷ ln(2)</code> — the form to use when Initial number of bacteria — N(0), Final number of bacteria — N(t) and Doubling time (Td) in hours are the values you have.</li><li><strong>Initial number of bacteria — N(0)</strong> = <code>Final number of bacteria — N(t) × e^( − Elapsed time, in hours × ln(2) ÷ Doubling time (Td) in hours)</code> — the form to use when Elapsed time, in hours, Final number of bacteria — N(t) and Doubling time (Td) in hours are the values you have.</li><li><strong>Final number of bacteria — N(t)</strong> = <code>Initial number of bacteria — N(0) × e^(Elapsed time, in hours × ln(2) ÷ Doubling time (Td) in hours)</code> — the form to use when Elapsed time, in hours, Initial number of bacteria — N(0) and Doubling time (Td) in hours are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Final number of bacteria — N(t), Growth rate (r) and Elapsed time, in hours can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Initial number of bacteria — N(0) from 10 to 20, leaving every other box alone. The panel moves from <strong>Final number of bacteria — N(t)</strong> 1.105e+301 and <strong>Doubling time (Td) in hours</strong> 0.1 to <strong>Final number of bacteria — N(t)</strong> 2.210e+301 and <strong>Doubling time (Td) in hours</strong> 0.1.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Final number of bacteria — N(t) and Doubling time (Td) in hours are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial number of bacteria — N(0) left as a guess.</strong> Anything typed into Initial number of bacteria — N(0) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Elapsed time, in hours left as a guess.</strong> Anything typed into Elapsed time, in hours is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Growth rate (r) left as a guess.</strong> Anything typed into Growth rate (r) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial number of bacteria — N(0) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Initial number of bacteria — N(0)</strong> takes a plain number with no unit attached. The page reads it when it works out Growth rate (r), Elapsed time, in hours and Final number of bacteria — N(t). Have it to hand before you start: Initial number of bacteria — N(0) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Elapsed time, in hours</strong> takes a plain number with no unit attached. The page reads it when it works out Growth rate (r), Initial number of bacteria — N(0) and Final number of bacteria — N(t). Have it to hand before you start: Elapsed time, in hours is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Growth rate (r)</strong> takes a plain number with no unit attached. The page reads it when it works out Elapsed time, in hours, Initial number of bacteria — N(0) and Final number of bacteria — N(t). Have it to hand before you start: Growth rate (r) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Final number of bacteria — N(t)</strong> is a plain number and the page's own defaults put it at 1.105e+301. The value follows from Growth rate (r), Elapsed time, in hours and Initial number of bacteria — N(0). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Doubling time (Td) in hours</strong> is a plain number and the page's own defaults put it at 0.1. The value follows from Elapsed time, in hours, Initial number of bacteria — N(0) and Final number of bacteria — N(t). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Final number of bacteria — N(t)</th><th>Doubling time (Td) in hours</th></tr></thead><tbody><tr><td><strong>Initial number of bacteria — N(0)</strong> +10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Elapsed time, in hours</strong> +10%</td><td>—</td><td>—</td></tr><tr><td><strong>Growth rate (r)</strong> +10%</td><td>+1.366e+6%</td><td>-1.36%</td></tr></tbody></table><p>The steepest column belongs to Growth rate (r): ten per cent there moves an answer by about 1.366e+6 per cent, which is why that is the number to measure twice. By contrast, Elapsed time, in hours barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Final number of bacteria — N(t) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial number of bacteria — N(0), Elapsed time, in hours and Growth rate (r) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Initial number of bacteria — N(0), Elapsed time, in hours and Growth rate (r) measured, Final number of bacteria — N(t) and Doubling time (Td) in hours wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bacteria growth calculator work out?', 'a' => <<<'TXT'
            Final number of bacteria — N(t) and Doubling time (Td) in hours, from Growth rate (r), Elapsed time, in hours and Initial number of bacteria — N(0). The relationship is Final number of bacteria — N(t) = Initial number of bacteria — N(0) × (Growth rate (r) + 1, Elapsed time)^(in hours).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial number of bacteria — N(0), Elapsed time, in hours, Growth rate (r). With initial number of bacteria — N(0), elapsed time, in hours and growth rate (r) in place, Final number of bacteria — N(t) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Final number of bacteria — N(t), Growth rate (r), Elapsed time, in hours and Initial number of bacteria — N(0) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Final number of bacteria — N(t) = 1.105e+301 and Doubling time (Td) in hours = 0.1. Those are the defaults written into the form — move Initial number of bacteria — N(0) and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Final number of bacteria — N(t) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Initial number of bacteria — N(0) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Final number of bacteria — N(t) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/bone-length-to-body-height', 'name' => 'Bone Length to Body Height Calculator'],
            ['path' => '/biology/bradford-assay-calculator', 'name' => 'Bradford Assay (standard curve) Calculator'],
            ['path' => '/biology/henderson-hasselbalch-buffer', 'name' => 'Buffer pH (Henderson–Hasselbalch) Calculator — Formula & Resul'],
        ],
        'authors' => [],
    ],
];
