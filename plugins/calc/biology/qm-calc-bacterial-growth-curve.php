<?php

/**
 * Bacterial Growth Curve Calculator (generation time)
 * /biology/bacterial-growth-curve
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bacterial Growth Curve Calculator (generation time)',
    'meta' => ['title' => 'Bacterial Growth Curve (generation time) Calculator', 'description' => 'Bacterial Growth Curve Calculator (generation time) turns First OD600, Second OD600 and First reading time into Specific growth rate and Doubling time.', 'h1' => 'Bacterial Growth Curve Calculator (generation time)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'od1',
                            'label' => 'First OD600',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.1',
                        ],
                        [
                            'name' => 'od2',
                            'label' => 'Second OD600',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.8',
                        ],
                        [
                            'name' => 't1',
                            'label' => 'First reading time',
                            'type' => 'number',
                            'suffix' => 'h',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 't2',
                            'label' => 'Second reading time',
                            'type' => 'number',
                            'suffix' => 'h',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'mu',
                            'label' => 'Specific growth rate',
                            'type' => 'number',
                            'suffix' => 'h⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'doubling',
                            'label' => 'Doubling time',
                            'type' => 'number',
                            'suffix' => 'min',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'generations',
                            'label' => 'Generations elapsed',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fold',
                            'label' => 'Fold increase',
                            'type' => 'number',
                            'suffix' => '×',
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
            'title' => 'Growth',
            'results' => ['mu' => '(log(od2)-log(od1))/(t2-t1)', 'doubling' => '0.6931471805599453/((log(od2)-log(od1))/(t2-t1))*60', 'generations' => '(log(od2)-log(od1))/0.6931471805599453', 'fold' => 'od2/od1'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Bacterial Growth Curve Calculator (generation time) turns First OD600, Second OD600 and First reading time into Specific growth rate and Doubling time. Nothing is looked up on this page: Specific growth rate is computed from First OD600 and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Specific growth rate is opened in h⁻¹; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Bacterial Growth Curve Calculator (generation time) calculator works', 'html' => <<<'TXT'
            <p>Bacterial Growth Curve Calculator (generation time) answers one question from 4 numbers, and the answer is Specific growth rate, Doubling time and Generations elapsed.</p><p>The relationship it solves reads Specific growth rate = (ln(Second OD600) − ln(First OD600)) ÷ (Second reading time − First reading time).</p><p>The answers are Specific growth rate, Doubling time, Generations elapsed and Fold increase; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>First OD600</strong> — a plain number, no unit</li><li><strong>Second OD600</strong> — a plain number, no unit</li><li><strong>First reading time</strong> — in h</li><li><strong>Second reading time</strong> — in h</li></ul><p>The result boxes are Specific growth rate in h⁻¹, Doubling time in min, Generations elapsed, Fold increase in ×; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, First OD600 = 0.1, Second OD600 = 0.8, First reading time = 5 h and Second reading time = 4 h gives &lt;strong&gt;Specific growth rate&lt;/strong&gt; = -2.08 h⁻¹, &lt;strong&gt;Doubling time&lt;/strong&gt; = -20 min, &lt;strong&gt;Generations elapsed&lt;/strong&gt; = 3 and &lt;strong&gt;Fold increase&lt;/strong&gt; = 8 ×.</p><ul><li><strong>Specific growth rate</strong> = -2.08 h⁻¹</li><li><strong>Doubling time</strong> = -20 min</li><li><strong>Generations elapsed</strong> = 3</li><li><strong>Fold increase</strong> = 8 ×</li></ul><p>The line behind those figures is <strong>Specific growth rate</strong> = <code>(ln(Second OD600) − ln(First OD600)) ÷ (Second reading time − First reading time)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Specific growth rate&lt;/strong&gt; = -2.08, &lt;strong&gt;Doubling time&lt;/strong&gt; = -20, &lt;strong&gt;Generations elapsed&lt;/strong&gt; = 3 and &lt;strong&gt;Fold increase&lt;/strong&gt; = 8 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Specific growth rate takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Specific growth rate</strong> = <code>(ln(Second OD600) − ln(First OD600)) ÷ (Second reading time − First reading time)</code></li><li><strong>Doubling time</strong> = <code>0.6931471805599453 ÷ ((ln(Second OD600) − ln(First OD600)) ÷ (Second reading time − First reading time)) × 60</code></li><li><strong>Generations elapsed</strong> = <code>(ln(Second OD600) − ln(First OD600)) ÷ 0.6931471805599453</code></li><li><strong>Fold increase</strong> = <code>Second OD600 ÷ First OD600</code></li></ul><p>Any one of Specific growth rate, Doubling time and Generations elapsed can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — First OD600, from 0.1 to 0.2 — and the answers go from &lt;strong&gt;Specific growth rate&lt;/strong&gt; -2.08 h⁻¹, &lt;strong&gt;Doubling time&lt;/strong&gt; -20 min, &lt;strong&gt;Generations elapsed&lt;/strong&gt; 3 and &lt;strong&gt;Fold increase&lt;/strong&gt; 8 × to &lt;strong&gt;Specific growth rate&lt;/strong&gt; -1.39 h⁻¹, &lt;strong&gt;Doubling time&lt;/strong&gt; -30 min, &lt;strong&gt;Generations elapsed&lt;/strong&gt; 2 and &lt;strong&gt;Fold increase&lt;/strong&gt; 4 ×.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Specific growth rate, Doubling time and Generations elapsed are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If First OD600 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: First OD600, Second OD600 and First reading time measured, Specific growth rate and Doubling time wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/tree-diameter">Tree diameter Calculator</a>, <a href="/biology/tree-height">Tree height</a> and <a href="/biology/tree-spacing">Tree spacing</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bacterial Growth Curve Calculator (generation time) calculator work out?', 'a' => <<<'TXT'
            Specific growth rate, Doubling time, Generations elapsed and Fold increase, from Second OD600, First OD600, Second reading time and First reading time. The relationship is Specific growth rate = (ln(Second OD600) − ln(First OD600)) ÷ (Second reading time − First reading time).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            First OD600, Second OD600, First reading time (h), Second reading time (h). With od1, od2 and t1 in place, Specific growth rate can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Specific growth rate, Doubling time, Generations elapsed and Fold increase blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Specific growth rate = -2.08 h⁻¹, Doubling time = -20 min, Generations elapsed = 3 and Fold increase = 8 ×. That comes from the page's own defaults, entered in First OD600; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Specific growth rate is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With First OD600 left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Specific growth rate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/tree-diameter', 'name' => 'Tree diameter Calculator'],
            ['path' => '/biology/tree-height', 'name' => 'Tree height'],
            ['path' => '/biology/tree-spacing', 'name' => 'Tree spacing'],
        ],
        'authors' => [],
    ],
];
