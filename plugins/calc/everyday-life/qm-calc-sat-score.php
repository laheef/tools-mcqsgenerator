<?php

/**
 * SAT® score
 * /everyday-life/sat-score
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'SAT® score',
    'meta' => ['title' => 'SAT® score Calculator: Formula, Steps & Examples', 'description' => 'SAT® score works out reading and writing (200-800) and math (200-800) from module 1 (0-27) and module 2 (0-27). The formula is printed in the form\'s own words.', 'h1' => 'SAT® score Calculator', 'updated' => '2026-04-29'],
    'sections' => [
        [
            'title' => 'Reading and writing',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rw_module_1',
                            'label' => 'Module 1 (0-27)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rw_module_2',
                            'label' => 'Module 2 (0-27)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Math',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'math_module_1',
                            'label' => 'Module 1 (0-22)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'math_module_2',
                            'label' => 'Module 2 (0-22)',
                            'type' => 'number',
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
                            'name' => 'isAdaptive',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Adaptive' => '1', '' => '0'],
                            'dataset' => 'isAdaptive',
                            'control' => 'CHECKBOX',
                            'default' => 'Adaptive',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'reading_and_writing',
                            'label' => 'Reading and writing (200-800)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'math',
                            'label' => 'Math (200-800)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sat_score',
                            'label' => 'Sat score (400-1600)',
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
                                ['when' => null, 'text' => 'You are&nbsp;'],
                                ['when' => 'sat_score < 1029', 'text' => 'below&nbsp;'],
                                ['when' => 'sat_score >= 1029', 'text' => 'above&nbsp;'],
                                ['when' => null, 'text' => 'the US average SAT® score of 1029 in October 2025.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'reading_and_writing = getRW(rw_module_1, rw_module_2, isAdaptive)',
            'results' => ['reading_and_writing' => 'getRW(rw_module_1, rw_module_2, isAdaptive)'],
        ],
        [
            'title' => 'math = getMath(math_module_1, math_module_2, isAdaptive)',
            'results' => ['math' => 'getMath(math_module_1, math_module_2, isAdaptive)'],
        ],
        [
            'title' => 'sat_score = one_way(reading_and_writing + math)',
            'results' => ['sat_score' => '(getMath(math_module_1, math_module_2, isAdaptive) + getRW(rw_module_1, rw_module_2, isAdaptive))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var RW_array=[200,200,200,200,200,210,210,220,240,250,260,270,300,330,350,360,380,380,390,400,410,430,430,440,450,470,470,480,490,500,510,520,530,540,550,560,570,580,590,600,610,620,630,640,650,660,670,680,700,710,720,730,760,780,800];var Math_array=[200,200,200,200,200,200,210,240,270,300,310,330,340,350,350,360,380,390,390,400,420,440,450,460,480,500,520,530,540,570,580,590,600,620,640,650,670,690,730,750,760,770,790,790,800];var RW_array_adaptive=[[200,200,200,200,200,200,200,210,210,220,240,250,260,260,270,300,330,350,350,360,380,380,390,390,400,410,430,430],[200,200,200,200,200,200,210,220,220,240,250,260,270,270,300,330,350,360,360,380,380,390,400,400,410,430,430,440],[200,200,200,200,200,210,220,240,240,250,260,270,300,300,330,350,360,380,380,380,390,400,410,410,430,430,440,450],[200,200,200,200,210,220,240,250,250,260,270,300,330,330,350,360,380,380,380,390,400,410,430,430,430,440,450,470],[200,200,210,210,220,240,250,260,260,270,300,330,350,350,360,380,380,390,390,400,410,430,430,430,440,450,470,470],[200,210,220,220,240,250,260,270,270,300,330,350,360,360,380,380,390,400,400,410,430,430,440,440,450,470,470,480],[210,220,240,240,250,260,270,300,300,330,350,360,380,380,380,390,400,410,410,430,430,440,450,450,470,470,480,490],[220,240,250,250,260,270,300,330,330,350,360,380,380,380,390,400,410,430,430,430,440,450,470,470,470,480,490,500],[240,250,260,260,270,300,330,350,350,360,380,380,390,390,400,410,430,430,430,440,450,470,470,470,480,490,500,510],[250,260,270,270,300,330,350,360,360,380,380,390,400,400,410,430,430,440,440,450,470,470,480,480,490,500,510,520],[260,270,300,300,330,350,360,380,380,380,390,400,410,410,430,430,440,450,450,470,470,480,490,490,500,510,520,530],[270,300,330,330,350,360,380,380,380,390,400,410,430,430,430,440,450,470,470,470,480,490,500,500,510,520,530,540],[300,330,350,350,360,380,380,390,390,400,410,430,430,430,440,450,470,470,470,480,490,500,510,510,520,530,540,550],[330,350,360,360,380,380,390,400,400,410,430,430,440,440,450,470,470,480,480,490,500,510,520,520,530,540,550,560],[350,360,380,380,380,390,400,410,410,430,430,440,450,450,470,470,480,490,490,500,510,520,530,530,540,550,560,570],[360,380,380,380,390,400,410,430,430,430,440,450,470,470,470,480,490,500,500,510,520,530,540,540,550,560,570,580],[380,380,390,390,400,410,430,430,430,440,450,470,470,470,480,490,500,510,510,520,530,540,550,550,560,570,580,590],[380,390,400,400,410,430,430,440,440,450,470,470,480,480,490,500,510,520,520,530,540,550,560,560,570,580,590,600],[390,400,410,430,430,440,450,470,470,480,490,500,510,520,530,540,550,560,570,580,590,600,610,620,630,640,650,660],[400,410,430,430,440,450,470,470,480,490,500,510,520,530,540,550,560,570,580,590,600,610,620,630,640,650,660,670],[410,430,430,440,450,470,470,480,490,500,510,520,530,540,550,560,570,580,590,600,610,620,630,640,650,660,670,680],[430,430,440,450,470,470,480,490,500,510,520,530,540,550,560,570,580,590,600,610,620,630,640,650,660,670,680,700],[430,440,450,470,470,480,490,500,510,520,530,540,550,560,570,580,590,600,610,620,630,640,650,660,670,680,700,710],[440,450,470,470,480,490,500,510,520,530,540,550,560,570,580,590,600,610,620,630,640,650,660,670,680,700,710,720],[450,470,470,480,490,500,510,520,530,540,550,560,570,580,590,600,610,620,630,640,650,660,670,680,700,710,720,730],[470,470,480,490,500,510,520,530,540,550,560,570,580,590,600,610,620,630,640,650,660,670,680,700,710,720,730,760],[470,480,490,500,510,520,530,540,550,560,570,580,590,600,610,620,630,640,650,660,670,680,700,710,720,730,760,780],[480,490,500,510,520,530,540,550,560,570,580,590,600,610,620,630,640,650,660,670,680,700,710,720,730,760,780,800]];var Math_array_adaptive=[[200,200,200,200,200,200,200,210,210,240,270,300,310,310,330,340,350,350,350,360,380,390,390],[200,200,200,200,200,200,210,240,240,270,300,310,330,330,340,350,350,360,360,380,390,390,400],[200,200,200,200,200,210,240,270,270,300,310,330,340,340,350,350,360,380,380,390,390,400,420],[200,200,200,200,210,240,270,300,300,310,330,340,350,350,350,360,380,390,390,390,400,420,440],[200,200,210,210,240,270,300,310,310,330,340,350,350,350,360,380,390,390,390,400,420,440,450],[200,210,240,240,270,300,310,330,330,340,350,350,360,360,380,390,390,400,400,420,440,450,460],[210,240,270,270,300,310,330,340,340,350,350,360,380,380,390,390,400,420,420,440,450,460,480],[240,270,300,300,310,330,340,350,350,350,360,380,390,390,390,400,420,440,440,450,460,480,500],[270,300,310,310,330,340,350,350,350,360,380,390,390,390,400,420,440,450,450,460,480,500,520],[300,310,330,330,340,350,350,360,360,380,390,390,400,400,420,440,450,460,460,480,500,520,530],[310,330,340,340,350,350,360,380,380,390,390,400,420,420,440,450,460,480,480,500,520,530,540],[330,340,350,350,350,360,380,390,390,390,400,420,440,440,450,460,480,500,500,520,530,540,570],[340,350,350,350,360,380,390,390,390,400,420,440,450,450,460,480,500,520,520,530,540,570,580],[350,350,360,360,380,390,390,400,400,420,440,450,460,460,480,500,520,530,530,540,570,580,590],[350,360,380,380,390,390,400,420,420,440,450,460,480,480,500,520,530,540,540,570,580,590,600],[360,380,390,390,400,420,440,450,460,480,500,520,530,540,570,580,590,600,620,640,650,670,690],[380,390,390,400,420,440,450,460,480,500,520,530,540,570,580,590,600,620,640,650,670,690,730],[390,390,400,420,440,450,460,480,500,520,530,540,570,580,590,600,620,640,650,670,690,730,750],[390,400,420,440,450,460,480,500,520,530,540,570,580,590,600,620,640,650,670,690,730,750,760],[400,420,440,450,460,480,500,520,530,540,570,580,590,600,620,640,650,670,690,730,750,760,770],[420,440,450,460,480,500,520,530,540,570,580,590,600,620,640,650,670,690,730,750,760,770,790],[440,450,460,480,500,520,530,540,570,580,590,600,620,640,650,670,690,730,750,760,770,790,790],[450,460,480,500,520,530,540,570,580,590,600,620,640,650,670,690,730,750,760,770,790,790,800]];omni.define("getRW",function(module1,module2,adaptive){if(adaptive==0){return RW_array[mathjs.round(module1+module2)]}return RW_array_adaptive[mathjs.round(module1)][mathjs.round(module2)]});omni.define("getMath",function(module1,module2,adaptive){if(adaptive==0){return Math_array[mathjs.round(module1+module2)]}return Math_array_adaptive[mathjs.round(module1)][mathjs.round(module2)]});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'The SAT® score calculator turns the module 1 and the module 2 into <strong>reading and writing (200-800)</strong>.',
        'sections' => [
            ['title' => 'How does the SAT® score calculator work?', 'html' => <<<'TXT'
            <p>The SAT® score calculator takes the values in the form, applies the relationship described below and reports <strong>reading and writing (200-800)</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case; then you type in the module 1 (0-27), the module 2 (0-27), the module 1 (0-22) and the module 2 (0-22).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A single on/off switch — tick it for &ldquo;Adaptive&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Module 1 (0-27)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Module 2 (0-27)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Module 1 (0-22)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Module 2 (0-22)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Reading and writing (200-800)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Math (200-800)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Sat score (400-1600)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the SAT® score calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Reading and writing (200-800)</span><span class="formula-eq">=</span><span class="formula-rhs">(module 1 (0-27), module 2 (0-27), is Adaptive)</span></div><div class="formula-row"><span class="formula-lhs">Math (200-800)</span><span class="formula-eq">=</span><span class="formula-rhs">(module 1 (0-22), module 2 (0-22), is Adaptive)</span></div><div class="formula-row"><span class="formula-lhs">Sat score (400-1600)</span><span class="formula-eq">=</span><span class="formula-rhs">((module 1 (0-22), module 2 (0-22), is Adaptive) + (module 1 (0-27), module 2 (0-27), is Adaptive))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The SAT® score calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 2 figures keep coming back — the module 1 and the module 2 — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the SAT® score calculator, these are the ones that matter:</p>
            <ul><li>The 1 drop-down on this page offers a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — module 1 for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/dilution-ratio">Dilution ratio</a>, <a href="/everyday-life/dollars-in-words">Dollars in words</a> and <a href="/everyday-life/drake-equation-for-love">Drake equation for love</a>.</p>
            TXT],
            ['title' => 'Use the estimate as practice feedback', 'html' => <<<'TXT'
            <p>This calculator combines Reading and Writing and Math module inputs with an adaptive-test setting to estimate section scores and a total. It is best used as practice feedback, not as an official score report. The scoring tables or rules encoded in a calculator may not reflect every test form, current policy update or special circumstance. The official score is determined by the test provider under its current scoring process.</p>
            <p>Enter the results from the correct modules and check that you have not swapped Reading and Writing with Math. The adaptive toggle matters because the second module path may affect how responses are interpreted. If you are copying results from a practice platform, confirm that the platform labels modules in the same way and that the entered values are scaled scores or raw values as the calculator expects.</p>
            <p>A practice estimate can help you compare study sessions, identify a section that deserves attention or understand how a score range changes with module performance. It cannot identify why you missed questions, predict the exact content of a future test or guarantee a particular official score. Practice-test conditions, question mix, test-day performance and scoring rules all influence the actual result.</p>
            <p>Use the output cautiously when setting goals. A few points of movement may reflect a lookup-table step rather than a meaningful change in underlying skill. Track several practice attempts under similar conditions and review the questions you missed. If you use third-party score tables, check their date and source; a historical conversion may not match the current test format.</p>
            <p>Do not treat a single estimated score as an admissions prediction. Colleges consider different requirements and factors, and the calculator does not know an applicant’s context, current policies or future test result. Check official admissions information for the schools you are considering and use official score reports for applications.</p>
            <p>For reproducibility, record the module inputs, adaptive setting, practice-test source and date alongside the estimate. When comparing two attempts, change only the inputs that actually differ and use the same scoring assumptions. This turns the calculator into a simple progress log rather than a promise about a future score.</p>
            TXT],
            ['title' => 'Understand what the module entries represent', 'html' => <<<'TXT'
            <p>Before calculating, check whether the values you have are module scores, raw correct-answer counts or another practice platform’s estimate. This calculator expects the form’s specified values; entering raw question counts into fields meant for scaled or module results can produce a number with no useful interpretation. Read the field labels and the test source carefully, and do not assume that two practice products report equivalent inputs.</p><p>The adaptive setting should match the format of the practice attempt. If you are not sure whether a test was adaptive, check the instructions for that particular practice test. A toggle changes the path used by the calculator, not the student’s performance. If you use the wrong setting, the result may be misleading even when the module numbers were copied correctly.</p><p>Use section estimates to guide review rather than to label ability. A lower section estimate may reflect a few missed questions, timing, test conditions or the specific scoring table. Look back at question types, pacing and uncertainty to plan study. Repeating a practice test can also make answers familiar, so a score change does not necessarily represent the same amount of new learning.</p><p>When comparing attempts, keep the source and conditions consistent where possible, and write down the date, module values, adaptive setting and calculator output. If an official test result differs, the official report takes precedence. The estimate does not incorporate accommodations, equating details, unscored questions, test-day conditions or updated scoring rules that may apply to a specific administration.</p>
            TXT],
            ['title' => 'Keep preparation decisions evidence-based', 'html' => <<<'TXT'
            <p>Use more than one practice attempt before changing a study plan, and focus on patterns in the questions missed rather than on a single estimated total. The calculator does not identify skills to review or explain a score change. Official preparation materials and a teacher or counselor can help interpret practice results in the context of current test guidance.</p><p>Never submit a calculator estimate where an institution asks for an official score report. The estimate is an informal planning aid and cannot verify identity, test conditions or the score on record.</p>
            TXT],
            ['title' => 'Check the calculator’s assumptions before comparing', 'html' => <<<'TXT'
            <p>Some practice tests use different score tables or report module results in a different format. Before comparing two estimates, confirm that both inputs came from the same test format and that the adaptive option is set appropriately. A practice platform may provide a score estimate of its own; do not feed that estimate back into a field that expects module-level inputs unless the labels explicitly say so.</p><p>If you are tracking progress, keep the original practice test, date, module values and calculator settings. This gives context to a change in the total and helps distinguish a different scoring assumption from a change in performance.</p><p>For planning, use official information about test registration, score reporting and current scoring policy. This page cannot confirm a test record or replace the official report.</p>
            TXT],
            ['title' => 'Use the total in context', 'html' => <<<'TXT'
            <p>If one section is consistently stronger than the other, use the section estimates to guide review, not to predict an admissions outcome. The calculator does not know an institution’s requirements or how it weighs scores.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What scores do I enter?', 'a' => 'Enter the number correct in the Reading and Writing modules and Math modules using the ranges shown beside each field. Select the adaptive setting that matches the test format represented by the calculator.'],
            ['q' => 'How are the section and total scores estimated?', 'a' => 'The calculator applies its built-in scoring rules to the module inputs and reports Reading and Writing, Math and a combined estimate. The result depends on the selected mode and entered correct-answer counts.'],
            ['q' => 'Is this an official SAT score?', 'a' => 'No. It is an estimate from the calculator, not a College Board score report. Official scoring and test procedures may change; use your official results for admissions or reporting.'],
        ],
        'related' => [
            ['path' => '/everyday-life/dilution-ratio', 'name' => 'Dilution ratio'],
            ['path' => '/everyday-life/dollars-in-words', 'name' => 'Dollars in words'],
            ['path' => '/everyday-life/drake-equation-for-love', 'name' => 'Drake equation for love'],
        ],
    ],
];
