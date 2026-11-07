<?php

/**
 * Primer Resuspension and Working Stock Calculator
 * /biology/primer-resuspension-working-stock
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Primer Resuspension and Working Stock Calculator',
    'meta' => ['title' => 'Primer Resuspension and Working Stock Calculator', 'description' => 'Primer Resuspension and Working Stock Calculator turns primer in the tube and stock concentration into volume to add to the pellet. Every figure is computed.', 'h1' => 'Primer Resuspension and Working Stock Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'nmol',
                            'label' => 'Primer in the tube',
                            'type' => 'number',
                            'suffix' => 'nmol',
                            'help' => 'Printed on the vial or the spec sheet',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '33.4',
                        ],
                        [
                            'name' => 'stock',
                            'label' => 'Stock concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'help' => '100 µM is the usual master stock',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'working',
                            'label' => 'Working concentration',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'working_vol',
                            'label' => 'Working stock to make',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'water_stock',
                            'label' => 'Volume to add to the pellet',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'take',
                            'label' => 'Stock to take for the working stock',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water_working',
                            'label' => 'Diluent for the working stock',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'aliquots',
                            'label' => 'Working stocks from one tube',
                            'type' => 'number',
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
            'title' => 'Resuspension',
            'results' => ['water_stock' => 'nmol/stock*1000', 'take' => 'working*working_vol/stock', 'water_working' => 'working_vol-working*working_vol/stock', 'aliquots' => 'nmol/stock*1000/working*working_vol/stock'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Primer Resuspension and Working Stock takes Primer in the tube, Stock concentration and Working concentration and returns Volume to add to the pellet and Stock to take for the working stock. There is no hidden constant here: change volume to add to the pellet and primer in the tube moves with it. The main result, Volume to add to the pellet, is reported in µL.
        TXT,
        'sections' => [
            ['title' => 'How the Primer Resuspension and Working Stock calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Primer Resuspension and Working Stock: it takes 4 numbers and reports Volume to add to the pellet, Stock to take for the working stock and Diluent for the working stock.</p><p>In the form&#039;s own words, Volume to add to the pellet = Primer in the tube ÷ Stock concentration × 1000.</p><p>The answers are Volume to add to the pellet, Stock to take for the working stock, Diluent for the working stock and Working stocks from one tube; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Primer in the tube</strong> — in nmol. Printed on the vial or the spec sheet</li><li><strong>Stock concentration</strong> — in µM. 100 µM is the usual master stock</li><li><strong>Working concentration</strong> — in µM</li><li><strong>Working stock to make</strong> — in µL</li></ul><p>What you get back is Volume to add to the pellet in µL, Stock to take for the working stock in µL, Diluent for the working stock in µL, Working stocks from one tube, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Primer in the tube = 33.4 nmol, Stock concentration = 100 µM, Working concentration = 10 µM and Working stock to make = 500 µL gives <strong>Volume to add to the pellet</strong> = 334 µL, <strong>Stock to take for the working stock</strong> = 50 µL, <strong>Diluent for the working stock</strong> = 450 µL and <strong>Working stocks from one tube</strong> = 167.</p><ul><li><strong>Volume to add to the pellet</strong> = 334 µL</li><li><strong>Stock to take for the working stock</strong> = 50 µL</li><li><strong>Diluent for the working stock</strong> = 450 µL</li><li><strong>Working stocks from one tube</strong> = 167</li></ul><p>The line behind those figures is <strong>Volume to add to the pellet</strong> = <code>Primer in the tube ÷ Stock concentration × 1000</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Volume to add to the pellet</strong> = 334, <strong>Stock to take for the working stock</strong> = 50, <strong>Diluent for the working stock</strong> = 450 and <strong>Working stocks from one tube</strong> = 167 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Volume to add to the pellet takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Volume to add to the pellet</strong> = <code>Primer in the tube ÷ Stock concentration × 1000</code></li><li><strong>Stock to take for the working stock</strong> = <code>Working concentration × Working stock to make ÷ Stock concentration</code></li><li><strong>Diluent for the working stock</strong> = <code>Working stock to make − Working concentration × Working stock to make ÷ Stock concentration</code></li><li><strong>Working stocks from one tube</strong> = <code>Primer in the tube ÷ Stock concentration × 1000 ÷ Working concentration × Working stock to make ÷ Stock concentration</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Volume to add to the pellet</strong> = <code>Primer in the tube ÷ Stock concentration × 1000</code> — the form to use when Primer in the tube and Stock concentration are the values you have.</li><li><strong>Stock to take for the working stock</strong> = <code>Working concentration × Working stock to make ÷ Stock concentration</code> — the form to use when Working concentration, Working stock to make and Stock concentration are the values you have.</li><li><strong>Diluent for the working stock</strong> = <code>Working stock to make − Working concentration × Working stock to make ÷ Stock concentration</code> — the form to use when Working stock to make, Working concentration and Stock concentration are the values you have.</li><li><strong>Working stocks from one tube</strong> = <code>Primer in the tube ÷ Stock concentration × 1000 ÷ Working concentration × Working stock to make ÷ Stock concentration</code> — the form to use when Primer in the tube, Stock concentration, Working concentration and Working stock to make are the values you have.</li></ul><p>Any one of Volume to add to the pellet, Stock to take for the working stock and Diluent for the working stock can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Primer in the tube from 33.4 to 66.8, leaving every other box alone. The panel moves from <strong>Volume to add to the pellet</strong> 334 µL, <strong>Stock to take for the working stock</strong> 50 µL, <strong>Diluent for the working stock</strong> 450 µL and <strong>Working stocks from one tube</strong> 167 to <strong>Volume to add to the pellet</strong> 668 µL, <strong>Stock to take for the working stock</strong> 50 µL, <strong>Diluent for the working stock</strong> 450 µL and <strong>Working stocks from one tube</strong> 334.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Volume to add to the pellet, Stock to take for the working stock and Diluent for the working stock are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Primer in the tube left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Primer in the tube is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Stock concentration left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Stock concentration is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Working concentration left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Working concentration is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Primer in the tube to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Primer Resuspension and Working Stock form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Primer in the tube</strong> is measured in nmol. Printed on the vial or the spec sheet. The page reads it when it works out Volume to add to the pellet and Working stocks from one tube. Fill it from a measurement rather than a memory — Primer in the tube is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Stock concentration</strong> is measured in µM. 100 µM is the usual master stock. The page reads it when it works out Volume to add to the pellet, Stock to take for the working stock and Diluent for the working stock. Fill it from a measurement rather than a memory — Stock concentration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Working concentration</strong> is measured in µM. The page reads it when it works out Stock to take for the working stock, Diluent for the working stock and Working stocks from one tube. Fill it from a measurement rather than a memory — Working concentration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Working stock to make</strong> is measured in µL. The page reads it when it works out Stock to take for the working stock, Diluent for the working stock and Working stocks from one tube. Fill it from a measurement rather than a memory — Working stock to make is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Volume to add to the pellet</strong> is a plain number and the page's own defaults put it at 334. It is computed from Primer in the tube and Stock concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Stock to take for the working stock</strong> is a plain number and the page's own defaults put it at 50. It is computed from Working concentration, Working stock to make and Stock concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Diluent for the working stock</strong> is a plain number and the page's own defaults put it at 450. It is computed from Working stock to make, Working concentration and Stock concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Working stocks from one tube</strong> is a plain number and the page's own defaults put it at 167. It is computed from Primer in the tube, Stock concentration, Working concentration and Working stock to make, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Volume to add to the pellet follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Primer in the tube, Stock concentration and Working concentration are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Primer in the tube, Stock concentration and Working concentration and the number you are missing is Volume to add to the pellet and Stock to take for the working stock.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/restriction-reaction-setup">Restriction Digest Recipe — Enzyme Limit</a>, <a href="/biology/restriction-enzyme-finder">Restriction Enzyme Finder Calculator</a> and <a href="/biology/reverse-complement">Reverse Complement Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Primer Resuspension and Working Stock calculator work out?', 'a' => <<<'TXT'
            Volume to add to the pellet, Stock to take for the working stock, Diluent for the working stock and Working stocks from one tube, from Primer in the tube and Stock concentration. The relationship is Volume to add to the pellet = Primer in the tube ÷ Stock concentration × 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Primer in the tube (nmol), Stock concentration (µM), Working concentration (µM), Working stock to make (µL). Enter primer in the tube, stock concentration and working concentration; Volume to add to the pellet is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Volume to add to the pellet, Stock to take for the working stock, Diluent for the working stock and Working stocks from one tube blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Volume to add to the pellet = 334 µL, Stock to take for the working stock = 50 µL, Diluent for the working stock = 450 µL and Working stocks from one tube = 167. The figures come from Primer in the tube as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Volume to add to the pellet is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Primer in the tube blank and the page solves for it, reporting Volume to add to the pellet instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Volume to add to the pellet keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/restriction-reaction-setup', 'name' => 'Restriction Digest Recipe — Enzyme Limit'],
            ['path' => '/biology/restriction-enzyme-finder', 'name' => 'Restriction Enzyme Finder Calculator'],
            ['path' => '/biology/reverse-complement', 'name' => 'Reverse Complement Calculator'],
        ],
        'authors' => [],
    ],
];
