<?php

/**
 * Water potential
 * /biology/water-potential
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Water potential',
    'meta' => ['title' => 'Water potential Calculator: Free, With Steps', 'description' => 'Water potential turns Osmotic potential (Ψo), Gravitational potential (Ψg) and Hydrostatic potential (Ψh) into Pressure potential (Ψp).', 'h1' => 'Water potential Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => 'Choose the known components!',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'psi_o',
                            'label' => 'Osmotic potential (Ψo)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'psi_p',
                            'label' => 'Pressure potential (Ψp)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'psi_g',
                            'label' => 'Gravitational potential (Ψg)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Additional Components',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'psi_h',
                            'label' => 'Hydrostatic potential (Ψh)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'psi_a',
                            'label' => 'Overburden potential (Ψa)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'psi_m',
                            'label' => 'Matric potential (Ψm)',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Water Potential',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Psi_sum',
                            'label' => 'Ψ',
                            'type' => 'number',
                            'unit' => '46',
                            'unit_default' => 'bar',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Psi_sum = psi_o + psi_h + psi_p + psi_m + psi_a + psi_g',
            'results' => [
                'psi_p' => 'Psi_sum - psi_a - psi_g - psi_h - psi_m - psi_o',
                'psi_a' => 'Psi_sum - psi_g - psi_h - psi_m - psi_o - psi_p',
                'psi_h' => 'Psi_sum - psi_a - psi_g - psi_m - psi_o - psi_p',
                'psi_g' => 'Psi_sum - psi_a - psi_h - psi_m - psi_o - psi_p',
                'psi_o' => 'Psi_sum - psi_a - psi_g - psi_h - psi_m - psi_p',
                'Psi_sum' => 'psi_a + psi_g + psi_h + psi_m + psi_o + psi_p',
                'psi_m' => 'Psi_sum - psi_a - psi_g - psi_h - psi_o - psi_p',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Water potential turns Osmotic potential (Ψo), Gravitational potential (Ψg) and Hydrostatic potential (Ψh) into Pressure potential (Ψp). The arithmetic is the whole method: Pressure potential (Ψp) is worked out from Osmotic potential (Ψo) by one formula, applied once. Pressure potential (Ψp) comes back in bars unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Water potential calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Water potential: it takes 6 numbers and reports Pressure potential (Ψp).</p><p>The relationship it solves reads Pressure potential (Ψp) = Ψ − Overburden potential (Ψa) − Gravitational potential (Ψg) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Osmotic potential (Ψo).</p><p>The result panel carries Pressure potential (Ψp), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Osmotic potential (Ψo)</strong> — in bars</li><li><strong>Gravitational potential (Ψg)</strong> — in bars</li><li><strong>Hydrostatic potential (Ψh)</strong> — in bars</li><li><strong>Overburden potential (Ψa)</strong> — in bars</li><li><strong>Matric potential (Ψm)</strong> — in bars</li><li><strong>Ψ</strong> — in bars</li></ul><p>What you get back is Pressure potential (Ψp) in bars, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Osmotic potential (Ψo) = 10 bar, Gravitational potential (Ψg) = 100 bar, Hydrostatic potential (Ψh) = 1000 bar, Overburden potential (Ψa) = 10 bar, Matric potential (Ψm) = 100 bar and Ψ = 1000 bar; the answers are &lt;strong&gt;Pressure potential (Ψp)&lt;/strong&gt; = -220 bar.</p><ul><li><strong>Pressure potential (Ψp)</strong> = -220 bar</li></ul><p>That is <strong>Pressure potential (Ψp)</strong> = <code>Ψ − Overburden potential (Ψa) − Gravitational potential (Ψg) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Osmotic potential (Ψo)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Pressure potential (Ψp)&lt;/strong&gt; = -220 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Pressure potential (Ψp) offers 28 units and opens on bars, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Pressure potential (Ψp)</strong> = <code>Ψ − Overburden potential (Ψa) − Gravitational potential (Ψg) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Osmotic potential (Ψo)</code></li><li><strong>Overburden potential (Ψa)</strong> = <code>Ψ − Gravitational potential (Ψg) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Osmotic potential (Ψo) − Pressure potential (Ψp)</code></li><li><strong>Hydrostatic potential (Ψh)</strong> = <code>Ψ − Overburden potential (Ψa) − Gravitational potential (Ψg) − Matric potential (Ψm) − Osmotic potential (Ψo) − Pressure potential (Ψp)</code></li><li><strong>Gravitational potential (Ψg)</strong> = <code>Ψ − Overburden potential (Ψa) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Osmotic potential (Ψo) − Pressure potential (Ψp)</code></li><li><strong>Osmotic potential (Ψo)</strong> = <code>Ψ − Overburden potential (Ψa) − Gravitational potential (Ψg) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Pressure potential (Ψp)</code></li><li><strong>Ψ</strong> = <code>Overburden potential (Ψa) + Gravitational potential (Ψg) + Hydrostatic potential (Ψh) + Matric potential (Ψm) + Osmotic potential (Ψo) + Pressure potential (Ψp)</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Pressure potential (Ψp), Overburden potential (Ψa) and Hydrostatic potential (Ψh) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Osmotic potential (Ψo), from 10 to 20 — and the answers go from &lt;strong&gt;Pressure potential (Ψp)&lt;/strong&gt; -220 bar to &lt;strong&gt;Pressure potential (Ψp)&lt;/strong&gt; -230 bar.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Osmotic potential (Ψo), Gravitational potential (Ψg) and Hydrostatic potential (Ψh) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Pressure potential (Ψp) is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Osmotic potential (Ψo) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Osmotic potential (Ψo), Gravitational potential (Ψg) and Hydrostatic potential (Ψh) is what you already know and Pressure potential (Ψp) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/genetic-odds-ratio">Odds Ratio for Genetics Calculator</a>, <a href="/biology/oligo-converter">Oligo pmol/µL to µg/mL Converter Calculator — Formula &amp; Result</a> and <a href="/biology/oligo-tm-calculator">Oligo Tm (Melting Temperature) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Water potential calculator work out?', 'a' => <<<'TXT'
            Pressure potential (Ψp), from Ψ, Overburden potential (Ψa), Gravitational potential (Ψg) and Hydrostatic potential (Ψh). The relationship is Pressure potential (Ψp) = Ψ − Overburden potential (Ψa) − Gravitational potential (Ψg) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Osmotic potential (Ψo).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Osmotic potential (Ψo) (bars), Gravitational potential (Ψg) (bars), Hydrostatic potential (Ψh) (bars), Overburden potential (Ψa) (bars), Matric potential (Ψm) (bars). With psi_o, psi_g and psi_h in place, Pressure potential (Ψp) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Pressure potential (Ψp), Overburden potential (Ψa), Hydrostatic potential (Ψh) and Gravitational potential (Ψg) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Pressure potential (Ψp) = -220 bar. That comes from the page's own defaults, entered in Osmotic potential (Ψo); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Pressure potential (Ψp) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Osmotic potential (Ψo) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Pressure potential (Ψp) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/genetic-odds-ratio', 'name' => 'Odds Ratio for Genetics Calculator'],
            ['path' => '/biology/oligo-converter', 'name' => 'Oligo pmol/µL to µg/mL Converter Calculator — Formula & Result'],
            ['path' => '/biology/oligo-tm-calculator', 'name' => 'Oligo Tm (Melting Temperature) Calculator'],
        ],
        'authors' => [],
    ],
];
