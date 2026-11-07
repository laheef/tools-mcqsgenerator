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
    'meta' => ['title' => 'Bone Length to Body Height Calculator — Biology', 'description' => 'Enter bone measured, sex of the individual and bone length and Bone Length to Body Height Calculator returns estimated stature. It returns estimated stature.', 'h1' => 'Bone Length to Body Height Calculator', 'updated' => '2026-10-29'],
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
        Bone Length to Body Height takes Bone measured, Sex of the individual and Bone length and returns Estimated stature and Estimated stature. Nothing is looked up on this page: estimated stature is computed from bone measured and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Estimated stature is opened in cm; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Bone Length to Body Height calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Bone Length to Body Height: it takes 3 numbers and reports Estimated stature and Estimated stature.</p><p>The result panel carries Estimated stature and Estimated stature, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Bone measured</strong> — a plain number, no unit</li><li><strong>Sex of the individual</strong> — a plain number, no unit</li><li><strong>Bone length</strong> — in cm. Maximum length of the bone, measured on an osteometric board</li></ul><p>What you get back is Estimated stature in cm, Estimated stature in in, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Estimated stature takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Estimated stature</strong> = <code>Estimated stature ÷ 2.54</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Estimated stature</strong> = <code>Estimated stature ÷ 2.54</code> — the form to use when Estimated stature are the values you have.</li></ul><p>Any one of Estimated stature, Estimated stature and Bone length can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Estimated stature and Estimated stature are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Bone measured left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Bone measured is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Sex of the individual left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Sex of the individual is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Bone length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Bone length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Bone measured to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Bone measured</strong> takes a plain number with no unit attached. The page reads it when it works out Estimated stature and Bone length. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Bone measured is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Sex of the individual</strong> takes a plain number with no unit attached. The page reads it when it works out Estimated stature and Bone length. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Sex of the individual is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Bone length</strong> is measured in cm. Maximum length of the bone, measured on an osteometric board. The page reads it when it works out Estimated stature. Have it to hand before you start: Bone length is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Estimated stature</strong> is a plain number. The value follows from Bone measured, Sex of the individual and Bone length. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Estimated stature</strong> is a plain number. The value follows from Estimated stature. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Bone measured, Sex of the individual and Bone length. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Bone measured into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Estimated stature in cm with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Estimated stature follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Bone measured, Sex of the individual and Bone length are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Bone measured, Sex of the individual and Bone length and the number you are missing is Estimated stature and Estimated stature.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/hardy-weinberg-heterozygote">Hardy–Weinberg from the Heterozygote Frequency Calculator</a>, <a href="/biology/hardy-weinberg-recessive-allele">Hardy–Weinberg from the Recessive Allele Frequency Calculator</a> and <a href="/biology/hardy-weinberg-recessive-homozygote">Hardy–Weinberg from the Recessive Homozygote Frequency Calcula</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Bone Length to Body Height is a number to act on, so the useful question is what to do with Estimated stature (cm) and Estimated stature (in) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Bone measured, Sex of the individual and Bone length alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bone Length to Body Height calculator work out?', 'a' => 'Estimated stature and Estimated stature, from Bone measured, Sex of the individual and Bone length.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Bone measured, Sex of the individual, Bone length (cm). Fill bone measured, sex of the individual and bone length and leave Estimated stature empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Estimated stature, Estimated stature and Bone length blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Estimated stature is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Bone measured left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Estimated stature keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/hardy-weinberg-heterozygote', 'name' => 'Hardy–Weinberg from the Heterozygote Frequency Calculator'],
            ['path' => '/biology/hardy-weinberg-recessive-allele', 'name' => 'Hardy–Weinberg from the Recessive Allele Frequency Calculator'],
            ['path' => '/biology/hardy-weinberg-recessive-homozygote', 'name' => 'Hardy–Weinberg from the Recessive Homozygote Frequency Calcula'],
        ],
        'authors' => [],
    ],
];
