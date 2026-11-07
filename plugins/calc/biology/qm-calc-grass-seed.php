<?php

/**
 * Grass seed
 * /biology/grass-seed
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Grass seed',
    'meta' => ['title' => 'Grass seed Calculator: Formula, Steps & Examples', 'description' => 'Grass seed takes lawn shape, width and length and returns area and seeds. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Grass seed Calculator', 'updated' => '2026-08-12'],
    'raw' => [
        'vars' => [
            'a_axis' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_circle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_elipsis' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_rectangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'area_triangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'areashape' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'iwGwVtLZWaw7WOAJKokAP', 'c' => null],
                ],
                'ds' => '840',
            ],
            'b_axis' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'base' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'height' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'radius' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'seed_coverage_rate' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '2.5', 'c' => null],
                    ['v' => '10', 'c' => 'userUsesImperialUnits()'],
                ],
            ],
            'seeds_circle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'seeds_elipsis' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'seeds_rectangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'seeds_triangle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.001'],
            ],
            'width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'jUqZlk8i1WKu1pd8uUcTD',
                'title' => 'Lawn area',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'areashape',
                                    'vt' => 'valueSelect',
                                    'l' => 'Lawn shape',
                                    'ds' => '840',
                                    'opts' => [
                                        ['iwGwVtLZWaw7WOAJKokAP', 'Rectangle', '0'],
                                        ['NDgKgOih0C1ObJEW2W-Sy', 'Circle', '1'],
                                        ['X1AsDt6JU1e1ePWERLgDr', 'Ellipsis', '2'],
                                        ['2hu8Uvv5_qrQlGXkN3t8N', 'Triangle', '3'],
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
                                    'n' => 'width',
                                    'vt' => 'numerical',
                                    'l' => 'Width',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'length',
                                    'vt' => 'numerical',
                                    'l' => 'Length',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'area_rectangle',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
                                    'us' => '28',
                                    'du' => 'm2',
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
                                    'n' => 'radius',
                                    'vt' => 'numerical',
                                    'l' => 'Radius',
                                    'us' => '4',
                                    'du' => 'm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'area_circle', 'vt' => 'numerical', 'l' => 'Area'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'a_axis',
                                    'vt' => 'numerical',
                                    'l' => 'A axis',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'b_axis',
                                    'vt' => 'numerical',
                                    'l' => 'B axis',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'area_elipsis',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
                                    'us' => '28',
                                    'du' => 'm2',
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
                                    'n' => 'base',
                                    'vt' => 'numerical',
                                    'l' => 'Base',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'height',
                                    'vt' => 'numerical',
                                    'l' => 'Height',
                                    'us' => '4',
                                    'du' => 'm',
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
                                    'n' => 'area_triangle',
                                    'vt' => 'numerical',
                                    'l' => 'Area',
                                    'us' => '28',
                                    'du' => 'm2',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'ioUzkJiismVEx9-RlYImh',
                'title' => 'Seeds',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'seed_coverage_rate',
                                    'vt' => 'numerical',
                                    'l' => 'Coverage rate',
                                    'h' => <<<'TXT'
                                    Each type of grass has a different coverage rate. They are usually given in kg/1000m² in the metric system, or lbs/1000ft² in the imperial system. To find out the coverage rate of your grass, look at the seed packaging.
                                    TXT,
                                    'us' => '344',
                                    'du' => 'kg1000m2',
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
                                    'n' => 'seeds_rectangle',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
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
                                    'n' => 'seeds_circle',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
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
                                    'n' => 'seeds_elipsis',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
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
                                    'n' => 'seeds_triangle',
                                    'vt' => 'numerical',
                                    'l' => 'Seeds',
                                    'us' => '22',
                                    'du' => 'kg',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'area_rectangle = width * length',
                'var' => [
                    [
                        'l' => 'length',
                        'f' => 'area_rectangle/width',
                        'r' => ['area_rectangle', 'width'],
                    ],
                    [
                        'l' => 'area_rectangle',
                        'f' => 'length*width',
                        'r' => ['length', 'width'],
                    ],
                    [
                        'l' => 'width',
                        'f' => 'area_rectangle/length',
                        'r' => ['length', 'area_rectangle'],
                    ],
                ],
            ],
            [
                'formula' => 'area_circle = pi * radius^2',
                'var' => [
                    [
                        'l' => 'area_circle',
                        'f' => 'PI*pow(radius, 2)',
                        'r' => ['radius'],
                    ],
                    [
                        'l' => 'radius',
                        'f' => 'sqrt(area_circle)/sqrt(PI)',
                        'r' => ['area_circle'],
                    ],
                ],
            ],
            [
                'formula' => 'area_elipsis = a_axis * b_axis * pi',
                'var' => [
                    [
                        'l' => 'b_axis',
                        'f' => 'area_elipsis/(PI*a_axis)',
                        'r' => ['a_axis', 'area_elipsis'],
                    ],
                    [
                        'l' => 'a_axis',
                        'f' => 'area_elipsis/(PI*b_axis)',
                        'r' => ['b_axis', 'area_elipsis'],
                    ],
                    [
                        'l' => 'area_elipsis',
                        'f' => 'PI*a_axis*b_axis',
                        'r' => ['b_axis', 'a_axis'],
                    ],
                ],
            ],
            [
                'formula' => 'area_triangle = (1/2) * base * height',
                'var' => [
                    [
                        'l' => 'area_triangle',
                        'f' => '(1/2)*base*height',
                        'r' => ['base', 'height'],
                    ],
                    [
                        'l' => 'base',
                        'f' => '2*area_triangle/height',
                        'r' => ['area_triangle', 'height'],
                    ],
                    [
                        'l' => 'height',
                        'f' => '2*area_triangle/base',
                        'r' => ['area_triangle', 'base'],
                    ],
                ],
            ],
            [
                'formula' => 'seeds_rectangle = seed_coverage_rate * area_rectangle / 1000',
                'var' => [
                    [
                        'l' => 'seeds_rectangle',
                        'f' => '(1/1000)*area_rectangle*seed_coverage_rate',
                        'r' => ['area_rectangle', 'seed_coverage_rate'],
                    ],
                    [
                        'l' => 'area_rectangle',
                        'f' => '1000*seeds_rectangle/seed_coverage_rate',
                        'r' => ['seeds_rectangle', 'seed_coverage_rate'],
                    ],
                    [
                        'l' => 'seed_coverage_rate',
                        'f' => '1000*seeds_rectangle/area_rectangle',
                        'r' => ['seeds_rectangle', 'area_rectangle'],
                    ],
                ],
            ],
            [
                'formula' => 'seeds_circle = seed_coverage_rate * area_circle / 1000',
                'var' => [
                    [
                        'l' => 'seed_coverage_rate',
                        'f' => '1000*seeds_circle/area_circle',
                        'r' => ['area_circle', 'seeds_circle'],
                    ],
                    [
                        'l' => 'area_circle',
                        'f' => '1000*seeds_circle/seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'seeds_circle'],
                    ],
                    [
                        'l' => 'seeds_circle',
                        'f' => '(1/1000)*area_circle*seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'area_circle'],
                    ],
                ],
            ],
            [
                'formula' => 'seeds_elipsis = seed_coverage_rate * area_elipsis / 1000',
                'var' => [
                    [
                        'l' => 'seed_coverage_rate',
                        'f' => '1000*seeds_elipsis/area_elipsis',
                        'r' => ['area_elipsis', 'seeds_elipsis'],
                    ],
                    [
                        'l' => 'area_elipsis',
                        'f' => '1000*seeds_elipsis/seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'seeds_elipsis'],
                    ],
                    [
                        'l' => 'seeds_elipsis',
                        'f' => '(1/1000)*area_elipsis*seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'area_elipsis'],
                    ],
                ],
            ],
            [
                'formula' => 'seeds_triangle = seed_coverage_rate * area_triangle / 1000',
                'var' => [
                    [
                        'l' => 'area_triangle',
                        'f' => '1000*seeds_triangle/seed_coverage_rate',
                        'r' => ['seed_coverage_rate', 'seeds_triangle'],
                    ],
                    [
                        'l' => 'seed_coverage_rate',
                        'f' => '1000*seeds_triangle/area_triangle',
                        'r' => ['area_triangle', 'seeds_triangle'],
                    ],
                    [
                        'l' => 'seeds_triangle',
                        'f' => '(1/1000)*area_triangle*seed_coverage_rate',
                        'r' => ['area_triangle', 'seed_coverage_rate'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '840' => [
                'name' => 'Area Shape',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'iwGwVtLZWaw7WOAJKokAP', 'label' => 'Rectangle', 'value' => '0'],
                    ['uid' => 'NDgKgOih0C1ObJEW2W-Sy', 'label' => 'Circle', 'value' => '1'],
                    ['uid' => 'X1AsDt6JU1e1ePWERLgDr', 'label' => 'Ellipsis', 'value' => '2'],
                    ['uid' => '2hu8Uvv5_qrQlGXkN3t8N', 'label' => 'Triangle', 'value' => '3'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Grass seed takes Width and returns Length and Radius. It is a single relationship that reads length out of width, not a table of canned results keyed by them. Units for Length default to meters and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Grass seed calculator works', 'html' => <<<'TXT'
            <p>Grass seed answers one question from 2 numbers, and the answer is Length, Radius and Area.</p><p>Written with the labels from the form, Length = Area ÷ Width.</p><p>The result panel carries Length, Radius, Area and A axis, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Width</strong> — in meters</li><li><strong>Area</strong> — in square meters</li></ul><p>The result boxes are Length in meters, Radius in meters, Area in square meters, A axis in meters, B axis in meters, Area in square meters, Base in meters, Height in meters, Area in square meters, Coverage rate in kilograms per thousand square meters, Seeds in kilograms, Seeds in kilograms, Seeds in kilograms, Seeds in kilograms; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Length offers 31 units and opens on meters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Radius</strong> = <code>√(Area) ÷ √(PI)</code></li><li><strong>B axis</strong> = <code>Area ÷ (PI × A axis)</code></li><li><strong>A axis</strong> = <code>Area ÷ (PI × B axis)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Length</strong> = <code>Area ÷ Width</code> — the form to use when Area and Width are the values you have.</li><li><strong>Area</strong> = <code>Length × Width</code> — the form to use when Length and Width are the values you have.</li><li><strong>Width</strong> = <code>Area ÷ Length</code> — the form to use when Length and Area are the values you have.</li><li><strong>Area</strong> = <code>PI × (Radius)^(2)</code> — the form to use when Radius are the values you have.</li><li><strong>Radius</strong> = <code>√(Area) ÷ √(PI)</code> — the form to use when Area are the values you have.</li><li><strong>B axis</strong> = <code>Area ÷ (PI × A axis)</code> — the form to use when A axis and Area are the values you have.</li><li><strong>A axis</strong> = <code>Area ÷ (PI × B axis)</code> — the form to use when B axis and Area are the values you have.</li><li><strong>Area</strong> = <code>PI × A axis × B axis</code> — the form to use when B axis and A axis are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Length, Area and Width can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Width and Area is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Length, Radius and Area are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Width left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Width is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Area left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Area is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Width is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Grass seed form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Width</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. It feeds Length and Area. Fill it from a measurement rather than a memory — Width is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Area</strong> is a square meters quantity: the page opens it in m2 and converts anything else you pick before the formula runs. It feeds Length, Width and Seeds. Fill it from a measurement rather than a memory — Area is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Width and Area ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Width — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Length in m against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Length is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover meters, square meters and kilograms per thousand square meters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Width and Area and the number you are missing is Length and Radius.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/femur-to-foot-ratio">Femur to Foot Ratio Calculator</a>, <a href="/biology/fertilizer">Fertilizer Calculator</a> and <a href="/biology/fertilizer-injector-ratio">Fertilizer Injector Ratio Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Grass seed is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>A criterion for choosing between these pages: Grass seed answers a different question from the one above, even where the two share a sentence of explanation.</p><p>The nearest are <a href="/biology/femur-to-foot-ratio">Femur to Foot Ratio Calculator</a>, <a href="/biology/fertilizer">Fertilizer Calculator</a> and <a href="/biology/fertilizer-injector-ratio">Fertilizer Injector Ratio Calculator</a>. Each takes its own inputs and reports its own answer, and none of them shares a stored value with this page — open two in separate tabs and they will not interfere.</p><p>If the value you need is not the one reported here but a step before or after it, one of those pages probably reports it directly rather than making you convert by hand.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Grass seed is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Width and Area beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Grass seed calculator work out?', 'a' => 'Length, Radius, Area and A axis, from Area and Width. The relationship is Length = Area ÷ Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Width (meters), Area (square meters). With width and area in place, Length can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Length, Area, Width and Area can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Length is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Width blank and the page solves for it, reporting Length instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Length at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/femur-to-foot-ratio', 'name' => 'Femur to Foot Ratio Calculator'],
            ['path' => '/biology/fertilizer', 'name' => 'Fertilizer Calculator'],
            ['path' => '/biology/fertilizer-injector-ratio', 'name' => 'Fertilizer Injector Ratio Calculator'],
        ],
        'authors' => [],
    ],
];
