<?php

/**
 * 3x rent
 * /finance/3x-rent
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => '3x rent',
    'meta' => ['title' => '3x rent Calculator — Formula, Units & Example', 'description' => '3x rent takes monthly rent and number of tenants and returns 3 times rent. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => '3x rent Calculator', 'updated' => '2026-09-09'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_monthly',
                            'label' => 'Monthly rent',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'consider_tenants',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Consider two or more tenants' => '1', '' => '0'],
                            'dataset' => 'no tenants',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tenants_number',
                            'label' => 'Number of tenants',
                            'type' => 'result',
                            'help' => 'How many people will rent the apartment?',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'three_times_rent',
                            'label' => '3 times rent',
                            'type' => 'number',
                            'help' => 'This is the required income per tenant to rent this apartment',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        The 3 times rent obtained for {{tenants_number.formattedValue}} tenants is the average gross income each tenant should have. Enter only one tenant if you want to see the total gross income instead.
                        TXT],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'three_times_rent = total_monthly * 3 / tenants_number',
            'results' => ['total_monthly' => '(1/3)*tenants_number*three_times_rent', 'three_times_rent' => '3*total_monthly/tenants_number', 'tenants_number' => '3*total_monthly/three_times_rent'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        3x rent takes Monthly rent and 3 times rent and returns Number of tenants. There is no hidden constant here: change number of tenants and monthly rent moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the 3x rent calculator works', 'html' => <<<'TXT'
            <p>3x rent answers one question from 2 numbers, and the answer is Number of tenants.</p><p>In the form&#039;s own words, 3 times rent = 3 × Monthly rent ÷ Number of tenants.</p><p>What comes back is Number of tenants — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Monthly rent</strong> — in USD</li><li><strong>3 times rent</strong> — in USD. This is the required income per tenant to rent this apartment</li></ul><p>The result box is Number of tenants. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Number of tenants takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>3 times rent</strong> = <code>3 × Monthly rent ÷ Number of tenants</code></li><li><strong>Monthly rent</strong> = <code>(1 ÷ 3) × Number of tenants × 3 times rent</code></li><li><strong>Number of tenants</strong> = <code>3 × Monthly rent ÷ 3 times rent</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>3 times rent</strong> = <code>3 × Monthly rent ÷ Number of tenants</code> — the form to use when Monthly rent and Number of tenants are the values you have.</li><li><strong>Monthly rent</strong> = <code>(1 ÷ 3) × Number of tenants × 3 times rent</code> — the form to use when Number of tenants and 3 times rent are the values you have.</li><li><strong>Number of tenants</strong> = <code>3 × Monthly rent ÷ 3 times rent</code> — the form to use when Monthly rent and 3 times rent are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of 3 times rent, Monthly rent and Number of tenants can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Number of tenants is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Monthly rent left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Monthly rent is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>3 times rent left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If 3 times rent is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Monthly rent to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Monthly rent</strong> takes a plain number with no unit attached. The page reads it when it works out 3 times rent and Number of tenants. Have it to hand before you start: Monthly rent is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>3 times rent</strong> takes a plain number with no unit attached. This is the required income per tenant to rent this apartment. The page reads it when it works out Monthly rent and Number of tenants. Have it to hand before you start: 3 times rent is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Number of tenants</strong> is a plain number. It is computed from Monthly rent and 3 times rent, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Monthly rent and 3 times rent. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Monthly rent into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Number of tenants with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Number of tenants follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Monthly rent and 3 times rent and the number you are missing is Number of tenants.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/california-sales-tax">California sales tax</a>, <a href="/finance/california-stimulus-check">California Stimulus Check Calculator</a> and <a href="/finance/california-tax">California tax Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>Neighbouring pages resolve the parts of the same job that 3x rent leaves alone. Knowing which is which saves running the wrong one:</p><p>Worth opening next: <a href="/finance/california-sales-tax">California sales tax</a>, <a href="/finance/california-stimulus-check">California Stimulus Check Calculator</a> and <a href="/finance/california-tax">California tax Calculator</a>. They follow the same pattern as this page (form, formula, worked example, answer), so a reader who understands one understands the others.</p><p>Using the page that already answers the question you have is better than adapting this one: the formula and the units will match what you expect, and the worked example will be about your case.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what 3x rent is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Monthly rent and 3 times rent beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the 3x rent calculator work out?', 'a' => 'Number of tenants, from Monthly rent and Number of tenants. The relationship is 3 times rent = 3 × Monthly rent ÷ Number of tenants.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Monthly rent (USD), 3 times rent (USD). Fill monthly rent and 3 times rent and leave Number of tenants empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. 3 times rent, Monthly rent and Number of tenants can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Number of tenants is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Monthly rent left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Number of tenants at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/california-sales-tax', 'name' => 'California sales tax'],
            ['path' => '/finance/california-stimulus-check', 'name' => 'California Stimulus Check Calculator'],
            ['path' => '/finance/california-tax', 'name' => 'California tax Calculator'],
        ],
        'authors' => [],
    ],
];
