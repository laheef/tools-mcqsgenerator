<?php

/**
 * Customer effort score
 * /finance/customer-effort-score
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Customer effort score',
    'meta' => ['title' => 'Customer effort score: Formula, Steps & Results', 'description' => 'Enter select your scale, 1 — Very easy and 2 — Easy and Customer effort score returns your CES. Every box can be solved for, not only the one in the title.', 'h1' => 'Customer effort score Calculator', 'updated' => '2026-07-06'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Select a scale and enter the number of responses for each score.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'scale',
                            'label' => 'Select your scale',
                            'type' => 'select',
                            'options' => ['1-5' => '1', '1-7' => '2'],
                            'dataset' => 'scaleDS',
                            'default' => '1-5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_5_1',
                            'label' => '1 — Very easy',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_5_2',
                            'label' => '2 — Easy',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_5_3',
                            'label' => '3 — Neutral',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_5_4',
                            'label' => '4 — Difficult',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_5_5',
                            'label' => '5 — Very difficult',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_5',
                            'label' => 'Your CES',
                            'type' => 'number',
                            'help' => 'On a 1-5 scale.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_7_1',
                            'label' => '1 — Very easy',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_7_2',
                            'label' => '2 — Easy',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_7_3',
                            'label' => '3 — Somewhat easy',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_7_4',
                            'label' => '4 — Neutral',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_7_5',
                            'label' => '5 — Somewhat difficult',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_7_6',
                            'label' => '6 — Difficult',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_7_7',
                            'label' => '7 — Very difficult',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ces_7',
                            'label' => 'Your CES',
                            'type' => 'number',
                            'help' => 'On a 1-7 scale.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Excellent! Your customers find it easy to interact with you.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Moderate There\'s room to reduce friction in your customer journey.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Low CES Customers are struggling. Review your support processes.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'ces_5 = (ces_5_1 + ces_5_2*2 + ces_5_3*3 + ces_5_4*4+ ces_5_5*5) / (ces_5_1 + ces_5_2 + ces_5_3 + ces_5_4+ ces_5_5)',
            'results' => [
                'ces_5_1' => '(-ces_5*ces_5_2 - ces_5*ces_5_3 - ces_5*ces_5_4 - ces_5*ces_5_5 + 2*ces_5_2 + 3*ces_5_3 + 4*ces_5_4 + 5*ces_5_5)/(ces_5 - 1)',
                'ces_5_4' => '(-ces_5*ces_5_1 - ces_5*ces_5_2 - ces_5*ces_5_3 - ces_5*ces_5_5 + ces_5_1 + 2*ces_5_2 + 3*ces_5_3 + 5*ces_5_5)/(ces_5 - 4)',
                'ces_5_5' => '(-ces_5*ces_5_1 - ces_5*ces_5_2 - ces_5*ces_5_3 - ces_5*ces_5_4 + ces_5_1 + 2*ces_5_2 + 3*ces_5_3 + 4*ces_5_4)/(ces_5 - 5)',
                'ces_5_3' => '(-ces_5*ces_5_1 - ces_5*ces_5_2 - ces_5*ces_5_4 - ces_5*ces_5_5 + ces_5_1 + 2*ces_5_2 + 4*ces_5_4 + 5*ces_5_5)/(ces_5 - 3)',
                'ces_5_2' => '(-ces_5*ces_5_1 - ces_5*ces_5_3 - ces_5*ces_5_4 - ces_5*ces_5_5 + ces_5_1 + 3*ces_5_3 + 4*ces_5_4 + 5*ces_5_5)/(ces_5 - 2)',
                'ces_5' => '(ces_5_1 + 2*ces_5_2 + 3*ces_5_3 + 4*ces_5_4 + 5*ces_5_5)/(ces_5_1 + ces_5_2 + ces_5_3 + ces_5_4 + ces_5_5)',
            ],
        ],
        [
            'title' => 'ces_7 = (ces_7_1 + ces_7_2*2 + ces_7_3*3 + ces_7_4*4 + ces_7_5*5 + ces_7_6*6+ ces_7_7*7) / (ces_7_1 + ces_7_2 + ces_7_3 + ces_7_4 + ces_7_5 + ces_7_6+ ces_7_7)',
            'results' => [
                'ces_7_3' => <<<'TXT'
                (-ces_7*ces_7_1 - ces_7*ces_7_2 - ces_7*ces_7_4 - ces_7*ces_7_5 - ces_7*ces_7_6 - ces_7*ces_7_7 + ces_7_1 + 2*ces_7_2 + 4*ces_7_4 + 5*ces_7_5 + 6*ces_7_6 + 7*ces_7_7)/(ces_7 - 3)
                TXT,
                'ces_7_6' => <<<'TXT'
                (-ces_7*ces_7_1 - ces_7*ces_7_2 - ces_7*ces_7_3 - ces_7*ces_7_4 - ces_7*ces_7_5 - ces_7*ces_7_7 + ces_7_1 + 2*ces_7_2 + 3*ces_7_3 + 4*ces_7_4 + 5*ces_7_5 + 7*ces_7_7)/(ces_7 - 6)
                TXT,
                'ces_7_5' => <<<'TXT'
                (-ces_7*ces_7_1 - ces_7*ces_7_2 - ces_7*ces_7_3 - ces_7*ces_7_4 - ces_7*ces_7_6 - ces_7*ces_7_7 + ces_7_1 + 2*ces_7_2 + 3*ces_7_3 + 4*ces_7_4 + 6*ces_7_6 + 7*ces_7_7)/(ces_7 - 5)
                TXT,
                'ces_7_7' => <<<'TXT'
                (-ces_7*ces_7_1 - ces_7*ces_7_2 - ces_7*ces_7_3 - ces_7*ces_7_4 - ces_7*ces_7_5 - ces_7*ces_7_6 + ces_7_1 + 2*ces_7_2 + 3*ces_7_3 + 4*ces_7_4 + 5*ces_7_5 + 6*ces_7_6)/(ces_7 - 7)
                TXT,
                'ces_7_1' => <<<'TXT'
                (-ces_7*ces_7_2 - ces_7*ces_7_3 - ces_7*ces_7_4 - ces_7*ces_7_5 - ces_7*ces_7_6 - ces_7*ces_7_7 + 2*ces_7_2 + 3*ces_7_3 + 4*ces_7_4 + 5*ces_7_5 + 6*ces_7_6 + 7*ces_7_7)/(ces_7 - 1)
                TXT,
                'ces_7_4' => <<<'TXT'
                (-ces_7*ces_7_1 - ces_7*ces_7_2 - ces_7*ces_7_3 - ces_7*ces_7_5 - ces_7*ces_7_6 - ces_7*ces_7_7 + ces_7_1 + 2*ces_7_2 + 3*ces_7_3 + 5*ces_7_5 + 6*ces_7_6 + 7*ces_7_7)/(ces_7 - 4)
                TXT,
                'ces_7_2' => <<<'TXT'
                (-ces_7*ces_7_1 - ces_7*ces_7_3 - ces_7*ces_7_4 - ces_7*ces_7_5 - ces_7*ces_7_6 - ces_7*ces_7_7 + ces_7_1 + 3*ces_7_3 + 4*ces_7_4 + 5*ces_7_5 + 6*ces_7_6 + 7*ces_7_7)/(ces_7 - 2)
                TXT,
                'ces_7' => '(ces_7_1 + 2*ces_7_2 + 3*ces_7_3 + 4*ces_7_4 + 5*ces_7_5 + 6*ces_7_6 + 7*ces_7_7)/(ces_7_1 + ces_7_2 + ces_7_3 + ces_7_4 + ces_7_5 + ces_7_6 + ces_7_7)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter 3 — Neutral, 4 — Difficult and 5 — Very difficult into Customer effort score and the answer comes back as Your CES and 1 — Very easy. It is a single relationship that reads your CES out of 3 — Neutral, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Customer effort score calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Customer effort score: it takes 5 numbers and reports Your CES, 1 — Very easy and 2 — Easy.</p><p>In the form&#039;s own words, Your CES = (1 — Very easy + 2 × 2 — Easy + 3 × 3 — Neutral + 4 × 4 — Difficult + 5 × 5 — Very difficult) ÷ (1 — Very easy + 2 — Easy + 3 — Neutral + 4 — Difficult + 5 — Very difficult).</p><p>The result panel carries Your CES, 1 — Very easy, 2 — Easy and 3 — Somewhat easy, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>1 — Very easy</strong> — a plain number, no unit</li><li><strong>2 — Easy</strong> — a plain number, no unit</li><li><strong>3 — Neutral</strong> — a plain number, no unit</li><li><strong>4 — Difficult</strong> — a plain number, no unit</li><li><strong>5 — Very difficult</strong> — a plain number, no unit</li></ul><p>The result boxes are Your CES, 1 — Very easy, 2 — Easy, 3 — Somewhat easy, 4 — Neutral, 5 — Somewhat difficult, 6 — Difficult, 7 — Very difficult, Your CES; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Your CES is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Your CES</strong> = <code>(1 — Very easy + 2 × 2 — Easy + 3 × 3 — Neutral + 4 × 4 — Difficult + 5 × 5 — Very difficult) ÷ (1 — Very easy + 2 — Easy + 3 — Neutral + 4 — Difficult + 5 — Very difficult)</code></li><li><strong>1 — Very easy</strong> = <code>( − Your CES × 2 — Easy − Your CES × 3 — Neutral − Your CES × 4 — Difficult − Your CES × 5 — Very difficult + 2 × 2 — Easy + 3 × 3 — Neutral + 4 × 4 — Difficult + 5 × 5 — Very difficult) ÷ (Your CES − 1)</code></li><li><strong>4 — Difficult</strong> = <code>( − Your CES × 1 — Very easy − Your CES × 2 — Easy − Your CES × 3 — Neutral − Your CES × 5 — Very difficult + 1 — Very easy + 2 × 2 — Easy + 3 × 3 — Neutral + 5 × 5 — Very difficult) ÷ (Your CES − 4)</code></li><li><strong>5 — Very difficult</strong> = <code>( − Your CES × 1 — Very easy − Your CES × 2 — Easy − Your CES × 3 — Neutral − Your CES × 4 — Difficult + 1 — Very easy + 2 × 2 — Easy + 3 × 3 — Neutral + 4 × 4 — Difficult) ÷ (Your CES − 5)</code></li><li><strong>3 — Neutral</strong> = <code>( − Your CES × 1 — Very easy − Your CES × 2 — Easy − Your CES × 4 — Difficult − Your CES × 5 — Very difficult + 1 — Very easy + 2 × 2 — Easy + 4 × 4 — Difficult + 5 × 5 — Very difficult) ÷ (Your CES − 3)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Your CES</strong> = <code>(1 — Very easy + 2 × 2 — Easy + 3 × 3 — Neutral + 4 × 4 — Difficult + 5 × 5 — Very difficult) ÷ (1 — Very easy + 2 — Easy + 3 — Neutral + 4 — Difficult + 5 — Very difficult)</code> — the form to use when 1 — Very easy, 2 — Easy, 3 — Neutral and 4 — Difficult are the values you have.</li><li><strong>1 — Very easy</strong> = <code>( − Your CES × 2 — Easy − Your CES × 3 — Neutral − Your CES × 4 — Difficult − Your CES × 5 — Very difficult + 2 × 2 — Easy + 3 × 3 — Neutral + 4 × 4 — Difficult + 5 × 5 — Very difficult) ÷ (Your CES − 1)</code> — the form to use when Your CES, 2 — Easy, 3 — Neutral and 4 — Difficult are the values you have.</li><li><strong>4 — Difficult</strong> = <code>( − Your CES × 1 — Very easy − Your CES × 2 — Easy − Your CES × 3 — Neutral − Your CES × 5 — Very difficult + 1 — Very easy + 2 × 2 — Easy + 3 × 3 — Neutral + 5 × 5 — Very difficult) ÷ (Your CES − 4)</code> — the form to use when Your CES, 1 — Very easy, 2 — Easy and 3 — Neutral are the values you have.</li><li><strong>5 — Very difficult</strong> = <code>( − Your CES × 1 — Very easy − Your CES × 2 — Easy − Your CES × 3 — Neutral − Your CES × 4 — Difficult + 1 — Very easy + 2 × 2 — Easy + 3 × 3 — Neutral + 4 × 4 — Difficult) ÷ (Your CES − 5)</code> — the form to use when Your CES, 1 — Very easy, 2 — Easy and 3 — Neutral are the values you have.</li><li><strong>3 — Neutral</strong> = <code>( − Your CES × 1 — Very easy − Your CES × 2 — Easy − Your CES × 4 — Difficult − Your CES × 5 — Very difficult + 1 — Very easy + 2 × 2 — Easy + 4 × 4 — Difficult + 5 × 5 — Very difficult) ÷ (Your CES − 3)</code> — the form to use when Your CES, 1 — Very easy, 2 — Easy and 4 — Difficult are the values you have.</li></ul><p>Any one of Your CES, 1 — Very easy and 4 — Difficult can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Your CES, 1 — Very easy and 2 — Easy are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>1 — Very easy left as a guess.</strong> Anything typed into 1 — Very easy is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>2 — Easy left as a guess.</strong> Anything typed into 2 — Easy is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>3 — Neutral left as a guess.</strong> Anything typed into 3 — Neutral is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert 1 — Very easy to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Customer effort score form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>1 — Very easy</strong> takes a plain number with no unit attached. It feeds 4 — Difficult, 5 — Very difficult and 3 — Neutral. Fill it from a measurement rather than a memory — 1 — Very easy is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>2 — Easy</strong> takes a plain number with no unit attached. It feeds 1 — Very easy, 4 — Difficult and 5 — Very difficult. Fill it from a measurement rather than a memory — 2 — Easy is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>3 — Neutral</strong> takes a plain number with no unit attached. It feeds 1 — Very easy, 4 — Difficult and 5 — Very difficult. Fill it from a measurement rather than a memory — 3 — Neutral is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>4 — Difficult</strong> takes a plain number with no unit attached. It feeds 1 — Very easy, 5 — Very difficult and 3 — Neutral. Fill it from a measurement rather than a memory — 4 — Difficult is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>5 — Very difficult</strong> takes a plain number with no unit attached. It feeds 1 — Very easy, 4 — Difficult and 3 — Neutral. Fill it from a measurement rather than a memory — 5 — Very difficult is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 9 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Your CES</strong> is a plain number. It is worked out from 1 — Very easy, 2 — Easy, 3 — Neutral and 4 — Difficult. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>1 — Very easy</strong> is a plain number. It is worked out from Your CES, 2 — Easy, 3 — Somewhat easy and 4 — Neutral. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>2 — Easy</strong> is a plain number. It is worked out from Your CES, 1 — Very easy, 3 — Somewhat easy and 4 — Neutral. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>3 — Somewhat easy</strong> is a plain number. It is worked out from Your CES, 1 — Very easy, 2 — Easy and 4 — Neutral. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>4 — Neutral</strong> is a plain number. It is worked out from Your CES, 1 — Very easy, 2 — Easy and 3 — Somewhat easy. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>5 — Somewhat difficult</strong> is a plain number. It is worked out from Your CES, 1 — Very easy, 2 — Easy and 3 — Somewhat easy. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>6 — Difficult</strong> is a plain number. It is worked out from Your CES, 1 — Very easy, 2 — Easy and 3 — Somewhat easy. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>7 — Very difficult</strong> is a plain number. It is worked out from Your CES, 1 — Very easy, 2 — Easy and 3 — Somewhat easy. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Your CES</strong> is a plain number. It is worked out from 1 — Very easy, 2 — Easy, 3 — Somewhat easy and 4 — Neutral. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Your CES is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when 1 — Very easy, 2 — Easy and 3 — Neutral is what you already know and Your CES and 1 — Very easy is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/dream-come-true">Dream come true Calculator</a>, <a href="/finance/dupont-analysis">DuPont analysis Calculator</a> and <a href="/finance/ear">EAR Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Customer effort score calculator work out?', 'a' => <<<'TXT'
            Your CES, 1 — Very easy, 2 — Easy and 3 — Somewhat easy, from 1 — Very easy, 2 — Easy, 3 — Neutral and 4 — Difficult. The relationship is Your CES = (1 — Very easy + 2 × 2 — Easy + 3 × 3 — Neutral + 4 × 4 — Difficult + 5 × 5 — Very difficult) ÷ (1 — Very easy + 2 — Easy + 3 — Neutral + 4 — Difficult + 5 — Very difficult).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            1 — Very easy, 2 — Easy, 3 — Neutral, 4 — Difficult, 5 — Very difficult. Enter 1 — Very easy, 2 — Easy and 3 — Neutral; Your CES is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Your CES, 1 — Very easy, 4 — Difficult and 5 — Very difficult blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Your CES is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave 1 — Very easy blank and the page solves for it, reporting Your CES instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Your CES keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/dream-come-true', 'name' => 'Dream come true Calculator'],
            ['path' => '/finance/dupont-analysis', 'name' => 'DuPont analysis Calculator'],
            ['path' => '/finance/ear', 'name' => 'EAR Calculator'],
        ],
        'authors' => [],
    ],
];
