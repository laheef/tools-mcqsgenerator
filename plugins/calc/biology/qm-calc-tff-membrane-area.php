<?php

/**
 * TFF Membrane Area and Flux Calculator
 * /biology/tff-membrane-area
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'TFF Membrane Area and Flux Calculator',
    'meta' => ['title' => 'TFF Membrane Area and Flux Calculator — Biology', 'description' => 'Enter Batch volume, Permeate flux and Concentration factor into TFF Membrane Area and Flux and the answer comes back as Membrane area required and Cassettes…', 'h1' => 'TFF Membrane Area and Flux Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'volume',
                            'label' => 'Batch volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'flux',
                            'label' => 'Permeate flux',
                            'type' => 'number',
                            'suffix' => 'L/m²/h',
                            'help' => '30–100 for a typical mAb step',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'concentration',
                            'label' => 'Concentration factor',
                            'type' => 'number',
                            'suffix' => 'x',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'diavolumes',
                            'label' => 'Diafiltration volumes',
                            'type' => 'number',
                            'suffix' => 'DV',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'cassette',
                            'label' => 'Area per cassette',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.5',
                        ],
                        [
                            'name' => 'load',
                            'label' => 'Maximum load per m²',
                            'type' => 'number',
                            'suffix' => 'L/m²',
                            'help' => 'Process-specific',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'area',
                            'label' => 'Membrane area required',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cassettes',
                            'label' => 'Cassettes to install',
                            'type' => 'number',
                            'suffix' => 'cassettes',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'df_volume',
                            'label' => 'Diafiltration buffer needed',
                            'type' => 'number',
                            'suffix' => 'L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'time',
                            'label' => 'Estimated step time',
                            'type' => 'number',
                            'suffix' => 'h',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'load_area',
                            'label' => 'Area set by the load limit',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'binding',
                            'label' => 'Which limit sets the area (1 = flux, 2 = load)',
                            'type' => 'number',
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
            'title' => 'Sizing',
            'results' => [
                'area' => 'max(volume/load,volume/flux)',
                'cassettes' => 'ceil(max(volume/load,volume/flux)/cassette)',
                'df_volume' => 'volume/concentration*diavolumes',
                'time' => '(volume/area+volume/concentration*diavolumes/area)/flux+0.5',
                'load_area' => 'volume/load',
                'binding' => 'if_else(volume/load>volume/flux,2,1)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Batch volume, Permeate flux and Concentration factor into TFF Membrane Area and Flux and the answer comes back as Membrane area required and Cassettes to install. The arithmetic is the whole method: Membrane area required is worked out from Batch volume by one formula, applied once. Membrane area required comes back in m² unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the TFF Membrane Area and Flux calculator works', 'html' => <<<'TXT'
            <p>The TFF Membrane Area and Flux calculator applies one relationship to 6 numbers and reports Membrane area required, Cassettes to install and Diafiltration buffer needed.</p><p>In the form&#039;s own words, Membrane area required = max(Batch volume ÷ Maximum load per m²,Batch volume ÷ Permeate flux).</p><p>The result panel carries Membrane area required, Cassettes to install, Diafiltration buffer needed and Estimated step time, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 6 boxes, and nothing else.</p><ul><li><strong>Batch volume</strong> — in L</li><li><strong>Permeate flux</strong> — in L/m²/h. 30–100 for a typical mAb step</li><li><strong>Concentration factor</strong> — in x</li><li><strong>Diafiltration volumes</strong> — in DV</li><li><strong>Area per cassette</strong> — in m²</li><li><strong>Maximum load per m²</strong> — in L/m². Process-specific</li></ul><p>What you get back is Membrane area required in m², Cassettes to install in cassettes, Diafiltration buffer needed in L, Estimated step time in h, Area set by the load limit in m², Which limit sets the area (1 = flux, 2 = load), shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Batch volume = 500 L, Permeate flux = 60 L/m²/h, Concentration factor = 8 x, Diafiltration volumes = 5 DV, Area per cassette = 2.5 m² and Maximum load per m² = 100 L/m²; the answers are &lt;strong&gt;Membrane area required&lt;/strong&gt; = 8.33 m², &lt;strong&gt;Cassettes to install&lt;/strong&gt; = 4 cassettes, &lt;strong&gt;Diafiltration buffer needed&lt;/strong&gt; = 313 L, &lt;strong&gt;Estimated step time&lt;/strong&gt; = 2.13 h, &lt;strong&gt;Area set by the load limit&lt;/strong&gt; = 5 m² and &lt;strong&gt;Which limit sets the area (1 = flux, 2 = load)&lt;/strong&gt; = 1.</p><ul><li><strong>Membrane area required</strong> = 8.33 m²</li><li><strong>Cassettes to install</strong> = 4 cassettes</li><li><strong>Diafiltration buffer needed</strong> = 313 L</li><li><strong>Estimated step time</strong> = 2.13 h</li><li><strong>Area set by the load limit</strong> = 5 m²</li><li><strong>Which limit sets the area (1 = flux, 2 = load)</strong> = 1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Membrane area required</strong> = <code>max(Batch volume ÷ Maximum load per m²,Batch volume ÷ Permeate flux)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Membrane area required&lt;/strong&gt; = 8.33, &lt;strong&gt;Cassettes to install&lt;/strong&gt; = 4, &lt;strong&gt;Diafiltration buffer needed&lt;/strong&gt; = 313, &lt;strong&gt;Estimated step time&lt;/strong&gt; = 2.13, &lt;strong&gt;Area set by the load limit&lt;/strong&gt; = 5 and &lt;strong&gt;Which limit sets the area (1 = flux, 2 = load)&lt;/strong&gt; = 1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Membrane area required is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Membrane area required</strong> = <code>max(Batch volume ÷ Maximum load per m²,Batch volume ÷ Permeate flux)</code></li><li><strong>Cassettes to install</strong> = <code>ceil(max(Batch volume ÷ Maximum load per m²,Batch volume ÷ Permeate flux) ÷ Area per cassette)</code></li><li><strong>Diafiltration buffer needed</strong> = <code>Batch volume ÷ Concentration factor × Diafiltration volumes</code></li><li><strong>Estimated step time</strong> = <code>(Batch volume ÷ Membrane area required + Batch volume ÷ Concentration factor × Diafiltration volumes ÷ Membrane area required) ÷ Permeate flux + 0.5</code></li><li><strong>Area set by the load limit</strong> = <code>Batch volume ÷ Maximum load per m²</code></li><li><strong>Which limit sets the area (1 = flux, 2 = load)</strong> = <code>if_else(Batch volume ÷ Maximum load per m²&gt;Batch volume ÷ Permeate flux,2,1)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Membrane area required, Cassettes to install and Diafiltration buffer needed can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Batch volume, from 500 to 1000 — and the answers go from &lt;strong&gt;Membrane area required&lt;/strong&gt; 8.33 m², &lt;strong&gt;Cassettes to install&lt;/strong&gt; 4 cassettes, &lt;strong&gt;Diafiltration buffer needed&lt;/strong&gt; 313 L, &lt;strong&gt;Estimated step time&lt;/strong&gt; 2.13 h, &lt;strong&gt;Area set by the load limit&lt;/strong&gt; 5 m² and &lt;strong&gt;Which limit sets the area (1 = flux, 2 = load)&lt;/strong&gt; 1 to &lt;strong&gt;Membrane area required&lt;/strong&gt; 16.67 m², &lt;strong&gt;Cassettes to install&lt;/strong&gt; 7 cassettes, &lt;strong&gt;Diafiltration buffer needed&lt;/strong&gt; 625 L, &lt;strong&gt;Estimated step time&lt;/strong&gt; 2.13 h, &lt;strong&gt;Area set by the load limit&lt;/strong&gt; 10 m² and &lt;strong&gt;Which limit sets the area (1 = flux, 2 = load)&lt;/strong&gt; 1.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Membrane area required, Cassettes to install and Diafiltration buffer needed are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Batch volume to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Batch volume, Permeate flux and Concentration factor and the number you are missing is Membrane area required and Cassettes to install.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/bod-load">BOD Load Calculator</a>, <a href="/biology/bone-length-to-body-height">Bone Length to Body Height Calculator</a> and <a href="/biology/bradford-assay-calculator">Bradford Assay (standard curve) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the TFF Membrane Area and Flux calculator work out?', 'a' => <<<'TXT'
            Membrane area required, Cassettes to install, Diafiltration buffer needed and Estimated step time, from Batch volume, Maximum load per m² and Permeate flux. The relationship is Membrane area required = max(Batch volume ÷ Maximum load per m²,Batch volume ÷ Permeate flux).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Batch volume (L), Permeate flux (L/m²/h), Concentration factor (x), Diafiltration volumes (DV), Area per cassette (m²). Fill volume, flux and concentration and leave Membrane area required empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Membrane area required, Cassettes to install, Diafiltration buffer needed and Estimated step time can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Membrane area required = 8.33 m², Cassettes to install = 4 cassettes, Diafiltration buffer needed = 313 L, Estimated step time = 2.13 h, Area set by the load limit = 5 m² and Which limit sets the area (1 = flux, 2 = load) = 1. The figures come from Batch volume as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Membrane area required is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Batch volume blank and the page solves for it, reporting Membrane area required instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Membrane area required at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/bod-load', 'name' => 'BOD Load Calculator'],
            ['path' => '/biology/bone-length-to-body-height', 'name' => 'Bone Length to Body Height Calculator'],
            ['path' => '/biology/bradford-assay-calculator', 'name' => 'Bradford Assay (standard curve) Calculator'],
        ],
        'authors' => [],
    ],
];
