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
    'meta' => ['title' => 'Water potential Calculator: Free, With Steps', 'description' => <<<'TXT'
    Water potential turns osmotic potential (Ψo), Pressure potential (Ψp) and Gravitational potential (Ψg) into ψ. The formula is printed in the form's own words.
    TXT, 'h1' => 'Water potential Calculator', 'updated' => '2026-08-12'],
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
        Water potential turns Osmotic potential (Ψo), Pressure potential (Ψp) and Gravitational potential (Ψg) into Ψ. The arithmetic is the whole method: ψ is worked out from osmotic potential (Ψo) by one formula, applied once. Ψ comes back in bars unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Water potential calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Water potential: it takes 6 numbers and reports Ψ.</p><p>The relationship it solves reads Ψ = Overburden potential (Ψa) + Gravitational potential (Ψg) + Hydrostatic potential (Ψh) + Matric potential (Ψm) + Osmotic potential (Ψo) + Pressure potential (Ψp).</p><p>The result panel carries Ψ, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 6 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Osmotic potential (Ψo)</strong> — in bars</li><li><strong>Pressure potential (Ψp)</strong> — in bars</li><li><strong>Gravitational potential (Ψg)</strong> — in bars</li><li><strong>Hydrostatic potential (Ψh)</strong> — in bars</li><li><strong>Overburden potential (Ψa)</strong> — in bars</li><li><strong>Matric potential (Ψm)</strong> — in bars</li></ul><p>What you get back is Ψ in bars, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Osmotic potential (Ψo) = 10 bar, Pressure potential (Ψp) = 100 bar, Gravitational potential (Ψg) = 1000 bar, Hydrostatic potential (Ψh) = 10 bar, Overburden potential (Ψa) = 100 bar and Matric potential (Ψm) = 1000 bar; the answers are <strong>Ψ</strong> = 2220 bar.</p><ul><li><strong>Ψ</strong> = 2220 bar</li></ul><p>That is <strong>Ψ</strong> = <code>Overburden potential (Ψa) + Gravitational potential (Ψg) + Hydrostatic potential (Ψh) + Matric potential (Ψm) + Osmotic potential (Ψo) + Pressure potential (Ψp)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Ψ</strong> = 2220 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Ψ offers 28 units and opens on bars, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Ψ</strong> = <code>Overburden potential (Ψa) + Gravitational potential (Ψg) + Hydrostatic potential (Ψh) + Matric potential (Ψm) + Osmotic potential (Ψo) + Pressure potential (Ψp)</code></li><li><strong>Pressure potential (Ψp)</strong> = <code>Ψ − Overburden potential (Ψa) − Gravitational potential (Ψg) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Osmotic potential (Ψo)</code></li><li><strong>Overburden potential (Ψa)</strong> = <code>Ψ − Gravitational potential (Ψg) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Osmotic potential (Ψo) − Pressure potential (Ψp)</code></li><li><strong>Hydrostatic potential (Ψh)</strong> = <code>Ψ − Overburden potential (Ψa) − Gravitational potential (Ψg) − Matric potential (Ψm) − Osmotic potential (Ψo) − Pressure potential (Ψp)</code></li><li><strong>Gravitational potential (Ψg)</strong> = <code>Ψ − Overburden potential (Ψa) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Osmotic potential (Ψo) − Pressure potential (Ψp)</code></li><li><strong>Osmotic potential (Ψo)</strong> = <code>Ψ − Overburden potential (Ψa) − Gravitational potential (Ψg) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Pressure potential (Ψp)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Ψ</strong> = <code>Overburden potential (Ψa) + Gravitational potential (Ψg) + Hydrostatic potential (Ψh) + Matric potential (Ψm) + Osmotic potential (Ψo) + Pressure potential (Ψp)</code> — the form to use when Overburden potential (Ψa), Gravitational potential (Ψg), Hydrostatic potential (Ψh) and Matric potential (Ψm) are the values you have.</li><li><strong>Pressure potential (Ψp)</strong> = <code>Ψ − Overburden potential (Ψa) − Gravitational potential (Ψg) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Osmotic potential (Ψo)</code> — the form to use when Ψ, Overburden potential (Ψa), Gravitational potential (Ψg) and Hydrostatic potential (Ψh) are the values you have.</li><li><strong>Overburden potential (Ψa)</strong> = <code>Ψ − Gravitational potential (Ψg) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Osmotic potential (Ψo) − Pressure potential (Ψp)</code> — the form to use when Ψ, Gravitational potential (Ψg), Hydrostatic potential (Ψh) and Matric potential (Ψm) are the values you have.</li><li><strong>Hydrostatic potential (Ψh)</strong> = <code>Ψ − Overburden potential (Ψa) − Gravitational potential (Ψg) − Matric potential (Ψm) − Osmotic potential (Ψo) − Pressure potential (Ψp)</code> — the form to use when Ψ, Overburden potential (Ψa), Gravitational potential (Ψg) and Matric potential (Ψm) are the values you have.</li><li><strong>Gravitational potential (Ψg)</strong> = <code>Ψ − Overburden potential (Ψa) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Osmotic potential (Ψo) − Pressure potential (Ψp)</code> — the form to use when Ψ, Overburden potential (Ψa), Hydrostatic potential (Ψh) and Matric potential (Ψm) are the values you have.</li><li><strong>Osmotic potential (Ψo)</strong> = <code>Ψ − Overburden potential (Ψa) − Gravitational potential (Ψg) − Hydrostatic potential (Ψh) − Matric potential (Ψm) − Pressure potential (Ψp)</code> — the form to use when Ψ, Overburden potential (Ψa), Gravitational potential (Ψg) and Hydrostatic potential (Ψh) are the values you have.</li><li><strong>Matric potential (Ψm)</strong> = <code>Ψ − Overburden potential (Ψa) − Gravitational potential (Ψg) − Hydrostatic potential (Ψh) − Osmotic potential (Ψo) − Pressure potential (Ψp)</code> — the form to use when Ψ, Overburden potential (Ψa), Gravitational potential (Ψg) and Hydrostatic potential (Ψh) are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Ψ, Pressure potential (Ψp) and Overburden potential (Ψa) can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Osmotic potential (Ψo), from 10 to 20 — and the answers go from <strong>Ψ</strong> 2220 bar to <strong>Ψ</strong> 2230 bar.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Osmotic potential (Ψo), Pressure potential (Ψp) and Gravitational potential (Ψg) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Ψ is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Osmotic potential (Ψo) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Osmotic potential (Ψo) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Pressure potential (Ψp) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Pressure potential (Ψp) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Osmotic potential (Ψo) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Osmotic potential (Ψo)</strong> is a bars quantity: the page opens it in bar and converts anything else you pick before the formula runs. It feeds Pressure potential (Ψp), Overburden potential (Ψa) and Hydrostatic potential (Ψh). Have it to hand before you start: Osmotic potential (Ψo) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Pressure potential (Ψp)</strong> is a bars quantity: the page opens it in bar and converts anything else you pick before the formula runs. It feeds Overburden potential (Ψa), Hydrostatic potential (Ψh) and Gravitational potential (Ψg). Have it to hand before you start: Pressure potential (Ψp) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Gravitational potential (Ψg)</strong> is a bars quantity: the page opens it in bar and converts anything else you pick before the formula runs. It feeds Pressure potential (Ψp), Overburden potential (Ψa) and Hydrostatic potential (Ψh). Have it to hand before you start: Gravitational potential (Ψg) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hydrostatic potential (Ψh)</strong> is a bars quantity: the page opens it in bar and converts anything else you pick before the formula runs. It feeds Pressure potential (Ψp), Overburden potential (Ψa) and Gravitational potential (Ψg). Have it to hand before you start: Hydrostatic potential (Ψh) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Overburden potential (Ψa)</strong> is a bars quantity: the page opens it in bar and converts anything else you pick before the formula runs. It feeds Pressure potential (Ψp), Hydrostatic potential (Ψh) and Gravitational potential (Ψg). Have it to hand before you start: Overburden potential (Ψa) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Matric potential (Ψm)</strong> is a bars quantity: the page opens it in bar and converts anything else you pick before the formula runs. It feeds Pressure potential (Ψp), Overburden potential (Ψa) and Hydrostatic potential (Ψh). Have it to hand before you start: Matric potential (Ψm) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Ψ</strong> is a bars figure and the page's own defaults put it at 2220 bar. It is computed from Overburden potential (Ψa), Gravitational potential (Ψg), Hydrostatic potential (Ψh) and Matric potential (Ψm), so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Ψ</th></tr></thead><tbody><tr><td><strong>Osmotic potential (Ψo)</strong> +10%</td><td>+0.05%</td></tr><tr><td><strong>Pressure potential (Ψp)</strong> +10%</td><td>+0.45%</td></tr><tr><td><strong>Gravitational potential (Ψg)</strong> +10%</td><td>+4.5%</td></tr><tr><td><strong>Hydrostatic potential (Ψh)</strong> +10%</td><td>+0.05%</td></tr><tr><td><strong>Overburden potential (Ψa)</strong> +10%</td><td>+0.45%</td></tr><tr><td><strong>Matric potential (Ψm)</strong> +10%</td><td>+4.5%</td></tr></tbody></table><p>Ranked by leverage, Gravitational potential (Ψg) sits at the top — a ten per cent error in that box shows up as roughly 4.5 per cent in the answer. By contrast, Pressure potential (Ψp), Overburden potential (Ψa) and Osmotic potential (Ψo) barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>bars</strong> — 28 units. It opens in <em>bar</em>, and the chip also carries bar, hPa, Pa, psi, atm and mmHg. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Ψ follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are bars and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Osmotic potential (Ψo), Pressure potential (Ψp) and Gravitational potential (Ψg) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Osmotic potential (Ψo), Pressure potential (Ψp) and Gravitational potential (Ψg) is what you already know and Ψ is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/genetic-odds-ratio">Odds Ratio for Genetics Calculator</a>, <a href="/biology/oligo-converter">Oligo pmol/µL to µg/mL Converter Calculator — Formula &amp; Result</a> and <a href="/biology/oligo-tm-calculator">Oligo Tm (Melting Temperature) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Water potential calculator work out?', 'a' => <<<'TXT'
            Ψ, from Overburden potential (Ψa), Gravitational potential (Ψg), Hydrostatic potential (Ψh) and Matric potential (Ψm). The relationship is Ψ = Overburden potential (Ψa) + Gravitational potential (Ψg) + Hydrostatic potential (Ψh) + Matric potential (Ψm) + Osmotic potential (Ψo) + Pressure potential (Ψp).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Osmotic potential (Ψo) (bars), Pressure potential (Ψp) (bars), Gravitational potential (Ψg) (bars), Hydrostatic potential (Ψh) (bars), Overburden potential (Ψa) (bars). With osmotic potential (Ψo), pressure potential (Ψp) and gravitational potential (Ψg) in place, Ψ can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Ψ, Pressure potential (Ψp), Overburden potential (Ψa) and Hydrostatic potential (Ψh) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Ψ = 2220 bar. That comes from the page\'s own defaults, entered in Osmotic potential (Ψo); change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Ψ is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Osmotic potential (Ψo) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Ψ keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/genetic-odds-ratio', 'name' => 'Odds Ratio for Genetics Calculator'],
            ['path' => '/biology/oligo-converter', 'name' => 'Oligo pmol/µL to µg/mL Converter Calculator — Formula & Result'],
            ['path' => '/biology/oligo-tm-calculator', 'name' => 'Oligo Tm (Melting Temperature) Calculator'],
        ],
        'authors' => [],
    ],
];
