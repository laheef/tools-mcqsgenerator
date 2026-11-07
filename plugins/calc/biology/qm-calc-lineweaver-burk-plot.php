<?php

/**
 * Lineweaver-Burk Plot / Km & Vmax Calculator
 * /biology/lineweaver-burk-plot
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lineweaver-Burk Plot / Km & Vmax Calculator',
    'meta' => ['title' => 'Lineweaver-Burk Plot / Km & Vmax Calculator', 'description' => <<<'TXT'
    Lineweaver-Burk Plot / Km & Vmax turns Substrate concentration 1, Initial velocity 1 and Substrate concentration 2 into Vmax and Km. A result box can be typed…
    TXT, 'h1' => 'Lineweaver-Burk Plot / Km & Vmax Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 's1',
                            'label' => 'Substrate concentration 1',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'v1',
                            'label' => 'Initial velocity 1',
                            'type' => 'number',
                            'suffix' => 'µmol/min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.35',
                        ],
                        [
                            'name' => 's2',
                            'label' => 'Substrate concentration 2',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'v2',
                            'label' => 'Initial velocity 2',
                            'type' => 'number',
                            'suffix' => 'µmol/min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.62',
                        ],
                        [
                            'name' => 'vmax',
                            'label' => 'Vmax',
                            'type' => 'number',
                            'suffix' => 'µmol/min',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'km',
                            'label' => 'Km',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kcat_km',
                            'label' => 'Vmax/Km',
                            'type' => 'number',
                            'suffix' => 'µmol/min/mM',
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
            'title' => 'Kinetics',
            'results' => ['vmax' => '1/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1))', 'km' => '(((1/v2)-(1/v1))/((1/s2)-(1/s1)))/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1))', 'kcat_km' => '1/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1))/((((1/v2)-(1/v1))/((1/s2)-(1/s1)))/((1/v1)-(((1/v2)-(1/v1))/((1/s2)-(1/s1)))*(1/s1)))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Lineweaver-Burk Plot / Km & Vmax turns Substrate concentration 1, Initial velocity 1 and Substrate concentration 2 into Vmax and Km. Nothing is looked up on this page: Vmax is computed from Substrate concentration 1 and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Vmax is opened in µmol/min; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Lineweaver-Burk Plot / Km & Vmax calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Lineweaver-Burk Plot / Km &amp; Vmax: it takes 4 numbers and reports Vmax, Km and Vmax/Km.</p><p>The relationship it solves reads Vmax = 1 ÷ ((1 ÷ Initial velocity 1) − (((1 ÷ Initial velocity 2) − (1 ÷ Initial velocity 1)) ÷ ((1 ÷ Substrate concentration 2) − (1 ÷ Substrate concentration 1))) × (1 ÷ Substrate concentration 1)).</p><p>What comes back is Vmax, Km and Vmax/Km — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Substrate concentration 1</strong> — in mM</li><li><strong>Initial velocity 1</strong> — in µmol/min</li><li><strong>Substrate concentration 2</strong> — in mM</li><li><strong>Initial velocity 2</strong> — in µmol/min</li></ul><p>What you get back is Vmax in µmol/min, Km in mM, Vmax/Km in µmol/min/mM, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Substrate concentration 1 = 0.5 mM, Initial velocity 1 = 0.35 µmol/min, Substrate concentration 2 = 2 mM and Initial velocity 2 = 0.62 µmol/min — through the same formula and the panel reports &lt;strong&gt;Vmax&lt;/strong&gt; = 0.8346 µmol/min, &lt;strong&gt;Km&lt;/strong&gt; = 0.6923 mM and &lt;strong&gt;Vmax/Km&lt;/strong&gt; = 1.21 µmol/min/mM.</p><ul><li><strong>Vmax</strong> = 0.8346 µmol/min</li><li><strong>Km</strong> = 0.6923 mM</li><li><strong>Vmax/Km</strong> = 1.21 µmol/min/mM</li></ul><p>That is <strong>Vmax</strong> = <code>1 ÷ ((1 ÷ Initial velocity 1) − (((1 ÷ Initial velocity 2) − (1 ÷ Initial velocity 1)) ÷ ((1 ÷ Substrate concentration 2) − (1 ÷ Substrate concentration 1))) × (1 ÷ Substrate concentration 1))</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Vmax&lt;/strong&gt; = 0.8346, &lt;strong&gt;Km&lt;/strong&gt; = 0.6923 and &lt;strong&gt;Vmax/Km&lt;/strong&gt; = 1.21 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Vmax takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Vmax</strong> = <code>1 ÷ ((1 ÷ Initial velocity 1) − (((1 ÷ Initial velocity 2) − (1 ÷ Initial velocity 1)) ÷ ((1 ÷ Substrate concentration 2) − (1 ÷ Substrate concentration 1))) × (1 ÷ Substrate concentration 1))</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Vmax, Km and Vmax/Km can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Substrate concentration 1, from 0.5 to 1 — and the answers go from &lt;strong&gt;Vmax&lt;/strong&gt; 0.8346 µmol/min, &lt;strong&gt;Km&lt;/strong&gt; 0.6923 mM and &lt;strong&gt;Vmax/Km&lt;/strong&gt; 1.21 µmol/min/mM to &lt;strong&gt;Vmax&lt;/strong&gt; 2.71 µmol/min, &lt;strong&gt;Km&lt;/strong&gt; 6.75 mM and &lt;strong&gt;Vmax/Km&lt;/strong&gt; 0.4019 µmol/min/mM.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Vmax, Km and Vmax/Km are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Substrate concentration 1 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Substrate concentration 1, Initial velocity 1 and Substrate concentration 2 measured, Vmax and Km wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/hardy-weinberg-recessive-homozygote">Hardy–Weinberg from the Recessive Homozygote Frequency Calcula</a>, <a href="/biology/hatch-rate">Hatch Rate Calculator</a> and <a href="/biology/height-to-finger-length">Height to Finger Length Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lineweaver-Burk Plot / Km & Vmax calculator work out?', 'a' => <<<'TXT'
            Vmax, Km and Vmax/Km, from Initial velocity 1, Initial velocity 2, Substrate concentration 2 and Substrate concentration 1. The relationship is Vmax = 1 ÷ ((1 ÷ Initial velocity 1) − (((1 ÷ Initial velocity 2) − (1 ÷ Initial velocity 1)) ÷ ((1 ÷ Substrate concentration 2) − (1 ÷ Substrate concentration 1))) × (1 ÷ Substrate concentration 1)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Substrate concentration 1 (mM), Initial velocity 1 (µmol/min), Substrate concentration 2 (mM), Initial velocity 2 (µmol/min). Enter s1, v1 and s2; Vmax is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Vmax, Km and Vmax/Km can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Vmax = 0.8346 µmol/min, Km = 0.6923 mM and Vmax/Km = 1.21 µmol/min/mM. Those are the defaults written into the form — move Substrate concentration 1 and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Vmax is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Substrate concentration 1 left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Vmax keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/hardy-weinberg-recessive-homozygote', 'name' => 'Hardy–Weinberg from the Recessive Homozygote Frequency Calcula'],
            ['path' => '/biology/hatch-rate', 'name' => 'Hatch Rate Calculator'],
            ['path' => '/biology/height-to-finger-length', 'name' => 'Height to Finger Length Calculator'],
        ],
        'authors' => [],
    ],
];
