<?php

/**
 * Earnings per share
 * /finance/eps
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Earnings per share',
    'meta' => ['title' => 'Earnings per share — Free Online Calculator', 'description' => 'Enter net income and dividends and get earnings per share back. Results come back in USD, with any other unit a click away. Any box can be the unknown.', 'h1' => 'Earnings per share Calculator', 'updated' => '2024-07-30'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_income',
                            'label' => 'Net income',
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
                            'name' => 'dividends',
                            'label' => 'Dividends',
                            'type' => 'number',
                            'help' => 'Preferred dividends paid.',
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
                            'name' => 'common_shares',
                            'label' => 'Common shares',
                            'type' => 'number',
                            'help' => 'Average common shares outstanding.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'earningsPerShare',
                            'label' => 'Earnings per share',
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
            'title' => '(net_income - dividends) / common_shares = earningsPerShare',
            'results' => ['net_income' => 'common_shares*earningsPerShare + dividends', 'dividends' => '-common_shares*earningsPerShare + net_income', 'earningsPerShare' => '(-dividends + net_income)/common_shares', 'common_shares' => '(-dividends + net_income)/earningsPerShare'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Earnings per share works out Net income from Dividends, Common shares and Earnings per share. The arithmetic is the whole method: net income is worked out from dividends by one formula, applied once. Net income comes back in USD unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Earnings per share calculator works', 'html' => <<<'TXT'
            <p>Earnings per share answers one question from 3 numbers, and the answer is Net income.</p><p>In the form&#039;s own words, Net income = Common shares × Earnings per share + Dividends.</p><p>What comes back is Net income — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Dividends</strong> — in USD. Preferred dividends paid.</li><li><strong>Common shares</strong> — a plain number, no unit. Average common shares outstanding.</li><li><strong>Earnings per share</strong> — in USD</li></ul><p>The answer comes back as Net income in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Dividends = 10 USD, Common shares = 100 and Earnings per share = 1000 USD gives <strong>Net income</strong> = 100010 USD.</p><ul><li><strong>Net income</strong> = 100010 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Net income</strong> = <code>Common shares × Earnings per share + Dividends</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Net income</strong> = 100010. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Net income is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Net income</strong> = <code>Common shares × Earnings per share + Dividends</code></li><li><strong>Dividends</strong> = <code>− Common shares × Earnings per share + Net income</code></li><li><strong>Earnings per share</strong> = <code>( − Dividends + Net income) ÷ Common shares</code></li><li><strong>Common shares</strong> = <code>( − Dividends + Net income) ÷ Earnings per share</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Net income</strong> = <code>Common shares × Earnings per share + Dividends</code> — the form to use when Common shares, Earnings per share and Dividends are the values you have.</li><li><strong>Dividends</strong> = <code>− Common shares × Earnings per share + Net income</code> — the form to use when Common shares, Earnings per share and Net income are the values you have.</li><li><strong>Earnings per share</strong> = <code>( − Dividends + Net income) ÷ Common shares</code> — the form to use when Dividends, Net income and Common shares are the values you have.</li><li><strong>Common shares</strong> = <code>( − Dividends + Net income) ÷ Earnings per share</code> — the form to use when Dividends, Net income and Earnings per share are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Net income, Dividends and Earnings per share can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Dividends, from 10 to 20 — and the answers go from <strong>Net income</strong> 100010 USD to <strong>Net income</strong> 100020 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Net income is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Dividends left as a guess.</strong> Anything typed into Dividends is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Common shares left as a guess.</strong> Anything typed into Common shares is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Earnings per share left as a guess.</strong> Anything typed into Earnings per share is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Dividends to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Earnings per share form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Dividends</strong> takes a plain number with no unit attached. Preferred dividends paid. It feeds Net income, Earnings per share and Common shares. Fill it from a measurement rather than a memory — Dividends is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Common shares</strong> takes a plain number with no unit attached. Average common shares outstanding. It feeds Net income, Dividends and Earnings per share. Fill it from a measurement rather than a memory — Common shares is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Earnings per share</strong> takes a plain number with no unit attached. It feeds Net income, Dividends and Common shares. Fill it from a measurement rather than a memory — Earnings per share is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Net income</strong> is a plain number and the page's own defaults put it at 100010. The value follows from Common shares, Earnings per share and Dividends. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Net income</th></tr></thead><tbody><tr><td><strong>Dividends</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Common shares</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Earnings per share</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Common shares: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Dividends barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Dividends = 5 USD, Common shares = 50 and Earnings per share = 500 USD and the page reports <strong>Net income</strong> = 25005 USD.</li><li>Feed in Dividends = 30 USD, Common shares = 100 and Earnings per share = 1000 USD and the page reports <strong>Net income</strong> = 100030 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Dividends, Common shares and Earnings per share ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Dividends — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Net income in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Net income is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Dividends, Common shares and Earnings per share is what you already know and Net income is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/future-salary">Future salary Calculator</a>, <a href="/finance/annuity-future-value">Future value of annuity</a> and <a href="/finance/future-value">Future value</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Earnings per share is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Earnings per share calculator work out?', 'a' => 'Net income, from Common shares, Earnings per share and Dividends. The relationship is Net income = Common shares × Earnings per share + Dividends.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Dividends (USD), Common shares, Earnings per share (USD). With dividends, common shares and earnings per share in place, Net income can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Net income, Dividends, Earnings per share and Common shares can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Net income = 100010 USD. Those are the defaults written into the form — move Dividends and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Net income is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Dividends blank and the page solves for it, reporting Net income instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Net income keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/future-salary', 'name' => 'Future salary Calculator'],
            ['path' => '/finance/annuity-future-value', 'name' => 'Future value of annuity'],
            ['path' => '/finance/future-value', 'name' => 'Future value'],
        ],
        'authors' => [],
    ],
];
