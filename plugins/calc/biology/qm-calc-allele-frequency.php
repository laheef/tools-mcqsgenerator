<?php

/**
 * Allele frequency
 * /biology/allele-frequency
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Allele frequency',
    'meta' => ['title' => 'Allele frequency — Formula, Steps & Examples', 'description' => 'Allele frequency works out occurrence of the disease: and truea and reports both. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Allele frequency Calculator', 'updated' => '2024-07-19'],
    'raw' => [
        'vars' => [
            'a_percentage' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'a_proportion' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'b' => [
                'type' => 'numerical',
                'rnd' => ['standard', '5'],
            ],
            'choice' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yPeX_tq-wGFJmcq_i6HMj', 'c' => null],
                ],
                'ds' => '4lknRWs5Lxsg-usnWFTNl',
            ],
            'inv_pq' => [
                'type' => 'numerical',
                'rnd' => ['standard', '2'],
            ],
            'p' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'pq' => [
                'type' => 'numerical',
                'rnd' => ['standard', '5'],
            ],
            'q' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'truea' => [
                'type' => 'numerical',
                'rnd' => ['standard', '5'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'NwtGBFWX_Xm1UuLGEzJTF',
                'title' => 'Frequency of the disease in the population',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'choice',
                                    'vt' => 'valueSelect',
                                    'l' => 'Given in: ',
                                    'ds' => '4lknRWs5Lxsg-usnWFTNl',
                                    'opts' => [
                                        ['yPeX_tq-wGFJmcq_i6HMj', 'Proportion', '0'],
                                        ['6yCy7-Mf-OGSkbsLBUmnY', 'Percentage', '1'],
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
                                    'n' => 'a_percentage',
                                    'vt' => 'numerical',
                                    'l' => 'Occurrence of the disease: ',
                                    'h' => 'E.g., people with cystic fibrosis constitute 0.00029% of the Caucasian population.&nbsp;',
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
                                    'n' => 'a_proportion',
                                    'vt' => 'numerical',
                                    'l' => 'Occurrence of the disease:',
                                    'pre' => '1 in ',
                                    'h' => 'For example, people with cystic fibrosis constitute 1 in 3500 of the Caucasian population.&nbsp;',
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
                                        ['choice == 1', '{{a_percentage.formattedValue}}% = 1 in {{a_proportion.formattedValue}} people&nbsp;'],
                                        ['choice == 0', '1 in {{a_proportion.formattedValue}} people = {{a_percentage.formattedValue}}%'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'sdPEn0laE49spDKic5Z4h',
                'title' => 'Allele frequency',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'p',
                                    'vt' => 'numerical',
                                    'l' => 'Healthy allele frequency (p)',
                                    'h' => 'So-called "wild type allele".',
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
                                    'n' => 'q',
                                    'vt' => 'numerical',
                                    'l' => 'Mutant allele frequency (q)',
                                    'h' => 'The recessive allele that carries the disease.',
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
                                        [null, <<<'TXT'
                                        Carrier frequency: The mutant allele is present in 1 out of {{inv_pq.formattedValue}} people. Our calculations: People with two healthy alleles: p² = {{b.formattedValue}} People with one healthy, and one mutant allele: 2pq = {{pq.formattedValue}} People with two mutant alleles: q² = {{truea.formattedValue}}
                                        TXT],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '_lPDv7Kew7xorjVY7pdwb',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'truea', 'vt' => 'numerical', 'l' => 'Truea'],
                            ],
                            [
                                ['t' => 'v', 'n' => 'b', 'vt' => 'numerical', 'l' => 'B'],
                            ],
                        ],
                    ],
                    [
                        'FR1_FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'pq', 'vt' => 'numerical', 'l' => '2pq'],
                            ],
                            [
                                ['t' => 'v', 'n' => 'inv_pq', 'vt' => 'numerical', 'l' => '1/2pq'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'p^2+ (2*p*q)+ q^2 = 1',
                'var' => [
                    [
                        'l' => 'p',
                        'f' => '-q - 1',
                        'r' => ['q'],
                    ],
                    [
                        'l' => 'q',
                        'f' => '-p - 1',
                        'r' => ['p'],
                    ],
                ],
            ],
            [
                'formula' => '1/a_percentage = a_proportion',
                'var' => [
                    [
                        'l' => 'a_percentage',
                        'f' => '1/a_proportion',
                        'r' => ['a_proportion'],
                    ],
                    [
                        'l' => 'a_proportion',
                        'f' => '1/a_percentage',
                        'r' => ['a_percentage'],
                    ],
                ],
            ],
            [
                'formula' => '(q^2) = a_percentage',
                'var' => [
                    [
                        'l' => 'a_percentage',
                        'f' => 'pow(q, 2)',
                        'r' => ['q'],
                    ],
                    [
                        'l' => 'q',
                        'f' => 'sqrt(a_percentage)',
                        'r' => ['a_percentage'],
                    ],
                ],
            ],
            [
                'formula' => '(p^2) = b',
                'var' => [
                    [
                        'l' => 'p',
                        'f' => 'sqrt(b)',
                        'r' => ['b'],
                    ],
                    [
                        'l' => 'b',
                        'f' => 'pow(p, 2)',
                        'r' => ['p'],
                    ],
                ],
            ],
            [
                'formula' => 'p + q = 1',
                'var' => [
                    [
                        'l' => 'p',
                        'f' => '1 - q',
                        'r' => ['q'],
                    ],
                    [
                        'l' => 'q',
                        'f' => '1 - p',
                        'r' => ['p'],
                    ],
                ],
            ],
            [
                'formula' => 'truea = 1 / a_proportion',
                'var' => [
                    [
                        'l' => 'truea',
                        'f' => '1/a_proportion',
                        'r' => ['a_proportion'],
                    ],
                    [
                        'l' => 'a_proportion',
                        'f' => '1/truea',
                        'r' => ['truea'],
                    ],
                ],
            ],
            [
                'formula' => 'pq= 2*p*q',
                'var' => [
                    [
                        'l' => 'pq',
                        'f' => '2*p*q',
                        'r' => ['p', 'q'],
                    ],
                    [
                        'l' => 'p',
                        'f' => '(1/2)*pq/q',
                        'r' => ['pq', 'q'],
                    ],
                    [
                        'l' => 'q',
                        'f' => '(1/2)*pq/p',
                        'r' => ['pq', 'p'],
                    ],
                ],
            ],
            [
                'formula' => 'inv_pq = 1/pq',
                'var' => [
                    [
                        'l' => 'inv_pq',
                        'f' => '1/pq',
                        'r' => ['pq'],
                    ],
                    [
                        'l' => 'pq',
                        'f' => '1/inv_pq',
                        'r' => ['inv_pq'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '4lknRWs5Lxsg-usnWFTNl' => [
                'name' => 'given in',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'yPeX_tq-wGFJmcq_i6HMj', 'label' => 'Proportion', 'value' => '0'],
                    ['uid' => '6yCy7-Mf-OGSkbsLBUmnY', 'label' => 'Percentage', 'value' => '1'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Allele frequency works in both directions, between occurrence of the disease: and healthy allele frequency (p). Occurrence of the disease: is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Allele frequency calculator works', 'html' => <<<'TXT'
            <p>The Allele frequency calculator applies one relationship to 1 number and reports Occurrence of the disease, Healthy allele frequency (p) and Mutant allele frequency (q).</p><p>Written with the labels from the form, Healthy allele frequency (p) = − Mutant allele frequency (q) − 1.</p><p>The result panel carries Occurrence of the disease, Healthy allele frequency (p), Mutant allele frequency (q) and Truea, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Occurrence of the disease</strong> — a plain number, no unit. For example, people with cystic fibrosis constitute 1 in 3500 of the Caucasian population.&amp;nbsp;</li></ul><p>What you get back is Occurrence of the disease in percent, Healthy allele frequency (p), Mutant allele frequency (q), Truea, B, 2pq, 1/2pq, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Occurrence of the disease: offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Healthy allele frequency (p)</strong> = <code>− Mutant allele frequency (q) − 1</code></li><li><strong>Mutant allele frequency (q)</strong> = <code>− Healthy allele frequency (p) − 1</code></li><li><strong>Occurrence of the disease:</strong> = <code>1 ÷ Occurrence of the disease:</code></li><li><strong>B</strong> = <code>(Healthy allele frequency (p))^(2)</code></li><li><strong>Truea</strong> = <code>1 ÷ Occurrence of the disease:</code></li><li><strong>2pq</strong> = <code>2 × Healthy allele frequency (p) × Mutant allele frequency (q)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Healthy allele frequency (p)</strong> = <code>− Mutant allele frequency (q) − 1</code> — the form to use when Mutant allele frequency (q) are the values you have.</li><li><strong>Mutant allele frequency (q)</strong> = <code>− Healthy allele frequency (p) − 1</code> — the form to use when Healthy allele frequency (p) are the values you have.</li><li><strong>Occurrence of the disease:</strong> = <code>1 ÷ Occurrence of the disease:</code> — the form to use when Occurrence of the disease are the values you have.</li><li><strong>Occurrence of the disease:</strong> = <code>1 ÷ Occurrence of the disease:</code> — the form to use when Occurrence of the disease are the values you have.</li><li><strong>Occurrence of the disease:</strong> = <code>(Mutant allele frequency (q))^(2)</code> — the form to use when Mutant allele frequency (q) are the values you have.</li><li><strong>Mutant allele frequency (q)</strong> = <code>√(Occurrence of the disease:)</code> — the form to use when Occurrence of the disease are the values you have.</li><li><strong>Healthy allele frequency (p)</strong> = <code>√(B)</code> — the form to use when B are the values you have.</li><li><strong>B</strong> = <code>(Healthy allele frequency (p))^(2)</code> — the form to use when Healthy allele frequency (p) are the values you have.</li></ul><p>Any one of Healthy allele frequency (p), Mutant allele frequency (q) and Occurrence of the disease can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Occurrence of the disease, Healthy allele frequency (p) and Mutant allele frequency (q) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Occurrence of the disease left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Occurrence of the disease is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Occurrence of the disease: and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Allele frequency form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Occurrence of the disease</strong> takes a plain number with no unit attached. For example, people with cystic fibrosis constitute 1 in 3500 of the Caucasian population.&amp;nbsp;. It feeds Occurrence of the disease and Truea. Fill it from a measurement rather than a memory — Occurrence of the disease is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Occurrence of the disease</strong> is a percent figure. It is worked out from Occurrence of the disease. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Healthy allele frequency (p)</strong> is a plain number. It is worked out from Mutant allele frequency (q). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Mutant allele frequency (q)</strong> is a plain number. It is worked out from Healthy allele frequency (p). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Truea</strong> is a plain number. It is worked out from Occurrence of the disease. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>B</strong> is a plain number. It is worked out from Healthy allele frequency (p). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>2pq</strong> is a plain number. It is worked out from Healthy allele frequency (p) and Mutant allele frequency (q). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>1/2pq</strong> is a plain number. It is worked out from 2pq. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Allele frequency actually offers.</p><ul><li><strong>percent</strong> — 6 units. It opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Occurrence of the disease ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Occurrence of the disease — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Occurrence of the disease in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Occurrence of the disease is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Occurrence of the disease is what you already know and Occurrence of the disease and Healthy allele frequency (p) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/pedigree-probability">Pedigree Probability Calculator</a>, <a href="/biology/percent-germination">Percent Germination Calculator</a> and <a href="/biology/percent-inhibition">Percent Inhibition Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Allele frequency calculator work out?', 'a' => <<<'TXT'
            Occurrence of the disease, Healthy allele frequency (p), Mutant allele frequency (q) and Truea, from Mutant allele frequency (q). The relationship is Healthy allele frequency (p) = − Mutant allele frequency (q) − 1.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Occurrence of the disease. Fill occurrence of the disease and leave Occurrence of the disease: empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Healthy allele frequency (p), Mutant allele frequency (q), Occurrence of the disease and Occurrence of the disease blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Occurrence of the disease: is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Occurrence of the disease: blank and the page solves for it, reporting Occurrence of the disease: instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Occurrence of the disease: keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/pedigree-probability', 'name' => 'Pedigree Probability Calculator'],
            ['path' => '/biology/percent-germination', 'name' => 'Percent Germination Calculator'],
            ['path' => '/biology/percent-inhibition', 'name' => 'Percent Inhibition Calculator'],
        ],
        'authors' => [],
    ],
];
