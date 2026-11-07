<?php

/**
 * Recombination to Centimorgans
 * /biology/genetic-linkage-distance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Recombination to Centimorgans',
    'meta' => ['title' => 'Recombination to Centimorgans — Formula & Results', 'description' => 'Enter Recombinant offspring, Total offspring and Use Kosambi (interference) into Recombination to Centimorgans and the answer comes back as Recombination…', 'h1' => 'Recombination to Centimorgans', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'recombinants',
                            'label' => 'Recombinant offspring',
                            'type' => 'number',
                            'help' => 'From a test cross',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '35',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total offspring',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'use_kosambi',
                            'label' => 'Use Kosambi (interference)',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'help' => 'Untick for Haldane, which assumes crossovers are independent',
                            'default' => 'No',
                        ],
                        [
                            'name' => 'rf',
                            'label' => 'Recombination fraction',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'haldane',
                            'label' => 'Haldane distance',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kosambi',
                            'label' => 'Kosambi distance',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'corrected',
                            'label' => 'Corrected distance (chosen function)',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gap',
                            'label' => 'Distance added by the map correction',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'help' => 'Corrected minus raw RF distance',
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
            'title' => 'Distance',
            'results' => [
                'rf' => 'if_else(recombinants/total<0.49,recombinants/total,0.49)',
                'haldane' => '-0.5*log(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))*100',
                'kosambi' => '0.25*log((1+2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))/(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49))))*100',
                'corrected' => <<<'TXT'
                if_else(use_kosambi>0.5,0.25*log((1+2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))/(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49))))*100,-0.5*log(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))*100)
                TXT,
                'gap' => <<<'TXT'
                if_else(use_kosambi>0.5,0.25*log((1+2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))/(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49))))*100,-0.5*log(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))*100)-if_else(recombinants/total<0.49,recombinants/total,0.49)*100
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Recombinant offspring, Total offspring and Use Kosambi (interference) into Recombination to Centimorgans and the answer comes back as Recombination fraction and Haldane distance. There is no hidden constant here: change Recombination fraction and Recombinant offspring moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Recombination to Centimorgans calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Recombination to Centimorgans: it takes 3 numbers and reports Recombination fraction, Haldane distance and Kosambi distance.</p><p>Written with the labels from the form, Recombination fraction = if_else(Recombinant offspring ÷ Total offspring&lt;0.49,Recombinant offspring ÷ Total offspring,0.49).</p><p>What comes back is Recombination fraction, Haldane distance, Kosambi distance and Corrected distance (chosen function) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Recombinant offspring</strong> — a plain number, no unit. From a test cross</li><li><strong>Total offspring</strong> — a plain number, no unit</li><li><strong>Use Kosambi (interference)</strong> — a plain number, no unit. Untick for Haldane, which assumes crossovers are independent</li></ul><p>The answers come back as Recombination fraction, Haldane distance in cM, Kosambi distance in cM, Corrected distance (chosen function) in cM, Distance added by the map correction in cM. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Recombinant offspring = 35, Total offspring = 200 and Use Kosambi (interference) = 0 gives &lt;strong&gt;Recombination fraction&lt;/strong&gt; = 0.175, &lt;strong&gt;Haldane distance&lt;/strong&gt; = 21.54 cM, &lt;strong&gt;Kosambi distance&lt;/strong&gt; = 18.27 cM, &lt;strong&gt;Corrected distance (chosen function)&lt;/strong&gt; = 21.54 cM and &lt;strong&gt;Distance added by the map correction&lt;/strong&gt; = 4.04 cM.</p><ul><li><strong>Recombination fraction</strong> = 0.175</li><li><strong>Haldane distance</strong> = 21.54 cM</li><li><strong>Kosambi distance</strong> = 18.27 cM</li><li><strong>Corrected distance (chosen function)</strong> = 21.54 cM</li><li><strong>Distance added by the map correction</strong> = 4.04 cM</li></ul><p>That is <strong>Recombination fraction</strong> = <code>if_else(Recombinant offspring ÷ Total offspring&lt;0.49,Recombinant offspring ÷ Total offspring,0.49)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Recombination fraction&lt;/strong&gt; = 0.175, &lt;strong&gt;Haldane distance&lt;/strong&gt; = 21.54, &lt;strong&gt;Kosambi distance&lt;/strong&gt; = 18.27, &lt;strong&gt;Corrected distance (chosen function)&lt;/strong&gt; = 21.54 and &lt;strong&gt;Distance added by the map correction&lt;/strong&gt; = 4.04. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Recombination fraction is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Recombination fraction</strong> = <code>if_else(Recombinant offspring ÷ Total offspring&lt;0.49,Recombinant offspring ÷ Total offspring,0.49)</code></li><li><strong>Haldane distance</strong> = <code>− 0.5 × ln(1 − 2 × (if_else(Recombinant offspring ÷ Total offspring&lt;0.49,Recombinant offspring ÷ Total offspring,0.49))) × 100</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Recombination fraction, Haldane distance and Kosambi distance can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Recombinant offspring from 35 to 70, leaving every other box alone. The panel moves from &lt;strong&gt;Recombination fraction&lt;/strong&gt; 0.175, &lt;strong&gt;Haldane distance&lt;/strong&gt; 21.54 cM, &lt;strong&gt;Kosambi distance&lt;/strong&gt; 18.27 cM, &lt;strong&gt;Corrected distance (chosen function)&lt;/strong&gt; 21.54 cM and &lt;strong&gt;Distance added by the map correction&lt;/strong&gt; 4.04 cM to &lt;strong&gt;Recombination fraction&lt;/strong&gt; 0.35, &lt;strong&gt;Haldane distance&lt;/strong&gt; 60.2 cM, &lt;strong&gt;Kosambi distance&lt;/strong&gt; 43.37 cM, &lt;strong&gt;Corrected distance (chosen function)&lt;/strong&gt; 60.2 cM and &lt;strong&gt;Distance added by the map correction&lt;/strong&gt; 25.2 cM.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Recombination fraction, Haldane distance and Kosambi distance are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Recombinant offspring is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Recombinant offspring, Total offspring and Use Kosambi (interference) measured, Recombination fraction and Haldane distance wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/allele-frequency">Allele frequency Calculator</a>, <a href="/biology/allometric-equation">Allometric Equation Calculator</a> and <a href="/biology/amino-acid-composition">Amino Acid Composition Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Recombination to Centimorgans calculator work out?', 'a' => <<<'TXT'
            Recombination fraction, Haldane distance, Kosambi distance and Corrected distance (chosen function), from Recombinant offspring and Total offspring. The relationship is Recombination fraction = if_else(Recombinant offspring ÷ Total offspring<0.49,Recombinant offspring ÷ Total offspring,0.49).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Recombinant offspring, Total offspring, Use Kosambi (interference). Enter recombinants, total and use_kosambi; Recombination fraction is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Recombination fraction, Haldane distance, Kosambi distance and Corrected distance (chosen function) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Recombination fraction = 0.175, Haldane distance = 21.54 cM, Kosambi distance = 18.27 cM, Corrected distance (chosen function) = 21.54 cM and Distance added by the map correction = 4.04 cM. Those are the defaults written into the form — move Recombinant offspring and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Recombination fraction is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Recombinant offspring blank and the page solves for it, reporting Recombination fraction instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Recombination fraction keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/allele-frequency', 'name' => 'Allele frequency Calculator'],
            ['path' => '/biology/allometric-equation', 'name' => 'Allometric Equation Calculator'],
            ['path' => '/biology/amino-acid-composition', 'name' => 'Amino Acid Composition Calculator'],
        ],
        'authors' => [],
    ],
];
