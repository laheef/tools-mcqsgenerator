<?php

/**
 * Trump tax
 * /finance/trump-tax
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Trump tax',
    'meta' => ['title' => 'Trump tax Calculator — Formula, Units & Example', 'description' => 'Trump tax reports you paid..., Dom Perignon bottles, Pounds of Ossetra caviar and tiffany rings. Every box can be solved for, not only the one in the title.', 'h1' => 'Trump tax Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'your_tax',
                            'label' => 'Your tax in 2019',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '9302',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trump_tax',
                            'label' => 'Trump\'s tax',
                            'type' => 'number',
                            'prefix' => '$',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '750',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'times_more',
                            'label' => 'You paid...',
                            'type' => 'number',
                            'suffix' => 'x more than Trump!',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'If you paid as little as Trump, over a year you could use the rest to splurge on...',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'champagne',
                            'label' => 'Dom Perignon bottles ',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'caviar',
                            'label' => 'Pounds of Ossetra caviar ',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rings',
                            'label' => 'Tiffany rings ',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'vodka',
                            'label' => 'Bottles of Trump Premium Vodka ',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rolex',
                            'label' => 'Rolex watches ⌚',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'If Trump paid the same taxes as you do, over a year the US could fund additional...',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'covid_masks',
                            'label' => 'Masks',
                            'type' => 'number',
                            'suffix' => 'N95 masks ',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'purell',
                            'label' => 'Hand sanitizer ',
                            'type' => 'number',
                            'suffix' => 'liters of Purell ',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'covid_tests',
                            'label' => 'COVID tests ',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'food_stamps_months',
                            'label' => 'Food stamps ',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'textbooks',
                            'label' => 'Sets of textbooks for',
                            'type' => 'number',
                            'suffix' => 'students ',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'times_more = your_tax / trump_tax',
            'results' => ['trump_tax' => 'your_tax/times_more', 'times_more' => 'your_tax/trump_tax', 'your_tax' => 'times_more*trump_tax'],
        ],
        [
            'title' => 'vodka = (your_tax  -trump_tax) / 4800',
            'results' => ['trump_tax' => '-4800*vodka + your_tax', 'vodka' => '-1/4800*trump_tax + (1/4800)*your_tax', 'your_tax' => 'trump_tax + 4800*vodka'],
        ],
        [
            'title' => 'champagne = (your_tax  -trump_tax) / 199.97',
            'results' => ['trump_tax' => '-19997/100*champagne + your_tax', 'champagne' => '-100/19997*trump_tax + (100/19997)*your_tax', 'your_tax' => '(19997/100)*champagne + trump_tax'],
        ],
        [
            'title' => 'caviar = (your_tax  -trump_tax) / (114*4.54)',
            'results' => ['caviar' => '-25/12939*trump_tax + (25/12939)*your_tax', 'your_tax' => '(12939/25)*caviar + trump_tax', 'trump_tax' => '-12939/25*caviar + your_tax'],
        ],
        [
            'title' => 'rolex =  (your_tax  -trump_tax) / 7575',
            'results' => ['trump_tax' => '-7575*rolex + your_tax', 'rolex' => '-1/7575*trump_tax + (1/7575)*your_tax', 'your_tax' => '7575*rolex + trump_tax'],
        ],
        [
            'title' => 'covid_masks =  (your_tax  -trump_tax) / 5.55',
            'results' => ['trump_tax' => '-111/20*covid_masks + your_tax', 'covid_masks' => '-20/111*trump_tax + (20/111)*your_tax', 'your_tax' => '(111/20)*covid_masks + trump_tax'],
        ],
        [
            'title' => 'covid_tests =  (your_tax  -trump_tax) / 127',
            'results' => ['covid_tests' => '-1/127*trump_tax + (1/127)*your_tax', 'your_tax' => '127*covid_tests + trump_tax', 'trump_tax' => '-127*covid_tests + your_tax'],
        ],
        [
            'title' => 'rings =  (your_tax  -trump_tax) /675',
            'results' => ['trump_tax' => '-675*rings + your_tax', 'rings' => '-1/675*trump_tax + (1/675)*your_tax', 'your_tax' => '675*rings + trump_tax'],
        ],
        [
            'title' => 'purell = (your_tax  -trump_tax) /10',
            'results' => ['trump_tax' => '-10*purell + your_tax', 'purell' => '-1/10*trump_tax + (1/10)*your_tax', 'your_tax' => '10*purell + trump_tax'],
        ],
        [
            'title' => 'food_stamps_months= (your_tax  -trump_tax) / 129.83',
            'results' => ['food_stamps_months' => '-100/12983*trump_tax + (100/12983)*your_tax', 'your_tax' => '(12983/100)*food_stamps_months + trump_tax', 'trump_tax' => '-12983/100*food_stamps_months + your_tax'],
        ],
        [
            'title' => 'textbooks = (your_tax  -trump_tax) / 1000 ',
            'results' => ['trump_tax' => '-1000*textbooks + your_tax', 'textbooks' => '-1/1000*trump_tax + (1/1000)*your_tax', 'your_tax' => '1000*textbooks + trump_tax'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Trump tax takes Your tax in 2019 and Trump's tax and returns You paid… and Dom Perignon bottles. Nothing is looked up on this page: you paid… is computed from your tax in 2019 and the other boxes, so an unusual pair of values gives an honest answer rather than an error. You paid… is opened in x more than Trump!; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Trump tax calculator works', 'html' => <<<'TXT'
            <p>The Trump tax calculator applies one relationship to 2 numbers and reports You paid…, Dom Perignon bottles and Pounds of Ossetra caviar.</p><p>The relationship it solves reads You paid… = Your tax in 2019 ÷ Trump&#039;s tax.</p><p>The result panel carries You paid…, Dom Perignon bottles, Pounds of Ossetra caviar and Tiffany rings, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Your tax in 2019</strong> — a plain number, no unit</li><li><strong>Trump&#039;s tax</strong> — a plain number, no unit</li></ul><p>The answers come back as You paid… in x more than Trump!, Dom Perignon bottles, Pounds of Ossetra caviar, Tiffany rings, Bottles of Trump Premium Vodka, Rolex watches ⌚, Masks in N95 masks, Hand sanitizer in liters of Purell, COVID tests, Food stamps, Sets of textbooks for in students. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Your tax in 2019 = 9302 and Trump&amp;#039;s tax = 750 — through the same formula and the panel reports <strong>You paid…</strong> = 12.4 x more than Trump!, <strong>Bottles of Trump Premium Vodka</strong> = 1.78, <strong>Dom Perignon bottles</strong> = 42.77, <strong>Pounds of Ossetra caviar</strong> = 16.52, <strong>Rolex watches ⌚</strong> = 1.13, <strong>Masks</strong> = 1541 N95 masks, <strong>COVID tests</strong> = 67.34, <strong>Tiffany rings</strong> = 12.67, <strong>Hand sanitizer</strong> = 855 liters of Purell, <strong>Food stamps</strong> = 65.87 and <strong>Sets of textbooks for</strong> = 8.55 students.</p><ul><li><strong>You paid…</strong> = 12.4 x more than Trump!</li><li><strong>Bottles of Trump Premium Vodka</strong> = 1.78</li><li><strong>Dom Perignon bottles</strong> = 42.77</li><li><strong>Pounds of Ossetra caviar</strong> = 16.52</li><li><strong>Rolex watches ⌚</strong> = 1.13</li><li><strong>Masks</strong> = 1541 N95 masks</li><li><strong>COVID tests</strong> = 67.34</li><li><strong>Tiffany rings</strong> = 12.67</li><li><strong>Hand sanitizer</strong> = 855 liters of Purell</li><li><strong>Food stamps</strong> = 65.87</li><li><strong>Sets of textbooks for</strong> = 8.55 students</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>You paid…</strong> = <code>Your tax in 2019 ÷ Trump&#039;s tax</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>You paid...</strong> = 12.4, <strong>Bottles of Trump Premium Vodka</strong> = 1.78, <strong>Dom Perignon bottles</strong> = 42.77, <strong>Pounds of Ossetra caviar</strong> = 16.52, <strong>Rolex watches ⌚</strong> = 1.13, <strong>Masks</strong> = 1541, <strong>COVID tests</strong> = 67.34, <strong>Tiffany rings</strong> = 12.67, <strong>Hand sanitizer</strong> = 855, <strong>Food stamps</strong> = 65.87 and <strong>Sets of textbooks for</strong> = 8.55 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: You paid... takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>You paid…</strong> = <code>Your tax in 2019 ÷ Trump&#039;s tax</code></li><li><strong>Trump&#039;s tax</strong> = <code>Your tax in 2019 ÷ You paid...</code></li><li><strong>Your tax in 2019</strong> = <code>You paid... × Trump&#039;s tax</code></li><li><strong>Bottles of Trump Premium Vodka</strong> = <code>− 1 ÷ 4800 × Trump&#039;s tax + (1 ÷ 4800) × Your tax in 2019</code></li><li><strong>Dom Perignon bottles</strong> = <code>− 100 ÷ 19997 × Trump&#039;s tax + (100 ÷ 19997) × Your tax in 2019</code></li><li><strong>Pounds of Ossetra caviar</strong> = <code>− 25 ÷ 12939 × Trump&#039;s tax + (25 ÷ 12939) × Your tax in 2019</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>You paid…</strong> = <code>Your tax in 2019 ÷ Trump&#039;s tax</code> — the form to use when Your tax in 2019 and Trump&#039;s tax are the values you have.</li><li><strong>Trump&#039;s tax</strong> = <code>Your tax in 2019 ÷ You paid...</code> — the form to use when Your tax in 2019 and You paid… are the values you have.</li><li><strong>Your tax in 2019</strong> = <code>You paid... × Trump&#039;s tax</code> — the form to use when You paid… and Trump&#039;s tax are the values you have.</li><li><strong>Bottles of Trump Premium Vodka</strong> = <code>− 1 ÷ 4800 × Trump&#039;s tax + (1 ÷ 4800) × Your tax in 2019</code> — the form to use when Trump&#039;s tax and Your tax in 2019 are the values you have.</li><li><strong>Trump&#039;s tax</strong> = <code>− 4800 × Bottles of Trump Premium Vodka + Your tax in 2019</code> — the form to use when Bottles of Trump Premium Vodka and Your tax in 2019 are the values you have.</li><li><strong>Your tax in 2019</strong> = <code>Trump&#039;s tax + 4800 × Bottles of Trump Premium Vodka</code> — the form to use when Trump&#039;s tax and Bottles of Trump Premium Vodka are the values you have.</li><li><strong>Dom Perignon bottles</strong> = <code>− 100 ÷ 19997 × Trump&#039;s tax + (100 ÷ 19997) × Your tax in 2019</code> — the form to use when Trump&#039;s tax and Your tax in 2019 are the values you have.</li><li><strong>Trump&#039;s tax</strong> = <code>− 19997 ÷ 100 × Dom Perignon bottles + Your tax in 2019</code> — the form to use when Dom Perignon bottles and Your tax in 2019 are the values you have.</li></ul><p>Any one of You paid…, Trump&#039;s tax and Your tax in 2019 can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Your tax in 2019, from 9302 to 18604 — and the answers go from <strong>You paid...</strong> 12.4 x more than Trump!, <strong>Bottles of Trump Premium Vodka</strong> 1.78, <strong>Dom Perignon bottles</strong> 42.77, <strong>Pounds of Ossetra caviar</strong> 16.52, <strong>Rolex watches ⌚</strong> 1.13, <strong>Masks</strong> 1541 N95 masks, <strong>COVID tests</strong> 67.34, <strong>Tiffany rings</strong> 12.67, <strong>Hand sanitizer</strong> 855 liters of Purell, <strong>Food stamps</strong> 65.87 and <strong>Sets of textbooks for</strong> 8.55 students to <strong>You paid...</strong> 24.81 x more than Trump!, <strong>Bottles of Trump Premium Vodka</strong> 3.72, <strong>Dom Perignon bottles</strong> 89.28, <strong>Pounds of Ossetra caviar</strong> 34.5, <strong>Rolex watches ⌚</strong> 2.36, <strong>Masks</strong> 3217 N95 masks, <strong>COVID tests</strong> 141, <strong>Tiffany rings</strong> 26.45, <strong>Hand sanitizer</strong> 1785 liters of Purell, <strong>Food stamps</strong> 138 and <strong>Sets of textbooks for</strong> 17.85 students.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with You paid…, Dom Perignon bottles and Pounds of Ossetra caviar are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Your tax in 2019 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Your tax in 2019 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Trump&#039;s tax left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Trump&amp;#039;s tax is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Your tax in 2019 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Your tax in 2019</strong> takes a plain number with no unit attached. The page reads it when it works out Trump's tax, You paid… and Bottles of Trump Premium Vodka. Have it to hand before you start: Your tax in 2019 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Trump&#039;s tax</strong> takes a plain number with no unit attached. The page reads it when it works out You paid…, Your tax in 2019 and Bottles of Trump Premium Vodka. Have it to hand before you start: Trump&#039;s tax is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Your tax in 2019 and Trump&#039;s tax. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Your tax in 2019 into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare You paid… in x more than Trump! with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> You paid… follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Your tax in 2019 and Trump&#039;s tax is what you already know and You paid… and Dom Perignon bottles is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/immediate-annuity">Immediate annuity Calculator</a>, <a href="/finance/impermanent-loss">Impermanent loss</a> and <a href="/finance/income-elasticity-demand">Income elasticity of demand Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Trump tax is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Your tax in 2019 and Trump&#039;s tax beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Trump tax calculator work out?', 'a' => <<<'TXT'
            You paid…, Dom Perignon bottles, Pounds of Ossetra caviar and Tiffany rings, from Your tax in 2019 and Trump's tax. The relationship is You paid… = Your tax in 2019 ÷ Trump's tax.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Your tax in 2019, Trump\'s tax. Fill your tax in 2019 and trump\'s tax and leave You paid... empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of You paid…, Trump's tax, Your tax in 2019 and Bottles of Trump Premium Vodka blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            You paid… = 12.4 x more than Trump!, Bottles of Trump Premium Vodka = 1.78, Dom Perignon bottles = 42.77, Pounds of Ossetra caviar = 16.52, Rolex watches ⌚ = 1.13, Masks = 1541 N95 masks, COVID tests = 67.34, Tiffany rings = 12.67, Hand sanitizer = 855 liters of Purell, Food stamps = 65.87 and Sets of textbooks for = 8.55 students. That comes from the page's own defaults, entered in Your tax in 2019; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of You paid... is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Your tax in 2019 left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to You paid... at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/immediate-annuity', 'name' => 'Immediate annuity Calculator'],
            ['path' => '/finance/impermanent-loss', 'name' => 'Impermanent loss'],
            ['path' => '/finance/income-elasticity-demand', 'name' => 'Income elasticity of demand Calculator'],
        ],
        'authors' => [],
    ],
];
