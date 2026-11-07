<?php

/**
 * Quadrat Sampling Density Calculator
 * /biology/quadrat-sampling-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Quadrat Sampling Density Calculator',
    'meta' => ['title' => 'Quadrat Sampling Density Calculator — Biology', 'description' => <<<'TXT'
    Quadrat Sampling Density turns Individuals counted, Number of quadrats and Quadrat area into Density per m² and Density per hectare. Across all quadratsNumber…
    TXT, 'h1' => 'Quadrat Sampling Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'individuals',
                            'label' => 'Individuals counted',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'help' => 'Across all quadrats',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '180',
                        ],
                        [
                            'name' => 'quadrats',
                            'label' => 'Number of quadrats',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'size',
                            'label' => 'Quadrat area',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'help' => '0.25 m² = 50 × 50 cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.25',
                        ],
                        [
                            'name' => 'site',
                            'label' => 'Site area',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Density per m²',
                            'type' => 'number',
                            'suffix' => '/m²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ha',
                            'label' => 'Density per hectare',
                            'type' => 'number',
                            'suffix' => '/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mean_quadrat',
                            'label' => 'Mean per quadrat',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Estimated population on the site',
                            'type' => 'number',
                            'suffix' => 'individuals',
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
            'title' => 'Density',
            'results' => ['mean_quadrat' => 'individuals/quadrats', 'density' => 'individuals/quadrats/size', 'per_ha' => 'individuals/quadrats/size*10000', 'total' => 'individuals/quadrats/size*site*10000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Quadrat Sampling Density turns Individuals counted, Number of quadrats and Quadrat area into Density per m² and Density per hectare. Nothing is looked up on this page: Density per m² is computed from Individuals counted and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Density per m² is opened in /m²; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Quadrat Sampling Density calculator works', 'html' => <<<'TXT'
            <p>The Quadrat Sampling Density calculator applies one relationship to 4 numbers and reports Density per m², Density per hectare and Mean per quadrat.</p><p>In the form&#039;s own words, Mean per quadrat = Individuals counted ÷ Number of quadrats.</p><p>The answers are Density per m², Density per hectare, Mean per quadrat and Estimated population on the site; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Individuals counted</strong> — in individuals. Across all quadrats</li><li><strong>Number of quadrats</strong> — a plain number, no unit</li><li><strong>Quadrat area</strong> — in m². 0.25 m² = 50 × 50 cm</li><li><strong>Site area</strong> — in ha</li></ul><p>What you get back is Density per m² in /m², Density per hectare in /ha, Mean per quadrat in individuals, Estimated population on the site in individuals, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Individuals counted = 180 individuals, Number of quadrats = 12, Quadrat area = 0.25 m² and Site area = 2 ha — through the same formula and the panel reports &lt;strong&gt;Mean per quadrat&lt;/strong&gt; = 15 individuals, &lt;strong&gt;Density per m²&lt;/strong&gt; = 60 /m², &lt;strong&gt;Density per hectare&lt;/strong&gt; = 600000 /ha and &lt;strong&gt;Estimated population on the site&lt;/strong&gt; = 1.200e+6 individuals.</p><ul><li><strong>Mean per quadrat</strong> = 15 individuals</li><li><strong>Density per m²</strong> = 60 /m²</li><li><strong>Density per hectare</strong> = 600000 /ha</li><li><strong>Estimated population on the site</strong> = 1.200e+6 individuals</li></ul><p>That is <strong>Mean per quadrat</strong> = <code>Individuals counted ÷ Number of quadrats</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Mean per quadrat&lt;/strong&gt; = 15, &lt;strong&gt;Density per m²&lt;/strong&gt; = 60, &lt;strong&gt;Density per hectare&lt;/strong&gt; = 600000 and &lt;strong&gt;Estimated population on the site&lt;/strong&gt; = 1.200e+6 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Density per m² takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mean per quadrat</strong> = <code>Individuals counted ÷ Number of quadrats</code></li><li><strong>Density per m²</strong> = <code>Individuals counted ÷ Number of quadrats ÷ Quadrat area</code></li><li><strong>Density per hectare</strong> = <code>Individuals counted ÷ Number of quadrats ÷ Quadrat area × 10000</code></li><li><strong>Estimated population on the site</strong> = <code>Individuals counted ÷ Number of quadrats ÷ Quadrat area × Site area × 10000</code></li></ul><p>Any one of Mean per quadrat, Density per m² and Density per hectare can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Individuals counted, from 180 to 360 — and the answers go from &lt;strong&gt;Mean per quadrat&lt;/strong&gt; 15 individuals, &lt;strong&gt;Density per m²&lt;/strong&gt; 60 /m², &lt;strong&gt;Density per hectare&lt;/strong&gt; 600000 /ha and &lt;strong&gt;Estimated population on the site&lt;/strong&gt; 1.200e+6 individuals to &lt;strong&gt;Mean per quadrat&lt;/strong&gt; 30 individuals, &lt;strong&gt;Density per m²&lt;/strong&gt; 120 /m², &lt;strong&gt;Density per hectare&lt;/strong&gt; 1.200e+6 /ha and &lt;strong&gt;Estimated population on the site&lt;/strong&gt; 2.400e+6 individuals.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Density per m², Density per hectare and Mean per quadrat are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Individuals counted and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Individuals counted, Number of quadrats and Quadrat area is what you already know and Density per m² and Density per hectare is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/protein-molar-conversions">Protein Molar Conversions Calculator</a>, <a href="/biology/protein-molecular-weight">Protein molecular weight Calculator</a> and <a href="/biology/punnett-square">Punnett square Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Quadrat Sampling Density calculator work out?', 'a' => <<<'TXT'
            Density per m², Density per hectare, Mean per quadrat and Estimated population on the site, from Individuals counted and Number of quadrats. The relationship is Mean per quadrat = Individuals counted ÷ Number of quadrats.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Individuals counted (individuals), Number of quadrats, Quadrat area (m²), Site area (ha). Enter individuals, quadrats and size; Density per m² is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mean per quadrat, Density per m², Density per hectare and Estimated population on the site blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Mean per quadrat = 15 individuals, Density per m² = 60 /m², Density per hectare = 600000 /ha and Estimated population on the site = 1.200e+6 individuals. Those are the defaults written into the form — move Individuals counted and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Density per m² is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Individuals counted blank and the page solves for it, reporting Density per m² instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Density per m² keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/protein-molar-conversions', 'name' => 'Protein Molar Conversions Calculator'],
            ['path' => '/biology/protein-molecular-weight', 'name' => 'Protein molecular weight Calculator'],
            ['path' => '/biology/punnett-square', 'name' => 'Punnett square Calculator'],
        ],
        'authors' => [],
    ],
];
