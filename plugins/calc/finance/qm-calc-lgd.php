<?php

/**
 * Loss given default
 * /finance/lgd
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Loss given default',
    'meta' => ['title' => 'Loss given default: Formula, Steps & Results', 'description' => 'Loss given default works out loss severity from recovery rate and expected exposure. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Loss given default Calculator', 'updated' => '2024-10-08'],
    'sections' => [
        [
            'title' => 'Recovery rate / Loss severity',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'recovery_rate',
                            'label' => 'Recovery rate',
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
                            'name' => 'loss_severity',
                            'label' => 'Loss severity',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'LGD (loss given default)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'exposure',
                            'label' => 'Expected exposure',
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
                            'name' => 'loss_given_default_lgd',
                            'label' => 'Loss given default',
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
            'title' => 'loss_given_default_lgd = exposure * loss_severity',
            'results' => ['exposure' => 'loss_given_default_lgd/loss_severity', 'loss_severity' => 'loss_given_default_lgd/exposure', 'loss_given_default_lgd' => 'exposure*loss_severity'],
        ],
        [
            'title' => 'loss_severity = 1 - recovery_rate',
            'results' => ['recovery_rate' => '-loss_severity + 1', 'loss_severity' => '-recovery_rate + 1'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Loss given default takes Loss severity and Expected exposure and returns Recovery rate and Loss given default. The arithmetic is the whole method: recovery rate is worked out from loss severity by one formula, applied once. Recovery rate comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Loss given default calculator works', 'html' => <<<'TXT'
            <p>Loss given default answers one question from 2 numbers, and the answer is Recovery rate and Loss given default.</p><p>The relationship it solves reads Loss given default = Expected exposure × Loss severity.</p><p>The answers are Recovery rate and Loss given default; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Loss severity</strong> — in percent</li><li><strong>Expected exposure</strong> — in USD</li></ul><p>What you get back is Recovery rate in percent, Loss given default in USD, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Expected exposure = 10 USD and Loss given default = 100 USD; the answers are <strong>Loss severity</strong> = 10 perc and <strong>Recovery rate</strong> = -9 perc.</p><ul><li><strong>Loss severity</strong> = 10 perc</li><li><strong>Recovery rate</strong> = -9 perc</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Loss given default</strong> = <code>Expected exposure × Loss severity</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Loss severity</strong> = 10 and <strong>Recovery rate</strong> = -9 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Recovery rate offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Loss given default</strong> = <code>Expected exposure × Loss severity</code></li><li><strong>Expected exposure</strong> = <code>Loss given default ÷ Loss severity</code></li><li><strong>Loss severity</strong> = <code>Loss given default ÷ Expected exposure</code></li><li><strong>Recovery rate</strong> = <code>− Loss severity + 1</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Loss given default</strong> = <code>Expected exposure × Loss severity</code> — the form to use when Expected exposure and Loss severity are the values you have.</li><li><strong>Expected exposure</strong> = <code>Loss given default ÷ Loss severity</code> — the form to use when Loss given default and Loss severity are the values you have.</li><li><strong>Loss severity</strong> = <code>Loss given default ÷ Expected exposure</code> — the form to use when Loss given default and Expected exposure are the values you have.</li><li><strong>Loss severity</strong> = <code>− Recovery rate + 1</code> — the form to use when Recovery rate are the values you have.</li><li><strong>Recovery rate</strong> = <code>− Loss severity + 1</code> — the form to use when Loss severity are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Loss given default, Expected exposure and Loss severity can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Expected exposure, from 10 to 20 — and the answers go from <strong>Loss severity</strong> 10 perc and <strong>Recovery rate</strong> -9 perc to <strong>Loss severity</strong> 5 perc and <strong>Recovery rate</strong> -4 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Loss severity is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Recovery rate and Loss given default are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Loss severity left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Loss severity is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Expected exposure left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Expected exposure is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Loss severity is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Loss given default form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Loss severity</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Expected exposure, Loss given default and Recovery rate. Fill it from a measurement rather than a memory — Loss severity is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Expected exposure</strong> takes a plain number with no unit attached. It feeds Loss severity and Loss given default. Fill it from a measurement rather than a memory — Expected exposure is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Recovery rate</strong> is a percent figure and the page's own defaults put it at -9 perc. It is computed from Loss severity, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Loss given default</strong> is a plain number. It is computed from Expected exposure and Loss severity, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Loss severity</th><th>Recovery rate</th></tr></thead><tbody><tr><td><strong>Expected exposure</strong> +10%</td><td>-9.09%</td><td>+10.1%</td></tr><tr><td><strong>Loss given default</strong> +10%</td><td>+10%</td><td>-11.11%</td></tr></tbody></table><p>Ranked by leverage, Loss given default sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Expected exposure = 5 USD and Loss given default = 50 USD and the page reports <strong>Loss severity</strong> = 10 perc and <strong>Recovery rate</strong> = -9 perc.</li><li>Feed in Expected exposure = 30 USD and Loss given default = 100 USD and the page reports <strong>Loss severity</strong> = 3.33 perc and <strong>Recovery rate</strong> = -2.33 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Loss given default actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Recovery rate follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Loss severity and Expected exposure measured, Recovery rate and Loss given default wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/home-improvement-loan">Home improvement loan Calculator</a>, <a href="/finance/home-value-us">Home value US Calculator</a> and <a href="/finance/hourly-to-annual-salary">Hourly to annual salary Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Loss given default is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Loss severity and Expected exposure beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Loss given default calculator work out?', 'a' => 'Recovery rate and Loss given default, from Expected exposure and Loss severity. The relationship is Loss given default = Expected exposure × Loss severity.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Loss severity (percent), Expected exposure (USD). Fill loss severity and expected exposure and leave Recovery rate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Loss given default, Expected exposure, Loss severity and Recovery rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Loss severity = 10 perc and Recovery rate = -9 perc. The figures come from Loss severity as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Recovery rate is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Loss severity blank and the page solves for it, reporting Recovery rate instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Recovery rate at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/home-improvement-loan', 'name' => 'Home improvement loan Calculator'],
            ['path' => '/finance/home-value-us', 'name' => 'Home value US Calculator'],
            ['path' => '/finance/hourly-to-annual-salary', 'name' => 'Hourly to annual salary Calculator'],
        ],
        'authors' => [],
    ],
];
