<?php

/**
 * Sabbatical
 * /finance/sabbatical
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sabbatical',
    'meta' => ['title' => 'Sabbatical Calculator — Formula, Units & Example', 'description' => 'Sabbatical works out the missing figure from save, ... and rest for and ... after. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Sabbatical Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'save_percentage',
                            'label' => 'Save',
                            'type' => 'number',
                            'suffix' => '% of your income',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'off_work',
                            'label' => '... and rest for',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.000001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'work',
                            'label' => '... after',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrsmos',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => '(save_percentage/100) / (1 - save_percentage/100) = off_work / work',
            'results' => ['off_work' => '-save_percentage*work/(save_percentage - 100)', 'save_percentage' => '100*off_work/(off_work + work)', 'work' => 'off_work*(100 - save_percentage)/save_percentage'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Save and ... after into Sabbatical and the answer comes back as ... and rest for. It is a single relationship that reads ... and rest for out of save, not a table of canned results keyed by them. Units for ... and rest for default to years and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Sabbatical calculator works', 'html' => <<<'TXT'
            <p>Sabbatical answers one question from 2 numbers, and the answer is ... and rest for.</p><p>Written with the labels from the form, ... and rest for = − Save × ... after ÷ (Save − 100).</p><p>The result panel carries ... and rest for, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Save</strong> — in % of your income</li><li><strong>... after</strong> — in years / months</li></ul><p>What you get back is ... and rest for in years, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Save = 10 % of your income and ... after = 100 yrsmos; the answers are <strong>... and rest for</strong> = 3.506e+8 yrs.</p><ul><li><strong>... and rest for</strong> = 3.506e+8 yrs</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>... and rest for</strong> = <code>− Save × ... after ÷ (Save − 100)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>... and rest for</strong> = 3.506e+8. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on ... and rest for lists 5 options and opens on years. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>... and rest for</strong> = <code>− Save × ... after ÷ (Save − 100)</code></li><li><strong>Save</strong> = <code>100 × ... and rest for ÷ (... and rest for + ... after)</code></li><li><strong>... after</strong> = <code>... and rest for × (100 − Save) ÷ Save</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>... and rest for</strong> = <code>− Save × ... after ÷ (Save − 100)</code> — the form to use when Save and ... after are the values you have.</li><li><strong>Save</strong> = <code>100 × ... and rest for ÷ (... and rest for + ... after)</code> — the form to use when ... and rest for and ... after are the values you have.</li><li><strong>... after</strong> = <code>... and rest for × (100 − Save) ÷ Save</code> — the form to use when ... and rest for and Save are the values you have.</li></ul><p>Any one of ... and rest for, Save and ... after can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Save from 10 to 20, leaving every other box alone. The panel moves from <strong>... and rest for</strong> 3.506e+8 yrs to <strong>... and rest for</strong> 7.889e+8 yrs.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> ... after carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> ... and rest for is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Save left as a guess.</strong> Anything typed into Save is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>... after left as a guess.</strong> Anything typed into ... after is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Save to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Sabbatical form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Save</strong> is measured in % of your income. The page reads it when it works out ... and rest for and ... after. Fill it from a measurement rather than a memory — Save is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>... after</strong> is a years / months quantity: the page opens it in yrsmos and converts anything else you pick before the formula runs. The page reads it when it works out ... and rest for and Save. Fill it from a measurement rather than a memory — ... after is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>... and rest for</strong> is a years figure and the page's own defaults put it at 3.506e+8 yrs. It is worked out from Save and ... after. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>... and rest for</th></tr></thead><tbody><tr><td><strong>Save</strong> +10%</td><td>+11.24%</td></tr><tr><td><strong>... after</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Save: ten per cent there moves an answer by about 11.2 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Save = 5 % of your income and ... after = 50 yrsmos and the page reports <strong>... and rest for</strong> = 8.305e+7 yrs.</li><li>Feed in Save = 30 % of your income and ... after = 100 yrsmos and the page reports <strong>... and rest for</strong> = 1.352e+9 yrs.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Sabbatical actually offers.</p><ul><li><strong>years</strong> — opens in <em>yrs</em>, and the chip also carries days, wks, mos, yrs, sec and min. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Save and ... after ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Save — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check ... and rest for in yrs against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind ... and rest for is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover years. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Save and ... after is what you already know and ... and rest for is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/credit-card-payment">Credit card payment Calculator</a>, <a href="/finance/credit-card-payoff">Credit card payoff Calculator</a> and <a href="/finance/credit-spread">Credit spread Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sabbatical calculator work out?', 'a' => '... and rest for, from Save and ... after. The relationship is ... and rest for = − Save × ... after ÷ (Save − 100).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Save (% of your income), ... after (years / months). Enter save and ... after; ... and rest for is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of ... and rest for, Save and ... after blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => '... and rest for = 3.506e+8 yrs. Those are the defaults written into the form — move Save and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of ... and rest for is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Save blank and the page solves for it, reporting ... and rest for instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. ... and rest for keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/credit-card-payment', 'name' => 'Credit card payment Calculator'],
            ['path' => '/finance/credit-card-payoff', 'name' => 'Credit card payoff Calculator'],
            ['path' => '/finance/credit-spread', 'name' => 'Credit spread Calculator'],
        ],
        'authors' => [],
    ],
];
