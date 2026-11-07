<?php

/**
 * Vine Density Calculator
 * /biology/vine-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vine Density Calculator',
    'meta' => ['title' => 'Vine Density Calculator — Formula & Results', 'description' => 'Vine Density turns Row spacing, Vine spacing and Target yield into Vines per hectare and Vines per 100 m of row. It is a single relationship that reads Vines…', 'h1' => 'Vine Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'row_spacing',
                            'label' => 'Row spacing',
                            'type' => 'number',
                            'suffix' => 'm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.5',
                        ],
                        [
                            'name' => 'vine_spacing',
                            'label' => 'Vine spacing',
                            'type' => 'number',
                            'suffix' => 'm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.2',
                        ],
                        [
                            'name' => 'yield_tha',
                            'label' => 'Target yield',
                            'type' => 'number',
                            'suffix' => 't/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'bunches',
                            'label' => 'Bunches per vine',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '24',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Vines per hectare',
                            'type' => 'number',
                            'suffix' => 'vines/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_row',
                            'label' => 'Vines per 100 m of row',
                            'type' => 'number',
                            'suffix' => 'vines',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kg_vine',
                            'label' => 'Yield per vine',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'g_bunch',
                            'label' => 'Grams per bunch',
                            'type' => 'number',
                            'suffix' => 'g',
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
            'title' => 'Vines',
            'results' => ['density' => '10000/(row_spacing*vine_spacing)', 'per_row' => '100/vine_spacing', 'kg_vine' => 'yield_tha*1000/(10000/(row_spacing*vine_spacing))', 'g_bunch' => 'yield_tha*1000/(10000/(row_spacing*vine_spacing))/bunches*1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Vine Density turns Row spacing, Vine spacing and Target yield into Vines per hectare and Vines per 100 m of row. It is a single relationship that reads Vines per hectare out of Row spacing, not a table of canned results keyed by them. Units for Vines per hectare default to vines/ha and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Vine Density calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Vine Density: it takes 4 numbers and reports Vines per hectare, Vines per 100 m of row and Yield per vine.</p><p>The relationship it solves reads Vines per hectare = 10000 ÷ (Row spacing × Vine spacing).</p><p>The result panel carries Vines per hectare, Vines per 100 m of row, Yield per vine and Grams per bunch, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Row spacing</strong> — in m</li><li><strong>Vine spacing</strong> — in m</li><li><strong>Target yield</strong> — in t/ha</li><li><strong>Bunches per vine</strong> — a plain number, no unit</li></ul><p>The result boxes are Vines per hectare in vines/ha, Vines per 100 m of row in vines, Yield per vine in kg, Grams per bunch in g; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Row spacing = 2.5 m, Vine spacing = 1.2 m, Target yield = 8 t/ha and Bunches per vine = 24 gives &lt;strong&gt;Vines per hectare&lt;/strong&gt; = 3333 vines/ha, &lt;strong&gt;Vines per 100 m of row&lt;/strong&gt; = 83.33 vines, &lt;strong&gt;Yield per vine&lt;/strong&gt; = 2.4 kg and &lt;strong&gt;Grams per bunch&lt;/strong&gt; = 100 g.</p><ul><li><strong>Vines per hectare</strong> = 3333 vines/ha</li><li><strong>Vines per 100 m of row</strong> = 83.33 vines</li><li><strong>Yield per vine</strong> = 2.4 kg</li><li><strong>Grams per bunch</strong> = 100 g</li></ul><p>The line behind those figures is <strong>Vines per hectare</strong> = <code>10000 ÷ (Row spacing × Vine spacing)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Vines per hectare&lt;/strong&gt; = 3333, &lt;strong&gt;Vines per 100 m of row&lt;/strong&gt; = 83.33, &lt;strong&gt;Yield per vine&lt;/strong&gt; = 2.4 and &lt;strong&gt;Grams per bunch&lt;/strong&gt; = 100 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Vines per hectare takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Vines per hectare</strong> = <code>10000 ÷ (Row spacing × Vine spacing)</code></li><li><strong>Vines per 100 m of row</strong> = <code>100 ÷ Vine spacing</code></li><li><strong>Yield per vine</strong> = <code>Target yield × 1000 ÷ (10000 ÷ (Row spacing × Vine spacing))</code></li><li><strong>Grams per bunch</strong> = <code>Target yield × 1000 ÷ (10000 ÷ (Row spacing × Vine spacing)) ÷ Bunches per vine × 1000</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Vines per hectare</strong> = <code>10000 ÷ (Row spacing × Vine spacing)</code> — the form to use when Row spacing and Vine spacing are the values you have.</li><li><strong>Vines per 100 m of row</strong> = <code>100 ÷ Vine spacing</code> — the form to use when Vine spacing are the values you have.</li><li><strong>Yield per vine</strong> = <code>Target yield × 1000 ÷ (10000 ÷ (Row spacing × Vine spacing))</code> — the form to use when Target yield, Row spacing and Vine spacing are the values you have.</li><li><strong>Grams per bunch</strong> = <code>Target yield × 1000 ÷ (10000 ÷ (Row spacing × Vine spacing)) ÷ Bunches per vine × 1000</code> — the form to use when Target yield, Row spacing, Vine spacing and Bunches per vine are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Vines per hectare, Vines per 100 m of row and Yield per vine can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Row spacing from 2.5 to 5, leaving every other box alone. The panel moves from &lt;strong&gt;Vines per hectare&lt;/strong&gt; 3333 vines/ha, &lt;strong&gt;Vines per 100 m of row&lt;/strong&gt; 83.33 vines, &lt;strong&gt;Yield per vine&lt;/strong&gt; 2.4 kg and &lt;strong&gt;Grams per bunch&lt;/strong&gt; 100 g to &lt;strong&gt;Vines per hectare&lt;/strong&gt; 1667 vines/ha, &lt;strong&gt;Vines per 100 m of row&lt;/strong&gt; 83.33 vines, &lt;strong&gt;Yield per vine&lt;/strong&gt; 4.8 kg and &lt;strong&gt;Grams per bunch&lt;/strong&gt; 200 g.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Vines per hectare, Vines per 100 m of row and Yield per vine are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Row spacing left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Row spacing is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Vine spacing left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Vine spacing is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Target yield left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Target yield is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Row spacing is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Vine Density form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Row spacing</strong> is measured in m. The page reads it when it works out Vines per hectare, Yield per vine and Grams per bunch. Fill it from a measurement rather than a memory — Row spacing is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Vine spacing</strong> is measured in m. The page reads it when it works out Vines per hectare, Vines per 100 m of row and Yield per vine. Fill it from a measurement rather than a memory — Vine spacing is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Target yield</strong> is measured in t/ha. The page reads it when it works out Yield per vine and Grams per bunch. Fill it from a measurement rather than a memory — Target yield is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Bunches per vine</strong> takes a plain number with no unit attached. The page reads it when it works out Grams per bunch. Fill it from a measurement rather than a memory — Bunches per vine is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Vines per hectare</strong> is a plain number and the page's own defaults put it at 3333. The value follows from Row spacing and Vine spacing. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Vines per 100 m of row</strong> is a plain number and the page's own defaults put it at 83.33. The value follows from Vine spacing. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Yield per vine</strong> is a plain number and the page's own defaults put it at 2.4. The value follows from Target yield, Row spacing and Vine spacing. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Grams per bunch</strong> is a plain number and the page's own defaults put it at 100. The value follows from Target yield, Row spacing, Vine spacing and Bunches per vine. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Vines per hectare</th><th>Vines per 100 m of row</th><th>Yield per vine</th><th>Grams per bunch</th></tr></thead><tbody><tr><td><strong>Row spacing</strong> +10%</td><td>-9.09%</td><td>+0%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Vine spacing</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Target yield</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Bunches per vine</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Vine spacing sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Row spacing = 1.25 m, Vine spacing = 0.6 m, Target yield = 4 t/ha and Bunches per vine = 12 and the page reports <strong>Vines per hectare</strong> = 13333 vines/ha, <strong>Vines per 100 m of row</strong> = 167 vines, <strong>Yield per vine</strong> = 0.3 kg and <strong>Grams per bunch</strong> = 25 g.</li><li>Feed in Row spacing = 7.5 m, Vine spacing = 1.2 m, Target yield = 8 t/ha and Bunches per vine = 24 and the page reports <strong>Vines per hectare</strong> = 1111 vines/ha, <strong>Vines per 100 m of row</strong> = 83.33 vines, <strong>Yield per vine</strong> = 7.2 kg and <strong>Grams per bunch</strong> = 300 g.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Vines per hectare follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Row spacing, Vine spacing and Target yield are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Row spacing, Vine spacing and Target yield is what you already know and Vines per hectare and Vines per 100 m of row is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/hunting-tooth-ratio">Hunting Tooth Ratio Calculator</a>, <a href="/biology/ideal-fish-tank-size">Ideal Fish Tank Size Calculator</a> and <a href="/biology/in-vivo-formulation">In Vivo Formulation Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Vine Density calculator work out?', 'a' => <<<'TXT'
            Vines per hectare, Vines per 100 m of row, Yield per vine and Grams per bunch, from Row spacing and Vine spacing. The relationship is Vines per hectare = 10000 ÷ (Row spacing × Vine spacing).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Row spacing (m), Vine spacing (m), Target yield (t/ha), Bunches per vine. Fill row_spacing, vine_spacing and yield_tha and leave Vines per hectare empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Vines per hectare, Vines per 100 m of row, Yield per vine and Grams per bunch can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Vines per hectare = 3333 vines/ha, Vines per 100 m of row = 83.33 vines, Yield per vine = 2.4 kg and Grams per bunch = 100 g. Those are the defaults written into the form — move Row spacing and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Vines per hectare is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Row spacing blank and the page solves for it, reporting Vines per hectare instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Vines per hectare keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/hunting-tooth-ratio', 'name' => 'Hunting Tooth Ratio Calculator'],
            ['path' => '/biology/ideal-fish-tank-size', 'name' => 'Ideal Fish Tank Size Calculator'],
            ['path' => '/biology/in-vivo-formulation', 'name' => 'In Vivo Formulation Calculator'],
        ],
        'authors' => [],
    ],
];
