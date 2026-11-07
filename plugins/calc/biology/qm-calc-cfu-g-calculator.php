<?php

/**
 * CFU/g Calculator
 * /biology/cfu-g-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CFU/g Calculator',
    'meta' => ['title' => 'CFU/g Calculator — Formula, Steps & Examples', 'description' => 'CFU/g Calculator turns colonies counted and volume plated into CFU per gram. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'CFU/g Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'colonies',
                            'label' => 'Colonies counted',
                            'type' => 'number',
                            'suffix' => 'CFU',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '126',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Volume plated',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.1',
                        ],
                        [
                            'name' => 'dilution',
                            'label' => 'Dilution factor',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '10⁴ for a 1 g in 9 mL then 10⁻³ series',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10000',
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Sample weight',
                            'type' => 'number',
                            'suffix' => 'g',
                            'help' => 'Weight that went into the first dilution',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'cfu_g',
                            'label' => 'CFU per gram',
                            'type' => 'number',
                            'suffix' => 'CFU/g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cfu_log',
                            'label' => 'log₁₀(CFU/g)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_kg',
                            'label' => 'CFU per kg',
                            'type' => 'number',
                            'suffix' => 'CFU/kg',
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
            'title' => 'Count',
            'results' => ['cfu_g' => 'colonies/volume*dilution/weight', 'cfu_log' => 'log10(colonies/volume*dilution/weight)', 'per_kg' => 'colonies/volume*dilution/weight*1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        CFU/g turns Colonies counted, Volume plated and Dilution factor into CFU per gram and log₁₀(CFU/g). Nothing is looked up on this page: CFU per gram is computed from colonies counted and the other boxes, so an unusual pair of values gives an honest answer rather than an error. CFU per gram is opened in CFU/g; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the CFU/g calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind CFU/g: it takes 4 numbers and reports CFU per gram, log₁₀(CFU/g) and CFU per kg.</p><p>Written with the labels from the form, CFU per gram = Colonies counted ÷ Volume plated × Dilution factor ÷ Sample weight.</p><p>The answers are CFU per gram, log₁₀(CFU/g) and CFU per kg; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Colonies counted</strong> — in CFU</li><li><strong>Volume plated</strong> — in mL</li><li><strong>Dilution factor</strong> — in ×. 10⁴ for a 1 g in 9 mL then 10⁻³ series</li><li><strong>Sample weight</strong> — in g. Weight that went into the first dilution</li></ul><p>What you get back is CFU per gram in CFU/g, log₁₀(CFU/g), CFU per kg in CFU/kg, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Colonies counted = 126 CFU, Volume plated = 0.1 mL, Dilution factor = 10000 × and Sample weight = 1 g — through the same formula and the panel reports <strong>CFU per gram</strong> = 1.260e+7 CFU/g, <strong>log₁₀(CFU/g)</strong> = 7.1 and <strong>CFU per kg</strong> = 1.260e+1 CFU/kg.</p><ul><li><strong>CFU per gram</strong> = 1.260e+7 CFU/g</li><li><strong>log₁₀(CFU/g)</strong> = 7.1</li><li><strong>CFU per kg</strong> = 1.260e+1 CFU/kg</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>CFU per gram</strong> = <code>Colonies counted ÷ Volume plated × Dilution factor ÷ Sample weight</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>CFU per gram</strong> = 1.260e+7, <strong>log₁₀(CFU/g)</strong> = 7.1 and <strong>CFU per kg</strong> = 1.260e+1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: CFU per gram takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>CFU per gram</strong> = <code>Colonies counted ÷ Volume plated × Dilution factor ÷ Sample weight</code></li><li><strong>log₁₀(CFU/g)</strong> = <code>log₁₀(Colonies counted ÷ Volume plated × Dilution factor ÷ Sample weight)</code></li><li><strong>CFU per kg</strong> = <code>Colonies counted ÷ Volume plated × Dilution factor ÷ Sample weight × 1000</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>CFU per gram</strong> = <code>Colonies counted ÷ Volume plated × Dilution factor ÷ Sample weight</code> — the form to use when Colonies counted, Volume plated, Dilution factor and Sample weight are the values you have.</li><li><strong>log₁₀(CFU/g)</strong> = <code>log₁₀(Colonies counted ÷ Volume plated × Dilution factor ÷ Sample weight)</code> — the form to use when Colonies counted, Volume plated, Dilution factor and Sample weight are the values you have.</li><li><strong>CFU per kg</strong> = <code>Colonies counted ÷ Volume plated × Dilution factor ÷ Sample weight × 1000</code> — the form to use when Colonies counted, Volume plated, Dilution factor and Sample weight are the values you have.</li></ul><p>Any one of CFU per gram, log₁₀(CFU/g) and CFU per kg can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Colonies counted, from 126 to 252 — and the answers go from <strong>CFU per gram</strong> 1.260e+7 CFU/g, <strong>log₁₀(CFU/g)</strong> 7.1 and <strong>CFU per kg</strong> 1.260e+1 CFU/kg to <strong>CFU per gram</strong> 2.520e+7 CFU/g, <strong>log₁₀(CFU/g)</strong> 7.4 and <strong>CFU per kg</strong> 2.520e+1 CFU/kg.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with CFU per gram, log₁₀(CFU/g) and CFU per kg are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Colonies counted left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Colonies counted is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Volume plated left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Volume plated is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Dilution factor left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Dilution factor is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Colonies counted to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the CFU/g form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Colonies counted</strong> is measured in CFU. Change it and CFU per gram, log₁₀(CFU/g) and CFU per kg changes with it. Fill it from a measurement rather than a memory — Colonies counted is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Volume plated</strong> is measured in mL. Change it and CFU per gram, log₁₀(CFU/g) and CFU per kg changes with it. Fill it from a measurement rather than a memory — Volume plated is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Dilution factor</strong> is measured in ×. 10⁴ for a 1 g in 9 mL then 10⁻³ series. Change it and CFU per gram, log₁₀(CFU/g) and CFU per kg changes with it. Fill it from a measurement rather than a memory — Dilution factor is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Sample weight</strong> is measured in g. Weight that went into the first dilution. Change it and CFU per gram, log₁₀(CFU/g) and CFU per kg changes with it. Fill it from a measurement rather than a memory — Sample weight is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>CFU per gram</strong> is a plain number and the page's own defaults put it at 1.260e+7. It is worked out from Colonies counted, Volume plated, Dilution factor and Sample weight. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>log₁₀(CFU/g)</strong> is a plain number and the page's own defaults put it at 7.1. It is worked out from Colonies counted, Volume plated, Dilution factor and Sample weight. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>CFU per kg</strong> is a plain number and the page's own defaults put it at 1.260e+1. It is worked out from Colonies counted, Volume plated, Dilution factor and Sample weight. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>CFU per gram</th><th>log₁₀(CFU/g)</th><th>CFU per kg</th></tr></thead><tbody><tr><td><strong>Colonies counted</strong> +10%</td><td>+10%</td><td>+0.58%</td><td>+10%</td></tr><tr><td><strong>Volume plated</strong> +10%</td><td>-9.09%</td><td>-0.58%</td><td>-9.09%</td></tr><tr><td><strong>Dilution factor</strong> +10%</td><td>+10%</td><td>+0.58%</td><td>+10%</td></tr><tr><td><strong>Sample weight</strong> +10%</td><td>-9.09%</td><td>-0.58%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Colonies counted sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Colonies counted = 63 CFU, Volume plated = 0.05 mL, Dilution factor = 5000 × and Sample weight = 0.5 g and the page reports <strong>CFU per gram</strong> = 1.260e+7 CFU/g, <strong>log₁₀(CFU/g)</strong> = 7.1 and <strong>CFU per kg</strong> = 1.260e+1 CFU/kg.</li><li>Feed in Colonies counted = 378 CFU, Volume plated = 0.1 mL, Dilution factor = 10000 × and Sample weight = 1 g and the page reports <strong>CFU per gram</strong> = 3.780e+7 CFU/g, <strong>log₁₀(CFU/g)</strong> = 7.58 and <strong>CFU per kg</strong> = 3.780e+1 CFU/kg.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> CFU per gram follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Colonies counted, Volume plated and Dilution factor are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Colonies counted, Volume plated and Dilution factor and the number you are missing is CFU per gram and log₁₀(CFU/g).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/tree-height">Tree height</a>, <a href="/biology/tree-spacing">Tree spacing</a> and <a href="/biology/tree-value">Tree value Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CFU/g calculator work out?', 'a' => <<<'TXT'
            CFU per gram, log₁₀(CFU/g) and CFU per kg, from Colonies counted, Volume plated, Dilution factor and Sample weight. The relationship is CFU per gram = Colonies counted ÷ Volume plated × Dilution factor ÷ Sample weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Colonies counted (CFU), Volume plated (mL), Dilution factor (×), Sample weight (g). Fill colonies counted, volume plated and dilution factor and leave CFU per gram empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of CFU per gram, log₁₀(CFU/g) and CFU per kg blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            CFU per gram = 1.260e+7 CFU/g, log₁₀(CFU/g) = 7.1 and CFU per kg = 1.260e+1 CFU/kg. Those are the defaults written into the form — move Colonies counted and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally CFU per gram is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Colonies counted blank and the page solves for it, reporting CFU per gram instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. CFU per gram keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/tree-height', 'name' => 'Tree height'],
            ['path' => '/biology/tree-spacing', 'name' => 'Tree spacing'],
            ['path' => '/biology/tree-value', 'name' => 'Tree value Calculator'],
        ],
        'authors' => [],
    ],
];
