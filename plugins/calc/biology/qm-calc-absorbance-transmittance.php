<?php

/**
 * Absorbance to Transmittance Converter
 * /biology/absorbance-transmittance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Absorbance to Transmittance Converter',
    'meta' => ['title' => 'Absorbance to Transmittance Converter Calculator', 'description' => <<<'TXT'
    Absorbance to Transmittance turns Absorbance, Extinction coefficient and Path length into Transmittance and Transmittance. A result box can be typed into, and…
    TXT, 'h1' => 'Absorbance to Transmittance Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'absorbance',
                            'label' => 'Absorbance',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'extinction',
                            'label' => 'Extinction coefficient',
                            'type' => 'number',
                            'suffix' => 'per mg/mL',
                            'help' => 'Use 1 for a plain conversion',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.0',
                        ],
                        [
                            'name' => 'path',
                            'label' => 'Path length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'transmittance',
                            'label' => 'Transmittance',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'percent',
                            'label' => 'Transmittance',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'concentration',
                            'label' => 'Concentration from Beer–Lambert',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'lost',
                            'label' => 'Fraction of light lost',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Optics',
            'results' => ['transmittance' => 'pow(10,-absorbance)', 'percent' => 'pow(10,-absorbance)*100', 'concentration' => 'absorbance/(extinction*path)', 'lost' => '(1-pow(10,-absorbance))*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Absorbance to Transmittance turns Absorbance, Extinction coefficient and Path length into Transmittance and Transmittance. Nothing is looked up on this page: Transmittance is computed from Absorbance and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Absorbance to Transmittance calculator works', 'html' => <<<'TXT'
            <p>Absorbance to Transmittance answers one question from 3 numbers, and the answer is Transmittance, Transmittance and Concentration from Beer–Lambert.</p><p>In the form&#039;s own words, Transmittance = (10)^(− Absorbance).</p><p>The result panel carries Transmittance, Transmittance, Concentration from Beer–Lambert and Fraction of light lost, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Absorbance</strong> — a plain number, no unit</li><li><strong>Extinction coefficient</strong> — in per mg/mL. Use 1 for a plain conversion</li><li><strong>Path length</strong> — in cm</li></ul><p>What you get back is Transmittance, Transmittance in %, Concentration from Beer–Lambert in mg/mL, Fraction of light lost in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Absorbance = 0.5, Extinction coefficient = 1 per mg/mL and Path length = 1 cm gives &lt;strong&gt;Transmittance&lt;/strong&gt; = 0.3162, &lt;strong&gt;Transmittance&lt;/strong&gt; = 31.62 %, &lt;strong&gt;Concentration from Beer–Lambert&lt;/strong&gt; = 0.5 mg/mL and &lt;strong&gt;Fraction of light lost&lt;/strong&gt; = 68.38 %.</p><ul><li><strong>Transmittance</strong> = 0.3162</li><li><strong>Transmittance</strong> = 31.62 %</li><li><strong>Concentration from Beer–Lambert</strong> = 0.5 mg/mL</li><li><strong>Fraction of light lost</strong> = 68.38 %</li></ul><p>The line behind those figures is <strong>Transmittance</strong> = <code>(10)^(− Absorbance)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Transmittance&lt;/strong&gt; = 0.3162, &lt;strong&gt;Transmittance&lt;/strong&gt; = 31.62, &lt;strong&gt;Concentration from Beer–Lambert&lt;/strong&gt; = 0.5 and &lt;strong&gt;Fraction of light lost&lt;/strong&gt; = 68.38 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Transmittance takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Transmittance</strong> = <code>(10)^(− Absorbance)</code></li><li><strong>Concentration from Beer–Lambert</strong> = <code>Absorbance ÷ (Extinction coefficient × Path length)</code></li><li><strong>Fraction of light lost</strong> = <code>(1 − (10)^(− Absorbance)) × 100</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Transmittance, Transmittance and Concentration from Beer–Lambert can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Absorbance, from 0.5 to 1 — and the answers go from &lt;strong&gt;Transmittance&lt;/strong&gt; 0.3162, &lt;strong&gt;Transmittance&lt;/strong&gt; 31.62 %, &lt;strong&gt;Concentration from Beer–Lambert&lt;/strong&gt; 0.5 mg/mL and &lt;strong&gt;Fraction of light lost&lt;/strong&gt; 68.38 % to &lt;strong&gt;Transmittance&lt;/strong&gt; 0.1, &lt;strong&gt;Transmittance&lt;/strong&gt; 10 %, &lt;strong&gt;Concentration from Beer–Lambert&lt;/strong&gt; 1 mg/mL and &lt;strong&gt;Fraction of light lost&lt;/strong&gt; 90 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Transmittance, Transmittance and Concentration from Beer–Lambert are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Absorbance and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Absorbance, Extinction coefficient and Path length measured, Transmittance and Transmittance wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dog-pregnancy">Dog pregnancy Calculator</a>, <a href="/biology/dog-quality-of-life">Dog quality of life</a> and <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Absorbance to Transmittance calculator work out?', 'a' => <<<'TXT'
            Transmittance, Transmittance, Concentration from Beer–Lambert and Fraction of light lost, from Absorbance. The relationship is Transmittance = (10)^(− Absorbance).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Absorbance, Extinction coefficient (per mg/mL), Path length (cm). With absorbance, extinction and path in place, Transmittance can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Transmittance, Transmittance, Concentration from Beer–Lambert and Fraction of light lost can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Transmittance = 0.3162, Transmittance = 31.62 %, Concentration from Beer–Lambert = 0.5 mg/mL and Fraction of light lost = 68.38 %. That comes from the page's own defaults, entered in Absorbance; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Transmittance is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Absorbance blank and the page solves for it, reporting Transmittance instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Transmittance keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-pregnancy', 'name' => 'Dog pregnancy Calculator'],
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
        ],
        'authors' => [],
    ],
];
