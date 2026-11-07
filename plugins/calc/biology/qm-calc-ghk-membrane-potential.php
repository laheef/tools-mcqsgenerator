<?php

/**
 * Goldman–Hodgkin–Katz Membrane Potential Calculator
 * /biology/ghk-membrane-potential
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Goldman–Hodgkin–Katz Membrane Potential Calculator',
    'meta' => ['title' => 'Goldman–Hodgkin–Katz Membrane Potential Calculator', 'description' => 'Goldman–Hodgkin–Katz Membrane Potential turns Potassium outside, Potassium inside and Sodium outside into Membrane potential and Potassium equilibrium…', 'h1' => 'Goldman–Hodgkin–Katz Membrane Potential Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'ko',
                            'label' => 'Potassium outside',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'ki',
                            'label' => 'Potassium inside',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '140',
                        ],
                        [
                            'name' => 'nao',
                            'label' => 'Sodium outside',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '145',
                        ],
                        [
                            'name' => 'nai',
                            'label' => 'Sodium inside',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'clo',
                            'label' => 'Chloride outside',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '110',
                        ],
                        [
                            'name' => 'cli',
                            'label' => 'Chloride inside',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'pk',
                            'label' => 'Potassium permeability',
                            'type' => 'number',
                            'suffix' => 'relative',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'pna',
                            'label' => 'Sodium permeability',
                            'type' => 'number',
                            'suffix' => 'relative',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.04',
                        ],
                        [
                            'name' => 'pcl',
                            'label' => 'Chloride permeability',
                            'type' => 'number',
                            'suffix' => 'relative',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.45',
                        ],
                        [
                            'name' => 'vm',
                            'label' => 'Membrane potential',
                            'type' => 'number',
                            'suffix' => 'mV',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ek',
                            'label' => 'Potassium equilibrium potential',
                            'type' => 'number',
                            'suffix' => 'mV',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ena',
                            'label' => 'Sodium equilibrium potential',
                            'type' => 'number',
                            'suffix' => 'mV',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ecl',
                            'label' => 'Chloride equilibrium potential',
                            'type' => 'number',
                            'suffix' => 'mV',
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
            'title' => 'Membrane',
            'results' => ['vm' => '61.5*log10((pk*ko+pna*nao+pcl*cli)/(pk*ki+pna*nai+pcl*clo))', 'ek' => '61.5*log10(ko/ki)', 'ena' => '61.5*log10(nao/nai)', 'ecl' => '-61.5*log10(clo/cli)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Goldman–Hodgkin–Katz Membrane Potential turns Potassium outside, Potassium inside and Sodium outside into Membrane potential and Potassium equilibrium potential. The arithmetic is the whole method: Membrane potential is worked out from Potassium outside by one formula, applied once. Membrane potential comes back in mV unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Goldman–Hodgkin–Katz Membrane Potential calculator works', 'html' => <<<'TXT'
            <p>Goldman–Hodgkin–Katz Membrane Potential answers one question from 9 numbers, and the answer is Membrane potential, Potassium equilibrium potential and Sodium equilibrium potential.</p><p>The result panel carries Membrane potential, Potassium equilibrium potential, Sodium equilibrium potential and Chloride equilibrium potential, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 9 boxes, and nothing else.</p><ul><li><strong>Potassium outside</strong> — in mM</li><li><strong>Potassium inside</strong> — in mM</li><li><strong>Sodium outside</strong> — in mM</li><li><strong>Sodium inside</strong> — in mM</li><li><strong>Chloride outside</strong> — in mM</li><li><strong>Chloride inside</strong> — in mM</li><li><strong>Potassium permeability</strong> — in relative</li><li><strong>Sodium permeability</strong> — in relative</li><li><strong>Chloride permeability</strong> — in relative</li></ul><p>The answers come back as Membrane potential in mV, Potassium equilibrium potential in mV, Sodium equilibrium potential in mV, Chloride equilibrium potential in mV. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Potassium outside = 4 mM, Potassium inside = 140 mM, Sodium outside = 145 mM, Sodium inside = 12 mM, Chloride outside = 110 mM, Chloride inside = 10 mM, Potassium permeability = 1 relative, Sodium permeability = 0.04 relative and Chloride permeability = 0.45 relative; the answers are &lt;strong&gt;Membrane potential&lt;/strong&gt; = -69.09 mV, &lt;strong&gt;Potassium equilibrium potential&lt;/strong&gt; = -94.96 mV, &lt;strong&gt;Sodium equilibrium potential&lt;/strong&gt; = 66.55 mV and &lt;strong&gt;Chloride equilibrium potential&lt;/strong&gt; = -64.05 mV.</p><ul><li><strong>Membrane potential</strong> = -69.09 mV</li><li><strong>Potassium equilibrium potential</strong> = -94.96 mV</li><li><strong>Sodium equilibrium potential</strong> = 66.55 mV</li><li><strong>Chloride equilibrium potential</strong> = -64.05 mV</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Membrane potential&lt;/strong&gt; = -69.09, &lt;strong&gt;Potassium equilibrium potential&lt;/strong&gt; = -94.96, &lt;strong&gt;Sodium equilibrium potential&lt;/strong&gt; = 66.55 and &lt;strong&gt;Chloride equilibrium potential&lt;/strong&gt; = -64.05 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Membrane potential takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Potassium equilibrium potential</strong> = <code>61.5 × log₁₀(Potassium outside ÷ Potassium inside)</code></li><li><strong>Sodium equilibrium potential</strong> = <code>61.5 × log₁₀(Sodium outside ÷ Sodium inside)</code></li><li><strong>Chloride equilibrium potential</strong> = <code>− 61.5 × log₁₀(Chloride outside ÷ Chloride inside)</code></li></ul><p>Any one of Membrane potential, Potassium equilibrium potential and Sodium equilibrium potential can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Potassium outside, from 4 to 8 — and the answers go from &lt;strong&gt;Membrane potential&lt;/strong&gt; -69.09 mV, &lt;strong&gt;Potassium equilibrium potential&lt;/strong&gt; -94.96 mV, &lt;strong&gt;Sodium equilibrium potential&lt;/strong&gt; 66.55 mV and &lt;strong&gt;Chloride equilibrium potential&lt;/strong&gt; -64.05 mV to &lt;strong&gt;Membrane potential&lt;/strong&gt; -62.5 mV, &lt;strong&gt;Potassium equilibrium potential&lt;/strong&gt; -76.45 mV, &lt;strong&gt;Sodium equilibrium potential&lt;/strong&gt; 66.55 mV and &lt;strong&gt;Chloride equilibrium potential&lt;/strong&gt; -64.05 mV.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Membrane potential, Potassium equilibrium potential and Sodium equilibrium potential are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Potassium outside and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Potassium outside, Potassium inside and Sodium outside is what you already know and Membrane potential and Potassium equilibrium potential is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/reverse-translate">Reverse Translate Calculator</a>, <a href="/biology/sds-page-gel">SDS-PAGE Gel Calculator</a> and <a href="/biology/seeding-rate">Seeding Rate and Plants per Hectare Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Goldman–Hodgkin–Katz Membrane Potential calculator work out?', 'a' => <<<'TXT'
            Membrane potential, Potassium equilibrium potential, Sodium equilibrium potential and Chloride equilibrium potential, from Potassium permeability, Potassium outside, Sodium permeability and Sodium outside.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Potassium outside (mM), Potassium inside (mM), Sodium outside (mM), Sodium inside (mM), Chloride outside (mM). Fill ko, ki and nao and leave Membrane potential empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Membrane potential, Potassium equilibrium potential, Sodium equilibrium potential and Chloride equilibrium potential blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Membrane potential = -69.09 mV, Potassium equilibrium potential = -94.96 mV, Sodium equilibrium potential = 66.55 mV and Chloride equilibrium potential = -64.05 mV. That comes from the page's own defaults, entered in Potassium outside; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Membrane potential is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Potassium outside left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Membrane potential keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/reverse-translate', 'name' => 'Reverse Translate Calculator'],
            ['path' => '/biology/sds-page-gel', 'name' => 'SDS-PAGE Gel Calculator'],
            ['path' => '/biology/seeding-rate', 'name' => 'Seeding Rate and Plants per Hectare Calculator'],
        ],
        'authors' => [],
    ],
];
