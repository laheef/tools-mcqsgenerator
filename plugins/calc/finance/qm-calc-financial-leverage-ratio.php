<?php

/**
 * Financial leverage ratio
 * /finance/financial-leverage-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Financial leverage ratio',
    'meta' => ['title' => 'Financial leverage ratio — Formula & Results', 'description' => 'Financial leverage ratio takes current assets, non-current assets and total equity and returns total assets. The formula is printed in the form\'s own words.', 'h1' => 'Financial leverage ratio Calculator', 'updated' => '2026-09-12'],
    'sections' => [
        [
            'title' => 'Total assets',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current_assets',
                            'label' => 'Current assets',
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
                            'name' => 'non_current_assets',
                            'label' => 'Non-current assets',
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
                            'name' => 'total_assets',
                            'label' => 'Total assets',
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
        [
            'title' => 'Financial leverage',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_equity',
                            'label' => 'Total equity',
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
                            'name' => 'fin_lev',
                            'label' => 'Financial leverage',
                            'type' => 'number',
                            'suffix' => 'x',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'total_assets = current_assets + non_current_assets ',
            'results' => ['current_assets' => '-non_current_assets + total_assets', 'total_assets' => 'current_assets + non_current_assets', 'non_current_assets' => '-current_assets + total_assets'],
        ],
        [
            'title' => 'fin_lev = total_assets / total_equity',
            'results' => ['fin_lev' => 'total_assets/total_equity', 'total_equity' => 'total_assets/fin_lev', 'total_assets' => 'fin_lev*total_equity'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Financial leverage ratio works out Total assets and Total equity from Current assets and Non-current assets. The arithmetic is the whole method: total assets is worked out from current assets by one formula, applied once. Total assets comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Financial leverage ratio calculator works', 'html' => <<<'TXT'
            <p>The Financial leverage ratio calculator applies one relationship to 2 numbers and reports Total assets, Total equity and Financial leverage.</p><p>In the form&#039;s own words, Total assets = Current assets + Non-current assets.</p><p>The result panel carries Total assets, Total equity and Financial leverage, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Current assets</strong> — in USD</li><li><strong>Non-current assets</strong> — in USD</li></ul><p>What you get back is Total assets in USD, Total equity in USD, Financial leverage in x, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Current assets = 10 USD, Non-current assets = 100 USD, Total equity = 1000 USD and Financial leverage = 10 x — through the same formula and the panel reports <strong>Total assets</strong> = 110 USD.</p><ul><li><strong>Total assets</strong> = 110 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Total assets</strong> = <code>Current assets + Non-current assets</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total assets</strong> = 110. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Total assets is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total assets</strong> = <code>Current assets + Non-current assets</code></li><li><strong>Current assets</strong> = <code>− Non-current assets + Total assets</code></li><li><strong>Non-current assets</strong> = <code>− Current assets + Total assets</code></li><li><strong>Financial leverage</strong> = <code>Total assets ÷ Total equity</code></li><li><strong>Total equity</strong> = <code>Total assets ÷ Financial leverage</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total assets</strong> = <code>Current assets + Non-current assets</code> — the form to use when Current assets and Non-current assets are the values you have.</li><li><strong>Current assets</strong> = <code>− Non-current assets + Total assets</code> — the form to use when Non-current assets and Total assets are the values you have.</li><li><strong>Non-current assets</strong> = <code>− Current assets + Total assets</code> — the form to use when Current assets and Total assets are the values you have.</li><li><strong>Financial leverage</strong> = <code>Total assets ÷ Total equity</code> — the form to use when Total assets and Total equity are the values you have.</li><li><strong>Total equity</strong> = <code>Total assets ÷ Financial leverage</code> — the form to use when Total assets and Financial leverage are the values you have.</li><li><strong>Total assets</strong> = <code>Financial leverage × Total equity</code> — the form to use when Financial leverage and Total equity are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total assets, Current assets and Non-current assets can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Current assets, from 10 to 20 — and the answers go from <strong>Total assets</strong> 110 USD to <strong>Total assets</strong> 120 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Total assets, Total equity and Financial leverage are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Current assets left as a guess.</strong> Anything typed into Current assets is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Non-current assets left as a guess.</strong> Anything typed into Non-current assets is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Current assets and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Financial leverage ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Current assets</strong> takes a plain number with no unit attached. The page reads it when it works out Total assets and Non-current assets. Fill it from a measurement rather than a memory — Current assets is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Non-current assets</strong> takes a plain number with no unit attached. The page reads it when it works out Current assets and Total assets. Fill it from a measurement rather than a memory — Non-current assets is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Total assets</strong> is a plain number and the page's own defaults put it at 110. It is computed from Current assets and Non-current assets, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total equity</strong> is a plain number. It is computed from Total assets and Financial leverage, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Financial leverage</strong> is a plain number. It is computed from Total assets and Total equity, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total assets</th></tr></thead><tbody><tr><td><strong>Current assets</strong> +10%</td><td>+0.91%</td></tr><tr><td><strong>Non-current assets</strong> +10%</td><td>+9.09%</td></tr><tr><td><strong>Total equity</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Financial leverage</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Non-current assets: ten per cent there moves an answer by about 9.1 per cent, which is why that is the number to measure twice. By contrast, Total equity and Financial leverage barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Current assets = 5 USD, Non-current assets = 50 USD, Total equity = 500 USD and Financial leverage = 5 x and the page reports <strong>Total assets</strong> = 55 USD.</li><li>Feed in Current assets = 30 USD, Non-current assets = 100 USD, Total equity = 1000 USD and Financial leverage = 10 x and the page reports <strong>Total assets</strong> = 130 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Current assets and Non-current assets ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Current assets — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Total assets in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Total assets is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Current assets and Non-current assets are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Current assets and Non-current assets measured, Total assets and Total equity wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/comparative-advantage">Comparative advantage Calculator</a>, <a href="/finance/compound-growth">Compound growth Calculator</a> and <a href="/finance/compound-interest">Compound interest Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Financial leverage ratio calculator work out?', 'a' => <<<'TXT'
            Total assets, Total equity and Financial leverage, from Current assets and Non-current assets. The relationship is Total assets = Current assets + Non-current assets.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Current assets (USD), Non-current assets (USD). With current assets and non-current assets in place, Total assets can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total assets, Current assets, Non-current assets and Financial leverage can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Total assets = 110 USD. That comes from the page\'s own defaults, entered in Current assets; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total assets is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Current assets blank and the page solves for it, reporting Total assets instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total assets keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/comparative-advantage', 'name' => 'Comparative advantage Calculator'],
            ['path' => '/finance/compound-growth', 'name' => 'Compound growth Calculator'],
            ['path' => '/finance/compound-interest', 'name' => 'Compound interest Calculator'],
        ],
        'authors' => [],
    ],
];
