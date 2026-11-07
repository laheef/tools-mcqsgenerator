<?php

/**
 * Dog quality of life
 * /biology/dog-quality-of-life
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog quality of life',
    'meta' => ['title' => 'Dog quality of life — Free Online Calculator', 'description' => 'Enter Mobility, Nutrition (food intake) and Hydration (water intake) into dog quality of life and the answer comes back as results. A worked example follows.', 'h1' => 'Dog quality of life Calculator', 'updated' => '2026-08-10'],
    'raw' => [
        'vars' => [
            'item1' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => '8sGHxdXKoGDpxOFbptD01'],
            'item2' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'bzbDGvhVn5TYWpBWwrTF6'],
            'item3' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'tzm4ypFs70eS7p5T6HqVQ'],
            'item4' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'XcazeDkn-_kri5kYngEIN'],
            'item5' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => '3AKr1ovOIG40EiqDKHWlY'],
            'item6' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'VZo0_JsO_6YCinkqc2omQ'],
            'results' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'RF19CQlhbVQGtIpWVUEDV',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'Below are key factors that contribute to your dog\'s quality of life. Use your honest judgment and select which options apply to your dog most accurately.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'item1',
                                    'vt' => 'valueSelect',
                                    'l' => 'Mobility',
                                    'h' => 'Your dog\'s ability to move and get from one place to another. &nbsp;',
                                    'ds' => '8sGHxdXKoGDpxOFbptD01',
                                    'opts' => [
                                        ['sap_OqDDR_lD-SmvJBHLi', 'Bare minimum', '0'],
                                        ['ZlpHQ6FV7G9xpXrRTivoF', 'Poor', '1'],
                                        ['qIVjB5jhoToIW9eYtS9xE', 'Good', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'item2',
                                    'vt' => 'valueSelect',
                                    'l' => 'Nutrition (food intake)',
                                    'ds' => 'bzbDGvhVn5TYWpBWwrTF6',
                                    'opts' => [
                                        ['d50lV-rVKZJ9Eoen6AIyu', 'None', '0'],
                                        ['K4IYjOTCnrsoPuCiQvy2a', 'Poor or requires hand feeding', '1'],
                                        ['YqVdZdclSsqT-25EOXh3D', 'Good', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'item3',
                                    'vt' => 'valueSelect',
                                    'l' => 'Hydration (water intake)',
                                    'ds' => 'tzm4ypFs70eS7p5T6HqVQ',
                                    'opts' => [
                                        ['9yQwTuF63xyIwaQCCYoeE', ' No intake (not drinking)', '0'],
                                        ['YyuJEpevd_Zlhz9YVMEwE', 'Poor or increased intake', '1'],
                                        ['xe4c0uRQTC_UCbDgVjjhw', ' Adequate intake', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'item6',
                                    'vt' => 'valueSelect',
                                    'l' => 'Urination and defecation.',
                                    'ds' => 'VZo0_JsO_6YCinkqc2omQ',
                                    'opts' => [
                                        ['5TgC2ZLkQUP-NshTQ_TUU', 'None', '0'],
                                        ['qlx4yBweHVxmu_GWWmh1e', 'Reduced or irregular ', '1'],
                                        ['c4djlDL0McdcxrpIZ52-w', 'Normal ', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'item4',
                                    'vt' => 'valueSelect',
                                    'l' => 'Interaction and attitude',
                                    'ds' => 'XcazeDkn-_kri5kYngEIN',
                                    'opts' => [
                                        ['e7atfEuSQIE57MDb42z3n', 'Hides in the closet or under the bed', '0'],
                                        ['4O7nf2YN4MEY9oN30LdGp', 'Some Interaction', '1'],
                                        ['fi_bxctRZAmmija8DEvLb', 'Interacts normally ', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'item5',
                                    'vt' => 'valueSelect',
                                    'l' => 'Favorite things',
                                    'ds' => '3AKr1ovOIG40EiqDKHWlY',
                                    'opts' => [
                                        ['LDgNQXf_OG5TxsqJAw3ka', 'No interest in their favorite toys and activities', '0'],
                                        ['6Y1rTYKGYX_3iecJCr_F6', 'Decrease of interest in their favorite toys and activities', '1'],
                                        ['0q50aFAlJXN4y5nf0s1P-', ' Normal enthusiasm for favorite toys and activities', '2'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'results', 'vt' => 'numerical', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        ['results <= 5', 'Unfortunately, this result is low and it may be a reason to consider that your pet is suffering.&nbsp;'],
                                        ['results >= 6 and results<=8', <<<'TXT'
                                        According to this results, your dog's quality of life may require intervention. Consider making an appointment with your local veterinarian to address the necessary behavioral and health changes of your four-legged best friend's lifestyle
                                        TXT],
                                        ['results>=9 and  results<=12', '🎉 Congratulations, this result means that everything is okay, and your dog has a good quality of life.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'results =  one_way(item1 + item2 + item3 + item4 + item5 + item6)',
                'var' => [
                    [
                        'l' => 'results',
                        'f' => '(item1 + item2 + item3 + item4 + item5 + item6)',
                        'r' => [
                            'item1',
                            'item2',
                            'item3',
                            'item4',
                            'item5',
                            'item6',
                        ],
                    ],
                ],
            ],
        ],
        'datasets' => [
            '8sGHxdXKoGDpxOFbptD01' => [
                'name' => 'Mobility',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'sap_OqDDR_lD-SmvJBHLi', 'label' => 'Bare minimum', 'value' => '0'],
                    ['uid' => 'ZlpHQ6FV7G9xpXrRTivoF', 'label' => 'Poor', 'value' => '1'],
                    ['uid' => 'qIVjB5jhoToIW9eYtS9xE', 'label' => 'Good', 'value' => '2'],
                ],
            ],
            'bzbDGvhVn5TYWpBWwrTF6' => [
                'name' => 'Appetite',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'd50lV-rVKZJ9Eoen6AIyu', 'label' => 'None', 'value' => '0'],
                    ['uid' => 'K4IYjOTCnrsoPuCiQvy2a', 'label' => 'Poor or requires hand feeding', 'value' => '1'],
                    ['uid' => 'YqVdZdclSsqT-25EOXh3D', 'label' => 'Good', 'value' => '2'],
                ],
            ],
            'tzm4ypFs70eS7p5T6HqVQ' => [
                'name' => 'Hydration',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '9yQwTuF63xyIwaQCCYoeE', 'label' => ' No intake (not drinking)', 'value' => '0'],
                    ['uid' => 'YyuJEpevd_Zlhz9YVMEwE', 'label' => 'Poor or increased intake', 'value' => '1'],
                    ['uid' => 'xe4c0uRQTC_UCbDgVjjhw', 'label' => ' Adequate intake', 'value' => '2'],
                ],
            ],
            'XcazeDkn-_kri5kYngEIN' => [
                'name' => 'INTERACTION',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'e7atfEuSQIE57MDb42z3n', 'label' => 'Hides in the closet or under the bed', 'value' => '0'],
                    ['uid' => '4O7nf2YN4MEY9oN30LdGp', 'label' => 'Some Interaction', 'value' => '1'],
                    ['uid' => 'fi_bxctRZAmmija8DEvLb', 'label' => 'Interacts normally ', 'value' => '2'],
                ],
            ],
            'VZo0_JsO_6YCinkqc2omQ' => [
                'name' => 'elimination (urination and/or defecation)',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '5TgC2ZLkQUP-NshTQ_TUU', 'label' => 'None', 'value' => '0'],
                    ['uid' => 'qlx4yBweHVxmu_GWWmh1e', 'label' => 'Reduced or irregular ', 'value' => '1'],
                    ['uid' => 'c4djlDL0McdcxrpIZ52-w', 'label' => 'Normal ', 'value' => '2'],
                ],
            ],
            '3AKr1ovOIG40EiqDKHWlY' => [
                'name' => 'FAVORITE THINGS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'LDgNQXf_OG5TxsqJAw3ka', 'label' => 'No interest in their favorite toys and activities', 'value' => '0'],
                    ['uid' => '6Y1rTYKGYX_3iecJCr_F6', 'label' => 'Decrease of interest in their favorite toys and activities', 'value' => '1'],
                    ['uid' => '0q50aFAlJXN4y5nf0s1P-', 'label' => ' Normal enthusiasm for favorite toys and activities', 'value' => '2'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Mobility, Nutrition (food intake) and Hydration (water intake) into Dog quality of life and the answer comes back as results. Nothing is looked up on this page: results is computed from mobility and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Dog quality of life calculator works', 'html' => <<<'TXT'
            <p>The Dog quality of life calculator applies one relationship to 6 numbers and reports results.</p><p>The relationship it solves reads results = (Mobility + Nutrition (food intake) + Hydration (water intake) + Interaction and attitude + Favorite things + Urination and defecation.).</p><p>What comes back is results — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 6 boxes, and nothing else.</p><ul><li><strong>Mobility</strong> — a plain number, no unit. Your dog&#039;s ability to move and get from one place to another. &amp;nbsp;</li><li><strong>Nutrition (food intake)</strong> — a plain number, no unit</li><li><strong>Hydration (water intake)</strong> — a plain number, no unit</li><li><strong>Urination and defecation</strong> — a plain number, no unit</li><li><strong>Interaction and attitude</strong> — a plain number, no unit</li><li><strong>Favorite things</strong> — a plain number, no unit</li></ul><p>The result box is results. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as results is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>results</strong> = <code>(Mobility + Nutrition (food intake) + Hydration (water intake) + Interaction and attitude + Favorite things + Urination and defecation.)</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> results is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Mobility left as a guess.</strong> Anything typed into Mobility is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Nutrition (food intake) left as a guess.</strong> Anything typed into Nutrition (food intake) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Hydration (water intake) left as a guess.</strong> Anything typed into Hydration (water intake) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Mobility is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dog quality of life form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Mobility</strong> takes a plain number with no unit attached. Your dog&#039;s ability to move and get from one place to another. &amp;nbsp;. The page reads it when it works out results. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Mobility is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Nutrition (food intake)</strong> takes a plain number with no unit attached. The page reads it when it works out results. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Nutrition (food intake) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Hydration (water intake)</strong> takes a plain number with no unit attached. The page reads it when it works out results. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Hydration (water intake) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Urination and defecation</strong> takes a plain number with no unit attached. The page reads it when it works out results. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Urination and defecation is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interaction and attitude</strong> takes a plain number with no unit attached. The page reads it when it works out results. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Interaction and attitude is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Favorite things</strong> takes a plain number with no unit attached. The page reads it when it works out results. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Favorite things is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>results</strong> is a plain number. The value follows from Mobility, Nutrition (food intake), Hydration (water intake) and Interaction and attitude. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Mobility, Nutrition (food intake), Hydration (water intake) and Urination and defecation ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Mobility — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check results against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind results is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Mobility, Nutrition (food intake) and Hydration (water intake) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Mobility, Nutrition (food intake) and Hydration (water intake) measured, results wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/guinea-pig-age">Guinea pig years to human years</a>, <a href="/biology/gypsum-application-rate">Gypsum Application Rate Calculator</a> and <a href="/biology/hamster-age">Hamster age Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Dog quality of life is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog quality of life calculator work out?', 'a' => <<<'TXT'
            results, from Mobility, Nutrition (food intake), Hydration (water intake) and Interaction and attitude. The relationship is results = (Mobility + Nutrition (food intake) + Hydration (water intake) + Interaction and attitude + Favorite things + Urination and defecation.).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Mobility, Nutrition (food intake), Hydration (water intake), Urination and defecation, Interaction and attitude. Fill mobility, nutrition (food intake) and hydration (water intake) and leave results empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of results is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: results is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. results keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/guinea-pig-age', 'name' => 'Guinea pig years to human years'],
            ['path' => '/biology/gypsum-application-rate', 'name' => 'Gypsum Application Rate Calculator'],
            ['path' => '/biology/hamster-age', 'name' => 'Hamster age Calculator'],
        ],
        'authors' => [],
    ],
];
