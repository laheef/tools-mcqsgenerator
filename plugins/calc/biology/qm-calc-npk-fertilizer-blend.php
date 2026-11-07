<?php

/**
 * NPK Fertilizer Blend Calculator
 * /biology/npk-fertilizer-blend
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'NPK Fertilizer Blend Calculator',
    'meta' => ['title' => 'NPK Fertilizer Blend Calculator — Formula & Results', 'description' => <<<'TXT'
    Enter Nitrogen required, Phosphate required (P₂O₅) and Potash required (K₂O) into NPK Fertilizer Blend and the answer comes back as Product to apply (limited…
    TXT, 'h1' => 'NPK Fertilizer Blend Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'n_need',
                            'label' => 'Nitrogen required',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'p_need',
                            'label' => 'Phosphate required (P₂O₅)',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'k_need',
                            'label' => 'Potash required (K₂O)',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'n_pct',
                            'label' => 'N in the product',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'p_pct',
                            'label' => 'P₂O₅ in the product',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'k_pct',
                            'label' => 'K₂O in the product',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Product to apply (limited by N)',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rate_p',
                            'label' => 'Product limited by P',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rate_k',
                            'label' => 'Product limited by K',
                            'type' => 'number',
                            'suffix' => 'kg/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bag',
                            'label' => 'Bags of 50 kg per hectare',
                            'type' => 'number',
                            'suffix' => 'bags',
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
            'title' => 'Blend',
            'results' => ['rate' => 'n_need/n_pct*100', 'rate_p' => 'p_need/p_pct*100', 'rate_k' => 'k_need/k_pct*100', 'bag' => 'n_need/n_pct*100/50'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Nitrogen required, Phosphate required (P₂O₅) and Potash required (K₂O) into NPK Fertilizer Blend and the answer comes back as Product to apply (limited by N) and Product limited by P. The arithmetic is the whole method: Product to apply (limited by N) is worked out from Nitrogen required by one formula, applied once. Product to apply (limited by N) comes back in kg/ha unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the NPK Fertilizer Blend calculator works', 'html' => <<<'TXT'
            <p>The NPK Fertilizer Blend calculator applies one relationship to 6 numbers and reports Product to apply (limited by N), Product limited by P and Product limited by K.</p><p>The relationship it solves reads Product to apply (limited by N) = Nitrogen required ÷ N in the product × 100.</p><p>The result panel carries Product to apply (limited by N), Product limited by P, Product limited by K and Bags of 50 kg per hectare, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 6 boxes, and nothing else.</p><ul><li><strong>Nitrogen required</strong> — in kg/ha</li><li><strong>Phosphate required (P₂O₅)</strong> — in kg/ha</li><li><strong>Potash required (K₂O)</strong> — in kg/ha</li><li><strong>N in the product</strong> — in %</li><li><strong>P₂O₅ in the product</strong> — in %</li><li><strong>K₂O in the product</strong> — in %</li></ul><p>The result boxes are Product to apply (limited by N) in kg/ha, Product limited by P in kg/ha, Product limited by K in kg/ha, Bags of 50 kg per hectare in bags; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Nitrogen required = 120 kg/ha, Phosphate required (P₂O₅) = 60 kg/ha, Potash required (K₂O) = 60 kg/ha, N in the product = 20 %, P₂O₅ in the product = 10 % and K₂O in the product = 10 % — through the same formula and the panel reports &lt;strong&gt;Product to apply (limited by N)&lt;/strong&gt; = 600 kg/ha, &lt;strong&gt;Product limited by P&lt;/strong&gt; = 600 kg/ha, &lt;strong&gt;Product limited by K&lt;/strong&gt; = 600 kg/ha and &lt;strong&gt;Bags of 50 kg per hectare&lt;/strong&gt; = 12 bags.</p><ul><li><strong>Product to apply (limited by N)</strong> = 600 kg/ha</li><li><strong>Product limited by P</strong> = 600 kg/ha</li><li><strong>Product limited by K</strong> = 600 kg/ha</li><li><strong>Bags of 50 kg per hectare</strong> = 12 bags</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Product to apply (limited by N)</strong> = <code>Nitrogen required ÷ N in the product × 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Product to apply (limited by N)&lt;/strong&gt; = 600, &lt;strong&gt;Product limited by P&lt;/strong&gt; = 600, &lt;strong&gt;Product limited by K&lt;/strong&gt; = 600 and &lt;strong&gt;Bags of 50 kg per hectare&lt;/strong&gt; = 12. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Product to apply (limited by N) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Product to apply (limited by N)</strong> = <code>Nitrogen required ÷ N in the product × 100</code></li><li><strong>Product limited by P</strong> = <code>Phosphate required (P₂O₅) ÷ P₂O₅ in the product × 100</code></li><li><strong>Product limited by K</strong> = <code>Potash required (K₂O) ÷ K₂O in the product × 100</code></li><li><strong>Bags of 50 kg per hectare</strong> = <code>Nitrogen required ÷ N in the product × 100 ÷ 50</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Product to apply (limited by N)</strong> = <code>Nitrogen required ÷ N in the product × 100</code> — the form to use when Nitrogen required and N in the product are the values you have.</li><li><strong>Product limited by P</strong> = <code>Phosphate required (P₂O₅) ÷ P₂O₅ in the product × 100</code> — the form to use when Phosphate required (P₂O₅) and P₂O₅ in the product are the values you have.</li><li><strong>Product limited by K</strong> = <code>Potash required (K₂O) ÷ K₂O in the product × 100</code> — the form to use when Potash required (K₂O) and K₂O in the product are the values you have.</li><li><strong>Bags of 50 kg per hectare</strong> = <code>Nitrogen required ÷ N in the product × 100 ÷ 50</code> — the form to use when Nitrogen required and N in the product are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Product to apply (limited by N), Product limited by P and Product limited by K can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Nitrogen required, from 120 to 240 — and the answers go from &lt;strong&gt;Product to apply (limited by N)&lt;/strong&gt; 600 kg/ha, &lt;strong&gt;Product limited by P&lt;/strong&gt; 600 kg/ha, &lt;strong&gt;Product limited by K&lt;/strong&gt; 600 kg/ha and &lt;strong&gt;Bags of 50 kg per hectare&lt;/strong&gt; 12 bags to &lt;strong&gt;Product to apply (limited by N)&lt;/strong&gt; 1200 kg/ha, &lt;strong&gt;Product limited by P&lt;/strong&gt; 600 kg/ha, &lt;strong&gt;Product limited by K&lt;/strong&gt; 600 kg/ha and &lt;strong&gt;Bags of 50 kg per hectare&lt;/strong&gt; 24 bags.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Product to apply (limited by N), Product limited by P and Product limited by K are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Nitrogen required left as a guess.</strong> Anything typed into Nitrogen required is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Phosphate required (P₂O₅) left as a guess.</strong> Anything typed into Phosphate required (P₂O₅) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Potash required (K₂O) left as a guess.</strong> Anything typed into Potash required (K₂O) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Nitrogen required and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Nitrogen required</strong> is measured in kg/ha. The page reads it when it works out Product to apply (limited by N) and Bags of 50 kg per hectare. Have it to hand before you start: Nitrogen required is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Phosphate required (P₂O₅)</strong> is measured in kg/ha. The page reads it when it works out Product limited by P. Have it to hand before you start: Phosphate required (P₂O₅) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Potash required (K₂O)</strong> is measured in kg/ha. The page reads it when it works out Product limited by K. Have it to hand before you start: Potash required (K₂O) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>N in the product</strong> is measured in %. The page reads it when it works out Product to apply (limited by N) and Bags of 50 kg per hectare. Have it to hand before you start: N in the product is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>P₂O₅ in the product</strong> is measured in %. The page reads it when it works out Product limited by P. Have it to hand before you start: P₂O₅ in the product is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>K₂O in the product</strong> is measured in %. The page reads it when it works out Product limited by K. Have it to hand before you start: K₂O in the product is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Product to apply (limited by N) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Nitrogen required, Phosphate required (P₂O₅) and Potash required (K₂O) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Nitrogen required, Phosphate required (P₂O₅) and Potash required (K₂O) is what you already know and Product to apply (limited by N) and Product limited by P is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/tree-height">Tree height</a>, <a href="/biology/tree-spacing">Tree spacing</a> and <a href="/biology/tree-value">Tree value Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the NPK Fertilizer Blend calculator work out?', 'a' => <<<'TXT'
            Product to apply (limited by N), Product limited by P, Product limited by K and Bags of 50 kg per hectare, from Nitrogen required and N in the product. The relationship is Product to apply (limited by N) = Nitrogen required ÷ N in the product × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Nitrogen required (kg/ha), Phosphate required (P₂O₅) (kg/ha), Potash required (K₂O) (kg/ha), N in the product (%), P₂O₅ in the product (%). Enter n_need, p_need and k_need; Product to apply (limited by N) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Product to apply (limited by N), Product limited by P, Product limited by K and Bags of 50 kg per hectare can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Product to apply (limited by N) = 600 kg/ha, Product limited by P = 600 kg/ha, Product limited by K = 600 kg/ha and Bags of 50 kg per hectare = 12 bags. That comes from the page's own defaults, entered in Nitrogen required; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Product to apply (limited by N) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Nitrogen required left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Product to apply (limited by N) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/tree-height', 'name' => 'Tree height'],
            ['path' => '/biology/tree-spacing', 'name' => 'Tree spacing'],
            ['path' => '/biology/tree-value', 'name' => 'Tree value Calculator'],
        ],
        'authors' => [],
    ],
];
