<?php

/**
 * Burndown chart
 * /finance/burndown-chart
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Burndown chart',
    'meta' => ['title' => 'Burndown chart Calculator — Formula & Results', 'description' => 'Burndown chart works out day Count from sprint duration and total story points. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Burndown chart Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'This burndown chart calculator will help you to track your sprint progress.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Sprint details',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sprint_duration',
                            'label' => 'Sprint duration',
                            'type' => 'number',
                            'suffix' => 'working days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_sp',
                            'label' => 'Total story points',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Story points burnt each day',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x1',
                            'label' => 'Day 1',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x2',
                            'label' => 'Day 2',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x3',
                            'label' => 'Day 3',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x4',
                            'label' => 'Day 4',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x5',
                            'label' => 'Day 5',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x6',
                            'label' => 'Day 6',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x7',
                            'label' => 'Day 7',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x8',
                            'label' => 'Day 8',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x9',
                            'label' => 'Day 9',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x10',
                            'label' => 'Day 10',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x11',
                            'label' => 'Day 11',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x12',
                            'label' => 'Day 12',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x13',
                            'label' => 'Day 13',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x14',
                            'label' => 'Day 14',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x15',
                            'label' => 'Day 15',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x16',
                            'label' => 'Day 16',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x17',
                            'label' => 'Day 17',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x18',
                            'label' => 'Day 18',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x19',
                            'label' => 'Day 19',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x20',
                            'label' => 'Day 20',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x21',
                            'label' => 'Day 21',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x22',
                            'label' => 'Day 22',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x23',
                            'label' => 'Day 23',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x24',
                            'label' => 'Day 24',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x25',
                            'label' => 'Day 25',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x26',
                            'label' => 'Day 26',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x27',
                            'label' => 'Day 27',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x28',
                            'label' => 'Day 28',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x29',
                            'label' => 'Day 29',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'x30',
                            'label' => 'Day 30',
                            'type' => 'number',
                            'suffix' => 'story points',
                            'rounding' => ['standard', '0'],
                            'default' => '0',
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
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'dayCount > 1', 'text' => <<<'TXT'
                                Since the sprint started {{dayCount.value}} days have passed. The team has burnt down {{spBurnt.value}} story points, with {{sp_difference.value}} story points remaining.&nbsp;
                                TXT],
                                ['when' => 'dayCount == 1', 'text' => <<<'TXT'
                                Since the sprint started {{dayCount.value}} day has passed. The team has burnt down {{spBurnt.value}} story points, with {{sp_difference.value}} story points remaining.&nbsp;
                                TXT],
                                ['when' => null, 'text' => '​ ​ The current burndown speed is {{sp_speed_cur_final.value}} story points / day.&nbsp;'],
                                ['when' => 'sprint_duration - dayCount == 0', 'text' => '​ ​ You have completed your sprint! Now look at your results:&nbsp;'],
                                ['when' => 'sprint_duration - dayCount > 0', 'text' => '​ ​ The burndown speed required to complete all the tasks before the sprint ends is {{sp_speed_req_final.value}} story points / day. ⏱&nbsp;'],
                                ['when' => 'sprint_duration - dayCount == 0 and total_sp < spBurnt', 'text' => '​ ​ Well done, your team has done {{sp_excess.value}} story points over the target! '],
                                ['when' => 'sprint_duration - dayCount == 0 and total_sp == spBurnt', 'text' => '​ ​ Congratulations, your team has completed the sprint perfectly. '],
                                ['when' => 'sprint_duration - dayCount == 0 and total_sp > spBurnt', 'text' => '​ ​ Oh no, your team has run out of time. ⌛ You should reflect this at your Sprint Retrospective and better plan your team\'s sprint next time.'],
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
                        [
                            'name' => 'dayCount',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spBurnt',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sp_speed_cur',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sp_speed_req',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sp_difference',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sp_speed_cur_final',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sp_excess',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sp_speed_req_final',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dayCount',
                            'label' => 'Day Count',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'spBurnt',
                            'label' => 'Sp Burnt',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => <<<'TXT'
            dayCount = get_dayCount(x1, x2, x3, x4, x5, x6, x7, x8, x9, x10, x11, x12, x13, x14, x15, x16, x17, x18, x19, x20, x21, x22, x23, x24, x25, x26, x27, x28, x29, x30, sprint_duration)
            TXT,
            'results' => ['dayCount' => <<<'TXT'
            get_dayCount(x1, x2, x3, x4, x5, x6, x7, x8, x9, x10, x11, x12, x13, x14, x15, x16, x17, x18, x19, x20, x21, x22, x23, x24, x25, x26, x27, x28, x29, x30, sprint_duration)
            TXT],
        ],
        [
            'title' => <<<'TXT'
            spBurnt = get_spBurnt(x1, x2, x3, x4, x5, x6, x7, x8, x9, x10, x11, x12, x13, x14, x15, x16, x17, x18, x19, x20, x21, x22, x23, x24, x25, x26, x27, x28, x29, x30, sprint_duration)
            TXT,
            'results' => ['spBurnt' => <<<'TXT'
            get_spBurnt(x1, x2, x3, x4, x5, x6, x7, x8, x9, x10, x11, x12, x13, x14, x15, x16, x17, x18, x19, x20, x21, x22, x23, x24, x25, x26, x27, x28, x29, x30, sprint_duration)
            TXT],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_dayCount",function(x1,x2,x3,x4,x5,x6,x7,x8,x9,x10,x11,x12,x13,x14,x15,x16,x17,x18,x19,x20,x21,x22,x23,x24,x25,x26,x27,x28,x29,x30,sprint_duration){var dayCount=0;var inputs=[x1,x2,x3,x4,x5,x6,x7,x8,x9,x10,x11,x12,x13,x14,x15,x16,x17,x18,x19,x20,x21,x22,x23,x24,x25,x26,x27,x28,x29,x30];for(var i=0;i<sprint_duration;i++){if(inputs[i]>0){dayCount+=1}}return dayCount});omni.define("get_spBurnt",function(x1,x2,x3,x4,x5,x6,x7,x8,x9,x10,x11,x12,x13,x14,x15,x16,x17,x18,x19,x20,x21,x22,x23,x24,x25,x26,x27,x28,x29,x30,sprint_duration){var spBurnt=0;var inputs=[x1,x2,x3,x4,x5,x6,x7,x8,x9,x10,x11,x12,x13,x14,x15,x16,x17,x18,x19,x20,x21,x22,x23,x24,x25,x26,x27,x28,x29,x30];for(var i=0;i<sprint_duration;i++){if(inputs[i]>0){spBurnt+=inputs[i]}}return spBurnt});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Burndown chart works out Day Count and Sp Burnt from Sprint duration, Total story points and Day 1. The arithmetic is the whole method: day Count is worked out from sprint duration by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Burndown chart calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Burndown chart: it takes 32 numbers and reports Day Count and Sp Burnt.</p><p>The answers are Day Count and Sp Burnt; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 32 boxes, and nothing else.</p><ul><li><strong>Sprint duration</strong> — in working days</li><li><strong>Total story points</strong> — a plain number, no unit</li><li><strong>Day 1</strong> — in story points</li><li><strong>Day 2</strong> — in story points</li><li><strong>Day 3</strong> — in story points</li><li><strong>Day 4</strong> — in story points</li><li><strong>Day 5</strong> — in story points</li><li><strong>Day 6</strong> — in story points</li><li><strong>Day 7</strong> — in story points</li><li><strong>Day 8</strong> — in story points</li><li><strong>Day 9</strong> — in story points</li><li><strong>Day 10</strong> — in story points</li><li><strong>Day 11</strong> — in story points</li><li><strong>Day 12</strong> — in story points</li><li><strong>Day 13</strong> — in story points</li><li><strong>Day 14</strong> — in story points</li><li><strong>Day 15</strong> — in story points</li><li><strong>Day 16</strong> — in story points</li><li><strong>Day 17</strong> — in story points</li><li><strong>Day 18</strong> — in story points</li><li><strong>Day 19</strong> — in story points</li><li><strong>Day 20</strong> — in story points</li><li><strong>Day 21</strong> — in story points</li><li><strong>Day 22</strong> — in story points</li><li><strong>Day 23</strong> — in story points</li><li><strong>Day 24</strong> — in story points</li><li><strong>Day 25</strong> — in story points</li><li><strong>Day 26</strong> — in story points</li><li><strong>Day 27</strong> — in story points</li><li><strong>Day 28</strong> — in story points</li><li><strong>Day 29</strong> — in story points</li><li><strong>Day 30</strong> — in story points</li></ul><p>The result boxes are Day Count, Sp Burnt; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Day Count is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul></ul><p>Any one of Day Count and Sp Burnt can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Day Count and Sp Burnt are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Sprint duration left as a guess.</strong> Anything typed into Sprint duration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Total story points left as a guess.</strong> Anything typed into Total story points is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Day 1 left as a guess.</strong> Anything typed into Day 1 is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Sprint duration is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Burndown chart form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Sprint duration</strong> is measured in working days. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Sprint duration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total story points</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Total story points is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 1</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 2</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 2 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 3</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 3 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 4</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 4 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 5</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 5 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 6</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 6 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 7</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 7 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 8</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 8 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 9</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 9 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 10</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 10 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 11</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 11 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 12</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 12 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 13</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 13 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 14</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 14 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 15</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 15 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 16</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 16 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 17</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 17 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 18</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 18 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 19</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 19 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 20</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 20 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 21</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 21 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 22</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 22 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 23</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 23 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 24</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 24 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 25</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 25 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 26</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 26 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 27</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 27 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 28</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 28 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 29</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 29 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Day 30</strong> is measured in story points. Change it and Day Count and Sp Burnt changes with it. Fill it from a measurement rather than a memory — Day 30 is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Day Count is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Sprint duration, Total story points and Day 1 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Sprint duration, Total story points and Day 1 measured, Day Count and Sp Burnt wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/labor-force-participation-rate">Labor force participation rate Calculator</a>, <a href="/finance/land-loan-payment">Land loan</a> and <a href="/finance/lease-mileage">Lease mileage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Burndown chart calculator work out?', 'a' => 'Day Count and Sp Burnt, from Day 1, Day 2, Day 3 and Day 4.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sprint duration (working days), Total story points, Day 1 (story points), Day 2 (story points), Day 3 (story points). Enter sprint duration, total story points and day 1; Day Count is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Day Count and Sp Burnt blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Day Count is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Sprint duration blank and the page solves for it, reporting Day Count instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Day Count keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/labor-force-participation-rate', 'name' => 'Labor force participation rate Calculator'],
            ['path' => '/finance/land-loan-payment', 'name' => 'Land loan'],
            ['path' => '/finance/lease-mileage', 'name' => 'Lease mileage Calculator'],
        ],
        'authors' => [],
    ],
];
