<?php

/**
 * GDP gap
 * /finance/gdp-gap
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GDP gap',
    'meta' => ['title' => 'GDP gap Calculator: Formula, Steps & Examples', 'description' => 'Enter Actual GDP (Y) and Potential GDP (Y*) and get GDP gap (Ỹ) back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'GDP gap Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'actual',
                            'label' => 'Actual GDP (Y)',
                            'type' => 'number',
                            'help' => 'The actual output (Real Gross Domestic Product) in a given period (usually in a year) and economy.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'potential',
                            'label' => 'Potential GDP (Y*)',
                            'type' => 'number',
                            'help' => 'The potential level of output (Real Potential Gross Domestic Product) in a given period (usually in a year) and economy.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gap',
                            'label' => 'GDP gap (Ỹ)',
                            'type' => 'number',
                            'help' => 'The percentage difference between the actual GDP and the potential GDP.',
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
            'title' => 'gap = (actual - potential)/potential ',
            'results' => ['potential' => 'actual/(gap + 1)', 'actual' => 'potential*(gap + 1)', 'gap' => '(actual - potential)/potential'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        GDP gap works out GDP gap (Ỹ) from Actual GDP (Y) and Potential GDP (Y*). The arithmetic is the whole method: GDP gap (Ỹ) is worked out from actual GDP (Y) by one formula, applied once. GDP gap (Ỹ) comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the GDP gap calculator works', 'html' => <<<'TXT'
            <p>GDP gap answers one question from 2 numbers, and the answer is GDP gap (Ỹ).</p><p>The relationship it solves reads GDP gap (Ỹ) = (Actual GDP (Y) − Potential GDP (Y*)) ÷ Potential GDP (Y*).</p><p>The result panel carries GDP gap (Ỹ), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Actual GDP (Y)</strong> — in USD. The actual output (Real Gross Domestic Product) in a given period (usually in a year) and economy.</li><li><strong>Potential GDP (Y*)</strong> — in USD. The potential level of output (Real Potential Gross Domestic Product) in a given period (usually in a year) and economy.</li></ul><p>The result box is GDP gap (Ỹ) in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Actual GDP (Y) = 10 USD and Potential GDP (Y*) = 100 USD; the answers are <strong>GDP gap (Ỹ)</strong> = -0.9 perc.</p><ul><li><strong>GDP gap (Ỹ)</strong> = -0.9 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>GDP gap (Ỹ)</strong> = <code>(Actual GDP (Y) − Potential GDP (Y*)) ÷ Potential GDP (Y*)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>GDP gap (Ỹ)</strong> = -0.9. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on GDP gap (Ỹ) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>GDP gap (Ỹ)</strong> = <code>(Actual GDP (Y) − Potential GDP (Y*)) ÷ Potential GDP (Y*)</code></li><li><strong>Potential GDP (Y*)</strong> = <code>Actual GDP (Y) ÷ (GDP gap (Ỹ) + 1)</code></li><li><strong>Actual GDP (Y)</strong> = <code>Potential GDP (Y*) × (GDP gap (Ỹ) + 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>GDP gap (Ỹ)</strong> = <code>(Actual GDP (Y) − Potential GDP (Y*)) ÷ Potential GDP (Y*)</code> — the form to use when Actual GDP (Y) and Potential GDP (Y*) are the values you have.</li><li><strong>Potential GDP (Y*)</strong> = <code>Actual GDP (Y) ÷ (GDP gap (Ỹ) + 1)</code> — the form to use when Actual GDP (Y) and GDP gap (Ỹ) are the values you have.</li><li><strong>Actual GDP (Y)</strong> = <code>Potential GDP (Y*) × (GDP gap (Ỹ) + 1)</code> — the form to use when Potential GDP (Y*) and GDP gap (Ỹ) are the values you have.</li></ul><p>Any one of GDP gap (Ỹ), Potential GDP (Y*) and Actual GDP (Y) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Actual GDP (Y), from 10 to 20 — and the answers go from <strong>GDP gap (Ỹ)</strong> -0.9 perc to <strong>GDP gap (Ỹ)</strong> -0.8 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> GDP gap (Ỹ) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Actual GDP (Y) left as a guess.</strong> Anything typed into Actual GDP (Y) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Potential GDP (Y*) left as a guess.</strong> Anything typed into Potential GDP (Y*) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Actual GDP (Y) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the GDP gap form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Actual GDP (Y)</strong> takes a plain number with no unit attached. The actual output (Real Gross Domestic Product) in a given period (usually in a year) and economy. The page reads it when it works out Potential GDP (Y*) and GDP gap (Ỹ). Fill it from a measurement rather than a memory — Actual GDP (Y) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Potential GDP (Y*)</strong> takes a plain number with no unit attached. The potential level of output (Real Potential Gross Domestic Product) in a given period (usually in a year) and economy. The page reads it when it works out Actual GDP (Y) and GDP gap (Ỹ). Fill it from a measurement rather than a memory — Potential GDP (Y*) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>GDP gap (Ỹ)</strong> is a percent figure and the page's own defaults put it at -0.9 perc. It is computed from Actual GDP (Y) and Potential GDP (Y*), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>GDP gap (Ỹ)</th></tr></thead><tbody><tr><td><strong>Actual GDP (Y)</strong> +10%</td><td>+1.11%</td></tr><tr><td><strong>Potential GDP (Y*)</strong> +10%</td><td>-1.01%</td></tr></tbody></table><p>The steepest column belongs to Actual GDP (Y): ten per cent there moves an answer by about 1.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Actual GDP (Y) = 5 USD and Potential GDP (Y*) = 50 USD and the page reports <strong>GDP gap (Ỹ)</strong> = -0.9 perc.</li><li>Feed in Actual GDP (Y) = 30 USD and Potential GDP (Y*) = 100 USD and the page reports <strong>GDP gap (Ỹ)</strong> = -0.7 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on GDP gap actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Actual GDP (Y) and Potential GDP (Y*) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Actual GDP (Y) — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check GDP gap (Ỹ) in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind GDP gap (Ỹ) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Actual GDP (Y) and Potential GDP (Y*) is what you already know and GDP gap (Ỹ) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/balloon-payment">Balloon payment Calculator</a>, <a href="/finance/bank-reconciliation">Bank reconciliation Calculator</a> and <a href="/finance/basis-point">Basis point Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GDP gap calculator work out?', 'a' => 'GDP gap (Ỹ), from Actual GDP (Y) and Potential GDP (Y*). The relationship is GDP gap (Ỹ) = (Actual GDP (Y) − Potential GDP (Y*)) ÷ Potential GDP (Y*).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Actual GDP (Y) (USD), Potential GDP (Y*) (USD). Fill actual GDP (Y) and potential GDP (Y*) and leave GDP gap (Ỹ) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of GDP gap (Ỹ), Potential GDP (Y*) and Actual GDP (Y) blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'GDP gap (Ỹ) = -0.9 perc. Those are the defaults written into the form — move Actual GDP (Y) and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            GDP gap (Ỹ) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Actual GDP (Y) blank and the page solves for it, reporting GDP gap (Ỹ) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of GDP gap (Ỹ) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/balloon-payment', 'name' => 'Balloon payment Calculator'],
            ['path' => '/finance/bank-reconciliation', 'name' => 'Bank reconciliation Calculator'],
            ['path' => '/finance/basis-point', 'name' => 'Basis point Calculator'],
        ],
        'authors' => [],
    ],
];
