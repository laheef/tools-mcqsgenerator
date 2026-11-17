<?php

/**
 * Combined ratio
 * /finance/combined-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Combined ratio',
    'meta' => ['title' => 'Combined ratio Calculator — Formula & Results', 'description' => 'Combined ratio turns claim loss, loss adjustments and premiums into loss expense. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Combined ratio Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => 'Loss expense',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'claim_loss',
                            'label' => 'Claim loss',
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
                            'name' => 'loss_adj',
                            'label' => 'Loss adjustments',
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
                            'name' => 'loss_expense',
                            'label' => 'Loss expense',
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
            'title' => 'Combined ratio',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'premiums',
                            'label' => 'Premiums',
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
                            'name' => 'underwriting_expense',
                            'label' => 'Underwriting expense',
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
                            'name' => 'combined_ratio',
                            'label' => 'Combined ratio',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'combined_ratio < 1', 'text' => 'The overall expenses are less than the premiums earned. The insurance company\'s operation is profitable .'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'combined_ratio > 1', 'text' => 'The overall expenses are more than the total premiums earned. The insurance company\'s operation is making a loss .'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'combined_ratio == 1', 'text' => 'The overall expenses are same as the total premiums earned. The insurance company\'s operation is just breaking even .'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'combined_ratio = (loss_expense + underwriting_expense) / premiums',
            'results' => ['loss_expense' => 'combined_ratio*premiums - underwriting_expense', 'premiums' => '(loss_expense + underwriting_expense)/combined_ratio', 'combined_ratio' => '(loss_expense + underwriting_expense)/premiums', 'underwriting_expense' => 'combined_ratio*premiums - loss_expense'],
        ],
        [
            'title' => 'loss_expense = claim_loss + loss_adj',
            'results' => ['loss_adj' => '-claim_loss + loss_expense', 'claim_loss' => '-loss_adj + loss_expense', 'loss_expense' => 'claim_loss + loss_adj'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Combined ratio takes Loss expense, Premiums and Underwriting expense and returns Claim loss and Loss adjustments. Nothing is looked up on this page: claim loss is computed from loss expense and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Claim loss is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Combined ratio calculator works', 'html' => <<<'TXT'
            <p>Combined ratio answers one question from 3 numbers, and the answer is Claim loss, Loss adjustments and Combined ratio.</p><p>The relationship it solves reads Combined ratio = (Loss expense + Underwriting expense) ÷ Premiums.</p><p>What comes back is Claim loss, Loss adjustments and Combined ratio — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Loss expense</strong> — in USD</li><li><strong>Premiums</strong> — in USD</li><li><strong>Underwriting expense</strong> — in USD</li></ul><p>The result boxes are Claim loss in USD, Loss adjustments in USD, Combined ratio in percent; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Claim loss = 10 USD, Loss adjustments = 100 USD, Premiums = 1000 USD, Underwriting expense = 10 USD and Combined ratio = 100 perc gives <strong>Loss expense</strong> = 99990 USD.</p><ul><li><strong>Loss expense</strong> = 99990 USD</li></ul><p>That is <strong>Combined ratio</strong> = <code>(Loss expense + Underwriting expense) ÷ Premiums</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Loss expense</strong> = 99990 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Combined ratio offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Combined ratio</strong> = <code>(Loss expense + Underwriting expense) ÷ Premiums</code></li><li><strong>Loss expense</strong> = <code>Combined ratio × Premiums − Underwriting expense</code></li><li><strong>Premiums</strong> = <code>(Loss expense + Underwriting expense) ÷ Combined ratio</code></li><li><strong>Underwriting expense</strong> = <code>Combined ratio × Premiums − Loss expense</code></li><li><strong>Loss adjustments</strong> = <code>− Claim loss + Loss expense</code></li><li><strong>Claim loss</strong> = <code>− Loss adjustments + Loss expense</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Combined ratio</strong> = <code>(Loss expense + Underwriting expense) ÷ Premiums</code> — the form to use when Loss expense, Underwriting expense and Premiums are the values you have.</li><li><strong>Loss expense</strong> = <code>Combined ratio × Premiums − Underwriting expense</code> — the form to use when Combined ratio, Premiums and Underwriting expense are the values you have.</li><li><strong>Premiums</strong> = <code>(Loss expense + Underwriting expense) ÷ Combined ratio</code> — the form to use when Loss expense, Underwriting expense and Combined ratio are the values you have.</li><li><strong>Underwriting expense</strong> = <code>Combined ratio × Premiums − Loss expense</code> — the form to use when Combined ratio, Premiums and Loss expense are the values you have.</li><li><strong>Loss expense</strong> = <code>Claim loss + Loss adjustments</code> — the form to use when Claim loss and Loss adjustments are the values you have.</li><li><strong>Loss adjustments</strong> = <code>− Claim loss + Loss expense</code> — the form to use when Claim loss and Loss expense are the values you have.</li><li><strong>Claim loss</strong> = <code>− Loss adjustments + Loss expense</code> — the form to use when Loss adjustments and Loss expense are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Combined ratio, Loss expense and Premiums can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Claim loss, from 10 to 20 — and the answers go from <strong>Loss expense</strong> 99990 USD to <strong>Loss expense</strong> 99990 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Claim loss, Loss adjustments and Combined ratio are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loss expense left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loss expense is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Premiums left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Premiums is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Underwriting expense left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Underwriting expense is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Loss expense is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Loss expense</strong> takes a plain number with no unit attached. The page reads it when it works out Premiums, Combined ratio and Underwriting expense. Have it to hand before you start: Loss expense is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Premiums</strong> takes a plain number with no unit attached. The page reads it when it works out Loss expense, Combined ratio and Underwriting expense. Have it to hand before you start: Premiums is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Underwriting expense</strong> takes a plain number with no unit attached. The page reads it when it works out Loss expense, Premiums and Combined ratio. Have it to hand before you start: Underwriting expense is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Claim loss</strong> is a plain number. It is computed from Loss adjustments and Loss expense, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Loss adjustments</strong> is a plain number. It is computed from Claim loss and Loss expense, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Combined ratio</strong> is a percent figure. It is computed from Loss expense, Underwriting expense and Premiums, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Loss expense</th></tr></thead><tbody><tr><td><strong>Claim loss</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Loss adjustments</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Premiums</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Underwriting expense</strong> +10%</td><td>0%</td></tr><tr><td><strong>Combined ratio</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Combined ratio sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Underwriting expense, Claim loss and Loss adjustments barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Claim loss = 5 USD, Loss adjustments = 50 USD, Premiums = 500 USD, Underwriting expense = 5 USD and Combined ratio = 50 perc, the answer is <strong>Loss expense</strong> = 24995 USD.</li><li>With Claim loss = 30 USD, Loss adjustments = 100 USD, Premiums = 1000 USD, Underwriting expense = 10 USD and Combined ratio = 100 perc, the answer is <strong>Loss expense</strong> = 99990 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Claim loss follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Loss expense, Premiums and Underwriting expense is what you already know and Claim loss and Loss adjustments is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/markdown">Markdown Calculator</a>, <a href="/finance/market-capitalization">Market capitalization Calculator</a> and <a href="/finance/mva">Market value added (MVA) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Combined ratio calculator work out?', 'a' => <<<'TXT'
            Claim loss, Loss adjustments and Combined ratio, from Loss expense, Underwriting expense and Premiums. The relationship is Combined ratio = (Loss expense + Underwriting expense) ÷ Premiums.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loss expense (USD), Premiums (USD), Underwriting expense (USD). Enter loss expense, premiums and underwriting expense; Claim loss is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Combined ratio, Loss expense, Premiums and Underwriting expense can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Loss expense = 99990 USD. The figures come from Loss expense as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Claim loss is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Loss expense left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Claim loss keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/markdown', 'name' => 'Markdown Calculator'],
            ['path' => '/finance/market-capitalization', 'name' => 'Market capitalization Calculator'],
            ['path' => '/finance/mva', 'name' => 'Market value added (MVA) Calculator'],
        ],
        'authors' => [],
    ],
];
