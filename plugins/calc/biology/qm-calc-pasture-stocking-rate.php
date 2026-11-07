<?php

/**
 * Pasture Stocking Rate Calculator
 * /biology/pasture-stocking-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pasture Stocking Rate Calculator',
    'meta' => ['title' => 'Pasture Stocking Rate Calculator — Formula & Results', 'description' => <<<'TXT'
    The arithmetic is the whole method: Animals carried is worked out from Pasture area by one formula, applied once. Temperate pasture: 6,000–12,000Utilisation…
    TXT, 'h1' => 'Pasture Stocking Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Pasture area',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'dm_yield',
                            'label' => 'Pasture dry-matter yield',
                            'type' => 'number',
                            'suffix' => 'kg/ha/yr',
                            'help' => 'Temperate pasture: 6,000–12,000',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8000',
                        ],
                        [
                            'name' => 'use',
                            'label' => 'Utilisation',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'How much of the growth animals actually harvest',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '65',
                        ],
                        [
                            'name' => 'intake',
                            'label' => 'Daily dry-matter intake per animal',
                            'type' => 'number',
                            'suffix' => 'kg/day',
                            'help' => 'Cattle: 2–2.5% of body weight',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'season',
                            'label' => 'Grazing days per year',
                            'type' => 'number',
                            'suffix' => 'days',
                            'help' => 'Days the animals are on pasture',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '220',
                        ],
                        [
                            'name' => 'capacity',
                            'label' => 'Animals carried',
                            'type' => 'number',
                            'suffix' => 'head',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'lu',
                            'label' => 'Livestock units (1 LU = 600 kg cow)',
                            'type' => 'number',
                            'suffix' => 'LU',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_head',
                            'label' => 'Pasture per animal',
                            'type' => 'number',
                            'suffix' => 'ha/head',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dm_available',
                            'label' => 'Usable dry matter',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Stocking',
            'results' => [
                'dm_available' => 'area*dm_yield*use/100',
                'capacity' => 'area*dm_yield*use/100/(intake*season)',
                'lu' => 'area*dm_yield*use/100/(intake*season)',
                'per_head' => 'area/(area*dm_yield*use/100/(intake*season))',
                'area' => 'intake*season*capacity/(dm_yield*use/100)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Pasture area, Pasture dry-matter yield and Utilisation into Pasture Stocking Rate and the answer comes back as Animals carried and Livestock units (1 LU = 600 kg cow). The arithmetic is the whole method: Animals carried is worked out from Pasture area by one formula, applied once. Animals carried comes back in head unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Pasture Stocking Rate calculator works', 'html' => <<<'TXT'
            <p>Pasture Stocking Rate answers one question from 5 numbers, and the answer is Animals carried, Livestock units (1 LU = 600 kg cow) and Pasture per animal.</p><p>Written with the labels from the form, Usable dry matter = Pasture area × Pasture dry-matter yield × Utilisation ÷ 100.</p><p>The answers are Animals carried, Livestock units (1 LU = 600 kg cow), Pasture per animal and Usable dry matter; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Pasture area</strong> — in ha</li><li><strong>Pasture dry-matter yield</strong> — in kg/ha/yr. Temperate pasture: 6,000–12,000</li><li><strong>Utilisation</strong> — in %. How much of the growth animals actually harvest</li><li><strong>Daily dry-matter intake per animal</strong> — in kg/day. Cattle: 2–2.5% of body weight</li><li><strong>Grazing days per year</strong> — in days. Days the animals are on pasture</li></ul><p>The answers come back as Animals carried in head, Livestock units (1 LU = 600 kg cow) in LU, Pasture per animal in ha/head, Usable dry matter in kg. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Animals carried is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Usable dry matter</strong> = <code>Pasture area × Pasture dry-matter yield × Utilisation ÷ 100</code></li><li><strong>Animals carried</strong> = <code>Pasture area × Pasture dry-matter yield × Utilisation ÷ 100 ÷ (Daily dry-matter intake per animal × Grazing days per year)</code></li><li><strong>Livestock units (1 LU = 600 kg cow)</strong> = <code>Pasture area × Pasture dry-matter yield × Utilisation ÷ 100 ÷ (Daily dry-matter intake per animal × Grazing days per year)</code></li><li><strong>Pasture per animal</strong> = <code>Pasture area ÷ (Pasture area × Pasture dry-matter yield × Utilisation ÷ 100 ÷ (Daily dry-matter intake per animal × Grazing days per year))</code></li><li><strong>Pasture area</strong> = <code>Daily dry-matter intake per animal × Grazing days per year × Animals carried ÷ (Pasture dry-matter yield × Utilisation ÷ 100)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Usable dry matter</strong> = <code>Pasture area × Pasture dry-matter yield × Utilisation ÷ 100</code> — the form to use when Pasture area, Pasture dry-matter yield and Utilisation are the values you have.</li><li><strong>Animals carried</strong> = <code>Pasture area × Pasture dry-matter yield × Utilisation ÷ 100 ÷ (Daily dry-matter intake per animal × Grazing days per year)</code> — the form to use when Pasture area, Pasture dry-matter yield, Utilisation and Daily dry-matter intake per animal are the values you have.</li><li><strong>Livestock units (1 LU = 600 kg cow)</strong> = <code>Pasture area × Pasture dry-matter yield × Utilisation ÷ 100 ÷ (Daily dry-matter intake per animal × Grazing days per year)</code> — the form to use when Pasture area, Pasture dry-matter yield, Utilisation and Daily dry-matter intake per animal are the values you have.</li><li><strong>Pasture per animal</strong> = <code>Pasture area ÷ (Pasture area × Pasture dry-matter yield × Utilisation ÷ 100 ÷ (Daily dry-matter intake per animal × Grazing days per year))</code> — the form to use when Pasture area, Pasture dry-matter yield, Utilisation and Daily dry-matter intake per animal are the values you have.</li><li><strong>Pasture area</strong> = <code>Daily dry-matter intake per animal × Grazing days per year × Animals carried ÷ (Pasture dry-matter yield × Utilisation ÷ 100)</code> — the form to use when Daily dry-matter intake per animal, Grazing days per year, Animals carried and Pasture dry-matter yield are the values you have.</li></ul><p>Any one of Usable dry matter, Animals carried and Livestock units (1 LU = 600 kg cow) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Animals carried, Livestock units (1 LU = 600 kg cow) and Pasture per animal are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Pasture area left as a guess.</strong> Anything typed into Pasture area is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Pasture dry-matter yield left as a guess.</strong> Anything typed into Pasture dry-matter yield is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Utilisation left as a guess.</strong> Anything typed into Utilisation is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Pasture area to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Pasture area</strong> is measured in ha. It feeds Usable dry matter, Animals carried and Livestock units (1 LU = 600 kg cow). Have it to hand before you start: Pasture area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Pasture dry-matter yield</strong> is measured in kg/ha/yr. Temperate pasture: 6,000–12,000. It feeds Usable dry matter, Animals carried and Livestock units (1 LU = 600 kg cow). Have it to hand before you start: Pasture dry-matter yield is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Utilisation</strong> is measured in %. How much of the growth animals actually harvest. It feeds Usable dry matter, Animals carried and Livestock units (1 LU = 600 kg cow). Have it to hand before you start: Utilisation is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Daily dry-matter intake per animal</strong> is measured in kg/day. Cattle: 2–2.5% of body weight. It feeds Animals carried, Livestock units (1 LU = 600 kg cow) and Pasture per animal. Have it to hand before you start: Daily dry-matter intake per animal is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Grazing days per year</strong> is measured in days. Days the animals are on pasture. It feeds Animals carried, Livestock units (1 LU = 600 kg cow) and Pasture per animal. Have it to hand before you start: Grazing days per year is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Animals carried</strong> is a plain number. It is worked out from Pasture area, Pasture dry-matter yield, Utilisation and Daily dry-matter intake per animal. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Livestock units (1 LU = 600 kg cow)</strong> is a plain number. It is worked out from Pasture area, Pasture dry-matter yield, Utilisation and Daily dry-matter intake per animal. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Pasture per animal</strong> is a plain number. It is worked out from Pasture area, Pasture dry-matter yield, Utilisation and Daily dry-matter intake per animal. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Usable dry matter</strong> is a plain number. It is worked out from Pasture area, Pasture dry-matter yield and Utilisation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Animals carried is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Pasture area, Pasture dry-matter yield and Utilisation are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Pasture area, Pasture dry-matter yield and Utilisation is what you already know and Animals carried and Livestock units (1 LU = 600 kg cow) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/rat-cage">Rat cage Calculator</a>, <a href="/biology/raw-dog-food">Raw dog food Calculator</a> and <a href="/biology/recombination-frequency">Recombination Frequency Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pasture Stocking Rate calculator work out?', 'a' => <<<'TXT'
            Animals carried, Livestock units (1 LU = 600 kg cow), Pasture per animal and Usable dry matter, from Pasture area, Pasture dry-matter yield and Utilisation. The relationship is Usable dry matter = Pasture area × Pasture dry-matter yield × Utilisation ÷ 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Pasture area (ha), Pasture dry-matter yield (kg/ha/yr), Utilisation (%), Daily dry-matter intake per animal (kg/day), Grazing days per year (days). Enter area, dm_yield and use; Animals carried is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Usable dry matter, Animals carried, Livestock units (1 LU = 600 kg cow) and Pasture per animal blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Animals carried is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Pasture area left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Animals carried at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/rat-cage', 'name' => 'Rat cage Calculator'],
            ['path' => '/biology/raw-dog-food', 'name' => 'Raw dog food Calculator'],
            ['path' => '/biology/recombination-frequency', 'name' => 'Recombination Frequency Calculator'],
        ],
        'authors' => [],
    ],
];
