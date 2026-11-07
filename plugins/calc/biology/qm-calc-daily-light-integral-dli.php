<?php

/**
 * Daily light integral (DLI)
 * /biology/daily-light-integral-dli
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Daily light integral (DLI)',
    'meta' => ['title' => 'Daily light integral (DLI) — Formula & Results', 'description' => <<<'TXT'
    Daily light integral (DLI) turns Photon flux density (PPFD) and Daily light integral (DLI) into Light hours per day. The arithmetic is the whole method: Light…
    TXT, 'h1' => 'Daily light integral (DLI) Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'dli' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'lfd' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ppfd' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'Pl2Pl12psJ7L2MbfKFzR9',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'lfd',
                                    'vt' => 'numerical',
                                    'l' => 'Light hours per day ',
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
                                [
                                    't' => 'v',
                                    'n' => 'ppfd',
                                    'vt' => 'numerical',
                                    'l' => 'Photon flux density (PPFD)',
                                    'suf' => 'μmol/s·m²',
                                    'h' => 'PPFD is photosynthetic photon flux density.',
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
                                    'n' => 'dli',
                                    'vt' => 'numerical',
                                    'l' => 'Daily light integral (DLI)',
                                    'suf' => 'mol/m²/day',
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
                                        ['dli > 0 and dli <= 6', 'This amount of light is the minimum requirement for microgreens.'],
                                        ['dli > 6 and dli <= 12', 'This amount of light is good for microgreens.'],
                                        ['dli > 12 and dli <= 17', 'This amount of light is good for vegetative plants like leafy greens and herbs.'],
                                        ['dli > 17 and dli < 40', 'This amount of light is good for flowering crops, including vegetables that grow out of flowers, like peppers and tomatoes.'],
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
                'formula' => 'dli = ppfd * lfd * 3600 / 1000000',
                'var' => [
                    [
                        'l' => 'lfd',
                        'f' => '(2500/9)*dli/ppfd',
                        'r' => ['dli', 'ppfd'],
                    ],
                    [
                        'l' => 'dli',
                        'f' => '(9/2500)*lfd*ppfd',
                        'r' => ['lfd', 'ppfd'],
                    ],
                    [
                        'l' => 'ppfd',
                        'f' => '(2500/9)*dli/lfd',
                        'r' => ['lfd', 'dli'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Daily light integral (DLI) turns Photon flux density (PPFD) and Daily light integral (DLI) into Light hours per day. The arithmetic is the whole method: Light hours per day is worked out from Photon flux density (PPFD) by one formula, applied once. Light hours per day comes back in hours unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Daily light integral (DLI) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Daily light integral (DLI): it takes 2 numbers and reports Light hours per day.</p><p>Written with the labels from the form, Light hours per day = (2500 ÷ 9) × Daily light integral (DLI) ÷ Photon flux density (PPFD).</p><p>The answers are Light hours per day; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Photon flux density (PPFD)</strong> — in μmol/s·m². PPFD is photosynthetic photon flux density.</li><li><strong>Daily light integral (DLI)</strong> — in mol/m²/day</li></ul><p>The answer comes back as Light hours per day in hours. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Photon flux density (PPFD) = 10 μmol/s·m² and Daily light integral (DLI) = 100 mol/m²/day gives &lt;strong&gt;Light hours per day&lt;/strong&gt; = 2778 hrs.</p><ul><li><strong>Light hours per day</strong> = 2778 hrs</li></ul><p>That is <strong>Light hours per day</strong> = <code>(2500 ÷ 9) × Daily light integral (DLI) ÷ Photon flux density (PPFD)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Light hours per day&lt;/strong&gt; = 2778 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Light hours per day offers 18 units and opens on hours, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Light hours per day</strong> = <code>(2500 ÷ 9) × Daily light integral (DLI) ÷ Photon flux density (PPFD)</code></li><li><strong>Daily light integral (DLI)</strong> = <code>(9 ÷ 2500) × Light hours per day × Photon flux density (PPFD)</code></li><li><strong>Photon flux density (PPFD)</strong> = <code>(2500 ÷ 9) × Daily light integral (DLI) ÷ Light hours per day</code></li></ul><p>Any one of Light hours per day, Daily light integral (DLI) and Photon flux density (PPFD) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Photon flux density (PPFD), from 10 to 20 — and the answers go from &lt;strong&gt;Light hours per day&lt;/strong&gt; 2778 hrs to &lt;strong&gt;Light hours per day&lt;/strong&gt; 1389 hrs.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Light hours per day is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Photon flux density (PPFD) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Photon flux density (PPFD) and Daily light integral (DLI) and the number you are missing is Light hours per day.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dsdna-ug-to-pmol">dsDNA µg to pmol Calculator</a>, <a href="/biology/dsdna-ug-to-pmol-converter">dsDNA µg to pmol Converter Calculator</a> and <a href="/biology/egg-incubation-hatch-date">Egg Incubation Hatch Date Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Daily light integral (DLI) calculator work out?', 'a' => <<<'TXT'
            Light hours per day, from Daily light integral (DLI) and Photon flux density (PPFD). The relationship is Light hours per day = (2500 ÷ 9) × Daily light integral (DLI) ÷ Photon flux density (PPFD).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Photon flux density (PPFD) (μmol/s·m²), Daily light integral (DLI) (mol/m²/day). Fill ppfd and dli and leave Light hours per day empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Light hours per day, Daily light integral (DLI) and Photon flux density (PPFD) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Light hours per day = 2778 hrs. Those are the defaults written into the form — move Photon flux density (PPFD) and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Light hours per day is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Photon flux density (PPFD) blank and the page solves for it, reporting Light hours per day instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Light hours per day keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dsdna-ug-to-pmol', 'name' => 'dsDNA µg to pmol Calculator'],
            ['path' => '/biology/dsdna-ug-to-pmol-converter', 'name' => 'dsDNA µg to pmol Converter Calculator'],
            ['path' => '/biology/egg-incubation-hatch-date', 'name' => 'Egg Incubation Hatch Date Calculator'],
        ],
        'authors' => [],
    ],
];
