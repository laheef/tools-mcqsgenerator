<?php

/**
 * Sheep gestation
 * /biology/sheep-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sheep gestation',
    'meta' => ['title' => 'Sheep gestation — Formula, Steps & Examples', 'description' => <<<'TXT'
    Sheep gestation takes Lambing date 🐏 and returns Mating date 🐑 and initialLambing. The arithmetic is the whole method: Mating date 🐑 is worked out from…
    TXT, 'h1' => 'Sheep gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'finalLambing' => ['type' => 'date', 'rnd' => null],
            'initialLambing' => ['type' => 'date', 'rnd' => null],
            'lambing_date' => ['type' => 'date', 'rnd' => null],
            'mating_date' => ['type' => 'date', 'rnd' => null],
        ],
        'groups' => [
            [
                'uid' => 'sxJ_GOM1d0su0YcNkxLAH',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'mating_date', 'vt' => 'date', 'l' => 'Mating date 🐑'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'lambing_date', 'vt' => 'date', 'l' => 'Lambing date 🐏'],
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
                                        [null, 'You may expect the lamb to be born between {{initialLambing.longValue}} and {{finalLambing.longValue}}.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'EvK-ryZpHEtWGrvIFuNFH',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'initialLambing', 'vt' => 'date', 'l' => ''],
                            ],
                            [
                                ['t' => 'v', 'n' => 'finalLambing', 'vt' => 'date', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'lambing_date = mating_date + 147',
                'var' => [
                    [
                        'l' => 'mating_date',
                        'f' => 'lambing_date - 147',
                        'r' => ['lambing_date'],
                    ],
                    [
                        'l' => 'lambing_date',
                        'f' => 'mating_date + 147',
                        'r' => ['mating_date'],
                    ],
                ],
            ],
            [
                'formula' => 'initialLambing = mating_date + 142',
                'var' => [
                    [
                        'l' => 'mating_date',
                        'f' => 'initialLambing - 142',
                        'r' => ['initialLambing'],
                    ],
                    [
                        'l' => 'initialLambing',
                        'f' => 'mating_date + 142',
                        'r' => ['mating_date'],
                    ],
                ],
            ],
            [
                'formula' => 'finalLambing = mating_date + 152',
                'var' => [
                    [
                        'l' => 'mating_date',
                        'f' => 'finalLambing - 152',
                        'r' => ['finalLambing'],
                    ],
                    [
                        'l' => 'finalLambing',
                        'f' => 'mating_date + 152',
                        'r' => ['mating_date'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sheep gestation takes Lambing date 🐏 and returns Mating date 🐑 and initialLambing. The arithmetic is the whole method: Mating date 🐑 is worked out from Lambing date 🐏 by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Sheep gestation calculator works', 'html' => <<<'TXT'
            <p>Sheep gestation answers one question from 1 number, and the answer is Mating date 🐑, initialLambing and finalLambing.</p><p>The relationship it solves reads Mating date 🐑 = Lambing date 🐏 − 147.</p><p>What comes back is Mating date 🐑, initialLambing and finalLambing — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Lambing date 🐏</strong> — a plain number, no unit, entered as a date</li></ul><p>The answers come back as Mating date 🐑, initialLambing, finalLambing. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Mating date 🐑 takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mating date 🐑</strong> = <code>Lambing date 🐏 − 147</code></li><li><strong>Lambing date 🐏</strong> = <code>Mating date 🐑 + 147</code></li><li><strong>initialLambing</strong> = <code>Mating date 🐑 + 142</code></li><li><strong>finalLambing</strong> = <code>Mating date 🐑 + 152</code></li></ul><p>Any one of Mating date 🐑, Lambing date 🐏 and initialLambing can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Mating date 🐑, initialLambing and finalLambing are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Lambing date 🐏 and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Lambing date 🐏 is what you already know and Mating date 🐑 and initialLambing is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dna-concentration">DNA concentration</a>, <a href="/biology/dna-copy-number">DNA copy number Calculator</a> and <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sheep gestation calculator work out?', 'a' => 'Mating date 🐑, initialLambing and finalLambing, from Lambing date 🐏. The relationship is Mating date 🐑 = Lambing date 🐏 − 147.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Lambing date 🐏. Enter lambing_date; Mating date 🐑 is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mating date 🐑, Lambing date 🐏, initialLambing and finalLambing blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Mating date 🐑 is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Lambing date 🐏 blank and the page solves for it, reporting Mating date 🐑 instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Mating date 🐑 keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dna-concentration', 'name' => 'DNA concentration'],
            ['path' => '/biology/dna-copy-number', 'name' => 'DNA copy number Calculator'],
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
        ],
        'authors' => [],
    ],
];
