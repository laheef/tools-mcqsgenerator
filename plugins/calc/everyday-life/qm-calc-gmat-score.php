<?php

/**
 * GMAT score
 * /everyday-life/gmat-score
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GMAT score',
    'meta' => ['title' => 'GMAT score Calculator: Formula, Steps & Examples', 'description' => 'Enter quantitative reasoning and verbal reasoning and get GMAT score back. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'GMAT score Calculator', 'updated' => '2026-06-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Enter your scaled section scores (60-90) below to calculate your total GMAT score.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Quantitative',
                            'label' => 'Quantitative reasoning',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Verbal',
                            'label' => 'Verbal reasoning',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DataInsights',
                            'label' => 'Data insights',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalScore',
                            'label' => 'GMAT score',
                            'type' => 'number',
                            'suffix' => '/ 805',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rawTotal',
                            'label' => 'Raw total',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'rawTotal = (Quantitative + Verbal + DataInsights - 180) * (20 / 3) + 205',
            'results' => ['rawTotal' => '(20/3)*DataInsights + (20/3)*Quantitative + (20/3)*Verbal - 995', 'Quantitative' => '-DataInsights - Verbal + (3/20)*rawTotal + 597/4', 'DataInsights' => '-Quantitative - Verbal + (3/20)*rawTotal + 597/4', 'Verbal' => '-DataInsights - Quantitative + (3/20)*rawTotal + 597/4'],
        ],
        [
            'title' => 'finalScore = 10 * round((rawTotal - 5) / 10)  + 5',
            'results' => ['finalScore' => '10*round((1/10)*rawTotal - 1/2) + 5'],
        ],
    ],
    'article' => [
        'intro' => 'Give the GMAT score calculator the quantitative reasoning, the verbal reasoning and the data insights and it returns <strong>raw total</strong>.',
        'sections' => [
            ['title' => 'How does the GMAT score calculator work?', 'html' => <<<'TXT'
            <p>The GMAT score calculator takes the values in the form, applies the relationship described below and reports <strong>raw total</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the quantitative reasoning, the verbal reasoning and the data insights.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => '<ul><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li></ul>'],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Quantitative reasoning</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Verbal reasoning</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Data insights</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>GMAT score</strong></td><td>A number stated in / 805.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Raw total</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the GMAT score calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Raw total</span><span class="formula-eq">=</span><span class="formula-rhs">(20 ÷ 3) × data insights + (20 ÷ 3) × quantitative reasoning + (20 ÷ 3) × verbal reasoning − 995</span></div><div class="formula-row"><span class="formula-lhs">GMAT score</span><span class="formula-eq">=</span><span class="formula-rhs">10 × rounded, ((1 ÷ 10) × raw total − 1 ÷ 2) + 5</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Quantitative reasoning</strong> = 10, <strong>Verbal reasoning</strong> = 10 and <strong>Data insights</strong> = 10. The calculator returns <strong>GMAT score</strong> = -795.</p><p>Read it as a template. Every number above can be replaced with one of yours; only the relationship between them is fixed.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>GMAT score</strong> = -795 should be roughly the size you expected from <strong>Quantitative reasoning</strong> = 10 and <strong>Verbal reasoning</strong> = 10.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The GMAT score calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Any time the same 3 figures keep coming back — the quantitative reasoning, the verbal reasoning and the data insights — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the GMAT score calculator, these are the ones that matter:</p>
            <ul><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — quantitative reasoning for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Re-enter the same figure and confirm the result is stable; a number that moves when you press Calculate again is a sign that a field is still empty.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/add-minutes">Add minutes</a>, <a href="/everyday-life/add-time">Add time</a> and <a href="/everyday-life/adding-hours">Adding hours</a>.</p>
            TXT],
            ['title' => 'Interpreting a GMAT score estimate', 'html' => <<<'TXT'
            <p>This calculator combines Quantitative, Verbal and Data Insights inputs to produce an estimated overall score and related totals. Treat the result as a practice aid, not an official score report. The official exam uses its own scoring process, test form and current scale; a simple calculator may not reflect every scoring detail, form adjustment or policy change. Use the official score report for applications and admissions decisions.</p>
            <p>Enter section values in the format the fields request. Do not substitute raw correct-answer counts for scaled or section scores unless the form explicitly asks for raw values. Check that Quantitative, Verbal and Data Insights are entered in the correct boxes and fall within the permitted range. If you copy values from a practice platform, read its labels and date because different products may report scores differently.</p>
            <p>The output can help you compare practice sessions or identify a section where more review may be useful. It does not explain missed questions, predict the exact result on test day or tell you whether a school will admit you. Test conditions, question mix, timing, adaptive routing and current scoring rules can all affect the official result.</p>
            <p>Keep the source, date, section values and calculator assumptions with each estimate. Compare attempts from similar practice conditions and avoid treating a small change as proof of a meaningful skill gain; score tables may move in discrete steps or use approximations. Review the underlying questions and skills, not only the total.</p>
            <p>Do not use a calculator estimate in place of an official score when a university, employer or scholarship program requests a report. Check current admissions requirements directly with the institution, since score expectations and policies vary. An estimated total is not a personal admissions probability.</p>
            <p>If you are unsure how a practice score maps to the calculator’s inputs, use the test provider’s official explanation or preparation materials. The calculator can support informal planning, but it cannot validate the source values or certify a test result.</p>
            TXT],
            ['title' => 'Build a useful practice-score record', 'html' => <<<'TXT'
            <p>For each practice attempt, record the exam version, date, source, section results, calculator inputs and the estimated total. Practice tools can report scaled section scores, raw correct counts or their own predicted overall result. These are not interchangeable. Before entering values, compare the source labels with the calculator fields and confirm that the calculator expects the exact score type you have.</p><p>Score scales and test structures can change over time. Check that the calculator’s assumptions match the version you are preparing for and the official information currently provided by the exam maker. A third-party estimate may be based on an older format or a simplified conversion. Do not treat a familiar score range as proof that the model is current.</p><p>Use section results to organize study, then inspect the questions behind them. A total can hide a stronger section and an area that needs practice. Track timing, question types and confidence as well as the estimate. If the score changes between tests, consider whether the test difficulty, practice conditions or scoring table changed before attributing the difference to a new skill.</p><p>Make comparisons under similar conditions when possible: use full-length practice, consistent breaks and the same timing rules. Repeated exposure to a familiar test can raise a practice result without predicting the same change on a new form. A score estimate is one piece of feedback, not a complete measure of readiness.</p><p>For admissions planning, use official score reports and current institution requirements. Schools may consider section scores, total scores or other criteria differently, and policies can change. The calculator does not know an applicant’s record or predict a decision. Do not submit its output where an official report is required.</p><p>If the estimated result conflicts with a practice platform’s own report, compare the input definitions and test version first. Keep the original section values and use the official score report as the authority for a real exam. This calculator can help with informal tracking; it cannot validate scores or guarantee a test-day outcome.</p>
            TXT],
            ['title' => 'Check score information at the source', 'html' => <<<'TXT'
            <p>If you are planning a test date, use the official exam site for current section names, timing, score range and score-reporting rules. Preparation materials may refer to different versions of the exam, so verify the version before comparing a practice result with a target. A calculator cannot update itself when a policy or format changes unless its underlying tables are revised.</p><p>When setting a goal, compare your practice results with program requirements published by the schools you are considering, but remember that those requirements may be ranges or historical class profiles rather than cutoffs. Ask admissions offices about current expectations if the information is unclear. The calculator estimates a score; it does not interpret admissions policy.</p><p>A stable practice record helps you make reasonable study decisions. Use several attempts and review sections, timing and question-level errors. If a score fluctuates, investigate the cause before changing your plan. The overall number alone cannot tell you what to study next.</p>
            TXT],
            ['title' => 'Keep estimated and official scores distinct', 'html' => <<<'TXT'
            <p>Label every value as an estimate or an official score. This prevents a practice calculation from being mistaken for a verified exam result when you share a study record or discuss admissions planning.</p>
            TXT],
            ['title' => 'Use the same score inputs for a fair comparison', 'html' => <<<'TXT'
            <p>When comparing two practice sessions, use the same calculator version and input definitions. If the source or format changed, note that difference so the estimated scores are not treated as directly equivalent.</p>
            TXT],
            ['title' => 'Refer to the test provider for official reporting', 'html' => <<<'TXT'
            <p>Use the test maker’s official account and score report for verified results. The calculator is only for informal practice review and cannot confirm the score on record.</p>
            TXT],
            ['title' => 'Avoid over-interpreting small changes', 'html' => <<<'TXT'
            <p>Small differences between estimated totals may reflect scoring-table steps or rounding. Review the underlying section performance before drawing conclusions about progress.</p>
            TXT],
            ['title' => 'Check the reported section scale', 'html' => <<<'TXT'
            <p>Confirm the section scores use the scale shown in the input fields. If a practice platform reports a different range, do not enter those values without an appropriate conversion.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GMAT score calculator work out?', 'a' => 'It returns raw total, derived from the quantitative reasoning, the verbal reasoning and the data insights.'],
            ['q' => 'What do I need to enter to use the GMAT score calculator?', 'a' => 'The form asks for the quantitative reasoning, the verbal reasoning and the data insights, which is 3 fields in total.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports GMAT score = -795.'],
        ],
        'related' => [
            ['path' => '/everyday-life/add-minutes', 'name' => 'Add minutes'],
            ['path' => '/everyday-life/add-time', 'name' => 'Add time'],
            ['path' => '/everyday-life/adding-hours', 'name' => 'Adding hours'],
        ],
    ],
];
