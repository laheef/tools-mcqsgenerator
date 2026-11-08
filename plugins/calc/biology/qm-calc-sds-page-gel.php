<?php

/**
 * SDS-PAGE Gel Calculator
 * /biology/sds-page-gel
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'SDS-PAGE Gel Calculator',
    'meta' => ['title' => 'SDS-PAGE Gel Calculator: Units and Formulas', 'description' => 'SDS-PAGE Gel Calculator works out 30% acrylamide stock and 2% bis-acrylamide stock from protein of interest, acrylamide in the gel and crosslinker in the gel.', 'h1' => 'SDS-PAGE Gel Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'protein_kda',
                            'label' => 'Protein of interest',
                            'type' => 'number',
                            'suffix' => 'kDa',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'acrylamide_pct',
                            'label' => 'Acrylamide in the gel',
                            'type' => 'number',
                            'suffix' => '%T',
                            'help' => '10% separates 20–150 kDa',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'bis_pct',
                            'label' => 'Crosslinker in the gel',
                            'type' => 'number',
                            'suffix' => '%C',
                            'help' => '2.6% is the usual ratio',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2.6',
                        ],
                        [
                            'name' => 'total_ml',
                            'label' => 'Gel volume to pour',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'help' => 'Two mini gels are about 10 mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'acrylamide_ml',
                            'label' => '30% acrylamide stock',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'bis_ml',
                            'label' => '2% bis-acrylamide stock',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'water_ml',
                            'label' => 'Water',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'best_pct',
                            'label' => 'Best acrylamide percentage',
                            'type' => 'number',
                            'suffix' => '%T',
                            'help' => 'For the protein you entered',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'separation',
                            'label' => 'Range this gel resolves',
                            'type' => 'number',
                            'suffix' => 'kDa',
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
            'title' => 'Gel',
            'results' => [
                'acrylamide_ml' => 'acrylamide_pct*total_ml/30',
                'water_ml' => 'total_ml-acrylamide_pct*total_ml/30-bis_pct*total_ml/2-total_ml/10',
                'bis_ml' => 'bis_pct*total_ml/2',
                'best_pct' => '150/protein_kda*5',
                'separation' => '1500/acrylamide_pct',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        SDS-PAGE Gel works out 30% acrylamide stock and 2% bis-acrylamide stock from Protein of interest, Acrylamide in the gel and Crosslinker in the gel. Nothing is looked up on this page: 30% acrylamide stock is computed from protein of interest and the other boxes, so an unusual pair of values gives an honest answer rather than an error. 30% acrylamide stock is opened in mL; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the SDS-PAGE Gel calculator works', 'html' => <<<'TXT'
            <p>SDS-PAGE Gel answers one question from 4 numbers, and the answer is 30% acrylamide stock, 2% bis-acrylamide stock and Water.</p><p>In the form&#039;s own words, 30% acrylamide stock = Acrylamide in the gel × Gel volume to pour ÷ 30.</p><p>What comes back is 30% acrylamide stock, 2% bis-acrylamide stock, Water and Best acrylamide percentage — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Protein of interest</strong> — in kDa</li><li><strong>Acrylamide in the gel</strong> — in %T. 10% separates 20–150 kDa</li><li><strong>Crosslinker in the gel</strong> — in %C. 2.6% is the usual ratio</li><li><strong>Gel volume to pour</strong> — in mL. Two mini gels are about 10 mL</li></ul><p>The answers come back as 30% acrylamide stock in mL, 2% bis-acrylamide stock in mL, Water in mL, Best acrylamide percentage in %T, Range this gel resolves in kDa. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Protein of interest = 50 kDa, Acrylamide in the gel = 10 %T, Crosslinker in the gel = 2.6 %C and Gel volume to pour = 10 mL; the answers are <strong>30% acrylamide stock</strong> = 3.33 mL, <strong>Water</strong> = -7.33 mL, <strong>2% bis-acrylamide stock</strong> = 13 mL, <strong>Best acrylamide percentage</strong> = 15 %T and <strong>Range this gel resolves</strong> = 150 kDa.</p><ul><li><strong>30% acrylamide stock</strong> = 3.33 mL</li><li><strong>Water</strong> = -7.33 mL</li><li><strong>2% bis-acrylamide stock</strong> = 13 mL</li><li><strong>Best acrylamide percentage</strong> = 15 %T</li><li><strong>Range this gel resolves</strong> = 150 kDa</li></ul><p>That is <strong>30% acrylamide stock</strong> = <code>Acrylamide in the gel × Gel volume to pour ÷ 30</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>30% acrylamide stock</strong> = 3.33, <strong>Water</strong> = -7.33, <strong>2% bis-acrylamide stock</strong> = 13, <strong>Best acrylamide percentage</strong> = 15 and <strong>Range this gel resolves</strong> = 150. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as 30% acrylamide stock is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>30% acrylamide stock</strong> = <code>Acrylamide in the gel × Gel volume to pour ÷ 30</code></li><li><strong>Water</strong> = <code>Gel volume to pour − Acrylamide in the gel × Gel volume to pour ÷ 30 − Crosslinker in the gel × Gel volume to pour ÷ 2 − Gel volume to pour ÷ 10</code></li><li><strong>2% bis-acrylamide stock</strong> = <code>Crosslinker in the gel × Gel volume to pour ÷ 2</code></li><li><strong>Best acrylamide percentage</strong> = <code>150 ÷ Protein of interest × 5</code></li><li><strong>Range this gel resolves</strong> = <code>1500 ÷ Acrylamide in the gel</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>30% acrylamide stock</strong> = <code>Acrylamide in the gel × Gel volume to pour ÷ 30</code> — the form to use when Acrylamide in the gel and Gel volume to pour are the values you have.</li><li><strong>Water</strong> = <code>Gel volume to pour − Acrylamide in the gel × Gel volume to pour ÷ 30 − Crosslinker in the gel × Gel volume to pour ÷ 2 − Gel volume to pour ÷ 10</code> — the form to use when Gel volume to pour, Acrylamide in the gel and Crosslinker in the gel are the values you have.</li><li><strong>2% bis-acrylamide stock</strong> = <code>Crosslinker in the gel × Gel volume to pour ÷ 2</code> — the form to use when Crosslinker in the gel and Gel volume to pour are the values you have.</li><li><strong>Best acrylamide percentage</strong> = <code>150 ÷ Protein of interest × 5</code> — the form to use when Protein of interest are the values you have.</li><li><strong>Range this gel resolves</strong> = <code>1500 ÷ Acrylamide in the gel</code> — the form to use when Acrylamide in the gel are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of 30% acrylamide stock, Water and 2% bis-acrylamide stock can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Protein of interest, from 50 to 100 — and the answers go from <strong>30% acrylamide stock</strong> 3.33 mL, <strong>Water</strong> -7.33 mL, <strong>2% bis-acrylamide stock</strong> 13 mL, <strong>Best acrylamide percentage</strong> 15 %T and <strong>Range this gel resolves</strong> 150 kDa to <strong>30% acrylamide stock</strong> 3.33 mL, <strong>Water</strong> -7.33 mL, <strong>2% bis-acrylamide stock</strong> 13 mL, <strong>Best acrylamide percentage</strong> 7.5 %T and <strong>Range this gel resolves</strong> 150 kDa.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> 30% acrylamide stock, 2% bis-acrylamide stock and Water are results: they are worked out from the boxes above and cannot be typed into, so a past answer has to be entered as one of the inputs instead.</li><li><strong>Protein of interest left as a guess.</strong> Anything typed into Protein of interest is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Acrylamide in the gel left as a guess.</strong> Anything typed into Acrylamide in the gel is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Crosslinker in the gel left as a guess.</strong> Anything typed into Crosslinker in the gel is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Protein of interest and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the SDS-PAGE Gel form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Protein of interest</strong> is measured in kDa. It feeds Best acrylamide percentage. Fill it from a measurement rather than a memory — Protein of interest is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Acrylamide in the gel</strong> is measured in %T. 10% separates 20–150 kDa. It feeds 30% acrylamide stock, Water and Range this gel resolves. Fill it from a measurement rather than a memory — Acrylamide in the gel is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Crosslinker in the gel</strong> is measured in %C. 2.6% is the usual ratio. It feeds Water and 2% bis-acrylamide stock. Fill it from a measurement rather than a memory — Crosslinker in the gel is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Gel volume to pour</strong> is measured in mL. Two mini gels are about 10 mL. It feeds 30% acrylamide stock, Water and 2% bis-acrylamide stock. Fill it from a measurement rather than a memory — Gel volume to pour is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>30% acrylamide stock</strong> is a plain number and the page's own defaults put it at 3.33. It is computed from Acrylamide in the gel and Gel volume to pour, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>2% bis-acrylamide stock</strong> is a plain number and the page's own defaults put it at 13. It is computed from Crosslinker in the gel and Gel volume to pour, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Water</strong> is a plain number and the page's own defaults put it at -7.33. It is computed from Gel volume to pour, Acrylamide in the gel and Crosslinker in the gel, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Best acrylamide percentage</strong> is a plain number and the page's own defaults put it at 15. It is computed from Protein of interest, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Range this gel resolves</strong> is a plain number and the page's own defaults put it at 150. It is computed from Acrylamide in the gel, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>30% acrylamide stock</th><th>Water</th><th>2% bis-acrylamide stock</th><th>Best acrylamide percentage</th><th>Range this gel resolves</th></tr></thead><tbody><tr><td><strong>Protein of interest</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>-9.09%</td><td>+0%</td></tr><tr><td><strong>Acrylamide in the gel</strong> +10%</td><td>+10%</td><td>-4.55%</td><td>+0%</td><td>+0%</td><td>-9.09%</td></tr><tr><td><strong>Crosslinker in the gel</strong> +10%</td><td>+0%</td><td>-17.73%</td><td>+10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Gel volume to pour</strong> +10%</td><td>+10%</td><td>-10%</td><td>+10%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Crosslinker in the gel: ten per cent there moves an answer by about 17.7 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Protein of interest = 25 kDa, Acrylamide in the gel = 5 %T, Crosslinker in the gel = 1.3 %C and Gel volume to pour = 5 mL and the page reports <strong>30% acrylamide stock</strong> = 0.8333 mL, <strong>Water</strong> = 0.4167 mL, <strong>2% bis-acrylamide stock</strong> = 3.25 mL, <strong>Best acrylamide percentage</strong> = 30 %T and <strong>Range this gel resolves</strong> = 300 kDa.</li><li>Feed in Protein of interest = 150 kDa, Acrylamide in the gel = 10 %T, Crosslinker in the gel = 2.6 %C and Gel volume to pour = 10 mL and the page reports <strong>30% acrylamide stock</strong> = 3.33 mL, <strong>Water</strong> = -7.33 mL, <strong>2% bis-acrylamide stock</strong> = 13 mL, <strong>Best acrylamide percentage</strong> = 5 %T and <strong>Range this gel resolves</strong> = 150 kDa.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind 30% acrylamide stock is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Protein of interest, Acrylamide in the gel and Crosslinker in the gel are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Protein of interest, Acrylamide in the gel and Crosslinker in the gel and the number you are missing is 30% acrylamide stock and 2% bis-acrylamide stock.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/ligation">Ligation</a>, <a href="/biology/lime-requirement">Lime Requirement Calculator</a> and <a href="/biology/linear-dna-ends-ug-pmol">Linear DNA µg to pmol of Ends Converter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the SDS-PAGE Gel calculator work out?', 'a' => <<<'TXT'
            30% acrylamide stock, 2% bis-acrylamide stock, Water and Best acrylamide percentage, from Acrylamide in the gel and Gel volume to pour. The relationship is 30% acrylamide stock = Acrylamide in the gel × Gel volume to pour ÷ 30.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Protein of interest (kDa), Acrylamide in the gel (%T), Crosslinker in the gel (%C), Gel volume to pour (mL). Enter protein of interest, acrylamide in the gel and crosslinker in the gel; 30% acrylamide stock is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. 30% acrylamide stock, Water, 2% bis-acrylamide stock and Best acrylamide percentage can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            30% acrylamide stock = 3.33 mL, Water = -7.33 mL, 2% bis-acrylamide stock = 13 mL, Best acrylamide percentage = 15 %T and Range this gel resolves = 150 kDa. Those are the defaults written into the form — move Protein of interest and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of 30% acrylamide stock is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Protein of interest blank and the page solves for it, reporting 30% acrylamide stock instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to 30% acrylamide stock at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/ligation', 'name' => 'Ligation'],
            ['path' => '/biology/lime-requirement', 'name' => 'Lime Requirement Calculator'],
            ['path' => '/biology/linear-dna-ends-ug-pmol', 'name' => 'Linear DNA µg to pmol of Ends Converter Calculator'],
        ],
        'authors' => [],
    ],
];
