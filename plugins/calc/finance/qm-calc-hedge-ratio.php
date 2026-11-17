<?php

/**
 * Hedge ratio
 * /finance/hedge-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hedge ratio',
    'meta' => ['title' => 'Hedge ratio Calculator: Formula, Steps & Examples', 'description' => 'Enter value of total exposure and value of hedge position and get hedge ratio back. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Hedge ratio Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'exposure',
                            'label' => 'Value of total exposure',
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
                            'name' => 'hedge',
                            'label' => 'Value of hedge position',
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
                            'name' => 'hedge_ratio',
                            'label' => 'Hedge ratio',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'hedge_ratio = hedge / exposure',
            'results' => ['hedge_ratio' => 'hedge/exposure', 'exposure' => 'hedge/hedge_ratio', 'hedge' => 'exposure*hedge_ratio'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hedge ratio works out Hedge ratio from Value of total exposure and Value of hedge position. The arithmetic is the whole method: hedge ratio is worked out from value of total exposure by one formula, applied once. Hedge ratio comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Hedge ratio calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Hedge ratio: it takes 2 numbers and reports Hedge ratio.</p><p>Written with the labels from the form, Hedge ratio = Value of hedge position ÷ Value of total exposure.</p><p>The answers are Hedge ratio; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Value of total exposure</strong> — in USD</li><li><strong>Value of hedge position</strong> — in USD</li></ul><p>The result box is Hedge ratio in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Value of total exposure = 10 USD and Value of hedge position = 100 USD gives <strong>Hedge ratio</strong> = 10 perc.</p><ul><li><strong>Hedge ratio</strong> = 10 perc</li></ul><p>The line behind those figures is <strong>Hedge ratio</strong> = <code>Value of hedge position ÷ Value of total exposure</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Hedge ratio</strong> = 10. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Hedge ratio lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Hedge ratio</strong> = <code>Value of hedge position ÷ Value of total exposure</code></li><li><strong>Value of total exposure</strong> = <code>Value of hedge position ÷ Hedge ratio</code></li><li><strong>Value of hedge position</strong> = <code>Value of total exposure × Hedge ratio</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Hedge ratio</strong> = <code>Value of hedge position ÷ Value of total exposure</code> — the form to use when Value of hedge position and Value of total exposure are the values you have.</li><li><strong>Value of total exposure</strong> = <code>Value of hedge position ÷ Hedge ratio</code> — the form to use when Value of hedge position and Hedge ratio are the values you have.</li><li><strong>Value of hedge position</strong> = <code>Value of total exposure × Hedge ratio</code> — the form to use when Value of total exposure and Hedge ratio are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Hedge ratio, Value of total exposure and Value of hedge position can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Value of total exposure, from 10 to 20 — and the answers go from <strong>Hedge ratio</strong> 10 perc to <strong>Hedge ratio</strong> 5 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Hedge ratio is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Value of total exposure left as a guess.</strong> Anything typed into Value of total exposure is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Value of hedge position left as a guess.</strong> Anything typed into Value of hedge position is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Value of total exposure is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Hedge ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Value of total exposure</strong> takes a plain number with no unit attached. The page reads it when it works out Hedge ratio and Value of hedge position. Fill it from a measurement rather than a memory — Value of total exposure is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Value of hedge position</strong> takes a plain number with no unit attached. The page reads it when it works out Hedge ratio and Value of total exposure. Fill it from a measurement rather than a memory — Value of hedge position is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Hedge ratio</strong> is a percent figure and the page's own defaults put it at 10 perc. It is computed from Value of hedge position and Value of total exposure, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Hedge ratio</th></tr></thead><tbody><tr><td><strong>Value of total exposure</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Value of hedge position</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Value of hedge position: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Value of total exposure = 5 USD and Value of hedge position = 50 USD and the page reports <strong>Hedge ratio</strong> = 10 perc.</li><li>Feed in Value of total exposure = 30 USD and Value of hedge position = 100 USD and the page reports <strong>Hedge ratio</strong> = 3.33 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Hedge ratio actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Value of total exposure and Value of hedge position ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Value of total exposure — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Hedge ratio in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Hedge ratio is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Value of total exposure and Value of hedge position and the number you are missing is Hedge ratio.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/optimal-hedge-ratio">Optimal hedge ratio</a>, <a href="/finance/optimal-price">Optimal price Calculator</a> and <a href="/finance/options-spread">Options spread</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hedge ratio calculator work out?', 'a' => 'Hedge ratio, from Value of hedge position and Value of total exposure. The relationship is Hedge ratio = Value of hedge position ÷ Value of total exposure.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Value of total exposure (USD), Value of hedge position (USD). With value of total exposure and value of hedge position in place, Hedge ratio can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Hedge ratio, Value of total exposure and Value of hedge position can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Hedge ratio = 10 perc. Those are the defaults written into the form — move Value of total exposure and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Hedge ratio is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Value of total exposure blank and the page solves for it, reporting Hedge ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Hedge ratio keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/optimal-hedge-ratio', 'name' => 'Optimal hedge ratio'],
            ['path' => '/finance/optimal-price', 'name' => 'Optimal price Calculator'],
            ['path' => '/finance/options-spread', 'name' => 'Options spread'],
        ],
        'authors' => [],
    ],
];
