<?php

/**
 * English learning time
 * /everyday-life/english-learning
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'English learning time',
    'meta' => ['title' => 'English learning time: Formula, Steps & Results', 'description' => 'English learning time reports total hours weekly, A1 -> A2 (KET), A2 -> B1 (PET) and B1 -> B2 (FCE). Results come back in wk, with any other unit a click away.', 'h1' => 'English learning time Calculator', 'updated' => '2026-08-27'],
    'sections' => [
        [
            'title' => 'Weekly lessons',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Lesson_time',
                            'label' => 'Avg lesson time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weekly_lessons',
                            'label' => 'Lessons weekly',
                            'type' => 'number',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'weekly_hours',
                            'label' => 'Total hours weekly',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Time to reach next level',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'A2',
                            'label' => 'A1 -> A2 (KET)',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'B1',
                            'label' => 'A2 -> B1 (PET)',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'B2',
                            'label' => 'B1 -> B2 (FCE)',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'C1',
                            'label' => 'B2 -> C1 (CAE)',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'C2',
                            'label' => 'C1 -> C2 (CPE)',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Master',
                            'label' => 'A1 -> C2',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'weekly_hours = weekly_lessons * Lesson_time',
            'results' => ['weekly_lessons' => 'weekly_hours/Lesson_time', 'Lesson_time' => 'weekly_hours/weekly_lessons', 'weekly_hours' => 'Lesson_time*weekly_lessons'],
        ],
        [
            'title' => 'A2 = 190 / weekly_hours * 7',
            'results' => ['A2' => '1330/weekly_hours', 'weekly_hours' => '1330/A2'],
        ],
        [
            'title' => 'B1 = 375 / weekly_hours * 7',
            'results' => ['B1' => '2625/weekly_hours', 'weekly_hours' => '2625/B1'],
        ],
        [
            'title' => 'B2 = 550 / weekly_hours * 7',
            'results' => ['B2' => '3850/weekly_hours', 'weekly_hours' => '3850/B2'],
        ],
        [
            'title' => 'C1 = 750 / weekly_hours * 7',
            'results' => ['C1' => '5250/weekly_hours', 'weekly_hours' => '5250/C1'],
        ],
        [
            'title' => 'C2 = 1100 / weekly_hours * 7',
            'results' => ['C2' => '7700/weekly_hours', 'weekly_hours' => '7700/C2'],
        ],
        [
            'title' => 'Master = 2965 / weekly_hours * 7',
            'results' => ['Master' => '20755/weekly_hours', 'weekly_hours' => '20755/Master'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Give the English learning time calculator the avg lesson time and the total hours weekly and it returns <strong>lessons weekly</strong>.

        The results leave the screen the moment you edit a field; press Calculate and they come back updated, so a single changed input shows its own effect.
        TXT,
        'sections' => [
            ['title' => 'How does the English learning time calculator work?', 'html' => <<<'TXT'
            <p>The English learning time calculator takes the values in the form, applies the relationship described below and reports <strong>lessons weekly</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the avg lesson time and the total hours weekly.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in hours / minutes. The unit chip switches it to any of the 27 supported units.</li><li>A number, expressed in hours.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Avg lesson time</strong></td><td>A measured quantity, 27 units available.</td><td>hours / minutes</td><td>You supply it</td></tr><tr><td><strong>Lessons weekly</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Total hours weekly</strong></td><td>A number stated in hours.</td><td>—</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the English learning time calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Lessons weekly</span><span class="formula-eq">=</span><span class="formula-rhs">total hours weekly ÷ avg lesson time</span></div><div class="formula-row"><span class="formula-lhs">A1 -&amp;gt; A1 -> A1 -> A1 -> A1 -> A 1 -> a 2 (ket) (KET) (KET) (KET) (KET) (KET)</span><span class="formula-eq">=</span><span class="formula-rhs">1330 ÷ total hours weekly</span></div><div class="formula-row"><span class="formula-lhs">A2 -&amp;gt; A1 -> A1 -> A1 -> A 1 -> a 2 (ket) (KET) (KET) (KET) -> A1 -> A1 -> A 1 -> a 2 (ket) (KET) (KET) -> A1 -> A 1 -> a 2 (ket) (KET) -> A 1 -> a 2 (ket) -> A 2 -> b 1 (pet) (PET) (PET) (PET) (PET) (PET)</span><span class="formula-eq">=</span><span class="formula-rhs">2625 ÷ total hours weekly</span></div><div class="formula-row"><span class="formula-lhs">B1 -&amp;gt; A1 -> A1 -> A 1 -> a 2 (ket) (KET) (KET) -> A1 -> A 1 -> a 2 (ket) (KET) -> A 1 -> a 2 (ket) -> A 2 -> b 1 (pet) (PET) (PET) (PET) -> A1 -> A 1 -> a 2 (ket) (KET) -> A 1 -> a 2 (ket) -> A 2 -> b 1 (pet) (PET) (PET) -> A 1 -> a 2 (ket) -> A 2 -> b 1 (pet) (PET) -> A 2 -> b 1 (pet) -> B 1 -> b 2 (fce) (FCE) (FCE) (FCE) (FCE) (FCE)</span><span class="formula-eq">=</span><span class="formula-rhs">3850 ÷ total hours weekly</span></div><div class="formula-row"><span class="formula-lhs">B2 -&amp;gt; A1 -> A 1 -> a 2 (ket) (KET) -> A 1 -> a 2 (ket) -> A 2 -> b 1 (pet) (PET) (PET) -> A 1 -> a 2 (ket) -> A 2 -> b 1 (pet) (PET) -> A 2 -> b 1 (pet) -> B 1 -> b 2 (fce) (FCE) (FCE) (FCE) -> A 1 -> a 2 (ket) -> A 2 -> b 1 (pet) (PET) -> A 2 -> b 1 (pet) -> B 1 -> b 2 (fce) (FCE) (FCE) -> A 2 -> b 1 (pet) -> B 1 -> b 2 (fce) (FCE) -> B 1 -> b 2 (fce) -> B 2 -> c 1 (cae) (CAE) (CAE) (CAE) (CAE) (CAE)</span><span class="formula-eq">=</span><span class="formula-rhs">5250 ÷ total hours weekly</span></div><div class="formula-row"><span class="formula-lhs">C1 -&amp;gt; A 1 -> a 2 (ket) -> A 2 -> b 1 (pet) (PET) -> A 2 -> b 1 (pet) -> B 1 -> b 2 (fce) (FCE) (FCE) -> A 2 -> b 1 (pet) -> B 1 -> b 2 (fce) (FCE) -> B 1 -> b 2 (fce) -> B 2 -> c 1 (cae) (CAE) (CAE) (CAE) -> A 2 -> b 1 (pet) -> B 1 -> b 2 (fce) (FCE) -> B 1 -> b 2 (fce) -> B 2 -> c 1 (cae) (CAE) (CAE) -> B 1 -> b 2 (fce) -> B 2 -> c 1 (cae) (CAE) -> B 2 -> c 1 (cae) -> C 1 -> c 2 (cpe) (CPE) (CPE) (CPE) (CPE) (CPE)</span><span class="formula-eq">=</span><span class="formula-rhs">7700 ÷ total hours weekly</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in weeks, and convertible to any of the 27 units on that chip.</li><li>Shown in weeks, and convertible to any of the 27 units on that chip.</li><li>Shown in weeks, and convertible to any of the 27 units on that chip.</li><li>Shown in weeks, and convertible to any of the 27 units on that chip.</li><li>Shown in weeks, and convertible to any of the 27 units on that chip.</li><li>Shown in weeks, and convertible to any of the 27 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in hours / minutes</li><li>Time, opening in weeks</li><li>Time, opening in weeks</li><li>Time, opening in weeks</li><li>Time, opening in weeks</li><li>Time, opening in weeks</li><li>Time, opening in weeks</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The English learning time calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 2 figures keep coming back — the avg lesson time and the total hours weekly — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the English learning time calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/windsock">Windsock</a>, <a href="/everyday-life/witcher">The Witcher</a> and <a href="/everyday-life/wizarding-currency">Harry Potter currency</a>.</p>
            TXT],
            ['title' => 'Planning with the estimate', 'html' => <<<'TXT'
            <p>The calculator uses lesson duration and lessons per week to estimate weekly study hours, then relates those hours to progress between CEFR stages. The A1-to-C2 sequence is a framework for describing language proficiency, not a fixed clock that applies identically to every learner. Enter the average lesson length and a sustainable weekly schedule; a plan that can be maintained is more useful than a very intensive week that cannot be repeated.</p><p>Class time is only one part of language learning. Listening, speaking, reading, writing, vocabulary review and feedback outside lessons all contribute, but the estimate may not include them unless the form asks for independent study. If you do substantial practice between lessons, use the relevant time input when available or treat the output as a classroom-only scenario. Avoid adding the same study hours twice.</p><p>Progress depends on starting level, first language, prior exposure, teaching quality, practice quality, motivation and opportunities to use English. A learner may develop speaking and reading at different speeds, while a course label may cover a broad range of ability. The calculator’s estimated hours are a planning reference, not a promise that a particular exam result or CEFR level will be reached by a date.</p><p>To use the result responsibly, compare realistic schedules and review progress with a teacher or a suitable assessment. If a target seems too short, adjust the weekly hours or extend the timeline rather than assuming the tool can guarantee faster learning. CEFR levels describe abilities across skills; they are not merely a count of lessons completed.</p>
            TXT],
            ['title' => 'Turning weekly hours into a sustainable plan', 'html' => <<<'TXT'
            <p>Weekly hours are a planning input, not the same thing as learning quality. A learner may make better progress with regular retrieval practice and feedback than with one long session followed by no review. If the form asks for average lesson duration and lessons per week, multiply those to check the weekly total. Add independent listening, reading or speaking only if the page has a distinct input for it, so those hours are not counted twice.</p><p>CEFR levels describe broad abilities across listening, speaking, reading and writing. Moving from A1 to A2 is not merely finishing a fixed number of classes: a learner may be stronger in one skill than another, and a placement test or teacher assessment can identify gaps. The calculator’s hour estimates are a rough framework for planning; they cannot predict an individual’s exam result or fluency date.</p><p>For a realistic schedule, estimate a range of weekly effort and revisit it after several weeks. If the plan is difficult to maintain, adjust the timeline rather than assuming progress will occur at the original rate. Use level descriptors and practical tasks to check improvement, and consult a qualified teacher when you need a personalized learning plan.</p>
            TXT],
            ['title' => 'Reviewing progress', 'html' => <<<'TXT'
            <p>Use a concrete check-in point rather than treating the projected hours as a finish line. After a block of study, try tasks associated with the next CEFR level: understand a short recording, take part in a conversation, read a suitable passage or write a clear message. One successful task does not establish the whole level, but a set of tasks can show where practice is helping and where more instruction is needed.</p><p>If your weekly study time changes, update the inputs and compare the new estimate. The calculator does not distinguish focused practice from passive exposure, and it cannot account for feedback quality or prior language knowledge. Treat the result as an organizing aid and use a placement assessment for decisions about courses or exams.</p>
            TXT],
            ['title' => 'Using the estimate for planning', 'html' => <<<'TXT'
            <p>When setting a goal, choose a weekly schedule that leaves room for review and rest. If the calculator’s result implies a long timeline, that is not a failure; language learning develops across repeated practice and real communication. Keep a simple record of lesson time and independent practice so your later estimate reflects what you actually do.</p><p>Discuss the plan with a teacher if you are preparing for a formal exam. The expected level and the test’s skill requirements may not match a general hour estimate.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the English learning time calculator work out?', 'a' => 'It returns lessons weekly, derived from the avg lesson time and the total hours weekly.'],
            ['q' => 'What do I need to enter to use the English learning time calculator?', 'a' => 'The form asks for the avg lesson time and the total hours weekly, which is 2 fields in total.'],
            ['q' => 'Can I enter avg lesson time in a different unit?', 'a' => 'Yes. Avg lesson time opens in hours / minutes and the chip beside it offers 27 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/windsock', 'name' => 'Windsock'],
            ['path' => '/everyday-life/witcher', 'name' => 'The Witcher'],
            ['path' => '/everyday-life/wizarding-currency', 'name' => 'Harry Potter currency'],
        ],
    ],
];
