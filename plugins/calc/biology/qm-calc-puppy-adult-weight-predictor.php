<?php

/**
 * Puppy Adult Weight Predictor
 * /biology/puppy-adult-weight-predictor
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Puppy Adult Weight Predictor',
    'meta' => ['title' => 'Puppy Adult Weight Predictor — Formula & Results', 'description' => 'Puppy Adult Weight Predictor takes current weight and returns estimated adult weight. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Puppy Adult Weight Predictor', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Current weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'help' => 'At the age you enter below',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'age',
                            'label' => 'Current age',
                            'type' => 'number',
                            'suffix' => 'weeks',
                            'help' => 'Weeks old',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '14',
                        ],
                        [
                            'name' => 'size_class',
                            'label' => 'Predicted breed size',
                            'type' => 'select',
                            'options' => ['Small (<10 kg adult)' => '1', 'Medium (10–25 kg)' => '2', 'Large (25–45 kg)' => '3', 'Giant (>45 kg)' => '4'],
                            'default' => 'Medium (10–25 kg)',
                        ],
                        [
                            'name' => 'adult',
                            'label' => 'Estimated adult weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'low',
                            'label' => 'Likely range — low',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'high',
                            'label' => 'Likely range — high',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'remaining',
                            'label' => 'Growth still to come',
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
            'title' => 'Adult weight',
            'results' => [
                'adult' => <<<'TXT'
                if_else(size_class==1, weight*(1+max(0,0.30-age*0.004)), if_else(size_class==2, weight*(1+max(0,0.60-age*0.007)), if_else(size_class==3, weight*(1+max(0,1.10-age*0.010)), weight*(1+max(0,1.60-age*0.013)))))
                TXT,
                'low' => 'adult*0.9',
                'high' => 'adult*1.1',
                'remaining' => 'adult/weight',
                'weight' => 'adult/(1+max(0,0.60-age*0.007))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Current weight, Current age and Predicted breed size into Puppy Adult Weight Predictor and the answer comes back as Estimated adult weight and Likely range — low. It is a single relationship that reads estimated adult weight out of current weight, not a table of canned results keyed by them. Units for Estimated adult weight default to kg and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Puppy Adult Weight Predictor calculator works', 'html' => <<<'TXT'
            <p>Puppy Adult Weight Predictor answers one question from 3 numbers, and the answer is Estimated adult weight, Likely range — low and Likely range — high.</p><p>What comes back is Estimated adult weight, Likely range — low, Likely range — high and Growth still to come — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Current weight</strong> — in kg. At the age you enter below</li><li><strong>Current age</strong> — in weeks. Weeks old</li><li><strong>Predicted breed size</strong> — a plain number, no unit</li></ul><p>What you get back is Estimated adult weight in kg, Likely range — low in kg, Likely range — high in kg, Growth still to come in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Estimated adult weight is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Likely range — low</strong> = <code>Estimated adult weight × 0.9</code></li><li><strong>Likely range — high</strong> = <code>Estimated adult weight × 1.1</code></li><li><strong>Growth still to come</strong> = <code>Estimated adult weight ÷ Current weight</code></li><li><strong>Current weight</strong> = <code>Estimated adult weight ÷ (1 + max(0,0.60 − Current age × 0.007))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Likely range — low</strong> = <code>Estimated adult weight × 0.9</code> — the form to use when Estimated adult weight are the values you have.</li><li><strong>Likely range — high</strong> = <code>Estimated adult weight × 1.1</code> — the form to use when Estimated adult weight are the values you have.</li><li><strong>Growth still to come</strong> = <code>Estimated adult weight ÷ Current weight</code> — the form to use when Estimated adult weight and Current weight are the values you have.</li><li><strong>Current weight</strong> = <code>Estimated adult weight ÷ (1 + max(0,0.60 − Current age × 0.007))</code> — the form to use when Estimated adult weight and Current age are the values you have.</li></ul><p>Any one of Estimated adult weight, Likely range — low and Likely range — high can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Estimated adult weight, Likely range — low and Likely range — high are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Current weight left as a guess.</strong> Anything typed into Current weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Current age left as a guess.</strong> Anything typed into Current age is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Predicted breed size left as a guess.</strong> Anything typed into Predicted breed size is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Current weight and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Puppy Adult Weight Predictor form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current weight</strong> is measured in kg. At the age you enter below. The page reads it when it works out Estimated adult weight and Growth still to come. Fill it from a measurement rather than a memory — Current weight is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Current age</strong> is measured in weeks. The page reads it when it works out Estimated adult weight and Current weight. Fill it from a measurement rather than a memory — Current age is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Predicted breed size</strong> takes a plain number with no unit attached. The page reads it when it works out Estimated adult weight. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Predicted breed size is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Estimated adult weight</strong> is a plain number. The value follows from Predicted breed size, Current weight and Current age. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Likely range — low</strong> is a plain number. The value follows from Estimated adult weight. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Likely range — high</strong> is a plain number. The value follows from Estimated adult weight. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Growth still to come</strong> is a plain number. The value follows from Estimated adult weight and Current weight. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Current weight, Current age and Predicted breed size ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Current weight — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Estimated adult weight in kg against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Estimated adult weight is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Current weight, Current age and Predicted breed size is what you already know and Estimated adult weight and Likely range — low is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/beer-lambert-a280-protein-concentration">Beer-Lambert A280 Protein Concentration Calculator</a>, <a href="/biology/benadryl-dosage-for-dogs">Benadryl dosage for dogs</a> and <a href="/biology/berger-parker-index">Berger–Parker Index Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Puppy Adult Weight Predictor is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Puppy Adult Weight Predictor calculator work out?', 'a' => 'Estimated adult weight, Likely range — low, Likely range — high and Growth still to come, from Predicted breed size, Current weight and Current age.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Current weight (kg), Current age (weeks), Predicted breed size. Enter current weight, current age and predicted breed size; Estimated adult weight is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Estimated adult weight, Likely range — low, Likely range — high and Growth still to come blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Estimated adult weight is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Current weight blank and the page solves for it, reporting Estimated adult weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Estimated adult weight keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/beer-lambert-a280-protein-concentration', 'name' => 'Beer-Lambert A280 Protein Concentration Calculator'],
            ['path' => '/biology/benadryl-dosage-for-dogs', 'name' => 'Benadryl dosage for dogs'],
            ['path' => '/biology/berger-parker-index', 'name' => 'Berger–Parker Index Calculator'],
        ],
        'authors' => [],
    ],
];
