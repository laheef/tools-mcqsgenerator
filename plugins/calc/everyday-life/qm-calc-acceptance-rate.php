<?php

/**
 * Acceptance rate
 * /everyday-life/acceptance-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Acceptance rate',
    'meta' => ['title' => 'Acceptance rate — Formula, Steps & Examples', 'description' => 'Enter total number of applicants and number of applicants accepted and get acceptance rate back. Every box can be solved for, not only the one in the title.', 'h1' => 'Acceptance rate Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'num_applicants',
                            'label' => 'Total number of applicants',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'applicants_accepted',
                            'label' => 'Number of applicants accepted',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'acceptance_rate',
                            'label' => 'Acceptance rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'acceptance_rate = applicants_accepted / num_applicants',
            'results' => ['applicants_accepted' => 'acceptance_rate*num_applicants', 'acceptance_rate' => 'applicants_accepted/num_applicants', 'num_applicants' => 'applicants_accepted/acceptance_rate'],
        ],
    ],
    'article' => [
        'intro' => 'The Acceptance rate calculator turns the total number of applicants and the acceptance rate into <strong>number of applicants accepted</strong>.',
        'sections' => [
            ['title' => 'How does the Acceptance rate calculator work?', 'html' => <<<'TXT'
            <p>The Acceptance rate calculator takes the values in the form, applies the relationship described below and reports <strong>number of applicants accepted</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the total number of applicants and the acceptance rate.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Total number of applicants</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of applicants accepted</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Acceptance rate</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Acceptance rate calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Number of applicants accepted</span><span class="formula-eq">=</span><span class="formula-rhs">acceptance rate × total number of applicants</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Total number of applicants</strong> = 10 and <strong>Acceptance rate</strong> = 10 %. Working through the relationship above gives <strong>Number of applicants accepted</strong> = 1.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Number of applicants accepted</strong> = 1 should be roughly the size you expected from <strong>Total number of applicants</strong> = 10 and <strong>Acceptance rate</strong> = 10 %.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>%, opening in percent</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Acceptance rate calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 2 figures keep coming back — the total number of applicants and the acceptance rate — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Acceptance rate calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — total number of applicants for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/months-between-dates">Months between two dates</a>, <a href="/everyday-life/moon-phase">Moon phase</a> and <a href="/everyday-life/mpg">MPG</a>.</p>
            TXT],
            ['title' => 'Calculating and interpreting an acceptance rate', 'html' => <<<'TXT'
            <p>Acceptance rate is the number of accepted applicants divided by the total number of applicants, expressed as a fraction or percentage. Enter both counts from the same admissions cycle and the same applicant pool. If the calculator solves for a missing value, it rearranges that relationship; for example, accepted applicants divided by total applicants gives the rate. Make sure the accepted count is not larger than the applicant count and that both figures refer to people rather than applications if the source distinguishes them.</p>
            <p>Admissions reports may use different definitions. Some count unique applicants, others count submitted applications; some include waitlist offers, early rounds, transfer applicants or multiple campuses, while others report only a specific program. A rate is comparable only when numerator and denominator use the same definitions and time period. Check the source document’s footnotes before comparing institutions.</p>
            <p>For a percentage, multiply the ratio by 100. If 240 people are accepted from 2,000 applicants, the rate is 12 percent. That simple example does not imply that each applicant has an independent 12 percent chance: selection depends on qualifications, program capacity, applicant pool composition and institutional priorities.</p>
            <p>Use the result as a descriptive summary of a past cycle, not as an individual admissions prediction. A low or high rate does not establish educational quality, fit or likely outcome for a particular applicant. Rates can change substantially from year to year as applications and available places change, and a program-level rate may differ from the institution-wide figure.</p>
            <p>When comparing schools or programs, record the year, applicant definition, accepted definition, program scope and source alongside the rate. Use current official admissions reports where available. Do not rank programs solely by acceptance rate; other considerations include curriculum, cost, support, location, outcomes and the applicant’s goals.</p>
            <p>Check the arithmetic by multiplying the displayed rate by the total applicant count and seeing whether it returns approximately the accepted count, allowing for rounding. If the percentage is shown with limited decimals, use the underlying counts for exact comparisons. If a reported rate seems inconsistent with the published counts, verify whether the report uses offers, enrollments, waitlist outcomes or a different applicant population.</p>
            <p>This calculator performs the ratio calculation only. It cannot verify admissions data or explain why applicants were accepted. Use it to summarize a defined dataset, and consult the institution’s own reporting for the context needed to interpret that number.</p>
            TXT],
            ['title' => 'Compare rates only when the data definitions match', 'html' => <<<'TXT'
            <p>Two acceptance rates should only be compared when each report defines applicants and acceptances in a similar way. One school may count people who applied, while another may count applications submitted across multiple programs. Early-action, early-decision, transfer and waitlist activity can be reported separately or combined. Review the source notes and reporting year before treating the percentages as comparable.</p><p>A rate can move because the applicant pool changes, the number of available places changes or the school adjusts its reporting definition. A lower rate does not necessarily mean that instruction or student outcomes are better, and a higher rate does not by itself show that a program is less valuable. Consider the course offerings, cost, support, location and fit with the student’s goals.</p><p>When using the calculator to solve for accepted applicants, multiply the rate by the applicant count and check whether the result makes sense as a whole number. Published percentages may be rounded, so reverse-calculating a count from a rounded rate may not recover the exact number. Prefer published counts when available and use the calculator for the ratio.</p><p>If a rate is entered as a percentage, check whether the field expects 12 or 0.12. A decimal-versus-percent mistake changes the result by a factor of 100. Confirm the input label and try a simple known example before using a larger dataset. State whether you are displaying the rate as a fraction or a percentage in your notes.</p><p>Use the result to summarize one defined dataset, not to estimate a particular applicant’s chance. Individual admissions decisions depend on criteria and context not included in this equation. Use official current information for application planning and consult the institution’s admissions office if a report’s denominator is unclear.</p>
            TXT],
            ['title' => 'Keep counts, percentages and dates together', 'html' => <<<'TXT'
            <p>For a clear record, save the numerator, denominator, calculated rate, reporting year and source link in one place. If the rate is shown as a percentage, retain enough decimal places for comparison but do not imply more precision than the published counts support. A rounded rate may correspond to several possible applicant and acceptance counts.</p><p>When a school publishes an acceptance rate but not the underlying counts, note that the calculator cannot recover exact values from the percentage alone. If you use an approximate applicant count, label the accepted count as an estimate. Do not present a reverse-calculated integer as official data.</p><p>For program comparisons, check whether each rate refers to the same level and applicant group. An institution-wide undergraduate figure is not necessarily comparable with a selective program’s rate. Use the closest matching data and explain any difference in scope.</p>
            TXT],
            ['title' => 'Use the source definition in every comparison', 'html' => <<<'TXT'
            <p>If the source changes from one year to the next, recheck its definition of “applicant” and “accepted” before comparing rates. Consistent terminology matters as much as correct division.</p>
            TXT],
            ['title' => 'Keep rounded results labeled', 'html' => <<<'TXT'
            <p>If the result is rounded for a chart, label it as rounded. Keep the exact counts available so readers can distinguish an approximate percentage from a published official figure.</p>
            TXT],
            ['title' => 'Separate a rate from an individual outcome', 'html' => <<<'TXT'
            <p>A historical rate describes a group and period, not an individual applicant’s chance. Use it alongside current admissions criteria and program information, never as a guarantee or a reason to rule out an application on its own.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Acceptance rate calculator work out?', 'a' => 'It returns number of applicants accepted, derived from the total number of applicants and the acceptance rate.'],
            ['q' => 'What do I need to enter to use the Acceptance rate calculator?', 'a' => 'The form asks for the total number of applicants and the acceptance rate, which is 2 fields in total.'],
            ['q' => 'Can I enter acceptance rate in a different unit?', 'a' => 'Yes. Acceptance rate opens in percent and the chip beside it offers 6 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Number of applicants accepted = 1.'],
        ],
        'related' => [
            ['path' => '/everyday-life/months-between-dates', 'name' => 'Months between two dates'],
            ['path' => '/everyday-life/moon-phase', 'name' => 'Moon phase'],
            ['path' => '/everyday-life/mpg', 'name' => 'MPG'],
        ],
    ],
];
