<?php

/**
 * Plants Per Hectare Calculator
 * /biology/plants-per-hectare
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Plants Per Hectare Calculator',
    'meta' => ['title' => 'Plants Per Hectare Calculator — Formula & Results', 'description' => 'Enter area to plant, row spacing and in-row spacing and Plants Per Hectare Calculator returns plants needed and space per plant. Every figure is computed.', 'h1' => 'Plants Per Hectare Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Area to plant',
                            'type' => 'number',
                            'suffix' => 'ha',
                            'help' => '1 hectare = 10 000 m²',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'row_cm',
                            'label' => 'Row spacing',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Distance between rows',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '75',
                        ],
                        [
                            'name' => 'plant_cm',
                            'label' => 'In-row spacing',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Distance between plants in a row',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'loss_pct',
                            'label' => 'Expected losses',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Germination gaps, pest damage, headlands',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'plants',
                            'label' => 'Plants needed',
                            'type' => 'number',
                            'help' => 'After losses',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'plants_per_ha',
                            'label' => 'Plants per hectare',
                            'type' => 'number',
                            'suffix' => '/ha',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'area_per_plant',
                            'label' => 'Space per plant',
                            'type' => 'number',
                            'suffix' => 'm²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'seedlings',
                            'label' => 'Seedlings to buy',
                            'type' => 'number',
                            'help' => 'Plants plus losses, rounded up',
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
            'results' => ['area_per_plant' => 'row_cm*plant_cm/10000', 'plants_per_ha' => '10000/(row_cm*plant_cm/10000)', 'plants' => 'area*10000/(row_cm*plant_cm/10000)*(1+loss_pct/100)', 'seedlings' => 'round(area*10000/(row_cm*plant_cm/10000)*(1+loss_pct/100))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Plants Per Hectare works out Plants needed and Plants per hectare from Area to plant, Row spacing and In-row spacing. Nothing is looked up on this page: plants needed is computed from area to plant and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Plants Per Hectare calculator works', 'html' => <<<'TXT'
            <p>Plants Per Hectare answers one question from 4 numbers, and the answer is Plants needed, Plants per hectare and Space per plant.</p><p>The relationship it solves reads Space per plant = Row spacing × In-row spacing ÷ 10000.</p><p>The result panel carries Plants needed, Plants per hectare, Space per plant and Seedlings to buy, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Area to plant</strong> — in ha. 1 hectare = 10 000 m²</li><li><strong>Row spacing</strong> — in cm. Distance between rows</li><li><strong>In-row spacing</strong> — in cm. Distance between plants in a row</li><li><strong>Expected losses</strong> — in %. Germination gaps, pest damage, headlands</li></ul><p>The result boxes are Plants needed, Plants per hectare in /ha, Space per plant in m², Seedlings to buy; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Area to plant = 1 ha, Row spacing = 75 cm, In-row spacing = 30 cm and Expected losses = 5 %; the answers are <strong>Space per plant</strong> = 0.225 m², <strong>Plants per hectare</strong> = 44444 /ha, <strong>Plants needed</strong> = 46667 and <strong>Seedlings to buy</strong> = 46667.</p><ul><li><strong>Space per plant</strong> = 0.225 m²</li><li><strong>Plants per hectare</strong> = 44444 /ha</li><li><strong>Plants needed</strong> = 46667</li><li><strong>Seedlings to buy</strong> = 46667</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Space per plant</strong> = <code>Row spacing × In-row spacing ÷ 10000</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Space per plant</strong> = 0.225, <strong>Plants per hectare</strong> = 44444, <strong>Plants needed</strong> = 46667 and <strong>Seedlings to buy</strong> = 46667. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Plants needed is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Space per plant</strong> = <code>Row spacing × In-row spacing ÷ 10000</code></li><li><strong>Plants per hectare</strong> = <code>10000 ÷ (Row spacing × In-row spacing ÷ 10000)</code></li><li><strong>Plants needed</strong> = <code>Area to plant × 10000 ÷ (Row spacing × In-row spacing ÷ 10000) × (1 + Expected losses ÷ 100)</code></li><li><strong>Seedlings to buy</strong> = <code>round(Area to plant × 10000 ÷ (Row spacing × In-row spacing ÷ 10000) × (1 + Expected losses ÷ 100))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Space per plant</strong> = <code>Row spacing × In-row spacing ÷ 10000</code> — the form to use when Row spacing and In-row spacing are the values you have.</li><li><strong>Plants per hectare</strong> = <code>10000 ÷ (Row spacing × In-row spacing ÷ 10000)</code> — the form to use when Row spacing and In-row spacing are the values you have.</li><li><strong>Plants needed</strong> = <code>Area to plant × 10000 ÷ (Row spacing × In-row spacing ÷ 10000) × (1 + Expected losses ÷ 100)</code> — the form to use when Area to plant, Row spacing, In-row spacing and Expected losses are the values you have.</li><li><strong>Seedlings to buy</strong> = <code>round(Area to plant × 10000 ÷ (Row spacing × In-row spacing ÷ 10000) × (1 + Expected losses ÷ 100))</code> — the form to use when Area to plant, Row spacing, In-row spacing and Expected losses are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Space per plant, Plants per hectare and Plants needed can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Area to plant, from 1 to 2 — and the answers go from <strong>Space per plant</strong> 0.225 m², <strong>Plants per hectare</strong> 44444 /ha, <strong>Plants needed</strong> 46667 and <strong>Seedlings to buy</strong> 46667 to <strong>Space per plant</strong> 0.225 m², <strong>Plants per hectare</strong> 44444 /ha, <strong>Plants needed</strong> 93333 and <strong>Seedlings to buy</strong> 93333.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Plants needed, Plants per hectare and Space per plant are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Area to plant left as a guess.</strong> Anything typed into Area to plant is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Row spacing left as a guess.</strong> Anything typed into Row spacing is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>In-row spacing left as a guess.</strong> Anything typed into In-row spacing is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Area to plant and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Plants Per Hectare form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Area to plant</strong> is measured in ha. 1 hectare = 10 000 m². The page reads it when it works out Plants needed and Seedlings to buy. Fill it from a measurement rather than a memory — Area to plant is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Row spacing</strong> is measured in cm. Distance between rows. The page reads it when it works out Space per plant, Plants per hectare and Plants needed. Fill it from a measurement rather than a memory — Row spacing is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>In-row spacing</strong> is measured in cm. Distance between plants in a row. The page reads it when it works out Space per plant, Plants per hectare and Plants needed. Fill it from a measurement rather than a memory — In-row spacing is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Expected losses</strong> is measured in %. Germination gaps, pest damage, headlands. The page reads it when it works out Plants needed and Seedlings to buy. Fill it from a measurement rather than a memory — Expected losses is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Plants needed</strong> is a plain number and the page's own defaults put it at 46667. The value follows from Area to plant, Row spacing, In-row spacing and Expected losses. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Plants per hectare</strong> is a plain number and the page's own defaults put it at 44444. The value follows from Row spacing and In-row spacing. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Space per plant</strong> is a plain number and the page's own defaults put it at 0.225. The value follows from Row spacing and In-row spacing. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Seedlings to buy</strong> is a plain number and the page's own defaults put it at 46667. The value follows from Area to plant, Row spacing, In-row spacing and Expected losses. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Space per plant</th><th>Plants per hectare</th><th>Plants needed</th><th>Seedlings to buy</th></tr></thead><tbody><tr><td><strong>Area to plant</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Row spacing</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>In-row spacing</strong> +10%</td><td>+10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Expected losses</strong> +10%</td><td>+0%</td><td>+0%</td><td>+0.48%</td><td>+0.48%</td></tr></tbody></table><p>The steepest column belongs to Row spacing: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Expected losses barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Area to plant = 0.5 ha, Row spacing = 37.5 cm, In-row spacing = 15 cm and Expected losses = 2.5 % and the page reports <strong>Space per plant</strong> = 0.0563 m², <strong>Plants per hectare</strong> = 177778 /ha, <strong>Plants needed</strong> = 91111 and <strong>Seedlings to buy</strong> = 91111.</li><li>Feed in Area to plant = 3 ha, Row spacing = 75 cm, In-row spacing = 30 cm and Expected losses = 5 % and the page reports <strong>Space per plant</strong> = 0.225 m², <strong>Plants per hectare</strong> = 44444 /ha, <strong>Plants needed</strong> = 140000 and <strong>Seedlings to buy</strong> = 140000.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Plants needed is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Area to plant, Row spacing and In-row spacing are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Area to plant, Row spacing and In-row spacing and the number you are missing is Plants needed and Plants per hectare.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/rabbit-gestation">Rabbit gestation Calculator</a>, <a href="/biology/raised-bed-soil">Raised bed soil Calculator</a> and <a href="/biology/random-sequence-generator">Random Sequence Generator Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Plants Per Hectare calculator work out?', 'a' => <<<'TXT'
            Plants needed, Plants per hectare, Space per plant and Seedlings to buy, from Row spacing and In-row spacing. The relationship is Space per plant = Row spacing × In-row spacing ÷ 10000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Area to plant (ha), Row spacing (cm), In-row spacing (cm), Expected losses (%). With area to plant, row spacing and in-row spacing in place, Plants needed can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Space per plant, Plants per hectare, Plants needed and Seedlings to buy can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Space per plant = 0.225 m², Plants per hectare = 44444 /ha, Plants needed = 46667 and Seedlings to buy = 46667. That comes from the page's own defaults, entered in Area to plant; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Plants needed is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Area to plant blank and the page solves for it, reporting Plants needed instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Plants needed at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/rabbit-gestation', 'name' => 'Rabbit gestation Calculator'],
            ['path' => '/biology/raised-bed-soil', 'name' => 'Raised bed soil Calculator'],
            ['path' => '/biology/random-sequence-generator', 'name' => 'Random Sequence Generator Calculator'],
        ],
        'authors' => [],
    ],
];
