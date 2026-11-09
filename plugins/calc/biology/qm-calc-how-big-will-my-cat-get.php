<?php

/**
 * How big will my cat get
 * /biology/how-big-will-my-cat-get
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'How big will my cat get',
    'meta' => ['title' => 'How big will my cat get Calculator: Steps & Units', 'description' => 'How big will my cat get works out final size from your kitten\'s age and weight. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'How big will my cat get Calculator', 'updated' => '2026-08-19'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'age',
                            'label' => 'Your kitten\'s age',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Weight',
                            'type' => 'number',
                            'help' => 'Your kitten\'s weight at the given age.',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'final_size',
                            'label' => 'Final size',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'final_size >0 and final_size <= 8', 'text' => 'Your pet\'s going to be a small cat&nbsp; This type of cat typically weighs less than 8 pounds (3.6 kg)!'],
                                ['when' => 'final_size >8 and final_size <= 13', 'text' => 'Your pet\'s going to be a medium cat&nbsp; This type of cat typically weighs 8–13 pounds (3.6-5.9 kg)!'],
                                ['when' => 'final_size > 13', 'text' => 'Your pet\'s going to be a large cat&nbsp; This type of cat is usually larger than 13 pounds (5.9 kg)!&nbsp;'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => ' Build and customize your own tools instantly. Just type a simple sentence to generate a working calculator with zero coding.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'final_size = (weight / age) * 32',
            'results' => ['final_size' => '32*weight/age', 'weight' => '(1/32)*age*final_size', 'age' => '32*weight/final_size'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        How big will my cat get works out Final size from Your kitten's age and Weight. The arithmetic is the whole method: final size is worked out from your kitten's age by one formula, applied once. Final size comes back in kilograms unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the How big will my cat get calculator works', 'html' => <<<'TXT'
            <p>How big will my cat get answers one question from 2 numbers, and the answer is Final size.</p><p>The relationship it solves reads Final size = 32 × Weight ÷ Your kitten&#039;s age.</p><p>The result panel carries Final size, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Your kitten&#039;s age</strong> — in weeks</li><li><strong>Weight</strong> — in kilograms. Your kitten&#039;s weight at the given age.</li></ul><p>What you get back is Final size in kilograms, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Your kitten&amp;#039;s age = 10 wk and Weight = 100 kg — through the same formula and the panel reports <strong>Final size</strong> = 320 kg.</p><ul><li><strong>Final size</strong> = 320 kg</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Final size</strong> = <code>32 × Weight ÷ Your kitten&#039;s age</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Final size</strong> = 320. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Final size lists 7 options and opens on kilograms. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Final size</strong> = <code>32 × Weight ÷ Your kitten&#039;s age</code></li><li><strong>Weight</strong> = <code>(1 ÷ 32) × Your kitten&#039;s age × Final size</code></li><li><strong>Your kitten&#039;s age</strong> = <code>32 × Weight ÷ Final size</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Final size</strong> = <code>32 × Weight ÷ Your kitten&#039;s age</code> — the form to use when Weight and Your kitten&#039;s age are the values you have.</li><li><strong>Weight</strong> = <code>(1 ÷ 32) × Your kitten&#039;s age × Final size</code> — the form to use when Your kitten&#039;s age and Final size are the values you have.</li><li><strong>Your kitten&#039;s age</strong> = <code>32 × Weight ÷ Final size</code> — the form to use when Weight and Final size are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Final size, Weight and Your kitten&#039;s age can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Your kitten&#039;s age, from 10 to 20 — and the answers go from <strong>Final size</strong> 320 kg to <strong>Final size</strong> 160 kg.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Your kitten&#039;s age and Weight carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Final size is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Your kitten&#039;s age left as a guess.</strong> Anything typed into Your kitten&amp;#039;s age is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Weight left as a guess.</strong> Anything typed into Weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Your kitten&#039;s age is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Your kitten&#039;s age</strong> is a weeks quantity: the page opens it in wk and converts anything else you pick before the formula runs. Change it and Final size and Weight changes with it. Have it to hand before you start: Your kitten&#039;s age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. Your kitten&#039;s weight at the given age. Change it and Final size and Your kitten's age changes with it. Have it to hand before you start: Weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Final size</strong> is a kilograms figure and the page's own defaults put it at 320 kg. It is computed from Weight and Your kitten's age, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Final size</th></tr></thead><tbody><tr><td><strong>Your kitten&#039;s age</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Weight</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Weight: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Your kitten&#039;s age = 5 wk and Weight = 50 kg, the answer is <strong>Final size</strong> = 320 kg.</li><li>With Your kitten&#039;s age = 30 wk and Weight = 100 kg, the answer is <strong>Final size</strong> = 107 kg.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>weeks</strong> — opens in <em>wk</em>, and the chip also carries days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Your kitten&#039;s age and Weight. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Your kitten&amp;#039;s age into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Final size in kg with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Final size is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover kilograms and weeks. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Your kitten&#039;s age and Weight measured, Final size wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the How big will my cat get calculator work out?', 'a' => 'Final size, from Weight and Your kitten\'s age. The relationship is Final size = 32 × Weight ÷ Your kitten\'s age.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Your kitten\'s age (weeks), Weight (kilograms). Enter your kitten\'s age and weight; Final size is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Final size, Weight and Your kitten\'s age can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Final size = 320 kg. That comes from the page\'s own defaults, entered in Your kitten\'s age; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Final size is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Your kitten's age left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Final size keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/fish-per-liter', 'name' => 'Fish Per Liter Calculator'],
            ['path' => '/biology/fish-tank-stocking', 'name' => 'Fish Tank Stocking Calculator'],
            ['path' => '/biology/fixation-index-fst', 'name' => 'Fixation Index (Fst) Calculator'],
        ],
        'authors' => [],
    ],
];
