<?php

/**
 * Bulb spacing
 * /biology/bulb-spacing
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bulb spacing',
    'meta' => ['title' => 'Bulb spacing Calculator: Units and Formulas', 'description' => 'Bulb spacing turns plant grid, length and width into area and number of plants. Enter plant grid and length; the answer follows without a table lookup.', 'h1' => 'Bulb spacing Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plant_grid',
                            'label' => 'Plant grid',
                            'type' => 'select',
                            'options' => ['Rectangular' => '1', 'Triangle' => '2'],
                            'dataset' => 'plant_grid',
                            'control' => 'DROPDOWN',
                            'default' => 'Rectangular',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'plants-spacing-rectangles.png'],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'm',
                            'rounding' => ['omni', '0.0001'],
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
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'border',
                            'label' => 'Border',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Plant information',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plant_select',
                            'label' => 'Plant select',
                            'type' => 'select',
                            'options' => [
                                'Allium' => '1',
                                'Anemones' => '2',
                                'Bluebells' => '3',
                                'Crocus' => '4',
                                'Cyclamen' => '5',
                                'Daffodil' => '6',
                                'Dwarf Daffodil' => '7',
                                'Fritillaria' => '8',
                                'Hyacinths' => '9',
                                'Iris Reticulata' => '10',
                                'Muscari' => '11',
                                'Snowdrops' => '12',
                                'Tulips' => '13',
                                'Custom plant' => '14',
                            ],
                            'dataset' => 'plant_spacing',
                            'control' => 'DROPDOWN',
                            'default' => 'Allium',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plant_spacing',
                            'label' => 'Plant spacing (s)',
                            'type' => 'result',
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
                            'name' => 'row_spacing',
                            'label' => 'Row spacing (r)',
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
                            'name' => 'triangle_plants',
                            'label' => 'Number of plants',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plants',
                            'label' => 'Number of plants',
                            'type' => 'number',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'plant_select == 1', 'text' => <<<'TXT'
                                Allium Type: Perennial Height: 30-90 cm (12-36 in) Width: 8-10 cm (3-4 in) Spacing: 10 cm (4 in) Plant in: Mid-summer to early autumn Flowers in: Spring or early autumn Plant likes: Full sun, semi-shade, and moist soil
                                TXT],
                                ['when' => 'plant_select == 2', 'text' => <<<'TXT'
                                Anemone (Wildflowers) Type: Perennial Height: 30-100 cm (12-39 in) Width: 15-23 cm (6-9 in) Spacing: 5-8 cm (2-3 in) Plant in: Spring or early autumn, depending on species Flowers in: Spring or Sept, depending on species Plant likes: Full sun, semi-shade, and shade
                                TXT],
                                ['when' => 'plant_select == 3', 'text' => <<<'TXT'
                                Bluebells Type: Perennial Height: 50 cm (20 in) Width: 10 cm (4 in) Spacing: 5-8 cm (2-3 in) Plant in: Sep-Oct Flowers in: Apr-May Plant likes: Semi-shade and shade
                                TXT],
                                ['when' => 'plant_select == 4', 'text' => <<<'TXT'
                                Crocus Type: Perennial Height: 10-40 cm (4-16 in) Width: 5 cm (2 in) Spacing: 8-10 cm (3-4 in) Plant in: Aug-Nov Flowers in: Feb-Apr Plant likes: Full sun, semi-shade, and moist soil
                                TXT],
                                ['when' => 'plant_select == 5', 'text' => <<<'TXT'
                                Cyclamen Type: Perennial Height: 5-13 cm (2-5 in) Width: 8-15 cm (3-6 in) Spacing: 3 cm (1 in) Plant in: Spring and from Autumn until the first frost Flowers in: Oct-Nov Plant likes: Semi-shade and shade
                                TXT],
                                ['when' => 'plant_select == 6', 'text' => <<<'TXT'
                                Daffodil (Narcissus) Type: Perennial Height: 40-45 cm (16-18 in) Width: 5-8 cm (2-3 in) Spacing: 10-20 cm (4-8 in) Plant in: Autumn Flowers in: Feb-May Plant likes: Full sun, semi-shade, and moist soil
                                TXT],
                                ['when' => 'plant_select == 7', 'text' => <<<'TXT'
                                Dwarf Daffodil (Narcissus) Type: Perennial Height: 5–8 cm (2-3 in) Width: 5-8 cm (2-3 in) Spacing: 10-15 cm (4-6 in) Plant in: Autumn Flowers in: Feb-May Plant likes: Full sun, semi-shade, and moist soil
                                TXT],
                                ['when' => 'plant_select == 8', 'text' => <<<'TXT'
                                Fritillaria Type: Perennial Height: 30-150 cm (12-60 in) Width: 10-50 cm (4-20 in) Spacing: 10-15 cm (4-6 in) Plant in: Sep-Oct Flowers in: Apr-May Plant likes: Semi-shade, shade, and moist soil
                                TXT],
                                ['when' => 'plant_select == 9', 'text' => <<<'TXT'
                                Hyacinths Type: Perennial Height: 20-30 cm (8-12 in) Width: 10 cm (4 in) Spacing: 10 cm (4 in) Plant in: Sep-Nov Flowers in: Dec-Apr Plant likes: Full sun, semi-shade, and moist soil
                                TXT],
                                ['when' => 'plant_select == 10', 'text' => <<<'TXT'
                                Iris Type: Perennial Height: 15-50 cm (6-20 in) Width: 8-10 cm (3-4 in) Spacing: 5-10 cm (2-4 in) Plant in: Autumn Flowers in: Apr-Jun Plant likes: Full sun, semi-shade, and moist soil
                                TXT],
                                ['when' => 'plant_select == 11', 'text' => <<<'TXT'
                                Muscari (Grape hyacinth) Type: Perennial Height: 20 cm (8 in) Width: 5 cm (2 in) Spacing: 10 cm (4 in) Plant in: Sep-Nov Flowers in: Apr-May Plant likes: Full sun and semi-shade
                                TXT],
                                ['when' => 'plant_select == 12', 'text' => <<<'TXT'
                                Snowdrops Type: Perennial Height: 15-30 cm (6-12 in) Width: 20 cm (8 in) Spacing: 8-10 cm (3-4 in) Plant in: Apr-May Flowers in: Jan-Mar Plant likes: Semi-shade, shade, and moist soil
                                TXT],
                                ['when' => 'plant_select == 13', 'text' => <<<'TXT'
                                Tulips Type: Perennial Height: 25-60 cm (10-24 in) Width: 15 cm (6 in) Spacing: 10-15 cm (4-6 in) Plant in: Oct-Nov Flowers in: Mar-May Plant likes: Full sun, semi-shade, and moist soil
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'triangle_rows',
                            'label' => 'Triangle rows',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'triangle_row_spacing',
                            'label' => 'Triangle row spacing',
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
                            'name' => 'even_row_plants',
                            'label' => 'Even row plants',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'odd_row_plants',
                            'label' => 'Odd row plants',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rows',
                            'label' => 'Rows',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plants_per_row',
                            'label' => 'Plants per row',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'area = length * width',
            'results' => ['length' => 'area/width', 'area' => 'length*width', 'width' => 'area/length'],
        ],
        [
            'title' => 'triangle_rows = floor((width - border*2)/(plant_spacing*0.866) + 1)',
            'results' => ['triangle_rows' => 'floor((500/433)*(-2*border + width)/plant_spacing) + 1'],
        ],
        [
            'title' => 'triangle_row_spacing = one_way(plant_spacing* 0.866)',
            'results' => ['triangle_row_spacing' => '((433/500)*plant_spacing)'],
        ],
        [
            'title' => 'odd_row_plants = floor((length - border*2)/plant_spacing+ 1)',
            'results' => ['odd_row_plants' => 'floor((-2*border + length)/plant_spacing) + 1'],
        ],
        [
            'title' => 'even_row_plants = floor((length - border*2 - 0.5*plant_spacing)/plant_spacing+ 1)',
            'results' => ['even_row_plants' => 'floor((1/2)*(-4*border + 2*length - plant_spacing)/plant_spacing) + 1'],
        ],
        [
            'title' => 'triangle_plants = one_way(floor(triangle_rows/2) * even_row_plants + ceil(triangle_rows/2) * odd_row_plants)',
            'results' => ['triangle_plants' => <<<'TXT'
            ((floor((-2*border + length)/plant_spacing) + 1)*ceil((1/2)*floor((500/433)*(-2*border + width)/plant_spacing) + 1/2) + (floor((1/2)*(-4*border + 2*length - plant_spacing)/plant_spacing) + 1)*floor((1/2)*floor((500/433)*(-2*border + width)/plant_spacing) + 1/2))
            TXT],
        ],
        [
            'title' => 'rows = floor((width - border*2)/row_spacing+1)',
            'results' => ['rows' => 'floor((-2*border + width)/row_spacing) + 1'],
        ],
        [
            'title' => 'plants_per_row = floor((length - border*2)/plant_spacing+1)',
            'results' => ['plants_per_row' => 'floor((-2*border + length)/plant_spacing) + 1'],
        ],
        [
            'title' => 'plants = one_way(rows * plants_per_row)',
            'results' => ['plants' => '((floor((-2*border + length)/plant_spacing) + 1)*(floor((-2*border + width)/row_spacing) + 1))'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Bulb spacing works out Plant spacing (s) from Plant grid, Length and Width. Nothing is looked up on this page: plant spacing (s) is computed from plant grid and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Plant spacing (s) is opened in centimeters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Bulb spacing calculator works', 'html' => <<<'TXT'
            <p>Bulb spacing answers one question from 9 numbers, and the answer is Plant spacing (s).</p><p>The relationship it solves reads Area = Length × Width.</p><p>The answers are Plant spacing (s); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 9 boxes and the page has everything it needs.</p><ul><li><strong>Plant grid</strong> — a plain number, no unit</li><li><strong>Length</strong> — in meters</li><li><strong>Width</strong> — in meters</li><li><strong>Border</strong> — in meters</li><li><strong>Area</strong> — in square meters</li><li><strong>Plant select</strong> — a plain number, no unit</li><li><strong>Row spacing (r)</strong> — in centimeters</li><li><strong>Number of plants</strong> — a plain number, no unit</li><li><strong>Number of plants</strong> — a plain number, no unit</li></ul><p>The answer comes back as Plant spacing (s) in centimeters. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Plant grid = 1, Border = 3 m, Plant select = 1 and Row spacing (r) = 4 cm — through the same formula and the panel reports <strong>Triangle row spacing</strong> = 0.</p><ul><li><strong>Triangle row spacing</strong> = 0</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Area</strong> = <code>Length × Width</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Triangle row spacing</strong> = 0. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Plant spacing (s) lists 7 options and opens on centimeters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Area</strong> = <code>Length × Width</code></li><li><strong>Length</strong> = <code>Area ÷ Width</code></li><li><strong>Width</strong> = <code>Area ÷ Length</code></li><li><strong>Triangle rows</strong> = <code>floor((500 ÷ 433) × ( − 2 × Border + Width) ÷ Plant spacing (s)) + 1</code></li><li><strong>Triangle row spacing</strong> = <code>((433 ÷ 500) × Plant spacing (s))</code></li><li><strong>Odd row plants</strong> = <code>floor(( − 2 × Border + Length) ÷ Plant spacing (s)) + 1</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Area</strong> = <code>Length × Width</code> — the form to use when Length and Width are the values you have.</li><li><strong>Length</strong> = <code>Area ÷ Width</code> — the form to use when Area and Width are the values you have.</li><li><strong>Width</strong> = <code>Area ÷ Length</code> — the form to use when Length and Area are the values you have.</li><li><strong>Triangle rows</strong> = <code>floor((500 ÷ 433) × ( − 2 × Border + Width) ÷ Plant spacing (s)) + 1</code> — the form to use when Border, Plant spacing (s) and Width are the values you have.</li><li><strong>Triangle row spacing</strong> = <code>((433 ÷ 500) × Plant spacing (s))</code> — the form to use when Plant spacing (s) are the values you have.</li><li><strong>Odd row plants</strong> = <code>floor(( − 2 × Border + Length) ÷ Plant spacing (s)) + 1</code> — the form to use when Border, Length and Plant spacing (s) are the values you have.</li><li><strong>Even row plants</strong> = <code>floor((1 ÷ 2) × ( − 4 × Border + 2 × Length − Plant spacing (s)) ÷ Plant spacing (s)) + 1</code> — the form to use when Border, Length and Plant spacing (s) are the values you have.</li><li><strong>Rows</strong> = <code>floor(( − 2 × Border + Width) ÷ Row spacing (r)) + 1</code> — the form to use when Border, Row spacing (r) and Width are the values you have.</li></ul><p>Any one of Area, Length and Width can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Plant grid, from 1 to 2 — and the answers go from <strong>Triangle row spacing</strong> 0 to <strong>Triangle row spacing</strong> 0.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Length, Width and Border carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Plant spacing (s) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Plant grid left as a guess.</strong> Anything typed into Plant grid is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Length left as a guess.</strong> Anything typed into Length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Plant grid to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Plant grid</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Plant grid is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Length</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Area, Width and Odd row plants changes with it. Have it to hand before you start: Length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Width</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Length, Area and Triangle rows changes with it. Have it to hand before you start: Width is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Border</strong> is a meters quantity: the page opens it in m and converts anything else you pick before the formula runs. Change it and Triangle rows, Odd row plants and Even row plants changes with it. Have it to hand before you start: Border is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Area</strong> is a square meters quantity: the page opens it in m2 and converts anything else you pick before the formula runs. Change it and Length and Width changes with it. Have it to hand before you start: Area is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Plant select</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Plant select is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Row spacing (r)</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Change it and Rows and Number of plants changes with it. Have it to hand before you start: Row spacing (r) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of plants</strong> takes a plain number with no unit attached. Have it to hand before you start: Number of plants is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Number of plants</strong> takes a plain number with no unit attached. Have it to hand before you start: Number of plants is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Plant spacing (s)</strong> is a centimeters figure. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Triangle row spacing</th></tr></thead><tbody><tr><td><strong>Plant grid</strong> +10%</td><td>—</td></tr><tr><td><strong>Border</strong> +10%</td><td>—</td></tr><tr><td><strong>Plant select</strong> +10%</td><td>—</td></tr><tr><td><strong>Row spacing (r)</strong> +10%</td><td>—</td></tr></tbody></table><p>The steepest column belongs to Plant grid: ten per cent there moves an answer by about 0 per cent, which is why that is the number to measure twice. By contrast, Plant grid, Border and Plant select barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Plant grid = 0.5, Border = 1.5 m, Plant select = 0.5 and Row spacing (r) = 2 cm, the answer is <strong>Triangle row spacing</strong> = 0.</li><li>With Plant grid = 3, Border = 3 m, Plant select = 1 and Row spacing (r) = 4 cm, the answer is <strong>Triangle row spacing</strong> = 0.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>centimeters</strong> — opens in <em>cm</em>, and the chip also carries cm, m, in, ft, yd and μm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>square meters</strong> — opens in <em>m2</em>, and the chip also carries m², in², ft², yd², ac and ha. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Plant spacing (s) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are centimeters and square meters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Plant grid, Length and Width are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Plant grid, Length and Width is what you already know and Plant spacing (s) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/amino-acid-composition">Amino Acid Composition Calculator</a>, <a href="/biology/animal-mortality-rate">Animal mortality rate</a> and <a href="/biology/annealing-temperature">Annealing temperature Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bulb spacing calculator work out?', 'a' => 'Plant spacing (s), from Length and Width. The relationship is Area = Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Plant grid, Length (meters), Width (meters), Border (meters), Area (square meters). Fill plant grid, length and width and leave Plant spacing (s) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Area, Length, Width and Triangle rows blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Triangle row spacing = 0. The figures come from Plant grid as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Plant spacing (s) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Plant grid left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Plant spacing (s) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/amino-acid-composition', 'name' => 'Amino Acid Composition Calculator'],
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature Calculator'],
        ],
    ],
];
