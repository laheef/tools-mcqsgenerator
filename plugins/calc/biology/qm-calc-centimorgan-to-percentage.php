<?php

/**
 * Centimorgan to Percentage Calculator
 * /biology/centimorgan-to-percentage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Centimorgan to Percentage Calculator',
    'meta' => ['title' => 'Centimorgan to Percentage Calculator — Biology', 'description' => 'Enter Map distance into Centimorgan to Percentage and the answer comes back as Recombination frequency (simple) and Recombination frequency (Haldane).', 'h1' => 'Centimorgan to Percentage Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'cm',
                            'label' => 'Map distance',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'rf_simple',
                            'label' => 'Recombination frequency (simple)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rf_haldane',
                            'label' => 'Recombination frequency (Haldane)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rf_kosambi',
                            'label' => 'Recombination frequency (Kosambi)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cm_from_rf',
                            'label' => 'cM for 10% recombination',
                            'type' => 'number',
                            'suffix' => 'cM',
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
            'title' => 'Map distance',
            'results' => ['rf_simple' => 'cm', 'rf_haldane' => '0.5*(1-exp(-2*cm/100))*100', 'rf_kosambi' => '0.5*(exp(4*cm/100)-1)/(exp(4*cm/100)+1)*100', 'cm_from_rf' => '0.25*log((1+0.2)/(1-0.2))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Map distance into Centimorgan to Percentage and the answer comes back as Recombination frequency (simple) and Recombination frequency (Haldane). The arithmetic is the whole method: Recombination frequency (simple) is worked out from Map distance by one formula, applied once. Recombination frequency (simple) comes back in % unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Centimorgan to Percentage calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Centimorgan to Percentage: it takes 1 number and reports Recombination frequency (simple), Recombination frequency (Haldane) and Recombination frequency (Kosambi).</p><p>Written with the labels from the form, Recombination frequency (simple) = Map distance.</p><p>The answers are Recombination frequency (simple), Recombination frequency (Haldane), Recombination frequency (Kosambi) and cM for 10% recombination; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Map distance</strong> — in cM</li></ul><p>The result boxes are Recombination frequency (simple) in %, Recombination frequency (Haldane) in %, Recombination frequency (Kosambi) in %, cM for 10% recombination in cM; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Map distance = 20 cM — through the same formula and the panel reports &lt;strong&gt;Recombination frequency (simple)&lt;/strong&gt; = 20 %, &lt;strong&gt;Recombination frequency (Haldane)&lt;/strong&gt; = 16.48 %, &lt;strong&gt;Recombination frequency (Kosambi)&lt;/strong&gt; = 19 % and &lt;strong&gt;cM for 10% recombination&lt;/strong&gt; = 0.1014 cM.</p><ul><li><strong>Recombination frequency (simple)</strong> = 20 %</li><li><strong>Recombination frequency (Haldane)</strong> = 16.48 %</li><li><strong>Recombination frequency (Kosambi)</strong> = 19 %</li><li><strong>cM for 10% recombination</strong> = 0.1014 cM</li></ul><p>The line behind those figures is <strong>Recombination frequency (simple)</strong> = <code>Map distance</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Recombination frequency (simple)&lt;/strong&gt; = 20, &lt;strong&gt;Recombination frequency (Haldane)&lt;/strong&gt; = 16.48, &lt;strong&gt;Recombination frequency (Kosambi)&lt;/strong&gt; = 19 and &lt;strong&gt;cM for 10% recombination&lt;/strong&gt; = 0.1014. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Recombination frequency (simple) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Recombination frequency (simple)</strong> = <code>Map distance</code></li><li><strong>Recombination frequency (Haldane)</strong> = <code>0.5 × (1 − e^( − 2 × Map distance ÷ 100)) × 100</code></li><li><strong>Recombination frequency (Kosambi)</strong> = <code>0.5 × (e^(4 × Map distance ÷ 100) − 1) ÷ (e^(4 × Map distance ÷ 100) + 1) × 100</code></li><li><strong>cM for 10% recombination</strong> = <code>0.25 × ln((1 + 0.2) ÷ (1 − 0.2))</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Recombination frequency (simple), Recombination frequency (Haldane) and Recombination frequency (Kosambi) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Map distance, from 20 to 40 — and the answers go from &lt;strong&gt;Recombination frequency (simple)&lt;/strong&gt; 20 %, &lt;strong&gt;Recombination frequency (Haldane)&lt;/strong&gt; 16.48 %, &lt;strong&gt;Recombination frequency (Kosambi)&lt;/strong&gt; 19 % and &lt;strong&gt;cM for 10% recombination&lt;/strong&gt; 0.1014 cM to &lt;strong&gt;Recombination frequency (simple)&lt;/strong&gt; 40 %, &lt;strong&gt;Recombination frequency (Haldane)&lt;/strong&gt; 27.53 %, &lt;strong&gt;Recombination frequency (Kosambi)&lt;/strong&gt; 33.2 % and &lt;strong&gt;cM for 10% recombination&lt;/strong&gt; 0.1014 cM.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Recombination frequency (simple), Recombination frequency (Haldane) and Recombination frequency (Kosambi) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Map distance and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Map distance is what you already know and Recombination frequency (simple) and Recombination frequency (Haldane) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/codon-adaptation-index">Codon Adaptation Index Calculator</a>, <a href="/biology/codon-plot">Codon Plot Calculator</a> and <a href="/biology/codon-usage-calculator">Codon Usage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Centimorgan to Percentage calculator work out?', 'a' => <<<'TXT'
            Recombination frequency (simple), Recombination frequency (Haldane), Recombination frequency (Kosambi) and cM for 10% recombination, from Map distance. The relationship is Recombination frequency (simple) = Map distance.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Map distance (cM). Fill cm and leave Recombination frequency (simple) empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Recombination frequency (simple), Recombination frequency (Haldane), Recombination frequency (Kosambi) and cM for 10% recombination can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Recombination frequency (simple) = 20 %, Recombination frequency (Haldane) = 16.48 %, Recombination frequency (Kosambi) = 19 % and cM for 10% recombination = 0.1014 cM. Those are the defaults written into the form — move Map distance and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Recombination frequency (simple) is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Map distance left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Recombination frequency (simple) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/codon-adaptation-index', 'name' => 'Codon Adaptation Index Calculator'],
            ['path' => '/biology/codon-plot', 'name' => 'Codon Plot Calculator'],
            ['path' => '/biology/codon-usage-calculator', 'name' => 'Codon Usage Calculator'],
        ],
        'authors' => [],
    ],
];
