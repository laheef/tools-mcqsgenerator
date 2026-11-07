<?php

/**
 * How big will my cat get
 * /biology/how-big-will-my-cat-get
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'How big will my cat get',
    'meta' => ['title' => 'How big will my cat get Calculator: Free, With Steps', 'description' => 'How big will my cat get works out Final size from Your kitten\'s age and Weight. The arithmetic is the whole method: Final size is worked out from Your…', 'h1' => 'How big will my cat get Calculator', 'updated' => '2026-08-19'],
    'raw' => [
        'vars' => [
            'age' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'final_size' => [
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
                'uid' => 'OAeJbOwgafSMR25mpB0xQ',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'age',
                                    'vt' => 'numerical',
                                    'l' => 'Your kitten\'s age',
                                    'us' => '19',
                                    'du' => 'wk',
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
                                    'n' => 'weight',
                                    'vt' => 'numerical',
                                    'l' => 'Weight',
                                    'h' => 'Your kitten\'s weight at the given age.',
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
                                    'n' => 'final_size',
                                    'vt' => 'numerical',
                                    'l' => 'Final size',
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
                                    't' => 'x',
                                    'c' => [
                                        ['final_size >0 and final_size <= 8', 'Your pet\'s going to be a small cat&nbsp;🐈 This type of cat typically weighs less than 8 pounds (3.6 kg)!'],
                                        ['final_size >8 and final_size <= 13', 'Your pet\'s going to be a medium cat&nbsp;🐈 This type of cat typically weighs 8–13 pounds (3.6-5.9 kg)!'],
                                        ['final_size > 13', 'Your pet\'s going to be a large cat&nbsp;🐈 This type of cat is usually larger than 13 pounds (5.9 kg)!&nbsp;'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'yiB11rk7nHjZlMBjn_LA0',
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
                                        [null, '✨ Build and customize your own tools instantly. Just type a simple sentence to generate a working calculator with zero coding.'],
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
                'formula' => 'final_size = (weight / age) * 32',
                'var' => [
                    [
                        'l' => 'final_size',
                        'f' => '32*weight/age',
                        'r' => ['weight', 'age'],
                    ],
                    [
                        'l' => 'weight',
                        'f' => '(1/32)*age*final_size',
                        'r' => ['final_size', 'age'],
                    ],
                    [
                        'l' => 'age',
                        'f' => '32*weight/final_size',
                        'r' => ['final_size', 'weight'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        How big will my cat get works out Final size from Your kitten's age and Weight. The arithmetic is the whole method: Final size is worked out from Your kitten's age by one formula, applied once. Final size comes back in kilograms unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the How big will my cat get calculator works', 'html' => <<<'TXT'
            <p>How big will my cat get answers one question from 2 numbers, and the answer is Final size.</p><p>The relationship it solves reads Final size = 32 × Weight ÷ Your kitten&#039;s age.</p><p>The result panel carries Final size, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Your kitten&#039;s age</strong> — in weeks</li><li><strong>Weight</strong> — in kilograms. Your kitten&#039;s weight at the given age.</li></ul><p>What you get back is Final size in kilograms, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Your kitten&amp;#039;s age = 10 wk and Weight = 100 kg — through the same formula and the panel reports &lt;strong&gt;Final size&lt;/strong&gt; = 320 kg.</p><ul><li><strong>Final size</strong> = 320 kg</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Final size</strong> = <code>32 × Weight ÷ Your kitten&#039;s age</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Final size&lt;/strong&gt; = 320. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Final size lists 27 options and opens on kilograms. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Final size</strong> = <code>32 × Weight ÷ Your kitten&#039;s age</code></li><li><strong>Weight</strong> = <code>(1 ÷ 32) × Your kitten&#039;s age × Final size</code></li><li><strong>Your kitten&#039;s age</strong> = <code>32 × Weight ÷ Final size</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Final size, Weight and Your kitten&#039;s age can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Your kitten&#039;s age, from 10 to 20 — and the answers go from &lt;strong&gt;Final size&lt;/strong&gt; 320 kg to &lt;strong&gt;Final size&lt;/strong&gt; 160 kg.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Your kitten&#039;s age and Weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Final size is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Your kitten&#039;s age is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your kitten&#039;s age and Weight measured, Final size wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/fish-per-liter">Fish Per Liter Calculator</a>, <a href="/biology/fish-tank-stocking">Fish Tank Stocking Calculator</a> and <a href="/biology/fixation-index-fst">Fixation Index (Fst) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the How big will my cat get calculator work out?', 'a' => 'Final size, from Weight and Your kitten\'s age. The relationship is Final size = 32 × Weight ÷ Your kitten\'s age.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Your kitten\'s age (weeks), Weight (kilograms). Enter age and weight; Final size is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Final size, Weight and Your kitten\'s age can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Final size = 320 kg. That comes from the page\'s own defaults, entered in Your kitten\'s age; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Final size is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Your kitten's age left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Final size keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/fish-per-liter', 'name' => 'Fish Per Liter Calculator'],
            ['path' => '/biology/fish-tank-stocking', 'name' => 'Fish Tank Stocking Calculator'],
            ['path' => '/biology/fixation-index-fst', 'name' => 'Fixation Index (Fst) Calculator'],
        ],
        'authors' => [],
    ],
];
