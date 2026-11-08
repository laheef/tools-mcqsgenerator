<?php

/**
 * Days to Maturity Calculator
 * /biology/days-to-maturity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Days to Maturity Calculator',
    'meta' => ['title' => 'Days to Maturity Calculator: Units & Formula', 'description' => 'Days to Maturity Calculator reports harvest day of year, harvest month, Days implied by the GDD target and days remaining after harvest (season 220 days).', 'h1' => 'Days to Maturity Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'sow_day',
                            'label' => 'Sowing day of year',
                            'type' => 'number',
                            'suffix' => 'day',
                            'help' => '1 January = 1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'dtm',
                            'label' => 'Days to maturity',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '95',
                        ],
                        [
                            'name' => 'gdd_target',
                            'label' => 'GDD to maturity',
                            'type' => 'number',
                            'suffix' => 'GDD',
                            'help' => 'Optional — use instead of days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1400',
                        ],
                        [
                            'name' => 'gdd_per_day',
                            'label' => 'Average GDD per day',
                            'type' => 'number',
                            'suffix' => 'GDD/day',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '13',
                        ],
                        [
                            'name' => 'harvest_day',
                            'label' => 'Harvest day of year',
                            'type' => 'number',
                            'suffix' => 'day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'harvest_month',
                            'label' => 'Harvest month',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gdd_days',
                            'label' => 'Days implied by the GDD target',
                            'type' => 'number',
                            'suffix' => 'days',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'slack',
                            'label' => 'Days remaining after harvest (season 220 days)',
                            'type' => 'number',
                            'suffix' => 'days',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Maturity',
            'results' => ['harvest_day' => 'sow_day+dtm', 'harvest_month' => 'min(12,1+round((sow_day+dtm-15)/30))', 'gdd_days' => 'gdd_target/gdd_per_day', 'slack' => '220-(sow_day+dtm)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Days to Maturity works out Harvest day of year and Harvest month from Sowing day of year, Days to maturity and GDD to maturity. Nothing is looked up on this page: harvest day of year is computed from sowing day of year and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Harvest day of year is opened in day; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Days to Maturity calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Days to Maturity: it takes 4 numbers and reports Harvest day of year, Harvest month and Days implied by the GDD target.</p><p>Written with the labels from the form, Harvest day of year = Sowing day of year + Days to maturity.</p><p>The result panel carries Harvest day of year, Harvest month, Days implied by the GDD target and Days remaining after harvest (season 220 days), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Sowing day of year</strong> — in day. 1 January = 1</li><li><strong>Days to maturity</strong> — in days</li><li><strong>GDD to maturity</strong> — in GDD. Optional — use instead of days</li><li><strong>Average GDD per day</strong> — in GDD/day</li></ul><p>What you get back is Harvest day of year in day, Harvest month, Days implied by the GDD target in days, Days remaining after harvest (season 220 days) in days, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Sowing day of year = 120 day, Days to maturity = 95 days, GDD to maturity = 1400 GDD and Average GDD per day = 13 GDD/day gives <strong>Harvest day of year</strong> = 215 day, <strong>Harvest month</strong> = 8, <strong>Days implied by the GDD target</strong> = 108 days and <strong>Days remaining after harvest (season 220 days)</strong> = 5 days.</p><ul><li><strong>Harvest day of year</strong> = 215 day</li><li><strong>Harvest month</strong> = 8</li><li><strong>Days implied by the GDD target</strong> = 108 days</li><li><strong>Days remaining after harvest (season 220 days)</strong> = 5 days</li></ul><p>That is <strong>Harvest day of year</strong> = <code>Sowing day of year + Days to maturity</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Harvest day of year</strong> = 215, <strong>Harvest month</strong> = 8, <strong>Days implied by the GDD target</strong> = 108 and <strong>Days remaining after harvest (season 220 days)</strong> = 5. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Harvest day of year is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Harvest day of year</strong> = <code>Sowing day of year + Days to maturity</code></li><li><strong>Harvest month</strong> = <code>min(12,1 + round((Sowing day of year + Days to maturity − 15) ÷ 30))</code></li><li><strong>Days implied by the GDD target</strong> = <code>GDD to maturity ÷ Average GDD per day</code></li><li><strong>Days remaining after harvest (season 220 days)</strong> = <code>220 − (Sowing day of year + Days to maturity)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Harvest day of year</strong> = <code>Sowing day of year + Days to maturity</code> — the form to use when Sowing day of year and Days to maturity are the values you have.</li><li><strong>Harvest month</strong> = <code>min(12,1 + round((Sowing day of year + Days to maturity − 15) ÷ 30))</code> — the form to use when Sowing day of year and Days to maturity are the values you have.</li><li><strong>Days implied by the GDD target</strong> = <code>GDD to maturity ÷ Average GDD per day</code> — the form to use when GDD to maturity and Average GDD per day are the values you have.</li><li><strong>Days remaining after harvest (season 220 days)</strong> = <code>220 − (Sowing day of year + Days to maturity)</code> — the form to use when Sowing day of year and Days to maturity are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Harvest day of year, Harvest month and Days implied by the GDD target can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Sowing day of year, from 120 to 240 — and the answers go from <strong>Harvest day of year</strong> 215 day, <strong>Harvest month</strong> 8, <strong>Days implied by the GDD target</strong> 108 days and <strong>Days remaining after harvest (season 220 days)</strong> 5 days to <strong>Harvest day of year</strong> 335 day, <strong>Harvest month</strong> 12, <strong>Days implied by the GDD target</strong> 108 days and <strong>Days remaining after harvest (season 220 days)</strong> -115 days.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Harvest day of year, Harvest month and Days implied by the GDD target are results: they are worked out from the boxes above and cannot be typed into, so a past answer has to be entered as one of the inputs instead.</li><li><strong>Sowing day of year left as a guess.</strong> Anything typed into Sowing day of year is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Days to maturity left as a guess.</strong> Anything typed into Days to maturity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>GDD to maturity left as a guess.</strong> Anything typed into GDD to maturity is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Sowing day of year and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Days to Maturity form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Sowing day of year</strong> is measured in day. 1 January = 1. It feeds Harvest day of year, Harvest month and Days remaining after harvest (season 220 days). Fill it from a measurement rather than a memory — Sowing day of year is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Days to maturity</strong> is measured in days. It feeds Harvest day of year, Harvest month and Days remaining after harvest (season 220 days). Fill it from a measurement rather than a memory — Days to maturity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>GDD to maturity</strong> is measured in GDD. Optional — use instead of days. It feeds Days implied by the GDD target. Fill it from a measurement rather than a memory — GDD to maturity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Average GDD per day</strong> is measured in GDD/day. It feeds Days implied by the GDD target. Fill it from a measurement rather than a memory — Average GDD per day is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Harvest day of year</strong> is a plain number and the page's own defaults put it at 215. It is computed from Sowing day of year and Days to maturity, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Harvest month</strong> is a plain number and the page's own defaults put it at 8. It is computed from Sowing day of year and Days to maturity, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Days implied by the GDD target</strong> is a plain number and the page's own defaults put it at 108. It is computed from GDD to maturity and Average GDD per day, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Days remaining after harvest (season 220 days)</strong> is a plain number and the page's own defaults put it at 5. It is computed from Sowing day of year and Days to maturity, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Harvest day of year</th><th>Harvest month</th><th>Days implied by the GDD target</th><th>Days remaining after harvest (season 220 days)</th></tr></thead><tbody><tr><td><strong>Sowing day of year</strong> +10%</td><td>+5.58%</td><td>+0%</td><td>+0%</td><td>-240%</td></tr><tr><td><strong>Days to maturity</strong> +10%</td><td>+4.42%</td><td>+0%</td><td>+0%</td><td>-190%</td></tr><tr><td><strong>GDD to maturity</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Average GDD per day</strong> +10%</td><td>+0%</td><td>+0%</td><td>-9.09%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Sowing day of year: ten per cent there moves an answer by about 240 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Harvest day of year is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Sowing day of year, Days to maturity and GDD to maturity and the number you are missing is Harvest day of year and Harvest month.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/qpcr-efficiency">qPCR efficiency Calculator</a>, <a href="/biology/quadrat-sampling-density">Quadrat Sampling Density Calculator</a> and <a href="/biology/rabbit-cage-size">Rabbit cage size</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Days to Maturity calculator work out?', 'a' => <<<'TXT'
            Harvest day of year, Harvest month, Days implied by the GDD target and Days remaining after harvest (season 220 days), from Sowing day of year and Days to maturity. The relationship is Harvest day of year = Sowing day of year + Days to maturity.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sowing day of year (day), Days to maturity (days), GDD to maturity (GDD), Average GDD per day (GDD/day). With sowing day of year, days to maturity and GDD to maturity in place, Harvest day of year can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Harvest day of year, Harvest month, Days implied by the GDD target and Days remaining after harvest (season 220 days) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Harvest day of year = 215 day, Harvest month = 8, Days implied by the GDD target = 108 days and Days remaining after harvest (season 220 days) = 5 days. The figures come from Sowing day of year as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Harvest day of year is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Sowing day of year blank and the page solves for it, reporting Harvest day of year instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Harvest day of year at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/qpcr-efficiency', 'name' => 'qPCR efficiency Calculator'],
            ['path' => '/biology/quadrat-sampling-density', 'name' => 'Quadrat Sampling Density Calculator'],
            ['path' => '/biology/rabbit-cage-size', 'name' => 'Rabbit cage size'],
        ],
        'authors' => [],
    ],
];
