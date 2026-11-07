<?php

/**
 * Pig Weight Calculator
 * /biology/pig-weight
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pig Weight Calculator',
    'meta' => ['title' => 'Pig Weight Calculator: Formula, Steps & Results', 'description' => 'Pig Weight Calculator turns heart girth and body length into estimated live weight. Nothing is stored between visits, and the working stays on the page.', 'h1' => 'Pig Weight Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'girth',
                            'label' => 'Heart girth',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Circumference just behind the front legs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '110',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Body length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Between the ears to the base of the tail',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'unit',
                            'label' => 'Measured in',
                            'type' => 'select',
                            'options' => ['Centimetres' => '1', 'Inches' => '2'],
                            'default' => 'Centimetres',
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Estimated live weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'weight_lb',
                            'label' => 'Estimated live weight',
                            'type' => 'number',
                            'suffix' => 'lb',
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
            'title' => 'Live weight',
            'results' => ['weight' => 'if_else(unit==1, girth*girth*length/400, (girth*girth*length)*0.4536/400*16.387)', 'weight_lb' => 'weight*2.2046', 'girth' => 'sqrt(weight*400/length)', 'length' => 'weight*400/(girth*girth)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Pig Weight takes Heart girth, Body length and Measured in and returns Estimated live weight and Estimated live weight. It is a single relationship that reads estimated live weight out of heart girth, not a table of canned results keyed by them. Units for Estimated live weight default to kg and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Pig Weight calculator works', 'html' => <<<'TXT'
            <p>The Pig Weight calculator applies one relationship to 3 numbers and reports Estimated live weight and Estimated live weight.</p><p>Written with the labels from the form, Estimated live weight = if_else(Measured in==1, Heart girth × Heart girth × Body length ÷ 400, (Heart girth × Heart girth × Body length) × 0.454 ÷ 400 × 16.387).</p><p>The answers are Estimated live weight and Estimated live weight; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Heart girth</strong> — in cm. Circumference just behind the front legs</li><li><strong>Body length</strong> — in cm. Between the ears to the base of the tail</li><li><strong>Measured in</strong> — a plain number, no unit</li></ul><p>What you get back is Estimated live weight in kg, Estimated live weight in lb, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Estimated live weight takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Estimated live weight</strong> = <code>if_else(Measured in==1, Heart girth × Heart girth × Body length ÷ 400, (Heart girth × Heart girth × Body length) × 0.454 ÷ 400 × 16.387)</code></li><li><strong>Heart girth</strong> = <code>√(Estimated live weight × 400 ÷ Body length)</code></li><li><strong>Body length</strong> = <code>Estimated live weight × 400 ÷ (Heart girth × Heart girth)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Estimated live weight</strong> = <code>if_else(Measured in==1, Heart girth × Heart girth × Body length ÷ 400, (Heart girth × Heart girth × Body length) × 0.454 ÷ 400 × 16.387)</code> — the form to use when Measured in, Heart girth and Body length are the values you have.</li><li><strong>Estimated live weight</strong> = <code>Estimated live weight × 2.205</code> — the form to use when Estimated live weight are the values you have.</li><li><strong>Heart girth</strong> = <code>√(Estimated live weight × 400 ÷ Body length)</code> — the form to use when Estimated live weight and Body length are the values you have.</li><li><strong>Body length</strong> = <code>Estimated live weight × 400 ÷ (Heart girth × Heart girth)</code> — the form to use when Estimated live weight and Heart girth are the values you have.</li></ul><p>Any one of Estimated live weight, Estimated live weight and Heart girth can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Estimated live weight and Estimated live weight are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Heart girth left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Heart girth is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Body length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Body length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measured in left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Measured in is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Heart girth to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Pig Weight form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Heart girth</strong> is measured in cm. Circumference just behind the front legs. The page reads it when it works out Estimated live weight and Body length. Fill it from a measurement rather than a memory — Heart girth is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Body length</strong> is measured in cm. Between the ears to the base of the tail. The page reads it when it works out Estimated live weight and Heart girth. Fill it from a measurement rather than a memory — Body length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Measured in</strong> takes a plain number with no unit attached. The page reads it when it works out Estimated live weight. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Measured in is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Estimated live weight</strong> is a plain number. It is worked out from Measured in, Heart girth and Body length. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Estimated live weight</strong> is a plain number. It is worked out from Estimated live weight. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Heart girth, Body length and Measured in ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Heart girth — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Estimated live weight in kg against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Estimated live weight is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Heart girth, Body length and Measured in and the number you are missing is Estimated live weight and Estimated live weight.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/cricket-chirp-thermometer">Crickets chirping thermometer Calculator</a>, <a href="/biology/crop-coefficient">Crop Coefficient Calculator</a> and <a href="/biology/crop-water-requirement">Crop Water Requirement (ETc) Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Pig Weight is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pig Weight calculator work out?', 'a' => <<<'TXT'
            Estimated live weight and Estimated live weight, from Measured in, Heart girth and Body length. The relationship is Estimated live weight = if_else(Measured in==1, Heart girth × Heart girth × Body length ÷ 400, (Heart girth × Heart girth × Body length) × 0.454 ÷ 400 × 16.387).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Heart girth (cm), Body length (cm), Measured in. With heart girth, body length and measured in in place, Estimated live weight can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Estimated live weight, Estimated live weight, Heart girth and Body length blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Estimated live weight is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Heart girth blank and the page solves for it, reporting Estimated live weight instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Estimated live weight keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/cricket-chirp-thermometer', 'name' => 'Crickets chirping thermometer Calculator'],
            ['path' => '/biology/crop-coefficient', 'name' => 'Crop Coefficient Calculator'],
            ['path' => '/biology/crop-water-requirement', 'name' => 'Crop Water Requirement (ETc) Calculator'],
        ],
        'authors' => [],
    ],
];
