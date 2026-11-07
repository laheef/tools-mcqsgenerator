<?php

/**
 * Fish oil dosage for cats
 * /biology/fish-oil-dosage-for-cats
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish oil dosage for cats',
    'meta' => ['title' => 'Fish oil dosage for cats Calculator: Free, With Steps', 'description' => 'Fish oil dosage for cats works out Your cat\'s weight 🐈 from Fish oil dosage. Fish oil dosage carry a unit chip, and it is easy to type a value in one unit…', 'h1' => 'Fish oil dosage for cats Calculator', 'updated' => '2026-05-25'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kg',
                            'label' => 'Your cat\'s weight 🐈',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mg',
                            'label' => 'Fish oil dosage',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'mg = 40 * kg',
            'results' => ['kg' => '(1/40)*mg', 'mg' => '40*kg'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fish oil dosage for cats works out Your cat's weight 🐈 from Fish oil dosage. Nothing is looked up on this page: Your cat's weight 🐈 is computed from Fish oil dosage and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Your cat's weight 🐈 is opened in kilograms; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Fish oil dosage for cats calculator works', 'html' => <<<'TXT'
            <p>Fish oil dosage for cats answers one question from 1 number, and the answer is Your cat&#039;s weight 🐈.</p><p>In the form&#039;s own words, Your cat&#039;s weight 🐈 = (1 ÷ 40) × Fish oil dosage.</p><p>What comes back is Your cat&#039;s weight 🐈 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Fish oil dosage</strong> — in milligrams</li></ul><p>What you get back is Your cat&#039;s weight 🐈 in kilograms, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Fish oil dosage = 10 mg; the answers are &lt;strong&gt;Your cat&amp;#039;s weight 🐈&lt;/strong&gt; = 0.25 kg.</p><ul><li><strong>Your cat&#039;s weight 🐈</strong> = 0.25 kg</li></ul><p>That is <strong>Your cat&#039;s weight 🐈</strong> = <code>(1 ÷ 40) × Fish oil dosage</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Your cat&amp;#039;s weight 🐈&lt;/strong&gt; = 0.25. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Your cat&#039;s weight 🐈 lists 27 options and opens on kilograms. </p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Your cat&#039;s weight 🐈</strong> = <code>(1 ÷ 40) × Fish oil dosage</code></li><li><strong>Fish oil dosage</strong> = <code>40 × Your cat&#039;s weight 🐈</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Your cat&#039;s weight 🐈 and Fish oil dosage can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Fish oil dosage, from 10 to 20 — and the answers go from &lt;strong&gt;Your cat&amp;#039;s weight 🐈&lt;/strong&gt; 0.25 kg to &lt;strong&gt;Your cat&amp;#039;s weight 🐈&lt;/strong&gt; 0.5 kg.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Fish oil dosage carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Your cat&#039;s weight 🐈 is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Fish oil dosage is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Fish oil dosage measured, Your cat&#039;s weight 🐈 wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/hatch-rate">Hatch Rate Calculator</a>, <a href="/biology/height-to-finger-length">Height to Finger Length Calculator</a> and <a href="/biology/hemocytometer-cell-counter">Hemocytometer Cell Counter (cells/mL) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fish oil dosage for cats calculator work out?', 'a' => 'Your cat\'s weight 🐈, from Fish oil dosage. The relationship is Your cat\'s weight 🐈 = (1 ÷ 40) × Fish oil dosage.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fish oil dosage (milligrams). Fill mg and leave Your cat\'s weight 🐈 empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Your cat\'s weight 🐈 and Fish oil dosage can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Your cat\'s weight 🐈 = 0.25 kg. That comes from the page\'s own defaults, entered in Fish oil dosage; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Your cat\'s weight 🐈 is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Fish oil dosage blank and the page solves for it, reporting Your cat\'s weight 🐈 instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Your cat\'s weight 🐈 keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/hatch-rate', 'name' => 'Hatch Rate Calculator'],
            ['path' => '/biology/height-to-finger-length', 'name' => 'Height to Finger Length Calculator'],
            ['path' => '/biology/hemocytometer-cell-counter', 'name' => 'Hemocytometer Cell Counter (cells/mL) Calculator'],
        ],
        'authors' => [],
    ],
];
