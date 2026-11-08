<?php

/**
 * Femur to Foot Ratio Calculator
 * /biology/femur-to-foot-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Femur to Foot Ratio Calculator',
    'meta' => ['title' => 'Femur to Foot Ratio Calculator: Steps & Units', 'description' => 'Femur to Foot Ratio Calculator turns two bone lengths into a ratio and a percentage, and solves for the missing one. Either bone can be the one you leave blank.', 'h1' => 'Femur to Foot Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'femur',
                            'label' => 'Femur length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Maximum length of the femur',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                        [
                            'name' => 'foot',
                            'label' => 'Foot length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Heel to the tip of the longest toe',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '26',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Femur to foot ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'foot_pct',
                            'label' => 'Foot length as % of femur',
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
            'title' => 'Ratio',
            'results' => ['ratio' => 'femur/foot', 'foot_pct' => 'foot/femur*100', 'femur' => 'ratio*foot', 'foot' => 'femur/ratio'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Femur to Foot Ratio takes Femur length and Foot length and returns Femur to foot ratio and Foot length as % of femur. The arithmetic is the whole method: femur to foot ratio is worked out from femur length by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Femur to Foot Ratio calculator works', 'html' => <<<'TXT'
            <p>The Femur to Foot Ratio calculator applies one relationship to 2 numbers and reports Femur to foot ratio and Foot length as % of femur.</p><p>The relationship it solves reads Femur to foot ratio = Femur length ÷ Foot length.</p><p>The result panel carries Femur to foot ratio and Foot length as % of femur, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Femur length</strong> — in cm. Maximum length of the femur</li><li><strong>Foot length</strong> — in cm. Heel to the tip of the longest toe</li></ul><p>The result boxes are Femur to foot ratio, Foot length as % of femur in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Femur length = 45 cm and Foot length = 26 cm; the answers are <strong>Femur to foot ratio</strong> = 1.73 and <strong>Foot length as % of femur</strong> = 57.78 %.</p><ul><li><strong>Femur to foot ratio</strong> = 1.73</li><li><strong>Foot length as % of femur</strong> = 57.78 %</li></ul><p>The line behind those figures is <strong>Femur to foot ratio</strong> = <code>Femur length ÷ Foot length</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Femur to foot ratio</strong> = 1.73 and <strong>Foot length as % of femur</strong> = 57.78 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Femur to foot ratio takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Femur to foot ratio</strong> = <code>Femur length ÷ Foot length</code></li><li><strong>Foot length as % of femur</strong> = <code>Foot length ÷ Femur length × 100</code></li><li><strong>Femur length</strong> = <code>Femur to foot ratio × Foot length</code></li><li><strong>Foot length</strong> = <code>Femur length ÷ Femur to foot ratio</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Femur to foot ratio</strong> = <code>Femur length ÷ Foot length</code> — the form to use when Femur length and Foot length are the values you have.</li><li><strong>Foot length as % of femur</strong> = <code>Foot length ÷ Femur length × 100</code> — the form to use when Foot length and Femur length are the values you have.</li><li><strong>Femur length</strong> = <code>Femur to foot ratio × Foot length</code> — the form to use when Femur to foot ratio and Foot length are the values you have.</li><li><strong>Foot length</strong> = <code>Femur length ÷ Femur to foot ratio</code> — the form to use when Femur length and Femur to foot ratio are the values you have.</li></ul><p>Any one of Femur to foot ratio, Foot length as % of femur and Femur length can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Femur length, from 45 to 90 — and the answers go from <strong>Femur to foot ratio</strong> 1.73 and <strong>Foot length as % of femur</strong> 57.78 % to <strong>Femur to foot ratio</strong> 3.46 and <strong>Foot length as % of femur</strong> 28.89 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Femur length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Femur length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Foot length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Foot length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Femur length and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Femur to Foot Ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Femur length</strong> is measured in cm. Maximum length of the femur. Change it and Femur to foot ratio, Foot length as % of femur and Foot length changes with it. Fill it from a measurement rather than a memory — Femur length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Foot length</strong> is measured in cm. Heel to the tip of the longest toe. Change it and Femur to foot ratio, Foot length as % of femur and Femur length changes with it. Fill it from a measurement rather than a memory — Foot length is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Femur to foot ratio</strong> is a plain number and the page's own defaults put it at 1.73. The value follows from Femur length and Foot length. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Foot length as % of femur</strong> is a plain number and the page's own defaults put it at 57.78. The value follows from Foot length and Femur length. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Femur to foot ratio</th><th>Foot length as % of femur</th></tr></thead><tbody><tr><td><strong>Femur length</strong> +10%</td><td>+10%</td><td>-9.09%</td></tr><tr><td><strong>Foot length</strong> +10%</td><td>-9.09%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Femur length sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Femur length = 22.5 cm and Foot length = 13 cm and the page reports <strong>Femur to foot ratio</strong> = 1.73 and <strong>Foot length as % of femur</strong> = 57.78 %.</li><li>Feed in Femur length = 135 cm and Foot length = 26 cm and the page reports <strong>Femur to foot ratio</strong> = 5.19 and <strong>Foot length as % of femur</strong> = 19.26 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Femur length and Foot length ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Femur length — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Femur to foot ratio against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Femur to foot ratio follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Femur length and Foot length are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Femur length and Foot length and the number you are missing is Femur to foot ratio and Foot length as % of femur.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/compost-application-rate">Compost Application Rate Calculator</a>, <a href="/biology/compost">Compost Calculator</a> and <a href="/biology/corn-yield">Corn yield Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Femur to Foot Ratio calculator work out?', 'a' => 'Femur to foot ratio and Foot length as % of femur, from Femur length and Foot length. The relationship is Femur to foot ratio = Femur length ÷ Foot length.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Femur length (cm), Foot length (cm). Fill femur length and foot length and leave Femur to foot ratio empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Femur to foot ratio, Foot length as % of femur, Femur length and Foot length blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Femur to foot ratio = 1.73 and Foot length as % of femur = 57.78 %. That comes from the page's own defaults, entered in Femur length; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Femur to foot ratio is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Femur length blank and the page solves for it, reporting Femur to foot ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Femur to foot ratio keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/compost-application-rate', 'name' => 'Compost Application Rate Calculator'],
            ['path' => '/biology/compost', 'name' => 'Compost Calculator'],
            ['path' => '/biology/corn-yield', 'name' => 'Corn yield Calculator'],
        ],
        'authors' => [],
    ],
];
