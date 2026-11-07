<?php

/**
 * Cow gestation
 * /biology/cow-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cow gestation',
    'meta' => ['title' => 'Cow gestation Calculator — Formula & Results', 'description' => 'Cow gestation works out calving start and end of postpartum and reports both. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Cow gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'calvingStart' => ['type' => 'date', 'rnd' => null],
            'endOf' => ['type' => 'date', 'rnd' => null],
            'exposed' => ['type' => 'date', 'rnd' => null],
            'firstCalv' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => '_nrMSe5Nd5jhifyJ6sy2Z', 'c' => null],
                ],
                'ds' => 'dvOcipHocV4XeZFZbUMa-',
            ],
        ],
        'groups' => [
            [
                'uid' => 'zFapwlFezkMC2PONVbOJ1',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'exposed',
                                    'vt' => 'date',
                                    'l' => 'Exposed',
                                    'h' => 'When were the cows first exposed to bulls?',
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
                                    'n' => 'firstCalv',
                                    'vt' => 'valueSelect',
                                    'l' => 'First-time calver?',
                                    'h' => 'Is it the cow\'s first pregnancy?',
                                    'ds' => 'dvOcipHocV4XeZFZbUMa-',
                                    'opts' => [
                                        ['_nrMSe5Nd5jhifyJ6sy2Z', 'No', '0'],
                                        ['R5lVF70A5PUD926eb2zK-', 'Yes', '10'],
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
                                    'n' => 'calvingStart',
                                    'vt' => 'date',
                                    'l' => 'Calving start',
                                    'h' => 'When calving should begin.',
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
                                    'n' => 'endOf',
                                    'vt' => 'date',
                                    'l' => 'End of postpartum',
                                    'h' => 'End of the postpartum interval after the calving period.',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'calvingStart = exposed + 283 ',
                'var' => [
                    [
                        'l' => 'calvingStart',
                        'f' => 'exposed + 283',
                        'r' => ['exposed'],
                    ],
                    [
                        'l' => 'exposed',
                        'f' => 'calvingStart - 283',
                        'r' => ['calvingStart'],
                    ],
                ],
            ],
            [
                'formula' => 'endOf = calvingStart + 55 + firstCalv',
                'var' => [
                    [
                        'l' => 'firstCalv',
                        'f' => '-calvingStart + endOf - 55',
                        'r' => ['calvingStart', 'endOf'],
                    ],
                    [
                        'l' => 'calvingStart',
                        'f' => 'endOf - firstCalv - 55',
                        'r' => ['firstCalv', 'endOf'],
                    ],
                    [
                        'l' => 'endOf',
                        'f' => 'calvingStart + firstCalv + 55',
                        'r' => ['firstCalv', 'calvingStart'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'dvOcipHocV4XeZFZbUMa-' => [
                'name' => 'firstCalvers',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '_nrMSe5Nd5jhifyJ6sy2Z', 'label' => 'No', 'value' => '0'],
                    ['uid' => 'R5lVF70A5PUD926eb2zK-', 'label' => 'Yes', 'value' => '10'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cow gestation turns Exposed into First-time calver? and Calving start. Nothing is looked up on this page: first-time calver? is computed from exposed and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Cow gestation calculator works', 'html' => <<<'TXT'
            <p>Cow gestation answers one question from 1 number, and the answer is First-time calver?, Calving start and End of postpartum.</p><p>In the form&#039;s own words, Calving start = Exposed + 283.</p><p>What comes back is First-time calver?, Calving start and End of postpartum — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Exposed</strong> — a plain number, no unit, entered as a date. When were the cows first exposed to bulls?</li></ul><p>The answers come back as First-time calver?, Calving start, End of postpartum. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Exposed = 1.772e+12 gives <strong>First-time calver?</strong> = 0, <strong>Calving start</strong> = 1.797e+12 and <strong>End of postpartum</strong> = 1.802e+12.</p><ul><li><strong>First-time calver?</strong> = 0</li><li><strong>Calving start</strong> = 1.797e+12</li><li><strong>End of postpartum</strong> = 1.802e+12</li></ul><p>The line behind those figures is <strong>Calving start</strong> = <code>Exposed + 283</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>First-time calver?</strong> = 0, <strong>Calving start</strong> = 1.797e+12 and <strong>End of postpartum</strong> = 1.802e+12 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: First-time calver? takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Calving start</strong> = <code>Exposed + 283</code></li><li><strong>Exposed</strong> = <code>Calving start − 283</code></li><li><strong>First-time calver?</strong> = <code>− Calving start + End of postpartum − 55</code></li><li><strong>End of postpartum</strong> = <code>Calving start + First-time calver? + 55</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Calving start</strong> = <code>Exposed + 283</code> — the form to use when Exposed are the values you have.</li><li><strong>Exposed</strong> = <code>Calving start − 283</code> — the form to use when Calving start are the values you have.</li><li><strong>First-time calver?</strong> = <code>− Calving start + End of postpartum − 55</code> — the form to use when Calving start and End of postpartum are the values you have.</li><li><strong>Calving start</strong> = <code>End of postpartum − First-time calver? − 55</code> — the form to use when First-time calver? and End of postpartum are the values you have.</li><li><strong>End of postpartum</strong> = <code>Calving start + First-time calver? + 55</code> — the form to use when First-time calver? and Calving start are the values you have.</li></ul><p>Any one of Calving start, Exposed and First-time calver? can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Exposed, from 1.772e+12 to 3.545e+12 — and the answers go from <strong>First-time calver?</strong> 0, <strong>Calving start</strong> 1.797e+12 and <strong>End of postpartum</strong> 1.802e+12 to <strong>First-time calver?</strong> 0, <strong>Calving start</strong> 3.569e+12 and <strong>End of postpartum</strong> 3.574e+12.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with First-time calver?, Calving start and End of postpartum are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Exposed left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Exposed is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Exposed is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Exposed</strong> takes a plain number with no unit attached. When were the cows first exposed to bulls?. The page reads it when it works out Calving start. Have it to hand before you start: Exposed is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>First-time calver?</strong> is a plain number and the page's own defaults put it at 0. It is worked out from Calving start and End of postpartum. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Calving start</strong> is a plain number and the page's own defaults put it at 1.797e+12. It is worked out from Exposed. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>End of postpartum</strong> is a plain number and the page's own defaults put it at 1.802e+12. It is worked out from First-time calver? and Calving start. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>First-time calver?</th><th>Calving start</th><th>End of postpartum</th></tr></thead><tbody><tr><td><strong>Exposed</strong> +10%</td><td>—</td><td>+9.86%</td><td>+9.84%</td></tr></tbody></table><p>Ranked by leverage, Exposed sits at the top — a ten per cent error in that box shows up as roughly 9.9 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Exposed = 8.862e+11, the answer is <strong>First-time calver?</strong> = 0, <strong>Calving start</strong> = 9.106e+11 and <strong>End of postpartum</strong> = 9.154e+11.</li><li>With Exposed = 5.317e+12, the answer is <strong>First-time calver?</strong> = 0, <strong>Calving start</strong> = 5.341e+12 and <strong>End of postpartum</strong> = 5.346e+12.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Exposed. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Exposed into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare First-time calver? with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> First-time calver? follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Exposed measured, First-time calver? and Calving start wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/compost-application-rate">Compost Application Rate Calculator</a>, <a href="/biology/compost">Compost Calculator</a> and <a href="/biology/corn-yield">Corn yield Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Cow gestation is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Exposed beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cow gestation calculator work out?', 'a' => 'First-time calver?, Calving start and End of postpartum, from Exposed. The relationship is Calving start = Exposed + 283.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Exposed. Fill exposed and leave First-time calver? empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Calving start, Exposed, First-time calver? and End of postpartum blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            First-time calver? = 0, Calving start = 1.797e+12 and End of postpartum = 1.802e+12. That comes from the page's own defaults, entered in Exposed; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            First-time calver? is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Exposed left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of First-time calver? keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/compost-application-rate', 'name' => 'Compost Application Rate Calculator'],
            ['path' => '/biology/compost', 'name' => 'Compost Calculator'],
            ['path' => '/biology/corn-yield', 'name' => 'Corn yield Calculator'],
        ],
        'authors' => [],
    ],
];
