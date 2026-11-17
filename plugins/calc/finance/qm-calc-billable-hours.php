<?php

/**
 * Billable hours
 * /finance/billable-hours
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Billable hours',
    'meta' => ['title' => 'Billable hours Calculator — Formula & Results', 'description' => 'Billable hours works out billable value from billable rate and billable time. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Billable hours Calculator', 'updated' => '2026-09-03'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rate',
                            'label' => 'Billable rate',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours',
                            'label' => 'Billable time',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'billableValue',
                            'label' => 'Billable value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'billableValue = rate * hours',
            'results' => ['billableValue' => 'hours*rate', 'hours' => 'billableValue/rate', 'rate' => 'billableValue/hours'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Billable hours takes Billable rate and Billable time and returns Billable value. Nothing is looked up on this page: billable value is computed from billable rate and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Billable value is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Billable hours calculator works', 'html' => <<<'TXT'
            <p>Billable hours answers one question from 2 numbers, and the answer is Billable value.</p><p>The relationship it solves reads Billable value = Billable time × Billable rate.</p><p>The answers are Billable value; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Billable rate</strong> — in USD</li><li><strong>Billable time</strong> — in hours</li></ul><p>What you get back is Billable value in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Billable rate = 10 USD and Billable time = 100 hrs gives <strong>Billable value</strong> = 1000 USD.</p><ul><li><strong>Billable value</strong> = 1000 USD</li></ul><p>The line behind those figures is <strong>Billable value</strong> = <code>Billable time × Billable rate</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Billable value</strong> = 1000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Billable time offers 8 units and opens on hours, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Billable value</strong> = <code>Billable time × Billable rate</code></li><li><strong>Billable time</strong> = <code>Billable value ÷ Billable rate</code></li><li><strong>Billable rate</strong> = <code>Billable value ÷ Billable time</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Billable value</strong> = <code>Billable time × Billable rate</code> — the form to use when Billable time and Billable rate are the values you have.</li><li><strong>Billable time</strong> = <code>Billable value ÷ Billable rate</code> — the form to use when Billable value and Billable rate are the values you have.</li><li><strong>Billable rate</strong> = <code>Billable value ÷ Billable time</code> — the form to use when Billable value and Billable time are the values you have.</li></ul><p>Any one of Billable value, Billable time and Billable rate can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Billable rate, from 10 to 20 — and the answers go from <strong>Billable value</strong> 1000 USD to <strong>Billable value</strong> 2000 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Billable time is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Billable value is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Billable rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Billable rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Billable time left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Billable time is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Billable rate is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Billable hours form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Billable rate</strong> takes a plain number with no unit attached. The page reads it when it works out Billable value and Billable time. Fill it from a measurement rather than a memory — Billable rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Billable time</strong> is a hours quantity: the page opens it in hrs and converts anything else you pick before the formula runs. The page reads it when it works out Billable value and Billable rate. Fill it from a measurement rather than a memory — Billable time is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Billable value</strong> is a plain number and the page's own defaults put it at 1000. It is worked out from Billable time and Billable rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Billable value</th></tr></thead><tbody><tr><td><strong>Billable rate</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Billable time</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Billable time sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Billable rate = 5 USD and Billable time = 50 hrs and the page reports <strong>Billable value</strong> = 250 USD.</li><li>Feed in Billable rate = 30 USD and Billable time = 100 hrs and the page reports <strong>Billable value</strong> = 3000 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Billable hours actually offers.</p><ul><li><strong>hours</strong> — opens in <em>hrs</em>, and the chip also carries min, hrs, days, wks, mos and yrs. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Billable rate and Billable time ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Billable rate — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Billable value in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Billable value follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are hours and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Billable rate and Billable time are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Billable rate and Billable time and the number you are missing is Billable value.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/stimulus-heals-vs-heroes">Stimulus check - CAAF vs. HEALS vs. HEROES Calculator</a>, <a href="/finance/stimulus-check-heals">Stimulus check - HEALS Act Calculator</a> and <a href="/finance/stimulus-payment">Stimulus payment Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Billable hours calculator work out?', 'a' => 'Billable value, from Billable time and Billable rate. The relationship is Billable value = Billable time × Billable rate.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Billable rate (USD), Billable time (hours). With billable rate and billable time in place, Billable value can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Billable value, Billable time and Billable rate blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Billable value = 1000 USD. Those are the defaults written into the form — move Billable rate and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Billable value is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Billable rate blank and the page solves for it, reporting Billable value instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Billable value keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/stimulus-heals-vs-heroes', 'name' => 'Stimulus check - CAAF vs. HEALS vs. HEROES Calculator'],
            ['path' => '/finance/stimulus-check-heals', 'name' => 'Stimulus check - HEALS Act Calculator'],
            ['path' => '/finance/stimulus-payment', 'name' => 'Stimulus payment Calculator'],
        ],
        'authors' => [],
    ],
];
