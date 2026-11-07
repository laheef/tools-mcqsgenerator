<?php

/**
 * Bone Length to Body Height Calculator
 * /biology/bone-length-to-body-height
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bone Length to Body Height Calculator',
    'meta' => ['title' => 'Bone Length to Body Height Calculator — Biology', 'description' => 'A single long bone carries enough information to estimate how tall the person it belonged to was. It returns estimated stature, estimated stature and bone…', 'h1' => 'Bone Length to Body Height Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'bone',
                            'label' => 'Bone measured',
                            'type' => 'select',
                            'options' => ['Femur' => '1', 'Tibia' => '2', 'Humerus' => '3', 'Radius' => '4'],
                            'default' => 'Femur',
                        ],
                        [
                            'name' => 'sex',
                            'label' => 'Sex of the individual',
                            'type' => 'select',
                            'options' => ['Male' => '1', 'Female' => '0'],
                            'default' => 'Male',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Bone length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Maximum length of the bone, measured on an osteometric board',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                        [
                            'name' => 'height_cm',
                            'label' => 'Estimated stature',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'height_in',
                            'label' => 'Estimated stature',
                            'type' => 'number',
                            'suffix' => 'in',
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
            'title' => 'Stature',
            'results' => ['height_cm' => <<<'TXT'
            if_else(bone==1, if_else(sex>0, 2.38*length+61.41, 2.47*length+54.13), if_else(bone==2, if_else(sex>0, 2.52*length+78.62, 2.90*length+61.53), if_else(bone==3, if_else(sex>0, 2.89*length+78.10, 3.36*length+57.97), if_else(sex>0, 3.79*length+79.42, 4.74*length+54.93))))
            TXT, 'height_in' => 'height_cm/2.54', 'length' => <<<'TXT'
            if_else(bone==1, if_else(sex>0, (height_cm-61.41)/2.38, (height_cm-54.13)/2.47), if_else(bone==2, if_else(sex>0, (height_cm-78.62)/2.52, (height_cm-61.53)/2.90), if_else(bone==3, if_else(sex>0, (height_cm-78.10)/2.89, (height_cm-57.97)/3.36), if_else(sex>0, (height_cm-79.42)/3.79, (height_cm-54.93)/4.74))))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A single long bone carries enough information to estimate how tall the person it belonged to was. It returns estimated stature, estimated stature and bone length, and the panel shows all of them at once.
        
        This calculator applies the Trotter–Gleser regression equations to the length of a femur, tibia, humerus or radius and returns a stature estimate in centimetres and feet and inches.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Bone Length to Body Height', 'html' => <<<'TXT'
            <p>Stature (cm) = slope × bone length (cm) + intercept, with the slope and intercept chosen from the bone and the sex of the individual.</p>
            <figure class="calc-figure"><img src="/uploads/biology/bone-length-to-body-height.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Bone Length to Body Height Calculator — Bone type and sex pick the regression line; the length sets the position on it." title="Bone Length to Body Height Calculator"><figcaption>Bone type and sex pick the regression line; the length sets the position on it.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>bone length</code></td><td>maximum length of the measured bone</td><td>cm</td></tr><tr><td><code>slope</code></td><td>Trotter–Gleser regression coefficient for that bone and sex</td><td>—</td></tr><tr><td><code>intercept</code></td><td>regression constant for that bone and sex</td><td>cm</td></tr><tr><td><code>stature</code></td><td>estimated living height</td><td>cm / in</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Regression coefficients are those of Trotter & Gleser (1952, 1958), the equations still used as the reference standard in forensic anthropology.</p>
            TXT],
            ['title' => 'How do I use the Bone Length to Body Height?', 'html' => <<<'TXT'
            <ol><li>Choose which bone you measured and the sex recorded for the individual.</li><li>Enter the maximum length in centimetres — the whole bone, not a fragment.</li><li>Read the stature in centimetres; the same answer in feet and inches is shown beside it.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: bone measured set to <strong>1.0</strong>, sex of the individual set to <strong>1.0</strong>.</p>
            <p>Substituting them into the formula gives estimated stature of <strong>168.51</strong> cm, estimated stature of <strong>66.34</strong> in, bone length of <strong>45</strong> cm.</p>
            <p>A 45 cm femur from a male gives 2.38 × 45 + 61.41 = 168.5 cm, and the same femur from a female gives 165.3 cm — the two lines sit almost 3 cm apart.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>The estimate is a population average, not a prediction for one person: the standard error of the estimate is roughly ±4 cm for a femur and a little wider for the arm bones.</p></li><li><p>Measure the left side where possible. If only the right bone survives, apply the side correction of about 0.5–1 cm that the original papers report before comparing datasets.</p></li><li><p>The equations were derived on mid-20th-century North American samples. On very tall, very short or non-European populations they tend to pull towards the middle.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Using the female equation for a male skeleton (or the reverse) — the two differ by several centimetres at the same bone length, more than the measurement error.</li><li>Measuring a bone that is broken, worn or still has cartilage on the ends. Reconstruct the length first; a missing condyle can cost 1–3 cm.</li><li>Feeding a fragment length in and reading the stature off as if the bone were complete.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>Most real jobs need two or three of these together:</p><p><a href="/biology/bone-length-to-body-height">Bone length and stature</a>. <a href="/biology/femur-to-foot-ratio">Femur to foot ratio</a>. <a href="/biology/cephalic-index">Cephalic index</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How accurate is a height estimate from one bone?', 'a' => <<<'TXT'
            For a femur, the 95% prediction interval is about ±8 cm, so the estimate places a person within a stature band rather than at an exact height. Combining two bones narrows it.
            TXT],
            ['q' => 'Which bone gives the best estimate?', 'a' => 'The femur, then the tibia. Leg bones correlate most strongly with standing height because they carry most of it; the radius is the weakest of the four.'],
            ['q' => 'What does the Bone Length to Body Height actually calculate?', 'a' => 'It returns estimated stature, estimated stature and bone length. Each one is derived by the formula on this page, so you can check any figure by hand.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];
