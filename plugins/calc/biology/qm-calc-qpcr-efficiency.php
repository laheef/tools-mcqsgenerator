<?php

/**
 * qPCR efficiency
 * /biology/qpcr-efficiency
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'qPCR efficiency',
    'meta' => ['title' => 'qPCR efficiency Calculator — Formula, Units & Example', 'description' => 'qPCR efficiency works out amplification factor and qPCR efficiency from slope. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'qPCR efficiency Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'slope',
                            'label' => 'Slope',
                            'type' => 'number',
                            'help' => 'This is the slope of the standard curve of the dilution you run. A value of 3.322 would equal precisely 100% PCR efficiency.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Amplification_factor',
                            'label' => 'Amplification factor',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            This is the PCR efficiency expressed as a ratio. A value of two equals 100% efficiency because DNA has two strands, and at maximum, a target sequence can double each cycle.&nbsp;
                            TXT,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Efficiency',
                            'label' => 'qPCR efficiency',
                            'type' => 'number',
                            'help' => 'PCR performance as a percentage. 100% equals full efficiency, meaning the doubling of the target DNA at each PCR cycle (-1/log(2)).',
                            'unit' => '37',
                            'unit_default' => 'perc',
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
            'title' => 'Efficiency = -1 + 10^(-1/slope)',
            'results' => ['slope' => 'log(10)/log(1/(Efficiency + 1))', 'Efficiency' => '-1 + pow(10, -1/slope)'],
        ],
        [
            'title' => 'Amplification_factor = 10^(-1/slope)',
            'results' => ['Amplification_factor' => 'pow(10, -1/slope)', 'slope' => 'log(10)/log(1/Amplification_factor)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        qPCR efficiency turns Slope and Amplification factor into qPCR efficiency. The arithmetic is the whole method: qPCR efficiency is worked out from slope by one formula, applied once. QPCR efficiency comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the qPCR efficiency calculator works', 'html' => <<<'TXT'
            <p>qPCR efficiency answers one question from 2 numbers, and the answer is qPCR efficiency.</p><p>The relationship it solves reads Slope = ln(10) ÷ ln(1 ÷ (qPCR efficiency + 1)).</p><p>The answers are qPCR efficiency; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Slope</strong> — a plain number, no unit. This is the slope of the standard curve of the dilution you run. A value of 3.322 would equal precisely 100% PCR efficiency.</li><li><strong>Amplification factor</strong> — a plain number, no unit. This is the PCR efficiency expressed as a ratio. A value of two equals 100% efficiency because DNA has two strands, and at maximum, a target sequence can double each cycle.&amp;nbsp;</li></ul><p>The result box is qPCR efficiency in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Slope = 10 gives <strong>qPCR efficiency</strong> = -0.2057 perc and <strong>Amplification factor</strong> = 0.7943.</p><ul><li><strong>qPCR efficiency</strong> = -0.2057 perc</li><li><strong>Amplification factor</strong> = 0.7943</li></ul><p>That is <strong>Slope</strong> = <code>ln(10) ÷ ln(1 ÷ (qPCR efficiency + 1))</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>qPCR efficiency</strong> = -0.2057 and <strong>Amplification factor</strong> = 0.7943 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: qPCR efficiency offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Slope</strong> = <code>ln(10) ÷ ln(1 ÷ (qPCR efficiency + 1))</code></li><li><strong>qPCR efficiency</strong> = <code>− 1 + (10)^(− 1 ÷ Slope)</code></li><li><strong>Amplification factor</strong> = <code>(10)^(− 1 ÷ Slope)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Slope</strong> = <code>ln(10) ÷ ln(1 ÷ (qPCR efficiency + 1))</code> — the form to use when qPCR efficiency are the values you have.</li><li><strong>qPCR efficiency</strong> = <code>− 1 + (10)^(− 1 ÷ Slope)</code> — the form to use when Slope are the values you have.</li><li><strong>Amplification factor</strong> = <code>(10)^(− 1 ÷ Slope)</code> — the form to use when Slope are the values you have.</li><li><strong>Slope</strong> = <code>ln(10) ÷ ln(1 ÷ Amplification factor)</code> — the form to use when Amplification factor are the values you have.</li></ul><p>Any one of Slope, qPCR efficiency and Amplification factor can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Slope, from 10 to 20 — and the answers go from <strong>qPCR efficiency</strong> -0.2057 perc and <strong>Amplification factor</strong> 0.7943 to <strong>qPCR efficiency</strong> -0.1087 perc and <strong>Amplification factor</strong> 0.8913.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with qPCR efficiency is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Slope left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Slope is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Amplification factor left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Amplification factor is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Slope is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the qPCR efficiency form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Slope</strong> takes a plain number with no unit attached. This is the slope of the standard curve of the dilution you run. A value of 3.322 would equal precisely 100% PCR efficiency. Change it and qPCR efficiency and Amplification factor changes with it. Fill it from a measurement rather than a memory — Slope is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Amplification factor</strong> takes a plain number with no unit attached. This is the PCR efficiency expressed as a ratio. A value of two equals 100% efficiency because DNA has two strands, and at maximum, a target sequence can double each cycle.&amp;nbsp;. Change it and Slope changes with it. Fill it from a measurement rather than a memory — Amplification factor is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>qPCR efficiency</strong> is a percent figure and the page's own defaults put it at -0.2057 perc. It is worked out from Slope. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>qPCR efficiency</th><th>Amplification factor</th></tr></thead><tbody><tr><td><strong>Slope</strong> +10%</td><td>+8.17%</td><td>+2.12%</td></tr></tbody></table><p>Ranked by leverage, Slope sits at the top — a ten per cent error in that box shows up as roughly 8.2 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Slope = 5 and the page reports <strong>qPCR efficiency</strong> = -0.369 perc and <strong>Amplification factor</strong> = 0.631.</li><li>Feed in Slope = 30 and the page reports <strong>qPCR efficiency</strong> = -0.0739 perc and <strong>Amplification factor</strong> = 0.9261.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on qPCR efficiency actually offers.</p><ul><li><strong>percent</strong> — 6 units. It opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Slope and Amplification factor ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Slope — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check qPCR efficiency in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> qPCR efficiency is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Slope and Amplification factor is what you already know and qPCR efficiency is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dry-matter">Dry matter Calculator</a>, <a href="/biology/dry-matter-intake">Dry Matter Intake Calculator</a> and <a href="/biology/dsdna-ug-to-pmol">dsDNA µg to pmol Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the qPCR efficiency calculator work out?', 'a' => 'qPCR efficiency, from qPCR efficiency. The relationship is Slope = ln(10) ÷ ln(1 ÷ (qPCR efficiency + 1)).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Slope, Amplification factor. With slope and amplification factor in place, qPCR efficiency can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Slope, qPCR efficiency and Amplification factor blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            qPCR efficiency = -0.2057 perc and Amplification factor = 0.7943. That comes from the page's own defaults, entered in Slope; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally qPCR efficiency is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Slope blank and the page solves for it, reporting qPCR efficiency instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to qPCR efficiency at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/dry-matter', 'name' => 'Dry matter Calculator'],
            ['path' => '/biology/dry-matter-intake', 'name' => 'Dry Matter Intake Calculator'],
            ['path' => '/biology/dsdna-ug-to-pmol', 'name' => 'dsDNA µg to pmol Calculator'],
        ],
        'authors' => [],
    ],
];
