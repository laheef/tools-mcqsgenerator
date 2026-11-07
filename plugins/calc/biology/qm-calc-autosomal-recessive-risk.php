<?php

/**
 * Autosomal Recessive Inheritance Risk
 * /biology/autosomal-recessive-risk
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Autosomal Recessive Inheritance Risk',
    'meta' => ['title' => 'Autosomal Recessive Inheritance Risk Calculator', 'description' => 'Autosomal Recessive Inheritance Risk works out Chance of an affected child and Chance of a carrier child from Parent 1 genotype, Parent 2 genotype and…', 'h1' => 'Autosomal Recessive Inheritance Risk', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'parent1',
                            'label' => 'Parent 1 genotype',
                            'type' => 'select',
                            'options' => ['AA — non-carrier' => '0', 'Aa — carrier' => '0.5', 'aa — affected' => '1'],
                            'default' => 'Aa — carrier',
                        ],
                        [
                            'name' => 'parent2',
                            'label' => 'Parent 2 genotype',
                            'type' => 'select',
                            'options' => ['AA — non-carrier' => '0', 'Aa — carrier' => '0.5', 'aa — affected' => '1'],
                            'default' => 'Aa — carrier',
                        ],
                        [
                            'name' => 'carrier_freq',
                            'label' => 'Population carrier frequency',
                            'type' => 'number',
                            'help' => 'Optional — 2pq from Hardy–Weinberg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.04',
                        ],
                        [
                            'name' => 'affected',
                            'label' => 'Chance of an affected child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'carrier_child',
                            'label' => 'Chance of a carrier child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'unaffected',
                            'label' => 'Chance of an unaffected child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'population_risk',
                            'label' => 'Population risk from carrier frequency',
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
            'title' => 'Risk',
            'results' => ['affected' => 'parent1*parent2*100', 'carrier_child' => '(parent1*(1-parent2)+(1-parent1)*parent2)*100', 'unaffected' => '(1-parent1)*(1-parent2)*100', 'population_risk' => 'pow(carrier_freq,2)*0.25*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Autosomal Recessive Inheritance Risk works out Chance of an affected child and Chance of a carrier child from Parent 1 genotype, Parent 2 genotype and Population carrier frequency. It is a single relationship that reads Chance of an affected child out of Parent 1 genotype, not a table of canned results keyed by them. Units for Chance of an affected child default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Autosomal Recessive Inheritance Risk calculator works', 'html' => <<<'TXT'
            <p>The Autosomal Recessive Inheritance Risk calculator applies one relationship to 3 numbers and reports Chance of an affected child, Chance of a carrier child and Chance of an unaffected child.</p><p>Written with the labels from the form, Chance of an affected child = Parent 1 genotype × Parent 2 genotype × 100.</p><p>What comes back is Chance of an affected child, Chance of a carrier child, Chance of an unaffected child and Population risk from carrier frequency — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Parent 1 genotype</strong> — a plain number, no unit</li><li><strong>Parent 2 genotype</strong> — a plain number, no unit</li><li><strong>Population carrier frequency</strong> — a plain number, no unit. Optional — 2pq from Hardy–Weinberg</li></ul><p>What you get back is Chance of an affected child in %, Chance of a carrier child in %, Chance of an unaffected child in %, Population risk from carrier frequency in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Parent 1 genotype = 0.5, Parent 2 genotype = 0.5 and Population carrier frequency = 0.04; the answers are &lt;strong&gt;Chance of an affected child&lt;/strong&gt; = 25 %, &lt;strong&gt;Chance of a carrier child&lt;/strong&gt; = 50 %, &lt;strong&gt;Chance of an unaffected child&lt;/strong&gt; = 25 % and &lt;strong&gt;Population risk from carrier frequency&lt;/strong&gt; = 0.04 %.</p><ul><li><strong>Chance of an affected child</strong> = 25 %</li><li><strong>Chance of a carrier child</strong> = 50 %</li><li><strong>Chance of an unaffected child</strong> = 25 %</li><li><strong>Population risk from carrier frequency</strong> = 0.04 %</li></ul><p>The line behind those figures is <strong>Chance of an affected child</strong> = <code>Parent 1 genotype × Parent 2 genotype × 100</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Chance of an affected child&lt;/strong&gt; = 25, &lt;strong&gt;Chance of a carrier child&lt;/strong&gt; = 50, &lt;strong&gt;Chance of an unaffected child&lt;/strong&gt; = 25 and &lt;strong&gt;Population risk from carrier frequency&lt;/strong&gt; = 0.04. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Chance of an affected child is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Chance of an affected child</strong> = <code>Parent 1 genotype × Parent 2 genotype × 100</code></li><li><strong>Chance of a carrier child</strong> = <code>(Parent 1 genotype × (1 − Parent 2 genotype) + (1 − Parent 1 genotype) × Parent 2 genotype) × 100</code></li><li><strong>Chance of an unaffected child</strong> = <code>(1 − Parent 1 genotype) × (1 − Parent 2 genotype) × 100</code></li><li><strong>Population risk from carrier frequency</strong> = <code>(Population carrier frequency)^(2) × 0.25 × 100</code></li></ul><p>Any one of Chance of an affected child, Chance of a carrier child and Chance of an unaffected child can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Parent 1 genotype from 0.5 to 1, leaving every other box alone. The panel moves from &lt;strong&gt;Chance of an affected child&lt;/strong&gt; 25 %, &lt;strong&gt;Chance of a carrier child&lt;/strong&gt; 50 %, &lt;strong&gt;Chance of an unaffected child&lt;/strong&gt; 25 % and &lt;strong&gt;Population risk from carrier frequency&lt;/strong&gt; 0.04 % to &lt;strong&gt;Chance of an affected child&lt;/strong&gt; 50 %, &lt;strong&gt;Chance of a carrier child&lt;/strong&gt; 50 %, &lt;strong&gt;Chance of an unaffected child&lt;/strong&gt; 0 % and &lt;strong&gt;Population risk from carrier frequency&lt;/strong&gt; 0.04 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Chance of an affected child, Chance of a carrier child and Chance of an unaffected child are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Parent 1 genotype is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Parent 1 genotype, Parent 2 genotype and Population carrier frequency is what you already know and Chance of an affected child and Chance of a carrier child is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/transpiration-rate">Transpiration Rate Calculator</a>, <a href="/biology/tree-age">Tree age</a> and <a href="/biology/tree-diameter">Tree diameter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Autosomal Recessive Inheritance Risk calculator work out?', 'a' => <<<'TXT'
            Chance of an affected child, Chance of a carrier child, Chance of an unaffected child and Population risk from carrier frequency, from Parent 1 genotype and Parent 2 genotype. The relationship is Chance of an affected child = Parent 1 genotype × Parent 2 genotype × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Parent 1 genotype, Parent 2 genotype, Population carrier frequency. Enter parent1, parent2 and carrier_freq; Chance of an affected child is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Chance of an affected child, Chance of a carrier child, Chance of an unaffected child and Population risk from carrier frequency blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Chance of an affected child = 25 %, Chance of a carrier child = 50 %, Chance of an unaffected child = 25 % and Population risk from carrier frequency = 0.04 %. That comes from the page's own defaults, entered in Parent 1 genotype; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Chance of an affected child is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Parent 1 genotype left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Chance of an affected child at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/transpiration-rate', 'name' => 'Transpiration Rate Calculator'],
            ['path' => '/biology/tree-age', 'name' => 'Tree age'],
            ['path' => '/biology/tree-diameter', 'name' => 'Tree diameter Calculator'],
        ],
        'authors' => [],
    ],
];
