<?php

/**
 * Moon phase
 * /everyday-life/moon-phase
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Moon phase',
    'meta' => ['title' => 'Moon phase Calculator: Formula, Steps & Examples', 'description' => 'Moon phase works out new moons elapsed from date and i want to know the next.... Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Moon phase Calculator', 'updated' => '2026-09-18'],
    'raw' => [
        'vars' => [
            'date' => ['type' => 'date', 'rnd' => null],
            'daysIntoCycle' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'daysSinceNew' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'daysToFullMoon' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'daysToNewMoon' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'difference' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'display_more' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'zMLQEslEXxN7LwljwASnG', 'c' => null],
                ],
                'ds' => 'UpLb35miMpuoDEOTUwhGh',
            ],
            'fullMoonDay' => ['type' => 'date', 'rnd' => null],
            'fullSecondCheck' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'jan62000' => [
                'type' => 'date',
                'rnd' => null,
                'dfl' => [
                    ['v' => '947116800000', 'c' => null],
                ],
            ],
            'newMoonDay' => ['type' => 'date', 'rnd' => null],
            'newMoons' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'newMoonsRem' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'next_phase' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yrW2eEtrgsqpnuoaefbZl', 'c' => null],
                    ['v' => 'yrW2eEtrgsqpnuoaefbZl', 'c' => 'userUsesImperialUnits()'],
                ],
                'ds' => 'OiASlVKRyLm-igqhnIRJo',
            ],
            'today' => ['type' => 'date', 'rnd' => null],
        ],
        'groups' => [
            [
                'uid' => 'JAq_ZoKF2Az46dkwygBEs',
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
                                        [null, 'Use this calculator to find the Moon phase on any day of any year. You\'ll also see what the approximate Moon phase on that day.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'date', 'vt' => 'date', 'l' => 'Date'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'display_more',
                                    'vt' => 'valueSelect',
                                    'l' => '',
                                    'ds' => 'UpLb35miMpuoDEOTUwhGh',
                                    'opts' => [
                                        ['PhH-H15CemYaH1OFI961l', 'Display more information ', '1'],
                                        ['zMLQEslEXxN7LwljwASnG', '', '0'],
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
                                    'n' => 'newMoons',
                                    'vt' => 'numerical',
                                    'l' => 'New moons elapsed',
                                    'h' => 'Number of new moons between January 6, 2000 and the entered date.',
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
                                    'n' => 'daysIntoCycle',
                                    'vt' => 'numerical',
                                    'l' => 'Days into cycle',
                                    'suf' => 'earth days',
                                    'h' => 'Also known as a lunar day, starting from each new moon.',
                                ],
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
                                        ['hasValue(difference)', 'The Moon phase on the selected date&nbsp;'],
                                        ['difference < 0', 'was a&nbsp;'],
                                        ['difference >= 0', 'will be a&nbsp;'],
                                        ['daysIntoCycle>0 and daysIntoCycle<=1', 'new moon. &nbsp;'],
                                        ['daysIntoCycle>1 and daysIntoCycle<=6.38264692644001', 'waxing crescent. &nbsp;'],
                                        ['daysIntoCycle>6.38264692644001 and daysIntoCycle<=8.38264692644', 'first quarter. &nbsp;'],
                                        ['daysIntoCycle>8.38264692644 and daysIntoCycle<=13.76529385288', 'waxing gibbous. &nbsp;'],
                                        ['daysIntoCycle>13.76529385288 and daysIntoCycle<=15.76529385288', 'full moon. &nbsp;'],
                                        ['daysIntoCycle>15.76529385288 and daysIntoCycle<=21.14794077932', 'waning gibbous. &nbsp;'],
                                        ['daysIntoCycle>21.14794077932 and daysIntoCycle<=23.14794077932', 'last quarter. &nbsp;'],
                                        ['daysIntoCycle>23.14794077932 and daysIntoCycle<=28.53058770576', 'waning crescent. &nbsp;'],
                                        ['daysIntoCycle>28.53058770576 and daysIntoCycle<=29.53058770576', 'new moon. '],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => '_3bl4PSt3QDM2h36eLM9t',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'next_phase',
                                    'vt' => 'valueSelect',
                                    'l' => 'I want to know the next...',
                                    'ds' => 'OiASlVKRyLm-igqhnIRJo',
                                    'opts' => [
                                        ['yrW2eEtrgsqpnuoaefbZl', 'new moon', '0'],
                                        ['Nu9-M9VuqOInXG2rHgiF5', 'full moon', '1'],
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
                                    't' => 'x',
                                    'c' => [
                                        ['next_phase==0 and hasValue(newMoonDay)', 'The next new moon  from the selected date is {{newMoonDay.shortValue}}.&nbsp;'],
                                        ['next_phase==1 and hasValue(fullMoonDay)', 'The next full moon  from the selected date is {{fullMoonDay.shortValue}}.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'p98HBLLPpgigiN_PDRk9Z',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'jan62000', 'vt' => 'date', 'l' => 'Jan62000'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'daysSinceNew',
                                    'vt' => 'numerical',
                                    'l' => 'Days since new',
                                    'suf' => 'days',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'newMoonDay', 'vt' => 'date', 'l' => 'New moon day'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'fullMoonDay', 'vt' => 'date', 'l' => 'Full moon day'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'today', 'vt' => 'date', 'l' => 'Today'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'difference',
                                    'vt' => 'numerical',
                                    'l' => 'Difference',
                                    'us' => '19',
                                    'du' => 'days',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'newMoonsRem', 'vt' => 'numerical', 'l' => 'New moons rem'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'daysToFullMoon', 'vt' => 'numerical', 'l' => 'Days to full moon'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'daysToNewMoon', 'vt' => 'numerical', 'l' => 'Days to new moon'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'fullSecondCheck', 'vt' => 'numerical', 'l' => 'Full second check'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'daysSinceNew = date - jan62000',
                'var' => [
                    [
                        'l' => 'jan62000',
                        'f' => 'date - daysSinceNew',
                        'r' => ['date', 'daysSinceNew'],
                    ],
                    [
                        'l' => 'date',
                        'f' => 'daysSinceNew + jan62000',
                        'r' => ['jan62000', 'daysSinceNew'],
                    ],
                    [
                        'l' => 'daysSinceNew',
                        'f' => 'date - jan62000',
                        'r' => ['jan62000', 'date'],
                    ],
                ],
            ],
            [
                'formula' => 'newMoons = one_way(daysSinceNew / 29.53058770576)',
                'var' => [
                    [
                        'l' => 'newMoons',
                        'f' => '((6250000000/184566173161)*daysSinceNew)',
                        'r' => ['daysSinceNew'],
                    ],
                ],
            ],
            [
                'formula' => 'daysIntoCycle = mod(daysSinceNew, 29.53058770576)',
                'var' => [
                    [
                        'l' => 'daysIntoCycle',
                        'f' => 'mod(daysSinceNew, 184566173161/6250000000)',
                        'r' => ['daysSinceNew'],
                    ],
                ],
            ],
            [
                'formula' => 'newMoonsRem = one_way(newMoons - floor(newMoons))',
                'var' => [
                    [
                        'l' => 'newMoonsRem',
                        'f' => '(((6250000000/184566173161)*daysSinceNew) - floor(((6250000000/184566173161)*daysSinceNew)))',
                        'r' => ['daysSinceNew'],
                    ],
                ],
            ],
            [
                'formula' => 'difference = date*86400000 - (today - mod(today, 86400000))',
                'var' => [
                    [
                        'l' => 'date',
                        'f' => '(1/86400000)*difference + (1/86400000)*today - 1/86400000*mod(today, 86400000)',
                        'r' => ['difference', 'today'],
                    ],
                    [
                        'l' => 'difference',
                        'f' => '86400000*date - today + mod(today, 86400000)',
                        'r' => ['date', 'today'],
                    ],
                ],
            ],
            [
                'formula' => 'daysToNewMoon = 29.53058770576 - mod(daysSinceNew, 29.53058770576)',
                'var' => [
                    [
                        'l' => 'daysToNewMoon',
                        'f' => '184566173161/6250000000 - mod(daysSinceNew, 184566173161/6250000000)',
                        'r' => ['daysSinceNew'],
                    ],
                ],
            ],
            [
                'formula' => 'newMoonDay = date + if_else(daysToNewMoon < 1, daysToNewMoon + 29.53058770576, daysToNewMoon)',
                'var' => [
                    [
                        'l' => 'date',
                        'f' => <<<'TXT'
                        ((mod(daysSinceNew, 184566173161/6250000000) > 178316173161/6250000000) ? (
                           newMoonDay - (184566173161/3125000000 - mod(daysSinceNew, 184566173161/6250000000))
                        )
                        : (
                           newMoonDay - (184566173161/6250000000 - mod(daysSinceNew, 184566173161/6250000000))
                        ))
                        TXT,
                        'r' => ['newMoonDay', 'daysSinceNew'],
                    ],
                    [
                        'l' => 'newMoonDay',
                        'f' => <<<'TXT'
                        ((mod(daysSinceNew, 184566173161/6250000000) > 178316173161/6250000000) ? (
                           date + (184566173161/3125000000 - mod(daysSinceNew, 184566173161/6250000000))
                        )
                        : (
                           date + (184566173161/6250000000 - mod(daysSinceNew, 184566173161/6250000000))
                        ))
                        TXT,
                        'r' => ['date', 'daysSinceNew'],
                    ],
                ],
            ],
            [
                'formula' => 'daysToFullMoon = 29.53058770576/2 - mod(daysSinceNew, 29.53058770576) + 29.53058770576*get_stage(daysIntoCycle)',
                'var' => [
                    [
                        'l' => 'daysToFullMoon',
                        'f' => '(184566173161/6250000000)*get_stage(mod(daysSinceNew, 184566173161/6250000000)) - mod(daysSinceNew, 184566173161/6250000000) + 184566173161/12500000000',
                        'r' => ['daysSinceNew'],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                fullSecondCheck = if_else(daysToFullMoon < 0, 29.53058770576/2 - mod(daysSinceNew, 29.53058770576) + 29.53058770576*get_stage(daysIntoCycle) + 29.53058770576, 29.53058770576/2 - mod(daysSinceNew, 29.53058770576) + 29.53058770576*get_stage(daysIntoCycle))
                TXT,
                'var' => [
                    [
                        'l' => 'fullSecondCheck',
                        'f' => <<<'TXT'
                        ((((184566173161/6250000000)*get_stage(mod(daysSinceNew, 184566173161/6250000000)) - mod(daysSinceNew, 184566173161/6250000000) < -184566173161/12500000000) ? (
                           (184566173161/6250000000)*get_stage(mod(daysSinceNew, 184566173161/6250000000)) - mod(daysSinceNew, 184566173161/6250000000) + 553698519483/12500000000
                        )
                        : (
                           (184566173161/6250000000)*get_stage(mod(daysSinceNew, 184566173161/6250000000)) - mod(daysSinceNew, 184566173161/6250000000) + 184566173161/12500000000
                        )))
                        TXT,
                        'r' => ['daysSinceNew'],
                    ],
                ],
            ],
            [
                'formula' => <<<'TXT'
                fullMoonDay = date + (if_else(daysToFullMoon < 0, 29.53058770576/2 - mod(daysSinceNew, 29.53058770576) + 29.53058770576*get_stage(daysIntoCycle) + 29.53058770576, 29.53058770576/2 - mod(daysSinceNew, 29.53058770576) + 29.53058770576*get_stage(daysIntoCycle)))
                TXT,
                'var' => [
                    [
                        'l' => 'fullMoonDay',
                        'f' => <<<'TXT'
                        (((184566173161/6250000000)*get_stage(mod(daysSinceNew, 184566173161/6250000000)) - mod(daysSinceNew, 184566173161/6250000000) < -184566173161/12500000000) ? (
                           date + ((184566173161/6250000000)*get_stage(mod(daysSinceNew, 184566173161/6250000000)) - mod(daysSinceNew, 184566173161/6250000000) + 553698519483/12500000000)
                        )
                        : (
                           date + ((184566173161/6250000000)*get_stage(mod(daysSinceNew, 184566173161/6250000000)) - mod(daysSinceNew, 184566173161/6250000000) + 184566173161/12500000000)
                        ))
                        TXT,
                        'r' => ['date', 'daysSinceNew'],
                    ],
                    [
                        'l' => 'date',
                        'f' => <<<'TXT'
                        (((184566173161/6250000000)*get_stage(mod(daysSinceNew, 184566173161/6250000000)) - mod(daysSinceNew, 184566173161/6250000000) < -184566173161/12500000000) ? (
                           fullMoonDay - ((184566173161/6250000000)*get_stage(mod(daysSinceNew, 184566173161/6250000000)) - mod(daysSinceNew, 184566173161/6250000000) + 553698519483/12500000000)
                        )
                        : (
                           fullMoonDay - ((184566173161/6250000000)*get_stage(mod(daysSinceNew, 184566173161/6250000000)) - mod(daysSinceNew, 184566173161/6250000000) + 184566173161/12500000000)
                        ))
                        TXT,
                        'r' => ['fullMoonDay', 'daysSinceNew'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'OiASlVKRyLm-igqhnIRJo' => [
                'name' => 'Next',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'yrW2eEtrgsqpnuoaefbZl', 'label' => 'new moon', 'value' => '0'],
                    ['uid' => 'Nu9-M9VuqOInXG2rHgiF5', 'label' => 'full moon', 'value' => '1'],
                ],
            ],
            'UpLb35miMpuoDEOTUwhGh' => [
                'name' => 'Display more',
                'uiType' => 'CHECKBOX',
                'options' => [
                    ['uid' => 'PhH-H15CemYaH1OFI961l', 'label' => 'Display more information ', 'value' => '1'],
                    ['uid' => 'zMLQEslEXxN7LwljwASnG', 'label' => '', 'value' => '0'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        "use strict";omni.define("get_stage",function(daysIntoCycle){if(daysIntoCycle>13.765294&&daysIntoCycle<=15.765294){return 1}else{return 0}});//# sourceURL=customJs.js
        TXT,
    ],
    'article' => [
        'intro' => 'Give the Moon phase calculator the days since new, the today and the difference and it returns <strong>days to new moon</strong>.',
        'sections' => [
            ['title' => 'How does the Moon phase calculator work?', 'html' => <<<'TXT'
            <p>The Moon phase calculator takes the values in the form, applies the relationship described below and reports <strong>days to new moon</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case; then you give the today; then you type in the days since new and the difference.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A single on/off switch — tick it for &ldquo;Display more information&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>Pick the option that matches your case — 2 options, such as new moon and full moon. </li><li>A number, expressed in days.</li><li>A calendar date. Use the picker; the answer is recalculated the moment the date changes, and the count is done date-to-date rather than by subtracting timestamps.</li><li>A measured quantity, entered by default in days. The unit chip switches it to any of the 27 supported units.</li></ul><p>2 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Date</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>New moons elapsed</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Days into cycle</strong></td><td>A number stated in earth days.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Days since new</strong></td><td>A number stated in days.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>New moon day</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Full moon day</strong></td><td>A calendar date.</td><td>date</td><td>Calculated</td></tr><tr><td><strong>Today</strong></td><td>A calendar date.</td><td>date</td><td>You supply it</td></tr><tr><td><strong>Difference</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>You supply it</td></tr><tr><td><strong>New moons rem</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Days to full moon</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Days to new moon</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Full second check</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Moon phase calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Jan 62000</span><span class="formula-eq">=</span><span class="formula-rhs">date − days since new</span></div><div class="formula-row"><span class="formula-lhs">New moons elapsed</span><span class="formula-eq">=</span><span class="formula-rhs">((6250000000 ÷ 184566173161) × days since new)</span></div><div class="formula-row"><span class="formula-lhs">Days into cycle</span><span class="formula-eq">=</span><span class="formula-rhs">(days since new, 184566173161 ÷ 6250000000)</span></div><div class="formula-row"><span class="formula-lhs">New moons rem</span><span class="formula-eq">=</span><span class="formula-rhs">(((6250000000 ÷ 184566173161) × days since new) − rounded down, (((6250000000 ÷ 184566173161) × days since new)))</span></div><div class="formula-row"><span class="formula-lhs">Date</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 86400000) × difference + (1 ÷ 86400000) × today − 1 ÷ 86400000 × (today, 86400000)</span></div><div class="formula-row"><span class="formula-lhs">Days to new moon</span><span class="formula-eq">=</span><span class="formula-rhs">184566173161 ÷ 6250000000 − (days since new, 184566173161 ÷ 6250000000)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A calendar date.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A calendar date.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A calendar date.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A calendar date.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in days</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Moon phase calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 3 figures keep coming back — the days since new, the today and the difference — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>Dates are compared date to date in your own time zone, so a daylight-saving change will not shift the count by a day.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/carpooling">Carpooling</a>, <a href="/everyday-life/child-cost">One-time child costs</a> and <a href="/everyday-life/chronological-age">Chronological age</a>.</p>
            TXT],
            ['title' => 'Reading a phase estimate from a date', 'html' => <<<'TXT'
            <p>The Moon phase changes continuously through the lunar cycle. This calculator uses the selected date, a reference point and its built-in cycle model to estimate values such as days since new moon, days until a named phase and the next phase. The output is a model-based calendar estimate, not a direct observation of the Moon. Read the field labels carefully: “days since new” and “days until new” refer to opposite directions in the cycle.</p>
            <p>Confirm the date and time basis before comparing the result with an almanac or local observation. A phase changes at a particular instant, so the local calendar date of a new or full moon can differ by time zone. If the form uses only a date, it may not express that instant to the hour. The Moon can also be below the horizon or hidden by clouds even when the calculation gives a phase for that date.</p>
            <p>The optional display setting may reveal additional cycle information; it changes which relationship the page reports, so make sure it matches your question. Some outputs use a reference epoch or a fixed average cycle length. Real lunar motion is not perfectly uniform, and a simplified cycle can differ slightly from a detailed astronomical ephemeris. Treat the estimate as suitable for general planning and learning, not as a precision observation schedule.</p>
            <p>To check the direction of the result, move the date forward by one day and see whether the number of days to a phase generally decreases toward that event, then resets after it passes. If a result seems to jump, check the selected mode and whether it reports the previous or next occurrence. Compare exact dates with a current almanac if a precise conjunction, eclipse or observation time matters.</p>
            <p>Phase names describe the visible illumination pattern, not the Moon’s distance from Earth or its apparent height in the sky. A full moon occurs when the Moon is opposite the Sun as seen from Earth; local viewing conditions and horizon position affect what you see. This calculator does not compute a rise/set time, altitude, azimuth or visibility from a particular location.</p>
            <p>Use the result to plan a casual observation, lesson or calendar note. For photography, navigation, eclipse timing or other precision work, consult a current ephemeris and use the exact time and location. The calculator’s date-based estimate is a convenient overview of the cycle, not a substitute for a detailed sky model.</p>
            TXT],
            ['title' => 'Distinguish the phase from the viewing conditions', 'html' => <<<'TXT'
            <p>The phase is a geometric description of how the Sun illuminates the Moon as seen from Earth. The fraction visible can be described as waxing or waning and as crescent, quarter, gibbous, new or full, but a date-only estimate may not identify the exact time of a transition. Near a new or full moon, a difference of several hours can place two almanacs on adjacent calendar dates when they use different time zones.</p><p>A calculated phase does not guarantee that the Moon will be visible from your location. Cloud cover, buildings, terrain, horizon direction and the Moon’s rise and set times determine what you can observe. This page does not replace a local sky chart. For an observing plan, pair the phase estimate with a current rise/set or ephemeris source and enter the local date consistently.</p><p>Cycle models can use an average interval between new moons, while the real interval varies. That makes a simplified estimate useful for a broad calendar but less suitable for a precise event time. If you need to plan photography, an eclipse observation or an astronomical measurement, use a current ephemeris with the exact time scale and location.</p><p>To interpret the answer, note whether the calculator reports the previous occurrence, the next occurrence or a number of days within the current cycle. If a result is unexpected, toggle the optional detail mode only if it matches the question, and check the selected date before assuming the phase calculation is wrong.</p>
            TXT],
            ['title' => 'Use the result as a planning window', 'html' => <<<'TXT'
            <p>For a casual observation, plan a window around the displayed date rather than expecting one exact minute from a date-based result. Check a local sky chart for rise and set times and look toward the appropriate horizon. Weather and local obstructions can matter more to the viewing experience than a small difference in the modeled phase.</p><p>If you are comparing a printed calendar with this result, note the time zone and whether each source names the nearest date or the exact instant of the phase. That usually explains a one-day difference near a transition.</p>
            TXT],
            ['title' => 'Note the date basis alongside the output', 'html' => <<<'TXT'
            <p>If you share the result with someone in another time zone, include the date and the calculator’s time basis. The same lunar event can be listed on different local calendar dates, even though it is one instant. That context prevents a date-only estimate from appearing inconsistent with an almanac.</p>
            TXT],
            ['title' => 'Confirm exact timing for precision', 'html' => <<<'TXT'
            <p>For an exact phase instant, consult a current ephemeris that states its time scale. This date-oriented calculator is intended for a general overview and may round or simplify the event timing.</p>
            TXT],
            ['title' => 'Keep date comparisons consistent', 'html' => <<<'TXT'
            <p>When checking a printed phase calendar, compare the same local date and time zone. A daily label may refer to the phase at noon, the nearest event or the exact event date.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Moon phase calculator work out?', 'a' => 'It returns days to new moon, derived from the days since new, the today and the difference.'],
            ['q' => 'What do I need to enter to use the Moon phase calculator?', 'a' => 'The form asks for the days since new, the today and the difference, which is 5 fields in total.'],
            ['q' => 'Can I enter difference in a different unit?', 'a' => 'Yes. Difference opens in days and the chip beside it offers 27 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/carpooling', 'name' => 'Carpooling'],
            ['path' => '/everyday-life/child-cost', 'name' => 'One-time child costs'],
            ['path' => '/everyday-life/chronological-age', 'name' => 'Chronological age'],
        ],
    ],
];
