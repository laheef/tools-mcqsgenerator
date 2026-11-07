<?php

/**
 * Tree spacing
 * /biology/tree-spacing
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tree spacing',
    'meta' => ['title' => 'Tree spacing Calculator — Formula & Results', 'description' => 'Tree spacing works out area and space between trees and reports both. It answers in centimeters, and every other unit on the chip is converted for you.', 'h1' => 'Tree spacing Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => 'Planting area specification',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.1'],
                        ],
                        [
                            'name' => 'width',
                            'label' => 'Width',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'are',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Tree type',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Tree_type',
                            'label' => 'Tree type',
                            'type' => 'select',
                            'options' => [
                                'Apple tree (standard) ' => '30',
                                'Alder' => '6.7',
                                'American beech' => '20',
                                'American chestnut' => '28',
                                'American elm' => '20.000001',
                                'European beech' => '24',
                                'Black cherry' => '18',
                                'Black locust' => '24.00000002',
                                'Black walnut' => '30',
                                'Common juniper' => '6',
                                'Cottonwood' => '21.00008',
                                'Douglas fir' => '16',
                                'Dutch elm' => '24.0000005',
                                'Eucalyptus' => '25',
                                'Hornbeam tree' => '15.00008',
                                'Hybrid poplar' => '15',
                                'Linden' => '25.000056',
                                ' Loblolly pine ' => '12',
                                'Mahogany' => '25.000001',
                                'Maple tree' => '25.000024',
                                'Norway spruce' => '10.0001',
                                'Paper birch' => '17',
                                'Pauloownia ' => '16.00001',
                                'Pear tree' => '20.00008',
                                'Red oak' => '23',
                                'Rosewood' => '23.000002',
                                'Rowan & mountain ash' => '22.97',
                                ' Scots pine' => '16.00003',
                                'Western red cedar' => '18.0000001',
                                'White oak' => '26',
                                'White pine' => '20.000003',
                                'Wheeping willow' => '30.0006',
                                'Yellow birch' => '21',
                            ],
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'space_between_trees',
                            'label' => 'Space between trees',
                            'type' => 'number',
                            'help' => 'The minimal recommended distance between your tree seedlings.',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How many trees you can plant ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Trees_population',
                            'label' => 'Tree population',
                            'type' => 'number',
                            'help' => 'It\'s rounded down so that when the leftover land is too small for a tree, quarter and half trees are not accounted for.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'area = width*length',
            'results' => ['width' => 'area/length', 'area' => 'length*width', 'length' => 'area/width'],
        ],
        [
            'title' => 'space_between_trees = Tree_type',
            'results' => ['Tree_type' => 'space_between_trees', 'space_between_trees' => 'Tree_type'],
        ],
        [
            'title' => 'Trees_population = floor(length/space_between_trees) * floor(width/space_between_trees)',
            'results' => ['Trees_population' => 'floor(length/space_between_trees)*floor(width/space_between_trees)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Length, Width and Area into Tree spacing and the answer comes back as Space between trees. It is a single relationship that reads space between trees out of length, not a table of canned results keyed by them. Units for Space between trees default to meters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Tree spacing calculator works', 'html' => <<<'TXT'
            <p>The Tree spacing calculator applies one relationship to 5 numbers and reports Space between trees.</p><p>The relationship it solves reads Area = Length × Width.</p><p>What comes back is Space between trees — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Length</strong> — in meters</li><li><strong>Width</strong> — in meters</li><li><strong>Area</strong> — in ares</li><li><strong>Tree type</strong> — a plain number, no unit</li><li><strong>Tree population</strong> — a plain number, no unit. It&#039;s rounded down so that when the leftover land is too small for a tree, quarter and half trees are not accounted for.</li></ul><p>What you get back is Space between trees in meters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Space between trees lists 31 options and opens on meters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Space between trees</strong> = <code>Tree type</code></li><li><strong>Tree type</strong> = <code>Space between trees</code></li><li><strong>Tree population</strong> = <code>floor(Length ÷ Space between trees) × floor(Width ÷ Space between trees)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Area</strong> = <code>Length × Width</code> — the form to use when Length and Width are the values you have.</li><li><strong>Width</strong> = <code>Area ÷ Length</code> — the form to use when Area and Length are the values you have.</li><li><strong>Length</strong> = <code>Area ÷ Width</code> — the form to use when Area and Width are the values you have.</li><li><strong>Space between trees</strong> = <code>Tree type</code> — the form to use when Tree type are the values you have.</li><li><strong>Tree type</strong> = <code>Space between trees</code> — the form to use when Space between trees are the values you have.</li><li><strong>Tree population</strong> = <code>floor(Length ÷ Space between trees) × floor(Width ÷ Space between trees)</code> — the form to use when Length, Space between trees and Width are the values you have.</li></ul><p>Any one of Area, Width and Length can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length, Width and Area carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Space between trees is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Length left as a guess.</strong> Anything typed into Length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Width left as a guess.</strong> Anything typed into Width is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Length and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Length</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. The page reads it when it works out Width, Area and Tree population. Have it to hand before you start: Length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Width</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. The page reads it when it works out Area, Length and Tree population. Have it to hand before you start: Width is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Area</strong> is a ares quantity: the page opens it in are and converts anything else you pick before the formula runs. The page reads it when it works out Width and Length. Have it to hand before you start: Area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Tree type</strong> takes a plain number with no unit attached. The page reads it when it works out Space between trees. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Tree type is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Tree population</strong> takes a plain number with no unit attached. It&#039;s rounded down so that when the leftover land is too small for a tree, quarter and half trees are not accounted for. Have it to hand before you start: Tree population is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Space between trees</strong> is a meters figure. It is worked out from Tree type. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>meters</strong> — 31 units. It opens in <em>m</em>, and the chip also carries in, m, ft, Å, nm and pm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>ares</strong> — 24 units. It opens in <em>are</em>, and the chip also carries ac, m², ft², cm², in² and a. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Length, Width, Area and Tree type. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Length into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Space between trees in m with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Space between trees is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover meters and ares. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Length, Width and Area measured, Space between trees wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/serial-dilution-planner">Serial Dilution Planner Calculator</a>, <a href="/biology/shannon-wiener-index">Shannon–Wiener Diversity Index Calculator</a> and <a href="/biology/sheep-gestation">Sheep gestation Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Tree spacing is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Length, Width, Area and Tree type beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tree spacing calculator work out?', 'a' => 'Space between trees, from Length and Width. The relationship is Area = Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Length (meters), Width (meters), Area (ares), Tree type, Tree population. Fill length, width and area and leave Space between trees empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Area, Width, Length and Space between trees blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Space between trees is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Length left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Space between trees keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/serial-dilution-planner', 'name' => 'Serial Dilution Planner Calculator'],
            ['path' => '/biology/shannon-wiener-index', 'name' => 'Shannon–Wiener Diversity Index Calculator'],
            ['path' => '/biology/sheep-gestation', 'name' => 'Sheep gestation Calculator'],
        ],
        'authors' => [],
    ],
];
