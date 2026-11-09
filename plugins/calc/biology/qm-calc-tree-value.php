<?php

/**
 * Tree value
 * /biology/tree-value
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tree value',
    'meta' => ['title' => 'Tree value Calculator: Formula, Steps & Example', 'description' => 'Enter tree type and circumference and get tree value back. Every figure is computed. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Tree value Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'treeType',
                            'label' => 'Tree type',
                            'type' => 'select',
                            'options' => [
                                'Beech' => '1.06',
                                'Black Cherry' => '2.3',
                                'Black Ebony' => '55.75',
                                'Black Locust' => '1.75',
                                'Black Walnut' => '3.85',
                                'Chestnut' => '3.08',
                                'Douglas Fir' => '1.05',
                                'Elm' => '1.35',
                                'Eucalyptus' => '2.1',
                                'Fruit Wood' => '18.12',
                                'Poplar' => '0.35',
                                'Loblolly Pine' => '0.55',
                                'Mahogany' => '15.16',
                                'Paper Birch' => '0.65',
                                'Paulownia' => '1.85',
                                'Red Oak' => '2.15',
                                'Rosewood' => '11.12',
                                'Maple' => '2.44',
                                'Teak' => '8.88',
                                'Cedar' => '3.15',
                                'White Ash' => '2.58',
                                'White Oak' => '3.53',
                                'White Pine' => '1.85',
                                'Yellow Birch' => '3.18',
                            ],
                            'dataset' => 'treeTypeDS',
                            'control' => 'DROPDOWN',
                            'default' => 'Beech',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'circumference',
                            'label' => 'Circumference',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'height',
                            'label' => 'Height',
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
                            'name' => 'treeValue',
                            'label' => 'Tree value',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'treeValue = treeType * circumference * height ',
            'results' => ['treeValue' => 'circumference*height*treeType', 'treeType' => 'treeValue/(circumference*height)', 'circumference' => 'treeValue/(height*treeType)', 'height' => 'treeValue/(circumference*treeType)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Tree type, Circumference and Height into Tree value and the answer comes back as Tree value. It is a single relationship that reads tree value out of tree type, not a table of canned results keyed by them. Units for Tree value default to $ and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Tree value calculator works', 'html' => <<<'TXT'
            <p>Tree value answers one question from 3 numbers, and the answer is Tree value.</p><p>The relationship it solves reads Tree value = Circumference × Height × Tree type.</p><p>The answers are Tree value; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Tree type</strong> — a plain number, no unit</li><li><strong>Circumference</strong> — in centimeters</li><li><strong>Height</strong> — in meters</li></ul><p>The answer comes back as Tree value in $. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Tree type = 1.06, Circumference = 10 cm and Height = 100 m gives <strong>Tree value</strong> = 1060 $.</p><ul><li><strong>Tree value</strong> = 1060 $</li></ul><p>The line behind those figures is <strong>Tree value</strong> = <code>Circumference × Height × Tree type</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Tree value</strong> = 1060. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Circumference lists 7 options and opens on centimeters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Tree value</strong> = <code>Circumference × Height × Tree type</code></li><li><strong>Tree type</strong> = <code>Tree value ÷ (Circumference × Height)</code></li><li><strong>Circumference</strong> = <code>Tree value ÷ (Height × Tree type)</code></li><li><strong>Height</strong> = <code>Tree value ÷ (Circumference × Tree type)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Tree value</strong> = <code>Circumference × Height × Tree type</code> — the form to use when Circumference, Height and Tree type are the values you have.</li><li><strong>Tree type</strong> = <code>Tree value ÷ (Circumference × Height)</code> — the form to use when Tree value, Circumference and Height are the values you have.</li><li><strong>Circumference</strong> = <code>Tree value ÷ (Height × Tree type)</code> — the form to use when Tree value, Height and Tree type are the values you have.</li><li><strong>Height</strong> = <code>Tree value ÷ (Circumference × Tree type)</code> — the form to use when Tree value, Circumference and Tree type are the values you have.</li></ul><p>Any one of Tree value, Tree type and Circumference can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Tree type from 1.06 to 2.12, leaving every other box alone. The panel moves from <strong>Tree value</strong> 1060 $ to <strong>Tree value</strong> 2120 $.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Circumference and Height carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Tree value is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Tree type left as a guess.</strong> Anything typed into Tree type is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Circumference left as a guess.</strong> Anything typed into Circumference is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Tree type is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Tree value form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Tree type</strong> takes a plain number with no unit attached. Change it and Tree value, Circumference and Height changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Tree type is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Circumference</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Change it and Tree value, Tree type and Height changes with it. Fill it from a measurement rather than a memory — Circumference is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Height</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Tree value, Tree type and Circumference changes with it. Fill it from a measurement rather than a memory — Height is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Tree value</strong> is a plain number and the page's own defaults put it at 1060. It is worked out from Circumference, Height and Tree type. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Tree value</th></tr></thead><tbody><tr><td><strong>Tree type</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Circumference</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Height</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Tree type: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Tree type = 0.53, Circumference = 5 cm and Height = 50 m and the page reports <strong>Tree value</strong> = 133 $.</li><li>Feed in Tree type = 3.18, Circumference = 10 cm and Height = 100 m and the page reports <strong>Tree value</strong> = 3180 $.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Tree value actually offers.</p><ul><li><strong>centimeters</strong> — opens in <em>cm</em>, and the chip also carries cm, m, in, ft, yd and μm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Tree type, Circumference and Height ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Tree type — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Tree value in $ against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Tree value is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover centimeters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Tree type, Circumference and Height measured, Tree value wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Tree value calculator work out?', 'a' => 'Tree value, from Circumference, Height and Tree type. The relationship is Tree value = Circumference × Height × Tree type.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Tree type, Circumference (centimeters), Height (meters). With tree type, circumference and height in place, Tree value can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Tree value, Tree type, Circumference and Height blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Tree value = 1060 $. The figures come from Tree type as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Tree value is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Tree type blank and the page solves for it, reporting Tree value instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Tree value at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/dna-pattern-finder', 'name' => 'DNA Pattern Finder Calculator'],
            ['path' => '/biology/dna-percentage', 'name' => 'DNA Percentage Calculator'],
            ['path' => '/biology/sequence-shuffler', 'name' => 'DNA Sequence Shuffler Calculator'],
        ],
        'authors' => [],
    ],
];
