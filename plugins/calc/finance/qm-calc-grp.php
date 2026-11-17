<?php

/**
 * Gross rating point (GRP)
 * /finance/grp
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gross rating point (GRP)',
    'meta' => ['title' => 'Gross rating point (GRP) — Free Online Calculator', 'description' => 'Gross rating point (GRP) reports reach percentage and GRP (gross rating point). Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Gross rating point (GRP) Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Reach percentage',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_audience',
                            'label' => 'Total audience',
                            'type' => 'number',
                            'help' => 'The number of people in your target audience.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'audience_reached',
                            'label' => 'Audience reached',
                            'type' => 'number',
                            'help' => 'The number of people in your audience that you reached.',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'reach_percentage',
                            'label' => 'Reach percentage',
                            'type' => 'number',
                            'help' => 'The number of people in your audience that you\'ve reached.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'GRP',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'frequency_per_view',
                            'label' => 'Frequency per viewer',
                            'type' => 'number',
                            'help' => 'Number of ads that are seen by each viewer.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'grp',
                            'label' => 'GRP (gross rating point)',
                            'type' => 'number',
                            'suffix' => 'points',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'reach_percentage = audience_reached / total_audience',
            'results' => ['reach_percentage' => 'audience_reached/total_audience', 'audience_reached' => 'reach_percentage*total_audience', 'total_audience' => 'audience_reached/reach_percentage'],
        ],
        [
            'title' => 'grp = reach_percentage * frequency_per_view * 100',
            'results' => ['reach_percentage' => '(1/100)*grp/frequency_per_view', 'grp' => '100*frequency_per_view*reach_percentage', 'frequency_per_view' => '(1/100)*grp/reach_percentage'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Total audience and Audience reached into Gross rating point (GRP) and the answer comes back as Reach percentage and Frequency per viewer. The arithmetic is the whole method: reach percentage is worked out from total audience by one formula, applied once. Reach percentage comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Gross rating point (GRP) calculator works', 'html' => <<<'TXT'
            <p>The Gross rating point (GRP) calculator applies one relationship to 2 numbers and reports Reach percentage, Frequency per viewer and GRP (gross rating point).</p><p>Written with the labels from the form, Reach percentage = Audience reached ÷ Total audience.</p><p>The result panel carries Reach percentage, Frequency per viewer and GRP (gross rating point), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Total audience</strong> — a plain number, no unit. The number of people in your target audience.</li><li><strong>Audience reached</strong> — a plain number, no unit. The number of people in your audience that you reached.</li></ul><p>The answers come back as Reach percentage in percent, Frequency per viewer, GRP (gross rating point) in points. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Total audience = 10, Audience reached = 100, Frequency per viewer = 1000 and GRP (gross rating point) = 10 points; the answers are <strong>Reach percentage</strong> = 10 perc.</p><ul><li><strong>Reach percentage</strong> = 10 perc</li></ul><p>That is <strong>Reach percentage</strong> = <code>Audience reached ÷ Total audience</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Reach percentage</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Reach percentage lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Reach percentage</strong> = <code>Audience reached ÷ Total audience</code></li><li><strong>Audience reached</strong> = <code>Reach percentage × Total audience</code></li><li><strong>Total audience</strong> = <code>Audience reached ÷ Reach percentage</code></li><li><strong>GRP (gross rating point)</strong> = <code>100 × Frequency per viewer × Reach percentage</code></li><li><strong>Frequency per viewer</strong> = <code>(1 ÷ 100) × GRP (gross rating point) ÷ Reach percentage</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Reach percentage</strong> = <code>Audience reached ÷ Total audience</code> — the form to use when Audience reached and Total audience are the values you have.</li><li><strong>Audience reached</strong> = <code>Reach percentage × Total audience</code> — the form to use when Reach percentage and Total audience are the values you have.</li><li><strong>Total audience</strong> = <code>Audience reached ÷ Reach percentage</code> — the form to use when Audience reached and Reach percentage are the values you have.</li><li><strong>GRP (gross rating point)</strong> = <code>100 × Frequency per viewer × Reach percentage</code> — the form to use when Frequency per viewer and Reach percentage are the values you have.</li><li><strong>Reach percentage</strong> = <code>(1 ÷ 100) × GRP (gross rating point) ÷ Frequency per viewer</code> — the form to use when GRP (gross rating point) and Frequency per viewer are the values you have.</li><li><strong>Frequency per viewer</strong> = <code>(1 ÷ 100) × GRP (gross rating point) ÷ Reach percentage</code> — the form to use when GRP (gross rating point) and Reach percentage are the values you have.</li></ul><p>Any one of Reach percentage, Audience reached and Total audience can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Total audience, from 10 to 20 — and the answers go from <strong>Reach percentage</strong> 10 perc to <strong>Reach percentage</strong> 5 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Reach percentage, Frequency per viewer and GRP (gross rating point) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Total audience left as a guess.</strong> Anything typed into Total audience is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Audience reached left as a guess.</strong> Anything typed into Audience reached is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Total audience is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Gross rating point (GRP) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Total audience</strong> takes a plain number with no unit attached. The number of people in your target audience. It feeds Reach percentage and Audience reached. Fill it from a measurement rather than a memory — Total audience is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Audience reached</strong> takes a plain number with no unit attached. The number of people in your audience that you reached. It feeds Reach percentage and Total audience. Fill it from a measurement rather than a memory — Audience reached is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Reach percentage</strong> is a percent figure and the page's own defaults put it at 10 perc. It is worked out from Audience reached and Total audience. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Frequency per viewer</strong> is a plain number. It is worked out from GRP (gross rating point) and Reach percentage. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>GRP (gross rating point)</strong> is a plain number. It is worked out from Frequency per viewer and Reach percentage. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Reach percentage</th></tr></thead><tbody><tr><td><strong>Total audience</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Audience reached</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Frequency per viewer</strong> +10%</td><td>+0%</td></tr><tr><td><strong>GRP (gross rating point)</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Audience reached: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Frequency per viewer and GRP (gross rating point) barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Total audience = 5, Audience reached = 50, Frequency per viewer = 500 and GRP (gross rating point) = 5 points and the page reports <strong>Reach percentage</strong> = 10 perc.</li><li>Feed in Total audience = 30, Audience reached = 100, Frequency per viewer = 1000 and GRP (gross rating point) = 10 points and the page reports <strong>Reach percentage</strong> = 3.33 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Gross rating point (GRP) actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Reach percentage is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Total audience and Audience reached measured, Reach percentage and Frequency per viewer wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/salary">Salary Calculator</a>, <a href="/finance/salary-inflation">Salary inflation Calculator</a> and <a href="/finance/salary-to-hourly">Salary to hourly</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gross rating point (GRP) calculator work out?', 'a' => <<<'TXT'
            Reach percentage, Frequency per viewer and GRP (gross rating point), from Audience reached and Total audience. The relationship is Reach percentage = Audience reached ÷ Total audience.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Total audience, Audience reached. Fill total audience and audience reached and leave Reach percentage empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Reach percentage, Audience reached, Total audience and GRP (gross rating point) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Reach percentage = 10 perc. The figures come from Total audience as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Reach percentage is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Total audience blank and the page solves for it, reporting Reach percentage instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Reach percentage keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/salary', 'name' => 'Salary Calculator'],
            ['path' => '/finance/salary-inflation', 'name' => 'Salary inflation Calculator'],
            ['path' => '/finance/salary-to-hourly', 'name' => 'Salary to hourly'],
        ],
        'authors' => [],
    ],
];
