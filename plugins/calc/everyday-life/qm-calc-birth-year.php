<?php

/**
 * Birth Year Calculator
 * /everyday-life/birth-year
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Birth Year Calculator',
    'meta' => ['title' => 'Birth Year Calculator — From Age to Year — Free Tool', 'description' => 'Turn an age into a birth year. Enter the age and the year you are asking about, and the page returns the birth year with and without this year\'s birthday.', 'h1' => 'Birth Year Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'age',
                    'label' => 'Age in whole years',
                    'type' => 'number',
                    'suffix' => 'years',
                    'default' => '30',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'year',
                    'label' => 'As of the year',
                    'type' => 'number',
                    'suffix' => 'year',
                    'default' => '2026',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'had_birthday',
                    'label' => 'Has the birthday happened this year?',
                    'type' => 'select',
                    'options' => ['Yes, already had it' => 1, 'No, not yet' => 0],
                    'control' => 'SELECT',
                    'default' => '1',
                ],
                [
                    'name' => 'birth_year',
                    'label' => 'Birth year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'before',
                    'label' => 'If the birthday has already passed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'after',
                    'label' => 'If it has not yet',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => ['birth_year' => 'year - age - (1 - had_birthday)', 'before' => 'year - age', 'after' => 'year - age - 1'],
    'article' => [
        'intro' => <<<'TXT'
        Subtract the age from the year being asked about and you have two candidates, because an age in whole years only pins the birth year once you know whether the birthday has happened yet. The page returns both, and which one applies.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>An age of thirty in 2026 means a birth year of 1995 or 1996, and the choice between them is the birthday. If it has already happened this year, the person was born in 1996; if it is still to come, 1995.</p><p>This is why ages in old records are so often off by one. A census taken in spring and a birthday in autumn will disagree with the same person's own account, and neither one is lying.</p><p>The answer is <strong>birth year and if the birthday has already passed and if it has not yet</strong>, worked out from age in whole years and as of the year and has the birthday happened this year?. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>birth_year</strong></td><td><code>As of the year - Age in whole years - (1 - Has the birthday happened this year?)</code></td></tr><tr><td><strong>before</strong></td><td><code>As of the year - Age in whole years</code></td></tr><tr><td><strong>after</strong></td><td><code>As of the year - Age in whole years - 1</code></td></tr></tbody></table><p>The last two lines are the two cases written out; the first line picks between them from the birthday answer.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports birth year and if the birthday has already passed and if it has not yet.</p><ul><li><strong>Age in whole years</strong> — years.</li><li><strong>As of the year</strong> — year.</li><li><strong>Has the birthday happened this year?</strong>. A choice: Yes, already had it, No, not yet.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Birth year</strong>.</li><li><strong>If the birthday has already passed</strong>.</li><li><strong>If it has not yet</strong>.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put age in whole years = 30 years, as of the year = 2 026 year, has the birthday happened this year? = 1 into the form and the panel reads:</p><ul><li><strong>Birth year</strong> = <code>As of the year - Age in whole years - (1 - Has the birthday happened this year?)</code> = <strong>1 996</strong></li><li><strong>If the birthday has already passed</strong> = <code>As of the year - Age in whole years</code> = <strong>1 996</strong></li><li><strong>If it has not yet</strong> = <code>As of the year - Age in whole years - 1</code> = <strong>1 995</strong></li></ul><p>Thirty in 2026, birthday already passed, gives 1996. Change the answer to No and it becomes 1995.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>2 026 - 30 - (1 - 1)</code>, which comes to <strong>1 996</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A birth year from an age is a range of two, never a single number. Treat it as a range when it matters: paperwork, genealogy, anything where a year has to be right.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Birth year</th><th>If the birthday has already passed</th><th>If it has not yet</th></tr></thead><tbody><tr><td><strong>Age in whole years</strong> +10 %</td><td>−0.15 %</td><td>−0.15 %</td><td>−0.15 %</td></tr><tr><td><strong>As of the year</strong> +10 %</td><td>+10.15 %</td><td>+10.15 %</td><td>+10.16 %</td></tr><tr><td><strong>Has the birthday happened this year?</strong> +10 %</td><td>+0.01 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>As of the year</strong>. <strong>Has the birthday happened this year?</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Age in whole years</strong> opens at 30 years</li><li><strong>As of the year</strong> opens at 2 026 year</li><li><strong>Has the birthday happened this year?</strong> opens at 1</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Age in whole years</th><th>Birth year</th><th>If the birthday has already passed</th><th>If it has not yet</th></tr></thead><tbody><tr><td>15 years</td><td>2 011</td><td>2 011</td><td>2 010</td></tr><tr><td>30 years</td><td>1 996</td><td>1 996</td><td>1 995</td></tr><tr><td>60 years</td><td>1 966</td><td>1 966</td><td>1 965</td></tr><tr><td>150 years</td><td>1 876</td><td>1 876</td><td>1 875</td></tr><tr><td>300 years</td><td>1 726</td><td>1 726</td><td>1 725</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set age in whole years = 30, as of the year = 2 026, has the birthday happened this year? = 0: <strong>Birth year</strong> = 1 995, <strong>If the birthday has already passed</strong> = 1 996, <strong>If it has not yet</strong> = 1 995. Birthday still to come: 1995 rather than 1996.</li><li>Set age in whole years = 0, as of the year = 2 026, has the birthday happened this year? = 1: <strong>Birth year</strong> = 2 026, <strong>If the birthday has already passed</strong> = 2 026, <strong>If it has not yet</strong> = 2 025. A baby aged nought was born in 2026 if this year's birthday has passed.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Using an age given in months.</strong> Convert to whole years first, because the birthday question is about whole-year anniversaries.</li><li><strong>Asking about a year in the future.</strong> The arithmetic still works, but the birthday answer has to be about that year, not this one.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>It cannot see a birthday.</strong> The page asks you rather than guessing from a date, because the date is not in the boxes.</li></li><li><li><strong>No date of birth.</strong> If you have the exact date, use the age calculator instead: it is exact where this is a range.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need age in whole years and as of the year and has the birthday happened this year?. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Birth year and if the birthday has already passed and if it has not yet should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Reconstructing a year from a form that only asked for an age.</li></li><li><li>Estimating a birth year in family history.</li></li><li><li>Checking whether a stated age and year agree.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/age">Age calculator</a> <a href="/everyday-life/age-in-years">Age in years</a> <a href="/everyday-life/korean-age">Korean age</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Age in whole years</strong> ×10</td><td>1 996</td><td>1 726</td><td>×0.865</td></tr><tr><td><strong>As of the year</strong> ×10</td><td>1 996</td><td>20 230</td><td>×10.135</td></tr><tr><td><strong>Has the birthday happened this year?</strong> ×10</td><td>1 996</td><td>2 005</td><td>×1.005</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Birth Year calculator work out?', 'a' => <<<'TXT'
            It returns birth year and if the birthday has already passed and if it has not yet from age in whole years and as of the year and has the birthday happened this year?. The relationship is As of the year - Age in whole years - (1 - Has the birthday happened this year?).
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Age in whole years (years), As of the year (year), Has the birthday happened this year?. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => 'It matters that each box is in the unit printed beside it: age in whole years in years; as of the year in year. The page converts nothing on its own.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why two possible years?', 'a' => 'Because age in whole years changes on one day a year. Without that day, the year behind it has two candidates.'],
            ['q' => 'Which year should I use?', 'a' => 'The one matching the birthday answer. If you do not know whether the birthday has passed, quote the range, not a single year.'],
        ],
        'related' => [
            ['path' => '/everyday-life/age', 'name' => 'Age calculator'],
            ['path' => '/everyday-life/age-in-years', 'name' => 'Age in years'],
            ['path' => '/everyday-life/korean-age', 'name' => 'Korean age'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
