<?php

/**
 * CAPM (capital asset pricing model)
 * /finance/capm
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CAPM (capital asset pricing model)',
    'meta' => ['title' => 'CAPM (capital asset pricing model) Calculator', 'description' => 'CAPM (capital asset pricing model) takes risk-free interest rate (Rf) and returns risk premium of the asset. The formula is printed in the form\'s own words.', 'h1' => 'CAPM (capital asset pricing model) Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Return_risk_free',
                            'label' => 'Risk-free interest rate (R==f==)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Return_market',
                            'label' => 'Broad market return (R==m==)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Beta_asset',
                            'label' => 'Beta',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Risk_asset',
                            'label' => 'Risk premium of the asset',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Return_asset',
                            'label' => 'Expected rate of return (R)',
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
            'title' => 'Return_asset = Return_risk_free + Risk_asset',
            'results' => ['Return_risk_free' => 'Return_asset - Risk_asset', 'Return_asset' => 'Return_risk_free + Risk_asset', 'Risk_asset' => 'Return_asset - Return_risk_free'],
        ],
        [
            'title' => 'Risk_asset = Beta_asset * (Return_market - Return_risk_free)',
            'results' => ['Return_market' => 'Return_risk_free + Risk_asset/Beta_asset', 'Return_risk_free' => 'Return_market - Risk_asset/Beta_asset', 'Beta_asset' => 'Risk_asset/(Return_market - Return_risk_free)', 'Risk_asset' => 'Beta_asset*(Return_market - Return_risk_free)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        CAPM (capital asset pricing model) works out Broad market return (Rₘ) and Beta from Risk-free interest rate (Rf) and Risk premium of the asset. The arithmetic is the whole method: broad market return (Rₘ) is worked out from risk-free interest rate (Rf) by one formula, applied once. Broad market return (Rₘ) comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the CAPM (capital asset pricing model) calculator works', 'html' => <<<'TXT'
            <p>The CAPM (capital asset pricing model) calculator applies one relationship to 2 numbers and reports Broad market return (Rₘ), Beta and Expected rate of return (R).</p><p>Written with the labels from the form, Expected rate of return (R) = Risk-free interest rate (Rf) + Risk premium of the asset.</p><p>The result panel carries Broad market return (Rₘ), Beta and Expected rate of return (R), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Risk-free interest rate (Rf)</strong> — in percent</li><li><strong>Risk premium of the asset</strong> — in percent</li></ul><p>The answers come back as Broad market return (Rₘ) in percent, Beta, Expected rate of return (R) in percent. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Risk-free interest rate (Rf) = 10 perc, Broad market return (Rₘ) = 100 perc, Beta = 1000 and Risk premium of the asset = 10 perc — through the same formula and the panel reports <strong>Expected rate of return (R)</strong> = 20 perc.</p><ul><li><strong>Expected rate of return (R)</strong> = 20 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Expected rate of return (R)</strong> = <code>Risk-free interest rate (Rf) + Risk premium of the asset</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Expected rate of return (R)</strong> = 20. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Broad market return (Rₘ) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Expected rate of return (R)</strong> = <code>Risk-free interest rate (Rf) + Risk premium of the asset</code></li><li><strong>Risk-free interest rate (Rf)</strong> = <code>Expected rate of return (R) − Risk premium of the asset</code></li><li><strong>Risk premium of the asset</strong> = <code>Expected rate of return (R) − Risk-free interest rate (Rf)</code></li><li><strong>Broad market return (Rₘ)</strong> = <code>Risk-free interest rate (Rf) + Risk premium of the asset ÷ Beta</code></li><li><strong>Beta</strong> = <code>Risk premium of the asset ÷ (Broad market return (Rₘ) − Risk-free interest rate (Rf))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Expected rate of return (R)</strong> = <code>Risk-free interest rate (Rf) + Risk premium of the asset</code> — the form to use when Risk-free interest rate (Rf) and Risk premium of the asset are the values you have.</li><li><strong>Risk-free interest rate (Rf)</strong> = <code>Expected rate of return (R) − Risk premium of the asset</code> — the form to use when Expected rate of return (R) and Risk premium of the asset are the values you have.</li><li><strong>Risk premium of the asset</strong> = <code>Expected rate of return (R) − Risk-free interest rate (Rf)</code> — the form to use when Expected rate of return (R) and Risk-free interest rate (Rf) are the values you have.</li><li><strong>Risk premium of the asset</strong> = <code>Beta × (Broad market return (Rₘ) − Risk-free interest rate (Rf))</code> — the form to use when Beta, Broad market return (Rₘ) and Risk-free interest rate (Rf) are the values you have.</li><li><strong>Broad market return (Rₘ)</strong> = <code>Risk-free interest rate (Rf) + Risk premium of the asset ÷ Beta</code> — the form to use when Risk-free interest rate (Rf), Risk premium of the asset and Beta are the values you have.</li><li><strong>Risk-free interest rate (Rf)</strong> = <code>Broad market return (Rₘ) − Risk premium of the asset ÷ Beta</code> — the form to use when Broad market return (Rₘ), Risk premium of the asset and Beta are the values you have.</li><li><strong>Beta</strong> = <code>Risk premium of the asset ÷ (Broad market return (Rₘ) − Risk-free interest rate (Rf))</code> — the form to use when Risk premium of the asset, Broad market return (Rₘ) and Risk-free interest rate (Rf) are the values you have.</li></ul><p>Any one of Expected rate of return (R), Risk-free interest rate (Rf) and Risk premium of the asset can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Risk-free interest rate (Rf), from 10 to 20 — and the answers go from <strong>Expected rate of return (R)</strong> 20 perc to <strong>Expected rate of return (R)</strong> 30 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Risk-free interest rate (Rf) and Risk premium of the asset carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Broad market return (Rₘ), Beta and Expected rate of return (R) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Risk-free interest rate (Rf) left as a guess.</strong> Anything typed into Risk-free interest rate (Rf) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Risk premium of the asset left as a guess.</strong> Anything typed into Risk premium of the asset is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Risk-free interest rate (Rf) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Risk-free interest rate (Rf)</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Expected rate of return (R), Risk premium of the asset and Broad market return (Rₘ). Have it to hand before you start: Risk-free interest rate (Rf) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Risk premium of the asset</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Risk-free interest rate (Rf), Expected rate of return (R) and Broad market return (Rₘ). Have it to hand before you start: Risk premium of the asset is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Broad market return (Rₘ)</strong> is a percent figure. It is computed from Risk-free interest rate (Rf), Risk premium of the asset and Beta, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Beta</strong> is a plain number. It is computed from Risk premium of the asset, Broad market return (Rₘ) and Risk-free interest rate (Rf), so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Expected rate of return (R)</strong> is a percent figure and the page's own defaults put it at 20 perc. It is computed from Risk-free interest rate (Rf) and Risk premium of the asset, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Expected rate of return (R)</th></tr></thead><tbody><tr><td><strong>Risk-free interest rate (Rf)</strong> +10%</td><td>+5%</td></tr><tr><td><strong>Broad market return (Rₘ)</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Beta</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Risk premium of the asset</strong> +10%</td><td>+5%</td></tr></tbody></table><p>The steepest column belongs to Risk-free interest rate (Rf): ten per cent there moves an answer by about 5 per cent, which is why that is the number to measure twice. By contrast, Broad market return (Rₘ) and Beta barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Risk-free interest rate (Rf) = 5 perc, Broad market return (Rₘ) = 50 perc, Beta = 500 and Risk premium of the asset = 5 perc, the answer is <strong>Expected rate of return (R)</strong> = 10 perc.</li><li>With Risk-free interest rate (Rf) = 30 perc, Broad market return (Rₘ) = 100 perc, Beta = 1000 and Risk premium of the asset = 10 perc, the answer is <strong>Expected rate of return (R)</strong> = 40 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Broad market return (Rₘ) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Risk-free interest rate (Rf) and Risk premium of the asset are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Risk-free interest rate (Rf) and Risk premium of the asset and the number you are missing is Broad market return (Rₘ) and Beta.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/gdp-gap">GDP gap</a>, <a href="/finance/gdp-growth">GDP growth rate Calculator</a> and <a href="/finance/gdp-per-capita">GDP per capita Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CAPM (capital asset pricing model) calculator work out?', 'a' => <<<'TXT'
            Broad market return (Rₘ), Beta and Expected rate of return (R), from Risk-free interest rate (Rf) and Risk premium of the asset. The relationship is Expected rate of return (R) = Risk-free interest rate (Rf) + Risk premium of the asset.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Risk-free interest rate (Rf) (percent), Risk premium of the asset (percent). With risk-free interest rate (Rf) and risk premium of the asset in place, Broad market return (Rₘ) can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Expected rate of return (R), Risk-free interest rate (Rf), Risk premium of the asset and Broad market return (Rₘ) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Expected rate of return (R) = 20 perc. That comes from the page's own defaults, entered in Risk-free interest rate (Rf); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Broad market return (Rₘ) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Risk-free interest rate (Rf) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Broad market return (Rₘ) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/gdp-gap', 'name' => 'GDP gap'],
            ['path' => '/finance/gdp-growth', 'name' => 'GDP growth rate Calculator'],
            ['path' => '/finance/gdp-per-capita', 'name' => 'GDP per capita Calculator'],
        ],
        'authors' => [],
    ],
];
