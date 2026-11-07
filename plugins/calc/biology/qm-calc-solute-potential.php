<?php

/**
 * Solute Potential Calculator
 * /biology/solute-potential
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Solute Potential Calculator',
    'meta' => ['title' => 'Solute Potential Calculator — Formula & Results', 'description' => 'Solute Potential Calculator takes solute concentration, temperature and ionisation factor (i) and returns concentration and Equivalent NaCl concentration.', 'h1' => 'Solute Potential Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'conc',
                            'label' => 'Solute concentration',
                            'type' => 'number',
                            'suffix' => 'mol/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.2',
                        ],
                        [
                            'name' => 'temp',
                            'label' => 'Temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'i',
                            'label' => 'Ionisation factor (i)',
                            'type' => 'number',
                            'help' => '2 for NaCl, 1 for sucrose',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'psi',
                            'label' => 'Solute potential',
                            'type' => 'number',
                            'suffix' => 'MPa',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bar',
                            'label' => 'Solute potential',
                            'type' => 'number',
                            'suffix' => 'bar',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'molarity_mmol',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'mmol/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'equiv_nacl',
                            'label' => 'Equivalent NaCl concentration',
                            'type' => 'number',
                            'suffix' => 'mmol/L',
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
            'title' => 'Potential',
            'results' => ['psi' => '0-i*conc*8.314*(temp+273.15)/1000000', 'bar' => '0-i*conc*8.314*(temp+273.15)/100000', 'molarity_mmol' => 'conc*1000', 'equiv_nacl' => 'conc/i*1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Solute Potential takes Solute concentration, Temperature and Ionisation factor (i) and returns Solute potential and Solute potential. It is a single relationship that reads solute potential out of solute concentration, not a table of canned results keyed by them. Units for Solute potential default to MPa and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Solute Potential calculator works', 'html' => <<<'TXT'
            <p>The Solute Potential calculator applies one relationship to 3 numbers and reports Solute potential, Solute potential and Concentration.</p><p>In the form&#039;s own words, Solute potential = 0 − Ionisation factor (i) × Solute concentration × 8.314 × (Temperature + 273.15) ÷ 1000000.</p><p>The answers are Solute potential, Solute potential, Concentration and Equivalent NaCl concentration; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Solute concentration</strong> — in mol/L</li><li><strong>Temperature</strong> — in °C</li><li><strong>Ionisation factor (i)</strong> — a plain number, no unit. 2 for NaCl, 1 for sucrose</li></ul><p>What you get back is Solute potential in MPa, Solute potential in bar, Concentration in mmol/L, Equivalent NaCl concentration in mmol/L, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Solute concentration = 0.2 mol/L, Temperature = 25 °C and Ionisation factor (i) = 1 — through the same formula and the panel reports <strong>Solute potential</strong> = -4.958e-4 MPa, <strong>Solute potential</strong> = -0.005 bar, <strong>Concentration</strong> = 200 mmol/L and <strong>Equivalent NaCl concentration</strong> = 200 mmol/L.</p><ul><li><strong>Solute potential</strong> = -4.958e-4 MPa</li><li><strong>Solute potential</strong> = -0.005 bar</li><li><strong>Concentration</strong> = 200 mmol/L</li><li><strong>Equivalent NaCl concentration</strong> = 200 mmol/L</li></ul><p>That is <strong>Solute potential</strong> = <code>0 − Ionisation factor (i) × Solute concentration × 8.314 × (Temperature + 273.15) ÷ 1000000</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Solute potential</strong> = -4.958e-4, <strong>Solute potential</strong> = -0.005, <strong>Concentration</strong> = 200 and <strong>Equivalent NaCl concentration</strong> = 200 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Solute potential takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Solute potential</strong> = <code>0 − Ionisation factor (i) × Solute concentration × 8.314 × (Temperature + 273.15) ÷ 1000000</code></li><li><strong>Concentration</strong> = <code>Solute concentration × 1000</code></li><li><strong>Equivalent NaCl concentration</strong> = <code>Solute concentration ÷ Ionisation factor (i) × 1000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Solute potential</strong> = <code>0 − Ionisation factor (i) × Solute concentration × 8.314 × (Temperature + 273.15) ÷ 1000000</code> — the form to use when Ionisation factor (i), Solute concentration and Temperature are the values you have.</li><li><strong>Solute potential</strong> = <code>0 − Ionisation factor (i) × Solute concentration × 8.314 × (Temperature + 273.15) ÷ 100000</code> — the form to use when Ionisation factor (i), Solute concentration and Temperature are the values you have.</li><li><strong>Concentration</strong> = <code>Solute concentration × 1000</code> — the form to use when Solute concentration are the values you have.</li><li><strong>Equivalent NaCl concentration</strong> = <code>Solute concentration ÷ Ionisation factor (i) × 1000</code> — the form to use when Solute concentration and Ionisation factor (i) are the values you have.</li></ul><p>Any one of Solute potential, Solute potential and Concentration can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Solute concentration from 0.2 to 0.4, leaving every other box alone. The panel moves from <strong>Solute potential</strong> -4.958e-4 MPa, <strong>Solute potential</strong> -0.005 bar, <strong>Concentration</strong> 200 mmol/L and <strong>Equivalent NaCl concentration</strong> 200 mmol/L to <strong>Solute potential</strong> -9.915e-4 MPa, <strong>Solute potential</strong> -0.0099 bar, <strong>Concentration</strong> 400 mmol/L and <strong>Equivalent NaCl concentration</strong> 400 mmol/L.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Solute potential, Solute potential and Concentration are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Solute concentration left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Solute concentration is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Temperature left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Temperature is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Ionisation factor (i) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Ionisation factor (i) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Solute concentration is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Solute Potential form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Solute concentration</strong> is measured in mol/L. The page reads it when it works out Solute potential, Solute potential and Concentration. Fill it from a measurement rather than a memory — Solute concentration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Temperature</strong> is measured in °C. The page reads it when it works out Solute potential and Solute potential. Fill it from a measurement rather than a memory — Temperature is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Ionisation factor (i)</strong> takes a plain number with no unit attached. 2 for NaCl, 1 for sucrose. The page reads it when it works out Solute potential, Solute potential and Equivalent NaCl concentration. Fill it from a measurement rather than a memory — Ionisation factor (i) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Solute potential</strong> is a plain number and the page's own defaults put it at -4.958e-4. It is worked out from Ionisation factor (i), Solute concentration and Temperature. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Solute potential</strong> is a plain number and the page's own defaults put it at -0.005. It is worked out from Ionisation factor (i), Solute concentration and Temperature. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Concentration</strong> is a plain number and the page's own defaults put it at 200. It is worked out from Solute concentration. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Equivalent NaCl concentration</strong> is a plain number and the page's own defaults put it at 200. It is worked out from Solute concentration and Ionisation factor (i). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Solute potential</th><th>Solute potential</th><th>Concentration</th><th>Equivalent NaCl concentration</th></tr></thead><tbody><tr><td><strong>Solute concentration</strong> +10%</td><td>-10%</td><td>-10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Temperature</strong> +10%</td><td>-0.84%</td><td>-0.84%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Ionisation factor (i)</strong> +10%</td><td>-10%</td><td>-10%</td><td>+0%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Solute concentration sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Solute concentration = 0.1 mol/L, Temperature = 12.5 °C and Ionisation factor (i) = 0.5 and the page reports <strong>Solute potential</strong> = -1.187e-4 MPa, <strong>Solute potential</strong> = -0.0012 bar, <strong>Concentration</strong> = 100 mmol/L and <strong>Equivalent NaCl concentration</strong> = 200 mmol/L.</li><li>Feed in Solute concentration = 0.6 mol/L, Temperature = 25 °C and Ionisation factor (i) = 1 and the page reports <strong>Solute potential</strong> = -0.0015 MPa, <strong>Solute potential</strong> = -0.0149 bar, <strong>Concentration</strong> = 600 mmol/L and <strong>Equivalent NaCl concentration</strong> = 600 mmol/L.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Solute potential follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Solute concentration, Temperature and Ionisation factor (i) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Solute concentration, Temperature and Ionisation factor (i) is what you already know and Solute potential and Solute potential is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/atp-cellular-respiration-energy-yield">ATP / Cellular Respiration Energy Yield Calculator</a>, <a href="/biology/autosomal-dominant-pedigree">Autosomal Dominant Pedigree Analyzer Calculator</a> and <a href="/biology/autosomal-recessive-risk">Autosomal Recessive Inheritance Risk Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Solute Potential calculator work out?', 'a' => <<<'TXT'
            Solute potential, Solute potential, Concentration and Equivalent NaCl concentration, from Ionisation factor (i), Solute concentration and Temperature. The relationship is Solute potential = 0 − Ionisation factor (i) × Solute concentration × 8.314 × (Temperature + 273.15) ÷ 1000000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Solute concentration (mol/L), Temperature (°C), Ionisation factor (i). Enter solute concentration, temperature and ionisation factor (i); Solute potential is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Solute potential, Solute potential, Concentration and Equivalent NaCl concentration blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Solute potential = -4.958e-4 MPa, Solute potential = -0.005 bar, Concentration = 200 mmol/L and Equivalent NaCl concentration = 200 mmol/L. Those are the defaults written into the form — move Solute concentration and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Solute potential is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Solute concentration blank and the page solves for it, reporting Solute potential instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Solute potential keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/atp-cellular-respiration-energy-yield', 'name' => 'ATP / Cellular Respiration Energy Yield Calculator'],
            ['path' => '/biology/autosomal-dominant-pedigree', 'name' => 'Autosomal Dominant Pedigree Analyzer Calculator'],
            ['path' => '/biology/autosomal-recessive-risk', 'name' => 'Autosomal Recessive Inheritance Risk Calculator'],
        ],
        'authors' => [],
    ],
];
