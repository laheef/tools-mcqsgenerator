<?php

/**
 * Absorbance to Transmittance Converter
 * /biology/absorbance-transmittance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Absorbance to Transmittance Converter',
    'meta' => ['title' => 'Absorbance to Transmittance Converter Calculator', 'description' => 'Absorbance to Transmittance Converter works out concentration from beer–Lambert and fraction of light lost from absorbance and extinction coefficient.', 'h1' => 'Absorbance to Transmittance Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'absorbance',
                            'label' => 'Absorbance',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.5',
                        ],
                        [
                            'name' => 'extinction',
                            'label' => 'Extinction coefficient',
                            'type' => 'number',
                            'suffix' => 'per mg/mL',
                            'help' => 'Use 1 for a plain conversion',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.0',
                        ],
                        [
                            'name' => 'path',
                            'label' => 'Path length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'transmittance',
                            'label' => 'Transmittance',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'percent',
                            'label' => 'Transmittance',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'concentration',
                            'label' => 'Concentration from Beer–Lambert',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'lost',
                            'label' => 'Fraction of light lost',
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
            'title' => 'Optics',
            'results' => ['transmittance' => 'pow(10,-absorbance)', 'percent' => 'pow(10,-absorbance)*100', 'concentration' => 'absorbance/(extinction*path)', 'lost' => '(1-pow(10,-absorbance))*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Absorbance to Transmittance turns Absorbance, Extinction coefficient and Path length into Transmittance and Transmittance. Nothing is looked up on this page: transmittance is computed from absorbance and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Absorbance to Transmittance calculator works', 'html' => <<<'TXT'
            <p>Absorbance to Transmittance answers one question from 3 numbers, and the answer is Transmittance, Transmittance and Concentration from Beer–Lambert.</p><p>In the form&#039;s own words, Transmittance = (10)^(− Absorbance).</p><p>The result panel carries Transmittance, Transmittance, Concentration from Beer–Lambert and Fraction of light lost, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Absorbance</strong> — a plain number, no unit</li><li><strong>Extinction coefficient</strong> — in per mg/mL. Use 1 for a plain conversion</li><li><strong>Path length</strong> — in cm</li></ul><p>What you get back is Transmittance, Transmittance in %, Concentration from Beer–Lambert in mg/mL, Fraction of light lost in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Absorbance = 0.5, Extinction coefficient = 1 per mg/mL and Path length = 1 cm gives <strong>Transmittance</strong> = 0.316, <strong>Transmittance</strong> = 31.62 %, <strong>Concentration from Beer–Lambert</strong> = 0.5 mg/mL and <strong>Fraction of light lost</strong> = 68.38 %.</p><ul><li><strong>Transmittance</strong> = 0.316</li><li><strong>Transmittance</strong> = 31.62 %</li><li><strong>Concentration from Beer–Lambert</strong> = 0.5 mg/mL</li><li><strong>Fraction of light lost</strong> = 68.38 %</li></ul><p>The line behind those figures is <strong>Transmittance</strong> = <code>(10)^(− Absorbance)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Transmittance</strong> = 0.316, <strong>Transmittance</strong> = 31.62, <strong>Concentration from Beer–Lambert</strong> = 0.5 and <strong>Fraction of light lost</strong> = 68.38 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Transmittance takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Transmittance</strong> = <code>(10)^(− Absorbance)</code></li><li><strong>Concentration from Beer–Lambert</strong> = <code>Absorbance ÷ (Extinction coefficient × Path length)</code></li><li><strong>Fraction of light lost</strong> = <code>(1 − (10)^(− Absorbance)) × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Transmittance</strong> = <code>(10)^(− Absorbance)</code> — the form to use when Absorbance are the values you have.</li><li><strong>Transmittance</strong> = <code>(10)^(− Absorbance) × 100</code> — the form to use when Absorbance are the values you have.</li><li><strong>Concentration from Beer–Lambert</strong> = <code>Absorbance ÷ (Extinction coefficient × Path length)</code> — the form to use when Absorbance, Extinction coefficient and Path length are the values you have.</li><li><strong>Fraction of light lost</strong> = <code>(1 − (10)^(− Absorbance)) × 100</code> — the form to use when Absorbance are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Transmittance, Transmittance and Concentration from Beer–Lambert can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Absorbance, from 0.5 to 1 — and the answers go from <strong>Transmittance</strong> 0.316, <strong>Transmittance</strong> 31.62 %, <strong>Concentration from Beer–Lambert</strong> 0.5 mg/mL and <strong>Fraction of light lost</strong> 68.38 % to <strong>Transmittance</strong> 0.1, <strong>Transmittance</strong> 10 %, <strong>Concentration from Beer–Lambert</strong> 1 mg/mL and <strong>Fraction of light lost</strong> 90 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Transmittance, Transmittance and Concentration from Beer–Lambert are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Absorbance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Absorbance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Extinction coefficient left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Extinction coefficient is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Path length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Path length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Absorbance and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Absorbance to Transmittance form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Absorbance</strong> takes a plain number with no unit attached. The page reads it when it works out Transmittance, Transmittance and Concentration from Beer–Lambert. Fill it from a measurement rather than a memory — Absorbance is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Extinction coefficient</strong> is measured in per mg/mL. Use 1 for a plain conversion. The page reads it when it works out Concentration from Beer–Lambert. Fill it from a measurement rather than a memory — Extinction coefficient is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Path length</strong> is measured in cm. The page reads it when it works out Concentration from Beer–Lambert. Fill it from a measurement rather than a memory — Path length is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Transmittance</strong> is a plain number and the page's own defaults put it at 0.316. It is computed from Absorbance, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Transmittance</strong> is a plain number and the page's own defaults put it at 31.62. It is computed from Absorbance, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Concentration from Beer–Lambert</strong> is a plain number and the page's own defaults put it at 0.5. It is computed from Absorbance, Extinction coefficient and Path length, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Fraction of light lost</strong> is a plain number and the page's own defaults put it at 68.38. It is computed from Absorbance, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Transmittance</th><th>Transmittance</th><th>Concentration from Beer–Lambert</th><th>Fraction of light lost</th></tr></thead><tbody><tr><td><strong>Absorbance</strong> +10%</td><td>-10.87%</td><td>-10.87%</td><td>+10%</td><td>+5.03%</td></tr><tr><td><strong>Extinction coefficient</strong> +10%</td><td>+0%</td><td>+0%</td><td>-9.09%</td><td>+0%</td></tr><tr><td><strong>Path length</strong> +10%</td><td>+0%</td><td>+0%</td><td>-9.09%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Absorbance sits at the top — a ten per cent error in that box shows up as roughly 10.9 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Absorbance = 0.25, Extinction coefficient = 0.5 per mg/mL and Path length = 0.5 cm and the page reports <strong>Transmittance</strong> = 0.562, <strong>Transmittance</strong> = 56.23 %, <strong>Concentration from Beer–Lambert</strong> = 1 mg/mL and <strong>Fraction of light lost</strong> = 43.77 %.</li><li>Feed in Absorbance = 1.5, Extinction coefficient = 1 per mg/mL and Path length = 1 cm and the page reports <strong>Transmittance</strong> = 0.032, <strong>Transmittance</strong> = 3.16 %, <strong>Concentration from Beer–Lambert</strong> = 1.5 mg/mL and <strong>Fraction of light lost</strong> = 96.84 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Transmittance is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Absorbance, Extinction coefficient and Path length are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Absorbance, Extinction coefficient and Path length measured, Transmittance and Transmittance wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dog-pregnancy">Dog pregnancy Calculator</a>, <a href="/biology/dog-quality-of-life">Dog quality of life</a> and <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Absorbance to Transmittance calculator work out?', 'a' => <<<'TXT'
            Transmittance, Transmittance, Concentration from Beer–Lambert and Fraction of light lost, from Absorbance. The relationship is Transmittance = (10)^(− Absorbance).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Absorbance, Extinction coefficient (per mg/mL), Path length (cm). With absorbance, extinction coefficient and path length in place, Transmittance can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Transmittance, Transmittance, Concentration from Beer–Lambert and Fraction of light lost can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Transmittance = 0.316, Transmittance = 31.62 %, Concentration from Beer–Lambert = 0.5 mg/mL and Fraction of light lost = 68.38 %. That comes from the page's own defaults, entered in Absorbance; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Transmittance is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Absorbance blank and the page solves for it, reporting Transmittance instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Transmittance keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-pregnancy', 'name' => 'Dog pregnancy Calculator'],
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
        ],
        'authors' => [],
    ],
];
