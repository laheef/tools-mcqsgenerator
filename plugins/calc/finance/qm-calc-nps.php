<?php

/**
 * Net promoter score
 * /finance/nps
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net promoter score',
    'meta' => ['title' => 'Net promoter score: Formula, Steps & Results', 'description' => 'Enter score 10, score 9 and score 8 and Net promoter score returns good responses (Promoter ) and Neutral responses (Passives ). Any box can be the unknown.', 'h1' => 'Net promoter score Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Number of responses for each survey scores',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n10',
                            'label' => 'Score 10 ',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n9',
                            'label' => 'Score 9 ',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n8',
                            'label' => 'Score 8 ',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n7',
                            'label' => 'Score 7 ',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n6',
                            'label' => 'Score 6 ',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n5',
                            'label' => 'Score 5 ',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n4',
                            'label' => 'Score 4 ',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n3',
                            'label' => 'Score 3 ',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n2',
                            'label' => 'Score 2 ',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n1',
                            'label' => 'Score 1 ',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'n0',
                            'label' => 'Score 0 ',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Responses analysis',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'good_respond',
                            'label' => 'Good responses (Promoter )',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'neutral_respond',
                            'label' => 'Neutral responses (Passives )',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bad_respond',
                            'label' => 'Bad responses (Detractors )',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_respond',
                            'label' => 'Total responses',
                            'type' => 'number',
                            'suffix' => 'response(s)',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Net promoter score (NPS)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'nps',
                            'label' => 'NPS',
                            'type' => 'number',
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
                                ['when' => 'nps < 0', 'text' => 'Your users are more likely to warn others away from your products than recommending it. Improve your product immediately! '],
                                ['when' => 'nps >= 0 and nps < 30', 'text' => 'Your users are not really happy — try to understand why and improve your product now! '],
                                ['when' => 'nps >= 30 and nps < 50', 'text' => 'Your users are happy in general. However, your product could still do better! '],
                                ['when' => 'nps >= 50', 'text' => <<<'TXT'
                                Your product is excellent and your users are more happy than most companies' out there!  However, as different industries have different dynamics, do check the average NPS score for your industry to understand the metric better.
                                TXT],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'total_respond = n0 + n1 + n2 + n3 + n4 + n5 + n6 + n7 + n8 + n9 + n10 ',
            'results' => [
                'n1' => '-n0 - n10 - n2 - n3 - n4 - n5 - n6 - n7 - n8 - n9 + total_respond',
                'total_respond' => 'n0 + n1 + n10 + n2 + n3 + n4 + n5 + n6 + n7 + n8 + n9',
                'n8' => '-n0 - n1 - n10 - n2 - n3 - n4 - n5 - n6 - n7 - n9 + total_respond',
                'n6' => '-n0 - n1 - n10 - n2 - n3 - n4 - n5 - n7 - n8 - n9 + total_respond',
                'n2' => '-n0 - n1 - n10 - n3 - n4 - n5 - n6 - n7 - n8 - n9 + total_respond',
                'n4' => '-n0 - n1 - n10 - n2 - n3 - n5 - n6 - n7 - n8 - n9 + total_respond',
                'n3' => '-n0 - n1 - n10 - n2 - n4 - n5 - n6 - n7 - n8 - n9 + total_respond',
                'n7' => '-n0 - n1 - n10 - n2 - n3 - n4 - n5 - n6 - n8 - n9 + total_respond',
                'n9' => '-n0 - n1 - n10 - n2 - n3 - n4 - n5 - n6 - n7 - n8 + total_respond',
                'n0' => '-n1 - n10 - n2 - n3 - n4 - n5 - n6 - n7 - n8 - n9 + total_respond',
                'n5' => '-n0 - n1 - n10 - n2 - n3 - n4 - n6 - n7 - n8 - n9 + total_respond',
                'n10' => '-n0 - n1 - n2 - n3 - n4 - n5 - n6 - n7 - n8 - n9 + total_respond',
            ],
        ],
        [
            'title' => 'good_respond = n9 + n10',
            'results' => ['good_respond' => 'n10 + n9', 'n10' => 'good_respond - n9', 'n9' => 'good_respond - n10'],
        ],
        [
            'title' => 'neutral_respond = n7 + n8',
            'results' => ['neutral_respond' => 'n7 + n8', 'n8' => '-n7 + neutral_respond', 'n7' => '-n8 + neutral_respond'],
        ],
        [
            'title' => 'bad_respond = n0 + n1 + n2 + n3 + n4 + n5 + n6',
            'results' => [
                'bad_respond' => 'n0 + n1 + n2 + n3 + n4 + n5 + n6',
                'n1' => 'bad_respond - n0 - n2 - n3 - n4 - n5 - n6',
                'n6' => 'bad_respond - n0 - n1 - n2 - n3 - n4 - n5',
                'n2' => 'bad_respond - n0 - n1 - n3 - n4 - n5 - n6',
                'n4' => 'bad_respond - n0 - n1 - n2 - n3 - n5 - n6',
                'n3' => 'bad_respond - n0 - n1 - n2 - n4 - n5 - n6',
                'n0' => 'bad_respond - n1 - n2 - n3 - n4 - n5 - n6',
                'n5' => 'bad_respond - n0 - n1 - n2 - n3 - n4 - n6',
            ],
        ],
        [
            'title' => 'nps = (good_respond / total_respond - bad_respond / total_respond) * 100',
            'results' => ['bad_respond' => 'good_respond - 1/100*nps*total_respond', 'total_respond' => '100*(-bad_respond + good_respond)/nps', 'good_respond' => 'bad_respond + (1/100)*nps*total_respond', 'nps' => '100*(-bad_respond + good_respond)/total_respond'],
        ],
        [
            'title' => 'total_respond = good_respond + neutral_respond + bad_respond',
            'results' => ['neutral_respond' => '-bad_respond - good_respond + total_respond', 'bad_respond' => '-good_respond - neutral_respond + total_respond', 'total_respond' => 'bad_respond + good_respond + neutral_respond', 'good_respond' => '-bad_respond - neutral_respond + total_respond'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Net promoter score takes Score 10, Score 9 and Score 8 and returns Good responses (Promoter ) and Neutral responses (Passives ). It is a single relationship that reads good responses (Promoter ) out of score 10, not a table of canned results keyed by them. Units for Good responses (Promoter ) default to response(s) and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Net promoter score calculator works', 'html' => <<<'TXT'
            <p>The Net promoter score calculator applies one relationship to 11 numbers and reports Good responses (Promoter ), Neutral responses (Passives ) and Bad responses (Detractors ).</p><p>The relationship it solves reads Total responses = Score 0 + Score 1 + Score 10 + Score 2 + Score 3 + Score 4 + Score 5 + Score 6 + Score 7 + Score 8 + Score 9.</p><p>The result panel carries Good responses (Promoter ), Neutral responses (Passives ), Bad responses (Detractors ) and Total responses, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 11 boxes and the page has everything it needs.</p><ul><li><strong>Score 10</strong> — in response(s)</li><li><strong>Score 9</strong> — in response(s)</li><li><strong>Score 8</strong> — in response(s)</li><li><strong>Score 7</strong> — in response(s)</li><li><strong>Score 6</strong> — in response(s)</li><li><strong>Score 5</strong> — in response(s)</li><li><strong>Score 4</strong> — in response(s)</li><li><strong>Score 3</strong> — in response(s)</li><li><strong>Score 2</strong> — in response(s)</li><li><strong>Score 1</strong> — in response(s)</li><li><strong>Score 0</strong> — in response(s)</li></ul><p>The answers come back as Good responses (Promoter ) in response(s), Neutral responses (Passives ) in response(s), Bad responses (Detractors ) in response(s), Total responses in response(s), NPS. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Score 10 = 10 response(s), Score 9 = 100 response(s), Score 8 = 1000 response(s), Score 7 = 10 response(s), Score 6 = 100 response(s), Score 5 = 1000 response(s), Score 4 = 10 response(s), Score 3 = 100 response(s), Score 2 = 1000 response(s), Score 1 = 10 response(s) and Score 0 = 100 response(s) gives <strong>Total responses</strong> = 3440 response(s), <strong>Good responses (Promoter )</strong> = 110 response(s), <strong>Neutral responses (Passives )</strong> = 1010 response(s), <strong>Bad responses (Detractors )</strong> = 2320 response(s) and <strong>NPS</strong> = -64.24.</p><ul><li><strong>Total responses</strong> = 3440 response(s)</li><li><strong>Good responses (Promoter )</strong> = 110 response(s)</li><li><strong>Neutral responses (Passives )</strong> = 1010 response(s)</li><li><strong>Bad responses (Detractors )</strong> = 2320 response(s)</li><li><strong>NPS</strong> = -64.24</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Total responses</strong> = <code>Score 0 + Score 1 + Score 10 + Score 2 + Score 3 + Score 4 + Score 5 + Score 6 + Score 7 + Score 8 + Score 9</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Total responses</strong> = 3440, <strong>Good responses (Promoter )</strong> = 110, <strong>Neutral responses (Passives )</strong> = 1010, <strong>Bad responses (Detractors )</strong> = 2320 and <strong>NPS</strong> = -64.24 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Good responses (Promoter ) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total responses</strong> = <code>Score 0 + Score 1 + Score 10 + Score 2 + Score 3 + Score 4 + Score 5 + Score 6 + Score 7 + Score 8 + Score 9</code></li><li><strong>Score 1</strong> = <code>− Score 0 − Score 10 − Score 2 − Score 3 − Score 4 − Score 5 − Score 6 − Score 7 − Score 8 − Score 9 + Total responses</code></li><li><strong>Score 8</strong> = <code>− Score 0 − Score 1 − Score 10 − Score 2 − Score 3 − Score 4 − Score 5 − Score 6 − Score 7 − Score 9 + Total responses</code></li><li><strong>Score 6</strong> = <code>− Score 0 − Score 1 − Score 10 − Score 2 − Score 3 − Score 4 − Score 5 − Score 7 − Score 8 − Score 9 + Total responses</code></li><li><strong>Score 2</strong> = <code>− Score 0 − Score 1 − Score 10 − Score 3 − Score 4 − Score 5 − Score 6 − Score 7 − Score 8 − Score 9 + Total responses</code></li><li><strong>Score 4</strong> = <code>− Score 0 − Score 1 − Score 10 − Score 2 − Score 3 − Score 5 − Score 6 − Score 7 − Score 8 − Score 9 + Total responses</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total responses</strong> = <code>Score 0 + Score 1 + Score 10 + Score 2 + Score 3 + Score 4 + Score 5 + Score 6 + Score 7 + Score 8 + Score 9</code> — the form to use when Score 0, Score 1, Score 10 and Score 2 are the values you have.</li><li><strong>Score 1</strong> = <code>− Score 0 − Score 10 − Score 2 − Score 3 − Score 4 − Score 5 − Score 6 − Score 7 − Score 8 − Score 9 + Total responses</code> — the form to use when Score 0, Score 10, Score 2 and Score 3 are the values you have.</li><li><strong>Score 8</strong> = <code>− Score 0 − Score 1 − Score 10 − Score 2 − Score 3 − Score 4 − Score 5 − Score 6 − Score 7 − Score 9 + Total responses</code> — the form to use when Score 0, Score 1, Score 10 and Score 2 are the values you have.</li><li><strong>Score 6</strong> = <code>− Score 0 − Score 1 − Score 10 − Score 2 − Score 3 − Score 4 − Score 5 − Score 7 − Score 8 − Score 9 + Total responses</code> — the form to use when Score 0, Score 1, Score 10 and Score 2 are the values you have.</li><li><strong>Score 2</strong> = <code>− Score 0 − Score 1 − Score 10 − Score 3 − Score 4 − Score 5 − Score 6 − Score 7 − Score 8 − Score 9 + Total responses</code> — the form to use when Score 0, Score 1, Score 10 and Score 3 are the values you have.</li><li><strong>Score 4</strong> = <code>− Score 0 − Score 1 − Score 10 − Score 2 − Score 3 − Score 5 − Score 6 − Score 7 − Score 8 − Score 9 + Total responses</code> — the form to use when Score 0, Score 1, Score 10 and Score 2 are the values you have.</li><li><strong>Score 3</strong> = <code>− Score 0 − Score 1 − Score 10 − Score 2 − Score 4 − Score 5 − Score 6 − Score 7 − Score 8 − Score 9 + Total responses</code> — the form to use when Score 0, Score 1, Score 10 and Score 2 are the values you have.</li><li><strong>Score 7</strong> = <code>− Score 0 − Score 1 − Score 10 − Score 2 − Score 3 − Score 4 − Score 5 − Score 6 − Score 8 − Score 9 + Total responses</code> — the form to use when Score 0, Score 1, Score 10 and Score 2 are the values you have.</li></ul><p>Any one of Total responses, Score 1 and Score 8 can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Score 10 from 10 to 20, leaving every other box alone. The panel moves from <strong>Total responses</strong> 3440 response(s), <strong>Good responses (Promoter )</strong> 110 response(s), <strong>Neutral responses (Passives )</strong> 1010 response(s), <strong>Bad responses (Detractors )</strong> 2320 response(s) and <strong>NPS</strong> -64.24 to <strong>Total responses</strong> 3450 response(s), <strong>Good responses (Promoter )</strong> 120 response(s), <strong>Neutral responses (Passives )</strong> 1010 response(s), <strong>Bad responses (Detractors )</strong> 2320 response(s) and <strong>NPS</strong> -63.77.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Good responses (Promoter ), Neutral responses (Passives ) and Bad responses (Detractors ) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Score 10 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Score 10 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Score 9 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Score 9 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Score 8 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Score 8 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Score 10 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Net promoter score form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Score 10</strong> is measured in response(s). The page reads it when it works out Score 1, Total responses and Score 8. Fill it from a measurement rather than a memory — Score 10 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Score 9</strong> is measured in response(s). The page reads it when it works out Score 1, Total responses and Score 8. Fill it from a measurement rather than a memory — Score 9 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Score 8</strong> is measured in response(s). The page reads it when it works out Score 1, Total responses and Score 6. Fill it from a measurement rather than a memory — Score 8 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Score 7</strong> is measured in response(s). The page reads it when it works out Score 1, Total responses and Score 8. Fill it from a measurement rather than a memory — Score 7 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Score 6</strong> is measured in response(s). The page reads it when it works out Score 1, Total responses and Score 8. Fill it from a measurement rather than a memory — Score 6 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Score 5</strong> is measured in response(s). The page reads it when it works out Score 1, Total responses and Score 8. Fill it from a measurement rather than a memory — Score 5 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Score 4</strong> is measured in response(s). The page reads it when it works out Score 1, Total responses and Score 8. Fill it from a measurement rather than a memory — Score 4 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Score 3</strong> is measured in response(s). The page reads it when it works out Score 1, Total responses and Score 8. Fill it from a measurement rather than a memory — Score 3 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Score 2</strong> is measured in response(s). The page reads it when it works out Score 1, Total responses and Score 8. Fill it from a measurement rather than a memory — Score 2 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Score 1</strong> is measured in response(s). The page reads it when it works out Total responses, Score 8 and Score 6. Fill it from a measurement rather than a memory — Score 1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Score 0</strong> is measured in response(s). The page reads it when it works out Score 1, Total responses and Score 8. Fill it from a measurement rather than a memory — Score 0 is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Good responses (Promoter ) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Score 10, Score 9 and Score 8 and the number you are missing is Good responses (Promoter ) and Neutral responses (Passives ).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/loan-interest">Loan interest Calculator</a>, <a href="/finance/loan-payment">Loan payment Calculator</a> and <a href="/finance/loan-repayment">Loan repayment Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net promoter score calculator work out?', 'a' => <<<'TXT'
            Good responses (Promoter ), Neutral responses (Passives ), Bad responses (Detractors ) and Total responses, from Score 0, Score 1, Score 10 and Score 2. The relationship is Total responses = Score 0 + Score 1 + Score 10 + Score 2 + Score 3 + Score 4 + Score 5 + Score 6 + Score 7 + Score 8 + Score 9.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Score 10 (response(s)), Score 9 (response(s)), Score 8 (response(s)), Score 7 (response(s)), Score 6 (response(s)). Fill score 10, score 9 and score 8 and leave Good responses (Promoter ) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Total responses, Score 1, Score 8 and Score 6 blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total responses = 3440 response(s), Good responses (Promoter ) = 110 response(s), Neutral responses (Passives ) = 1010 response(s), Bad responses (Detractors ) = 2320 response(s) and NPS = -64.24. The figures come from Score 10 as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Good responses (Promoter ) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Score 10 blank and the page solves for it, reporting Good responses (Promoter ) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Good responses (Promoter ) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/loan-interest', 'name' => 'Loan interest Calculator'],
            ['path' => '/finance/loan-payment', 'name' => 'Loan payment Calculator'],
            ['path' => '/finance/loan-repayment', 'name' => 'Loan repayment Calculator'],
        ],
        'authors' => [],
    ],
];
